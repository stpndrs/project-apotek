<?php
require_once "config/database.php";
require_once "config/fungsi_tanggal.php";
require_once "config/fungsi_rupiah.php";

if (empty($_SESSION['username']) && empty($_SESSION['password'])){
	echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
else {
	if ($_GET['module'] == 'beranda') {
		include "modules/beranda/view.php";
	}

	elseif ($_GET['module'] == 'obat') {
		include "modules/obat/view.php";
	}

	elseif ($_GET['module'] == 'form_obat') {
		include "modules/obat/form.php";
	}

	elseif ($_GET['module'] == 'obat_masuk') {
		include "modules/obat-masuk/view.php";
	}

	elseif ($_GET['module'] == 'form_obat_masuk') {
		include "modules/obat-masuk/form.php";
	}

	elseif ($_GET['module'] == 'lap_stok') {
		include "modules/lap-stok/view.php";
	}

	elseif ($_GET['module'] == 'lap_obat_masuk') {
		include "modules/lap-obat-masuk/view.php";
	}

	elseif ($_GET['module'] == 'user') {
		include "modules/user/view.php";
	}

	elseif ($_GET['module'] == 'form_user') {
		include "modules/user/form.php";
	}

	elseif ($_GET['module'] == 'profil') {
		include "modules/profil/view.php";
	}
		elseif ($_GET['module'] == 'form_profil') {
		include "modules/profil/form.php";
	}
		elseif ($_GET['module'] == 'password') {
		include "modules/password/view.php";
	}
}
?>