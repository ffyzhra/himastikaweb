<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Intern_model extends CI_Model {

    private $table = 'intern';

    public function getAll() {
        return $this->db->order_by('divisi', 'ASC')->order_by('id', 'ASC')->get($this->table)->result();
    }

    public function getByDivisi($divisi) {
        return $this->db->where('divisi', $divisi)->get($this->table)->result();
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

    public function countAll() {
        return $this->db->count_all($this->table);
    }
}
