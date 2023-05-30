<?php
    require "configapotek.php";
session_start();
if (isset($_POST["login"])) {

    // $username = $_POST["username"];
    // $password = $_POST["password"];

    // $result = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");

    // if(mysqli_num_rows($result) === 1){
    //     $row = mysqli_fetch_assoc($result);
    //     header("Location: index.php");
    // }

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($connect, "SELECT * FROM tb_user WHERE username='$username'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['login'] = $username; // set session
        header("Location: halamanpetugas.php");
    } else {
        $error = "Username atau password salah";
    }
}
if (isset($_SESSION['username'])) {
    header('Location: halamanpetugas.php');
}
?>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="login.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css">
    </head>
    <body>
        <div class="container">
            <h1>Login</h1>
            <input type="text" name="username" placeholder="username" id="input"><br>
            <input type="password" name="password" placeholder="password" id="input"><br>
            <button type="submit" name="Login" value="Login" id="submit"><a href="halamanpetugas.php">Login</button>
        </div>
    </body>
</html>