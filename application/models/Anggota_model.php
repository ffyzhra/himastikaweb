<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota_model extends CI_Model {

    private $table = 'anggota';

    // ✅ Hitung semua anggota (untuk dashboard)
    public function countAll() {
        return $this->db->count_all($this->table);
    }

    // ✅ Ambil semua data anggota
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

    // ✅ Untuk fitur search & filter divisi
    public function get_filtered($search = null, $divisi = null) {
        if ($search) {
            $this->db->group_start()
                     ->like('nama', $search)
                     ->or_like('nim', $search)
                     ->or_like('jabatan', $search)
                     ->or_like('email', $search)
                     ->group_end();
        }

        if ($divisi && $divisi != 'all') {
            $this->db->where('divisi', $divisi);
        }

        return $this->db->get($this->table)->result();
    }

    public function get_divisi() {
        $this->db->select('divisi');
        $this->db->group_by('divisi');
        return $this->db->get($this->table)->result();
    }
}