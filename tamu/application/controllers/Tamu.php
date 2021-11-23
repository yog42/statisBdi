<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tamu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('M_tamu');
        $this->load->helper('url');
    }
    public function index()
    {
        $data['title'] = 'Data Tamu';
        $data['user'] = $this->db->get_where(
            'user',
            ['email' => $this->session->userdata('email')]
        )->row_array();
        $sql = "select * from tb_kamar";
        $data['kamar'] = $this->db->query($sql)->result();
        $sql = "select * from tb_tamu";
        $data['tamu'] = $this->db->query($sql)->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data_tamu/index', $data);
        $this->load->view('templates/footer');
    }
    function tambah_aksi()
    {
        $data['title'] = 'Data Kas Masuk';
        $data['user'] = $this->db->get_where(
            'user',
            ['email' => $this->session->userdata('email')]
        )->row_array();
        $id_tamu = date("dmY") . '-' . rand(0000, 9999);
        $nama = $this->input->post('nama');
        $no_hp = $this->input->post('no_hp');
        $alamat = $this->input->post('alamat');
        $no_ktp = $this->input->post('no_ktp');
        $kd_kamar = $this->input->post('kd_kamar');
        $kd_paket = $this->input->post('kd_paket');
        $kd_fasilitas = $this->input->post('kd_fasilitas');
        $tgl_chekin = $this->input->post('tgl_chekin');
        $tgl_chekout = $this->input->post('tgl_chekout');
        $total_harga = 0;
        if ($kd_paket == 'acc' && $kd_fasilitas == 'full') {
            $total_harga = 185000;
        } elseif ($kd_paket == 'nonac' && $kd_fasilitas == 'biasa') {
            $total_harga = 130000;
        } elseif ($kd_paket == 'nonac' && $kd_fasilitas == 'full') {
            $total_harga = 165000;
        } else {
            $total_harga = 150000;
        }
        $data = array(
            'id_tamu' => $id_tamu,
            'nama' => $nama,
            'no_hp' => $no_hp,
            'alamat' => $alamat,
            'no_ktp' => $no_ktp,
            'nama' => $nama,
            'kd_kamar' => $kd_kamar,
            'kd_paket' => $kd_paket,
            'kd_fasilitas' => $kd_fasilitas,
            'tgl_chekin' => $tgl_chekin,
            'tgl_chekout' => $tgl_chekout,
            'total_harga' => $total_harga
        );
        $this->M_tamu->input_data($data, 'tb_tamu');
        $this->session->set_flashdata('message5', '<div class="alert alert-success" role="alert">
        
        Tambah Tamu Berhasil!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
        <span aria-hidden="true">&times;</span> 
   </button>
      </div>');
        redirect('tamu');
    }
    function update()
    {
        $id_tamu = $this->input->post('id_tamu');
        $nama = $this->input->post('nama');
        $no_hp = $this->input->post('no_hp');
        $alamat = $this->input->post('alamat');
        $no_ktp = $this->input->post('no_ktp');
        $kd_kamar = $this->input->post('kd_kamar');
        $kd_paket = $this->input->post('kd_paket');
        $kd_fasilitas = $this->input->post('kd_fasilitas');
        $tgl_chekin = $this->input->post('tgl_chekin');
        $tgl_chekout = $this->input->post('tgl_chekout');
        $total_harga = 0;
        if ($kd_paket == 'acc' && $kd_fasilitas == 'full') {
            $total_harga = 185000;
        } elseif ($kd_paket == 'nonac' && $kd_fasilitas == 'biasa') {
            $total_harga = 130000;
        } elseif ($kd_paket == 'nonac' && $kd_fasilitas == 'full') {
            $total_harga = 165000;
        } else {
            $total_harga = 150000;
        }
        $data = array(
            'id_tamu' => $id_tamu,
            'nama' => $nama,
            'no_hp' => $no_hp,
            'alamat' => $alamat,
            'no_ktp' => $no_ktp,
            'nama' => $nama,
            'kd_kamar' => $kd_kamar,
            'kd_paket' => $kd_paket,
            'kd_fasilitas' => $kd_fasilitas,
            'tgl_chekin' => $tgl_chekin,
            'tgl_chekout' => $tgl_chekout,
            'total_harga' => $total_harga
        );
        $where = array('id_tamu' => $id_tamu);
        $this->M_tamu->update_data($where, $data, 'tb_tamu');
        $this->session->set_flashdata('message5', '<div class="alert alert-success" role="alert">
        
        Update Tamu Berhasil!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
        <span aria-hidden="true">&times;</span> 
   </button>
      </div>');
        redirect('tamu');
    }
    public function deletekasmasuk()
    {
        $id = $this->input->get('id_tamu');
        $this->db->delete('kas_masuk', array('id_tamu' => $id));
        $this->session->set_flashdata('message5', '<div class="alert alert-danger" role="alert">
        Hapus Kas Masuk Berhasil!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
        <span aria-hidden="true">&times;</span> 
   </button>
      </div>');
        redirect('kas_masuk');
    }
}
