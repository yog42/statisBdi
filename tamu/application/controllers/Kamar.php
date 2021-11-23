<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kamar extends  CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect(base_url("auth"));
        }
        $this->load->library('session');
        $this->load->model('M_kamar');
        $this->load->helper('url');
    }
    public function index()
    {
        $data['title'] = 'Data Kamar';
        $data['user'] = $this->db->get_where(
            'user',
            ['email' => $this->session->userdata('email')]
        )->row_array();
        $sql = "select * from tb_kamar";
        $data['kamar'] = $this->db->query($sql)->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kamar/index', $data);
        $this->load->view('templates/footer');
    }
    function tambah_aksi()
    {
        $data['title'] = 'Data Kamar';
        $data['user'] = $this->db->get_where(
            'user',
            ['email' => $this->session->userdata('email')]
        )->row_array();
        $kd_kamar = date("dmY") . '-' . rand(0000, 9999);
        $kd_fasilitas = $this->input->post('kd_fasilitas');
        $kd_paket = $this->input->post('kd_paket');
        $no_kamar = $this->input->post('no_kamar');
        $lantai = $this->input->post('lantai');
        $harga = $this->input->post('harga');
        $data = array(
            'kd_kamar' => $kd_kamar,
            'kd_fasilitas' => $kd_fasilitas,
            'kd_paket' => $kd_paket,
            'no_kamar' => $no_kamar,
            'lantai' => $lantai,
            'harga' => $harga,
        );
        $this->M_kamar->input_data($data, 'tb_kamar');
        $this->session->set_flashdata('message5', '<div class="alert alert-success" role="alert">
        
        Tambah Kamar Berhasil!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
        <span aria-hidden="true">&times;</span> 
   </button>
      </div>');
        redirect('kamar');
    }
    function update()
    {
        $id_kas = $this->input->post('id_kas');
        $tgl_transaksi = $this->input->post('tgl_transaksi');
        $keterangan = $this->input->post('keterangan');
        $nominal = $this->input->post('nominal');
        $data = array(
            'id_kas' => $id_kas,
            'tgl_transaksi' => $tgl_transaksi,
            'keterangan' => $keterangan,
            'nominal' => $nominal,
        );
        $where = array('id_kas' => $id_kas);
        $this->M_kamar->update_data($where, $data, 'kas_masuk');
        $this->session->set_flashdata('message5', '<div class="alert alert-success" role="alert">
        
        Update Kas Masuk Berhasil!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
        <span aria-hidden="true">&times;</span> 
   </button>
      </div>');
        redirect('kas_masuk');
    }
    public function deletekasmasuk()
    {
        $id = $this->input->get('id_kas');
        $this->db->delete('kas_masuk', array('id_kas' => $id));
        $this->session->set_flashdata('message5', '<div class="alert alert-danger" role="alert">
        Hapus Kas Masuk Berhasil!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
        <span aria-hidden="true">&times;</span> 
   </button>
      </div>');
        redirect('kas_masuk');
    }
}
