<?php 
if ($_SESSION['hak_akses']=='Super Admin') { ?>
	<!-- sidebar menu start -->
    <ul class="sidebar-menu">
        <li class="header">MAIN MENU</li>

	<?php 
	if ($_GET["module"]=="beranda") { ?>
		<li class="active">
			<a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
	  	</li>
	<?php
	}
	else { ?>
		<li>
			<a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
	  	</li>
	<?php
	}

  if ($_GET["module"]=="obat" || $_GET["module"]=="form_obat") { ?>
    <li class="active">
      <a href="?module=obat"><i class="fa fa-folder"></i> Data Obat </a>
      </li>
  <?php
  }
  else { ?>
    <li>
      <a href="?module=obat"><i class="fa fa-folder"></i> Data Obat </a>
      </li>
  <?php
  }

  if ($_GET["module"]=="obat_masuk" || $_GET["module"]=="form_obat_masuk") { ?>
    <li class="active">
      <a href="?module=obat_masuk"><i class="fa fa-clone"></i> Data Obat Masuk </a>
      </li>
  <?php
  }
  else { ?>
    <li>
      <a href="?module=obat_masuk"><i class="fa fa-clone"></i> Data Obat Masuk </a>
      </li>
  <?php
  }

	if ($_GET["module"]=="lap_stok") { ?>
		<li class="active treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li class="active"><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok Obat </a></li>
        		<li><a href="?module=lap_obat_masuk"><i class="fa fa-circle-o"></i> Obat Masuk </a></li>
      		</ul>
    	</li>
    <?php
	}
	elseif ($_GET["module"]=="lap_obat_masuk") { ?>
		<li class="active treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok Obat </a></li>
        		<li class="active"><a href="?module=lap_obat_masuk"><i class="fa fa-circle-o"></i> Obat Masuk </a></li>
      		</ul>
    	</li>
    <?php
	}
	else { ?>
		<li class="treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok Obat </a></li>
        		<li><a href="?module=lap_obat_masuk"><i class="fa fa-circle-o"></i> Obat Masuk </a></li>
      		</ul>
    	</li>
    <?php
	}

	if ($_GET["module"]=="user" || $_GET["module"]=="form_user") { ?>
		<li class="active">
			<a href="?module=user"><i class="fa fa-user"></i> Manajemen User</a>
	  	</li>
	<?php
	}
	else { ?>
		<li>
			<a href="?module=user"><i class="fa fa-user"></i> Manajemen User</a>
	  	</li>
	<?php
	}

	if ($_GET["module"]=="password") { ?>
		<li class="active">
			<a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
		</li>
	<?php
	}
	else { ?>
		<li>
			<a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
		</li>
	<?php
	}
	?>
	</ul>
<?php
}
elseif ($_SESSION['hak_akses']=='Manajer') { ?>
	<!-- sidebar menu start -->
    <ul class="sidebar-menu">
        <li class="header">MAIN MENU</li>

	<?php 
	if ($_GET["module"]=="beranda") { ?>
		<li class="active">
			<a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
	  	</li>
	<?php
	}
	else { ?>
		<li>
			<a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
	  	</li>
	<?php
	}

  if ($_GET["module"]=="lap_stok") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li class="active"><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok Obat </a></li>
            <li><a href="?module=lap_obat_masuk"><i class="fa fa-circle-o"></i> Obat Masuk </a></li>
          </ul>
      </li>
    <?php
  }
  elseif ($_GET["module"]=="lap_obat_masuk") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok Obat </a></li>
            <li class="active"><a href="?module=lap_obat_masuk"><i class="fa fa-circle-o"></i> Obat Masuk </a></li>
          </ul>
      </li>
    <?php
  }
  else { ?>
    <li class="treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok Obat </a></li>
            <li><a href="?module=lap_obat_masuk"><i class="fa fa-circle-o"></i> Obat Masuk </a></li>
          </ul>
      </li>
    <?php
  }

	if ($_GET["module"]=="password") { ?>
		<li class="active">
			<a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
		</li>
	<?php
	}
	else { ?>
		<li>
			<a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
		</li>
	<?php
	}
	?>
	</ul>
<?php
}
if ($_SESSION['hak_akses']=='Gudang') { ?>
	<!-- sidebar menu start -->
    <ul class="sidebar-menu">
        <li class="header">MAIN MENU</li>

	<?php 
  if ($_GET["module"]=="beranda") { ?>
    <li class="active">
      <a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
      </li>
  <?php
  }
  else { ?>
    <li>
      <a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
      </li>
  <?php
  }

  if ($_GET["module"]=="obat" || $_GET["module"]=="form_obat") { ?>
    <li class="active">
      <a href="?module=obat"><i class="fa fa-folder"></i> Data Obat </a>
      </li>
  <?php
  }
  else { ?>
    <li>
      <a href="?module=obat"><i class="fa fa-folder"></i> Data Obat </a>
      </li>
  <?php
  }

  if ($_GET["module"]=="obat_masuk" || $_GET["module"]=="form_obat_masuk") { ?>
    <li class="active">
      <a href="?module=obat_masuk"><i class="fa fa-clone"></i> Data Obat Masuk </a>
      </li>
  <?php
  }
  else { ?>
    <li>
      <a href="?module=obat_masuk"><i class="fa fa-clone"></i> Data Obat Masuk </a>
      </li>
  <?php
  }

  if ($_GET["module"]=="lap_stok") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li class="active"><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok Obat </a></li>
            <li><a href="?module=lap_obat_masuk"><i class="fa fa-circle-o"></i> Obat Masuk </a></li>
          </ul>
      </li>
    <?php
  }
  elseif ($_GET["module"]=="lap_obat_masuk") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok Obat </a></li>
            <li class="active"><a href="?module=lap_obat_masuk"><i class="fa fa-circle-o"></i> Obat Masuk </a></li>
          </ul>
      </li>
    <?php
  }
  else { ?>
    <li class="treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok Obat </a></li>
            <li><a href="?module=lap_obat_masuk"><i class="fa fa-circle-o"></i> Obat Masuk </a></li>
          </ul>
      </li>
    <?php
  }

	if ($_GET["module"]=="password") { ?>
		<li class="active">
			<a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
		</li>
	<?php
	}
	else { ?>
		<li>
			<a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
		</li>
	<?php
	}
	?>
	</ul>
<?php
}
?>