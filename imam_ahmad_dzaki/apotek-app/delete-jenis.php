<?php
    include "config.php";

    $id = $_GET["id"];
    mysqli_query($connect, "DELETE FROM jenis WHERE id_jenis = $id");
    header("Location:jenis.php");
?>