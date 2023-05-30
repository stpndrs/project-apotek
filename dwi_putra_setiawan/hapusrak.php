<?php  
include 'config.php';

$id = $_GET['id'];
$query = mysqli_query($connect, "DELETE FROM tb_rak WHERE id_rak = '$id'");

if ($query) {
    header('Location: rak.php');
} else {
    echo "Gagal menghapus rak.";
}
?>