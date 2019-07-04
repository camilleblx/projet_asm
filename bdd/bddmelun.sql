-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 04 juil. 2019 à 18:21
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
-- Base de données :  `bddmelun`
--

-- --------------------------------------------------------

--
-- Structure de la table `absence`
--

DROP TABLE IF EXISTS `absence`;
CREATE TABLE IF NOT EXISTS `absence` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) NOT NULL,
  `date_entrainement` date NOT NULL,
  `id_entrainement` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `annee`
--

DROP TABLE IF EXISTS `annee`;
CREATE TABLE IF NOT EXISTS `annee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `annee` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `annee`
--

INSERT INTO `annee` (`id`, `annee`) VALUES
(1, '2019'),
(2, '2020'),
(3, '2021'),
(4, '2018');

-- --------------------------------------------------------

--
-- Structure de la table `code`
--

DROP TABLE IF EXISTS `code`;
CREATE TABLE IF NOT EXISTS `code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `code`
--

INSERT INTO `code` (`id`, `code`) VALUES
(1, '111111');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commentaires` varchar(5555) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_objectif` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `competition`
--

INSERT INTO `competition` (`id`, `nom`, `datecompete`, `heurecompete`, `lieux`) VALUES
(1, 'Challenge Revenu', '2019-04-06', '13:00:00', 'Melun');

-- --------------------------------------------------------

--
-- Structure de la table `entrainement`
--

DROP TABLE IF EXISTS `entrainement`;
CREATE TABLE IF NOT EXISTS `entrainement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(555) NOT NULL,
  `jour` int(1) NOT NULL DEFAULT '0',
  `details` varchar(5555) NOT NULL,
  `heureDebEnt` time NOT NULL,
  `heureFinEnt` time NOT NULL,
  `id_typeentrainement` int(11) NOT NULL,
  `id_groupe` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `entrainement`
--

INSERT INTO `entrainement` (`id`, `nom`, `jour`, `details`, `heureDebEnt`, `heureFinEnt`, `id_typeentrainement`, `id_groupe`, `id_utilisateur`) VALUES
(1, 'Entrainement M7-1', 0, 'Entrainement du Mardi soir pour la catégorie M7-1 en Loisir', '18:30:00', '20:00:00', 2, 2, 3);

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
-- Structure de la table `groupe`
--

DROP TABLE IF EXISTS `groupe`;
CREATE TABLE IF NOT EXISTS `groupe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(555) NOT NULL,
  `details` varchar(5555) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `groupe`
--

INSERT INTO `groupe` (`id`, `nom`, `details`) VALUES
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
-- Structure de la table `lecon`
--

DROP TABLE IF EXISTS `lecon`;
CREATE TABLE IF NOT EXISTS `lecon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(555) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `objet` varchar(555) NOT NULL,
  `texte` varchar(5555) NOT NULL,
  `date_creation` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`id`, `objet`, `texte`, `date_creation`) VALUES
(1, 'Clap de fin sur la Fête des Jeunes', 'Les équipes étaient à l’honneur de cette deuxième journée de la Fête des Jeunes à Hénin-Beaumont.\r\nA l’épée dames l’équipe Hauts-de-France 1 est la première à se qualifier pour la finale après sa victoire 36-21 contre Occitanie 1. De l’autre côté du tableau c’est Grand-Est 1 qui a tiré son épingle du jeu face à Normandie 1 (33-28). La finale tournait à l’avantage de l’équipe locale, maîtrisant mieux les temps forts de la rencontre. Hauts-de-France 1 (Geniez, Larbi, Monsterleet, Vergnes) remportait la finale sur le score de 36-30.\r\n\r\nChez les garçons, après sa victoire en demi-finale face à l’équipe de La Réunion 1 (36-22), Hauts-de-France 1 avait l’opportunité de disputer la victoire finale à Auvergne Rhône Alpes 1 qui s’était défait quelques minutes plus tôt de l’équipe Occitanie 1 35-34. Dans cette finale ultra serrée, c’est à nouveau d’une seule touche que Auvergne Rhône Alpes 1 (Alzaix, Archambeaud, Gorzegno, Pauvarel) s’adjugeait la victoire, au terme d’une dernière attaque qui allumait alors que le score était à égalité 35-35.\r\nChez les filles du fleuret la finale opposait Ile-de-France 1 et Région Sud 1 après leurs victoires respectives contre Ile-de-France 3 (36-14) et Auvergne Rhône Alpes 1 (36-36). La finale était très serrée et chaque équipe semblait pouvoir l’emporter. C’est finalement Ile-de-France 1 (Audibert, Ediri, Georgi, Roger) qui remportait le dernier match de la compétition au terme d’un finish haletant (33-32) face à Région Sud 1.\r\n\r\nDu côté des garçons Ile-de-France 1, après être venu à bout de l’équipe 1 venue de la région Auvergne Rhône Alpes sur le score de 36-32, retrouvait en finale l’équipe 2 de de la même région. Cette fois la victoire choisissait le camp francilien et l’équipe Ile-de-France 1 (Anane, Andriamasinarivo, Besnault, Bibron) remportait la finale 36-30.', '2019-06-23');

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `objectif`
--

INSERT INTO `objectif` (`id`, `nom`, `details`, `id_utilisateur`) VALUES
(1, 'Amélioration Débordement', 'Amélioration de l\'action de débordement', 2),
(2, 'Amélioration Débordement', 'mélioration de l\'action de débordement', 1),
(3, 'Accéder aux championnat de France ', 'Accéder aux championnat de France', 1);

-- --------------------------------------------------------

--
-- Structure de la table `participantcompetition`
--

DROP TABLE IF EXISTS `participantcompetition`;
CREATE TABLE IF NOT EXISTS `participantcompetition` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_competition` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `planningentrainement`
--

DROP TABLE IF EXISTS `planningentrainement`;
CREATE TABLE IF NOT EXISTS `planningentrainement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_entrainement` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT '0000-00-00',
  `heure_debut` time NOT NULL DEFAULT '00:00:00',
  `heure_fin` time NOT NULL DEFAULT '00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `id_groupe` int(11) NOT NULL,
  `id_typeutilisateur` int(11) NOT NULL,
  `id_typearbitre` int(11) NOT NULL,
  `id_typeentrainement` int(11) NOT NULL DEFAULT '0',
  `commentaire` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `dateAnniversaire`, `login`, `mdp`, `img`, `id_groupe`, `id_typeutilisateur`, `id_typearbitre`, `id_typeentrainement`, `commentaire`) VALUES
(1, 'Blaix', 'Camille', '1997-01-16', 'blaixc', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'img/user.png', 13, 2, 3, 0, ''),
(2, 'Marivint', 'Yvann', '1996-11-15', 'marivinty', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'img/user.png', 13, 1, 0, 0, ''),
(3, 'Ripeau', 'Gabrielle', '1996-05-10', 'ripeaug', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'img/user.png', 13, 3, 4, 0, ''),
(4, '4', '4', '0000-00-00', 'test4', '25dde040b016d12e56b9957d422cf85506fc00ac', 'img/user.png', 1, 1, 1, 1, '44'),
(5, 'Martin', 'Philis', '1997-10-11', 'blaixc', 'd033e22ae348aeb5660fc2140aec35850c4da997', '', 13, 2, 3, 1, ''),
(6, 'Dujardin', 'Marc', '1996-02-05', 'marivinty', 'd033e22ae348aeb5660fc2140aec35850c4da997', '', 13, 2, 0, 1, ''),
(7, 'Waynes', 'Sébastien', '1994-03-20', 'ripeaug', 'd033e22ae348aeb5660fc2140aec35850c4da997', '', 13, 2, 4, 2, ''),
(8, 'Goulding', 'Elie', '1999-01-23', 'gouldinge', 'd033e22ae348aeb5660fc2140aec35850c4da997', '', 12, 2, 3, 2, ''),
(9, 'François', 'Théo', '1996-08-17', 'francoist', 'd033e22ae348aeb5660fc2140aec35850c4da997', '', 13, 2, 0, 2, ''),
(10, 'Ramdane', 'Alia', '1998-06-01', 'ramdanea', 'd033e22ae348aeb5660fc2140aec35850c4da997', '', 13, 2, 4, 2, ''),
(11, 'Martin', 'Ray', '1997-12-06', 'martinr', 'd033e22ae348aeb5660fc2140aec35850c4da997', '', 13, 2, 3, 2, ''),
(12, 'Dylan', 'Jacques', '1991-11-13', 'dylanj', 'd033e22ae348aeb5660fc2140aec35850c4da997', '', 13, 2, 1, 0, ''),
(13, 'Brown', 'James', '1987-05-26', 'brownj', 'd033e22ae348aeb5660fc2140aec35850c4da997', '', 13, 2, 4, 1, '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
