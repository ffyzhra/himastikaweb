<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library(['session']);
        $this->load->helper(['url', 'form']);

        // ✅ Proteksi hanya admin yang boleh akses
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') !== 'admin') {
            redirect('login');
        }
    }

    // ✅ Daftar semua user
    public function index() {
        $data['users'] = $this->User_model->getAll();
        $this->load->view('user/index', $data);
    }

    // ✅ Form tambah user
    public function create() {
        if ($this->input->method() === 'post') {
            $data = [
                'nama' => $this->input->post('nama', TRUE),
                'username' => $this->input->post('username', TRUE),
                'password' => $this->input->post('password', TRUE),
                'role' => $this->input->post('role', TRUE)
            ];

            if ($this->User_model->insert($data)) {
                $this->session->set_flashdata('success', 'User berhasil ditambahkan');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan user');
            }
            redirect('user');
        }

        $this->load->view('user/create');
    }

    // ✅ Form edit user
    public function edit($id) {
        $data['user'] = $this->User_model->getById($id);
        if (!$data['user']) {
            show_404();
        }

        if ($this->input->method() === 'post') {
            $username = $this->input->post('username', TRUE);
            $password = $this->input->post('password', TRUE);
            $role = $this->input->post('role', TRUE);

            if ($this->User_model->update_credentials($id, $username, $password)) {
                $this->db->where('id', $id)->update('users', ['role' => $role]);
                $this->session->set_flashdata('success', 'User berhasil diupdate');
            } else {
                $this->session->set_flashdata('error', 'Gagal mengupdate user');
            }
            redirect('user');
        }

        $this->load->view('user/edit', $data);
    }

    // ✅ Hapus user
    public function delete($id) {
        if ($this->db->where('id', $id)->delete('users')) {
            $this->session->set_flashdata('success', 'User berhasil dihapus');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus user');
        }
        redirect('user');
    }
}