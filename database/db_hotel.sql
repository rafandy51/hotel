-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2021 at 06:06 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `id` int(10) NOT NULL,
  `kd_kamar` varchar(10) NOT NULL,
  `fitur` enum('ac','no ac','ac+wifi') NOT NULL,
  `harga_sewa` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`id`, `kd_kamar`, `fitur`, `harga_sewa`) VALUES
(1, 'c1', 'no ac', 200000),
(2, 'b1', 'ac', 300000),
(5, 'a1', 'ac+wifi', 400000),
(14, '', 'ac', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reservasi_kamar`
--

CREATE TABLE `reservasi_kamar` (
  `id` int(20) NOT NULL,
  `id_pelanggan` int(20) NOT NULL,
  `no_bill` varchar(100) NOT NULL,
  `kd_kamar` varchar(10) NOT NULL,
  `tgl_chkin` date NOT NULL,
  `tgl_chkout` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservasi_kamar`
--

INSERT INTO `reservasi_kamar` (`id`, `id_pelanggan`, `no_bill`, `kd_kamar`, `tgl_chkin`, `tgl_chkout`, `status`) VALUES
(8, 0, '08072021b13  ', 'b1', '2021-07-31', '2021-08-07', 'menunggu_pembayaran'),
(9, 0, '08072021b12  ', 'b1', '2021-07-31', '2021-08-07', 'menunggu_pembayaran');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `no_hp`, `nama`, `username`, `password`, `level`) VALUES
(1, '082171865000', 'rafandy', 'admin', 'admin', 'admin'),
(2, '082155556666', 'budi', 'resepsionis', 'resepsionis', 'resepsionis'),
(3, '082188889999', 'mali', 'pengelola_keuangan', 'pengelola_keuangan', 'pengelola_keuangan'),
(12, '089712212332', 'pelanggan', 'pelanggan02', 'pelanggan01', 'pelanggan'),
(13, '082122227777', 'siti', 'siti20', 'siti20', 'pelanggan'),
(15, '0821555522', 'zulnidyane', 'ane14', 'ane14', 'pelanggan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kd_kamar` (`kd_kamar`);

--
-- Indexes for table `reservasi_kamar`
--
ALTER TABLE `reservasi_kamar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_bill` (`no_bill`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_hp` (`no_hp`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `reservasi_kamar`
--
ALTER TABLE `reservasi_kamar`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
