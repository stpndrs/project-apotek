<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data Jenis</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'sidebar.php'; ?>
    <div id="container">
    <form method="post" id="content">
        <table align="center" border="2" id="table">
            <thead>
                <tr>
                    <td>ID Jenis</td>
                    <td>Nama Jenis</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
            <?php
                include 'config.php';
                $query = mysqli_query($connect, "SELECT * FROM `jenis`");
                while ($data = mysqli_fetch_array($query)) {
            ?>
                    <tr>
                        <td><?php echo $data["id_jenis"]; ?></td>
                        <td><?php echo $data["nama_jenis"]; ?></td>
                        <td><button><a href="delete-jenis.php?id=<?php echo $data["id_jenis"]?>">Hapus</a></button><button><a href="edit-jenis.php?id=<?php echo $data["id_jenis"]?>">Ubah</a></button></td>
                    </tr>
            <?php } ?>
            </tbody>
        </table>
        <center>
            <button><a href="add-jenis.php">Tambah</a></button>
        </center>
    </form>
    </div>
</body>
</html>