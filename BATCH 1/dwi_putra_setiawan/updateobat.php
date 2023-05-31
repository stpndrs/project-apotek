<?php
include 'config.php';

$id = $_GET['id'];
$query = mysqli_query($connect, "SELECT * FROM tb_obat WHERE id_obat = '$id'");
$data = mysqli_fetch_array($query);

if (isset($_POST['submit'])) {
    $id_obat = $_POST['id_obat'];
    $nama_obat = $_POST['nama_obat'];
    $id_jenis = $_POST['id_jenis'];
    $id_kategori = $_POST['id_kategori'];
    $id_rak = $_POST['id_rak'];
    $stock_obat = $_POST['stock_obat'];
    $harga_jual = $_POST['harga_jual'];
    $status = $_POST['status'];

    $queryUpdate = mysqli_query($connect, "UPDATE tb_obat SET id_obat='$id_obat', nama_obat='$nama_obat', id_jenis='$id_jenis', id_kategori='$id_kategori', id_rak='$id_rak', stock_obat='$stock_obat', harga_jual='$harga_jual', status='$status' WHERE id_obat = '$id'");

    if ($queryUpdate) {
        header('Location: obat.php');
    }
}

$queryJenis = mysqli_query($connect, "SELECT * FROM tb_jenis");
$queryKategori = mysqli_query($connect, "SELECT * FROM tb_kategori");
$queryRak = mysqli_query($connect, "SELECT * FROM tb_rak");
?>

<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Form Ubah Obat</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link type="text/css" rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            width: 400px;
            margin: 0 auto;
            background-color: #f5f8fa;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            margin-top: 20px;
        }

        table {
            width: 100%;
        }

        td {
            padding: 10px 0;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        select {
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <?php include('sidebar.php'); ?>
    <div class="container">
        <h1>Ubah Obat</h1>
        <form method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>ID Obat</td>
                    <td><input type="text" name="id_obat" value="<?php echo $data['id_obat'] ?>"></td>
                </tr>
                <tr>
                    <td>Nama Obat</td>
                    <td><input type="text" name="nama_obat" value="<?php echo $data['nama_obat'] ?>"></td>
                </tr>
                <tr>
                    <td>Jenis</td>
                    <td>
                        <select name="id_jenis">
                            <?php while ($jenis = mysqli_fetch_array($queryJenis)) { ?>
                                <option value="<?php echo $jenis['id_jenis']; ?>" <?php if ($jenis['id_jenis'] == $data['id_jenis']) echo "selected"; ?>><?php echo $jenis['nama_jenis']; ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Kategori</td>
                    <td>
                        <select name="id_kategori">
                            <?php while ($kategori = mysqli_fetch_array($queryKategori)) { ?>
                                <option value="<?php echo $kategori['id_kategori']; ?>" <?php if ($kategori['id_kategori'] == $data['id_kategori']) echo "selected"; ?>><?php echo $kategori['nama_kategori']; ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Rak</td>
                    <td>
                        <select name="id_rak">
                            <?php while ($rak = mysqli_fetch_array($queryRak)) { ?>
                                <option value="<?php echo $rak['id_rak']; ?>" <?php if ($rak['id_rak'] == $data['id_rak']) echo "selected"; ?>><?php echo $rak['no_rak']; ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Stock Rak</td>
                    <td><input type="text" name="stock_obat" value="<?php echo $data['stock_obat'] ?>"></td>
                </tr>
                <tr>
                    <td>Harga Jual</td>
                    <td><input type="text" name="harga_jual" value="<?php echo $data['harga_jual'] ?>"></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td><input type="text" name="status" value="<?php echo $data['status'] ?>"></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="id" value="<?php echo $data['id_obat'] ?>"></td>
                    <td><button type="submit" name="submit" value="updaterak">Ubah</button></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>