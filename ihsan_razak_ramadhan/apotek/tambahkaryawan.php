<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="assets/css/sweetalert2.min.css">
<script src="assets/js/sweetalert2.all.min.js"></script>

<?php
session_start();
if(!isset($_SESSION['email'])){
header('Location: index.php');
}

include 'config.php';

if(isset($_POST['submit'])) {
    $nik = $_POST['txtnik'];
    $nama = $_POST['txtnama'];
    $tmpt = $_POST['txttmpt'];
    $tgl = $_POST['txttgl'];
    $alamat = $_POST['txtalamat'];
    $notelp = $_POST['txtnotelp'];
    $query = mysqli_query($connect,"SELECT * FROM tb_karyawan WHERE nik_karyawan='$nik'");
    if(mysqli_num_rows($query)>0){
?>
    <script type="text/javascript">
      $(document).ready(function() {
        swal("Error", "Data sudah ada", "warning");
      });
    </script>
<?php
    } else {
            $query = mysqli_query($connect, "INSERT INTO tb_karyawan (nik_karyawan, nama_karyawan, tmpt_lahir, tgl_lahir, alamat, no_telp) 
        VALUES ('$nik','$nama','$tmpt','$tgl','$alamat','$notelp') ");
    
    if($query){
?>  
    <script type="text/javascript">
      $(document).ready(function() {
        swal({
          title: "Berhasil",
          text: "Data berhasil disimpan",
          type: 'success',
          confirmButtonColor: '#36c6d3',
          cancelButtonColor: '#d33',
          confirmButtonText: 'OK',
        }).then(function(result) {
          if (result.value) {
            window.location.href = 'tambahkaryawan.php';
          }
        });
        return;
      });
    </script>
    <?php
    }else {
        echo '<script>alert("Data Tidak Dapat Disimpan")</script>';
    }
    }
}
    

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Apotek Ihsan</title>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui"
    />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="Phoenixcoded" />
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon" />

    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/sweetalert2.min.css">
  </head>
  <body class="">

    <div class="loader-bg">
      <div class="loader-track">
        <div class="loader-fill"></div>
      </div>
    </div>
    <nav class="pcoded-navbar menu-light">
      <div class="navbar-wrapper">
        <div class="navbar-content scroll-div">
          <div class="">
            <div class="main-menu-header">
              <img
                class="img-radius"
                src="assets/images/user/avatar-2.jpg"
                alt="User-Profile-Image"
              />
              <div class="user-details">
                <div id="more-details">
                  Admin <i class="fa fa-caret-down"></i>
                </div>
              </div>
            </div>
            <div class="collapse" id="nav-user-link">
              <ul class="list-unstyled">
                <li class="list-group-item">
                  <a href="user-profile.html"
                    ><i class="feather icon-user m-r-5"></i>Profil</a
                  >
                </li>
                <li class="list-group-item">
                  <a href="logout.php"
                    ><i class="feather icon-log-out m-r-5"></i>keluar</a
                  >
                </li>
              </ul>
            </div>
          </div>

          <ul class="nav pcoded-inner-navbar">
            <li class="nav-item">
              <a href="index.php" class="nav-link"
                ><span class="pcoded-micon"
                  ><i class="feather icon-home"></i></span
                ><span class="pcoded-mtext">Beranda</span></a
              >
            </li>
            <li class="nav-item pcoded-menu-caption">
              <label>Data Master</label>
            </li>
            <li class="nav-item pcoded-hasmenu">
              <a href="#!" class="nav-link"
                ><span class="pcoded-micon"
                  ><i class="feather icon-file-text"></i></span
                ><span class="pcoded-mtext">Master Obat</span></a
              >
              <ul class="pcoded-submenu">
                <li><a href="jenisobat.php">Jenis Obat</a></li>
                <li><a href="kategoriobat.php">Kategori Obat</a></li>
                <li><a href="lokasiobat.php">Lokasi Obat</a></li>
                <li><a href="stokobat.php">Stok Obat</a></li>
                <li><a href="obat.php">Data Obat</a></li>
              </ul>
            </li>
            <li class="nav-item pcoded-hasmenu">
              <a href="#!" class="nav-link">
                <span class="pcoded-micon"
                  ><i class="feather icon-file-text"></i></span>
                <span class="pcoded-mtext">Master Karyawan</span></a>
              <ul class="pcoded-submenu">
                <li><a href="karyawan.php">Data Karyawan</a></li>
              </ul>
            </li>
            <li class="nav-item pcoded-menu-caption">
              <label>Transaksi</label>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link"
                ><span class="pcoded-micon"
                  ><i class="feather icon-box"></i></span
                ><span class="pcoded-mtext">Penjualan Obat</span></a
              >
            </li>
            <li class="nav-item pcoded-menu-caption">
              <label>Sistem</label>
            </li>
            <li class="nav-item">
              <a href="user.php" class="nav-link"
                ><span class="pcoded-micon"
                  ><i class="feather icon-user"></i></span
                ><span class="pcoded-mtext">User</span></a
              >
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <header
      class="navbar pcoded-header navbar-expand-lg navbar-light header-blue"
    >
      <div class="m-header">
        <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
        <a href="#!" class="b-brand">

        </a>
        <a href="#!" class="mob-toggler">
          <i class="feather icon-more-vertical"></i>
        </a>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a href="#!" class="pop-search"
              ><i class="feather icon-search"></i
            ></a>
            <div class="search-bar">
              <input
                type="text"
                class="form-control border-0 shadow-none"
                placeholder="Ketikkan Nama Obat"
              />
              <button type="button" class="close" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </li>
        </ul>
      </div>
    </header>
    <!-- [ Header ] end -->

    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
      <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
          <div class="page-block">
            <div class="row align-items-center">
              <div class="col-md-12">
                <div class="page-header-title">
                  <h5 class="m-b-10">Beranda</h5>
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="index.php"><i class="feather icon-home"></i></a>
                  </li>
                  <li class="breadcrumb-item">
                    <a href="#!">Tambah Karyawan</a>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card table-card">
              <div class="card-header">
                <h5>Tambah Karyawan</h5>
                <div class="card-header-right">
                  <div class="btn-group card-option">
                    <button
                      type="button"
                      class="btn dropdown-toggle"
                      data-toggle="dropdown"
                      aria-haspopup="true"
                      aria-expanded="false"
                    >
                      <i class="feather icon-more-horizontal"></i>
                    </button>
                    <ul
                      class="list-unstyled card-option dropdown-menu dropdown-menu-right"
                    >
                      <li class="dropdown-item full-card">
                        <a href="#!"
                          ><span
                            ><i class="feather icon-maximize"></i>
                            maximize</span
                          ><span style="display: none"
                            ><i class="feather icon-minimize"></i> Restore</span
                          ></a
                        >
                      </li>
                      <li class="dropdown-item minimize-card">
                        <a href="#!"
                          ><span
                            ><i class="feather icon-minus"></i> collapse</span
                          ><span style="display: none"
                            ><i class="feather icon-plus"></i> expand</span
                          ></a
                        >
                      </li>
                      <li class="dropdown-item reload-card">
                        <a href="#!"
                          ><i class="feather icon-refresh-cw"></i> reload</a
                        >
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="card-body p-0">
                <div class="row" style="margin: 20px;">
                    <div class="col-lg-12 col-md-12 col-sm-12" style="margin-bottom: 20px;">
                        <a href="karyawan.php" class="btn btn-primary">Tabel</a>
                        <a href="tambahkaryawan.php" class="btn btn-success" style="margin-left: 5px;">Tambah Data</a>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <form action="" method="POST">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <label for="txtnik">NIK</label>
                                <input type="text" class="form-control" id="txtnik" name="txtnik" autocomplete="off" required><br>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-12">
                                <label for="txtnama">Nama</label>
                                <input type="text" class="form-control" id="txtnama" name="txtnama" autocomplete="off" required><br>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="txttmpt">Tempat Lahir</label>
                                <input type="text" class="form-control" id="txttmpt" name="txttmpt" autocomplete="off" required><br>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="txttgl">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="txttgl" name="txttgl" autocomplete="off" required><br>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-12">
                                <label for="txtalamat">Alamat</label>
                                <input type="text" class="form-control" id="txtalamat" name="txtalamat" autocomplete="off" required><br>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <label for="txtnotelp">No. Telp</label>
                                <input type="text" class="form-control" id="txtnotelp" name="txtnotelp" autocomplete="off" required><br>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top: 20px;">
                                <input type="submit" value="Tambah" class="btn btn-primary" name="submit">
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
              </div>
            </div>
            </div>
        </div>
      </div>
    </div>

    <!-- Required Js -->
    <script src="assets/js/vendor-all.min.js"></script>
    <script src="assets/js/plugins/bootstrap.min.js"></script>
    <script src="assets/js/ripple.js"></script>
    <script src="assets/js/pcoded.min.js"></script>

    <!-- Apex Chart -->
    <script src="assets/js/plugins/apexcharts.min.js"></script>

    <!-- custom-chart js -->
    <script src="assets/js/pages/dashboard-main.js"></script>
    <script src="assets/js/sweetalert2.all.min.js"></script>
  </body>
</html>
