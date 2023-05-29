<?php
include 'config.php';


// Fungsi untuk memasukkan data ke dalam database
function insertData($table, $data)
{
    global $conn;
    $columns = implode(", ", array_keys($data));
    $values = "'" . implode("', '", array_values($data)) . "'";
    $query = "INSERT INTO $table ($columns) VALUES ($values)";

    if (mysqli_query($conn, $query)) {
        echo "";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}

// Fungsi untuk menghapus data dari tabel tb_obat
function deleteData($table, $condition)
{
    global $conn;
    $query = "DELETE FROM $table WHERE $condition";

    if (mysqli_query($conn, $query)) {
        echo "";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}

// Mendapatkan daftar jenis obat dari database
$query_jenis = "SELECT id_jenis, nama_jenis FROM tb_jenis";
$result_jenis = mysqli_query($conn, $query_jenis);
$jenis_obat = array();
while ($row = mysqli_fetch_assoc($result_jenis)) {
    $jenis_obat[$row['id_jenis']] = $row['nama_jenis'];
}

// Proses penyimpanan data saat form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $id_obat = $_POST['id_obat'];
    $nama_obat = $_POST['nama_obat'];
    $stock_obat = $_POST['stock_obat'];
    $harga_jual = $_POST['harga_jual'];
    $status = $_POST['status'];
    $keterangan = $_POST['keterangan'];
    $id_kategori = $_POST['id_kategori'];
    $id_rak = $_POST['id_rak'];
    $id_jenis = $_POST['id_jenis'];

    // Validasi id_jenis
    if (!isset($jenis_obat[$id_jenis])) {
        echo "Error: Jenis obat tidak valid.";
        exit;
    }

    // Buat data yang akan dimasukkan ke dalam tabel tb_obat
    $data_obat = array(
        'id_obat' => $id_obat,
        'nama_obat' => $nama_obat,
        'stock_obat' => $stock_obat,
        'harga_jual' => $harga_jual,
        'status' => $status,
        'keterangan' => $keterangan,
        'id_kategori' => $id_kategori,
        'id_rak' => $id_rak,
        'id_jenis' => $id_jenis,
    );

    // Memasukkan data obat ke dalam database
    insertData('tb_obat', $data_obat);
}

// Proses penghapusan data saat tombol hapus diklik
if (isset($_GET['hapus'])) {
    $id_obat = $_GET['hapus'];
    deleteData('tb_obat', "id_obat = '$id_obat'");
}
?>

<!-- Form input data obat -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Master Obat</title>
    <!-- Tambahkan link CSS untuk Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Tambahkan CSS khusus di sini jika diperlukan */
    </style>
</head>
<body>
    <div class="container">
        <h1>Data Master Obat</h1>
        <form action="" method="POST">
            <div class="form-group">
                <label for="id_obat">ID Obat:</label>
                <input type="text" class="form-control" name="id_obat" id="id_obat" required>
            </div>
            <div class="form-group">
                <label for="nama_obat">Nama Obat:</label>
                <input type="text" class="form-control" name="nama_obat" id="nama_obat" required>
            </div>
            <div class="form-group">
                <label for="stock_obat">Stock Obat:</label>
                <input type="number" class="form-control" name="stock_obat" id="stock_obat" required>
            </div>
            <div class="form-group">
                <label for="harga_jual">Harga Jual:</label>
                <input type="number" class="form-control" name="harga_jual" id="harga_jual" required>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" name="status" id="status" required>
                    <option value="tidak tersedia">Tidak Tersedia</option>
                    <option value="tersedia">Tersedia</option>
                </select>
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan:</label>
                <input type="text" class="form-control" name="keterangan" id="keterangan" required>
            </div>
            <div class="form-group">
                <label for="id_kategori">ID Kategori:</label>
                <input type="text" class="form-control" name="id_kategori" id="id_kategori" required>
            </div>
            <div class="form-group">
                <label for="id_rak">ID Rak:</label>
                <input type="text" class="form-control" name="id_rak" id="id_rak" required>
            </div>
            <div class="form-group">
                <label for="id_jenis">Jenis Obat:</label>
                <select class="form-control" name="id_jenis" id="id_jenis" required>
                    <?php
                    foreach ($jenis_obat as $id_jenis => $jenis) {
                        echo "<option value=\"$id_jenis\">$jenis</option>";
                    }
                    ?>
                </select>
            </div>
            <input type="submit" class="btn btn-primary" value="Simpan">
        </form>
<!-- Tabel untuk menampilkan hasil inputan -->
<h2>Data Obat</h2>
<table class="table table-bordered table-hover">
    <thead class="thead-light">
        <tr>
            <th>ID Obat</th>
            <th>Nama Obat</th>
            <th>Jenis</th>
            <th>Kategori</th>
            <th>No.Rak</th>
            <th>Stock Obat</th>
            <th>Harga Jual</th>
            <th>Status</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
       $query_obat = "SELECT tb_obat.id_obat, tb_obat.nama_obat, tb_jenis.nama_jenis, tb_kategori.nama_kategori, tb_rak.no_rak, tb_obat.stock_obat, tb_obat.harga_jual, tb_obat.status, tb_obat.keterangan FROM tb_obat
       INNER JOIN tb_jenis ON tb_obat.id_jenis = tb_jenis.id_jenis
       INNER JOIN tb_kategori ON tb_obat.id_kategori = tb_kategori.id_kategori
       INNER JOIN tb_rak ON tb_obat.id_rak = tb_rak.id_rak";
$result_obat = mysqli_query($conn, $query_obat);
while ($row = mysqli_fetch_assoc($result_obat)) {
echo "<tr>";
echo "<td>" . $row['id_obat'] . "</td>";
echo "<td>" . $row['nama_obat'] . "</td>";
echo "<td>" . $row['nama_jenis'] . "</td>";
echo "<td>" . $row['nama_kategori'] . "</td>";
echo "<td>" . $row['no_rak'] . "</td>";
echo "<td>" . $row['stock_obat'] . "</td>";
echo "<td>" . $row['harga_jual'] . "</td>";
echo "<td>" . $row['status'] . "</td>";
echo "<td>" . $row['keterangan'] . "</td>";
echo "<td><button class=\"btn btn-danger\" onclick=\"deleteData('" . $row['id_obat'] . "')\">Hapus</button></td>";
echo "</tr>";
}
        ?>
    </tbody>
</table>

<script>
    function deleteData(id_obat) {
        if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
            // Kirim permintaan penghapusan data ke script PHP
            window.location.href = "?hapus=" + id_obat;
        }
    }
</script>
    </div>
</body>
</html>
