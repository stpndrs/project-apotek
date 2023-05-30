<!DOCTYPE html>
<html>
<head>
    <title>Tampil Data Siswa</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="tablestyle.css">
</head>
<body>
<nav class="navMenu">
      <a href="jenis.php">JENIS</a>
      <a href="kategori.php">KATEGORI</a>
      <a href="rak.php">RAK</a>
      <a href="obat.php">OBAT</a>
      <div class="dot"></div>
    </nav>
    <h1>Home Admin</h1>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="insertrak.php" class="btn btn-primary mb-2">Tambah Data</a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Rak</th>
                            <th>Operation</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include 'config.php';
                            $query = mysqli_query($connect, "SELECT * FROM tb_rak");
                            while($data = mysqli_fetch_array($query)) {
                        ?>
                        <tr>
                            <td><?php echo $data['id_rak']; ?></td>
                            <td><?php echo $data['nomor_rak']; ?></td>
                            <td>
                                <button><a href="updaterak.php?id_rak=<?php echo $data['id_rak'];?>">Update</a></button>
                                <button><a href="deleterak.php?id_rak=<?php echo $data['id_rak'];?>">Delete</a></button>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
                <a href="dashboard.php" class="btn btn-primary mb-2">BACK</a>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
