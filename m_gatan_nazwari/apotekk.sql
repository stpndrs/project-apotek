-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Bulan Mei 2023 pada 17.28
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotekk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_transaksi`
--

CREATE TABLE `tb_detail_transaksi` (
  `id_detail` varchar(50) NOT NULL,
  `id_transaksi` varchar(50) NOT NULL,
  `id_obat` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL,
  `sub_total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis`
--

CREATE TABLE `tb_jenis` (
  `id_jenis` varchar(50) NOT NULL,
  `nama_jenis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `id_karyawan` varchar(50) NOT NULL,
  `nama_karyawan` varchar(75) NOT NULL,
  `alamat_karyawan` varchar(75) NOT NULL,
  `no_tlp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`id_karyawan`, `nama_karyawan`, `alamat_karyawan`, `no_tlp`) VALUES
('01', 'Gatan Nazwari', 'M Said LOa Bahu', '0888888888'),
('02', 'Bilal Rizwan', 'Pemuda', '0888888888');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` varchar(50) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_level`
--

CREATE TABLE `tb_level` (
  `id_level` varchar(50) NOT NULL,
  `nama_level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_obat`
--

CREATE TABLE `tb_obat` (
  `id_obat` varchar(50) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `id_jenis` varchar(50) NOT NULL,
  `id_kategori` varchar(50) NOT NULL,
  `id_rak` varchar(50) NOT NULL,
  `stock_obat` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `status_obat` enum('tersedia','kosong') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rak`
--

CREATE TABLE `tb_rak` (
  `id_rak` varchar(50) NOT NULL,
  `no_rak` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` varchar(50) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `id_user` varchar(50) NOT NULL,
  `grand_total` double NOT NULL,
  `nama_plngn` varchar(50) NOT NULL,
  `usia` int(3) NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` varchar(50) NOT NULL,
  `id_karyawan` varchar(50) NOT NULL,
  `id_level` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  ADD PRIMARY KEY (`id_detail`),
  ADD UNIQUE KEY `id_transaksi` (`id_transaksi`),
  ADD UNIQUE KEY `id_obat` (`id_obat`);

--
-- Indeks untuk tabel `tb_jenis`
--
ALTER TABLE `tb_jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tb_level`
--
ALTER TABLE `tb_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `tb_obat`
--
ALTER TABLE `tb_obat`
  ADD PRIMARY KEY (`id_obat`),
  ADD UNIQUE KEY `id_jenis` (`id_jenis`),
  ADD UNIQUE KEY `id_kategori` (`id_kategori`),
  ADD UNIQUE KEY `id_rak` (`id_rak`);

--
-- Indeks untuk tabel `tb_rak`
--
ALTER TABLE `tb_rak`
  ADD PRIMARY KEY (`id_rak`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `id_karyawan` (`id_karyawan`),
  ADD UNIQUE KEY `id_level` (`id_level`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  ADD CONSTRAINT `tb_detail_transaksi_ibfk_1` FOREIGN KEY (`id_obat`) REFERENCES `tb_obat` (`id_obat`),
  ADD CONSTRAINT `tb_detail_transaksi_ibfk_2` FOREIGN KEY (`id_transaksi`) REFERENCES `tb_transaksi` (`id_transaksi`);

--
-- Ketidakleluasaan untuk tabel `tb_obat`
--
ALTER TABLE `tb_obat`
  ADD CONSTRAINT `tb_obat_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id_kategori`),
  ADD CONSTRAINT `tb_obat_ibfk_2` FOREIGN KEY (`id_rak`) REFERENCES `tb_rak` (`id_rak`),
  ADD CONSTRAINT `tb_obat_ibfk_3` FOREIGN KEY (`id_jenis`) REFERENCES `tb_jenis` (`id_jenis`);

--
-- Ketidakleluasaan untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `tb_karyawan` (`id_karyawan`),
  ADD CONSTRAINT `tb_user_ibfk_2` FOREIGN KEY (`id_level`) REFERENCES `tb_level` (`id_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
