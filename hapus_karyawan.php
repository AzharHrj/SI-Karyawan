<?php
session_start();
include ("koneksi.php");

$idkar   = $_GET['id_karyawan'];
$sql     = "SELECT * FROM tb_karyawan WHERE id_karyawan = '".$idkar."' ";
$query   = mysqli_query($koneksi, $sql);
$hapus_f = mysqli_fetch_array($query);

//proses hapus data dan gambar
$file = "images/".$hapus_f['foto']; //nama variabel yang ada di server
unlink($file);

$sql_h = "DELETE FROM tb_karyawan WHERE id_karyawan = '".$idkar."' ";
$hapus = mysqli_query($koneksi, $sql_h);
if ($hapus) {
  echo "<script>alert('Hapus Data Dengan ID Karyawan = ".$idkar." Berhasil') </script>";
  echo "<script>window.location.href = \"data_karyawan.php\" </script>";
} else {
  echo "Maaf Tidak Dapat Menghapus Data !";
}

 ?>
