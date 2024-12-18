<?php

class DetailBarangKeluar_model extends CI_Model
{

    public function getAllDetailBarangKeluar()
    {
        // Mengambil semua data dari tabel
        $query = $this->db->get('detail_barang_keluar');
        return $query->result_array();
    }
    // Fungsi untuk generate ID unik dengan format UUID sederhana
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

    public function tambahDataDetailBarangKeluar($id_barang_keluar, $barang, $jumlah_keluar)
    {
        // Data yang akan diinsert ke tabel detail_barang_keluar
        $data = [
            'id_detail_barang_keluar' => 'DO-' . $this->generateUUID(), // Generate ID unik
            'id_barang_keluar' => $id_barang_keluar, // ID Barang Keluar yang diinput
            'id_barang' => $barang['id_barang'], // Ambil ID Barang dari database
            'jmlh_keluar' => $jumlah_keluar, // Jumlah yang dikeluarkan
        ];

        // Insert data ke database
        return $this->db->insert('detail_barang_keluar', $data);
    }
    public function hapusDataDetailBarangKeluar($id_detail_barang_keluar)
    {
        $this->db->where('id_detail_barang_keluar', $id_detail_barang_keluar);
        return $this->db->delete('detail_barang_keluar');
    }

    public function hapusDetailBarangKeluar($id_barang_keluar)
    {
        // Hapus semua data yang terkait dengan id_barang_masuk
        $this->db->where('id_barang_keluar', $id_barang_keluar);
        return $this->db->delete('detail_barang_keluar');
    }

    public function getDetailBarangKeluarById($id_detail_barang_keluar)
    {
        return $this->db->get_where('detail_barang_keluar', ['id_detail_barang_keluar' => $id_detail_barang_keluar])->row_array();
    }

    public function getDetailBarangKeluarByIdBarangKeluar($id_barang_keluar)
    {
        return $this->db->get_where('detail_barang_keluar', ['id_barang_keluar' => $id_barang_keluar])->result_array();
    }

    public function updateDetailBarangKeluarById($id_detail_barang_keluar)
    {
        $data = [
            'id_barang_keluar' => $this->input->post('id_barang_keluar', true),
            'id_barang' => $this->input->post('id_barang', true),
            'jmlh_keluar' => $this->input->post('jmlh_keluar', true),
        ];

        // Validasi sebelum update
        if (!empty($data['id_barang'])) {
            $this->db->where('id_detail_barang_keluar', $id_detail_barang_keluar);
            return $this->db->update('detail_barang_keluar', $data);
        } else {
            log_message('error', 'ID Barang is null or not set in updateDetailBarangKeluarById.');
            return false;
        }
    }

    public function countDetailBarangKeluar()
    {
        return $this->db->count_all('detail_barang_keluar');
    }

    public function getTotalDetailBarangKeluar()
    {
        $this->db->select_sum('jmlh_keluar');
        $query = $this->db->get('detail_barang_keluar');
        return $query->row()->jmlh_keluar;
    }


    public function getAllBarang()
    {
        // Ambil semua barang dari tabel barang
        return $this->db->get('barang')->result_array();
    }

    public function getAllBarangKeluar()
    {
        return $this->db->get('barang_keluar')->result_array();
    }

    public function insertDetailBarangKeluar($data)
    {
        // Memastikan semua data yang diperlukan ada
        if (isset($data['id_barang']) && $data['id_barang'] !== null) {
            return $this->db->insert('detail_barang_keluar', $data);
        } else {
            // Log jika id_barang kosong
            log_message('error', 'ID Barang is null or not set in insertDetailBarangKeluar.');
            return false;
        }
    }
}
