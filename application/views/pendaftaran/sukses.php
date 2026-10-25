<?php $this->load->view('layouts/public_header', ['title' => 'Pendaftaran Terkirim · HIMASTIKA UEU', 'solid_nav' => true]); ?>
<section class="section" style="padding-top:150px;min-height:80vh">
  <div class="wrap">
    <div class="success-box">
      <span class="check"><?= icon('check'); ?></span>
      <h1 style="font-size:2rem">Pendaftaran terkirim!</h1>
      <p class="cell-muted" style="font-size:1.02rem">Terima kasih sudah mendaftar. Pengurus HIMASTIKA akan meninjau data dan berkasmu, lalu menghubungimu lewat email atau WhatsApp.</p>
      <div style="display:flex;gap:10px;flex-wrap:wrap;justify-content:center;margin-top:8px">
        <a href="<?= base_url(); ?>" class="btn btn-primary"><?= icon('home'); ?> Kembali ke Beranda</a>
        <a href="<?= base_url(); ?>#proker" class="btn btn-ghost">Lihat Program Kerja</a>
      </div>
    </div>
  </div>
</section>
<?php $this->load->view('layouts/public_footer'); ?>
