<?php
    include "config.php";

    $id = $_GET["id"];
    mysqli_query($connect, "DELETE FROM lokasi WHERE id_lokasi = $id");
    header("Location:lokasi.php");
?>