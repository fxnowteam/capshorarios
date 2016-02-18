-- phpMyAdmin SQL Dump
-- version 3.3.2deb1ubuntu1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Fev 18, 2016 as 01:18 PM
-- Versão do Servidor: 5.1.73
-- Versão do PHP: 5.3.2-1ubuntu4.30

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `caps`
--
CREATE DATABASE `caps` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `caps`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `salas`
--

CREATE TABLE IF NOT EXISTS `salas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numsala` text,
  `nomesala` text,
  `segmanha` text,
  `segtarde` text,
  `termanha` text,
  `tertarde` text,
  `quamanha` text,
  `quatarde` text,
  `quimanha` text,
  `quitarde` text,
  `sexmanha` text,
  `sextarde` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;
