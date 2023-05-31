<?php
session_start();

  // if(isset($_SESSION['username'])){
  // 	header('Location: dashboard.php');
  // 	}
include 'config.php';

if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($connect,"SELECT * FROM tb_user WHERE username='$username'");

    if(mysqli_num_rows($query) >0){
		$data = mysqli_fetch_assoc($query);
		if($password == $data['password']){
			$_SESSION['username']=$username;
			$_SESSION['password']=$password;
			header('Location: dashboard.php');
			
		}else {
			echo '<script>alert("password Salah")</script>';
		}
    
    }else {
        echo '<script>alert("email tidak ditemukan")</script>';
    }
}

?>


<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Animated Login Form | CodingNepal</title>
    <link rel="stylesheet" href="login.css">
  </head>
  <body>
    <div class="center">
      <h1>Login</h1>
      <form method="post">
        <div class="txt_field">
        <input type="text" id="username" name="username" >
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
        <input type="password" id="password" name="password" >
          <span></span>
          <label>Password</label>
        </div>
        <input type="submit" name="submit" value="submit">
      </form>
    </div>

  </body>
</html>
