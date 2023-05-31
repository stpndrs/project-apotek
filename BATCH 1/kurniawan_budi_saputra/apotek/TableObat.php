



<html>
  <head>
    <title>Apotek GG Gemink</title>
    <link rel="stylesheet" href="style.css" />

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

      <table   border="1">
        <thead>
        <tr>
        <td>    id obat    </td>
        <td>    Nama Obat    </td>
        <td>    Jenis Obat    </td>
        <td>    Kategori    </td>
        <td>    Rak Obat   </td>
        <td>    harga    </td>
        <td>    Stok    </td>
        <td>    act    </td>
        </tr>
        </thead>

        <tbody>
        <?php 
        include 'config.php';
        $query = mysqli_query($connect, "SELECT* FROM tb_obat");
        while($data = mysqli_fetch_array($query)) {

        ?>
        <tr>
        <td><?=$data['id_obat']?></td>
        <td><?=$data['nama_obat']?></td>
        <td><?=$data['id_jenis']?></td>
        <td><?=$data['id_kategori']?></td>
        <td><?=$data['id_rak']?></td>
        <td><?=$data['harga']?></td>
        <td><?=$data['stok']?></td>
        <td>
            <a href="update.php?id=<?php echo $data['id_obat']?>">update</a> | 
            <a href="deleteObat.php?id=<?php echo $data['id_obat']?>">hapus</a>
        </td>
        </tr>
        <?php
        }
        ?>
        </tbody>
    </table>

    </div>
    </div>
</body>
</html>