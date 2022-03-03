/*
 Navicat Premium Data Transfer

 Source Server         : Localhost
 Source Server Type    : MySQL
 Source Server Version : 50724
 Source Host           : localhost:3306
 Source Schema         : tugas_toko

 Target Server Type    : MySQL
 Target Server Version : 50724
 File Encoding         : 65001

 Date: 03/03/2022 12:59:25
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for menus
-- ----------------------------
DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `desc` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `pic` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `price` int(255) NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of menus
-- ----------------------------
INSERT INTO `menus` VALUES (1, 'Menu 1', 'Menu 1 desccc', 'assets/menus/1646283499_2f2902ab0c3d78ccf6d8a7d03b2b148b.jpg', 10000, NULL, '2022-03-03 04:16:19', NULL, '2022-03-03 04:58:19');
INSERT INTO `menus` VALUES (2, 'Menu 2', 'Menu 2 desc', 'assets/menus/1646281428_2f2902ab0c3d78ccf6d8a7d03b2b148b.jpg', 10000, NULL, '2022-03-03 04:23:48', NULL, '2022-03-03 04:23:48');

-- ----------------------------
-- Table structure for receipt_details
-- ----------------------------
DROP TABLE IF EXISTS `receipt_details`;
CREATE TABLE `receipt_details`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `receipt_id` int(11) NULL DEFAULT NULL,
  `menu_id` int(11) NULL DEFAULT NULL,
  `qty` int(255) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of receipt_details
-- ----------------------------
INSERT INTO `receipt_details` VALUES (4, 1, 2, 1, '2022-03-03 05:42:18', '2022-03-03 05:42:18');
INSERT INTO `receipt_details` VALUES (6, 1, 1, 1, '2022-03-03 05:47:30', '2022-03-03 05:47:30');
INSERT INTO `receipt_details` VALUES (7, 2, 1, 1, '2022-03-03 05:56:57', '2022-03-03 05:56:57');

-- ----------------------------
-- Table structure for receipts
-- ----------------------------
DROP TABLE IF EXISTS `receipts`;
CREATE TABLE `receipts`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` int(1) NULL DEFAULT 0,
  `created_by` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of receipts
-- ----------------------------
INSERT INTO `receipts` VALUES (1, '0001', 1, NULL, '2022-03-03 05:25:16', NULL, '2022-03-03 05:53:18');
INSERT INTO `receipts` VALUES (2, '0002', 0, NULL, '2022-03-03 05:25:19', NULL, '2022-03-03 05:25:19');

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'Owner', '2022-03-03 10:18:59', '2022-03-03 10:19:02');
INSERT INTO `roles` VALUES (2, 'Karyawan', '2022-03-03 10:19:11', '2022-03-03 10:19:14');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `role_id` int(11) NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'owner', '$2y$10$rsvM06vc4FK9iWB5Q4KnnOp6HtVZ/GSYSSOJkOuWaFOlFRu/tNjCq', 'owner', 1, NULL, '2022-03-03 10:19:50', NULL, '2022-03-03 04:30:36');
INSERT INTO `users` VALUES (2, 'karyawan', '$2y$10$NOYu6tUcxLujFCu1DDPSFuG6puonEulFDkf8eP8GJ8GmMNF80kGVu', 'karyawan', 2, 1, '2022-03-03 10:20:13', NULL, '2022-03-03 04:30:51');
INSERT INTO `users` VALUES (6, 'karyawan2', '$2y$10$ZsIcHUFg0TXwVMT2oi.BXeD0YuPjcAYzG6WIpbD1De0XM7AAmjAqy', 'karyawan2', 2, NULL, '2022-03-03 05:23:57', NULL, '2022-03-03 05:23:57');

SET FOREIGN_KEY_CHECKS = 1;
