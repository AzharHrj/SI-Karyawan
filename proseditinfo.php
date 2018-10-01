<?php
session_start();
include("koneksi.php");

if (isset($_POST['ubahinfo'])) {
  $id_infor = $_POST['inpidinfor'];
  $infor    = $_POST['inpformasi'];

  date_default_timezone_set('Asia/Jakarta');
  $waktu = date("H.i.s d-m-Y");
  $nama  = $waktu;

  $sql   = "SELECT * FROM tb_informasi WHERE id_info = '".$id_infor."' ";
  $query = mysqli_query($koneksi, $sql);
  $row   = mysqli_fetch_array($query);

  $sql_ui = "UPDATE tb_informasi SET informasi = '$infor', waktu = '$nama' WHERE id_info = '$id_infor' ";
  $info_u = mysqli_query($koneksi, $sql_ui);
  if ($info_u) {
    echo "<script>alert('Ubah Data Dengan ID Karyawan = ".$id_infor." Berhasil') </script>";
    echo "<script>window.location.href = \"beranda_admin.php\" </script>";
  } else {
    echo "<script>alert ('Belum Berhasil')</script>";
    echo "<script>window.location.href = \"beranda_admin.php\" </script>";
  }
}

 ?>
