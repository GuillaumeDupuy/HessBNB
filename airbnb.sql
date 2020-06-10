-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 10 juin 2020 à 08:12
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `airbnb`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

CREATE DATABASE airbnb;

DROP TABLE IF EXISTS `annonce`;
CREATE TABLE IF NOT EXISTS `annonce` (
  `Id_annonce` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `code_postal` int(5) NOT NULL,
  `departement` varchar(50) NOT NULL,
  `region` varchar(50) NOT NULL,
  `nbr_place` int(2) NOT NULL,
  `photos` varchar(100) DEFAULT NULL,
  `prix` int(5) NOT NULL,
  `date_deb` date NOT NULL,
  `date_fin` date NOT NULL,
  PRIMARY KEY (`Id_annonce`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `annonce`
--

INSERT INTO `annonce` (`Id_annonce`, `titre`, `description`, `adresse`, `ville`, `code_postal`, `departement`, `region`, `nbr_place`, `photos`, `prix`, `date_deb`, `date_fin`) VALUES
(1, 'test', 'test', '18 rue test', 'testoune', 95470, 'test', 'ile-de-france', 4, '&quot;img/image1&quot;', 60, '2020-07-20', '2020-07-30');

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

DROP TABLE IF EXISTS `facture`;
CREATE TABLE IF NOT EXISTS `facture` (
  `Id_facture` int(11) NOT NULL AUTO_INCREMENT,
  `dat` date NOT NULL,
  `montant` int(5) NOT NULL,
  `mode_paiement` varchar(50) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  PRIMARY KEY (`Id_facture`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `Id_reserv` int(11) NOT NULL AUTO_INCREMENT,
  `date_deb` date NOT NULL,
  `date_fin` date NOT NULL,
  `date_reserv` date NOT NULL,
  `nbr_personne` int(2) NOT NULL,
  `Id_annonce` int(11) NOT NULL,
  `Id_facture` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id_reserv`),
  KEY `Id_annonce` (`Id_annonce`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `Id_connect` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(20) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mdp` varchar(20) NOT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `solde` int(5) DEFAULT NULL,
  `Id_annonce` int(11) DEFAULT NULL,
  `Id_reserv` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id_connect`),
  KEY `Id_annonce` (`Id_annonce`),
  KEY `Id_reserv` (`Id_reserv`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
