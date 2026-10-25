<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Todo_model extends CI_Model {

    public function getAll() {
        return $this->db->order_by('deadline', 'ASC')->get('todos')->result();
    }

    public function insert($data) {
        return $this->db->insert('todos', $data);
    }

    public function toggleStatus($id) {
        $todo = $this->getById($id);
        $newStatus = ($todo->status == 'pending') ? 'done' : 'pending';
        return $this->db->where('id', $id)->update('todos', ['status' => $newStatus]);
    }

    public function delete($id) {
        return $this->db->delete('todos', ['id' => $id]);
    }

    public function getById($id) {
        return $this->db->get_where('todos', ['id' => $id])->row();
    }

    public function update($id, $data) {
        return $this->db->where('id', $id)->update('todos', $data);
    }

    // ✅ Tambahkan ini untuk Dashboard
    public function countAll() {
        return $this->db->count_all('todos');
    }
}