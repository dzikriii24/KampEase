-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2025 at 05:50 AM
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
  `foto` text DEFAULT NULL,
  `path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `atm`
--

INSERT INTO `atm` (`id`, `nama_bank`, `jenis`, `deskripsi`, `koordinat_lat`, `koordinat_lng`, `link_maps`, `foto`, `path`) VALUES
(1, 'BNI', 'ATM', 'Mesin ATM BNI tersedia untuk transaksi perbankan.', -6.932569406312306, 107.71625136981969, '', '', 'xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-bank\" viewBox=\"0 0 16 16\">\r\n  <path d=\"m8 0 6.61 3h.89a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v7a.5.5 0 0 1 .485.38l.5 2a.498.498 0 0 1-.485.62H.5a.498.498 0 0 1-.485-.62l.5-2A.5.5 0 0 1 1 13V6H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 3h.89zM3.777 3h8.447L8 1zM2 6v7h1V6zm2 0v7h2.5V6zm3.5 0v7h1V6zm2 0v7H12V6zM13 6v7h1V6zm2-1V4H1v1zm-.39 9H1.39l-.25 1h13.72z\"'),
(2, 'BSI', 'ATM', 'Mesin ATM BSI tersedia untuk transaksi syariah.', -6.932572831435344, 107.71622811316632, '', '', 'xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-bank\" viewBox=\"0 0 16 16\">\r\n  <path d=\"m8 0 6.61 3h.89a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v7a.5.5 0 0 1 .485.38l.5 2a.498.498 0 0 1-.485.62H.5a.498.498 0 0 1-.485-.62l.5-2A.5.5 0 0 1 1 13V6H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 3h.89zM3.777 3h8.447L8 1zM2 6v7h1V6zm2 0v7h2.5V6zm3.5 0v7h1V6zm2 0v7H12V6zM13 6v7h1V6zm2-1V4H1v1zm-.39 9H1.39l-.25 1h13.72z\"'),
(3, 'BRI', 'ATM', 'Mesin ATM BRI siap digunakan untuk keperluan transaksi.', -6.933216267706431, 107.71602896339809, '', '', 'xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-bank\" viewBox=\"0 0 16 16\">\r\n  <path d=\"m8 0 6.61 3h.89a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v7a.5.5 0 0 1 .485.38l.5 2a.498.498 0 0 1-.485.62H.5a.498.498 0 0 1-.485-.62l.5-2A.5.5 0 0 1 1 13V6H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 3h.89zM3.777 3h8.447L8 1zM2 6v7h1V6zm2 0v7h2.5V6zm3.5 0v7h1V6zm2 0v7H12V6zM13 6v7h1V6zm2-1V4H1v1zm-.39 9H1.39l-.25 1h13.72z\"'),
(4, 'BJB', 'ATM', 'Mesin ATM BJB mendukung layanan perbankan daerah.', -6.93229785648367, 107.71532071338895, '', '', 'xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-bank\" viewBox=\"0 0 16 16\">\r\n  <path d=\"m8 0 6.61 3h.89a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v7a.5.5 0 0 1 .485.38l.5 2a.498.498 0 0 1-.485.62H.5a.498.498 0 0 1-.485-.62l.5-2A.5.5 0 0 1 1 13V6H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 3h.89zM3.777 3h8.447L8 1zM2 6v7h1V6zm2 0v7h2.5V6zm3.5 0v7h1V6zm2 0v7H12V6zM13 6v7h1V6zm2-1V4H1v1zm-.39 9H1.39l-.25 1h13.72z\"'),
(5, 'Mandiri', 'ATM', 'Mesin ATM Mandiri untuk transaksi nasabah umum.', -6.934162818939533, 107.7164435951879, '', '', 'xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-bank\" viewBox=\"0 0 16 16\">\r\n  <path d=\"m8 0 6.61 3h.89a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v7a.5.5 0 0 1 .485.38l.5 2a.498.498 0 0 1-.485.62H.5a.498.498 0 0 1-.485-.62l.5-2A.5.5 0 0 1 1 13V6H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 3h.89zM3.777 3h8.447L8 1zM2 6v7h1V6zm2 0v7h2.5V6zm3.5 0v7h1V6zm2 0v7H12V6zM13 6v7h1V6zm2-1V4H1v1zm-.39 9H1.39l-.25 1h13.72z\"'),
(6, 'BCA', 'ATM', 'Mesin ATM BCA melayani transaksi nasabah secara cepat.', -6.9341750477027055, 107.71647434681199, '', '', 'xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-bank\" viewBox=\"0 0 16 16\">\r\n  <path d=\"m8 0 6.61 3h.89a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v7a.5.5 0 0 1 .485.38l.5 2a.498.498 0 0 1-.485.62H.5a.498.498 0 0 1-.485-.62l.5-2A.5.5 0 0 1 1 13V6H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 3h.89zM3.777 3h8.447L8 1zM2 6v7h1V6zm2 0v7h2.5V6zm3.5 0v7h1V6zm2 0v7H12V6zM13 6v7h1V6zm2-1V4H1v1zm-.39 9H1.39l-.25 1h13.72z\"');

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
(2, 'FOTO COPY MANISI', 'Tempat fotokopi dan print dekat area kampus.', -6.931800022830983, 107.71921209264227, NULL, NULL, NULL, NULL, 'M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M4.5 9a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 0 1z'),
(3, 'FOTO COPY ARIFA', 'Layanan fotokopi dan cetak tugas mahasiswa.', -6.930298633517242, 107.71729898105202, NULL, NULL, NULL, NULL, 'M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M4.5 9a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 0 1z'),
(4, 'FOTO COPY ZULFA MANDIRI', 'Menyediakan jasa fotokopi dan perlengkapan ATK.', -6.933331181916715, 107.71608607080694, NULL, NULL, NULL, NULL, 'M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M4.5 9a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 0 1z'),
(5, 'FOTO COPY SURYA', 'Fotokopi dan cetak cepat dengan harga terjangkau.', -6.9321887944342935, 107.7157919770683, NULL, NULL, NULL, NULL, 'M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M4.5 9a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 0 1z'),
(6, 'FOTO COPY YOYO', 'Layanan cetak dokumen dan fotokopi lengkap.', -6.932362268267373, 107.71552345669826, NULL, NULL, NULL, NULL, 'M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M4.5 9a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 0 1z'),
(7, 'FOTO COPY LATANSA', 'Fotokopi, print, dan jilid area kampus.', -6.931566826737835, 107.71437265509037, NULL, NULL, NULL, NULL, 'M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M4.5 9a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 0 1z'),
(8, 'FOTO COPY ADRIAN', 'Tempat fotokopi dekat gerbang masuk.', -6.931181798713463, 107.71426183715988, NULL, NULL, NULL, NULL, 'M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M4.5 9a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 0 1z'),
(9, 'FOTO COPY RIZKA', 'Fotokopi dan cetak tugas mahasiswa.', -6.930994914295137, 107.71440349200854, NULL, NULL, NULL, NULL, 'M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M4.5 9a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 0 1z');

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
(4, 'Gedung No Name Dekat Abjan', 'Gedung belum memiliki nama resmi, terletak dekat Abjan.', -6.931877035422862, 107.71730199958503, 4, 'https://maps.app.goo.gl/TXCEALQBYv5xAi2r7', 'https://i.pinimg.com/736x/e4/6e/51/e46e51766a57feb14d24cd9146dc928e.jpg', '06.00 - 18.00', 'fakultas/gedungDekatAbjan.php'),
(5, 'Gedung No Name 2 Samping Alfa', 'Gedung belum bernama, terletak di samping Alfa.', -6.931877035422862, 107.71730199958503, 4, 'https://maps.app.goo.gl/TXCEALQBYv5xAi2r7', '', '06.00 - 18.00', 'fakultas/gedungDekatAlfamart.php'),
(6, 'Laboratorium', 'Gedung laboratorium untuk praktikum mahasiswa.', -6.931919614485614, 107.71828926348739, 4, 'https://maps.app.goo.gl/RMw9yMV8Nihi5AxZ9', '', '06.00 - 18.00', 'fakultas/laboratorium.php'),
(7, 'Anwar Musaddad', 'Gedung perkuliahan dan pusat kegiatan akademik.', -6.931719599198086, 107.71845291202926, 4, 'https://maps.app.goo.gl/kchuvVwA3yopSdbu7', '', '06.00 - 18.00', 'fakultas/anwarmusaddad.php'),
(8, 'PTIPD', 'Pusat Teknologi Informasi dan Pangkalan Data.', -6.931089756540548, 107.71735280408025, 4, 'https://maps.app.goo.gl/kdTPYQsA9qHAdH3S7', 'https://i.pinimg.com/736x/09/59/d6/0959d62eff93645b2c3b70f897b7597b.jpg', '06.00 - 18.00', 'fakultas/ptipd.php'),
(9, 'LC', 'Language Center sebagai pusat pelatihan bahasa.', -6.93116034430411, 107.71785113358443, 4, 'https://maps.app.goo.gl/PY4wwa1jqUuEQY9R9', '', '06.00 - 18.00', 'fakultas/LanguageCenter.php'),
(10, 'Fakultas Saintek', 'Fakultas Sains dan Teknologi.', -6.931319165601076, 107.71825531858354, 4, 'https://maps.app.goo.gl/2XNBpSVvBy5oVud68', 'https://i.pinimg.com/1200x/89/b8/21/89b82106bd3058f9890c87348dc5dd83.jpg', '06.00 - 18.00', 'fakultas/fst.php'),
(11, 'Psikologi', 'Fakultas Psikologi UIN Sunan Gunung Djati Bandung.', -6.930901546548185, 107.71705150840296, 4, 'https://maps.app.goo.gl/jZSkGRHLnUCqnjeP9', 'https://i.pinimg.com/736x/40/5c/df/405cdf3a08bc25aaf3b894e1b543381c.jpg', '06.00 - 18.00', 'fakutas/fakultasPsikologi.php'),
(12, 'Adab dan Humaniora', 'Fakultas Adab dan Humaniora.', -6.930714910909067, 107.7173341259825, 4, 'https://maps.app.goo.gl/tQkNBsfsiZ3jJDeP8', 'https://i.pinimg.com/736x/28/29/7d/28297da72ac95491fe7b732e9b8c9c75.jpg', '06.00 - 18.00', 'fakultas/adhum.php'),
(13, 'Dakwah dan Komunikasi', 'Fakultas Dakwah dan Komunikasi.', -6.930709585689087, 107.7175654665469, 4, 'https://maps.app.goo.gl/fCmfw9Zzi4i9UH85A', '', '06.00 - 18.00', 'fakultas/dakom.php'),
(14, 'No Name Gazebo', 'Gazebo atau tempat duduk umum kampus.', -6.930609897558121, 107.71786723696006, 4, 'https://maps.app.goo.gl/52YUubEeRMhmW3Ej7', '', '06.00 - 18.00', 'fakultas/gazebo.php'),
(15, 'Syariah dan Hukum', 'Fakultas Syariah dan Hukum.', -6.931022403538432, 107.71793471195708, 4, 'https://maps.app.goo.gl/hsW68A4pHSuDbMMY9', '', '06.00 - 18.00', 'fakultas/syarkum.php'),
(16, 'Gedung Kuliah Syariah dan Hukum', 'Gedung perkuliahan Fakultas Syariah dan Hukum.', -6.930580564350668, 107.71830153289044, 4, 'https://maps.app.goo.gl/3yfVkqkVZFWvTQiT7', 'https://i.pinimg.com/736x/0f/53/5b/0f535b5095efacccade9b22c048d8e31.jpg', '06.00 - 18.00', 'fakultas/gedungKuliahSyarkum.php'),
(17, 'Gedung No Name Belakang Gazebo', 'Gedung terletak di belakang gazebo.', -6.930397943148804, 107.7180559844487, 4, 'https://maps.app.goo.gl/ThvjKZ3GbAnKgXEdA', '', '06.00 - 18.00', 'fakultas/belakangGazebo.php'),
(18, 'Gedung Kuliah Ushuluddin', 'Gedung kuliah Fakultas Ushuluddin.', -6.9301539191152, 107.71816045639534, 4, 'https://maps.app.goo.gl/mzec9E4HucHYmje49', '', '06.00 - 18.00', 'fakultas/gedungKuliahUshuluddin.php'),
(19, 'Gedung V', 'Salah satu gedung perkuliahan di area kampus.', -6.929758374818687, 107.71817452823645, 4, 'https://maps.app.goo.gl/4SHCqYKx5hZZC4uj6', 'https://i.pinimg.com/736x/b2/b9/4f/b2b94fdc23ed2fc931d6a409dde7a837.jpg', '06.00 - 18.00', 'fakultas/gedungV.php'),
(20, 'Gedung U', 'Salah satu gedung di lingkungan kampus.', -6.929949530094452, 107.71813823770157, 4, 'https://maps.app.goo.gl/ncjExyVNaaPGhuMH6', 'https://i.pinimg.com/736x/4a/3e/f7/4a3ef740d5b393a5a982d679358f72d4.jpg', '06.00 - 18.00', 'fakultas/gedungU.php'),
(21, 'Mahad Cowo', 'Asrama mahasiswa putra (mahad)', -6.929624942731576, 107.7187716353046, 4, 'https://maps.app.goo.gl/a7EdGxeKAPWWvhEh7', 'https://i.pinimg.com/736x/9f/1d/99/9f1d99d0cf6f8b359e846e832d8fe130.jpg', '24 jam', 'fakultas/mahadCowok.php'),
(22, 'Mahad Cewe', 'Asrama mahasiswa putri (mahad)', -6.929395466701478, 107.71863194759902, 4, 'https://maps.app.goo.gl/6HPPMFPh8Z3jLA4W7', '', '24 jam', 'fakultas/mahadCewek.php'),
(23, 'SC (Student Center)', 'Pusat kegiatan mahasiswa dan organisasi kampus.', -6.929454364685878, 107.71839159713615, 4, 'https://maps.app.goo.gl/V1GrQ73svpXHxxyP8', '', '24 jam', 'fakultas/sc.php');

-- --------------------------------------------------------

--
-- Table structure for table `kantin`
--

CREATE TABLE `kantin` (
  `id` int(11) NOT NULL,
  `nama_kantin` varchar(200) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `koordinat_lat` double NOT NULL,
  `koordinat_lng` double NOT NULL,
  `link_maps` text DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kantin`
--

INSERT INTO `kantin` (`id`, `nama_kantin`, `deskripsi`, `koordinat_lat`, `koordinat_lng`, `link_maps`, `foto`, `path`) VALUES
(1, 'KANTIN MERAH', NULL, -6.9305926064183225, 107.71860382609607, 'https://www.google.com/maps?q=-6.9305926064183225,107.71860382609607', NULL, 'xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-fork-knife\" viewBox=\"0 0 16 16\">\r\n  <path d=\"M13 .5c0-.276-.226-.506-.498-.465-1.703.257-2.94 2.012-3 8.462a.5.5 0 0 0 .498.5c.56.01 1 .13 1 1.003v5.5a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5zM4.25 0a.25.25 0 0 1 .25.25v5.122a.128.128 0 0 0 .256.006l.233-5.14A.25.25 0 0 1 5.24 0h.522a.25.25 0 0 1 .25.238l.233 5.14a.128.128 0 0 0 .256-.006V.25A.25.25 0 0 1 6.75 0h.29a.5.5 0 0 1 .498.458l.423 5.07a1.69 1.69 0 0 1-1.059 1.711l-.053.022a.92.92 0 0 0-.58.884L6.47 15a.971.971 0 1 1-1.942 0l.202-6.855a.92.92 0 0 0-.58-.884l-.053-.022a1.69 1.69 0 0 1-1.059-1.712L3.462.458A.5.5 0 0 1 3.96 0z\"'),
(2, 'KANTIN ATAS', NULL, -6.9302890687506915, 107.71857029848287, 'https://www.google.com/maps?q=-6.9302890687506915,107.71857029848287', 'https://i.pinimg.com/736x/82/0a/40/820a4081aa59f0c2f7f10688d9dd943f.jpg', 'xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-fork-knife\" viewBox=\"0 0 16 16\">\r\n  <path d=\"M13 .5c0-.276-.226-.506-.498-.465-1.703.257-2.94 2.012-3 8.462a.5.5 0 0 0 .498.5c.56.01 1 .13 1 1.003v5.5a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5zM4.25 0a.25.25 0 0 1 .25.25v5.122a.128.128 0 0 0 .256.006l.233-5.14A.25.25 0 0 1 5.24 0h.522a.25.25 0 0 1 .25.238l.233 5.14a.128.128 0 0 0 .256-.006V.25A.25.25 0 0 1 6.75 0h.29a.5.5 0 0 1 .498.458l.423 5.07a1.69 1.69 0 0 1-1.059 1.711l-.053.022a.92.92 0 0 0-.58.884L6.47 15a.971.971 0 1 1-1.942 0l.202-6.855a.92.92 0 0 0-.58-.884l-.053-.022a1.69 1.69 0 0 1-1.059-1.712L3.462.458A.5.5 0 0 1 3.96 0z\"'),
(3, 'KANTIN MAHAD', NULL, -6.9296832381052615, 107.71867134723794, 'https://www.google.com/maps?q=-6.9296832381052615,107.71867134723794', 'https://i.pinimg.com/736x/f7/86/fc/f786fc325052fddfdb25bb94be609f36.jpg', 'xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-fork-knife\" viewBox=\"0 0 16 16\">\r\n  <path d=\"M13 .5c0-.276-.226-.506-.498-.465-1.703.257-2.94 2.012-3 8.462a.5.5 0 0 0 .498.5c.56.01 1 .13 1 1.003v5.5a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5zM4.25 0a.25.25 0 0 1 .25.25v5.122a.128.128 0 0 0 .256.006l.233-5.14A.25.25 0 0 1 5.24 0h.522a.25.25 0 0 1 .25.238l.233 5.14a.128.128 0 0 0 .256-.006V.25A.25.25 0 0 1 6.75 0h.29a.5.5 0 0 1 .498.458l.423 5.07a1.69 1.69 0 0 1-1.059 1.711l-.053.022a.92.92 0 0 0-.58.884L6.47 15a.971.971 0 1 1-1.942 0l.202-6.855a.92.92 0 0 0-.58-.884l-.053-.022a1.69 1.69 0 0 1-1.059-1.712L3.462.458A.5.5 0 0 1 3.96 0z\"'),
(4, 'JAJANAN MANISI', NULL, -6.931343753956027, 107.71932967716448, 'https://www.google.com/maps?q=-6.931343753956027,107.71932967716448', NULL, 'xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-fork-knife\" viewBox=\"0 0 16 16\">\r\n  <path d=\"M13 .5c0-.276-.226-.506-.498-.465-1.703.257-2.94 2.012-3 8.462a.5.5 0 0 0 .498.5c.56.01 1 .13 1 1.003v5.5a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5zM4.25 0a.25.25 0 0 1 .25.25v5.122a.128.128 0 0 0 .256.006l.233-5.14A.25.25 0 0 1 5.24 0h.522a.25.25 0 0 1 .25.238l.233 5.14a.128.128 0 0 0 .256-.006V.25A.25.25 0 0 1 6.75 0h.29a.5.5 0 0 1 .498.458l.423 5.07a1.69 1.69 0 0 1-1.059 1.711l-.053.022a.92.92 0 0 0-.58.884L6.47 15a.971.971 0 1 1-1.942 0l.202-6.855a.92.92 0 0 0-.58-.884l-.053-.022a1.69 1.69 0 0 1-1.059-1.712L3.462.458A.5.5 0 0 1 3.96 0z\"'),
(5, 'JAJANAN DPR', NULL, -6.930468205832364, 107.71738845398073, 'https://www.google.com/maps?q=-6.930468205832364,107.71738845398073', NULL, 'xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-fork-knife\" viewBox=\"0 0 16 16\">\r\n  <path d=\"M13 .5c0-.276-.226-.506-.498-.465-1.703.257-2.94 2.012-3 8.462a.5.5 0 0 0 .498.5c.56.01 1 .13 1 1.003v5.5a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5zM4.25 0a.25.25 0 0 1 .25.25v5.122a.128.128 0 0 0 .256.006l.233-5.14A.25.25 0 0 1 5.24 0h.522a.25.25 0 0 1 .25.238l.233 5.14a.128.128 0 0 0 .256-.006V.25A.25.25 0 0 1 6.75 0h.29a.5.5 0 0 1 .498.458l.423 5.07a1.69 1.69 0 0 1-1.059 1.711l-.053.022a.92.92 0 0 0-.58.884L6.47 15a.971.971 0 1 1-1.942 0l.202-6.855a.92.92 0 0 0-.58-.884l-.053-.022a1.69 1.69 0 0 1-1.059-1.712L3.462.458A.5.5 0 0 1 3.96 0z\"'),
(6, 'JAJANAN DEPAN UIN', NULL, -6.9323027868953035, 107.71573198088933, 'https://www.google.com/maps?q=-6.9323027868953035,107.71573198088933', NULL, 'xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-fork-knife\" viewBox=\"0 0 16 16\">\r\n  <path d=\"M13 .5c0-.276-.226-.506-.498-.465-1.703.257-2.94 2.012-3 8.462a.5.5 0 0 0 .498.5c.56.01 1 .13 1 1.003v5.5a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5zM4.25 0a.25.25 0 0 1 .25.25v5.122a.128.128 0 0 0 .256.006l.233-5.14A.25.25 0 0 1 5.24 0h.522a.25.25 0 0 1 .25.238l.233 5.14a.128.128 0 0 0 .256-.006V.25A.25.25 0 0 1 6.75 0h.29a.5.5 0 0 1 .498.458l.423 5.07a1.69 1.69 0 0 1-1.059 1.711l-.053.022a.92.92 0 0 0-.58.884L6.47 15a.971.971 0 1 1-1.942 0l.202-6.855a.92.92 0 0 0-.58-.884l-.053-.022a1.69 1.69 0 0 1-1.059-1.712L3.462.458A.5.5 0 0 1 3.96 0z\"');

-- --------------------------------------------------------

--
-- Table structure for table `lapangan`
--

CREATE TABLE `lapangan` (
  `id` int(11) NOT NULL,
  `nama_lapangan` varchar(100) DEFAULT NULL,
  `koordinat_lat` double DEFAULT NULL,
  `koordinat_lng` double DEFAULT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `link_maps` text DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lapangan`
--

INSERT INTO `lapangan` (`id`, `nama_lapangan`, `koordinat_lat`, `koordinat_lng`, `jenis`, `link_maps`, `foto`, `deskripsi`, `path`) VALUES
(1, 'Lapangan Tenis', -6.932457296232611, 107.71804003627727, 'Tenis', 'https://www.google.com/maps?q=-6.932457296232611,107.71804003627727', '', 'Lapangan tenis outdoor berstandar nasional.', 'xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" viewBox=\"0 0 16 16\">\r\n  <path d=\"M0 64C0 46.3 14.3 32 32 32H608c17.7 0 32 14.3 32 32V448c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32V64zm592 352V96H344v80c22.1 0 40 17.9 40 40v80c0 22.1-17.9 40-40 40v80H592zM296 96H48V416H296V336c-22.1 0-40-17.9-40-40V216c0-22.1 17.9-40 40-40V96zM320 256c13.3 0 24-10.7 24-24V216c0-13.3-10.7-24-24-24s-24 10.7-24 24v16c0 13.3 10.7 24 24 24z\r\n\"'),
(2, 'Lapangan Basket', -6.9315235725772, 107.71881853572745, 'Basket', 'https://www.google.com/maps?q=-6.9315235725772,107.71881853572745', '', 'Lapangan basket dengan ring standar FIBA.', 'xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" viewBox=\"0 0 16 16\">\r\n  <path d=\"M0 64C0 46.3 14.3 32 32 32H608c17.7 0 32 14.3 32 32V448c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32V64zm592 352V96H344v80c22.1 0 40 17.9 40 40v80c0 22.1-17.9 40-40 40v80H592zM296 96H48V416H296V336c-22.1 0-40-17.9-40-40V216c0-22.1 17.9-40 40-40V96zM320 256c13.3 0 24-10.7 24-24V216c0-13.3-10.7-24-24-24s-24 10.7-24 24v16c0 13.3 10.7 24 24 24z\r\n\"'),
(3, 'Lapangan Volley', -6.931412714782629, 107.71874747045673, 'Volley', 'https://www.google.com/maps?q=-6.931412714782629,107.71874747045673', '', 'Lapangan volley dengan permukaan keras.', 'xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" viewBox=\"0 0 16 16\">\r\n  <path d=\"M0 64C0 46.3 14.3 32 32 32H608c17.7 0 32 14.3 32 32V448c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32V64zm592 352V96H344v80c22.1 0 40 17.9 40 40v80c0 22.1-17.9 40-40 40v80H592zM296 96H48V416H296V336c-22.1 0-40-17.9-40-40V216c0-22.1 17.9-40 40-40V96zM320 256c13.3 0 24-10.7 24-24V216c0-13.3-10.7-24-24-24s-24 10.7-24 24v16c0 13.3 10.7 24 24 24z\r\n\"'),
(4, 'GOR Badminton', -6.930787879443302, 107.71859772578034, 'Badminton', 'https://www.google.com/maps?q=-6.930787879443302,107.71859772578034', '', 'Gedung olahraga indoor untuk badminton.', 'xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" viewBox=\"0 0 16 16\">\r\n  <path d=\"M0 64C0 46.3 14.3 32 32 32H608c17.7 0 32 14.3 32 32V448c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32V64zm592 352V96H344v80c22.1 0 40 17.9 40 40v80c0 22.1-17.9 40-40 40v80H592zM296 96H48V416H296V336c-22.1 0-40-17.9-40-40V216c0-22.1 17.9-40 40-40V96zM320 256c13.3 0 24-10.7 24-24V216c0-13.3-10.7-24-24-24s-24 10.7-24 24v16c0 13.3 10.7 24 24 24z\r\n\"');

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
  `foto` text DEFAULT NULL,
  `path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `masjid`
--

INSERT INTO `masjid` (`id`, `nama_masjid`, `deskripsi`, `koordinat_lat`, `koordinat_lng`, `link_maps`, `foto`, `path`) VALUES
(1, 'Masjid Iqomah', '', -6.931446602578177, 107.71739291650812, 'https://www.google.com/maps?q=-6.931446602578177,107.71739291650812', 'https://i.pinimg.com/736x/38/ff/4b/38ff4b21b1daf3c343b3d953aadecc62.jpg', 'xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-moon-fill\" viewBox=\"0 0 16 16\">\r\n  <path d=\"M6 .278a.77.77 0 0 1 .08.858 7.2 7.2 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277q.792-.001 1.533-.16a.79.79 0 0 1 .81.316.73.73 0 0 1-.031.893A8.35 8.35 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.75.75 0 0 1 6 .278\"'),
(2, 'Masjid Kifayatul Achyar', '', -6.9320373488453395, 107.71578134036872, 'https://www.google.com/maps?q=-6.9320373488453395,107.71578134036872', '', 'xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-moon-fill\" viewBox=\"0 0 16 16\">\r\n  <path d=\"M6 .278a.77.77 0 0 1 .08.858 7.2 7.2 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277q.792-.001 1.533-.16a.79.79 0 0 1 .81.316.73.73 0 0 1-.031.893A8.35 8.35 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.75.75 0 0 1 6 .278\"'),
(3, 'Masjid Alhidayah Manisi', '', -6.931697145872738, 107.71964502125911, 'https://www.google.com/maps?q=-6.931697145872738,107.71964502125911', '', 'xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-moon-fill\" viewBox=\"0 0 16 16\">\r\n  <path d=\"M6 .278a.77.77 0 0 1 .08.858 7.2 7.2 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277q.792-.001 1.533-.16a.79.79 0 0 1 .81.316.73.73 0 0 1-.031.893A8.35 8.35 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.75.75 0 0 1 6 .278\"'),
(4, 'Masjid Al Ijtihad', '', -6.933483847597857, 107.71614030728196, 'https://www.google.com/maps?q=-6.933483847597857,107.71614030728196', '', 'xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-moon-fill\" viewBox=\"0 0 16 16\">\r\n  <path d=\"M6 .278a.77.77 0 0 1 .08.858 7.2 7.2 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277q.792-.001 1.533-.16a.79.79 0 0 1 .81.316.73.73 0 0 1-.031.893A8.35 8.35 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.75.75 0 0 1 6 .278\"'),
(5, 'Masjid Alhuda Cipadung', '', -6.92941769306864, 107.71684605280959, 'https://www.google.com/maps?q=-6.92941769306864,107.71684605280959', '', 'xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-moon-fill\" viewBox=\"0 0 16 16\">\r\n  <path d=\"M6 .278a.77.77 0 0 1 .08.858 7.2 7.2 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277q.792-.001 1.533-.16a.79.79 0 0 1 .81.316.73.73 0 0 1-.031.893A8.35 8.35 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.75.75 0 0 1 6 .278\"');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `gedung`
--
ALTER TABLE `gedung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `kantin`
--
ALTER TABLE `kantin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lapangan`
--
ALTER TABLE `lapangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `masjid`
--
ALTER TABLE `masjid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
