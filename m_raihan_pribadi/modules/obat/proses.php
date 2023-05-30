<?php
session_start();

require_once "../../config/database.php";

if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['simpan'])) {
            $kode_obat  = mysqli_real_escape_string($mysqli, trim($_POST['kode_obat']));
            $nama_obat  = mysqli_real_escape_string($mysqli, trim($_POST['nama_obat']));
            $harga_beli = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['harga_beli'])));
            $harga_jual = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['harga_jual'])));
            $satuan     = mysqli_real_escape_string($mysqli, trim($_POST['satuan']));

            $created_user = $_SESSION['id_user'];

            $query = mysqli_query($mysqli, "INSERT INTO is_obat(kode_obat,nama_obat,harga_beli,harga_jual,satuan,created_user,updated_user) 
                                            VALUES('$kode_obat','$nama_obat','$harga_beli','$harga_jual','$satuan','$created_user','$created_user')")
                                            or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));    

            if ($query) {
                header("location: ../../main.php?module=obat&alert=1");
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['kode_obat'])) {
                $kode_obat  = mysqli_real_escape_string($mysqli, trim($_POST['kode_obat']));
                $nama_obat  = mysqli_real_escape_string($mysqli, trim($_POST['nama_obat']));
                $harga_beli = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['harga_beli'])));
                $harga_jual = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['harga_jual'])));
                $satuan     = mysqli_real_escape_string($mysqli, trim($_POST['satuan']));

                $updated_user = $_SESSION['id_user'];

                $query = mysqli_query($mysqli, "UPDATE is_obat SET  nama_obat       = '$nama_obat',
                                                                    harga_beli      = '$harga_beli',
                                                                    harga_jual      = '$harga_jual',
                                                                    satuan          = '$satuan',
                                                                    updated_user    = '$updated_user'
                                                              WHERE kode_obat       = '$kode_obat'")
                                                or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                if ($query) {
                    header("location: ../../main.php?module=obat&alert=2");
                }         
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $kode_obat = $_GET['id'];
    
            $query = mysqli_query($mysqli, "DELETE FROM is_obat WHERE kode_obat='$kode_obat'")
                                            or die('Ada kesalahan pada query delete : '.mysqli_error($mysqli));

            if ($query) {
                header("location: ../../main.php?module=obat&alert=3");
            }
        }
    }       
}       
?>