<?php
include 'config.php';

$id = $_GET['id_jenis'];

if (isset($_POST['submit'])) {
    $nama_jenis = $_POST['nama_jenis'];

    $query = mysqli_query($conn, "UPDATE tb_jenis SET nama_jenis='$nama_jenis' WHERE id_jenis = $id");

    if($query){
      header ("location: jenis.php");
      exit();
    }
}

$query = mysqli_query($conn, "SELECT * FROM tb_jenis WHERE id_jenis = $id");
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
          <label>Jenis</label>
          <input type="text" class="input" name="nama_jenis" value="<?php echo $data['nama_jenis']; ?>" required>
       </div>  
      <div class="inputfield">
        <input type="submit" value="Add" class="btn" name="submit">
      </div>
      </form>
    </div>
</div>  
  
</body>
</html>
