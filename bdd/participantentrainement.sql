-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 05 juil. 2019 à 10:58
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bddmelun`
--

-- --------------------------------------------------------

--
-- Structure de la table `participantentrainement`
--

DROP TABLE IF EXISTS `participantentrainement`;
CREATE TABLE IF NOT EXISTS `participantentrainement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) NOT NULL DEFAULT '0',
  `id_planningentrainement` int(11) NOT NULL DEFAULT '0',
  `presence` tinyint(4) NOT NULL DEFAULT '0',
  `id_entrainement` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `participantentrainement`
--

INSERT INTO `participantentrainement` (`id`, `id_utilisateur`, `id_planningentrainement`, `presence`, `id_entrainement`) VALUES
(1, 1, 1, 1, 3),
(2, 9, 1, 1, NULL),
(3, 8, 27, 1, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
