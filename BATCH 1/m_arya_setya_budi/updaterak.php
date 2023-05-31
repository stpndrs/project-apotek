<?php
include 'config.php';

// Periksa apakah parameter id_rak telah diberikan melalui URL
if(isset($_GET['id_rak'])){
  $id_rak = $_GET['id_rak'];

  // Periksa apakah data rak dengan id_rak tersebut ada di database
  $query_check = "SELECT * FROM tb_rak WHERE id_rak = '$id_rak'";
  $result_check = mysqli_query($connect, $query_check);
  $data_rak = mysqli_fetch_assoc($result_check);

  // Periksa apakah data rak ditemukan
  if($data_rak){
    // Proses form saat data rak ditemukan
    if(isset($_POST['submit'])){
        $id_rak_update = $_POST['id_rak_update'];
        $nomor_rak = $_POST['nomor_rak'];

        $sql = "UPDATE tb_rak SET id_rak = '$id_rak_update', nomor_rak = '$nomor_rak' WHERE id_rak = '$id_rak'";

        $result = mysqli_query($connect, $sql);
        if($result){
            header('location:rak.php');
        } else {
            echo 'Koneksi Gagal' . mysqli_error($connect);
        }
    }
  } else {
    // Tampilkan pesan jika data rak tidak ditemukan
    echo 'Data tidak ditemukan.';
  }
} else {
  // Tampilkan pesan jika parameter id_rak tidak diberikan
  echo 'Parameter id_rak tidak ditemukan.';
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Update No rak Obat</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Update No rak Obat</h2>
                <?php if($data_rak): ?>
                <form method="POST" action="updaterak.php?id_rak=<?php echo $id_rak; ?>">
                    <table class="table">
                        <tr>
                            <td><label for="id_rak">ID rak Obat:</label></td>
                            <td><input type="text" class="form-control" id="id_rak" name="id_rak_update" value="<?php echo $data_rak['id_rak']; ?>" readonly></td>
                        </tr>
                        <tr>
                            <td><label for="nomor_rak">Nomor Rak Obat:</label></td>
                            <td><input type="text" class="form-control" id="nomor_rak" name="nomor_rak" value="<?php echo $data_rak['nomor_rak']; ?>" required></td>
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
