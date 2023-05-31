<?php
include 'config.php';


if (isset($_POST['update'])) {
  $id_user = $_POST['id_user'];
  $nama = $_POST['nama'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $level = $_POST['level'];

  // Update data in the table
  $query = "UPDATE tb_user SET nama='$nama', username='$username', password='$password', level='$level' WHERE id_user='$id_user'";
  mysqli_query($connect, $query);
  
  // Redirect to the desired page after updating the data
  header("Location: tb-user.php");
  exit();
}
?>
