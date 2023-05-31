<?php
include 'config.php';

if(isset($_POST['submit'])){
    $id_jenis    =$_POST['id_jenis'];
    $nama_jenis =$_POST['jenis'];


    $query = mysqli_query($connect, "INSERT INTO tb_jenis (id_jenis, jenis) Values ('$id_jenis', '$nama_jenis')");

    if($query){
        header ('location: TableJenis.php');
    }else {
        echo '<script>alert("lohe")</script>';
    }
}
?>

<html>
  <head>
    <title>Apotek GG Gemink</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="form.css" />

    <style>
      button {
        border: none;
        color: white;
        background-color: #ffd658;
        padding: 10px 25px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
      }

    </style>


  </head>
  <body>
    <nav>
      <div class="logo">
        <h3>Apotek GG Gemink</h3>
      </div>

      <div class="navbar">
        <a href="#">Home</a>
        <a href="#">About</a>
        <a href="#">HEHE</a>
      </div>

    </nav>

    <div class="side-bar" style="background-image: url('sidebar.jpg');">
      <ul>
        <p class="centered"><img src="/img/pdi.jpg" alt=""></p>
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="TableObat.php">Obat</a></li>
        <li><a href="TableJenis.php">Jenis</a></li>
        <li><a href="TableKategori.php">Kategori</a></li>
        <li><a href="#">stok</a></li>
        <li><a href="transaksi.php">Transaksi</a></li>
        <li><a href="#">master</a></li>
      </ul>
    </div>

    <div class="main-menu">
    <div class="wrapper">
      <button class="button"><a href="TableJenis.php">Table</a></button>
      <button class="button"><a href="TambahJenis.php">Tambah</a></button>
      <hr>
    </div>
    </div>
    


  <div class="wrapper-form">
    <div class="title">
      Insert Form
    </div>
    <div class="form">
      <form method="post">

        <div class="inputfield">
          <label>Id Jenis</label>
          <input type="text" name="id_jenis" id="id_jenis" class="input" required>
        </div> 

        <div class="inputfield">
          <label>Nama Jenis</label>
          <input type="text" name="jenis" id="jenis" class="input" required>
        </div> 

        <div class="inputfield">
        <input type="submit" name="submit" value="submit" class="btn">
        </div>
      </form>
    </div>
  </div>
    

  </body>
</html>
