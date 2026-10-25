<?php $kab = $this->config->item('kabinet'); $divs = $this->config->item('divisi'); ?>
<section class="page-hero">
  <div class="bg" style="background-image:url('<?= base_url('assets/img/hero/kabinet.jpg'); ?>')"></div>
  <div class="wrap">
    <nav class="crumbs rise"><a href="<?= base_url(); ?>">Beranda</a> / <span>Pengurus</span></nav>
    <h1 class="rise" style="--d:.15s">Pengurus <?= html_escape($kab['nama']); ?></h1>
    <p class="rise" style="--d:.3s">Badan Pengurus Harian dan enam divisi yang menjalankan program kerja HIMASTIKA periode <?= html_escape($kab['periode']); ?>.</p>
  </div>
</section>

<?php $k = 0; foreach ($divs as $slug => $dv): $members = $per_divisi[$slug] ?? []; if (!$members) continue; ?>
<section class="section <?= $k % 2 ? 'alt' : ''; ?>" style="padding:72px 0">
  <div class="wrap">
    <div class="intern-group-head reveal">
      <h3><span class="stat-icon tone-blue"><?= icon($dv['icon']); ?></span> <?= html_escape($dv['nama']); ?></h3>
      <a href="<?= base_url('divisi/' . $slug); ?>" class="btn btn-ghost btn-sm">Tentang divisi <?= icon('arrow-right'); ?></a>
    </div>
    <div class="people <?= count($members) >= 5 ? 'five' : ''; ?>">
      <?php foreach ($members as $i => $m) $this->load->view('partials/person_card', ['p' => $m, 'd' => ($i % 5) * .07, 'sub' => $dv['nama']]); ?>
    </div>
  </div>
</section>
<?php $k++; endforeach; ?>

<section class="section" style="padding-top:40px">
  <div class="wrap">
    <div class="cta-band reveal zoom">
      <div><h2>Ada juga Staff Intern!</h2><p>Anggota baru yang belajar langsung bersama pengurus aktif.</p></div>
      <a href="<?= base_url('staff-intern'); ?>" class="btn btn-yellow btn-lg"><?= icon('users'); ?> Kenali Staff Intern</a>
    </div>
  </div>
</section>
