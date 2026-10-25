<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Edit Program Kerja | HIMASTIKA UEU</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<style>
    body { font-family: 'Poppins', sans-serif; margin: 0; background: #f4f6f9; color: #333; }
    header { background: #1e3a8a; color: white; padding: 15px 30px; display: flex; justify-content: space-between; align-items: center; }
    header img { width: 50px; height: 50px; border-radius: 50%; margin-right: 15px; }
    header h1 { margin: 0; font-size: 20px; }
    .subtitle { font-size: 14px; color: #c7d2fe; }
    nav a { color: white; text-decoration: none; font-weight: 600; margin-left: 15px; padding: 8px 14px; border-radius: 6px; transition: background 0.3s ease; }
    nav a:hover { background: #2563eb; }
    .container { max-width: 600px; margin: 30px auto; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
    h2 { color: #1e3a8a; margin-bottom: 20px; }
    .form-group { margin-bottom: 15px; }
    label { font-weight: 600; display: block; margin-bottom: 6px; }
    input, textarea { width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px; font-size: 14px; }
    button { background: #2563eb; color: white; padding: 12px; width: 100%; border: none; border-radius: 6px; font-weight: 600; cursor: pointer; transition: 0.3s; }
    button:hover { background: #1d4ed8; }
    .btn-back { display: inline-block; margin-top: 10px; color: #2563eb; text-decoration: none; }
    .btn-back:hover { text-decoration: underline; }
</style>
</head>
<body>

<header>
    <div style="display: flex; align-items: center;">
        <img src="<?= base_url('assets/img/LOGO HIMASTIKA.jpg'); ?>" alt="Logo HIMASTIKA">
        <div>
            <h1>HIMASTIKA UEU</h1>
            <p class="subtitle">Kabinet Sinergi Harmoni</p>
        </div>
    </div>
    <nav>
        <a href="<?= base_url('dashboard'); ?>">Dashboard</a>
        <a href="<?= base_url('anggota'); ?>">Anggota</a>
        <a href="<?= base_url('pendaftaran'); ?>">Pendaftar</a>
        <a href="<?= base_url('proker'); ?>" style="background:#2563eb;">Program Kerja</a>
        <a href="<?= base_url('todo'); ?>">To-Do List</a>
        <a href="<?= base_url('informasi'); ?>">Informasi</a>
        <a href="<?= base_url('login/logout'); ?>" style="background:#dc2626;">Logout</a>
    </nav>
</header>

<div class="container">
    <h2>Edit Program Kerja</h2>
    <form action="<?= base_url('proker/update/'.$proker->id); ?>" method="post">
        <div class="form-group">
            <label for="judul">Nama Program Kerja</label>
            <input type="text" id="judul" name="judul" value="<?= htmlspecialchars($proker->judul); ?>" required>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" rows="4"><?= htmlspecialchars($proker->deskripsi); ?></textarea>
        </div>
        <div class="form-group">
            <label for="tanggal">Tanggal Pelaksanaan</label>
            <input type="date" id="tanggal" name="tanggal" value="<?= $proker->tanggal; ?>" required>
        </div>
        <button type="submit">Update</button>
    </form>
    <a href="<?= base_url('proker'); ?>" class="btn-back">← Kembali ke daftar</a>
</div>

</body>
</html>