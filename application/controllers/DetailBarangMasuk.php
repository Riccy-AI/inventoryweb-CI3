<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DetailBarangMasuk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DetailBarangMasuk_model', 'detailbarangmasuk_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Detail Barang Masuk';
        $data['detail_barang_masuk'] = $this->detailbarangmasuk_model->getAllDetailBarangMasuk();
        $data['role'] = $this->session->userdata('login_session')['role']; // Mengambil role dari session
        $this->load->view('templates/header', $data);
        $this->load->view('detail_barangmasuk/index');
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Tambah Data Detail Barang Masuk';
        $data['role'] = $this->session->userdata('login_session')['role']; // Mengambil role dari session


        $this->form_validation->set_rules('id_detail_barang_masuk', 'ID Detail Barang Masuk', 'required');
        $this->form_validation->set_rules('id_barang_masuk', 'ID Barang Masuk', 'required');
        $this->form_validation->set_rules('id_barang', 'ID Supplier', 'required');
        $this->form_validation->set_rules('jmlh_masuk', 'Jumlah Masuk', 'required');
        $this->form_validation->set_rules('harga_beli', 'Harga Beli', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('detail_barangmasuk/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->detailbarangmasuk_model->tambahDataDetailBarangMasuk();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('detailbarangmasuk');
        }
    }
    public function hapus($id_detail_barang_masuk)
    {

        $this->detailbarangmasuk_model->hapusDataDetailBarangMasuk($id_detail_barang_masuk);
        $this->session->set_flashdata('flash', 'Di hapus');
        redirect('detailbarangmasuk');
    }

    public function edit($id_detail_barang_masuk)
    {
        $data['judul'] = 'Edit Data Detail Barang Masuk';
        $data['role'] = $this->session->userdata('login_session')['role']; // Mengambil role dari session
        $data['detail_barang_masuk'] = $this->detailbarangmasuk_model->getDetailBarangMasukById($id_detail_barang_masuk);

        // Validasi input
        $this->form_validation->set_rules('id_detail_barang_masuk', 'ID Detail Barang Masuk', 'required');
        $this->form_validation->set_rules('id_barang_masuk', 'ID Barang Masuk', 'required');
        $this->form_validation->set_rules('id_barang', 'ID Supplier', 'required');
        $this->form_validation->set_rules('jmlh_masuk', 'Jumlah Masuk', 'required');
        $this->form_validation->set_rules('harga_beli', 'Harga Beli', 'required');


        if ($this->form_validation->run() == FALSE) {
            // Menampilkan halaman edit jika ada kesalahan
            $this->load->view('templates/header', $data);
            $this->load->view('detail_barangmasuk/edit', $data);
            $this->load->view('templates/footer');
        } else {
            // Memanggil model untuk memperbarui data supplier
            $this->detailbarangmasuk_model->updateDetailBarangMasukById($id_detail_barang_masuk);
            $this->session->set_flashdata('flash_success', 'Data berhasil diperbarui');
            redirect('detailbarangmasuk');
        }
    }
}
