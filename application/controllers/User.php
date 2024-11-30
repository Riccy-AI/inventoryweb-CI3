<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model'); // Load model login
        $this->load->library('session');
    }

    public function login()
    {
        // Ambil data dari form
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // Panggil fungsi dari model untuk cek login
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

            // Redirect ke halaman home
            redirect('home');
        } else {
            // Set pesan error dan redirect ke login
            $this->session->set_flashdata('error', 'Username atau Password salah');
            redirect('login');
        }
    }

    public function logout()
    {
        // Hapus semua session dan redirect ke halaman login
        $this->session->unset_userdata('login_session');
        $this->session->sess_destroy();
        redirect('login');
    }

    public function check_session()
    {
        // Cek apakah session login ada
        if (!$this->session->userdata('login_session')) {
            // Redirect ke halaman login jika belum login
            redirect('login');
        }
    }
}
