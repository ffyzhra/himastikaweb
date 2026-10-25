<?php
$title = isset($title) ? $title : 'HIMASTIKA UEU · Himpunan Mahasiswa Teknik Informatika';
$solid = !empty($solid_nav);
$home  = base_url();
?><!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= html_escape($title); ?></title>
<meta name="description" content="HIMASTIKA, Himpunan Mahasiswa Teknik Informatika Universitas Esa Unggul. Kabinet Sinergi Harmoni.">
<meta name="theme-color" content="#0b1f4d">
<link rel="icon" href="<?= base_url('assets/img/logo-himastika.jpg'); ?>">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('assets/css/app.css'); ?>">
</head>
<body class="pub">

<header class="pub-nav" id="pubNav" <?= $solid ? 'data-solid' : ''; ?>>
  <div class="wrap">
    <a href="<?= $home; ?>" class="brand">
      <img src="<?= base_url('assets/img/logo-himastika.jpg'); ?>" alt="Logo HIMASTIKA">
      <div>
        <strong>HIMASTIKA UEU</strong>
        <span>Kabinet Sinergi Harmoni</span>
      </div>
    </a>
    <button class="icon-btn menu-toggle" id="pubMenu" aria-label="Menu" aria-expanded="false"><?= icon('menu'); ?></button>
    <nav id="pubLinks">
      <a href="<?= $home; ?>#tentang">Tentang</a>
      <a href="<?= $home; ?>#divisi">Divisi</a>
      <a href="<?= $home; ?>#proker">Program Kerja</a>
      <a href="<?= $home; ?>#informasi">Informasi</a>
      <a href="<?= $home; ?>#pengurus">Pengurus</a>
      <a href="<?= base_url('daftar'); ?>" class="btn btn-yellow btn-sm">Daftar Anggota</a>
    </nav>
  </div>
</header>
