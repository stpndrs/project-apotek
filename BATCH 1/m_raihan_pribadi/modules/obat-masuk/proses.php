<?php
session_start();

require_once "../../config/database.php";

if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['simpan'])) {
            $kode_transaksi = mysqli_real_escape_string($mysqli, trim($_POST['kode_transaksi']));
            
            $tanggal         = mysqli_real_escape_string($mysqli, trim($_POST['tanggal_masuk']));
            $exp             = explode('-',$tanggal);
            $tanggal_masuk   = $exp[2]."-".$exp[1]."-".$exp[0];
            
            $kode_obat       = mysqli_real_escape_string($mysqli, trim($_POST['kode_obat']));
            $jumlah_masuk    = mysqli_real_escape_string($mysqli, trim($_POST['jumlah_masuk']));
            $total_stok      = mysqli_real_escape_string($mysqli, trim($_POST['total_stok']));
            
            $created_user    = $_SESSION['id_user'];

            $query = mysqli_query($mysqli, "INSERT INTO is_obat_masuk(kode_transaksi,tanggal_masuk,kode_obat,jumlah_masuk,created_user) 
                                            VALUES('$kode_transaksi','$tanggal_masuk','$kode_obat','$jumlah_masuk','$created_user')")
                                            or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));    

            if ($query) {
                $query1 = mysqli_query($mysqli, "UPDATE is_obat SET stok        = '$total_stok'
                                                              WHERE kode_obat   = '$kode_obat'")
                                                or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                if ($query1) {                       
                    header("location: ../../main.php?module=obat_masuk&alert=1");
                }
            }   
        }   
    }
}       
?>