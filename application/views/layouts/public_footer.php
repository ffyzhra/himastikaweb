<?php $kab = $this->config->item('kabinet'); $divs = $this->config->item('divisi'); ?>
<footer class="pub-footer">
  <div class="wrap">
    <div class="cols four">
      <div>
        <a href="<?= base_url(); ?>" class="brand">
          <img src="<?= base_url('assets/img/logo-himastika.jpg'); ?>" alt="Logo HIMASTIKA">
          <div>
            <strong style="color:#fff">HIMASTIKA UEU</strong>
            <span><?= html_escape($kab['nama'] . ' ' . $kab['periode']); ?></span>
          </div>
        </a>
        <p style="max-width:380px">Himpunan Mahasiswa Jurusan Teknik Informatika, Fakultas Ilmu Komputer, Universitas Esa Unggul, Jakarta.</p>
        <p style="margin-top:14px">
          <a href="mailto:<?= $kab['email']; ?>" style="display:flex;align-items:center;gap:8px"><?= icon('mail'); ?> <?= $kab['email']; ?></a>
          <a href="https://www.instagram.com/<?= $kab['instagram']; ?>" target="_blank" rel="noopener" style="display:flex;align-items:center;gap:8px"><?= icon('globe'); ?> @<?= $kab['instagram']; ?></a>
        </p>
      </div>
      <div>
        <h4>Jelajahi</h4>
        <a href="<?= base_url('pengurus'); ?>">Pengurus</a>
        <a href="<?= base_url('program-kerja'); ?>">Program Kerja</a>
        <a href="<?= base_url('staff-intern'); ?>">Staff Intern</a>
        <a href="<?= base_url('galeri'); ?>">Galeri</a>
      </div>
      <div>
        <h4>Divisi</h4>
        <?php foreach ($divs as $slug => $d): ?>
          <a href="<?= base_url('divisi/' . $slug); ?>"><?= html_escape($d['nama']); ?></a>
        <?php endforeach; ?>
      </div>
      <div>
        <h4>Bergabung</h4>
        <a href="<?= base_url('daftar'); ?>">Daftar Anggota</a>
        <a href="<?= base_url('login'); ?>">Masuk Pengurus</a>
      </div>
    </div>
    <div class="bottom">
      <span>© <?= date('Y'); ?> HIMASTIKA · Universitas Esa Unggul</span>
      <span>Dibangun dengan CodeIgniter 3</span>
    </div>
  </div>
</footer>

<button class="to-top" aria-label="Kembali ke atas"><?= icon('arrow-right'); ?></button>
<div class="lightbox" id="lightbox" role="dialog" aria-modal="true" aria-label="Foto">
  <button class="lb-close" aria-label="Tutup"><?= icon('x'); ?></button>
  <button class="lb-btn lb-prev" aria-label="Sebelumnya"><?= icon('arrow-right'); ?></button>
  <figure style="margin:0;text-align:center"><img alt="" hidden><figcaption class="cap"></figcaption></figure>
  <button class="lb-btn lb-next" aria-label="Berikutnya"><?= icon('arrow-right'); ?></button>
</div>
<script src="<?= base_url('assets/js/app.js'); ?>"></script>
</body>
</html>
