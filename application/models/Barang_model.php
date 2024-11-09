<?php

class Barang_model extends CI_Model
{

    public function get_all_barang()
    {
        // Mengambil semua data dari tabel 'barang'
        $query = $this->db->get('barang');
        return $query->result_array();
    }

    public function tambahDataBarang()
    {
        $data = [
            'id_barang' => $this->input->post('id_barang', true),
            'nama_barang' => $this->input->post('nama_barang', true),
            'jmlh_barang' => $this->input->post('jmlh_barang', true),
            'deskripsi' => $this->input->post('deskripsi', true)
        ];

        return $this->db->insert('barang', $data);
    }

    public function hapusDataBarang($id_barang)
    {
        $this->db->where('id_barang', $id_barang);
        $this->db->delete('barang');
    }

    public function getBarangById($id_barang)
    {
        $data = [
            'id_barang' => $this->input->post('id_barang', true),
            'nama_barang' => $this->input->post('nama_barang', true),
            'jmlh_barang' => $this->input->post('jmlh_barang', true),
            'deskripsi' => $this->input->post('deskripsi', true)
        ];
        $this->db->where('id_barang', $id_barang);
        $this->db->update('barang', $data);
        return $this->db->get_where('barang', ['id_barang' => $id_barang])->row_array();
    }

    public function get_barang_count_by_category()
    {
        // Query untuk menghitung jumlah barang berdasarkan kategori
        $this->db->select('jmlh_barang, COUNT(*) as total');
        $this->db->group_by('jmlh_barang');
        $query = $this->db->get('barang'); // Ganti dengan tabel sesuai kebutuhan
        return $query->result_array();
    }
}
