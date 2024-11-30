<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Supplier_model', 'supplier_model');
        $this->load->library(['form_validation', 'session']);

        // Periksa login dan dapatkan role user
        if (!$this->session->userdata('login_session')) {
            redirect('login');
        }
        $this->role = $this->session->userdata('login_session')['role'];
    }

    public function index()
    {
        $data['judul'] = 'Supplier';
        $data['supplier'] = $this->supplier_model->getAllSupplier();
        $data['role'] = $this->session->userdata('login_session')['role']; // Mengambil role dari session
        $this->load->view('templates/header', $data);
        $this->load->view('supplier/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {

        if ($this->role !== '"admin"') {
            $this->session->set_flashdata('flash_error', 'Anda tidak memiliki akses untuk tambah data');
            redirect('supplier');
        }

        $data['judul'] = 'Tambah Data Supplier';

        $this->form_validation->set_rules('id_supplier', 'ID Supplier', 'required');
        $this->form_validation->set_rules('nama_supplier', 'Nama Supplier', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat Supplier', 'required');
        $this->form_validation->set_rules('cp', 'Nomor Supplier', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('supplier/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->supplier_model->tambahDataSupplier();
            $this->session->set_flashdata('flash_success', 'Data Supplier berhasil ditambahkan');
            redirect('supplier');
        }
    }

    public function hapus($id_supplier)
    {
        if ($this->role !== '"admin"' && $this->role !== '"staff"') {
            $this->session->set_flashdata('flash_error', 'Anda tidak memiliki akses untuk menghapus data');
            redirect('supplier');
        }

        $this->supplier_model->hapusDataSupplier($id_supplier);
        $this->session->set_flashdata('flash_success', 'Data Supplier berhasil dihapus');
        redirect('supplier');
    }

    public function edit($id_supplier)
    {

        if ($this->role !== '"admin"') {
            $this->session->set_flashdata('flash_error', 'Anda tidak memiliki akses untuk mengubah data');
            redirect('supplier');
        }

        $data['judul'] = 'Edit Data Supplier';
        $data['supplier'] = $this->supplier_model->getSupplierById($id_supplier);

        // Validasi input
        $this->form_validation->set_rules('id_supplier', 'ID Supplier', 'required');
        $this->form_validation->set_rules('nama_supplier', 'Nama Supplier', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat Supplier', 'required');
        $this->form_validation->set_rules('cp', 'Nomor Supplier', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            // Menampilkan halaman edit jika ada kesalahan
            $this->load->view('templates/header', $data);
            $this->load->view('supplier/edit', $data);
            $this->load->view('templates/footer');
        } else {
            // Memanggil model untuk memperbarui data supplier
            $this->supplier_model->getSupplierById($id_supplier);
            $this->session->set_flashdata('flash_success', 'Data Supplier berhasil diperbarui');
            redirect('supplier');
        }
    }
}
