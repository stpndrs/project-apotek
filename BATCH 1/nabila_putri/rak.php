<!DOCTYPE html>
<html>
<head>
    <title>Data Rak</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
        }

        h1 {
            text-align: center;
        }

        form {

            text-align: center;
            margin-bottom: 20px;
        }

        input[type="submit"] {
            padding: 5px 10px;
        }

        .btn {
            text-align: right;
            margin-top: 10px;
        }
        
        .btn a {
            padding: 5px 10px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h1>Data Rak</h1>

    <?php
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database ='apotek';

    $connect = mysqli_connect($host, $username, $password, $database);

    if ($connect) {
        echo '';
    } else {
        echo 'Koneksi database gagal' . mysqli_error($connect);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Ambil nilai dari form
        $id_rak = $_POST['id_rak'];
        $nomor_rak = $_POST['nomor_rak'];

        // Insert data ke tabel
        $sql = "INSERT INTO tb_rak (id_rak, nomor_rak) VALUES ('$id_rak', '$nomor_rak')";

        if ($connect->query($sql) === TRUE) {
            echo "Data berhasil ditambahkan";
        } else {
            echo "Error: " . $sql . "<br>" . $connect->error;
        }
    }

    // Query untuk mendapatkan data rak
    $sql = "SELECT id_rak, nomor_rak FROM tb_rak";
    $result = $connect->query($sql);
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="id_rak">ID Rak:</label>
        <input type="text" name="id_rak" id="id_rak" required><br><br>

        <label for="nomor_rak">Nomor Rak:</label>
        <input type="text" name="nomor_rak" id="nomor_rak" required><br><br>

        <input type="submit" value="Tambah">
    </form>

    <div class="btn">
            <button><a href="halamanpetugas.php">Home</a></button>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID Rak</th>
                <th>Nomor Rak</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Tampilkan data
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id_rak"] . "</td>";
                    echo "<td>" . $row["nomor_rak"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='2'>Tidak ada data rak</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <?php
    $connect->close();
    ?>
</body>
</html>
