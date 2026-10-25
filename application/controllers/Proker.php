<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proker extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Proker_model');
        $this->load->helper(['form', 'url']);
    }

    // ✅ List Semua Proker
    public function index() {
        $data['prokers'] = $this->Proker_model->getAll();
        $this->load->view('proker/index', $data);
    }

    // ✅ Tampilkan Form Tambah
    public function create() {
        $this->load->view('proker/create');
    }

    // ✅ Simpan Data Baru
    public function store() {
        $data = [
            'judul' => $this->input->post('judul', TRUE),
            'deskripsi' => $this->input->post('deskripsi', TRUE),
            'tanggal' => $this->input->post('tanggal', TRUE),
            'status' => 0 // default belum selesai
        ];

        if ($this->Proker_model->insert($data)) {
            redirect('proker');
        } else {
            echo "Gagal menambahkan data!";
        }
    }

    // ✅ Tampilkan Form Edit
    public function edit($id) {
        $data['proker'] = $this->Proker_model->getById($id);
        if (!$data['proker']) {
            show_404();
        }
        $this->load->view('proker/edit', $data);
    }

    // ✅ Update Data
    public function update($id) {
        $data = [
            'judul' => $this->input->post('judul', TRUE),
            'deskripsi' => $this->input->post('deskripsi', TRUE),
            'tanggal' => $this->input->post('tanggal', TRUE)
        ];

        if ($this->Proker_model->update($id, $data)) {
            redirect('proker');
        } else {
            echo "Gagal update data!";
        }
    }

    // ✅ Update Status (AJAX)
    public function update_status($id) {
        $status = $this->input->post('status');
        if ($this->Proker_model->update($id, ['status' => $status])) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false]);
        }
    }

    // ✅ Hapus Data
    public function delete($id) {
        if ($this->Proker_model->delete($id)) {
            redirect('proker');
        } else {
            echo "Gagal hapus data!";
        }
    }
}