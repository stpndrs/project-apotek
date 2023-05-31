<?php
include 'config.php';

// Fungsi untuk memasukkan data ke dalam database
function insertData($table, $data)
{
    global $conn;
    $columns = implode(", ", array_keys($data));
    $values = "'" . implode("', '", array_values($data)) . "'";
    $query = "INSERT INTO $table ($columns) VALUES ($values)";
    mysqli_query($conn, $query);
}

// Proses penyimpanan data saat form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $id_rak = $_POST['id_rak'];
    $no_rak = $_POST['no_rak'];

    // Buat data yang akan dimasukkan ke dalam tabel tb_rak
    $data_rak = array(
        'id_rak' => $id_rak,
        'no_rak' => $no_rak
    );

    // Memasukkan data rak ke dalam database
    insertData('tb_rak', $data_rak);

    // Tampilkan pesan sukses atau redirect ke halaman lain
    // ...
}
?>

<!-- Form input data rak -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Master Rak</title>
    <!-- Tambahkan link CSS untuk Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Tambahkan CSS khusus di sini jika diperlukan */
    </style>
</head>
<body>
    <div class="container">
        <h1>Data Master Rak</h1>
        <form action="" method="POST">
            <div class="form-group">
                <label for="id_rak">ID Rak:</label>
                <input type="text" class="form-control" name="id_rak" id="id_rak" required>
            </div>
            <div class="form-group">
                <label for="no_rak">No Rak:</label>
                <input type="number" class="form-control" name="no_rak" id="no_rak" required>
            </div>
            <input type="submit" class="btn btn-primary" value="Simpan">
        </form>

        <!-- Tabel untuk menampilkan hasil inputan -->
        <h2>Data Rak Terakhir</h2>
        <table class="table table-bordered table-hover">
            <thead class="thead-light">
                <tr>
                    <th>ID Rak</th>
                    <th>No Rak</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Mendapatkan data rak terakhir dari database
                $query_rak_terakhir = "SELECT * FROM tb_rak ORDER BY id_rak DESC LIMIT 1";
                $result_rak_terakhir = mysqli_query($conn, $query_rak_terakhir);

                while ($row = mysqli_fetch_assoc($result_rak_terakhir)) {
                    echo "<tr>";
                    echo "<td>" . $row['id_rak'] . "</td>";
                    echo "<td>" . $row['no_rak'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Tambahkan script JS untuk Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>