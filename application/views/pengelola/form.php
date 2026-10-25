<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Tambah Pengelola | HIMASTIKA</title>
<script src="https://cdn.tailwindcss.com"></script>
<style>body{font-family:'Poppins',sans-serif;}</style>
</head>
<body class="bg-gray-100 flex">
<div class="max-w-lg mx-auto mt-10 bg-white p-6 rounded-lg shadow">
    <h2 class="text-2xl font-semibold mb-4">Tambah Pengelola</h2>
    <form method="post" class="space-y-4">
        <input type="text" name="nama" placeholder="Nama Lengkap" class="w-full border p-3 rounded" required>
        <input type="text" name="username" placeholder="Username" class="w-full border p-3 rounded" required>
        <input type="password" name="password" placeholder="Password" class="w-full border p-3 rounded" required>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
    </form>
</div>
</body>
</html>