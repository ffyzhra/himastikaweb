<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Anggota_model');
        if(!$this->session->userdata('logged_in')) redirect('login');
    }

    public function index() {
    $search = $this->input->get('search');
    $divisi = $this->input->get('divisi');

    $data['anggota'] = $this->Anggota_model->get_filtered($search, $divisi);
    $data['divisi_list'] = $this->Anggota_model->get_divisi(); // untuk dropdown filter
    $this->load->view('anggota/index', $data);
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
            redirect('anggota');
        }
        $this->load->view('anggota/form');
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
            redirect('anggota');
        }
        $data['row'] = $this->Anggota_model->getById($id);
        $this->load->view('anggota/form', $data);
    }

    public function delete($id) {
        $this->Anggota_model->delete($id);
        redirect('anggota');
    }
}