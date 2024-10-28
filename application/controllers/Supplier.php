<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Alias model sesuai dengan penulisan yang benar (huruf kecil di awal)
        $this->load->model('Supplier_model', 'supplier_model');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');
        
    }

    public function index()
    {
        $data['judul'] = 'Supplier';
        $data['supplier'] = $this->supplier_model->getAllSupplier();
        $this->load->view('templates/header', $data);
        $this->load->view('supplier/index' , $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
{
    $data['judul'] = 'Tambah Data Supplier';
    $this->form_validation->set_rules('id_supplier', 'ID Supplier', 'required');
    $this->form_validation->set_rules('nama_supplier', 'Nama Supplier', 'required');
    $this->form_validation->set_rules('alamat', 'Alamat Supplier', 'required');
    $this->form_validation->set_rules('cp', 'Nomor Supplier', 'required|numeric');


    if ($this->form_validation->run() == FALSE) {
        $this->load->view('templates/header', $data);
        $this->load->view('supplier/tambah');
        $this->load->view('templates/footer');
    } 

    else {
        $this->supplier_model->tambahDataSupplier(); 
        $this->session->set_flashdata('flash', 'Ditambahkan');
        redirect('supplier'); 
    }
}
}