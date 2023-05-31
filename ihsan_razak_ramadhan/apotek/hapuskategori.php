<?php
include 'config.php';

$id = $_POST['id_kategori'];
$query = mysqli_query($connect, "DELETE FROM tb_kategoriobat WHERE id_kategori = $id ");
if($query){
    echo json_encode(array("statusCode"=>200,"pesan"=>"Data berhasil dihapus"));
} else {
    echo json_encode(array("statusCode"=>201,"pesan"=>"Data Gagal dihapus"));
}
?>