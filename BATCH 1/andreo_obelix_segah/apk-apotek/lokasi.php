<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <script>
        function confirmDelete() {
            return confirm("Apakah Anda yakin ingin menghapus data ini?");
        }
    </script>
</head>
<body>
    <header>
    <img src="img/akasaka.jpg" alt="logo" class="logo" style="border-radius: 50%; height: 30px;">
        <nav>
            <ul class="nav_links">
                <li><a href="obat.php">Obat</a></li>
                <li><a href="kategori.php">Kategori</a></li>
                <li><a href="jenis.php">Jenis</a></li>
                <li><a href="#">Lokasi Obat</a></li>
            </ul>
        </nav>
        <a href="logout.php" class="cta"><button>Log out</button></a>
    </header>

    <!-- table -->
    <div class="content-container">
        <a href="lokasiAdd.php" class="cta" style="margin-left: 20px;"><button>+Add New</button></a>
    <div class="table_responsive">
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Lokasi</th>
          <th>Action</th>
        </tr>
      </thead>

      <tbody>
      <?php
        include 'config.php';
        $no = 1;
        $query = mysqli_query($conn, "SELECT * FROM tb_lokasi");
        while($data = mysqli_fetch_array($query)) {
        ?>
        <tr>
            <td><?php echo $no ?></td>
            <td><?= $data['No_rak'] ?></td>
            <td>
            <span class="action_btn">
              <a href="lokasiEdit.php?id_rak=<?php echo $data['id_rak']?>">Edit</a>
              <a href="lokasiRemove.php?id_rak=<?php echo $data['id_rak']?>" onclick="return confirmDelete()">Remove</a>
            </span>
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