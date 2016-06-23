-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 23-Jun-2016 às 12:34
-- Versão do servidor: 5.5.49-0+deb8u1
-- PHP Version: 5.6.22-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `caps`
--
CREATE DATABASE IF NOT EXISTS `caps` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `caps`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contador`
--

DROP TABLE IF EXISTS `contador`;
CREATE TABLE IF NOT EXISTS `contador` (
`id` int(11) NOT NULL,
  `contador` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `contador`
--

INSERT INTO `contador` (`id`, `contador`) VALUES
(1, 428);

-- --------------------------------------------------------

--
-- Estrutura da tabela `salas`
--

DROP TABLE IF EXISTS `salas`;
CREATE TABLE IF NOT EXISTS `salas` (
`id` int(11) NOT NULL,
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
  `sextarde` text
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `salas`
--

INSERT INTO `salas` (`id`, `numsala`, `nomesala`, `segmanha`, `segtarde`, `termanha`, `tertarde`, `quamanha`, `quatarde`, `quimanha`, `quitarde`, `sexmanha`, `sextarde`) VALUES
(1, '1', '1', 'PerÃ­cia', 'Fabiana', 'Rubens', 'Rubens', 'PerÃ­cia', '', '', 'Fabiana', 'Rubens', 'Rubens'),
(2, '2', '2', 'Leonardo', 'Leonardo', 'Fernanda', 'Mari (estagiaria)', 'Fernanda', 'Fernanda', 'Fernanda', 'Fernanda', 'Fernanda', 'Fabiana'),
(3, '3', '3', 'Grupo Intensivo de Adolescentes, 9:30, Felipe e Carol', '', '', 'Sandra, laqueadura, 15h', '10:30, Cris - Gr. Familiares', '', 'Nithiane, 9h - avaliaÃ§Ãµes', 'Lizia', 'Nithiane, 10h - Gr. Homens - Aberto (quinzenal >>>24/06/2016)', ''),
(4, '4', '4', 'Cris, Gr. Mulheres, 16H (sempre na 1Âª segunda do mÃªs)', '', 'Cris V. D. (quinzenal >>>21/06/2016)', 'Alessandra ', 'Nithiane, 9h - Gr. Mulheres', '', 'Carol, at. ind.', 'Alessandra, 13:30, Gr. Pais, (quinzenal >>>23/06/2016)', 'Alessandra, 10:00 - Gr. Adolescentes (quinzenal >>>10/06/2016)', 'Acolh. Lizia (4 vagas p/ crianÃ§as)'),
(5, '5', '5', '', 'Acolh. Sandra / Cris', 'Sandra, 8:30 - Gr. Mulheres ', 'Fabiana', '', '', '', 'Acolh. Nithiane (4 vagas p/ adultos)', '', 'Acolh. Ana (4 vagas p/ adultos)'),
(6, '6', '6', '', '13:30 - Acolh. DQ Angela - 15:00, Angela (atend. Indiv.) ', '', '13:30 - Acolh. DQ Angela, 16h - Grupo de prevenÃ§Ã£o a recaÃ­da, c/ Angela ', 'Carol, 9:30 - Gr. Pais (quinzenal >>>22/06/2016) ', '', 'Lizia', '13:30 - Acolh. DQ Angela, 15:00 - Angela (atend. Indiv.) ', '10:15, Lizia/Alessandra, Gr. CrianÃ§as (quinzenal >>>17/06/2016)', '13:30 - Acolh. DQ Angela, 15:30 Grupo de tabagismo/transt. Afetivo Angela (quinzenal >>>10/06/2016)'),
(7, '7', '7', 'Ana, 10h, Gr. Homens ', 'Ana, 15:45h, Gr. Familiares DQ ', 'Raquel (atend. Indiv.) ', 'Acolhimento, Alessandra (a partir de 29/03) (4 vagas p/ crianÃ§as) e Marcia (4 vagas)', 'Raquel (At. Indiv. ou Gr. Mulheres, 8:30, quinzenal >>>29/06/2016) ', 'BiodanÃ§a, 14h', '', 'Marcia, 15h, Tabagismo ', '', 'Gr. ReduÃ§Ã£o de Danos, Felipe, 13:30  (quinzenal >>>17/06/2016)'),
(8, '8', '8', '', '', '', '', 'Fabiola, 8:30', '', '', '', '', ''),
(9, '9', 'Of. 1', '', '', '', '', 'Fabiola/Raquel, 10h - Gr. Homens ', '', '', '', '', ''),
(10, '10', 'Of. 2', '', 'FabÃ­ola, 14h, Gr. SaÃºde - 15h Ã s 17h, At. Individual ', 'FabÃ­ola e Miriam, 8:30 Ã s 13:30 (intensivo) ', 'Raquel (of. terapÃªutica) Ã s 13:30 - FabÃ­ola, 13:30, Gr. Mulheres ', 'Ana e Marcia, Grupo DQ - 9h ', '', 'FabÃ­ola e Miriam, 8:30 Ã s 13:30, intensivo //// Fabiola, Gr. Mulheres, 13:30', 'Fabiola, 13:30/15h, Intensivo ', '', '15h: AvaliaÃ§Ã£o encaminhamentos Of. Terap., T. O., Grupo Terap. e Intensivo, FabÃ­ola (quinzenal >>>24/06/2016) - FabÃ­ola/Nithiane, Intensivo (quinzenal) - 15:30: Gr. Mulheres '),
(11, '11', 'Of. 3', 'Miriam, 08:30, Gr. Mulheres ', 'Miriam, 14h, Gr. Mulheres ', '', 'Miriam e Sandra, 13:30 Ã s 15h ', 'Miriam, 8:30 - Mulheres ', '', '', '', 'Miriam, 9:30, Gr. Mulheres ', 'Nithiane '),
(12, '12', 'Of. 4', 'Fabiola, Gr. CrianÃ§as 10:30 ', 'Carol e Alessandra, Gr. Adol., 13:30 (quinzenal >>>20/06/2016) - Carol, Gr. CrianÃ§as, 15:30 (quinzenal >>>27/06/2016) ', '', '', 'Nithiane, Gr. Mulheres, 8:30 ', '', '', '', '', 'Gr. Jovens Ad., Nithiane, 13:30 (quinzenal >>>10/06/2016)'),
(13, '13', 'Of. 5', 'Sandra/Cris, 9h, intensivo / 9:30 - 11:30 ', '', '', '', '', '', '', '', 'Raquel / FabÃ­ola / Miriam, 8:30, Gr. Intensivo - 9:30, Of. MÃºsica ', ''),
(14, '14', 'Externo', 'Fabiola, 8:30, Gr. Horta ', '', '', '', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contador`
--
ALTER TABLE `contador`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salas`
--
ALTER TABLE `salas`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contador`
--
ALTER TABLE `contador`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `salas`
--
ALTER TABLE `salas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
