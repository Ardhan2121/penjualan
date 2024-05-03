# Host: localhost  (Version 5.5.5-10.4.27-MariaDB)
# Date: 2024-05-01 23:07:59
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "2122091_barang"
#

CREATE TABLE `2122091_barang` (
  `2122091_KdBarang` char(6) NOT NULL,
  `2122091_NmBarang` varchar(35) NOT NULL,
  `2122091_Satuan` varchar(10) NOT NULL,
  `2122091_Stok` int(3) NOT NULL DEFAULT 0,
  `2122091_HrgBarang` double(8,0) DEFAULT NULL,
  PRIMARY KEY (`2122091_KdBarang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "2122091_barang"
#

INSERT INTO `2122091_barang` VALUES ('BRG001','123','123',9,123);

#
# Structure for table "2122091_pelanggan"
#

CREATE TABLE `2122091_pelanggan` (
  `2122091_IdPelanggan` char(4) NOT NULL,
  `2122091_NmPelanggan` varchar(35) NOT NULL,
  `2122091_Alamat` varchar(100) NOT NULL,
  `2122091_NoTelp` varchar(13) NOT NULL,
  PRIMARY KEY (`2122091_IdPelanggan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "2122091_pelanggan"
#

INSERT INTO `2122091_pelanggan` VALUES ('P001','hasibuan','1234','1234'),('P002','123123','12312','123123');

#
# Structure for table "2122091_sp"
#

CREATE TABLE `2122091_sp` (
  `2122091_NoSP` char(6) NOT NULL,
  `2122091_IdPelanggan` char(4) NOT NULL,
  `2122091_TglSP` date NOT NULL,
  PRIMARY KEY (`2122091_NoSP`),
  KEY `2122091_sp_2122091_idpelanggan_foreign` (`2122091_IdPelanggan`),
  CONSTRAINT `2122091_sp_2122091_idpelanggan_foreign` FOREIGN KEY (`2122091_IdPelanggan`) REFERENCES `2122091_pelanggan` (`2122091_IdPelanggan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "2122091_sp"
#

INSERT INTO `2122091_sp` VALUES ('SP0001','P001','2024-05-01'),('SP0002','P001','2024-05-01'),('SP0003','P001','2024-05-01'),('SP0004','P001','2024-05-01'),('SP0005','P001','2024-05-01'),('SP0006','P001','2024-05-01'),('SP0007','P001','2024-05-01');

#
# Structure for table "2122091_nota"
#

CREATE TABLE `2122091_nota` (
  `2122091_NoNota` char(6) NOT NULL,
  `2122091_NoSP` char(6) NOT NULL,
  `2122091_TglNota` date NOT NULL,
  `2122091_JmlHarga` double(9,0) DEFAULT NULL,
  PRIMARY KEY (`2122091_NoNota`),
  KEY `2122091_nota_2122091_nosp_foreign` (`2122091_NoSP`),
  CONSTRAINT `2122091_nota_2122091_nosp_foreign` FOREIGN KEY (`2122091_NoSP`) REFERENCES `2122091_sp` (`2122091_NoSP`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "2122091_nota"
#

INSERT INTO `2122091_nota` VALUES ('NT0001','SP0001','2024-05-01',123),('NT0002','SP0002','2024-05-01',1476),('NT0003','SP0003','2024-05-01',1476);

#
# Structure for table "2122091_detil_pesan"
#

CREATE TABLE `2122091_detil_pesan` (
  `2122091_NoSP` char(6) NOT NULL,
  `2122091_KdBarang` char(6) NOT NULL,
  `2122091_JmlJual` int(3) NOT NULL DEFAULT 0,
  `2122091_HrgJual` double(8,0) DEFAULT NULL,
  KEY `2122091_detil_pesan_2122091_nosp_foreign` (`2122091_NoSP`),
  KEY `2122091_detil_pesan_2122091_kdbarang_foreign` (`2122091_KdBarang`),
  CONSTRAINT `2122091_detil_pesan_2122091_kdbarang_foreign` FOREIGN KEY (`2122091_KdBarang`) REFERENCES `2122091_barang` (`2122091_KdBarang`),
  CONSTRAINT `2122091_detil_pesan_2122091_nosp_foreign` FOREIGN KEY (`2122091_NoSP`) REFERENCES `2122091_sp` (`2122091_NoSP`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "2122091_detil_pesan"
#

INSERT INTO `2122091_detil_pesan` VALUES ('SP0001','BRG001',1,123),('SP0002','BRG001',12,123),('SP0003','BRG001',12,123),('SP0004','BRG001',12,123),('SP0005','BRG001',12,123),('SP0006','BRG001',2,1223),('SP0007','BRG001',12,1231);

#
# Structure for table "failed_jobs"
#

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "failed_jobs"
#


#
# Structure for table "migrations"
#

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "migrations"
#

INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2024_04_27_130544_create_pelanggans_table',1),(5,'2024_04_27_154807_create_barangs_table',1),(6,'2024_04_27_164916_create_sps_table',1),(7,'2024_04_28_043022_detilpesan',1),(8,'2024_04_29_062415_create_notas_table',1);

#
# Structure for table "password_resets"
#

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "password_resets"
#


#
# Structure for table "users"
#

CREATE TABLE `users` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hak` enum('admin','staff') NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "users"
#

INSERT INTO `users` VALUES ('ardhan','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','admin','P8KO9NKc9h4hPVosE0FV13Fthg19iUhIbHfxmzAxf6bUovOULztGPqfXzXrx'),('azka','$2y$10$X13xdXpPLHXCfFNSjD11.uH.y503yhcDiZr40P3ne.GG.8pe4xZiq','staff',NULL),('bayu','$2y$10$g06UgArEkOaTMYlP9V90L.MuOQmjYyKys43YwKsvFKmmjder2Xdzi','staff',NULL);
