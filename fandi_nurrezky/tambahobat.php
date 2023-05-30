<?php
        include 'config.php';
        $no = 1;
        if (isset($_POST['submit'])) {

        $id_obat = $_POST['id_obat'];
        $nama_obat = $_POST['nama_obat'];
        $id_jenis = $_POST['id_jenis'];
        $id_kategori = $_POST['id_kategori'];
        $id_rak = $_POST['id_rak'];
        $stock_obat = $_POST['stock_obat'];
        $harga_jual = $_POST['harga_jual'];
        $status = $_POST['status'];
        $keterangan = $_POST['keterangan'];

        $sql = mysqli_query($connect, "INSERT INTO `tb_obat`(`id_obat`, `nama_obat`, `id_jenis`, `id_kategori`, `id_rak`, `stock_obat`, `harga_jual`, `status`, `keterangan`) VALUES ('$id_obat','$nama_obat','$id_jenis','$id_kategori','$id_rak','$stock_obat','$harga_jual','$status','$keterangan')");

        if ($sql) {
            header('location:dataobat.php');
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
        <h2 align="center">Tambah Obat</h2>
    </header>
    <main class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <label for="id_obat">No Obat:</label><br>
            <input type="text" id="id_obat" name="id_obat" class="form-control"><br>
            <label for="nama_obat">Nama Obat:</label><br>
            <input type="text" id="nama_obat" name="nama_obat" class="form-control"><br>
            <label for="id_jenis">Jenis Obat:</label><br>
            <input type="text" id="id_jenis" name="id_jenis" class="form-control" ><br>
            <label for="id_rak">Rak Obat:</label><br>
            <input type="text" id="id_rak" name="id_rak" class="form-control"><br>
            <label for="stock_obat">Stock obat:</label><br>
            <input type="text" id="penulis" name="penulis" class="form-control"><br>
            <label for="harga_jual">Harga:</label><br>
            <input type="text" name="harga_jual" id="harga_jual" class="form-control"><br>
            <label for="status">Status :</label><br>
            <select name="status" id="status" class="form-select"> 
            <label for="keterangan">Keterangan:</label><br>
            <input type="text" name="keterangan" id="keterangan" class="form-control"><br>
                <?php
                include 'config.php';
                    $query = mysqli_query($connect, "SELECT * FROM tb_obat");

                    while ($row = mysqli_fetch_assoc($query)) {
                        $id = $row['id_obat'];
                        $nama_obat = $row['nama_obat'];
                    }
                ?>
            </select>
            <br>
            <input type="submit" value="Simpan" class="btn btn-primary" name="submit">
        </form>
     </main>
</body>
</html>