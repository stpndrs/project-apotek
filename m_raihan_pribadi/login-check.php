<?php
require_once "config/database.php";

$username = mysqli_real_escape_string($mysqli, stripslashes(strip_tags(htmlspecialchars(trim($_POST['username'])))));
$password = md5(mysqli_real_escape_string($mysqli, stripslashes(strip_tags(htmlspecialchars(trim($_POST['password']))))));

if (!ctype_alnum($username) OR !ctype_alnum($password)) {
	header("Location: index.php?alert=1");
}
else {
	$query = mysqli_query($mysqli, "SELECT * FROM is_users WHERE username='$username' AND password='$password' AND status='aktif'")
									or die('Ada kesalahan pada query user: '.mysqli_error($mysqli));
	$rows  = mysqli_num_rows($query);

	if ($rows > 0) {
		$data  = mysqli_fetch_assoc($query);

		session_start();
		$_SESSION['id_user']   = $data['id_user'];
		$_SESSION['username']  = $data['username'];
		$_SESSION['password']  = $data['password'];
		$_SESSION['nama_user'] = $data['nama_user'];
		$_SESSION['hak_akses'] = $data['hak_akses'];
		
		header("Location: main.php?module=beranda");
	}

	else {
		header("Location: index.php?alert=1");
	}
}
?>