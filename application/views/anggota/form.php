<?php $edit = isset($row); ?>
<div class="card card-narrow">
  <div class="card-head">
    <div>
      <h2><?= $edit ? 'Edit Data Anggota' : 'Tambah Anggota Baru'; ?></h2>
      <p>Lengkapi data anggota HIMASTIKA.</p>
    </div>
  </div>
  <div class="card-body">
    <form action="<?= $edit ? base_url('anggota/edit/' . $row->id) : base_url('anggota/create'); ?>" method="post" enctype="multipart/form-data" class="form-grid">
      <div class="field">
        <label for="nama">Nama Lengkap</label>
        <input class="input" type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap" required
               value="<?= html_escape($edit ? $row->nama : set_value('nama')); ?>">
      </div>

      <div class="form-grid cols-2">
        <div class="field">
          <label for="nim">NIM</label>
          <input class="input" type="text" id="nim" name="nim" placeholder="Contoh: 20230801001" required
                 value="<?= html_escape($edit ? $row->nim : set_value('nim')); ?>">
        </div>
        <div class="field">
          <label for="jabatan">Jabatan</label>
          <input class="input" type="text" id="jabatan" name="jabatan" placeholder="Contoh: Koordinator, Staff" required
                 value="<?= html_escape($edit ? $row->jabatan : set_value('jabatan')); ?>">
        </div>
      </div>

      <div class="form-grid cols-2">
        <div class="field">
          <label for="divisi">Divisi</label>
          <input class="input" type="text" id="divisi" name="divisi" placeholder="Contoh: Sinergi" required list="divisi-list"
                 value="<?= html_escape($edit ? $row->divisi : set_value('divisi')); ?>">
          <datalist id="divisi-list">
            <option value="Badan Pengurus Harian"><option value="Sinergi"><option value="Dukungan dan Solidaritas">
            <option value="Kajian Strategis"><option value="Inovasi dan Prestasi"><option value="Kreativa dan Komunikasi">
            <option value="Relasi dan Kemitraan">
          </datalist>
        </div>
        <div class="field">
          <label for="no_telp">No. Telepon <span class="hint">(opsional)</span></label>
          <input class="input" type="tel" id="no_telp" name="no_telp" placeholder="Opsional"
                 value="<?= html_escape($edit ? $row->no_telp : set_value('no_telp')); ?>">
        </div>
      </div>

      <div class="field">
        <label for="email">Email <span class="hint">(opsional)</span></label>
        <input class="input" type="email" id="email" name="email" placeholder="Opsional"
               value="<?= html_escape($edit ? $row->email : set_value('email')); ?>">
      </div>

      <div class="field">
        <label>Foto <span class="hint">(opsional, JPG/PNG maks. 4 MB, sebaiknya potret 3:4)</span></label>
        <div class="foto-field">
          <?php if ($edit && foto_url($row->foto)): ?>
            <img class="preview" src="<?= foto_url($row->foto); ?>" alt="Foto saat ini">
          <?php else: ?>
            <span class="preview"><?= icon('user'); ?></span>
          <?php endif; ?>
          <label class="file-drop">
            <?= icon('upload'); ?>
            <div><strong><?= $edit && !empty($row->foto) ? 'Ganti foto' : 'Unggah foto'; ?></strong><span>Klik untuk memilih file</span></div>
            <input type="file" name="foto" accept=".jpg,.jpeg,.png,.webp">
          </label>
        </div>
      </div>

      <div class="form-actions">
        <a href="<?= base_url('anggota'); ?>" class="btn btn-ghost"><?= icon('arrow-left'); ?> Kembali</a>
        <button type="submit" class="btn btn-primary"><?= icon('check'); ?> Simpan Data</button>
      </div>
    </form>
  </div>
</div>
