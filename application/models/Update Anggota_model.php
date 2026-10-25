<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota_model extends CI_Model {

    private $table = 'anggota';

    public function getAll() {
        return $this->db->get($this->table)->result();
    }

    public function getById($id) {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    public function insert($data) {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data) {
        return $this->db->where('id', $id)->update($this->table, $data);
    }

    public function delete($id) {
        return $this->db->where('id', $id)->delete($this->table);
    }

    // ✅ Tambahan untuk dashboard
    public function countAll() {
        return $this->db->count_all($this->table);
    }
}