<?php
session_start();
include ("koneksi.php");

//proses edit
if (isset($_POST['ubahdatauser'])) {
  $idkar     = $_POST['inpid'];
  $email     = $_POST['inpemail'];
  $password  = $_POST['inppass'];
  $passwords = $_POST['inppasss'];
  $hakakses  = $_POST['inphakses'];

  $sql   = "SELECT * FROM tb_daftar WHERE id_karyawan = '".$idkar."'";
  $query = mysqli_query($koneksi, $sql);
  $edit  = mysqli_fetch_array($query);

  $sql_u = "UPDATE tb_daftar SET email = '$email', pass = '$password', u_pass = '$passwords', hak_akses = '$hakakses' WHERE id_karyawan = '$idkar'";
  $user  = mysqli_query($koneksi, $sql_u);
  if ($user) {
    echo "<script>alert('Ubah Data Dengan ID Karyawan = ".$idkar." Berhasil') </script>";
    echo "<script>window.location.href = \"data_user.php\" </script>";
  } else {
    $sql    = "SELECT * FROM tb_daftar WHERE id_karyawan = '".$idkar."' ";
    $query  = mysqli_query($koneksi, $sql);
    while ($row = mysqli_fetch_array($query)) {
      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
      echo "<br><a href=\"edit_user.php?id_karyawan=".$row['id_karyawan']."\"> Kembali Ke From ! </a>";
    }
  }
}
 ?>
