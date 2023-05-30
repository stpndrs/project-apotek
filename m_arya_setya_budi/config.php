<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'db_apotik';

$connect = mysqli_connect($host, $username, $password, $database);

// mengecek koneksi
if (mysqli_connect_errno()){
    echo "Koneksi database gagal : " . mysqli_connect_error();
}
?>