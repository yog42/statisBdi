<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect(base_url("auth"));
        }
        $this->load->model('M_laporan');
        $this->load->helper('url');
    }

    /*LAPORAN TRANSAKSI*/
    function index()
    {
        if (isset($_GET['filter']) && !empty($_GET['filter'])) {
            $filter = $_GET['filter'];
            if ($filter == '1') {
                $nama = $_GET['nama'];
                $ket = 'Data Transaksi dari Santri dengan Nomor Induk ' . $nama;
                $url_cetak = 'laporan/cetak2?&nama=' . $nama;
                $tb_tamu = $this->M_laporan->view_by_nama($nama)->result();
            } else if ($filter == '2') {
                $tanggal1 = $_GET['tanggal'];
                $tanggal2 = $_GET['tanggal2'];
                $ket = 'Data Transaksi dari Tanggal ' . date('d-m-y', strtotime($tanggal1)) . ' - ' . date('d-m-y', strtotime($tanggal2));
                $url_cetak = 'laporan/cetak1?tanggal=' . $tanggal1 . '&tanggal2=' . $tanggal2 . '';
                $tb_tamu = $this->M_laporan->view_by_date($tanggal1, $tanggal2)->result();
            } else {
                $tanggal1 = $_GET['tanggal11'];
                $tanggal2 = $_GET['tanggal22'];
                $ket = 'Data Transaksi dari Tanggal ' . date('d-m-y', strtotime($tanggal1)) . ' - ' . date('d-m-y', strtotime($tanggal2));
                $url_cetak = 'laporan/cetak3?tanggal11=' . $tanggal1 . '&tanggal22=' . $tanggal2 . '';
                $tb_tamu = $this->M_laporan->view_by_date1($tanggal1, $tanggal2)->result();
            }
        } else {
            $ket = 'Semua Data Transaksi';
            $url_cetak = 'laporan/cetak';
            $tb_tamu = $this->M_laporan->view_all()->result();
        }
        $data['ket'] = $ket;
        $data['url_cetak'] = base_url($url_cetak);
        $data['tb_tamu'] = $tb_tamu;
        $data['nama'] = $this->M_laporan->nama();
        // $data['tahun'] = $this->M_laporan->tahun();
        $data['title'] = 'Laporan Data Tamu';
        $data['user'] = $this->db->get_where(
            'user',
            ['email' => $this->session->userdata('email')]
        )->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/index', $data);
        $this->load->view('templates/footer');
    }
    public function cetak()
    {
        $ket = 'Semua Data Tamu';
        ob_start();
        require('assets/fpdf/fpdf.php');
        $data['tb_tamu'] = $this->M_laporan->view_all()->result();
        $data['ket'] = $ket;
        $this->load->view('laporan/cetak_tamu', $data);
    }
    public function cetak1()
    {
        $tanggal1 = $_GET['tanggal'];
        $tanggal2 = $_GET['tanggal2'];
        $ket = 'Data Tamu dari Tanggal ' . date('d-m-y', strtotime($tanggal1)) . ' s/d ' . date('d-m-y', strtotime($tanggal2));
        ob_start();
        require('assets/fpdf/fpdf.php');
        $data['tb_tamu'] = $this->M_laporan->view_by_date($tanggal1, $tanggal2)->result();
        $data['ket'] = $ket;
        $this->load->view('laporan/cetak_chekin', $data);
    }
    public function cetak2()
    {
        $nama = $_GET['nama'];
        $ket = 'Data Tamu Dengan Nama ' . $nama;
        ob_start();
        require('assets/fpdf/fpdf.php');
        $data['tb_tamu'] = $this->M_laporan->view_by_nama($nama)->result();
        $data['ket'] = $ket;
        $this->load->view('laporan/cetak_nama', $data);
    }

    public function cetak3()
    {
        $tanggal1 = $_GET['tanggal11'];
        $tanggal2 = $_GET['tanggal22'];
        $ket = 'Data Tamu dari Tanggal ' . date('d-m-y', strtotime($tanggal1)) . ' s/d ' . date('d-m-y', strtotime($tanggal2));
        ob_start();
        require('assets/fpdf/fpdf.php');
        $data['tb_tamu'] = $this->M_laporan->view_by_date1($tanggal1, $tanggal2)->result();
        $data['ket'] = $ket;
        $this->load->view('laporan/cetak_chekout', $data);
    }
}
