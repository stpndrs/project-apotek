<?php
// error_reporting(E_ALL);
include 'config.php';

// Periksa apakah parameter id_jenis telah diberikan melalui URL
if(isset($_GET['id_jenis'])){
  $id_jenis = $_GET['id_jenis'];

  // Periksa apakah data jenis dengan id_jenis tersebut ada di database
  $query_check = "SELECT * FROM tb_jenis WHERE id_jenis = '$id_jenis'";
  $result_check = mysqli_query($connect, $query_check);
  $data_jenis = mysqli_fetch_assoc($result_check);

  // Periksa apakah data jenis ditemukan
  if($data_jenis){
    // Proses form saat data jenis ditemukan
    if(isset($_POST['submit'])){
        $id_jenis_update = $_POST['id_jenis_update'];
        $nama_jenis = $_POST['nama_jenis'];

        $sql = "UPDATE tb_jenis SET id_jenis = '$id_jenis_update', nama_jenis = '$nama_jenis' WHERE id_jenis = '$id_jenis'";

        $result = mysqli_query($connect, $sql);
        if($result){
            header('location:jenis.php');
        } else {
            echo 'Koneksi Gagal' . mysqli_error($connect);
        }
    }
  } else {
    // Tampilkan pesan jika data jenis tidak ditemukan
    echo 'Data jenis tidak ditemukan.';
  }
} else {
  // Tampilkan pesan jika parameter id_jenis tidak diberikan
  echo 'Parameter id_jenis tidak ditemukan.';
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Update Jenis Obat</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Update Jenis Obat</h2>
                <?php if($data_jenis): ?>
                <form method="POST" action="">
                    <table class="table">
                        <tr>
                            <td><label for="id_jenis">ID Jenis Obat:</label></td>
                            <td><input type="text" class="form-control" id="id_jenis" name="id_jenis_update" value="<?php echo $data_jenis['id_jenis']; ?>" readonly></td>
                        </tr>
                        <tr>
                            <td><label for="nama_jenis">Jenis Obat:</label></td>
                            <td><input type="text" class="form-control" id="nama_jenis" name="nama_jenis" value="<?php echo $data_jenis['nama_jenis']; ?>" required></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><button type="submit" name="submit" class="btn btn-primary">Simpan</button></td>
                        </tr>
                    </table>
                </form>
                <?php else: ?>
                <p>Data jenis tidak ditemukan.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
