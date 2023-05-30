<?php
include 'config.php';

// Fungsi untuk menghapus transaksi berdasarkan ID
function hapusTransaksi($id)
{
    global $connect;
    $query = "DELETE FROM tb_transaksi WHERE id_transaksi = '$id'";
    mysqli_query($connect, $query);
}

// Ambil data transaksi dari tabel
$queryTransaksi = mysqli_query($connect, "SELECT * FROM tb_transaksi");
$dataTransaksi = mysqli_fetch_all($queryTransaksi, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Riwayat Transaksi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        button {
            padding: 6px 12px;
            background-color: #333;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #555;
        }

        .no-data {
            text-align: center;
            color: #777;
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
  </div clas>  
    <h1>Riwayat Transaksi</h1>
    <table>
        <tr>
            <th>ID Transaksi</th>
            <th>Tanggal</th>
            <th>Nama Petugas</th>
            <th>Grand Total</th>
            <th>Aksi</th>
        </tr>
        <?php if (isset($dataTransaksi) && !empty($dataTransaksi)) { ?>
            <?php foreach ($dataTransaksi as $transaksi) { ?>
                <tr>
                    <td><?= $transaksi['id_transaksi']; ?></td>
                    <td><?= $transaksi['tanggal']; ?></td>
                    <td><?= $transaksi['nama_petugas']; ?></td>
                    <td><?= $transaksi['grand_total']; ?></td>
                    <td>
                        <form action="" method="POST">
                            <input type="hidden" name="id_transaksi" value="<?= $transaksi['id_transaksi']; ?>">
                            <button type="submit" name="hapus">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        <?php } else { ?>
            <tr>
                <td colspan="5">Tidak ada transaksi yang ditemukan.</td>
            </tr>
        <?php } ?>
    </table>

    <?php
    // Proses penghapusan data
    if (isset($_POST['hapus'])) {
        $id_transaksi = $_POST['id_transaksi'];
        hapusTransaksi($id_transaksi);
        // Redirect atau refresh halaman setelah penghapusan
        header("Location: riwayat_transaksi.php");
        exit();
    }
    ?>
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
