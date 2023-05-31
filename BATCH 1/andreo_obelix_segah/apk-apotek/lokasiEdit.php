<?php
include 'config.php';

$id = $_GET['id_rak'];

if (isset($_POST['submit'])) {
    $No_rak = $_POST['No_rak'];

    $query = mysqli_query($conn, "UPDATE tb_lokasi SET No_rak='$No_rak' WHERE id_rak = $id");

    if($query){
      header ("location: lokasi.php");
      exit();
    }
}

$query = mysqli_query($conn, "SELECT * FROM tb_lokasi WHERE id_rak = $id");
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
          <input type="text" class="input" name="No_rak" value="<?php echo $data['No_rak']; ?>" required>
       </div>  
      <div class="inputfield">
        <input type="submit" value="Add" class="btn" name="submit">
      </div>
      </form>
    </div>
</div>  
  
</body>
</html>
