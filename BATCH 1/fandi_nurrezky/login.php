<?php
 session_start();

//  if(isset($_SESSION['username'])){
//      header('Location: index.php');
// }
 include 'config.php';
 
 if(isset($_POST['submit'])) {
     $username = $_POST['username'];
     $password = $_POST['password'];
     $query = mysqli_query($connect,"SELECT * FROM tb_user WHERE username='$username'");
 
     if(mysqli_num_rows($query) >0){
         $data = mysqli_fetch_assoc($query);
         if($password == $data['password']){
             $_SESSION['username'] = $username;
             $_SESSION['password'] = $password;
            //  var_dump($_SESSION);
            //  die;
             header('Location: index.php');
             
         }else {
             echo '<script>alert("Sandi Salah")</script>';
         }
     
     }else {
         echo '<script>alert("email tidak ditemukan")</script>';
    }
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Apotek</title>
</head>
<body>
    <style>
        @import url(https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap);
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}
html, body{
    display: grid;
    height: 100%;
    width: 100%;
    place-items: center;
    background: linear-gradient(90deg, hsla(177, 87%, 79%, 1) 0%, hsla(235, 89%, 70%, 1) 100%);
}
::selection{
    background: #4158d0;
    color: #fff;
}
.wrapper{
    width: 380px;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.1);
}
.wrapper .title{
    font-size: 35px;
    font-weight: 700;
    text-align: center;
    line-height: 100px;
    color: #050b1d;
    padding-top: 30px;
    user-select: none;
}
.wrapper form{
    padding: 0px 30px 50px 30px;
}
.wrapper form .field{
    height: 50px;
    width: 100%;
    margin-top: 20px;
    position: relative;
}
.wrapper form .field input{
    height: 100%;
    width: 100%;
    outline: none;
    font-size: 17px;
    padding-left: 20px;
    border: 1px solid lightgray;
    border-radius: 25px;
    transition: all 0.3s ease;
}
.wrapper form .field input:focus,
form .field input:valid{
    border-color: #4158d0;
}
.wrapper form .field label{
    position: absolute;
    top: 50%;
    left: 20px;
    color: #999999;
    font-weight: 400;
    font-size: 17px;
    pointer-events: none;
    transform: translateY(-50%);
    transition: all 0.3s ease;
}
form .field input:focus ~ label,
form .field input:valid ~ label{
    top: 0%;
    font-size: 16px;
    color: #4158d0;
    background: #fff;
    transform: translateY(-50%);
}
form .content{
    display: flex;
    width: 100%;
    height: 50px;
    font-size: 16px;
    align-items: center;
    justify-content: space-around;
}
form .content .checkbox{
    display: flex;
    align-items: center;
    justify-content: center;
}
form .content input{
    width: 15px;
    height: 15px;
}
form .content label{
    color:#262626;
    user-select: none;
    padding-left: 5px;
}
form .field input[type="submit"]{
    color: #fff;
    border: none;
    padding-left: 0;
    margin-top: -10px;
    font-size: 20px;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;
    background: linear-gradient(45deg, hsla(177, 87%, 79%, 1) 0%, hsla(235, 89%, 70%, 1) 100%);
}
form .field input[type="submit"]:active{
    transform: scale(0.95);
}
form .signup-link{
    color: #262626;
    margin-top: 50px;
    text-align: center;
}
form .signup-link p{
    margin: 15px;
}
form .signup-link .icon i{
    font-size: 20px;
    color: #fff;
    margin: 0px 5px 30px 5px;
    padding: 12px;
    border-radius: 50px;
}
form .signup-link .icon i:nth-child(1){
    background: #4267b2;
}
form .signup-link .icon i:nth-child(2){
    background: #1da1f2;
}
form .signup-link .icon i:nth-child(3){
    background: #db4437;
}
form .pass-link a,
form .link-signup a{
    color: #4158d0;
    text-decoration: none;
}
form .pass-link a:hover,
form .link-signup a:hover{
    text-decoration: underline;
}
    </style>
    <div class="wrapper">
        <div class="title">
            Login
        </div>
        <form method="post">
            <div class="field">
                <input type="text" name="username" id="username" required>
                <label for="email">username</label>
            </div>
            <div class="field">
                <input type="password" name="password" id="password" required>
                <label for="password">Password</label>
            </div>
            <!-- <div class="content">
                <div class="checkbox">
                    <input type="checkbox" name="checkbox" id="checkbox">
                    <label for="checkbox">Remember me</label>
                </div>
                <div class="pass-link">
                    <a href="#">Forgot password</a>
                </div>
            </div> -->
            <div class="field">
                <input type="submit" name="submit" value="submit">
            </div>
            </div>
        </form>
    </div>
</body>
</html>