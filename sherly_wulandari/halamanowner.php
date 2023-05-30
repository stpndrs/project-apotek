<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include 'configlogin.php';
 
// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];
$id_user =$_POST['id_user'];
$level =$_POST['level'];
$id_karyawan =$_POST['id_karyawan'];
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select * from user where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
 
	// cek jika user login sebagai admin
	if($data['level']=="owner"){
 
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "owner";
		// alihkan ke halaman dashboard admin
		header("location:rak.php");
 
	// cek jika user login sebagai pegawai
	}else if($data['level']=="admin"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "admin";
		// alihkan ke halaman dashboard pegawai
		header("location:halamanpetugas.php");
 
	// cek jika user login sebagai pengurus
	}else{
 
		// alihkan ke halaman login kembali
		header("location:index.php?pesan=gagal");
	}	
}else{
	header("location:index.php?pesan=gagal");
}
 
?>
<html>
    <head>
        <title>Logouthalamanowner</title>
        <link rel="stylesheet" href="rak.php">
    </head>
    <body>
        
    </body>
</html>