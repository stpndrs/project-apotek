<?php
include 'config.php';

$id = $_GET['id_kategori'];

if (isset($_POST['submit'])) {
    $nama_kategori = $_POST['nama_kategori'];

    $query = mysqli_query($conn, "UPDATE tb_kategori SET nama_kategori='$nama_kategori' WHERE id_kategori = $id");

    if($query){
      header ("location: kategori.php");
      exit();
    }
}

$query = mysqli_query($conn, "SELECT * FROM tb_kategori WHERE id_kategori = $id");
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
          <label>Kategori</label>
          <input type="text" class="input" name="nama_kategori" value="<?php echo $data['nama_kategori']; ?>" required>
       </div>  
      <div class="inputfield">
        <input type="submit" value="Add" class="btn" name="submit">
      </div>
      </form>
    </div>
</div>  
  
</body>
</html>
