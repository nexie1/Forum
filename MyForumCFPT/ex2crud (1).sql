-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 03 Octobre 2018 à 11:35
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `ex2crud`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `idArticle` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(100) DEFAULT NULL,
  `contenu` varchar(1000) DEFAULT NULL,
  `date_creation` date NOT NULL,
  `statutPrive` int(5) DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL,
  PRIMARY KEY (`idArticle`),
  KEY `FK_USER_ARTICLES` (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE IF NOT EXISTS `commentaires` (
  `idCommentaire` int(11) NOT NULL AUTO_INCREMENT,
  `commentaire` varchar(1000) DEFAULT NULL,
  `date_commentaire` date DEFAULT NULL,
  `idArticle` int(11) DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL,
  PRIMARY KEY (`idCommentaire`),
  KEY `FK_ARTICLE_COMMENTAIRES` (`idArticle`),
  KEY `FK_USER_COMMENTAIRES` (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `Username` varchar(100) DEFAULT NULL,
  `Password` varchar(256) DEFAULT NULL,
  `Email` varchar(256) NOT NULL,
  `statut` int(5) DEFAULT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`idUser`, `nom`, `prenom`, `Username`, `Password`, `Email`, `statut`) VALUES
(5, 'Flo', 'Flo', 'Flo', '8185c8ac4656219f4aa5541915079f7b3743e1b5f48bacfcc3386af016b55320', 'Flo@gmail.com', 1);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `FK_USER_ARTICLES` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`);

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `FK_USER_COMMENTAIRES` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`),
  ADD CONSTRAINT `FK_ARTICLE_COMMENTAIRES` FOREIGN KEY (`idArticle`) REFERENCES `articles` (`idArticle`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
