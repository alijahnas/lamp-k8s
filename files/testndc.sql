-- Adminer 4.7.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

CREATE DATABASE `testndc` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `testndc`;

DROP TABLE IF EXISTS `contenu_base_testndc`;
CREATE TABLE `contenu_base_testndc` (
  `Index` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(30) DEFAULT NULL,
  `Prenom` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`Index`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `contenu_base_testndc` (`Index`, `Nom`, `Prenom`) VALUES
(1,	'Doe',	'John'),
(2,	'Dupont',	'Jean'),
(3,	'Morrison',	'Jim'),
(4,	'Lennon',	'John'),
(5,	'Young',	'Angus'),
(6,	'Menez',	'Bernard');

-- 2021-03-23 09:31:54
