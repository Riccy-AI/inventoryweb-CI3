<?php

class DetailBarangMasuk_model extends CI_Model
{

    public function getAllDetailBarangMasuk()
    {
        // Mengambil semua data dari tabel
        $query = $this->db->get('detail_barang_masuk');
        return $query->result_array();
    }

    public function tambahDataDetailBarangMasuk()
    {
        $data = [
            'id_detail_barang_masuk' => $this->input->post('id_detail_barang_masuk', true),
            'id_barang_masuk' => $this->input->post('id_barang_masuk', true),
            'id_barang' => $this->input->post('id_barang', true),
            'jmlh_masuk' => $this->input->post('jmlh_masuk', true),
            'harga_beli' => $this->input->post('harga_beli', true)
        ];

        return $this->db->insert('detail_barang_masuk', $data);
    }

    public function hapusDataDetailBarangMasuk($id_detail_barang_masuk)
    {
        $this->db->where('id_detail_barang_masuk', $id_detail_barang_masuk);
        $this->db->delete('detail_barang_masuk');
    }

    public function getDetailBarangMasukById($id_detail_barang_masuk)
    {
        $data = [
            'id_detail_barang_masuk' => $this->input->post('id_detail_barang_masuk', true),
            'id_barang_masuk' => $this->input->post('id_barang_masuk', true),
            'id_barang' => $this->input->post('id_barang', true),
            'jmlh_masuk' => $this->input->post('jmlh_masuk', true),
            'harga_beli' => $this->input->post('harga_beli', true)
        ];
        $this->db->where('id_detail_barang_masuk', $id_detail_barang_masuk);
        $this->db->update('detail_barang_masuk', $data);
        return $this->db->get_where('detail_barang_masuk', ['id_detail_barang_masuk' => $id_detail_barang_masuk])->row_array();
    }
}
