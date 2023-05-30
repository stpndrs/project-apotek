<?php
session_start();
include 'config.php';

$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];

$login = mysqli_query($conn, "SELECT * FROM tb_user WHERE username='$username' AND password='$password' AND level='$level'");
$cek = mysqli_num_rows($login);

if ($cek > 0) {
    $data = mysqli_fetch_assoc($login);

    $_SESSION['username'] = $username;
    $_SESSION['level'] = $level;

    if ($level == "admin") {
        header("location: dashboard_admin.php");
    } else if ($level == "kasir") {
        header("location: dashboard_kasir.php");
    }
} else {
    header("location: index.php?pesan=gagal");
}
?>
