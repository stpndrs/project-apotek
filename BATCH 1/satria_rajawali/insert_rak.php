<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the input data from the form
  $nomorRak = $_POST['rakNumber'];

  // Insert the data into the database
  $query = "INSERT INTO tb_rak (nomor_rak) VALUES ('$nomorRak')";
  $result = mysqli_query($connect, $query);

  if ($result) {
    // Redirect back to the page after successful insertion
    header("Location: tb-rak.php");
    exit();
  } else {
    // Handle the insertion error
    echo "Error: " . mysqli_error($connect);
  }
}

mysqli_close($connect);
?>
