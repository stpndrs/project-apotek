<?php
include 'config.php';

// Check if the id_jenis parameter is provided
if (isset($_GET['id_jenis'])) {
  $idJenis = $_GET['id_jenis'];

  // Delete the jenis from the database
  $query = "DELETE FROM tb_jenis WHERE id_jenis = $idJenis";
  $result = mysqli_query($connect, $query);

  if ($result) {
    // Jenis deleted successfully, redirect to tb-jenis.php
    header("Location: tb-jenis.php");
    exit();
  } else {
    // Error occurred while deleting the jenis
    echo "Error deleting jenis: " . mysqli_error($connect);
  }
} else {
  // id_jenis parameter is missing
  echo "Jenis ID not provided.";
}
?>
