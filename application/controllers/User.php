<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class User extends CI_Controller {
    public function index()
    {
        $data['judul'] = 'User';
        $this->load->view('templates/header' , $data);
        $this->load->view('user/index');
        $this->load->view('templates/footer');
    }
}