-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Jun-2024 às 05:59
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `chat`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `conversation`
--

CREATE TABLE `conversation` (
  `id` int(11) NOT NULL,
  `idAdmin` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `conversatio` text NOT NULL,
  `data_created_system` datetime NOT NULL,
  `data_created` date NOT NULL,
  `data_updated` datetime DEFAULT NULL,
  `data_deleted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `conversation`
--

INSERT INTO `conversation` (`id`, `idAdmin`, `idUser`, `conversatio`, `data_created_system`, `data_created`, `data_updated`, `data_deleted`) VALUES
(1, 8, 9, 'Boa noite alicia', '2024-05-13 19:45:28', '2024-05-13', '2024-05-13 19:45:28', NULL),
(2, 9, 8, 'Como estas agencia Dev?', '2024-05-13 19:46:01', '2024-05-13', '2024-05-13 19:46:01', NULL),
(3, 8, 9, 'estou bem e vc?', '2024-05-13 19:46:24', '2024-05-13', '2024-05-13 19:46:24', NULL),
(4, 9, 8, 'tmbm estou bem', '2024-05-13 19:46:36', '2024-05-13', '2024-05-13 19:46:36', NULL),
(5, 9, 2, 'Boa noite amiga', '2024-05-13 19:47:17', '2024-05-13', '2024-05-13 19:47:17', NULL),
(6, 2, 9, 'Boa noite amiga como estas?', '2024-05-13 19:49:19', '2024-05-13', '2024-05-13 19:49:19', NULL),
(7, 1, 2, 'ola', '2024-06-03 19:15:57', '2024-06-03', '2024-06-03 19:15:57', NULL),
(8, 2, 1, 'oy tudo bem ?', '2024-06-03 19:18:25', '2024-06-03', '2024-06-03 19:18:25', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `mypeople`
--

CREATE TABLE `mypeople` (
  `idmypeople` int(11) NOT NULL,
  `idAdmin` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `data_created` datetime NOT NULL,
  `data_updated` datetime NOT NULL,
  `data_deleted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `mypeople`
--

INSERT INTO `mypeople` (`idmypeople`, `idAdmin`, `iduser`, `data_created`, `data_updated`, `data_deleted`) VALUES
(1, 1, 2, '2024-04-11 23:06:08', '2024-04-11 23:06:08', NULL),
(3, 1, 3, '2024-05-12 21:25:25', '2024-05-12 21:25:25', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `data_created` datetime NOT NULL,
  `data_updated` datetime NOT NULL,
  `data_deleted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `status`
--

INSERT INTO `status` (`id`, `iduser`, `status`, `data_created`, `data_updated`, `data_deleted`) VALUES
(1, 1, 1, '2024-05-10 23:08:30', '2024-05-10 23:08:30', NULL),
(2, 2, 0, '2024-05-10 23:08:41', '2024-05-10 23:08:41', NULL),
(3, 3, 0, '2024-05-12 19:23:12', '2024-05-12 19:23:12', NULL),
(4, 4, 0, '2024-05-12 20:02:07', '2024-05-12 20:02:07', NULL),
(5, 7, 0, '2024-05-12 21:01:11', '2024-05-12 21:01:11', NULL),
(6, 8, 0, '2024-05-13 19:42:24', '2024-05-13 19:42:24', NULL),
(7, 9, 0, '2024-05-13 19:43:02', '2024-05-13 19:43:02', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nome` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `apelido` varchar(225) NOT NULL,
  `senha` varchar(225) NOT NULL,
  `foto` varchar(225) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `data_created_system` datetime NOT NULL,
  `data_created` date NOT NULL,
  `data_updated` datetime NOT NULL,
  `data_deleted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `nome`, `email`, `apelido`, `senha`, `foto`, `status`, `data_created_system`, `data_created`, `data_updated`, `data_deleted`) VALUES
(1, 'Djimo', 'djimo@gmail.com', 'Mabote', '1234', 'download.jpeg', 1, '2024-04-13 22:57:17', '2024-04-13', '2024-04-13 22:57:17', NULL),
(2, 'Rosalina', 'chambal@gmail.com', 'Chambal', '1234', 'liza.jpg', 1, '2024-04-15 00:07:11', '2024-04-15', '2024-06-12 19:52:37', NULL),
(3, 'Mateus', 'cossa@gmail.com', 'Cossa', '1234', 'Screenshot (1).png', 1, '2024-05-12 19:17:48', '2024-05-12', '2024-06-10 20:00:27', NULL),
(4, 'chester ', 'macoda@gmail.com', 'macoda', '1234', 'Screenshot (64).png', 1, '2024-05-12 19:41:47', '2024-05-12', '2024-06-10 19:59:46', NULL),
(7, 'Anildo', 'anildo@gmail.cm', 'Macoda', '1234', 'Screenshot (38).png', 1, '2024-05-12 20:59:32', '2024-05-12', '2024-06-10 20:43:55', NULL),
(8, 'Agencia', 'dev@gmail.com', 'dev', '1234', 'AGENCIA DEVxcf.png', 1, '2024-05-13 19:42:23', '2024-05-13', '2024-06-10 20:43:39', NULL),
(9, 'alicia', 'alice@gmail.com', 'alice', '1234', 'foto1.png', 1, '2024-05-13 19:43:02', '2024-05-13', '2024-06-10 20:43:31', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `conversation`
--
ALTER TABLE `conversation`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `mypeople`
--
ALTER TABLE `mypeople`
  ADD PRIMARY KEY (`idmypeople`);

--
-- Índices para tabela `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `conversation`
--
ALTER TABLE `conversation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `mypeople`
--
ALTER TABLE `mypeople`
  MODIFY `idmypeople` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
