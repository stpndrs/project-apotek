<?php
    include 'config.php';
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Ambil data yang dikirim melalui form
        $id = $_POST['id_rak'];
        $nomor = $_POST['nomor_rak'];
        
        // Query untuk menyisipkan data ke dalam tabel tb_jenis
        $query = "INSERT INTO tb_rak (id_rak, nomor_rak) VALUES ('$id', '$nomor')";
        
        // Jalankan query
        if (mysqli_query($connect, $query)) {
            // Jika penyisipan data berhasil, arahkan kembali ke halaman utama
            header("Location: rak.php");
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
                            <td><label for="id_rak">Id Rak:</label></td>
                            <td><input type="text" class="form-control" id="id_rak" name="id_rak" required></td>
                        </tr>
                        <tr>
                            <td><label for="nomor_rak">nomor Rak:</label></td>
                            <td><input type="text" class="form-control" id="nomor_rak" name="nomor_rak" required></td>
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
