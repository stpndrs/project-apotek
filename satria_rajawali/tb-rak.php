<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tampil data Rak</title>
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

    .modal {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.4);
    }

    .modal-content {
      background-color: #fefefe;
      margin: 15% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
      max-width: 600px;
    }

    .close {
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
      cursor: pointer;
    }

    .close:hover,
    .close:focus {
      color: black;
      text-decoration: none;
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
  <h1>Tampil data Rak</h1>
  <button id="addButton" onclick="openModal()">Add</button>
  <div class="table-container">
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include 'config.php';
        $query = mysqli_query($connect, "SELECT * FROM tb_rak");
        while ($data = mysqli_fetch_array($query)) {
        ?>
        <tr>
          <td><?php echo $data['id_rak'] ?></td>
          <td><?php echo $data['nomor_rak'] ?></td>
          <td>
          <button class="btn-update" onclick="openUpdateModal(<?php echo $data['id_rak']; ?>, '<?php echo $data['nomor_rak']; ?>')">Update</button>
          <button class="btn-delete" onclick="deleteRak(<?php echo $data['id_rak']; ?>)">Delete</button>
          </td>
        </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
</div>

<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeModal()">&times;</span>
    <form method="post" action="insert_rak.php">
      <label for="rakNumber">Nomor Rak:</label>
      <input type="text" id="rakNumber" name="rakNumber"><br><br>
      <button type="submit">Submit</button>
    </form>
  </div>
</div>
</div>
<div id="myModalUpdate" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeModalUpdate()">&times;</span>
    <form id="updateForm" method="post" action="update_rak.php">
      <input type="hidden" id="updateId" name="updateId">
      <label for="updateRakNumber">Nomor Rak:</label>
      <input type="text" id="updateRakNumber" name="updateRakNumber"><br><br>
      <button type="Update">Submit</button>
    </form>
  </div>
</div>


<script>
  function toggleSidebar() {
    var sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('open');
  }

  function openModal() {
    var modal = document.getElementById("myModal");
    modal.style.display = "block";
  }

  function closeModal() {
    var modal = document.getElementById("myModal");
    modal.style.display = "none";
  }
  function openUpdateModal(id, rakNumber) {
    var modal = document.getElementById("myModalUpdate");
    var updateIdField = document.getElementById("updateId");
    var updateRakNumberField = document.getElementById("updateRakNumber");

    updateIdField.value = id;
    updateRakNumberField.value = rakNumber;

    modal.style.display = "block";
  }
  function closeModalUpdate() {
    var modal = document.getElementById("myModalUpdate");
    modal.style.display = "none";
  }
  function deleteRak(id) {
    if (confirm("Are you sure you want to delete this record?")) {
      window.location.href = "deleterak.php?id_rak=" + id;
    }
  }
</script>
</body>
</html>
