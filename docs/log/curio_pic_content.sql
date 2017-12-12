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

 Date: 12/07/2017 18:00:35 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `curio_pic_content`
-- ----------------------------
DROP TABLE IF EXISTS `curio_pic_content`;
CREATE TABLE `curio_pic_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `title_en` varchar(255) DEFAULT NULL COMMENT '名称英文',
  `title_tc` varchar(255) DEFAULT NULL COMMENT '名称繁体',
  `pic` varchar(512) DEFAULT NULL COMMENT '图片json',
  `num` varchar(255) DEFAULT NULL COMMENT '标号',
  `prize_en` varchar(255) DEFAULT NULL COMMENT '价格英文',
  `prize_tc` varchar(255) DEFAULT NULL COMMENT '价格繁体',
  `size_en` varchar(255) DEFAULT NULL COMMENT '尺寸英文',
  `size_tc` varchar(255) DEFAULT NULL COMMENT '尺寸繁体',
  `standard_en` varchar(512) DEFAULT NULL COMMENT '规格英文',
  `standard_tc` varchar(512) DEFAULT NULL COMMENT '规格中文',
  `descript_en` longtext COMMENT '描述英文',
  `descript_tc` longtext COMMENT '描述繁体',
  `sort` int(8) DEFAULT '0' COMMENT '排序。数值越大，越靠前',
  `clazz_id` int(11) DEFAULT NULL COMMENT '分類id',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  `pdf` varchar(255) DEFAULT NULL COMMENT 'pdf',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='图录内容表';

-- ----------------------------
--  Records of `curio_pic_content`
-- ----------------------------
BEGIN;
INSERT INTO `curio_pic_content` VALUES ('1', 'SUNTORY HIBIKI 30 YEARS BLENDED JAPANESE WHISKY', '響 三十年 日本威士忌', 'http://dev.curio.com/public/pic_content/img/1512214612t34wnqy9.jpg,http://dev.curio.com/public/pic_content/img/1512214616pbyodtt9.jpg,http://dev.curio.com/public/pic_content/img/15122146164rr8xa0f.jpg', '551', '28000-40000', '0', null, null, null, null, '<p>產地：日本數量：2瓶容量：700毫升(ABV 43%)三得利「響30」由日本最具歷史的山崎威士忌蒸餾廠，以熟成30年的麥芽調和而成，每瓶刻印出廠編號，以30切割面水晶瓶及金箔封印。此酒曾獲世界最佳調和威士忌獎。<br></p>', '<p>產地：日本數量：2瓶容量：700毫升(ABV 43%)三得利「響30」由日本最具歷史的山崎威士忌蒸餾廠，以熟成30年的麥芽調和而成，每瓶刻印出廠編號，以30切割面水晶瓶及金箔封印。此酒曾獲世界最佳調和威士忌獎。<br></p>', '100', '11', null, null, null), ('5', 'f3-3', 'f3-3', 'http://dev.curio.com/public/pic_content/img/1512286639pcvk8r91.jpg', '111', '', '', null, null, null, null, '<p>123</p>', '<p>321</p>', '100', '13', null, null, null), ('2', 'SUNTORY HIBIKI 30 YEARS BLENDED JAPANESE WHISKY', '響 三十年 日本威士忌', 'http://dev.curio.com/public/pic_content/img/1512214612t34wnqy9.jpg,http://dev.curio.com/public/pic_content/img/1512214616pbyodtt9.jpg,http://dev.curio.com/public/pic_content/img/15122146164rr8xa0f.jpg', '551', '28000-40000', '0', null, null, null, null, '<p>產地：日本數量：2瓶容量：700毫升(ABV 43%)三得利「響30」由日本最具歷史的山崎威士忌蒸餾廠，以熟成30年的麥芽調和而成，每瓶刻印出廠編號，以30切割面水晶瓶及金箔封印。此酒曾獲世界最佳調和威士忌獎。<br></p>', '<p>產地：日本數量：2瓶容量：700毫升(ABV 43%)三得利「響30」由日本最具歷史的山崎威士忌蒸餾廠，以熟成30年的麥芽調和而成，每瓶刻印出廠編號，以30切割面水晶瓶及金箔封印。此酒曾獲世界最佳調和威士忌獎。<br></p>', '100', '11', null, null, null), ('3', 'SUNTORY HIBIKI 30 YEARS BLENDED JAPANESE WHISKY', '響 三十年 日本威士忌', 'http://dev.curio.com/public/pic_content/img/1512214612t34wnqy9.jpg,http://dev.curio.com/public/pic_content/img/15122146164rr8xa0f.jpg', '551', '28000-40000', '響 三十年 日本威士忌', null, null, null, null, '<p>For detailed information, please refer to Chinese site<br></p>', '<p>產地：日本數量：2瓶容量：700毫升(ABV 43%)三得利「響30」由日本最具歷史的山崎威士忌蒸餾廠，以熟成30年的麥芽調和而成，每瓶刻印出廠編號，以30切割面水晶瓶及金箔封印。此酒曾獲世界最佳調和威士忌獎。<br></p>', '100', '11', null, null, null), ('4', 'f2-2', 'f2-2', 'http://dev.curio.com/public/pic_content/img/1512218429w4q7eotr.jpg', '101', '', '', null, null, null, null, '<p><br></p>', '<p><br></p>', '100', '12', null, null, null);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
