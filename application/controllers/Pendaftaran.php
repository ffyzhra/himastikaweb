<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Dompdf\Dompdf;
use Dompdf\Options;

class Pendaftaran extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Pendaftaran_model');
        $this->load->helper(['form', 'url']);
        $this->load->library(['session', 'upload']);
    }

    // ✅ Tampilkan daftar pendaftar
    public function index() {
    // Ambil input dari query string (GET)
    $search = $this->input->get('search');
    $divisi = $this->input->get('divisi');

    // Load model tambahan untuk daftar divisi
    $this->load->model('Anggota_model');

    // Ambil data divisi untuk dropdown filter
    $data['divisi_list'] = $this->Anggota_model->get_divisi();

    // Ambil data pendaftar sesuai filter
    $data['pendaftaran'] = $this->Pendaftaran_model->get_filtered($search, $divisi);

    $this->load->view('pendaftaran/list', $data);
}

    // ✅ Form tambah pendaftar
    public function form() {
        $this->load->view('pendaftaran/form');
    }

    // ✅ Simpan data pendaftaran
    public function store() {
        $config = [
            'upload_path' => './uploads/',
            'allowed_types' => 'jpg|jpeg|png|pdf',
            'max_size' => 2048,
            'encrypt_name' => TRUE
        ];

        $krs = '';
        $khs = '';

        // Upload KRS
        if (!empty($_FILES['krs']['name'])) {
            $this->upload->initialize($config);
            if ($this->upload->do_upload('krs')) {
                $krs = $this->upload->data('file_name');
            }
        }

        // Upload KHS
        if (!empty($_FILES['khs']['name'])) {
            $this->upload->initialize($config);
            if ($this->upload->do_upload('khs')) {
                $khs = $this->upload->data('file_name');
            }
        }

        // Ambil input
       $data = [
    'nama' => $this->input->post('nama', TRUE),
    'email' => $this->input->post('email', TRUE),
    'no_telp' => $this->input->post('no_telp', TRUE),
    'nim' => $this->input->post('nim', TRUE),
    'angkatan' => $this->input->post('angkatan', TRUE),
    'divisi' => $this->input->post('divisi', TRUE),
    'alasan' => $this->input->post('alasan', TRUE),
    'krs' => $krs,
    'khs' => $khs,
    'status' => 'pending',
    'tanggal_daftar' => date('Y-m-d H:i:s')
];
        if ($this->Pendaftaran_model->insert($data)) {
            $this->session->set_flashdata('success', 'Pendaftaran berhasil disimpan!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menyimpan data!');
        }

        redirect('pendaftaran');
    }

    // ✅ Update status (Terima/Tolak)
    public function update_status($id, $status) {
        if (in_array($status, ['diterima', 'ditolak'])) {
            $this->Pendaftaran_model->update($id, ['status' => $status]);
        }
        redirect('pendaftaran');
    }

    // ✅ Hapus data pendaftar
    public function delete($id) {
        $detail = $this->Pendaftaran_model->getById($id);
        if ($detail) {
            if (!empty($detail->krs) && file_exists('./uploads/'.$detail->krs)) unlink('./uploads/'.$detail->krs);
            if (!empty($detail->khs) && file_exists('./uploads/'.$detail->khs)) unlink('./uploads/'.$detail->khs);
            $this->Pendaftaran_model->delete($id);
        }
        redirect('pendaftaran');
    }
}