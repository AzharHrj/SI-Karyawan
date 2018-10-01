<?php
session_start();
include ("koneksi.php");

$idkar   = $_GET['id_karyawan'];
$sql     = "SELECT * FROM tb_daftar WHERE id_karyawan = '".$idkar."'";
$query   = mysqli_query($koneksi, $sql);
while ($row = mysqli_fetch_row($query)) {
  $email     = $row[1];
  $password  = $row[2];
  $passwords = $row[3];
  $hakakses  = $row[4];
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
            <h1 class="page-header">Edit Data User</h1>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h1 class="panel-title">Form User</h1>
              </div>
              <div class="panel-body">

                <form class="form" action="prosedituser.php" method="post">
                  <div class="form-group">
                    <label>ID Karyawan</label>
                    <input class="form-control" type="hidden" name="inpid" value=<?php echo $_GET['id_karyawan']; ?>> <?php echo $_GET['id_karyawan']; ?>
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" type="email" name="inpemail" value=<?php echo "\"$email\""; ?>>
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input class="form-control" type="text" name="inppass" value=<?php echo "\"$password\""; ?>>
                  </div>
                  <div class="form-group">
                    <label>Ulangi Password</label>
                    <input class="form-control" type="text" name="inppasss" value=<?php echo "\"$passwords\""; ?>>
                  </div>
                  <div class="form-group">
                    <label>Posisi</label>
                    <select class="form-control" name="inphakses">
                      <option>- Posisi -</option>
                      <option>Karyawan</option>
                      <option></option>
                    </select>
                  </div>
                  <div class="form-group">
                    <a href="data_user.php">
                      <button type="button" name="button" class="btn btn-danger">Batal</button>
                    </a>

                    <input class="btn btn-success" type="submit" name="ubahdatauser" value="Ubah">

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
