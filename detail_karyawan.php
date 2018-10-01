<?php
session_start();
include ("koneksi.php");


$idkar   = $_GET['id_karyawan'];
$sql     = "SELECT * FROM tb_karyawan WHERE id_karyawan = '$idkar'";
$detail  = mysqli_query($koneksi, $sql);
$query   = mysqli_fetch_array($detail);

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin</title>

    <!-- boootstrap -->
    <link href="vendor/css/bootstrap/bootstrap.min.css" rel="stylesheet">

    <!-- icon dan fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- tema css -->
    <link href="css/tampilanadmin.css" rel="stylesheet">

  </head>
  <body>
    <!-- Menu -->
    <div id="wrapper">

      <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">navigation</span> Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand">Sistem Informasi Data dan Absensi Karyawan Berbasis Web</a>
          </div>

          <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user"></i> Admin
              </a>
              <ul class="dropdown-menu dropdown-user">
                <li>
                  <form class="" action="keluar_admin.php" method="post">
                    <button class="btn btn-default" type="submit" name="keluar"><i class="fa fa-sign-out"></i> Keluar</button>
                  </form>
                </li>
              </ul>
            </li>
          </ul>

          <!-- menu samping -->
          <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
              <ul class="nav" id="side-menu">
                <li>
                  <a href="beranda_admin.php">
                    <i class="fa fa-dashboard"></i> Beranda
                  </a>
                </li>
                <li>
                  <a href="data_karyawan.php">
                    <i class="fa fa-table"></i> Data Karyawan
                  </a>
                </li>
                <li>
                  <a href="data_user.php">
                    <i class="fa fa-users"></i> Data User
                  </a>
                </li>
                <li>
                  <a href="data_jabatan.php">
                    <i class="fa fa-briefcase"></i> Data Jabatan
                  </a>
                </li>
                <li>
                  <a href="data_absen.php">
                    <i class="fa fa-book"></i> Data Absen
                  </a>
                </li>
                <li>
                  <a href="absen_umum.php">
                    <i class="fa fa-columns"></i> Absen Karyawan
                  </a>
                </li>
              </ul>
            </div>
          </div>

      </nav>

      <div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h1 class="page-header">Profil Karyawan</h1>
          </div>
        </div>
        <div class="row">
          <div class="panel panel-default">
            <div class="panel-body">

              <div class="col-lg-6">
                <form role="form">
                  <div class="form-group">
                    <label>ID KARYAWAN</label>
                    &nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp; : <?php echo $query['id_karyawan'] ?>
                  </div>
                  <div class="form-group">
                    <label>NAMA LENGKAP</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp; : <?php echo $query['nama'] ?>
                  </div>
                  <div class="form-group">
                    <label>TEMPAT / TANGGAL LAHIR</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $query['tmp_tgl_lhr'] ?>
                  </div>
                  <div class="form-group">
                    <label>JENIS KELAMIN</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp; : <?php echo $query['jenkel'] ?>
                  </div>
                  <div class="form-group">
                    <label>GOLONGAN DARAH</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp; : <?php echo $query['gol_dar'] ?>
                  </div>
                  <div class="form-group">
                    <label>AGAMA</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp; : <?php echo $query['agama'] ?>
                  </div>
                  <div class="form-group">
                    <label>ALAMAT</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;: <?php echo $query['alamat'] ?>
                  </div>
                  <div class="form-group">
                    <label>NOMOR TELEPON</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;: <?php echo $query['no_tel'] ?>
                  </div>
                  <div class="form-group">
                    <label>PENDIDIKAN TERAKHIR</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp; : <?php echo $query['pen_ter'] ?>
                  </div>
                  <div class="form-group">
                    <label>TAHUN LULUS</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;: <?php echo $query['tah_lus'] ?>
                  </div>
                  <div class="form-group">
                    <label>JABATAN</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?php echo $query['jabatan'] ?>
                  </div>
                </form>
              </div>
              <div class="col-lg-6">
                <form role="form">
                  <div class="form-group">
                    <img src=<?php echo "images/".$query['foto']."" ?> width="250" height="260">
                  </div>
                  <div class="form-group">
                    <a href="data_karyawan.php">
                      <button class="btn btn-success" type="button" name="button">Kembali</button>
                    </a>
                    <a href="edit_karyawan.php?id_karyawan=<?php echo $query['id_karyawan'] ?>">
                      <button class="btn btn-primary" type="button" name="button">Edit</button>
                    </a>
                  </div>
                </form>
              </div>

            </div>
          </div>
        </div>
      </div>

    </div>

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
