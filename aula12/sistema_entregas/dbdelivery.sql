-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20/11/2026 às 02:47
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dbdelivery`
--
CREATE DATABASE IF NOT EXISTS `dbdelivery` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dbdelivery`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tab_entrega`
--

CREATE TABLE `tab_entrega` (
  `id` int(11) NOT NULL,
  `id_consumidor` int(11) NOT NULL,
  `id_entregador` int(11) NOT NULL,
  `largura` int(11) NOT NULL,
  `altura` int(11) NOT NULL,
  `profundidade` int(11) NOT NULL,
  `peso` double NOT NULL,
  `sensivel` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tab_entrega`
--

INSERT INTO `tab_entrega` (`id`, `id_consumidor`, `id_entregador`, `largura`, `altura`, `profundidade`, `peso`, `sensivel`, `status`) VALUES
(1, 2, 3, 2, 2, 2, 2, 1, 3),
(2, 2, 3, 3, 3, 3, 3, 0, 4),
(4, 2, 3, 6, 4, 2, 4, 0, 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tab_status_entrega`
--

CREATE TABLE `tab_status_entrega` (
  `id` int(11) NOT NULL,
  `des_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tab_status_entrega`
--

INSERT INTO `tab_status_entrega` (`id`, `des_status`) VALUES
(1, 'disponivel'),
(2, 'em_rota'),
(3, 'entregue'),
(4, 'cancelado');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tab_tipo_usuario`
--

CREATE TABLE `tab_tipo_usuario` (
  `id` int(11) NOT NULL,
  `des_tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tab_tipo_usuario`
--

INSERT INTO `tab_tipo_usuario` (`id`, `des_tipo`) VALUES
(1, 'consumidor'),
(2, 'entregador'),
(3, 'gerente');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tab_usuario`
--

CREATE TABLE `tab_usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(500) NOT NULL,
  `cod_tipo_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tab_usuario`
--

INSERT INTO `tab_usuario` (`id`, `nome`, `email`, `senha`, `cod_tipo_usuario`) VALUES
(1, 'Guilherme Kenta Masuda', 'guilherme@gmail.com', '16a9040356500f42598a7713294f67bd3ab42548778c6fc155d1c9195f6fcc67', 3),
(2, 'Gabriel Afonso Santos Vieira', 'gabriel@gmail.com', '89862648d255b4eb78dbc71ecbed6f8a389a6fcb80533c86ec03b8330e26f43a', 1),
(3, 'Alexandre Custódio de Oliveira Sedenho', 'alexandre@gmail.com', '8084b4c301873ea993d43bb579a5a9788ae8a2ed5f4fa597132a3fe3e061d93b', 2),
(6, 'teste', 'teste@gmail.com', '46070d4bf934fb0d4b06d9e2c46e346944e322444900a435d7d9a95e6d7435f5', 1),
(7, 'teste', 'teste@gmail.com', '46070d4bf934fb0d4b06d9e2c46e346944e322444900a435d7d9a95e6d7435f5', 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tab_entrega`
--
ALTER TABLE `tab_entrega`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tab_status_entrega`
--
ALTER TABLE `tab_status_entrega`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tab_tipo_usuario`
--
ALTER TABLE `tab_tipo_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tab_usuario`
--
ALTER TABLE `tab_usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tab_entrega`
--
ALTER TABLE `tab_entrega`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tab_status_entrega`
--
ALTER TABLE `tab_status_entrega`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tab_tipo_usuario`
--
ALTER TABLE `tab_tipo_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tab_usuario`
--
ALTER TABLE `tab_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
