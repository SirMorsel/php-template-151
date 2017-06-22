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
(2,	'kjsdfgs',	'asdkjbfbashjdegfashjfdasfvgasusgfsfgaswcgfdvscfzausdf',	31,	'0000-00-00 00:00:00'),
(15,	'Testy',	'Lorem ipsum',	31,	'0000-00-00 00:00:00'),
(16,	'aaa',	'ssss',	31,	'0000-00-00 00:00:00'),
(17,	'hgdfasdfs',	'juhuu',	32,	'0000-00-00 00:00:00'),
(18,	'lasttest',	'hallo',	32,	'0000-00-00 00:00:00');

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `anzeigename` varchar(255) DEFAULT NULL,
  `securetyKey` varchar(255) DEFAULT NULL,
  `isActivated` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user` (`id`, `email`, `password`, `anzeigename`, `securetyKey`, `isActivated`) VALUES
(13,	'red@d.ch',	'$2y$10$CJ9oMp7wkAVtxJbBs.nwle8nw6lkYWYUq5CM6UYrokFGnTkD870Su',	'red',	NULL,	0),
(31,	'root@root.com',	'$2y$10$1INS6GtaBU4dAeaf9SbuU.fL.NGGWFXmZrO4hUQAUL8D7iOkcWAYi',	'root',	NULL,	0),
(32,	'lol@swag.com',	'$2y$10$iN76rAcVQEjeYWAGfkRBs.6hkfktdTcBJhEo47cGtpYH8bH5rFjcK',	'lol',	NULL,	0),
(38,	'patrick.nibbia@gmail.com',	'$2y$10$r.SxS7cKHohbzwIl89hC2ezYxssTy7z4fBkkl7nUodYdBNkZaXkiG',	'ManOfMayhem',	'',	1);

-- 2017-06-22 08:47:29
