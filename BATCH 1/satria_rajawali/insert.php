<?php
include 'config.php';

if (isset($_POST['insert'])) {
  $nama_obat = $_POST['nama_obat'];
  $jenis_id = $_POST['jenis_id'];
  $kategori_id = $_POST['kategori_id'];
  $rak_id = $_POST['rak_id'];
  $stock = $_POST['stock'];
  $harga = $_POST['harga'];

  $query = "INSERT INTO tb_obat (nama_obat, jenis_id, kategori_id, rak_id, stock, harga) VALUES ('$nama_obat', '$jenis_id', '$kategori_id', '$rak_id', '$stock', '$harga')";

  $result = mysqli_query($connect, $query);

  if ($result) {
    header("Location: tb-obat.php");
  } else {
    echo "Query execution failed: " . mysqli_error($connect);
  }
}
?>
