-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Tempo de geração: 28/04/2016 às 23:18
-- Versão do servidor: 5.6.24
-- Versão do PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `dweb`
--
CREATE DATABASE IF NOT EXISTS `dweb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `dweb`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `gruposusuario`
--

DROP TABLE IF EXISTS `gruposusuario`;
CREATE TABLE IF NOT EXISTS `gruposusuario` (
  `id` int(11) NOT NULL,
  `grupo` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `gruposusuario`
--

INSERT INTO `gruposusuario` (`id`, `grupo`) VALUES
(99, 'Administradores'),
(98, 'Usuários');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `senha` varchar(64) NOT NULL,
  `idgrupo` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `senha`, `idgrupo`) VALUES
(1, 'thiago', '2363eb04bdfe959bc21faa1e7a7f6eaa', 99),
(2, 'novo', 'ba6fdc6b1f68a11e7e29feff661ae5c5', 98),
(3, 'novo2', '2ebb3c23ac31268cf08bace1875ec6e6', 99);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `gruposusuario`
--
ALTER TABLE `gruposusuario`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `grupo` (`grupo`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `gruposusuario`
--
ALTER TABLE `gruposusuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
