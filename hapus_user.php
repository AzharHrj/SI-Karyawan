<?php
session_start();
include ("koneksi.php");

$idkar   = $_GET['id_karyawan'];
$sql     = "SELECT * FROM tb_daftar WHERE id_karyawan = '".$idkar."' ";
$query   = mysqli_query($koneksi, $sql);
$hapus_f = mysqli_fetch_array($query);

$sql_h = "DELETE FROM tb_daftar WHERE id_karyawan = '".$idkar."' ";
$hapus = mysqli_query($koneksi, $sql_h);
if ($hapus) {
  echo "<script>alert('Hapus User Dengan ID Karyawan = ".$idkar." Berhasil') </script>";
  echo "<script>window.location.href = \"data_user.php\" </script>";
} else {
  echo "Maaf Tidak Dapat Menghapus Data !";
}
