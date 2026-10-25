<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri_model extends CI_Model {

    private $table = 'galeri';

    public function getAll($limit = null) {
        $this->db->select('galeri.*, proker.judul AS proker_judul')
                 ->from($this->table)
                 ->join('proker', 'proker.id = galeri.proker_id', 'left')
                 ->order_by('galeri.id', 'DESC');
        if ($limit) $this->db->limit($limit);
        return $this->db->get()->result();
    }

    public function getByProker($proker_id) {
        return $this->db->where('proker_id', $proker_id)->get($this->table)->result();
    }

    public function getById($id) {
        return $this->db->where('id', $id)->get($this->table)->row();
    }

    public function insert($data) {
        return $this->db->insert($this->table, $data);
    }

    public function delete($id) {
        return $this->db->where('id', $id)->delete($this->table);
    }

    public function countAll() {
        return $this->db->count_all($this->table);
    }
}
