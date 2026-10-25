<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran_model extends CI_Model {

    private $table = 'pendaftaran';

    public function getAll() {
        return $this->db->get($this->table)->result();
    }

    public function getById($id) {
        return $this->db->where('id', $id)->get($this->table)->row();
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

    // ✅ Method filter search dan divisi
    public function get_filtered($search = null, $divisi = null) {
        if ($search) {
            $this->db->group_start()
                     ->like('nama', $search)
                     ->or_like('email', $search)
                     ->or_like('nim', $search)
                     ->group_end();
        }

        if ($divisi && $divisi != 'all') {
            $this->db->where('divisi', $divisi);
        }

        return $this->db->get($this->table)->result();
    }

    public function countAll() {
    return $this->db->count_all($this->table);
}

}