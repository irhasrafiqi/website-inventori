-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.32-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for inventori
CREATE DATABASE IF NOT EXISTS `inventori` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `inventori`;

-- Dumping structure for function inventori.generate_barang_no
DELIMITER //
CREATE FUNCTION `generate_barang_no`() RETURNS varchar(6) CHARSET utf8 COLLATE utf8_general_ci
BEGIN
	DECLARE generate Varchar(6);
	Select LPAD(count(1)+1, 6,'0') into generate from tbl_barang WHERE `pk_barang_id`!='0000000';
RETURN (generate);
END//
DELIMITER ;

-- Dumping structure for view inventori.keluar
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `keluar` (
	`id_barang` INT(11) NULL,
	`stok` DECIMAL(32,0) NULL
) ENGINE=MyISAM;

-- Dumping structure for view inventori.stok
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `stok` (
	`id_barang` INT(11) NULL,
	`stok` DECIMAL(32,0) NULL
) ENGINE=MyISAM;

-- Dumping structure for table inventori.tbl_barang
CREATE TABLE IF NOT EXISTS `tbl_barang` (
  `pk_barang_id` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` varchar(20) DEFAULT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `fk_jenisbarang_id` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `fk_satuan_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`pk_barang_id`),
  KEY `FK_tbl_barang_tbl_jenisbarang` (`fk_jenisbarang_id`),
  KEY `FK_tbl_barang_tbl_satuan` (`fk_satuan_id`),
  CONSTRAINT `FK_tbl_barang_tbl_jenisbarang` FOREIGN KEY (`fk_jenisbarang_id`) REFERENCES `tbl_jenisbarang` (`pk_jenisbarang_id`),
  CONSTRAINT `FK_tbl_barang_tbl_satuan` FOREIGN KEY (`fk_satuan_id`) REFERENCES `tbl_satuan` (`pk_satuan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table inventori.tbl_barang: ~26 rows (approximately)
INSERT INTO `tbl_barang` (`pk_barang_id`, `id_barang`, `nama_barang`, `fk_jenisbarang_id`, `stok`, `fk_satuan_id`, `created_by`, `created_date`) VALUES
	(6, 'B00001', 'Oli Mesin', 1, NULL, 5, NULL, NULL),
	(7, 'B00002', 'Oli Gardan', 1, NULL, 5, NULL, NULL),
	(8, 'B00003', 'Oli Transmisi', 1, NULL, 5, NULL, NULL),
	(10, 'B000004', 'Oli Power Steering', 1, NULL, 5, NULL, NULL),
	(12, 'B000005', 'Oli Rem', 1, NULL, 5, NULL, NULL),
	(13, 'B000006', 'Baut roda BL "M"', 8, NULL, 2, NULL, NULL),
	(14, 'B000007', 'Baut roda BR "M"', 8, NULL, 2, NULL, NULL),
	(15, 'B000008', 'Baut roda DL "M"', 8, NULL, 2, NULL, NULL),
	(16, 'B000009', 'Baut roda DR "M"', 8, NULL, 2, NULL, NULL),
	(17, 'B000010', 'Baut roda DR Isuzu', 8, NULL, 2, NULL, NULL),
	(18, 'B000011', 'Baut roda DL Isuzu', 8, NULL, 2, NULL, NULL),
	(19, 'B000012', 'Baut roda BL Isuzu', 8, NULL, 2, NULL, NULL),
	(20, 'B000013', 'Baut roda BR Isuzu', 8, NULL, 2, NULL, NULL),
	(21, 'B000014', 'Bohlam engkel kecil', 7, NULL, 2, NULL, NULL),
	(22, 'B000015', 'Bohlam engkel besar', 7, NULL, 2, NULL, NULL),
	(23, 'B000016', 'Bohlam double kecil', 7, NULL, 2, NULL, NULL),
	(24, 'B000017', 'Bohlam double besar', 7, NULL, 2, NULL, NULL),
	(25, 'B000018', 'Drik laker M', 12, NULL, 2, NULL, NULL),
	(26, 'B000019', 'Drik laker Isuzu', 12, NULL, 2, NULL, NULL),
	(27, 'B000020', 'Dinamo Starter', 9, NULL, 2, NULL, NULL),
	(28, 'B000021', 'Dinamo Kompresor Pin', 9, NULL, 2, NULL, NULL),
	(29, 'B000022', 'Dinamo Alter M', 9, NULL, 2, NULL, NULL),
	(30, 'B000023', 'Filter Oli  M', 5, NULL, 2, NULL, NULL),
	(31, 'B000024', 'Filter Oli Isuzu', 5, NULL, 2, NULL, NULL),
	(32, 'B000025', 'Filter solar atas M', 5, NULL, 2, NULL, NULL),
	(33, 'B000026', 'Filter solar bawah M', 5, NULL, 2, NULL, NULL),
	(34, 'B000027', 'Filter solar atas Is', 5, NULL, 2, NULL, NULL),
	(35, 'B000028', 'Filter solar bawah Isuzu', 5, NULL, 2, NULL, NULL),
	(36, 'B000029', 'Filter udara M', 5, NULL, 2, NULL, NULL),
	(37, 'B000030', 'Filter udara Isuzu', 5, NULL, 2, NULL, NULL),
	(38, 'B000031', 'Filter Udara', 5, NULL, 2, NULL, NULL);

-- Dumping structure for table inventori.tbl_jenisbarang
CREATE TABLE IF NOT EXISTS `tbl_jenisbarang` (
  `pk_jenisbarang_id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_barang` varchar(50) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`pk_jenisbarang_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table inventori.tbl_jenisbarang: ~11 rows (approximately)
INSERT INTO `tbl_jenisbarang` (`pk_jenisbarang_id`, `jenis_barang`, `created_by`, `created_date`) VALUES
	(1, 'Oli', NULL, NULL),
	(4, 'Accu', NULL, NULL),
	(5, 'Filter', NULL, NULL),
	(7, 'Bohlam', NULL, NULL),
	(8, 'Baut', NULL, NULL),
	(9, 'Dinamo', NULL, NULL),
	(10, 'Alternator', NULL, NULL),
	(11, 'Kampas', NULL, NULL),
	(12, 'Bearing/Laker', NULL, NULL),
	(13, 'Sil', NULL, NULL),
	(14, 'Lampu', NULL, NULL);

-- Dumping structure for table inventori.tbl_satuan
CREATE TABLE IF NOT EXISTS `tbl_satuan` (
  `pk_satuan_id` int(11) NOT NULL AUTO_INCREMENT,
  `satuan_barang` varchar(50) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`pk_satuan_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table inventori.tbl_satuan: ~4 rows (approximately)
INSERT INTO `tbl_satuan` (`pk_satuan_id`, `satuan_barang`, `created_by`, `created_date`) VALUES
	(2, 'Pcs', NULL, NULL),
	(5, 'Liter', NULL, NULL),
	(6, 'Meter', NULL, NULL),
	(7, 'Ah', NULL, NULL);

-- Dumping structure for table inventori.tbl_transaksi_keluar
CREATE TABLE IF NOT EXISTS `tbl_transaksi_keluar` (
  `pk_transaksi_keluar_id` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_lambung` varchar(255) DEFAULT NULL,
  `nomor_plat` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `jumlah_keluar` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`pk_transaksi_keluar_id`) USING BTREE,
  KEY `FK_tbl_transaksi_masuk_tbl_barang` (`id_barang`) USING BTREE,
  CONSTRAINT `tbl_transaksi_keluar_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `tbl_barang` (`pk_barang_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table inventori.tbl_transaksi_keluar: ~3 rows (approximately)
INSERT INTO `tbl_transaksi_keluar` (`pk_transaksi_keluar_id`, `nomor_lambung`, `nomor_plat`, `tanggal`, `id_barang`, `jumlah_keluar`, `status`) VALUES
	(13, 'TB IV.12', 'AD 7085 OA', '2025-01-03', 13, 4, 1),
	(14, 'TB V.10', 'AD 7094 OA', '2025-01-14', 20, 2, 1),
	(15, 'TB I.15', 'AD 7064 OA', '2025-02-01', 6, 2000, 1);

-- Dumping structure for table inventori.tbl_transaksi_masuk
CREATE TABLE IF NOT EXISTS `tbl_transaksi_masuk` (
  `pk_transaksi_masuk_id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `jumlah_masuk` int(11) DEFAULT NULL,
  PRIMARY KEY (`pk_transaksi_masuk_id`),
  KEY `FK_tbl_transaksi_masuk_tbl_barang` (`id_barang`),
  CONSTRAINT `FK_tbl_transaksi_masuk_tbl_barang` FOREIGN KEY (`id_barang`) REFERENCES `tbl_barang` (`pk_barang_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table inventori.tbl_transaksi_masuk: ~5 rows (approximately)
INSERT INTO `tbl_transaksi_masuk` (`pk_transaksi_masuk_id`, `tanggal`, `id_barang`, `jumlah_masuk`) VALUES
	(15, '2025-01-01', 13, 12),
	(16, '2025-01-01', 14, 12),
	(17, '2025-01-06', 24, 10),
	(18, '2025-01-08', 6, 5000),
	(19, '2025-01-19', 35, 5),
	(20, '2025-02-01', 26, 7),
	(21, '2025-02-07', 21, 50);

-- Dumping structure for table inventori.user
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `level` enum('admin','user') NOT NULL,
  `blokir` enum('N','Y') NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table inventori.user: ~2 rows (approximately)
INSERT INTO `user` (`user_id`, `username`, `password`, `email`, `level`, `blokir`) VALUES
	(10, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 'admin', 'N'),
	(26, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user@gmail.com', 'user', '');

-- Dumping structure for view inventori.vbarang
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vbarang` (
	`pk_barang_id` INT(11) NOT NULL,
	`id_barang` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`nama_barang` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`fk_jenisbarang_id` INT(11) NULL,
	`stok` INT(11) NULL,
	`fk_satuan_id` INT(11) NULL,
	`created_by` INT(11) NULL,
	`created_date` DATETIME NULL,
	`jenis_barang` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`satuan_barang` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`kocak` VARCHAR(1) NULL COLLATE 'utf8mb4_general_ci',
	`stokbarang` DECIMAL(32,0) NULL,
	`keluar` DECIMAL(32,0) NULL
) ENGINE=MyISAM;

-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `keluar`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `keluar` AS SELECT  kl.id_barang, SUM(kl.jumlah_keluar) AS stok FROM tbl_transaksi_keluar AS kl WHERE kl.`status`=1 GROUP BY id_barang ;

-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `stok`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `stok` AS SELECT  tm.id_barang, SUM(tm.jumlah_masuk) AS stok FROM tbl_transaksi_masuk AS tm GROUP BY id_barang ;

-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vbarang`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `vbarang` AS SELECT tb.*,tj.jenis_barang, ts.satuan_barang, CONCAT(nama_barang," (", satuan_barang,")") as kocak, 
st.stok AS stokbarang, kl.stok AS keluar FROM tbl_barang tb
LEFT JOIN tbl_jenisbarang tj
ON tb.fk_jenisbarang_id = tj.pk_jenisbarang_id
LEFT JOIN tbl_satuan ts
ON tb.fk_satuan_id = ts.pk_satuan_id 
LEFT JOIN stok st
ON tb.pk_barang_id = st.id_barang 
LEFT JOIN keluar kl
ON kl.id_barang = tb.pk_barang_id ;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
