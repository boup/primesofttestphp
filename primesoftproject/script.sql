-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 07 Mai 2019 à 22:40
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- database: `primesoftdb`
--

-- --------------------------------------------------------

--
-- Struct of table `person`
--

CREATE TABLE IF NOT EXISTS person (
  id_use int(11) NOT NULL AUTO_INCREMENT,
  name varchar(50) DEFAULT NULL,
  surname varchar(50) DEFAULT NULL,
  status varchar(50) NOT NULL,
  telephone varchar(50) NOT NULL,
  etat int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (id_use)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Content of table `person`
--

INSERT INTO person (id_use, name, surname, status, telephone, etat) VALUES
(1, 'jose', 'hereiro', 'student', '444444', 1),
(2, 'aga', 'uban', 'teacher', '55555', 1),
(3, 'daria', 'ster', 'stu', '66666', 1),
(4, 'john', 'smith', 'eeee', '333333', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
CREATE TABLE IF NOT EXISTS compte_person (
  email varchar(50) NOT NULL,
  password varchar(50) NOT NULL,
  PRIMARY KEY (email)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Content of table `compte_person`
--

INSERT INTO compte_person (email, password) VALUES
('primesoft@gmail.com', 'primesoft');

-- --------------------------------------------------------

--
-- Struct of table `compt_use`
--

CREATE TABLE IF NOT EXISTS compt_use (
  nom_utilisateur  varchar(50) NOT NULL,
  mot_passe varchar(50) NOT NULL,
  email varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Create of table `book`
--
CREATE TABLE IF NOT EXISTS book (
  id_book int(11) NOT NULL AUTO_INCREMENT,
  date date NOT NULL,
  name_book varchar(50) NOT NULL,
  nature varchar(50) NOT NULL,
  utilisateur int(11) NOT NULL,
  etat int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (id_book),
  KEY fk_utilisateur (utilisateur)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Content of table `book`
--

INSERT INTO book (id_book, date, name_book, nature, utilisateur, etat) VALUES
(1, '2016-12-25', 'Java', 'programmation', 0, 1),
(2, '2016-12-25', 'C++', 'procedural', 2, 1),
(3, '2017-01-10', 'Php', 'standard', 3, 1),
(4, '2017-01-15', 'C#', 'compilation', 0, 1),
(5, '2017-01-17', 'resaux', 'network', 2, 1),
(6, '2017-01-15', 'javascript', 'frontend', 2, 1);