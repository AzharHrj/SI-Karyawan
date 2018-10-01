<?php
session_start();
include("koneksi.php");

if (isset($_POST['informasi'])) {
  $id_infor = $_POST['inpidinfor'];
  $infor    = $_POST['inpformasi'];

  date_default_timezone_set('Asia/Jakarta');
  $waktu = date("H.i.s d-m-Y");
  $nama  = $waktu;

  $sql   = "SELECT * FROM tb_informasi WHERE id_info = '".$id_infor."' ";
  $query = mysqli_query($koneksi, $sql);
  $row   = mysqli_fetch_row($query);

  if ($row) {
    echo "<script>alert('Tambah Data Dengan ID = ".$id_infor." Sudah Ada !') </script>";
    echo "<script>window.location.href = \"beranda_admin.php\" </script>";
  } else {
    $sql_t  = " INSERT INTO tb_informasi (id_info, informasi, waktu) VALUES ('$id_infor', '$infor', '$nama') ";
    $tambah = mysqli_query($koneksi, $sql_t);

    echo "<script>alert ('Berhasil')</script>";
    echo "<script>window.location.href = \"beranda_admin.php\" </script>";
  }
}

 ?>
