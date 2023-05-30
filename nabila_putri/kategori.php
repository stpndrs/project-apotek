<!DOCTYPE html>
<html>
<head>
    <title>Data Kategori</title>
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
    </style>
</head>
<body>
    <h1>Data Kategori</h1>
    
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
        $id_kategori = $_POST['id_kategori'];
        $nama_kategori = $_POST['nama_kategori'];

        // Insert data ke tabel
        $sql = "INSERT INTO tb_kategori (Id_kategori, nama_kategori) VALUES ('$id_kategori', '$nama_kategori')";

        if ($connect->query($sql) === TRUE) {
            echo "Data berhasil ditambahkan";
        } else {
            echo "Error: " . $sql . "<br>" . $connect->error;
        }
    }

    // Query untuk mendapatkan data kategori
    $sql = "SELECT Id_kategori, nama_kategori FROM tb_kategori";
    $result = $connect->query($sql);
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="id_kategori">ID Kategori:</label>
        <input type="text" name="id_kategori" id="id_kategori" required>
        
        <label for="nama_kategori">Nama Kategori:</label>
        <input type="text" name="nama_kategori" id="nama_kategori" required>
        
        <input type="submit" value="Tambah">
    </form>

    <table>
        <thead>
            <tr>
                <th>ID Kategori</th>
                <th>Nama Kategori</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Tampilkan data
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["Id_kategori"] . "</td>";
                    echo "<td>" . $row["nama_kategori"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='2'>Tidak ada data kategori</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <div class="btn">
      <style>
        .btn {
          margin-top: 250px;
        }
      </style>
      <center>
        <button type="submit" name="home" value="home"><a href="halamanpetugas.php">Home</a></button>
    </center>
    </div>
    <?php
    $connect->close();
    ?>
</body>
</html>