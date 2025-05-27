-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2025 at 12:32 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kamp_ease`
--

-- --------------------------------------------------------

--
-- Table structure for table `atm`
--

CREATE TABLE `atm` (
  `id` int(11) NOT NULL,
  `nama_bank` varchar(200) NOT NULL,
  `jenis` text DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `koordinat_lat` double NOT NULL,
  `koordinat_lng` double NOT NULL,
  `link_maps` text DEFAULT NULL,
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `atm`
--

INSERT INTO `atm` (`id`, `nama_bank`, `jenis`, `deskripsi`, `koordinat_lat`, `koordinat_lng`, `link_maps`, `foto`) VALUES
(1, 'BNI', 'ATM', 'Mesin ATM BNI tersedia untuk transaksi perbankan.', -6.932569406312306, 107.71625136981969, '', ''),
(2, 'BSI', 'ATM', 'Mesin ATM BSI tersedia untuk transaksi syariah.', -6.932572831435344, 107.71622811316632, '', ''),
(3, 'BRI', 'ATM', 'Mesin ATM BRI siap digunakan untuk keperluan transaksi.', -6.933216267706431, 107.71602896339809, '', ''),
(4, 'BJB', 'ATM', 'Mesin ATM BJB mendukung layanan perbankan daerah.', -6.93229785648367, 107.71532071338895, '', ''),
(5, 'Mandiri', 'ATM', 'Mesin ATM Mandiri untuk transaksi nasabah umum.', -6.934162818939533, 107.7164435951879, '', ''),
(6, 'BCA', 'ATM', 'Mesin ATM BCA melayani transaksi nasabah secara cepat.', -6.9341750477027055, 107.71647434681199, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `fotokopi`
--

CREATE TABLE `fotokopi` (
  `id` int(11) NOT NULL,
  `nama_tempat` varchar(200) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `koordinat_lat` double NOT NULL,
  `koordinat_lng` double NOT NULL,
  `link_maps` text DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `jam_buka` time DEFAULT NULL,
  `jam_tutup` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gedung`
--

CREATE TABLE `gedung` (
  `id` int(11) NOT NULL,
  `nama_gedung` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `koordinat_lat` double DEFAULT NULL,
  `koordinat_lng` double DEFAULT NULL,
  `jumlah_lantai` int(11) DEFAULT NULL,
  `link_maps` text DEFAULT NULL,
  `foto` text NOT NULL,
  `operasional` text NOT NULL,
  `link_detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gedung`
--

INSERT INTO `gedung` (`id`, `nama_gedung`, `deskripsi`, `koordinat_lat`, `koordinat_lng`, `jumlah_lantai`, `link_maps`, `foto`, `operasional`, `link_detail`) VALUES
(1, 'Gedung Rektorat', 'Pusat administrasi universitas dan kantor pimpinan.', -6.932128011761481, 107.7165999996574, 6, 'https://maps.app.goo.gl/xEG6hWhWUk8PonABA', 'https://i.pinimg.com/736x/77/99/e7/7799e72df20c6e410bff6d0fd5dba594.jpg', '06.00 - 18.00', 'fakultas/rektorat.php'),
(2, 'Fakultas Ilmu Sosial dan Politik', 'Fakultas yang membawahi program studi sosial dan politik.', -6.931983997248028, 107.71690305390172, 4, 'https://maps.app.goo.gl/E564sQBAwip6haMG8', 'https://i.pinimg.com/736x/e4/6e/51/e46e51766a57feb14d24cd9146dc928e.jpg', '06.00 - 18.00', 'fakultas/fisip.php'),
(3, 'Gedung Abjan Sulaeman', 'Gedung perkuliahan dan pusat kegiatan fakultas.', -6.9319047848180615, 107.71684203364782, 4, 'https://maps.app.goo.gl/DvH3CbLMQLG24L387', 'https://i.pinimg.com/736x/36/8f/d2/368fd238ae130ccd51a1931d9a46710d.jpg', '06.00 - 18.00', 'fakultas/abjan.php'),
(4, 'Gedung No Name Dekat Abjan', 'Gedung belum memiliki nama resmi, terletak dekat Abjan.', -6.931877035422862, 107.71730199958503, 4, '', '', '06.00 - 18.00', ''),
(5, 'Gedung No Name 2 Samping Alfa', 'Gedung belum bernama, terletak di samping Alfa.', -6.931877035422862, 107.71730199958503, 4, '', '', '06.00 - 18.00', ''),
(6, 'Laboratorium', 'Gedung laboratorium untuk praktikum mahasiswa.', -6.931919614485614, 107.71828926348739, 4, '', '', '06.00 - 18.00', ''),
(7, 'Anwar Musaddad', 'Gedung perkuliahan dan pusat kegiatan akademik.', -6.931719599198086, 107.71845291202926, 4, '', '', '06.00 - 18.00', ''),
(8, 'PTIPD', 'Pusat Teknologi Informasi dan Pangkalan Data.', -6.931089756540548, 107.71735280408025, 4, '', '', '06.00 - 18.00', ''),
(9, 'LC', 'Language Center sebagai pusat pelatihan bahasa.', -6.93116034430411, 107.71785113358443, 4, '', '', '06.00 - 18.00', ''),
(10, 'Fakultas Saintek', 'Fakultas Sains dan Teknologi.', -6.931319165601076, 107.71825531858354, 4, 'https://maps.app.goo.gl/2XNBpSVvBy5oVud68', 'https://i.pinimg.com/1200x/89/b8/21/89b82106bd3058f9890c87348dc5dd83.jpg', '06.00 - 18.00', 'fakultas/fst.php'),
(11, 'Psikologi', 'Fakultas Psikologi UIN Sunan Gunung Djati Bandung.', -6.930901546548185, 107.71705150840296, 4, '', '', '06.00 - 18.00', ''),
(12, 'Adab dan Humaniora', 'Fakultas Adab dan Humaniora.', -6.930714910909067, 107.7173341259825, 4, '', '', '06.00 - 18.00', ''),
(13, 'Dakwah dan Komunikasi', 'Fakultas Dakwah dan Komunikasi.', -6.930709585689087, 107.7175654665469, 4, '', '', '06.00 - 18.00', ''),
(14, 'No Name Gazebo', 'Gazebo atau tempat duduk umum kampus.', -6.930609897558121, 107.71786723696006, 4, '', '', '06.00 - 18.00', ''),
(15, 'Syariah dan Hukum', 'Fakultas Syariah dan Hukum.', -6.931022403538432, 107.71793471195708, 4, '', '', '06.00 - 18.00', ''),
(16, 'Gedung Kuliah Syariah', 'Gedung perkuliahan Fakultas Syariah.', -6.930580564350668, 107.71830153289044, 4, '', '', '06.00 - 18.00', ''),
(17, 'Gedung No Name Belakang Gazebo', 'Gedung terletak di belakang gazebo.', -6.930397943148804, 107.7180559844487, 4, '', '', '06.00 - 18.00', ''),
(18, 'Gedung Kuliah Ushuluddin', 'Gedung kuliah Fakultas Ushuluddin.', -6.9301539191152, 107.71816045639534, 4, '', '', '06.00 - 18.00', ''),
(19, 'Gedung V', 'Salah satu gedung perkuliahan di area kampus.', -6.929758374818687, 107.71817452823645, 4, '', '', '06.00 - 18.00', ''),
(20, 'Gedung U', 'Salah satu gedung di lingkungan kampus.', -6.929949530094452, 107.71813823770157, 4, '', '', '06.00 - 18.00', ''),
(21, 'Mahad Cowo', 'Asrama mahasiswa putra (mahad)', -6.929624942731576, 107.7187716353046, 4, '', '', '24 jam', ''),
(22, 'Mahad Cewe', 'Asrama mahasiswa putri (mahad)', -6.929395466701478, 107.71863194759902, 4, '', '', '24 jam', ''),
(23, 'SC (Student Center)', 'Pusat kegiatan mahasiswa dan organisasi kampus.', -6.929454364685878, 107.71839159713615, 4, '', '', '24 jam', '');

-- --------------------------------------------------------

--
-- Table structure for table `kantin`
--

CREATE TABLE `kantin` (
  `id` int(11) NOT NULL,
  `nama_kantin` varchar(200) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `operasioanal` text DEFAULT NULL,
  `koordinat_lat` double NOT NULL,
  `koordinat_lng` double NOT NULL,
  `link_maps` text DEFAULT NULL,
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lapangan`
--

CREATE TABLE `lapangan` (
  `id` int(11) NOT NULL,
  `nama_lapangan` varchar(100) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `koordinat_lat` double DEFAULT NULL,
  `koordinat_lng` double DEFAULT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `link_maps` text DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `operasional` varchar(50) DEFAULT NULL,
  `link_detail` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `masjid`
--

CREATE TABLE `masjid` (
  `id` int(11) NOT NULL,
  `nama_masjid` varchar(200) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `koordinat_lat` double NOT NULL,
  `koordinat_lng` double NOT NULL,
  `link_maps` text DEFAULT NULL,
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `minimarket`
--

CREATE TABLE `minimarket` (
  `id` int(11) NOT NULL,
  `nama_minimarket` varchar(200) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `koordinat_lat` double NOT NULL,
  `koordinat_lng` double NOT NULL,
  `link_maps` text DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `jam_buka` time DEFAULT NULL,
  `jam_tutup` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parkiran`
--

CREATE TABLE `parkiran` (
  `id` int(11) NOT NULL,
  `nama_parkiran` varchar(200) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `koordinat_lat` double NOT NULL,
  `koordinat_lng` double NOT NULL,
  `link_maps` text DEFAULT NULL,
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `perpustakaan`
--

CREATE TABLE `perpustakaan` (
  `id` int(11) NOT NULL,
  `nama_perpustakaan` varchar(200) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `jam_buka` varchar(100) DEFAULT NULL,
  `jam_tutup` varchar(100) DEFAULT NULL,
  `koordinat_lat` double NOT NULL,
  `koordinat_lng` double NOT NULL,
  `link_maps` text DEFAULT NULL,
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wifi`
--

CREATE TABLE `wifi` (
  `id` int(11) NOT NULL,
  `nama_wifi` varchar(100) DEFAULT NULL,
  `password_wifi` varchar(100) DEFAULT NULL,
  `koordinat_lat` double DEFAULT NULL,
  `koordinat_lng` double DEFAULT NULL,
  `link_maps` text DEFAULT NULL,
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wifi`
--

INSERT INTO `wifi` (`id`, `nama_wifi`, `password_wifi`, `koordinat_lat`, `koordinat_lng`, `link_maps`, `foto`) VALUES
(0, 'UINSGD-ClassRoom', 'uinbandunghotspot', -6.931556, 107.718227, 'https://maps.app.goo.gl/czH1krEWMZbHF2iA9', 'https://suakaonline.com/wp-content/uploads/2015/09/saintek.jpg'),
(1, 'WiFi Gedung Utama', 'gedungutama123', -6.9311, 107.7174, 'https://maps.google.com/?q=-6.931100,107.717400', 'https://i.pinimg.com/736x/80/4d/24/804d241581757d5c5c7a319cdbbf3a43.jpg'),
(2, 'WiFi Perpustakaan', 'perpus456', -6.93125, 107.7175, 'https://maps.google.com/?q=-6.931250,107.717500', 'https://i.pinimg.com/736x/3a/f6/81/3af681a0708784aac61898fe1f415ccd.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atm`
--
ALTER TABLE `atm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fotokopi`
--
ALTER TABLE `fotokopi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gedung`
--
ALTER TABLE `gedung`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fst` (`id`,`nama_gedung`);

--
-- Indexes for table `kantin`
--
ALTER TABLE `kantin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lapangan`
--
ALTER TABLE `lapangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `masjid`
--
ALTER TABLE `masjid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `minimarket`
--
ALTER TABLE `minimarket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parkiran`
--
ALTER TABLE `parkiran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perpustakaan`
--
ALTER TABLE `perpustakaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wifi`
--
ALTER TABLE `wifi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atm`
--
ALTER TABLE `atm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `fotokopi`
--
ALTER TABLE `fotokopi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gedung`
--
ALTER TABLE `gedung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `kantin`
--
ALTER TABLE `kantin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `masjid`
--
ALTER TABLE `masjid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `minimarket`
--
ALTER TABLE `minimarket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parkiran`
--
ALTER TABLE `parkiran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `perpustakaan`
--
ALTER TABLE `perpustakaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
