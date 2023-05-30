<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the input data from the form
  $idRak = $_POST['updateId'];
  $nomorRak = $_POST['updateRakNumber'];

  // Update the data in the database
  $query = "UPDATE tb_rak SET nomor_rak = '$nomorRak' WHERE id_rak = '$idRak'";
  $result = mysqli_query($connect, $query);

  if ($result) {
    // Redirect back to the page after successful update
    header("Location: tb-rak.php");
    exit();
  } else {
    // Handle the update error
    echo "Error: " . mysqli_error($connect);
  }
}

mysqli_close($connect);
?>
