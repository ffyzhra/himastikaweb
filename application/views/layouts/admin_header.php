<?php
$username = $this->session->userdata('username') ?: 'Admin';
$menu = [
    ['dashboard',   'Dashboard',     'home'],
    ['anggota',     'Anggota',       'users'],
    ['pendaftaran', 'Pendaftar',     'user-plus'],
    ['proker',      'Program Kerja', 'clipboard'],
    ['informasi',   'Informasi',     'megaphone'],
    ['intern',      'Staff Intern',  'user'],
    ['dokumentasi', 'Dokumentasi',   'layers'],
    ['todo',        'To-Do List',    'check-sq'],
];
?><!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= html_escape($page_title); ?> · HIMASTIKA UEU</title>
<link rel="icon" href="<?= base_url('assets/img/logo-himastika.jpg'); ?>">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('assets/css/app.css'); ?>">
</head>
<body>
<div class="admin">

  <aside class="sidebar" id="sidebar">
    <a href="<?= base_url('dashboard'); ?>" class="brand">
      <img src="<?= base_url('assets/img/logo-himastika.jpg'); ?>" alt="Logo HIMASTIKA">
      <div>
        <strong>HIMASTIKA UEU</strong>
        <span>Kabinet Sinergi Harmoni</span>
      </div>
    </a>

    <p class="nav-label">Menu</p>
    <nav class="nav">
      <?php foreach ($menu as $m): ?>
        <a href="<?= base_url($m[0]); ?>" class="<?= $active === $m[0] ? 'active' : ''; ?>">
          <?= icon($m[2]); ?> <?= $m[1]; ?>
        </a>
      <?php endforeach; ?>
    </nav>

    <div class="sidebar-foot">
      <a href="<?= base_url(); ?>" target="_blank" rel="noopener"><?= icon('globe'); ?> Lihat Website</a>
      <a href="<?= base_url('login/logout'); ?>" class="logout"><?= icon('logout'); ?> Keluar</a>
    </div>
  </aside>
  <div class="backdrop" id="backdrop"></div>

  <div class="main">
    <header class="topbar">
      <button class="icon-btn menu-btn" id="menuBtn" aria-label="Buka menu"><?= icon('menu'); ?></button>
      <div>
        <p class="crumb">Panel Admin</p>
        <h1><?= html_escape($page_title); ?></h1>
      </div>
      <div class="user">
        <span><?= html_escape($username); ?></span>
        <span class="avatar"><?= html_escape(initials($username)); ?></span>
      </div>
    </header>

    <main class="content">
      <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success"><?= icon('check-circle'); ?> <?= html_escape($this->session->flashdata('success')); ?></div>
      <?php endif; ?>
      <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-error"><?= icon('alert'); ?> <?= html_escape($this->session->flashdata('error')); ?></div>
      <?php endif; ?>
