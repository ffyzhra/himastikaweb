<?php
$search = $this->input->get('search') ?: '';
$divisi = $this->input->get('divisi') ?: 'all';
$hitung = ['pending' => 0, 'diterima' => 0, 'ditolak' => 0];
foreach ($pendaftaran as $p) {
    $s = $p->status ?: 'pending';
    if (isset($hitung[$s])) $hitung[$s]++;
}
?>
<section class="stats" style="grid-template-columns:repeat(3,1fr)">
  <div class="card stat"><span class="stat-icon tone-yellow"><?= icon('clock'); ?></span><div><div class="stat-num"><?= $hitung['pending']; ?></div><div class="stat-label">Menunggu</div></div></div>
  <div class="card stat"><span class="stat-icon tone-green"><?= icon('check-circle'); ?></span><div><div class="stat-num"><?= $hitung['diterima']; ?></div><div class="stat-label">Diterima</div></div></div>
  <div class="card stat"><span class="stat-icon tone-rose"><?= icon('x-circle'); ?></span><div><div class="stat-num"><?= $hitung['ditolak']; ?></div><div class="stat-label">Ditolak</div></div></div>
</section>

<div class="card">
  <div class="card-head">
    <div>
      <h2>Pendaftar Anggota Baru</h2>
      <p>Calon anggota mendaftar lewat <a href="<?= base_url('daftar'); ?>" target="_blank" rel="noopener"><?= html_escape(preg_replace('#^https?://#', '', base_url('daftar'))); ?></a></p>
    </div>
    <a href="<?= base_url('pendaftaran/form'); ?>" class="btn btn-primary"><?= icon('plus'); ?> Tambah Pendaftar</a>
  </div>

  <div class="card-body" style="border-bottom:1px solid var(--line)">
    <form method="get" class="toolbar">
      <div class="input-icon">
        <?= icon('search'); ?>
        <input type="text" name="search" class="input" value="<?= html_escape($search); ?>" placeholder="Cari nama, email, atau NIM...">
      </div>
      <select name="divisi" class="select">
        <option value="all">Semua Divisi</option>
        <?php foreach ($divisi_list as $d): ?>
          <option value="<?= html_escape($d->divisi); ?>" <?= $divisi === $d->divisi ? 'selected' : ''; ?>><?= html_escape($d->divisi); ?></option>
        <?php endforeach; ?>
      </select>
      <button type="submit" class="btn btn-primary">Cari</button>
      <?php if ($search !== '' || $divisi !== 'all'): ?>
        <a href="<?= base_url('pendaftaran'); ?>" class="btn btn-ghost">Reset</a>
      <?php endif; ?>
    </form>
  </div>

  <?php if (!empty($pendaftaran)): ?>
    <div class="table-wrap">
      <table class="table">
        <thead>
          <tr>
            <th>Pendaftar</th>
            <th>Divisi</th>
            <th>Kontak</th>
            <th>Berkas</th>
            <th>Status</th>
            <th style="text-align:right">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($pendaftaran as $p): $status = $p->status ?: 'pending'; ?>
            <tr>
              <td>
                <div class="person">
                  <span class="avatar"><?= html_escape(initials($p->nama)); ?></span>
                  <div>
                    <b><?= html_escape($p->nama); ?></b>
                    <small>NIM <?= html_escape($p->nim); ?> · Angkatan <?= html_escape($p->angkatan); ?></small>
                  </div>
                </div>
              </td>
              <td>
                <span class="badge plain"><?= html_escape($p->divisi); ?></span>
                <?php if (!empty($p->alasan)): ?>
                  <div class="cell-muted clamp" style="margin-top:6px;max-width:260px" title="<?= html_escape($p->alasan); ?>">“<?= html_escape($p->alasan); ?>”</div>
                <?php endif; ?>
              </td>
              <td class="cell-muted"><?= html_escape($p->email); ?><br><?= html_escape($p->no_telp); ?></td>
              <td>
                <div style="display:flex;gap:6px;flex-wrap:wrap">
                  <?php if (!empty($p->krs)): ?>
                    <a href="<?= base_url('uploads/' . rawurlencode($p->krs)); ?>" target="_blank" rel="noopener" class="btn btn-ghost btn-sm"><?= icon('file'); ?> KRS</a>
                  <?php endif; ?>
                  <?php if (!empty($p->khs)): ?>
                    <a href="<?= base_url('uploads/' . rawurlencode($p->khs)); ?>" target="_blank" rel="noopener" class="btn btn-ghost btn-sm"><?= icon('file'); ?> KHS</a>
                  <?php endif; ?>
                  <?php if (empty($p->krs) && empty($p->khs)): ?><span class="cell-muted">-</span><?php endif; ?>
                </div>
              </td>
              <td>
                <span class="badge badge-<?= html_escape($status); ?>"><?= ucfirst(html_escape($status)); ?></span>
                <div class="cell-muted" style="font-size:.76rem;margin-top:4px"><?= tgl($p->tanggal_daftar); ?></div>
              </td>
              <td>
                <div class="actions">
                  <?php if ($status !== 'diterima'): ?>
                    <a href="<?= base_url('pendaftaran/update_status/' . $p->id . '/diterima'); ?>" class="icon-btn success" title="Terima" aria-label="Terima <?= html_escape($p->nama); ?>"><?= icon('check'); ?></a>
                  <?php endif; ?>
                  <?php if ($status !== 'ditolak'): ?>
                    <a href="<?= base_url('pendaftaran/update_status/' . $p->id . '/ditolak'); ?>" class="icon-btn danger" title="Tolak" aria-label="Tolak <?= html_escape($p->nama); ?>"><?= icon('x'); ?></a>
                  <?php endif; ?>
                  <a href="<?= base_url('pendaftaran/delete/' . $p->id); ?>" class="icon-btn danger" title="Hapus" aria-label="Hapus <?= html_escape($p->nama); ?>" data-confirm="Hapus data pendaftar <?= html_escape($p->nama); ?> beserta berkasnya?"><?= icon('trash'); ?></a>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php else: ?>
    <div class="empty"><?= icon('user-plus'); ?> Belum ada pendaftar.</div>
  <?php endif; ?>
</div>
