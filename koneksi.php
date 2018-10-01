<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "final";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
  echo "belum konek";
} else {
  //echo "sudah konek";
}
 ?>
