<?php
$search = $this->input->get('search') ?: '';
$divisi = $this->input->get('divisi') ?: 'all';
?>
<div class="card">
  <div class="card-head">
    <div>
      <h2>Daftar Anggota</h2>
      <p><?= count($anggota); ?> anggota<?= ($search !== '' || $divisi !== 'all') ? ' sesuai filter' : ' terdaftar'; ?></p>
    </div>
    <a href="<?= base_url('anggota/create'); ?>" class="btn btn-primary"><?= icon('plus'); ?> Tambah Anggota</a>
  </div>

  <div class="card-body" style="border-bottom:1px solid var(--line)">
    <form method="get" class="toolbar">
      <div class="input-icon">
        <?= icon('search'); ?>
        <input type="text" name="search" class="input" value="<?= html_escape($search); ?>" placeholder="Cari nama, NIM, jabatan, atau email...">
      </div>
      <select name="divisi" class="select">
        <option value="all">Semua Divisi</option>
        <?php foreach ($divisi_list as $d): ?>
          <option value="<?= html_escape($d->divisi); ?>" <?= $divisi === $d->divisi ? 'selected' : ''; ?>><?= html_escape($d->divisi); ?></option>
        <?php endforeach; ?>
      </select>
      <button type="submit" class="btn btn-primary">Cari</button>
      <?php if ($search !== '' || $divisi !== 'all'): ?>
        <a href="<?= base_url('anggota'); ?>" class="btn btn-ghost">Reset</a>
      <?php endif; ?>
    </form>
  </div>

  <?php if (!empty($anggota)): ?>
    <div class="table-wrap">
      <table class="table">
        <thead>
          <tr>
            <th>Anggota</th>
            <th>Jabatan</th>
            <th>Divisi</th>
            <th>Kontak</th>
            <th style="text-align:right">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($anggota as $a): ?>
            <tr>
              <td>
                <div class="person">
                  <span class="avatar"><?= html_escape(initials($a->nama)); ?></span>
                  <div>
                    <b><?= html_escape($a->nama); ?></b>
                    <small>NIM <?= html_escape($a->nim); ?></small>
                  </div>
                </div>
              </td>
              <td><?= html_escape($a->jabatan); ?></td>
              <td><span class="badge plain"><?= html_escape($a->divisi); ?></span></td>
              <td class="cell-muted">
                <?= html_escape($a->email); ?><br><?= html_escape($a->no_telp); ?>
              </td>
              <td>
                <div class="actions">
                  <a href="<?= base_url('anggota/edit/' . $a->id); ?>" class="icon-btn" title="Edit" aria-label="Edit <?= html_escape($a->nama); ?>"><?= icon('edit'); ?></a>
                  <a href="<?= base_url('anggota/delete/' . $a->id); ?>" class="icon-btn danger" title="Hapus" aria-label="Hapus <?= html_escape($a->nama); ?>" data-confirm="Hapus <?= html_escape($a->nama); ?> dari daftar anggota?"><?= icon('trash'); ?></a>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php else: ?>
    <div class="empty"><?= icon('users'); ?> Tidak ada anggota yang cocok.</div>
  <?php endif; ?>
</div>
