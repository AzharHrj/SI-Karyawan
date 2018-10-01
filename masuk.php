<?php
@session_start();
include ("koneksi.php");
if (@$_SESSION['inpusername']) {
	if (@$_SESSION['hak_akses'] == "Admin") {
    header("location: beranda_admin.php");
  } else if (@$_SESSION['hak_akses'] == "Karyawan") {
    header("location: beranda_user.php");
  } else if (@$_SESSION['hak_akses'] == "") {
    header("location: masuk.php");
  }
}
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Masuk</title>

    <!-- boootstrap -->
    <link href="vendor/css/bootstrap/bootstrap.min.css" rel="stylesheet">

    <!-- icon dan fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- tema css -->
    <link href="css/tampilan.css" rel="stylesheet">

  </head>
  <body>
    <!-- Menu -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
      <div class="container">
        <div class="navbar-header page-scroll">
          <a class="navbar-brand">Sistem Informasi Karyawan</a>
        </div>
      </div>
    </nav>

    <!-- Header -->
    <header>

    </header>

    <!-- form login-->
    <section class="bagian3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h1 class="panel-title text-center">Masuk</h1>
              </div>
              <div class="panel-body">
                <form class="form" method="post">
                  <div class="form-group input-group">
                    <span class="input-group-addon"><i class="fa fa-child"></i></span>
                    <input class="form-control" type="text" name="inpidkaryawan" placeholder="ID Karyawan">
                  </div>
                  <div class="form-group input-group">
                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                    <input class="form-control" type="password" name="inppassword" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <a href="index.php">
                      <button class="btn btn-danger" type="button" name="button">Batal</button>
                    </a>

                    <input class="btn btn-success" type="submit" name="masuk" value="Masuk">
                  </div>
                  <div class="">
                    <p><a href="daftar_user.php">Daftar,</a> bila belum mempunyai akun !</p>
                  </div>
                  <?php
                  if (@$_POST['masuk']) {
                    include ("prosmasuk.php");
                  }
                   ?>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="text-center">
      <div class="footer-above">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <h1>kontak</h1>
              <hr class="star-primary">

            </div>
          </div>

          <div class="row">
            <div class="col-md-4 col-md-offset-2">
              <h1>Lokasi</h1>
              <p><strong>Indonesia</strong> <br> Sulawesi Selatan, Makassar</p>
            </div>
            <div class="col-md-4">
              <h1>Tentang</h1>
              <p>Sistem Informasi Data dan Absensi Karyawan Berbasis Web</p>
            </div>


          </div>
        </div>
      </div>

      <div class="footer-below">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <em>Copyright &copy; TI V/A - Kelompok 12 - 2017</em>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!--include-->
    <script src="vendor/css/js/bootstrap.min.js"></script>

  </body>
</html>
