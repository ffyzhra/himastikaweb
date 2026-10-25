<div class="card">
  <div class="card-head">
    <div>
      <h2>Unggah Dokumentasi</h2>
      <p>Foto tampil di halaman <a href="<?= base_url('galeri'); ?>" target="_blank" rel="noopener">/galeri</a>, dan di halaman program kerja kalau dihubungkan.</p>
    </div>
  </div>
  <div class="card-body">
    <form action="<?= base_url('dokumentasi/store'); ?>" method="post" enctype="multipart/form-data" class="form-grid cols-2" style="align-items:end">
      <div class="field">
        <label for="judul">Judul foto</label>
        <input class="input" type="text" id="judul" name="judul" placeholder="Contoh: Seminar HIMASTIKA x HUMANIS">
      </div>
      <div class="field">
        <label for="proker_id">Program kerja <span class="hint">(opsional)</span></label>
        <select class="select" id="proker_id" name="proker_id">
          <option value="">Tidak terkait program kerja</option>
          <?php foreach ($prokers as $p): ?><option value="<?= (int) $p->id; ?>"><?= html_escape($p->judul); ?></option><?php endforeach; ?>
        </select>
      </div>
      <label class="file-drop" style="position:relative">
        <?= icon('upload'); ?>
        <div><strong>Pilih foto</strong><span>JPG/PNG maks. 4 MB</span></div>
        <input type="file" name="foto" accept=".jpg,.jpeg,.png,.webp" required>
      </label>
      <button type="submit" class="btn btn-primary btn-lg"><?= icon('upload'); ?> Unggah</button>
    </form>
  </div>
</div>

<div class="card">
  <div class="card-head"><h2>Semua Dokumentasi</h2><p><?= count($galeri); ?> foto</p></div>
  <?php if ($galeri): ?>
    <div class="adm-gallery">
      <?php foreach ($galeri as $g): ?>
        <figure>
          <?php if (foto_url($g->foto)): ?><img src="<?= foto_url($g->foto); ?>" alt="<?= html_escape($g->judul); ?>" loading="lazy"><?php endif; ?>
          <figcaption>
            <div><b><?= html_escape($g->judul); ?></b><span class="cell-muted"><?= html_escape($g->proker_judul ?: 'Umum'); ?></span></div>
            <a href="<?= base_url('dokumentasi/delete/' . $g->id); ?>" class="icon-btn danger" title="Hapus" aria-label="Hapus foto" data-confirm="Hapus foto ini dari galeri?"><?= icon('trash'); ?></a>
          </figcaption>
        </figure>
      <?php endforeach; ?>
    </div>
  <?php else: ?>
    <div class="empty"><?= icon('layers'); ?> Belum ada dokumentasi.</div>
  <?php endif; ?>
</div>
