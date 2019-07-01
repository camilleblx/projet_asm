
DROP TABLE IF EXISTS `magasin_utilisateur`;
CREATE TABLE IF NOT EXISTS `magasin_utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_magasin` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date_crea` datetime NOT NULL,
  `date_modif` datetime DEFAULT NULL,
  `auteur_modif` varchar(50) NOT NULL,
  `actif` tinyint(1) NOT NULL DEFAULT '0',
  `suppr` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `pubs`;
CREATE TABLE IF NOT EXISTS `pubs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_type` int(11) NOT NULL,
  `id_magasin` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date_crea` datetime NOT NULL,
  `date_modif` datetime DEFAULT NULL,
  `auteur_modif` varchar(50) NOT NULL,
  `actif` tinyint(1) NOT NULL DEFAULT '0',
  `suppr` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;