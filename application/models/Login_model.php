<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{
    public function login($username, $password)
    {
        // Cek apakah username dan password sesuai
        $this->db->where('username', $username);
        $this->db->where('password', $password);  // Pastikan password sudah terenkripsi jika Anda menggunakan hashing
        $query = $this->db->get('user');

        // Jika data ditemukan, kembalikan data user
        if ($query->num_rows() == 1) {
            return $query->row_array(); // Kembalikan data dalam bentuk array
        }

        // Jika login gagal, kembalikan null
        return null;
    }
}
