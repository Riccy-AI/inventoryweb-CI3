<?php

class DetailBarangMasuk_model extends CI_Model
{

    public function getAllDetailBarangMasuk()
    {
        // Mengambil semua data dari tabel
        $query = $this->db->get('detail_barang_masuk');
        return $query->result_array();
    }

    public function generateUUID()
    {
        return sprintf(
            '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff)
        );
    }

    public function tambahDataDetailBarangMasuk($id_barang_masuk, $barang, $jumlah_masuk, $harga_beli)
    {
        // Data yang akan diinsert ke tabel detail_barang_masuk
        $data = [
            'id_detail_barang_masuk' => 'DI-' . $this->generateUUID(), // Generate ID unik
            'id_barang_masuk' => $id_barang_masuk, // ID Barang Masuk yang diinput admin
            'id_barang' => $barang['id_barang'], // Ambil ID Barang dari database
            'jmlh_masuk' => $jumlah_masuk, // Jumlah yang dimasukkan
            'harga_beli' => $harga_beli // Harga beli yang dimasukkan
        ];

        // Insert data ke database
        return $this->db->insert('detail_barang_masuk', $data);
    }

    public function hapusDetailBarangMasuk($id_barang_masuk)
    {
        // Hapus semua data yang terkait dengan id_barang_masuk
        $this->db->where('id_barang_masuk', $id_barang_masuk);
        return $this->db->delete('detail_barang_masuk');
    }

    public function getAllBarang()
    {
        // Ambil semua barang dari tabel barang
        return $this->db->get('barang')->result_array();
    }

    public function hapusDataDetailBarangMasuk($id_detail_barang_masuk)
    {
        $this->db->where('id_detail_barang_masuk', $id_detail_barang_masuk);
        return $this->db->delete('detail_barang_masuk');
    }


    public function getDetailBarangMasukById($id_detail_barang_masuk)
    {
        return $this->db->get_where('detail_barang_masuk', ['id_detail_barang_masuk' => $id_detail_barang_masuk])->row_array();
    }

    public function getDetailBarangMasukByIdBarangMasuk($id_barang_masuk)
    {
        return $this->db->get_where('detail_barang_masuk', ['id_barang_masuk' => $id_barang_masuk])->result_array();
    }


    public function updateDetailBarangMasukById($id_detail_barang_masuk)
    {
        $data = [
            'id_barang_masuk' => $this->input->post('id_barang_masuk', true),
            'id_barang' => $this->input->post('id_barang', true),
            'jmlh_masuk' => $this->input->post('jmlh_masuk', true),
            'harga_beli' => $this->input->post('harga_beli', true),
        ];

        // Validasi sebelum update
        if (!empty($data['id_barang'])) {
            $this->db->where('id_detail_barang_masuk', $id_detail_barang_masuk);
            return $this->db->update('detail_barang_masuk', $data);
        } else {
            log_message('error', 'ID Barang is null or not set in updateDetailBarangMasukById.');
            return false;
        }
    }

    public function countDetailBarangMasuk()
    {
        return $this->db->count_all('detail_barang_masuk');
    }

    public function getTotalDetailBarangMasuk()
    {
        $this->db->select_sum('jmlh_masuk');
        $query = $this->db->get('detail_barang_masuk');
        return $query->row()->jmlh_masuk;
    }

    public function getDetailByBarangMasukId($id_barang_masuk)
    {
        return $this->db->get_where('detail_barang_masuk', ['id_barang_masuk' => $id_barang_masuk])->result_array();
    }

    public function insertDetailBarangMasuk($data)
    {
        // Memastikan semua data yang diperlukan ada
        if (isset($data['id_barang']) && $data['id_barang'] !== null) {
            return $this->db->insert('detail_barang_masuk', $data);
        } else {
            // Log jika id_barang kosong
            log_message('error', 'ID Barang is null or not set in insertDetailBarangMasuk.');
            return false;
        }
    }

    public function getAllBarangMasuk()
    {
        return $this->db->get('barang_masuk')->result_array();
    }
}
