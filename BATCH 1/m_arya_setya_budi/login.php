<?php
include 'config.php';

mysqli_close($connect);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
        }

        h2 {
            color: #333;
            text-align: center;
        }

        form {
            max-width: 300px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>LOGIN</h2>
    <form method="post" action="">
        <label>Username:</label>
        <input type="text" name="username" required><br>

        <label>Password:</label>
        <input type="password" name="password" required><br>

        <input type="submit" name="submit">
    </form>
</body>
</html>
    <?php
    include 'config.php';
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = "SELECT * FROM tb_user WHERE username = '$username' AND `password` = '$password'";
        $result = mysqli_query($connect, $query);
        if ($result) {
            $data_user = mysqli_fetch_assoc($result);
            if ($data_user) {
                if ($data_user['level'] == 'Admin') {
                    header("location: dashboard.php");
                    exit();
                } elseif ($data_user['level'] == 'Kasir') {
                    header("location: homepetugas.php");
                    exit();
                } else {
                    echo "Level pengguna tidak valid.";
                }
            } else {
                echo "Login Gagal";
            }
        } else {
            echo "Query Error: " . mysqli_error($connect);
        }
    }

    ?>
</body>
</html>
