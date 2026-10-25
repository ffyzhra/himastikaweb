<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Public website of HIMASTIKA: landing page, cabinet, divisions,
 * work programmes, staff intern and gallery. No login required.
 */
class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(['Anggota_model', 'Proker_model', 'Informasi_model', 'Intern_model', 'Galeri_model']);
    }

    /** Render a public page with the shared header/footer. */
    private function page($view, $data, $title, $active) {
        $data['title']  = $title ? $title . ' · HIMASTIKA UEU' : 'HIMASTIKA UEU · Himpunan Mahasiswa Teknik Informatika';
        $data['active'] = $active;
        $this->load->view('layouts/public_header', $data);
        $this->load->view($view, $data);
        $this->load->view('layouts/public_footer', $data);
    }

    /** Members grouped by division slug, in the order of config/himastika.php. */
    private function anggota_per_divisi() {
        $grouped = [];
        foreach ($this->config->item('divisi') as $slug => $d) $grouped[$slug] = [];
        foreach ($this->Anggota_model->getAll() as $a) {
            $slug = divisi_slug($a->divisi);
            if ($slug) $grouped[$slug][] = $a;
        }
        return $grouped;
    }

    /** Programmes: upcoming first, then the most recent ones. */
    private function prokers_sorted() {
        $prokers = $this->Proker_model->getAll();
        usort($prokers, function ($a, $b) {
            if ((int) $a->status !== (int) $b->status) return (int) $a->status - (int) $b->status;
            return strcmp((string) $b->tanggal, (string) $a->tanggal);
        });
        return $prokers;
    }

    public function index() {
        $per_divisi = $this->anggota_per_divisi();
        $prokers    = $this->prokers_sorted();
        $anggota    = array_merge(...array_values($per_divisi));

        $data = [
            'per_divisi'     => $per_divisi,
            'anggota'        => $anggota,
            'total_anggota'  => count($anggota),
            'total_intern'   => $this->Intern_model->countAll(),
            'total_proker'   => count($prokers),
            'proker_selesai' => count(array_filter($prokers, function ($p) { return (int) $p->status === 1; })),
            'prokers'        => array_slice($prokers, 0, 6),
            'informasi'      => $this->Informasi_model->getLatest(3),
            'interns'        => $this->Intern_model->getAll(),
            'galeri'         => $this->Galeri_model->getAll(8),
        ];
        $this->page('home/index', $data, '', 'home');
    }

    public function pengurus() {
        $data['per_divisi'] = $this->anggota_per_divisi();
        $this->page('home/pengurus', $data, 'Pengurus', 'pengurus');
    }

    public function divisi($slug = '') {
        $all = $this->config->item('divisi');
        if (!isset($all[$slug])) show_404();

        $div = $all[$slug];
        $per_divisi = $this->anggota_per_divisi();
        $interns = array_filter($this->Intern_model->getAll(), function ($i) use ($div, $slug) {
            return divisi_slug($i->divisi) === $slug
                || ($slug === 'bph' && in_array(strtolower($i->divisi), ['bendahara', 'sekretaris'], true));
        });
        $data = [
            'slug'    => $slug,
            'div'     => $div,
            'anggota' => $per_divisi[$slug],
            'interns' => array_values($interns),
            'lainnya' => array_diff_key($all, [$slug => 1]),
            'proker_db' => $this->proker_by_id(),
        ];
        $this->page('home/divisi', $data, 'Divisi ' . $div['nama'], 'divisi');
    }

    public function proker_list() {
        $prokers = $this->prokers_sorted();
        $data = [
            'prokers'        => $prokers,
            'total_proker'   => count($prokers),
            'proker_selesai' => count(array_filter($prokers, function ($p) { return (int) $p->status === 1; })),
        ];
        $this->page('home/proker_list', $data, 'Program Kerja', 'proker');
    }

    public function proker_detail($id = 0) {
        $proker = $this->Proker_model->getById((int) $id);
        if (!$proker) show_404();

        $lainnya = array_values(array_filter($this->prokers_sorted(), function ($p) use ($proker) { return $p->id != $proker->id; }));
        $data = [
            'proker'  => $proker,
            'foto'    => $this->Galeri_model->getByProker($proker->id),
            'lainnya' => array_slice($lainnya, 0, 3),
        ];
        $this->page('home/proker_detail', $data, $proker->judul, 'proker');
    }

    public function intern() {
        $grouped = [];
        foreach ($this->Intern_model->getAll() as $i) $grouped[$i->divisi][] = $i;
        $data['grouped'] = $grouped;
        $data['total']   = $this->Intern_model->countAll();
        $data['divs']    = $this->config->item('divisi');
        $data['proker_db'] = $this->proker_by_id();
        $this->page('home/intern', $data, 'Staff Intern', 'intern');
    }

    // Program kerja di database, di-index per id (untuk contoh proker di halaman divisi)
    private function proker_by_id() {
        $out = [];
        foreach ($this->Proker_model->getAll() as $p) $out[(int) $p->id] = $p;
        return $out;
    }

    public function galeri() {
        $data['galeri'] = $this->Galeri_model->getAll();
        $this->page('home/galeri', $data, 'Galeri', 'galeri');
    }
}
