<?php
class Dashboard_model extends CI_Model {

    public function getTotalAnggota() {
        return $this->db->count_all('anggota');
    }

    public function getTotalTodo() {
        if ($this->db->table_exists('todo')) {
            return $this->db->count_all('todo');
        } else {
            return 0;
        }
    }

    public function getTotalPendaftar() {
        return $this->db->count_all('pendaftar');
    }

    public function getTotalProker() {
        return $this->db->count_all('proker');
    }

    public function getTotalInformasi() {
        return $this->db->count_all('informasi');
    }

    public function getProkerAktif() {
        return $this->db->limit(3)->get('proker')->result();
    }

    public function getInformasiTerbaru() {
        return $this->db->order_by('created_at', 'DESC')->limit(3)->get('informasi')->result();
    }
}