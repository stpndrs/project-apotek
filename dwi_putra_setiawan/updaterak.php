<?php
include 'config.php';

$id = $_GET['id'];
$query = mysqli_query($connect, "SELECT * FROM tb_rak WHERE id_rak = '$id'");
$data = mysqli_fetch_array($query);

if (isset($_POST['submit'])) {
    $id_rak = $_POST['id_rak'];
    $rak = $_POST['no_rak'];

    $queryUpdate = mysqli_query($connect, "UPDATE tb_rak SET id_rak='$id_rak', no_rak='$rak' WHERE id_rak = '$id'");

    if ($queryUpdate) {
        header('Location: rak.php');
    }
}
?>

<html>
<head>
<link type="text/css" rel="stylesheet" href="style.css">
    <title>Form Ubah rak</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            width: 400px;
            margin: 0 auto;
            background-color: #f5f8fa;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            margin-top: 20px;
        }

        table {
            width: 100%;
        }

        td {
            padding: 10px 0;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <?php include('sidebar.php'); ?>
    <div class="container">
        <h1>Ubah rak</h1>
        <form method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>NO</td>
                    <td><input type="text" name="id_rak" value="<?php echo $data['id_rak'] ?>"></td>
                </tr>
                <tr>
                    <td>rak</td>
                    <td><input type="text" name="no_rak" value="<?php echo $data['no_rak'] ?>"></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="id" value="<?php echo $data['id_rak'] ?>"></td>
                    <td><button type="submit" name="submit" value="updaterak">Ubah</button></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>