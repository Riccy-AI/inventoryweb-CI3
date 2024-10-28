<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Login_model');
        $this->load->library('session');
    }

    public function index()
    {

        $data['judul'] = 'Login';
        $this->load->view('templates/header_login', $data);
        $this->load->view('login/index');
        $this->load->view('templates/footer_login');
    }
    public function login()
    {
        // Ambil data dari form
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // Panggil fungsi dari model untuk cek login
        $user = $this->Login_model->login($username, $password);

        if ($user) {
            // Set session dan redirect ke halaman home
            $this->session->set_userdata('user', $user);
            redirect('home');
        } else {
            // Redirect ke login dengan pesan error
            $this->session->set_flashdata('error', 'Username atau Password salah');
            redirect('login');
        }
    }
}
