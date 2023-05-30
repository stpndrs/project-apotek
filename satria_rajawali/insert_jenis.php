<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve the jenis data from the form
  $namaJenis = $_POST['jenisNama']; // Update the variable name to match the HTML form

  // Insert the jenis into the database
  $query = "INSERT INTO tb_jenis (nama_jenis) VALUES ('$namaJenis')";
  $result = mysqli_query($connect, $query);

  if ($result) {
    // Jenis added successfully, redirect to tb-jenis.php
    header("Location: tb-jenis.php");
    exit();
  } else {
    // Error occurred while adding the jenis
    echo "Error adding jenis: " . mysqli_error($connect);
  }
}
?>
