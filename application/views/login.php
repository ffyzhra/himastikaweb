<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Masuk · HIMASTIKA UEU</title>
<link rel="icon" href="<?= base_url('assets/img/logo-himastika.jpg'); ?>">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('assets/css/app.css'); ?>">
</head>
<body>
<div class="auth">

  <section class="auth-brand">
    <div class="logo-row">
      <img src="<?= base_url('assets/img/logo-himastika.jpg'); ?>" alt="Logo HIMASTIKA">
      <div>
        <strong>HIMASTIKA UEU</strong>
        <span>Himpunan Mahasiswa Teknik Informatika</span>
      </div>
    </div>

    <div>
      <h2>Kelola himpunan dalam <em>satu tempat.</em></h2>
      <p class="lead">Anggota, pendaftaran, program kerja, informasi dan to-do list Kabinet Sinergi Harmoni, semuanya rapi dan mudah dipantau.</p>
    </div>

    <p class="foot">© <?= date('Y'); ?> HIMASTIKA · Universitas Esa Unggul</p>
  </section>

  <section class="auth-form">
    <div class="box">
      <a href="<?= base_url(); ?>" class="back"><?= icon('arrow-left', 'icon'); ?> Kembali ke website</a>

      <div>
        <h1>Masuk ke Panel Admin</h1>
        <p class="sub">Gunakan akun pengurus HIMASTIKA.</p>
      </div>

      <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-error"><?= icon('alert'); ?> <?= html_escape($this->session->flashdata('error')); ?></div>
      <?php endif; ?>

      <form action="<?= base_url('login/auth'); ?>" method="post" class="form-grid">
        <div class="field">
          <label for="username">Username</label>
          <div class="input-icon">
            <?= icon('user'); ?>
            <input class="input" type="text" name="username" id="username" placeholder="Masukkan username" autocomplete="username" required autofocus>
          </div>
        </div>
        <div class="field">
          <label for="password">Password</label>
          <div class="input-icon password-wrap">
            <?= icon('lock'); ?>
            <input class="input" type="password" name="password" id="password" placeholder="Masukkan password" autocomplete="current-password" required>
            <button type="button" class="icon-btn toggle-pw" aria-label="Tampilkan password"><?= icon('eye'); ?></button>
          </div>
        </div>
        <button type="submit" class="btn btn-primary btn-lg btn-block">Masuk <?= icon('arrow-right'); ?></button>
      </form>
    </div>
  </section>

</div>
<script src="<?= base_url('assets/js/app.js'); ?>"></script>
</body>
</html>
