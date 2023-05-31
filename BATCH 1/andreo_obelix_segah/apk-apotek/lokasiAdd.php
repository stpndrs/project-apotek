<?php
include 'config.php';

if (isset($_POST['submit'])) {
    $No_rak = $_POST['No_rak'];

    $query = mysqli_query($conn, "INSERT INTO tb_lokasi (No_rak ) VALUES ('$No_rak')");

    if($query){
      header ("location: lokasi.php");
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
          <label>Lokasi Obat</label>
          <input type="text" class="input" name="No_rak" required>
       </div>  
      <div class="inputfield">
        <input type="submit" value="Add" class="btn" name="submit">
      </div>
      </form>
    </div>
</div>  
  
</body>
</html>
