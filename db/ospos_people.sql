/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50524
Source Host           : localhost:3306
Source Database       : ysumma

Target Server Type    : MYSQL
Target Server Version : 50524
File Encoding         : 65001

Date: 2018-03-25 16:50:27
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for ospos_people
-- ----------------------------
DROP TABLE IF EXISTS `ospos_people`;
CREATE TABLE `ospos_people` (
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address_1` varchar(255) DEFAULT NULL,
  `address_2` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `comments` text,
  `person_id` int(10) NOT NULL AUTO_INCREMENT,
  `birthplace` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `type_person_id` varchar(255) DEFAULT NULL,
  `num_passport` varchar(255) DEFAULT NULL,
  `has_passport` varchar(255) DEFAULT NULL,
  `date_passport` date DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`person_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2147483647 DEFAULT CHARSET=utf8;
SET FOREIGN_KEY_CHECKS=1;
