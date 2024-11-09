<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BarangMasuk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('BarangMasuk_model', 'barangmasuk_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Barang Masuk';
        $data['barang_masuk'] = $this->barangmasuk_model->getAllBarangMasuk();
        $this->load->view('templates/header', $data);
        $this->load->view('barang_masuk/index');
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Tambah Data Barang Masuk';

        $this->form_validation->set_rules('id_barang_masuk', 'ID Barang Masuk', 'required');
        $this->form_validation->set_rules('id_user', 'ID User', 'required');
        $this->form_validation->set_rules('id_supplier', 'ID Supplier', 'required');
        $this->form_validation->set_rules('tanggal_masuk', 'Tanggal Masuk', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('barang_masuk/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->barangmasuk_model->tambahDataBarangMasuk();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('barangmasuk');
        }
    }
    public function hapus($id_barang_masuk)
    {

        $this->barangmasuk_model->hapusDataBarangMasuk($id_barang_masuk);
        $this->session->set_flashdata('flash', 'Di hapus');
        redirect('barangmasuk');
    }

    public function edit($id_barang_masuk)
    {
        $data['judul'] = 'Edit Data Barang Masuk';
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
            $this->barangmasuk_model->getBarangMasukById($id_barang_masuk);
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('barangmasuk');
        }
    }
}
