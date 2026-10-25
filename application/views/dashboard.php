<?php
$username = $this->session->userdata('username') ?: 'Admin';
$persen = $totalProker > 0 ? round($prokerSelesai / $totalProker * 100) : 0;
$cards = [
    ['Anggota',       $totalAnggota,   'anggota',     'users',     'tone-blue'],
    ['Pendaftar',     $totalPendaftar, 'pendaftaran', 'user-plus', 'tone-yellow'],
    ['Program Kerja', $totalProker,    'proker',      'clipboard', 'tone-green'],
    ['Staff Intern',  $totalIntern,    'intern',      'user',      'tone-purple'],
    ['Dokumentasi',   $totalGaleri,    'dokumentasi', 'layers',    'tone-blue'],
    ['Informasi',     $totalInformasi, 'informasi',   'megaphone', 'tone-purple'],
    ['To-Do',         $totalTodo,      'todo',        'check-sq',  'tone-rose'],
];
?>
<section class="welcome">
  <div>
    <h2>Halo, <?= html_escape($username); ?> 👋</h2>
    <p>
      <?php if ($pendingCount > 0): ?>
        Ada <b><?= $pendingCount; ?> pendaftar</b> yang menunggu keputusan<?= $todoPending > 0 ? ' dan <b>' . $todoPending . ' tugas</b> belum selesai' : ''; ?>.
      <?php else: ?>
        Semua pendaftar sudah diproses. Kerja bagus!
      <?php endif; ?>
    </p>
  </div>
  <div class="actions">
    <a href="<?= base_url('pendaftaran'); ?>" class="btn btn-yellow"><?= icon('user-plus'); ?> Tinjau Pendaftar</a>
    <a href="<?= base_url('informasi/create'); ?>" class="btn btn-outline-light"><?= icon('megaphone'); ?> Buat Informasi</a>
  </div>
</section>

<section class="stats auto">
  <?php foreach ($cards as $c): ?>
    <a href="<?= base_url($c[2]); ?>" class="card stat">
      <span class="stat-icon <?= $c[4]; ?>"><?= icon($c[3]); ?></span>
      <div>
        <div class="stat-num"><?= (int) $c[1]; ?></div>
        <div class="stat-label"><?= $c[0]; ?></div>
      </div>
    </a>
  <?php endforeach; ?>
</section>

<section class="grid-3-2">
  <div class="card">
    <div class="card-head">
      <div>
        <h2>Program Kerja</h2>
        <p><?= $prokerSelesai; ?> dari <?= $totalProker; ?> program selesai</p>
      </div>
      <a href="<?= base_url('proker'); ?>" class="btn btn-ghost btn-sm">Lihat semua <?= icon('arrow-right'); ?></a>
    </div>
    <div class="card-body" style="padding-bottom:6px">
      <div style="display:flex;justify-content:space-between;font-size:.82rem;font-weight:600;margin-bottom:8px">
        <span>Progres kabinet</span><span><?= $persen; ?>%</span>
      </div>
      <div class="progress"><span style="width:<?= $persen; ?>%"></span></div>
    </div>
    <?php if (!empty($proker)): ?>
      <ul class="list">
        <?php foreach ($proker as $p): ?>
          <li>
            <?php if (!empty($p->tanggal)): ?>
              <span class="date-chip"><b><?= date('j', strtotime($p->tanggal)); ?></b><small><?= bulan_singkat($p->tanggal); ?></small></span>
            <?php else: ?>
              <span class="date-chip"><b>?</b><small>TBA</small></span>
            <?php endif; ?>
            <div style="min-width:0;flex:1">
              <div class="title"><?= html_escape($p->judul); ?></div>
              <div class="meta"><?= !empty($p->tanggal) ? tgl($p->tanggal) : 'Tanggal menyusul'; ?></div>
            </div>
            <?php if ((int) $p->status === 1): ?>
              <span class="badge badge-done">Selesai</span>
            <?php else: ?>
              <span class="badge">Berjalan</span>
            <?php endif; ?>
          </li>
        <?php endforeach; ?>
      </ul>
    <?php else: ?>
      <div class="empty"><?= icon('clipboard'); ?> Belum ada program kerja.</div>
    <?php endif; ?>
  </div>

  <div style="display:grid;gap:24px;align-content:start">
    <div class="card">
      <div class="card-head">
        <h2>Pendaftar Terbaru</h2>
        <a href="<?= base_url('pendaftaran'); ?>" class="btn btn-ghost btn-sm">Semua</a>
      </div>
      <?php if (!empty($pendaftar)): ?>
        <ul class="list">
          <?php foreach ($pendaftar as $d): $st = $d->status ?: 'pending'; ?>
            <li>
              <span class="avatar"><?= html_escape(initials($d->nama)); ?></span>
              <div style="min-width:0;flex:1">
                <div class="title"><?= html_escape($d->nama); ?></div>
                <div class="meta"><?= html_escape($d->divisi); ?></div>
              </div>
              <span class="badge badge-<?= html_escape($st); ?>"><?= ucfirst(html_escape($st)); ?></span>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php else: ?>
        <div class="empty"><?= icon('user-plus'); ?> Belum ada pendaftar.</div>
      <?php endif; ?>
    </div>

    <div class="card">
      <div class="card-head">
        <h2>Informasi Terbaru</h2>
        <a href="<?= base_url('informasi'); ?>" class="btn btn-ghost btn-sm">Semua</a>
      </div>
      <?php if (!empty($informasi)): ?>
        <ul class="list">
          <?php foreach ($informasi as $i): ?>
            <li>
              <span class="stat-icon tone-purple" style="width:36px;height:36px"><?= icon('megaphone'); ?></span>
              <div style="min-width:0;flex:1">
                <div class="title"><?= html_escape($i->judul); ?></div>
                <div class="meta"><?= tgl($i->tanggal); ?></div>
              </div>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php else: ?>
        <div class="empty"><?= icon('megaphone'); ?> Belum ada informasi.</div>
      <?php endif; ?>
    </div>
  </div>
</section>
