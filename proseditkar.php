<?php
session_start();
include ("koneksi.php");

//proses input
if (isset($_POST['ubahdata'])) {
  $idkar   = $_POST['inpid'];
  $nama    = $_POST['inpnama'];
  $tempat  = $_POST['inpttl'];
  $jkl     = $_POST['inpjk'];
  $goldar  = $_POST['inpgoldar'];
  $agama   = $_POST['inpagama'];
  $alamat  = $_POST['inpalamat'];
  $notel   = $_POST['inptel'];
  $penter  = $_POST['inppenter'];
  $tahlus  = $_POST['inptahlus'];
  $jabatan = $_POST['inpjab'];

  if(isset($_POST['ubahfoto'])){ // Cek apakah user ingin mengubah fotonya atau tidak
    $foto     = $_FILES['inpfoto']['name'];
    $tmp      = $_FILES['inpfoto']['tmp_name'];
    $fotobaru = date('dmYHis').$foto;
    $path     = "images/".$fotobaru;

    if(move_uploaded_file($tmp, $path)){ //awal move upload file
      $sql    = "SELECT * FROM tb_karyawan WHERE id_karyawan = '".$idkar."' ";
      $query  = mysqli_query($koneksi, $sql);
      $proses = mysqli_fetch_array($query);

      if(is_file("images/".$proses['foto'])) //nama variabel yang ada di server
        unlink("images/".$proses['foto']); //nama variabel yang ada di server

      // Proses ubah data ke Database
      $sql_f = "UPDATE tb_karyawan SET foto = '$fotobaru', nama = '$nama', tmp_tgl_lhr = '$tempat', jenkel = '$jkl', gol_dar = '$goldar', agama = '$agama', alamat = '$alamat', no_tel = '$notel', pen_ter = '$penter', tah_lus = '$tahlus', jabatan = '$jabatan' WHERE id_karyawan = '$idkar'";
      $ubah  = mysqli_query($koneksi, $sql_f);
      if($ubah){
        echo "<script>alert('Ubah Data Dengan ID Karyawan = ".$idkar." Berhasil') </script>";
        echo "<script>window.location.href = \"data_karyawan.php\" </script>";
      } else {
        $sql    = "SELECT * FROM tb_karyawan WHERE id_karyawan = '".$idkar."' ";
        $query  = mysqli_query($koneksi, $sql);
        while ($row = mysqli_fetch_array($query)) {
          echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
          echo "<br><a href=\"edit_karyawan.php?id_karyawan=".$row['id_karyawan']."\"> Kembali Ke From ! </a>";
        }
      }
    } //akhir move upload file
    else{
      // Jika gambar gagal diupload, Lakukan :
      echo "Maaf, Gambar gagal untuk diupload.";
      echo "<br><a href='admindatapersonel.php'>Kembali Ke Form</a>";
    }
 } //akhir ubah foto
 else { //hanya untuk mengubah data
   $sql_d   = "UPDATE tb_karyawan SET nama = '$nama', tmp_tgl_lhr = '$tempat', jenkel = '$jkl', gol_dar = '$goldar', agama = '$agama', alamat = '$alamat', no_tel = '$notel', pen_ter = '$penter', tah_lus = '$tahlus', jabatan = '$jabatan' WHERE id_karyawan = '$idkar'";
   $data    = mysqli_query($koneksi, $sql_d);
   if ($data) {
     echo "<script>alert('Ubah Data Dengan ID Karyawan = ".$idkar." Berhasil') </script>";
     echo "<script>window.location.href = \"data_karyawan.php\" </script>";
   } else {
     $sql   = "SELECT * FROM tb_karyawan WHERE id_karyawan = '".$idkar."' ";
     $query = mysqli_query($koneksi, $sql);
     while ($row = mysqli_fetch_array($query)) {
       echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
       echo "<br><a href=\"edit_karyawan.php?id_karyawan=".$row['id_karyawan']."\"> Kembali Ke From ! </a>";
     }
   }
 } //akhir untuk mengubah data
}

?>
