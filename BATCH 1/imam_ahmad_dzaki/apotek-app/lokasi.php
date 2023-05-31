<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data Lokasi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'sidebar.php'; ?>
    <div id="container">
        <form method="post" id="content">
        <table align="center" border="2" id="table">
            <thead>
                <tr>
                    <td>ID Lokasi</td>
                    <td>Nama Lokasi</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
            <?php
                include 'config.php';
                $query = mysqli_query($connect, "SELECT * FROM `lokasi`");
                while ($data = mysqli_fetch_array($query)) {
            ?>
                    <tr>
                        <td><?php echo $data["id_lokasi"]; ?></td>
                        <td><?php echo $data["nama_lokasi"]; ?></td>
                        <td><button><a href="delete-lokasi.php?id=<?php echo $data["id_lokasi"]?>">Hapus</a></button><button><a href="edit-lokasi.php?id=<?php echo $data["id_lokasi"]?>">Ubah</a></button></td>
                    </tr>
            <?php } ?>
            </tbody>
        </table>
        <center>
            <button><a href="add-lokasi.php">Tambah</a></button>
        </center>
        </form>
    </div>
</body>
</html>