-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 27/11/2021 às 00:05
-- Versão do servidor: 10.4.20-MariaDB
-- Versão do PHP: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "-05:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
--
-- Banco de dados: `projetoDois`
--
CREATE DATABASE IF NOT EXISTS `projetoDois` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `projetoDois`;
--
-- Estrutura para tabela `events`
--
CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `color` varchar(15) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `status` boolean NOT NULL,
  `dataCadastro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
--
-- Estrutura para tabela `usuários`
--
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `usuario` text COLLATE utf8_unicode_ci NOT NULL,
  `senha` text COLLATE utf8_unicode_ci NOT NULL,
  `ativado` boolean NOT NULL,
  `dataCadastro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
--
-- Despejando dados para a tabela `events`
--
INSERT INTO `events` (`id`, `title`, `color`, `start`, `end`, `descricao`, `status`, `dataCadastro`) VALUES
(1, 'Anfiteatro', '#FFD700', '2021-12-15 00:00:00', '2021-12-16 00:00:00', '20180300012, Basquete com os alunos de SI.', false, now());
--
-- Despejando dados para a tabela `usuários`
--
INSERT INTO `usuario` (`id`, `usuario`, `senha`, `ativado`, `dataCadastro`) VALUES
(1, 'admin@admin.com', 'admin', true, now());
--
-- Índice da tabela `events`
--
ALTER TABLE `events` ADD PRIMARY KEY (`id`);
--
-- Índice da tabela `usuários`
--
ALTER TABLE `usuario` ADD PRIMARY KEY (`id`);
--
-- Auto incrementação de tabela `events`
--
ALTER TABLE `events` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;
--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
