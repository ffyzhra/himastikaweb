<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Manajemen Anggota | HIMASTIKA UEU</title>
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
    .search-input {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 6px;
        width: 250px;
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
        <a href="<?= base_url('anggota'); ?>" style="background:#2563eb;">Anggota</a>
        <a href="<?= base_url('pendaftaran'); ?>">Pendaftar</a>
        <a href="<?= base_url('proker'); ?>">Program Kerja</a>
        <a href="<?= base_url('todo'); ?>">To-Do List</a>
        <a href="<?= base_url('informasi'); ?>">Informasi</a>
        <a href="<?= base_url('login/logout'); ?>" style="background:#dc2626;">Logout</a>
    </nav>
</header>

<div class="container">
    <h2>Manajemen Anggota HIMASTIKA</h2>
    <div class="actions">
        <a href="<?= base_url('anggota/create'); ?>" class="btn-add">+ Tambah Anggota</a>
    </div>

    <div class="actions" style="display:flex; justify-content:space-between; margin-bottom:20px;">
    <form method="get" style="display:flex; gap:10px;">
        <input type="text" name="search" value="<?= htmlspecialchars($this->input->get('search') ?: '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Cari anggota..." class="search-input">
        
        <select name="divisi" class="search-input">
            <option value="all">Semua Divisi</option>
            <?php foreach($divisi_list as $d): ?>
                <option value="<?= $d->divisi; ?>" <?= ($this->input->get('divisi') == $d->divisi) ? 'selected' : ''; ?>>
                    <?= $d->divisi; ?>
                </option>
            <?php endforeach; ?>
        </select>

        <button type="submit" style="padding:10px 16px; background:#2563eb; color:white; border:none; border-radius:6px;">Cari</button>
    </form>
</div>

    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>NIM</th>
                <th>Jabatan</th>
                <th>Divisi</th>
                <th>No. Telp</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($anggota)): ?>
                <?php foreach($anggota as $a): ?>
                <tr>
                    <td><?= htmlspecialchars($a->nama); ?></td>
                    <td><?= htmlspecialchars($a->nim); ?></td>
                    <td><?= htmlspecialchars($a->jabatan); ?></td>
                    <td><?= htmlspecialchars($a->divisi); ?></td>
                    <td><?= htmlspecialchars($a->no_telp); ?></td>
                    <td><?= htmlspecialchars($a->email); ?></td>
                    <td>
                        <a href="<?= base_url('anggota/edit/'.$a->id); ?>" class="btn-edit">Edit</a>
                        <a href="<?= base_url('anggota/delete/'.$a->id); ?>" onclick="return confirm('Hapus anggota ini?')" class="btn-delete">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" style="text-align:center; color:#6b7280;">Belum ada data anggota.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

</body>
</html>