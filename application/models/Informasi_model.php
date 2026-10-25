<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi_model extends CI_Model {

    private $table = 'informasi';

    // ✅ Ambil semua data informasi
    public function getAll() {
        return $this->db->get($this->table)->result();
    }

    // ✅ Ambil berdasarkan ID
    public function getById($id) {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    // ✅ Tambah data baru
    public function insert($data) {
        return $this->db->insert($this->table, $data);
    }

    // ✅ Update data
    public function update($id, $data) {
        return $this->db->where('id', $id)->update($this->table, $data);
    }

    // ✅ Hapus data
    public function delete($id) {
        return $this->db->where('id', $id)->delete($this->table);
    }

    // ✅ Ambil informasi terbaru untuk dashboard
    public function getLatest($limit = 3) {
        $this->db->order_by('tanggal', 'DESC');
        return $this->db->get($this->table, $limit)->result();
    }

    // ✅ Hitung total informasi
    public function countAll() {
        return $this->db->count_all($this->table);
    }
}