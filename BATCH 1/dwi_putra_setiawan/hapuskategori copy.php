<?php  
include 'config.php';

$id = $_GET['id'];
$query = mysqli_query($connect, "DELETE FROM tb_kategori WHERE id_kategori = '$id'");

if ($query) {
    header('Location: kategori.php');
} else {
    echo "Gagal menghapus kategori.";
}
?>