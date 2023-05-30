<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data Kategori</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'sidebar.php'; ?>
    <div id="container">
    <form method="post" id="content">
        <table align="center" border="2" id="table">
            <thead>
                <tr>
                    <td>ID Kategori</td>
                    <td>Nama Kategori</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
            <?php
                include 'config.php';
                $query = mysqli_query($connect, "SELECT * FROM `kategori`");
                while ($data = mysqli_fetch_array($query)) {
            ?>
                    <tr>
                        <td><?php echo $data["id_kategori"]; ?></td>
                        <td><?php echo $data["nama_kategori"]; ?></td>
                        <td><button><a href="delete-kategori.php?id=<?php echo $data["id_kategori"]?>">Hapus</a></button><button><a href="edit-kategori.php?id=<?php echo $data["id_kategori"]?>">Ubah</a></button></td>
                    </tr>
            <?php } ?>
            </tbody>
        </table>
        <center>
            <button><a href="add-kategori.php">Tambah</a></button>
        </center>
    </form>
    </div>
</body>
</html>