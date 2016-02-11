-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 11 Février 2016 à 12:09
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `billets`
--

CREATE TABLE IF NOT EXISTS `billets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date_creation` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `billets`
--

INSERT INTO `billets` (`id`, `title`, `content`, `date_creation`) VALUES
(1, 'Bienvenu à tous sur mon blog !', 'Je vient de lancer mon blog. Nous allons faire quelques test afin qu''il soit opérationnel !', '2016-02-11 00:00:00'),
(2, 'Deuxième billet !', 'Voici le deuxième billet de mon blog, il m''en reste encore deux à créer, pour le moment rien d''intéressant mais sa va arriver par la suite :) !', '2016-02-11 12:03:23'),
(3, 'Encore un autre billet !', 'Et de trois ! Finalement je m''arrêterai ici , j''ai la flemme d''en créer quatre sachant qu''il me reste encore les commentaires à créer manuellement :( !', '2016-02-11 12:04:36');

-- --------------------------------------------------------

--
-- Structure de la table `commentary`
--

CREATE TABLE IF NOT EXISTS `commentary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_billet` int(11) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date_commentary` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `commentary`
--

INSERT INTO `commentary` (`id`, `id_billet`, `autor`, `content`, `date_commentary`) VALUES
(1, 1, 'Super ton blog !', '', '2016-02-11 12:05:21'),
(2, 1, 'Mathieu', 'Super blog !', '2016-02-11 12:07:17'),
(3, 1, 'Aurélien', 'Et oui c''est mon blog ;) !', '2016-02-11 12:07:36'),
(4, 2, 'Maxence', 'Cool :)!', '2016-02-11 12:07:52'),
(5, 3, 'Olivier', 'J''attend la suite avec impatiente !', '2016-02-11 12:08:17');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
