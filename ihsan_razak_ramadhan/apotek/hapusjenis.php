<?php
include 'config.php';

$id = $_POST['id_jenis'];
$query = mysqli_query($connect, "DELETE FROM tb_jenisobat WHERE id_jenis = $id ");
if($query){
    echo json_encode(array("statusCode"=>200,"pesan"=>"Data berhasil dihapus"));
} else {
    echo json_encode(array("statusCode"=>201,"pesan"=>"Data Gagal dihapus"));
}
?>

