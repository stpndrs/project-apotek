<?php
include 'config.php';

$id = $_POST['id_obat'];
$query = mysqli_query($connect, "DELETE FROM tb_obat WHERE id_obat = $id ");
if($query){
    echo json_encode(array("statusCode"=>200,"pesan"=>"Data berhasil dihapus"));
} else {
    echo json_encode(array("statusCode"=>201,"pesan"=>"Data Gagal dihapus"));
}
?>