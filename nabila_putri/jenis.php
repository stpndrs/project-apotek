<!DOCTYPE html>
<html>
<head>
    <title>Data Jenis</title>
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
        
        .container {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
        }
        
        .form-container {
            flex-grow: 1;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <h1>Data Jenis</h1>
    
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
        $id_jenis = $_POST['id_jenis'];
        $nama_jenis = $_POST['nama_jenis'];

        // Insert data ke tabel
        $sql = "INSERT INTO tb_jenis (id_jenis, nama_jenis) VALUES ('$id_jenis', '$nama_jenis')";

        if ($connect->query($sql) === TRUE) {
            echo "Data berhasil ditambahkan";
        } else {
            echo "Error: " . $sql . "<br>" . $connect->error;
        }
    }

    // Query untuk mendapatkan data jenis
    $sql = "SELECT id_jenis, nama_jenis FROM tb_jenis";
    $result = $connect->query($sql);
    ?>

    <div class="container">
        <div class="form-container">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label for="id_jenis">ID Jenis:</label>
                <input type="text" name="id_jenis" id="id_jenis" required>
                
                <label for="nama_jenis">Nama Jenis:</label>
                <input type="text" name="nama_jenis" id="nama_jenis" required>
                
                <input type="submit" value="Tambah">
            </form>
        </div>
        
        <div class="btn">
            <button><a href="halamanpetugas.php">Home</a></button>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID Jenis</th>
                <th>Nama Jenis</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Tampilkan data
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id_jenis"] . "</td>";
                    echo "<td>" . $row["nama_jenis"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='2'>Tidak ada data jenis</td></tr>";
            }
            ?>
        </tbody>
    </table>
    
    <?php
    $connect->close();
    ?>
</body>
</html>
