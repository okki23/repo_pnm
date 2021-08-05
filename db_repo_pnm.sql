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

 Date: 05/08/2021 20:38:18
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
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dosen
-- ----------------------------
INSERT INTO `dosen` VALUES (1, '1101110009', 'Okki Setyawan', 'L', '0219345435', 'Bekasi', 'okkisetyawan@gmail.com', '0cc175b9c0f1b6a831c399e269772661');

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
-- Table structure for m_user
-- ----------------------------
DROP TABLE IF EXISTS `m_user`;
CREATE TABLE `m_user`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_pegawai` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `level` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of m_user
-- ----------------------------
INSERT INTO `m_user` VALUES (1, 'admin', 'YQ==', '1', 1);
INSERT INTO `m_user` VALUES (7, 'okki', 'YQ==', '2', 1);
INSERT INTO `m_user` VALUES (8, 'muryan', 'YQ==', '3', 2);

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
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mahasiswa
-- ----------------------------
INSERT INTO `mahasiswa` VALUES (1, '14002429', 'Okki Setyawan', 'L', '0218945943', 'Bekasi', 'okkisetyawan@gmail.com', '0cc175b9c0f1b6a831c399e269772661');

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
  `file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nomor_induk_approval` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_repository
-- ----------------------------
INSERT INTO `t_repository` VALUES (1, '1', 'Pembangunan Sistem Informasi WEB GIS', '1101110009', 'Okki Setyawan', NULL, NULL, NULL, NULL, '2021', '93242', '8934573', NULL, NULL, '2', 'HGCI', '1101110009-Okki Setyawan-Pembangunan Sistem Informasi WEB GIS.pdf', NULL);
INSERT INTO `t_repository` VALUES (2, '2', 'ttgtg', '1101110009', 'undefined', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1101110009-undefined-ttgtg.', NULL);
INSERT INTO `t_repository` VALUES (3, '2', 'sfwe', '1101110009', 'fggf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1101110009-fggf-sfwe.', NULL);
INSERT INTO `t_repository` VALUES (4, '2', 'Makan nasi', '1101110009', 'okki', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1101110009-okki-Makan nasi.', NULL);
INSERT INTO `t_repository` VALUES (5, '2', 'TERTE', '1101110009', 'trtr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1101110009-trtr-TERTE.pdf', NULL);
INSERT INTO `t_repository` VALUES (6, '2', 'asda', '1101110009', 'fsfs', NULL, NULL, NULL, '2020-09-09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1101110009-fsfs-asda.pdf', NULL);
INSERT INTO `t_repository` VALUES (7, '2', 'ad', '1101110009', 'er', NULL, NULL, NULL, '2022-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1101110009-er-ad.pdf', NULL);
INSERT INTO `t_repository` VALUES (8, '3', NULL, '1101110009', 'dgd', 'et', 'fg', '2020-02-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1101110009-dgd-sdfs.', NULL);
INSERT INTO `t_repository` VALUES (9, '3', NULL, '1101110009', 'rgd', 'dfg', 'dgd', '2020-02-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1101110009-rgd-erw3.pdf', NULL);
INSERT INTO `t_repository` VALUES (10, '3', 'ger', '1101110009', 'wer', 'ytuyt', 'er', '2020-02-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1101110009-wer-ger.pdf', NULL);

SET FOREIGN_KEY_CHECKS = 1;
