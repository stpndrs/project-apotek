<?php
include 'config.php';

if (isset($_POST['submit'])) {
    $id_obat = $_POST['id_obat'];
    $nama_obat = $_POST['nama_obat'];
    $id_jenis = $_POST['id_jenis'];
    $id_kategori = $_POST['id_kategori'];
    $id_rak = $_POST['id_rak'];
    $stock_rak = $_POST['stock_rak'];
    $harga_jual = $_POST['harga_jual'];
    $status = $_POST['status'];

    $query = mysqli_query($connect, "INSERT INTO tb_obat (id_obat, nama_obat, id_jenis, id_kategori, id_rak, stock_rak, harga_jual, status) VALUES ('$id_obat', '$nama_obat','$id_jenis','$id_kategori','$id_rak','$stock_rak','$harga_jual','$status')");

    if($query){
        header('Location: obat.php');
    }
}

?>

<html>
<head>
    <title>Form Tambah Obat</title>
    <link type="text/css" rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 500px;
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
    <h1>Tambah Obat</h1>
    <form method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>ID</td>
                <td><input type="text" name="id_obat"></td>
            </tr>
            <tr>
                <td>Obat</td>
                <td><input type="text" name="nama_obat"></td>
            </tr>
            <tr>
                <td>Jenis</td>
                <td>
                    <select name="id_jenis">
                        <?php
                        $jenis_query = mysqli_query($connect, "SELECT * FROM tb_jenis");
                        while ($jenis = mysqli_fetch_assoc($jenis_query)) {
                            echo "<option value='" . $jenis['id_jenis'] . "'>" . $jenis['nama_jenis'] . "</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Kategori</td>
                <td>
                    <select name="id_kategori">
                        <?php
                        $kategori_query = mysqli_query($connect, "SELECT * FROM tb_kategori");
                        while ($kategori = mysqli_fetch_assoc($kategori_query)) {
                            echo "<option value='" . $kategori['id_kategori'] . "'>" . $kategori['nama_kategori'] . "</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Rak</td>
                <td>
                    <select name="id_rak">
                        <?php
                        $rak_query = mysqli_query($connect, "SELECT * FROM tb_rak");
                        while ($rak = mysqli_fetch_assoc($rak_query)) {
                            echo "<option value='" . $rak['id_rak'] . "'>" . $rak['no_rak'] . "</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Stock</td>
                <td><input type="text" name="stock_rak"></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="text" name="harga_jual"></td>
            </tr>
            <tr>
                <td>Status</td>
                <td><input type="text" name="status"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><button type="submit" name="submit" value="tambahobat">Tambah</button></td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>