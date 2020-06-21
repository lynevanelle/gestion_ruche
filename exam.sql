-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 21 juin 2020 à 15:40
-- Version du serveur :  5.7.26
-- Version de PHP :  7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gestion_ruches`
--

-- --------------------------------------------------------

--
-- Structure de la table `informations`
--

DROP TABLE IF EXISTS `informations`;
CREATE TABLE IF NOT EXISTS `informations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weight` float NOT NULL,
  `humidity` float NOT NULL,
  `create_at` datetime NOT NULL,
  `update_at` datetime DEFAULT NULL,
  `ruche_id` int(11) NOT NULL,
  `temperature` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ruche_id` (`ruche_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `informations`
--

INSERT INTO `informations` (`id`, `weight`, `humidity`, `create_at`, `update_at`, `ruche_id`, `temperature`) VALUES
(9, 124, 12, '2020-06-21 10:04:01', NULL, 6, 12),
(11, 124, 32, '2020-06-21 14:53:24', NULL, 6, 232),
(12, 124, 12, '2020-06-21 16:25:52', NULL, 6, 22),
(15, 2, 23, '2020-06-21 16:39:52', NULL, 9, 2);

-- --------------------------------------------------------

--
-- Structure de la table `ruches`
--

DROP TABLE IF EXISTS `ruches`;
CREATE TABLE IF NOT EXISTS `ruches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `longitude` float NOT NULL,
  `latitude` float NOT NULL,
  `create_at` datetime NOT NULL,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ruches`
--

INSERT INTO `ruches` (`id`, `name`, `longitude`, `latitude`, `create_at`, `update_at`) VALUES
(6, 'RUCHE 1', 12.3648, 12.3648, '2020-06-21 06:59:40', NULL),
(7, 'RUCHE', 1293.27, 1263.13, '2020-06-21 16:10:24', '2020-06-21 16:28:59'),
(9, 'RUCHE 3', 1243, 134, '2020-06-21 16:39:17', NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `informations`
--
ALTER TABLE `informations`
  ADD CONSTRAINT `information_ruche` FOREIGN KEY (`ruche_id`) REFERENCES `ruches` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
