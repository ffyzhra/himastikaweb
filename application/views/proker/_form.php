<?php $edit = isset($proker); ?>
<div class="card card-narrow">
  <div class="card-head">
    <div>
      <h2><?= $edit ? 'Edit Program Kerja' : 'Program Kerja Baru'; ?></h2>
      <p>Program kerja tampil di halaman depan website HIMASTIKA.</p>
    </div>
  </div>
  <div class="card-body">
    <form action="<?= $edit ? base_url('proker/update/' . $proker->id) : base_url('proker/store'); ?>" method="post" class="form-grid">
      <div class="field">
        <label for="judul">Nama Program</label>
        <input class="input" type="text" id="judul" name="judul" placeholder="Contoh: Seminar Teknologi 2025" required
               value="<?= html_escape($edit ? $proker->judul : ''); ?>">
      </div>
      <div class="field">
        <label for="deskripsi">Keterangan</label>
        <textarea class="textarea" id="deskripsi" name="deskripsi" rows="4" placeholder="Tujuan, sasaran, atau ringkasan kegiatan"><?= html_escape($edit ? $proker->deskripsi : ''); ?></textarea>
      </div>
      <div class="field" style="max-width:260px">
        <label for="tanggal">Tanggal Pelaksanaan</label>
        <input class="input" type="date" id="tanggal" name="tanggal" value="<?= html_escape($edit ? (string) $proker->tanggal : ''); ?>">
        <span class="hint">Kosongkan jika tanggal belum ditentukan.</span>
      </div>
      <div class="form-actions">
        <a href="<?= base_url('proker'); ?>" class="btn btn-ghost"><?= icon('arrow-left'); ?> Kembali</a>
        <button type="submit" class="btn btn-primary"><?= icon('check'); ?> <?= $edit ? 'Simpan Perubahan' : 'Tambah Program'; ?></button>
      </div>
    </form>
  </div>
</div>
