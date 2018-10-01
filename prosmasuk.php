<?php
@session_start();
include ("koneksi.php");

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title></title>

    <!-- boootstrap -->
    <link href="vendor/css/bootstrap/bootstrap.min.css" rel="stylesheet">

    <!-- icon dan fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- tema css -->
    <link href="css/tampilan.css" rel="stylesheet">

  </head>
  <body>

		<?php
    if (isset($_POST['masuk'])) {
      $idkaryawan = $_POST['inpidkaryawan'];
    	$password   = $_POST['inppassword'];

    	$sql   = "SELECT * FROM tb_daftar WHERE id_karyawan = '$idkaryawan' AND u_pass = '$password'";
    	$query = mysqli_query($koneksi, $sql);
    	$hasil = mysqli_num_rows($query);
    	$data  = mysqli_fetch_array($query);


  		if ($hasil == 1) {
        $_SESSION['inpidkaryawan'] = $_POST['inpidkaryawan'];
    		$_SESSION['u_pass']        = $hasil['u_pass'];
    		$_SESSION['hak_akses']     = $hasil['hak_akses'];

  			if ($data['hak_akses'] == "Admin") {
  				header("location: beranda_admin.php");
  			}
  			else if ($data['hak_akses'] == "Karyawan") {
  				header("location: beranda_user.php");
  			}
  			else if ($data['hak_akses'] == "") {
  				echo "<div class='alert alert-warning alert-dismissable'>
  				<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
  				Maaf, Saat Ini Akun Anda Belum Dikonfirmasi.
  				</div>";
  			}
  		} else {
  			echo "<div class='alert alert-danger alert-dismissable'>
  			<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
  			Username atau Password Anda Salah Silahkan Coba Lagi.
  			</div>";
  		}
    }

		 ?>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!--include-->
    <script src="vendor/css/js/bootstrap.min.js"></script>

  </body>
</html>
