<div class="card">
  <div class="card-head">
    <div>
      <h2>Informasi &amp; Pengumuman</h2>
      <p>Pengumuman terbaru tampil di halaman depan website.</p>
    </div>
    <a href="<?= base_url('informasi/create'); ?>" class="btn btn-primary"><?= icon('plus'); ?> Tambah Informasi</a>
  </div>

  <?php if (!empty($informasi)): ?>
    <ul class="list">
      <?php foreach ($informasi as $i): ?>
        <li style="align-items:flex-start">
          <span class="date-chip"><b><?= date('j', strtotime($i->tanggal)); ?></b><small><?= bulan_singkat($i->tanggal); ?></small></span>
          <div style="min-width:0;flex:1">
            <div class="title"><?= html_escape($i->judul); ?></div>
            <div class="cell-muted clamp" style="max-width:none"><?= nl2br(html_escape($i->deskripsi)); ?></div>
            <div class="meta" style="margin-top:4px"><?= icon('calendar', 'icon'); ?> <?= tgl($i->tanggal); ?></div>
          </div>
          <div class="actions" style="display:flex;gap:4px">
            <a href="<?= base_url('informasi/edit/' . $i->id); ?>" class="icon-btn" title="Edit" aria-label="Edit <?= html_escape($i->judul); ?>"><?= icon('edit'); ?></a>
            <a href="<?= base_url('informasi/delete/' . $i->id); ?>" class="icon-btn danger" title="Hapus" aria-label="Hapus <?= html_escape($i->judul); ?>" data-confirm="Hapus informasi ini?"><?= icon('trash'); ?></a>
          </div>
        </li>
      <?php endforeach; ?>
    </ul>
  <?php else: ?>
    <div class="empty"><?= icon('megaphone'); ?> Belum ada informasi.</div>
  <?php endif; ?>
</div>
