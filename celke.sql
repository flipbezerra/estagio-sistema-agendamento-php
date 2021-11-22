-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Nov-2021 às 18:48
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `celke`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(220) DEFAULT NULL,
  `color` varchar(10) DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `dataCadastro` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `events`
--

INSERT INTO `events` (`id`, `title`, `color`, `start`, `end`, `dataCadastro`) VALUES
(1, 'reuniao', '#000370', '2021-11-15 00:00:00', '2021-11-15 21:14:46', '2021-11-21 03:14:45'),
(2, 'gooo', '#770351', '2021-11-15 21:16:06', '2021-11-17 21:16:06', '2021-11-21 03:16:06'),
(3, 'tutorial', '#0071c5', '2021-11-11 00:00:00', '2021-11-12 00:00:00', '2021-11-21 03:18:06'),
(4, 'test', '#40E0D0', '2021-11-03 01:00:00', '2021-11-03 03:00:00', '2021-11-21 03:17:06'),
(5, 'oto teste', '#FFD700', '2021-11-21 00:00:00', '2021-11-21 00:50:00', '2021-11-21 03:19:06'),
(7, 'msqli não funciona "ainda"', '#FF0000', '2021-11-02 00:00:00', '2021-11-03 00:00:00', '2021-11-21 03:16:06'),
(8, 'hk', '#8B4513', '2021-11-04 00:00:00', '2021-11-05 00:00:00', '2021-11-21 03:16:06'),
(9, 'titule?', '#808080', '2021-11-01 00:00:00', '2021-11-02 00:00:00', '2021-11-21 03:16:06'),
(12, 'tit2', '#FFD700', '2021-11-05 00:00:00', '2021-11-06 00:00:00', '2021-11-22 12:41:49');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
