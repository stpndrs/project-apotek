<?php
    include 'config.php';
    $id = $_GET['id'];
    $query = mysqli_query($connect, "DELETE FROM tb_obat WHERE id_obat = $id");
    header('location:dataobat.php');
?>