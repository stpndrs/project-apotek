<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'db_apoteker';

$connect = mysqli_connect($host, $username, $password, $database);

if (!$connect) {
	echo "Koneksi database berhasil";
}
?>