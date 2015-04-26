/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50620
Source Host           : localhost:3306
Source Database       : toeic

Target Server Type    : MYSQL
Target Server Version : 50620
File Encoding         : 65001

Date: 2015-04-26 11:00:06
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `remember_token` varchar(255) DEFAULT NULL,
  `permission` enum('admin','user') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'quanvh', null, '$2y$10$ya7RrNU6Xpaa9zkhmfL/QOBDy6y1tpbWV4WaiZErttmed41DwY1ym', '', '2015-04-20 03:01:53', '2015-04-26 09:34:27', 'bsi6Tyq0FvwFnYBIpXoNBjezlMgRE4oajDlAHCVDFHuRV10fjISu1ozPDOp9', 'user');
INSERT INTO `user` VALUES ('2', 'admin', null, '$2y$10$zJ2lkPVgQeeI.S91uR6sVeWae1gq4JxA6dNpMUiOP08Ty8Ly5r/qu', '', '2015-04-20 03:02:35', '2015-04-26 09:34:31', 'xn4f7vp4zP0jmRQRgBPnUY0SelgaWiUJ0RKJF5yHd0SPxpba6LHONunkqEOD', 'user');
