<?php
$this->load->view('layouts/public_header', ['title' => 'Daftar Anggota · HIMASTIKA UEU', 'solid_nav' => false]);
$divisi = [
    'Sekretaris', 'Bendahara', 'Sinergi', 'Dukungan dan Solidaritas', 'Kajian Strategis',
    'Inovasi dan Prestasi', 'Kreativa dan Komunikasi', 'Relasi dan Kemitraan',
];
$admin = (bool) $this->session->userdata('logged_in');
?>
<section class="register-hero">
  <div class="wrap">
    <span class="pill"><?= icon('user-plus'); ?> Pendaftaran Anggota Baru</span>
    <h1>Gabung bersama HIMASTIKA</h1>
    <p>Isi data diri, pilih divisi, dan unggah KRS serta KHS terbarumu. Hanya butuh sekitar 3 menit.</p>
  </div>
</section>

<section class="register-body">
  <div class="wrap">
    <div class="register-card">
      <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-error" style="margin-bottom:18px"><?= icon('alert'); ?> <?= html_escape($this->session->flashdata('error')); ?></div>
      <?php endif; ?>

      <form action="<?= base_url('pendaftaran/store'); ?>" method="post" enctype="multipart/form-data" class="form-grid">
        <p class="form-section-title">1 · Data diri</p>
        <div class="field">
          <label for="nama">Nama Lengkap</label>
          <input class="input" type="text" id="nama" name="nama" placeholder="Sesuai KTM" required autocomplete="name">
        </div>
        <div class="form-grid cols-2">
          <div class="field">
            <label for="nim">NIM</label>
            <input class="input" type="text" id="nim" name="nim" placeholder="Contoh: 20240801001" required inputmode="numeric">
          </div>
          <div class="field">
            <label for="angkatan">Angkatan</label>
            <input class="input" type="number" id="angkatan" name="angkatan" placeholder="Contoh: <?= date('Y'); ?>" min="2000" max="<?= date('Y') + 1; ?>" required>
          </div>
        </div>
        <div class="form-grid cols-2">
          <div class="field">
            <label for="email">Email</label>
            <input class="input" type="email" id="email" name="email" placeholder="nama@email.com" required autocomplete="email">
          </div>
          <div class="field">
            <label for="no_telp">Nomor WhatsApp</label>
            <input class="input" type="tel" id="no_telp" name="no_telp" placeholder="08xxxxxxxxxx" required autocomplete="tel">
          </div>
        </div>

        <p class="form-section-title">2 · Pilihan divisi</p>
        <div class="field">
          <label for="divisi">Divisi yang diminati</label>
          <select class="select" id="divisi" name="divisi" required>
            <option value="">Pilih divisi</option>
            <?php foreach ($divisi as $d): ?>
              <option value="<?= html_escape($d); ?>"><?= html_escape($d); ?></option>
            <?php endforeach; ?>
          </select>
          <span class="hint">Belum yakin? Lihat penjelasan tiap divisi di <a href="<?= base_url(); ?>#divisi" target="_blank" rel="noopener">halaman depan</a>.</span>
        </div>
        <div class="field">
          <label for="alasan">Alasan bergabung</label>
          <textarea class="textarea" id="alasan" name="alasan" rows="4" placeholder="Ceritakan singkat kenapa kamu ingin bergabung dan apa yang ingin kamu kontribusikan" required></textarea>
        </div>

        <p class="form-section-title">3 · Berkas</p>
        <div class="form-grid cols-2">
          <label class="file-drop">
            <?= icon('upload'); ?>
            <div><strong>Upload KRS</strong><span>PDF, JPG atau PNG · maks. 2 MB</span></div>
            <input type="file" name="krs" accept=".pdf,.jpg,.jpeg,.png">
          </label>
          <label class="file-drop">
            <?= icon('upload'); ?>
            <div><strong>Upload KHS</strong><span>PDF, JPG atau PNG · maks. 2 MB</span></div>
            <input type="file" name="khs" accept=".pdf,.jpg,.jpeg,.png">
          </label>
        </div>

        <div class="form-actions" style="margin-top:14px">
          <a href="<?= $admin ? base_url('pendaftaran') : base_url(); ?>" class="btn btn-ghost"><?= icon('arrow-left'); ?> Kembali</a>
          <button type="submit" class="btn btn-primary btn-lg"><?= icon('check'); ?> Kirim Pendaftaran</button>
        </div>
      </form>
    </div>
  </div>
</section>

<?php $this->load->view('layouts/public_footer'); ?>
