<?php
// $items: daftar contoh proker dari config divisi. $proker_db: proker di database per id.
// Kalau proker ada di database, kartunya tertaut ke halaman detail dan memakai fotonya.
?>
<div class="pk-examples">
  <?php foreach ($items as $i => $it):
    $row = isset($it['id'], $proker_db[$it['id']]) ? $proker_db[$it['id']] : null;
    $img = $row ? foto_url($row->foto ?? null) : null;
    $tag = $row ? 'a' : 'div';
  ?>
    <<?= $tag; ?> class="pk-ex reveal <?= $img ? 'has-img' : ''; ?>" style="--d:<?= $i * .1; ?>s"<?= $row ? ' href="' . base_url('program-kerja/' . $row->id) . '"' : ''; ?>>
      <?php if ($img): ?><img src="<?= $img; ?>" alt="" loading="lazy"><?php endif; ?>
      <span class="pk-ic"><?= icon($it['icon'] ?? 'clipboard'); ?></span>
      <div>
        <h4><?= html_escape($it['nama']); ?></h4>
        <p><?= html_escape($it['desc']); ?></p>
        <?php if ($row): ?>
          <span class="pk-link"><?= (int) $row->status === 1 ? 'Lihat dokumentasi' : 'Lihat detail'; ?> <?= icon('arrow-right'); ?></span>
        <?php endif; ?>
      </div>
    </<?= $tag; ?>>
  <?php endforeach; ?>
</div>
