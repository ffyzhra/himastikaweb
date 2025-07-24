<?php
// Konversi logo ke base64 agar tampil di Dompdf
$logo_ueu = base64_encode(file_get_contents(FCPATH.'assets/img/Esa Unggul.png'));
$logo_himastika = base64_encode(file_get_contents(FCPATH.'assets/img/LOGO HIMASTIKA.jpg'));
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cetak Pendaftaran</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 14px; line-height: 1.6; margin: 30px; }
        /* ====== KOP SURAT ====== */
        .kop { text-align: center; border-bottom: 3px solid #000; padding-bottom: 8px; margin-bottom: 20px; }
        .kop-table { width: 100%; }
        .kop-table td { vertical-align: middle; }
        .kop img { height: 90px; } /* Logo besar dan seimbang */
        .kop-title { font-size: 18px; font-weight: bold; line-height: 1.4; }
        .kop-sub { font-size: 12px; margin-top: 4px; }
        /* ====== JUDUL ====== */
        .judul { text-align: center; font-weight: bold; font-size: 16px; margin: 20px 0; text-decoration: underline; }
        /* ====== DATA TABEL ====== */
        .data { width: 100%; margin-top: 10px; border-collapse: collapse; }
        .data td { padding: 6px 4px; vertical-align: top; }
        .data td:first-child { width: 30%; }
        /* ====== TANDA TANGAN ====== */
        .ttd { width: 100%; margin-top: 30px; text-align: right; }
        .ttd p { margin: 5px 0; }
    </style>
</head>
<body>

<!-- KOP SURAT -->
<div class="kop">
    <table class="kop-table">
        <tr>
            <td style="width: 20%; text-align:right;">
                <img src="data:image/png;base64,<?= $logo_ueu; ?>" alt="UEU">
            </td>
            <td style="width: 60%; text-align:center;">
                <div class="kop-title">
                    HIMPUNAN MAHASISWA JURUSAN TEKNIK INFORMATIKA<br>
                    FAKULTAS ILMU KOMPUTER<br>
                    UNIVERSITAS ESA UNGGUL
                </div>
                <div class="kop-sub">
                    Jl. Arjuna Utara No.9 Kebon Jeruk, Jakarta Barat, 11510<br>
                    Email: himastika.esaunggul@gmail.com
                </div>
            </td>
            <td style="width: 20%; text-align:left;">
                <img src="data:image/jpeg;base64,<?= $logo_himastika; ?>" alt="HIMASTIKA">
            </td>
        </tr>
    </table>
</div>

<!-- JUDUL -->
<div class="judul">FORMULIR PENDAFTARAN ANGGOTA HIMASTIKA</div>

<!-- DATA -->
<table class="data">
    <tr>
        <td>Nama Lengkap</td>
        <td>: <?= htmlspecialchars($detail->nama); ?></td>
    </tr>
    <tr>
        <td>NIM</td>
        <td>: <?= htmlspecialchars($detail->nim); ?></td>
    </tr>
    <tr>
        <td>Angkatan</td>
        <td>: <?= htmlspecialchars($detail->angkatan); ?></td>
    </tr>
    <tr>
        <td>Divisi</td>
        <td>: <?= htmlspecialchars($detail->divisi); ?></td>
    </tr>
    <tr>
        <td>Alasan Bergabung</td>
        <td>: <?= nl2br(htmlspecialchars($detail->alasan)); ?></td>
    </tr>
</table>

<!-- TANDA TANGAN -->
<div class="ttd">
    <p>Jakarta, <?= date('d F Y'); ?></p>
    <p>Tanda Tangan Pendaftar,</p>
    <br><br><br>
    <p><b><?= htmlspecialchars($detail->nama); ?></b></p>
</div>

</body>
</html>