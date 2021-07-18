/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100316
 Source Host           : localhost:3306
 Source Schema         : db_martools

 Target Server Type    : MySQL
 Target Server Version : 100316
 File Encoding         : 65001

 Date: 30/07/2019 08:24:15
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for m_barang
-- ----------------------------
DROP TABLE IF EXISTS `m_barang`;
CREATE TABLE `m_barang`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_kategori` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_sub_kategori` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `qty_subang` int(11) NULL DEFAULT NULL,
  `qty_jkt` int(11) NULL DEFAULT NULL,
  `keterangan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 64 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_barang
-- ----------------------------
INSERT INTO `m_barang` VALUES (1, 'Annual Report 2017', '1', '1', 51, 11, '');
INSERT INTO `m_barang` VALUES (2, 'Company Profile', '1', '2', 11, 11, '');
INSERT INTO `m_barang` VALUES (3, 'Buku Sejarah Dahana', '1', '3', 11, 6, 'ORDER');
INSERT INTO `m_barang` VALUES (4, '2018 CORPORATE/EMC', '1', '4', 11, 11, 'ORDER');
INSERT INTO `m_barang` VALUES (5, '2018 BOM P-100L', '1', '4', 186, 11, '');
INSERT INTO `m_barang` VALUES (6, '2018 DAHANA ANFO', '1', '4', 56, 11, 'ORDER');
INSERT INTO `m_barang` VALUES (7, '2018 DAYADET NON ELECTRIC DETONATOR', '1', '4', 87, 11, 'ORDER');
INSERT INTO `m_barang` VALUES (8, '2018 DAYAGEL EXTRA', '1', '4', 61, 11, 'ORDER');
INSERT INTO `m_barang` VALUES (9, '2018 DAYAGEL MILITARY', '1', '4', 28, 11, 'ORDER');
INSERT INTO `m_barang` VALUES (10, '2018 DAYAGEL PRE-SPLIT', '1', '4', 35, 11, 'ORDER');
INSERT INTO `m_barang` VALUES (11, '2018 DAYAGEL SEISMIC', '1', '4', 38, 11, 'ORDER');
INSERT INTO `m_barang` VALUES (12, '2018 DAYAGEL SIVOR', '1', '4', 138, 11, '');
INSERT INTO `m_barang` VALUES (13, '2018 LAYANAN PELEDAK TERINTEGRASI UNTUK SEKTOR MINYAK DAN GAS', '1', '4', 211, 11, '');
INSERT INTO `m_barang` VALUES (14, '2018 OILWELL SHAPED CHARGES', '1', '4', 161, 11, '');
INSERT INTO `m_barang` VALUES (15, '2018 PENERAPAN TEKNOLOGI PELEDAKAN UNTUK SEKTOR KONSTRUKSI', '1', '4', 35, 11, 'ORDER');
INSERT INTO `m_barang` VALUES (16, '2018 PENTOLITE BOOSTER', '1', '4', 32, 11, 'ORDER');
INSERT INTO `m_barang` VALUES (17, '2018 PETUNJUK PEMBELIAN', '1', '4', 69, 11, 'ORDER');
INSERT INTO `m_barang` VALUES (18, 'Portrait', '1', '5', 136, 11, '');
INSERT INTO `m_barang` VALUES (19, 'Landscape', '1', '5', 11, 11, '');
INSERT INTO `m_barang` VALUES (20, 'Blanko', '1', '6', 411, 11, '');
INSERT INTO `m_barang` VALUES (21, 'Multifungsi', '1', '7', 51, 11, 'ORDER');
INSERT INTO `m_barang` VALUES (22, 'Season Greatings', '1', '7', 53, 11, 'ORDER');
INSERT INTO `m_barang` VALUES (23, 'Plakat Tinggi', '1', '8', 11, 11, 'ORDER');
INSERT INTO `m_barang` VALUES (24, 'Plakat Pendek', '1', '8', 12, 11, 'ORDER');
INSERT INTO `m_barang` VALUES (25, 'Plakat Pendek (kristal)', '1', '8', 11, 11, 'ORDER');
INSERT INTO `m_barang` VALUES (26, 'Plakat Kotak Custom', '1', '8', 12, 11, 'ORDER');
INSERT INTO `m_barang` VALUES (27, 'Kampus (besar)', '1', '9', 12, 11, '');
INSERT INTO `m_barang` VALUES (28, 'Kampus (kecil)', '1', '9', 14, 11, '');
INSERT INTO `m_barang` VALUES (29, 'Produk (Besar)', '1', '9', 12, 11, '');
INSERT INTO `m_barang` VALUES (30, 'Produk (Kecil)', '1', '9', 15, 11, '');
INSERT INTO `m_barang` VALUES (31, '2018 DAHANA BULK EMULSION EXPLOSIVES', '1', '4', 61, 11, 'ORDER');
INSERT INTO `m_barang` VALUES (32, 'Safety Card', '1', '10', 811, 11, 'ORDER');
INSERT INTO `m_barang` VALUES (33, 'Flexibel', '1', '11', 71, 11, 'ORDER');
INSERT INTO `m_barang` VALUES (34, 'Standing Banner', '1', '12', 16, 11, '');
INSERT INTO `m_barang` VALUES (35, 'X-Banner', '1', '12', 14, 11, '');
INSERT INTO `m_barang` VALUES (36, 'Tempat kartu nama', '1', '13', 143, 11, '');
INSERT INTO `m_barang` VALUES (37, 'Dahana', '1', '14', 261, 11, '');
INSERT INTO `m_barang` VALUES (38, 'Dahana', '1', '15', 211, 11, '');
INSERT INTO `m_barang` VALUES (39, 'DAHANA', '2', '16', 46, 11, 'ORDER');
INSERT INTO `m_barang` VALUES (40, 'Casual', '2', '17', 21, 11, 'ORDER');
INSERT INTO `m_barang` VALUES (41, 'Dahana ', '2', '18', 56, 11, '');
INSERT INTO `m_barang` VALUES (42, 'MMT Maket', '2', '19', 16, 11, 'EXCLUSIVE LIMITED');
INSERT INTO `m_barang` VALUES (43, 'Suvenir ', '2', '19', 18, 11, 'EXCLUSIVE LIMITED');
INSERT INTO `m_barang` VALUES (44, 'Flashdisk + tempat kartu nama + pulpen', '2', '20', 30, 11, 'EXCLUSIVE LIMITED');
INSERT INTO `m_barang` VALUES (45, 'Flashdisk Kartu', '2', '21', 19, 11, 'ORDER');
INSERT INTO `m_barang` VALUES (46, 'NDHI', '2', '22', 31, 11, '');
INSERT INTO `m_barang` VALUES (47, 'Parker', '2', '22', 11, 11, '');
INSERT INTO `m_barang` VALUES (48, 'Pulpen Pameran', '2', '22', 241, 11, '');
INSERT INTO `m_barang` VALUES (49, 'Jepitan Dasi Gold', '2', '23', 31, 11, '');
INSERT INTO `m_barang` VALUES (50, 'Jepitan Dasi Silver', '2', '23', 47, 11, '');
INSERT INTO `m_barang` VALUES (51, 'Jam Meja', '2', '24', 22, 11, '');
INSERT INTO `m_barang` VALUES (52, 'DAHANA Kulit', '2', '25', 16, 11, 'ORDER');
INSERT INTO `m_barang` VALUES (53, 'Dahana', '2', '26', 521, 11, '');
INSERT INTO `m_barang` VALUES (54, 'Dahana polos', '2', '27', 96, 11, '');
INSERT INTO `m_barang` VALUES (55, 'Handuk Putih', '2', '28', 11, 11, '');
INSERT INTO `m_barang` VALUES (56, 'Gantungan Kunci', '2', '29', 11, 11, '');
INSERT INTO `m_barang` VALUES (57, 'Bola Golf Dahana', '2', '30', 11, 11, '');
INSERT INTO `m_barang` VALUES (58, 'Glove Ukuran 26', '2', '30', 15, 11, '');
INSERT INTO `m_barang` VALUES (59, 'Bordir T. Tisue & Taplak', '2', '31', 40, 11, '');
INSERT INTO `m_barang` VALUES (60, 'Box Suvenir kosong', '2', '32', 11, 11, '');
INSERT INTO `m_barang` VALUES (61, 'LM', '2', '32', 43, 11, '');
INSERT INTO `m_barang` VALUES (62, 'Map Dahana (Putih)', '3', '33', 161, 40, 'ORDER');
INSERT INTO `m_barang` VALUES (63, 'Map Dahana (Hitam)', '3', '33', 19, 61, '');

-- ----------------------------
-- Table structure for m_instansi
-- ----------------------------
DROP TABLE IF EXISTS `m_instansi`;
CREATE TABLE `m_instansi`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_kategori_instansi` int(10) NULL DEFAULT NULL,
  `nama_instansi` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `telp` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `pic` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_instansi
-- ----------------------------
INSERT INTO `m_instansi` VALUES (2, 2, 'PT.Pindad', 'Jl.Nangka', '021345446', 'Putra');

-- ----------------------------
-- Table structure for m_jabatan
-- ----------------------------
DROP TABLE IF EXISTS `m_jabatan`;
CREATE TABLE `m_jabatan`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_jabatan
-- ----------------------------
INSERT INTO `m_jabatan` VALUES (1, 'IT Head');
INSERT INTO `m_jabatan` VALUES (3, 'HR Manager');
INSERT INTO `m_jabatan` VALUES (4, 'IT Staff');

-- ----------------------------
-- Table structure for m_kategori
-- ----------------------------
DROP TABLE IF EXISTS `m_kategori`;
CREATE TABLE `m_kategori`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_kategori
-- ----------------------------
INSERT INTO `m_kategori` VALUES (1, 'Marketing Tools');
INSERT INTO `m_kategori` VALUES (2, 'Souvenir');
INSERT INTO `m_kategori` VALUES (3, 'Alat Tulis Kantor');

-- ----------------------------
-- Table structure for m_kategori_instansi
-- ----------------------------
DROP TABLE IF EXISTS `m_kategori_instansi`;
CREATE TABLE `m_kategori_instansi`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama_kategori_instansi` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_kategori_instansi
-- ----------------------------
INSERT INTO `m_kategori_instansi` VALUES (2, 'Pemerintahan');
INSERT INTO `m_kategori_instansi` VALUES (3, 'Pendidikan');
INSERT INTO `m_kategori_instansi` VALUES (5, 'Sosial');

-- ----------------------------
-- Table structure for m_pegawai
-- ----------------------------
DROP TABLE IF EXISTS `m_pegawai`;
CREATE TABLE `m_pegawai`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `telp` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_jabatan` int(10) NULL DEFAULT NULL,
  `foto` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_pegawai
-- ----------------------------
INSERT INTO `m_pegawai` VALUES (1, '9999999', 'Admin', '0', '-', '-', 0, 'admin.png');
INSERT INTO `m_pegawai` VALUES (2, '8786724', 'Okki', '021843854', 'Jl.A', 'ok@mail.com', 3, '439429-download-free-my-chemical-romance-background-1920x1080.jpg');
INSERT INTO `m_pegawai` VALUES (3, '278424', 'Muryan', '02184375', 'Jl.Nangka', 'ryan@mail.com', 4, '19181952d241.jpg');

-- ----------------------------
-- Table structure for m_period
-- ----------------------------
DROP TABLE IF EXISTS `m_period`;
CREATE TABLE `m_period`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `period` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_period
-- ----------------------------
INSERT INTO `m_period` VALUES (1, '2018-08');
INSERT INTO `m_period` VALUES (2, '2019-07');

-- ----------------------------
-- Table structure for m_sub_kategori
-- ----------------------------
DROP TABLE IF EXISTS `m_sub_kategori`;
CREATE TABLE `m_sub_kategori`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(10) NULL DEFAULT NULL,
  `nama_sub_kategori` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 34 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_sub_kategori
-- ----------------------------
INSERT INTO `m_sub_kategori` VALUES (1, 1, 'Annual Report');
INSERT INTO `m_sub_kategori` VALUES (2, 1, 'Company Profile');
INSERT INTO `m_sub_kategori` VALUES (3, 1, 'Buku Sejarah Dahana');
INSERT INTO `m_sub_kategori` VALUES (4, 1, 'Flyer');
INSERT INTO `m_sub_kategori` VALUES (5, 1, 'Cover Contract');
INSERT INTO `m_sub_kategori` VALUES (6, 1, 'Sertifikat');
INSERT INTO `m_sub_kategori` VALUES (7, 1, 'Kartu');
INSERT INTO `m_sub_kategori` VALUES (8, 1, 'Plakat');
INSERT INTO `m_sub_kategori` VALUES (9, 1, 'Maket');
INSERT INTO `m_sub_kategori` VALUES (10, 1, 'Safety Card');
INSERT INTO `m_sub_kategori` VALUES (11, 1, 'Frame Foto');
INSERT INTO `m_sub_kategori` VALUES (12, 1, 'Banner');
INSERT INTO `m_sub_kategori` VALUES (13, 1, 'Name Card Holder');
INSERT INTO `m_sub_kategori` VALUES (14, 1, 'Kalung Name Card');
INSERT INTO `m_sub_kategori` VALUES (15, 1, 'Yoyo Name Card');
INSERT INTO `m_sub_kategori` VALUES (16, 2, 'T-Shirt');
INSERT INTO `m_sub_kategori` VALUES (17, 2, 'Topi');
INSERT INTO `m_sub_kategori` VALUES (18, 2, 'Pouch');
INSERT INTO `m_sub_kategori` VALUES (19, 2, 'MMT');
INSERT INTO `m_sub_kategori` VALUES (20, 2, 'Gift Set');
INSERT INTO `m_sub_kategori` VALUES (21, 2, 'Flashdisk Custom');
INSERT INTO `m_sub_kategori` VALUES (22, 2, 'Pulpen');
INSERT INTO `m_sub_kategori` VALUES (23, 2, 'Jepitan Dasi');
INSERT INTO `m_sub_kategori` VALUES (24, 2, 'Jam');
INSERT INTO `m_sub_kategori` VALUES (25, 2, 'Agenda');
INSERT INTO `m_sub_kategori` VALUES (26, 2, 'Goodie Bags');
INSERT INTO `m_sub_kategori` VALUES (27, 2, 'Notes');
INSERT INTO `m_sub_kategori` VALUES (28, 2, 'Handuk');
INSERT INTO `m_sub_kategori` VALUES (29, 2, 'Gantungan Kunci');
INSERT INTO `m_sub_kategori` VALUES (30, 2, 'Golf');
INSERT INTO `m_sub_kategori` VALUES (31, 2, 'Oleh - Oleh Khas');
INSERT INTO `m_sub_kategori` VALUES (32, 2, 'Box');
INSERT INTO `m_sub_kategori` VALUES (33, 3, 'Map');

-- ----------------------------
-- Table structure for m_user
-- ----------------------------
DROP TABLE IF EXISTS `m_user`;
CREATE TABLE `m_user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_pegawai` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `level` int(10) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_user
-- ----------------------------
INSERT INTO `m_user` VALUES (1, 'admin', 'YQ==', '1', 1);
INSERT INTO `m_user` VALUES (7, 'okki', 'YQ==', '2', 1);
INSERT INTO `m_user` VALUES (8, 'muryan', 'YQ==', '3', 2);

-- ----------------------------
-- Table structure for t_pengeluaran
-- ----------------------------
DROP TABLE IF EXISTS `t_pengeluaran`;
CREATE TABLE `t_pengeluaran`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `no_transaksi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_instansi` int(10) NULL DEFAULT NULL,
  `keterangan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `id_pegawai` int(10) NULL DEFAULT NULL,
  `date_assign` date NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 155 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_pengeluaran
-- ----------------------------
INSERT INTO `t_pengeluaran` VALUES (153, '201907290000001', 2, 'Sudah OK', 1, '2019-07-29');

-- ----------------------------
-- Table structure for t_pengeluaran_detail
-- ----------------------------
DROP TABLE IF EXISTS `t_pengeluaran_detail`;
CREATE TABLE `t_pengeluaran_detail`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `no_transaksi` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_barang` int(10) NULL DEFAULT NULL,
  `qty` int(10) NULL DEFAULT NULL,
  `source` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `keterangan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 42 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_pengeluaran_detail
-- ----------------------------
INSERT INTO `t_pengeluaran_detail` VALUES (40, '201907290000001', 62, 10, 'jkt', 'OK');
INSERT INTO `t_pengeluaran_detail` VALUES (41, '201907290000001', 3, 5, 'jkt', 'OK');

SET FOREIGN_KEY_CHECKS = 1;
