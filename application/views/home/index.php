<?php
$this->load->view('layouts/public_header');

// Ringkasan tiap divisi (silakan sesuaikan deskripsinya)
$info_divisi = [
    'Badan Pengurus Harian'    => ['layers',    'Ketua, sekretaris dan bendahara yang mengarahkan dan mengoordinasikan seluruh divisi.'],
    'Sinergi'                  => ['users',     'Menjaga kekompakan internal dan hubungan antaranggota himpunan.'],
    'Dukungan dan Solidaritas' => ['heart',     'Kegiatan sosial dan kepedulian untuk mahasiswa dan masyarakat.'],
    'Kajian Strategis'         => ['target',    'Menampung aspirasi mahasiswa dan mengkaji isu yang berdampak pada jurusan.'],
    'Inovasi dan Prestasi'     => ['trophy',    'Mendorong prestasi akademik, lomba dan pengembangan skill teknologi.'],
    'Kreativa dan Komunikasi'  => ['pen-tool',  'Desain, dokumentasi dan pengelolaan media sosial HIMASTIKA.'],
    'Kemitraan dan Relasi'     => ['handshake', 'Membangun kerja sama dengan himpunan lain, alumni dan mitra industri.'],
];
$tones = ['tone-blue', 'tone-yellow', 'tone-green', 'tone-purple', 'tone-rose'];
?>

<section class="hero">
  <div class="wrap">
    <div>
      <span class="pill"><?= icon('sparkles'); ?> Kabinet Sinergi Harmoni</span>
      <h1>Tumbuh bersama di <em>Teknik Informatika</em> Esa Unggul.</h1>
      <p class="lead">HIMASTIKA adalah rumah bagi mahasiswa Teknik Informatika Universitas Esa Unggul untuk belajar, berkarya dan berkontribusi lewat program kerja yang nyata.</p>
      <div class="cta">
        <a href="<?= base_url('daftar'); ?>" class="btn btn-yellow btn-lg"><?= icon('user-plus'); ?> Daftar Jadi Anggota</a>
        <a href="#proker" class="btn btn-outline-light btn-lg">Lihat Program Kerja</a>
      </div>
    </div>
    <div class="hero-art" aria-hidden="true">
      <span class="ring r1"></span>
      <span class="ring r2"></span>
      <div class="logo-disc"><img src="<?= base_url('assets/img/logo-himastika.jpg'); ?>" alt=""></div>
      <span class="chip c1"><?= icon('users'); ?> <?= $total_anggota; ?> anggota aktif</span>
      <span class="chip c2"><?= icon('check-circle'); ?> <?= $proker_selesai; ?> program terlaksana</span>
    </div>
  </div>
</section>

<div class="stat-strip">
  <div class="wrap">
    <div class="inner">
      <div class="item"><b><?= $total_anggota; ?></b><span>Anggota &amp; pengurus</span></div>
      <div class="item"><b><?= $total_divisi; ?></b><span>Divisi</span></div>
      <div class="item"><b><?= $total_proker; ?></b><span>Program kerja</span></div>
      <div class="item"><b><?= $proker_selesai; ?></b><span>Sudah terlaksana</span></div>
    </div>
  </div>
</div>

<section class="section" id="tentang">
  <div class="wrap about-grid">
    <div class="reveal">
      <p class="eyebrow">Tentang Kami</p>
      <div class="section-head" style="margin-bottom:20px">
        <h2>Wadah mahasiswa Teknik Informatika untuk bergerak bersama.</h2>
        <p>Himpunan Mahasiswa Teknik Informatika (HIMASTIKA) menjadi penghubung antara mahasiswa, dosen dan jurusan. Lewat kabinet Sinergi Harmoni, kami menghadirkan kegiatan akademik, sosial dan pengembangan diri yang terbuka untuk semua mahasiswa Teknik Informatika.</p>
      </div>
      <a href="<?= base_url('daftar'); ?>" class="btn btn-primary">Bergabung sekarang <?= icon('arrow-right'); ?></a>
    </div>
    <div class="values reveal">
      <div class="value">
        <span class="stat-icon tone-blue"><?= icon('book'); ?></span>
        <div><h3>Belajar</h3><p>Seminar, studi banding dan kelas skill untuk melengkapi perkuliahan.</p></div>
      </div>
      <div class="value">
        <span class="stat-icon tone-yellow"><?= icon('zap'); ?></span>
        <div><h3>Berkarya</h3><p>Ruang untuk mencoba ide, ikut lomba dan membangun proyek bersama.</p></div>
      </div>
      <div class="value">
        <span class="stat-icon tone-green"><?= icon('heart'); ?></span>
        <div><h3>Berkontribusi</h3><p>Kegiatan sosial dan kolaborasi dengan himpunan serta masyarakat.</p></div>
      </div>
    </div>
  </div>
</section>

<section class="section alt" id="divisi">
  <div class="wrap">
    <div class="section-head center reveal">
      <p class="eyebrow">Struktur Kabinet</p>
      <h2>Divisi HIMASTIKA</h2>
      <p>Setiap divisi punya fokus sendiri. Pilih yang paling cocok dengan minatmu saat mendaftar.</p>
    </div>
    <div class="divisi-grid">
      <?php $k = 0; foreach ($info_divisi as $nama => $d): ?>
        <article class="divisi reveal">
          <span class="stat-icon <?= $tones[$k++ % count($tones)]; ?>"><?= icon($d[0]); ?></span>
          <h3><?= html_escape($nama); ?></h3>
          <p><?= html_escape($d[1]); ?></p>
          <?php
            $jumlah = 0;
            foreach ($per_divisi as $nd => $n) { if (strcasecmp(trim($nd), $nama) === 0) $jumlah = $n; }
          ?>
          <?php if ($jumlah > 0): ?><p class="members"><?= $jumlah; ?> anggota</p><?php endif; ?>
        </article>
      <?php endforeach; ?>
      <a href="<?= base_url('daftar'); ?>" class="divisi reveal" style="background:var(--navy-800);color:#cbd5e1;display:flex;flex-direction:column;justify-content:center">
        <span class="stat-icon" style="background:var(--yellow);color:var(--navy-900)"><?= icon('user-plus'); ?></span>
        <h3 style="color:#fff">Tertarik bergabung?</h3>
        <p style="color:#cbd5e1">Isi formulir pendaftaran dan pilih divisimu.</p>
        <p class="members" style="color:var(--yellow)">Daftar sekarang →</p>
      </a>
    </div>
  </div>
</section>

<section class="section" id="proker">
  <div class="wrap">
    <div class="section-head center reveal">
      <p class="eyebrow">Program Kerja</p>
      <h2>Yang sedang dan sudah kami kerjakan</h2>
      <p><?= $proker_selesai; ?> dari <?= $total_proker; ?> program kerja kabinet sudah terlaksana.</p>
    </div>
    <?php if (!empty($prokers)): ?>
      <div class="proker-grid">
        <?php foreach ($prokers as $p): $done = (int) $p->status === 1; ?>
          <article class="proker reveal">
            <div class="top">
              <span class="stat-icon <?= $done ? 'tone-green' : 'tone-blue'; ?>"><?= icon($done ? 'check-circle' : 'clipboard'); ?></span>
              <span class="badge <?= $done ? 'badge-done' : ''; ?>"><?= $done ? 'Terlaksana' : 'Akan datang'; ?></span>
            </div>
            <h3><?= html_escape($p->judul); ?></h3>
            <?php if (!empty($p->deskripsi)): ?><p><?= html_escape($p->deskripsi); ?></p><?php endif; ?>
            <span class="date"><?= icon('calendar'); ?> <?= tgl($p->tanggal); ?></span>
          </article>
        <?php endforeach; ?>
      </div>
    <?php else: ?>
      <p class="empty">Program kerja akan segera diumumkan.</p>
    <?php endif; ?>
  </div>
</section>

<section class="section alt" id="informasi">
  <div class="wrap">
    <div class="section-head center reveal">
      <p class="eyebrow">Informasi</p>
      <h2>Pengumuman terbaru</h2>
    </div>
    <?php if (!empty($informasi)): ?>
      <div class="info-list">
        <?php foreach ($informasi as $i): ?>
          <article class="info reveal">
            <span class="date-chip"><b><?= date('j', strtotime($i->tanggal)); ?></b><small><?= bulan_singkat($i->tanggal); ?></small></span>
            <div>
              <h3><?= html_escape($i->judul); ?></h3>
              <p><?= nl2br(html_escape($i->deskripsi)); ?></p>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    <?php else: ?>
      <p class="empty">Belum ada pengumuman.</p>
    <?php endif; ?>
  </div>
</section>

<?php if (!empty($pengurus)): ?>
<section class="section" id="pengurus">
  <div class="wrap">
    <div class="section-head center reveal">
      <p class="eyebrow">Pengurus</p>
      <h2>Orang-orang di balik HIMASTIKA</h2>
      <p>Badan Pengurus Harian dan koordinator divisi Kabinet Sinergi Harmoni.</p>
    </div>
    <div class="team-grid">
      <?php foreach ($pengurus as $a): ?>
        <div class="member reveal">
          <span class="avatar"><?= html_escape(initials($a->nama)); ?></span>
          <b><?= html_escape($a->nama); ?></b>
          <span><?= html_escape($a->jabatan); ?> · <?= html_escape($a->divisi); ?></span>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<section class="section" style="padding-top:0">
  <div class="wrap">
    <div class="cta-band reveal">
      <div>
        <h2>Siap jadi bagian dari HIMASTIKA?</h2>
        <p>Pendaftaran anggota baru dibuka untuk seluruh mahasiswa Teknik Informatika Universitas Esa Unggul.</p>
      </div>
      <a href="<?= base_url('daftar'); ?>" class="btn btn-yellow btn-lg"><?= icon('user-plus'); ?> Daftar Sekarang</a>
    </div>
  </div>
</section>

<?php $this->load->view('layouts/public_footer'); ?>
