<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the input data from the form
  $idKategori = $_POST['updateId'];
  $namakategori = $_POST['updatekategoriNama'];

  // Update the data in the database
  $query = "UPDATE tb_kategori SET nama_kategori = '$namakategori' WHERE id_kategori = '$idKategori'";
  $result = mysqli_query($connect, $query);

  if ($result) {
    // Redirect back to the page after successful update
    header("Location: tb-kategori.php");
    exit();
  } else {
    // Handle the update error
    echo "Error: " . mysqli_error($connect);
  }
}

mysqli_close($connect);
?>
