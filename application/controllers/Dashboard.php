<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model(['Anggota_model','Todo_model','Pendaftaran_model','Proker_model','Informasi_model','Intern_model','Galeri_model']);
    }

    public function index() {
        $data['totalAnggota']    = $this->Anggota_model->countAll();
        $data['totalTodo']       = $this->Todo_model->countAll();
        $data['totalPendaftar']  = $this->Pendaftaran_model->countAll();
        $data['totalProker']     = $this->Proker_model->countAll();
        $data['totalInformasi']  = $this->Informasi_model->countAll();
        $data['totalIntern']     = $this->Intern_model->countAll();
        $data['totalGaleri']     = $this->Galeri_model->countAll();

        $data['prokerSelesai']   = $this->db->where('status', 1)->count_all_results('proker');
        $data['pendingCount']    = $this->db->where('status', 'pending')->count_all_results('pendaftaran');
        $data['todoPending']     = $this->db->where('status', 'pending')->count_all_results('todos');

        // Data terbaru untuk list di dashboard
        $data['proker']      = $this->Proker_model->getLatest(4);
        $data['informasi']   = $this->Informasi_model->getLatest(3);
        $data['pendaftar']   = $this->db->order_by('tanggal_daftar', 'DESC')->limit(4)->get('pendaftaran')->result();

        $this->render('dashboard', $data, 'Dashboard', 'dashboard');
    }
}
