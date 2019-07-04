-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 04 juil. 2019 à 12:53
-- Version du serveur :  5.7.21
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de données :  `bddmelun`
--

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
  `id_lecon` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `commentaires`, `id_utilisateur`, `id_objectif`, `id_lecon`) VALUES
(1, 'Vu des positions', 1, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `lecon`
--

DROP TABLE IF EXISTS `lecon`;
CREATE TABLE IF NOT EXISTS `lecon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `objet` varchar(555) NOT NULL,
  `date_lecon` date NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `lecon`
--

INSERT INTO `lecon` (`id`, `objet`, `date_lecon`, `id_utilisateur`) VALUES
(1, 'Leçon 1', '2019-07-03', 1);

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
COMMIT;
