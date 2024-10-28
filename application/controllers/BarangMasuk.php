<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BarangMasuk extends CI_Controller {
    public function index()
    {
        $data['judul'] = 'Barang Masuk';
        $this->load->view('templates/header' , $data);
        $this->load->view('barang_masuk/index');
        $this->load->view('templates/footer');
    }
}