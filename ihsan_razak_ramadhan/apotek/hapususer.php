<?php
include 'config.php';

$id = $_POST['id_user'];
$query = mysqli_query($connect, "DELETE FROM tb_user WHERE id_user = $id ");
if($query){
    echo json_encode(array("statusCode"=>200,"pesan"=>"Data berhasil dihapus"));
} else {
    echo json_encode(array("statusCode"=>201,"pesan"=>"Data Gagal dihapus"));
}
?>