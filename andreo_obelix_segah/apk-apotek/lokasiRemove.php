<?php  
    include 'config.php';

    $id = $_GET['id_rak'];
    $query = mysqli_query($conn, "DELETE FROM tb_lokasi WHERE id_rak = $id");

        header('location:lokasi.php');
?>