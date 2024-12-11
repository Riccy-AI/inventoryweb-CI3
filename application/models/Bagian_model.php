<?php

class Bagian_model extends CI_Model
{
    public function getBagianList()
    {
        $query = $this->db->get('bagian'); // Ganti 'bagian' dengan nama tabel Anda
        return $query->result_array();
    }
}
