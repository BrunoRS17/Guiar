-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18/11/2024 às 05:45
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
-- Banco de dados: `guiartcc`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `administrador`
--

CREATE TABLE `administrador` (
  `id_adm` int(11) NOT NULL,
  `nome_adm` varchar(100) DEFAULT NULL,
  `nome_usuario` varchar(100) DEFAULT NULL,
  `nome_foto` varchar(200) NOT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `FK_EMPRESA_id_empresa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `administrador`
--

INSERT INTO `administrador` (`id_adm`, `nome_adm`, `nome_usuario`, `nome_foto`, `senha`, `FK_EMPRESA_id_empresa`) VALUES
(20, 'Vinicius Mira', 'Vini', '6706fd02bd6bd.jpg', '1234', 9),
(21, 'Lorena Santos', 'Loris29', '670700ff75165.jpg', '123', 9),
(22, 'Chay da Cunha', 'Chay', '6736cd896d788.jpg', '12345', 9),
(23, 'Chay da Cunha', 'Chay', '673abc45a7e77.jpg', '123', 10);

-- --------------------------------------------------------

--
-- Estrutura para tabela `empresa`
--

CREATE TABLE `empresa` (
  `id_empresa` int(11) NOT NULL,
  `CNPJ` varchar(100) DEFAULT NULL,
  `nome_empresa` varchar(100) DEFAULT NULL,
  `nome_usuario` varchar(100) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `nome_arquivo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `CNPJ`, `nome_empresa`, `nome_usuario`, `email`, `senha`, `nome_arquivo`) VALUES
(9, '23.232.323/2323-33', 'Big Boca', 'bigboca01', 'bigb@gmail.com', '123', 'Isabely Faria_1.png'),
(10, '54.546.575/6455-65', 'DoceriaLD', 'DocesLD', 'lorena.aa295@gmail.com', '12345', 'docess.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `entregador`
--

CREATE TABLE `entregador` (
  `id_entregador` int(11) NOT NULL,
  `nome_completo` varchar(100) DEFAULT NULL,
  `CPF` varchar(100) DEFAULT NULL,
  `telefone` varchar(100) DEFAULT NULL,
  `nome_foto3x4` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `nome_usuario` varchar(100) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `nome_cnh` varchar(100) NOT NULL,
  `FK_EMPRESA_id_empresa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `entregador`
--

INSERT INTO `entregador` (`id_entregador`, `nome_completo`, `CPF`, `telefone`, `nome_foto3x4`, `email`, `nome_usuario`, `senha`, `nome_cnh`, `FK_EMPRESA_id_empresa`) VALUES
(14, 'Pedro h', '22222222222', '1994161981', '', 'adsafa@gmail.com', 'pedro01', '123', '', 9),
(17, 'Lorena Silva', '746.523.856-54', '19 986341234', 'images.jpeg', 'lorena.aa295@gmail.com', 'loris29', '123456', 'cnh.jpeg', 9),
(18, 'Paulo Vitor', '423.745.752-98', '19 986341232', '3X4.jpeg', 'lorismigz.pam@gmail.coml', 'Paulo', '12345', 'cnh2.jpeg', 9);

-- --------------------------------------------------------

--
-- Estrutura para tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` varchar(64) NOT NULL,
  `expiry` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `nome_cliente` varchar(100) DEFAULT NULL,
  `preco` decimal(10,2) NOT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `bairro` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `id_entregador` int(11) DEFAULT NULL,
  `id_empresa` int(11) NOT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Pendente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `nome_cliente`, `preco`, `endereco`, `bairro`, `descricao`, `id_entregador`, `id_empresa`, `latitude`, `longitude`, `status`) VALUES
(17, 'Vinicius Mira', 32.00, 'Rua josé lopes de Azevedo neto, 30', 'jardim suécia', 'teste', 17, 9, -22.3529114, -46.914247, 'Enviado');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_adm`),
  ADD KEY `id_adm` (`id_adm`),
  ADD KEY `FK_ADMINISTRADOR_2` (`FK_EMPRESA_id_empresa`);

--
-- Índices de tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_empresa`),
  ADD KEY `id_empresa` (`id_empresa`);

--
-- Índices de tabela `entregador`
--
ALTER TABLE `entregador`
  ADD PRIMARY KEY (`id_entregador`),
  ADD KEY `id_entregador` (`id_entregador`),
  ADD KEY `FK_ENTREGADOR_2` (`FK_EMPRESA_id_empresa`);

--
-- Índices de tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Índices de tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `fk_entregador` (`id_entregador`),
  ADD KEY `fk_empresa` (`id_empresa`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_adm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `entregador`
--
ALTER TABLE `entregador`
  MODIFY `id_entregador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `FK_ADMINISTRADOR_2` FOREIGN KEY (`FK_EMPRESA_id_empresa`) REFERENCES `empresa` (`id_empresa`);

--
-- Restrições para tabelas `entregador`
--
ALTER TABLE `entregador`
  ADD CONSTRAINT `FK_ENTREGADOR_2` FOREIGN KEY (`FK_EMPRESA_id_empresa`) REFERENCES `empresa` (`id_empresa`) ON DELETE CASCADE;

--
-- Restrições para tabelas `password_resets`
--
ALTER TABLE `password_resets`
  ADD CONSTRAINT `password_resets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `empresa` (`id_empresa`);

--
-- Restrições para tabelas `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`),
  ADD CONSTRAINT `fk_entregador` FOREIGN KEY (`id_entregador`) REFERENCES `entregador` (`id_entregador`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
