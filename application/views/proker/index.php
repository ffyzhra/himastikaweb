<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Program Kerja | HIMASTIKA UEU</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<style>
    body { font-family: 'Poppins', sans-serif; margin: 0; background: #f4f6f9; color: #333; }
    header { background: #1e3a8a; color: white; padding: 15px 30px; display: flex; justify-content: space-between; align-items: center; }
    header img { width: 50px; height: 50px; border-radius: 50%; margin-right: 15px; }
    header h1 { margin: 0; font-size: 20px; }
    nav a { color: white; text-decoration: none; font-weight: 600; margin-left: 15px; padding: 8px 14px; border-radius: 6px; transition: background 0.3s ease; }
    nav a:hover { background: #2563eb; }
    .container { max-width: 1200px; margin: 30px auto; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
    h2 { color: #1e3a8a; margin-bottom: 20px; }
    .actions { display: flex; justify-content: space-between; margin-bottom: 15px; }
    .btn-add { background: #2563eb; color: white; padding: 10px 16px; border-radius: 6px; text-decoration: none; font-weight: 600; }
    .btn-add:hover { background: #1d4ed8; }
    table { width: 100%; border-collapse: collapse; }
    th, td { padding: 12px; border-bottom: 1px solid #e5e7eb; }
    th { background: #f1f5f9; color: #1e3a8a; text-transform: uppercase; font-size: 14px; }
    tr:hover { background: #f9fafb; }
    .btn-edit { color: #2563eb; font-weight: 600; text-decoration: none; margin-right: 10px; }
    .btn-delete { color: #dc2626; font-weight: 600; text-decoration: none; }
    .btn-edit:hover, .btn-delete:hover { text-decoration: underline; }
    .checkbox-status { transform: scale(1.3); }
</style>
</head>
<body>

<header>
    <div style="display: flex; align-items: center;">
        <img src="<?= base_url('assets/img/LOGO HIMASTIKA.jpg'); ?>" alt="Logo">
        <div>
            <h1>HIMASTIKA UEU</h1>
            <p style="font-size:14px; color:#c7d2fe;">Kabinet Sinergi Harmoni</p>
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
    <h2>Daftar Program Kerja</h2>
    <div class="actions">
        <a href="<?= base_url('proker/create'); ?>" class="btn-add">+ Tambah Program Kerja</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Judul</th>
                <th>Keterangan</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($prokers)): ?>
                <?php foreach($prokers as $p): ?>
                <tr>
                    <td><?= htmlspecialchars($p->judul); ?></td>
                    <td><?= htmlspecialchars($p->deskripsi); ?></td>
                    <td><?= date('d M Y', strtotime($p->tanggal)); ?></td>
                    <td>
                        <input type="checkbox" class="checkbox-status" 
                            data-id="<?= $p->id; ?>" <?= $p->status == 1 ? 'checked' : ''; ?>>
                    </td>
                    <td>
                        <a href="<?= base_url('proker/edit/'.$p->id); ?>" class="btn-edit">Edit</a>
                        <a href="<?= base_url('proker/delete/'.$p->id); ?>" class="btn-delete" onclick="return confirm('Hapus data ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="5" style="text-align:center;">Belum ada program kerja.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<script>
document.querySelectorAll('.checkbox-status').forEach(cb => {
    cb.addEventListener('change', function() {
        fetch("<?= base_url('proker/update_status/'); ?>" + this.dataset.id, {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            body: 'status=' + (this.checked ? 1 : 0)
        });
    });
});
</script>

</body>
</html>