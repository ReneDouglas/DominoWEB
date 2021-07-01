-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Tempo de geração: 10/08/2014 às 23:08
-- Versão do servidor: 5.6.16
-- Versão do PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `domino`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `jogador`
--

CREATE TABLE IF NOT EXISTS `jogador` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Fazendo dump de dados para tabela `jogador`
--

INSERT INTO `jogador` (`id`, `login`, `senha`) VALUES
(1, 'jogador1', 'jogador1'),
(2, 'jogador2', 'jogador2');

-- --------------------------------------------------------

--
-- Estrutura para tabela `partida`
--

CREATE TABLE IF NOT EXISTS `partida` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jogador1` int(11) DEFAULT NULL,
  `jogador2` int(11) DEFAULT NULL,
  `estado` varchar(30) NOT NULL,
  `vencedor` int(11) DEFAULT NULL,
  `vez` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

--
-- Fazendo dump de dados para tabela `partida`
--

INSERT INTO `partida` (`id`, `jogador1`, `jogador2`, `estado`, `vencedor`, `vez`) VALUES
(1, 1, 0, 'espera', 0, 0),
(2, 2, 0, 'espera', 0, 0),
(5, 1, 0, 'espera', 0, 0),
(6, 2, 0, 'espera', 0, 0),
(7, 2, 1, 'espera', 1, 1),
(9, 2, 1, 'espera', 1, 1),
(56, 1, NULL, 'espera', NULL, NULL),
(57, 1, NULL, 'espera', NULL, NULL),
(58, 1, NULL, 'espera', NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
