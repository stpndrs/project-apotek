<?php
include 'config.php';

if(isset($_GET['id_obat'])){
    $id_obat = $_GET['id_obat'];

    $query = mysqli_query($connect, "DELETE FROM tb_obat WHERE id_obat = '$id_obat'");
    if($query){
        header('Location: obat.php');
    } else {
        echo 'Gagal menghapus data.';
    }
} else {
    echo 'Parameter id_obat tidak ditemukan.';
}
?>
