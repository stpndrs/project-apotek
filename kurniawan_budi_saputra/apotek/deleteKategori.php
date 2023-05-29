<?php
include 'config.php';

$id = $_GET ['id_kategori'];
$query = mysqli_query($connect, "DELETE FROM id_kategori WHERE id_kategori = $id ");

header('location:TableKategori.php');
?>