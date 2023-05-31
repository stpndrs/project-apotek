<?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $database = 'apotek';

    $connect = mysqli_connect($host, $user, $pass, $database);

    if (!$connect) {
        echo "Koneksi Gagal";
    }
?>