<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve the updated jenis data from the form
  $idJenis = $_POST['updateId'];
  $namaJenis = $_POST['updatejenisNama'];

  // Update the jenis in the database
  $query = "UPDATE tb_jenis SET nama_jenis = '$namaJenis' WHERE id_jenis = $idJenis";
  $result = mysqli_query($connect, $query);

  if ($result) {
    // Jenis updated successfully, redirect to tb-jenis.php
    header("Location: tb-jenis.php");
    exit();
  } else {
    // Error occurred while updating the jenis
    echo "Error updating jenis: " . mysqli_error($connect);
  }
}
?>