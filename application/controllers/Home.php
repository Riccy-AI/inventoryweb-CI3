<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Supplier_model', 'supplier_model');
        $this->load->model('Barang_model', 'barang_model');
        $this->load->model('DetailBarangKeluar_model', 'detailbarangkeluar_model');
        $this->load->model('DetailBarangMasuk_model', 'detailbarangmasuk_model');
        $this->load->library('session');

        if (!$this->session->userdata('login_session')) {
            redirect('login');
        }
        $this->role = $this->session->userdata('login_session')['role'];
    }


    public function index()
    {
        $data['judul'] = 'Selamat Datang Di Inventory Notaris';
        $data['role'] = $this->session->userdata('login_session')['role'];
        $data['count_supplier'] = $this->supplier_model->countSupplier();
        $data['count_barang'] = $this->barang_model->countBarang();
        $data['count_detail_barang_keluar'] = $this->detailbarangkeluar_model->countDetailBarangKeluar();
        $data['total_detail_barang_keluar'] = $this->detailbarangkeluar_model->getTotalDetailBarangKeluar();
        $data['count_detail_barang_masuk'] = $this->detailbarangmasuk_model->countDetailBarangMasuk();
        $data['total_detail_barang_masuk'] = $this->detailbarangmasuk_model->getTotalDetailBarangMasuk();

        $this->load->view('templates/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer');
    }
}
