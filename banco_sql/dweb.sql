-- phpMyAdmin SQL Dump
-- version 4.6.0
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 29-Abr-2016 às 00:06
-- Versão do servidor: 5.7.12-0ubuntu1
-- PHP Version: 7.0.4-7ubuntu2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dweb`
--
CREATE DATABASE IF NOT EXISTS `dweb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `dweb`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `gruposusuario`
--

DROP TABLE IF EXISTS `gruposusuario`;
CREATE TABLE `gruposusuario` (
  `id` int(11) NOT NULL,
  `grupo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `gruposusuario`
--

INSERT INTO `gruposusuario` (`id`, `grupo`) VALUES
(99, 'Administradores'),
(98, 'Usuários');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(64) NOT NULL,
  `idgrupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `nome`, `email`, `senha`, `idgrupo`) VALUES
(1, 'thiago', 'Thiago Serra F Carvalho', 'thiagonce@gmail.com', '799c551e9223526b008c77bd7ed22f92', 99),
(6, 'teste', 'TESTE', 'teste@teste', '2363eb04bdfe959bc21faa1e7a7f6eaa', 98),
(7, 'anderson', 'Anderson', 'anderson@anderson', '0c73da4ba61fa80de536f333c9fcaca9', 99);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gruposusuario`
--
ALTER TABLE `gruposusuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `grupo` (`grupo`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gruposusuario`
--
ALTER TABLE `gruposusuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
