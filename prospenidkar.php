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
            <li class="">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user"></i> Admin
              </a>
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
            <h1 class="page-header">Data Karyawan</h1>
          </div>
        </div>

        <!--untuk tambah karyawan-->
        <form class="form" action="tambah_karyawan.php" method="post">
          <div class="form-group">
            <input class="btn btn-success" type="submit" name="" value="Tambah Data Karyawan">
          </div>
        </form>

        <!--untuk pencarian karyawan-->
        <div class="row">
          <div class="col-sm-3">
            <form class="form" action="prospenidkar.php" method="post">
              <div class="form-group input-group">
                <input class="form-control" type="text" name="cari" placeholder="Masukkan ID Karyawan">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit"><i class="fa fa-search"></i>
                    </button>
                </span>
              </div>
            </form>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h1 class="panel-title">Rekapan Data Karyawan</h1>
              </div>
              <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                          <th>NO</th>
                          <th>ID KARYAWAN</th>
                          <th>NAMA</th>
                          <th>TEMPAT / TANGGAL LAHIR</th>
                          <th>JENIS KELAMIN</th>
                          <th>AGAMA</th>
                          <th>JABATAN</th>
                          <th colspan="3">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                      $cari  = $_POST['cari'];
                      $sql   = "SELECT * FROM tb_karyawan WHERE id_karyawan LIKE '%$cari%'";
                      $query = mysqli_query($koneksi, $sql);

                      $no= 1;
                      //menampilkan data dari database
                      while ($row = mysqli_fetch_array($query)){
                      ?>
                      <tr>
                        <td align="center"><?php echo $no ?></td>
                        <td align="left"><?php echo $row[0] ?></td>
                        <td align="left"><?php echo $row[1] ?></td>
                        <td align="left"><?php echo $row[2] ?></td>
                        <td align="left"><?php echo $row[3] ?></td>
                        <td align="left"><?php echo $row[5] ?></td>
                        <td align="left"><?php echo $row[10] ?></td>
                        <td align="right">
                          <a href="detail_karyawan.php?id_karyawan=<?php echo $row['id_karyawan'] ?>"><i class="fa fa-archive"></i></a>
                        </td>
                        <td align="right">
                          <a href="edit_karyawan.php?id_karyawan=<?php echo $row['id_karyawan'] ?>"><i class="fa fa-edit"></i></a>
                        </td>
                        <td align="right">
                          <a href="hapus_karyawan.php?id_karyawan=<?php echo $row['id_karyawan'] ?>" onclick="hapus()"><i class="fa fa-trash-o"></i></a>
                        </td>
                      </tr>
                      <?php
                      $no++;
                      }
                       ?>

                    </tbody>
                </table>
                <!-- /.table-responsive -->
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
