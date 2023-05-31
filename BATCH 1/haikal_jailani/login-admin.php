<?php
require "koneksi.php";
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

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['login'] = $username; // set session
        header("Location: dashboard.php");
    } else {
        $error = "Username atau password salah";
    }
}
if (isset($_SESSION['username'])) {
    header('Location: index.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Absensi Siswa</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/dist/css/adminlte.min.css?v=3.2.0">
    <style>
        .login-card-body{
            border-radius:10% ;
        }
    </style>
</head>

<body class="hold-transition register-page">

    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="#"><b>Login Japotek</b><br>Admin Japotek</a>
            </div>
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Silahkan masuk menggunakan akun anda</p>


                    <form action="" method="post">
                        <div class="input-group mb-3">
                            <input type="text" name="username" id="username" class="form-control" placeholder="Username" required autofocus>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary" name="login">Masuk</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://adminlte.io/themes/v3/plugins/jquery/jquery.min.js"></script>
        <script src="https://adminlte.io/themes/v3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="https://adminlte.io/themes/v3/dist/js/adminlte.min.js?v=3.2.0"></script>
    </body>

</html>