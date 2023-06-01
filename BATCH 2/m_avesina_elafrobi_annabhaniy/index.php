<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
        }

        .container {
            width: 400px;
            margin: 0 auto;
            margin-top: 100px;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            animation: slide-up 0.5s ease;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        @keyframes slide-up {
            from {
                transform: translateY(50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    <?php
        session_start();
        include 'config.php';
        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $query = "SELECT * FROM tb_user WHERE username = '$username'";
            $result = mysqli_query($connect, $query);
            $check = mysqli_num_rows($result);
            if ($check) {
                $data = mysqli_fetch_array($result);
                if ($data['password'] == $password) {
                    $_SESSION['username'] = $username;
                    $_SESSION['level'] = $data['level'];
                    header('Location: dashboard.php');
                } else {
                    echo "Password salah.";
                }
            } else {
                echo "Username tidak ditemukan.";
            }
        }
    ?>
    <div class="container">
        <h1>Login</h1>
        <form method="post">
            <label>Username</label>
            <input type="text" name="username"><br>
            <label>Password</label>
            <input type="password" name="password"><br>
            <input type="submit" name="submit" value="Login">
        </form>
    </div>
</body>
</html>