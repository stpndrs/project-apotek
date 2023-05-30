-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2023 at 06:08 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotek`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_obat`
--

CREATE TABLE `data_obat` (
  `id_obat` varchar(8) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `id_jenis` int(8) NOT NULL,
  `id_kategori` int(8) NOT NULL,
  `id_lokasi` int(8) NOT NULL,
  `harga` varchar(12) NOT NULL,
  `stok` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_obat`
--

INSERT INTO `data_obat` (`id_obat`, `nama_obat`, `id_jenis`, `id_kategori`, `id_lokasi`, `harga`, `stok`) VALUES
('1', 'ibuprofen', 2, 2, 2, ' 2000', 62);

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail` int(8) NOT NULL,
  `id_transaksi` varchar(12) NOT NULL,
  `id_obat` varchar(12) NOT NULL,
  `qty` varchar(8) NOT NULL,
  `subtotal` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail`, `id_transaksi`, `id_obat`, `qty`, `subtotal`) VALUES
(1, '11:55', '1', '01', '2000'),
(2, '11:55', '1', '01', '2000'),
(3, '12:05', '1', '01', '2000');

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(8) NOT NULL,
  `nama_jenis` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`) VALUES
(1, 'puyer'),
(2, 'tablet'),
(3, 'cair'),
(4, 'kapsul');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(8) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'bebas'),
(2, 'bebas terbatas'),
(3, 'keras'),
(4, 'resep');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id_lokasi` int(8) NOT NULL,
  `nama_lokasi` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id_lokasi`, `nama_lokasi`) VALUES
(1, 'rak 1'),
(2, 'rak 2'),
(3, 'rak 3');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(12) NOT NULL,
  `grandtotal` varchar(12) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `usia` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `grandtotal`, `nama`, `usia`) VALUES
('11:50', '4000', 'Imam Ahmad Dzaki', '16'),
('11:55', '2000', 'Imam Ahmad Dzaki', '16'),
('12:05', '2000', 'Imam Ahmad Dzaki', '16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_obat`
--
ALTER TABLE `data_obat`
  ADD PRIMARY KEY (`id_obat`),
  ADD KEY `id_jenis` (`id_jenis`,`id_kategori`,`id_lokasi`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_lokasi` (`id_lokasi`),
  ADD KEY `id_jenis_2` (`id_jenis`,`id_kategori`,`id_lokasi`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_obat` (`id_obat`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id_lokasi` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_obat`
--
ALTER TABLE `data_obat`
  ADD CONSTRAINT `data_obat_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `jenis` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_obat_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_obat_ibfk_3` FOREIGN KEY (`id_lokasi`) REFERENCES `lokasi` (`id_lokasi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`),
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`id_obat`) REFERENCES `data_obat` (`id_obat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
