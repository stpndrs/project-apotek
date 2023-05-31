<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="assets/css/sweetalert2.min.css">
<script src="assets/js/sweetalert2.all.min.js"></script>

<?php
session_start();

if(isset($_SESSION['email'])){
	header('Location: menuutama.php');
	}
include 'config.php';

if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $sandi = md5($_POST['sandi']);

    $query = mysqli_query($connect,"SELECT * FROM tb_user WHERE email='$email'");

    if(mysqli_num_rows($query) >0){
		$data = mysqli_fetch_assoc($query);
		if($sandi == $data['sandi']){
			$_SESSION['email']=$email;
			$_SESSION['sandi']=$sandi;
			header('Location: menuutama.php');
			
		}else {
?>

	<script type="text/javascript">
    $(document).ready(function() {
        swal("Error", "Gagal, Sandi Salah", "warning");
    });
    </script>

<?php
		}
    
    }else {
?>

	<script type="text/javascript">
    $(document).ready(function() {
    	swal("Error", "Email Tidak ditemukan", "warning");
    });
    </script>

<?php
    }
}

?>

<!DOCTYPE html>
<html>

<head>
	<title>Apotek Ihsan</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="" />
	<meta name="keywords" content="">
	<meta name="author" content="Phoenixcoded" />

	<link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="assets/css/sweetalert2.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
</head>

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
	<div class="auth-content">
		<div class="card">
			<form method='POST'>
			<div class="row align-items-center text-center">
				<div class="col-md-12">
					<div class="card-body">
						<h4 class="mb-3 f-w-400">Selamat Datang</h4>
						<div class="form-group mb-3">
							<label class="floating-label" for="Email">Email</label>
							<input type="email" class="form-control" id="Email" name='email' placeholder="" Required>
						</div>
						<div class="form-group mb-4">
							<label class="floating-label" for="sandi">Sandi</label>
							<input type="password" class="form-control" id="sandi" name='sandi' placeholder="" Required>
						</div>
						<button type='submit' name='submit' class="btn btn-block btn-primary mb-4">Masuk</button>
						<p class="mb-2 text-muted">Lupa Sandi?<a href="index.php" class="f-w-400"> Reset</a></p>
					</div>
				</div>
			</div>
			</form>
		</div>
	</div>
</div>
<!-- [ auth-signin ] end -->

<!-- Required Js -->
<script src="assets/js/vendor-all.min.js"></script>
<script src="assets/js/plugins/bootstrap.min.js"></script>
<script src="assets/js/ripple.js"></script>
<script src="assets/js/pcoded.min.js"></script>
<script src="assets/js/sweetalert2.all.min.js"></script>


</body>

</html>
