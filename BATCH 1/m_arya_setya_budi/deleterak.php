<?php
include 'config.php';

if(isset($_GET['id_rak'])){
    $id_rak = $_GET['id_rak'];

    $query = mysqli_query($connect, "DELETE FROM tb_rak WHERE id_rak = '$id_rak'");
    if($query){
        header('Location: rak.php');
    } else {
        echo 'Gagal menghapus data.';
    }
} else {
    echo 'Parameter id_rak tidak ditemukan.';
}
?>
