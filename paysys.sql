/*
 Navicat Premium Data Transfer

 Source Server         : webjx2
 Source Server Type    : MySQL
 Source Server Version : 50568
 Source Host           : 14.225.198.70:3306
 Source Schema         : paysys1

 Target Server Type    : MySQL
 Target Server Version : 50568
 File Encoding         : 65001

 Date: 31/01/2023 15:15:42
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for account
-- ----------------------------
CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL DEFAULT 'test03',
  `secpassword` varchar(64) NOT NULL DEFAULT 'e8c54b11d35825097bdbfccea0d16079',
  `password` varchar(64) NOT NULL DEFAULT 'a',
  `rowpass` varchar(32) DEFAULT 'a',
  `coin` int(20) NOT NULL DEFAULT '0',
  `full_name` varchar(32) DEFAULT NULL,
  `sex` varchar(20) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `address` varchar(64) DEFAULT NULL,
  `question` varchar(64) DEFAULT NULL,
  `answer` varchar(64) DEFAULT NULL,
  `qq` varchar(64) DEFAULT NULL,
  `tel` int(16) DEFAULT NULL,
  `avatar` text,
  `profile_id` varchar(32) DEFAULT NULL,
  `profile_image_url` varchar(255) DEFAULT NULL,
  `id_type` enum('IdCard') DEFAULT 'IdCard',
  `id_card` varchar(32) DEFAULT NULL,
  `ip` varchar(32) DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `trytocard` int(1) NOT NULL DEFAULT '0',
  `changepwdret` int(1) NOT NULL DEFAULT '0',
  `active` int(1) NOT NULL DEFAULT '1',
  `LockPassword` int(11) NOT NULL DEFAULT '0',
  `trytohack` int(1) NOT NULL DEFAULT '0',
  `newlocked` int(1) NOT NULL DEFAULT '0',
  `locked` int(1) NOT NULL DEFAULT '0',
  `LastLoginIP` int(11) NOT NULL DEFAULT '0',
  `PasspodMode` int(11) NOT NULL DEFAULT '0',
  `email` varchar(64) NOT NULL DEFAULT 'admin@loliteam.net',
  `cmnd` int(9) NOT NULL DEFAULT '123456780',
  `phone` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `dob` date DEFAULT NULL,
  `dateCreate` int(20) DEFAULT NULL,
  `lockedTime` datetime DEFAULT NULL,
  `testcoin` int(11) NOT NULL DEFAULT '9999999',
  `lockedCoin` int(10) NOT NULL DEFAULT '0',
  `bklactivenew` int(5) NOT NULL DEFAULT '0',
  `bklactive` int(5) NOT NULL DEFAULT '0',
  `nExtpoin1` int(5) NOT NULL DEFAULT '0',
  `nExtpoin2` int(5) NOT NULL DEFAULT '0',
  `nExtpoin4` int(5) NOT NULL DEFAULT '0',
  `nExtpoin5` int(5) NOT NULL DEFAULT '0',
  `nExtpoin6` int(5) NOT NULL DEFAULT '0',
  `nExtpoin7` int(5) NOT NULL DEFAULT '0',
  `scredit` int(10) NOT NULL DEFAULT '0',
  `nTimeActiveBKL` int(10) NOT NULL DEFAULT '0',
  `nLockTimeCard` int(15) NOT NULL DEFAULT '0',
  `kichhoat` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
--
-- Cấu trúc bảng cho bảng `dos_session`
--
CREATE TABLE `dos_ip` (
  `ip` varchar(15) NOT NULL,
  `requested_on` int(10) UNSIGNED NOT NULL,
  `request_uri` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=MEMORY DEFAULT CHARSET=latin1 COMMENT='lÆ°u ip request';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dos_session`
--

CREATE TABLE `dos_session` (
  `session_id` varchar(45) NOT NULL,
  `requested_on` int(10) UNSIGNED NOT NULL,
  `request_uri` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=MEMORY DEFAULT CHARSET=latin1 COMMENT='lÆ°u thÃ´ng tin session request';

-- --------------------------------------------------------

-- ----------------------------
-- Table structure for account_history
-- ----------------------------
DROP TABLE IF EXISTS `account_history`;
CREATE TABLE `account_history`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `timeDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES (1, 'admin', '4297f44b13955235245b2497399d7a93');

SET FOREIGN_KEY_CHECKS = 1;
