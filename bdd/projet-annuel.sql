-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 26 juin 2019 à 22:28
-- Version du serveur :  5.7.19
-- Version de PHP :  7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet-annuel`
--

-- --------------------------------------------------------

--
-- Structure de la table `ged`
--

DROP TABLE IF EXISTS `ged`;
CREATE TABLE IF NOT EXISTS `ged` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_categorie` int(11) NOT NULL DEFAULT '0',
  `id_utilisateur` int(11) NOT NULL DEFAULT '0',
  `id_magasin` int(11) NOT NULL DEFAULT '0',
  `intitule` varchar(150) NOT NULL,
  `commentaire` text NOT NULL,
  `filename` text NOT NULL,
  `extension` varchar(50) NOT NULL,
  `poids` double NOT NULL DEFAULT '0',
  `path` text NOT NULL,
  `date_crea` datetime NOT NULL,
  `auteur_crea` varchar(100) NOT NULL,
  `date_modif` datetime NOT NULL,
  `auteur_modif` varchar(100) NOT NULL,
  `actif` int(11) NOT NULL DEFAULT '1',
  `suppr` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ged`
--

INSERT INTO `ged` (`id`, `id_categorie`, `id_utilisateur`, `id_magasin`, `intitule`, `commentaire`, `filename`, `extension`, `poids`, `path`, `date_crea`, `auteur_crea`, `date_modif`, `auteur_modif`, `actif`, `suppr`) VALUES
(4, 1, 1, 1, 'test', 'test', 'filet.png', 'png', 189.181640625, 'C:\\wamp64\\www\\projet-annuel-m1\\0-config/../DATAS/1/filet.png', '2019-06-26 14:40:34', '1|ymarivint', '0000-00-00 00:00:00', '', 1, 0),
(3, 1, 1, 1, 'test', 'test', 'package-lock.json', 'json', 0.5302734375, 'C:\\wamp64\\www\\projet-annuel-m1\\0-config/../DATAS/1/package-lock.json', '2019-06-26 14:40:16', '1|ymarivint', '0000-00-00 00:00:00', '', 1, 0),
(5, 3, 1, 1, 'trere', 'erter', 'contact.PNG', 'PNG', 104.2119140625, 'DATAS/1/contact.PNG', '2019-06-26 14:44:20', '1|ymarivint', '0000-00-00 00:00:00', '', 1, 0),
(6, 1, 1, 2, 'test fichier', 'test', 'contact.PNG', 'PNG', 104.2119140625, 'DATAS/2/contact.PNG', '2019-06-26 14:49:55', '1|ymarivint', '0000-00-00 00:00:00', '', 1, 0),
(7, 3, 1, 1, 'test', 'test', 'logo2.webp', 'webp', 13.69921875, 'DATAS/1/logo2.webp', '2019-06-26 21:07:58', '1|ymarivint', '0000-00-00 00:00:00', '', 1, 0),
(8, 2, 1, 1, 'test', 'test', 'baspage.PNG', 'PNG', 21.0537109375, 'DATAS/1/baspage.PNG', '2019-06-26 21:10:56', '1|ymarivint', '0000-00-00 00:00:00', '', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `ged_categorie`
--

DROP TABLE IF EXISTS `ged_categorie`;
CREATE TABLE IF NOT EXISTS `ged_categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `intitule` varchar(200) NOT NULL,
  `date_crea` datetime NOT NULL,
  `date_modif` datetime DEFAULT NULL,
  `auteur_modif` varchar(50) NOT NULL,
  `actif` tinyint(1) NOT NULL DEFAULT '0',
  `suppr` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ged_categorie`
--

INSERT INTO `ged_categorie` (`id`, `intitule`, `date_crea`, `date_modif`, `auteur_modif`, `actif`, `suppr`) VALUES
(1, 'visuel', '0000-00-00 00:00:00', NULL, '', 0, 0),
(2, 'sonore', '0000-00-00 00:00:00', NULL, '', 0, 0),
(3, 'olfactif', '0000-00-00 00:00:00', NULL, '', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `magasin`
--

DROP TABLE IF EXISTS `magasin`;
CREATE TABLE IF NOT EXISTS `magasin` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `intitule` varchar(200) NOT NULL,
  `commentaire` text NOT NULL,
  `date_crea` datetime NOT NULL,
  `auteur_crea` varchar(100) NOT NULL DEFAULT '',
  `date_modif` datetime DEFAULT NULL,
  `auteur_modif` varchar(50) NOT NULL,
  `actif` tinyint(1) NOT NULL DEFAULT '0',
  `suppr` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `magasin`
--

INSERT INTO `magasin` (`id`, `intitule`, `commentaire`, `date_crea`, `auteur_crea`, `date_modif`, `auteur_modif`, `actif`, `suppr`) VALUES
(1, 'Magasin 1', '', '2019-06-26 00:00:00', '', NULL, '', 0, 0),
(2, 'Magasin 2', '', '2019-06-26 00:00:00', '', NULL, '', 0, 0),
(3, 'Magasin 3', '', '0000-00-00 00:00:00', '', NULL, '', 0, 0),
(10, 'Magasin', '', '2019-06-26 12:36:29', '', '2019-06-26 12:36:29', '1|ymarivint', 1, 1),
(11, 'Magasin', '', '2019-06-26 12:36:30', '', '2019-06-26 12:36:30', '1|ymarivint', 1, 1),
(12, 'Magasin', '', '2019-06-26 12:36:30', '', '2019-06-26 12:36:30', '1|ymarivint', 1, 1),
(13, 'Magasin', '', '2019-06-26 12:36:31', '', '2019-06-26 12:36:31', '1|ymarivint', 1, 1),
(14, 'Magasin', '', '2019-06-26 12:36:31', '', '2019-06-26 12:36:31', '1|ymarivint', 1, 1),
(15, 'Magasin', '', '2019-06-26 12:36:32', '', '2019-06-26 12:36:32', '1|ymarivint', 1, 1),
(16, 'Magasin', '', '2019-06-26 12:36:32', '', '2019-06-26 12:36:32', '1|ymarivint', 1, 1),
(17, 'Magasin', '', '2019-06-26 12:36:33', '', '2019-06-26 12:36:33', '1|ymarivint', 1, 1),
(18, 'Magasin', '', '2019-06-26 12:36:33', '', '2019-06-26 12:36:33', '1|ymarivint', 1, 1),
(19, 'Magasin', '', '2019-06-26 12:36:33', '', '2019-06-26 12:36:33', '1|ymarivint', 1, 1),
(20, 'Magasin', '', '2019-06-26 12:36:34', '', '2019-06-26 12:36:34', '1|ymarivint', 1, 1),
(21, 'Magasin', '', '2019-06-26 12:36:37', '', '2019-06-26 12:36:37', '1|ymarivint', 1, 1),
(22, 'Magasin', '', '2019-06-26 12:36:38', '', '2019-06-26 12:36:38', '1|ymarivint', 1, 1),
(23, 'Magasin', '', '2019-06-26 12:36:39', '', '2019-06-26 12:36:39', '1|ymarivint', 1, 1),
(24, 'Magasin yy', 'yy', '2019-06-26 09:46:16', '1|ymarivint', '0000-00-00 00:00:00', '', 1, 0),
(25, 'Magasin yy', 'yy', '2019-06-26 09:46:18', '1|ymarivint', '0000-00-00 00:00:00', '', 1, 0),
(26, 'Magasin yy', 'yy', '2019-06-26 09:46:39', '1|ymarivint', '0000-00-00 00:00:00', '', 1, 0),
(27, 'Magasin', '', '2019-06-26 12:38:00', '', '2019-06-26 12:38:00', '1|ymarivint', 1, 1),
(28, 'Magasin', '', '2019-06-26 12:37:58', '', '2019-06-26 12:37:58', '1|ymarivint', 1, 1),
(29, 'Magasin', '', '2019-06-26 12:36:58', '', '2019-06-26 12:36:58', '1|ymarivint', 1, 1),
(30, 'Magasin test', 'test', '2019-06-26 12:43:32', '1|ymarivint', '0000-00-00 00:00:00', '', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `magasin_utilisateur`
--

DROP TABLE IF EXISTS `magasin_utilisateur`;
CREATE TABLE IF NOT EXISTS `magasin_utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_magasin` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date_crea` datetime NOT NULL,
  `auteur_crea` varchar(100) NOT NULL DEFAULT '',
  `date_modif` datetime DEFAULT NULL,
  `auteur_modif` varchar(50) NOT NULL,
  `actif` tinyint(1) NOT NULL DEFAULT '0',
  `suppr` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `magasin_utilisateur`
--

INSERT INTO `magasin_utilisateur` (`id`, `id_magasin`, `id_utilisateur`, `date_crea`, `auteur_crea`, `date_modif`, `auteur_modif`, `actif`, `suppr`) VALUES
(4, 1, 1, '2019-06-26 00:00:00', '', NULL, '', 0, 0),
(5, 2, 1, '0000-00-00 00:00:00', '', NULL, '', 0, 0),
(6, 3, 1, '0000-00-00 00:00:00', '', NULL, '', 0, 0),
(7, 10, 1, '2019-06-26 09:38:40', '', '0000-00-00 00:00:00', '', 1, 0),
(8, 11, 1, '2019-06-26 09:40:23', '1|ymarivint', '0000-00-00 00:00:00', '', 1, 0),
(9, 12, 1, '2019-06-26 09:40:43', '1|ymarivint', '0000-00-00 00:00:00', '', 1, 0),
(10, 13, 1, '2019-06-26 09:42:00', '1|ymarivint', '0000-00-00 00:00:00', '', 1, 0),
(11, 14, 1, '2019-06-26 09:42:03', '1|ymarivint', '0000-00-00 00:00:00', '', 1, 0),
(12, 15, 1, '2019-06-26 09:42:11', '1|ymarivint', '0000-00-00 00:00:00', '', 1, 0),
(13, 16, 1, '2019-06-26 09:42:27', '1|ymarivint', '0000-00-00 00:00:00', '', 1, 0),
(14, 17, 1, '2019-06-26 09:42:36', '1|ymarivint', '0000-00-00 00:00:00', '', 1, 0),
(15, 18, 1, '2019-06-26 09:42:41', '1|ymarivint', '0000-00-00 00:00:00', '', 1, 0),
(16, 19, 1, '2019-06-26 09:43:47', '1|ymarivint', '0000-00-00 00:00:00', '', 1, 0),
(17, 20, 1, '2019-06-26 09:46:06', '1|ymarivint', '0000-00-00 00:00:00', '', 1, 0),
(18, 21, 1, '2019-06-26 09:46:09', '1|ymarivint', '0000-00-00 00:00:00', '', 1, 0),
(19, 22, 1, '2019-06-26 09:46:11', '1|ymarivint', '0000-00-00 00:00:00', '', 1, 0),
(20, 23, 1, '2019-06-26 09:46:14', '1|ymarivint', '0000-00-00 00:00:00', '', 1, 0),
(21, 24, 1, '2019-06-26 09:46:16', '1|ymarivint', '0000-00-00 00:00:00', '', 1, 0),
(22, 25, 1, '2019-06-26 09:46:18', '1|ymarivint', '0000-00-00 00:00:00', '', 1, 0),
(23, 26, 1, '2019-06-26 09:46:39', '1|ymarivint', '0000-00-00 00:00:00', '', 1, 0),
(24, 27, 1, '2019-06-26 09:47:29', '1|ymarivint', '0000-00-00 00:00:00', '', 1, 0),
(25, 30, 1, '2019-06-26 12:43:32', '1|ymarivint', '0000-00-00 00:00:00', '', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `materiel`
--

DROP TABLE IF EXISTS `materiel`;
CREATE TABLE IF NOT EXISTS `materiel` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `intitule` varchar(200) NOT NULL,
  `date_crea` datetime NOT NULL,
  `auteur_crea` varchar(100) NOT NULL DEFAULT '',
  `date_modif` datetime DEFAULT NULL,
  `auteur_modif` varchar(50) NOT NULL,
  `actif` tinyint(1) NOT NULL DEFAULT '0',
  `suppr` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `materiel_utilisateur`
--

DROP TABLE IF EXISTS `materiel_utilisateur`;
CREATE TABLE IF NOT EXISTS `materiel_utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) NOT NULL,
  `id_materiel` int(11) NOT NULL,
  `valeur` varchar(250) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `date_crea` datetime NOT NULL,
  `auteur_crea` varchar(100) NOT NULL DEFAULT '',
  `date_modif` datetime NOT NULL,
  `auteur_modif` varchar(50) NOT NULL,
  `actif` tinyint(1) NOT NULL DEFAULT '0',
  `suppr` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `pubs`
--

DROP TABLE IF EXISTS `pubs`;
CREATE TABLE IF NOT EXISTS `pubs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `intitule` varchar(200) NOT NULL DEFAULT '',
  `id_type` int(11) NOT NULL,
  `id_magasin` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_ged` int(11) NOT NULL DEFAULT '0',
  `date_crea` datetime NOT NULL,
  `auteur_crea` varchar(200) NOT NULL DEFAULT '',
  `date_modif` datetime DEFAULT NULL,
  `auteur_modif` varchar(50) NOT NULL,
  `actif` tinyint(1) NOT NULL DEFAULT '0',
  `suppr` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pubs`
--

INSERT INTO `pubs` (`id`, `intitule`, `id_type`, `id_magasin`, `id_utilisateur`, `id_ged`, `date_crea`, `auteur_crea`, `date_modif`, `auteur_modif`, `actif`, `suppr`) VALUES
(4, 'test', 1, 1, 1, 1, '2019-06-26 00:00:00', '1|ymarivint', NULL, '', 0, 0),
(5, 'test', 2, 1, 1, 2, '0000-00-00 00:00:00', '', NULL, '', 0, 0),
(6, 'test', 3, 1, 1, 1, '0000-00-00 00:00:00', '', NULL, '', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `type_materiel`
--

DROP TABLE IF EXISTS `type_materiel`;
CREATE TABLE IF NOT EXISTS `type_materiel` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `intitule` varchar(200) NOT NULL,
  `date_crea` datetime NOT NULL,
  `auteur_crea` varchar(100) NOT NULL DEFAULT '',
  `date_modif` datetime DEFAULT NULL,
  `auteur_modif` varchar(50) NOT NULL,
  `actif` tinyint(1) NOT NULL DEFAULT '0',
  `suppr` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `type_pubs`
--

DROP TABLE IF EXISTS `type_pubs`;
CREATE TABLE IF NOT EXISTS `type_pubs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `intitule` varchar(100) NOT NULL,
  `date_crea` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `auteur_crea` varchar(100) NOT NULL DEFAULT '',
  `date_modif` datetime DEFAULT '0000-00-00 00:00:00',
  `auteur_modif` varchar(50) NOT NULL,
  `actif` tinyint(1) NOT NULL DEFAULT '0',
  `suppr` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type_pubs`
--

INSERT INTO `type_pubs` (`id`, `intitule`, `date_crea`, `auteur_crea`, `date_modif`, `auteur_modif`, `actif`, `suppr`) VALUES
(1, 'visuel\r\n', '2019-06-26 00:00:00', '1|ymarivint', '0000-00-00 00:00:00', '', 0, 0),
(2, 'sonore', '2019-06-26 00:00:00', '1|ymarivint', '0000-00-00 00:00:00', '', 0, 0),
(3, 'olfactif', '2019-06-26 00:00:00', '1|ymarivint', '0000-00-00 00:00:00', '', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `type_utilisateur`
--

DROP TABLE IF EXISTS `type_utilisateur`;
CREATE TABLE IF NOT EXISTS `type_utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `intitule` varchar(100) NOT NULL,
  `date_crea` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `auteur_crea` varchar(100) NOT NULL DEFAULT '',
  `date_modif` datetime DEFAULT '0000-00-00 00:00:00',
  `auteur_modif` varchar(50) NOT NULL,
  `actif` tinyint(1) NOT NULL DEFAULT '0',
  `suppr` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type_utilisateur`
--

INSERT INTO `type_utilisateur` (`id`, `intitule`, `date_crea`, `auteur_crea`, `date_modif`, `auteur_modif`, `actif`, `suppr`) VALUES
(1, 'entreprise', '0000-00-00 00:00:00', '', NULL, '', 0, 0),
(2, 'magasin', '0000-00-00 00:00:00', '', NULL, '', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_type` int(11) NOT NULL DEFAULT '0',
  `login` varchar(50) CHARACTER SET utf8 NOT NULL,
  `mdp` varchar(255) CHARACTER SET utf8 NOT NULL,
  `nom` varchar(50) CHARACTER SET utf8 NOT NULL,
  `prenom` varchar(50) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `date_crea` date NOT NULL,
  `auteur_crea` varchar(100) NOT NULL DEFAULT '',
  `date_modif` date DEFAULT NULL,
  `auteur_modif` varchar(50) CHARACTER SET utf8 NOT NULL,
  `actif` tinyint(1) NOT NULL DEFAULT '0',
  `suppr` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `id_type`, `login`, `mdp`, `nom`, `prenom`, `email`, `admin`, `date_crea`, `auteur_crea`, `date_modif`, `auteur_modif`, `actif`, `suppr`) VALUES
(1, 1, 'ymarivint', '21232f297a57a5a743894a0e4a801fc3', 'Marivint', 'Yvann', 'marivint.yvann@gmail.com', 1, '2018-03-03', '', '0000-00-00', '', 1, 0),
(14, 2, 'grippeau', '21232f297a57a5a743894a0e4a801fc3', 'Rippeau', 'Gabrielle', 'gabrielle@gmail.com', 1, '0000-00-00', '', NULL, '', 0, 0),
(15, 0, '', '', '', '', '', 0, '2019-06-26', '', '2019-06-26', '|', 1, 1),
(16, 0, '', '', '', '', '', 0, '2019-06-26', '', '2019-06-26', '|', 1, 1),
(17, 0, '', '', '', '', '', 0, '2019-06-26', '', '2019-06-26', '1|ymarivint', 1, 1),
(18, 0, '', '', '', '', '', 0, '2019-06-26', '', '2019-06-26', '1|ymarivint', 1, 1),
(19, 0, '', '', '', '', '', 0, '2019-06-26', '', '2019-06-26', '1|ymarivint', 1, 1),
(20, 0, '', '', '', '', '', 0, '2019-06-26', '', '2019-06-26', '1|ymarivint', 1, 1),
(22, 0, '', '', '', '', '', 0, '2019-06-26', '', '2019-06-26', '1|ymarivint', 1, 1),
(21, 0, '', '', '', '', '', 0, '2019-06-26', '', '2019-06-26', '1|ymarivint', 1, 1),
(23, 0, '', '', '', '', '', 0, '2019-06-26', '', '2019-06-26', '1|ymarivint', 1, 1),
(24, 0, '', '', '', '', '', 0, '2019-06-26', '', '2019-06-26', '1|ymarivint', 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
