<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'apotek';

$connect = mysqli_connect($host, $username, $password, $database);

if ($connect) {
    echo 'Koneksi database berhasil';
} else {
    echo 'Koneksi database gagal' . mysqli_error($connect);
}

// Fungsi untuk memasukkan data ke dalam database
function insertData($table, $data)
{
    global $connect;
    $columns = implode(", ", array_keys($data));
    $values = "'" . implode("', '", array_values($data)) . "'";
    $query = "INSERT INTO $table ($columns) VALUES ($values)";

    if (mysqli_query($connect, $query)) {
        echo "";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connect);
    }
}

// Fungsi untuk menghapus data dari tabel tb_obat
function deleteData($table, $condition)
{
    global $connect;
    $query = "DELETE FROM $table WHERE $condition";

    if (mysqli_query($connect, $query)) {
        echo "";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connect);
    }
}

// Fungsi untuk mengupdate data dalam tabel tb_obat
function updateData($table, $data, $condition)
{
    global $connect;
    $updateValues = array();
    foreach ($data as $key => $value) {
        $updateValues[] = "$key = '$value'";
    }
    $updateValuesString = implode(", ", $updateValues);
    $query = "UPDATE $table SET $updateValuesString WHERE $condition";

    if (mysqli_query($connect, $query)) {
        echo "";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connect);
    }
}

// Mendapatkan daftar jenis obat dari database
$query_jenis = "SELECT id_jenis, nama_jenis FROM tb_jenis";
$result_jenis = mysqli_query($connect, $query_jenis);
$jenis_obat = array();
while ($row = mysqli_fetch_assoc($result_jenis)) {
    $jenis_obat[$row['id_jenis']] = $row['nama_jenis'];
}

// Proses penyimpanan data saat form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $id_obat = $_POST['id_obat'];
    $nama_obat = $_POST['nama_obat'];
    $stok_obat = $_POST['stok_obat']; // Perbaikan nama field
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
        'stok_obat' => $stok_obat,
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

// Proses update data saat form ubah disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['aksi']) && $_POST['aksi'] === 'ubah') {
    $id_obat = $_POST['id_obat'];
    $nama_obat = $_POST['nama_obat'];
    $stok_obat = $_POST['stok_obat']; // Perbaikan nama field
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

    // Buat data yang akan diupdate ke dalam tabel tb_obat
    $data_obat = array(
        'nama_obat' => $nama_obat,
        'stok_obat' => $stok_obat,
        'harga_jual' => $harga_jual,
        'status' => $status,
        'keterangan' => $keterangan,
        'id_kategori' => $id_kategori,
        'id_rak' => $id_rak,
        'id_jenis' => $id_jenis,
    );

    // Update data obat ke dalam database
    updateData('tb_obat', $data_obat, "id_obat = '$id_obat'");
}
?>

<!-- Form input data obat -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Obat</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Input Data Obat</h1>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="id_obat">ID Obat:</label>
                <input type="text" class="form-control" id="id_obat" name="id_obat" required>
            </div>

            <div class="form-group">
                <label for="nama_obat">Nama Obat:</label>
                <input type="text" class="form-control" id="nama_obat" name="nama_obat" required>
            </div>

            <div class="form-group">
                <label for="stok_obat">Stok Obat:</label>
                <input type="text" class="form-control" id="stok_obat" name="stok_obat" required>
            </div>

            <div class="form-group">
                <label for="harga_jual">Harga Jual:</label>
                <input type="text" class="form-control" id="harga_jual" name="harga_jual" required>
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" id="status" name="status">
                    <option value="Tersedia">Tersedia</option>
                    <option value="Kosong">Kosong</option>
                </select>
            </div>

            <div class="form-group">
                <label for="keterangan">Keterangan:</label>
                <textarea class="form-control" id="keterangan" name="keterangan"></textarea>
            </div>

            <div class="form-group">
                <label for="id_kategori">ID Kategori:</label>
                <input type="text" class="form-control" id="id_kategori" name="id_kategori" required>
            </div>

            <div class="form-group">
                <label for="id_rak">ID Rak:</label>
                <input type="text" class="form-control" id="id_rak" name="id_rak" required>
            </div>

            <div class="form-group">
                <label for="id_jenis">ID Jenis:</label>
                <select class="form-control" id="id_jenis" name="id_jenis">
                    <?php foreach ($jenis_obat as $id => $jenis) : ?>
                        <option value="<?php echo $id; ?>"><?php echo $jenis; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
            <div class="btn">
            <button><a href="halamanpetugas.php">Home</a></button>
            </div>
          </form>

        <!-- Tabel daftar obat -->
        <?php
        $query_obat = "SELECT * FROM tb_obat";
        $result_obat = mysqli_query($connect, $query_obat);
        ?>

        <table class="table table-striped mt-5">
            <thead>
                <tr>
                    <th>ID Obat</th>
                    <th>Nama Obat</th>
                    <th>Stok Obat</th>
                    <th>Harga Jual</th>
                    <th>Status</th>
                    <th>Keterangan</th>
                    <th>ID Kategori</th>
                    <th>ID Rak</th>
                    <th>ID Jenis</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result_obat)) : ?>
                    <tr>
                        <td><?php echo $row['id_obat']; ?></td>
                        <td><?php echo $row['nama_obat']; ?></td>
                        <td><?php echo $row['stok_obat']; ?></td>
                        <td><?php echo $row['harga_jual']; ?></td>
                        <td><?php echo $row['status']; ?></td>
                        <td><?php echo $row['keterangan']; ?></td>
                        <td><?php echo $row['id_kategori']; ?></td>
                        <td><?php echo $row['id_rak']; ?></td>
                        <td><?php echo $row['id_jenis']; ?></td>
                        <td>
                            <a href="?hapus=<?php echo $row['id_obat']; ?>" class="btn btn-danger">Hapus</a>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ubahModal-<?php echo $row['id_obat']; ?>">Ubah</button>
                        </td>
                    </tr>

                    <!-- Modal ubah data obat -->
                    <div class="modal fade" id="ubahModal-<?php echo $row['id_obat']; ?>" tabindex="-1" aria-labelledby="ubahModalLabel-<?php echo $row['id_obat']; ?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="ubahModalLabel-<?php echo $row['id_obat']; ?>">Ubah Data Obat</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="">
                                        <input type="hidden" name="aksi" value="ubah">
                                        <input type="hidden" name="id_obat" value="<?php echo $row['id_obat']; ?>">

                                        <div class="form-group">
                                            <label for="nama_obat">Nama Obat:</label>
                                            <input type="text" class="form-control" id="nama_obat" name="nama_obat" value="<?php echo $row['nama_obat']; ?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="stok_obat">Stok Obat:</label>
                                            <input type="text" class="form-control" id="stok_obat" name="stok_obat" value="<?php echo $row['stok_obat']; ?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="harga_jual">Harga Jual:</label>
                                            <input type="text" class="form-control" id="harga_jual" name="harga_jual" value="<?php echo $row['harga_jual']; ?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="status">Status:</label>
                                            <select class="form-control" id="status" name="status">
                                                <option value="Tersedia" <?php if ($row['status'] === 'Tersedia') echo 'selected'; ?>>Tersedia</option>
                                                <option value="Kosong" <?php if ($row['status'] === 'Kosong') echo 'selected'; ?>>Kosong</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="keterangan">Keterangan:</label>
                                            <textarea class="form-control" id="keterangan" name="keterangan"><?php echo $row['keterangan']; ?></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="id_kategori">ID Kategori:</label>
                                            <input type="text" class="form-control" id="id_kategori" name="id_kategori" value="<?php echo $row['id_kategori']; ?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="id_rak">ID Rak:</label>
                                            <input type="text" class="form-control" id="id_rak" name="id_rak" value="<?php echo $row['id_rak']; ?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="id_jenis">ID Jenis:</label>
                                            <select class="form-control" id="id_jenis" name="id_jenis">
                                                <?php foreach ($jenis_obat as $id => $jenis) : ?>
                                                    <option value="<?php echo $id; ?>" <?php if ($id === $row['id_jenis']) echo 'selected'; ?>><?php echo $jenis; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
