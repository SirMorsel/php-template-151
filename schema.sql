-- Adminer 4.2.5 MySQL dump
use app;

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `tbPosts`;
CREATE TABLE `tbPosts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_title` varchar(255) NOT NULL,
  `post_content` varchar(512) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `post_Time` datetime NOT NULL,
  PRIMARY KEY (`post_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `tbPosts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `tbPosts` (`post_id`, `post_title`, `post_content`, `user_id`, `post_Time`) VALUES
(28,	'Test vrom an other person',	'asdasdasd',	41,	'2017-06-22 17:42:05'),
(37,	'Test',	'Hello world',	42,	'2017-06-24 08:47:59'),
(38,	'Test with long post',	'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Ste',	42,	'2017-06-24 08:50:52');

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `displayName` varchar(255) DEFAULT NULL,
  `securetyKey` varchar(255) DEFAULT NULL,
  `isActivated` tinyint(4) NOT NULL DEFAULT '0',
  `resetPassword` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user` (`id`, `email`, `password`, `displayName`, `securetyKey`, `isActivated`, `resetPassword`) VALUES
(41,	'patrick.nibbia@bluewin.ch',	'$2y$10$fKhPzXzGZhaRqOxFY758Q.wc9/XsgcOvu.Fa0hQisYH7/UTB/sUK.',	'Hitman',	'',	1,	''),
(42,	'patrick.nibbia@gmail.com',	'$2y$10$AucoRSmhXU/ZXLTa6P5s3eF9C83LN6Xu6u3wgtZgjvHvLyUzMS3uy',	'Man of Mayhem',	'',	1,	'');

-- 2017-06-24 10:32:09
