<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_model', 'barang_model'); // Load model barang
    }


    public function index()
    {
        $data['judul'] = 'Home Page';
        $data['barang'] = $this->barang_model->get_all_barang();
        $data['barang_by_category'] = $this->barang_model->get_barang_count_by_category();
        $this->load->view('templates/header', $data);
        $this->load->view('home/index');
        $this->load->view('templates/footer');
    }
}
