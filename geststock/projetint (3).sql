-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 18 juin 2018 à 23:08
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projetint`
--

-- --------------------------------------------------------

--
-- Structure de la table `aliment`
--

DROP TABLE IF EXISTS `aliment`;
CREATE TABLE IF NOT EXISTS `aliment` (
  `idaliment` int(11) NOT NULL AUTO_INCREMENT,
  `NomAliment` varchar(50) NOT NULL,
  `idType` int(11) NOT NULL,
  `IdUtilisateur` int(11) NOT NULL,
  PRIMARY KEY (`idaliment`),
  UNIQUE KEY `NomAliment` (`NomAliment`),
  KEY `Aliment_Type_FK` (`idType`),
  KEY `Aliment_Utilisateur0_FK` (`IdUtilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `aliment`
--

INSERT INTO `aliment` (`idaliment`, `NomAliment`, `idType`, `IdUtilisateur`) VALUES
(3, 'carotte', 1, 94),
(6, 'steak', 3, 94),
(9, 'brie', 2, 94),
(10, 'laitue', 1, 95),
(13, 'camenbert', 2, 94),
(15, 'fff', 2, 94),
(16, '', 2, 94),
(17, 'ffff', 2, 94),
(19, 'ff', 2, 94),
(20, 'ggg', 1, 94),
(22, 'ddd', 1, 94),
(24, 'celeri', 1, 127),
(25, 'patate', 1, 127);

-- --------------------------------------------------------

--
-- Structure de la table `comprend`
--

DROP TABLE IF EXISTS `comprend`;
CREATE TABLE IF NOT EXISTS `comprend` (
  `idaliment` int(11) NOT NULL,
  `idRecette` int(11) NOT NULL,
  `quantite` varchar(100) NOT NULL,
  PRIMARY KEY (`idaliment`,`idRecette`),
  KEY `comprend_Recette0_FK` (`idRecette`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comprend`
--

INSERT INTO `comprend` (`idaliment`, `idRecette`, `quantite`) VALUES
(3, 30, 'ddd'),
(3, 33, '500'),
(3, 42, 'ddd'),
(6, 30, 'ddd'),
(6, 33, 'ff'),
(10, 39, '500 gramme'),
(13, 35, '500 grammes'),
(13, 44, '500 grammes'),
(15, 30, 'fff'),
(16, 29, ''),
(16, 33, 'ddddddd'),
(17, 30, 'ddd'),
(19, 30, 'ffff'),
(20, 30, 'ddd'),
(20, 35, '500'),
(22, 29, 'ddd'),
(22, 33, '500 grammes'),
(22, 35, '500 grammes');

-- --------------------------------------------------------

--
-- Structure de la table `conditionnement`
--

DROP TABLE IF EXISTS `conditionnement`;
CREATE TABLE IF NOT EXISTS `conditionnement` (
  `idconditionnement` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`idconditionnement`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `emplacement`
--

DROP TABLE IF EXISTS `emplacement`;
CREATE TABLE IF NOT EXISTS `emplacement` (
  `idemp` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`idemp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `listecourse`
--

DROP TABLE IF EXISTS `listecourse`;
CREATE TABLE IF NOT EXISTS `listecourse` (
  `idliste` int(11) NOT NULL AUTO_INCREMENT,
  `DateCreation` date NOT NULL,
  `IdUtilisateur` int(11) NOT NULL,
  PRIMARY KEY (`idliste`),
  KEY `ListeCourse_Utilisateur_FK` (`IdUtilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `possede`
--

DROP TABLE IF EXISTS `possede`;
CREATE TABLE IF NOT EXISTS `possede` (
  `IdUtilisateur` int(11) NOT NULL,
  `idaliment` int(11) NOT NULL,
  `idemp` int(11) NOT NULL,
  `idconditionnement` int(11) NOT NULL,
  PRIMARY KEY (`IdUtilisateur`,`idaliment`,`idemp`,`idconditionnement`),
  KEY `possede_Aliment0_FK` (`idaliment`),
  KEY `possede_emplacement1_FK` (`idemp`),
  KEY `possede_conditionnement2_FK` (`idconditionnement`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `recette`
--

DROP TABLE IF EXISTS `recette`;
CREATE TABLE IF NOT EXISTS `recette` (
  `idRecette` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `description` longtext NOT NULL,
  `visibilite` tinyint(1) NOT NULL,
  `IdUtilisateur` int(11) NOT NULL,
  PRIMARY KEY (`idRecette`),
  UNIQUE KEY `nom` (`nom`),
  KEY `Recette_Utilisateur_FK` (`IdUtilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `recette`
--

INSERT INTO `recette` (`idRecette`, `nom`, `description`, `visibilite`, `IdUtilisateur`) VALUES
(35, '', '', 0, 127),
(39, 'Crêpes', 'oeuf\r\nlait\r\nfarine', 0, 127),
(41, 'frite', 'des frites', 0, 127),
(42, 'ddd', 'ddd', 0, 127),
(44, 'moule frite', 'moule et frites', 0, 127);

-- --------------------------------------------------------

--
-- Structure de la table `se_trouve`
--

DROP TABLE IF EXISTS `se_trouve`;
CREATE TABLE IF NOT EXISTS `se_trouve` (
  `idaliment` int(11) NOT NULL,
  `idliste` int(11) NOT NULL,
  PRIMARY KEY (`idaliment`,`idliste`),
  KEY `se_trouve_ListeCourse0_FK` (`idliste`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `idType` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`idType`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`idType`, `nom`) VALUES
(1, 'legume'),
(2, 'fromage'),
(3, 'viande');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `IdUtilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `Login` varchar(50) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `mdp` varchar(2000) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `activation` tinyint(1) NOT NULL DEFAULT '0',
  `code` varchar(25000) NOT NULL,
  PRIMARY KEY (`IdUtilisateur`),
  UNIQUE KEY `Login` (`Login`)
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`IdUtilisateur`, `Login`, `Nom`, `prenom`, `mdp`, `Email`, `activation`, `code`) VALUES
(114, 'matall', 'Allard', 'mathie', '$2y$10$.YhI6QOwukmd5rATRdxwQuk52/jeWGXrJR/hl2rht71wqd/A0B5Yq', 'mathieuallard1993@hotmail.com', 0, '3845817baa2c610a6d2f77606bb80cc5'),
(115, 'matall2', 'Allard', 'mathie', '$2y$10$0OddMiRfRXlIbJ1tslBm1updyLPoxw4J.7MfgGKpWFmupuFVLbfeO', 'mathieuallard1993@hotmail.com', 0, '676925d1ee1a01dac9655181d255e9c8'),
(116, 'matall3', 'mathieu', 'allard', '$2y$10$T8RRAo6JEXtioKtnCYMFeONk2Cs9DglkWibKijzsysg/XRJHs237y', 'mathieuallard1993@hotmail.com', 0, '9c1928b8507329ca5c9be8dc5d42e155'),
(117, 'matall4', 'mathieu', 'allard', '$2y$10$6B8xhgZZSc56J66SF988p.vbc8zMCZvZrEUsJ27vl/JBbu0XRNXx6', 'mathieuallard1993@hotmail.com', 0, '808d4aa80b298e65ce6876396d89d7a6'),
(118, 'matall7', 'mathieu', 'allard', '$2y$10$vEmq74Vru12a1mNpSFse0OA9uNJ8y7Zbawg3Om8elLTQG0WkF66W6', 'mathieuallard1993@hotmail.com', 0, 'd70c7d79511c7d26b14cc9fca48a2d4a'),
(119, 'matall9', 'mathieu', 'allard', '$2y$10$mTN1M.ND.kJTBvelDrkjaeEFqUXxmn03VMH7o0D8lP.rR44tv5cJu', 'mathieuallard1993@hotmail.com', 0, 'a637fb346f920907e6abb75473279411'),
(120, 'matall10', 'mathieu', 'allard', '$2y$10$f8R7OQhzXJZi2FeCC6AbfuE2Cxzsn/lsVjAcVkQV/Ef6v/yWufrQK', 'mathieuallard1993@hotmail.com', 0, '565aecbcb2a2cd389d9dbe717c75749d'),
(121, '1212', 'mathieu', 'allard', '$2y$10$YU/mRkrOy7zV4aIfTnMLt.JsNZpTPK4KEZF7ymOKu.SKS2rkQCOYm', 'mathieuallard1993@hotmail.com', 0, 'e7a5aacd2c172a6e12c6aa584f6dfa90'),
(122, 'matall12', 'mathieu', 'allard', '$2y$10$J2mh9l8qkpv/0JZebI0qeuwMywxe2ZHmCahoYKQPcu9ZNo3LrOvMa', 'mathieuallard1993@hotmail.com', 0, 'ac626c4ec805dc32ca5573afe94771fa'),
(123, 'nameyho', 'mathieu', 'allard', '$2y$10$t/7OiZGf.reNb1knClQLLeUkw49A.UNZ.WOYpMvwQGnNPfE39xCqi', 'mathieuallard1993@hotmail.com', 0, '2f705961becf19d22412f1cfc1737f21'),
(124, 'nameyho2', 'mathieu', 'allard', '$2y$10$6iE8yaR1Kqe.BuNyh4Gkj.yoSl9tR4AjNiSbj6IgXd0a9ePCmXukC', 'mathieuallard1993@hotmail.com', 0, '03d81d577cdb5efa91d86b9560fe42d2'),
(125, 'zeifjzeff', 'mathieu', 'allard', '$2y$10$ae2rIBoHLr69Q5S0Ejer1u3TkxOi3CswgLFO70GckXc7iu1xYr9zK', 'mathieuallard1993@hotmail.com', 0, 'f812cd8e0c1993e8be4b58d1422f3beb'),
(126, 'dour', 'mathieu', 'allard', '$2y$10$mcCaS3C6UIkggvmIJQhTsOOEjTZm44gB04dcbo7pUMDhrSEQ4xfV2', 'mathieuallard1993@hotmail.com', 0, 'f90e9453161b821ff77aeb40484062a5'),
(127, 'Noxy', 'Allard', 'Noemie', '$2y$10$Tar/Hn65xuuXMkRgvXOwS.L3sl1W0gohM5Kr0TeluiK7AltzRvHwS', 'mathieuallard1993@hotmail.com', 1, 'e4e3d30b67dc9247ee938045464249d0'),
(128, 'cr7', 'christiano', 'ronaldo', '$2y$10$5m1ahzlXEVeoKPRX64fnleitQDcC.02HLpikv.o4GyI4TJVldXu6i', 'mathieuallard1993@hotmail.com', 0, '1bf02f09459cdd1323bc285225f79df8');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
