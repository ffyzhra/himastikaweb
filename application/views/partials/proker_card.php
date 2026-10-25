<?php
// $p: proker row. Optional: $d (reveal delay)
$done = (int) $p->status === 1;
$src  = foto_url($p->foto ?? null);
?>
<a href="<?= base_url('program-kerja/' . $p->id); ?>" class="pcard reveal" style="--d:<?= isset($d) ? $d : 0; ?>s">
  <div class="ph">
    <?php if ($src): ?>
      <img src="<?= $src; ?>" alt="<?= html_escape($p->judul); ?>" loading="lazy">
    <?php else: ?>
      <div class="placeholder"><?= icon($done ? 'check-circle' : 'sparkles'); ?><span><?= $done ? 'Terlaksana' : 'Segera hadir'; ?></span></div>
    <?php endif; ?>
    <span class="badge <?= $done ? 'badge-done' : ''; ?>"><?= $done ? 'Terlaksana' : 'Akan datang'; ?></span>
  </div>
  <div class="body">
    <h3><?= html_escape($p->judul); ?></h3>
    <?php if (!empty($p->deskripsi)): ?><p><?= html_escape($p->deskripsi); ?></p><?php endif; ?>
    <span class="date"><?= icon('calendar'); ?> <?= !empty($p->tanggal) ? tgl($p->tanggal) : 'Tanggal menyusul'; ?></span>
  </div>
</a>
