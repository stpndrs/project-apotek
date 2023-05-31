<?php
        include 'config.php';
        $no = 1;
        if (isset($_POST['submit'])) {

        $id_kategori = $_POST['id_kategori'];
        $nama_kategori = $_POST['nama_kategori'];


        $sql = mysqli_query($connect, "UPDATE `tb_kategori` SET `id_kategori`='$id_kategori',`nama_kategori`='$nama_kategori' WHERE id_kategori = $id_kategori ");

        if ($sql) {
            header('location:kategori.php');
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
        $query = mysqli_query($connect, "SELECT * FROM tb_kategori WHERE id_kategori = $id");
        $data = mysqli_fetch_array($query);
        ?>
        <h2 align="center">EditKategori</h2>
    </header>
    <main class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <label for="id_kategori">No: </label><br>
            <input type="text" id="id_kategori" name="id_kategori" class="form-control" value="<?= $data['id_kategori'] ?>"><br>
            <label for="nama_kategori">Kategori Obat:</label><br>
            <input type="text" id="nama_kategori" name="nama_kategori" class="form-control" value="<?= $data['nama_kategori']?>"><br>
                <?php
                include 'config.php';
                    $query = mysqli_query($connect, "SELECT * FROM tb_kategori");
                    while ($row = mysqli_fetch_array($query)) {
                        $selected = null;
                        if ($data['id_kategori'] == $row['id_kategori']) {
                            $selected = 'selected';
                        }
                        $id = $row['id_kategori'];
                        $nama_kategori= $row['nama_kategori'];
                        }    
                ?>
            </select>
            <br>
            <input type="submit" value="Simpan" class="btn btn-primary" name="submit">
        </form>
     </main>
</body>
</html>