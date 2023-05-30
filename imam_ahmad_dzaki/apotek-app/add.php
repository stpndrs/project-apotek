<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah</title>
</head>
<body>
    <?php
        include "config.php";

        if (isset($_POST['submit'])) {
            $nama = $_POST['nama'];
            $jenis = $_POST['jenis'];
            $kategori = $_POST['kategori'];
            $lokasi = $_POST['lokasi'];
            $harga = $_POST['harga'];
            $stok = $_POST['stok'];
            

            if (mysqli_query($connect, "INSERT INTO data_obat VALUES (NULL, '$nama', '$jenis', '$kategori', '$lokasi', '$harga', '$stok')"))
            {
                header("Location: index.php");
            }
        }
    ?>
    <form method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Jenis</td>
                <td> <select name="jenis">
                                <?php
                                    $query = mysqli_query($connect, "SELECT * FROM jenis");
                                    while($data = mysqli_fetch_array($query)){
                                ?>
                                <option value="<?php echo $data['id_jenis']; ?>"><?php echo $data['nama_jenis']; ?></option>
                                <?php } ?>
                     </select></td>
            </tr>
            <tr>
                <td>Kategori</td>
                <td><select name="kategori">
                                <?php
                                    $query = mysqli_query($connect, "SELECT * FROM kategori");
                                    while($data = mysqli_fetch_array($query)){
                                ?>
                                <option value="<?php echo $data['id_kategori']; ?>"><?php echo $data['nama_kategori']; ?></option>
                                <?php } ?>
                     </select></td>
            </tr>
            <tr>
                <td>Lokasi</td>
                <td><select name="lokasi">
                                <?php
                                    $query = mysqli_query($connect, "SELECT * FROM lokasi");
                                    while($data = mysqli_fetch_array($query)){
                                ?>
                                <option value="<?php echo $data['id_lokasi']; ?>"><?php echo $data['nama_lokasi']; ?></option>
                                <?php } ?>
                     </select></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="text" name="harga"></td>
            </tr>
            <tr>
                <td>Stok</td>
                <td><input type="text" name="stok"></td>
            </tr>
            <tr>
                <td><button type="submit" name="submit">Submit</button></td>
            </tr>
        </table>
    </form>
</body>
</html>