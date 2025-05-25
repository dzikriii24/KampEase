-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2025 at 12:55 PM
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
  `operasional` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gedung`
--

INSERT INTO `gedung` (`id`, `nama_gedung`, `deskripsi`, `koordinat_lat`, `koordinat_lng`, `jumlah_lantai`, `link_maps`, `foto`, `operasional`) VALUES
(1, 'FST', 'Fakultas Sains dan Teknologi, pusat kegiatan akademik dan laboratorium sains.', -6.9314905, 107.7182071, 4, 'https://maps.app.goo.gl/DNZ9sGi75ewJmiAT7', 'https://fst.uinsgd.ac.id/wp-content/uploads/2014/09/IMG_0119-600x349.jpg', '06.00-18.00'),
(2, 'Language Center', 'Pusat pembelajaran bahasa dan pelatihan TOEFL/TOAFL.', -6.9314356, 107.7178081, 4, 'https://maps.app.goo.gl/i388jQJMYY4VPPJJ8', 'https://jurnalposmedia.com/wp-content/uploads/2019/05/Pusat-Pengembangan-Bahasa-UIN-Sunan-Gunung-Djati-Bandung-02.05.2019-1024x576.jpg', '06.00-18.00'),
(3, 'Lecture Hall', 'Gedung perkuliahan umum untuk berbagai fakultas.', -6.9311943, 107.7173913, 4, 'https://maps.app.goo.gl/r1E3yHRR5rxvrj3c7', 'https://jurnalposmedia.com/wp-content/uploads/2024/07/6-9.png', '06.00-18.00'),
(4, 'Gedung Psikolog', 'Gedung Fakultas Psikologi tempat perkuliahan dan layanan konseling.', -6.9310715, 107.7171141, 4, 'https://maps.app.goo.gl/yQoUtRHFajC4t4aQA', 'https://maukuliah.ap-south-1.linodeobjects.com/gallery/201004/jurusan-di-uin-bandung-dan-akreditasinya-thumbnail.jpg', '06.00-18.00'),
(5, 'Perpustakaan', 'Gedung pusat literatur dan referensi kampus.', -6.9311167, 107.7170983, 4, 'https://maps.app.goo.gl/sTPi9enKepWRYXGk9', 'https://jurnalposmedia.com/wp-content/uploads/2022/08/WhatsApp-Image-2022-08-07-at-11.29.05.jpeg', '06.00-18.00'),
(6, 'Adab dan Humaniora (Adhum)', 'Gedung Fakultas Adab dan Humaniora.', -6.9305952, 107.7173011, 4, 'https://maps.app.goo.gl/amonianp11GZToej8', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRnMNfW2j-jzq1DNgFrfk2E3kSGeWAtrzC7zXwvua-y59mcSrc0Xl79EVXTDign6MRB8h4&usqp=CAU', '06.00-18.00'),
(7, 'Gedung Dakwah dan Komunikasi (Dakom)', 'Gedung Fakultas Dakwah dan Komunikasi.', -6.930695, 107.7175264, 4, 'https://maps.app.goo.gl/oQVnd9WoCxoYEEU19', 'https://fokusjabar.id/wp-content/uploads/2020/04/FDK-UIN-SGD-Bandung.png', '06.00-18.00'),
(8, 'Gedung Dakon (Utama)', 'Gedung utama Fakultas Dakwah dan Komunikasi.', -6.9308658, 107.7179358, 4, 'https://maps.app.goo.gl/jk53V1ZZz228PS6d9', '', '06.00-18.00'),
(9, 'Gedung Sarkum', 'Gedung Sarkum, ruang kelas tambahan dan administrasi.', -6.930966, 107.7180455, 4, 'https://maps.app.goo.gl/iDP1aSacW4mcv9Yr5', '', '06.00-18.00'),
(10, 'Gelanggang Olahraga (GOR)', 'Tempat kegiatan olahraga mahasiswa dan kegiatan kampus.', -6.9311433, 107.7185816, 1, 'https://maps.app.goo.gl/Y87f5DGcXXRRqxCE9', '', '06.00-23.00'),
(11, 'Kantin Merah', 'Kantin mahasiswa dengan berbagai pilihan makanan.', -6.9306787, 107.7186543, 1, 'https://maps.app.goo.gl/Y87f5DGcXXRRqxCE9', '', '06.00-18.00'),
(12, 'Kantin', 'Area makan mahasiswa di sekitar Gedung Dakon.', -6.9304018, 107.7183043, 3, 'https://maps.app.goo.gl/68dcHqtnwvd6yQ2A7', '', '06.00-18.00'),
(13, 'Gedung T Dakon', 'Gedung tambahan Fakultas Dakwah dan Komunikasi.', -6.9303236, 107.7181913, 4, 'https://maps.app.goo.gl/3hrWa666NWUuei1C8', '', '06.00-18.00'),
(14, 'Gedung V', 'Gedung Fakultas Syariah atau ruang perkuliahan tambahan.', -6.9300464, 107.7181819, 4, 'https://maps.app.goo.gl/nJHicgeBzY2AWx2n7', '', '06.00-18.00'),
(15, 'Gedung U', 'Gedung Fakultas Ushuluddin atau ruang akademik lainnya.', -6.9299651, 107.7182664, 4, 'https://maps.app.goo.gl/z9rQH8UBdWpSmkiH6', '', '06.00-18.00'),
(16, 'Mahad Pria', 'Asrama mahasiswa UIN Sunan Gunung Djati Bandung.', -6.9296573, 107.7188458, 4, 'https://maps.app.goo.gl/BrxsVfdao4SPqoQk6', '', '24 Jam'),
(17, 'Mahad Wanita', 'Gedung Mahad tambahan atau asrama mahasiswa putri.', -6.9294013, 107.7184236, 4, 'https://maps.app.goo.gl/2p7TmFSZ6KJZ8BDz6', '', '24 Jam'),
(18, 'Student Center (SC)', 'Pusat kegiatan mahasiswa, organisasi, dan UKM kampus.', -6.9295012, 107.7183311, 4, 'https://maps.app.goo.gl/dFxnv19v8TcktxcG7', '', '24 Jam'),
(19, 'Gedung Syarkum', 'Gedung Fakultas Syariah dan Hukum (Syarkum).', -6.9306717, 107.7182409, 4, 'https://maps.app.goo.gl/AUtarkHsuZ6t5wPA6', '', '06.00-18.00');

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE `ruang` (
  `id` int(11) NOT NULL,
  `namaRuang` varchar(255) DEFAULT NULL,
  `koordinat_lat` double DEFAULT NULL,
  `koordinat_lng` double DEFAULT NULL,
  `gedung` varchar(255) DEFAULT NULL,
  `lantai` varchar(50) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `foto_url` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ruang`
--

INSERT INTO `ruang` (`id`, `namaRuang`, `koordinat_lat`, `koordinat_lng`, `gedung`, `lantai`, `deskripsi`, `foto_url`) VALUES
(8, 'Ruang 4.12', -6.931205072647045, 107.7174722708215, 'FST', '4', 'Ruang Kuliah Informatika', 'https://i.pinimg.com/736x/b6/f1/8f/b6f18feb6ea10fd2ec13071a3f5b515e.jpg');

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
-- Indexes for table `gedung`
--
ALTER TABLE `gedung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
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
-- AUTO_INCREMENT for table `gedung`
--
ALTER TABLE `gedung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `ruang`
--
ALTER TABLE `ruang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
