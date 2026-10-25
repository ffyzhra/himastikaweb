<section class="page-hero">
  <div class="bg" style="background-image:url('<?= base_url('assets/img/proker/company-visit-jasa-raharja.jpg'); ?>')"></div>
  <div class="wrap">
    <nav class="crumbs rise"><a href="<?= base_url(); ?>">Beranda</a> / <span>Program Kerja</span></nav>
    <h1 class="rise" style="--d:.15s">Program Kerja</h1>
    <p class="rise" style="--d:.3s"><?= $proker_selesai; ?> dari <?= $total_proker; ?> program kerja Kabinet Sinergi Harmoni sudah terlaksana.</p>
  </div>
</section>
<section class="section">
  <div class="wrap">
    <div class="pgrid">
      <?php foreach ($prokers as $i => $p) $this->load->view('partials/proker_card', ['p' => $p, 'd' => ($i % 3) * .1]); ?>
    </div>
  </div>
</section>
