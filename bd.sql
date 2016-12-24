delimiter $$

CREATE DATABASE `mybd` /*!40100 DEFAULT CHARACTER SET utf8 */$$

delimiter $$

CREATE TABLE `forums` (
  `id_forum` int(11) NOT NULL DEFAULT '0',
  `creatorid` int(11) NOT NULL DEFAULT '0',
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_forum`,`creatorid`),
  KEY `key1_idx` (`creatorid`),
  CONSTRAINT `key1` FOREIGN KEY (`creatorid`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8$$


delimiter $$

CREATE TABLE `messages` (
  `id_message` int(11) NOT NULL DEFAULT '0',
  `creatorid` int(11) NOT NULL DEFAULT '0',
  `message` text,
  `id_theme` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_message`,`creatorid`),
  KEY `key4_idx` (`creatorid`),
  KEY `key5_idx` (`id_theme`),
  CONSTRAINT `key4` FOREIGN KEY (`creatorid`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `key5` FOREIGN KEY (`id_theme`) REFERENCES `themes` (`id_theme`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8$$

delimiter $$

CREATE TABLE `themes` (
  `id_theme` int(11) NOT NULL,
  `name1` varchar(45) DEFAULT NULL,
  `creatorid` int(11) NOT NULL DEFAULT '0',
  `id_forum` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_theme`,`id_forum`,`creatorid`),
  KEY `key2_idx` (`creatorid`),
  KEY `key3_idx` (`id_forum`),
  CONSTRAINT `key2` FOREIGN KEY (`creatorid`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `key3` FOREIGN KEY (`id_forum`) REFERENCES `forums` (`id_forum`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8$$

delimiter $$

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `login` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8$$



