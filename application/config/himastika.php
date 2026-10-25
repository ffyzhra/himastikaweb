<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| Profil kabinet dan divisi HIMASTIKA, dipakai oleh halaman publik.
| Sumber: Profile HIMASTIKA Kabinet Sinergi Harmoni 2024/2025.
*/

$config['kabinet'] = [
    'nama'      => 'Kabinet Sinergi Harmoni',
    'periode'   => '2024/2025',
    'deskripsi' => 'Kabinet Sinergi Harmoni merupakan wadah bagi anggota HIMASTIKA untuk berkembang bersama dengan mengedepankan kerja sama, saling menghormati, dan kreativitas. Kabinet ini bertujuan menciptakan lingkungan yang positif, inklusif, dan produktif, sehingga seluruh mahasiswa Teknik Informatika memiliki kesempatan untuk berkontribusi dan mengembangkan diri.',
    'visi'      => 'Menjadikan HIMASTIKA sebagai wadah yang terorganisir dengan baik, memberikan ruang bagi setiap mahasiswa Teknik Informatika untuk berkembang secara maksimal dalam berbagai aspek kehidupan kampus.',
    'misi'      => [
        'Meningkatkan komunikasi dan keterlibatan anggota.',
        'Membangun lingkungan yang kolaboratif dan inklusif.',
        'Menciptakan sistem kerja HIMASTIKA yang efektif dan produktif.',
    ],
    'email'     => 'himastika.esaunggul@gmail.com',
    'instagram' => 'himastika_ueu',
    'intern'    => 'Staff Intern adalah anggota baru yang bergabung di pertengahan periode kepengurusan HIMASTIKA untuk belajar, beradaptasi, dan sebagai wadah pembelajaran bagi mahasiswa yang ingin mengenal lebih dalam dunia organisasi, sebelum menjadi pengurus penuh di periode berikutnya. Staff Intern terlibat dalam kegiatan divisi dan membantu pelaksanaan program kerja HIMASTIKA dengan bimbingan dari pengurus aktif.',
];

// Urutan di sini = urutan tampil di website. 'nama' harus sama dengan kolom `divisi` di database.
$config['divisi'] = [
    'bph' => [
        'nama'  => 'Badan Pengurus Harian',
        'icon'  => 'layers',
        'foto'  => 'assets/img/divisi/bph.jpg',
        'ringkas' => 'Ketua, Wakil Ketua, Sekretaris dan Bendahara yang memimpin kabinet.',
        'deskripsi' => 'Badan Pengurus Harian terdiri dari Ketua, Wakil Ketua, Sekretaris dan Bendahara. Sekretaris mengelola administrasi dan dokumentasi HIMASTIKA, menetapkan kebijakan kesekretariatan, mengontrol surat masuk dan keluar, serta menyusun laporan pertanggungjawaban tengah dan akhir tahun. Bendahara mengelola dan mencatat keuangan, merencanakan, mengawasi dan melaporkan keuangan secara transparan, menentukan anggaran kegiatan, mendampingi pendanaan setiap kegiatan dan mengelola iuran wajib pengurus.',
    ],
    'sinergi' => [
        'nama'  => 'Sinergi',
        'icon'  => 'users',
        'foto'  => 'assets/img/divisi/sinergi.jpg',
        'ringkas' => 'Memperkuat hubungan antar anggota lewat ruang kolaboratif.',
        'deskripsi' => 'Divisi ini berfokus memperkuat hubungan antar anggota HIMASTIKA dan mahasiswa TI dengan menciptakan ruang kolaboratif. Tugas utamanya memfasilitasi komunikasi, mendorong partisipasi, dan memastikan setiap anggota merasa dihargai.',
    ],
    'dukungan-dan-solidaritas' => [
        'nama'  => 'Dukungan dan Solidaritas',
        'icon'  => 'heart',
        'foto'  => 'assets/img/divisi/dukungan-dan-solidaritas.jpg',
        'ringkas' => 'Mendukung mahasiswa TI di bidang akademik dan sosial.',
        'deskripsi' => 'Divisi ini mendukung mahasiswa TI di bidang akademik dan sosial melalui bimbingan, pendampingan, serta kegiatan yang mempererat kebersamaan dan solidaritas.',
    ],
    'inovasi-dan-prestasi' => [
        'nama'  => 'Inovasi dan Prestasi',
        'icon'  => 'trophy',
        'foto'  => 'assets/img/divisi/inovasi-dan-prestasi.jpg',
        'ringkas' => 'Mengembangkan ide kreatif dan memotivasi anggota berprestasi.',
        'deskripsi' => 'Divisi ini berfokus mengembangkan ide kreatif dan inovatif demi kemajuan HIMASTIKA. Tugasnya menciptakan program yang meningkatkan kualitas anggota dan memotivasi mereka untuk berprestasi di bidang akademik, organisasi, dan pengembangan diri.',
    ],
    'kajian-strategis' => [
        'nama'  => 'Kajian Strategis',
        'icon'  => 'target',
        'foto'  => 'assets/img/divisi/kajian-strategis.jpg',
        'ringkas' => 'Mengkaji isu terkini yang relevan dengan mahasiswa.',
        'deskripsi' => 'Divisi ini berfokus pada pengkajian dan pembahasan isu-isu terkini yang relevan dengan mahasiswa. Melalui analisis dan diskusi, divisi ini berperan dalam menghadirkan wawasan baru serta mendorong mahasiswa untuk lebih peka terhadap perkembangan di sekitar.',
    ],
    'kreativa-dan-komunikasi' => [
        'nama'  => 'Kreativa dan Komunikasi',
        'icon'  => 'pen-tool',
        'foto'  => 'assets/img/divisi/kreativa-dan-komunikasi.jpg',
        'ringkas' => 'Konten kreatif dan pengelolaan media sosial HIMASTIKA.',
        'deskripsi' => 'Divisi ini bertugas membuat konten kreatif serta mengelola media sosial HIMASTIKA. Fokusnya mencakup pembuatan materi promosi dan pengelolaan media serta postingan di seluruh platform HIMASTIKA.',
    ],
    'relasi-dan-kemitraan' => [
        'nama'  => 'Relasi dan Kemitraan',
        'icon'  => 'handshake',
        'foto'  => 'assets/img/divisi/relasi-dan-kemitraan.jpg',
        'ringkas' => 'Membangun kemitraan dengan organisasi, perusahaan dan lembaga.',
        'deskripsi' => 'Divisi ini bertugas membangun dan menjaga hubungan dengan pihak eksternal seperti organisasi, perusahaan, dan lembaga. Fokusnya adalah menjalin kemitraan strategis, mengelola kolaborasi, dan memperluas jaringan untuk mendukung program HIMASTIKA.',
    ],
];

// Foto latar slideshow di halaman depan
$config['hero_foto'] = [
    'assets/img/hero/kabinet.jpg',
    'assets/img/proker/company-visit-jasa-raharja.jpg',
    'assets/img/proker/seminar-humanis.jpg',
    'assets/img/intern/pelantikan.jpg',
    'assets/img/proker/studi-banding.jpg',
];
