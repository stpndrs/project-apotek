-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Bulan Mei 2023 pada 16.50
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

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
-- Struktur dari tabel `tb_aksesobat`
--

CREATE TABLE `tb_aksesobat` (
  `id_akses` int(11) NOT NULL,
  `akses_obat` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_aksesobat`
--

INSERT INTO `tb_aksesobat` (`id_akses`, `akses_obat`) VALUES
(1, 'Admin'),
(2, 'Kasir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenisobat`
--

CREATE TABLE `tb_jenisobat` (
  `id_jenis` int(11) NOT NULL,
  `jenis_obat` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jenisobat`
--

INSERT INTO `tb_jenisobat` (`id_jenis`, `jenis_obat`) VALUES
(3, 'Sirup'),
(10, 'Kapsul'),
(12, 'Tablet'),
(27, 'Pil');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nik_karyawan` varchar(15) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `tmpt_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`id_karyawan`, `nik_karyawan`, `nama_karyawan`, `tmpt_lahir`, `tgl_lahir`, `alamat`, `no_telp`) VALUES
(1, '00674556', 'Arya', 'Jakarta', '2023-05-09', 'Jl. Pelita Gg. 3', '089766543678'),
(5, '4535345', 'Damar', 'Samarinda', '2006-12-10', 'Jl. Damahuri', '084567887654'),
(7, '55453', 'ffff', 'dgdfgdfgff', '2023-05-02', 'fggff', '75674');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategoriobat`
--

CREATE TABLE `tb_kategoriobat` (
  `id_kategori` int(11) NOT NULL,
  `kategori_obat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kategoriobat`
--

INSERT INTO `tb_kategoriobat` (`id_kategori`, `kategori_obat`) VALUES
(2, 'Obat Keras'),
(3, 'Obat Herbal'),
(4, 'Obat Ringan'),
(6, 'Obat Bebas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_lokasiobat`
--

CREATE TABLE `tb_lokasiobat` (
  `id_lokasi` int(11) NOT NULL,
  `lokasi_obat` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_lokasiobat`
--

INSERT INTO `tb_lokasiobat` (`id_lokasi`, `lokasi_obat`) VALUES
(1, 'Rak 1'),
(2, 'Rak 2'),
(3, 'Rak 3'),
(5, 'Rak 4'),
(6, 'Rak 5'),
(8, 'Rak 7'),
(9, 'Rak 8');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_obat`
--

CREATE TABLE `tb_obat` (
  `id_obat` int(11) NOT NULL,
  `nama_obat` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `status_obat` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_obat`
--

INSERT INTO `tb_obat` (`id_obat`, `nama_obat`, `harga`, `id_jenis`, `id_kategori`, `id_lokasi`, `status_obat`) VALUES
(11, 'Paramex', 70000, 10, 3, 2, 'Aktif'),
(14, 'Paracetamol', 8000, 12, 6, 5, 'Aktif'),
(15, 'Bodrex', 5000, 12, 2, 6, 'Aktif'),
(16, 'KSR 600', 40000, 12, 2, 6, 'Non-Aktif'),
(17, 'Imboost', 10000, 10, 4, 9, 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_stokobat`
--

CREATE TABLE `tb_stokobat` (
  `id_stok` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `stok_obat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_stokobat`
--

INSERT INTO `tb_stokobat` (`id_stok`, `id_obat`, `stok_obat`) VALUES
(3, 11, 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `no_transaksi` varchar(25) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `grand_total` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi_detail`
--

CREATE TABLE `tb_transaksi_detail` (
  `id_transaksi_detail` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `jmlh_obat` int(11) NOT NULL,
  `harga_obat` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `sandi` varchar(100) NOT NULL,
  `id_akses` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `email`, `sandi`, `id_akses`, `id_karyawan`) VALUES
(1, 'Ihsan10@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 0),
(8, 'arya@gmail.com', 'd1d16c28c7674cfc5e269dbe1209f552', 2, 1),
(10, 'damar@gmail.com', 'a01610228fe998f515a72dd730294d87', 1, 5);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vw_obat`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vw_obat` (
`id_obat` int(11)
,`nama_obat` varchar(100)
,`harga` int(11)
,`status_obat` varchar(10)
,`id_stok` int(11)
,`id_jenis` int(11)
,`id_kategori` int(11)
,`id_lokasi` int(11)
,`stok_obat` int(11)
,`jenis_obat` varchar(30)
,`kategori_obat` varchar(20)
,`lokasi_obat` varchar(10)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vw_user`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vw_user` (
`id_user` int(11)
,`email` varchar(30)
,`sandi` varchar(100)
,`id_akses` int(11)
,`id_karyawan` int(11)
,`nik_karyawan` varchar(15)
,`nama_karyawan` varchar(50)
,`tmpt_lahir` varchar(50)
,`tgl_lahir` date
,`alamat` text
,`no_telp` varchar(15)
,`akses_obat` varchar(15)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `vw_obat`
--
DROP TABLE IF EXISTS `vw_obat`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_obat`  AS SELECT `tb_obat`.`id_obat` AS `id_obat`, `tb_obat`.`nama_obat` AS `nama_obat`, `tb_obat`.`harga` AS `harga`, `tb_obat`.`status_obat` AS `status_obat`, `tb_stokobat`.`id_stok` AS `id_stok`, `tb_obat`.`id_jenis` AS `id_jenis`, `tb_obat`.`id_kategori` AS `id_kategori`, `tb_obat`.`id_lokasi` AS `id_lokasi`, `tb_stokobat`.`stok_obat` AS `stok_obat`, `tb_jenisobat`.`jenis_obat` AS `jenis_obat`, `tb_kategoriobat`.`kategori_obat` AS `kategori_obat`, `tb_lokasiobat`.`lokasi_obat` AS `lokasi_obat` FROM ((((`tb_obat` left join `tb_stokobat` on(`tb_stokobat`.`id_obat` = `tb_obat`.`id_obat`)) join `tb_jenisobat` on(`tb_jenisobat`.`id_jenis` = `tb_obat`.`id_jenis`)) join `tb_kategoriobat` on(`tb_kategoriobat`.`id_kategori` = `tb_obat`.`id_kategori`)) join `tb_lokasiobat` on(`tb_lokasiobat`.`id_lokasi` = `tb_obat`.`id_lokasi`))  ;

-- --------------------------------------------------------

--
-- Struktur untuk view `vw_user`
--
DROP TABLE IF EXISTS `vw_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_user`  AS SELECT `tb_user`.`id_user` AS `id_user`, `tb_user`.`email` AS `email`, `tb_user`.`sandi` AS `sandi`, `tb_user`.`id_akses` AS `id_akses`, `tb_user`.`id_karyawan` AS `id_karyawan`, `tb_karyawan`.`nik_karyawan` AS `nik_karyawan`, `tb_karyawan`.`nama_karyawan` AS `nama_karyawan`, `tb_karyawan`.`tmpt_lahir` AS `tmpt_lahir`, `tb_karyawan`.`tgl_lahir` AS `tgl_lahir`, `tb_karyawan`.`alamat` AS `alamat`, `tb_karyawan`.`no_telp` AS `no_telp`, `tb_aksesobat`.`akses_obat` AS `akses_obat` FROM ((`tb_user` join `tb_karyawan` on(`tb_karyawan`.`id_karyawan` = `tb_user`.`id_karyawan`)) join `tb_aksesobat` on(`tb_aksesobat`.`id_akses` = `tb_user`.`id_akses`))  ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_aksesobat`
--
ALTER TABLE `tb_aksesobat`
  ADD PRIMARY KEY (`id_akses`);

--
-- Indeks untuk tabel `tb_jenisobat`
--
ALTER TABLE `tb_jenisobat`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indeks untuk tabel `tb_kategoriobat`
--
ALTER TABLE `tb_kategoriobat`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tb_lokasiobat`
--
ALTER TABLE `tb_lokasiobat`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indeks untuk tabel `tb_obat`
--
ALTER TABLE `tb_obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indeks untuk tabel `tb_stokobat`
--
ALTER TABLE `tb_stokobat`
  ADD PRIMARY KEY (`id_stok`),
  ADD UNIQUE KEY `id_obat` (`id_obat`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `tb_transaksi_detail`
--
ALTER TABLE `tb_transaksi_detail`
  ADD PRIMARY KEY (`id_transaksi_detail`),
  ADD UNIQUE KEY `id_transaksi` (`id_transaksi`),
  ADD UNIQUE KEY `id_obat` (`id_obat`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_aksesobat`
--
ALTER TABLE `tb_aksesobat`
  MODIFY `id_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_jenisobat`
--
ALTER TABLE `tb_jenisobat`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_kategoriobat`
--
ALTER TABLE `tb_kategoriobat`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tb_lokasiobat`
--
ALTER TABLE `tb_lokasiobat`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_obat`
--
ALTER TABLE `tb_obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tb_stokobat`
--
ALTER TABLE `tb_stokobat`
  MODIFY `id_stok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi_detail`
--
ALTER TABLE `tb_transaksi_detail`
  MODIFY `id_transaksi_detail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_obat`
--
ALTER TABLE `tb_obat`
  ADD CONSTRAINT `tb_obat_ibfk_4` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategoriobat` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_obat_ibfk_6` FOREIGN KEY (`id_lokasi`) REFERENCES `tb_lokasiobat` (`id_lokasi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_stokobat`
--
ALTER TABLE `tb_stokobat`
  ADD CONSTRAINT `tb_stokobat_ibfk_1` FOREIGN KEY (`id_obat`) REFERENCES `tb_obat` (`id_obat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_transaksi_detail`
--
ALTER TABLE `tb_transaksi_detail`
  ADD CONSTRAINT `tb_transaksi_detail_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `tb_transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_transaksi_detail_ibfk_2` FOREIGN KEY (`id_obat`) REFERENCES `tb_obat` (`id_obat`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
