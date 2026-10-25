<?php $done = (int) $proker->status === 1; $cover = foto_url($proker->foto); ?>
<section class="page-hero">
  <?php if ($cover): ?><div class="bg" style="background-image:url('<?= $cover; ?>')"></div><?php endif; ?>
  <div class="wrap">
    <nav class="crumbs rise"><a href="<?= base_url(); ?>">Beranda</a> / <a href="<?= base_url('program-kerja'); ?>">Program Kerja</a> / <span><?= html_escape($proker->judul); ?></span></nav>
    <h1 class="rise" style="--d:.15s"><?= html_escape($proker->judul); ?></h1>
    <p class="rise" style="--d:.3s"><span class="badge <?= $done ? 'badge-done' : ''; ?>" style="background:rgba(255,255,255,.95)"><?= $done ? 'Terlaksana' : 'Akan datang'; ?></span></p>
  </div>
</section>

<section class="section">
  <div class="wrap pd-layout">
    <div>
      <?php if ($cover): ?>
        <a href="<?= $cover; ?>" class="pd-cover reveal zoom" style="display:block" data-lightbox="proker" data-caption="<?= html_escape($proker->judul); ?>"><img src="<?= $cover; ?>" alt="<?= html_escape($proker->judul); ?>"></a>
      <?php endif; ?>
      <div class="reveal">
        <p class="eyebrow">Tentang kegiatan</p>
        <p class="lead-text" style="margin-top:10px"><?= nl2br(html_escape($proker->deskripsi ?: 'Detail kegiatan akan segera diumumkan.')); ?></p>
      </div>
      <?php $extra = array_filter($foto, function ($g) use ($proker) { return $g->foto !== $proker->foto && foto_url($g->foto); }); if ($extra): ?>
        <h3 class="reveal" style="margin:36px 0 16px">Dokumentasi</h3>
        <div class="masonry" style="columns:2 220px">
          <?php foreach ($extra as $g): ?>
            <a href="<?= foto_url($g->foto); ?>" class="gitem reveal zoom" data-lightbox="proker" data-caption="<?= html_escape($g->judul); ?>"><img src="<?= foto_url($g->foto); ?>" alt="<?= html_escape($g->judul); ?>" loading="lazy"><figcaption><?= html_escape($g->judul); ?></figcaption></a>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>
    <aside class="pd-meta reveal from-right">
      <div class="row"><span class="stat-icon tone-blue"><?= icon('calendar'); ?></span><div><small>Tanggal</small><b><?= !empty($proker->tanggal) ? tgl($proker->tanggal) : 'Segera hadir'; ?></b></div></div>
      <div class="row"><span class="stat-icon <?= $done ? 'tone-green' : 'tone-yellow'; ?>"><?= icon($done ? 'check-circle' : 'clock'); ?></span><div><small>Status</small><b><?= $done ? 'Terlaksana' : 'Akan datang'; ?></b></div></div>
      <div class="row"><span class="stat-icon tone-purple"><?= icon('users'); ?></span><div><small>Penyelenggara</small><b>HIMASTIKA · Kabinet Sinergi Harmoni</b></div></div>
      <a href="<?= base_url('program-kerja'); ?>" class="btn btn-ghost"><?= icon('arrow-left'); ?> Semua program kerja</a>
    </aside>
  </div>
</section>

<?php if ($lainnya): ?>
<section class="section alt">
  <div class="wrap">
    <div class="section-head center reveal"><p class="eyebrow">Program lainnya</p><h2>Lihat juga</h2></div>
    <div class="pgrid">
      <?php foreach ($lainnya as $i => $p) $this->load->view('partials/proker_card', ['p' => $p, 'd' => $i * .1]); ?>
    </div>
  </div>
</section>
<?php endif; ?>
