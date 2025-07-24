<?php
class Dashboard extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model(['Anggota_model','Todo_model','Pendaftaran_model','Proker_model','Informasi_model']);
    }

    public function index() {
        $data['totalAnggota']    = $this->Anggota_model->countAll();
        $data['totalTodo']       = $this->Todo_model->countAll();
        $data['totalPendaftar']  = $this->Pendaftaran_model->countAll();
        $data['totalProker']     = $this->Proker_model->countAll();
        $data['totalInformasi']  = $this->Informasi_model->countAll();

        // ✅ Ambil data terbaru untuk list di dashboard
        $data['proker']     = $this->Proker_model->getLatest(3);
        $data['informasi']  = $this->Informasi_model->getLatest(3);

        $this->load->view('dashboard', $data);
    }
}