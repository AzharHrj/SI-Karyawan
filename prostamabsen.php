<?php
session_start();
include ("koneksi.php");

if (isset($_POST['keterangan'])) {
  $idkar  = $_POST['inpidkar'];
  $ket    = $_POST['inpket'];
  $alasan = $_POST['inpalasan'];

  //waktu untuk jakarta indonesia
  date_default_timezone_set('Asia/Jakarta');

  $waktu = date("H.i.s d-m-Y");
  $nama  = $waktu;


  if (isset($_POST['inpgambar2'])) {
    //untuk gambar
    $foto     = $_FILES['inpgambar']['name'];
    $tmp      = $_FILES['inpgambar']['tmp_name'];
    $fotobaru = date('dmYHis').$foto;
    $path     = "sakit/".$fotobaru;

    if (move_uploaded_file($tmp, $path)) {
      $sql    = "SELECT * FROM tb_absen2 WHERE id_karyawan = '".$idkar."'";
      $tambah = mysqli_query($koneksi, $sql);

        if ($row = mysqli_fetch_row($tambah)) {
          echo "<script>alert('Data Dengan ID = ".$idkar." Sudah Absen.') </script>";
      		echo "<script>window.location.href = \"admindatapersonel.php\" </script>";
        } else {
          $query = "INSERT INTO tb_absen2 (id_karyawan, sakit, keterangan, alasan, waktu) VALUES ('$idkar','$fotobaru','$ket','$alasan','$nama')";
          $masuk = mysqli_query($koneksi, $query);
          if ($masuk) {
            echo "<script>alert('Input Berhasil') </script>";
            echo "<script>window.location.href = \"absen_umum.php\" </script>";
          } else {
            echo "<script>alert('Tidak Berhasil') </script>";
            echo "<script>window.location.href = \"absen_umum.php\" </script>";
          }
        }
    }
  } else {
    $sql    = "SELECT * FROM tb_absen2 WHERE id_karyawan = '".$idkar."'";
    $tambah = mysqli_query($koneksi, $sql);
    if ($row = mysqli_fetch_row($tambah)) {
      echo "<script>alert('Data Dengan ID = ".$idkar." Sudah Absen.') </script>";
      echo "<script>window.location.href = \"absen_keterangan.php\" </script>";
    } else {
      $query = "INSERT INTO tb_absen2 (id_karyawan, keterangan, alasan, waktu) VALUES ('$idkar','$ket','$alasan','$nama')";
      $masuk = mysqli_query($koneksi, $query);
      if ($masuk) {
        echo "<script>alert('Input Berhasil') </script>";
        echo "<script>window.location.href = \"absen_umum.php\" </script>";
      } else {
        echo "<script>alert('Tidak Berhasil') </script>";
        echo "<script>window.location.href = \"absen_umum.php\" </script>";
      }
    }
  }
}
 ?>
