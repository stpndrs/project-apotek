<?php 

$host = 'localhost';
$usernamae= 'root';
$password = '';
$database = 'dbapotek';

$conn = mysqli_connect($host, $usernamae, $password, $database);

// mengecek apakah database tersambung atau tidak
// if ($conn) {
//     echo 'koneksi database berhasil';

// } else {
//     echo 'koneksi database gagal' . mysqli_error($conect);
// }
?>