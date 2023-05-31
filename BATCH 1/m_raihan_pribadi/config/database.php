<?php
$server   = "localhost";
$username = "root";
$password = "";
$database = "persediaan_obat";
$mysqli = new mysqli($server, $username, $password, $database);

if ($mysqli->connect_error) {
    die('Koneksi Database Gagal : '.$mysqli->connect_error);
}
?>