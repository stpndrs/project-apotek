<html>
    <head>
        <title>Apotek</title>
    </head>
    <body>
        <div>
        </div>
        <table border ="1" width ="50%" align = "center" >
        <thead>
            <tr>
                <th>Nama Pelanggan</th>
                <th>Jenis Obat</th>
                <th>Obat</th>
                <th>Kategori Obat</th>
                <th>Rak Obat</th>
                <th>Karyawan</th>
                <th>Transaksi</th>
                <th>Detail Transaksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            include 'configapotek.html';
            $query = mysqli_query($connect, "SELECT * FROM tb_obat");
            while($data = mysqli_fetch_array($query)) {
                ?>
                <tr>
                   <td><?=$data['tb_user']?></td> 
                   <td><?=$data['tb_jenis_obat']?></td> 
                   <td><?=$data['tb_obat']?></td> 
                   <td><?=$data['tb_kategori_obat']?></td>
                   <td><?=$data['tb_rak_obat']?></td>
                   <td><?=$data['tb_karyawan']?></td>
                   <td><?=$data['tb_transaksi']?></td>
                   <td><?=$data['tb_detail_transaksi']?></td>
                   
                </tr>
                <?php
                $no++;
            }
            ?>
        </tbody>
        </table>
        </td>
    </body>
    </html>