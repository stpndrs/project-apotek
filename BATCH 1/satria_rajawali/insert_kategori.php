<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve the kategori data from the form
  $namaKategori = $_POST['kategoriNama']; // Update the variable name to match the HTML form

  // Insert the kategori into the database
  $query = "INSERT INTO tb_kategori (nama_kategori) VALUES ('$namaKategori')";
  $result = mysqli_query($connect, $query);

  if ($result) {
    // Kategori added successfully, redirect to tb-kategori.php
    header("Location: tb-kategori.php");
    exit();
  } else {
    // Error occurred while adding the kategori
    echo "Error adding kategori: " . mysqli_error($connect);
  }
}
?>
