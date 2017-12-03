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

 Date: 12/03/2017 20:07:14 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `curio_content`
-- ----------------------------
DROP TABLE IF EXISTS `curio_content`;
CREATE TABLE `curio_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `title_en` varchar(255) DEFAULT NULL COMMENT '名称英文',
  `title_tc` varchar(255) DEFAULT NULL COMMENT '名称繁体',
  `clazz_id` int(11) DEFAULT '0' COMMENT '分类id',
  `pic` varchar(255) DEFAULT NULL COMMENT '封面图',
  `content_en` longtext COMMENT '内容英文',
  `content_tc` longtext COMMENT '内容繁体',
  `author` varchar(64) DEFAULT NULL COMMENT '作者',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间戳',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间戳',
  `create_userid` int(11) DEFAULT NULL COMMENT '创建者id',
  `update_userid` int(11) DEFAULT NULL COMMENT '更新者id',
  `descript_en` longtext,
  `descript_tc` longtext,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='内容表';

-- ----------------------------
--  Records of `curio_content`
-- ----------------------------
BEGIN;
INSERT INTO `curio_content` VALUES ('1', 'b1', 'b1tc', '4', 'http://dev.curio.com/public/content/img/1512211585.jpg', '<p class=\"MsoNormal\" style=\"font-family: Arial, Verdana, sans-serif; font-size: 12px;\"><strong><span style=\"color: rgb(142, 26, 29);\"><span style=\"font-family: Arial;\"><span style=\"font-size: xx-large;\">L&amp;H</span></span></span></strong><strong><span style=\"font-family: Arial;\"><span style=\"font-size: xx-large;\">&nbsp;2017 Autumn Auction</span></span></strong><span style=\"font-family: Arial;\"><span style=\"font-size: xx-large;\"><br></span></span></p><p style=\"font-family: Arial, Verdana, sans-serif; font-size: 12px;\"><span style=\"font-size: medium;\">L&amp;H 2017 Autumn Auctions will be held on 26th Nov 2017 at&nbsp;The Residence, Mezzanine Level, Grand Hyatt Hong Kong.&nbsp;Four respective auctions will take place during the sale, including Vintage Pu-er Tea Auction, Tea Wares &amp; Agarwood Auction, Vintage Camera and&nbsp;Delicacies &amp;&nbsp;Wine&nbsp;Auction.&nbsp;</span></p><h3 style=\"color: rgb(0, 0, 0); font-family: Arial, Verdana, sans-serif;\"><strong><span style=\"font-size: medium;\">Auction:&nbsp;</span></strong><strong><span style=\"font-size: medium;\"><span style=\"color: rgb(142, 26, 29);\"><span style=\"font-size: x-large;\">26</span></span>th</span></strong><strong style=\"font-size: 12px;\"><span style=\"font-size: medium;\">&nbsp;<span style=\"color: rgb(142, 26, 29);\"><span style=\"font-size: x-large;\">NOV 2</span></span></span></strong><strong style=\"font-size: 12px;\"><span style=\"font-size: medium;\"><span style=\"font-size: x-large;\"><span style=\"color: rgb(142, 26, 29);\">017</span></span></span></strong><strong style=\"font-size: 12px;\"><span style=\"color: rgb(142, 26, 29);\">&nbsp;</span></strong></h3><h3 style=\"color: rgb(0, 0, 0); font-family: Arial, Verdana, sans-serif;\"><strong><span style=\"font-size: medium;\">Viewing:&nbsp;<span style=\"color: rgb(142, 26, 29);\"><span style=\"font-size: x-large;\">25</span></span>th -&nbsp;</span></strong><strong style=\"font-size: 12px;\"><span style=\"color: rgb(142, 26, 29); font-size: x-large;\">26</span><font size=\"3\">th</font></strong><strong style=\"font-size: 12px;\"><span style=\"font-size: medium;\">&nbsp;<span style=\"color: rgb(142, 26, 29);\"><span style=\"font-size: x-large;\">NOV 2017</span></span></span></strong><strong style=\"font-size: 12px;\"><span style=\"color: rgb(142, 26, 29);\">&nbsp;&nbsp;</span></strong><span style=\"font-size: medium;\"><strong><span style=\"color: rgb(142, 26, 29);\">&nbsp;</span></strong></span></h3><h3 style=\"color: rgb(0, 0, 0); font-family: Arial, Verdana, sans-serif;\"><span style=\"font-size: medium;\">Venue: The Residence, Mezzanine Level, Grand Hyatt&nbsp;</span><span style=\"font-size: medium;\"><br><span style=\"font-size: small;\">(1 Harbour Road, Hong Kong)</span></span><img src=\"http://lhauction.com.hk/site_upload/userfiles/2_Contents3.jpg\" _fcksavedurl=\"/site_upload/userfiles/2_Contents3.jpg\" width=\"650\" height=\"833\" longdesc=\"http://lhauction.com.hk/admin/fckeditor/editor/undefined\" alt=\"\"></h3><h3 style=\"color: rgb(0, 0, 0); font-family: Arial, Verdana, sans-serif;\">&nbsp;</h3><h3 style=\"color: rgb(0, 0, 0); font-family: Arial, Verdana, sans-serif;\">&nbsp;</h3>', '<p class=\"MsoNormal\" style=\"font-family: Arial, Verdana, sans-serif; font-size: 12px;\"><strong><span style=\"color: rgb(142, 26, 29);\"><span style=\"font-family: Arial;\"><span style=\"font-size: xx-large;\">L&amp;H</span></span></span></strong><strong><span style=\"font-family: Arial;\"><span style=\"font-size: xx-large;\">&nbsp;2017 Autumn Auction</span></span></strong><span style=\"font-family: Arial;\"><span style=\"font-size: xx-large;\"><br></span></span></p><p style=\"font-family: Arial, Verdana, sans-serif; font-size: 12px;\"><span style=\"font-size: medium;\">L&amp;H 2017 Autumn Auctions will be held on 26th Nov 2017 at&nbsp;The Residence, Mezzanine Level, Grand Hyatt Hong Kong.&nbsp;Four respective auctions will take place during the sale, including Vintage Pu-er Tea Auction, Tea Wares &amp; Agarwood Auction, Vintage Camera and&nbsp;Delicacies &amp;&nbsp;Wine&nbsp;Auction.&nbsp;</span></p><h3 style=\"color: rgb(0, 0, 0); font-family: Arial, Verdana, sans-serif;\"><strong><span style=\"font-size: medium;\">Auction:&nbsp;</span></strong><strong><span style=\"font-size: medium;\"><span style=\"color: rgb(142, 26, 29);\"><span style=\"font-size: x-large;\">26</span></span>th</span></strong><strong style=\"font-size: 12px;\"><span style=\"font-size: medium;\">&nbsp;<span style=\"color: rgb(142, 26, 29);\"><span style=\"font-size: x-large;\">NOV 2</span></span></span></strong><strong style=\"font-size: 12px;\"><span style=\"font-size: medium;\"><span style=\"font-size: x-large;\"><span style=\"color: rgb(142, 26, 29);\">017</span></span></span></strong><strong style=\"font-size: 12px;\"><span style=\"color: rgb(142, 26, 29);\">&nbsp;</span></strong></h3><h3 style=\"color: rgb(0, 0, 0); font-family: Arial, Verdana, sans-serif;\"><strong><span style=\"font-size: medium;\">Viewing:&nbsp;<span style=\"color: rgb(142, 26, 29);\"><span style=\"font-size: x-large;\">25</span></span>th -&nbsp;</span></strong><strong style=\"font-size: 12px;\"><span style=\"color: rgb(142, 26, 29); font-size: x-large;\">26</span><font size=\"3\">th</font></strong><strong style=\"font-size: 12px;\"><span style=\"font-size: medium;\">&nbsp;<span style=\"color: rgb(142, 26, 29);\"><span style=\"font-size: x-large;\">NOV 2017</span></span></span></strong><strong style=\"font-size: 12px;\"><span style=\"color: rgb(142, 26, 29);\">&nbsp;&nbsp;</span></strong><span style=\"font-size: medium;\"><strong><span style=\"color: rgb(142, 26, 29);\">&nbsp;</span></strong></span></h3><h3 style=\"color: rgb(0, 0, 0); font-family: Arial, Verdana, sans-serif;\"><span style=\"font-size: medium;\">Venue: The Residence, Mezzanine Level, Grand Hyatt&nbsp;</span><span style=\"font-size: medium;\"><br><span style=\"font-size: small;\">(1 Harbour Road, Hong Kong)</span></span><img src=\"http://lhauction.com.hk/site_upload/userfiles/2_Contents3.jpg\" _fcksavedurl=\"/site_upload/userfiles/2_Contents3.jpg\" width=\"650\" height=\"833\" longdesc=\"http://lhauction.com.hk/admin/fckeditor/editor/undefined\" alt=\"\"></h3><h3 style=\"color: rgb(0, 0, 0); font-family: Arial, Verdana, sans-serif;\">&nbsp;</h3><h3 style=\"color: rgb(0, 0, 0); font-family: Arial, Verdana, sans-serif;\">&nbsp;</h3>', 'admin', '1512211673', '1512288950', '1', '1', 'en', '\n仕宏2017春季拍賣會已於5月28日假香港君悅酒店君寓廳圓滿落槌，共舉行五項專場拍賣：「鑾器天香 - 茶道·香道·花器專場」、「足吾所好 - 古董級普洱茶及佳茗專場」、「御養尚品 - 補品及佳釀專場」、「鐵硯春秋 - 中國書畫專場」及「中國書畫 （二）專場」。 仕宏拍賣將會繼續為收藏家搜羅更多不同的珍貴拍品，在下一屆拍賣會舉辦前，請繼續留意仕宏拍賣網頁、Facebook及微信的更新。');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
