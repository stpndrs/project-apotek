<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Kategori</title>
</head>
<body>
    <?php
        include "config.php";

        if (isset($_POST['submit'])) {
            $nama = $_POST['nama'];
            

            if (mysqli_query($connect, "UPDATE kategori SET nama_kategori = '$nama'"))
            {
                header("Location: kategori.php");
            }
        }

        if (isset($_GET['id']))
        {
            $id = $_GET['id'];
            $query = mysqli_query($connect, "SELECT * FROM kategori WHERE id_kategori = $id");
                if ($data = mysqli_fetch_array($query)) {
                    $nama = $data['nama_kategori'];
                }
        }
    ?>
    <form method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" value="<?php echo $nama;?>"></td>
            </tr>
            <tr>
                <td><button type="submit" name="submit">Submit</button></td>
            </tr>
        </table>
    </form>
</body>
</html>