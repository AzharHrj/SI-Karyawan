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
    <title>Absen Karyawan</title>

    <!-- boootstrap -->
    <link href="vendor/css/bootstrap/bootstrap.min.css" rel="stylesheet">

    <!-- icon dan fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- tema css -->
    <link href="css/tampilan.css" rel="stylesheet">

  </head>
  <body onload="setInterval('displayServerTime()', 1000);">
    <!-- Menu -->
    <nav class="navbar navbar-default navbar-fixed-top navbar-custom">
      <div class="container">
        <div class="navbar-header page-scroll">
          <a class="navbar-brand">Absen Karyawan</a>
        </div>
      </div>
    </nav>

    <!-- Section -->
    <section class="bagian1">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h1 class="panel-title">Masukkan Keterangan Anda</h1>
              </div>
              <div class="panel-body">

                <form class="form" action="prostamabsen.php" enctype="multipart/form-data" method="post">
                  <div class="form-group">
                    <label>ID Karyawan</label>
                    <input class="form-control" type="text" name="inpidkar">
                  </div>
                  <div class="form-group">
                    <label>Jika Anda Sakit Silahkan Unggah Surat Keterangan Sakit Dalam Bentuk Gambar !</label>
                    <br>
                    <input type="checkbox" name="inpgambar2" value="true">
                    <input type="file" name="inpgambar" value="">
                  </div>
                  <div class="form-group">
                    <label>Jika Anda Izin Silahkan Masukan Alasan Anda ?</label>
                    <select class="form-control" name="inpket">
                      <option>- Keterangan -</option>
                      <option>Sakit</option>
                      <option>Izin</option>
                      <option>Tidak Hadir</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <textarea class="form-control" name="inpalasan" rows="8" cols="80"></textarea>
                  </div>
                  <div class="form-group">
                    <a href="absen_umum.php">
                      <button type="button" name="button" class="btn btn-danger">Batal</button>
                    </a>

                    <input class="btn btn-primary" type="reset" name="" value="Kosongkan">
                    <input class="btn btn-success" type="submit" name="keterangan" value="Proses">

                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>

      </div>
    </section>

    <!-- Footer -->
    <footer class="text-center">
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
