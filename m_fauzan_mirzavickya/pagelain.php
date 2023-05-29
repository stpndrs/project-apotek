<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'apotekdb';

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
}

// Fungsi untuk menyimpan obat ke dalam database
function simpanObat($namaObat, $idJenis, $lokasi, $stok, $idKategori, $harga)
{
    global $conn;

    $sql = "INSERT INTO obat (nama_obat, id_jenis, lokasi, stok, id_kategori, harga) VALUES ('$namaObat', '$idJenis', '$lokasi', '$stok', '$idKategori', '$harga')";

    if (mysqli_query($conn, $sql)) {
        echo "Obat berhasil disimpan ke dalam database.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Form handling untuk menyimpan obat
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $namaObat = $_POST["nama_obat"];
    $idJenis = $_POST["id_jenis"];
    $lokasi = $_POST["lokasi"];
    $stok = $_POST["stok"];
    $idKategori = $_POST["id_kategori"];
    $harga = $_POST["harga"];

    simpanObat($namaObat, $idJenis, $lokasi, $stok, $idKategori, $harga);
}
?>

<html>
  <head>
    <title></title>
  </head>
  <body>
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
  color: #000;
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
.content {
  padding: 20px;
  background-color: #f4f8f8;
  min-height: 100vh;
        }
    </style>

  <div class="sidebar">
  <div class="logo_content">
    <div class="logo">
      <i class='bx bxs-heart'></i>
      <div class="logo_name">Rv Health</div>
    </div>
    <i class='bx bx-menu' id='btn'></i>
  </div>

  <div class="src">
    <i class='bx bx-search'></i>
    <input type="text" placeholder="Search..">
  </div>

  <ul class="nav">
    <li>
      <a href="#">
        <i class='bx bx-bar-chart-square'></i>
        <span class="link_name">Dashboard</span>
      </a>
      <span class="tooltip">Dashboard</span>
    </li>
    <li>
      <a href="#">
        <i class='bx bx-line-chart'></i>
        <span class="link_name">Statistik</span>
      </a>
      <span class="tooltip">Selling Statistic</span>
    </li>
    <li>
      <a href="transaksi.php">
        <i class='bx bx-calendar-event'></i>
        <span class="link_name">Transaksi</span>
      </a>
      <span class="tooltip">Workout Plan</span>
    </li>
    <li>
      <a href="#">
        <i class='bx bxs-bolt'></i>
        <span class="link_name">Distance Map</span>
      </a>
      <span class="tooltip">Distance Map</span>
    </li>
    <li>
      <a href="#">
        <i class='bx bxs-heart-circle'></i>
        <span class="link_name">Diet Food Menu</span>
      </a>
      <span class="tooltip">Diet Food Menu</span>
    </li>
    <li>
      <a href="#">
        <i class='bx bxs-pie-chart-alt'></i>
        <span class="link_name">Personal Record</span>
      </a>
      <span class="tooltip">Personal Record</span>
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
<div class="content">
        <div class="form-container">
            <h2>Form Input Obat:</h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label for="nama_obat">Nama Obat:</label>
                <input type="text" name="nama_obat" id="nama_obat" required>

                <label for="id_jenis">ID Jenis:</label>
                <input type="text" name="id_jenis" id="id_jenis" required>

                <label for="lokasi">Lokasi:</label>
                <input type="text" name="lokasi" id="lokasi" required>

                <label for="stok">Stok:</label>
                <input type="text" name="stok" id="stok" required>

                <label for="id_kategori">ID Kategori:</label>
                <input type="text" name="id_kategori" id="id_kategori" required>

                <label for="harga">Harga:</label>
                <input type="text" name="harga" id="harga" required>

                <button type="submit">Simpan</button>
            </form>
        </div>
        <!-- Konten lainnya -->
    </div>
  </body>
</html>