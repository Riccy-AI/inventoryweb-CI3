<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_model', 'barang_model');
    }

    public function index()
    {
        $data['judul'] = 'Barang';
        $data['barang'] = $this->barang_model->get_all_barang();
        $this->load->view('templates/header', $data);
        $this->load->view('barang/index', $data);
        $this->load->view('templates/footer');
    }
}
