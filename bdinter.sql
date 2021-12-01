-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 01-Dez-2021 às 00:41
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdinter`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categorias` varchar(500) NOT NULL,
  `id_empresa` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomeRazaoSocial` varchar(100) NOT NULL,
  `cpfCnpj` varchar(25) NOT NULL,
  `endereco` varchar(80) NOT NULL,
  `telefone` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `senha` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cpfCnpj` (`cpfCnpj`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nomeRazaoSocial`, `cpfCnpj`, `endereco`, `telefone`, `email`, `senha`) VALUES
(1, 'Gust', 'asdw', 'asdw', 'asdw', 'asdw@asdw', 'asdw');

-- --------------------------------------------------------

--
-- Estrutura da tabela `descricao`
--

DROP TABLE IF EXISTS `descricao`;
CREATE TABLE IF NOT EXISTS `descricao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(500) NOT NULL,
  `id_categorias` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

DROP TABLE IF EXISTS `empresa`;
CREATE TABLE IF NOT EXISTS `empresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `razaosocial` varchar(100) NOT NULL,
  `cnpj` varchar(25) NOT NULL,
  `endereco` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `telefone` varchar(80) NOT NULL,
  `senha` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cnpj` (`cnpj`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `interesses`
--

DROP TABLE IF EXISTS `interesses`;
CREATE TABLE IF NOT EXISTS `interesses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `interesses` varchar(500) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

DROP TABLE IF EXISTS `pedido`;
CREATE TABLE IF NOT EXISTS `pedido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `categorias` varchar(255) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_usuario` (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`id`, `titulo`, `descricao`, `categorias`, `id_usuario`) VALUES
(9, 'The Unseen Ones', 'asdw', 'EstratÃ©gia de Marketing Digital', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `titulo`
--

DROP TABLE IF EXISTS `titulo`;
CREATE TABLE IF NOT EXISTS `titulo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(500) NOT NULL,
  `id_categorias` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
