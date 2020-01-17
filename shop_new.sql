/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : shop_new

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2020-01-17 11:43:39
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES ('1', 'Laptops', null);
INSERT INTO `categories` VALUES ('2', 'Smartphones', null);
INSERT INTO `categories` VALUES ('3', 'Cameras', null);
INSERT INTO `categories` VALUES ('4', 'Accessories', null);

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT '',
  `text` text DEFAULT NULL,
  `description` text CHARACTER SET utf8 DEFAULT NULL,
  `stars` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `state` int(1) DEFAULT NULL,
  `views` int(11) DEFAULT NULL,
  `buy_count` int(11) DEFAULT NULL,
  `article` int(11) DEFAULT NULL,
  `error_info` text DEFAULT NULL,
  `sizes` text DEFAULT NULL,
  `color` text DEFAULT NULL,
  `composition` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('1', '1', 'PRODUCT NAME GOES HERE', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '3', '980', '1', '10', '100', null, null, null, null, null);
INSERT INTO `products` VALUES ('2', '1', 'It is a long established fact that a reader', 'Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type spec', 'm is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still', '4', '777', '2', '5', '10', null, null, null, null, null);
INSERT INTO `products` VALUES ('11', '2', 'is a long established fact that a r', 'een the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unc', 'e a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with de', '3', '234', '1', '12', '23', null, null, null, null, null);
INSERT INTO `products` VALUES ('12', '3', ' has a more-or-less normal distribution of letter', ' has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, some', 'stry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets contai', '4', '1000', '2', '2', '2', null, null, null, null, null);
INSERT INTO `products` VALUES ('13', '1', ' roots in a piece of classical Latin literatu', 'It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passag', ' Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Fi', '5', '888', '3', '3', '3', null, null, null, null, null);

-- ----------------------------
-- Table structure for product_comments
-- ----------------------------
DROP TABLE IF EXISTS `product_comments`;
CREATE TABLE `product_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `star` int(11) DEFAULT NULL,
  `date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
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
-- Table structure for socsites
-- ----------------------------
DROP TABLE IF EXISTS `socsites`;
CREATE TABLE `socsites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of socsites
-- ----------------------------

-- ----------------------------
-- Table structure for urls
-- ----------------------------
DROP TABLE IF EXISTS `urls`;
CREATE TABLE `urls` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=636 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of urls
-- ----------------------------
INSERT INTO `urls` VALUES ('1', 'https://www.wildberries.am/catalog/zhenshchinam/odezhda', '0');
INSERT INTO `urls` VALUES ('2', 'https://www.wildberries.am/catalog/zhenshchinam/odezhda/bluzki-i-rubashki', '0');
INSERT INTO `urls` VALUES ('3', 'https://www.wildberries.am/catalog/zhenshchinam/odezhda/bryuki-i-shorty', '0');
INSERT INTO `urls` VALUES ('4', 'https://www.wildberries.am/catalog/zhenshchinam/odezhda/verhnyaya-odezhda', '0');
INSERT INTO `urls` VALUES ('5', 'https://www.wildberries.am/catalog/zhenshchinam/odezhda/vodolazki', '0');
INSERT INTO `urls` VALUES ('6', 'https://www.wildberries.am/catalog/zhenshchinam/odezhda/dzhempery-i-kardigany', '0');
INSERT INTO `urls` VALUES ('7', 'https://www.wildberries.am/catalog/zhenshchinam/odezhda/dzhinsy-dzhegginsy', '0');
INSERT INTO `urls` VALUES ('8', 'https://www.wildberries.am/catalog/zhenshchinam/odezhda/zhilety', '0');
INSERT INTO `urls` VALUES ('9', 'https://www.wildberries.am/catalog/zhenshchinam/odezhda/karnavalnye-kostyumy', '0');
INSERT INTO `urls` VALUES ('10', 'https://www.wildberries.am/catalog/zhenshchinam/odezhda/kombinezony-polukombinezony', '0');
INSERT INTO `urls` VALUES ('11', 'https://www.wildberries.am/catalog/zhenshchinam/odezhda/kostyumy', '0');
INSERT INTO `urls` VALUES ('12', 'https://www.wildberries.am/catalog/zhenshchinam/odezhda/longslivy', '0');
INSERT INTO `urls` VALUES ('13', 'https://www.wildberries.am/catalog/zhenshchinam/odezhda/pidzhaki-i-zhakety', '0');
INSERT INTO `urls` VALUES ('14', 'https://www.wildberries.am/catalog/zhenshchinam/odezhda/platya', '0');
INSERT INTO `urls` VALUES ('15', 'https://www.wildberries.am/catalog/zhenshchinam/odezhda/svitshoty', '0');
INSERT INTO `urls` VALUES ('16', 'https://www.wildberries.am/catalog/zhenshchinam/odezhda/tolstovki', '0');
INSERT INTO `urls` VALUES ('17', 'https://www.wildberries.am/catalog/zhenshchinam/odezhda/tuniki', '0');
INSERT INTO `urls` VALUES ('18', 'https://www.wildberries.am/catalog/zhenshchinam/odezhda/futbolki-i-topy', '0');
INSERT INTO `urls` VALUES ('19', 'https://www.wildberries.am/catalog/zhenshchinam/odezhda/hudi', '0');
INSERT INTO `urls` VALUES ('20', 'https://www.wildberries.am/catalog/zhenshchinam/odezhda/yubki', '0');
INSERT INTO `urls` VALUES ('21', 'https://www.wildberries.am/catalog/obuv/zhenskaya', '0');
INSERT INTO `urls` VALUES ('22', 'https://www.wildberries.am/catalog/obuv/zhenskaya/baletki-i-cheshki', '0');
INSERT INTO `urls` VALUES ('23', 'https://www.wildberries.am/catalog/obuv/zhenskaya/botilony', '0');
INSERT INTO `urls` VALUES ('24', 'https://www.wildberries.am/catalog/obuv/zhenskaya/botinki-i-polubotinki', '0');
INSERT INTO `urls` VALUES ('25', 'https://www.wildberries.am/catalog/obuv/zhenskaya/kedy-i-krossovki', '0');
INSERT INTO `urls` VALUES ('26', 'https://www.wildberries.am/catalog/obuv/zhenskaya/mokasiny', '0');
INSERT INTO `urls` VALUES ('27', 'https://www.wildberries.am/catalog/obuv/zhenskaya/sandalii', '0');
INSERT INTO `urls` VALUES ('28', 'https://www.wildberries.am/catalog/obuv/zhenskaya/sapogi', '0');
INSERT INTO `urls` VALUES ('29', 'https://www.wildberries.am/catalog/obuv/zhenskaya/tufli-lofery', '0');
INSERT INTO `urls` VALUES ('30', 'https://www.wildberries.am/catalog/obuv/zhenskaya/shlepantsy-i-akvasoki', '0');
INSERT INTO `urls` VALUES ('31', 'https://www.wildberries.am/catalog/zhenshchinam/bolshie-razmery', '0');
INSERT INTO `urls` VALUES ('32', 'https://www.wildberries.am/catalog/zhenshchinam/odezhda/verhnyaya-odezhda/palto-i-polupalto?bid=20de1220-e128-42e3-85f2-b62733382c9d', '0');
INSERT INTO `urls` VALUES ('33', 'https://www.wildberries.am/catalog/muzhchinam/odezhda', '0');
INSERT INTO `urls` VALUES ('34', 'https://www.wildberries.am/catalog/muzhchinam/odezhda/bryuki-i-shorty', '0');
INSERT INTO `urls` VALUES ('35', 'https://www.wildberries.am/catalog/muzhchinam/odezhda/verhnyaya-odezhda', '0');
INSERT INTO `urls` VALUES ('36', 'https://www.wildberries.am/catalog/muzhchinam/odezhda/vodolazki', '0');
INSERT INTO `urls` VALUES ('37', 'https://www.wildberries.am/catalog/muzhchinam/odezhda/dzhempery-i-kardigany', '0');
INSERT INTO `urls` VALUES ('38', 'https://www.wildberries.am/catalog/muzhchinam/odezhda/dzhinsy', '0');
INSERT INTO `urls` VALUES ('39', 'https://www.wildberries.am/catalog/muzhchinam/odezhda/zhilety', '0');
INSERT INTO `urls` VALUES ('40', 'https://www.wildberries.am/catalog/muzhchinam/odezhda/karnavalnye-kostyumy', '0');
INSERT INTO `urls` VALUES ('41', 'https://www.wildberries.am/catalog/muzhchinam/odezhda/kombinezony', '0');
INSERT INTO `urls` VALUES ('42', 'https://www.wildberries.am/catalog/muzhchinam/odezhda/kostyumy', '0');
INSERT INTO `urls` VALUES ('43', 'https://www.wildberries.am/catalog/muzhchinam/odezhda/longslivy', '0');
INSERT INTO `urls` VALUES ('44', 'https://www.wildberries.am/catalog/muzhchinam/odezhda/pidzhaki-i-zhakety', '0');
INSERT INTO `urls` VALUES ('45', 'https://www.wildberries.am/catalog/muzhchinam/odezhda/rubashki', '0');
INSERT INTO `urls` VALUES ('46', 'https://www.wildberries.am/catalog/muzhchinam/odezhda/svitshoty', '0');
INSERT INTO `urls` VALUES ('47', 'https://www.wildberries.am/catalog/muzhchinam/odezhda/tolstovki', '0');
INSERT INTO `urls` VALUES ('48', 'https://www.wildberries.am/catalog/muzhchinam/odezhda/futbolki-i-mayki', '0');
INSERT INTO `urls` VALUES ('49', 'https://www.wildberries.am/catalog/muzhchinam/odezhda/hudi', '0');
INSERT INTO `urls` VALUES ('50', 'https://www.wildberries.am/catalog/obuv/muzhskaya', '0');
INSERT INTO `urls` VALUES ('51', 'https://www.wildberries.am/catalog/obuv/muzhskaya/botinki-i-polubotinki', '0');
INSERT INTO `urls` VALUES ('52', 'https://www.wildberries.am/catalog/obuv/muzhskaya/kedy-i-krossovki/kedy', '0');
INSERT INTO `urls` VALUES ('53', 'https://www.wildberries.am/catalog/obuv/muzhskaya/kedy-i-krossovki/krossovki', '0');
INSERT INTO `urls` VALUES ('54', 'https://www.wildberries.am/catalog/obuv/muzhskaya/mokasiny', '0');
INSERT INTO `urls` VALUES ('55', 'https://www.wildberries.am/catalog/obuv/muzhskaya/slipony', '0');
INSERT INTO `urls` VALUES ('56', 'https://www.wildberries.am/catalog/obuv/muzhskaya/tufli-lofery', '0');
INSERT INTO `urls` VALUES ('57', 'https://www.wildberries.am/catalog/obuv/muzhskaya/shlepantsy-i-akvasoki', '0');
INSERT INTO `urls` VALUES ('58', 'https://www.wildberries.am/catalog/muzhchinam/bolshie-razmery', '0');
INSERT INTO `urls` VALUES ('59', 'https://www.wildberries.am/catalog/muzhchinam/odezhda/delovye-kostyumy?bid=584aba3e-4d7f-40c2-91db-7f809aa408e5', '0');
INSERT INTO `urls` VALUES ('60', 'https://www.wildberries.am/catalog/detyam/dlya-devochek', '0');
INSERT INTO `urls` VALUES ('61', 'https://www.wildberries.am/catalog/detyam/odezhda/dlya-devochek/bele', '0');
INSERT INTO `urls` VALUES ('62', 'https://www.wildberries.am/catalog/detyam/odezhda/dlya-devochek/bluzki-i-rubashki', '0');
INSERT INTO `urls` VALUES ('63', 'https://www.wildberries.am/catalog/detyam/odezhda/dlya-devochek/bryuki-i-shorty', '0');
INSERT INTO `urls` VALUES ('64', 'https://www.wildberries.am/catalog/detyam/odezhda/dlya-devochek/verhnyaya-odezhda', '0');
INSERT INTO `urls` VALUES ('65', 'https://www.wildberries.am/catalog/detyam/odezhda/dlya-devochek/vodolazki', '0');
INSERT INTO `urls` VALUES ('66', 'https://www.wildberries.am/catalog/detyam/odezhda/dlya-devochek/dzhempery-i-kardigany', '0');
INSERT INTO `urls` VALUES ('67', 'https://www.wildberries.am/catalog/detyam/odezhda/dlya-devochek/dzhinsy-dzhegginsy', '0');
INSERT INTO `urls` VALUES ('68', 'https://www.wildberries.am/catalog/detyam/odezhda/dlya-devochek/dlya-kreshcheniya', '0');
INSERT INTO `urls` VALUES ('69', 'https://www.wildberries.am/catalog/detyam/odezhda/dlya-devochek/zhilety', '0');
INSERT INTO `urls` VALUES ('70', 'https://www.wildberries.am/catalog/detyam/odezhda/dlya-devochek/karnavalnye-kostyumy', '0');
INSERT INTO `urls` VALUES ('71', 'https://www.wildberries.am/catalog/detyam/odezhda/dlya-devochek/kombinezony', '0');
INSERT INTO `urls` VALUES ('72', 'https://www.wildberries.am/catalog/detyam/odezhda/dlya-devochek/kostyumy', '0');
INSERT INTO `urls` VALUES ('73', 'https://www.wildberries.am/catalog/detyam/odezhda/dlya-devochek/kupalnye-kostyumy', '0');
INSERT INTO `urls` VALUES ('74', 'https://www.wildberries.am/catalog/detyam/odezhda/dlya-devochek/longslivy', '0');
INSERT INTO `urls` VALUES ('75', 'https://www.wildberries.am/catalog/detyam/odezhda/dlya-devochek/odezhda-dlya-doma', '0');
INSERT INTO `urls` VALUES ('76', 'https://www.wildberries.am/catalog/detyam/dlya-devochek/pidzhaki-i-zhakety', '0');
INSERT INTO `urls` VALUES ('77', 'https://www.wildberries.am/catalog/detyam/odezhda/dlya-devochek/platya', '0');
INSERT INTO `urls` VALUES ('78', 'https://www.wildberries.am/catalog/detyam/odezhda/dlya-devochek/sarafany', '0');
INSERT INTO `urls` VALUES ('79', 'https://www.wildberries.am/catalog/detyam/dlya-devochek/svitshoty', '0');
INSERT INTO `urls` VALUES ('80', 'https://www.wildberries.am/catalog/detyam/odezhda/dlya-devochek/tuniki', '0');
INSERT INTO `urls` VALUES ('81', 'https://www.wildberries.am/catalog/detyam/dlya-devochek/tolstovki', '0');
INSERT INTO `urls` VALUES ('82', 'https://www.wildberries.am/catalog/detyam/odezhda/dlya-devochek/fartuki', '0');
INSERT INTO `urls` VALUES ('83', 'https://www.wildberries.am/catalog/detyam/odezhda/dlya-devochek/futbolki-i-topy', '0');
INSERT INTO `urls` VALUES ('84', 'https://www.wildberries.am/catalog/detyam/dlya-devochek/hudi', '0');
INSERT INTO `urls` VALUES ('85', 'https://www.wildberries.am/catalog/detyam/odezhda/dlya-devochek/yubki', '0');
INSERT INTO `urls` VALUES ('86', 'https://www.wildberries.am/catalog/detyam/odezhda/dlya-malchikov', '0');
INSERT INTO `urls` VALUES ('87', 'https://www.wildberries.am/catalog/detyam/odezhda/dlya-malchikov/bele', '0');
INSERT INTO `urls` VALUES ('88', 'https://www.wildberries.am/catalog/detyam/odezhda/dlya-malchikov/bryuki-i-shorty', '0');
INSERT INTO `urls` VALUES ('89', 'https://www.wildberries.am/catalog/detyam/odezhda/dlya-malchikov/verhnyaya-odezhda', '0');
INSERT INTO `urls` VALUES ('90', 'https://www.wildberries.am/catalog/detyam/odezhda/dlya-malchikov/vodolazki', '0');
INSERT INTO `urls` VALUES ('91', 'https://www.wildberries.am/catalog/detyam/odezhda/dlya-malchikov/dzhempery-i-kardigany', '0');
INSERT INTO `urls` VALUES ('92', 'https://www.wildberries.am/catalog/detyam/odezhda/dlya-malchikov/dzhinsy', '0');
INSERT INTO `urls` VALUES ('93', 'https://www.wildberries.am/catalog/detyam/odezhda/dlya-malchikov/dlya-kreshcheniya', '0');
INSERT INTO `urls` VALUES ('94', 'https://www.wildberries.am/catalog/detyam/odezhda/dlya-malchikov/zhilety', '0');
INSERT INTO `urls` VALUES ('95', 'https://www.wildberries.am/catalog/detyam/odezhda/dlya-malchikov/karnavalnye-kostyumy', '0');
INSERT INTO `urls` VALUES ('96', 'https://www.wildberries.am/catalog/detyam/odezhda/dlya-malchikov/kombinezony', '0');
INSERT INTO `urls` VALUES ('97', 'https://www.wildberries.am/catalog/detyam/odezhda/dlya-malchikov/kostyumy', '0');
INSERT INTO `urls` VALUES ('98', 'https://www.wildberries.am/catalog/detyam/odezhda/dlya-malchikov/longslivy', '0');
INSERT INTO `urls` VALUES ('99', 'https://www.wildberries.am/catalog/detyam/odezhda/dlya-malchikov/odezhda-dlya-doma', '0');
INSERT INTO `urls` VALUES ('100', 'https://www.wildberries.am/catalog/detyam/dlya-malchikov/pidzhaki-i-zhakety', '0');
INSERT INTO `urls` VALUES ('101', 'https://www.wildberries.am/catalog/detyam/odezhda/dlya-malchikov/plavki-i-bordshorty', '0');
INSERT INTO `urls` VALUES ('102', 'https://www.wildberries.am/catalog/detyam/odezhda/dlya-malchikov/rubashki', '0');
INSERT INTO `urls` VALUES ('103', 'https://www.wildberries.am/catalog/detyam/dlya-malchikov/svitshoty', '0');
INSERT INTO `urls` VALUES ('104', 'https://www.wildberries.am/catalog/detyam/dlya-malchikov/tolstovki', '0');
INSERT INTO `urls` VALUES ('105', 'https://www.wildberries.am/catalog/detyam/odezhda/dlya-malchikov/fartuki', '0');
INSERT INTO `urls` VALUES ('106', 'https://www.wildberries.am/catalog/detyam/odezhda/dlya-malchikov/futbolki-i-mayki', '0');
INSERT INTO `urls` VALUES ('107', 'https://www.wildberries.am/catalog/detyam/odezhda/dlya-malchikov/hudi', '0');
INSERT INTO `urls` VALUES ('108', 'https://www.wildberries.am/catalog/detyam/odezhda/dlya-novorozhdennyh', '0');
INSERT INTO `urls` VALUES ('109', 'https://www.wildberries.am/catalog/detyam/odezhda/dlya-novorozhdennyh/bele', '0');
INSERT INTO `urls` VALUES ('110', 'https://www.wildberries.am/catalog/detyam/odezhda/dlya-novorozhdennyh/bodi-polzunki', '0');
INSERT INTO `urls` VALUES ('111', 'https://www.wildberries.am/catalog/detyam/odezhda/dlya-novorozhdennyh/bryuki-shorty', '0');
INSERT INTO `urls` VALUES ('112', 'https://www.wildberries.am/catalog/detyam/odezhda/dlya-novorozhdennyh/verhnyaya-odezhda', '0');
INSERT INTO `urls` VALUES ('113', 'https://www.wildberries.am/catalog/detyam/odezhda/dlya-novorozhdennyh/zhakety-bolero', '0');
INSERT INTO `urls` VALUES ('114', 'https://www.wildberries.am/catalog/detyam/odezhda/dlya-novorozhdennyh/kombinezony', '0');
INSERT INTO `urls` VALUES ('115', 'https://www.wildberries.am/catalog/detyam/odezhda/dlya-novorozhdennyh/konverty', '0');
INSERT INTO `urls` VALUES ('116', 'https://www.wildberries.am/catalog/detyam/odezhda/dlya-novorozhdennyh/kostyumy', '0');
INSERT INTO `urls` VALUES ('117', 'https://www.wildberries.am/catalog/detyam/odezhda/dlya-novorozhdennyh/kostyumy/karnavalnye-kostyumy', '0');
INSERT INTO `urls` VALUES ('118', 'https://www.wildberries.am/catalog/detyam/odezhda/dlya-novorozhdennyh/koftochki-dzhempery', '0');
INSERT INTO `urls` VALUES ('119', 'https://www.wildberries.am/catalog/detyam/odezhda/dlya-novorozhdennyh/noski-kolgotki', '0');
INSERT INTO `urls` VALUES ('120', 'https://www.wildberries.am/catalog/detyam/odezhda/dlya-novorozhdennyh/odezhda-dlya-doma', '0');
INSERT INTO `urls` VALUES ('121', 'https://www.wildberries.am/catalog/detyam/odezhda/dlya-novorozhdennyh/dlya-kreshcheniya', '0');
INSERT INTO `urls` VALUES ('122', 'https://www.wildberries.am/catalog/detyam/odezhda/dlya-novorozhdennyh/platya-yubki', '0');
INSERT INTO `urls` VALUES ('123', 'https://www.wildberries.am/catalog/detyam/odezhda/dlya-novorozhdennyh/raspashonki', '0');
INSERT INTO `urls` VALUES ('124', 'https://www.wildberries.am/catalog/detyam/odezhda/dlya-novorozhdennyh/spalnye-meshki', '0');
INSERT INTO `urls` VALUES ('125', 'https://www.wildberries.am/catalog/detyam/odezhda/dlya-novorozhdennyh/futbolki-topy', '0');
INSERT INTO `urls` VALUES ('126', 'https://www.wildberries.am/catalog/detyam/lyubimye-geroi', '0');
INSERT INTO `urls` VALUES ('127', 'https://www.wildberries.am/catalog/sport/dlya-detey/detskiy-transport?bid=2b67bcd8-8478-4d8f-8e77-c1d7c09ec873', '0');
INSERT INTO `urls` VALUES ('128', 'https://www.wildberries.am/catalog/obuv/zhenskaya/bosonozhki', '0');
INSERT INTO `urls` VALUES ('129', 'https://www.wildberries.am/catalog/obuv/zhenskaya/botforty', '0');
INSERT INTO `urls` VALUES ('130', 'https://www.wildberries.am/catalog/obuv/zhenskaya/valenki', '0');
INSERT INTO `urls` VALUES ('131', 'https://www.wildberries.am/catalog/obuv/zhenskaya/galoshi', '0');
INSERT INTO `urls` VALUES ('132', 'https://www.wildberries.am/catalog/obuv/zhenskaya/dutiki-i-snoubutsy', '0');
INSERT INTO `urls` VALUES ('133', 'https://www.wildberries.am/catalog/obuv/zhenskaya/polusapozhki', '0');
INSERT INTO `urls` VALUES ('134', 'https://www.wildberries.am/catalog/obuv/zhenskaya/rezinovye-sapogi', '0');
INSERT INTO `urls` VALUES ('135', 'https://www.wildberries.am/catalog/obuv/zhenskaya/s-povyshennoy-polnotoy', '0');
INSERT INTO `urls` VALUES ('136', 'https://www.wildberries.am/catalog/obuv/zhenskaya/sabo-i-myuli', '0');
INSERT INTO `urls` VALUES ('137', 'https://www.wildberries.am/catalog/obuv/zhenskaya/slipony', '0');
INSERT INTO `urls` VALUES ('138', 'https://www.wildberries.am/catalog/obuv/zhenskaya/tapochki', '0');
INSERT INTO `urls` VALUES ('139', 'https://www.wildberries.am/catalog/obuv/zhenskaya/topsaydery', '0');
INSERT INTO `urls` VALUES ('140', 'https://www.wildberries.am/catalog/obuv/zhenskaya/uggi', '0');
INSERT INTO `urls` VALUES ('141', 'https://www.wildberries.am/catalog/obuv/zhenskaya/unty', '0');
INSERT INTO `urls` VALUES ('142', 'https://www.wildberries.am/catalog/obuv/zhenskaya/espadrili', '0');
INSERT INTO `urls` VALUES ('143', 'https://www.wildberries.am/catalog/obuv/muzhskaya/valenki', '0');
INSERT INTO `urls` VALUES ('144', 'https://www.wildberries.am/catalog/obuv/muzhskaya/galoshi', '0');
INSERT INTO `urls` VALUES ('145', 'https://www.wildberries.am/catalog/obuv/muzhskaya/kedy-i-krossovki', '0');
INSERT INTO `urls` VALUES ('146', 'https://www.wildberries.am/catalog/obuv/muzhskaya/s-povyshennoy-polnotoy', '0');
INSERT INTO `urls` VALUES ('147', 'https://www.wildberries.am/catalog/obuv/muzhskaya/sabo', '0');
INSERT INTO `urls` VALUES ('148', 'https://www.wildberries.am/catalog/obuv/muzhskaya/sandalii', '0');
INSERT INTO `urls` VALUES ('149', 'https://www.wildberries.am/catalog/obuv/muzhskaya/sapogi-i-unty', '0');
INSERT INTO `urls` VALUES ('150', 'https://www.wildberries.am/catalog/obuv/muzhskaya/tapochki', '0');
INSERT INTO `urls` VALUES ('151', 'https://www.wildberries.am/catalog/obuv/muzhskaya/topsaydery', '0');
INSERT INTO `urls` VALUES ('152', 'https://www.wildberries.am/catalog/obuv/muzhskaya/uggi', '0');
INSERT INTO `urls` VALUES ('153', 'https://www.wildberries.am/catalog/obuv/muzhskaya/espadrili', '0');
INSERT INTO `urls` VALUES ('154', 'https://www.wildberries.am/catalog/obuv/detskaya', '0');
INSERT INTO `urls` VALUES ('155', 'https://www.wildberries.am/catalog/obuv/zhenskaya/tufli-lofery?bid=6e39188a-e581-49fd-888f-89ba33fa45d4', '0');
INSERT INTO `urls` VALUES ('156', 'https://www.wildberries.am/catalog/aksessuary/golovnye-ubory', '0');
INSERT INTO `urls` VALUES ('157', 'https://www.wildberries.am/catalog/aksessuary/golovnye-ubory/balaklavy', '0');
INSERT INTO `urls` VALUES ('158', 'https://www.wildberries.am/catalog/aksessuary/golovnye-ubory/beysbolki', '0');
INSERT INTO `urls` VALUES ('159', 'https://www.wildberries.am/catalog/aksessuary/golovnye-ubory/berety', '0');
INSERT INTO `urls` VALUES ('160', 'https://www.wildberries.am/catalog/aksessuary/golovnye-ubory/kapory', '0');
INSERT INTO `urls` VALUES ('161', 'https://www.wildberries.am/catalog/aksessuary/golovnye-ubory/kepi', '0');
INSERT INTO `urls` VALUES ('162', 'https://www.wildberries.am/catalog/aksessuary/golovnye-ubory/kozyrki', '0');
INSERT INTO `urls` VALUES ('163', 'https://www.wildberries.am/catalog/aksessuary/golovnye-ubory/kolpaki-meditsinskie', '0');
INSERT INTO `urls` VALUES ('164', 'https://www.wildberries.am/catalog/aksessuary/golovnye-ubory/komplekty', '0');
INSERT INTO `urls` VALUES ('165', 'https://www.wildberries.am/catalog/aksessuary/golovnye-ubory/maski-vetrozashchitnye', '0');
INSERT INTO `urls` VALUES ('166', 'https://www.wildberries.am/catalog/aksessuary/golovnye-ubory/naushniki-uteplennye', '0');
INSERT INTO `urls` VALUES ('167', 'https://www.wildberries.am/catalog/aksessuary/golovnye-ubory/panamy', '0');
INSERT INTO `urls` VALUES ('168', 'https://www.wildberries.am/catalog/aksessuary/golovnye-ubory/povyazki-na-golovu', '0');
INSERT INTO `urls` VALUES ('169', 'https://www.wildberries.am/catalog/aksessuary/golovnye-ubory/furazhki', '0');
INSERT INTO `urls` VALUES ('170', 'https://www.wildberries.am/catalog/aksessuary/golovnye-ubory/hidzhaby', '0');
INSERT INTO `urls` VALUES ('171', 'https://www.wildberries.am/catalog/aksessuary/golovnye-ubory/chalma', '0');
INSERT INTO `urls` VALUES ('172', 'https://www.wildberries.am/catalog/aksessuary/golovnye-ubory/chepchiki', '0');
INSERT INTO `urls` VALUES ('173', 'https://www.wildberries.am/catalog/aksessuary/golovnye-ubory/shapki', '0');
INSERT INTO `urls` VALUES ('174', 'https://www.wildberries.am/catalog/aksessuary/golovnye-ubory/shapki-ushanki', '0');
INSERT INTO `urls` VALUES ('175', 'https://www.wildberries.am/catalog/aksessuary/golovnye-ubory/shapki-shlemy', '0');
INSERT INTO `urls` VALUES ('176', 'https://www.wildberries.am/catalog/aksessuary/golovnye-ubory/shlyapy', '0');
INSERT INTO `urls` VALUES ('177', 'https://www.wildberries.am/catalog/aksessuary/perchatki-i-varezhki', '0');
INSERT INTO `urls` VALUES ('178', 'https://www.wildberries.am/catalog/aksessuary/perchatki-i-varezhki/varezhki', '0');
INSERT INTO `urls` VALUES ('179', 'https://www.wildberries.am/catalog/aksessuary/perchatki-i-varezhki/manzhety', '0');
INSERT INTO `urls` VALUES ('180', 'https://www.wildberries.am/catalog/aksessuary/perchatki-i-varezhki/mitenki', '0');
INSERT INTO `urls` VALUES ('181', 'https://www.wildberries.am/catalog/aksessuary/perchatki-i-varezhki/mufty', '0');
INSERT INTO `urls` VALUES ('182', 'https://www.wildberries.am/catalog/aksessuary/perchatki-i-varezhki/perchatki', '0');
INSERT INTO `urls` VALUES ('183', 'https://www.wildberries.am/catalog/aksessuary/perchatki-i-varezhki/tatu-rukava', '0');
INSERT INTO `urls` VALUES ('184', 'https://www.wildberries.am/catalog/aksessuary/sumki-i-ryukzaki', '0');
INSERT INTO `urls` VALUES ('185', 'https://www.wildberries.am/catalog/aksessuary/sumki-i-ryukzaki/aksessuary-dlya-sumok', '0');
INSERT INTO `urls` VALUES ('186', 'https://www.wildberries.am/catalog/aksessuary/sumki-i-ryukzaki/klatchi', '0');
INSERT INTO `urls` VALUES ('187', 'https://www.wildberries.am/catalog/aksessuary/sumki-i-ryukzaki/kosmetichki', '0');
INSERT INTO `urls` VALUES ('188', 'https://www.wildberries.am/catalog/aksessuary/sumki-i-ryukzaki/nesessery', '0');
INSERT INTO `urls` VALUES ('189', 'https://www.wildberries.am/catalog/aksessuary/sumki-i-ryukzaki/papki-sumki', '0');
INSERT INTO `urls` VALUES ('190', 'https://www.wildberries.am/catalog/aksessuary/sumki-i-ryukzaki/portfeli', '0');
INSERT INTO `urls` VALUES ('191', 'https://www.wildberries.am/catalog/aksessuary/sumki-i-ryukzaki/ryukzaki', '0');
INSERT INTO `urls` VALUES ('192', 'https://www.wildberries.am/catalog/aksessuary/sumki-i-ryukzaki/sumki', '0');
INSERT INTO `urls` VALUES ('193', 'https://www.wildberries.am/catalog/aksessuary/sumki/dlya-noutbuka', '0');
INSERT INTO `urls` VALUES ('194', 'https://www.wildberries.am/catalog/aksessuary/hozyaystvennye-sumki/sumki-hozyaystvennye', '0');
INSERT INTO `urls` VALUES ('195', 'https://www.wildberries.am/catalog/aksessuary/aksessuary-dlya-volos', '0');
INSERT INTO `urls` VALUES ('196', 'https://www.wildberries.am/catalog/aksessuary/platki-i-sharfy/sharfy?bid=4010db5a-eb9f-42bb-8bc9-0661ea16a125', '0');
INSERT INTO `urls` VALUES ('197', 'https://www.wildberries.am/catalog/premium/zhenshchinam?bid=f1db689e-4e19-4b40-be6b-b3131554578e', '0');
INSERT INTO `urls` VALUES ('198', 'https://www.wildberries.am/catalog/premium/muzhchinam?bid=f9807abc-084e-421c-b280-80f3d38e145c', '0');
INSERT INTO `urls` VALUES ('199', 'https://www.wildberries.am/catalog/premium/detyam?bid=4889f730-3cfd-4721-a5f7-d79961f6bf10', '0');
INSERT INTO `urls` VALUES ('200', 'https://www.wildberries.am/catalog/premium/obuv?bid=ddbc0f58-0486-4c8b-b2b1-c1ae2e04bf92', '0');
INSERT INTO `urls` VALUES ('201', 'https://www.wildberries.am/catalog/premium/aksessuary?bid=56cd40c1-b852-48fc-957f-46dd4c894e1c', '0');
INSERT INTO `urls` VALUES ('202', 'https://www.wildberries.am/catalog/knigi/detyam-i-roditelyam', '0');
INSERT INTO `urls` VALUES ('203', 'https://www.wildberries.am/catalog/knigi/detyam-i-roditelyam/vospitanie-i-pedagogika', '0');
INSERT INTO `urls` VALUES ('204', 'https://www.wildberries.am/catalog/knigi/detyam-i-roditelyam/detektivy', '0');
INSERT INTO `urls` VALUES ('205', 'https://www.wildberries.am/catalog/knigi/detyam-i-roditelyam/detskoe-tvorchestvo-i-dosug', '0');
INSERT INTO `urls` VALUES ('206', 'https://www.wildberries.am/catalog/knigi/detyam-i-roditelyam/noviy-god-i-rozhdestvo', '0');
INSERT INTO `urls` VALUES ('207', 'https://www.wildberries.am/catalog/knigi/detyam-i-roditelyam/obuchenie-pismu', '0');
INSERT INTO `urls` VALUES ('208', 'https://www.wildberries.am/catalog/knigi/detyam-i-roditelyam/obuchenie-schetu', '0');
INSERT INTO `urls` VALUES ('209', 'https://www.wildberries.am/catalog/knigi/detyam-i-roditelyam/obuchenie-chteniyu', '0');
INSERT INTO `urls` VALUES ('210', 'https://www.wildberries.am/catalog/knigi/detyam-i-roditelyam/poznavatelnaya-literatura', '0');
INSERT INTO `urls` VALUES ('211', 'https://www.wildberries.am/catalog/knigi/detyam-i-roditelyam/poeziya', '0');
INSERT INTO `urls` VALUES ('212', 'https://www.wildberries.am/catalog/knigi/detyam-i-roditelyam/priklyuchencheskaya-literatura', '0');
INSERT INTO `urls` VALUES ('213', 'https://www.wildberries.am/catalog/knigi/detyam-i-roditelyam/proza', '0');
INSERT INTO `urls` VALUES ('214', 'https://www.wildberries.am/catalog/knigi/detyam-i-roditelyam/razvitie-rebenka', '0');
INSERT INTO `urls` VALUES ('215', 'https://www.wildberries.am/catalog/knigi/detskaya-literatura/detskiy-dosug/raskraski-i-risovanie/raskraski', '0');
INSERT INTO `urls` VALUES ('216', 'https://www.wildberries.am/catalog/knigi/detyam-i-roditelyam/skazki-i-istorii', '0');
INSERT INTO `urls` VALUES ('217', 'https://www.wildberries.am/catalog/knigi/detyam-i-roditelyam/fantastika-i-fentezi', '0');
INSERT INTO `urls` VALUES ('218', 'https://www.wildberries.am/catalog/knigi/uchebnaya-literatura', '0');
INSERT INTO `urls` VALUES ('219', 'https://www.wildberries.am/catalog/detyam/shkola/uchebnaya-literatura/atlasy', '0');
INSERT INTO `urls` VALUES ('220', 'https://www.wildberries.am/catalog/knigi/uchebnaya-literatura/doshkolnikam', '0');
INSERT INTO `urls` VALUES ('221', 'https://www.wildberries.am/catalog/knigi/uchebnaya-literatura/pedagogam', '0');
INSERT INTO `urls` VALUES ('222', 'https://www.wildberries.am/catalog/knigi/uchebnaya-literatura/slovari', '0');
INSERT INTO `urls` VALUES ('223', 'https://www.wildberries.am/catalog/knigi/uchebnaya-literatura/studentam-i-aspirantam', '0');
INSERT INTO `urls` VALUES ('224', 'https://www.wildberries.am/catalog/knigi/uchebnaya-literatura/shkolnikam-i-abiturientam', '0');
INSERT INTO `urls` VALUES ('225', 'https://www.wildberries.am/catalog/knigi/hudozhestvennaya-literatura', '0');
INSERT INTO `urls` VALUES ('226', 'https://www.wildberries.am/catalog/knigi/hudozhestvennaya-literatura/aforizmy-folklor-mify', '0');
INSERT INTO `urls` VALUES ('227', 'https://www.wildberries.am/catalog/knigi/hudozhestvennaya-literatura/detektivy', '0');
INSERT INTO `urls` VALUES ('228', 'https://www.wildberries.am/catalog/knigi/hudozhestvennaya-literatura/knigi-na-inostrannyh-yazykah', '0');
INSERT INTO `urls` VALUES ('229', 'https://www.wildberries.am/catalog/knigi/hudozhestvennaya-literatura/komiksy-i-manga', '0');
INSERT INTO `urls` VALUES ('230', 'https://www.wildberries.am/catalog/knigi/hudozhestvennaya-literatura/lyubovnye-romany', '0');
INSERT INTO `urls` VALUES ('231', 'https://www.wildberries.am/catalog/knigi/hudozhestvennaya-literatura/poeziya', '0');
INSERT INTO `urls` VALUES ('232', 'https://www.wildberries.am/catalog/knigi/hudozhestvennaya-literatura/priklyuchencheskaya-literatura', '0');
INSERT INTO `urls` VALUES ('233', 'https://www.wildberries.am/catalog/knigi/hudozhestvennaya-literatura/proza', '0');
INSERT INTO `urls` VALUES ('234', 'https://www.wildberries.am/catalog/knigi/nehudozhestvennaya-literatura/trillery', '0');
INSERT INTO `urls` VALUES ('235', 'https://www.wildberries.am/catalog/knigi/hudozhestvennaya-literatura/fantastika-i-fentezi', '0');
INSERT INTO `urls` VALUES ('236', 'https://www.wildberries.am/catalog/knigi/hudozhestvennaya-literatura/yumor-i-satira', '0');
INSERT INTO `urls` VALUES ('237', 'https://www.wildberries.am/catalog/knigi/audioknigi', '0');
INSERT INTO `urls` VALUES ('238', 'https://www.wildberries.am/catalog/knigi/hudozhestvennaya-literatura/fantastika-i-fentezi?bid=9745e85b-019f-47ad-afae-883e3240aec6', '0');
INSERT INTO `urls` VALUES ('239', 'https://www.wildberries.am/catalog/knigi-i-kantstovary/kantstovary/bumazhnaya-produktsiya', '0');
INSERT INTO `urls` VALUES ('240', 'https://www.wildberries.am/catalog/kantstovary/bumazhnaya-produktsiya/blanki', '0');
INSERT INTO `urls` VALUES ('241', 'https://www.wildberries.am/catalog/knigi-i-kantstovary/kantstovary/bumazhnaya-produktsiya/bloknoty-i-ezhednevniki', '0');
INSERT INTO `urls` VALUES ('242', 'https://www.wildberries.am/catalog/knigi-i-kantstovary/kantstovary/bumazhnaya-produktsiya/bumaga', '0');
INSERT INTO `urls` VALUES ('243', 'https://www.wildberries.am/catalog/knigi-i-diski/kantstovary/gostevye-knigi', '0');
INSERT INTO `urls` VALUES ('244', 'https://www.wildberries.am/catalog/knigi-i-kantstovary/kantstovary/gramoty-pohvalnye', '0');
INSERT INTO `urls` VALUES ('245', 'https://www.wildberries.am/catalog/knigi-i-diski/kantstovary/zakladki', '0');
INSERT INTO `urls` VALUES ('246', 'https://www.wildberries.am/catalog/knigi-i-diski/kantstovary/kalendari', '0');
INSERT INTO `urls` VALUES ('247', 'https://www.wildberries.am/catalog/knigi-i-diski/kantstovary/konverty-bumazhnye', '0');
INSERT INTO `urls` VALUES ('248', 'https://www.wildberries.am/catalog/kantstovary/bumazhnaya-produktsiya/lenty-chekovye', '0');
INSERT INTO `urls` VALUES ('249', 'https://www.wildberries.am/catalog/knigi-i-diski/kantstovary/meditsinskie-karty', '0');
INSERT INTO `urls` VALUES ('250', 'https://www.wildberries.am/catalog/knigi/detskaya-literatura/detskiy-dosug/raskraski-i-risovanie/nakleyki-detskie', '0');
INSERT INTO `urls` VALUES ('251', 'https://www.wildberries.am/catalog/kantstovary/bumazhnaya-produktsiya/tsenniki', '0');
INSERT INTO `urls` VALUES ('252', 'https://www.wildberries.am/catalog/knigi-i-kantstovary/kantstovary/plakaty', '0');
INSERT INTO `urls` VALUES ('253', 'https://www.wildberries.am/catalog/knigi-i-diski/kantstovary/portfolio', '0');
INSERT INTO `urls` VALUES ('254', 'https://www.wildberries.am/catalog/knigi-i-diski/kantstovary/raspisanie-nastennoe', '0');
INSERT INTO `urls` VALUES ('255', 'https://www.wildberries.am/catalog/knigi-i-kantstovary/kantstovary/smennye-bloki-dlya-tetradey', '0');
INSERT INTO `urls` VALUES ('256', 'https://www.wildberries.am/catalog/knigi-i-kantstovary/kantstovary/bumazhnaya-produktsiya/stikery-i-bumaga-dlya-zametok', '0');
INSERT INTO `urls` VALUES ('257', 'https://www.wildberries.am/catalog/knigi-i-kantstovary/kantstovary/tetradi', '0');
INSERT INTO `urls` VALUES ('258', 'https://www.wildberries.am/catalog/knigi-i-kantstovary/kantstovary/ofisnye-prinadlezhnosti', '0');
INSERT INTO `urls` VALUES ('259', 'https://www.wildberries.am/catalog/knigi-i-diski/kantstovary/beydzhi', '0');
INSERT INTO `urls` VALUES ('260', 'https://www.wildberries.am/catalog/knigi-i-diski/kantstovary/biznes-nabory', '0');
INSERT INTO `urls` VALUES ('261', 'https://www.wildberries.am/catalog/kantstovary/ofisnye-prinadlezhnosti/broshyurovshchiki', '0');
INSERT INTO `urls` VALUES ('262', 'https://www.wildberries.am/catalog/kantstovary/ofisnye-prinadlezhnosti/gubki-dlya-markernyh-dosok', '0');
INSERT INTO `urls` VALUES ('263', 'https://www.wildberries.am/catalog/knigi-i-kantstovary/kantstovary/demopaneli', '0');
INSERT INTO `urls` VALUES ('264', 'https://www.wildberries.am/catalog/knigi-i-diski/kantstovary/dyrokoly', '0');
INSERT INTO `urls` VALUES ('265', 'https://www.wildberries.am/catalog/knigi-i-kantstovary/kantstovary/zhidkosti-dlya-snyatiya-etiketok', '0');
INSERT INTO `urls` VALUES ('266', 'https://www.wildberries.am/catalog/knigi-i-diski/kantstovary/zhurnaly-ucheta', '0');
INSERT INTO `urls` VALUES ('267', 'https://www.wildberries.am/catalog/knigi-i-diski/kantstovary/kalkulyatory', '0');
INSERT INTO `urls` VALUES ('268', 'https://www.wildberries.am/catalog/knigi-i-kantstovary/kantstovary/ofisnye-prinadlezhnosti/kantselyarskie-melochi', '0');
INSERT INTO `urls` VALUES ('269', 'https://www.wildberries.am/catalog/knigi-i-diski/kantstovary/kley', '0');
INSERT INTO `urls` VALUES ('270', 'https://www.wildberries.am/catalog/knigi-i-diski/kantstovary/kleykie-lenty', '0');
INSERT INTO `urls` VALUES ('271', 'https://www.wildberries.am/catalog/knigi-i-diski/kantstovary/lupy', '0');
INSERT INTO `urls` VALUES ('272', 'https://www.wildberries.am/catalog/knigi-i-diski/kantstovary/magnitniy-vinil', '0');
INSERT INTO `urls` VALUES ('273', 'https://www.wildberries.am/catalog/knigi-i-kantstovary/kantstovary/ofisnye-prinadlezhnosti/nastolnye-podstavki-i-lotki', '0');
INSERT INTO `urls` VALUES ('274', 'https://www.wildberries.am/catalog/knigi-i-kantstovary/kantstovary/ofisnye-prinadlezhnosti/nozhnitsy-i-nozhi', '0');
INSERT INTO `urls` VALUES ('275', 'https://www.wildberries.am/catalog/kantstovary/ofisnye-prinadlezhnosti/osnastki-dlya-pechatey', '0');
INSERT INTO `urls` VALUES ('276', 'https://www.wildberries.am/catalog/kantstovary/ofisnye-prinadlezhnosti/pechati', '0');
INSERT INTO `urls` VALUES ('277', 'https://www.wildberries.am/catalog/knigi-i-kantstovary/kantstovary/ofisnye-prinadlezhnosti/skoby-i-steplery', '0');
INSERT INTO `urls` VALUES ('278', 'https://www.wildberries.am/catalog/knigi-i-diski/kantstovary/tablichki-ofisnye', '0');
INSERT INTO `urls` VALUES ('279', 'https://www.wildberries.am/catalog/knigi-i-kantstovary/kantstovary/termocheki', '0');
INSERT INTO `urls` VALUES ('280', 'https://www.wildberries.am/catalog/knigi-i-kantstovary/kantstovary/ofisnye-prinadlezhnosti/fayly-i-papki', '0');
INSERT INTO `urls` VALUES ('281', 'https://www.wildberries.am/catalog/knigi-i-diski/kantstovary/shtempelnye-podushki', '0');
INSERT INTO `urls` VALUES ('282', 'https://www.wildberries.am/catalog/dom-i-dacha/kuhnya/kuhonnaya-utvar/etiketki-na-banki', '0');
INSERT INTO `urls` VALUES ('283', 'https://www.wildberries.am/catalog/knigi-i-kantstovary/kantstovary/pismennye-prinadlezhnosti', '0');
INSERT INTO `urls` VALUES ('284', 'https://www.wildberries.am/catalog/knigi-i-diski/kantstovary/kantselyarskie-nabory', '0');
INSERT INTO `urls` VALUES ('285', 'https://www.wildberries.am/catalog/knigi-i-kantstovary/kantstovary/pismennye-prinadlezhnosti/karandashi', '0');
INSERT INTO `urls` VALUES ('286', 'https://www.wildberries.am/catalog/knigi-i-kantstovary/kantstovary/pismennye-prinadlezhnosti/korrektory-teksta', '0');
INSERT INTO `urls` VALUES ('287', 'https://www.wildberries.am/catalog/knigi-i-diski/kantstovary/lastiki', '0');
INSERT INTO `urls` VALUES ('288', 'https://www.wildberries.am/catalog/knigi-i-diski/kantstovary/markery', '0');
INSERT INTO `urls` VALUES ('289', 'https://www.wildberries.am/catalog/knigi-i-diski/kantstovary/ruchki', '0');
INSERT INTO `urls` VALUES ('290', 'https://www.wildberries.am/catalog/knigi-i-kantstovary/kantstovary/pismennye-prinadlezhnosti/sterzhni-i-grifeli', '0');
INSERT INTO `urls` VALUES ('291', 'https://www.wildberries.am/catalog/knigi-i-diski/kantstovary/tochilki', '0');
INSERT INTO `urls` VALUES ('292', 'https://www.wildberries.am/catalog/knigi-i-diski/kantstovary/flomastery', '0');
INSERT INTO `urls` VALUES ('293', 'https://www.wildberries.am/catalog/knigi-i-diski/kantstovary/chernila', '0');
INSERT INTO `urls` VALUES ('294', 'https://www.wildberries.am/catalog/knigi-i-diski/kantstovary/elektrotochilki', '0');
INSERT INTO `urls` VALUES ('295', 'https://www.wildberries.am/catalog/knigi-i-kantstovary/albomy-dlya-kollektsionirovaniya', '0');
INSERT INTO `urls` VALUES ('296', 'https://www.wildberries.am/catalog/knigi-i-diski/kantstovary?bid=64e4423c-0064-43a5-af91-da79d6005201', '0');
INSERT INTO `urls` VALUES ('297', 'https://www.wildberries.am/catalog/tovary-dlya-zhivotnyh/dlya-gruzunov-i-horkov', '0');
INSERT INTO `urls` VALUES ('298', 'https://www.wildberries.am/catalog/aksessuary/tovary-dlya-zhivotnyh/vetapteka/dlya-gryzunov-i-horkov', '0');
INSERT INTO `urls` VALUES ('299', 'https://www.wildberries.am/catalog/tovary-dlya-zhivotnyh/dlya-gruzunov-i-horkov/gruming-i-uhod', '0');
INSERT INTO `urls` VALUES ('300', 'https://www.wildberries.am/catalog/tovary-dlya-zhivotnyh/dlya-gruzunov-i-horkov/igrushki', '0');
INSERT INTO `urls` VALUES ('301', 'https://www.wildberries.am/catalog/tovary-dlya-zhivotnyh/dlya-gruzunov-i-horkov/kletki-i-lestnitsy', '0');
INSERT INTO `urls` VALUES ('302', 'https://www.wildberries.am/catalog/tovary-dlya-zhivotnyh/dlya-gruzunov-i-horkov/korm-i-lakomstva', '0');
INSERT INTO `urls` VALUES ('303', 'https://www.wildberries.am/catalog/tovary-dlya-zhivotnyh/dlya-gruzunov-i-horkov/lotki-i-napolniteli', '0');
INSERT INTO `urls` VALUES ('304', 'https://www.wildberries.am/catalog/tovary-dlya-zhivotnyh/dlya-gruzunov-i-horkov/miski-i-poilki', '0');
INSERT INTO `urls` VALUES ('305', 'https://www.wildberries.am/catalog/tovary-dlya-zhivotnyh/dlya-gruzunov-i-horkov/shleyki', '0');
INSERT INTO `urls` VALUES ('306', 'https://www.wildberries.am/catalog/tovary-dlya-zhivotnyh/dlya-koshek', '0');
INSERT INTO `urls` VALUES ('307', 'https://www.wildberries.am/catalog/tovary-dlya-zhivotnyh/dlya-koshek/aksessuary-dlya-kormleniya', '0');
INSERT INTO `urls` VALUES ('308', 'https://www.wildberries.am/catalog/tovary-dlya-zhivotnyh/dlya-koshek/amunitsiya', '0');
INSERT INTO `urls` VALUES ('309', 'https://www.wildberries.am/catalog/tovary-dlya-zhivotnyh/vetapteka/dlya-koshek', '0');
INSERT INTO `urls` VALUES ('310', 'https://www.wildberries.am/catalog/tovary-dlya-zhivotnyh/dlya-koshek/gruming-i-uhod', '0');
INSERT INTO `urls` VALUES ('311', 'https://www.wildberries.am/catalog/tovary-dlya-zhivotnyh/dlya-koshek/dvertsy', '0');
INSERT INTO `urls` VALUES ('312', 'https://www.wildberries.am/catalog/tovary-dlya-zhivotnyh/dlya-koshek/igrushki-i-kogtetochki', '0');
INSERT INTO `urls` VALUES ('313', 'https://www.wildberries.am/catalog/tovary-dlya-zhivotnyh/dlya-koshek/korm-i-lakomstva', '0');
INSERT INTO `urls` VALUES ('314', 'https://www.wildberries.am/catalog/tovary-dlya-zhivotnyh/dlya-koshek/lezhaki-i-domiki', '0');
INSERT INTO `urls` VALUES ('315', 'https://www.wildberries.am/catalog/tovary-dlya-zhivotnyh/dlya-koshek/lotki-i-napolniteli', '0');
INSERT INTO `urls` VALUES ('316', 'https://www.wildberries.am/catalog/tovary-dlya-zhivotnyh/dlya-koshek/transportirovka', '0');
INSERT INTO `urls` VALUES ('317', 'https://www.wildberries.am/catalog/tovary-dlya-zhivotnyh/dlya-sobak', '0');
INSERT INTO `urls` VALUES ('318', 'https://www.wildberries.am/catalog/aksessuary/tovary-dlya-zhivotnyh/aksessuary-dlya-zhivotnyh', '0');
INSERT INTO `urls` VALUES ('319', 'https://www.wildberries.am/catalog/aksessuary/tovary-dlya-zhivotnyh/aksessuary-dlya-kormleniya-zhivotnyh', '0');
INSERT INTO `urls` VALUES ('320', 'https://www.wildberries.am/catalog/aksessuary/tovary-dlya-zhivotnyh/amunitsiya', '0');
INSERT INTO `urls` VALUES ('321', 'https://www.wildberries.am/catalog/tovary-dlya-zhivotnyh/vetapteka/dlya-sobak', '0');
INSERT INTO `urls` VALUES ('322', 'https://www.wildberries.am/catalog/aksessuary/tovary-dlya-zhivotnyh/volery-i-kletki', '0');
INSERT INTO `urls` VALUES ('323', 'https://www.wildberries.am/catalog/aksessuary/tovary-dlya-zhivotnyh/gruming', '0');
INSERT INTO `urls` VALUES ('324', 'https://www.wildberries.am/catalog/aksessuary/tovary-dlya-zhivotnyh/igrushki-dlya-zhivotnyh', '0');
INSERT INTO `urls` VALUES ('325', 'https://www.wildberries.am/catalog/aksessuary/tovary-dlya-zhivotnyh/korm-dlya-zhivotnyh', '0');
INSERT INTO `urls` VALUES ('326', 'https://www.wildberries.am/catalog/aksessuary/tovary-dlya-zhivotnyh/lezhanki-domiki', '0');
INSERT INTO `urls` VALUES ('327', 'https://www.wildberries.am/catalog/aksessuary/tovary-dlya-zhivotnyh/pelenki-tualety', '0');
INSERT INTO `urls` VALUES ('328', 'https://www.wildberries.am/catalog/asksseuary/tovary-dlya-zhivotnyh/odezhda', '0');
INSERT INTO `urls` VALUES ('329', 'https://www.wildberries.am/catalog/aksessuary/tovary-dlya-zhivotnyh/ohlazhdayushchie-tovary', '0');
INSERT INTO `urls` VALUES ('330', 'https://www.wildberries.am/catalog/tovary-dlya-sobak/perenoski', '0');
INSERT INTO `urls` VALUES ('331', 'https://www.wildberries.am/catalog/aksessuary/tovary-dlya-zhivotnyh/akvariumistika', '0');
INSERT INTO `urls` VALUES ('332', 'https://www.wildberries.am/catalog/tovary-dlya-zhivotnyh?bid=9b32e6da-9a7c-4ad5-9f85-bd314ec6af9a', '0');
INSERT INTO `urls` VALUES ('333', 'https://www.wildberries.am/catalog/sport/vidy-sporta/zimnie-vidy-sporta', '0');
INSERT INTO `urls` VALUES ('334', 'https://www.wildberries.am/catalog/sport/vidy-sporta/zimnie-vidy-sporta/begovye-lyzhi', '0');
INSERT INTO `urls` VALUES ('335', 'https://www.wildberries.am/catalog/sport/vidy-sporta/zimnie-vidy-sporta/gornye-lyzhi', '0');
INSERT INTO `urls` VALUES ('336', 'https://www.wildberries.am/catalog/sport/vidy-sporta/snoubording-snouskeyting', '0');
INSERT INTO `urls` VALUES ('337', 'https://www.wildberries.am/catalog/sport/vidy-sporta/figurnoe-katanie', '0');
INSERT INTO `urls` VALUES ('338', 'https://www.wildberries.am/catalog/sport/vidy-sporta/hokkey', '0');
INSERT INTO `urls` VALUES ('339', 'https://www.wildberries.am/catalog/sport/vidy-sporta/komandnye-vidy-sporta', '0');
INSERT INTO `urls` VALUES ('340', 'https://www.wildberries.am/catalog/sport/vidy-sporta/basketbol', '0');
INSERT INTO `urls` VALUES ('341', 'https://www.wildberries.am/catalog/sport/sportivniy-inventar-i-aksessuary/beysbol', '0');
INSERT INTO `urls` VALUES ('342', 'https://www.wildberries.am/catalog/sport/vidy-sporta/voleybol', '0');
INSERT INTO `urls` VALUES ('343', 'https://www.wildberries.am/catalog/sport/vidy-sporta/gandbol', '0');
INSERT INTO `urls` VALUES ('344', 'https://www.wildberries.am/catalog/sport/vidy-sporta/regbi', '0');
INSERT INTO `urls` VALUES ('345', 'https://www.wildberries.am/catalog/sport/vidy-sporta/futbol', '0');
INSERT INTO `urls` VALUES ('346', 'https://www.wildberries.am/catalog/sport/vidy-sporta/fitnes/yoga', '0');
INSERT INTO `urls` VALUES ('347', 'https://www.wildberries.am/catalog/sport/vidy-sporta/fitnes', '0');
INSERT INTO `urls` VALUES ('348', 'https://www.wildberries.am/catalog/sport/vidy-sporta/fitnes/inventar', '0');
INSERT INTO `urls` VALUES ('349', 'https://www.wildberries.am/catalog/sport/vidy-sporta/kross-trening', '0');
INSERT INTO `urls` VALUES ('350', 'https://www.wildberries.am/catalog/sport/vidy-sporta/tyazhelaya-atletika', '0');
INSERT INTO `urls` VALUES ('351', 'https://www.wildberries.am/catalog/sport/vidy-sporta/fitnes/trenazhery', '0');
INSERT INTO `urls` VALUES ('352', 'https://www.wildberries.am/catalog/sport/vidy-sporta/badminton/tennis', '0');
INSERT INTO `urls` VALUES ('353', 'https://www.wildberries.am/catalog/sport/vidy-sporta?bid=4f7046e8-73ca-4d58-83c4-a573e50dc945', '0');
INSERT INTO `urls` VALUES ('354', 'https://www.wildberries.am/catalog/igrushki/lyubimye-geroi', '0');
INSERT INTO `urls` VALUES ('355', 'https://www.wildberries.am/catalog/igrushki/lyubimye-geroi/barbie', '0');
INSERT INTO `urls` VALUES ('356', 'https://www.wildberries.am/catalog/igrushki/lyubimye-geroi/batman', '0');
INSERT INTO `urls` VALUES ('357', 'https://www.wildberries.am/catalog/igrushki/lyubimye-geroi/ever-after-high', '0');
INSERT INTO `urls` VALUES ('358', 'https://www.wildberries.am/catalog/igrushki/lyubimye-geroi/hello-kitty', '0');
INSERT INTO `urls` VALUES ('359', 'https://www.wildberries.am/catalog/igrushki/lyubimye-geroi/littlest-pet-shop', '0');
INSERT INTO `urls` VALUES ('360', 'https://www.wildberries.am/catalog/igrushki/lyubimye-geroi/my-little-pony', '0');
INSERT INTO `urls` VALUES ('361', 'https://www.wildberries.am/catalog/igrushki/lyubimye-geroi/peppa-pig', '0');
INSERT INTO `urls` VALUES ('362', 'https://www.wildberries.am/catalog/igrushki/lyubimye-geroi/shopkins', '0');
INSERT INTO `urls` VALUES ('363', 'https://www.wildberries.am/catalog/igrushki/lyubimye-geroi/winx', '0');
INSERT INTO `urls` VALUES ('364', 'https://www.wildberries.am/catalog/igrushki/lyubimye-geroi/winnie-pooh', '0');
INSERT INTO `urls` VALUES ('365', 'https://www.wildberries.am/catalog/igrushki/lyubimye-geroi/gadkiy-ya', '0');
INSERT INTO `urls` VALUES ('366', 'https://www.wildberries.am/catalog/igrushki/lyubimye-geroi/geroi-v-maskah', '0');
INSERT INTO `urls` VALUES ('367', 'https://www.wildberries.am/catalog/igrushki/lyubimye-geroi/star-wars', '0');
INSERT INTO `urls` VALUES ('368', 'https://www.wildberries.am/catalog/igrushki/lyubimye-geroi/malenkoe-korolevstvo-bena-i-holli', '0');
INSERT INTO `urls` VALUES ('369', 'https://www.wildberries.am/catalog/igrushki/lyubimye-geroi/masha-i-medved', '0');
INSERT INTO `urls` VALUES ('370', 'https://www.wildberries.am/catalog/igrushki/lyubimye-geroi/mickey-mouse', '0');
INSERT INTO `urls` VALUES ('371', 'https://www.wildberries.am/catalog/igrushki/lyubimye-geroi/mir-disneya', '0');
INSERT INTO `urls` VALUES ('372', 'https://www.wildberries.am/catalog/igrushki/lyubimye-geroi/mimimishki', '0');
INSERT INTO `urls` VALUES ('373', 'https://www.wildberries.am/catalog/igrushki/lyubimye-geroi/mstiteli', '0');
INSERT INTO `urls` VALUES ('374', 'https://www.wildberries.am/catalog/igrushki/lyubimye-geroi/siniy-traktor', '0');
INSERT INTO `urls` VALUES ('375', 'https://www.wildberries.am/catalog/igrushki/lyubimye-geroi/cars', '0');
INSERT INTO `urls` VALUES ('376', 'https://www.wildberries.am/catalog/igrushki/lyubimye-geroi/transformers', '0');
INSERT INTO `urls` VALUES ('377', 'https://www.wildberries.am/catalog/igrushki/lyubimye-geroi/tri-kota', '0');
INSERT INTO `urls` VALUES ('378', 'https://www.wildberries.am/catalog/igrushki/lyubimye-geroi/fiksiki', '0');
INSERT INTO `urls` VALUES ('379', 'https://www.wildberries.am/catalog/igrushki/lyubimye-geroi/holodnoe-serdtse', '0');
INSERT INTO `urls` VALUES ('380', 'https://www.wildberries.am/catalog/igrushki/lyubimye-geroi/spyder-man', '0');
INSERT INTO `urls` VALUES ('381', 'https://www.wildberries.am/catalog/igrushki/antistress', '0');
INSERT INTO `urls` VALUES ('382', 'https://www.wildberries.am/catalog/igrushki/muzykalnye-instrumenty', '0');
INSERT INTO `urls` VALUES ('383', 'https://www.wildberries.am/catalog/igrushki?bid=81887041-1363-47a7-8bc5-6df5ff26c53b', '0');
INSERT INTO `urls` VALUES ('384', 'https://www.wildberries.am/catalog/elektronika/smartfony-i-telefony', '0');
INSERT INTO `urls` VALUES ('385', 'https://www.wildberries.am/catalog/elektronika/smartfony-i-telefony/aksessuary-dlya-semki', '0');
INSERT INTO `urls` VALUES ('386', 'https://www.wildberries.am/catalog/elektronika/smartfony-i-telefony/powerbank', '0');
INSERT INTO `urls` VALUES ('387', 'https://www.wildberries.am/catalog/elektronika/igry-i-razvlecheniya/aksessuary/garnitury', '0');
INSERT INTO `urls` VALUES ('388', 'https://www.wildberries.am/catalog/elektronika/smartfony-i-telefony/derzhateli', '0');
INSERT INTO `urls` VALUES ('389', 'https://www.wildberries.am/catalog/elektronika/smartfony-i-telefony/dok-stantsii', '0');
INSERT INTO `urls` VALUES ('390', 'https://www.wildberries.am/catalog/elektronika/smartfony-i-telefony/zaryadnye-ustroystva', '0');
INSERT INTO `urls` VALUES ('391', 'https://www.wildberries.am/catalog/elektronika/smartfony-i-telefony/kabeli-adaptery', '0');
INSERT INTO `urls` VALUES ('392', 'https://www.wildberries.am/catalog/elektronika/smartfony-i-telefony/karty-pamyati', '0');
INSERT INTO `urls` VALUES ('393', 'https://www.wildberries.am/catalog/elektronika/telefony-i-gadzhety/mobilnye-telefony', '0');
INSERT INTO `urls` VALUES ('394', 'https://www.wildberries.am/catalog/elektronika/aksessuary/monopody-i-shtativy', '0');
INSERT INTO `urls` VALUES ('395', 'https://www.wildberries.am/catalog/elektronika/smartfony-i-telefony/podstavki-dlya-mobilnyh-ustroystv', '0');
INSERT INTO `urls` VALUES ('396', 'https://www.wildberries.am/catalog/elektronika/smartfony-i-telefony/portativnye-kolonki', '0');
INSERT INTO `urls` VALUES ('397', 'https://www.wildberries.am/catalog/elektronika/smartfony-i-telefony/vse-smartfony', '0');
INSERT INTO `urls` VALUES ('398', 'https://www.wildberries.am/catalog/elektronika/tehnika-dlya-doma/telefony-statsionarnye', '0');
INSERT INTO `urls` VALUES ('399', 'https://www.wildberries.am/catalog/elektronika/smartfony-i-telefony/stekla-i-plenki', '0');
INSERT INTO `urls` VALUES ('400', 'https://www.wildberries.am/catalog/elektronika/smartfony-i-telefony/stilusy', '0');
INSERT INTO `urls` VALUES ('401', 'https://www.wildberries.am/catalog/aksessuary/chehly/chehly-dlya-telefonov', '0');
INSERT INTO `urls` VALUES ('402', 'https://www.wildberries.am/catalog/aksessuary/chehly/chehly-akkumulyatory', '0');
INSERT INTO `urls` VALUES ('403', 'https://www.wildberries.am/catalog/elektronika/smartfony-i-telefony/flash-nakopiteli', '0');
INSERT INTO `urls` VALUES ('404', 'https://www.wildberries.am/catalog/elektronika/planshety', '0');
INSERT INTO `urls` VALUES ('405', 'https://www.wildberries.am/catalog/elektronika/noutbuki-periferiya', '0');
INSERT INTO `urls` VALUES ('406', 'https://www.wildberries.am/catalog/elektronika/noutbuki-i-kompyutery/vneshnie-nakopiteli-informatsii', '0');
INSERT INTO `urls` VALUES ('407', 'https://www.wildberries.am/catalog/elektronika/noutbuki-i-kompyutery/komplektuyushchie-dlya-pk', '0');
INSERT INTO `urls` VALUES ('408', 'https://www.wildberries.am/catalog/elektronika/noutbuki-pereferiya/notebook-accessories', '0');
INSERT INTO `urls` VALUES ('409', 'https://www.wildberries.am/catalog/elektronika/noutbuki-pereferiya/peripheral-accessories', '0');
INSERT INTO `urls` VALUES ('410', 'https://www.wildberries.am/catalog/elektronika/tv-audio-foto-video-tehnika', '0');
INSERT INTO `urls` VALUES ('411', 'https://www.wildberries.am/catalog/elektronika/tv-audio-foto-video-tehnika/dvd-pleery', '0');
INSERT INTO `urls` VALUES ('412', 'https://www.wildberries.am/catalog/elektronika/audiotehnika/mp3-pleery/mp3-pleery', '0');
INSERT INTO `urls` VALUES ('413', 'https://www.wildberries.am/catalog/elektronika/foto-i-video-tehnika/aksessuary', '0');
INSERT INTO `urls` VALUES ('414', 'https://www.wildberries.am/catalog/elektronika/tv-audio-foto-video-tehnika/antenny-televizionnye', '0');
INSERT INTO `urls` VALUES ('415', 'https://www.wildberries.am/catalog/elektronika/audiotehnika', '0');
INSERT INTO `urls` VALUES ('416', 'https://www.wildberries.am/catalog/elektronika/tv-audio-foto-video-tehnika/videokamery-tsifrovye', '0');
INSERT INTO `urls` VALUES ('417', 'https://www.wildberries.am/catalog/elektronika/audiotehnika/diktofony', '0');
INSERT INTO `urls` VALUES ('418', 'https://www.wildberries.am/catalog/elektronika/tv-audio-foto-video-tehnika/kronshteiny', '0');
INSERT INTO `urls` VALUES ('419', 'https://www.wildberries.am/catalog/elektronika/tv-audio-foto-video-tehnika/mikrofony', '0');
INSERT INTO `urls` VALUES ('420', 'https://www.wildberries.am/catalog/elektronika/tv-audio-foto-video-tehnika/printery-portativnye', '0');
INSERT INTO `urls` VALUES ('421', 'https://www.wildberries.am/catalog/elektronika/tehnika-dlya-doma/resivery-televizionnye', '0');
INSERT INTO `urls` VALUES ('422', 'https://www.wildberries.am/catalog/elektronika/tv-audio-foto-video-tehnika/studiynoe-oborudovanie', '0');
INSERT INTO `urls` VALUES ('423', 'https://www.wildberries.am/catalog/elektronika/tv-audio-foto-video-tehnika/televizory/televizory', '0');
INSERT INTO `urls` VALUES ('424', 'https://www.wildberries.am/catalog/elektronika/tehnika-dlya-doma/usiliteli-televizionnye', '0');
INSERT INTO `urls` VALUES ('425', 'https://www.wildberries.am/catalog/elektronika/foto-i-video-tehnika/fotoapparaty', '0');
INSERT INTO `urls` VALUES ('426', 'https://www.wildberries.am/catalog/elektronika/foto-i-video-tehnika/chehly-i-ryukzaki', '0');
INSERT INTO `urls` VALUES ('427', 'https://www.wildberries.am/catalog/elektronika/noutbuki-pereferiya/periferiynye-ustroystva/shapki-s-garnituroy', '0');
INSERT INTO `urls` VALUES ('428', 'https://www.wildberries.am/catalog/elektronika/foto-i-video-tehnika/ekshn-kamery', '0');
INSERT INTO `urls` VALUES ('429', 'https://www.wildberries.am/catalog/elektronika/avtoelektronika', '0');
INSERT INTO `urls` VALUES ('430', 'https://www.wildberries.am/catalog/elektronika/smartfony-i-telefony/vse-smartfony?bid=8fe4372d-b8d8-4c86-81be-ddb339d69abd', '0');
INSERT INTO `urls` VALUES ('431', 'https://www.wildberries.am/catalog/elektronika/tehnika-dlya-doma', '0');
INSERT INTO `urls` VALUES ('432', 'https://www.wildberries.am/catalog/elektronika/tehnika-dlya-doma/aksessuary-dlya-pylesosov', '0');
INSERT INTO `urls` VALUES ('433', 'https://www.wildberries.am/catalog/elektronika/tehnika-dlya-doma/mashinki-protiv-katyshek', '0');
INSERT INTO `urls` VALUES ('434', 'https://www.wildberries.am/catalog/elektronika/tehnika-dlya-doma/muhoboyki-elektricheskie', '0');
INSERT INTO `urls` VALUES ('435', 'https://www.wildberries.am/catalog/elektronika/tehnika-dlya-doma/podstavki-dlya-bytovoy-tehniki', '0');
INSERT INTO `urls` VALUES ('436', 'https://www.wildberries.am/catalog/elektronika/tehnika-dlya-doma/pulty-upravleniya', '0');
INSERT INTO `urls` VALUES ('437', 'https://www.wildberries.am/catalog/elektronika/tehnika-dlya-doma/pylesosy-i-parootchistiteli', '0');
INSERT INTO `urls` VALUES ('438', 'https://www.wildberries.am/catalog/elektronika/tehnika-dlya-doma/radio-chasy-i-budilniki', '0');
INSERT INTO `urls` VALUES ('439', 'https://www.wildberries.am/catalog/elektronika/tehnika-dlya-doma/sushilki-dlya-odezhdy-elektricheskie', '0');
INSERT INTO `urls` VALUES ('440', 'https://www.wildberries.am/catalog/elektronika/tehnika-dlya-doma/sushki-dlya-obuvi', '0');
INSERT INTO `urls` VALUES ('441', 'https://www.wildberries.am/catalog/bytovaya-tehnika/tehnika-dlya-doma/sushilki-dlya-ruk', '0');
INSERT INTO `urls` VALUES ('442', 'https://www.wildberries.am/catalog/elektronika/tehnika-dlya-doma/utyugi-i-otparivateli', '0');
INSERT INTO `urls` VALUES ('443', 'https://www.wildberries.am/catalog/elektronika/tehnika-dlya-doma/shveynye-mashiny', '0');
INSERT INTO `urls` VALUES ('444', 'https://www.wildberries.am/catalog/elektronika/tehnika-dlya-doma/elektricheskie-odeyala-i-grelki', '0');
INSERT INTO `urls` VALUES ('445', 'https://www.wildberries.am/catalog/elektronika/tehnika-dlya-doma/stekloochistiteli-elektricheskie', '0');
INSERT INTO `urls` VALUES ('446', 'https://www.wildberries.am/catalog/elektronika/tehnika-dlya-kuhni', '0');
INSERT INTO `urls` VALUES ('447', 'https://www.wildberries.am/catalog/elektronika/tehnika-dlya-kuhni/aksessuary-dlya-kuhonnoy-tehniki', '0');
INSERT INTO `urls` VALUES ('448', 'https://www.wildberries.am/catalog/elektronika/tehnika-dlya-kuhni/izmelchenie-i-smeshivanie', '0');
INSERT INTO `urls` VALUES ('449', 'https://www.wildberries.am/catalog/elektronika/tehnika-dlya-kuhni/kuhonnye-vesy', '0');
INSERT INTO `urls` VALUES ('450', 'https://www.wildberries.am/catalog/elektronika/tehnika-dlya-kuhni/prigotovlenie-blyud', '0');
INSERT INTO `urls` VALUES ('451', 'https://www.wildberries.am/catalog/elektronika/tehnika-dlya-kuhni/prigotovlenie-napitkov', '0');
INSERT INTO `urls` VALUES ('452', 'https://www.wildberries.am/catalog/elektronika/tehnika-dlya-kuhni/prorashchivateli-semyan', '0');
INSERT INTO `urls` VALUES ('453', 'https://www.wildberries.am/catalog/elektronika/tehnika-dlya-kuhni/hranenie', '0');
INSERT INTO `urls` VALUES ('454', 'https://www.wildberries.am/catalog/elektronika/krasota-i-zdorove', '0');
INSERT INTO `urls` VALUES ('455', 'https://www.wildberries.am/catalog/elektronika/krasota-i-zdorove/oneblade', '0');
INSERT INTO `urls` VALUES ('456', 'https://www.wildberries.am/catalog/elektronika/krasota-i-zdorove/britvy-i-trimmery', '0');
INSERT INTO `urls` VALUES ('457', 'https://www.wildberries.am/catalog/elektronika/tehnika-dlya-doma/vesy', '0');
INSERT INTO `urls` VALUES ('458', 'https://www.wildberries.am/catalog/elektronika/kosmeticheskie-apparaty', '0');
INSERT INTO `urls` VALUES ('459', 'https://www.wildberries.am/catalog/elektronika/krasota-i-zdorove/massazhery-elektricheskie', '0');
INSERT INTO `urls` VALUES ('460', 'https://www.wildberries.am/catalog/elektronika/krasota-i-zdorove/britvy-i-trimmery/mashinki-dlya-strizhki-volos', '0');
INSERT INTO `urls` VALUES ('461', 'https://www.wildberries.am/catalog/elektronika/krasota-i-zdorove/meditsinskie-pribory', '0');
INSERT INTO `urls` VALUES ('462', 'https://www.wildberries.am/catalog/elektronika/krasota-i-zdorove/professionalnaya-parikmaherskaya-tehnika/bytovaya-tehnika', '0');
INSERT INTO `urls` VALUES ('463', 'https://www.wildberries.am/catalog/elektronika/feny-i-pribory-dlya-ukladki', '0');
INSERT INTO `urls` VALUES ('464', 'https://www.wildberries.am/catalog/elektronika/zubnye-shchetki', '0');
INSERT INTO `urls` VALUES ('465', 'https://www.wildberries.am/catalog/elektronika/krasota-i-zdorove/epilyatory', '0');
INSERT INTO `urls` VALUES ('466', 'https://www.wildberries.am/catalog/elektronika/tehnika-dlya-doma/uvlazhniteli-i-vozduhootchistiteli', '0');
INSERT INTO `urls` VALUES ('467', 'https://www.wildberries.am/catalog/elektronika/tehnika-dlya-doma/utyugi-i-otparivateli?bid=814db7fa-3094-461e-9eee-3413ce35de12', '0');
INSERT INTO `urls` VALUES ('468', 'https://www.wildberries.am/catalog/bytovaya-tehnika/stroitelstvo-i-remont/elektroinstrumenty', '0');
INSERT INTO `urls` VALUES ('469', 'https://www.wildberries.am/catalog/stroitelstvo-i-remont/akkumulyatory-dlya-elektroinstrumenta', '0');
INSERT INTO `urls` VALUES ('470', 'https://www.wildberries.am/catalog/bytovaya-tehnika/stroitelstvo-i-remont/elektroinstrumenty/dreli-shurupoverty', '0');
INSERT INTO `urls` VALUES ('471', 'https://www.wildberries.am/catalog/bytovaya-tehnika/stroitelstvo-i-remont/elektroinstrumenty/izmeritelnye-pribory', '0');
INSERT INTO `urls` VALUES ('472', 'https://www.wildberries.am/catalog/bytovaya-tehnika/stroitelstvo-i-remont/elektroinstrumenty/payalnye-instrumenty', '0');
INSERT INTO `urls` VALUES ('473', 'https://www.wildberries.am/catalog/vse-dlya-remonta/elektroinstrumenty/perforatory-i-otboynye-molotki', '0');
INSERT INTO `urls` VALUES ('474', 'https://www.wildberries.am/catalog/stroitelstvo-i-remont/renovatory', '0');
INSERT INTO `urls` VALUES ('475', 'https://www.wildberries.am/catalog/vse-dlya-remonta/stroitelnoe-oborudovanie', '0');
INSERT INTO `urls` VALUES ('476', 'https://www.wildberries.am/catalog/vse-dlya-remonta/vibratory-glubinnye', '0');
INSERT INTO `urls` VALUES ('477', 'https://www.wildberries.am/catalog/aksessuary/avtotovary/kompressornye-stantsii', '0');
INSERT INTO `urls` VALUES ('478', 'https://www.wildberries.am/catalog/vse-dlya-remonta/kraskopulty', '0');
INSERT INTO `urls` VALUES ('479', 'https://www.wildberries.am/catalog/tovary-dlya-remonta/pnevmoinstrumenty', '0');
INSERT INTO `urls` VALUES ('480', 'https://www.wildberries.am/catalog/tovary-dlya-remonta/svarochnoe-oborudovanie', '0');
INSERT INTO `urls` VALUES ('481', 'https://www.wildberries.am/catalog/dom-i-dacha/instrumenty/instrumenty', '0');
INSERT INTO `urls` VALUES ('482', 'https://www.wildberries.am/catalog/dom-i-dacha/tovary-dlya-remonta/instrumenty/zazhimnye-instrumenty', '0');
INSERT INTO `urls` VALUES ('483', 'https://www.wildberries.am/catalog/dom-i-dacha/tovary-dlya-remonta/instrumenty/izmiritelnye-instrumenty', '0');
INSERT INTO `urls` VALUES ('484', 'https://www.wildberries.am/catalog/dom-i-dacha/tovary-dlya-remonta/individualnaya-zashchita', '0');
INSERT INTO `urls` VALUES ('485', 'https://www.wildberries.am/catalog/dom-i-dacha/tovary-dlya-remonta/instrumenty/klyuchi', '0');
INSERT INTO `urls` VALUES ('486', 'https://www.wildberries.am/catalog/dom-i-dacha/tovary-dlya-remonta/krepezh', '0');
INSERT INTO `urls` VALUES ('487', 'https://www.wildberries.am/catalog/dom-i-dacha/tovary-dlya-remonta/lestnitsy-i-stremyanki', '0');
INSERT INTO `urls` VALUES ('488', 'https://www.wildberries.am/catalog/dom-i-dacha/tovary-dlya-remonta/instrumenty/magnitnye-instrumenty', '0');
INSERT INTO `urls` VALUES ('489', 'https://www.wildberries.am/catalog/dom-i-dacha/tovary-dlya-remonta/instrumenty/malyarnye-instrumenty', '0');
INSERT INTO `urls` VALUES ('490', 'https://www.wildberries.am/catalog/dom-i-dacha/tovary-dlya-remonta/instrumenty/montazhnye-instrumenty', '0');
INSERT INTO `urls` VALUES ('491', 'https://www.wildberries.am/catalog/tovary-dlya-remonta/instrumenty/nabory-instrumentov', '0');
INSERT INTO `urls` VALUES ('492', 'https://www.wildberries.am/catalog/dom-i-dacha/tovary-dlya-remonta/osnastka-instrumenta', '0');
INSERT INTO `urls` VALUES ('493', 'https://www.wildberries.am/catalog/dom-i-dacha/tovary-dlya-remonta/instrumenty/pistolety/pistolety-dlya-montazhnoy-peny-i-germetika', '0');
INSERT INTO `urls` VALUES ('494', 'https://www.wildberries.am/catalog/dom-i-dacha/tovary-dlya-remonta/rashodnye-materialy', '0');
INSERT INTO `urls` VALUES ('495', 'https://www.wildberries.am/catalog/vse-dlya-remonta/instrumenty-i-osnastka/steplery-stroitelnye', '0');
INSERT INTO `urls` VALUES ('496', 'https://www.wildberries.am/catalog/dom-i-dacha/tovary-dlya-remonta/instrumenty/stolyarno-slesarnye-instrumenty', '0');
INSERT INTO `urls` VALUES ('497', 'https://www.wildberries.am/catalog/vse-dlya-remonta/instrumenty-i-osnastka/furnitura', '0');
INSERT INTO `urls` VALUES ('498', 'https://www.wildberries.am/catalog/dom-i-dacha/tovary-dlya-remonta/instrumenty/sharnirno-gubtsevye-instrumenty', '0');
INSERT INTO `urls` VALUES ('499', 'https://www.wildberries.am/catalog/elektronika/sadovaya-tehnika', '0');
INSERT INTO `urls` VALUES ('500', 'https://www.wildberries.am/catalog/dom-i-dacha/instrumenty/instrumenty?bid=4a4d0ee7-d5d5-4d07-8ae7-0ba8f625a4d0', '0');
INSERT INTO `urls` VALUES ('501', 'https://www.wildberries.am/catalog/dom/gostinnaya', '0');
INSERT INTO `urls` VALUES ('502', 'https://www.wildberries.am/catalog/dlya-doma/mebel', '0');
INSERT INTO `urls` VALUES ('503', 'https://www.wildberries.am/catalog/dlya-doma/predmety-interera/osveshchenie', '0');
INSERT INTO `urls` VALUES ('504', 'https://www.wildberries.am/catalog/dlya-doma/predmety-interera/dekorativnye-nakleyki/dekoratsii-nastennye', '0');
INSERT INTO `urls` VALUES ('505', 'https://www.wildberries.am/catalog/dlya-doma/predmety-interera/kovriki/kovriki-komnatnye', '0');
INSERT INTO `urls` VALUES ('506', 'https://www.wildberries.am/catalog/dlya-doma/predmety-interera/podushki-i-chehly/dekorativnye-podushki', '0');
INSERT INTO `urls` VALUES ('507', 'https://www.wildberries.am/catalog/dom-i-dacha/shtory', '0');
INSERT INTO `urls` VALUES ('508', 'https://www.wildberries.am/catalog/dom/spalnya', '0');
INSERT INTO `urls` VALUES ('509', 'https://www.wildberries.am/catalog/dlya-doma/predmety-interera/kovriki/kovriki-nastolnye', '0');
INSERT INTO `urls` VALUES ('510', 'https://www.wildberries.am/catalog/dlya-doma/postelnye-prinadlezhnosti/matrasy-dlya-krovati', '0');
INSERT INTO `urls` VALUES ('511', 'https://www.wildberries.am/catalog/dom/spalnya/osveshchenie', '0');
INSERT INTO `urls` VALUES ('512', 'https://www.wildberries.am/catalog/dom/spalnya/hranenie-veshchey', '0');
INSERT INTO `urls` VALUES ('513', 'https://www.wildberries.am/catalog/dlya-doma/postelnye-prinadlezhnosti', '0');
INSERT INTO `urls` VALUES ('514', 'https://www.wildberries.am/catalog/dom/spalnya/shtory', '0');
INSERT INTO `urls` VALUES ('515', 'https://www.wildberries.am/catalog/dom-i-dacha/vannaya', '0');
INSERT INTO `urls` VALUES ('516', 'https://www.wildberries.am/catalog/dlya-doma/vse-dlya-prazdnika?bid=176617d0-2184-454e-9a00-fb126e555723', '0');
INSERT INTO `urls` VALUES ('517', 'https://www.wildberries.am/catalog/aksessuary/avtotovary/avtomobilnaya-elektronika', '0');
INSERT INTO `urls` VALUES ('518', 'https://www.wildberries.am/catalog/aksessuary/avtotovary/fm-transmittery', '0');
INSERT INTO `urls` VALUES ('519', 'https://www.wildberries.am/catalog/aksessuary/avtotovary/avtomobilnye-zaryadnye-ustroystva', '0');
INSERT INTO `urls` VALUES ('520', 'https://www.wildberries.am/catalog/elektronika/avtoelektronika/videoregistratory-avtomobilnye', '0');
INSERT INTO `urls` VALUES ('521', 'https://www.wildberries.am/catalog/aksessuary/avtotovary/datchiki-davleniya', '0');
INSERT INTO `urls` VALUES ('522', 'https://www.wildberries.am/catalog/aksessuary/avtotovary/invertory-avtomobilnye', '0');
INSERT INTO `urls` VALUES ('523', 'https://www.wildberries.am/catalog/aksessuary/avtotovary/istochniki-pitaniya', '0');
INSERT INTO `urls` VALUES ('524', 'https://www.wildberries.am/catalog/avtotovary/avtomobilnaya-elektronika/kamery-zadnego-vida', '0');
INSERT INTO `urls` VALUES ('525', 'https://www.wildberries.am/catalog/elektronika/avtoelektronika/kolonki-avtomobilnye', '0');
INSERT INTO `urls` VALUES ('526', 'https://www.wildberries.am/catalog/elektronika/avtoelektronika/magnitoly-avtomobilnye', '0');
INSERT INTO `urls` VALUES ('527', 'https://www.wildberries.am/catalog/avtotovary/avtomobilnaya-elektronika/parktroniki', '0');
INSERT INTO `urls` VALUES ('528', 'https://www.wildberries.am/catalog/avtotovary/instrumenty-i-oborudovanie/podogrevateli-predpuskovye', '0');
INSERT INTO `urls` VALUES ('529', 'https://www.wildberries.am/catalog/aksessuary/avtotovary/predohraniteli-avtomobilnye', '0');
INSERT INTO `urls` VALUES ('530', 'https://www.wildberries.am/catalog/aksessuary/avtotovary/protivougonnye-sistemy', '0');
INSERT INTO `urls` VALUES ('531', 'https://www.wildberries.am/catalog/aksessuary/avtotovary/pusko-zaryadnye-ustroystva', '0');
INSERT INTO `urls` VALUES ('532', 'https://www.wildberries.am/catalog/elektronika/avtoelektronika/radar-detektory', '0');
INSERT INTO `urls` VALUES ('533', 'https://www.wildberries.am/catalog/aksessuary/avtotovary/razvetviteli-prikurivatelya', '0');
INSERT INTO `urls` VALUES ('534', 'https://www.wildberries.am/catalog/aksessuary/avtotovary/resivery', '0');
INSERT INTO `urls` VALUES ('535', 'https://www.wildberries.am/catalog/elektronika/avtoelektronika/sabvufery-avtomobilnye', '0');
INSERT INTO `urls` VALUES ('536', 'https://www.wildberries.am/catalog/elektronika/avtoelektronika/televizory-avtomobilnye', '0');
INSERT INTO `urls` VALUES ('537', 'https://www.wildberries.am/catalog/aksessuary/avtotovary/testery-zaryada-akb', '0');
INSERT INTO `urls` VALUES ('538', 'https://www.wildberries.am/catalog/elektronika/avtoelektronika/usiliteli-avtomobilnye', '0');
INSERT INTO `urls` VALUES ('539', 'https://www.wildberries.am/catalog/aksessuary/avtotovary/obustroystvo-salona', '0');
INSERT INTO `urls` VALUES ('540', 'https://www.wildberries.am/catalog/aksessuary/avtotovary/avtogamaki', '0');
INSERT INTO `urls` VALUES ('541', 'https://www.wildberries.am/catalog/aksessuary/avtotovary/bagazhnye-setki', '0');
INSERT INTO `urls` VALUES ('542', 'https://www.wildberries.am/catalog/aksessuary/avtotovary/zaglushki-remnya-bezopasnosti', '0');
INSERT INTO `urls` VALUES ('543', 'https://www.wildberries.am/catalog/aksessuary/avtotovary/zashchita-sideniy', '0');
INSERT INTO `urls` VALUES ('544', 'https://www.wildberries.am/catalog/aksessuary/avtotovary/kozyrki-dlya-avto', '0');
INSERT INTO `urls` VALUES ('545', 'https://www.wildberries.am/catalog/avtotovary/obustroystvo-salona/kronshteyny-avtomobilnye', '0');
INSERT INTO `urls` VALUES ('546', 'https://www.wildberries.am/catalog/aksessuary/avtotovary/nakladki-na-remen-bezopasnosti', '0');
INSERT INTO `urls` VALUES ('547', 'https://www.wildberries.am/catalog/aksessuary/avtotovary/opletki-na-rul', '0');
INSERT INTO `urls` VALUES ('548', 'https://www.wildberries.am/catalog/aksessuary/avtotovary/organayzery-v-bagazhnik', '0');
INSERT INTO `urls` VALUES ('549', 'https://www.wildberries.am/catalog/aksessuary/avtotovary/organayzery-na-sidenya', '0');
INSERT INTO `urls` VALUES ('550', 'https://www.wildberries.am/catalog/aksessuary/avtotovary/podlokotniki', '0');
INSERT INTO `urls` VALUES ('551', 'https://www.wildberries.am/catalog/aksessuary/avtotovary/podushki-avtomobilnye', '0');
INSERT INTO `urls` VALUES ('552', 'https://www.wildberries.am/catalog/aksessuary/avtotovary/remni-bezopasnosti', '0');
INSERT INTO `urls` VALUES ('553', 'https://www.wildberries.am/catalog/aksessuary/avtotovary/ruchki-korobki-peredach', '0');
INSERT INTO `urls` VALUES ('554', 'https://www.wildberries.am/catalog/aksessuary/avtotovary/stoliki-avtomobilnye', '0');
INSERT INTO `urls` VALUES ('555', 'https://www.wildberries.am/catalog/aksessuary/avtotovary/chehly-dlya-bagazhnikov', '0');
INSERT INTO `urls` VALUES ('556', 'https://www.wildberries.am/catalog/aksessuary/avtotovary/chehly-na-sidenya', '0');
INSERT INTO `urls` VALUES ('557', 'https://www.wildberries.am/catalog/aksessuary/avtotovary/shtorki-avtomobilnye', '0');
INSERT INTO `urls` VALUES ('558', 'https://www.wildberries.am/catalog/aksessuary/avtotovary/uhod-za-avtomobilem', '0');
INSERT INTO `urls` VALUES ('559', 'https://www.wildberries.am/catalog/aksessuary/avtotovary/avtohimiya', '0');
INSERT INTO `urls` VALUES ('560', 'https://www.wildberries.am/catalog/aksessuary/avtotovary/gubki-dlya-avtomobilya', '0');
INSERT INTO `urls` VALUES ('561', 'https://www.wildberries.am/catalog/avtotovary/uhod-za-avtomobilem/salfetki-dlya-polirovki', '0');
INSERT INTO `urls` VALUES ('562', 'https://www.wildberries.am/catalog/avtotovary/uhod-za-avtomobilem/smazki-avtomobilnye', '0');
INSERT INTO `urls` VALUES ('563', 'https://www.wildberries.am/catalog/aksessuary/avtotovary/tenty-avtomobilnye', '0');
INSERT INTO `urls` VALUES ('564', 'https://www.wildberries.am/catalog/aksessuary/avtotovary/tenty-dlya-kvadrotsiklov', '0');
INSERT INTO `urls` VALUES ('565', 'https://www.wildberries.am/catalog/aksessuary/avtotovary/tenty-dlya-mototsiklov', '0');
INSERT INTO `urls` VALUES ('566', 'https://www.wildberries.am/catalog/aksessuary/avtotovary/chehly-dlya-avtomobilnyh-koles', '0');
INSERT INTO `urls` VALUES ('567', 'https://www.wildberries.am/catalog/aksessuary/avtotovary/shchetki-avtomobilnye', '0');
INSERT INTO `urls` VALUES ('568', 'https://www.wildberries.am/catalog/aksessuary/avtotovary/avariynye-prinadlezhnosti', '0');
INSERT INTO `urls` VALUES ('569', 'https://www.wildberries.am/catalog/aksessuary/avtotovary/derzhateli-v-avto?bid=abfeeaef-ba3b-4fd5-a7c3-2cda6c80f3da', '0');
INSERT INTO `urls` VALUES ('570', 'https://www.wildberries.am/catalog/yuvelirnye-ukrasheniya/koltsa', '0');
INSERT INTO `urls` VALUES ('571', 'https://www.wildberries.am/catalog/yuvelirnye-ukrasheniya/koltsa/swarovski', '0');
INSERT INTO `urls` VALUES ('572', 'https://www.wildberries.am/catalog/yuvelirnye-ukrasheniya/koltsa/brilliant', '0');
INSERT INTO `urls` VALUES ('573', 'https://www.wildberries.am/catalog/yuvelirnye-ukrasheniya/koltsa/detskie-koltsa', '0');
INSERT INTO `urls` VALUES ('574', 'https://www.wildberries.am/catalog/yuvelirnye-ukrasheniya/koltsa/zhemchug', '0');
INSERT INTO `urls` VALUES ('575', 'https://www.wildberries.am/catalog/yuvelirnye-ukrasheniya/koltsa/izumrud', '0');
INSERT INTO `urls` VALUES ('576', 'https://www.wildberries.am/catalog/yuvelirnye-ukrasheniya/koltsa/na-dva-paltsa', '0');
INSERT INTO `urls` VALUES ('577', 'https://www.wildberries.am/catalog/yuvelirnye-ukrasheniya/koltsa/na-dve-falangi', '0');
INSERT INTO `urls` VALUES ('578', 'https://www.wildberries.am/catalog/yuvelirnye-ukrasheniya/koltsa/na-falangu', '0');
INSERT INTO `urls` VALUES ('579', 'https://www.wildberries.am/catalog/yuvelirnye-ukrasheniya/koltsa/obruchalnye-koltsa', '0');
INSERT INTO `urls` VALUES ('580', 'https://www.wildberries.am/catalog/yuvelirnye-ukrasheniya/koltsa/pechatki', '0');
INSERT INTO `urls` VALUES ('581', 'https://www.wildberries.am/catalog/yuvelirnye-ukrasheniya/koltsa/pomolvochnye-koltsa', '0');
INSERT INTO `urls` VALUES ('582', 'https://www.wildberries.am/catalog/yuvelirnye-ukrasheniya/koltsa/religioznye', '0');
INSERT INTO `urls` VALUES ('583', 'https://www.wildberries.am/catalog/yuvelirnye-ukrasheniya/koltsa/rubin', '0');
INSERT INTO `urls` VALUES ('584', 'https://www.wildberries.am/catalog/yuvelirnye-ukrasheniya/koltsa/sapfir', '0');
INSERT INTO `urls` VALUES ('585', 'https://www.wildberries.am/catalog/yuvelirnye-ukrasheniya/koltsa/topaz', '0');
INSERT INTO `urls` VALUES ('586', 'https://www.wildberries.am/catalog/yuvelirnye-ukrasheniya/koltsa/fianit', '0');
INSERT INTO `urls` VALUES ('587', 'https://www.wildberries.am/catalog/yuvelirnye-ukrasheniya/koltsa/emal', '0');
INSERT INTO `urls` VALUES ('588', 'https://www.wildberries.am/catalog/yuvelirnye-ukrasheniya/sergi', '0');
INSERT INTO `urls` VALUES ('589', 'https://www.wildberries.am/catalog/yuvelirnye-ukrasheniya/sergi/swarovski', '0');
INSERT INTO `urls` VALUES ('590', 'https://www.wildberries.am/catalog/yuvelirnye-ukrasheniya/sergi/brilliant', '0');
INSERT INTO `urls` VALUES ('591', 'https://www.wildberries.am/catalog/yuvelirnye-ukrasheniya/sergi/dvustoronnie', '0');
INSERT INTO `urls` VALUES ('592', 'https://www.wildberries.am/catalog/yuvelirnye-ukrasheniya/sergi/detskie-sergi', '0');
INSERT INTO `urls` VALUES ('593', 'https://www.wildberries.am/catalog/yuvelirnye-ukrasheniya/sergi/dzhekety', '0');
INSERT INTO `urls` VALUES ('594', 'https://www.wildberries.am/catalog/yuvelirnye-ukrasheniya/sergi/dlinnye-sergi', '0');
INSERT INTO `urls` VALUES ('595', 'https://www.wildberries.am/catalog/yuvelirnye-ukrasheniya/sergi/zhemchug', '0');
INSERT INTO `urls` VALUES ('596', 'https://www.wildberries.am/catalog/yuvelirnye-ukrasheniya/sergi/zazhimy', '0');
INSERT INTO `urls` VALUES ('597', 'https://www.wildberries.am/catalog/yuvelirnye-ukrasheniya/sergi/izumrud', '0');
INSERT INTO `urls` VALUES ('598', 'https://www.wildberries.am/catalog/yuvelirnye-ukrasheniya/sergi/kaffy', '0');
INSERT INTO `urls` VALUES ('599', 'https://www.wildberries.am/catalog/yuvelirnye-ukrasheniya/sergi/odinochnye-sergi', '0');
INSERT INTO `urls` VALUES ('600', 'https://www.wildberries.am/catalog/yuvelirnye-ukrasheniya/sergi/pusety', '0');
INSERT INTO `urls` VALUES ('601', 'https://www.wildberries.am/catalog/yuvelirnye-ukrasheniya/sergi/rubin', '0');
INSERT INTO `urls` VALUES ('602', 'https://www.wildberries.am/catalog/yuvelirnye-ukrasheniya/sergi/sapfir', '0');
INSERT INTO `urls` VALUES ('603', 'https://www.wildberries.am/catalog/yuvelirnye-ukrasheniya/sergi/sergi-koltsa', '0');
INSERT INTO `urls` VALUES ('604', 'https://www.wildberries.am/catalog/yuvelirnye-ukrasheniya/sergi/sergi-tsepochki', '0');
INSERT INTO `urls` VALUES ('605', 'https://www.wildberries.am/catalog/yuvelirnye-ukrasheniya/sergi/topaz', '0');
INSERT INTO `urls` VALUES ('606', 'https://www.wildberries.am/catalog/yuvelirnye-ukrasheniya/sergi/fianit', '0');
INSERT INTO `urls` VALUES ('607', 'https://www.wildberries.am/catalog/yuvelirnye-ukrasheniya/sergi/emal', '0');
INSERT INTO `urls` VALUES ('608', 'https://www.wildberries.am/catalog/yuvelirnye-ukrasheniya/braslety', '0');
INSERT INTO `urls` VALUES ('609', 'https://www.wildberries.am/catalog/yuvelirnye-ukrasheniya?bid=5a362399-c08b-47da-9d52-062e66ee683d', '0');
INSERT INTO `urls` VALUES ('610', 'https://www.wildberries.am/catalog/podarki/zhenshchinam', '0');
INSERT INTO `urls` VALUES ('611', 'https://www.wildberries.am/catalog/podarki/zhenshchinam/podruge', '0');
INSERT INTO `urls` VALUES ('612', 'https://www.wildberries.am/catalog/podarki/zhenshchinam/mame', '0');
INSERT INTO `urls` VALUES ('613', 'https://www.wildberries.am/catalog/podarki/zhenshchinam/babushke', '0');
INSERT INTO `urls` VALUES ('614', 'https://www.wildberries.am/catalog/podarki/zhenshchinam/kollege', '0');
INSERT INTO `urls` VALUES ('615', 'https://www.wildberries.am/catalog/podarki/zhenshchinam/lyubimoy', '0');
INSERT INTO `urls` VALUES ('616', 'https://www.wildberries.am/catalog/podarki/muzhchinam', '0');
INSERT INTO `urls` VALUES ('617', 'https://www.wildberries.am/catalog/podarki/muzhchinam/drugu', '0');
INSERT INTO `urls` VALUES ('618', 'https://www.wildberries.am/catalog/podarki/muzhchinam/pape', '0');
INSERT INTO `urls` VALUES ('619', 'https://www.wildberries.am/catalog/podarki/muzhchinam/dedushke', '0');
INSERT INTO `urls` VALUES ('620', 'https://www.wildberries.am/catalog/podarki/muzhchinam/kollege', '0');
INSERT INTO `urls` VALUES ('621', 'https://www.wildberries.am/catalog/podarki/muzhchinam/lyubimomu', '0');
INSERT INTO `urls` VALUES ('622', 'https://www.wildberries.am/catalog/podarki/na-sobytie', '0');
INSERT INTO `urls` VALUES ('623', 'https://www.wildberries.am/catalog/podarki/na-sobytie/den-rozhdeniya', '0');
INSERT INTO `urls` VALUES ('624', 'https://www.wildberries.am/catalog/podarki-/na-sobytie/den-uchitelya', '0');
INSERT INTO `urls` VALUES ('625', 'https://www.wildberries.am/catalog/podarki/na-sobytie/dlya-sebya', '0');
INSERT INTO `urls` VALUES ('626', 'https://www.wildberries.am/catalog/podarki/na-sobytie/novosele', '0');
INSERT INTO `urls` VALUES ('627', 'https://www.wildberries.am/catalog/podarki/na-sobytie/noviy-god', '0');
INSERT INTO `urls` VALUES ('628', 'https://www.wildberries.am/catalog/podarki/na-sobytie/prosto-tak', '0');
INSERT INTO `urls` VALUES ('629', 'https://www.wildberries.am/catalog/podarki/na-sobytie/svadba', '0');
INSERT INTO `urls` VALUES ('630', 'https://www.wildberries.am/catalog/podarki/na-sobytie/rozhdenie', '0');
INSERT INTO `urls` VALUES ('631', 'https://www.wildberries.am/catalog/podarki/detyam', '0');
INSERT INTO `urls` VALUES ('632', 'https://www.wildberries.am/catalog/podarki/na-sobytie/den-rozhdeniya?pagesize=100&sort=sale&bid=067a52f6-8ae4-4707-9079-4797045884ae&bid=84213b86-eb89-4628-92f9-cfb37e3a0041', '0');
INSERT INTO `urls` VALUES ('633', 'https://www.wildberries.am/catalog/vybor-stilista?utm_source=stylists&utm_campaign=promo_vybor&bid=75d7cb80-a235-4cd7-85e9-0d551b8697c8', '0');
INSERT INTO `urls` VALUES ('634', 'https://www.wildberries.am/catalog/dlya-doma/postelnye-prinadlezhnosti?pagesize=100&sort=sale&bid=59db9b7d-4a97-471d-8715-d4523d05919a', '0');
INSERT INTO `urls` VALUES ('635', 'https://www.wildberries.am/catalog/asksseuary/tovary-dlya-zhivotnyh/odezhda?pagesize=100&sort=sale&bid=c19969c1-9aad-4544-9135-15364ba9dcf6', '0');

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
  `status` smallint(6) NOT NULL DEFAULT 10,
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
