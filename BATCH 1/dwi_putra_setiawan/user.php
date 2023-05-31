<?php
include 'config.php';

$query = mysqli_query($connect, "SELECT * FROM tb_user");

?>

<html>
<head>
    <title>Daftar User</title>
    <link type="text/css" rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            margin-top: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        a {
            text-decoration: none;
            color: #007bff;
        }

        .btn {
            background-color: #007bff;
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .btn-primary {
            background-color: #28a745;
        }

        .btn-primary:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <?php include('sidebar.php'); ?>
    <div class="container">
        <h1>Daftar User</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Level User</th>
                <th>Aksi</th>
            </tr>
            <?php
            while ($data = mysqli_fetch_array($query)) {
                echo "<tr>";
                echo "<td>" . $data['id_user'] . "</td>";
                echo "<td>" . $data['username'] . "</td>";
                echo "<td>" . $data['level_user'] . "</td>";
                echo "<td>
                        <a class='btn' href='updateuser.php?id=" . $data['id_user'] . "'>Edit</a>
                        <a class='btn btn-danger' href='hapususer.php?id=" . $data['id_user'] . "'>Hapus</a>
                      </td>";
                echo "</tr>";
            }
            ?>
        </table>
        <br>
        <a class="btn btn-primary" href="tambahuser.php">Tambah User</a>
    </div>
</body>
</html>