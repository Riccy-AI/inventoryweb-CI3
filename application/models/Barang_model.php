<?php

class Barang_model extends CI_Model
{
    // Mengambil semua data barang
    public function get_all_barang()
    {
        $query = $this->db->get('barang');
        return $query->result_array();
    }

    // Menambah data barang
    public function tambahDataBarang()
    {
        $data = [
            'id_barang' => $this->input->post('id_barang', true),
            'id_user' => $this->input->post('id_user', true),
            'nama_barang' => $this->input->post('nama_barang', true),
            'jmlh_barang' => $this->input->post('jmlh_barang', true),
            'deskripsi' => $this->input->post('deskripsi', true),
        ];

        return $this->db->insert('barang', $data);
    }

    // Menghapus data barang berdasarkan ID
    public function hapusDataBarang($id_barang)
    {
        $this->db->where('id_barang', $id_barang);
        $this->db->delete('barang');
    }

    // Mengambil data barang berdasarkan ID untuk proses edit
    public function getBarangById($id_barang)
    {
        return $this->db->get_where('barang', ['id_barang' => $id_barang])->row_array();
    }

    // Memperbarui data barang berdasarkan ID
    public function updateBarangById($id_barang)
    {
        $data = [
            'nama_barang' => $this->input->post('nama_barang', true),
            'jmlh_barang' => $this->input->post('jmlh_barang', true),
            'deskripsi' => $this->input->post('deskripsi', true)
        ];
        $this->db->where('id_barang', $id_barang);
        return $this->db->update('barang', $data);
    }

    // Menghitung jumlah barang
    public function countBarang()
    {
        return $this->db->count_all('barang');
    }


    // Mengupdate jumlah barang berdasarkan ID
    public function updateJmlhBarang($id_barang, $quantity)
    {
        $this->db->where('id_barang', $id_barang);
        $this->db->update('barang', ['jmlh_barang' => $quantity]);
    }

    // Menyimpan data barang keluar beserta detailnya
    public function simpanBarangKeluar($data_pesanan, $data_penerima)
    {
        // Simpan data ke tabel barang_keluar
        $this->db->insert('barang_keluar', [
            'id_bagian'       => $data_penerima['id_bagian'],
            'id_user'         => $data_penerima['id_user'],
            'tanggal_keluar'  => $data_penerima['tanggal_keluar'],
        ]);

        // Ambil ID barang_keluar yang baru disimpan
        $id_barang_keluar = $this->db->insert_id();

        // Simpan detail barang keluar ke tabel detail_barang_keluar
        $this->db->insert('detail_barang_keluar', [
            'id_barang_keluar' => $id_barang_keluar,
            'id_barang'        => $data_pesanan['id_barang'],
            'quantity'         => $data_pesanan['quantity'],
        ]);
    }

    // Mengambil data barang keluar beserta detailnya
    public function getBarangKeluar()
    {
        $this->db->select('bk.*, dbk.id_barang, dbk.quantity');
        $this->db->from('barang_keluar bk');
        $this->db->join('detail_barang_keluar dbk', 'bk.id_barang_keluar = dbk.id_barang_keluar');
        return $this->db->get()->result_array();
    }

    // Mengambil data penerima berdasarkan ID bagian
    public function getPenerima($id_bagian)
    {
        $this->db->where('id_bagian', $id_bagian);
        $query = $this->db->get('bagian'); // Sesuaikan nama tabel dengan database Anda
        return $query->row_array();
    }

    // Mendapatkan jumlah barang berdasarkan kategori (opsional)
    public function get_barang_count_by_category()
    {
        $this->db->select('jmlh_barang, COUNT(*) as total');
        $this->db->group_by('jmlh_barang');
        $query = $this->db->get('barang');
        return $query->result_array();
    }

    public function getBarangKeluarDetails($id_barang_keluar)
    {
        $this->db->select('bk.id_barang, b.nama_barang, bk.jumlah_barang, b.deskripsi');
        $this->db->from('barang_keluar_details bk');
        $this->db->join('barang b', 'bk.id_barang = b.id_barang');
        $this->db->where('bk.id_barang_keluar', $id_barang_keluar);
        return $this->db->get()->result_array();
    }
}
