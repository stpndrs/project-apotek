<?php
include 'config.php';

$id = $_GET['id'];
$query = mysqli_query($connect, "DELETE FROM tb_user WHERE id_user = '$id'");

if ($query) {
    header('Location: user.php');
} else {
    echo "Gagal menghapus user.";
}
?>