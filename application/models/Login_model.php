<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    public function login($username, $password) {
        // Cari user berdasarkan username dan password
        $this->db->where('username', $username);
        $this->db->where('password', $password); // Enkripsi password menggunakan MD5 (atau metode lain yang sesuai)
        $query = $this->db->get('user'); // Gantilah 'user' dengan nama tabel yang sesuai di database

        return $query->row(); // Mengembalikan data user jika ditemukan
    }
}
