<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_model', 'barang_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Barang';
        $data['barang'] = $this->barang_model->get_all_barang();
        $this->load->view('templates/header', $data);
        $this->load->view('barang/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Tambah Data Barang';

        $this->form_validation->set_rules('id_barang', 'ID Barang', 'required');
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('jmlh_barang', 'Jumlah Barang', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('barang/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->barang_model->tambahDataBarang();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('barang');
        }
    }
    public function hapus($id_barang)
    {

        $this->barang_model->hapusDataBarang($id_barang);
        $this->session->set_flashdata('flash', 'Di hapus');
        redirect('barang');
    }

    public function edit($id_barang)
    {
        $data['judul'] = 'Edit Data Barang';
        $data['barang'] = $this->barang_model->getBarangById($id_barang);

        // Validasi input
        $this->form_validation->set_rules('id_barang', 'ID Barang', 'required');
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('jmlh_barang', 'Jumlah Barang', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Menampilkan halaman edit jika ada kesalahan
            $this->load->view('templates/header', $data);
            $this->load->view('barang/edit', $data);
            $this->load->view('templates/footer');
        } else {
            // Memanggil model untuk memperbarui data supplier
            $this->barang_model->getBarangById($id_barang);
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('barang');
        }
    }
}
