<?php
include 'config.php';


if (isset($_POST['insert'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];
  
    // Insert data into the table
    $query = "INSERT INTO tb_user (nama, username, password, level) VALUES ('$nama', '$username', '$password', '$level')";
    mysqli_query($connect, $query);
    
    // Redirect to the desired page after inserting the data
    header("Location: tb-user.php");
    exit();
  }
  ?>
?>
