<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title><?= isset($row) ? 'Edit' : 'Tambah' ?> Anggota | HIMASTIKA</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<style>
    body { font-family: 'Poppins', sans-serif; }
</style>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

<div class="bg-white shadow-lg rounded-2xl w-full max-w-2xl p-8">
    <!-- Header -->
    <div class="mb-6 text-center">
        <img src="<?= base_url('assets/img/LOGO HIMASTIKA.jpg'); ?>" alt="Logo HIMASTIKA" class="w-16 h-16 mx-auto rounded-full mb-2">
        <h1 class="text-2xl font-bold text-blue-700">
            <?= isset($row) ? 'Edit' : 'Tambah' ?> Anggota
        </h1>
        <p class="text-gray-500 text-sm">Kabinet Sinergi Harmoni</p>
    </div>

    <!-- Form -->
    <form action="<?= isset($row) ? base_url('anggota/edit/'.$row->id) : base_url('anggota/create'); ?>" 
          method="post" class="space-y-5">

        <!-- Nama -->
        <div>
            <label class="block text-gray-700 mb-1 font-semibold">Nama Lengkap</label>
            <input type="text" name="nama" placeholder="Masukkan Nama Lengkap" 
                value="<?= isset($row) ? $row->nama : set_value('nama'); ?>" 
                required
                class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
        </div>

        <!-- NIM & Jabatan -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-700 mb-1 font-semibold">NIM</label>
                <input type="text" name="nim" placeholder="Masukkan NIM" 
                    value="<?= isset($row) ? $row->nim : set_value('nim'); ?>" 
                    required
                    class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-400">
            </div>
            <div>
                <label class="block text-gray-700 mb-1 font-semibold">Jabatan</label>
                <input type="text" name="jabatan" placeholder="Masukkan Jabatan" 
                    value="<?= isset($row) ? $row->jabatan : set_value('jabatan'); ?>" 
                    required
                    class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-400">
            </div>
        </div>

        <!-- Divisi & Telepon -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-700 mb-1 font-semibold">Divisi</label>
                <input type="text" name="divisi" placeholder="Masukkan Divisi" 
                    value="<?= isset($row) ? $row->divisi : set_value('divisi'); ?>" 
                    required
                    class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-400">
            </div>
            <div>
                <label class="block text-gray-700 mb-1 font-semibold">No. Telepon</label>
                <input type="text" name="no_telp" placeholder="Masukkan Nomor Telepon" 
                    value="<?= isset($row) ? $row->no_telp : set_value('no_telp'); ?>" 
                    required
                    class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-400">
            </div>
        </div>

        <!-- Email -->
        <div>
            <label class="block text-gray-700 mb-1 font-semibold">Email</label>
            <input type="email" name="email" placeholder="Masukkan Email" 
                value="<?= isset($row) ? $row->email : set_value('email'); ?>" 
                required
                class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-400">
        </div>

        <!-- Buttons -->
        <div class="flex justify-between items-center mt-6">
            <a href="<?= base_url('anggota'); ?>" 
                class="text-gray-600 hover:text-blue-600 font-semibold">← Kembali</a>
            <button type="submit" 
                class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition font-semibold shadow-md">
                Simpan Data
            </button>
        </div>
    </form>
</div>

</body>
</html>