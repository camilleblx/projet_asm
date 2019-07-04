ALTER TABLE `utilisateur` ADD `commentaire` TEXT NOT NULL DEFAULT '' AFTER `id_typearbitre`;
ALTER TABLE `utilisateur` ADD `id_typeentrainement` INT(11) NOT NULL DEFAULT '0' AFTER `id_typearbitre`;

ALTER TABLE `entrainement`
  DROP `id_utilisateur`,
  DROP `suppr`;


ALTER TABLE `participantcompetition` ADD `presence` TINYINT(4) NOT NULL DEFAULT '0' AFTER `id_competition`;