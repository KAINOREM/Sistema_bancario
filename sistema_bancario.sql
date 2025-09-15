-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29/08/2025 às 05:32
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sistema_bancario`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cartao`
--

CREATE TABLE `cartao` (
  `idcartao` int(11) NOT NULL,
  `numero_cartao` varchar(12) DEFAULT NULL,
  `endereco` varchar(255) NOT NULL,
  `idCliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cartao`
--

INSERT INTO `cartao` (`idcartao`, `numero_cartao`, `endereco`, `idCliente`) VALUES
(1, '111122223333', 'Rua do Fernando', 1),
(2, '222211113333', 'Rua do Rodrigo', 2),
(3, '333322221111', 'Rua do Carlos', 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `nome` varchar(120) NOT NULL,
  `idGerente` int(11) DEFAULT NULL,
  `idCartao` int(11) DEFAULT NULL,
  `ativo` enum('S','N') NOT NULL DEFAULT 'S'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`idCliente`, `nome`, `idGerente`, `idCartao`, `ativo`) VALUES
(1, 'Fernandinho', 1, 1, 'S'),
(2, 'Rodriguinho', 2, 2, 'S'),
(3, 'Carlinhos', 3, 3, 'S');

-- --------------------------------------------------------

--
-- Estrutura para tabela `gerente`
--

CREATE TABLE `gerente` (
  `idGerente` int(11) NOT NULL,
  `nome` varchar(120) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `gerente`
--

INSERT INTO `gerente` (`idGerente`, `nome`, `senha`, `email`) VALUES
(1, 'Fernando', '123', 'fernando@gmail.com'),
(2, 'Rodrigo', '123', 'rodrigo@gmail.com'),
(3, 'Carlos', '123', 'carlos@gmail.com');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cartao`
--
ALTER TABLE `cartao`
  ADD PRIMARY KEY (`idcartao`),
  ADD UNIQUE KEY `numero_cartao` (`numero_cartao`),
  ADD KEY `idCliente` (`idCliente`);

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`),
  ADD KEY `idGerente` (`idGerente`),
  ADD KEY `fk_cliente_cartao` (`idCartao`);

--
-- Índices de tabela `gerente`
--
ALTER TABLE `gerente`
  ADD PRIMARY KEY (`idGerente`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cartao`
--
ALTER TABLE `cartao`
  MODIFY `idcartao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `gerente`
--
ALTER TABLE `gerente`
  MODIFY `idGerente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `cartao`
--
ALTER TABLE `cartao`
  ADD CONSTRAINT `cartao_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`);

--
-- Restrições para tabelas `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`idGerente`) REFERENCES `gerente` (`idGerente`),
  ADD CONSTRAINT `fk_cliente_cartao` FOREIGN KEY (`idCartao`) REFERENCES `cartao` (`idcartao`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
