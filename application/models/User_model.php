<?php
class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function check_login($username, $password) {
        // Ambil data user berdasarkan username
        $this->db->where('username', $username);
        $query = $this->db->get('pengurus'); // Ganti 'users' dengan nama tabel Anda jika berbeda

        if ($query->num_rows() == 1) {
            $user = $query->row();

            // Verifikasi password
            if (password_verify($password, $user->password)) {
                return $user; // Login berhasil
            }
        }

        return false; // Login gagal
    }
}