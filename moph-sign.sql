/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50717
Source Host           : localhost:3306
Source Database       : moph-sign

Target Server Type    : MYSQL
Target Server Version : 50717
File Encoding         : 65001

Date: 2017-09-06 18:22:52
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for department
-- ----------------------------
DROP TABLE IF EXISTS `department`;
CREATE TABLE `department` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of department
-- ----------------------------
INSERT INTO `department` VALUES ('1', 'กลุ่มพัฒนามาตราฐานและบริการคอมพิวเตอร์');
INSERT INTO `department` VALUES ('2', 'ฝ่ายบริหารงานทั่วไป');
INSERT INTO `department` VALUES ('3', 'กลุ่มคอมพิวเตอร์และเครือข่าย');
INSERT INTO `department` VALUES ('5', 'กลุ่มพัฒนาการบริหารข้อมูล');
INSERT INTO `department` VALUES ('6', 'กลุ่มบริหารเทคโนโลยีสารสนเทศเพื่อการจัดการ');
INSERT INTO `department` VALUES ('7', 'กลุ่มผู้อำนวยการ ศูนย์เทคโนโลยีสารสนเทศและการสื่อสาร');

-- ----------------------------
-- Table structure for log
-- ----------------------------
DROP TABLE IF EXISTS `log`;
CREATE TABLE `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` varchar(13) NOT NULL,
  `time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `inout` varchar(20) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of log
-- ----------------------------
INSERT INTO `log` VALUES ('33', '1100400728564', '2017-08-24 13:52:17', 'in', '');
INSERT INTO `log` VALUES ('34', '1100400728564', '2017-08-24 13:52:38', 'out', '');
INSERT INTO `log` VALUES ('37', '1269900203174', '2017-08-24 08:29:11', 'in', null);
INSERT INTO `log` VALUES ('38', '1269900203174', '2017-08-24 16:40:00', 'out', null);
INSERT INTO `log` VALUES ('39', '1100400728564', '2017-09-06 08:29:22', 'in', null);

-- ----------------------------
-- Table structure for position
-- ----------------------------
DROP TABLE IF EXISTS `position`;
CREATE TABLE `position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of position
-- ----------------------------
INSERT INTO `position` VALUES ('1', 'นักวิชาการคอมพิวเตอร์');
INSERT INTO `position` VALUES ('2', 'นักบริหารงานทั่วไป');

-- ----------------------------
-- Table structure for type
-- ----------------------------
DROP TABLE IF EXISTS `type`;
CREATE TABLE `type` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of type
-- ----------------------------
INSERT INTO `type` VALUES ('1', 'ข้าราชการ');
INSERT INTO `type` VALUES ('2', 'พนักงานราชการ');
INSERT INTO `type` VALUES ('3', 'เจ้าหน้าที่เหมาจ่าย');
INSERT INTO `type` VALUES ('4', 'เจ้าหน้าที่บริษัท');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `cid` varchar(13) NOT NULL,
  `prename` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `depid` int(5) NOT NULL,
  `pid` int(5) NOT NULL,
  `type` int(5) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'นางสาว', 'วันเพ็ญ', 'เบญจวิกรัย', '2', '1', '1', '1');
INSERT INTO `user` VALUES ('1100400728564', 'นาย', 'ณภัทรวัฒน์', 'สามพวงทอง', '1', '1', '4', '1');
INSERT INTO `user` VALUES ('1111111111111', 'นาย', 'เทส', 'เทส', '2', '2', '1', '1');
INSERT INTO `user` VALUES ('1269900203174', 'นาย', 'กัญจน์', 'เข็มนาค', '3', '1', '2', '1');
INSERT INTO `user` VALUES ('1509901041302', 'นางสาว', 'ศิรินทร์ญา', 'อนุพงค์', '1', '1', '3', '1');
INSERT INTO `user` VALUES ('2', 'นางสาว', 'สวพร', 'ใบศรี', '1', '2', '1', '1');

-- ----------------------------
-- View structure for view_log
-- ----------------------------
DROP VIEW IF EXISTS `view_log`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_log` AS select `u`.`cid` AS `cid`,`u`.`prename` AS `prename`,`u`.`name` AS `name`,`u`.`lname` AS `lname`,`logall`.`date` AS `date`,`logall`.`time_in` AS `time_in`,`logall`.`time_out` AS `time_out`,`logall`.`note` AS `note` from (`moph-sign`.`user` `u` left join (select `log`.`cid` AS `cid`,substr(`log`.`time`,1,10) AS `date`,if((substr(`log`.`in_out`,1,2) = 'in'),substr(`log`.`time`,12,8),NULL) AS `time_in`,if((substr(`log`.`in_out`,4,3) = 'out'),substr(`log`.`time`,32,8),NULL) AS `time_out`,`log`.`note` AS `note` from (select `moph-sign`.`log`.`cid` AS `cid`,group_concat(`moph-sign`.`log`.`inout` separator ',') AS `in_out`,group_concat(`moph-sign`.`log`.`time` separator ',') AS `time`,`moph-sign`.`log`.`note` AS `note` from `moph-sign`.`log` group by `moph-sign`.`log`.`cid`) `log` where (`log`.`time` like '%%')) `logall` on((`logall`.`cid` = `u`.`cid`))) ;
