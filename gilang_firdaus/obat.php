<DOCTYPE HTML>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php
        include("sidebar.php");
    ?>
    <div style="margin-left: 250px; padding: 20px;">
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>ID Obat</th>
                <th>Nama Obat</th>
                <th>Jenis</th>
                <th>Lokasi</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Status</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include("config.php");
            $no = 0;
            $query = mysqli_query($connect, "SELECT * FROM tb_obat");
            while($data = mysqli_fetch_array($query)){
                ?>
            <tr>
                <td><?php echo $no++;?></td>
                <td><?php echo $data['id_obat'];?></td>
                <td><?php echo $data['nama_obat'];?></td>
                <td><?php echo $data['jenis_obat'];?></td>
                <td><?php echo $data['kategori_obat'];?></td>
                <td><?php echo $data['lokasi_obat'];?></td>
                <td><?php echo $data['stok_obat'];?></td>
                <td><?php echo $data['harga_obat'];?></td>
                <td><?php echo $data['status'];?></td>
                <td><?php echo $data['keterangan'];?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>