-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 05 juil. 2019 à 07:30
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
  `id_groupe` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `entrainement`
--

INSERT INTO `entrainement` (`id`, `nom`, `details`, `dateEnt`, `heureDebEnt`, `heureFinEnt`, `id_typeentrainement`, `id_groupe`) VALUES
(1, 'Entrainement M7-1', 'Entrainement du Mardi soir pour la catégorie M7-1 en Loisir', '2019-09-03', '18:00:00', '20:00:00', 2, 2),
(2, 'Entrainement M7-1', 'Entrainement du Mardi soir pour la catégorie M7-1 en Loisir', '2019-09-10', '18:00:00', '20:00:00', 2, 2),
(3, 'Entrainement M7-1', 'Entrainement du Mardi soir pour la catégorie M7-1 en Loisir', '2019-09-17', '18:00:00', '20:00:00', 2, 2),
(4, 'Entrainement M7-1', 'Entrainement du Mardi soir pour la catégorie M7-1 en Loisir', '2019-09-24', '18:00:00', '20:00:00', 2, 2),
(5, 'Entrainement M7-1', 'Entrainement du Mardi soir pour la catégorie M7-1 en Loisir', '2019-10-01', '18:00:00', '20:00:00', 2, 2),
(6, 'Entrainement M7-1', 'Entrainement du Mardi soir pour la catégorie M7-1 en Loisir', '2019-10-08', '18:00:00', '20:00:00', 2, 2),
(7, 'Entrainement M7-1', 'Entrainement du Mardi soir pour la catégorie M7-1 en Loisir', '2019-10-15', '18:00:00', '20:00:00', 2, 2),
(8, 'Entrainement M7-1', 'Entrainement du Mardi soir pour la catégorie M7-1 en Loisir', '2019-11-05', '18:00:00', '20:00:00', 2, 2),
(9, 'Entrainement M15', 'Entrainement du Jeudi soir pour la catégorie M15 en Elite', '2019-09-05', '18:00:00', '20:00:00', 1, 10),
(10, 'Entrainement M15', 'Entrainement du Jeudi soir pour la catégorie M15 en Loisir', '2019-09-12', '18:00:00', '20:00:00', 1, 10),
(11, 'Entrainement M15', 'Entrainement du Jeudi soir pour la catégorie M15 en Loisir', '2019-09-19', '18:00:00', '20:00:00', 1, 10),
(12, 'Entrainement M15', 'Entrainement du Jeudi soir pour la catégorie M15 en Loisir', '2019-09-26', '18:00:00', '20:00:00', 1, 10),
(13, 'Entrainement M15', 'Entrainement du Jeudi soir pour la catégorie M15 en Loisir', '2019-10-03', '18:00:00', '20:00:00', 1, 10),
(14, 'Entrainement M15', 'Entrainement du Jeudi soir pour la catégorie M15 en Loisir', '2019-10-10', '18:00:00', '20:00:00', 1, 10);
COMMIT;
