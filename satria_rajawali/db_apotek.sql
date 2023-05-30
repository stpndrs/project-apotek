-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Bulan Mei 2023 pada 15.34
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 7.4.30

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
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `jumlah` varchar(25) NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail`, `id_transaksi`, `id_obat`, `jumlah`, `sub_total`) VALUES
(5, 1, 1, '5', 50),
(6, 1, 3, '22', 110),
(7, 2, 1, '1', 10),
(8, 2, 3, '4', 20),
(9, 2, 2, '1', 4),
(10, 3, 1, '6', 60),
(11, 3, 1, '6', 60),
(12, 4, 1, '11', 110),
(13, 4, 1, '11', 110),
(14, 4, 1, '11', 110),
(15, 4, 1, '11', 110),
(16, 4, 1, '11', 110),
(17, 4, 1, '11', 110),
(18, 4, 1, '11', 110),
(19, 4, 1, '11', 110),
(20, 4, 1, '11', 110),
(21, 4, 1, '11', 110),
(22, 4, 1, '11', 110),
(23, 4, 1, '11', 110),
(24, 4, 1, '11', 110),
(25, 4, 1, '11', 110),
(26, 4, 1, '11', 110),
(27, 4, 1, '11', 110),
(28, 4, 1, '11', 110),
(29, 4, 1, '11', 110),
(30, 4, 1, '11', 110),
(31, 4, 1, '11', 110),
(32, 4, 1, '11', 110),
(33, 4, 1, '11', 110),
(34, 4, 1, '11', 110),
(35, 4, 1, '11', 110),
(36, 4, 1, '11', 110),
(37, 4, 1, '11', 110),
(38, 4, 1, '11', 110),
(39, 4, 1, '11', 110),
(40, 4, 1, '11', 110),
(41, 4, 1, '11', 110),
(42, 4, 1, '11', 110),
(43, 4, 1, '11', 110),
(44, 4, 1, '11', 110),
(45, 4, 1, '11', 110),
(46, 4, 1, '11', 110),
(47, 4, 1, '11', 110),
(48, 4, 1, '11', 110),
(49, 4, 1, '11', 110),
(50, 4, 1, '11', 110),
(51, 4, 1, '11', 110),
(52, 4, 1, '11', 110),
(53, 4, 1, '11', 110),
(54, 4, 1, '11', 110),
(55, 4, 1, '11', 110),
(56, 4, 1, '11', 110),
(57, 4, 1, '11', 110),
(58, 4, 1, '11', 110),
(59, 4, 1, '11', 110),
(60, 4, 1, '11', 110),
(61, 4, 1, '11', 110),
(62, 4, 1, '11', 110),
(63, 4, 1, '11', 110),
(64, 4, 1, '11', 110),
(65, 4, 1, '11', 110),
(66, 4, 1, '11', 110),
(67, 4, 1, '11', 110),
(68, 4, 1, '11', 110),
(69, 4, 1, '11', 110),
(70, 4, 1, '11', 110),
(71, 4, 1, '11', 110),
(72, 4, 1, '11', 110),
(73, 4, 1, '11', 110),
(74, 4, 1, '11', 110),
(75, 4, 1, '11', 110),
(76, 4, 1, '11', 110),
(77, 4, 1, '11', 110),
(78, 4, 1, '11', 110),
(79, 4, 1, '11', 110),
(80, 4, 1, '11', 110),
(81, 4, 1, '11', 110),
(82, 4, 1, '11', 110),
(83, 4, 1, '11', 110),
(84, 4, 1, '11', 110),
(85, 4, 1, '11', 110),
(86, 4, 1, '11', 110),
(87, 4, 1, '11', 110),
(88, 4, 1, '11', 110),
(89, 4, 1, '11', 110),
(90, 4, 1, '11', 110),
(91, 4, 1, '11', 110),
(92, 4, 1, '11', 110),
(93, 4, 1, '11', 110),
(94, 4, 1, '11', 110),
(95, 4, 1, '11', 110),
(96, 4, 1, '11', 110),
(97, 4, 1, '11', 110),
(98, 4, 1, '11', 110),
(99, 4, 1, '11', 110),
(100, 4, 1, '11', 110),
(101, 4, 1, '11', 110),
(102, 4, 1, '11', 110),
(103, 4, 1, '11', 110),
(104, 4, 1, '11', 110),
(105, 4, 1, '11', 110),
(106, 4, 1, '11', 110),
(107, 4, 1, '11', 110),
(108, 4, 1, '11', 110),
(109, 4, 1, '11', 110),
(110, 4, 1, '11', 110),
(111, 4, 1, '11', 110),
(112, 4, 1, '11', 110),
(113, 4, 1, '11', 110),
(114, 4, 1, '11', 110),
(115, 4, 1, '11', 110),
(116, 4, 1, '11', 110),
(117, 4, 1, '11', 110),
(118, 4, 1, '11', 110),
(119, 4, 1, '11', 110),
(120, 4, 1, '11', 110),
(121, 4, 1, '11', 110),
(122, 4, 1, '11', 110),
(123, 4, 1, '11', 110),
(124, 4, 1, '11', 110),
(125, 4, 1, '11', 110),
(126, 5, 2, '2', 8),
(127, 6, 3, '5', 25),
(128, 6, 2, '5', 20),
(129, 7, 1, '2', 20),
(130, 7, 2, '2', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis`
--

CREATE TABLE `tb_jenis` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jenis`
--

INSERT INTO `tb_jenis` (`id_jenis`, `nama_jenis`) VALUES
(1, 'sirup'),
(2, 'tablet'),
(3, 'puyer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'keras'),
(2, 'ringan'),
(4, 'gacor');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_obat`
--

CREATE TABLE `tb_obat` (
  `id_obat` int(11) NOT NULL,
  `nama_obat` varchar(25) NOT NULL,
  `jenis_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `rak_id` int(11) NOT NULL,
  `stock` enum('ada','kosong') NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_obat`
--

INSERT INTO `tb_obat` (`id_obat`, `nama_obat`, `jenis_id`, `kategori_id`, `rak_id`, `stock`, `harga`) VALUES
(1, 'sanmol', 1, 2, 1, 'ada', 10),
(2, 'mixagrib', 2, 1, 2, 'ada', 4),
(3, 'bodrex', 2, 1, 3, 'ada', 5),
(4, 'panadol', 3, 4, 6, 'ada', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rak`
--

CREATE TABLE `tb_rak` (
  `id_rak` int(11) NOT NULL,
  `nomor_rak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_rak`
--

INSERT INTO `tb_rak` (`id_rak`, `nomor_rak`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_petugas` varchar(25) NOT NULL,
  `grand_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `tanggal`, `nama_petugas`, `grand_total`) VALUES
(1, '2023-05-31', 'nartor', 160),
(2, '2023-05-21', 'narto', 34),
(3, '2023-05-03', 'sumanto', 60),
(4, '2023-05-09', 'gwe', 110),
(5, '2023-05-09', 'gwe', 8),
(6, '2023-05-30', 'narto', 45),
(7, '2023-05-01', 'gwe', 28);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` enum('admin','kasir') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `username`, `password`, `level`) VALUES
(3, 'Admin', 'admin', 'admin', 'admin'),
(4, 'Kasir', 'kasir', 'kasir', 'kasir'),
(5, 'kacir', 'kocak', 'lol', 'kasir');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_obat` (`id_obat`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indeks untuk tabel `tb_jenis`
--
ALTER TABLE `tb_jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tb_obat`
--
ALTER TABLE `tb_obat`
  ADD PRIMARY KEY (`id_obat`),
  ADD KEY `relasi jenis` (`jenis_id`),
  ADD KEY `relasi kategori` (`kategori_id`),
  ADD KEY `relasi rak` (`rak_id`);

--
-- Indeks untuk tabel `tb_rak`
--
ALTER TABLE `tb_rak`
  ADD PRIMARY KEY (`id_rak`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT untuk tabel `tb_jenis`
--
ALTER TABLE `tb_jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_obat`
--
ALTER TABLE `tb_obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_rak`
--
ALTER TABLE `tb_rak`
  MODIFY `id_rak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`id_obat`) REFERENCES `tb_obat` (`id_obat`),
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`id_transaksi`) REFERENCES `tb_transaksi` (`id_transaksi`);

--
-- Ketidakleluasaan untuk tabel `tb_obat`
--
ALTER TABLE `tb_obat`
  ADD CONSTRAINT `relasi jenis` FOREIGN KEY (`jenis_id`) REFERENCES `tb_jenis` (`id_jenis`),
  ADD CONSTRAINT `relasi kategori` FOREIGN KEY (`kategori_id`) REFERENCES `tb_kategori` (`id_kategori`),
  ADD CONSTRAINT `relasi rak` FOREIGN KEY (`rak_id`) REFERENCES `tb_rak` (`id_rak`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
