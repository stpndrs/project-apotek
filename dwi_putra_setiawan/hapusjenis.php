<?php  
include 'config.php';

$id = $_GET['id'];
$query = mysqli_query($connect, "DELETE FROM tb_jenis WHERE id_jenis = '$id'");

if ($query) {
    header('Location: jenis.php');
} else {
    echo "Gagal menghapus jenis.";
}
?>