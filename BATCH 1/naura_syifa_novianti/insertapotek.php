<?php
include 'configapotek.html';

if (isset($_POST['submit'])) {
        $tb_jenis_obat =$_POST['tb_jenis_obat']; 
        $tb_obat =$_POST['tb_obat'];
        $tb_kategori=$_POST['tb_kategori_obat'];
        $tb_rak_obat =$_POST['tb_rak_obat'];
        $tb_karyawan =$_POST['tb_karyawan'];
        $tb_transaksi =$_POST['tb_transaksi'];
        $tb_detail_transaksi =$_POST['tb_detail_transaksi'];

    if (file_exists($lokasi_gambar)) {
        move_uploaded_file($lokasi_gambar, 'uploads/' . $nama_gambar);
    }

    $query = mysqli_query($connect, "INSERT INTO tb_obat VALUES ('', '$nama_obat', '$keterangan_obat', '$jenis_obat', '$stock_obat','$kategori_obat', '$rak_obat', '$id_obat', '$harga_obat', '$status_obat')");

    if ($query) {
        echo 'Data berhasil ditambah';
    }
}
?>

<html>
    <head>
        <title>Form Tambah Obat</title>
    </head>
    <body>
        <h1>Tambah Obat</h1>
        <form method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Nama Obat</td>
                    <td><input type="text" name="nama_obat" id="nama_obat"></td>
                </tr>
                <tr>
                    <td>Keterangan Obat</td>
                    <td><input type="text" name="keterangan_obat" id="keterangan_obat"></td>
                </tr>
                <tr>
                <td>Jenis Obat</td>
                <td><input type="text" name="jenis_obat" id="jenis_obat"></td>
                </tr>
                <tr>
                    <td>Stock Obat</td>
                    <td><input type="text" name="stock_obat" id="stock_obat"></td>
                </tr>
                <tr>
                    <td>Kategori Obat</td>
                    <td><input type="text" name="kategori_obat" id="kategori_obat"></td>
                </tr>
                <tr>
                    <td>Rak Obat</td>
                    <td><input type="text" name="rak_obat" id="rak_obat"></td>
                </tr>
                <tr>
                    <td>ID Obat</td>
                    <td><input type="text" name="id_obat" id="id_obat"></td>
                </tr>
                <tr>
                    <td>Harga Obat</td>
                    <td><input type="text" name="harga_obat" id="harga_obat"></td>
                </tr>
                <tr>
                    <td>Status Obat</td>
                    <td><input type="text" name="status_obat" id="status_obat"></td>
                </tr>
                <tr>
                <tr>
                <td>Kategori</td>
                <td>
                    <select name="id_kategori" >
                    <?php
                    $queryKategori = mysqli_query($connect, "SELECT * FROM tb_kategori_obat");
                    while ($dataKategori = mysqli_fetch_array($queryKategori)) {
                    ?>
                    <option value="<?php echo $dataKategori['id_kategori'] ?>"><?php echo $dataKategori['nama_kategori'] ?></option>
                    <?php
                    }
                    ?>
                    </select>
                </td>
            </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><button type="submit" name="submit" value="insert">Tambah</button</td>
                </tr>
            </table>
    </body>
</html>