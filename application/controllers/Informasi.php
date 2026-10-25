<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi extends Admin_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Informasi_model');
    }

    public function index(){
        $data['informasi'] = $this->Informasi_model->getAll();
        $this->render('informasi/index', $data, 'Informasi', 'informasi');
    }

    public function create(){
        $this->render('informasi/form', [], 'Tambah Informasi', 'informasi');
    }

    public function store(){
        $this->Informasi_model->insert([
            'judul' => $this->input->post('judul'),
            'deskripsi' => $this->input->post('deskripsi'),
            'tanggal' => $this->input->post('tanggal')
        ]);
        $this->session->set_flashdata('success', 'Informasi berhasil dipublikasikan.');
        redirect('informasi');
    }

    public function edit($id){
        $data['informasi'] = $this->Informasi_model->getById($id);
        if (!$data['informasi']) show_404();
        $this->render('informasi/form', $data, 'Edit Informasi', 'informasi');
    }

    public function update($id){
        $this->Informasi_model->update($id, [
            'judul' => $this->input->post('judul'),
            'deskripsi' => $this->input->post('deskripsi'),
            'tanggal' => $this->input->post('tanggal')
        ]);
        $this->session->set_flashdata('success', 'Informasi berhasil diperbarui.');
        redirect('informasi');
    }

    public function delete($id){
        $this->Informasi_model->delete($id);
        $this->session->set_flashdata('success', 'Informasi berhasil dihapus.');
        redirect('informasi');
    }
}