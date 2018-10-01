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
    //proses Input
    $idkar     = $_POST['inpid'];
    $email     = $_POST['inpemail'];
    $password  = $_POST['inppass'];
    $passwords = $_POST['inppasss'];

    $sql    = "SELECT * FROM tb_daftar WHERE id_karyawan = '".$idkar."'";
    $tambah = mysqli_query($koneksi, $sql);
    $row    = mysqli_fetch_row($tambah);

    if ($row) {
      echo "<div class='alert alert-danger alert-dismissable'>
      <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
      Maaf, Data Dengan ID Karyawan = ".$idkar." Sudah Terdaftar Dan Masuk Dalam Database Kami.
      </div>";
    } else {
      $query = "INSERT INTO tb_daftar (id_karyawan, email, pass, u_pass) VALUES ('$idkar','$email','$password','$passwords')";
      $masuk = mysqli_query($koneksi, $query);

      echo "<div class='alert alert-success alert-dismissable'>
      <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
      Anda Berhasil Mendaftar, Silahkan Tunggu Konfirmasi.
      </div>";
    }
		 ?>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!--include-->
    <script src="vendor/css/js/bootstrap.min.js"></script>

  </body>
</html>
