<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Pengelola | HIMASTIKA</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<style>body{font-family:'Poppins',sans-serif;}</style>
</head>
<body class="bg-gray-100 flex">

<!-- Sidebar -->
<?php include 'sidebar.php'; ?>

<!-- Main Content -->
<div class="flex-1">
<header class="bg-white p-6 shadow flex justify-between items-center">
    <h2 class="text-2xl font-semibold text-gray-700">Manajemen Pengelola</h2>
    <a href="<?= base_url('pengelola/create'); ?>" class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition font-semibold">+ Tambah Pengelola</a>
</header>

<section class="p-6">
<div class="bg-white rounded-xl shadow overflow-x-auto">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-blue-100 text-blue-700 uppercase text-sm">
                <th class="py-3 px-4">Nama</th>
                <th class="py-3 px-4">Username</th>
                <th class="py-3 px-4">Role</th>
                <th class="py-3 px-4 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($users as $u): ?>
            <tr class="border-b hover:bg-gray-50">
                <td class="py-3 px-4"><?= htmlspecialchars($u->nama); ?></td>
                <td class="py-3 px-4"><?= htmlspecialchars($u->username); ?></td>
                <td class="py-3 px-4"><?= htmlspecialchars($u->role); ?></td>
                <td class="py-3 px-4 text-center">
                    <a href="<?= base_url('pengelola/delete/'.$u->id); ?>" onclick="return confirm('Hapus pengelola ini?')" class="text-red-500 hover:underline font-semibold">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</section>
</div>
</body>
</html>