/*
 Navicat Premium Data Transfer

 Source Server         : curio
 Source Server Type    : MySQL
 Source Server Version : 50720
 Source Host           : localhost
 Source Database       : curio

 Target Server Type    : MySQL
 Target Server Version : 50720
 File Encoding         : utf-8

 Date: 12/07/2017 17:58:54 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `curio_banner`
-- ----------------------------
DROP TABLE IF EXISTS `curio_banner`;
CREATE TABLE `curio_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `url_en` varchar(512) DEFAULT NULL COMMENT '链接英文',
  `url_tc` varchar(512) DEFAULT NULL COMMENT '链接繁体',
  `pic` varchar(255) DEFAULT '' COMMENT '图片',
  `sort` int(8) DEFAULT '0' COMMENT '排序。数值越大，越靠前',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='首页轮播图';

-- ----------------------------
--  Records of `curio_banner`
-- ----------------------------
BEGIN;
INSERT INTO `curio_banner` VALUES ('1', '123', '321', 'http://dev.curio.com/public/banner/index/1512293925.jpg', '4'), ('2', '213', '321', 'http://dev.curio.com/public/banner/index/1512293949.jpg', '3');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
