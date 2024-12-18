<?php

class BarangKeluar_model extends CI_Model
{

    // 1. Mengambil semua data barang keluar
    public function getAllBarangKeluar()
    {
        $this->db->select('*');
        $this->db->from('barang_keluar');
        $this->db->join('user', 'user.id_user = barang_keluar.id_user');
        $this->db->order_by('tanggal_keluar', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    // 2. Menambahkan data barang keluar
    public function tambahBarangKeluar($data)
    {
        return $this->db->insert('barang_keluar', $data);
    }

    // 3. Menghapus data barang keluar
    public function hapusDataBarangKeluar($id_barang_keluar)
    {
        $this->db->where('id_barang_keluar', $id_barang_keluar);
        $this->db->delete('barang_keluar');
    }

    // 4. Mengambil data barang keluar berdasarkan ID
    public function getBarangKeluarById($id_barang_keluar)
    {
        return $this->db->get_where('barang_keluar', ['id_barang_keluar' => $id_barang_keluar])->row_array();
    }

    // 5. Mengupdate data barang keluar berdasarkan ID
    public function updateBarangKeluarById($id_barang_keluar)
    {
        $data = [
            'id_barang_keluar' => $this->input->post('id_barang_keluar', true),
            'id_user' => $this->input->post('id_user', true),
            'tanggal_keluar' => $this->input->post('tanggal_keluar', true)
        ];
        $this->db->where('id_barang_keluar', $id_barang_keluar);
        return $this->db->update('barang_keluar', $data);
    }

    // 6. Mengambil semua data user untuk dropdown atau relasi
    public function getAllUsers()
    {
        $query = $this->db->get('user');
        return $query->result_array();
    }

    // 7. Mengambil semua data supplier untuk dropdown atau relasi
    public function getAllSupplier()
    {
        $query = $this->db->get('supplier');
        return $query->result_array();
    }

    public function getAllBarang()
    {
        return $this->db->get('barang')->result_array(); // Mengambil semua data barang
    }

    // 8. Mengambil detail barang keluar berdasarkan ID Barang Keluar
    public function getDetailBarangKeluarByIdBarangKeluar($id_barang_keluar)
    {
        $this->db->select('*');
        $this->db->from('detail_barang_keluar');
        $this->db->join('barang', 'barang.id_barang = detail_barang_keluar.id_barang');
        $this->db->where('detail_barang_keluar.id_barang_keluar', $id_barang_keluar);
        $query = $this->db->get();
        return $query->result_array();
    }
}
