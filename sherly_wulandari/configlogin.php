<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'apotek';

$connect = mysqli_connect($host, $username, $password, $database);
if ($connect) {
    echo '';
} else {
    echo 'koneksi database gagal' . mysqli_error($connect);
}