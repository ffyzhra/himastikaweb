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
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id`, `nama`, `nim`, `jabatan`, `divisi`, `no_telp`, `email`) VALUES
(2, 'Andi Pratama', '20230801000', 'Sekretaris 2', 'Badan Pengurus Harian', '081200000000', 'andi0@example.com'),
(3, 'Budi Santoso', '20230801001', 'Bendahara', 'Badan Pengurus Harian', '081200000001', 'budi1@example.com'),
(4, 'Citra Lestari', '20230801002', 'Sekretaris 1', 'Badan Pengurus Harian', '081200000002', 'citra2@example.com'),
(5, 'Dewi Wijaya', '20230801003', 'Koordinator', 'Sinergi', '081200000003', 'dewi3@example.com'),
(6, 'Eka Saputra', '20230801004', 'Staff', 'Sinergi', '081200000004', 'eka4@example.com'),
(7, 'Fajar Kusuma', '20230801005', 'PIC', 'Dukungan dan Solidaritas', '081200000005', 'fajar5@example.com'),
(8, 'Gita Anggraini', '20230801006', 'Staff', 'Dukungan dan Solidaritas', '081200000006', 'gita6@example.com'),
(9, 'Hana Nugroho', '20230801007', 'Staff', 'Dukungan dan Solidaritas', '081200000007', 'hana7@example.com'),
(10, 'Indra Permata', '20230801008', 'Koordinator', 'Inovasi dan Prestasi', '081200000008', 'indra8@example.com'),
(11, 'Joko Hidayat', '20230801009', 'Staff', 'Inovasi dan Prestasi', '081200000009', 'joko9@example.com'),
(12, 'Kirana Pratama', '20230801010', 'Staff', 'Inovasi dan Prestasi', '081200000010', 'kirana10@example.com'),
(13, 'Laras Santoso', '20230801011', 'PIC', 'Kajian Strategis', '081200000011', 'laras11@example.com'),
(14, 'Maya Lestari', '20230801012', 'Staff', 'Kajian Strategis', '081200000012', 'maya12@example.com'),
(15, 'Nanda Wijaya', '20230801013', 'Koordinator', 'Kreativa dan Komunikasi', '081200000013', 'nanda13@example.com'),
(16, 'Oka Saputra', '20230801014', 'Staff', 'Kreativa dan Komunikasi', '081200000014', 'oka14@example.com'),
(17, 'Putri Kusuma', '20230801015', 'Staff', 'Kreativa dan Komunikasi', '081200000015', 'putri15@example.com'),
(18, 'Raka Anggraini', '20230801016', 'Staff', 'Kreativa dan Komunikasi', '081200000016', 'raka16@example.com'),
(19, 'Sari Nugroho', '20230801017', 'Koordinator', 'Kemitraan dan Relasi ', '081200000017', 'sari17@example.com'),
(20, 'Tono Permata', '20230801018', 'Staff', 'Kemitraan dan Relasi ', '081200000018', 'tono18@example.com'),
(21, 'Umi Hidayat', '20230801019', 'Staff', 'Kemitraan dan Relasi ', '081200000019', 'umi19@example.com');

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
  `tanggal` date NOT NULL,
  `status` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `proker`
--

INSERT INTO `proker` (`id`, `judul`, `deskripsi`, `tanggal`, `status`) VALUES
(1, 'Studi Banding', 'HIMASTIKA X HIMTI UBL', '2025-08-04', 0),
(2, 'Sinergi Teknologi', 'Belum mendapatkan mitra', '2025-08-14', 0),
(3, 'Team Bonding', 'Kegiatan penguatan hubungan antar anggota HIMASTIKA untuk meningkatkan kerja sama dan sinergi dalam organisasi.', '2025-05-03', 1),
(4, 'Fasilkom Berbagi', 'Program kerja gabungan antara BEMF, HIMASTIKA, dan HUMANIS yang diselenggarakan selama bulan Ramadan dalam bentuk kegiatan sosial dan buka puasa bersama. FASBER menjadi wadah untuk berbagi kepada masyarakat sekitar sekaligus mempererat kebersamaan antar civitas akademika Fasilkom. Melalui kegiatan ini, nilai empati, solidaritas, dan kepedulian sosial ditanamkan sebagai wujud nyata kontribusi mahasiswa terhadap lingkungan sekitar.', '2025-05-23', 1),
(5, 'Skill Up', 'Kegiatan berbagi pengalaman dan wawasan bersama pengurus HIMASTIKA dari periode sebelumnya, guna memberikan insight, inspirasi, serta pembelajaran berharga bagi pengurus dan anggota aktif dalam mengembangkan soft skill dan hard skill sebagai bekal menghadapi dunia organisasi maupun dunia kerja.', '2025-06-07', 1),
(6, 'Sosial Kita', 'Program pengabdian masyarakat yang diselenggarakan oleh HIMASTIKA bekerja sama dengan Panti Yauma Palmerah Asrama Yatim dan Dhu\'afa, sebagai bentuk nyata dalam memperkuat empati serta kepedulian sosial terhadap sesama.', '2025-07-05', 1),
(7, 'Seminar HIMASTIKA X HUMANIS', 'Seminar kolaborasi antara HIMASTIKA dan HUMANIS yang membahas topik Cyber Security dengan narasumber inspiratif.', '2025-06-21', 1);

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

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
