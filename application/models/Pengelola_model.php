<?php
class Pengelola_model extends CI_Model {
    public function get_all() {
        return $this->db->get('pengelola')->result();
    }

    public function get($id) {
        return $this->db->where('id', $id)->get('pengelola')->row();
    }

    public function insert($data) {
        return $this->db->insert('pengelola', $data);
    }

    public function update($id, $data) {
        return $this->db->where('id', $id)->update('pengelola', $data);
    }

    public function delete($id) {
        return $this->db->where('id', $id)->delete('pengelola');
    }
}