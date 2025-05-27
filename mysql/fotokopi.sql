-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2025 at 05:00 PM
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
  `jam_tutup` time DEFAULT NULL,
  `path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fotokopi`
--

INSERT INTO `fotokopi` (`id`, `nama_tempat`, `deskripsi`, `koordinat_lat`, `koordinat_lng`, `link_maps`, `foto`, `jam_buka`, `jam_tutup`, `path`) VALUES
(1, 'FOTO COPY ATK UIN SGD', 'Layanan fotokopi dan alat tulis kampus UIN SGD.', -6.931059141432604, 107.71703104523557, 'hfshdsadasjdjhash', NULL, '06:00:00', '22:00:00', 'M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M4.5 9a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 0 1z'),
(2, 'FOTO COPY MANISI', 'Tempat fotokopi dan print dekat area kampus.', -6.931800022830983, 107.71921209264227, NULL, NULL, NULL, NULL, ''),
(3, 'FOTO COPY ARIFA', 'Layanan fotokopi dan cetak tugas mahasiswa.', -6.930298633517242, 107.71729898105202, NULL, NULL, NULL, NULL, ''),
(4, 'FOTO COPY ZULFA MANDIRI', 'Menyediakan jasa fotokopi dan perlengkapan ATK.', -6.933331181916715, 107.71608607080694, NULL, NULL, NULL, NULL, ''),
(5, 'FOTO COPY SURYA', 'Fotokopi dan cetak cepat dengan harga terjangkau.', -6.9321887944342935, 107.7157919770683, NULL, NULL, NULL, NULL, ''),
(6, 'FOTO COPY YOYO', 'Layanan cetak dokumen dan fotokopi lengkap.', -6.932362268267373, 107.71552345669826, NULL, NULL, NULL, NULL, ''),
(7, 'FOTO COPY LATANSA', 'Fotokopi, print, dan jilid area kampus.', -6.931566826737835, 107.71437265509037, NULL, NULL, NULL, NULL, ''),
(8, 'FOTO COPY ADRIAN', 'Tempat fotokopi dekat gerbang masuk.', -6.931181798713463, 107.71426183715988, NULL, NULL, NULL, NULL, ''),
(9, 'FOTO COPY RIZKA', 'Fotokopi dan cetak tugas mahasiswa.', -6.930994914295137, 107.71440349200854, NULL, NULL, NULL, NULL, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fotokopi`
--
ALTER TABLE `fotokopi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fotokopi`
--
ALTER TABLE `fotokopi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
