<?php  
    include 'config.php';

    $id = $_GET['id_jenis'];
    $query = mysqli_query($conn, "DELETE FROM tb_jenis WHERE id_jenis = $id");

        header('location:jenis.php');
?>