<?php $edit = isset($informasi); ?>
<div class="card card-narrow">
  <div class="card-head">
    <div>
      <h2><?= $edit ? 'Edit Informasi' : 'Informasi Baru'; ?></h2>
      <p>Tulis pengumuman untuk anggota dan pengunjung website.</p>
    </div>
  </div>
  <div class="card-body">
    <form action="<?= $edit ? base_url('informasi/update/' . $informasi->id) : base_url('informasi/store'); ?>" method="post" class="form-grid">
      <div class="field">
        <label for="judul">Judul</label>
        <input class="input" type="text" id="judul" name="judul" placeholder="Contoh: Rapat Besar Anggota" required value="<?= html_escape($edit ? $informasi->judul : ''); ?>">
      </div>
      <div class="field">
        <label for="deskripsi">Isi Informasi</label>
        <textarea class="textarea" id="deskripsi" name="deskripsi" rows="6" placeholder="Waktu, tempat, dan detail lainnya..." required><?= html_escape($edit ? $informasi->deskripsi : ''); ?></textarea>
      </div>
      <div class="field" style="max-width:260px">
        <label for="tanggal">Tanggal</label>
        <input class="input" type="date" id="tanggal" name="tanggal" required value="<?= html_escape($edit ? $informasi->tanggal : date('Y-m-d')); ?>">
      </div>
      <div class="form-actions">
        <a href="<?= base_url('informasi'); ?>" class="btn btn-ghost"><?= icon('arrow-left'); ?> Kembali</a>
        <button type="submit" class="btn btn-primary"><?= icon('check'); ?> <?= $edit ? 'Simpan Perubahan' : 'Publikasikan'; ?></button>
      </div>
    </form>
  </div>
</div>
