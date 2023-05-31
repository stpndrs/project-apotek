<?php
    include "config.php";

    $id = $_GET["id"];
    mysqli_query($connect, "DELETE FROM data_obat WHERE id_obat = $id");
    header("Location:index.php");
?>