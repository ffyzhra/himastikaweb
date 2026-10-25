<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login HIMASTIKA</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }
    body {
        background-color: #1e3a8a; /* Biru gelap */
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    .login-container {
        background: #fff;
        border-radius: 16px;
        width: 100%;
        max-width: 400px;
        padding: 40px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        text-align: center;
    }
    .login-header img {
        width: 90px;
        height: 90px;
        border-radius: 50%;
        border: 4px solid #fff;
        margin-bottom: 15px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    .login-header h1 {
        font-size: 24px;
        font-weight: 600;
        color: #1e3a8a;
        margin-bottom: 5px;
    }
    .login-header p {
        font-size: 14px;
        color: #666;
    }
    .form-group {
        margin-top: 20px;
        text-align: left;
    }
    .form-group input {
        width: 100%;
        padding: 12px 14px;
        margin-top: 8px;
        border-radius: 8px;
        border: 1px solid #ccc;
        font-size: 14px;
        outline: none;
        transition: 0.3s;
    }
    .form-group input:focus {
        border-color: #1e3a8a;
        box-shadow: 0 0 8px rgba(30, 58, 138, 0.2);
    }
    .btn-login {
        width: 100%;
        background: #1e3a8a;
        color: #fff;
        font-weight: 600;
        border: none;
        padding: 12px;
        border-radius: 8px;
        font-size: 16px;
        margin-top: 20px;
        cursor: pointer;
        transition: background 0.3s;
    }
    .btn-login:hover {
        background: #16367d;
    }
    .footer-text {
        margin-top: 20px;
        font-size: 13px;
        color: #777;
    }
</style>
</head>
<body>

<div class="login-container">
    <div class="login-header">
        <img src="<?= base_url('assets/img/LOGO HIMASTIKA.jpg'); ?>" alt="Logo HIMASTIKA">
        <h1>HIMASTIKA UEU</h1>
        <p>Himpunan Mahasiswa Jurusan Teknik Informatika</p>
    </div>

    <?php if($this->session->flashdata('error')): ?>
        <div style="background:#ffe5e5;color:#d60000;padding:10px;border-radius:8px;margin:15px 0;font-size:14px;">
            <?= $this->session->flashdata('error'); ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('login/auth'); ?>" method="post">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" placeholder="Masukkan username" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Masukkan password" required>
        </div>
        <button type="submit" class="btn-login">Masuk</button>
    </form>

    <p class="footer-text">© <?= date('Y'); ?> HIMASTIKA | Universitas Esa Unggul</p>
</div>

</body>
</html>