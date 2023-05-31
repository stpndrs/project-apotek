<html>
    <head>
        <title>RAK OBAT</title>
    </head>
    <body>
        <table border="1" width="50%" align="center">
            <thead>
                <tr>
                    <th>Rak obat</th>
                    <th>Nama obat</th>
                    <th>Stock obat</th>
                    <th>Harga jual</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'configlogin.php';
                $query = mysqli_query($connect, "SELECT * FROM rak_obat");
                while($datarak= mysqli_fetch_array($query)) {
                    ?>
                    <tr>
                        <td><?php echo $datarak ['id_rak_obat'] ?></td>
                        <td><?php echo $datarak ['id_obat'] ?></td>
                        <td><?php echo $datarak ['nama_obat'] ?></td>
                        <td><?php echo $datarak ['stock_obat'] ?></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>

        </table>
    </body>
</html>