<?php
include 'config.php';

if(isset($_GET['id_kategori'])){
    $id_kategori = $_GET['id_kategori'];

    $query = mysqli_query($connect, "DELETE FROM tb_kategori WHERE id_kategori = '$id_kategori'");
    if($query){
        header('Location: kategori.php');
    } else {
        echo 'Gagal menghapus data.';
    }
} else {
    echo 'Parameter id_kategori tidak ditemukan.';
}
?>
