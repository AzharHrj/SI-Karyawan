<?php
session_start();
include ("koneksi.php");

// Hapus Gambar
$id_gam  = $_GET['id_gambar'];
$sql_g   = "SELECT * FROM tb_absen WHERE id_gambar = '".$id_gam."' ";
$query   = mysqli_query($koneksi, $sql_g);
$hapus   = mysqli_fetch_array($query);

$file = $hapus['gambar'].'.png'; //nama variabel yang ada di server
unlink($file);

// Hapus Dari Tabel
$sql   = "DELETE FROM tb_absen WHERE id_gambar = '".$id_gam."' ";
$hapus = mysqli_query($koneksi, $sql);
if ($sql){
   echo "<script>alert('Gambar Dengan ID = ".$id_gam." Telah Dihapus') </script>";
   echo "<script>window.location = 'data_absen.php' </script>";
 } else {
   echo "<script>alert('Gagal di Hapus') </script>";
   echo "<script>window.location = 'absen_umum.php';</script>";
 }

?>
