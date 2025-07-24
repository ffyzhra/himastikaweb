<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard HIMASTIKA</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<style>
  body { font-family: 'Poppins', sans-serif; }
</style>
</head>
<body class="bg-gray-100 flex">

<!-- Sidebar -->
<aside class="w-64 bg-blue-800 text-white min-h-screen flex flex-col justify-between shadow-lg">
  <div>
    <!-- Logo -->
    <div class="flex flex-col items-center py-6 border-b border-blue-600">
      <img src="<?= base_url('assets/img/LOGO HIMASTIKA.jpg'); ?>" alt="Logo HIMASTIKA" class="w-20 h-20 rounded-full mb-3 border-4 border-white">
      <h1 class="text-xl font-bold">HIMASTIKA UEU</h1>
      <p class="text-blue-300 text-sm">Kabinet Sinergi Harmoni</p>
    </div>

    <!-- Navigation -->
    <nav class="mt-6 space-y-2 px-4">
      <a href="<?= base_url('dashboard'); ?>" class="block px-4 py-2 rounded-lg hover:bg-blue-700 font-medium">🏠 Dashboard</a>
      <a href="<?= base_url('anggota'); ?>" class="block px-4 py-2 rounded-lg hover:bg-blue-700 font-medium">👥 Anggota</a>
      <a href="<?= base_url('pendaftaran'); ?>" class="block px-4 py-2 rounded-lg hover:bg-blue-700 font-medium">📝 Pendaftar</a>
      <a href="<?= base_url('proker'); ?>" class="block px-4 py-2 rounded-lg hover:bg-blue-700 font-medium">📋 Program Kerja</a>
      <a href="<?= base_url('informasi'); ?>" class="block px-4 py-2 rounded-lg hover:bg-blue-700 font-medium">ℹ️ Informasi</a>
      <a href="<?= base_url('todo'); ?>" class="block px-4 py-2 rounded-lg hover:bg-blue-700 font-medium">✅ To-Do List</a>
    </nav>
  </div>

  <!-- Logout -->
  <div class="p-4">
    <a href="<?= base_url('login/logout'); ?>" class="block bg-red-500 hover:bg-red-600 text-center py-2 rounded-lg font-semibold">
      Logout
    </a>
  </div>
</aside>

<!-- Main Content -->
<div class="flex-1">
  <!-- Header -->
  <header class="bg-white p-6 shadow flex justify-between items-center">
    <div>
      <h2 class="text-2xl font-semibold text-gray-700">Selamat Datang, 
        <span class="text-blue-600"><?= $this->session->userdata('nama'); ?></span>
      </h2>
      <p class="text-gray-500 text-sm">Dashboard HIMASTIKA</p>
    </div>
  </header>

  <!-- Cards Section -->
  <section class="p-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 mt-4">
    <?php
      $cards = [
        ['label'=>'Anggota','count'=>$totalAnggota ?? 0,'url'=>'anggota','icon'=>'👥'],
        ['label'=>'To-Do','count'=>$totalTodo ?? 0,'url'=>'todo','icon'=>'✅'],
        ['label'=>'Pendaftar','count'=>$totalPendaftar ?? 0,'url'=>'pendaftaran','icon'=>'📝'],
        ['label'=>'Proker','count'=>$totalProker ?? 0,'url'=>'proker','icon'=>'📋'],
        ['label'=>'Informasi','count'=>$totalInformasi ?? 0,'url'=>'informasi','icon'=>'ℹ️'],
      ];
      foreach ($cards as $c): ?>
      <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
        <div class="text-4xl mb-2"><?= $c['icon']; ?></div>
        <h3 class="text-gray-600 font-medium"><?= $c['label']; ?></h3>
        <p class="text-3xl font-bold text-blue-600"><?= $c['count']; ?></p>
        <a href="<?= base_url($c['url']); ?>" class="text-blue-500 hover:underline text-sm">Lihat Detail</a>
      </div>
    <?php endforeach; ?>
  </section>

  <!-- Proker & Informasi -->
  <section class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
    <!-- Program Kerja -->
    <div class="bg-white p-6 rounded-xl shadow">
      <h3 class="text-xl font-semibold text-gray-700 mb-4">Program Kerja Aktif</h3>
      <?php if(!empty($proker)): ?>
      <ul class="list-disc pl-5 text-gray-600 space-y-2">
        <?php foreach($proker as $p): ?>
          <li><?= htmlspecialchars($p->judul); ?> - <?= date('d M Y', strtotime($p->tanggal)); ?></li>
        <?php endforeach; ?>
      </ul>
      <?php else: ?>
        <p class="text-gray-400">Belum ada program kerja.</p>
      <?php endif; ?>
      <a href="<?= base_url('proker'); ?>" class="text-blue-600 font-semibold hover:underline mt-3 block">
        Lihat Semua Proker →
      </a>
    </div>

    <!-- Informasi -->
    <div class="bg-white p-6 rounded-xl shadow">
      <h3 class="text-xl font-semibold text-gray-700 mb-4">Informasi Terbaru</h3>
      <?php if(!empty($informasi)): ?>
      <ul class="list-disc pl-5 text-gray-600 space-y-2">
        <?php foreach($informasi as $i): ?>
          <li><?= htmlspecialchars($i->judul); ?></li>
        <?php endforeach; ?>
      </ul>
      <?php else: ?>
        <p class="text-gray-400">Belum ada informasi terbaru.</p>
      <?php endif; ?>
      <a href="<?= base_url('informasi'); ?>" class="text-blue-600 font-semibold hover:underline mt-3 block">
        Lihat Semua Informasi →
      </a>
    </div>
  </section>
</div>

</body>
</html>