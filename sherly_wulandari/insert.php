<?php
include 'configlogin.php';

if (isset($_POST['submit'])) {
    $id_jenis = $_POST['id_jenis'];
    $id_rak_obat = $_POST['id_rak_obat'];
    $keterangan = $_POST['keterangan'];
    $nama_obat = $_POST['nama_obat'];
    $id_obat =$_POST['id_obat'];
    $id_kategori_obat =$_POST['id_kategori_obat'];
    $stock_obat =$_POST['stock_obat'];
    $harga_jual =$_POST['harga_jual'];
    $status =$_POST['status'];







  

    $query = mysqli_query($connect, "INSERT INTO obat (nama_obat, keterangan, id_jenis, stock_obat, id_kategori_obat, id_rak_obat, id_obat, harga_jual, status) VALUES ('$nama_obat', '$keterangan', '$id_jenis', '$stock_obat', '$id_kategori_obat', '$id_rak_obat', '$id_obat', '$harga_jual', '$status')") or die(mysqli_error($connect));


}
?>
<html>
    <head>
        <title>Form Tambah</title>
    </head>
    <body>
        <h1>Tambah obat</h1>
        <form method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>nama obat</td>
                    <td><input type="text" name="nama_obat" id="nama_obat"></td>
                </tr>
                <tr>
                    <td>keterangan</td>
                    <td><input type="text" name="keterangan" id="keterangan"></td>
                </tr>
                <tr>
                    <td>stock obat</td>
                    <td><input type="text" name="stock_obat" id="stock_obat"></td>
                </tr>
                <tr>
                    <td>obat</td>
                    <td><input type="text" name="id_obat" id="id_obat"></td>
                </tr>
                <tr>
                    <td>harga jual</td>
                    <td><input type="text" name="harga_jual" id="harga_jual"></td>
                </tr>
                <tr>
                    <td>status</td>
                    <td><input type="text" name="status" id="status"></td>
                </tr>
                <tr>
                <td>Kategori obat</td>
                <td><select name="id_kategori_obat" >
                    <?php
                    $queryKategori = mysqli_query($connect, "SELECT * FROM kategori_obat");
                    while ($id_kategori_obat = mysqli_fetch_array($queryKategori)) {
                    ?>
                    <option value="<?php echo $id_kategori_obat['id_kategori_obat'] ?>"><?php echo $id_kategori_obat['nama_kategori'] ?></option>
                    <?php
                    }
                    ?>
                    </select>
                </td>
            </tr>
            <tr>
            <td>Jenis Obat</td>
                <td><select name="id_jenis" >
                    <?php
                    $queryjenis = mysqli_query($connect, "SELECT * FROM jenis_obat");
                    while ($id_jenis = mysqli_fetch_array($queryjenis)) {
                    ?>
                    <option value="<?php echo $id_jenis['id_jenis'] ?>"><?php echo $id_jenis['nama_jenis'] ?></option>
                    <?php
                    }
                    ?>
                    </select>
                </td>
                </tr>
                <td>Rak Obat</td>
                <td><select name="id_rak_obat" >
                    <?php
                    $queryrak = mysqli_query($connect, "SELECT * FROM rak_obat");
                    while ($id_rak_obat = mysqli_fetch_array($queryrak)) {
                    ?>
                    <option value="<?php echo $id_eak_obat['id_rak_obat'] ?>"><?php echo $id_rak_obat['no_rak'] ?></option>
                    <?php
                    }
                    ?>
                    </select>
                </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><button type="submit" name="submit" value="insert">Simpan</button></td>
                     
                        
                </tr>
            </table>
    </body>
</html>