<?php

/**
 * 
 */
class M_laporan extends CI_Model
{
    function view_all()
    {
        $this->db->select('*');
        $this->db->from('tb_tamu');
        return $query = $this->db->get();
    }
    public function nama()
    {
        $this->db->select('*');
        $this->db->from('tb_tamu');
        return $query = $this->db->get()->result();
    }
    public function view_by_nama($nama)
    {
        $this->db->select('*');
        $this->db->from('tb_tamu');
        // $this->db->join('bendahara', 'spp_bulanan.id = bendahara.id_bendahara');
        $this->db->where('tb_tamu.nama', $nama);
        $this->db->order_by('tb_tamu.nama');
        return $query = $this->db->get(); // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter  
    }
    public function view_by_date($tanggal1, $tanggal2)
    {
        $this->db->select('*');
        $this->db->from('tb_tamu');
        $this->db->where('tgl_chekin BETWEEN"' . date('Y-m-d', strtotime($tanggal1)) . '"and"' . date('Y-m-d', strtotime($tanggal2)) . '"');
        $this->db->order_by('tgl_chekin');
        return $query = $this->db->get(); // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter  
    }
    public function view_by_date1($tanggal1, $tanggal2)
    {
        $this->db->select('*');
        $this->db->from('tb_tamu');
        $this->db->where('tgl_chekout BETWEEN"' . date('Y-m-d', strtotime($tanggal1)) . '"and"' . date('Y-m-d', strtotime($tanggal2)) . '"');
        $this->db->order_by('tgl_chekout');
        return $query = $this->db->get(); // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter  
    }
}
