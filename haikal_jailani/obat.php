<?php
include 'koneksi.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>List obat</title>
</head>

<body>
    <div class="container">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">nama obat</th>
                    <th scope="col">keterangan</th>
                    <th scope="col">harga jual</th>
                    <th scope="col">aksi</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $query = mysqli_query($conn, "SELECT * FROM obat");
                while ($data = mysqli_fetch_array($query)) {


                ?>
                    <tr>
                        <td><?= $data['nama_obat']; ?></td>
                        <td><?= $data['keterangan']; ?></td>
                        <td><?= $data['harga_jual']; ?></td>
                        <td>
                            <a href="delete.php?id=<?php echo $data['id_obat'] ?>">delete</a>
                            <a href="update.php?id=<?php echo $data['id_obat'] ?>">update</a>
                        </td>
                    </tr>
                <?php
                } ?>
            </tbody>
        </table>
    </div>
</body>

</html>