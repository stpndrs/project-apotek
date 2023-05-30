<?php
include 'config.php';

if (isset($_POST['update'])) {
  $id_obat = $_POST['id_obat'];
  $nama_obat = $_POST['nama_obat'];
  $jenis_id = $_POST['jenis_id'];
  $kategori_id = $_POST['kategori_id'];
  $rak_id = $_POST['rak_id'];
  $stock = $_POST['stock'];
  $harga = $_POST['harga'];

  $query = "UPDATE tb_obat SET nama_obat='$nama_obat', jenis_id='$jenis_id', kategori_id='$kategori_id', rak_id='$rak_id', stock='$stock', harga='$harga' WHERE id_obat='$id_obat'";

  $result = mysqli_query($connect, $query);

  if ($result) {
    header("Location: tb-obat.php");
  } else {
    echo "Query execution failed: " . mysqli_error($connect);
  }
}
?>
