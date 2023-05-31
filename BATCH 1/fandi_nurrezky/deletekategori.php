<?php
    include 'config.php';
    $id = $_GET['id'];
    $query = mysqli_query($connect, "DELETE FROM tb_kategori WHERE id_kategori = $id");
    header('location:kategori.php');
?>