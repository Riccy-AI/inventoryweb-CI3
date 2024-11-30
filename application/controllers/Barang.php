<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_model', 'barang_model');
        $this->load->library(['form_validation', 'session']);

        // Periksa login dan dapatkan role user
        if (!$this->session->userdata('login_session')) {
            redirect('login');
        }
        $this->role = $this->session->userdata('login_session')['role'];
    }

    public function index()
    {
        $data['judul'] = 'Barang';
        $data['barang'] = $this->barang_model->get_all_barang();
        $data['role'] = $this->session->userdata('login_session')['role']; // Mengambil role dari session
        $this->load->view('templates/header', $data);
        $this->load->view('barang/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        // Cek role untuk akses fungsi tambah (admin dan staff diizinkan)
        if ($this->role !== '"admin"') {
            $this->session->set_flashdata('flash_error', 'Anda tidak memiliki akses untuk menambah data');
            redirect('barang');
        }

        $data['judul'] = 'Tambah Data Barang';
        $data['role'] = $this->session->userdata('login_session')['role']; // Mengambil role dari session

        // Validasi form
        $this->form_validation->set_rules('id_barang', 'ID Barang', 'required');
        $this->form_validation->set_rules('id_user', 'ID User', 'required');
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('jmlh_barang', 'Jumlah Barang', 'required|numeric');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('barang/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->barang_model->tambahDataBarang();
            $this->session->set_flashdata('flash_success', 'Data barang berhasil ditambahkan');
            redirect('barang');
        }
    }

    public function hapus($id_barang)
    {
        // Cek role untuk akses fungsi hapus (hanya admin dan staff)
        if ($this->role !== '"admin"' && $this->role !== '"staff"') {
            $this->session->set_flashdata('flash_error', 'Anda tidak memiliki akses untuk menghapus data');
            redirect('barang');
        }

        $this->barang_model->hapusDataBarang($id_barang);
        $this->session->set_flashdata('flash_success', 'Data barang berhasil dihapus');
        redirect('barang');
    }

    public function edit($id_barang)
    {
        // Cek role untuk akses fungsi edit (hanya admin)
        if ($this->role !== '"admin"') {
            $this->session->set_flashdata('flash_error', 'Anda tidak memiliki akses untuk mengubah data');
            redirect('barang');
        }

        $data['judul'] = 'Edit Data Barang';
        $data['role'] = $this->session->userdata('login_session')['role']; // Mengambil role dari session
        $data['barang'] = $this->barang_model->getBarangById($id_barang);

        // Validasi input form
        $this->form_validation->set_rules('id_barang', 'ID Barang', 'required');
        $this->form_validation->set_rules('id_user', 'ID User', 'required');
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('jmlh_barang', 'Jumlah Barang', 'required|numeric');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan form edit dengan data lama
            $this->load->view('templates/header', $data);
            $this->load->view('barang/edit', $data);
            $this->load->view('templates/footer');
        } else {
            // Jika validasi berhasil, lakukan update
            $this->barang_model->updateBarangById($id_barang);
            $this->session->set_flashdata('flash_success', 'Data barang berhasil diperbarui');
            redirect('barang');
        }
    }

    public function updateQuantity()
    {
        // Ambil data dari form
        $id_barang = $this->input->post('id_barang'); // ID Barang
        $action = $this->input->post('action');      // Aksi (increase atau decrease)

        // Ambil quantity saat ini dari session (default 1 jika tidak ada)
        $quantity = $this->session->userdata('quantity_' . $id_barang) ?? 1;

        // Logika tambah atau kurangi quantity
        if ($action === 'increase') {
            $quantity++; // Tambah quantity
        } elseif ($action === 'decrease' && $quantity > 1) {
            $quantity--; // Kurangi quantity (tidak boleh kurang dari 1)
        }

        // Simpan quantity terbaru ke session
        $this->session->set_userdata('quantity_' . $id_barang, $quantity);

        // Redirect kembali ke halaman barang
        redirect('barang');
    }
}
