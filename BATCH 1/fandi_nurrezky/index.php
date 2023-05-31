<?php
 include("config.php");
 session_start();  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Apotek Dsr</title>
</head>
<body>
  <h1 style="text-align:center; padding-top 20px;">DASHBOARD</h1>
  <?php echo $_SESSION['username']; ?>
  <style>
  * {
  font-family: "Poppins", sans-serif;
  margin: 0;
  padding: 0;
}
body {
  position: relative;
  min-height: 100vh;
  width: 100%;
  background: #e7e9f5;
}
.sidebar {
  position: fixed;
  top: 0;
  left: 0;
  width: 50px;
  background: #ffffff;
  padding: 6px 16px;
  height: 100%;
  box-shadow: 5px 0 30px rgba(0, 0, 0, 0.1);
  transition: all 0.5s ease;
  overflow: hidden;
}
.sidebar.active {
  width: 240px;
}
.sidebar .logo_content .logo {
  display: flex;
  color: #0b2997;
  height: 50px;
  width: 200px;
  font-size: 30px;
  margin-left: 5px;
  align-items: center;
  pointer-events: none;
  opacity: 0;
  transition: 0.3s;
}
.sidebar.active .logo_content .logo {
  opacity: 1;
}
.sidebar .logo_content .logo .logo_name {
  font-size: 23px;
  font-weight: 600;
  margin: 0 10px;
}
.sidebar #btn {
  position: absolute;
  color: b3b3b3;
  left: 50%;
  top: 6px;
  font-size: 20px;
  height: 50px;
  width: 50px;
  text-align: center;
  line-height: 50px;
  transform: translate(-50%);
}
.sidebar.active #btn {
  left: 85%;
}
.sidebar .src {
  position: relative;
  height: 50px;
  width: 100%;
  margin-top: 20px;
}
.sidebar .src input {
  position: absolute;
  height: 100%;
  width: calc(100% - 50px);
  left: 0;
  top: 0;
  border-radius: 20px;
  outline: none;
  border: none;
  background: #0b2997;
  padding-left: 50px;
  font-size: 15px;
  color: #ffffff;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
  transition: all 0.5s ease;
}
.sidebar .src .bx-search {
  position: absolute;
  z-index: 99;
  font-size: 22px;
  color: #ffffff;
  transition: all 0.5s ease;
}
.sidebar .src .bx-search:hover {
  color: #0b2997;
}
.sidebar .src .bx-search:hover ~ input {
  background: #ffffff;
}
.sidebar i {
  height: 50px;
  min-width: 50px;
  border-radius: 12px;
  line-height: 50px;
  text-align: center;
  font-size: 25px;
}
.sidebar ul {
  margin-top: 20px;
}
.sidebar ul li {
  position: relative;
  height: 50px;
  width: 100%;
  margin: 0;
  list-style: none;
  line-height: 50px;
}
.sidebar ul li a {
  color: #b3b3b3;
  display: flex;
  text-decoration: none;
  align-items: center;
  border-radius: 20px;
  font-size: 13px;
  white-space: nowrap;
  transition: all 0.4s ease;
}
.sidebar ul li a:hover {
  color: #0b2997;
  background: #e7e9f5;
}
.sidebar .link_name {
  opacity: 0;
  pointer-events: none;
  transition: all 0.5s ease;
}
.sidebar.active .link_name {
  opacity: 1;
  pointer-events: auto;
}
.sidebar ul li .tooltip {
  position: absolute;
  left: 130px;
  top: 0;
  transform: translate(-45%, -50%);
  border-radius: 10px;
  height: 35px;
  width: 130px;
  background: #ffffff;
  line-height: 35px;
  text-align: center;
  font-size: 13px;
  display: block;
  color: #242424;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
  pointer-events: none;
  opacity: 0;
  transition: all 0.5s ease;
}
.sidebar.active ul li .tooltip {
  display: none;
}
.sidebar ul li:hover .tooltip {
  opacity: 1;
  top: 50%;
}
.home_content {
  position: absolute;
  height: 100%;
  width: calc(100% = 300px);
  left: 80px;
  transition: all 0.5s ease;
}
.home_content .text {
  font-size: 25px;
  font-weight: 500;
  color: #242424;
  padding: 12px 24px;
}
.sidebar.active ~ .home_content {
  left: 300px;
 }
.content{
  position: relative;
  
  margin-left: 0vh;
  min-height: 100vh;
  min-width: 100vh;
  background: #1D267D;
}
.cards{
  padding : 15px 10px;
  display : flex;
  margin-left: 300px;
  align-items: center;
  flex-wrap: wrap;
}
.card{
  width: 230px;
  height: 130px;
  background: white;
  margin: 15px 8px;
  display: flex;
  align-items: center;
  justify-content: space-around;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, ,0.2) 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
}
</style>
<div class="content">
  <div class="cards">
    <div class="card">
      <div class="box">
        <h1>5</h1>
        <h3>Jumlah Obat</h3>
      </div>
    </div>
    <div class="card">
      <div class="box">
        <h1>5</h1>
        <h3>Jumlah Admin</h3>
      </div>
    </div>
    <div class="card">
      <div class="box">
        <h1>50.000</h1>
        <h3>Laba</h3>
      </div>
    </div>
  </div>
</div>
<div class="sidebar">
  <div class="logo_content">
    <div class="logo">
      <i class='bx bxs-heart'></i>
      <div class="logo_name">apotek dsr</div>
    </div>
    <i class='bx bx-menu' id='btn'></i>
  </div>

  <div class="src">
    <i class='bx bx-search'></i>
    <input type="text" placeholder="Search..">
  </div>

  <ul class="nav">
    <li>
      <a href="index.php">
        <i class='bx bx-bar-chart-square'></i>
        <span class="link_name">Dashboard</span>
      </a>
      <span class="tooltip">Dashboard</span>
    </li>
    <li>
      <a href="dataobat.php">
        <i class='bx bx-line-chart'></i>
        <span class="link_name">Data Obat</span>
      </a>
      <span class="tooltip">Data Obat</span></span>
    </li>
    <li>
      <a href="jenisobat.php">
        <i class='bx bx-calendar-event'></i>
        <span class="link_name">Jenis Obat</span>
      </a>
      <span class="tooltip">Jenis Obat</span>
    </li>
    <li>
      <a href="kategori.php">
        <i class='bx bxs-bolt'></i>
        <span class="link_name">Kategori Obat</span>
      </a>
      <span class="tooltip">Kategori Obat</span>
    </li>
    <li>
      <a href="rakobat.php">
        <i class='bx bxs-heart-circle'></i>
        <span class="link_name">Rak Obat</span>
      </a>
      <span class="tooltip">Rak Obat</span>
    </li>
  </ul>
</div>
<script>
  let btn = document.querySelector("#btn");
let sidebar = document.querySelector(".sidebar");
let srcBtn = document.querySelector(".bx-search");

btn.onclick = function () {
  sidebar.classList.toggle("active");
};
srcBtn.onclick = function () {
  sidebar.classList.toggle("active");
};
</script>
</body>
</html>
