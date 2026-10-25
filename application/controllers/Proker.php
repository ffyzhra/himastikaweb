<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proker extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Proker_model');
        $this->load->helper(['form', 'url']);
    }

    // ✅ List Semua Proker
    public function index() {
        $data['prokers'] = $this->Proker_model->getAll();
        $this->render('proker/index', $data, 'Program Kerja', 'proker');
    }

    // ✅ Tampilkan Form Tambah
    public function create() {
        $this->render('proker/create', [], 'Tambah Program Kerja', 'proker');
    }

    // ✅ Simpan Data Baru
    public function store() {
        $data = [
            'judul' => $this->input->post('judul', TRUE),
            'deskripsi' => $this->input->post('deskripsi', TRUE),
            'tanggal' => $this->input->post('tanggal', TRUE) ?: null, // kosong = tanggal menyusul
            'status' => 0 // default belum selesai
        ];

        if ($this->Proker_model->insert($data)) {
            $this->session->set_flashdata('success', 'Program kerja berhasil ditambahkan.');
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
        $this->render('proker/edit', $data, 'Edit Program Kerja', 'proker');
    }

    // ✅ Update Data
    public function update($id) {
        $data = [
            'judul' => $this->input->post('judul', TRUE),
            'deskripsi' => $this->input->post('deskripsi', TRUE),
            'tanggal' => $this->input->post('tanggal', TRUE) ?: null
        ];

        if ($this->Proker_model->update($id, $data)) {
            $this->session->set_flashdata('success', 'Program kerja berhasil diperbarui.');
            redirect('proker');
        } else {
            echo "Gagal update data!";
        }
    }

    // ✅ Update Status (AJAX)
    public function update_status($id) {
        $status = $this->input->post('status') ? 1 : 0;
        if ($this->Proker_model->update($id, ['status' => $status])) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false]);
        }
    }

    // ✅ Hapus Data
    public function delete($id) {
        if ($this->Proker_model->delete($id)) {
            $this->session->set_flashdata('success', 'Program kerja berhasil dihapus.');
            redirect('proker');
        } else {
            echo "Gagal hapus data!";
        }
    }
}