/*
Navicat MySQL Data Transfer

Source Server         : 10.0.1.132
Source Server Version : 50714
Source Host           : 10.0.1.132:3306
Source Database       : laravel_demo

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2017-11-24 18:53:44
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for bill_details
-- ----------------------------
DROP TABLE IF EXISTS `bill_details`;
CREATE TABLE `bill_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bill_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantily` int(11) NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of bill_details
-- ----------------------------
INSERT INTO `bill_details` VALUES ('1', '1', '1', '1', '160000', '2017-10-27 15:06:13', '2017-10-27 15:06:13');
INSERT INTO `bill_details` VALUES ('2', '1', '2', '2', '170000', '2017-10-27 15:06:13', '2017-10-27 15:06:13');
INSERT INTO `bill_details` VALUES ('3', '2', '7', '3', '220000', '2017-11-24 16:28:41', '2017-11-24 16:28:41');
INSERT INTO `bill_details` VALUES ('4', '2', '1', '2', '160000', '2017-11-24 16:28:41', '2017-11-24 16:28:41');

-- ----------------------------
-- Table structure for bills
-- ----------------------------
DROP TABLE IF EXISTS `bills`;
CREATE TABLE `bills` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `date_order` datetime NOT NULL,
  `total` double NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of bills
-- ----------------------------
INSERT INTO `bills` VALUES ('1', '1', '2017-10-27 15:06:13', '605000', 'Mua Hàng', '2017-10-27 15:06:13', '2017-10-27 15:06:13');
INSERT INTO `bills` VALUES ('2', '3', '2017-11-24 16:28:41', '1185800', 'Cần chuyển hàng  ngay trong tuần', '2017-11-24 16:28:41', '2017-11-24 16:28:41');

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES ('1', '0', 'Áo nam', 'ao-nam', '', 'Áo nam', 'Áo nam', 'Áo nam', '2017-06-02 15:09:37', null);
INSERT INTO `categories` VALUES ('2', '0', 'Quần nam', 'quan-nam', '', 'Quần nam', 'Quần nam', 'Quần nam', '2017-06-02 15:09:37', null);
INSERT INTO `categories` VALUES ('3', '0', 'Phụ kiện nam', 'phu-kien-nam', '', 'Phụ kiện nam', 'Phụ kiện nam', 'Phụ kiện nam', '2017-06-02 15:09:37', null);
INSERT INTO `categories` VALUES ('4', '0', 'Giày nam', 'giay-nam', '', 'Giày nam', 'Giày nam', 'Giày nam', '2017-06-02 15:09:37', null);
INSERT INTO `categories` VALUES ('5', '1', 'Áo sơ mi nam', 'ao-so-mi-nam', '', 'Áo sơ mi nam', 'Áo sơ mi nam', 'Áo sơ mi nam', '2017-06-02 15:09:37', null);
INSERT INTO `categories` VALUES ('6', '1', 'Áo vest name', 'ao-vest-nam', '', 'Áo vest name', 'Áo vest name', 'Áo vest name', '2017-06-02 15:09:37', null);
INSERT INTO `categories` VALUES ('7', '5', 'Áo thun nam', 'ao-thun-nam', 'q', 'Áo thun nam', 'Áo thun nam', 'Áo thun nam', '2017-06-02 15:09:37', '2017-06-06 17:42:48');
INSERT INTO `categories` VALUES ('8', '8', 'Áo khoác nam', 'ao-khoac-nam', 'qư', 'Áo khoác nam', 'Áo khoác nam1', 'Áo khoác nam', '2017-06-02 15:09:37', '2017-06-06 17:42:53');

-- ----------------------------
-- Table structure for customers
-- ----------------------------
DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` int(11) NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of customers
-- ----------------------------
INSERT INTO `customers` VALUES ('1', 'Nguyễn Văn A', 'NguyenvanA@gmail.com', 'FramgiaVietNam', '123456679', null, '2017-10-27 15:06:13', '2017-10-27 15:06:13');
INSERT INTO `customers` VALUES ('3', 'donald trump', 'donaldtrump@gmail.com', 'united states', '123456789', null, '2017-11-24 16:26:25', '2017-11-24 16:26:25');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('4', '2017_04_04_152450_add_level_to_users_table', '2');
INSERT INTO `migrations` VALUES ('8', '2017_05_11_151615_add_status_to_users_table', '3');
INSERT INTO `migrations` VALUES ('13', '2017_05_28_080914_create_categories_table', '4');
INSERT INTO `migrations` VALUES ('16', '2017_06_02_153958_create_products_table', '5');
INSERT INTO `migrations` VALUES ('17', '2017_06_02_155827_create_product_images_table', '5');
INSERT INTO `migrations` VALUES ('18', '2017_07_01_094816_create_products_photo_table', '6');
INSERT INTO `migrations` VALUES ('22', '2017_10_26_111625_create_customers_table', '7');
INSERT INTO `migrations` VALUES ('23', '2017_10_26_111657_create_bills_table', '7');
INSERT INTO `migrations` VALUES ('24', '2017_10_26_111730_create_bill_details_table', '7');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------
INSERT INTO `password_resets` VALUES ('vuhuytuan89@gmail.com', '$2y$10$6v6UR1bNtNB9bGRp3gXVFOXTylbKZJUHL5Ibo90jfQeDhqWcoQNTC', '2017-04-05 15:53:11');

-- ----------------------------
-- Table structure for product_images
-- ----------------------------
DROP TABLE IF EXISTS `product_images`;
CREATE TABLE `product_images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of product_images
-- ----------------------------
INSERT INTO `product_images` VALUES ('7', '1', 'uploads/products/1.jpg', '8617615189_83957b432f_k.jpg', '8617615189_83957b432f_k.jpg', '2017-07-28 17:54:07', '2017-07-28 17:54:07');
INSERT INTO `product_images` VALUES ('8', '2', 'uploads/products/2.jpg', 'asian-women-red-lips.jpg', 'asian-women-red-lips.jpg', '2017-07-28 17:54:19', '2017-07-28 17:54:19');

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cate_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `price` int(11) NOT NULL DEFAULT '0',
  `order` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  `position` int(11) NOT NULL DEFAULT '0',
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('1', '1', 'Áo sơ mi nam hàn quốc 1', 'ao-somi-nam-han-quoc-1', 'Áo sơ mi nam công sở  được thiết kế theo phong cách thời trang,\n                dáng ôm sát cơ thể, nhằm tôn lên sự phong độ, trẻ trung, nam tính của phái mạnh', '\n                    - Form dáng chuẩn, kết hợp với chi tiết phối màu nổi bật. <br>\n                    - Màu sắc nhã nhặn, dễ dàng mix cùng nhiều kiểu quần âu, jeans, kaki…  <br>\n                    - Áo sơ mi nam thiết kế tay dài, cổ bẻ truyền thống tôn lên vẻ lịch lãm, sang trọng nơi công sở.  <br>\n                    - Thích hợp mix cùng các kiểu quần Âu, kaki, jeans… đến công sở\n                ', '160000', '0', '1', '0', 'Áo sơ mi nam hàn quốc 1', 'Áo sơ mi nam hàn quốc 1', 'Áo sơ mi nam hàn quốc 1', null, null);
INSERT INTO `products` VALUES ('2', '1', 'Áo sơ mi nam hàn quốc 2', 'ao-somi-nam-han-quoc-2', 'Áo sơ mi nam công sở  được thiết kế theo phong cách thời trang,\n                dáng ôm sát cơ thể, nhằm tôn lên sự phong độ, trẻ trung, nam tính của phái mạnh', '\n                    - Form dáng chuẩn, kết hợp với chi tiết phối màu nổi bật. <br>\n                    - Màu sắc nhã nhặn, dễ dàng mix cùng nhiều kiểu quần âu, jeans, kaki…  <br>\n                    - Áo sơ mi nam thiết kế tay dài, cổ bẻ truyền thống tôn lên vẻ lịch lãm, sang trọng nơi công sở.  <br>\n                    - Thích hợp mix cùng các kiểu quần Âu, kaki, jeans… đến công sở\n                ', '170000', '0', '1', '0', 'Áo sơ mi nam hàn quốc 2', 'Áo sơ mi nam hàn quốc 2', 'Áo sơ mi nam hàn quốc 2', null, null);
INSERT INTO `products` VALUES ('3', '1', 'Áo sơ mi nam hàn quốc 3', 'ao-somi-nam-han-quoc-3', 'Áo sơ mi nam công sở  được thiết kế theo phong cách thời trang,\n                dáng ôm sát cơ thể, nhằm tôn lên sự phong độ, trẻ trung, nam tính của phái mạnh', '\n                    - Form dáng chuẩn, kết hợp với chi tiết phối màu nổi bật. <br>\n                    - Màu sắc nhã nhặn, dễ dàng mix cùng nhiều kiểu quần âu, jeans, kaki…  <br>\n                    - Áo sơ mi nam thiết kế tay dài, cổ bẻ truyền thống tôn lên vẻ lịch lãm, sang trọng nơi công sở.  <br>\n                    - Thích hợp mix cùng các kiểu quần Âu, kaki, jeans… đến công sở\n                ', '180000', '0', '1', '0', 'Áo sơ mi nam hàn quốc 3', 'Áo sơ mi nam hàn quốc 3', 'Áo sơ mi nam hàn quốc 3', null, null);
INSERT INTO `products` VALUES ('4', '1', 'Áo sơ mi nam hàn quốc 4', 'ao-somi-nam-han-quoc-4', 'Áo sơ mi nam công sở  được thiết kế theo phong cách thời trang,\n                dáng ôm sát cơ thể, nhằm tôn lên sự phong độ, trẻ trung, nam tính của phái mạnh', '\n                    - Form dáng chuẩn, kết hợp với chi tiết phối màu nổi bật. <br>\n                    - Màu sắc nhã nhặn, dễ dàng mix cùng nhiều kiểu quần âu, jeans, kaki…  <br>\n                    - Áo sơ mi nam thiết kế tay dài, cổ bẻ truyền thống tôn lên vẻ lịch lãm, sang trọng nơi công sở.  <br>\n                    - Thích hợp mix cùng các kiểu quần Âu, kaki, jeans… đến công sở\n                ', '190000', '0', '1', '0', 'Áo sơ mi nam hàn quốc 4', 'Áo sơ mi nam hàn quốc 4', 'Áo sơ mi nam hàn quốc 4', null, null);
INSERT INTO `products` VALUES ('5', '1', 'Áo sơ mi nam hàn quốc 5', 'ao-somi-nam-han-quoc-5', 'Áo sơ mi nam công sở  được thiết kế theo phong cách thời trang,\n                dáng ôm sát cơ thể, nhằm tôn lên sự phong độ, trẻ trung, nam tính của phái mạnh', '\n                    - Form dáng chuẩn, kết hợp với chi tiết phối màu nổi bật. <br>\n                    - Màu sắc nhã nhặn, dễ dàng mix cùng nhiều kiểu quần âu, jeans, kaki…  <br>\n                    - Áo sơ mi nam thiết kế tay dài, cổ bẻ truyền thống tôn lên vẻ lịch lãm, sang trọng nơi công sở.  <br>\n                    - Thích hợp mix cùng các kiểu quần Âu, kaki, jeans… đến công sở\n                ', '200000', '0', '1', '0', 'Áo sơ mi nam hàn quốc 5', 'Áo sơ mi nam hàn quốc 5', 'Áo sơ mi nam hàn quốc 5', null, null);
INSERT INTO `products` VALUES ('6', '1', 'Áo sơ mi nam hàn quốc 6', 'ao-somi-nam-han-quoc-6', 'Áo sơ mi nam công sở  được thiết kế theo phong cách thời trang,\n                dáng ôm sát cơ thể, nhằm tôn lên sự phong độ, trẻ trung, nam tính của phái mạnh', '\n                    - Form dáng chuẩn, kết hợp với chi tiết phối màu nổi bật. <br>\n                    - Màu sắc nhã nhặn, dễ dàng mix cùng nhiều kiểu quần âu, jeans, kaki…  <br>\n                    - Áo sơ mi nam thiết kế tay dài, cổ bẻ truyền thống tôn lên vẻ lịch lãm, sang trọng nơi công sở.  <br>\n                    - Thích hợp mix cùng các kiểu quần Âu, kaki, jeans… đến công sở\n                ', '210000', '0', '1', '0', 'Áo sơ mi nam hàn quốc 6', 'Áo sơ mi nam hàn quốc 6', 'Áo sơ mi nam hàn quốc 6', null, null);
INSERT INTO `products` VALUES ('7', '1', 'Áo sơ mi nam hàn quốc 7', 'ao-somi-nam-han-quoc-7', 'Áo sơ mi nam công sở  được thiết kế theo phong cách thời trang,\n                dáng ôm sát cơ thể, nhằm tôn lên sự phong độ, trẻ trung, nam tính của phái mạnh', '\n                    - Form dáng chuẩn, kết hợp với chi tiết phối màu nổi bật. <br>\n                    - Màu sắc nhã nhặn, dễ dàng mix cùng nhiều kiểu quần âu, jeans, kaki…  <br>\n                    - Áo sơ mi nam thiết kế tay dài, cổ bẻ truyền thống tôn lên vẻ lịch lãm, sang trọng nơi công sở.  <br>\n                    - Thích hợp mix cùng các kiểu quần Âu, kaki, jeans… đến công sở\n                ', '220000', '0', '1', '0', 'Áo sơ mi nam hàn quốc 7', 'Áo sơ mi nam hàn quốc 7', 'Áo sơ mi nam hàn quốc 7', null, null);
INSERT INTO `products` VALUES ('8', '1', 'Áo sơ mi nam hàn quốc 8', 'ao-somi-nam-han-quoc-8', 'Áo sơ mi nam công sở  được thiết kế theo phong cách thời trang,\n                dáng ôm sát cơ thể, nhằm tôn lên sự phong độ, trẻ trung, nam tính của phái mạnh', '\n                    - Form dáng chuẩn, kết hợp với chi tiết phối màu nổi bật. <br>\n                    - Màu sắc nhã nhặn, dễ dàng mix cùng nhiều kiểu quần âu, jeans, kaki…  <br>\n                    - Áo sơ mi nam thiết kế tay dài, cổ bẻ truyền thống tôn lên vẻ lịch lãm, sang trọng nơi công sở.  <br>\n                    - Thích hợp mix cùng các kiểu quần Âu, kaki, jeans… đến công sở\n                ', '230000', '0', '1', '0', 'Áo sơ mi nam hàn quốc 8', 'Áo sơ mi nam hàn quốc 8', 'Áo sơ mi nam hàn quốc 8', null, null);
INSERT INTO `products` VALUES ('9', '1', 'Áo sơ mi nam hàn quốc 9', 'ao-somi-nam-han-quoc-9', 'Áo sơ mi nam công sở  được thiết kế theo phong cách thời trang,\n                dáng ôm sát cơ thể, nhằm tôn lên sự phong độ, trẻ trung, nam tính của phái mạnh', '\n                    - Form dáng chuẩn, kết hợp với chi tiết phối màu nổi bật. <br>\n                    - Màu sắc nhã nhặn, dễ dàng mix cùng nhiều kiểu quần âu, jeans, kaki…  <br>\n                    - Áo sơ mi nam thiết kế tay dài, cổ bẻ truyền thống tôn lên vẻ lịch lãm, sang trọng nơi công sở.  <br>\n                    - Thích hợp mix cùng các kiểu quần Âu, kaki, jeans… đến công sở\n                ', '240000', '0', '1', '0', 'Áo sơ mi nam hàn quốc 9', 'Áo sơ mi nam hàn quốc 9', 'Áo sơ mi nam hàn quốc 9', null, null);
INSERT INTO `products` VALUES ('10', '2', 'Áo sơ mi nam hàn quốc 1011', 'ao-somi-nam-han-quoc-101', 'Áo sơ mi nam công sở  được thiết kế theo phong cách thời trang,\r\n                dáng ôm sát cơ thể, nhằm tôn lên sự phong độ, trẻ trung, nam tính của phái mạnh', '- Form dáng chuẩn, kết hợp với chi tiết phối màu nổi bật. <br>\r\n                    - Màu sắc nhã nhặn, dễ dàng mix cùng nhiều kiểu quần âu, jeans, kaki…  <br>\r\n                    - Áo sơ mi nam thiết kế tay dài, cổ bẻ truyền thống tôn lên vẻ lịch lãm, sang trọng nơi công sở.  <br>\r\n                    - Thích hợp mix cùng các kiểu quần Âu, kaki, jeans… đến công sở', '2500001', '0', '1', '0', 'Áo sơ mi nam hàn quốc 101', 'Áo sơ mi nam hàn quốc 101', 'Áo sơ mi nam hàn quốc 101', null, '2017-06-06 08:53:54');
INSERT INTO `products` VALUES ('15', '2', 'Phó thủ tướng: Chính phủ không tăng trưởng bằng mọi giá', 'Pho-thu-tuong-Chinh-phu-khong-tang-truong-bang-moi-gia', null, null, '0', '0', '1', '0', null, null, null, '2017-06-15 14:37:22', '2017-06-23 13:33:02');

-- ----------------------------
-- Table structure for productsphoto
-- ----------------------------
DROP TABLE IF EXISTS `productsphoto`;
CREATE TABLE `productsphoto` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `productsphoto_product_id_foreign` (`product_id`),
  CONSTRAINT `productsphoto_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of productsphoto
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Tuan', 'tuanvh@gmail.com', '$2y$10$WETTJg7JRRCTEvwyKCdbIOfg/gtfR8rj2c6fDhkMPBAAyR8cr4n0a', '1', '1', 'Kvt23wAzLPsimiFjcGOc4tKtZvH8590CDDuM8DqS5xvn9zhzmo95svgV6KjR', null, '2017-05-12 10:58:13');
INSERT INTO `users` VALUES ('3', 'user1', 'user1@gmail.com', '123', '0', '1', null, '2017-05-11 17:58:07', '2017-05-11 17:58:07');
INSERT INTO `users` VALUES ('5', 'user2', 'user2@gmail.com', '$2y$10$QaIFGY6cRnC9uBNCIgIR3ePVKs1XQ4BSVs3U7W1VA2YCe5qL9OXKi', '1', '1', 'AlxudPh5pEyr5Kjp7454qiTnaz6DpQIy6aTpe4kApC9x5LxpJRMWnmqQ2KkR', '2017-05-12 09:07:19', '2017-05-12 09:07:19');
