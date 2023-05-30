<?php
include 'config.php';

// Periksa apakah parameter id_obat telah diberikan melalui URL
if(isset($_GET['id_obat'])){
  $id_obat = $_GET['id_obat'];

  // Periksa apakah data obat dengan id_obat tersebut ada di database
  $query_check = "SELECT * FROM tb_obat WHERE id_obat = '$id_obat'";
  $result_check = mysqli_query($connect, $query_check);
  $data_obat = mysqli_fetch_assoc($result_check);

  // Periksa apakah data obat ditemukan
  if($data_obat){
    // Proses form saat data obat ditemukan
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
      $idObat = $_POST['id_obat'];
      $namaObat = $_POST['nama_obat'];
      $idKategori = $_POST['id_kategori'];
      $idJenis = $_POST['id_jenis'];
      $idRak = $_POST['id_rak'];
      $stokObat = $_POST['stok_obat'];
      $hargaObat = $_POST['harga_obat'];

      $query = "UPDATE tb_obat SET nama_obat = '$namaObat', id_kategori = '$idKategori', id_jenis = '$idJenis', id_rak = '$idRak', stok_obat = '$stokObat', harga_obat = '$hargaObat' WHERE id_obat = '$idObat'";
      $result = mysqli_query($connect, $query);

      if($result){
        // Data berhasil diupdate, redirect ke halaman obat.php
        header("Location: obat.php");
        exit();
      } else {
        // Terjadi kesalahan saat mengupdate data, tampilkan pesan error
        echo "Error: " . mysqli_error($connect);
      }
    }
  } else {
    // Tampilkan pesan jika data obat tidak ditemukan
    echo 'Data tidak ditemukan.';
  }
} else {
  // Tampilkan pesan jika parameter id_obat tidak diberikan
  echo 'Parameter id_obat tidak ditemukan.';
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Data Obat</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>Update Data Obat</h2>
    <?php if($data_obat): ?>
    <form action="updateobat.php?id_obat=<?php echo $id_obat; ?>" method="POST">
        <div class="form-group">
            <label for="id_obat">Id Obat:</label>
            <input type="text" class="form-control" id="id_obat" name="id_obat" value="<?php echo $data_obat['id_obat']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="nama_obat">Nama Obat:</label>
            <input type="text" class="form-control" id="nama_obat" name="nama_obat" value="<?php echo $data_obat['nama_obat']; ?>" required>
        </div>
        <div class="form-group">
            <label for="id_kategori">Kategori:</label>
            <select class="form-control" id="id_kategori" name="id_kategori" required>
                <option value="">Pilih Kategori</option>
                <?php
                // Mengambil data kategori dari database
                $query = mysqli_query($connect, "SELECT * FROM tb_kategori");
                while ($data = mysqli_fetch_assoc($query)) {
                    if($data['id_kategori'] == $data_obat['id_kategori']){
                        echo "<option value='" . $data['id_kategori'] . "' selected>" . $data['nama_kategori'] . "</option>";
                    } else {
                        echo "<option value='" . $data['id_kategori'] . "'>" . $data['nama_kategori'] . "</option>";
                    }
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
                    if($data['id_jenis'] == $data_obat['id_jenis']){
                        echo "<option value='" . $data['id_jenis'] . "' selected>" . $data['nama_jenis'] . "</option>";
                    } else {
                        echo "<option value='" . $data['id_jenis'] . "'>" . $data['nama_jenis'] . "</option>";
                    }
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
                    if($data['id_rak'] == $data_obat['id_rak']){
                        echo "<option value='" . $data['id_rak'] . "' selected>" . $data['nomor_rak'] . "</option>";
                    } else {
                        echo "<option value='" . $data['id_rak'] . "'>" . $data['nomor_rak'] . "</option>";
                    }
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="stok_obat">Stok:</label>
            <input type="number" class="form-control" id="stok_obat" name="stok_obat" value="<?php echo $data_obat['stok_obat']; ?>" required>
        </div>
        <div class="form-group">
            <label for="harga_obat">Harga:</label>
            <input type="number" class="form-control" id="harga_obat" name="harga_obat" value="<?php echo $data_obat['harga_obat']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    <?php endif; ?>
    <br>
    <a href="obat.php" class="btn btn-primary">Kembali</a>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
