<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/** Admin: kelola foto dokumentasi (tampil di halaman publik /galeri dan di detail program kerja). */
class Dokumentasi extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(['Galeri_model', 'Proker_model']);
    }

    public function index() {
        $data['galeri']  = $this->Galeri_model->getAll();
        $data['prokers'] = $this->Proker_model->getAll();
        $this->render('dokumentasi/index', $data, 'Dokumentasi', 'dokumentasi');
    }

    public function store() {
        $foto = $this->upload_foto('foto', 'galeri');
        if (!$foto) {
            if ($foto === null) $this->session->set_flashdata('error', 'Pilih foto yang akan diunggah.');
            redirect('dokumentasi');
        }
        $this->Galeri_model->insert([
            'judul'     => $this->input->post('judul', TRUE) ?: 'Dokumentasi HIMASTIKA',
            'foto'      => $foto,
            'proker_id' => $this->input->post('proker_id') ?: null,
        ]);
        $this->session->set_flashdata('success', 'Foto dokumentasi berhasil ditambahkan.');
        redirect('dokumentasi');
    }

    public function delete($id) {
        $row = $this->Galeri_model->getById($id);
        if ($row) {
            $this->hapus_foto($row->foto);
            $this->Galeri_model->delete($id);
            $this->session->set_flashdata('success', 'Foto dokumentasi berhasil dihapus.');
        }
        redirect('dokumentasi');
    }
}
