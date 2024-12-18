<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BarangMasuk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('BarangMasuk_model', 'barangmasuk_model');
        $this->load->model('DetailBarangMasuk_model', 'detailbarangmasuk_model'); // Memastikan model ini dimuat
        $this->load->library('form_validation', 'session');
    }

    public function index()
    {
        $data['judul'] = 'Barang Masuk';
        $data['barang_masuk'] = $this->barangmasuk_model->getAllBarangMasuk();
        $data['role'] = $this->session->userdata('login_session')['role']; // Mengambil role dari session

        $this->load->view('templates/header', $data);
        $this->load->view('barang_masuk/index');
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        // Ambil data user, supplier, dan barang
        $data['role'] = $this->session->userdata('login_session')['role']; // Mengambil role dari session
        $data['barang'] = $this->detailbarangmasuk_model->getAllBarang();
        $data['user'] = $this->barangmasuk_model->getAllUsers();
        $data['supplier'] = $this->barangmasuk_model->getAllSupplier();

        $this->form_validation->set_rules('id_barang_masuk', 'ID Barang Masuk', 'required');
        $this->form_validation->set_rules('id_user', 'ID User', 'required');
        $this->form_validation->set_rules('id_supplier', 'ID Supplier', 'required');
        $this->form_validation->set_rules('tanggal_masuk', 'Tanggal Masuk', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('barang_masuk/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            // Ambil data dari form
            $id_barang_masuk = $this->input->post('id_barang_masuk', true);
            $barangMasukData = [
                'id_barang_masuk' => $id_barang_masuk,
                'id_user' => $this->input->post('id_user', true),
                'id_supplier' => $this->input->post('id_supplier', true),
                'tanggal_masuk' => $this->input->post('tanggal_masuk', true),
            ];

            // Simpan data barang masuk
            $this->barangmasuk_model->tambahBarangMasuk($barangMasukData);

            // Proses otomatis membuat detail_barang_masuk
            $barangList = $this->detailbarangmasuk_model->getAllBarang();
            foreach ($barangList as $barang) {
                $jumlah_masuk = $this->input->post('jmlh_masuk_' . $barang['id_barang'], true);
                $harga_beli = $this->input->post('harga_beli_' . $barang['id_barang'], true);

                // Pastikan jumlah masuk dan harga beli diisi
                if (!empty($jumlah_masuk) && !empty($harga_beli)) {
                    // Masukkan data ke tabel detail_barang_masuk
                    $this->detailbarangmasuk_model->tambahDataDetailBarangMasuk($id_barang_masuk, $barang, $jumlah_masuk, $harga_beli);
                }
            }

            // Redirect ke halaman barang masuk
            redirect('barangmasuk');
        }
    }


    public function detail($id_barang_masuk)
    {

        $data['role'] = $this->session->userdata('login_session')['role']; // Mengambil role dari session
        // Ambil data barang masuk berdasarkan id_barang_masuk
        $data['barang_masuk'] = $this->barangmasuk_model->getBarangMasukById($id_barang_masuk);

        // Ambil detail barang masuk berdasarkan id_barang_masuk
        $data['detail_barang_masuk'] = $this->detailbarangmasuk_model->getDetailBarangMasukByIdBarangMasuk($id_barang_masuk);

        // Jika tidak ada data barang masuk atau detail barang masuk, set pesan error
        if (empty($data['barang_masuk']) || empty($data['detail_barang_masuk'])) {
            show_404();  // Menampilkan halaman error 404 jika data tidak ditemukan
        }

        // Set judul halaman
        $data['judul'] = 'Detail Barang Masuk';

        // Tampilkan halaman detail
        $this->load->view('templates/header', $data);
        $this->load->view('barang_masuk/detail', $data); // View yang menampilkan detail
        $this->load->view('templates/footer');
    }


    public function hapus($id_barang_masuk)
    {

        $this->barangmasuk_model->hapusDataBarangMasuk($id_barang_masuk);
        $this->detailbarangmasuk_model->hapusDetailBarangMasuk($id_barang_masuk);
        $this->session->set_flashdata('flash', 'Di hapus');
        redirect('barangmasuk');
    }

    public function edit($id_barang_masuk)
    {
        $data['judul'] = 'Edit Data Barang Masuk';
        $data['role'] = $this->session->userdata('login_session')['role']; // Mengambil role dari session
        $data['barang_masuk'] = $this->barangmasuk_model->getBarangMasukById($id_barang_masuk);

        // Validasi input
        $this->form_validation->set_rules('id_barang_masuk', 'ID Barang Masuk', 'required');
        $this->form_validation->set_rules('id_user', 'ID User', 'required');
        $this->form_validation->set_rules('id_supplier', 'ID Supplier', 'required');
        $this->form_validation->set_rules('tanggal_masuk', 'Tanggal Masuk', 'required');


        if ($this->form_validation->run() == FALSE) {
            // Menampilkan halaman edit jika ada kesalahan
            $this->load->view('templates/header', $data);
            $this->load->view('barang_masuk/edit', $data);
            $this->load->view('templates/footer');
        } else {
            // Memanggil model untuk memperbarui data supplier
            $this->barangmasuk_model->updateBarangMasukById($id_barang_masuk);
            $this->session->set_flashdata('flash_success', 'Data barang berhasil diperbarui');
            redirect('barangmasuk');
        }
    }
}
