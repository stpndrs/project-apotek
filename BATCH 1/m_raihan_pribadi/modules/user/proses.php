<?php
session_start();

require_once "../../config/database.php";

if (empty($_SESSION['username']) && empty($_SESSION['password'])){
	echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
else {
	if ($_GET['act']=='insert') {
		if (isset($_POST['simpan'])) {
			$username  = mysqli_real_escape_string($mysqli, trim($_POST['username']));
			$password  = md5(mysqli_real_escape_string($mysqli, trim($_POST['password'])));
			$nama_user = mysqli_real_escape_string($mysqli, trim($_POST['nama_user']));
			$hak_akses = mysqli_real_escape_string($mysqli, trim($_POST['hak_akses']));

            $query = mysqli_query($mysqli, "INSERT INTO is_users(username,password,nama_user,hak_akses)
                                            VALUES('$username','$password','$nama_user','$hak_akses')")
                                            or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));    

            if ($query) {
                header("location: ../../main.php?module=user&alert=1");
            }
		}	
	}
	
	elseif ($_GET['act']=='update') {
		if (isset($_POST['simpan'])) {
			if (isset($_POST['id_user'])) {
				$id_user            = mysqli_real_escape_string($mysqli, trim($_POST['id_user']));
				$username           = mysqli_real_escape_string($mysqli, trim($_POST['username']));
				$password           = md5(mysqli_real_escape_string($mysqli, trim($_POST['password'])));
				$nama_user          = mysqli_real_escape_string($mysqli, trim($_POST['nama_user']));
				$email              = mysqli_real_escape_string($mysqli, trim($_POST['email']));
				$telepon            = mysqli_real_escape_string($mysqli, trim($_POST['telepon']));
				$hak_akses          = mysqli_real_escape_string($mysqli, trim($_POST['hak_akses']));
				
				$nama_file          = $_FILES['foto']['name'];
				$ukuran_file        = $_FILES['foto']['size'];
				$tipe_file          = $_FILES['foto']['type'];
				$tmp_file           = $_FILES['foto']['tmp_name'];
				
				$allowed_extensions = array('jpg','jpeg','png');
				
				$path_file          = "../../images/user/".$nama_file;
				
				$file               = explode(".", $nama_file);
				$extension          = array_pop($file);

				if (empty($_POST['password']) && empty($_FILES['foto']['name'])) {
                    $query = mysqli_query($mysqli, "UPDATE is_users SET username 	= '$username',
                    													nama_user 	= '$nama_user',
                    													email       = '$email',
                    													telepon     = '$telepon',
                    													hak_akses   = '$hak_akses'
                                                                  WHERE id_user 	= '$id_user'")
                                                    or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                    if ($query) {
                        header("location: ../../main.php?module=user&alert=2");
                    }
				}
				elseif (!empty($_POST['password']) && empty($_FILES['foto']['name'])) {
                    $query = mysqli_query($mysqli, "UPDATE is_users SET username 	= '$username',
                    													nama_user 	= '$nama_user',
                    													password 	= '$password',
                    													email       = '$email',
                    													telepon     = '$telepon',
                    													hak_akses   = '$hak_akses'
                                                                  WHERE id_user 	= '$id_user'")
                                                    or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                    if ($query) {
                        header("location: ../../main.php?module=user&alert=2");
                    }
				}
				elseif (empty($_POST['password']) && !empty($_FILES['foto']['name'])) {

					if (in_array($extension, $allowed_extensions)) {
	                    if($ukuran_file <= 1000000) { 

	                        if(move_uploaded_file($tmp_file, $path_file)) {
			                    $query = mysqli_query($mysqli, "UPDATE is_users SET username 	= '$username',
			                    													nama_user 	= '$nama_user',
			                    													email       = '$email',
			                    													telepon     = '$telepon',
			                    													foto 		= '$nama_file',
			                    													hak_akses   = '$hak_akses'
			                                                                  WHERE id_user 	= '$id_user'")
			                                                    or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

			                    if ($query) {
			                        header("location: ../../main.php?module=user&alert=2");
			                    }
                        	} else {
	                            header("location: ../../main.php?module=user&alert=5");
	                        }
	                    } else {
	                        header("location: ../../main.php?module=user&alert=6");
	                    }
	                } else {
	                    header("location: ../../main.php?module=user&alert=7");
	                } 
				}
				else {
					if (in_array($extension, $allowed_extensions)) {
	                    if($ukuran_file <= 1000000) {
	                        if(move_uploaded_file($tmp_file, $path_file)) { 
			                    $query = mysqli_query($mysqli, "UPDATE is_users SET username 	= '$username',
			                    													nama_user 	= '$nama_user',
			                    													password    = '$password',
			                    													email       = '$email',
			                    													telepon     = '$telepon',
			                    													foto 		= '$nama_file',
			                    													hak_akses   = '$hak_akses'
			                                                                  WHERE id_user 	= '$id_user'")
			                                                    or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

			                    if ($query) {
			                        header("location: ../../main.php?module=user&alert=2");
			                    }
                        	} else {
	                            header("location: ../../main.php?module=user&alert=5");
	                        }
	                    } else {
	                        header("location: ../../main.php?module=user&alert=6");
	                    }
	                } else {
	                    header("location: ../../main.php?module=user&alert=7");
	                } 
				}
			}
		}
	}

	elseif ($_GET['act']=='on') {
		if (isset($_GET['id'])) {
			$id_user = $_GET['id'];
			$status  = "aktif";

            $query = mysqli_query($mysqli, "UPDATE is_users SET status  = '$status'
                                                          WHERE id_user = '$id_user'")
                                            or die('Ada kesalahan pada query update status on : '.mysqli_error($mysqli));

            if ($query) {
                header("location: ../../main.php?module=user&alert=3");
            }
		}
	}

	elseif ($_GET['act']=='off') {
		if (isset($_GET['id'])) {
			$id_user = $_GET['id'];
			$status  = "blokir";

            $query = mysqli_query($mysqli, "UPDATE is_users SET status  = '$status'
                                                          WHERE id_user = '$id_user'")
                                            or die('Ada kesalahan pada query update status on : '.mysqli_error($mysqli));

            if ($query) {
                header("location: ../../main.php?module=user&alert=4");
            }
		}
	}		
}		
?>