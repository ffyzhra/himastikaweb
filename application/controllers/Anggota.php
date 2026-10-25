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

    private function form_data() {
        return [
            'nama'    => $this->input->post('nama', TRUE),
            'nim'     => $this->input->post('nim', TRUE),
            'jabatan' => $this->input->post('jabatan', TRUE),
            'divisi'  => $this->input->post('divisi', TRUE),
            'no_telp' => $this->input->post('no_telp', TRUE) ?: null,
            'email'   => $this->input->post('email', TRUE) ?: null,
        ];
    }

    public function create() {
        if ($this->input->post()) {
            $data = $this->form_data();
            $foto = $this->upload_foto('foto', 'anggota');
            if ($foto === false) redirect('anggota/create');
            if ($foto) $data['foto'] = $foto;

            $this->Anggota_model->insert($data);
            $this->session->set_flashdata('success', 'Anggota berhasil ditambahkan.');
            redirect('anggota');
        }
        $this->render('anggota/form', [], 'Tambah Anggota', 'anggota');
    }

    public function edit($id) {
        $row = $this->Anggota_model->getById($id);
        if (!$row) show_404();

        if ($this->input->post()) {
            $data = $this->form_data();
            $foto = $this->upload_foto('foto', 'anggota');
            if ($foto === false) redirect('anggota/edit/' . $id);
            if ($foto) {
                $this->hapus_foto($row->foto);
                $data['foto'] = $foto;
            }

            $this->Anggota_model->update($id, $data);
            $this->session->set_flashdata('success', 'Data anggota berhasil diperbarui.');
            redirect('anggota');
        }
        $this->render('anggota/form', ['row' => $row], 'Edit Anggota', 'anggota');
    }

    public function delete($id) {
        $row = $this->Anggota_model->getById($id);
        if ($row) {
            $this->hapus_foto($row->foto);
            $this->Anggota_model->delete($id);
            $this->session->set_flashdata('success', 'Anggota berhasil dihapus.');
        }
        redirect('anggota');
    }
}
