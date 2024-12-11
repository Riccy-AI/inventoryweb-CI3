<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BarangKeluar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('BarangKeluar_model', 'barangkeluar_model');
        $this->load->library('form_validation', 'session');
    }

    public function index()
    {
        $data['judul'] = 'Barang Keluar';
        $data['barang_keluar'] = $this->barangkeluar_model->getAllBarangKeluar();
        $data['role'] = $this->session->userdata('login_session')['role']; // Mengambil role dari session
        $this->load->view('templates/header', $data);
        $this->load->view('barang_keluar/index');
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Tambah Data Barang Keluar';


        $this->form_validation->set_rules('id_barang_keluar', 'ID Barang Keluar', 'required');
        $this->form_validation->set_rules('id_user', 'ID User', 'required');
        $this->form_validation->set_rules('tanggal_keluar', 'Tanggal Keluar', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('barang_keluar/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->barangkeluar_model->tambahDataBarangKeluar();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('barangkeluar');
        }
    }
    public function hapus($id_barang_keluar)
    {
        $data['judul'] = 'Hapus Data Barang Keluar';
        $data['role'] = $this->session->userdata('login_session')['role']; // Mengambil role dari session
        $this->barangkeluar_model->hapusDataBarangKeluar($id_barang_keluar);
        $this->session->set_flashdata('flash', 'Di hapus');
        redirect('barangkeluar');
    }

    public function edit($id_barang_keluar)
    {
        $data['judul'] = 'Ubah Data Barang keluar';
        $data['role'] = $this->session->userdata('login_session')['role']; // Mengambil role dari session
        $data['barang_keluar'] = $this->barangkeluar_model->getBarangKeluarById($id_barang_keluar);

        // Validasi input
        $this->form_validation->set_rules('id_barang_keluar', 'ID Barang Keluar', 'required');
        $this->form_validation->set_rules('id_user', 'ID User', 'required');
        $this->form_validation->set_rules('tanggal_keluar', 'Tanggal Keluar', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Menampilkan halaman edit jika ada kesalahan
            $this->load->view('templates/header', $data);
            $this->load->view('barang_keluar/edit', $data);
            $this->load->view('templates/footer');
        } else {
            // Memanggil model untuk memperbarui data supplier
            $this->barangkeluar_model->updateBarangKeluarById($id_barang_keluar);
            $this->session->set_flashdata('flash_success', 'Data barang berhasil diperbarui');
            redirect('barangkeluar');
        }
    }
}
