<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Form Pendaftaran Anggota | HIMASTIKA</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<style>
    body { font-family: 'Poppins', sans-serif; }
</style>
</head>
<body class="bg-gradient-to-r from-blue-50 to-blue-100 min-h-screen flex items-center justify-center p-4">

<div class="bg-white shadow-2xl rounded-2xl w-full max-w-2xl p-8">
    <!-- Header -->
    <div class="mb-6 text-center">
        <img src="<?= base_url('assets/img/LOGO HIMASTIKA.jpg'); ?>" alt="Logo HIMASTIKA" 
             class="w-20 h-20 mx-auto rounded-full shadow mb-3">
        <h1 class="text-3xl font-bold text-blue-700">Form Pendaftaran Anggota</h1>
        <p class="text-gray-500 text-sm">Kabinet Sinergi Harmoni</p>
    </div>

    <!-- Form -->
   <form action="<?= base_url('pendaftaran/store'); ?>" method="post" enctype="multipart/form-data">
        
        <!-- Nama -->
        <div>
            <label class="block text-gray-700 mb-1 font-semibold">Nama Lengkap</label>
            <input type="text" name="nama" placeholder="Masukkan Nama Lengkap" required
                   class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
        </div>

        <!-- NIM & Angkatan -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-700 mb-1 font-semibold">NIM</label>
                <input type="text" name="nim" placeholder="Masukkan NIM" required
                       class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-400">
            </div>
            <div>
                <label class="block text-gray-700 mb-1 font-semibold">Angkatan</label>
                <input type="number" name="angkatan" placeholder="Contoh: 2023" required
                       class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-400">
            </div>
        </div>

        <!-- Divisi -->
        <div>
            <label class="block text-gray-700 mb-1 font-semibold">Pilih Divisi</label>
            <select name="divisi" required
                    class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-400">
                <option value="">-- Pilih Divisi --</option>
                <option value="Sekretaris">Sekretaris</option>
                <option value="Bendahara">Bendahara</option>
                <option value="Sinergi">Sinergi</option>
                <option value="Dukungan dan Solidaritas">Dukungan dan Solidaritas</option>
                <option value="Kajian Strategis">Kajian Strategis</option>
                <option value="Inovasi dan Prestasi">Inovasi dan Prestasi</option>
                <option value="Kreativa dan Komunikasi">Kreativa dan Komunikasi</option>
                <option value="Relasi dan Kemitraan">Relasi dan Kemitraan</option>
            </select>
        </div>

        <!-- Email -->
<div>
    <label class="block text-gray-700 mb-1 font-semibold">Email</label>
    <input type="email" name="email" placeholder="Masukkan Email" required
           class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
</div>

<!-- Nomor Telepon -->
<div>
    <label class="block text-gray-700 mb-1 font-semibold">Nomor Telepon</label>
    <input type="text" name="no_telp" placeholder="Masukkan Nomor Telepon" required
           class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
</div>

        <!-- Upload KRS -->
        <div>
            <label class="block text-gray-700 mb-1 font-semibold">Upload KRS (PDF/JPG/PNG)</label>
            <input type="file" name="krs" accept=".pdf,.jpg,.jpeg,.png"
                   class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400">
            <p class="text-gray-500 text-xs mt-1">Format: PDF/JPG/PNG, Max: 2MB</p>
        </div>

        <!-- Upload KHS -->
        <div>
            <label class="block text-gray-700 mb-1 font-semibold">Upload KHS (PDF/JPG/PNG)</label>
            <input type="file" name="khs" accept=".pdf,.jpg,.jpeg,.png"
                   class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400">
            <p class="text-gray-500 text-xs mt-1">Format: PDF/JPG/PNG, Max: 2MB</p>
        </div>

        <!-- Alasan -->
        <div>
            <label class="block text-gray-700 mb-1 font-semibold">Alasan Bergabung</label>
            <textarea name="alasan" rows="4" placeholder="Mengapa ingin bergabung?" required
                      class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-400"></textarea>
        </div>

        <!-- Tombol -->
        <div class="flex justify-between items-center mt-6">
            <a href="<?= base_url('pendaftaran'); ?>" 
               class="text-gray-600 hover:text-blue-600 font-semibold">← Kembali</a>
            <button type="submit" 
                    class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition font-semibold shadow-md">
                ✅ Kirim Pendaftaran
            </button>
        </div>
    </form>
</div>

</body>
</html>