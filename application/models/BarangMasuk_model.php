<?php

class BarangMasuk_model extends CI_Model
{

    public function getAllBarangMasuk()
    {
        // Mengambil semua data dari tabel
        $query = $this->db->get('barang_masuk');
        return $query->result_array();
    }

    public function tambahDataBarangMasuk()
    {
        $data = [
            'id_barang_masuk' => $this->input->post('id_barang_masuk', true),
            'id_user' => $this->input->post('id_user', true),
            'id_supplier' => $this->input->post('id_supplier', true),
            'tanggal_masuk' => $this->input->post('tanggal_masuk', true)
        ];

        return $this->db->insert('barang_masuk', $data);
    }

    public function hapusDataBarangMasuk($id_barang_masuk)
    {
        $this->db->where('id_barang_masuk', $id_barang_masuk);
        $this->db->delete('barang_masuk');
    }

    public function getBarangMasukById($id_barang_masuk)
    {
        return $this->db->get_where('barang_masuk', ['id_barang_masuk' => $id_barang_masuk])->row_array();
    }

    public function updateBarangMasukById($id_barang_masuk)
    {
        $data = [
            'id_barang_masuk' => $this->input->post('id_barang_masuk', true),
            'id_user' => $this->input->post('id_user', true),
            'id_supplier' => $this->input->post('id_supplier', true),
            'tanggal_masuk' => $this->input->post('tanggal_masuk', true)
        ];
        $this->db->where('id_barang_masuk', $id_barang_masuk);
        return $this->db->update('barang_masuk', $data);
    }
}
