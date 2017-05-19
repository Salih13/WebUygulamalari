/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50711
Source Host           : 127.0.0.1:3306
Source Database       : anil

Target Server Type    : MYSQL
Target Server Version : 50711
File Encoding         : 65001

Date: 2016-05-13 23:22:51
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for haberler
-- ----------------------------
DROP TABLE IF EXISTS `haberler`;
CREATE TABLE `haberler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `content` text COLLATE utf8_turkish_ci,
  `user` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- ----------------------------
-- Records of haberler
-- ----------------------------
INSERT INTO `haberler` VALUES ('3', 'asdaasdfasdf', 'asdfasdfasdfasdf', 'testanil', '2016-05-13 23:08:43');

-- ----------------------------
-- Table structure for uyeler
-- ----------------------------
DROP TABLE IF EXISTS `uyeler`;
CREATE TABLE `uyeler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(45) NOT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `register_date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin5;

-- ----------------------------
-- Records of uyeler
-- ----------------------------
INSERT INTO `uyeler` VALUES ('1', 'testanil', '89f99f0c91f58499649dd850dab18281', 'testanil@test.com', 'testanil', 'testanil', '2016-05-13 01:42:48');
INSERT INTO `uyeler` VALUES ('2', 'sdasdasd', 'c6fe2ee4ed8248e0897e3e370754c2cb', 'sadasd@hotmail.com', 'asdasdas', 'dasda', '2016-05-13 01:48:50');

-- ----------------------------
-- Table structure for yorumlar
-- ----------------------------
DROP TABLE IF EXISTS `yorumlar`;
CREATE TABLE `yorumlar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `user` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- ----------------------------
-- Records of yorumlar
-- ----------------------------
INSERT INTO `yorumlar` VALUES ('1', 'test', 'testanil', '2016-05-13 01:43:19');
INSERT INTO `yorumlar` VALUES ('2', 'de2wfrqewgfweg', 'sdasdasd', '2016-05-13 01:49:12');
INSERT INTO `yorumlar` VALUES ('4', 'DSFGDFSGDSFGDSGFDSGFDFG', 'Ziyaretçi', '2016-05-13 22:21:25');
INSERT INTO `yorumlar` VALUES ('5', 'gfsdfgsdgf', 'testanil', '2016-05-13 22:22:05');
