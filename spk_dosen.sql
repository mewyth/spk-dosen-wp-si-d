-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               11.1.2-MariaDB-log - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table spk_dosen.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_admin` varchar(30) NOT NULL,
  `user_admin` varchar(30) NOT NULL,
  `password_admin` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table spk_dosen.admin: ~1 rows (approximately)
DELETE FROM `admin`;
INSERT INTO `admin` (`id`, `nama_admin`, `user_admin`, `password_admin`) VALUES
	(1, 'Admin', 'admin', 'admin');

-- Dumping structure for table spk_dosen.data_lppm
CREATE TABLE IF NOT EXISTS `data_lppm` (
  `id_data` int(11) NOT NULL AUTO_INCREMENT,
  `id_dosen` int(11) NOT NULL,
  `jml_pn` int(11) NOT NULL DEFAULT 0,
  `jml_jia` int(11) NOT NULL DEFAULT 0,
  `jml_ji` int(11) NOT NULL DEFAULT 0,
  `jml_jna` int(11) NOT NULL DEFAULT 0,
  `jml_jn` int(11) NOT NULL DEFAULT 0,
  `jml_jl` int(11) NOT NULL DEFAULT 0,
  `jml_pl` int(11) NOT NULL DEFAULT 0,
  `jml_sm` int(11) NOT NULL DEFAULT 0,
  `jml_pg` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_data`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table spk_dosen.data_lppm: ~3 rows (approximately)
DELETE FROM `data_lppm`;
INSERT INTO `data_lppm` (`id_data`, `id_dosen`, `jml_pn`, `jml_jia`, `jml_ji`, `jml_jna`, `jml_jn`, `jml_jl`, `jml_pl`, `jml_sm`, `jml_pg`) VALUES
	(1, 1, 2, 1, 0, 0, 0, 0, 4, 1, 1),
	(2, 2, 1, 0, 1, 0, 0, 0, 2, 3, 2),
	(3, 3, 2, 0, 0, 0, 0, 1, 2, 2, 2);

-- Dumping structure for table spk_dosen.dosen_peserta
CREATE TABLE IF NOT EXISTS `dosen_peserta` (
  `id_dosen` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `pendidikan` varchar(20) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `c1` double NOT NULL DEFAULT 1,
  `c2` double NOT NULL DEFAULT 1,
  `c3` double NOT NULL DEFAULT 1,
  `c4` double NOT NULL DEFAULT 1,
  `c5` double NOT NULL DEFAULT 1,
  `c6` double NOT NULL DEFAULT 1,
  `c7` double NOT NULL DEFAULT 1,
  `c8` double NOT NULL DEFAULT 1,
  `c9` double NOT NULL DEFAULT 1,
  `c10` double NOT NULL DEFAULT 1,
  `vektor_s` double NOT NULL DEFAULT 0,
  `vektor_v` double NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_dosen`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table spk_dosen.dosen_peserta: ~3 rows (approximately)
DELETE FROM `dosen_peserta`;
INSERT INTO `dosen_peserta` (`id_dosen`, `nip`, `nama`, `alamat`, `pendidikan`, `jabatan`, `c1`, `c2`, `c3`, `c4`, `c5`, `c6`, `c7`, `c8`, `c9`, `c10`, `vektor_s`, `vektor_v`) VALUES
	(1, 'dsn1', 'Dosen 1', 'Bandung', 'S2', 'Lektor', 4.8, 4.5, 4.4, 3, 3, 5, 5, 2, 2, 3, 3.5026, 0.3843),
	(2, 'dsn2', 'Dosen 2', 'Bojonegoro', 'S1', 'Asisten Ahli', 4.6, 4.6, 4.2, 1, 2, 3, 3, 4, 3, 2, 2.8417, 0.3039),
	(3, 'dsn3', 'Dosen 3', 'Bali', 'S2', 'Asisten Ahli', 4.4, 4.6, 4.2, 3, 3, 1, 3, 3, 3, 2, 2.7694, 0.3118);

-- Dumping structure for table spk_dosen.nilai_dosen
CREATE TABLE IF NOT EXISTS `nilai_dosen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(15) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `q1` double NOT NULL,
  `q2` double NOT NULL,
  `q3` double NOT NULL,
  `q4` double NOT NULL,
  `q5` double NOT NULL,
  `avg` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table spk_dosen.nilai_dosen: ~4 rows (approximately)
DELETE FROM `nilai_dosen`;
INSERT INTO `nilai_dosen` (`id`, `nip`, `id_dosen`, `q1`, `q2`, `q3`, `q4`, `q5`, `avg`) VALUES
	(1, 'nilai1', 1, 5, 5, 5, 5, 3, 4.6),
	(2, 'nilai2', 1, 5, 5, 5, 4, 3, 4.4),
	(3, 'nilai2', 2, 5, 5, 5, 4, 4, 4.6),
	(4, 'nilai3', 3, 5, 5, 4, 4, 5, 4.6);

-- Dumping structure for table spk_dosen.nilai_mhs
CREATE TABLE IF NOT EXISTS `nilai_mhs` (
  `id_mhs` int(11) NOT NULL AUTO_INCREMENT,
  `nim` varchar(15) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `q1` double NOT NULL,
  `q2` double NOT NULL,
  `q3` double NOT NULL,
  `q4` double NOT NULL,
  `q5` double NOT NULL,
  `avg` double NOT NULL,
  PRIMARY KEY (`id_mhs`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table spk_dosen.nilai_mhs: ~9 rows (approximately)
DELETE FROM `nilai_mhs`;
INSERT INTO `nilai_mhs` (`id_mhs`, `nim`, `id_dosen`, `q1`, `q2`, `q3`, `q4`, `q5`, `avg`) VALUES
	(1, 'mhs1', 1, 5, 5, 5, 4, 5, 4.8),
	(2, 'mhs2', 2, 5, 5, 4, 4, 5, 4.6),
	(3, 'mhs3', 3, 5, 5, 4, 4, 4, 4.4),
	(4, 'mhs2', 1, 5, 5, 5, 4, 5, 4.8),
	(5, 'mhs3', 2, 5, 5, 4, 4, 5, 4.6),
	(6, 'mhs1', 3, 5, 5, 4, 4, 4, 4.4),
	(7, 'mhs3', 1, 5, 5, 5, 4, 5, 4.8),
	(8, 'mhs1', 2, 5, 5, 4, 4, 5, 4.6),
	(9, 'mhs2', 3, 5, 5, 4, 4, 4, 4.4);

-- Dumping structure for table spk_dosen.nilai_pimpinan
CREATE TABLE IF NOT EXISTS `nilai_pimpinan` (
  `id_mhs` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(15) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `q1` double NOT NULL,
  `q2` double NOT NULL,
  `q3` double NOT NULL,
  `q4` double NOT NULL,
  `q5` double NOT NULL,
  `avg` double NOT NULL,
  PRIMARY KEY (`id_mhs`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table spk_dosen.nilai_pimpinan: ~3 rows (approximately)
DELETE FROM `nilai_pimpinan`;
INSERT INTO `nilai_pimpinan` (`id_mhs`, `nip`, `id_dosen`, `q1`, `q2`, `q3`, `q4`, `q5`, `avg`) VALUES
	(1, 'pmp', 1, 4, 5, 4, 5, 4, 4.4),
	(2, 'pmp', 2, 4, 4, 4, 4, 5, 4.2),
	(3, 'pmp', 3, 5, 4, 4, 4, 4, 4.2);

-- Dumping structure for table spk_dosen.tb_hmp_kriteria
CREATE TABLE IF NOT EXISTS `tb_hmp_kriteria` (
  `id_hmp` int(11) NOT NULL AUTO_INCREMENT,
  `himpunan` varchar(70) NOT NULL,
  `keterangan` varchar(40) NOT NULL,
  `nilai` int(11) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL,
  PRIMARY KEY (`id_hmp`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table spk_dosen.tb_hmp_kriteria: ~51 rows (approximately)
DELETE FROM `tb_hmp_kriteria`;
INSERT INTO `tb_hmp_kriteria` (`id_hmp`, `himpunan`, `keterangan`, `nilai`, `nama_kriteria`) VALUES
	(1, '86 - 100', 'sangat baik', 5, 'penilaian mahasiswa '),
	(2, '76 - 85', 'baik', 4, 'penilaian mahasiswa '),
	(3, '66 - 75', 'cukup', 3, 'penilaian mahasiswa '),
	(4, '51 - 65', 'kurang', 2, 'penilaian mahasiswa '),
	(5, '0 - 50', 'sangat kurang', 1, 'penilaian mahasiswa '),
	(8, '86 - 100', 'sangat baik', 5, 'penilaian dosen sejawat'),
	(9, '76 - 85', 'baik', 4, 'penilaian dosen sejawat '),
	(10, '66 -75', 'cukup', 3, 'penilaian dosen sejawat'),
	(11, '51 - 65', 'kurang', 2, 'penilaian dosen sejawat '),
	(12, '0 - 50', 'sangat kurang', 1, 'penilaian dosen sejawat'),
	(13, '86 - 100', 'sangat baik', 5, 'penilaian pimpinan'),
	(14, '76 - 85', 'baik', 4, 'penilaian pimpinan'),
	(15, '66 - 75', 'cukup', 3, 'penilaian pimpinan'),
	(16, '51 - 65', 'kurang', 2, 'penilaian pimpinan'),
	(17, '0 - 50', 'sangat kurang', 1, 'penilaian pimpinan'),
	(18, 'S3', 'sangat baik', 5, 'kualifikasi pendidikan'),
	(19, 'S2', 'baik', 3, 'kualifikasi pendidikan'),
	(20, 'S1', 'cukup', 1, 'kualifikasi pendidikan'),
	(21, '>= 4', 'sangat baik', 5, 'penelitian'),
	(22, '3', 'baik', 4, 'penelitian'),
	(23, '2', 'cukup', 3, 'penelitian'),
	(24, '1', 'kurang', 2, 'penelitian'),
	(25, '0', 'sangat kurang', 1, 'penelitian'),
	(26, '>=1  Jurnal Internasional Akreditasi  ', 'sangat baik', 5, 'jurnal'),
	(27, '>=3  Jurnal Nasional Terakreditasi    ', 'baik', 4, 'jurnal'),
	(28, '1-2  Jurnal Nasional Terakreditasi    ', 'cukup', 3, 'jurnal'),
	(29, '>=1  Jurnal Internasional                 ', 'cukup', 3, 'jurnal'),
	(30, '>=3  Jurnal Nasional                       ', 'cukup', 3, 'jurnal'),
	(31, '1-2  Jurnal Nasional                       ', 'kurang', 2, 'jurnal'),
	(32, '>=3  Jurnal Lokal                            ', 'kurang', 2, 'jurnal'),
	(35, '1-2  Jurnal Lokal                            ', 'sangat kurang', 1, 'jurnal'),
	(36, '>=4', 'Sangat Baik', 5, 'pelatihan'),
	(37, '3', 'baik', 4, 'pelatihan'),
	(38, '2', 'cukup', 3, 'pelatihan'),
	(39, '1', 'kurang', 2, 'pelatihan'),
	(40, '0', 'sangat kurang', 1, 'pelatihan'),
	(41, '>=4', 'sangat baik', 5, 'seminar'),
	(42, '3', 'baik', 4, 'seminar'),
	(43, '2', 'cukup', 3, 'seminar'),
	(44, '1', 'kurang', 2, 'seminar'),
	(45, '0', 'sangat kurang', 1, 'seminar'),
	(46, '>=4', 'sangat baik', 5, 'pengabdian masyarakat'),
	(47, '3', 'baik', 4, 'pengabdian masyarakat'),
	(48, '2', 'cukup', 3, 'pengabdian masyarakat'),
	(49, '1', 'kurang', 2, 'pengabdian masyarakat'),
	(50, '0', 'sangat kurang', 1, 'pengabdian masyarakat'),
	(51, 'guru besar', 'sangat baik', 5, 'jabatan akademik'),
	(52, 'lektor kepala', 'baik', 4, 'jabatan akademik'),
	(53, 'lektor', 'cukup', 3, 'jabatan akademik'),
	(54, 'asisten ahli', 'kurang', 2, 'jabatan akademik'),
	(55, 'pengajar', 'sangat kurang', 1, 'jabatan akademik');

-- Dumping structure for table spk_dosen.tb_kriteria
CREATE TABLE IF NOT EXISTS `tb_kriteria` (
  `id_kriteria` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kriteria` varchar(30) NOT NULL,
  `bobot` int(11) NOT NULL,
  PRIMARY KEY (`id_kriteria`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table spk_dosen.tb_kriteria: ~10 rows (approximately)
DELETE FROM `tb_kriteria`;
INSERT INTO `tb_kriteria` (`id_kriteria`, `nama_kriteria`, `bobot`) VALUES
	(1, 'Penilaian Mahasiswa ', 3),
	(2, 'Penilaian Dosen Sejawat ', 4),
	(3, 'Penilaian Pimpinan ', 5),
	(4, 'Kualifikasi Pendidikan ', 5),
	(5, 'Penelitian', 5),
	(6, 'Jurnal ', 5),
	(7, 'Pelatihan ', 3),
	(8, 'Seminar ', 3),
	(9, 'Pengabdian Masyarakat ', 4),
	(10, 'Jabatan Akademik ', 3);

-- Dumping structure for table spk_dosen.tb_pengaturan
CREATE TABLE IF NOT EXISTS `tb_pengaturan` (
  `id_pengaturan` int(11) NOT NULL AUTO_INCREMENT,
  `pengaturan` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_pengaturan`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table spk_dosen.tb_pengaturan: ~3 rows (approximately)
DELETE FROM `tb_pengaturan`;
INSERT INTO `tb_pengaturan` (`id_pengaturan`, `pengaturan`, `status`) VALUES
	(1, 'pendaftaran', 1),
	(2, 'penilaian', 1),
	(3, 'pengumuman', 1);

-- Dumping structure for table spk_dosen.user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table spk_dosen.user: ~11 rows (approximately)
DELETE FROM `user`;
INSERT INTO `user` (`id_user`, `jenis`, `username`, `password`, `nama`) VALUES
	(1, 'mahasiswa', 'mhs1', 'mhs1', 'Jemmy'),
	(2, 'mahasiswa', 'mhs2', 'mhs2', 'Adila'),
	(3, 'mahasiswa', 'mhs3', 'mhs3', 'Annisa'),
	(4, 'dosen', 'nilai1', 'nilai1', 'Dosen Penilai 1'),
	(5, 'dosen', 'nilai2', 'nilai2', 'Dosen Penilai 2'),
	(6, 'dosen', 'nilai3', 'nilai3', 'Dosen Penilai 3'),
	(7, 'pimpinan', 'pmp', 'pmp', 'Pimpinan'),
	(8, 'lppm', 'lppm', 'lppm', 'LPPM'),
	(9, 'dosen', 'dsn1', 'dsn1', 'Dosen 1'),
	(10, 'dosen', 'dsn2', 'dsn2', 'Dosen 2'),
	(11, 'dosen', 'dsn3', 'dsn3', 'Dosen 3');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
