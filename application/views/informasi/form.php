<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title><?= isset($informasi) ? 'Edit' : 'Tambah'; ?> Informasi | HIMASTIKA</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

<div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-lg">
  <h1 class="text-2xl font-bold text-blue-700 mb-6">
    <?= isset($informasi) ? 'Edit Informasi' : 'Tambah Informasi'; ?>
  </h1>
  <form action="<?= isset($informasi) ? base_url('informasi/update/'.$informasi->id) : base_url('informasi/store'); ?>" method="post" class="space-y-4">
    <input type="text" name="judul" placeholder="Judul Informasi" required value="<?= $informasi->judul ?? ''; ?>"
           class="w-full border px-4 py-3 rounded-lg focus:ring focus:ring-blue-300">
    <textarea name="deskripsi" placeholder="Isi Informasi..." rows="4" required
           class="w-full border px-4 py-3 rounded-lg focus:ring focus:ring-blue-300"><?= $informasi->deskripsi ?? ''; ?></textarea>
    <input type="date" name="tanggal" required value="<?= $informasi->tanggal ?? ''; ?>"
           class="w-full border px-4 py-3 rounded-lg focus:ring focus:ring-blue-300">
    <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition font-semibold">
      Simpan
    </button>
  </form>
</div>

</body>
</html>