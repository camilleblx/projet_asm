-- ALTER TABLE `utilisateur` ADD `commentaire` TEXT NOT NULL DEFAULT '' AFTER `id_typearbitre`;
-- ALTER TABLE `utilisateur` ADD `id_typeentrainement` INT(11) NOT NULL DEFAULT '0' AFTER `id_typearbitre`;

-- ALTER TABLE `entrainement`
--   DROP `id_utilisateur`,
--   DROP `suppr`;


-- ALTER TABLE `participantcompetition` ADD `presence` TINYINT(4) NOT NULL DEFAULT '0' AFTER `id_competition`;

-- DROP TABLE IF EXISTS `code`;
-- CREATE TABLE IF NOT EXISTS `code` (
--   `id` int(11) NOT NULL AUTO_INCREMENT,
--   `code` varchar(200) NOT NULL,
--   PRIMARY KEY (`id`)
-- ) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --
-- -- Déchargement des données de la table `code`
-- --

-- INSERT INTO `code` (`id`, `code`) VALUES
-- (1, '267592');

-- DROP TABLE IF EXISTS `annee`;
-- CREATE TABLE IF NOT EXISTS `annee` (
--   `id` int(11) NOT NULL AUTO_INCREMENT,
--   `annee` varchar(20) NOT NULL,
--   PRIMARY KEY (`id`)
-- ) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- INSERT INTO `annee` (`id`, `annee`) VALUES
-- (1, '2019'),
-- (2, '2020'),
-- (3, '2021'),
-- (4, '2018');

-- ALTER TABLE `entrainement` ADD `jour` INT(1) NOT NULL DEFAULT '0' AFTER `nom`;

-- ALTER TABLE `entrainement` DROP `dateEnt`;

-- DROP TABLE IF EXISTS `planningentrainement`;
-- CREATE TABLE IF NOT EXISTS `planningentrainement` (
--   `id` int(11) NOT NULL AUTO_INCREMENT,
--   `id_entrainement` int(11) NOT NULL,
--   `date` date NOT NULL DEFAULT '0000-00-00',
--   `heure_debut` time NOT NULL DEFAULT '00:00:00',
--   `heure_fin` time NOT NULL DEFAULT '00:00:00',
--   PRIMARY KEY (`id`)
-- ) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ALTER TABLE `entrainement` DROP `id_utilisateur`;

-- ALTER TABLE `planningentrainement` ADD `id_type_entrainement` INT(11) NOT NULL DEFAULT '0' AFTER `heure_fin`;

-- ALTER TABLE `planningentrainement` CHANGE `id_entrainement` `id_planningentrainement` INT(11) NOT NULL;

-- DROP TABLE IF EXISTS `participantentrainement`;
-- CREATE TABLE IF NOT EXISTS `participantentrainement` (
--   `id` int(11) NOT NULL AUTO_INCREMENT,
--   `id_utilisateur` int(11) NOT NULL DEFAULT '0',
--   `id_planningentrainement` int(11) NOT NULL DEFAULT '0',
--   `presence` tinyint(4) NOT NULL DEFAULT '0',
--   PRIMARY KEY (`id`)
-- ) ENGINE=MyISAM DEFAULT CHARSET=latin1;

ALTER TABLE `objectif` ADD `id_utilisateur_crea` INT(11) NOT NULL DEFAULT '0' AFTER `id_utilisateur`;