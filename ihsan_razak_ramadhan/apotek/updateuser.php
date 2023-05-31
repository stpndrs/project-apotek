<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="assets/css/sweetalert2.min.css">
<script src="assets/js/sweetalert2.all.min.js"></script>

<?php
session_start();
if(!isset($_SESSION['email'])){
header('Location: index.php');
}

include 'config.php';

$id = $_GET['id'];
$query = mysqli_query($connect, "SELECT * FROM vw_user WHERE id_user = $id");
$data = mysqli_fetch_assoc($query);

if (isset($_POST['update'])) {
    $sandi = $_POST['txtsandi'];
    $konfir = $_POST['txtkonfir'];
    $akses = $_POST['txtlevel'];

    if($sandi !== $konfir){
?>

    <script type="text/javascript">
      $(document).ready(function() {
        swal("Error", "Gagal, Sandi Tidak Sama", "warning");
      });
    </script>

<?php
    } else {
      $sandi = md5($sandi);
      $query = mysqli_query($connect, "UPDATE tb_user SET sandi = '$sandi', id_akses = $akses WHERE id_user = $id");

    if ($query) {
?>

      <script type="text/javascript">
      $(document).ready(function() {
        swal({
          title: "Berhasil",
          text: "Data berhasil diubah",
          type: 'success',
          confirmButtonColor: '#36c6d3',
          cancelButtonColor: '#d33',
          confirmButtonText: 'OK',
        }).then(function(result) {
          if (result.value) {
            window.location.href = 'user.php';
          }ni
        });
        return;
      });
    </script>

<?php
    } else {
?>

      <script type="text/javascript">
        $(document).ready(function() {
          swal("Error", "Gagal Mengubah Stok Obat", "warning");
        });
      </script>
  
<?php
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
                ><span class="pcoded-mtext">Master user</span></a
              >
              <ul class="pcoded-submenu">
                <li><a href="jenisuser.php">Jenis user</a></li>
                <li><a href="kategoriuser.php">Kategori user</a></li>
                <li><a href="lokasiuser.php">Lokasi user</a></li>
                <li><a href="stokobat.php">Stok Obat</a></li>
                <li><a href="Obat.php">Data Obat</a></li>
              </ul>
            </li>
            <li class="nav-item pcoded-hasmenu">
            <a href="#!" class="nav-link">
              <span class="pcoded-micon"><i class="feather icon-file-text"></i></span>
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
                ><span class="pcoded-mtext">Penjualan user</span></a
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
            <li class="nav-item">
              <a href="karyawan.php" class="nav-link"
                ><span class="pcoded-micon"
                  ><i class="feather icon-user"></i></span
                ><span class="pcoded-mtext">Karyawan</span></a
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
                placeholder="Ketikkan Nama user"
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
                    <a href="#!">Update user</a>
                  </li>
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
                <h5>Update user</h5>
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
                        <a href="user.php" class="btn btn-primary">Tabel</a>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <form action="" method="POST">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="txtemail">Email</label>
                                <input type="text" class="form-control" value="<?php echo $data['email'] ?>" id="txtemail" name="txtemail" autocomplete="off" disabled><br>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label for="txtnama">Nama</label>
                                <input type="text" class="form-control" value="<?php echo $data['nama_karyawan'] ?>" id="txtnama" name="txtnama" autocomplete="off" disabled><br>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <label for="txtsandi">Sandi</label>
                                <input type="password" class="form-control" value="<?php echo $data['sandi'] ?>" id="txtsandi" name="txtsandi" autocomplete="off" required><br>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <label for="txtkonfir">Konfirmasi Ulang Sandi</label>
                                <input type="password" class="form-control" value="<?php echo $data['sandi'] ?>" id="txtkonfir" name="txtkonfir" autocomplete="off" required><br>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <label for="txtlevel">Akses</label>
                                <select type="text" class="form-control" id="txtlevel" name="txtlevel" autocomplete="off" required>
                                    <option value="">Pilih Akses</option>
                                    <?php
                                    $query_akses = mysqli_query($connect, "SELECT * FROM tb_aksesobat");
                                    while ($data_akses = mysqli_fetch_array($query_akses)) {
                                    $selected = ($data['id_akses'] == $data_akses['id_akses']) ? 'selected' : '';
                                    echo '<option value="' . $data_akses['id_akses'] . '" ' . $selected . '>' . $data_akses['akses_obat'] . '</option>';
                                    }
                                    ?>
                                </select><br>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top: 20px;">
                                <input type="submit" value="Simpan" class="btn btn-primary" name="update">
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
