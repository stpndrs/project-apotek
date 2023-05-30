<?php
include 'config.php';

if (isset($_GET['id_obat'])) {
  $id_obat = $_GET['id_obat'];

  $query = "DELETE FROM tb_obat WHERE id_obat = $id_obat";

  $result = mysqli_query($connect, $query);

  if ($result) {
    header("Location: tb-obat.php");
  } else {
    echo "Query execution failed: " . mysqli_error($connect);
  }
}
?>
