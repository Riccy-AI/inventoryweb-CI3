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
        $data = [
            'id_supplier' => $this->input->post('id_supplier', true),
            'nama_supplier' => $this->input->post('nama_supplier', true),
            'alamat' => $this->input->post('alamat', true),
            'cp' => $this->input->post('cp', true)
        ];

        return $this->db->insert('supplier', $data);
    }

    public function hapusDataSupplier($id_supplier)
    {
        $this->db->where('id_supplier', $id_supplier);
        $this->db->delete('supplier');
    }

    public function getSupplierById($id_supplier)
    {
        $data = [
            'id_supplier' => $this->input->post('id_supplier', true),
            'nama_supplier' => $this->input->post('nama_supplier', true),
            'alamat' => $this->input->post('alamat', true),
            'cp' => $this->input->post('cp', true)
        ];
        $this->db->where('id_supplier', $id_supplier);
        $this->db->update('supplier', $data);
        return $this->db->get_where('supplier', ['id_supplier' => $id_supplier])->row_array();
    }

    public function countSupplier()
    {
        return $this->db->count_all('supplier');
    }
}
