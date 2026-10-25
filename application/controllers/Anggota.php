<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends Admin_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Anggota_model');
    }

    public function index() {
    $search = $this->input->get('search');
    $divisi = $this->input->get('divisi');

    $data['anggota'] = $this->Anggota_model->get_filtered($search, $divisi);
    $data['divisi_list'] = $this->Anggota_model->get_divisi(); // untuk dropdown filter
    $this->render('anggota/index', $data, 'Anggota', 'anggota');
}

    public function create() {
        if($this->input->post()){
            $data = [
                'nama'    => $this->input->post('nama'),
                'nim'     => $this->input->post('nim'),
                'jabatan' => $this->input->post('jabatan'),
                'divisi'  => $this->input->post('divisi'),
                'no_telp' => $this->input->post('no_telp'),
                'email'   => $this->input->post('email')
            ];
            $this->Anggota_model->insert($data);
            $this->session->set_flashdata('success', 'Anggota berhasil ditambahkan.');
            redirect('anggota');
        }
        $this->render('anggota/form', [], 'Tambah Anggota', 'anggota');
    }

    public function edit($id) {
        if($this->input->post()){
            $data = [
                'nama'    => $this->input->post('nama'),
                'nim'     => $this->input->post('nim'),
                'jabatan' => $this->input->post('jabatan'),
                'divisi'  => $this->input->post('divisi'),
                'no_telp' => $this->input->post('no_telp'),
                'email'   => $this->input->post('email')
            ];
            $this->Anggota_model->update($id, $data);
            $this->session->set_flashdata('success', 'Data anggota berhasil diperbarui.');
            redirect('anggota');
        }
        $data['row'] = $this->Anggota_model->getById($id);
        if (!$data['row']) show_404();
        $this->render('anggota/form', $data, 'Edit Anggota', 'anggota');
    }

    public function delete($id) {
        $this->Anggota_model->delete($id);
        $this->session->set_flashdata('success', 'Anggota berhasil dihapus.');
        redirect('anggota');
    }
}