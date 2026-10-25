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
        'tagline' => 'Nahkoda yang menjaga kabinet tetap di jalurnya.',
        'tugas' => [
            'Ketua dan Wakil Ketua memimpin arah kabinet dan mengoordinasikan semua divisi.',
            'Sekretaris mengelola administrasi, surat masuk-keluar, dan laporan pertanggungjawaban.',
            'Bendahara merencanakan anggaran, mendampingi pendanaan kegiatan, dan melaporkan keuangan secara transparan.',
        ],
        'proker_label' => 'Program kabinet yang dikoordinasikan',
        'proker' => [
            ['nama' => 'Studi Banding', 'desc' => 'Belajar langsung dari himpunan TI kampus lain dan membuka kerja sama jangka panjang.', 'id' => 1, 'icon' => 'globe'],
            ['nama' => 'Company Visit', 'desc' => 'Melihat langsung dunia kerja di perusahaan dan instansi.', 'id' => 8, 'icon' => 'briefcase'],
            ['nama' => 'Seminar', 'desc' => 'Seminar bersama HUMANIS seputar dunia keamanan siber.', 'id' => 7, 'icon' => 'megaphone'],
        ],
        'intern' => 'Intern Bendahara belajar mencatat keuangan, menyusun anggaran kegiatan, dan membantu pengelolaan iuran pengurus.',
    ],
    'sinergi' => [
        'nama'  => 'Sinergi',
        'icon'  => 'users',
        'foto'  => 'assets/img/divisi/sinergi.jpg',
        'ringkas' => 'Memperkuat hubungan antar anggota lewat ruang kolaboratif.',
        'deskripsi' => 'Divisi ini berfokus memperkuat hubungan antar anggota HIMASTIKA dan mahasiswa TI dengan menciptakan ruang kolaboratif. Tugas utamanya memfasilitasi komunikasi, mendorong partisipasi, dan memastikan setiap anggota merasa dihargai.',
        'tagline' => 'Perekat seluruh anggota HIMASTIKA.',
        'tugas' => [
            'Memfasilitasi komunikasi antar anggota dan mahasiswa TI.',
            'Mendorong partisipasi supaya semua orang ikut terlibat.',
            'Memastikan setiap anggota merasa dihargai dan punya tempat.',
        ],
        'proker' => [
            ['nama' => 'SkillUp HIMASTIKA', 'desc' => 'Sharing pengalaman dari pengurus periode sebelumnya untuk mengasah soft skill dan hard skill.', 'id' => 5, 'icon' => 'trending-up'],
            ['nama' => 'TeamBonding', 'desc' => 'Kegiatan seru untuk mempererat hubungan dan kekompakan seluruh pengurus.', 'id' => 3, 'icon' => 'users'],
        ],
        'intern' => 'Intern Sinergi ikut menyiapkan kegiatan kebersamaan seperti SkillUp dan TeamBonding, sambil belajar merangkul anggota.',
    ],
    'dukungan-dan-solidaritas' => [
        'nama'  => 'Dukungan dan Solidaritas',
        'icon'  => 'heart',
        'foto'  => 'assets/img/divisi/dukungan-dan-solidaritas.jpg',
        'ringkas' => 'Bimbingan, bantuan, dan solidaritas untuk mahasiswa TI.',
        'deskripsi' => 'Divisi ini bertugas memberikan dukungan kepada mahasiswa TI melalui bimbingan, bantuan, dan solusi masalah. Selain itu, fokusnya membangun solidaritas dan suasana kekeluargaan lewat berbagai kegiatan.',
        'tagline' => 'Hadir saat teman butuh bantuan.',
        'tugas' => [
            'Memberikan bimbingan, bantuan, dan solusi untuk masalah mahasiswa TI.',
            'Membangun solidaritas dan suasana kekeluargaan.',
            'Menggerakkan kegiatan sosial yang berdampak nyata.',
        ],
        'proker' => [
            ['nama' => 'SosialKita', 'desc' => 'Pengabdian masyarakat bertema "Aksi Hima: Peduli dan Berbagi" di panti asuhan.', 'id' => 6, 'icon' => 'heart'],
        ],
    ],
    'inovasi-dan-prestasi' => [
        'nama'  => 'Inovasi dan Prestasi',
        'icon'  => 'trophy',
        'foto'  => 'assets/img/divisi/inovasi-dan-prestasi.jpg',
        'ringkas' => 'Mengembangkan ide kreatif dan memotivasi anggota berprestasi.',
        'deskripsi' => 'Divisi ini berfokus mengembangkan ide kreatif dan inovatif demi kemajuan HIMASTIKA. Tugasnya menciptakan program yang meningkatkan kualitas anggota dan memotivasi mereka untuk berprestasi di bidang akademik, organisasi, dan pengembangan diri.',
        'tagline' => 'Dapur ide dan pencetak prestasi.',
        'tugas' => [
            'Mengembangkan ide kreatif dan inovatif untuk kemajuan HIMASTIKA.',
            'Membuat program yang meningkatkan kualitas anggota.',
            'Memotivasi anggota berprestasi di akademik, organisasi, dan pengembangan diri.',
        ],
        'proker' => [
            ['nama' => 'AcademiaFest', 'desc' => 'Festival akademik untuk mengasah dan merayakan potensi mahasiswa TI.', 'icon' => 'book'],
            ['nama' => 'HIMATHON', 'desc' => 'Ajang adu ide dan karya teknologi ala hackathon HIMASTIKA.', 'icon' => 'code'],
        ],
        'intern' => 'Intern Inovasi dan Prestasi belajar merancang program pengembangan diri dan ikut menyiapkan acara seperti AcademiaFest dan HIMATHON.',
    ],
    'kajian-strategis' => [
        'nama'  => 'Kajian Strategis',
        'icon'  => 'target',
        'foto'  => 'assets/img/divisi/kajian-strategis.jpg',
        'ringkas' => 'Menampung aspirasi dan mengkaji isu mahasiswa.',
        'deskripsi' => 'Divisi ini bertugas mendengarkan dan menyampaikan isu-isu mahasiswa, baik internal maupun eksternal kampus, serta meningkatkan kesadaran terhadap perkembangan yang memengaruhi kehidupan mahasiswa.',
        'tagline' => 'Telinga dan suara mahasiswa TI.',
        'tugas' => [
            'Mendengarkan dan menyampaikan isu mahasiswa, baik internal maupun eksternal kampus.',
            'Mengkaji perkembangan yang memengaruhi kehidupan mahasiswa.',
            'Meningkatkan kesadaran dan kepekaan mahasiswa lewat diskusi.',
        ],
        'proker' => [
            ['nama' => 'FAKTA', 'desc' => 'Forum Aspirasi dan Kajian Mahasiswa: wadah menyampaikan dan membahas aspirasi.', 'icon' => 'message'],
            ['nama' => 'Tech Policy Talks', 'desc' => 'Diskusi santai tentang kebijakan dan isu teknologi terkini.', 'icon' => 'mic'],
        ],
    ],
    'kreativa-dan-komunikasi' => [
        'nama'  => 'Kreativa dan Komunikasi',
        'icon'  => 'pen-tool',
        'foto'  => 'assets/img/divisi/kreativa-dan-komunikasi.jpg',
        'ringkas' => 'Konten kreatif dan pengelolaan media sosial HIMASTIKA.',
        'deskripsi' => 'Divisi ini bertugas membuat konten kreatif dan mengelola komunikasi HIMASTIKA, baik internal maupun eksternal. Fokusnya mencakup promosi, pengelolaan media sosial, dan penyampaian informasi yang efektif.',
        'tagline' => 'Wajah dan suara HIMASTIKA di media sosial.',
        'tugas' => [
            'Membuat konten kreatif dan materi promosi kegiatan.',
            'Mengelola media sosial HIMASTIKA.',
            'Menyampaikan informasi ke anggota dan publik dengan efektif.',
        ],
        'proker' => [
            ['nama' => 'MediaSparks', 'desc' => 'Program kreatif seputar media dan konten digital.', 'icon' => 'camera'],
            ['nama' => 'Konten Kreativa', 'desc' => 'Konten rutin yang menghidupkan media sosial HIMASTIKA.', 'icon' => 'pen-tool'],
        ],
        'intern' => 'Intern Kreativa dan Komunikasi belajar desain, dokumentasi, dan menulis caption untuk konten media sosial HIMASTIKA.',
    ],
    'relasi-dan-kemitraan' => [
        'nama'  => 'Relasi dan Kemitraan',
        'icon'  => 'handshake',
        'foto'  => 'assets/img/divisi/relasi-dan-kemitraan.jpg',
        'ringkas' => 'Membangun kemitraan dengan organisasi, perusahaan dan lembaga.',
        'deskripsi' => 'Divisi ini bertugas membangun dan menjaga hubungan dengan pihak eksternal seperti organisasi, perusahaan, dan lembaga. Fokusnya adalah menjalin kemitraan strategis, mengelola kolaborasi, dan memperluas jaringan untuk mendukung program HIMASTIKA.',
        'tagline' => 'Membuka pintu kolaborasi di luar kampus.',
        'tugas' => [
            'Membangun dan menjaga hubungan dengan organisasi, perusahaan, dan lembaga.',
            'Menjalin kemitraan strategis dan mengelola kolaborasi.',
            'Memperluas jaringan untuk mendukung program HIMASTIKA.',
        ],
        'proker' => [
            ['nama' => 'SponsorshipXplore', 'desc' => 'Menjajaki dan menjalin sponsor untuk mendukung kegiatan HIMASTIKA.', 'icon' => 'briefcase'],
            ['nama' => 'Jalin Relasi', 'desc' => 'Membangun relasi dengan himpunan, komunitas, dan mitra eksternal.', 'icon' => 'handshake'],
        ],
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
