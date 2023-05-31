<?php
include 'config.php';

// Memeriksa apakah form telah disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mendapatkan nilai inputan dari form
    $idObat = $_POST['id_obat'];
    $namaObat = $_POST['nama_obat'];
    $idKategori = $_POST['id_kategori'];
    $idJenis = $_POST['id_jenis'];
    $idRak = $_POST['id_rak'];
    $stokObat = $_POST['stok_obat'];
    $hargaObat = $_POST['harga_obat'];

    // Menyimpan data ke database
    $query = "INSERT INTO tb_obat (id_obat, nama_obat, id_kategori, id_jenis, id_rak, stok_obat, harga_obat) VALUES ('$idObat', '$namaObat', '$idKategori', '$idJenis', '$idRak', '$stokObat', '$hargaObat')";
    $result = mysqli_query($connect, $query);

    if ($result) {
        // Data berhasil disimpan, redirect ke halaman obat.php
        header("Location: obat.php");
        exit();
    } else {
        // Terjadi kesalahan saat menyimpan data, tampilkan pesan error
        echo "Error: " . mysqli_error($connect);
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Obat</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>Tambah Data Obat</h2>
    <form action="" method="POST">
        <div class="form-group">
            <label for="id_obat">Id Obat:</label>
            <input type="text" class="form-control" id="id_obat" name="id_obat" required>
        </div>
        <div class="form-group">
            <label for="nama_obat">Nama Obat:</label>
            <input type="text" class="form-control" id="nama_obat" name="nama_obat" required>
        </div>
        <div class="form-group">
            <label for="id_kategori">Kategori:</label>
            <select class="form-control" id="id_kategori" name="id_kategori" required>
                <option value="">Pilih Kategori</option>
                <?php
                // Mengambil data kategori dari database
                $query = mysqli_query($connect, "SELECT * FROM tb_kategori");
                while ($data = mysqli_fetch_assoc($query)) {
                    echo "<option value='" . $data['id_kategori'] . "'>" . $data['nama_kategori'] . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="id_jenis">Jenis:</label>
            <select class="form-control" id="id_jenis" name="id_jenis" required>
                <option value="">Pilih Jenis</option>
                <?php
                // Mengambil data jenis dari database
                $query = mysqli_query($connect, "SELECT * FROM tb_jenis");
                while ($data = mysqli_fetch_assoc($query)) {
                    echo "<option value='" . $data['id_jenis'] . "'>" . $data['nama_jenis'] . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="id_rak">Rak:</label>
            <select class="form-control" id="id_rak" name="id_rak" required>
                <option value="">Pilih Rak</option>
                <?php
                // Mengambil data rak dari database
                $query = mysqli_query($connect, "SELECT * FROM tb_rak");
                while ($data = mysqli_fetch_assoc($query)) {
                    echo "<option value='" . $data['id_rak'] . "'>" . $data['nomor_rak'] . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="stok_obat">Stok:</label>
            <input type="number" class="form-control" id="stok_obat" name="stok_obat" required>
        </div>
        <div class="form-group">
            <label for="harga_obat">Harga:</label>
            <input type="number" class="form-control" id="harga_obat" name="harga_obat" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
    <br>
    <a href="obat.php" class="btn btn-primary">Kembali</a>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
