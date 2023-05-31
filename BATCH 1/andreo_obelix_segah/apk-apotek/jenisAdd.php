<?php
include 'config.php';

$error = '';

if (isset($_POST['submit'])) {
    $nama_jenis = $_POST['nama_jenis'];

    // Melakukan sanitasi pada input untuk mencegah serangan SQL Injection
    $nama_jenis = mysqli_real_escape_string($conn, $nama_jenis);

    $query = mysqli_query($conn, "INSERT INTO tb_jenis (nama_jenis) VALUES ('$nama_jenis')");

    if ($query) {
        header("location: jenis.php");
        exit();
    } else {
        $error = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="css/styleTable.css">
</head>
<body>

<div class="wrapper">
    <div class="title">
        Registration Form
    </div>
    <div class="form">
        <form method="POST" action="">
            <div class="inputfield">
                <label>Jenis</label>
                <input type="text" class="input" name="nama_jenis" required>
            </div>
            <div class="inputfield">
                <input type="submit" value="Add" class="btn" name="submit">
            </div>
        </form>
        <?php if ($error) { ?>
            <p class="error"><?php echo $error; ?></p>
        <?php } ?>
    </div>
</div>

</body>
</html>
