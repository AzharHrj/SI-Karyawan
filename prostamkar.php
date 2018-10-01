<?php
session_start();
include ("koneksi.php");

//proses input
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

//untuk gambar
$foto     = $_FILES['inpfoto']['name'];
$tmp      = $_FILES['inpfoto']['tmp_name'];
$fotobaru = date('dmYHis').$foto;
$path     = "images/".$fotobaru;

if (move_uploaded_file($tmp, $path)) {
  $sql    = "SELECT * FROM tb_karyawan WHERE id_karyawan = '".$idkar."'";
	$tambah = mysqli_query($koneksi, $sql);

	if ($row = mysqli_fetch_row($tambah))
	{
		echo "<script>alert('Data Dengan ID = ".$idkar." sudah ada') </script>";
		echo "<script>window.location.href = \"admindatapersonel.php\" </script>";
	} else
	{
    $query = "INSERT INTO tb_karyawan (id_karyawan, nama, tmp_tgl_lhr, jenkel, gol_dar, agama, alamat, no_tel, pen_ter, tah_lus, jabatan, foto) VALUES ('$idkar','$nama','$tempat','$jkl','$goldar','$agama','$alamat','$notel','$penter','$tahlus','$jabatan','$fotobaru')";
    $masuk = mysqli_query($koneksi, $query);

		echo "<script>alert('Input Data Berhasil') </script>";
		echo "<script>window.location.href = \"data_karyawan.php\" </script>";
	}
}
?>
