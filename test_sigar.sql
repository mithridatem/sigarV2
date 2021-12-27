--
-- Base de données : `test_sigar`
--
CREATE DATABASE IF NOT EXISTS `test_sigar` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `test_sigar`;
-- --------------------------------------------------------
--
-- Structure de la table `admin`
--
DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id_adm` int(11) NOT NULL AUTO_INCREMENT,
  `name_adm` varchar(50) NOT NULL,
  `pseudo_adm` varchar(50) NOT NULL,
  `mdp_adm` varchar(100) NOT NULL,
  PRIMARY KEY (`id_adm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------
--
-- Structure de la table `cours`
--
DROP TABLE IF EXISTS `cours`;
CREATE TABLE IF NOT EXISTS `cours` (
  `id_cours` int(11) NOT NULL AUTO_INCREMENT,
  `tag_cours` varchar(50) NOT NULL,
  `date_cours` date NOT NULL,
  `crenaux_cours` varchar(50) NOT NULL,
  `com_cours` text,
  `id_mod` int(11) DEFAULT NULL,
  `id_form` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_cours`),
  KEY `cours_module_FK` (`id_mod`),
  KEY `cours_formateur0_FK` (`id_form`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------
--
-- Structure de la table `formateur`
--
DROP TABLE IF EXISTS `formateur`;
CREATE TABLE IF NOT EXISTS `formateur` (
  `id_form` int(11) NOT NULL AUTO_INCREMENT,
  `name_form` varchar(50) NOT NULL,
  `first_name_form` varchar(50) NOT NULL,
  `pseudo_form` varchar(50) NOT NULL,
  `mdp_form` varchar(100) NOT NULL,
  PRIMARY KEY (`id_form`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------
--
-- Structure de la table `module`
--
DROP TABLE IF EXISTS `module`;
CREATE TABLE IF NOT EXISTS `module` (
  `id_mod` int(11) NOT NULL AUTO_INCREMENT,
  `name_mod` varchar(50) NOT NULL,
  PRIMARY KEY (`id_mod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------
--
-- Structure de la table `participer`
--
DROP TABLE IF EXISTS `participer`;
CREATE TABLE IF NOT EXISTS `participer` (
  `id_stg` int(11) NOT NULL,
  `id_cours` int(11) NOT NULL,
  `presence` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_stg`,`id_cours`),
  KEY `participer_cours0_FK` (`id_cours`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------
--
-- Structure de la table `session`
--
DROP TABLE IF EXISTS `session`;
CREATE TABLE IF NOT EXISTS `session` (
  `id_session` int(11) NOT NULL AUTO_INCREMENT,
  `name_session` varchar(50) NOT NULL,
  PRIMARY KEY (`id_session`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------
--
-- Structure de la table `stagiaire`
--
DROP TABLE IF EXISTS `stagiaire`;
CREATE TABLE IF NOT EXISTS `stagiaire` (
  `id_stg` int(11) NOT NULL AUTO_INCREMENT,
  `name_stg` varchar(50) NOT NULL,
  `prenom_stg` varchar(50) NOT NULL,
  `id_session` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_stg`),
  KEY `stagiaire_session_FK` (`id_session`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
--
-- Contraintes pour la table `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `cours_formateur0_FK` FOREIGN KEY (`id_form`) REFERENCES `formateur` (`id_form`),
  ADD CONSTRAINT `cours_module_FK` FOREIGN KEY (`id_mod`) REFERENCES `module` (`id_mod`);
--
-- Contraintes pour la table `participer`
--
ALTER TABLE `participer`
  ADD CONSTRAINT `participer_cours0_FK` FOREIGN KEY (`id_cours`) REFERENCES `cours` (`id_cours`),
  ADD CONSTRAINT `participer_stagiaire_FK` FOREIGN KEY (`id_stg`) REFERENCES `stagiaire` (`id_stg`);
--
-- Contraintes pour la table `stagiaire`
--
ALTER TABLE `stagiaire`
  ADD CONSTRAINT `stagiaire_session_FK` FOREIGN KEY (`id_session`) REFERENCES `session` (`id_session`);
