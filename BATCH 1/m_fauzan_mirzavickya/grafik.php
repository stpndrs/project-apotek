<?php
include 'config.php';

session_start();
if ($_SESSION['level_user'] !== 'admin') {
    echo 'Akses ditolak. Anda harus login sebagai admin.';
    exit();
}

// Tampilkan konten halaman grafik di sini
?>

<html>
<head>
    <title>Grafik Penjualan</title>
</head>
<body>
    <h1>Grafik Penjualan</h1>
    <!-- Tambahkan konten grafik di sini -->
</body>
</html>