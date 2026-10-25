<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Manajemen Pendaftar | HIMASTIKA UEU</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<style>
    body { font-family: 'Poppins', sans-serif; margin: 0; background: #f4f6f9; color: #333; }
    header { background: #1e3a8a; color: white; padding: 15px 30px; display: flex; align-items: center; justify-content: space-between; }
    header img { width: 50px; height: 50px; border-radius: 50%; margin-right: 15px; }
    header h1 { font-size: 20px; margin: 0; }
    header .subtitle { font-size: 14px; color: #c7d2fe; }
    nav { display: flex; gap: 15px; }
    nav a { color: white; text-decoration: none; font-weight: 600; padding: 8px 14px; border-radius: 6px; transition: background 0.3s ease; }
    nav a:hover { background: #2563eb; }
    .container { max-width: 1200px; margin: 30px auto; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
    .container h2 { font-size: 22px; margin-bottom: 15px; color: #1e3a8a; }
    .actions { display: flex; justify-content: space-between; margin-bottom: 20px; }
    .btn-add { background: #2563eb; color: white; padding: 10px 16px; border-radius: 6px; text-decoration: none; font-weight: 600; }
    .btn-add:hover { background: #1d4ed8; }
    table { width: 100%; border-collapse: collapse; margin-top: 10px; }
    th, td { padding: 12px; text-align: left; border-bottom: 1px solid #e5e7eb; font-size: 14px; }
    th { background: #f1f5f9; color: #1e3a8a; text-transform: uppercase; font-size: 14px; }
    tr:hover { background: #f9fafb; }
    .btn-action { display: inline-block; margin: 2px 4px; padding: 6px 10px; font-size: 13px; font-weight: 600; border-radius: 4px; text-decoration: none; }
    .btn-delete { color: white; background: #dc2626; }
    .btn-delete:hover { background: #b91c1c; }
    .btn-approve { color: white; background: #059669; }
    .btn-approve:hover { background: #047857; }
    .btn-reject { color: white; background: #eab308; }
    .btn-reject:hover { background: #ca8a04; }
    .btn-view { color: #2563eb; font-weight: 600; text-decoration: none; }
    .btn-view:hover { text-decoration: underline; }
    .status { padding: 6px 10px; border-radius: 6px; font-size: 12px; font-weight: bold; text-transform: capitalize; }
    .status-pending { background: #facc15; color: #92400e; }
    .status-diterima { background: #4ade80; color: #166534; }
    .status-ditolak { background: #f87171; color: #7f1d1d; }
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
        <a href="<?= base_url('pendaftaran'); ?>" style="background:#2563eb;">Pendaftar</a>
        <a href="<?= base_url('proker'); ?>">Program Kerja</a>
        <a href="<?= base_url('todo'); ?>">To-Do List</a>
        <a href="<?= base_url('informasi'); ?>">Informasi</a>
        <a href="<?= base_url('login/logout'); ?>" style="background:#dc2626;">Logout</a>
    </nav>
</header>

<div class="container">
    <h2>Manajemen Pendaftar HIMASTIKA</h2>
    <div class="actions">
        <a href="<?= base_url('pendaftaran/form'); ?>" class="btn-add">+ Tambah Pendaftar</a>
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
                <th>Email</th>
                <th>No. Telepon</th>
                <th>NIM</th>
                <th>Divisi</th>
                <th>KRS</th>
                <th>KHS</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pendaftaran as $p): ?>
            <tr>
               <td><?= htmlspecialchars($p->nama ?? ''); ?></td>
<td><?= htmlspecialchars($p->email ?? ''); ?></td>
<td><?= htmlspecialchars($p->no_telp ?? ''); ?></td>
<td><?= htmlspecialchars($p->nim ?? ''); ?></td>
<td><?= htmlspecialchars($p->divisi ?? ''); ?></td>
                <td>
                    <?php if ($p->krs): ?>
                        <a href="<?= base_url('uploads/'.$p->krs); ?>" target="_blank" class="btn-view">📄 Lihat</a>
                    <?php else: ?> - <?php endif; ?>
                </td>
                <td>
                    <?php if ($p->khs): ?>
                        <a href="<?= base_url('uploads/'.$p->khs); ?>" target="_blank" class="btn-view">📄 Lihat</a>
                    <?php else: ?> - <?php endif; ?>
                </td>
                <td>
                    <?php
                        $status = !empty($p->status) ? $p->status : 'pending';
                    ?>
                    <span class="status status-<?= $status; ?>"><?= ucfirst($status); ?></span>
                </td>
                <td>
                    <a href="<?= base_url('pendaftaran/update_status/'.$p->id.'/diterima'); ?>" class="btn-action btn-approve">✔ Terima</a>
                    <a href="<?= base_url('pendaftaran/update_status/'.$p->id.'/ditolak'); ?>" class="btn-action btn-reject">✖ Tolak</a>
                    <a href="<?= base_url('pendaftaran/delete/'.$p->id); ?>" class="btn-action btn-delete" onclick="return confirm('Yakin hapus pendaftar ini?')">🗑 Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>