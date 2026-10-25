<?php $edit = isset($row); $divisi = ['Sinergi', 'Dukungan dan Solidaritas', 'Inovasi dan Prestasi', 'Kajian Strategis', 'Kreativa dan Komunikasi', 'Relasi dan Kemitraan', 'Sekretaris', 'Bendahara']; ?>
<div class="card card-narrow">
  <div class="card-head">
    <div>
      <h2><?= $edit ? 'Edit Staff Intern' : 'Tambah Staff Intern'; ?></h2>
      <p>Data ini tampil di halaman Staff Intern dan halaman divisi.</p>
    </div>
  </div>
  <div class="card-body">
    <form action="<?= $edit ? base_url('intern/edit/' . $row->id) : base_url('intern/create'); ?>" method="post" enctype="multipart/form-data" class="form-grid">
      <div class="field">
        <label for="nama">Nama</label>
        <input class="input" type="text" id="nama" name="nama" required value="<?= html_escape($edit ? $row->nama : ''); ?>" placeholder="Nama lengkap">
      </div>
      <div class="field">
        <label for="divisi">Divisi</label>
        <select class="select" id="divisi" name="divisi" required>
          <option value="">Pilih divisi</option>
          <?php foreach ($divisi as $d): ?>
            <option value="<?= html_escape($d); ?>" <?= $edit && $row->divisi === $d ? 'selected' : ''; ?>><?= html_escape($d); ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="field">
        <label>Foto <span class="hint">(opsional, potret 3:4)</span></label>
        <div class="foto-field">
          <?php if ($edit && foto_url($row->foto)): ?>
            <img class="preview" src="<?= foto_url($row->foto); ?>" alt="Foto saat ini">
          <?php else: ?>
            <span class="preview"><?= icon('user'); ?></span>
          <?php endif; ?>
          <label class="file-drop">
            <?= icon('upload'); ?>
            <div><strong><?= $edit && !empty($row->foto) ? 'Ganti foto' : 'Unggah foto'; ?></strong><span>JPG/PNG maks. 4 MB</span></div>
            <input type="file" name="foto" accept=".jpg,.jpeg,.png,.webp">
          </label>
        </div>
      </div>
      <div class="form-actions">
        <a href="<?= base_url('intern'); ?>" class="btn btn-ghost"><?= icon('arrow-left'); ?> Kembali</a>
        <button type="submit" class="btn btn-primary"><?= icon('check'); ?> Simpan</button>
      </div>
    </form>
  </div>
</div>
