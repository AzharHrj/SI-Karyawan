-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13 Feb 2018 pada 07.42
-- Versi Server: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_absen`
--

CREATE TABLE `tb_absen` (
  `id_gambar` int(11) NOT NULL,
  `waktu` varchar(50) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_absen2`
--

CREATE TABLE `tb_absen2` (
  `id_karyawan` varchar(20) DEFAULT NULL,
  `sakit` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `alasan` varchar(50) NOT NULL,
  `waktu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_daftar`
--

CREATE TABLE `tb_daftar` (
  `id_karyawan` varchar(20) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `u_pass` varchar(50) NOT NULL,
  `hak_akses` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_daftar`
--

INSERT INTO `tb_daftar` (`id_karyawan`, `email`, `pass`, `u_pass`, `hak_akses`) VALUES
('Admin', 'Admin', 'Admin', 'Admin', 'Admin'),
('1', 'alan@gmail.com', '12345', '12345', 'Karyawan'),
('2', 'alan@gmail.com', '12345', '12345', 'Karyawan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_informasi`
--

CREATE TABLE `tb_informasi` (
  `id_info` varchar(10) NOT NULL,
  `informasi` varchar(100) NOT NULL,
  `waktu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_informasi`
--

INSERT INTO `tb_informasi` (`id_info`, `informasi`, `waktu`) VALUES
('1', 'apa jie', '07.29.47 08-02-2018'),
('2', 'mau ji dites lagi', '21.37.28 07-02-2018');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `id_karyawan` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tmp_tgl_lhr` varchar(20) NOT NULL,
  `jenkel` varchar(20) NOT NULL,
  `gol_dar` varchar(5) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_tel` varchar(20) NOT NULL,
  `pen_ter` varchar(10) NOT NULL,
  `tah_lus` varchar(10) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `foto` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`id_karyawan`, `nama`, `tmp_tgl_lhr`, `jenkel`, `gol_dar`, `agama`, `alamat`, `no_tel`, `pen_ter`, `tah_lus`, `jabatan`, `foto`) VALUES
('1', 'alan saputra lengkoan', 'mamasa / 26-03-1998', 'Laki - laki', 'A', 'Kristen Protestan', 'gowa', '085242907595', 'SMA / SMK', '2015', 'Supervisor', 0x313230323230313831333139353331323070782d486f6d655f49636f6e2e7376672e706e67),
('2', 'marcelino derry utomo', 'mamasa / 26-03-1998', 'Laki - laki', 'AB', 'Katolik', 'talasalapang', '085242907595', 'SMA / SMK', '2015', 'Staff', 0x3132303232303138313333303138636c6f636b2d6f662d76696e746167652d64657369676e2d616c61726d2d73796d626f6c2d666f722d696e746572666163655f69636f6e2d69636f6e732e636f6d5f35363832342e706e67),
('Admin', 'Admin', 'Admin', 'Admin', 'Admin', 'Admin', 'Admin', 'Admin', 'Admin', 'Admin', 'Admin', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_absen`
--
ALTER TABLE `tb_absen`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indexes for table `tb_absen2`
--
ALTER TABLE `tb_absen2`
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- Indexes for table `tb_daftar`
--
ALTER TABLE `tb_daftar`
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- Indexes for table `tb_informasi`
--
ALTER TABLE `tb_informasi`
  ADD PRIMARY KEY (`id_info`);

--
-- Indexes for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_absen`
--
ALTER TABLE `tb_absen`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_absen2`
--
ALTER TABLE `tb_absen2`
  ADD CONSTRAINT `tb_absen2_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `tb_karyawan` (`id_karyawan`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_daftar`
--
ALTER TABLE `tb_daftar`
  ADD CONSTRAINT `tb_daftar_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `tb_karyawan` (`id_karyawan`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
