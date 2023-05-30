<?php
include 'config.php';

if(isset($_GET['id_jenis'])){
    $id_jenis = $_GET['id_jenis'];

    $query = mysqli_query($connect, "DELETE FROM tb_jenis WHERE id_jenis = '$id_jenis'");
    if($query){
        header('Location: jenis.php');
    } else {
        echo 'Gagal menghapus data.';
    }
} else {
    echo 'Parameter id_jenis tidak ditemukan.';
}
?>
