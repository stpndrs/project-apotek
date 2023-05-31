<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit</title>
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
            

            if (mysqli_query($connect, "UPDATE data_obat SET nama_obat = '$nama', id_jenis = '$jenis', id_kategori = '$kategori', id_lokasi = '$lokasi', harga = '$harga', stok = '$stok'"))
            {
                header("Location: index.php");
            }
        }

        if (isset($_GET['id']))
        {
            $id = $_GET['id'];
            $query = mysqli_query($connect, "SELECT * FROM data_obat WHERE id_obat = $id");
                if ($data = mysqli_fetch_array($query)) {
                    $nama = $data['nama_obat'];
                    $jenis = $data['id_jenis'];
                    $kategori = $data['id_kategori'];
                    $lokasi = $data['id_lokasi'];
                    $harga = $data['harga'];
                    $stok = $data['stok'];
                }
        }
    ?>
    <form method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" value="<?php echo $nama;?>"></td>
            </tr>
            <tr>
                <td>Jenis</td>
                <td> <select name="jenis">
                                <?php
                                    $query = mysqli_query($connect, "SELECT * FROM jenis WHERE id_jenis = $jenis");
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
                                    $query = mysqli_query($connect, "SELECT * FROM kategori WHERE id_kategori = $kategori");
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
                                    $query = mysqli_query($connect, "SELECT * FROM lokasi WHERE id_lokasi = $lokasi");
                                    while($data = mysqli_fetch_array($query)){
                                ?>
                                <option value="<?php echo $data['id_lokasi']; ?>"><?php echo $data['nama_lokasi']; ?></option>
                                <?php } ?>
                     </select></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="text" name="harga" value="<?php echo $harga;?>"></td>
            </tr>
            <tr>
                <td>Stok</td>
                <td><input type="text" name="stok" value="<?php echo $stok;?>"></td>
            </tr>
            <tr>
                <td><button type="submit" name="submit">Submit</button></td>
            </tr>
        </table>
    </form>
</body>
</html>