<?php
include 'config.php';

$id = $_GET['id_obat'];

if (isset($_POST['submit'])) {
    $nama_obat = $_POST['nama_obat'];
    $harga_obat = $_POST['harga_obat'];
    $id_kategori = $_POST['id_kategori'];
    $id_jenis = $_POST['id_jenis'];
    $id_rak = $_POST['id_rak'];

    $query = mysqli_query($conn, "UPDATE tb_obat SET nama_obat='$nama_obat', harga_obat='$harga_obat', id_kategori='$id_kategori', id_jenis='$id_jenis', id_rak='$id_rak' WHERE id_obat = $id");

    if($query){
      header('location:obat.php');
      exit();
    }
}

$query = mysqli_query($conn, "SELECT * FROM tb_obat WHERE id_obat = $id");
$data = mysqli_fetch_array($query);
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
          <input type="text" class="input" name="nama_obat" value="<?php echo $data['nama_obat']; ?>" required>
       </div>  
        <div class="inputfield">
          <label>Harga Obat</label>
          <input type="text" class="input" name="harga_obat" value="<?php echo $data['harga_obat']; ?>" required>
       </div>  
       <div class="inputfield">
          <label>Kategori</label>
          <select name="id_kategori" required>
                <?php
                    $queryKategori = mysqli_query($conn, "SELECT * FROM tb_kategori");
                    while ($dataKategori = mysqli_fetch_array($queryKategori)) {
                        $selected = ($dataKategori['id_kategori'] == $data['id_kategori']) ? 'selected' : '';
                        echo "<option value='" . $dataKategori['id_kategori'] . "' $selected>" . $dataKategori['nama_kategori'] . "</option>";
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
                        $selected = ($dataJenis['id_jenis'] == $data['id_jenis']) ? 'selected' : '';
                        echo "<option value='" . $dataJenis['id_jenis'] . "' $selected>" . $dataJenis['nama_jenis'] . "</option>";
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
                        $selected = ($dataLokasi['id_rak'] == $data['id_rak']) ? 'selected' : '';
                        echo "<option value='" . $dataLokasi['id_rak'] . "' $selected>" . $dataLokasi['No_rak'] . "</option>";
                    }
                ?>
            </select>
          </div>
       </div> 
      <div class="inputfield">
        <input type="hidden" name="id" value="<?php echo $data['id_obat']; ?>">
        <input type="submit" value="Update" class="btn" name="submit">
      </div>
      </form>
    </div>
</div>  
  
</body>
</html>
