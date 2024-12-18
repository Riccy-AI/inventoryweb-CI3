<?php

class BarangMasuk_model extends CI_Model
{
    public function getAllUsers()
    {
        return $this->db->get('user')->result_array();
    }

    public function getAllSupplier()
    {

        return $this->db->get('supplier')->result_array();
    }

    public function getAllBarang()
    {
        return $this->db->get('barang')->result_array(); // Mengambil semua data barang
    }

    public function getBarangById($id_barang)
    {
        return $this->db->get_where('barang', ['id_barang' => $id_barang])->row_array();
    }

    public function getAllBarangMasuk()
    {
        // Mengambil semua data dari tabel
        $query = $this->db->get('barang_masuk');
        return $query->result_array();
    }

    public function tambahDataBarangMasuk()
    {
        $data = [
            'id_user' => $this->input->post('id_user', true),
            'id_supplier' => $this->input->post('id_supplier', true),
            'tanggal_masuk' => $this->input->post('tanggal_masuk', true)
        ];

        $this->db->insert('barang_masuk', $data);
        return $this->db->insert_id(); // Mengembalikan ID yang baru saja ditambahkan
    }


    public function hapusDataBarangMasuk($id_barang_masuk)
    {
        $this->db->where('id_barang_masuk', $id_barang_masuk);
        $this->db->delete('barang_masuk');
    }

    public function getBarangMasukById($id_barang_masuk)
    {
        $query = $this->db->get_where('barang_masuk', ['id_barang_masuk' => $id_barang_masuk]);
        return $query->row_array();  // Mengembalikan hasil dalam bentuk array (untuk satu data)
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

    public function tambahBarangMasuk($data)
    {
        // Tambahkan data ke tabel barang_masuk
        $this->db->insert('barang_masuk', $data);
        return $this->db->insert_id(); // Kembalikan ID Barang Masuk yang baru
    }

    public function tambahDataDetailBarangMasuk($data)
    {
        return $this->db->insert('detail_barang_masuk', $data);
    }
}
