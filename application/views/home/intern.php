<?php
$kab = $this->config->item('kabinet');
$grup = ['Sinergi' => 'assets/img/intern/grup-sinergi.jpg', 'Inovasi dan Prestasi' => 'assets/img/intern/grup-inovasi-dan-prestasi.jpg', 'Kreativa dan Komunikasi' => 'assets/img/intern/grup-kreativa-dan-komunikasi.jpg'];
?>
<section class="page-hero">
  <div class="bg" style="background-image:url('<?= base_url('assets/img/intern/pelantikan.jpg'); ?>')"></div>
  <div class="wrap">
    <nav class="crumbs rise"><a href="<?= base_url(); ?>">Beranda</a> / <span>Staff Intern</span></nav>
    <h1 class="rise" style="--d:.15s">Staff Intern HIMASTIKA</h1>
    <p class="rise" style="--d:.3s"><?= $total; ?> mahasiswa yang bergabung di pertengahan periode untuk belajar langsung bersama pengurus aktif.</p>
  </div>
</section>

<section class="section">
  <div class="wrap intern-intro">
    <div class="reveal from-left">
      <p class="eyebrow">Apa itu Staff Intern?</p>
      <h2 style="font-size:clamp(1.6rem,3vw,2.2rem);margin:10px 0 16px">Belajar berorganisasi, <span style="color:var(--blue-600)">langsung praktik.</span></h2>
      <p class="lead-text"><?= html_escape($kab['intern']); ?></p>
    </div>
    <a href="<?= base_url('assets/img/intern/pelantikan.jpg'); ?>" class="div-photo reveal from-right" data-lightbox="intern" data-caption="Pelantikan Staff Intern">
      <img src="<?= base_url('assets/img/intern/pelantikan.jpg'); ?>" alt="Pelantikan Staff Intern">
    </a>
  </div>
</section>

<section class="section alt">
  <div class="wrap">
    <?php foreach ($grouped as $divisi => $list): $gp = isset($grup[$divisi]) ? foto_url($grup[$divisi]) : null; $slug = divisi_slug($divisi); ?>
      <div class="intern-group">
        <div class="intern-group-head reveal">
          <h3><span class="stat-icon tone-yellow"><?= icon('users'); ?></span> <?= $slug ? 'Divisi ' : 'Intern '; ?><?= html_escape($divisi); ?></h3>
          <?php if ($slug): ?><a href="<?= base_url('divisi/' . $slug); ?>" class="btn btn-ghost btn-sm">Tentang divisi <?= icon('arrow-right'); ?></a><?php endif; ?>
        </div>
        <?php $info = $divs[$slug ?: 'bph']; ?>
        <div class="intern-about reveal">
          <div>
            <p class="eyebrow" style="margin-bottom:6px"><?= $slug ? 'Tentang divisi' : 'Tentang peran ini'; ?></p>
            <p class="ia-lead"><?= html_escape($slug ? $info['deskripsi'] : 'Bendahara mengelola dan mencatat keuangan HIMASTIKA, menentukan anggaran kegiatan, serta melaporkan keuangan secara transparan.'); ?></p>
            <?php if (!empty($info['intern'])): ?>
              <p class="ia-role"><?= icon('sparkles'); ?> <span><b>Yang dikerjakan intern:</b> <?= html_escape($info['intern']); ?></span></p>
            <?php endif; ?>
          </div>
          <?php if ($slug && !empty($info['proker'])): ?>
            <div class="ia-proker">
              <span class="ia-label">Contoh program kerja</span>
              <?php foreach ($info['proker'] as $pk): $row = isset($pk['id'], $proker_db[$pk['id']]) ? $proker_db[$pk['id']] : null; ?>
                <?php if ($row): ?>
                  <a href="<?= base_url('program-kerja/' . $row->id); ?>" class="pk-chip"><?= icon($pk['icon'] ?? 'clipboard'); ?> <?= html_escape($pk['nama']); ?></a>
                <?php else: ?>
                  <span class="pk-chip"><?= icon($pk['icon'] ?? 'clipboard'); ?> <?= html_escape($pk['nama']); ?></span>
                <?php endif; ?>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </div>
        <?php if ($gp): ?>
          <a href="<?= $gp; ?>" class="group-photo reveal zoom" style="display:block" data-lightbox="intern" data-caption="Staff Intern <?= html_escape($divisi); ?>"><img src="<?= $gp; ?>" alt="Staff Intern <?= html_escape($divisi); ?>" loading="lazy"></a>
        <?php endif; ?>
        <div class="people <?= count($list) >= 5 ? 'five' : ''; ?>">
          <?php foreach ($list as $i => $m) $this->load->view('partials/person_card', ['p' => (object) ['nama' => $m->nama, 'jabatan' => 'Staff Intern', 'divisi' => $m->divisi, 'foto' => $m->foto], 'd' => $i * .08, 'sub' => $divisi]); ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<section class="section">
  <div class="wrap">
    <div class="cta-band reveal zoom">
      <div><h2>Mau ikut jadi bagian berikutnya?</h2><p>Daftar sebagai anggota HIMASTIKA dan mulai perjalananmu di organisasi.</p></div>
      <a href="<?= base_url('daftar'); ?>" class="btn btn-yellow btn-lg"><?= icon('user-plus'); ?> Daftar Sekarang</a>
    </div>
  </div>
</section>
