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
(2, 'Adrian Syahfidi ', '20230801253', 'Sekretaris 2', 'Badan Pengurus Harian', '081212431499', 'adriansyahfidi@gmail.com'),
(3, 'Jocelyn Meilandri ', '20230801026', 'Bendahara', 'Badan Pengurus Harian', '085710259880', 'jocelinmeilandri@gmail.com'),
(4, 'Syabina Awilya', '20230801184', 'Sekretaris 1', 'Badan Pengurus Harian', '085776975813', 'syabinaawil@gmail.com'),
(5, 'Oscar Adi Dharma ', '20230801056', 'Koordinator', 'Sinergi', '0895359510009', 'oscaraddhrm06@gmail.com'),
(6, 'Gilang Faqih', '20230801227', 'Staff', 'Sinergi', '0895402656581', 'gilangfaqih0@gmail.com'),
(7, 'Ananda Rafly Saputra ', '20230801196', 'PIC', 'Dukungan dan Solidaritas', '081212431499', 'srafly310@gmail.com'),
(8, 'Dominggus Louk ', '20230801125', 'Staff', 'Dukungan dan Solidaritas', '082194897649', 'domingguslouk2@gmail.com'),
(9, 'Rasyid Septian  Pasaribu ', '20230801344 ', 'Staff', 'Dukungan dan Solidaritas', '0895412016290', 'rasyid.septian29@gmail.com'),
(10, 'Adidya Darmawan ', '20230801110', 'Koordinator', 'Inovasi dan Prestasi', '085773563299', 'adidyadarmawan12@gmail.com'),
(11, 'Hizki Putra Permana ', '20230801179 ', 'Staff', 'Inovasi dan Prestasi', '085719471641', 'hizkiputra08@gmail.com'),
(12, 'Muhammad Febriyan  Putrahariska ', '20230801043', 'Staff', 'Inovasi dan Prestasi', '087812483837', 'mfebriyanputrahariska@gmail.com'),
(13, 'Rahmat Tri Anggoro ', '20230801446', 'PIC', 'Kajian Strategis', '081213680916', 'rahmattri2306@gmail.com'),
(14, 'Ade Husnan Mussani ', '20230801173', 'Staff', 'Kajian Strategis', '085782914641', 'unanjb@gmail.com'),
(15, 'Ari Hendriatno', '20230801114', 'Koordinator', 'Kreativa dan Komunikasi', '081398083669', 'wuari.aha@gmail.com'),
(16, 'Firschanya Alula  Rietmadhanty ', '20230801438', 'Staff', 'Kreativa dan Komunikasi', '081112009933', 'cjllakv@gmail.com'),
(17, 'Gylian Hehanussa ', '20230801260', 'Staff', 'Kreativa dan Komunikasi', '085281400248', 'gylianhehanussa@gmail.com'),
(18, 'Siti Nurfadila Ilham', '20230801309', 'Staff', 'Kreativa dan Komunikasi', '087778334911', 'sitinurfadila1537@gmail.com'),
(19, 'Naufal Mussyafa Arrada', '20230801306', 'Koordinator', 'Kemitraan dan Relasi ', '081212915436', 'mussyafanopal@gmail.com'),
(20, 'Fahmi Nurwendo', '20230801250 ', 'Staff', 'Kemitraan dan Relasi ', '081234804688', 'fahminurwendo28@gmail.com'),
(21, 'Rajih Asyam Driagrian', '20230801099', 'Staff', 'Kemitraan dan Relasi ', '082122172208', 'rjhdriagrian@gmail.com');

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
(4, 'Putri Ananda', 'putri@gmail.com', '087812483837', '20240801210', '2024', 'Sekretaris', 'Ingin menambah pengalaman', '93369d22921bd84ced48ef27ec3dce35.png', '3101bfbf541c71d8a055fd7286ff4a0c.png', '2025-07-23 02:43:23', 'pending'),
(5, 'Salsabila', 'salsabila@gmail.com', '08110293876', '20240801219', '2024', 'Sinergi', 'Ingin menambah relasi', '9325c32839e72b3ed2cb1862e28a2093.png', '6c40461d3a8737e419f601440024bd32.png', '2025-07-23 02:44:39', 'pending');

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
(1, 'admin', '$2y$10$AetOJ.8uswNdHVwRjecHxuB3.UgQ1nnJiN7TaTS23gaFcoedqVgjS', 'admin');

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
