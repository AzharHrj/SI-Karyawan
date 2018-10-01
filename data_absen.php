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
    <script type="text/javascript">
    function hapus() {
      var jawab = confirm("Apakah Anda Ingin Menghapus ?");
      if (jawab) {
        return true;
      } else {
        return false;
      }
    }

    //set timezone
    <?php
    //tanggal
    $tanggal = mktime(date("m"), date("d"), date("Y"));

    date_default_timezone_set('Asia/Jakarta');
    ?>
    //buat object date berdasarkan waktu di server
    var serverTime = new Date(<?php print date('Y, m, d, H, i, s, 0'); ?>);
    //buat object date berdasarkan waktu di client
    var clientTime = new Date();
    //hitung selisih
    var Diff = serverTime.getTime() - clientTime.getTime();
    //fungsi displayTime yang dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik
    function displayServerTime(){
        //buat object date berdasarkan waktu di client
        var clientTime = new Date();
        //buat object date dengan menghitung selisih waktu client dan server
        var time = new Date(clientTime.getTime() + Diff);
        //ambil nilai jam
        var sh = time.getHours().toString();
        //ambil nilai menit
        var sm = time.getMinutes().toString();
        //ambil nilai detik
        var ss = time.getSeconds().toString();
        //tampilkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
        document.getElementById("clock").innerHTML = (sh.length==1?"0"+sh:sh) + ":" + (sm.length==1?"0"+sm:sm) + ":" + (ss.length==1?"0"+ss:ss);
    }
    </script>

    <!-- boootstrap -->
    <link href="vendor/css/bootstrap/bootstrap.min.css" rel="stylesheet">

    <!-- icon dan fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- tema css -->
    <link href="css/tampilanadmin.css" rel="stylesheet">

  </head>
  <body onload="setInterval('displayServerTime()', 1000);">
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
            <h1 class="page-header">Data Absen</h1>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-3">
            <div class="well well-sm">
              <!--menampilkan hari dan waktu-->
              <span id="clock">
                <?php echo date('H:i:s'); ?>
              </span>
              <?php
              echo date(" d-M-Y");
               ?>
               <!--menampilkan hari dan waktu-->
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h1 class="panel-title">Tabel Kehadiran</h1>
              </div>
              <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                          <th>NO</th>
                          <th>ID GAMBAR</th>
                          <th>WAKTU / TANGGAL</th>
                          <th>FOTO KARYAWAN</th>
                          <th colspan="2">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                      $sql     = "SELECT * FROM tb_absen";
                      $query   = mysqli_query($koneksi, $sql);

                      $no= 1;
                      //menampilkan data dari database
                      while ($row = mysqli_fetch_array($query)){
                      ?>
                      <tr>
                        <td align="center"><?php echo $no ?></td>
                        <td align="left"><?php echo $row[0] ?></td>
                        <td align="left"><?php echo $row[1] ?></td>
                        <td>
                          <img src="<?php echo $row[2] ?>.png" width="150px" height="100px">
                        </td>
                        <td align="right">
                          <a href="detail_gambar.php?id_gambar=<?php echo $row['id_gambar'] ?>"><i class="fa fa-archive"></i></a>
                        </td>
                        <td align="right">
                          <a href="hapus_gambar.php?id_gambar=<?php echo $row['id_gambar'] ?>" onclick="hapus()"><i class="fa fa-trash-o"></i></a>
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

        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h1 class="panel-title">Tabel Keterangan</h1>
              </div>
              <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                          <th>NO</th>
                          <th>ID KARYAWAN</th>
                          <th>SURAT KETERANGAN SAKIT</th>
                          <th>KETERANGAN</th>
                          <th>ALASAN</th>
                          <th>WAKTU / TANGGAL</th>
                          <th colspan="2">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                      $sql     = "SELECT * FROM tb_absen2";
                      $query   = mysqli_query($koneksi, $sql);

                      $no= 1;
                      //menampilkan data dari database
                      while ($row = mysqli_fetch_array($query)){
                      ?>
                      <tr>
                        <td align="center"><?php echo $no ?></td>
                        <td align="left"><?php echo $row[0] ?></td>
                        <td>
                          <img src="<?php echo "sakit/".$row[1]."" ?>" width="150px" height="100px">
                        </td>
                        <td align="left"><?php echo $row[2] ?></td>
                        <td align="left"><?php echo $row[3] ?></td>
                        <td align="left"><?php echo $row[4] ?></td>
                        <td align="right">
                          <a href="hapus_absen.php?id_karyawan=<?php echo $row['id_karyawan'] ?>" onclick="hapus()"><i class="fa fa-trash-o"></i></a>
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
