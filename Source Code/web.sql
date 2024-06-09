-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2024 at 12:55 PM
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
-- Database: `web`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id_booking` int(100) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `venue` varchar(100) DEFAULT NULL,
  `catering` varchar(100) DEFAULT NULL,
  `dress` varchar(100) DEFAULT NULL,
  `mua` varchar(100) DEFAULT NULL,
  `photography` varchar(100) DEFAULT NULL,
  `harga` int(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id_booking`, `nama`, `venue`, `catering`, `dress`, `mua`, `photography`, `harga`) VALUES
(11, 'Fabhian', '26', '5', '9', '5', '1', 3990000);

-- --------------------------------------------------------

--
-- Table structure for table `catering`
--

CREATE TABLE `catering` (
  `id_catering` int(11) NOT NULL,
  `paket_catering` varchar(30) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(30) NOT NULL,
  `menu` text NOT NULL,
  `porsi` int(30) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `catering`
--

INSERT INTO `catering` (`id_catering`, `paket_catering`, `deskripsi`, `harga`, `menu`, `porsi`, `gambar`) VALUES
(5, 'Javanese', 'Rasakan rempah rempah jawa disetiap suap', 3000000, 'Soto, rawon, pecel', 100, 'picture/Javanese.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `dress`
--

CREATE TABLE `dress` (
  `id_dress` int(100) NOT NULL,
  `nama_dress` varchar(100) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `harga` int(100) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dress`
--

INSERT INTO `dress` (`id_dress`, `nama_dress`, `deskripsi`, `harga`, `gambar`) VALUES
(9, 'western dress', 'dress putih panjang', 200000, 'picture/western dress.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `mua`
--

CREATE TABLE `mua` (
  `id_mua` int(100) NOT NULL,
  `paket_mua` varchar(100) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `harga` int(100) DEFAULT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mua`
--

INSERT INTO `mua` (`id_mua`, `paket_mua`, `deskripsi`, `harga`, `gambar`) VALUES
(5, 'make up regular hair do', 'make up and hair do', 250000, 'picture/make up regular hair do.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `photography`
--

CREATE TABLE `photography` (
  `id_photo` int(30) NOT NULL,
  `paket_photo` varchar(30) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(30) NOT NULL,
  `jumlah_foto` int(30) NOT NULL,
  `jumlah_video` int(30) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `photography`
--

INSERT INTO `photography` (`id_photo`, `paket_photo`, `deskripsi`, `harga`, `jumlah_foto`, `jumlah_video`, `gambar`) VALUES
(1, 'Pixel Harmony', 'Kami dengan senang hati menyajikan layanan fotografi dari Pixel Harmony, ahli dalam menangkap setiap detil indah dalam momen spesial Anda', 240000, 50, 15, ''),
(15, 'Love story', 'Kami mengabadikan momen sakral anda dengan lensa terbaik kami disetiap jepretan kamera', 300000, 20, 15, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(30) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role`) VALUES
(1, 'admin', 'admin', '', 'admin'),
(2, 'user', 'user', '', 'user'),
(3, 'tes', '123', '', 'user'),
(6, 'email', 'email', 'email@gmail.com', 'user'),
(9, 'ty', 'ty', 'ty@gmail.com', 'user'),
(10, 'vi', 'vi', 'vi@gmail.com', 'user'),
(19, 'ju', 'ju', 'ji@gmail.com', 'user'),
(22, 'bu', 'bu', 'bu@gmail.com', 'user'),
(25, 'ANJAYY', '123', 'sisesaputra@gmail.com', 'user'),
(26, 'Fabhian', 'fabhian', 'fabhian@gmail.com', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE `venue` (
  `id_venue` int(30) NOT NULL,
  `nama_venue` varchar(30) NOT NULL,
  `harga` int(30) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`id_venue`, `nama_venue`, `harga`, `kota`, `alamat`, `gambar`) VALUES
(26, 'Sun hotel', 300000, 'Sidoarjo', 'https://www.google.com/maps/place/The+Sun+Hotel+Sidoarjo/@-7.4495168,112.7075459,17z/data=!3m1!4b1!4m9!3m8!1s0x2dd7e149b5a06729:0xa30235da3db93b38!5m2!4m1!1i2!8m2!3d-7.4495221!4d112.7101208!16s%2Fg%2F1tdtxwt5?entry=ttu', 'picture/Sun hotel.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`);

--
-- Indexes for table `catering`
--
ALTER TABLE `catering`
  ADD PRIMARY KEY (`id_catering`);

--
-- Indexes for table `dress`
--
ALTER TABLE `dress`
  ADD PRIMARY KEY (`id_dress`);

--
-- Indexes for table `mua`
--
ALTER TABLE `mua`
  ADD PRIMARY KEY (`id_mua`);

--
-- Indexes for table `photography`
--
ALTER TABLE `photography`
  ADD PRIMARY KEY (`id_photo`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `venue`
--
ALTER TABLE `venue`
  ADD PRIMARY KEY (`id_venue`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id_booking` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `catering`
--
ALTER TABLE `catering`
  MODIFY `id_catering` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dress`
--
ALTER TABLE `dress`
  MODIFY `id_dress` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mua`
--
ALTER TABLE `mua`
  MODIFY `id_mua` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `photography`
--
ALTER TABLE `photography`
  MODIFY `id_photo` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `venue`
--
ALTER TABLE `venue`
  MODIFY `id_venue` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
