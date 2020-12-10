-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 06 déc. 2020 à 18:05
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `maderaprod`
--

-- --------------------------------------------------------

--
-- Structure de la table `chantier`
--

DROP TABLE IF EXISTS `chantier`;
CREATE TABLE IF NOT EXISTS `chantier` (
  `idChantier` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `notes` varchar(45) NOT NULL,
  `idProjet` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`idChantier`),
  KEY `fkIdx_40` (`idProjet`),
  KEY `fkIdx_43` (`idUser`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `idClient` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `adresse` varchar(45) NOT NULL,
  `numeroTel` int(11) NOT NULL,
  `entreprise` varchar(45) NOT NULL,
  `estProfessionnel` tinyint(1) NOT NULL,
  `secteurActivite` varchar(45) NOT NULL,
  `ville` varchar(45) NOT NULL,
  `codePostal` int(11) NOT NULL,
  `description` varchar(150) NOT NULL,
  PRIMARY KEY (`idClient`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `composants`
--

DROP TABLE IF EXISTS `composants`;
CREATE TABLE IF NOT EXISTS `composants` (
  `idComposant` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `categorie` varchar(45) NOT NULL,
  `prix` float NOT NULL,
  `idFournisseur` int(11) NOT NULL,
  PRIMARY KEY (`idComposant`),
  KEY `fkIdx_102` (`idFournisseur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `compositionmodule`
--

DROP TABLE IF EXISTS `compositionmodule`;
CREATE TABLE IF NOT EXISTS `compositionmodule` (
  `idModule` int(11) NOT NULL,
  `idCompositionModule` int(11) NOT NULL AUTO_INCREMENT,
  `idTypesVariant` int(11) NOT NULL,
  `Quantite` int(11) NOT NULL,
  `idComposant` int(11) NOT NULL,
  PRIMARY KEY (`idCompositionModule`),
  KEY `fkIdx_185` (`idModule`),
  KEY `fkIdx_191` (`idTypesVariant`),
  KEY `fkIdx_202` (`idComposant`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `idContact` int(11) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `fonction` varchar(45) NOT NULL,
  `telephone` varchar(45) NOT NULL,
  `mail` varchar(60) NOT NULL,
  `idClient` int(11) NOT NULL,
  PRIMARY KEY (`idContact`),
  KEY `fkIdx_235` (`idClient`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `devis`
--

DROP TABLE IF EXISTS `devis`;
CREATE TABLE IF NOT EXISTS `devis` (
  `idDevis` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `etat` varchar(45) NOT NULL,
  `dateCreation` datetime NOT NULL,
  `remise` float NOT NULL,
  `prixHT` float NOT NULL,
  `taux_TVA` float NOT NULL,
  `mLineaire` float NOT NULL,
  `document` varchar(45) NOT NULL,
  `notes` varchar(45) NOT NULL,
  `idChantier` int(11) NOT NULL,
  `estPaye` tinyint(1) NOT NULL,
  PRIMARY KEY (`idDevis`),
  KEY `fkIdx_58` (`idChantier`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

DROP TABLE IF EXISTS `fournisseur`;
CREATE TABLE IF NOT EXISTS `fournisseur` (
  `idFournisseur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `adresse` varchar(45) NOT NULL,
  `nomContact` varchar(45) NOT NULL,
  `numeroTel` varchar(45) NOT NULL,
  PRIMARY KEY (`idFournisseur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `gamme`
--

DROP TABLE IF EXISTS `gamme`;
CREATE TABLE IF NOT EXISTS `gamme` (
  `idGamme` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `sansAngle` varchar(45) NOT NULL,
  `angleOuvrant` varchar(45) NOT NULL,
  `angleFermant` varchar(45) NOT NULL,
  PRIMARY KEY (`idGamme`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `idRole` int(11) NOT NULL,
  PRIMARY KEY (`idUser`),
  KEY `fkIdx_15` (`idRole`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `login`
--

INSERT INTO `login` (`idUser`, `username`, `password`, `nom`, `prenom`, `email`, `idRole`) VALUES
(1, 'mconan', 'az', 'Conan', 'Maximilien', 'mconan@daher.com', 1),
(2, 'admin', '', 'istrateur', 'Admin', '', 1);

-- --------------------------------------------------------

--
-- Structure de la table `modalitespaiement`
--

DROP TABLE IF EXISTS `modalitespaiement`;
CREATE TABLE IF NOT EXISTS `modalitespaiement` (
  `idModalite` int(11) NOT NULL AUTO_INCREMENT,
  `pourcentageDefaut` float NOT NULL,
  `obsolete` tinyint(1) NOT NULL,
  PRIMARY KEY (`idModalite`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `module`
--

DROP TABLE IF EXISTS `module`;
CREATE TABLE IF NOT EXISTS `module` (
  `idModule` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `categorie` varchar(45) NOT NULL,
  `unite` varchar(45) NOT NULL,
  `qteUnite` int(11) NOT NULL,
  PRIMARY KEY (`idModule`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `modulesdansplan`
--

DROP TABLE IF EXISTS `modulesdansplan`;
CREATE TABLE IF NOT EXISTS `modulesdansplan` (
  `idModulesDansPlan` int(11) NOT NULL AUTO_INCREMENT,
  `idPlan` int(11) NOT NULL,
  `idModule` int(11) NOT NULL,
  `Quantite` int(11) NOT NULL,
  `PosX` float NOT NULL,
  `PosY` float NOT NULL,
  `EpaisseurX` float NOT NULL,
  `EpaisseurY` float NOT NULL,
  PRIMARY KEY (`idModulesDansPlan`),
  KEY `fkIdx_140` (`idPlan`),
  KEY `fkIdx_143` (`idModule`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `paiementdevis`
--

DROP TABLE IF EXISTS `paiementdevis`;
CREATE TABLE IF NOT EXISTS `paiementdevis` (
  `idPaiementDevis` int(11) NOT NULL AUTO_INCREMENT,
  `idDevis` int(11) NOT NULL,
  `idModalite` int(11) NOT NULL,
  `PourcentageFixe` float NOT NULL,
  `estPaye` tinyint(1) NOT NULL,
  `DateEstime` datetime NOT NULL,
  `DateReelle` datetime NOT NULL,
  `Remise` int(11) NOT NULL,
  PRIMARY KEY (`idPaiementDevis`),
  KEY `fkIdx_156` (`idModalite`),
  KEY `fkIdx_161` (`idDevis`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `plan`
--

DROP TABLE IF EXISTS `plan`;
CREATE TABLE IF NOT EXISTS `plan` (
  `idPlan` int(11) NOT NULL AUTO_INCREMENT,
  `tailleX` float NOT NULL,
  `tailleY` float NOT NULL,
  `nbEtage` int(11) NOT NULL,
  `idChantier` int(11) NOT NULL,
  PRIMARY KEY (`idPlan`),
  KEY `fkIdx_76` (`idChantier`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

DROP TABLE IF EXISTS `projet`;
CREATE TABLE IF NOT EXISTS `projet` (
  `idProjet` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `dateCreation` datetime NOT NULL,
  `notes` varchar(45) NOT NULL,
  `idClient` int(11) NOT NULL,
  PRIMARY KEY (`idProjet`),
  KEY `fkIdx_37` (`idClient`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `typevariants`
--

DROP TABLE IF EXISTS `typevariants`;
CREATE TABLE IF NOT EXISTS `typevariants` (
  `idTypesVariant` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `categorie` varchar(45) NOT NULL,
  PRIMARY KEY (`idTypesVariant`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `userrole`
--

DROP TABLE IF EXISTS `userrole`;
CREATE TABLE IF NOT EXISTS `userrole` (
  `idRole` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(45) NOT NULL,
  `estAdmin` tinyint(1) NOT NULL,
  PRIMARY KEY (`idRole`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `variants`
--

DROP TABLE IF EXISTS `variants`;
CREATE TABLE IF NOT EXISTS `variants` (
  `idVariant` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `idTypesVariant` int(11) NOT NULL,
  `idComposant` int(11) NOT NULL,
  PRIMARY KEY (`idVariant`),
  KEY `fkIdx_114` (`idTypesVariant`),
  KEY `fkIdx_210` (`idComposant`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `variantsdefautgamme`
--

DROP TABLE IF EXISTS `variantsdefautgamme`;
CREATE TABLE IF NOT EXISTS `variantsdefautgamme` (
  `idVariantsDefautGamme` int(11) NOT NULL AUTO_INCREMENT,
  `idGamme` int(11) NOT NULL,
  `idVariant` int(11) NOT NULL,
  PRIMARY KEY (`idVariantsDefautGamme`),
  KEY `fkIdx_216` (`idGamme`),
  KEY `fkIdx_219` (`idVariant`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
