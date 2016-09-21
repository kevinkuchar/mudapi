/*
Navicat MySQL Data Transfer

Source Server         : Local Host
Source Server Version : 50626
Source Host           : localhost:3306
Source Database       : mud

Target Server Type    : MYSQL
Target Server Version : 50626
File Encoding         : 65001

Date: 2016-09-20 22:51:04
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `list_items`
-- ----------------------------
DROP TABLE IF EXISTS `list_items`;
CREATE TABLE `list_items` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `list_id` int(11) NOT NULL,
  `item_name` varchar(64) DEFAULT NULL,
  `is_complete` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_list_id` (`list_id`),
  CONSTRAINT `fk_list_id` FOREIGN KEY (`list_id`) REFERENCES `lists` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of list_items
-- ----------------------------

-- ----------------------------
-- Table structure for `lists`
-- ----------------------------
DROP TABLE IF EXISTS `lists`;
CREATE TABLE `lists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `list_name` varchar(64) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of lists
-- ----------------------------
INSERT INTO `lists` VALUES ('2', 'Kevins List', '2016-09-21 04:42:56', '2016-09-21 04:42:56');

-- ----------------------------
-- Table structure for `posts`
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of posts
-- ----------------------------
INSERT INTO `posts` VALUES ('1', 'Test Blog Post', 'Testing Lorem', '2016-08-14 17:14:01', null);
