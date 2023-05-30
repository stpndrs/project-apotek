<?php 
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $nama_obat = $_POST['nama_obat'];
    $keterangan = $_POST['keterangan'];
    $kategori = $_POST['kategori'];
    $jenis_obat = $_POST['jenis_obat'];
    $rak_obat = $_POST['rak_obat'];
    $harga_jual = $_POST['harga_jual'];
    
    // $queryupdate = mysqli_query($conn, "UPDATE obat SET nama_obat ='$nama_obat',
    //                                                     keterangan='$keterangan',
    //                                                     kategori_obat='$kategori',
    //                                                     jenis_obat='$jenis_obat','
    //                                                     rak_obat='$rak_obat',
    //                                                     harga_jual='$harga_jual'
    //                                                     WHERE id_obat=$idUpdate");
    $query = mysqli_query($conn, "INSERT INTO obat 
                                        (nama_obat, keterangan, kategori_obat, jenis_obat, rak_obat, harga_jual) 
                                VALUES  ('$nama_obat','$keterangan','$kategori','$jenis_obat','$rak_obat','$harga_jual'");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Tambah obat</title>
</head>

<body>
    <?php 
    //$id = $_GET['id'];
    //$query = mysqli_query($conn, "SELECT * FROM obat WHERE id_obat =$id");
    //$data = mysqli_fetch_array($query);
    ?>
    <div class="container">
        <div class="navbar"></div>

        <form method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Obat</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama_obat">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Keterangan</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="keterangan">
            </div>
            <div class="mb-3">
                    <label for="kategori" class="form-label">Kategori Obat</label>
                    <select class="form-select" aria-label="Default select example" name="kategori" name="kategori">
                        <option>Opsi Kategori obat</option>
                        <?php
                    // $nama = "SELECT * FROM tb_siswa";
                    $data = mysqli_query($conn, "SELECT * FROM kategori_obat ORDER BY nama_kategori ASC");
                    while ($d = mysqli_fetch_array($data)) {
                        echo "<option name= 'kategori' . value='" . $d["id_kategori"] . '<br>' . "'>" . $d["nama_kategori"] . "</option>";
                    }
                    ?>
                    </select>
            </div>
            <div class="mb-3">
                    <label for="kategori" class="form-label">Jenis Obat</label>
                    <select class="form-select" aria-label="Default select example" name="jenis_obat">
                        <option>Opsi jenis obat</option>
                        <?php
                    // $nama = "SELECT * FROM tb_siswa";
                    $data = mysqli_query($conn, "SELECT * FROM jenis_obat ORDER BY nama_jenis ASC");
                    while ($d = mysqli_fetch_array($data)) {
                        echo "<option name= 'kategori' . value='" . $d["id_jenis"] . '<br>' . "'>" . $d["nama_jenis"] . "</option>";
                    }
                    ?>
                    </select>
            </div>
            <div class="mb-3">
                    <label for="kategori" class="form-label">Rak Obat</label>
                    <select class="form-select" aria-label="Default select example" name="rak_obat">
                        <option>Opsi Pilih rak</option>
                        <?php
                    // $nama = "SELECT * FROM tb_siswa";
                    $data = mysqli_query($conn, "SELECT * FROM rak_obat ORDER BY no_rak ASC");
                    while ($d = mysqli_fetch_array($data)) {
                        echo "<option name= 'kategori' . value='" . $d["id_rak"] . '<br>' . "'>" . $d["no_rak"] . "</option>";
                    }
                    ?>
                    </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Harga jual</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="harga_jual">
            </div>
            
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
</body>

</html>