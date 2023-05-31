<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'db_apotek';

$connect = mysqli_connect($host, $username, $password, $database);

if ($connect) {
    echo '';
} else {
    echo 'koneksi databse gagal' . mysqli_connect($connect);
}
?>