<?php
include 'config.php';


if (isset($_GET['id_user'])) {
  $id_user = $_GET['id_user'];

  // Delete data from the table
  $query = "DELETE FROM tb_user WHERE id_user='$id_user'";
  mysqli_query($connect, $query);

  // Redirect to the desired page after deleting the data
  header("Location: tb-user.php");
  exit();
}
?>
