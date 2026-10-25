<?php
$title  = isset($title) ? $title : 'HIMASTIKA UEU · Himpunan Mahasiswa Teknik Informatika';
$solid  = !empty($solid_nav);
$active = isset($active) ? $active : '';
$menu = [
    'home'     => ['', 'Beranda'],
    'pengurus' => ['pengurus', 'Pengurus'],
    'divisi'   => ['#divisi', 'Divisi'],
    'proker'   => ['program-kerja', 'Program Kerja'],
    'intern'   => ['staff-intern', 'Staff Intern'],
    'galeri'   => ['galeri', 'Galeri'],
];
?><!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= html_escape($title); ?></title>
<meta name="description" content="HIMASTIKA, Himpunan Mahasiswa Jurusan Teknik Informatika Universitas Esa Unggul. Kabinet Sinergi Harmoni 2024/2025.">
<meta name="theme-color" content="#0b1f4d">
<meta property="og:title" content="<?= html_escape($title); ?>">
<meta property="og:image" content="<?= base_url('assets/img/hero/kabinet.jpg'); ?>">
<link rel="icon" href="<?= base_url('assets/img/logo-himastika.jpg'); ?>">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('assets/css/app.css'); ?>">
</head>
<body class="pub">
<div class="scroll-progress" aria-hidden="true"></div>

<header class="pub-nav" id="pubNav" <?= $solid ? 'data-solid' : ''; ?>>
  <div class="wrap">
    <a href="<?= base_url(); ?>" class="brand">
      <img src="<?= base_url('assets/img/logo-himastika.jpg'); ?>" alt="Logo HIMASTIKA">
      <div>
        <strong>HIMASTIKA UEU</strong>
        <span>Kabinet Sinergi Harmoni</span>
      </div>
    </a>
    <button class="icon-btn menu-toggle" id="pubMenu" aria-label="Menu" aria-expanded="false"><?= icon('menu'); ?></button>
    <nav id="pubLinks">
      <?php foreach ($menu as $key => $m):
        $href = strpos($m[0], '#') === 0 ? base_url() . $m[0] : base_url($m[0]); ?>
        <a href="<?= $href; ?>" class="<?= $active === $key ? 'current' : ''; ?>"><?= $m[1]; ?></a>
      <?php endforeach; ?>
      <a href="<?= base_url('daftar'); ?>" class="btn btn-yellow btn-sm">Daftar Anggota</a>
    </nav>
  </div>
</header>
