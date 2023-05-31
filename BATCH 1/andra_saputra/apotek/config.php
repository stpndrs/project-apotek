<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database ='db_apotek';

$connect = mysqli_connect($host, $username, $password, $database);
if ($connect) {
    echo 'Koneksi database berhasil';
} else {
    echo 'koneksi database gagal' . mysqli_error($connect);
}