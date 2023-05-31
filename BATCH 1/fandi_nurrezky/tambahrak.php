<?php
        include 'config.php';
        $no = 1;
        if (isset($_POST['submit'])) {

        $id_rak = $_POST['id_rak'];
        $no_rak = $_POST['no_rak'];
        $alamat_rak = $_POST['alamat_rak'];

        $sql = mysqli_query($connect, "INSERT INTO `tb_rak`(`id_rak`, `no_rak`, `alamat_rak`) VALUES ('$id_rak','$no_rak','$alamat_rak')");

        if ($sql) {
            header('location:rakobat.php');
        }    
    }
        ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apotek Dsr</title>
</head>
<body>
    <header>
        <h2 align="center">Tambah Rak</h2>
    </header>
    <main class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <label for="id_rak">No: </label><br>
            <input type="text" id="id_rak" name="id_rak" class="form-control"><br>
            <label for="no_rak">Nomor Rak :</label><br>
            <input type="text" id="no_rak" name="no_rak" class="form-control"><br>
            <label for="alamat_rak">Alamat Rak:</label><br>
            <input type="text" id="alamat_rak" name="alamat_rak" class="form-control"><br>
                <?php
                include 'config.php';
                    $query = mysqli_query($connect, "SELECT * FROM tb_rak");

                    while ($row = mysqli_fetch_assoc($query)) {
                        $id = $row['id_rak'];
                        $no_rak = $row['no_rak'];
                    }
                ?>
            </select>
            <br>
            <input type="submit" value="Simpan" class="btn btn-primary" name="submit">
        </form>
     </main>
</body>
</html>