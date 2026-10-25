<?php
class Informasi extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Informasi_model');
    }

    public function index(){
        $data['informasi'] = $this->Informasi_model->getAll();
        $this->load->view('informasi/index', $data);
    }

    public function create(){
        $this->load->view('informasi/form');
    }

    public function store(){
        $this->Informasi_model->insert([
            'judul' => $this->input->post('judul'),
            'deskripsi' => $this->input->post('deskripsi'),
            'tanggal' => $this->input->post('tanggal')
        ]);
        redirect('informasi');
    }

    public function edit($id){
        $data['informasi'] = $this->Informasi_model->getById($id);
        $this->load->view('informasi/form', $data);
    }

    public function update($id){
        $this->Informasi_model->update($id, [
            'judul' => $this->input->post('judul'),
            'deskripsi' => $this->input->post('deskripsi'),
            'tanggal' => $this->input->post('tanggal')
        ]);
        redirect('informasi');
    }

    public function delete($id){
        $this->Informasi_model->delete($id);
        redirect('informasi');
    }
}