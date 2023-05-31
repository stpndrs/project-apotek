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
                <a href="insertobat.php" class="btn btn-primary mb-2">Tambah Data</a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Obat</th>
                            <th>Kategori</th>
                            <th>jenis</th>
                            <th>Rak</th>
                            <th>Stock</th>
                            <th>Harga</th>
                            <th>Operation</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include 'config.php';
                            $query = mysqli_query($connect, "SELECT tb_obat.id_obat, tb_obat.nama_obat, tb_obat.stok_obat, tb_obat.harga_obat, tb_jenis.nama_jenis, tb_kategori.nama_kategori, tb_rak.nomor_rak FROM tb_obat JOIN tb_jenis ON tb_obat.id_jenis = tb_jenis.id_jenis JOIN
                            tb_kategori ON tb_obat.id_kategori = tb_kategori.id_kategori JOIN tb_rak ON tb_obat.id_rak = tb_rak.id_rak");
                            while($data = mysqli_fetch_array($query)) {
                        ?>
                        <tr>
                            <td><?php echo $data['id_obat']; ?></td>
                            <td><?php echo $data['nama_obat']; ?></td>
                            <td><?php echo $data['nama_kategori']; ?></td>
                            <td><?php echo $data['nama_jenis']; ?></td>
                            <td><?php echo $data['nomor_rak']; ?></td>
                            <td><?php echo $data['stok_obat']; ?></td>
                            <td><?php echo $data['harga_obat']; ?></td>
                            <td>
                                <button><a href="updateobat.php?id_obat=<?php echo $data['id_obat'];?>">Update</a></button>
                                <button><a href="deleteobat.php?id_obat=<?php echo $data['id_obat'];?>">Delete</a></button>
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
