<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'dbapotek';

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
}
?>