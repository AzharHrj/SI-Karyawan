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
    <script type="text/javascript">
    //untuk menampilkan pertanyaan hapus
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
          <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h1 class="panel-title">Kamera</h1>
              </div>
              <div class="panel-body">
                <object data="croflash.swf" type="application/x-shockwave-flash" width="600" height="400">
                  <param name="data" value="croflash.swf">
                  <param name="src" value="croflash.swf">
                  <embed type="application/x-shockwave-flash" src="croflash.swf" width="300" height="300">
                </object>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>

    <div class="col-md-6 col-md-offset-3">
      <a href="absen_keterangan.php">
        <button class="btn btn-primary btn-lg btn-block" type="button" name="button">Keterangan Lain</button>
      </a>
    </div>

    <!-- Section -->
    <section class="bagian1">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h1 class="panel-title">
                  <!--menampilkan hari dan waktu-->
                  <span id="clock">
                    <?php echo date('H:i:s'); ?>
                  </span>
                  <?php
                  echo date(" d-M-Y");
                   ?>
                   <!--menampilkan hari dan waktu-->
                </h1>
              </div>
              <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                          <th>NO</th>
                          <th>ID GAMBAR</th>
                          <th>WAKTU / TANGGAL</th>
                          <th>FOTO KARYAWAN</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                      $sql   = "SELECT * FROM tb_absen";
                      $query = mysqli_query($koneksi, $sql);

                      $no= 1;
                      //menampilkan data dari database
                      while ($row = mysqli_fetch_array($query)){
                      ?>
                      <tr>
                        <td align="center"><?php echo $no ?></td>
                        <td align="left"><?php echo $row[0] ?></td>
                        <td align="left"><?php echo $row[1] ?></td>
                        <td><img src="<?php echo $row[2] ?>.png" width="150px" height="100px"> </td>
                      </tr>
                      <?php
                      $no++;
                      }
                       ?>
                    </tbody>
                </table>
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
