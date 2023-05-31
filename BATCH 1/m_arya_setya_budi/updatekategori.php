<?php
include 'config.php';

// Periksa apakah parameter id_kategori telah diberikan melalui URL
if(isset($_GET['id_kategori'])){
  $id_kategori = $_GET['id_kategori'];

  // Periksa apakah data kategori dengan id_kategori tersebut ada di database
  $query_check = "SELECT * FROM tb_kategori WHERE id_kategori = '$id_kategori'";
  $result_check = mysqli_query($connect, $query_check);
  $data_kategori = mysqli_fetch_assoc($result_check);

  // Periksa apakah data kategori ditemukan
  if($data_kategori){
    // Proses form saat data kategori ditemukan
    if(isset($_POST['submit'])){
        $id_kategori_update = $_POST['id_kategori_update'];
        $nama_kategori = $_POST['nama_kategori'];

        $sql = "UPDATE tb_kategori SET id_kategori = '$id_kategori_update', nama_kategori = '$nama_kategori' WHERE id_kategori = '$id_kategori'";

        $result = mysqli_query($connect, $sql);
        if($result){
            header('location:kategori.php');
        } else {
            echo 'Koneksi Gagal' . mysqli_error($connect);
        }
    }
  } else {
    // Tampilkan pesan jika data kategori tidak ditemukan
    echo 'Data tidak ditemukan.';
  }
} else {
  // Tampilkan pesan jika parameter id_kategori tidak diberikan
  echo 'Parameter id_kategori tidak ditemukan.';
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Update Kategori Obat</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Update Kategori Obat</h2>
                <?php if($data_kategori): ?>
                <form method="POST" action="updatekategori.php?id_kategori=<?php echo $id_kategori; ?>">
                    <table class="table">
                        <tr>
                            <td><label for="id_kategori">ID Kategori Obat:</label></td>
                            <td><input type="text" class="form-control" id="id_kategori" name="id_kategori_update" value="<?php echo $data_kategori['id_kategori']; ?>" readonly></td>
                        </tr>
                        <tr>
                            <td><label for="nama_kategori">Kategori Obat:</label></td>
                            <td><input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="<?php echo $data_kategori['nama_kategori']; ?>" required></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><button type="submit" name="submit" class="btn btn-primary">Simpan</button></td>
                        </tr>
                    </table>
                </form>
                <?php else: ?>
                <p>Data tidak ditemukan.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
