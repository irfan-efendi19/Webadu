-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 27, 2022 at 07:32 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_webadu`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(100) NOT NULL,
  `thumbnail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `email`, `password`, `thumbnail`) VALUES
(1, 'Muhammad Umar Mansyur', 'admin@gmail.com', '$2y$10$oy6hNftUnhCUn/T/xMZJ3O2PSq023H8vbX6IF4xO0gbkTSh0R.wWC', '9251661578291.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_laporan`
--

CREATE TABLE `tb_laporan` (
  `id_laporan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul_laporan` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal` date NOT NULL,
  `tempat_kejadian` text NOT NULL,
  `instansi_tujuan` varchar(80) NOT NULL,
  `status` int(2) NOT NULL,
  `file` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_laporan`
--

INSERT INTO `tb_laporan` (`id_laporan`, `id_user`, `judul_laporan`, `deskripsi`, `tanggal`, `tempat_kejadian`, `instansi_tujuan`, `status`, `file`, `created_at`, `updated_at`) VALUES
(5, 5, 'Kerjakan Halaman 1', 'coba', '2022-08-27', 'sumenep', 'pt dia', 2, '20811661559717.js', '2022-09-27 07:21:57', '2022-08-27 09:17:28'),
(6, 5, 'Kerjakan Halaman 1', 'af', '2022-08-19', 'sumenep', 'pt dia', 1, '901661564150.html', '2022-01-27 08:35:49', '2022-08-27 09:13:34'),
(7, 5, 'Kerjakan Halaman 1', 'af', '2022-08-19', 'sumenep', 'pt dia', 1, '55491661566443.html', '2022-10-27 09:14:02', '2022-08-27 09:16:55'),
(8, 5, 'Kerjakan Halaman 1', 'af', '2022-08-19', 'sumenep', 'pt dia', 0, '39681661566448.html', '2022-08-27 09:14:08', '2022-08-27 09:14:08');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(70) NOT NULL,
  `nik` varchar(17) NOT NULL,
  `namaLengkap` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `noTelp` varchar(100) NOT NULL,
  `thumbnail` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `email`, `password`, `nik`, `namaLengkap`, `alamat`, `noTelp`, `thumbnail`, `created_at`, `updated_at`) VALUES
(3, 'chilmi', 'chilmiachmad@yahoo.co.id', 'e10adc3949ba59abbe56e057f20f883e', '3578012601920003', '', 'Surabaya', '085648664488', NULL, '2022-08-19 09:03:19', '2022-08-19 09:03:19'),
(4, 'achmad', 'chilmiachmad@yahoo.co.id', 'e10adc3949ba59abbe56e057f20f883e', '3578012601920003', 'Ackmad Chilmi', 'surabaya', '085648664488', NULL, '2022-08-19 09:03:47', '2022-08-19 09:03:47'),
(5, 'Umar', 'umar.ovie@gmail.com', '202cb962ac59075b964b07152d234b70', '35291129070001', 'Muhammad Umar Mansyur', 'Rombasaan Pragaan Sumenep', '085231339223', NULL, '2022-08-25 06:24:02', '2022-08-25 06:24:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_laporan`
--
ALTER TABLE `tb_laporan`
  ADD PRIMARY KEY (`id_laporan`),
  ADD KEY `id_detail_user` (`id_user`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_laporan`
--
ALTER TABLE `tb_laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_laporan`
--
ALTER TABLE `tb_laporan`
  ADD CONSTRAINT `tb_laporan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
