<?php
    include "config.php";

    $id = $_GET["id"];
    mysqli_query($connect, "DELETE FROM kategori WHERE id_kategori = $id");
    header("Location:kategori.php");
?>