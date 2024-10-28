<?php

class Supplier_model extends CI_Model
{
    public function getAllSupplier() 
    {
        $query = $this->db->get('supplier');
        return $query->result_array();
    }

    public function tambahDataSupplier()
    {
        $data = array(
            'id_supplier' => $this->input->post('id_supplier', true),
            'nama_supplier' => $this->input->post('nama_supplier', true),
            'alamat_supplier' => $this->input->post('alamat', true),
            'cp' => $this->input->post('cp', true)
        );

        $this->db->insert('supplier', $data); 
    }
}
