/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50538
Source Host           : localhost:3306
Source Database       : lovewall

Target Server Type    : MYSQL
Target Server Version : 50538
File Encoding         : 65001

Date: 2017-06-06 17:30:50
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usr` varchar(16) DEFAULT NULL,
  `pwd` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'admin', 'admin');

-- ----------------------------
-- Table structure for `love`
-- ----------------------------
DROP TABLE IF EXISTS `love`;
CREATE TABLE `love` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `receiver` varchar(16) NOT NULL,
  `info` text NOT NULL,
  `name` varchar(16) NOT NULL DEFAULT '匿名',
  `ip` char(16) NOT NULL DEFAULT '127.0.0.1',
  `time` int(11) NOT NULL,
  `icon` int(11) NOT NULL,
  `face` int(11) NOT NULL,
  `display` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of love
-- ----------------------------
INSERT INTO `love` VALUES ('1', '陈洁鸿', '陈洁鸿,我一直都很喜欢你!', '匿名', '127.0.0.1', '1495698992', '1', '1', '0');
INSERT INTO `love` VALUES ('2', '的撒大是大是', '的撒大是', '匿名', '127.0.0.1', '1495705439', '0', '0', '1');
INSERT INTO `love` VALUES ('3', '接收人', '字条内容', '发送人', '127.0.0.1', '1495705484', '5', '3', '1');
INSERT INTO `love` VALUES ('4', '接收人', '字条内容', '发送人', '127.0.0.1', '1495705583', '10', '5', '1');
INSERT INTO `love` VALUES ('5', '', '撒', '匿名', '127.0.0.1', '1495705625', '0', '0', '0');
INSERT INTO `love` VALUES ('6', '打算的撒', '的撒的', '匿名', '127.0.0.1', '1496734021', '0', '0', '0');
