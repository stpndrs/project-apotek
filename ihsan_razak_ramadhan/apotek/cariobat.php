<?php
if(isset($_POST['id_obat'])){
    $id_obat = $_POST['id_obat'];
    if($id_obat==''){
        echo json_encode(array('statuscode'=>201,'pesan'=>'Nama Obat Tidak Boleh Kosong!!!'));

    }else {
        include 'config.php';
        $query=mysqli_query($connect,"SELECT * FROM vw_obat WHERE id_obat= $id_obat");
        if($query){
            if(mysqli_num_rows($query)>0){
                $rw = mysqli_fetch_assoc($query);
                $jenis = $rw['jenis_obat'];
                $kategori = $rw['kategori_obat'];
                $lokasi = $rw['lokasi_obat'];
                echo json_encode(array('statuscode'=>200,'pesan'=>'Berhasil','jenis'=>$jenis,'kategori'=>$kategori,'lokasi'=>$lokasi));
            }

        } else {
            echo json_encode(array('statuscode'=>201,'pesan'=>'Gagal Mengambil Data Obat'));
        }
    }
} else {
    echo json_encode(array('statuscode'=>201,'pesan'=>'Obat Tidak ditemukan'));
}

?>