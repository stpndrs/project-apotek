<?php  
    include 'config.php';

    $id = $_GET['id_kategori'];
    $query = mysqli_query($conn, "DELETE FROM tb_kategori WHERE id_kategori = $id");

        header('location:kategori.php');
?>