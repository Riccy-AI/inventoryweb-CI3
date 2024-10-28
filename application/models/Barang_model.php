<?php

class Barang_model extends CI_Model {

    public function get_all_barang() 
    {
        // Mengambil semua data dari tabel 'barang'
        $query = $this->db->get('barang');
        return $query->result_array();
    }
}
