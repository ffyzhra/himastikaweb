<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proker_model extends CI_Model {

    public function getAll() {
        return $this->db->order_by('id', 'DESC')->get('proker')->result();
    }

    public function insert($data) {
        return $this->db->insert('proker', $data);
    }

    public function getById($id) {
        return $this->db->get_where('proker', ['id' => $id])->row();
    }

    public function update($id, $data) {
        return $this->db->where('id', $id)->update('proker', $data);
    }

    public function delete($id) {
        return $this->db->delete('proker', ['id' => $id]);
    }

    public function countAll() {
        return $this->db->count_all('proker');
    }

    // ✅ Tambahkan method ini untuk dashboard
    public function getLatest($limit = 5) {
        return $this->db->order_by('tanggal', 'DESC')
                        ->limit($limit)
                        ->get('proker')
                        ->result();
    }
}