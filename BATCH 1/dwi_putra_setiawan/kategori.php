<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>apotekerb</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link type="text/css" rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            margin-left: 250px;
        }
        
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #2196F3;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        th {
            background-color: #2196F3;
            color: #fff;
        }
        
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        
        .button-update {
            background-color: #bbb;
            margin-left: 5px;
        }
        
        .button-delete {
            background-color: #f44336;
            margin-left: 5px;
        }

        .category-cell {
            border-right: 1px solid #ddd;
        }

        .action-cell {
            text-align: center;
            border-bottom: none;
        }

        .no-kategori-divider {
            border-right: 1px solid transparent;
        }
    </style>
</head>
<body>
    <?php include('sidebar.php'); ?>
    <div class="container">
        <div id="box1">
            <table>
                <thead>
                    <tr>
                        <th class="no-kategori-divider">No</th>
                        <th class="category-cell">ID</th>
                        <th class="category-cell">Kategori</th>
                        <th class="action-cell">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'config.php';
                    $no = 1;
                    $query = mysqli_query($connect, "SELECT * FROM tb_kategori");
                    while ($data = mysqli_fetch_array($query)) {
                        ?>
                        <tr>
                            <td class="no-kategori-divider"><?php echo $no ?></td>
                            <td class="category-cell"><?php echo $data['id_kategori'] ?></td>
                            <td class="category-cell"><?php echo $data['nama_kategori'] ?></td>
                            <td class="action-cell">
                                <div>
                                    <a href="updatekategori.php?id=<?php echo $data['id_kategori']; ?>" class="button button-update">Ubah</a>
                                    <a href="hapuskategori.php?id=<?php echo $data['id_kategori']; ?>" class="button button-delete">Hapus</a>
                                </div>
                            </td>
                        </tr>
                        <?php
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <br>
        <center>
            <button class="button"><a href="tambahkategori.php" style="color: #fff; text-decoration: none;">Tambah</a></button>
        </center>
    </div>
</body>
</html>