<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tampil data Obat</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
    }
    .sidebar {
      position: fixed;
      left: -250px;
      top: 0;
      width: 250px;
      height: 100vh;
      background-color: #333;
      transition: left 0.3s ease-in-out;
    }
    .sidebar.open {
      left: 0;
    }
    .sidebar .close-btn {
      position: absolute;
      top: 10px;
      right: 10px;
      color: #fff;
      font-size: 24px;
      cursor: pointer;
    }
    .sidebar .menu {
      margin-top: 50px;
      padding: 0;
      list-style: none;
    }
    .sidebar .menu div {
      padding: 15px;
      color: #fff;
      font-size: 18px;
      cursor: pointer;
      transition: background-color 0.3s ease-in-out;
    }
    .sidebar .menu div:hover,
    .sidebar .menu div.active {
      background-color: #555;
    }
    .content {
      padding: 20px;
      margin-left: 250px;
    }
    .table-container {
      width: 50%;
      margin: auto;
    }
    table {
      border-collapse: collapse;
      width: 100%;
    }
    th, td {
      padding: 10px;
      text-align: left;
      border: 1px solid black;
    }
    button {
      background-color: #4CAF50;
      color: white;
      padding: 10px 15px;
      border: none;
      cursor: pointer;
      margin-right: 5px;
    }
    button.btn-add {
      background-color: green;
    }
    button.btn-update {
      background-color: blue;
    }
    button.btn-delete {
      background-color: red;
    }
    button a {
      color: white;
      text-decoration: none;
    }
    button a:hover {
      text-decoration: underline;
    }
    .burger-icon {
      position: fixed;
      top: 10px;
      left: 10px;
      color: #333;
      font-size: 24px;
      cursor: pointer;
      z-index: 1;
    }
    .sidebar .menu a {
      color: white;
      text-decoration: none;
    }
    .sidebar .menu a:hover {
      color: blue;
      text-decoration: none;
    }
    .sidebar .logo {
      color: #fff;
      font-size: 24px;
      text-align: center;
      padding: 20px 0;
      margin-bottom: 20px;
    }

    /* Modal Style */
    .modal {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgb(0,0,0);
      background-color: rgba(0,0,0,0.4);
    }

    .modal-content {
      background-color: #fefefe;
      margin: 15% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
    }

    .close {
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: black;
      text-decoration: none;
      cursor: pointer;
    }

    .form-group {
      margin-bottom: 15px;
    }

    .form-group label {
      display: block;
      font-weight: bold;
    }

    .form-group input {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
    }

    .form-group input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      cursor: pointer;
    }
  </style>
</head>
<body>
<div class="sidebar open" id="sidebar">
  <h1 class="logo">ApoTech</h1>
  <div class="close-btn" onclick="toggleSidebar()">&times;</div>
  <div class="menu">
  <div class="<?php echo (basename($_SERVER['PHP_SELF']) == 'Home.php') ? 'active' : ''; ?>"><a href="Home.php">Home</a></div>
    <div class="<?php echo (basename($_SERVER['PHP_SELF']) == 'tb-obat.php') ? 'active' : ''; ?>"><a href="tb-obat.php">Obat</a></div>
    <div class="<?php echo (basename($_SERVER['PHP_SELF']) == 'tb-kategori.php') ? 'active' : ''; ?>"><a href="tb-kategori.php">Kategori</a></div>
    <div class="<?php echo (basename($_SERVER['PHP_SELF']) == 'tb-jenis.php') ? 'active' : ''; ?>"><a href="tb-jenis.php">Jenis</a></div>
    <div class="<?php echo (basename($_SERVER['PHP_SELF']) == 'tb-rak.php') ? 'active' : ''; ?>"><a href="tb-rak.php">Rak</a></div>
    <div class="<?php echo (basename($_SERVER['PHP_SELF']) == 'tb-user.php') ? 'active' : ''; ?>"><a href="tb-user.php">User</a></div>
    <div class="<?php echo (basename($_SERVER['PHP_SELF']) == 'login.php') ? 'active' : ''; ?>"><a href="login.php">Logout</a></div>

  </div>
</div>


<div class="content">
  <div class="burger-icon" onclick="toggleSidebar()">&#9776;</div>
  <h1>Tampil data Obat</h1>
  <button class="btn-add" onclick="openInsertModal()">Add</button>
  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Obat</th>
        <th>Jenis</th>
        <th>Kategori</th>
        <th>Rak</th>
        <th>Stock</th>
        <th>Harga</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      include 'config.php';
      $query = mysqli_query($connect, "SELECT o.*, j.nama_jenis, k.nama_kategori, r.nomor_rak FROM tb_obat o 
                                       JOIN tb_jenis j ON o.jenis_id = j.id_jenis
                                       JOIN tb_kategori k ON o.kategori_id = k.id_kategori
                                       JOIN tb_rak r ON o.rak_id = r.id_rak");

      if ($query) {
        $no = 1;
        while ($data = mysqli_fetch_array($query)) {
      ?>
      <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $data['nama_obat'] ?></td>
        <td><?php echo $data['nama_jenis'] ?></td>
        <td><?php echo $data['nama_kategori'] ?></td>
        <td><?php echo $data['nomor_rak'] ?></td>
        <td><?php echo $data['stock'] ?></td>
        <td><?php echo $data['harga'] ?></td>
        <td>
        <button class="btn-update" onclick="openUpdateModal('<?php echo $data['id_obat']; ?>',
                                                              '<?php echo $data['nama_obat']; ?>',
                                                              '<?php echo $data['nama_jenis']; ?>',
                                                              '<?php echo $data['nama_kategori']; ?>',
                                                              '<?php echo $data['nomor_rak']; ?>',
                                                              '<?php echo $data['stock']; ?>',
                                                              '<?php echo $data['harga']; ?>')">Update</button>
        <a href="delete.php?id_obat=<?php echo $data['id_obat']; ?>"><button class="btn-delete">Delete</button></a>
      </td>
      </tr>
      <?php
        }
      } else {
        echo "Query execution failed: " . mysqli_error($connect);
      }
      ?>
    </tbody>
  </table>
</div>

<div id="insertModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeInsertModal()">&times;</span>
    <h2>Insert Obat</h2>
    <form id="insertForm" method="POST" action="insert.php">
      <label for="insertNamaObat">Nama Obat:</label>
      <input type="text" name="nama_obat" id="insertNamaObat">
      <label for="insertJenis">Jenis:</label>
      <select name="jenis_id" id="insertJenis">
        <?php
        $queryJenis = mysqli_query($connect, "SELECT * FROM tb_jenis");
        while ($jenis = mysqli_fetch_array($queryJenis)) {
          echo '<option value="' . $jenis['id_jenis'] . '">' . $jenis['nama_jenis'] . '</option>';
        }
        ?>
      </select>
      <label for="insertKategori">Kategori:</label>
      <select name="kategori_id" id="insertKategori">
        <?php
        $queryKategori = mysqli_query($connect, "SELECT * FROM tb_kategori");
        while ($kategori = mysqli_fetch_array($queryKategori)) {
          echo '<option value="' . $kategori['id_kategori'] . '">' . $kategori['nama_kategori'] . '</option>';
        }
        ?>
      </select>
      <label for="insertRak">Rak:</label>
      <select name="rak_id" id="insertRak">
        <?php
        $queryRak = mysqli_query($connect, "SELECT * FROM tb_rak");
        while ($rak = mysqli_fetch_array($queryRak)) {
          echo '<option value="' . $rak['id_rak'] . '">' . $rak['nomor_rak'] . '</option>';
        }
        ?>
      </select>
      <label for="insertStock">Stock:</label>
      <select name="stock" id="insertStock">
        <option value="ada">Ada</option>
        <option value="kosong">Kosong</option>
      </select>
      <label for="insertHarga">Harga:</label>
      <input type="text" name="harga" id="insertHarga">
      <button type="submit" name="insert">Insert</button>
    </form>
  </div>
</div>


<div id="updateModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeUpdateModal()">&times;</span>
    <h2>Update Obat</h2>
    <form id="updateForm" method="POST" action="update.php">
      <input type="hidden" name="id_obat" id="updateIdObat">
      <label for="updateNamaObat">Nama Obat:</label>
      <input type="text" name="nama_obat" id="updateNamaObat">
      <label for="updateJenis">Jenis:</label>
      <select name="jenis_id" id="updateJenis">
        <?php
        $queryJenis = mysqli_query($connect, "SELECT * FROM tb_jenis");
        while ($jenis = mysqli_fetch_array($queryJenis)) {
          echo '<option value="' . $jenis['id_jenis'] . '">' . $jenis['nama_jenis'] . '</option>';
        }
        ?>
      </select>
      <label for="updateKategori">Kategori:</label>
      <select name="kategori_id" id="updateKategori">
        <?php
        $queryKategori = mysqli_query($connect, "SELECT * FROM tb_kategori");
        while ($kategori = mysqli_fetch_array($queryKategori)) {
          echo '<option value="' . $kategori['id_kategori'] . '">' . $kategori['nama_kategori'] . '</option>';
        }
        ?>
      </select>
      <label for="updateRak">Rak:</label>
      <select name="rak_id" id="updateRak">
        <?php
        $queryRak = mysqli_query($connect, "SELECT * FROM tb_rak");
        while ($rak = mysqli_fetch_array($queryRak)) {
          echo '<option value="' . $rak['id_rak'] . '">' . $rak['nomor_rak'] . '</option>';
        }
        ?>
      </select>
      <label for="updateStock">Stock:</label>
      <select name="stock" id="updateStock">
        <option value="ada">Ada</option>
        <option value="kosong">Kosong</option>
      </select>
      <label for="updateHarga">Harga:</label>
      <input type="text" name="harga" id="updateHarga">
      <button type="submit" name="update">Update</button>
    </form>
  </div>
</div>



<script>
  // JavaScript functions

  // Function to toggle sidebar
  function toggleSidebar() {
    document.getElementById("sidebar").classList.toggle("open");
  }

  // Function to open insert modal
  function openInsertModal() {
    document.getElementById("insertModal").style.display = "block";
  }

  // Function to close insert modal
  function closeInsertModal() {
    document.getElementById("insertModal").style.display = "none";
  }

  // Function to open update modal
  function openUpdateModal(id, nama_obat, jenis_obat, kategori_obat, rak_obat, stock_obat, harga_obat) {
  document.getElementById("updateIdObat").value = id;
  document.getElementById("updateNamaObat").value = nama_obat;
  document.getElementById("updateJenis").value = jenis_obat;
  document.getElementById("updateKategori").value = kategori_obat;
  document.getElementById("updateRak").value = rak_obat;
  document.getElementById("updateStock").value = stock_obat;
  document.getElementById("updateHarga").value = harga_obat;
  document.getElementById("updateModal").style.display = "block";
}
  

  // Function to close update modal
  function closeUpdateModal() {
    document.getElementById("updateModal").style.display = "none";
  }
</script>

</body>
</html>
