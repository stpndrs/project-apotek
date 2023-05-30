<?php
include 'config.php';

$id = $_GET['id'];
$query = mysqli_query($connect, "SELECT * FROM tb_user WHERE id_user = '$id'");
$data = mysqli_fetch_array($query);

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level_user = $_POST['level_user'];

    $queryUpdate = mysqli_query($connect, "UPDATE tb_user SET username='$username', password='$password', level_user='$level_user' WHERE id_user = '$id'");

    if ($queryUpdate) {
        header('Location: user.php');
    }
}
?>

<html>
<head>
    <title>Form Ubah User</title>
    <link type="text/css" rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            width: 400px;
            margin: 0 auto;
            background-color: #f5f8fa;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            margin-top: 20px;
        }

        table {
            width: 100%;
        }

        td {
            padding: 10px 0;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <?php include('sidebar.php'); ?>
    <div class="container">
        <h1>Ubah User</h1>
        <form method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" value="<?php echo $data['username'] ?>"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" value="<?php echo $data['password'] ?>"></td>
                </tr>
                <tr>
                    <td>Level User</td>
                    <td>
                        <select name="level_user">
                            <option value="admin" <?php if ($data['level_user'] == 'admin') echo 'selected' ?>>Admin</option>
                            <option value="user" <?php if ($data['level_user'] == 'user') echo 'selected' ?>>User</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><input type="hidden" name="id" value="<?php echo $data['id_user'] ?>"></td>
                    <td><button type="submit" name="submit" value="updateuser">Ubah</button></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>