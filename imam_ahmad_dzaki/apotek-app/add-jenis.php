<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah Jenis</title>
</head>
<body>
    <?php
        include "config.php";

        if (isset($_POST['submit'])) {
            $nama = $_POST['nama'];
            

            if (mysqli_query($connect, "INSERT INTO jenis VALUES (NULL, '$nama')"))
            {
                header("Location: jenis.php");
            }
        }
    ?>
    <form method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td><button type="submit" name="submit">Submit</button></td>
            </tr>
        </table>
    </form>
</body>
</html>