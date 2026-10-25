<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/** Admin: kelola Staff Intern (tampil di halaman publik /staff-intern). */
class Intern extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Intern_model');
    }

    public function index() {
        $data['interns'] = $this->Intern_model->getAll();
        $this->render('intern/index', $data, 'Staff Intern', 'intern');
    }

    public function create() {
        if ($this->input->post()) {
            $data = [
                'nama'   => $this->input->post('nama', TRUE),
                'divisi' => $this->input->post('divisi', TRUE),
            ];
            $foto = $this->upload_foto('foto', 'intern');
            if ($foto === false) redirect('intern/create');
            if ($foto) $data['foto'] = $foto;

            $this->Intern_model->insert($data);
            $this->session->set_flashdata('success', 'Staff intern berhasil ditambahkan.');
            redirect('intern');
        }
        $this->render('intern/form', [], 'Tambah Staff Intern', 'intern');
    }

    public function edit($id) {
        $row = $this->Intern_model->getById($id);
        if (!$row) show_404();

        if ($this->input->post()) {
            $data = [
                'nama'   => $this->input->post('nama', TRUE),
                'divisi' => $this->input->post('divisi', TRUE),
            ];
            $foto = $this->upload_foto('foto', 'intern');
            if ($foto === false) redirect('intern/edit/' . $id);
            if ($foto) {
                $this->hapus_foto($row->foto);
                $data['foto'] = $foto;
            }
            $this->Intern_model->update($id, $data);
            $this->session->set_flashdata('success', 'Data staff intern berhasil diperbarui.');
            redirect('intern');
        }
        $this->render('intern/form', ['row' => $row], 'Edit Staff Intern', 'intern');
    }

    public function delete($id) {
        $row = $this->Intern_model->getById($id);
        if ($row) {
            $this->hapus_foto($row->foto);
            $this->Intern_model->delete($id);
            $this->session->set_flashdata('success', 'Staff intern berhasil dihapus.');
        }
        redirect('intern');
    }
}
