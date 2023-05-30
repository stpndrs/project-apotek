-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2023 at 04:59 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_apotek`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_transaksi`
--

CREATE TABLE `tb_detail_transaksi` (
  `id_detail_transaksi` int(11) NOT NULL,
  `id_transaksi` varchar(100) NOT NULL,
  `id_obat` varchar(100) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_obat`
--

CREATE TABLE `tb_jenis_obat` (
  `id_jenis` int(11) NOT NULL,
  `keterangan_jenis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jenis_obat`
--

INSERT INTO `tb_jenis_obat` (`id_jenis`, `keterangan_jenis`) VALUES
(1, 'batuk'),
(2, 'demam pilek, dan pusing kepala');

-- --------------------------------------------------------

--
-- Table structure for table `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori_obat`
--

CREATE TABLE `tb_kategori_obat` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_obat`
--

CREATE TABLE `tb_obat` (
  `nama_obat` varchar(100) NOT NULL,
  `keterangan_obat` text NOT NULL,
  `jenis_obat` int(11) NOT NULL,
  `stock_obat` int(11) NOT NULL,
  `kategori_obat` int(11) NOT NULL,
  `rak_obat` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `harga_obat` varchar(12) NOT NULL,
  `status_obat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_rak_obat`
--

CREATE TABLE `tb_rak_obat` (
  `id_rak` int(11) NOT NULL,
  `keterangan_rak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `jenis_obat` int(11) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `grand_total` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `lvl_user` enum('admin','owner') NOT NULL,
  `id_karyawan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  ADD PRIMARY KEY (`id_detail_transaksi`);

--
-- Indexes for table `tb_jenis_obat`
--
ALTER TABLE `tb_jenis_obat`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `tb_kategori_obat`
--
ALTER TABLE `tb_kategori_obat`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_obat`
--
ALTER TABLE `tb_obat`
  ADD PRIMARY KEY (`id_obat`),
  ADD KEY `relasi_obat_ke_tb_kategori` (`kategori_obat`),
  ADD KEY `relasi_obat_ke_tb_rak` (`rak_obat`),
  ADD KEY `relasi_obat_ke_tb_jenis` (`jenis_obat`);

--
-- Indexes for table `tb_rak_obat`
--
ALTER TABLE `tb_rak_obat`
  ADD PRIMARY KEY (`id_rak`),
  ADD KEY `keterangan_rak` (`keterangan_rak`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `relasi_tb_byr_ke_tb_obat` (`jenis_obat`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_jenis_obat`
--
ALTER TABLE `tb_jenis_obat`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_kategori_obat`
--
ALTER TABLE `tb_kategori_obat`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_obat`
--
ALTER TABLE `tb_obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_obat`
--
ALTER TABLE `tb_obat`
  ADD CONSTRAINT `relasi_obat_ke_tb_jenis` FOREIGN KEY (`jenis_obat`) REFERENCES `tb_jenis_obat` (`id_jenis`),
  ADD CONSTRAINT `relasi_obat_ke_tb_kategori` FOREIGN KEY (`kategori_obat`) REFERENCES `tb_kategori_obat` (`id_kategori`),
  ADD CONSTRAINT `relasi_obat_ke_tb_rak` FOREIGN KEY (`rak_obat`) REFERENCES `tb_rak_obat` (`id_rak`);

--
-- Constraints for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `relasi_tb_byr_ke_tb_obat` FOREIGN KEY (`jenis_obat`) REFERENCES `tb_obat` (`id_obat`),
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `tb_detail_transaksi` (`id_detail_transaksi`);

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_transaksi` (`id_transaksi`),
  ADD CONSTRAINT `tb_user_ibfk_2` FOREIGN KEY (`id_karyawan`) REFERENCES `tb_karyawan` (`id_karyawan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
