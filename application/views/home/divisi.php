<?php $photo = foto_url($div['foto']); ?>
<section class="page-hero">
  <?php if ($photo): ?><div class="bg" style="background-image:url('<?= $photo; ?>')"></div><?php endif; ?>
  <div class="wrap">
    <nav class="crumbs rise"><a href="<?= base_url(); ?>">Beranda</a> / <a href="<?= base_url(); ?>#divisi">Divisi</a> / <span><?= html_escape($div['nama']); ?></span></nav>
    <h1 class="rise" style="--d:.15s"><?= $slug === 'bph' ? '' : 'Divisi '; ?><?= html_escape($div['nama']); ?></h1>
    <p class="rise" style="--d:.3s"><?= html_escape($div['ringkas']); ?></p>
  </div>
</section>

<section class="section">
  <div class="wrap div-layout">
    <div class="reveal from-left">
      <p class="eyebrow">Tugas &amp; peran</p>
      <h2 style="font-size:clamp(1.6rem,3vw,2.2rem);margin:10px 0 16px"><?= html_escape($div['tagline'] ?? 'Apa yang dikerjakan?'); ?></h2>
      <p class="lead-text"><?= html_escape($div['deskripsi']); ?></p>
      <?php if (!empty($div['tugas'])): ?>
        <ul class="task-list">
          <?php foreach ($div['tugas'] as $t): ?><li><?= icon('check'); ?><span><?= html_escape($t); ?></span></li><?php endforeach; ?>
        </ul>
      <?php endif; ?>
    </div>
    <?php if ($photo): ?>
      <a href="<?= $photo; ?>" class="div-photo reveal from-right" data-lightbox="divisi" data-caption="<?= html_escape($div['nama']); ?>"><img src="<?= $photo; ?>" alt="<?= html_escape($div['nama']); ?>"></a>
    <?php endif; ?>
  </div>
</section>

<?php if (!empty($div['proker'])): ?>
<section class="section alt">
  <div class="wrap">
    <div class="section-head center reveal">
      <p class="eyebrow">Program kerja</p>
      <h2><?= html_escape($div['proker_label'] ?? 'Contoh program kerja'); ?></h2>
    </div>
    <?php $this->load->view('partials/proker_examples', ['items' => $div['proker'], 'proker_db' => $proker_db]); ?>
  </div>
</section>
<?php endif; ?>

<?php if ($anggota): ?>
<section class="section">
  <div class="wrap">
    <div class="section-head center reveal">
      <p class="eyebrow">Anggota divisi</p>
      <h2>Tim <span class="mark"><?= html_escape($div['nama']); ?></span></h2>
    </div>
    <div class="people <?= count($anggota) >= 5 ? 'five' : ''; ?>" style="<?= count($anggota) < 4 ? 'max-width:' . (count($anggota) * 260) . 'px;margin-inline:auto;grid-template-columns:repeat(' . count($anggota) . ',1fr)' : ''; ?>">
      <?php foreach ($anggota as $i => $m) $this->load->view('partials/person_card', ['p' => $m, 'd' => $i * .08, 'sub' => $div['nama']]); ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if ($interns): ?>
<section class="section alt">
  <div class="wrap">
    <div class="section-head center reveal">
      <p class="eyebrow">Staff Intern</p>
      <h2>Belajar bersama divisi ini</h2>
      <?php if (!empty($div['intern'])): ?><p><?= html_escape($div['intern']); ?></p><?php endif; ?>
    </div>
    <div class="people" style="<?= count($interns) < 4 ? 'max-width:' . (count($interns) * 260) . 'px;margin-inline:auto;grid-template-columns:repeat(' . count($interns) . ',1fr)' : ''; ?>">
      <?php foreach ($interns as $i => $m) $this->load->view('partials/person_card', ['p' => (object) ['nama' => $m->nama, 'jabatan' => 'Staff Intern', 'divisi' => $m->divisi, 'foto' => $m->foto], 'd' => $i * .08, 'sub' => 'Staff Intern ' . $m->divisi]); ?>
    </div>
  </div>
</section>
<?php endif; ?>

<section class="section" style="padding:64px 0">
  <div class="wrap" style="text-align:center">
    <p class="eyebrow reveal">Divisi lainnya</p>
    <div class="other-divs reveal" style="justify-content:center;margin-top:16px">
      <?php foreach ($lainnya as $s => $o): ?>
        <a href="<?= base_url('divisi/' . $s); ?>"><?= icon($o['icon']); ?> <?= html_escape($o['nama']); ?></a>
      <?php endforeach; ?>
    </div>
  </div>
</section>
