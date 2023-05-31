<?php 
require 'configLog.php';

  if (isset($_POST["login"])) {

      $username = $_POST["username"];
      $password = $_POST["password"];

       $result = mysqli_query($conn, "SELECT * FROM tb_ user WHERE username = '$username'");

        
      if(mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if($password == $row['password']) {
          // header("Location: index.php");
          // exit;
          echo "benar";
        }
        echo "password salah woi";
      }

  }
?>

<!DOCTYPE html>
<html>
  <head>
  <link rel="stylesheet" type="text/scss" href="css/login.scss">
  </head>
<body>

<h2>Welcome</h2>

<form action="index.php" method="post">
<form class="login">
  <div class="login"></div><input type="text" placeholder="Username">
  <div class="login"></div><input type="password" placeholder="Password">
  <div class="button"></div><button>Login</button>
</form>
</form> 
</body>
</html>
