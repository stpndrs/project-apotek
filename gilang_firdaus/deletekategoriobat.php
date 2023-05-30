<?php
	include 'config.php';

	$id = $_GET['id'];
	$sql = "DELETE FROM tb_berita WHERE id_berita = '$id'";
		if (mysqli_query($connect, $sql)) {
			echo "record deleted";
		}
		else
		{
			echo "Error: ".$sql."<br>".mysqli_error($connect);
		}
	mysqli_close($connect);
	header("Location: kategori obat.php");
?>