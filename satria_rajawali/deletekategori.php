<?php
include 'config.php';

// Check if the id_rak parameter is provided
if (isset($_GET['id_kategori'])) {
  $idKategori = $_GET['id_kategori'];

  // Delete the rack from the database
  $query = "DELETE FROM tb_kategori WHERE id_kategori = $idKategori";
  $result = mysqli_query($connect, $query);

  if ($result) {
    // Rack deleted successfully, redirect to tb_rak.php
    header("Location: tb-kategori.php");
    exit();
  } else {
    // Error occurred while deleting the rack
    echo "Error deleting rack: " . mysqli_error($connect);
  }
} else {
  // id_rak parameter is missing
  echo "Rack ID not provided.";
}
?>
