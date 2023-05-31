<?php
session_start();
if (!isset($_SESSION['email'])) {
  header('Location: index.php');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <title>Apotek Ihsan</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <meta name="author" content="Phoenixcoded" />
  <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon" />

  <link rel="stylesheet" href="assets/css/style.css" />

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
            <img class="img-radius" src="assets/images/user/avatar-2.jpg" alt="User-Profile-Image" />
            <div class="user-details">
              <div id="more-details">
                Admin <i class="fa fa-caret-down"></i>
              </div>
            </div>
          </div>
          <div class="collapse" id="nav-user-link">
            <ul class="list-unstyled">
              <li class="list-group-item">
                <a href="user-profile.html"><i class="feather icon-user m-r-5"></i>Profil</a>
              </li>
              <li class="list-group-item">
                <a href="logout.php"><i class="feather icon-log-out m-r-5"></i>keluar</a>
              </li>
            </ul>
          </div>
        </div>

        <ul class="nav pcoded-inner-navbar">
          <li class="nav-item">
            <a href="index.php" class="nav-link"><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Beranda</span></a>
          </li>
          <li class="nav-item pcoded-menu-caption">
            <label>Data Master</label>
          </li>
          <li class="nav-item pcoded-hasmenu">
            <a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Master Obat</span></a>
            <ul class="pcoded-submenu">
              <li><a href="jenisobat.php">Jenis Obat</a></li>
              <li><a href="kategoriobat.php">Kategori Obat</a></li>
              <li><a href="lokasiobat.php">Lokasi Obat</a></li>
              <li><a href="stokobat.php">Stok Obat</a></li>
              <li><a href="obat.php">Data Obat</a></li>
            </ul>
          </li>
          <li class="nav-item pcoded-hasmenu">
            <a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Master Karyawan</span></a>
            <ul class="pcoded-submenu">
              <li><a href="karyawan.php">Data Karyawan</a></li>
            </ul>
          </li>
          <li class="nav-item pcoded-menu-caption">
            <label>Transaksi</label>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link"><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Penjualan Obat</span></a>
          </li>
          <li class="nav-item pcoded-menu-caption">
            <label>Sistem</label>
          </li>
          <li class="nav-item">
            <a href="user.php" class="nav-link"><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">User</span></a>
          </li>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">
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
          <a href="#!" class="pop-search"><i class="feather icon-search"></i></a>
          <div class="search-bar">
            <input type="text" class="form-control border-0 shadow-none" placeholder="Ketikkan Nama Obat">
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
                  <a href="#!">Data Analisis</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- [ breadcrumb ] end -->
      <!-- [ Main Content ] start -->
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-12">
          <div class="card">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-8">
                  <h4 class="text-c-yellow">Rp.300.000</h4>
                  <h6 class="text-muted m-b-0">Total Transaksi</h6>
                </div>
                <div class="col-4 text-right">
                  <i class="feather icon-calendar f-28"></i>
                </div>
              </div>
            </div>
            <div class="card-footer bg-c-yellow">
              <div class="row align-items-center">
                <div class="col-9">
                  <p class="text-white m-b-0">Detail</p>
                </div>
                <div class="col-3 text-right">
                  <i class="feather icon-trending-up text-white f-16"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
          <div class="card">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-8">
                  <h4 class="text-c-green">290+</h4>
                  <h6 class="text-muted m-b-0">Stok Obat</h6>
                </div>
                <div class="col-4 text-right">
                  <i class="feather icon-bar-chart-2 f-28"></i>
                </div>
              </div>
            </div>
            <div class="card-footer bg-c-green">
              <div class="row align-items-center">
                <div class="col-9">
                  <p class="text-white m-b-0">Detail</p>
                </div>
                <div class="col-3 text-right">
                  <i class="feather icon-trending-up text-white f-16"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
          <div class="card">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-8">
                  <h4 class="text-c-red">145</h4>
                  <h6 class="text-muted m-b-0">Jenis Obat</h6>
                </div>
                <div class="col-4 text-right">
                  <i class="feather icon-file-text f-28"></i>
                </div>
              </div>
            </div>
            <div class="card-footer bg-c-red">
              <div class="row align-items-center">
                <div class="col-9">
                  <p class="text-white m-b-0">Detail</p>
                </div>
                <div class="col-3 text-right">
                  <i class="feather icon-trending-down text-white f-16"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
          <div class="card">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-8">
                  <h4 class="text-c-blue">500</h4>
                  <h6 class="text-muted m-b-0">Kategori</h6>
                </div>
                <div class="col-4 text-right">
                  <i class="feather icon-thumbs-down f-28"></i>
                </div>
              </div>
            </div>
            <div class="card-footer bg-c-blue">
              <div class="row align-items-center">
                <div class="col-9">
                  <p class="text-white m-b-0">% change</p>
                </div>
                <div class="col-3 text-right">
                  <i class="feather icon-trending-down text-white f-16"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
          <!-- support-section start -->
          <div class="row">
            <div class="col-sm-6">
              <div class="card support-bar overflow-hidden">
                <div class="card-body pb-0">
                  <h2 class="m-0">350</h2>
                  <span class="text-c-blue">Support Requests</span>
                  <p class="mb-3 mt-3">
                    Total number of support requests that come in.
                  </p>
                </div>
                <div id="support-chart"></div>
                <div class="card-footer bg-primary text-white">
                  <div class="row text-center">
                    <div class="col">
                      <h4 class="m-0 text-white">10</h4>
                      <span>Open</span>
                    </div>
                    <div class="col">
                      <h4 class="m-0 text-white">5</h4>
                      <span>Running</span>
                    </div>
                    <div class="col">
                      <h4 class="m-0 text-white">3</h4>
                      <span>Solved</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="card support-bar overflow-hidden">
                <div class="card-body pb-0">
                  <h2 class="m-0">350</h2>
                  <span class="text-c-green">Support Requests</span>
                  <p class="mb-3 mt-3">
                    Total number of support requests that come in.
                  </p>
                </div>
                <div id="support-chart1"></div>
                <div class="card-footer bg-success text-white">
                  <div class="row text-center">
                    <div class="col">
                      <h4 class="m-0 text-white">10</h4>
                      <span>Open</span>
                    </div>
                    <div class="col">
                      <h4 class="m-0 text-white">5</h4>
                      <span>Running</span>
                    </div>
                    <div class="col">
                      <h4 class="m-0 text-white">3</h4>
                      <span>Solved</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- support-section end -->
        </div>
        <div class="col-lg-5 col-md-12">
          <!-- page statustic card start -->
          <div class="row">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">

            </div>
            <div class="col-sm-6">

            </div>
          </div>
          <!-- page statustic card end -->
        </div>
        <!-- prject ,team member start -->
        <div class="col-xl-6 col-md-12">
          <div class="card latest-update-card">
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
</body>

</html>