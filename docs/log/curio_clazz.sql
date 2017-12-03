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

 Date: 12/03/2017 20:07:07 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `curio_clazz`
-- ----------------------------
DROP TABLE IF EXISTS `curio_clazz`;
CREATE TABLE `curio_clazz` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `name_en` varchar(255) DEFAULT NULL COMMENT '分类英文',
  `name_tc` varchar(255) DEFAULT NULL COMMENT '分类繁体',
  `parent_id` int(11) DEFAULT '0' COMMENT '父级分类id',
  `sort` int(8) DEFAULT '0' COMMENT '排序。数值越大，越靠前',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='内容分类表';

-- ----------------------------
--  Records of `curio_clazz`
-- ----------------------------
BEGIN;
INSERT INTO `curio_clazz` VALUES ('1', 'PRESS RELEASE AND PHOTO ALBUM', '新聞稿及相冊', '0', '5'), ('2', 'IN THE NEWS', '媒體報導', '0', '5'), ('3', '2013-06-22 - Auction 1', '2013-06-22 - 第一屆拍賣會', '1', '5'), ('4', 'upcoming auction', '今日拍賣', '0', '5');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
