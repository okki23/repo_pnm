/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100419
 Source Host           : localhost:3306
 Source Schema         : db_repo_pnm

 Target Server Type    : MySQL
 Target Server Version : 100419
 File Encoding         : 65001

 Date: 10/08/2021 11:51:05
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for dosen
-- ----------------------------
DROP TABLE IF EXISTS `dosen`;
CREATE TABLE `dosen`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nidn` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jenkel` enum('L','P','') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `telp` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dosen
-- ----------------------------
INSERT INTO `dosen` VALUES (1, '1101110009', 'Okki Setyawan', 'L', '0219345435', 'Bekasi', 'okkisetyawan@gmail.com', '7815696ecbf1c96e6894b779456d330e');
INSERT INTO `dosen` VALUES (2, '202', 'Okki Setyawan', 'L', '087889677228', 'Bekasi', 'okkisetyawan@gmail.com', '7815696ecbf1c96e6894b779456d330e');
INSERT INTO `dosen` VALUES (3, '203', 'Okki Setyawan', 'L', '087889677228', 'Bekasi', 'okkisetyawan@gmail.com', '7815696ecbf1c96e6894b779456d330e');
INSERT INTO `dosen` VALUES (5, '8080', 'Joni', 'L', '021899384534', 'okkisetyawan@gmail.com', 'okkisetyawan@gmail.com', '7815696ecbf1c96e6894b779456d330e');

-- ----------------------------
-- Table structure for jenis_publikasi
-- ----------------------------
DROP TABLE IF EXISTS `jenis_publikasi`;
CREATE TABLE `jenis_publikasi`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `jenis_publikasi` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jenis_publikasi
-- ----------------------------
INSERT INTO `jenis_publikasi` VALUES (1, 'Jurnal');
INSERT INTO `jenis_publikasi` VALUES (2, 'Karya Ilmiah');
INSERT INTO `jenis_publikasi` VALUES (3, 'Skripsi');

-- ----------------------------
-- Table structure for kontak
-- ----------------------------
DROP TABLE IF EXISTS `kontak`;
CREATE TABLE `kontak`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `subjek` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pesan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kontak
-- ----------------------------
INSERT INTO `kontak` VALUES (1, 'Okki Setyawan', 'okkisetyawan@gmail.com', 'OKKKOKO', 'kmdlasmdad');
INSERT INTO `kontak` VALUES (2, 'Okki Setyawan', 'okkisetyawan@gmail.com', 'makan', 'udah');

-- ----------------------------
-- Table structure for m_user
-- ----------------------------
DROP TABLE IF EXISTS `m_user`;
CREATE TABLE `m_user`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of m_user
-- ----------------------------
INSERT INTO `m_user` VALUES (1, 'admin', '0cc175b9c0f1b6a831c399e269772661');

-- ----------------------------
-- Table structure for mahasiswa
-- ----------------------------
DROP TABLE IF EXISTS `mahasiswa`;
CREATE TABLE `mahasiswa`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nim` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jenkel` enum('L','P') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `telp` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mahasiswa
-- ----------------------------
INSERT INTO `mahasiswa` VALUES (1, '14002429', 'Okki Setyawan', 'L', '0218945943', 'Bekasi', 'okkisetyawan@gmail.com', '03c7c0ace395d80182db07ae2c30f034');
INSERT INTO `mahasiswa` VALUES (7, '2983466', 'Okki S S.Kom', 'P', '0217843566666', 'Bekasi Barat', 'admin@admin.comgg', '0cc175b9c0f1b6a831c399e269772661');

-- ----------------------------
-- Table structure for page_alamat
-- ----------------------------
DROP TABLE IF EXISTS `page_alamat`;
CREATE TABLE `page_alamat`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of page_alamat
-- ----------------------------
INSERT INTO `page_alamat` VALUES (1, 'Kampus Politeknik Negeri Manado', 'Jl. Raya Politeknik Kel. Buha Manado, Kecamatan Mapanget, Sulawesi Utara <br>\r\n                              Indonesia');

-- ----------------------------
-- Table structure for page_beranda
-- ----------------------------
DROP TABLE IF EXISTS `page_beranda`;
CREATE TABLE `page_beranda`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of page_beranda
-- ----------------------------
INSERT INTO `page_beranda` VALUES (1, 'Politeknik Negeri Manado', 'Sejarah Singkat Politeknik Negeri Manado Berawal di tahun 1986, ketika pemerintah membangun kampus dan fasilitas pembelajaran di Buha, sekitar 10 kilometer dari pusat Kota Manado. Pada saat yang sama diadakan pelatihan bagi tenaga instruktur dan dipusatkan di Bandung Jawa Barat pada Pusat Pengembangan Politeknik. Pada tahun 1987, kegiatan belajar mengajar dimulai di kampus yang baru. Pada tanggal 19 Juli 1988 secara resmi berdirilah Politeknik Universitas Sam Ratulangi Manado yang pada saat itu masih terdiri dari 4 jurusan seperti Teknik Sipil, Teknik Elektro, Teknik Mesin, dan tata niaga yang mengelolah program pendidikan dua tahun yang disebut diploma 2. Pada tanggal 18 Januari 1999, berdasarkan kebijakan Direktorat Jenderal Pendidikan Tinggi, Politeknik Universitas Sam Ratulangi Manado resmi menjadi Politeknik Negeri yang terpisah dari Universitas Sam Ratulangi Manado. ');

-- ----------------------------
-- Table structure for page_fitur
-- ----------------------------
DROP TABLE IF EXISTS `page_fitur`;
CREATE TABLE `page_fitur`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of page_fitur
-- ----------------------------
INSERT INTO `page_fitur` VALUES (1, 'Panduan', 'Silahkan anda baca panduan terlebih dahulu tentang penggunaan sistem repository ini.');
INSERT INTO `page_fitur` VALUES (2, 'Sign In dan Register', 'Anda dapat melakukan login dan daftar akun agar dapat berkontribusi di sistem repository ini.');
INSERT INTO `page_fitur` VALUES (3, 'Multi Dokumen', 'Anda dapat mencari dokumentasi jurnal, karya ilmiah dan skripsi yang sudah lulus uji.');

-- ----------------------------
-- Table structure for page_footer
-- ----------------------------
DROP TABLE IF EXISTS `page_footer`;
CREATE TABLE `page_footer`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `footer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of page_footer
-- ----------------------------
INSERT INTO `page_footer` VALUES (1, '© 2021 Repository Politeknik Negeri Manado');

-- ----------------------------
-- Table structure for page_header
-- ----------------------------
DROP TABLE IF EXISTS `page_header`;
CREATE TABLE `page_header`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `header` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of page_header
-- ----------------------------
INSERT INTO `page_header` VALUES (1, 'Repository Politeknik Negeri Manado');

-- ----------------------------
-- Table structure for page_logo
-- ----------------------------
DROP TABLE IF EXISTS `page_logo`;
CREATE TABLE `page_logo`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `logo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of page_logo
-- ----------------------------
INSERT INTO `page_logo` VALUES (1, 'logopnm.png');

-- ----------------------------
-- Table structure for t_repository
-- ----------------------------
DROP TABLE IF EXISTS `t_repository`;
CREATE TABLE `t_repository`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_jenis_publikasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `judul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nomor_induk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama_penulis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pembimbing` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `penguji` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tanggal_sidang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tanggal_disahkan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tahun_terbit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `doi` varchar(255) CHARACTER SET utf16 COLLATE utf16_general_ci NULL DEFAULT NULL,
  `issn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tempat_terbit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tanggal_terbit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `volume` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `penerbit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tanggal_setor` date NULL DEFAULT NULL,
  `file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `is_approve` enum('Y','N') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'N',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_repository
-- ----------------------------
INSERT INTO `t_repository` VALUES (1, '3', 'Membangun sistem informasi', '1101110009', 'Okki Setyawan', 'Doni Keren', 'Rini S Bonbon', '2020-02-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-06', '1101110009-Okki Setyawan-Membangun sistem informasi.pdf', 'Y');
INSERT INTO `t_repository` VALUES (2, '3', 'Dampak Lingkungan Buruk Terhadap SUTET', '14002429', 'Giant & Suneo', 'Doraemon', 'Nobita', 'Sizuka', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-06', '14002429-Giant & Suneo-Dampak Lingkungan Buruk Terhadap SUTET.pdf', 'N');
INSERT INTO `t_repository` VALUES (3, '1', 'Perbandingan Algoritma', '14002429', 'Okki Setyawan', NULL, NULL, NULL, NULL, '2001', '002542', '935443', NULL, NULL, '2', 'Ganesha', '2021-08-07', '14002429-Okki Setyawan-Perbandingan Algoritma.pdf', 'N');
INSERT INTO `t_repository` VALUES (4, '3', 'Makanan Siap Saji', '1101110009', 'Okki Setyawan', 'Dono', 'Kasino', '2020-02-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-09', '1101110009-Okki Setyawan-Makanan Siap Saji.pdf', 'Y');

SET FOREIGN_KEY_CHECKS = 1;
