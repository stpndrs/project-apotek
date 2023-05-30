<?php
include 'koneksi.php';

$id = $_GET['id'];
$query = mysqli_query($connect, "DELETE FROM obat WHERE id_obat = $id");

header('location:index1.php');
?>