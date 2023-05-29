<?php
include 'config.php';

$notification = ""; // Inisialisasi notifikasi

if (isset($_POST['submit'])) {
    $nama_obat = $_POST['nama_obat'];
    $harga_obat = $_POST['harga_obat'];
    $id_kategori = $_POST['id_kategori'];
    $id_jenis = $_POST['id_jenis'];
    $id_rak = $_POST['id_rak'];

    $query = mysqli_query($conn, "INSERT INTO tb_obat (nama_obat, harga_obat, id_kategori, id_jenis, id_rak) VALUES ('$nama_obat', '$harga_obat', '$id_kategori', '$id_jenis', '$id_rak')");
  
    if($query){
      header('location:obat.php');
      exit();
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Form</title>
  <link rel="stylesheet" href="css/styleTable.css">
</head>
<body>

<div class="wrapper">
    <div class="title">
      Registration Form
    </div>
    <div class="form">
       <form method="POST" action="">
       <div class="inputfield">
          <label>Nama Obat</label>
          <input type="text" class="input" name="nama_obat" required>
       </div>  
        <div class="inputfield">
          <label>Harga Obat</label>
          <input type="text" class="input" name="harga_obat" required>
       </div>  
       <div class="inputfield">
          <label>Kategori</label>
          <select name="id_kategori" required>
                <?php
                    $queryKategori = mysqli_query($conn, "SELECT * FROM tb_kategori");
                    while ($dataKategori = mysqli_fetch_array($queryKategori)) {
                    ?>
                    <option value="<?php echo $dataKategori['id_kategori'] ?>"><?php echo $dataKategori['nama_kategori'] ?></option>
                    <?php
                }
                ?>
            </select>
       </div>  
      <div class="inputfield">
          <label>Jenis</label>
          <select name="id_jenis" required>
                <?php
                    $queryJenis = mysqli_query($conn, "SELECT * FROM tb_jenis");
                    while ($dataJenis = mysqli_fetch_array($queryJenis)) {
                    ?>
                    <option value="<?php echo $dataJenis['id_jenis'] ?>"><?php echo $dataJenis['nama_jenis'] ?></option>
                    <?php
                }
                ?>
            </select>
       </div> 
        <div class="inputfield">
          <label>Lokasi Obat</label>
          <div class="custom_select">
            <select name="id_rak" required>
                <?php
                    $queryLokasi = mysqli_query($conn, "SELECT * FROM tb_lokasi");
                    while ($dataLokasi = mysqli_fetch_array($queryLokasi)) {
                    ?>
                    <option value="<?php echo $dataLokasi['id_rak'] ?>"><?php echo $dataLokasi['No_rak'] ?></option>
                    <?php
                }
                ?>
            </select>
          </div>
       </div> 
      <div class="inputfield">
        <input type="submit" value="Add" class="btn" name="submit">
      </div>
      </form>
      <div class="notification">
        <?php echo $notification; ?>
      </div>
    </div>
</div>  
  
</body>
</html>
