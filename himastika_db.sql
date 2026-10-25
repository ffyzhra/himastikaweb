-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2025 at 05:43 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `himastika_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `nim` varchar(20) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `divisi` varchar(50) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anggota`
-- Pengurus HIMASTIKA Kabinet Sinergi Harmoni 2024/2025 (tanpa nomor telepon)
--

INSERT INTO `anggota` (`id`, `nama`, `nim`, `jabatan`, `divisi`, `no_telp`, `email`, `foto`) VALUES
(1, 'Fayza Azzahra', '20230801329', 'Ketua', 'Badan Pengurus Harian', NULL, NULL, 'assets/img/anggota/fayza.jpg'),
(2, 'Baity Jannaty', '20230801434', 'Wakil Ketua', 'Badan Pengurus Harian', NULL, NULL, 'assets/img/anggota/baity.jpg'),
(3, 'Syabina Awilya', '20230801184', 'Sekretaris I', 'Badan Pengurus Harian', NULL, NULL, 'assets/img/anggota/syabina.jpg'),
(4, 'Adrian Syahfidi', '20230801326', 'Sekretaris II', 'Badan Pengurus Harian', NULL, NULL, 'assets/img/anggota/adrian.jpg'),
(5, 'Jocelyn Meilandri', '20230801026', 'Bendahara I', 'Badan Pengurus Harian', NULL, NULL, 'assets/img/anggota/jocelyn.jpg'),
(7, 'Gilang Faqih', '20230801227', 'Anggota', 'Sinergi', NULL, NULL, 'assets/img/anggota/gilang.jpg'),
(8, 'Ananda Rafly Saputra', '20230801296', 'PIC', 'Dukungan dan Solidaritas', NULL, NULL, 'assets/img/anggota/rafly.jpg'),
(9, 'Dominggus Louk', '20230801125', 'Anggota', 'Dukungan dan Solidaritas', NULL, NULL, 'assets/img/anggota/dominggus.jpg'),
(10, 'Rasyid Septian Pasaribu', '20230801344', 'Anggota', 'Dukungan dan Solidaritas', NULL, NULL, 'assets/img/anggota/rasyid.jpg'),
(11, 'Adidya Darmawan', '20230801110', 'Koordinator', 'Inovasi dan Prestasi', NULL, NULL, 'assets/img/anggota/adidya.jpg'),
(12, 'Hizki Putra Permana', '20230801179', 'Anggota', 'Inovasi dan Prestasi', NULL, NULL, 'assets/img/anggota/hizki.jpg'),
(13, 'Muhammad Febriyan Putrahariska', '20230801043', 'Anggota', 'Inovasi dan Prestasi', NULL, NULL, 'assets/img/anggota/febriyan.jpg'),
(14, 'Rahmat Tri Anggoro', '20230801446', 'PIC', 'Kajian Strategis', NULL, NULL, 'assets/img/anggota/rahmat.jpg'),
(15, 'Ade Husnan Mussani', '20230801173', 'Anggota', 'Kajian Strategis', NULL, NULL, 'assets/img/anggota/husnan.jpg'),
(16, 'Ari Hendriatno', '20230801114', 'Koordinator', 'Kreativa dan Komunikasi', NULL, NULL, 'assets/img/anggota/ari.jpg'),
(17, 'Firschanya Alula Rietmadhanty', '20230801438', 'Anggota', 'Kreativa dan Komunikasi', NULL, NULL, 'assets/img/anggota/firschanya.jpg'),
(18, 'Gylian Hehanussa', '20230801260', 'Anggota', 'Kreativa dan Komunikasi', NULL, NULL, 'assets/img/anggota/gylian.jpg'),
(19, 'Siti Nurfadila Ilham', '20230801309', 'Anggota', 'Kreativa dan Komunikasi', NULL, NULL, 'assets/img/anggota/dila.jpg'),
(20, 'Naufal Mussyafa Arrada', '20230801306', 'Koordinator', 'Relasi dan Kemitraan', NULL, NULL, 'assets/img/anggota/naufal.jpg'),
(21, 'Fahmi Nurwendo', '20230801250', 'Anggota', 'Relasi dan Kemitraan', NULL, NULL, 'assets/img/anggota/fahmi.jpg'),
(22, 'Rajih Asyam Driagrian', '20230801099', 'Anggota', 'Relasi dan Kemitraan', NULL, NULL, 'assets/img/anggota/rajih.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `informasi`
--

CREATE TABLE `informasi` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `informasi`
--

INSERT INTO `informasi` (`id`, `judul`, `deskripsi`, `tanggal`, `created_at`) VALUES
(1, 'Rapat Studi Banding Dengan HIMTI Universitas Budi Luhur', 'Jam 20.00', '2025-07-24', '2025-07-22 08:18:44');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `nim` varchar(50) DEFAULT NULL,
  `angkatan` varchar(10) DEFAULT NULL,
  `divisi` varchar(50) DEFAULT NULL,
  `alasan` text DEFAULT NULL,
  `krs` varchar(255) DEFAULT NULL,
  `khs` varchar(255) DEFAULT NULL,
  `tanggal_daftar` datetime DEFAULT NULL,
  `status` enum('pending','diterima','ditolak') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id`, `nama`, `email`, `no_telp`, `nim`, `angkatan`, `divisi`, `alasan`, `krs`, `khs`, `tanggal_daftar`, `status`) VALUES
(4, 'Umi Hidayat', 'pendaftar1@example.com', '081300000000', '20240802000', '2024', 'Sekretaris', 'Ingin mengembangkan diri dan berkontribusi di HIMASTIKA.', 'krs_dummy.png', 'khs_dummy.png', '2025-07-23 02:43:23', 'pending'),
(5, 'Tono Permata', 'pendaftar2@example.com', '081300000001', '20240802001', '2024', 'Sinergi', 'Ingin mengembangkan diri dan berkontribusi di HIMASTIKA.', 'krs_dummy.png', 'khs_dummy.png', '2025-07-23 02:44:39', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `pengelola`
--

CREATE TABLE `pengelola` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin','pengurus') DEFAULT 'pengurus'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengurus`
--

CREATE TABLE `pengurus` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','pengurus') DEFAULT 'pengurus'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengurus`
--

INSERT INTO `pengurus` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '$2y$10$2CVMH4O4sKGYofS6lkzf/eNZ3YU.PZ73IOOcrSNwiMSvHxOGy2Vfy', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `proker`
--

CREATE TABLE `proker` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `proker`
-- (Program kerja Kabinet Sinergi Harmoni 2024/2025, sesuai Profile HIMASTIKA)
--

INSERT INTO `proker` (`id`, `judul`, `deskripsi`, `tanggal`, `status`, `foto`) VALUES
(1, 'Studi Banding HIMASTIKA x HIMTI UBL', 'Wadah pengembangan wawasan akademik untuk menjalin hubungan baik dan kerja sama jangka panjang antar Himpunan Mahasiswa Teknik Informatika lintas kampus, serta meningkatkan wawasan tentang sistem organisasi dan inovasi program kerja. Gedung A, Ruang 811, Universitas Esa Unggul.', '2025-08-04', 1, 'assets/img/proker/studi-banding.jpg'),
(2, 'Sinergi Teknologi', 'Belum mendapatkan mitra', '2025-08-14', 0, NULL),
(3, 'Team Bonding', 'Kegiatan penguatan hubungan antar anggota HIMASTIKA untuk meningkatkan kerja sama dan sinergi dalam organisasi.', '2025-05-03', 1, NULL),
(4, 'FASBER (Fasilkom Berbagi dan Berbuka Bersama)', 'Program kerja gabungan BEMF Ilmu Komputer, HIMASTIKA dan Himpunan Mahasiswa Jurusan Sistem Informasi yang rutin diadakan setiap Ramadan untuk berbuka dan berbagi bersama, sekaligus mempererat silaturahmi keluarga besar Fasilkom. Masjid Baitul Ghafur, Universitas Esa Unggul.', '2025-03-21', 1, 'assets/img/proker/fasber.jpg'),
(5, 'Skill Up', 'Kegiatan berbagi pengalaman dan wawasan bersama pengurus HIMASTIKA dari periode sebelumnya, guna memberikan insight, inspirasi, serta pembelajaran berharga bagi pengurus dan anggota aktif dalam mengembangkan soft skill dan hard skill sebagai bekal menghadapi dunia organisasi maupun dunia kerja.', '2025-06-07', 1, NULL),
(6, 'Pengabdian Masyarakat: Sosial Kita', 'Bertema "Aksi Hima: Peduli dan Berbagi". Kegiatan di panti asuhan untuk menumbuhkan empati dan kontribusi nyata, sekaligus mengenalkan anak-anak pada pentingnya teknologi dalam pendidikan dan kehidupan sehari-hari. Panti Yauma Asrama Yatim dan Dhu\'afa Palmerah.', '2025-07-06', 1, 'assets/img/proker/pengabdian-masyarakat.jpg'),
(7, 'Seminar HIMASTIKA x HUMANIS', 'Seminar gabungan HIMASTIKA dan HUMANIS bertema "Behind the Firewall: Ungkap Dunia Cyber dari Etika sampai Eksploitasi". Ruang 406, Gedung A, Universitas Esa Unggul.', '2025-06-23', 1, 'assets/img/proker/seminar-humanis.jpg'),
(8, 'Company Visit', 'Kunjungan ke perusahaan untuk melihat langsung proses operasional dan manajerial yang berlangsung di dalamnya. Dilaksanakan di PT Jasa Raharja dan Kementerian Ketenagakerjaan (Kemnaker).', '2025-10-24', 1, 'assets/img/proker/company-visit-jasa-raharja.jpg'),
(9, 'FASTHER (Fasilkom Gathering)', 'Kegiatan tahunan Fasilkom untuk mempererat tali persaudaraan dan solidaritas keluarga besar Fakultas Ilmu Komputer. Acara gabungan HIMASTIKA dan HUMANIS. Segera hadir.', NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `saran`
--

CREATE TABLE `saran` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `pesan` text DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `todos`
--

CREATE TABLE `todos` (
  `id` int(11) NOT NULL,
  `task` varchar(255) NOT NULL,
  `deadline` datetime DEFAULT NULL,
  `status` enum('pending','done') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `todos`
--

INSERT INTO `todos` (`id`, `task`, `deadline`, `status`) VALUES
(3, 'Microblog', '2025-07-21 12:00:00', 'pending'),
(4, 'Welcome Month Juli', '2025-09-20 10:08:00', 'done'),
(5, 'Celebration Adrian', '2025-07-22 10:00:00', 'done'),
(6, 'Rapat dengan HIMTI Unuversitas Budi Luhur', '2025-07-24 20:00:00', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `todo_list`
--

CREATE TABLE `todo_list` (
  `id` int(11) NOT NULL,
  `task` varchar(255) DEFAULT NULL,
  `status` enum('pending','done') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `todo_list`
--

INSERT INTO `todo_list` (`id`, `task`, `status`) VALUES
(1, 'Microblog', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin','anggota') DEFAULT 'anggota'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `intern`
-- (Staff Intern: anggota baru yang bergabung di pertengahan periode)
--

CREATE TABLE `intern` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `divisi` varchar(50) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `intern` (`id`, `nama`, `divisi`, `foto`) VALUES
(1, 'Ananta Putra B.', 'Sinergi', 'assets/img/intern/ananta.jpg'),
(2, 'M. Sayyid D.F.', 'Sinergi', 'assets/img/intern/syaid.jpg'),
(3, 'Syauqi Rifki F.', 'Sinergi', 'assets/img/intern/syauqi.jpg'),
(4, 'Tomy Manurung', 'Sinergi', 'assets/img/intern/tomi.jpg'),
(5, 'Rivaldo Pigai', 'Inovasi dan Prestasi', 'assets/img/intern/rivaldo.jpg'),
(6, 'Rafli Heryana', 'Inovasi dan Prestasi', 'assets/img/intern/rafli.jpg'),
(7, 'Rafi', 'Kreativa dan Komunikasi', 'assets/img/intern/rafi.jpg'),
(8, 'Baim', 'Kreativa dan Komunikasi', 'assets/img/intern/baim.jpg'),
(9, 'Robi', 'Kreativa dan Komunikasi', 'assets/img/intern/robi.jpg'),
(10, 'Irfan', 'Kreativa dan Komunikasi', 'assets/img/intern/irfan.jpg'),
(11, 'Dilan Fajar Rafael', 'Bendahara', 'assets/img/intern/dilan.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `proker_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `galeri` (`id`, `judul`, `foto`, `proker_id`) VALUES
(1, 'Pelantikan Staff Intern', 'assets/img/intern/pelantikan.jpg', NULL),
(2, 'Kabinet Sinergi Harmoni', 'assets/img/hero/kabinet.jpg', NULL),
(3, 'Company Visit PT Jasa Raharja', 'assets/img/proker/company-visit-jasa-raharja.jpg', 8),
(4, 'Company Visit Kemnaker', 'assets/img/proker/company-visit-kemnaker.jpg', 8),
(5, 'Studi Banding HIMASTIKA x HIMTI UBL', 'assets/img/proker/studi-banding.jpg', 1),
(6, 'Pengabdian Masyarakat: Sosial Kita', 'assets/img/proker/pengabdian-masyarakat.jpg', 6),
(7, 'Seminar HIMASTIKA x HUMANIS', 'assets/img/proker/seminar-humanis.jpg', 7),
(8, 'FASBER 2025', 'assets/img/proker/fasber.jpg', 4),
(9, 'Kebersamaan Pengurus', 'assets/img/proker/kebersamaan.jpg', NULL),
(10, 'Staff Intern Divisi Sinergi', 'assets/img/intern/grup-sinergi.jpg', NULL),
(11, 'Staff Intern Divisi Inovasi dan Prestasi', 'assets/img/intern/grup-inovasi-dan-prestasi.jpg', NULL),
(12, 'Staff Intern Divisi Kreativa dan Komunikasi', 'assets/img/intern/grup-kreativa-dan-komunikasi.jpg', NULL),
(13, 'Badan Pengurus Harian', 'assets/img/divisi/bph.jpg', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengelola`
--
ALTER TABLE `pengelola`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `pengurus`
--
ALTER TABLE `pengurus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proker`
--
ALTER TABLE `proker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saran`
--
ALTER TABLE `saran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `todos`
--
ALTER TABLE `todos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `todo_list`
--
ALTER TABLE `todo_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

ALTER TABLE `intern`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `informasi`
--
ALTER TABLE `informasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pengelola`
--
ALTER TABLE `pengelola`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengurus`
--
ALTER TABLE `pengurus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `proker`
--
ALTER TABLE `proker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `saran`
--
ALTER TABLE `saran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `todos`
--
ALTER TABLE `todos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `todo_list`
--
ALTER TABLE `todo_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `intern`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

ALTER TABLE `galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
