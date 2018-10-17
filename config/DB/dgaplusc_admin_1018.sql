/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 100131
Source Host           : localhost:3306
Source Database       : dgaplusc_admin

Target Server Type    : MYSQL
Target Server Version : 100131
File Encoding         : 65001

Date: 2018-10-18 04:25:57
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for areas
-- ----------------------------
DROP TABLE IF EXISTS `areas`;
CREATE TABLE `areas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `parent_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of areas
-- ----------------------------
INSERT INTO `areas` VALUES ('1', 'North', '0', '2018-10-10 08:23:12', '2018-10-10 08:23:12');
INSERT INTO `areas` VALUES ('2', 'East', '0', '2018-10-10 08:23:21', '2018-10-10 08:23:21');
INSERT INTO `areas` VALUES ('3', 'South', '0', '2018-10-10 08:23:28', '2018-10-10 08:23:28');
INSERT INTO `areas` VALUES ('4', 'West', '0', '2018-10-10 08:23:34', '2018-10-10 08:23:34');

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `parent_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES ('3', 'peter', '0', '2018-09-26 18:52:46', '2018-09-26 18:52:46');

-- ----------------------------
-- Table structure for equips
-- ----------------------------
DROP TABLE IF EXISTS `equips`;
CREATE TABLE `equips` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `iform_id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `equips_iform_id` (`iform_id`),
  CONSTRAINT `equips_iform_id` FOREIGN KEY (`iform_id`) REFERENCES `iforms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of equips
-- ----------------------------
INSERT INTO `equips` VALUES ('1', '31', 'equip1', 'equip_1.json', '2018-10-11 17:14:14', '2018-10-11 09:14:14');

-- ----------------------------
-- Table structure for iforms
-- ----------------------------
DROP TABLE IF EXISTS `iforms`;
CREATE TABLE `iforms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `content` text,
  `category_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `iforms_category_id` (`category_id`),
  CONSTRAINT `iforms_category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of iforms
-- ----------------------------
INSERT INTO `iforms` VALUES ('31', 'peter', 'iform_31.json', '3', '2018-09-27 03:34:38', '2018-09-26 19:34:38');
INSERT INTO `iforms` VALUES ('32', 'new', 'iform_32.json', '3', '2018-09-27 03:37:41', '2018-09-26 19:37:41');
INSERT INTO `iforms` VALUES ('33', 'root', 'iform_33.json', '3', '2018-09-27 03:37:55', '2018-09-26 19:37:55');
INSERT INTO `iforms` VALUES ('34', 'iform20', 'iform_34.json', '3', '2018-10-11 17:08:22', '2018-10-11 09:08:22');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('3', '2016_06_01_000001_create_oauth_auth_codes_table', '2');
INSERT INTO `migrations` VALUES ('4', '2016_06_01_000002_create_oauth_access_tokens_table', '2');
INSERT INTO `migrations` VALUES ('5', '2016_06_01_000003_create_oauth_refresh_tokens_table', '2');
INSERT INTO `migrations` VALUES ('6', '2016_06_01_000004_create_oauth_clients_table', '2');
INSERT INTO `migrations` VALUES ('7', '2016_06_01_000005_create_oauth_personal_access_clients_table', '2');

-- ----------------------------
-- Table structure for oauth_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `oauth_access_tokens`;
CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of oauth_access_tokens
-- ----------------------------
INSERT INTO `oauth_access_tokens` VALUES ('54509bca6cd23f124c3b107873cb25c45e8a4d9a8e966f5a768e8d56e8318fb970af98d06c1ed20b', '7', '2', null, '[]', '0', '2018-10-17 19:30:57', '2018-10-17 19:30:57', '2019-10-17 19:30:57');

-- ----------------------------
-- Table structure for oauth_auth_codes
-- ----------------------------
DROP TABLE IF EXISTS `oauth_auth_codes`;
CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of oauth_auth_codes
-- ----------------------------

-- ----------------------------
-- Table structure for oauth_clients
-- ----------------------------
DROP TABLE IF EXISTS `oauth_clients`;
CREATE TABLE `oauth_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of oauth_clients
-- ----------------------------
INSERT INTO `oauth_clients` VALUES ('1', null, 'Laravel Personal Access Client', 'D7IK1WQ3NIcsg0NrSOboFhJrf4teCsXqGgc4rDZi', 'http://localhost', '1', '0', '0', '2018-10-16 09:12:29', '2018-10-16 09:12:29');
INSERT INTO `oauth_clients` VALUES ('2', null, 'Laravel Password Grant Client', 'x38WZoSnjjql1AW3W46evBu5jrjPmfjmg396i4L5', 'http://localhost', '0', '1', '0', '2018-10-16 09:12:29', '2018-10-16 09:12:29');
INSERT INTO `oauth_clients` VALUES ('3', null, 'Laravel Personal Access Client', 'Z4y4WBVKqoM1kOu8wNmP8LMSA1giDczN9VMxFGwT', 'http://localhost', '1', '0', '0', '2018-10-17 17:58:54', '2018-10-17 17:58:54');
INSERT INTO `oauth_clients` VALUES ('4', null, 'Laravel Password Grant Client', 'bthzaORhIVKJoQw5ojtawWtlKLmpkRO9mvwj2oR0', 'http://localhost', '0', '1', '0', '2018-10-17 17:58:54', '2018-10-17 17:58:54');

-- ----------------------------
-- Table structure for oauth_personal_access_clients
-- ----------------------------
DROP TABLE IF EXISTS `oauth_personal_access_clients`;
CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_personal_access_clients_client_id_index` (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of oauth_personal_access_clients
-- ----------------------------
INSERT INTO `oauth_personal_access_clients` VALUES ('1', '1', '2018-10-16 09:12:29', '2018-10-16 09:12:29');
INSERT INTO `oauth_personal_access_clients` VALUES ('2', '3', '2018-10-17 17:58:54', '2018-10-17 17:58:54');

-- ----------------------------
-- Table structure for oauth_refresh_tokens
-- ----------------------------
DROP TABLE IF EXISTS `oauth_refresh_tokens`;
CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of oauth_refresh_tokens
-- ----------------------------
INSERT INTO `oauth_refresh_tokens` VALUES ('028f2f8516c4cca71dc8523ed1fa538be9b52e55598451a35dbf2024839453b58637800957ac4e9c', '8c1915deb67a541ceca80b31d821ed0753a62a429d44fe204424e3753b701f307e85a2f5751adeea', '0', '2019-10-17 19:22:33');
INSERT INTO `oauth_refresh_tokens` VALUES ('08ee3bb4652174203f73a648878e58b93c01e67a137a98616ff3a038b38fb0ab58fc10f917a6fa52', 'b0df5b497af55e1eb9ca6b0f11303fe083373352d236ef25c92804bcb7501c09cc5c43fb7c9fd3f5', '0', '2019-10-17 18:53:17');
INSERT INTO `oauth_refresh_tokens` VALUES ('0b184ce88c88fbd0d170d396666e1c8c8e1c9e24d76727f173b81e8b587fc00b946dcb50acbe00d8', '2028e899ec16b37cf742bfc6f5aad0dfbff39f2d962dee6ec37c122ede9c30c40eac9dc240b1941a', '0', '2019-10-17 18:30:55');
INSERT INTO `oauth_refresh_tokens` VALUES ('172ceb70be07f496fc621b3f88fd6ca1a9e43a55911728fd4b5bb15e6f35943df003248f9ada22fa', '693373fb30816f59c96f70a7c96bcb083f99ada5c60164c5aca5221099030e2617cc12e8327b78b4', '0', '2019-10-17 19:26:57');
INSERT INTO `oauth_refresh_tokens` VALUES ('183cc9ab2f73da6d96546a481332bb0dcd48c6edf457485b40b5e93baf6f862e6c095c7a76845f31', '4db63459bf40ccf66fe1af33853cd3d4a85e1bc23182112b0ebc3f860bf3d514a199c1b345f127e4', '0', '2019-10-17 19:27:29');
INSERT INTO `oauth_refresh_tokens` VALUES ('2a41cd68201a6323d791f79b68ba3c986c16915f19ae364702fe73fe48252a6b4323938121987932', '21dde56cf186daabcd88f17eb574db34c48d2ea650deed2aa908d4e25adeb733ee00423b71d771fc', '0', '2019-10-17 18:51:29');
INSERT INTO `oauth_refresh_tokens` VALUES ('3e895837ef7cbdba014a96b2b05627b2314b64539a16547ade83a40671be1225e4240b3965226b8b', '0413ce10a3c0d1fd4190518c77b93bb7a166bca3b464e922505ba20ce22a0b180eec224c40dd6e24', '0', '2019-10-17 19:24:45');
INSERT INTO `oauth_refresh_tokens` VALUES ('55ae83fac1ebd14a0a8f9f413bcd0cc7b8da709e90ce261be8a4381d26278a1d5b035e22c02d571e', 'f37be2c3fe5958e1fe062f1b43820effff9febc2349c872e6a7a53a57336270580d200ebb8e34163', '0', '2019-10-17 19:23:13');
INSERT INTO `oauth_refresh_tokens` VALUES ('69eeb37e590711cc9e75de2fc0ed233de11312d45e9f38565245301a278b53b540d2e3d24a2ebb78', '16e03688d56c2538da228f6debb921596e47306c3e57f450ca9604630778560982d79c82bd485daf', '0', '2019-10-17 18:12:55');
INSERT INTO `oauth_refresh_tokens` VALUES ('73cef1082657181468efdbf756c2baa2cf19344cf76d0c82625c9deedce7c5a808cfc45a51ac5638', 'a0c4af023302da41d4937ba075802cd28a80429d049beb65722e754d2db901a7d9bb034224d04f3b', '0', '2019-10-17 19:16:26');
INSERT INTO `oauth_refresh_tokens` VALUES ('792063527a445879cb27aa96688621415b77c9ee307ce238208eac096e198de0e90005e0947c50be', '760de34ec80e723f2025f5463290ea9e38c84deacf621d44e4edccb043916274a8541f1abf31f3e5', '0', '2019-10-17 19:22:30');
INSERT INTO `oauth_refresh_tokens` VALUES ('905c613a621142dfdd283622c16d3909bf72fac018b27165730cce155b565e5d2d4b0940b8e1e327', '9a1b986129f2452802c4099258bb5d48487b4b0bba28d895b640e9fe99ff3677132880fb65980b04', '0', '2019-10-17 19:10:48');
INSERT INTO `oauth_refresh_tokens` VALUES ('a5bf330d744083faffed4501256abe45f6554f561baa52a3c9936929660eb5a387a6a1af5519f779', '7362a28f41838de888cfdf215736551e1462d7a90d878ff9faccae2e8dcacf1105a4ebc4bf5109c5', '0', '2019-10-17 19:06:29');
INSERT INTO `oauth_refresh_tokens` VALUES ('ad9bca57af25d362f8384af41f529b27d7c5713f005a11b0ce9818e44bdff232a8244c8a604f19d2', '5ae5fa8cb0404b3b7642dec0e78b8922a17f7f4ab6791f58dfe7ef5537e461980feb17b4bd0a25cd', '0', '2019-10-17 19:11:51');
INSERT INTO `oauth_refresh_tokens` VALUES ('b675a7756140e6f9d54f30d98f721448b54d855c7c822f0d66298afb8d995daf80f8886fb7d33439', 'f8abee17ca4c9777426249402bd43bb5b0428163996640f091261d765d855dda969329010541e397', '0', '2019-10-17 19:28:49');
INSERT INTO `oauth_refresh_tokens` VALUES ('c0b2c1da4b39d620c0fb0539407f6b06739b4ca8a76c7474e2fa5d10cb03c449e9d7e889f3b3a942', '54509bca6cd23f124c3b107873cb25c45e8a4d9a8e966f5a768e8d56e8318fb970af98d06c1ed20b', '0', '2019-10-17 19:30:57');
INSERT INTO `oauth_refresh_tokens` VALUES ('c7c34aa40a56d2d395eebdb2e0292ccf20df5e1d31f3671e3473d09dfed432824e83eb35e759c678', '660eca3baa42ca03f7f58ded48ab3d2989e900de960f7825cae3674f6d9b0b8b9c77aa486bc593e1', '0', '2019-10-17 19:11:47');
INSERT INTO `oauth_refresh_tokens` VALUES ('ca2d5e8909f2eb202058968afe0d1a678c579ad7c5793bbba3d78bfcb21ae76d2ef8e9ca78ba70a6', 'a9f6c24c301130beeac97ac1afd349e82cd209a6a4232323d23524f1df4cf483d94217b87ee75be7', '0', '2019-10-17 18:43:16');
INSERT INTO `oauth_refresh_tokens` VALUES ('dbc31b9d4018d8ba60deb99f2051f57dda0e567b4f44ccad95a6da98b333956de5219ec4152ea0f9', '7cd9520a2771d152f56c5b255b53b43139c87fe3ebb815bb70cebf247e111337cc94a5a5dd48be40', '0', '2019-10-17 18:48:30');
INSERT INTO `oauth_refresh_tokens` VALUES ('df742d369c3055ece17052c400c5415a6fbb5be7f28de29e3d0de9f3d1b1df1953ff566c83235c65', '00a4d883deaf0af7732d52cc1904ea216ba7459b7de7e33bc702c9627e36d51aba7d4e34b645c8a8', '0', '2019-10-17 19:13:10');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'root', 'hokelucpy@outlook.com', '$2y$10$k9JWEDjzgl9bssb0SvnPwu0886xJau5tQ/iKBTunlaT8tC51UCPLO', null, '2018-09-19 21:45:45', '2018-09-19 21:45:45');
INSERT INTO `users` VALUES ('2', 'admin', 'hokelucpy@hotmail.com', '$2y$10$YpHllm5NrMjBqI14i6Rl0.Zh6oBz.CQxLzOXDl.MT8X6gtsre/SrW', null, '2018-09-30 18:51:49', '2018-09-30 18:51:49');
INSERT INTO `users` VALUES ('3', 'root', 'hokelucpy@gmail.com', '$2y$10$b15v2di9DdX8yKFxmR26uOz8MeURBIooF6B8v076Bh57xmEPK9yeq', null, '2018-10-10 08:22:15', '2018-10-10 08:22:15');

-- ----------------------------
-- Table structure for workers
-- ----------------------------
DROP TABLE IF EXISTS `workers`;
CREATE TABLE `workers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `area_id` int(10) unsigned NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `users_area_id` (`area_id`),
  CONSTRAINT `users_area_id` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of workers
-- ----------------------------
INSERT INTO `workers` VALUES ('7', '1', 'root', 'a@a.com', '$2y$10$r1w1iKk./QAQSoT/3RmjnOFu1ZOxlUzmGkhdook/AEaG2qCRofx8O', null, '2018-10-16 10:48:04', '2018-10-16 10:48:04');
INSERT INTO `workers` VALUES ('8', '2', 'peter1', 'b@b.com', '$2y$10$w5jgxQ1Pi1.T7aP5XM5Iie2RXPGnnorvv92SYkhBp9G2qXTMMHKc.', null, '2018-10-16 19:35:35', '2018-10-16 19:35:35');

-- ----------------------------
-- Table structure for works
-- ----------------------------
DROP TABLE IF EXISTS `works`;
CREATE TABLE `works` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `worker_id` int(10) unsigned NOT NULL,
  `equip_id` int(10) unsigned NOT NULL,
  `plan_at` date NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `works_user_id` (`worker_id`),
  KEY `works_equip_id` (`equip_id`),
  CONSTRAINT `works_equip_id` FOREIGN KEY (`equip_id`) REFERENCES `equips` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `works_user_id` FOREIGN KEY (`worker_id`) REFERENCES `workers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of works
-- ----------------------------
INSERT INTO `works` VALUES ('1', 'Urgent', '7', '1', '2018-10-30', '1', '2018-10-18 04:10:48', '2018-10-17 18:22:58');
SET FOREIGN_KEY_CHECKS=1;
