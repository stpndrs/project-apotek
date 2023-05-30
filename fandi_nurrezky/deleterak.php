<?php
    include 'config.php';
    $id = $_GET['id'];
    $query = mysqli_query($connect, "DELETE FROM tb_rak WHERE id_rak = $id");
    header('location:rakobat.php');
?>