<?php
session_start();
include("koneksi.php");

$id_infor = $_GET['id_info'];
$sql      = "SELECT * FROM tb_informasi WHERE id_info = '".$id_infor."' ";
$query    = mysqli_query($koneksi, $sql);
$row      = mysqli_fetch_array($query);

$sql_ui = "DELETE FROM tb_informasi WHERE id_info = '$id_infor' ";
$info_u = mysqli_query($koneksi, $sql_ui);
if ($info_u) {
  echo "<script>alert('Hapus Dengan ID Informasi = ".$id_infor." Berhasil') </script>";
  echo "<script>window.location.href = \"beranda_admin.php\" </script>";
} else {
  echo "<script>alert ('Belum Berhasil')</script>";
  echo "<script>window.location.href = \"beranda_admin.php\" </script>";
}

 ?>
