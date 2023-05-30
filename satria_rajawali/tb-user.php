<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tampil data Kategori</title>
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

  </div>
</div>


<div class="content">
  <div class="burger-icon" onclick="toggleSidebar()">&#9776;</div>
  <h1>Tampil data Kategori</h1>
  <button class="btn-add" onclick="openInsertModal()">Add</button>
  <div class="table-container">
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Username</th>
          <th>Password</th>
          <th>Level</th>
          <th>Aksi</th>


        </tr>
      </thead>
      <tbody>
        <?php
        include 'config.php';
        $query = mysqli_query($connect, "SELECT * FROM tb_user");
        while ($data = mysqli_fetch_array($query)) {
        ?>
        <tr>
  <td><?php echo $data['id_user'] ?></td>
  <td><?php echo $data['nama'] ?></td>
  <td><?php echo $data['username'] ?></td>
  <td><?php echo $data['password'] ?></td>
  <td><?php echo $data['level'] ?></td>

  <td>
    <button class="btn-update" onclick="openUpdateModal('<?php echo $data['id_user']; ?>',
                                                          '<?php echo $data['nama']; ?>',
                                                          '<?php echo $data['username']; ?>',
                                                          '<?php echo $data['password']; ?>',
                                                          '<?php echo $data['level']; ?>')">Update</button>
    <a href="deleteuser.php?id_user=<?php echo $data['id_user']; ?>"><button class="btn-delete">Delete</button></a>
  </td>
</tr>
<?php
}
?>
</tbody>
</table>
</div>
</div>

<div id="insertModal" class="modal">
<div class="modal-content">
  <span class="close" onclick="closeInsertModal()">&times;</span>
  <h2>Insert User</h2>
  <form id="insertForm" method="POST" action="insertuser.php">
    <label for="insertNama">Nama:</label>
    <input type="text" name="nama" id="insertNama">
    <label for="insertUsername">Username:</label>
    <input type="text" name="username" id="insertUsername">
    <label for="insertPassword">Password:</label>
    <input type="password" name="password" id="insertPassword">
    <label for="insertLevel">Level:</label>
    <select name="level" id="insertLevel">
      <option value="admin">Admin</option>
      <option value="kasir">Kasir</option>
    </select>
    <button type="submit" name="insert">Insert</button>
  </form>
</div>
</div>


<div id="updateModal" class="modal">
<div class="modal-content">
  <span class="close" onclick="closeUpdateModal()">&times;</span>
  <h2>Update User</h2>
  <form id="updateForm" method="POST" action="updateuser.php">
    <input type="hidden" name="id_user" id="updateUserId">
    <label for="updateNama">Nama:</label>
    <input type="text" name="nama" id="updateNama">
    <label for="updateUsername">Username:</label>
    <input type="text" name="username" id="updateUsername">
    <label for="updatePassword">Password:</label>
    <input type="password" name="password" id="updatePassword">
    <label for="updateLevel">Level:</label>
    <select name="level" id="updateLevel">
      <option value="admin">Admin</option>
      <option value="kasir">Kasir</option>
    </select>
    <button type="submit" name="update">Update</button>
  </form>
</div>
</div>
</html>
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

  function openUpdateModal(userId, nama, username, password, level) {
  document.getElementById('updateUserId').value = userId;
  document.getElementById('updateNama').value = nama;
  document.getElementById('updateUsername').value = username;
  document.getElementById('updatePassword').value = password;
  document.getElementById('updateLevel').value = level;
  document.getElementById('updateModal').style.display = 'block';
}

function closeUpdateModal() {
  document.getElementById('updateModal').style.display = 'none';
}
</script>
</body>
</html>