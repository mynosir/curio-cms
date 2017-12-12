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

 Date: 12/07/2017 18:00:19 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `curio_notice`
-- ----------------------------
DROP TABLE IF EXISTS `curio_notice`;
CREATE TABLE `curio_notice` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `content_en` varchar(512) DEFAULT NULL COMMENT '站内通知英文',
  `content_tc` varchar(512) DEFAULT NULL COMMENT '站内通知繁体',
  `url_en` varchar(512) DEFAULT NULL COMMENT '跳转链接英文',
  `url_tc` varchar(512) DEFAULT NULL COMMENT '跳转链接繁体',
  `sort` int(8) DEFAULT '0' COMMENT '排序。数值越大，越靠前',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='站内通知表';

-- ----------------------------
--  Records of `curio_notice`
-- ----------------------------
BEGIN;
INSERT INTO `curio_notice` VALUES ('1', '仕宏2017年秋季拍賣會將於5月28日假香港君悅酒店舉行，歡迎蒞臨參觀，參與競投。', 'weqweqwjioj', '123', '321', '5');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
