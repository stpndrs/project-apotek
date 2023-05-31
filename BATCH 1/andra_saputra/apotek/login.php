<?php 
require 'config.php';

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
<body>

<h2>Login Apotek</h2>

<form action="index.php" method="post">
        <ul>
          <li>
            <label for="username">Username :</label>
            <input type="text" name="username" id"username">
          </li>
          <li>
            <label for="password">Password :</label>
            <input type="password" name="password" id"password">
          </li>
        </ul>
        <li>
          <button type="submit" name="login">Login</button>
        </li>
</form> 
</body>
</html>
