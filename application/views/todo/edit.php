<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Edit Tugas | HIMASTIKA</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<style>
    body { font-family: 'Poppins', sans-serif; }
</style>
</head>
<body class="bg-gray-100">

<!-- Navbar -->
<nav class="bg-blue-700 text-white p-4 flex justify-between items-center shadow-md">
  <h1 class="text-xl font-bold">Edit Tugas</h1>
  <a href="<?= base_url('todo'); ?>" 
     class="bg-white text-blue-700 px-4 py-2 rounded-lg hover:bg-blue-100 transition font-semibold">
    Kembali
  </a>
</nav>

<!-- Container -->
<div class="p-6 max-w-lg mx-auto">
  <div class="bg-white p-8 rounded-xl shadow-md">
    <h2 class="text-2xl font-semibold mb-6 text-gray-700">Perbarui Informasi Tugas</h2>
    
    <form action="<?= base_url('todo/update/'.$todo->id); ?>" method="post" class="space-y-5">
      
      <!-- Nama Tugas -->
      <div>
        <label class="block text-gray-600 font-medium mb-2">Nama Tugas</label>
        <input type="text" name="task" value="<?= htmlspecialchars($todo->task); ?>" required
               class="w-full border px-4 py-3 rounded-lg focus:ring focus:ring-blue-300 focus:outline-none">
      </div>

      <!-- Deadline -->
      <div>
        <label class="block text-gray-600 font-medium mb-2">Tenggat Waktu</label>
        <input type="datetime-local" name="deadline" 
               value="<?= (!empty($todo->deadline) && $todo->deadline != '0000-00-00 00:00:00') 
                          ? date('Y-m-d\TH:i', strtotime($todo->deadline)) 
                          : date('Y-m-d\TH:i'); ?>"
               class="w-full border px-4 py-3 rounded-lg focus:ring focus:ring-blue-300 focus:outline-none">
      </div>

      <!-- Tombol Simpan -->
      <button type="submit" 
              class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition font-semibold">
        ✅ Simpan Perubahan
      </button>
    </form>
  </div>
</div>

</body>
</html>