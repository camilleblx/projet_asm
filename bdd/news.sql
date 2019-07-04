-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 04 juil. 2019 à 19:25
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
-- Structure de la table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `objet` varchar(555) NOT NULL,
  `date_creation` date NOT NULL,
  `img` varchar(500) DEFAULT NULL,
  `lien` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`id`, `objet`, `date_creation`, `img`, `lien`) VALUES
(1, 'Clap de fin sur la Fête des Jeunes', '2019-06-23', 'img/news/news1.jpg', 'http://www.escrime-ffe.fr/competitions-france/clap-de-fin-sur-la-fete-des-jeunes'),
(2, 'Stage de Vichy/ Épreuve du brevet ', '2019-07-17', 'img/news/news2.jpg', 'http://www.escrime-ffe.fr/trouver-un-stage-d-escrime/important-stage-national-m15-a-vichy'),
(3, 'Tireurs français à Naples pour les Universiades', '2019-07-24', 'img/news/news3.jpg', 'http://www.escrime-ffe.fr/competitons-monde/les-tireurs-francais-a-naples-pour-les-universiades');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
