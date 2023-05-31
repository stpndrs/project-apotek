<?php
    include 'config.php';
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Ambil data yang dikirim melalui form
        $id = $_POST['id_kategori'];
        $kategori = $_POST['nama_kategori'];
        
        // Query untuk menyisipkan data ke dalam tabel tb_jenis
        $query = "INSERT INTO tb_kategori (id_kategori, nama_kategori) VALUES ('$id', '$kategori')";
        
        // Jalankan query
        if (mysqli_query($connect, $query)) {
            // Jika penyisipan data berhasil, arahkan kembali ke halaman utama
            header("Location: kategori.php");
            exit();
        } else {
            // Jika terjadi kesalahan dalam penyisipan data, tampilkan pesan error
            echo "Error: " . mysqli_error($connect);
        }
        
        // Tutup koneksi database
        mysqli_close($connect);
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Siswa</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Tambah Data Siswa</h2>
                <form method="POST" action="">
                    <table class="table">
                        <tr>
                            <td><label for="id_kategori">Id Kategori:</label></td>
                            <td><input type="text" class="form-control" id="id_kategori" name="id_kategori" required></td>
                        </tr>
                        <tr>
                            <td><label for="nama_kategori">Kategori OBAT:</label></td>
                            <td><input type="text" class="form-control" id="nama_kategori" name="nama_kategori" required></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><button type="submit" class="btn btn-primary">Simpan</button></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
