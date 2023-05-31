<?php
include 'config.php';

if(isset($_POST['submit'])){
    $id_obat  =$_POST['id_obat'];
    $nama_obat  =$_POST['nama_obat'];
    $jenis    =$_POST['id_jenis'];
    $kategori =$_POST['id_kategori'];
    $harga =$_POST['harga'];
    $rak =$_POST['id_rak'];


    $query = mysqli_query($connect, "INSERT INTO tb_obat (id_obat, nama_obat, id_jenis, id_kategori, harga, id_rak) Values ('$id_obat', '$nama_obat', '$jenis', '$kategori', '$harga', '$rak')");

    if($query){
        header ('location: TableObat.php');
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
      <button class="button"><a href="TableObat.php">Table</a></button>
      <button class="button"><a href="TambahObat.php">Tambah</a></button>
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
          <label>Id Obat</label>
          <input type="text" name="id_obat" id="id_obat" class="input" require>
       </div>  

        <div class="inputfield">
          <label>Nama Obat</label>
          <input type="text" name="nama_obat" id="nama_obat" class="input" required>
       </div>  

        <div class="inputfield">
          <label>Gender</label>
          <div class="custom_select">
                <select name="id_kategori" id="id_kategori" required>
                <option value="">Pilih kategori</option>
                    <?php
                    $query_kategori = mysqli_query($connect, "SELECT * FROM tb_kategori");
                    while ($data_kategori = mysqli_fetch_array($query_kategori)){
                    ?>
                    <option value="<?= $data_kategori['id_kategori'] ?>"><?= $data_kategori['kategori'] ?></option>
                    <?php
                    }
                    ?>
                </select>
          </div>
       </div> 

       <div class="inputfield">
          <label>Gender</label>
          <div class="custom_select">
                <select name="id_jenis" id="id_jenis" required>
                <option value="">Pilih Jenis</option>
                    <?php
                    $query_kategori = mysqli_query($connect, "SELECT * FROM tb_jenis");
                    while ($data_kategori = mysqli_fetch_array($query_kategori)){
                    ?>
                    <option value="<?= $data_kategori['id_jenis'] ?>"><?= $data_kategori['jenis'] ?></option>
                    <?php
                    }
                    ?>
                </select>
          </div>
       </div> 

       <div class="inputfield">
          <label>Gender</label>
          <div class="custom_select">
                <select name="id_rak" id="id_rak" required>
                <option value="">Pilih rak</option>
                    <?php
                    $query_kategori = mysqli_query($connect, "SELECT * FROM tb_rak");
                    while ($data_kategori = mysqli_fetch_array($query_kategori)){
                    ?>
                    <option value="<?= $data_kategori['id_rak'] ?>"><?= $data_kategori['kode_rak'] ?></option>
                    <?php
                    }
                    ?>
                </select>
          </div>
       </div> 

        <div class="inputfield">
          <label>Harga</label>
          <input type="text" name="harga" id="harga" class="input" required>
        </div> 

        <div class="inputfield">
          <label>Stok</label>
          <input type="radio" name="stok" id="stok" class="radio" required>ada
          <input type="radio" name="stok" id="stok" required>kosong
        </div> 

        <div class="inputfield">
        <input type="submit" name="submit" value="submit" class="btn">
        </div>
      </form>
    </div>
  </div>
    

  </body>
</html>
