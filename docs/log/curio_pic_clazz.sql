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

 Date: 12/03/2017 20:07:37 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `curio_pic_clazz`
-- ----------------------------
DROP TABLE IF EXISTS `curio_pic_clazz`;
CREATE TABLE `curio_pic_clazz` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `name_en` varchar(255) DEFAULT NULL COMMENT '分类英文',
  `name_tc` varchar(255) DEFAULT NULL COMMENT '分类繁体',
  `parent_id` int(11) DEFAULT '0' COMMENT '父级分类id',
  `sort` int(8) DEFAULT '0' COMMENT '排序。数值越大，越靠前',
  `clazz_id` int(11) DEFAULT NULL COMMENT '分类id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='图录分类表';

-- ----------------------------
--  Records of `curio_pic_clazz`
-- ----------------------------
BEGIN;
INSERT INTO `curio_pic_clazz` VALUES ('1', 'The 10th Auction, AUTUMN 2017', '第十屆－2017秋拍', '0', '5', null), ('2', 'The 9th Auction, SPRING 2017', '第九屆－2017春拍', '0', '6', null), ('3', 'The 8th Auction, AUTUMN 2016', '第八屆—2016秋拍', '0', '5', null), ('4', 'The 7th Auction, SPRING 2016', '第七屆—2016春拍', '0', '5', null), ('5', 'The 6th Auction, AUTUMN 2015', '第六屆—2015秋拍', '0', '5', null), ('6', 'The 5th Auction, SPRING 2015', '第五屆—2015春拍', '0', '5', null), ('7', 'The 4th Auction, AUTUMN 2014', '第四屆—2014秋拍', '0', '5', null), ('8', 'The 3rd Auction, SPRING 2014', '第三屆—2014春拍', '0', '5', null), ('9', 'The 2nd Auction, AUTUMN 2013', '第二屆—2013秋拍', '0', '5', null), ('10', 'The 1st Auction, SPRING 2013', '第一屆—2013春拍', '0', '5', null), ('11', 'Tea Wares & Agarwood Auction [Full Catalogue]', '鑾器天香 – 茶道.香道.花器專場【完整圖錄】', '1', '5', null), ('12', 'f2', 'f2', '1', '5', null), ('13', 'f3', 'f3', '2', '5', null);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
