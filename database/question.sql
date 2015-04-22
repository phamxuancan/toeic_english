/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50620
Source Host           : localhost:3306
Source Database       : toeic

Target Server Type    : MYSQL
Target Server Version : 50620
File Encoding         : 65001

Date: 2015-04-22 23:10:05
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `question`
-- ----------------------------
DROP TABLE IF EXISTS `question`;
CREATE TABLE `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text,
  `answer_a` text NOT NULL,
  `answer_b` text NOT NULL,
  `answer_c` text NOT NULL,
  `answer_d` text NOT NULL,
  `answer_correct` varchar(2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `sound` varchar(128) DEFAULT NULL,
  `type` enum('audio','text') DEFAULT 'text',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of question
-- ----------------------------
INSERT INTO `question` VALUES ('1', 'xuancan12', '123456fd', 'fsdf', 'fsf', 'fsfsd', 'a', '2015-04-19 05:07:06', null, '', 'text');
INSERT INTO `question` VALUES ('2', 'xuancan12', '123456fd', 'fsdf', 'fsf', 'fsfsd', 'a', '2015-04-20 03:28:14', '0000-00-00 00:00:00', '', 'text');
INSERT INTO `question` VALUES ('3', null, '2', 'xuancan12', '123456fd', 'fsdf', 'fs', '0000-00-00 00:00:00', '2015-04-22 23:04:00', '2015-04-20 03:28:14', 'audio');
