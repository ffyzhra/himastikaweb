<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Public landing page of HIMASTIKA: profile, divisions, programmes,
 * announcements and board members. No login required.
 */
class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(['Anggota_model', 'Proker_model', 'Informasi_model']);
    }

    public function index() {
        $anggota = $this->Anggota_model->getAll();

        // Hitung anggota per divisi
        $per_divisi = [];
        foreach ($anggota as $a) {
            $d = trim($a->divisi);
            $per_divisi[$d] = isset($per_divisi[$d]) ? $per_divisi[$d] + 1 : 1;
        }

        // Pengurus inti: BPH + koordinator / PIC tiap divisi (tanpa data kontak)
        $pengurus = array_values(array_filter($anggota, function ($a) {
            return trim($a->divisi) === 'Badan Pengurus Harian'
                || in_array(strtolower(trim($a->jabatan)), ['koordinator', 'pic', 'ketua', 'wakil ketua'], true);
        }));

        // Program yang akan datang tampil duluan, lalu yang terlaksana dari yang terbaru
        $prokers = $this->Proker_model->getAll();
        usort($prokers, function ($a, $b) {
            if ((int) $a->status !== (int) $b->status) return (int) $a->status - (int) $b->status;
            return strcmp((string) $b->tanggal, (string) $a->tanggal);
        });

        $data = [
            'total_anggota' => count($anggota),
            'total_divisi'  => count($per_divisi),
            'total_proker'  => count($prokers),
            'proker_selesai'=> count(array_filter($prokers, function ($p) { return (int) $p->status === 1; })),
            'per_divisi'    => $per_divisi,
            'pengurus'      => $pengurus,
            'prokers'       => $prokers,
            'informasi'     => $this->Informasi_model->getLatest(3),
        ];

        $this->load->view('home/index', $data);
    }
}
