<?php
session_start();
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
    <title>Daftar</title>

    <!-- boootstrap -->
    <link href="vendor/css/bootstrap/bootstrap.min.css" rel="stylesheet">

    <!-- icon dan fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- tema css -->
    <link href="css/tampilan.css" rel="stylesheet">

  </head>
  <body>
    <!-- Menu -->
    <nav class="navbar navbar-default navbar-fixed-top navbar-custom">
      <div class="container">
        <div class="navbar-header page-scroll">
          <a class="navbar-brand">Sistem Informasi Karyawan</a>
        </div>
      </div>
    </nav>

    <!-- Section -->
    <section class="bagian3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h1 class="panel-title text-center">Daftar</h1>
              </div>
              <div class="panel-body">
                <form class="form" action="" method="post">
                  <div class="form-group input-group">
                    <span class="input-group-addon"><i class="fa fa-child"></i></span>
                    <input class="form-control" type="text" name="inpid" placeholder="Masukkan ID Anda">
                  </div>
                  <div class="form-group input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                    <input class="form-control" type="email" name="inpemail" value="" placeholder="Email">
                  </div>
                  <div class="form-group input-group">
                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                    <input class="form-control" type="password" name="inppass" value="" placeholder="Password">
                  </div>
                  <div class="form-group input-group">
                    <span class="input-group-addon"><i class="fa fa-repeat "></i></span>
                    <input class="form-control" type="password" name="inppasss" value="" placeholder="Ulangi Password">
                  </div>
                  <div class="form-group">
                    <a href="index.php">
                      <button type="button" name="button" class="btn btn-danger">Batal</button>
                    </a>

                    <input class="btn btn-success" type="submit" name="daftar" value="Daftar">
                  </div>
                  <div class="">
                    <p><a href="masuk.php">Masuk,</a> bila sudah mempunyai akun !</p>
                  </div>
                  <?php
                  if (@$_POST['daftar']) {
                    include ("prostamuser.php");
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
