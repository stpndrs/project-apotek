<?php
    include 'config.php';
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Menggunakan parameterized query untuk mencegah serangan SQL Injection
        $query = "SELECT * FROM tb_user WHERE username = ? AND password = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "ss", $username, $password);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result) {
            $data_user = mysqli_fetch_assoc($result);
            if ($data_user) {
                if ($data_user['level_user'] == 'Admin') {
                    header("location: obat.php");
                    exit();
                } else if ($data_user['level_user'] == 'Kasir') {
                    header("location: kasir.php");
                    exit();
                } else {
                    $error = "Level pengguna tidak valid.";
                }
            } else {
                $error = "Login Gagal";
            }
        } else {
            $error = "Query Error: " . mysqli_error($conn);
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>LOGIN</title>
    <link rel="stylesheet" type="text/css" href="css/styleLogin.css">
</head>
<body>
     <form action="" method="post">
        <h2>LOGIN</h2>
        <?php if (isset($error)) { ?>
            <p class="error"><?php echo $error; ?></p>
        <?php } ?>
        <label>User Name</label>
        <input type="text" name="username" placeholder="User Name" required><br>

        <label>Password</label>
        <input type="password" name="password" placeholder="Password" required><br>

        <button type="submit" name="submit">Login</button>
     </form>
</body>
</html>
