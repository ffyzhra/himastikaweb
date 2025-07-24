<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Manajemen Informasi | HIMASTIKA UEU</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Poppins', sans-serif;
        margin: 0;
        background: #f4f6f9;
        color: #333;
    }
    header {
        background: #1e3a8a;
        color: white;
        padding: 15px 30px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    header img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        margin-right: 15px;
    }
    header h1 {
        font-size: 20px;
        margin: 0;
    }
    header .subtitle {
        font-size: 14px;
        color: #c7d2fe;
    }
    nav {
        display: flex;
        gap: 15px;
    }
    nav a {
        color: white;
        text-decoration: none;
        font-weight: 600;
        padding: 8px 14px;
        border-radius: 6px;
        transition: background 0.3s ease;
    }
    nav a:hover {
        background: #2563eb;
    }
    .container {
        max-width: 1200px;
        margin: 30px auto;
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    .container h2 {
        font-size: 22px;
        margin-bottom: 15px;
        color: #1e3a8a;
    }
    .actions {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }
    .btn-add {
        background: #2563eb;
        color: white;
        padding: 10px 16px;
        border: none;
        border-radius: 6px;
        text-decoration: none;
        font-weight: 600;
        transition: 0.3s;
    }
    .btn-add:hover {
        background: #1d4ed8;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }
    th, td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #e5e7eb;
    }
    th {
        background: #f1f5f9;
        color: #1e3a8a;
        text-transform: uppercase;
        font-size: 14px;
    }
    tr:hover {
        background: #f9fafb;
    }
    .btn-edit {
        color: #2563eb;
        font-weight: 600;
        text-decoration: none;
        margin-right: 10px;
    }
    .btn-edit:hover {
        text-decoration: underline;
    }
    .btn-delete {
        color: #dc2626;
        font-weight: 600;
        text-decoration: none;
    }
    .btn-delete:hover {
        text-decoration: underline;
    }
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
        <a href="<?= base_url('proker'); ?>">Program Kerja</a>
        <a href="<?= base_url('todo'); ?>">To-Do List</a>
        <a href="<?= base_url('informasi'); ?>" style="background:#2563eb;">Informasi</a>
        <a href="<?= base_url('login/logout'); ?>" style="background:#dc2626;">Logout</a>
    </nav>
</header>

<div class="container">
    <h2>Manajemen Informasi HIMASTIKA</h2>
    <div class="actions">
        <a href="<?= base_url('informasi/create'); ?>" class="btn-add">+ Tambah Informasi</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Judul</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($informasi)): ?>
                <?php foreach($informasi as $i): ?>
                <tr>
                    <td><?= htmlspecialchars($i->judul); ?></td>
                    <td><?= date('d M Y', strtotime($i->tanggal)); ?></td>
                    <td>
                        <a href="<?= base_url('informasi/edit/'.$i->id); ?>" class="btn-edit">Edit</a>
                        <a href="<?= base_url('informasi/delete/'.$i->id); ?>" onclick="return confirm('Hapus informasi ini?')" class="btn-delete">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3" style="text-align:center; color:#6b7280;">Belum ada informasi.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

</body>
</html>