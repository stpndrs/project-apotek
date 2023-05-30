<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data Obat</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'sidebar.php'; ?>
    <div id="container">
    <form method="post" id="content">
        <table align="center" border="2" id="table">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Nama</td>
                    <td>Jenis</td>
                    <td>Kategori</td>
                    <td>Lokasi</td>
                    <td>Harga</td>
                    <td>Stok</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
            <?php
                include 'config.php';
                $query = mysqli_query($connect, "SELECT data_obat.id_obat, data_obat.nama_obat, jenis.nama_jenis, kategori.nama_kategori, lokasi.nama_lokasi, data_obat.harga, data_obat.stok FROM `data_obat` JOIN jenis ON data_obat.id_jenis = jenis.id_jenis JOIN kategori ON data_obat.id_kategori = kategori.id_kategori JOIN lokasi ON data_obat.id_lokasi = lokasi.id_lokasi");
                while ($data = mysqli_fetch_array($query)) {
            ?>
                    <tr>
                        <td><?php echo $data["id_obat"]; ?></td>
                        <td><?php echo $data["nama_obat"]; ?></td>
                        <td><?php echo $data["nama_jenis"]; ?></td>
                        <td><?php echo $data["nama_kategori"]; ?></td>
                        <td><?php echo $data["nama_lokasi"]; ?></td>
                        <td><?php echo $data["harga"]; ?></td>
                        <td><?php echo $data["stok"]; ?></td>
                        <td><button><a href="delete.php?id=<?php echo $data["id_obat"]?>">Hapus</a></button><button><a href="edit.php?id=<?php echo $data["id_obat"]?>">Ubah</a></button></td>
                    </tr>
            <?php } ?>
            </tbody>
        </table>
        <center>
            <button><a href="add.php">Tambah</a></button>
        </center>
    </form>
    </div>
</body>
</html>