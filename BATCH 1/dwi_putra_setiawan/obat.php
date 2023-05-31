<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>apotekerb</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link type="text/css" rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            margin-top: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
        }

        th, td {
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        a.button {
            display: block;
            width: 100px;
            margin: 10px auto;
            text-align: center;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        a.button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <?php include('sidebar.php'); ?>
    <div class="container">
        <h1>Data Obat</h1>
        <table border="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Kategori</th>
                    <th>Jenis</th>
                    <th>Lokasi Rak</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'config.php';
                $no = 1;
                $query = mysqli_query($connect, "SELECT * FROM tb_obat 
                                                INNER JOIN tb_kategori ON tb_obat.id_kategori = tb_kategori.id_kategori
                                                INNER JOIN tb_jenis ON tb_obat.id_jenis = tb_jenis.id_jenis
                                                INNER JOIN tb_rak ON tb_obat.id_rak = tb_rak.id_rak");
                while ($data = mysqli_fetch_array($query)) {
                    ?>
                    <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $data['nama_obat'] ?></td>
                        <td><?php echo $data['harga_jual'] ?></td>
                        <td><?php echo $data['nama_kategori'] ?></td>
                        <td><?php echo $data['nama_jenis'] ?></td>
                        <td><?php echo $data['no_rak'] ?></td>
                        <td>
                            <a href="updateobat.php?id=<?php echo $data['id_obat']; ?>">Ubah</a>               
                            <a href="hapusobat.php?id=<?php echo $data['id_obat']; ?>">Hapus</a>
                        </td>
                    </tr>
                    <?php
                    $no++;
                }
                ?>
            </tbody>
        </table>
        <a href="tambahobat.php" class="button">Tambah</a>
    </div>
</body>
</html>