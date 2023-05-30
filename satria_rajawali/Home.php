<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>
  <style>
    * {
      box-sizing: border-box;
    }
    
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
    <h1>Main Content</h1>
    <p>This is the main content of the page.</p>
  </div>

  <script>
  function toggleSidebar() {
    var sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('open');
  }

  // Menandai elemen sidebar yang sedang aktif
  var currentUrl = window.location.pathname.split('/').pop();
  var sidebarLinks = document.querySelectorAll('.sidebar .menu a');

  sidebarLinks.forEach(function(link) {
    var linkUrl = link.getAttribute('href').split('/').pop();
    if (linkUrl === currentUrl) {
      link.parentNode.classList.add('active');
    }
  });
</script>

</body>
</html>
