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
                <li><a href="#">Jenis</a></li>
                <li><a href="lokasi.php">Lokasi Obat</a></li>
            </ul>
        </nav>
        <a href="logout.php" class="cta"><button>Log out</button></a>
    </header>

    <!-- table -->
    <div class="content-container">
        <a href="jenisAdd.php" class="cta" style="margin-left: 20px;"><button>+Add New</button></a>
    <div class="table_responsive">
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Jenis</th>
          <th>Action</th>
        </tr>
      </thead>

      <tbody>
      <?php
        include 'config.php';
        $no = 1;
        $query = mysqli_query($conn, "SELECT * FROM tb_jenis");
        while($data = mysqli_fetch_array($query)) {
        ?>
        <tr>
            <td><?php echo $no ?></td>
            <td><?= $data['nama_jenis'] ?></td>
            <td>
            <span class="action_btn">
              <a href="jenisEdit.php?id_jenis=<?php echo $data['id_jenis']?>">Edit</a>
              <a href="jenisRemove.php?id_jenis=<?php echo $data['id_jenis']?>" onclick="return confirmDelete()">Remove</a>
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
