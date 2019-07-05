-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 04 juil. 2019 à 19:13
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
-- Structure de la table `competition`
--

DROP TABLE IF EXISTS `competition`;
CREATE TABLE IF NOT EXISTS `competition` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(555) NOT NULL,
  `datecompete` date NOT NULL,
  `lieu` varchar(555) NOT NULL,
  `niveau` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `date_debut_engagement` date DEFAULT NULL,
  `date_fin_engagement` date DEFAULT NULL,
  `id_groupe` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `competition`
--

INSERT INTO `competition` (`id`, `nom`, `datecompete`, `lieu`, `niveau`, `type`, `date_debut_engagement`, `date_fin_engagement`, `id_groupe`) VALUES
(1, 'Mini-Marathon - M12', '2019-06-29', 'Paris 13 EME', 'Challenge/Open', 'Individuelle', '2019-03-19', '2019-06-28', 6),
(2, 'Mini-Marathon - M11 ', '2019-06-29', 'Paris 13 EME', 'Challenge/Open', 'Individuelle', '2019-03-19', '2019-06-28', 7);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
