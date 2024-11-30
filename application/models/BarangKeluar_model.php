<?php

class BarangKeluar_model extends CI_Model
{

    public function getAllBarangKeluar()
    {
        // Mengambil semua data dari tabel
        $query = $this->db->get('barang_keluar');
        return $query->result_array();
    }

    public function tambahDataBarangKeluar()
    {
        $data = [
            'id_barang_keluar' => $this->input->post('id_barang_keluar', true),
            'id_user' => $this->input->post('id_user', true),
            'tanggal_keluar' => $this->input->post('tanggal_keluar', true)
        ];

        return $this->db->insert('barang_keluar', $data);
    }

    public function hapusDataBarangKeluar($id_barang_keluar)
    {
        $this->db->where('id_barang_keluar', $id_barang_keluar);
        $this->db->delete('barang_keluar');
    }

    public function getBarangKeluarById($id_barang_keluar)
    {
        $data = [
            'id_barang_keluar' => $this->input->post('id_barang_keluar', true),
            'id_user' => $this->input->post('id_user', true),
            'tanggal_keluar' => $this->input->post('tanggal_keluar', true)
        ];
        $this->db->where('id_barang_keluar', $id_barang_keluar);
        $this->db->update('barang_keluar', $data);
        return $this->db->get_where('barang_keluar', ['id_barang_keluar' => $id_barang_keluar])->row_array();
    }
}
