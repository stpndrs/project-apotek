<?php
    include 'config.php';
    $id = $_GET['id'];
    $query = mysqli_query($connect, "DELETE FROM tb_jenis WHERE id_jenis = $id");
    header('location:jenisobat.php');
?>