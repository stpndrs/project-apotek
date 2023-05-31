<?php
session_start();

require_once "../../config/database.php";

if (empty($_SESSION['username']) && empty($_SESSION['password'])){
	echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
else {
	if ($_GET['act']=='update') {
		if (isset($_POST['simpan'])) {
			if (isset($_POST['id_user'])) {
				$id_user            = mysqli_real_escape_string($mysqli, trim($_POST['id_user']));
				$username           = mysqli_real_escape_string($mysqli, trim($_POST['username']));
				$nama_user          = mysqli_real_escape_string($mysqli, trim($_POST['nama_user']));
				$email              = mysqli_real_escape_string($mysqli, trim($_POST['email']));
				$telepon            = mysqli_real_escape_string($mysqli, trim($_POST['telepon']));
				
				$nama_file          = $_FILES['foto']['name'];
				$ukuran_file        = $_FILES['foto']['size'];
				$tipe_file          = $_FILES['foto']['type'];
				$tmp_file           = $_FILES['foto']['tmp_name'];

				$allowed_extensions = array('jpg','jpeg','png');

				$path_file          = "../../images/user/".$nama_file;

				$file               = explode(".", $nama_file);
				$extension          = array_pop($file);

				if (empty($_FILES['foto']['name'])) {
                    $query = mysqli_query($mysqli, "UPDATE is_users SET username 	= '$username',
                    													nama_user 	= '$nama_user',
                    													email       = '$email',
                    													telepon     = '$telepon'
                                                                  WHERE id_user 	= '$id_user'")
                                                    or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                    if ($query) {
                        header("location: ../../main.php?module=profil&alert=1");
                    }
				}
				else {
					if (in_array($extension, $allowed_extensions)) {
	                    if($ukuran_file <= 1000000) { 
	                        if(move_uploaded_file($tmp_file, $path_file)) { 
			                    $query = mysqli_query($mysqli, "UPDATE is_users SET username 	= '$username',
			                    													nama_user 	= '$nama_user',
			                    													email       = '$email',
			                    													telepon     = '$telepon',
			                    													foto     	= '$nama_file'
			                                                                  WHERE id_user 	= '$id_user'")
			                                                    or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

			                    if ($query) {
			                        header("location: ../../main.php?module=profil&alert=1");
			                    }
                        	} else {
	                            header("location: ../../main.php?module=user&alert=2");
	                        }
	                    } else {
	                        header("location: ../../main.php?module=user&alert=3");
	                    }
	                } else {
	                    header("location: ../../main.php?module=user&alert=4");
	                } 
				}
			}
		}
	}		
}		
?>