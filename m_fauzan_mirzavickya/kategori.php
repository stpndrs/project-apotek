<?php
include 'config.php';

// Fungsi untuk memasukkan data ke dalam database
function insertData($table, $data)
{
    global $conn;
    $columns = implode(", ", array_keys($data));
    $values = "'" . implode("', '", array_values($data)) . "'";
    $query = "INSERT INTO $table ($columns) VALUES ($values)";
    mysqli_query($conn, $query);
}

// Proses penyimpanan data saat form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $id_kategori = $_POST['id_kategori'];
    $nama_kategori = $_POST['nama_kategori'];

    // Buat data yang akan dimasukkan ke dalam tabel tb_kategori
    $data_kategori = array(
        'id_kategori' => $id_kategori,
        'nama_kategori' => $nama_kategori
    );

    // Memasukkan data kategori ke dalam database
    insertData('tb_kategori', $data_kategori);

    // Tampilkan pesan sukses atau redirect ke halaman lain
    // ...
}
?>

<!-- Form input data kategori -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Kategori</title>
    <!-- Tambahkan link CSS untuk Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Tambahkan CSS khusus di sini jika diperlukan */
    </style>
</head>
<body>
    <div class="container">
        <h1>Input Kategori</h1>
        <form action="" method="POST">
            <div class="form-group">
                <label for="id_kategori">ID Kategori:</label>
                <input type="text" class="form-control" name="id_kategori" id="id_kategori" required>
            </div>
            <div class="form-group">
                <label for="nama_kategori">Nama Kategori:</label>
                <input type="text" class="form-control" name="nama_kategori" id="nama_kategori" required>
            </div>
            <input type="submit" class="btn btn-primary" value="Simpan">
        </form>
    </div>
    <!-- Tambahkan script JS untuk Bootstrap jika diperlukan -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>