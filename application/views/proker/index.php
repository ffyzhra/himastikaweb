<?php
$selesai = count(array_filter($prokers, function ($p) { return (int) $p->status === 1; }));
$total = count($prokers);
$persen = $total ? round($selesai / $total * 100) : 0;
?>
<div class="card">
  <div class="card-head">
    <div>
      <h2>Program Kerja Kabinet</h2>
      <p><?= $selesai; ?> dari <?= $total; ?> program selesai · geser tombol status untuk menandai selesai</p>
    </div>
    <a href="<?= base_url('proker/create'); ?>" class="btn btn-primary"><?= icon('plus'); ?> Tambah Program Kerja</a>
  </div>
  <div class="card-body" style="border-bottom:1px solid var(--line)">
    <div style="display:flex;justify-content:space-between;font-size:.82rem;font-weight:600;margin-bottom:8px">
      <span>Progres</span><span><?= $persen; ?>%</span>
    </div>
    <div class="progress"><span style="width:<?= $persen; ?>%"></span></div>
  </div>

  <?php if (!empty($prokers)): ?>
    <div class="table-wrap">
      <table class="table">
        <thead>
          <tr>
            <th>Program</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th style="text-align:right">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($prokers as $p): $done = (int) $p->status === 1; ?>
            <tr class="<?= $done ? 'done-row' : ''; ?>">
              <td>
                <div class="person">
                  <?php if (foto_url($p->foto ?? null)): ?><img class="thumb-rect" src="<?= foto_url($p->foto); ?>" alt=""><?php else: ?><span class="thumb-rect" style="display:grid;place-items:center;background:var(--blue-50);color:var(--blue-600)"><?= icon('clipboard'); ?></span><?php endif; ?>
                  <div>
                    <b class="title-cell" style="color:var(--ink)"><?= html_escape($p->judul); ?></b>
                    <?php if (!empty($p->deskripsi)): ?>
                      <div class="cell-muted clamp"><?= html_escape($p->deskripsi); ?></div>
                    <?php endif; ?>
                  </div>
                </div>
              </td>
              <td style="white-space:nowrap"><?= !empty($p->tanggal) ? tgl($p->tanggal) : '<span class="cell-muted">Menyusul</span>'; ?></td>
              <td>
                <label class="switch">
                  <input type="checkbox" data-proker-status="<?= (int) $p->id; ?>" <?= $done ? 'checked' : ''; ?> aria-label="Tandai <?= html_escape($p->judul); ?> selesai">
                  <span class="track"></span>
                  <span class="switch-text"><?= $done ? 'Selesai' : 'Berjalan'; ?></span>
                </label>
              </td>
              <td>
                <div class="actions">
                  <a href="<?= base_url('proker/edit/' . $p->id); ?>" class="icon-btn" title="Edit" aria-label="Edit <?= html_escape($p->judul); ?>"><?= icon('edit'); ?></a>
                  <a href="<?= base_url('proker/delete/' . $p->id); ?>" class="icon-btn danger" title="Hapus" aria-label="Hapus <?= html_escape($p->judul); ?>" data-confirm="Hapus program kerja &quot;<?= html_escape($p->judul); ?>&quot;?"><?= icon('trash'); ?></a>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php else: ?>
    <div class="empty"><?= icon('clipboard'); ?> Belum ada program kerja.</div>
  <?php endif; ?>
</div>
