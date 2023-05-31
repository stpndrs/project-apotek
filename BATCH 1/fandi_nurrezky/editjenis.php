<?php
        include 'config.php';
        $no = 1;
        if (isset($_POST['submit'])) {

        $id_jenis = $_POST['id_jenis'];
        $nama_jenis = $_POST['nama_jenis'];


        $sql = mysqli_query($connect, "UPDATE `tb_jenis` SET `id_jenis`='$id_jenis',`nama_jenis`='$nama_jenis' WHERE id_jenis = $id_jenis");

        if ($sql) {
            header('location:jenisobat.php');
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
    <?php
        include 'config.php'; 
        $id = $_GET['id'];
        $query = mysqli_query($connect, "SELECT * FROM tb_jenis WHERE id_jenis = $id");
        $data = mysqli_fetch_array($query);
        ?>
        <h2 align="center">EditJenis</h2>
    </header>
    <main class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <label for="id_jenis">No: </label><br>
            <input type="text" id="judul" name="id_jenis" class="form-control" value="<?= $data['id_jenis'] ?>"><br>
            <label for="nama_jenis">Jenis Obat:</label><br>
            <input type="text" id="isi" name="nama_jenis" class="form-control" value="<?= $data['nama_jenis']?>"><br>
                <?php
                include 'config.php';
                    $query = mysqli_query($connect, "SELECT * FROM tb_jenis");
                    while ($row = mysqli_fetch_array($query)) {
                        $selected = null;
                        if ($data['id_jenis'] == $row['id_jenis']) {
                            $selected = 'selected';
                        }
                        $id = $row['id_jenis'];
                        $nama_jenis = $row['nama_jenis'];
                        }    
                ?>
            </select>
            <br>
            <input type="submit" value="Simpan" class="btn btn-primary" name="submit">
        </form>
     </main>
</body>
</html>