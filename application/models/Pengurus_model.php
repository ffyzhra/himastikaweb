<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengurus_model extends CI_Model {
    private $table = 'pengurus';

    public function getByUsername($username) {
        return $this->db->where('username', $username)->get($this->table)->row();
    }
}