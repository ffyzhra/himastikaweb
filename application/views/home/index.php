<?php
$kab   = $this->config->item('kabinet');
$divs  = $this->config->item('divisi');
$hero  = array_values(array_filter(array_map('foto_url', $this->config->item('hero_foto'))));
$tones = ['tone-blue', 'tone-yellow', 'tone-green', 'tone-purple', 'tone-rose'];
$bph   = isset($per_divisi['bph']) ? $per_divisi['bph'] : [];
$stack = array_values(array_filter($bph, function ($a) { return foto_url($a->foto); }));
?>

<!-- ================= HERO ================= -->
<section class="hero photo">
  <div class="hero-slides" aria-hidden="true">
    <?php foreach ($hero as $i => $src): ?>
      <div class="slide <?= $i === 0 ? 'on' : ''; ?>" style="background-image:url('<?= $src; ?>')"></div>
    <?php endforeach; ?>
  </div>
  <div class="wrap">
    <div>
      <span class="pill rise" style="--d:.1s"><?= icon('sparkles'); ?> <?= html_escape($kab['nama'] . ' · ' . $kab['periode']); ?></span>
      <h1 class="rise" style="--d:.25s">Tumbuh bersama di <em>Teknik Informatika</em> Esa Unggul.</h1>
      <p class="lead rise" style="--d:.4s">Himpunan Mahasiswa Jurusan Teknik Informatika Universitas Esa Unggul, wadah untuk berkembang bersama dengan mengedepankan kerja sama, saling menghormati, dan kreativitas.</p>
      <div class="cta rise" style="--d:.55s">
        <a href="<?= base_url('daftar'); ?>" class="btn btn-yellow btn-lg"><?= icon('user-plus'); ?> Daftar Jadi Anggota</a>
        <a href="<?= base_url('pengurus'); ?>" class="btn btn-outline-light btn-lg">Kenali Pengurus</a>
      </div>
    </div>
    <?php if (count($stack) >= 3): ?>
      <div class="hero-stack" aria-hidden="true">
        <figure class="f1"><img src="<?= foto_url($stack[0]->foto); ?>" alt=""></figure>
        <figure class="f2"><img src="<?= foto_url($stack[1]->foto); ?>" alt=""></figure>
        <figure class="f3"><img src="<?= foto_url($stack[4]->foto ?? $stack[2]->foto); ?>" alt=""></figure>
        <div class="badge-float"><img src="<?= base_url('assets/img/logo-himastika.jpg'); ?>" alt=""> <?= $total_anggota; ?> pengurus · <?= $total_intern; ?> intern</div>
      </div>
    <?php endif; ?>
  </div>
  <?php if (count($hero) > 1): ?>
    <div class="hero-dots">
      <?php foreach ($hero as $i => $src): ?><button class="<?= $i === 0 ? 'on' : ''; ?>" aria-label="Foto <?= $i + 1; ?>"></button><?php endforeach; ?>
    </div>
  <?php endif; ?>
  <a href="#tentang" class="scroll-hint"><span></span>Scroll</a>
</section>

<div class="stat-strip">
  <div class="wrap">
    <div class="inner reveal">
      <div class="item"><b class="count" data-to="<?= $total_anggota; ?>"><?= $total_anggota; ?></b><span>Pengurus aktif</span></div>
      <div class="item"><b class="count" data-to="<?= count($divs); ?>"><?= count($divs); ?></b><span>Divisi</span></div>
      <div class="item"><b class="count" data-to="<?= $total_intern; ?>"><?= $total_intern; ?></b><span>Staff intern</span></div>
      <div class="item"><b class="count" data-to="<?= $proker_selesai; ?>"><?= $proker_selesai; ?></b><span>Program terlaksana</span></div>
    </div>
  </div>
</div>

<!-- ================= TENTANG ================= -->
<section class="section" id="tentang">
  <div class="wrap about-grid">
    <div class="reveal from-left">
      <p class="eyebrow">Tentang Kami</p>
      <div class="section-head" style="margin-bottom:20px">
        <h2>Apa itu <span class="mark">Kabinet Sinergi Harmoni</span>?</h2>
        <p><?= html_escape($kab['deskripsi']); ?></p>
      </div>
      <div class="div-photo" style="margin-bottom:22px"><img src="<?= base_url('assets/img/divisi/bph.jpg'); ?>" alt="Badan Pengurus Harian HIMASTIKA" loading="lazy" style="aspect-ratio:16/9"></div>
      <a href="<?= base_url('pengurus'); ?>" class="btn btn-primary">Lihat struktur kabinet <?= icon('arrow-right'); ?></a>
    </div>
    <div class="values">
      <div class="value reveal from-right">
        <span class="stat-icon tone-blue"><?= icon('target'); ?></span>
        <div><h3>Visi</h3><p><?= html_escape($kab['visi']); ?></p></div>
      </div>
      <?php $mt = ['tone-yellow', 'tone-green', 'tone-purple']; foreach ($kab['misi'] as $i => $m): ?>
        <div class="value reveal from-right" style="--d:<?= ($i + 1) * .12; ?>s">
          <span class="stat-icon <?= $mt[$i % 3]; ?>" style="font-weight:800"><?= $i + 1; ?></span>
          <div><h3>Misi <?= $i + 1; ?></h3><p><?= html_escape($m); ?></p></div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ================= DIVISI ================= -->
<section class="section alt" id="divisi">
  <div class="wrap">
    <div class="section-head center reveal">
      <p class="eyebrow">Struktur Kabinet</p>
      <h2>Kenali <span class="mark">divisi</span> HIMASTIKA</h2>
      <p>Setiap divisi punya fokus sendiri. Klik untuk melihat tugas dan orang-orangnya.</p>
    </div>
    <div class="dgrid">
      <?php $k = 0; foreach ($divs as $slug => $dv): $members = $per_divisi[$slug] ?? []; ?>
        <a href="<?= base_url('divisi/' . $slug); ?>" class="dcard reveal" style="--d:<?= ($k % 4) * .08; ?>s">
          <div class="ph">
            <?php if (foto_url($dv['foto'])): ?><img src="<?= foto_url($dv['foto']); ?>" alt="Divisi <?= html_escape($dv['nama']); ?>" loading="lazy"><?php endif; ?>
            <span class="stat-icon <?= $tones[$k % count($tones)]; ?>"><?= icon($dv['icon']); ?></span>
          </div>
          <div class="body">
            <h3><?= html_escape($dv['nama']); ?></h3>
            <p><?= html_escape($dv['ringkas']); ?></p>
            <div class="more">
              <span class="faces">
                <?php foreach (array_slice($members, 0, 5) as $m): if (foto_url($m->foto)): ?>
                  <img src="<?= foto_url($m->foto); ?>" alt="" loading="lazy">
                <?php endif; endforeach; ?>
              </span>
              <span style="display:flex;align-items:center;gap:6px"><?= count($members); ?> orang <?= icon('arrow-right'); ?></span>
            </div>
          </div>
        </a>
      <?php $k++; endforeach; ?>
      <a href="<?= base_url('daftar'); ?>" class="dcard reveal" style="--d:.24s;background:var(--navy-800);border-color:var(--navy-800);justify-content:center;padding:28px;color:#cbd5e1">
        <span class="stat-icon" style="background:var(--yellow);color:var(--navy-900)"><?= icon('user-plus'); ?></span>
        <h3 style="color:#fff;margin:16px 0 6px">Tertarik bergabung?</h3>
        <p style="color:#cbd5e1">Isi formulir pendaftaran dan pilih divisimu.</p>
        <p style="color:var(--yellow);font-weight:700;margin-top:12px">Daftar sekarang →</p>
      </a>
    </div>
  </div>
</section>

<!-- ================= PENGURUS (marquee) ================= -->
<section class="section" style="padding-bottom:70px">
  <div class="wrap">
    <div class="section-head center reveal">
      <p class="eyebrow">Pengurus</p>
      <h2>Orang-orang di balik <span class="mark">HIMASTIKA</span></h2>
      <p><?= $total_anggota; ?> pengurus <?= html_escape($kab['nama']); ?> yang menjalankan program kerja sepanjang periode.</p>
    </div>
  </div>
  <?php $half = (int) ceil(count($anggota) / 2); foreach ([array_slice($anggota, 0, $half), array_slice($anggota, $half)] as $r => $row): if (!$row) continue; ?>
    <div class="marquee <?= $r ? 'reverse' : ''; ?>" style="<?= $r ? 'margin-top:6px' : ''; ?>">
      <div class="marquee-track">
        <?php for ($loop = 0; $loop < 2; $loop++): foreach ($row as $a): ?>
          <a href="<?= base_url('divisi/' . divisi_slug($a->divisi)); ?>" class="chip-person" <?= $loop ? 'aria-hidden="true" tabindex="-1"' : ''; ?>>
            <?php if (foto_url($a->foto)): ?><img src="<?= foto_url($a->foto); ?>" alt="" loading="lazy"><?php else: ?><span class="avatar"><?= html_escape(initials($a->nama)); ?></span><?php endif; ?>
            <span><b><?= html_escape($a->nama); ?></b><span><?= html_escape($a->jabatan . ' · ' . $a->divisi); ?></span></span>
          </a>
        <?php endforeach; endfor; ?>
      </div>
    </div>
  <?php endforeach; ?>
  <div class="wrap" style="text-align:center;margin-top:30px">
    <a href="<?= base_url('pengurus'); ?>" class="btn btn-primary reveal">Lihat semua pengurus <?= icon('arrow-right'); ?></a>
  </div>
</section>

<!-- ================= PROGRAM KERJA ================= -->
<section class="section alt" id="proker">
  <div class="wrap">
    <div class="section-head center reveal">
      <p class="eyebrow">Program Kerja</p>
      <h2>Yang sedang dan sudah <span class="mark">kami kerjakan</span></h2>
      <p><?= $proker_selesai; ?> dari <?= $total_proker; ?> program kerja kabinet sudah terlaksana.</p>
    </div>
    <div class="pgrid">
      <?php foreach ($prokers as $i => $p) $this->load->view('partials/proker_card', ['p' => $p, 'd' => ($i % 3) * .1]); ?>
    </div>
    <div style="text-align:center;margin-top:34px">
      <a href="<?= base_url('program-kerja'); ?>" class="btn btn-primary reveal">Semua program kerja <?= icon('arrow-right'); ?></a>
    </div>
  </div>
</section>

<!-- ================= STAFF INTERN ================= -->
<?php if (!empty($interns)): ?>
<section class="section">
  <div class="wrap intern-intro">
    <div class="div-photo reveal from-left">
      <img src="<?= base_url('assets/img/intern/pelantikan.jpg'); ?>" alt="Pelantikan Staff Intern HIMASTIKA" loading="lazy">
    </div>
    <div class="reveal from-right">
      <p class="eyebrow">Staff Intern</p>
      <div class="section-head" style="margin-bottom:20px">
        <h2>Generasi berikutnya sedang <span class="mark">belajar</span></h2>
        <p><?= html_escape($kab['intern']); ?></p>
      </div>
      <div class="faces" style="margin-bottom:22px">
        <?php foreach ($interns as $in): if (foto_url($in->foto)): ?>
          <img src="<?= foto_url($in->foto); ?>" alt="<?= html_escape($in->nama); ?>" title="<?= html_escape($in->nama); ?>" style="width:46px;height:46px;margin-left:-12px;object-position:top" loading="lazy">
        <?php endif; endforeach; ?>
      </div>
      <a href="<?= base_url('staff-intern'); ?>" class="btn btn-primary">Kenali staff intern <?= icon('arrow-right'); ?></a>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- ================= GALERI ================= -->
<?php if (!empty($galeri)): ?>
<section class="section alt">
  <div class="wrap">
    <div class="section-head center reveal">
      <p class="eyebrow">Galeri</p>
      <h2>Momen <span class="mark">kebersamaan</span></h2>
      <p>Dokumentasi kegiatan dan program kerja HIMASTIKA. Klik foto untuk memperbesar.</p>
    </div>
    <div class="gallery-strip">
      <?php foreach (array_slice($galeri, 0, 7) as $i => $g): if (!foto_url($g->foto)) continue; ?>
        <a href="<?= foto_url($g->foto); ?>" class="gitem reveal zoom" style="--d:<?= $i * .06; ?>s" data-lightbox="home" data-caption="<?= html_escape($g->judul); ?>">
          <img src="<?= foto_url($g->foto); ?>" alt="<?= html_escape($g->judul); ?>" loading="lazy">
          <figcaption><?= html_escape($g->judul); ?></figcaption>
        </a>
      <?php endforeach; ?>
    </div>
    <div style="text-align:center;margin-top:30px">
      <a href="<?= base_url('galeri'); ?>" class="btn btn-primary reveal">Buka galeri <?= icon('arrow-right'); ?></a>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- ================= INFORMASI ================= -->
<?php if (!empty($informasi)): ?>
<section class="section" id="informasi">
  <div class="wrap">
    <div class="section-head center reveal">
      <p class="eyebrow">Informasi</p>
      <h2>Pengumuman terbaru</h2>
    </div>
    <div class="info-list">
      <?php foreach ($informasi as $i => $inf): ?>
        <article class="info reveal" style="--d:<?= $i * .1; ?>s">
          <span class="date-chip"><b><?= date('j', strtotime($inf->tanggal)); ?></b><small><?= bulan_singkat($inf->tanggal); ?></small></span>
          <div>
            <h3><?= html_escape($inf->judul); ?></h3>
            <p><?= nl2br(html_escape($inf->deskripsi)); ?></p>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<section class="section" style="padding-top:<?= empty($informasi) ? '96px' : '0'; ?>">
  <div class="wrap">
    <div class="cta-band reveal zoom">
      <div>
        <h2>Siap jadi bagian dari HIMASTIKA?</h2>
        <p>Pendaftaran anggota baru dibuka untuk seluruh mahasiswa Teknik Informatika Universitas Esa Unggul.</p>
      </div>
      <a href="<?= base_url('daftar'); ?>" class="btn btn-yellow btn-lg"><?= icon('user-plus'); ?> Daftar Sekarang</a>
    </div>
  </div>
</section>
