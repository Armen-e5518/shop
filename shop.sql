/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 100131
Source Host           : localhost:3306
Source Database       : shop

Target Server Type    : MYSQL
Target Server Version : 100131
File Encoding         : 65001

Date: 2019-05-27 14:39:33
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES ('1', 'Laptops');
INSERT INTO `categories` VALUES ('2', 'Smartphones');
INSERT INTO `categories` VALUES ('3', 'Cameras');
INSERT INTO `categories` VALUES ('4', 'Accessories');

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `text` text,
  `description` text,
  `stars` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `big_price` int(11) DEFAULT NULL,
  `state` int(1) DEFAULT NULL,
  `views` int(11) DEFAULT NULL,
  `buy_count` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('1', '1', 'PRODUCT NAME GOES HERE', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '3', '980', '990', '1', '10', '100');
INSERT INTO `products` VALUES ('2', '1', 'It is a long established fact that a reader', 'Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type spec', 'm is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still', '4', '777', '800', '2', '5', '10');
INSERT INTO `products` VALUES ('11', '2', 'is a long established fact that a r', 'een the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unc', 'e a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with de', '3', '234', '444', '1', '12', '23');
INSERT INTO `products` VALUES ('12', '3', ' has a more-or-less normal distribution of letter', ' has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, some', 'stry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets contai', '4', '1000', '2000', '2', '2', '2');
INSERT INTO `products` VALUES ('13', '1', ' roots in a piece of classical Latin literatu', 'It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passag', ' Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Fi', '5', '888', '5655', '3', '3', '3');

-- ----------------------------
-- Table structure for product_comments
-- ----------------------------
DROP TABLE IF EXISTS `product_comments`;
CREATE TABLE `product_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `comment` text,
  `star` int(11) DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of product_comments
-- ----------------------------
INSERT INTO `product_comments` VALUES ('2', '2', 'Armen Karapetyan', 'arm@mail.com', 'dev', '3', '2019-05-24 17:45:42');
INSERT INTO `product_comments` VALUES ('3', '2', 'Armen Karapetyan', 'arm@mail.com', 'dddd', '2', '2019-05-24 17:45:36');
INSERT INTO `product_comments` VALUES ('4', '11', 'Armen Karapetyan', 'arm@mail.com', 're, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every plea', '3', '2019-05-24 17:55:57');
INSERT INTO `product_comments` VALUES ('5', '11', 'Davit', 'dav@mail.com', 'cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis au', '4', '2019-05-24 17:55:41');
INSERT INTO `product_comments` VALUES ('6', '11', 'Hrtant', 'arm@mail.com', 'llitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere p', '5', '2019-05-24 17:59:27');
INSERT INTO `product_comments` VALUES ('7', '11', 'Sev', 'arm@mail.com', 'similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempor', '1', '2019-05-24 18:01:01');
INSERT INTO `product_comments` VALUES ('8', '11', 'Davit', 'arm@mail.com', 'quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat face', '5', '2019-05-24 18:01:18');
INSERT INTO `product_comments` VALUES ('9', '11', '', '', '', null, '2019-05-24 18:03:22');
INSERT INTO `product_comments` VALUES ('10', '11', 'Armen Karapetyan', 'arm@mail.com', 'runt mollitia animi, id est laborum et dolorum fuga. Et harum qui', null, '2019-05-24 18:04:27');
INSERT INTO `product_comments` VALUES ('11', '11', 'Frunz', 'arm@mail.com', 'm fuga. Et harum quidem rerum facilis est et expedita dis', '1', '2019-05-24 18:14:28');
INSERT INTO `product_comments` VALUES ('12', '13', 'Armen Karapetyan', 'arm@mail.com', 'tin professor at Hampden-Sydney College in Virginia', '4', '2019-05-27 13:19:49');

-- ----------------------------
-- Table structure for product_images
-- ----------------------------
DROP TABLE IF EXISTS `product_images`;
CREATE TABLE `product_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `image_id` int(11) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of product_images
-- ----------------------------
INSERT INTO `product_images` VALUES ('6', '1', null, 'ce1bf9be5113e0adbd48405236bdfef6.png');
INSERT INTO `product_images` VALUES ('7', '2', null, '6dcbf089946d6a4b955cdb914a3c50b0.png');
INSERT INTO `product_images` VALUES ('8', '2', null, '0072c915e80c478b1db1d42a87a053bf.png');
INSERT INTO `product_images` VALUES ('9', '11', null, '8d1701d056d81396712843527f6173ba.png');
INSERT INTO `product_images` VALUES ('10', '12', null, 'e72e84de7ce87eb2322f57cf94586076.png');
INSERT INTO `product_images` VALUES ('11', '13', null, '7dff172f6794e088e91d331318e882a5.png');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', 'nelIOWb6fdX-HDVnJ4Fu5LSpP8Uobr3t', '$2y$13$Bn.88A4SPmNwCpjq0Xp5/OOzFXoJlRr5pEz/BWpHtmdsLCvjl5Pw.', null, 'admin@apetrosyan.net', '10', '1507790922', '1507790922');
