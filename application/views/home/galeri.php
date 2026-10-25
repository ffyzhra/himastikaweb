<?php
$cat = function ($g) {
    if (!empty($g->proker_id)) return 'proker';
    if (strpos($g->foto, '/intern/') !== false || stripos($g->judul, 'intern') !== false) return 'intern';
    return 'kabinet';
};
?>
<section class="page-hero">
  <div class="bg" style="background-image:url('<?= base_url('assets/img/proker/fasber.jpg'); ?>')"></div>
  <div class="wrap">
    <nav class="crumbs rise"><a href="<?= base_url(); ?>">Beranda</a> / <span>Galeri</span></nav>
    <h1 class="rise" style="--d:.15s">Galeri HIMASTIKA</h1>
    <p class="rise" style="--d:.3s">Dokumentasi kegiatan, program kerja dan kebersamaan Kabinet Sinergi Harmoni.</p>
  </div>
</section>
<section class="section">
  <div class="wrap">
    <div class="filters reveal">
      <button class="on" data-filter="all">Semua</button>
      <button data-filter="proker">Program Kerja</button>
      <button data-filter="kabinet">Kabinet</button>
      <button data-filter="intern">Staff Intern</button>
    </div>
    <div class="masonry">
      <?php foreach ($galeri as $i => $g): if (!foto_url($g->foto)) continue; ?>
        <a href="<?= foto_url($g->foto); ?>" class="gitem reveal zoom" style="--d:<?= ($i % 6) * .06; ?>s" data-cat="<?= $cat($g); ?>" data-lightbox="galeri" data-caption="<?= html_escape($g->judul); ?>">
          <img src="<?= foto_url($g->foto); ?>" alt="<?= html_escape($g->judul); ?>" loading="lazy">
          <figcaption><?= html_escape($g->judul); ?><?= !empty($g->proker_judul) && $g->proker_judul !== $g->judul ? ' · ' . html_escape($g->proker_judul) : ''; ?></figcaption>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>
