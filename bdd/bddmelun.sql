-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 01 juil. 2019 à 13:49
-- Version du serveur :  5.7.21
-- Version de PHP :  7.2.4

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
CREATE DATABASE IF NOT EXISTS `bddmelun` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bddmelun`;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(555) NOT NULL,
  `details` varchar(5555) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`, `details`) VALUES
(1, 'M5', '2014'),
(2, 'M7-1', '2013'),
(3, 'M7-2', '2012'),
(4, 'M9-1', '2011'),
(5, 'M9-2', '2010'),
(6, 'M11-1', '2009'),
(7, 'M11-2', '2008'),
(8, 'M13-1', '2007'),
(9, 'M13-2', '2006'),
(10, 'M15', '2005-2004'),
(11, 'M17', '2003-2002'),
(12, 'M20', '2001-1999'),
(13, 'senior', '1980-1998'),
(14, 'veteran-1', '1970-1979'),
(15, 'veteran-2', '1960-1969'),
(16, 'veteran-3', '1950-1959'),
(17, 'veteran-4', '1949-Et avant'),
(18, 'Baby-Escrime', '2013-Et après');

-- --------------------------------------------------------

--
-- Structure de la table `competition`
--

DROP TABLE IF EXISTS `competition`;
CREATE TABLE IF NOT EXISTS `competition` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(555) NOT NULL,
  `datecompete` date NOT NULL,
  `heurecompete` time NOT NULL,
  `lieux` varchar(555) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `competition`
--

INSERT INTO `competition` (`id`, `nom`, `datecompete`, `heurecompete`, `lieux`, `id_utilisateur`) VALUES
(1, 'Challenge Revenu', '2019-04-06', '13:00:00', 'Melun', 0);

-- --------------------------------------------------------

--
-- Structure de la table `entrainement`
--

DROP TABLE IF EXISTS `entrainement`;
CREATE TABLE IF NOT EXISTS `entrainement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(555) NOT NULL,
  `details` varchar(5555) NOT NULL,
  `dateEnt` date NOT NULL,
  `heureDebEnt` time NOT NULL,
  `heureFinEnt` time NOT NULL,
  `id_typeentrainement` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `entrainement`
--

INSERT INTO `entrainement` (`id`, `nom`, `details`, `dateEnt`, `heureDebEnt`, `heureFinEnt`, `id_typeentrainement`, `id_categorie`, `id_utilisateur`) VALUES
(1, 'Entrainement M7-1', 'Entrainement du Mardi soir pour la catégorie M7-1 en Loisir', '2019-07-02', '18:30:00', '20:00:00', 2, 2, 3);

-- --------------------------------------------------------

--
-- Structure de la table `entrainemeutilisateur`
--

DROP TABLE IF EXISTS `entrainemeutilisateur`;
CREATE TABLE IF NOT EXISTS `entrainemeutilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_entrainement` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `objectif`
--

DROP TABLE IF EXISTS `objectif`;
CREATE TABLE IF NOT EXISTS `objectif` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(555) NOT NULL,
  `details` varchar(555) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `objectif`
--

INSERT INTO `objectif` (`id`, `nom`, `details`, `id_utilisateur`) VALUES
(1, 'Amélioration Débordement', 'Amélioration de l\'action de débordement', 2);

-- --------------------------------------------------------

--
-- Structure de la table `typearbitre`
--

DROP TABLE IF EXISTS `typearbitre`;
CREATE TABLE IF NOT EXISTS `typearbitre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(555) NOT NULL,
  `details` varchar(555) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `typearbitre`
--

INSERT INTO `typearbitre` (`id`, `nom`, `details`) VALUES
(1, 'Stagiaire', 'Arbitre Stagiaire (Tireur)'),
(2, 'Titulaire régional', 'Arbitre Titulaire régional (Tireur)'),
(3, 'Titulaire Nationale', 'Arbitre Titulaire Nationale (Tireur)'),
(4, 'Titulaire internationale', 'Arbitre titulaire internationale (Tireur)');

-- --------------------------------------------------------

--
-- Structure de la table `typeentrainement`
--

DROP TABLE IF EXISTS `typeentrainement`;
CREATE TABLE IF NOT EXISTS `typeentrainement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(555) NOT NULL,
  `details` varchar(5555) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `typeentrainement`
--

INSERT INTO `typeentrainement` (`id`, `nom`, `details`) VALUES
(1, 'Elite', 'Entrainement Elite'),
(2, 'Loisir', 'Entrainement Loisir');

-- --------------------------------------------------------

--
-- Structure de la table `typeutilisateur`
--

DROP TABLE IF EXISTS `typeutilisateur`;
CREATE TABLE IF NOT EXISTS `typeutilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(555) NOT NULL,
  `details` varchar(5555) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `typeutilisateur`
--

INSERT INTO `typeutilisateur` (`id`, `nom`, `details`) VALUES
(1, 'Administrateur', 'Administrateur du site / Gérant club / secrétaire'),
(2, 'Utilisateur', 'Tireur'),
(3, 'MaitreArme', 'Maître d\'arme');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(555) NOT NULL,
  `prenom` varchar(555) NOT NULL,
  `dateAnniversaire` date NOT NULL,
  `login` varchar(555) NOT NULL,
  `mdp` varchar(555) NOT NULL,
  `img` varchar(55555) NOT NULL,
  `telephone` int(11) NOT NULL,
  `mail` varchar(555) NOT NULL,
  `adresse` varchar(555) NOT NULL,
  `telephoneurgent` int(11) NOT NULL,
  `nomurgent` varchar(555) NOT NULL,
  `prenomurgent` varchar(555) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `id_typeutilisateur` int(11) NOT NULL,
  `id_typearbitre` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `dateAnniversaire`, `login`, `mdp`, `img`, `telephone`, `mail`, `adresse`, `telephoneurgent`, `nomurgent`, `prenomurgent`, `id_categorie`, `id_typeutilisateur`, `id_typearbitre`) VALUES
(1, 'Blaix', 'Camille', '1997-01-16', 'blaixc', 'user', '', 630508070, 'blaix.camille@gmail.com', 'Meudon', 633538373, 'Maman1', 'Maman1', 13, 2, 3),
(2, 'Marivint', 'Yvann', '1996-11-15', 'marivinty', 'user', '', 631518171, 'marivint.yvann@gmail.com', 'Vanves', 632528272, 'Maman1', 'Maman1', 13, 1, 0),
(3, 'Ripeau', 'Gabrielle', '1996-05-10', 'ripeaug', 'user', '', 632528176, 'ripeau.gabrielle@gmail.com', 'Malakoff', 632528171, 'Papa1', 'Papa1', 13, 3, 4);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
