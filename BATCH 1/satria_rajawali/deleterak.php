<?php
include 'config.php';

// Check if the id_rak parameter is provided
if (isset($_GET['id_rak'])) {
  $idRak = $_GET['id_rak'];

  // Delete the rack from the database
  $query = "DELETE FROM tb_rak WHERE id_rak = $idRak";
  $result = mysqli_query($connect, $query);

  if ($result) {
    // Rack deleted successfully, redirect to tb_rak.php
    header("Location: tb-rak.php");
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
