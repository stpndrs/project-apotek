<!DOCTYPE html>
<html lang="en">
<head>
    <title>Transaksi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
    include "config.php";
    include "sidebar.php";

    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $usia = $_POST['usia'];
        $grandtotal = $_POST['grandtotal'];
        $obat = $_POST['obat'];
        $qty = $_POST['qty'];
        $subtotal = $_POST['subtotal'];

        mysqli_query($connect, "INSERT INTO transaksi VALUES ('$id', '$grandtotal', '$nama', '$usia');");
        for ($i=0; $i < count($obat); $i++) { 
            mysqli_query($connect, "INSERT INTO detail_transaksi VALUES (null, '$id', '$obat[$i]', '$qty[$i]', '$subtotal[$i]');");
            mysqli_query($connect, "UPDATE data_obat SET stok = stok - '$qty[$i]' WHERE id_obat = '$obat[$i]';");
        }
    }
    ?>
    <div id="container">
    <form method="POST" id="content">
    <table>
        <tr>
            <td>Id Transaksi</td>
            <td colspan="4"><Input type="text" name="id" style="width: 100%;"></Input></td>
        </tr>
        <tr>
            <td>Nama Pembeli</td>
            <td colspan="4"><Input type="text" name="nama" style="width: 100%;"></Input></td>
        </tr>
        <tr>
            <td>Usia</td>
            <td colspan="4"><Input type="text" name="usia" style="width: 100%;"></Input></td>
        </tr>
        <tr>
            <td>Obat</td>
            <td>
                <select name="obat[]" onchange="Update()">
                    <option value="0">-Pilih Obat-</option>
                    <?php
                        $query = mysqli_query($connect, "SELECT * FROM data_obat");
                        while($data = mysqli_fetch_array($query)){
                    ?>
                    <option value="<?php echo $data['id_obat']; ?>"><?php echo $data['nama_obat']; ?></option>
                    <?php } ?>
                </select>
            </td>
            <td><input type="text" name="qty[]" value="1" onkeyup="Update()"></input></td>
            <td><input type="text" name="subtotal[]" readonly></input></td>
            <td><button type="button" class="delete" onclick="HapusObat()">Hapus</button></td>
        </tr>
        <tr id="form-row"></tr>
        <tr>
            <td colspan="2">Total</td>
            <td><input type="text" id="grandtotal" name="grandtotal" readonly style="width: 100%;"></input></td>
        </tr>
        <tr>
            <td colspan="2">Pembayaran</td>
            <td><input type="text" id="bayar" style="width: 100%;" onkeyup="Update()"></input></td>
        </tr>
        <tr>
            <td colspan="2">Kembalian</td>
            <td><input type="text" id="kembalian" readonly style="width: 100%;"></input></td>
        </tr>
    </table>
    <button type="button" onclick="TambahObat()">Tambah Obat</button>
    <br>
    <button type="submit" name="submit">Submit</button>
    </form>
    </div>

    <script>
        function TambahObat() {
            var formRow = document.getElementById("form-row");
            var tr = document.createElement("tr");
            
            tr.innerHTML = `<td>Obat</td>
            <td>
                <select name="obat[]">
                    <option value="0">-Pilih Obat-</option>
                    <?php
                        $query = mysqli_query($connect, "SELECT * FROM data_obat");
                        while($data = mysqli_fetch_array($query)){
                    ?>
                    <option value="<?php echo $data['id_obat']; ?>"><?php echo $data['nama_obat']; ?></option>
                    <?php } ?>
                    </select>
                    </td>
                    <td><input type="text" name="qty[]" value="1"></input></td>
                    <td><input type="text" name="subtotal[]" disabled></input></td>
                    <td><button type="button" class="delete" onclick="HapusObat()">Hapus</button></td>
                    `;
                    
            formRow.parentNode.insertBefore(tr, formRow.nextElementSibling);
            Update();
        }

        function HapusObat() {
            var formRow = document.getElementsByClassName("delete");
            
            function Click(event) {
                var index = Array.from(formRow).indexOf(event.target);

                formRow[index].parentNode.parentNode.remove();
            }
            for (let i = 0; i < formRow.length; i++) {
                formRow[i].addEventListener("click", Click);
            }
            Update();
        }

        function Update() {
            var obat = document.getElementsByName('obat[]');
            var grandtotal = document.getElementById('grandtotal');
            var bayar = document.getElementById('bayar');
            var kembalian = document.getElementById('kembalian');
            var total = 0;
            for (let i = 0; i < obat.length; i++) {
                var idObat = document.getElementsByName("obat[]")[i];
                var qty = document.getElementsByName("qty[]")[i];
                var subtotal = document.getElementsByName("subtotal[]")[i];

                if (idObat.value != 0) {
                    qty.disabled = false;
                    <?php
                        include "config.php";
                        $query = mysqli_query($connect, "SELECT * FROM data_obat ORDER BY id_obat ASC");
                        while($data = mysqli_fetch_array($query)){
                    ?>
                        if (idObat.value == "<?php echo $data['id_obat']; ?>") {
                            subtotal.value =  qty.value != "" && qty.value != 0 ? parseInt(qty.value) * "<?php echo $data['harga']; ?>" : 0;
                            total += parseInt(subtotal.value);
                            grandtotal.value = total;
                            kembalian.value = grandtotal.value - bayar.value;
                        }
                    <?php } ?>
                } else {
                    subtotal.value = "0";
                    grandtotal.value = "0";
                    qty.value = "0";
                    qty.disabled = true;
                }
            } 
        }
        Update();
    </script>
</body>
</html>