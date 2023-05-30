<?php
include 'config.php';


if (isset($_POST['submit'])) {
    $id_jenis = $_POST['id_jenis'];
    $nama_jenis = $_POST['nama_jenis'];

    $query = mysqli_query($connect, "INSERT INTO tb_jenis (id_jenis, nama_jenis) VALUES ('$id_jenis', '$nama_jenis')");

    if($query){
        header('Location: jenis.php');
    }
}
?>

<html>
    <head>
        <title>Form Tambah Berita</title>
        <link type="text/css" rel="stylesheet" href="style.css">
        <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 500px;
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

        form {
            margin-top: 20px;
        }

        table {
            width: 100%;
        }

        td {
            padding: 10px 0;
        }

        input[type="text"] {
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
    <div class = "container">
        <h1>Tambah jenis</h1>
        <form method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>ID</td>
                    <td><input type="text" name="id_jenis"></td>
                </tr>
                <tr>
                    <td>jenis</td>
                    <td><input type="text" name="nama_jenis"></td>
                </tr>
                <tr>
                <td>&nbsp;</td>
                <td><button type="submit" name="submit" value="tambahjenis">Tambah</button></td>
</div></tr>
            </table>
        </form>
    </body>
</html>
