<?php
include 'config.php';

// Ambil data obat dari tabel tb_obat
$queryObat = mysqli_query($connect, "SELECT * FROM tb_obat");
$dataObat = mysqli_fetch_all($queryObat, MYSQLI_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Menyimpan data transaksi
    $id_transaksi = $_POST['id_transaksi'];
    $tanggal = $_POST['tanggal'];
    $nama_petugas = $_POST['nama_petugas'];

    // Query untuk menyimpan data transaksi ke tabel tb_transaksi
    $queryTransaksi = "INSERT INTO tb_transaksi (id_transaksi, tanggal, nama_petugas) VALUES ('$id_transaksi', '$tanggal', '$nama_petugas')";
    mysqli_query($connect, $queryTransaksi);

    // Menghitung grand_total
    $grand_total = 0;

    // Mengambil data obat yang dibeli
    foreach ($_POST['obat'] as $index => $id_obat) {
        $jumlah = $_POST['jumlah'][$index];

        // Query untuk mengambil harga obat
        $queryHarga = "SELECT harga FROM tb_obat WHERE id_obat = $id_obat";
        $resultHarga = mysqli_query($connect, $queryHarga);
        $hargaObat = mysqli_fetch_assoc($resultHarga)['harga'];

        // Menghitung sub_total
        $sub_total = $hargaObat * $jumlah;

        // Menyimpan data detail transaksi ke tabel detail_transaksi
        $queryDetail = "INSERT INTO detail_transaksi (id_transaksi, id_obat, jumlah, sub_total) VALUES ('$id_transaksi', '$id_obat', '$jumlah', '$sub_total')";
        mysqli_query($connect, $queryDetail);

        // Menambahkan sub_total ke grand_total
        $grand_total += $sub_total;
    }

    // Update grand_total pada tabel tb_transaksi
    $queryUpdate = "UPDATE tb_transaksi SET grand_total = '$grand_total' WHERE id_transaksi = '$id_transaksi'";
    mysqli_query($connect, $queryUpdate);

    // Tampilkan pesan transaksi berhasil dan lakukan redirect
    echo '<script>alert("Transaksi berhasil!"); window.location.href = window.location.href;</script>';
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sistem Transaksi Penjualan Obat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input[type="text"],
        input[type="date"],
        select,
        input[type="number"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        button {
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="button"] {
            background-color: #f44336;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            float: right;
        }

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
    <div class="<?php echo ($_SERVER['PHP_SELF'] == '/transaksi.php') ? 'active' : ''; ?>"><a href="transaksi.php">Transaksi</a></div>
    <div class="<?php echo ($_SERVER['PHP_SELF'] == '/riwayat_detail.php') ? 'active' : ''; ?>"><a href="riwayat_detail.php">Riwayat Detail</a></div>
    <div class="<?php echo ($_SERVER['PHP_SELF'] == '/riwayat_transaksi.php') ? 'active' : ''; ?>"><a href="riwayat_transaksi.php">Riwayat Transaksi</a></div>
    <div class="<?php echo (basename($_SERVER['PHP_SELF']) == 'login.php') ? 'active' : ''; ?>"><a href="login.php">Logout</a></div>

  </div>
</div>


  <div class="content">
    <div class="burger-icon" onclick="toggleSidebar()">&#9776;</div>
  </div>
    <h1>Form Transaksi</h1>
    <form action="" method="POST">
        <label for="id_transaksi">ID Transaksi:</label>
        <input type="text" name="id_transaksi" id="id_transaksi" required><br>

        <label for="tanggal">Tanggal:</label>
        <input type="date" name="tanggal" id="tanggal" required><br>

        <label for="nama_petugas">Nama Petugas:</label>
        <input type="text" name="nama_petugas" id="nama_petugas" required><br>

        <table>
            <tr>
                <th>Obat</th>
                <th>Jumlah</th>
            </tr>
            <tr>
                <td>
                    <select name="obat[]" required>
                        <option value="">Pilih Obat</option>
                        <?php foreach ($dataObat as $obat) { ?>
                            <option value="<?= $obat['id_obat']; ?>"><?= $obat['nama_obat']; ?></option>
                        <?php } ?>
                    </select>
                </td>
                <td><input type="number" name="jumlah[]" min="1" required></td>
            </tr>
        </table>

        <button type="button" id="addObat">Tambah Obat</button><br>

        <button type="submit">Simpan Transaksi</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
        $(document).ready(function() {
            var counter = 1;

            $('#addObat').click(function() {
                counter++;

                var newRow = `
                    <tr>
                        <td>
                            <select name="obat[]" required>
                                <option value="">Pilih Obat</option>
                                <?php foreach ($dataObat as $obat) { ?>
                                    <option value="<?= $obat['id_obat']; ?>"><?= $obat['nama_obat']; ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td><input type="number" name="jumlah[]" min="1" required></td>
                    </tr>
                `;

                $('table').append(newRow);
            });
        });
    </script>
</body>
</html>
