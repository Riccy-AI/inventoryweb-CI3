<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
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

        // Panggil fungsi login dari model
        $user = $this->Login_model->login($username, $password);

        if ($user) {
            // Set session user setelah login berhasil
            $this->session->set_userdata('login_session', [
                'id_user' => $user['id_user'],
                'username' => $user['username'],
                'nama' => $user['nama'],
                'role' => $user['role'],
                'is_logged_in' => true
            ]);
            redirect('home');
        } else {
            // Redirect ke login dengan pesan error jika login gagal
            $this->session->set_flashdata('error', 'Username atau Password salah');
            redirect('login');
        }
    }

    public function logout()
    {
        // Hapus session
        $this->session->unset_userdata('login_session');
        $this->session->sess_destroy();
        redirect('login');
    }
}
