<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DetailBarangKeluar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DetailBarangKeluar_model', 'detailbarangkeluar_model');
        $this->load->model('BarangKeluar_model', 'barangkeluar_model');
        $this->load->library('form_validation', 'session');
    }

    public function index()
    {
        $data['judul'] = 'Detail Barang Keluar';
        $data['barang_keluar'] = $this->barangkeluar_model->getAllBarangKeluar();
        $data['detail_barang_keluar'] = $this->detailbarangkeluar_model->getAllDetailBarangKeluar();
        $data['role'] = $this->session->userdata('login_session')['role']; // Mengambil role dari session
        $this->load->view('templates/header', $data);
        $this->load->view('detail_barangkeluar/index');
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Tambah Data Detail Barang Keluar';
        $data['role'] = $this->session->userdata('login_session')['role']; // Mengambil role dari session
        $data['barang_keluar'] = $this->barangkeluar_model->getAllBarangKeluar();
        $data['detail_barang_keluar'] = $this->detailbarangkeluar_model->getAllDetailBarangKeluar();


        $this->form_validation->set_rules('id_detail_barang_keluar', 'ID Detail Barang Keluar', 'required');
        $this->form_validation->set_rules('id_barang', 'ID Barang', 'required');
        $this->form_validation->set_rules('id_barang_keluar', 'ID Barang Keluar', 'required');
        $this->form_validation->set_rules('jmlh_keluar', 'Jumlah Keluar', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('detail_barangkeluar/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->detailbarangkeluar_model->tambahDataDetailBarangKeluar();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('detailbarangkeluar');
        }
    }
    public function hapus($id_detail_barang_keluar)
    {

        $this->detailbarangkeluar_model->hapusDataDetailBarangKeluar($id_detail_barang_keluar);
        $this->session->set_flashdata('flash', 'Di hapus');
        redirect('detailbarangkeluar');
    }

    public function edit($id_detail_barang_keluar)
    {
        $data['judul'] = 'Edit Data Detail Barang Keluar';
        $data['role'] = $this->session->userdata('login_session')['role']; // Mengambil role dari session
        $data['detail_barang_keluar'] = $this->detailbarangkeluar_model->getDetailBarangKeluarById($id_detail_barang_keluar);

        // Validasi input

        $this->form_validation->set_rules('id_detail_barang_keluar', 'ID Detail Barang Keluar', 'required');
        $this->form_validation->set_rules('id_barang', 'ID Barang', 'required');
        $this->form_validation->set_rules('id_barang_keluar', 'ID Barang Keluar', 'required');
        $this->form_validation->set_rules('jmlh_keluar', 'Jumlah Keluar', 'required');


        if ($this->form_validation->run() == FALSE) {
            // Menampilkan halaman edit jika ada kesalahan
            $this->load->view('templates/header', $data);
            $this->load->view('detail_barangkeluar/edit', $data);
            $this->load->view('templates/footer');
        } else {
            // Memanggil model untuk memperbarui data supplier
            $this->detailbarangkeluar_model->updateDetailBarangKeluarById($id_detail_barang_keluar);
            $this->session->set_flashdata('flash_success', 'Data barang berhasil diperbarui');
            redirect('detailbarangkeluar');
        }
    }
}
