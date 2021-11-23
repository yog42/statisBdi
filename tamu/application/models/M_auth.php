<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_auth extends CI_Model
{
    public function insert_regis($data, $table)
    {
        $this->db->insert($table, $data);
        return true;
    }
}
