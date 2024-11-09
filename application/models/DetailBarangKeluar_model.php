<?php

class DetailBarangKeluar_model extends CI_Model
{

    public function getAllDetailBarangKeluar()
    {
        // Mengambil semua data dari tabel
        $query = $this->db->get('detail_barang_keluar');
        return $query->result_array();
    }

    public function tambahDataDetailBarangKeluar()
    {
        $data = [
            'id_detail_barang_keluar' => $this->input->post('id_detail_barang_keluar', true),
            'id_barang' => $this->input->post('id_barang', true),
            'id_barang_keluar' => $this->input->post('id_barang_keluar', true),
            'jmlh_keluar' => $this->input->post('jmlh_keluar', true)
        ];

        return $this->db->insert('detail_barang_keluar', $data);
    }

    public function hapusDataDetailBarangKeluar($id_detail_barang_keluar)
    {
        $this->db->where('id_detail_barang_keluar', $id_detail_barang_keluar);
        $this->db->delete('detail_barang_keluar');
    }

    public function getDetailBarangKeluarById($id_detail_barang_keluar)
    {
        $data = [
            'id_detail_barang_keluar' => $this->input->post('id_detail_barang_keluar', true),
            'id_barang' => $this->input->post('id_barang', true),
            'id_barang_keluar' => $this->input->post('id_barang_keluar', true),
            'jmlh_keluar' => $this->input->post('jmlh_keluar', true)
        ];
        $this->db->where('id_detail_barang_keluar', $id_detail_barang_keluar);
        $this->db->update('detail_barang_keluar', $data);
        return $this->db->get_where('detail_barang_keluar', ['id_detail_barang_keluar' => $id_detail_barang_keluar])->row_array();
    }
}
