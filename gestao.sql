-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18/09/2025 às 06:04
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
-- Banco de dados: `gestao2`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `empresa`
--

CREATE TABLE `empresa` (
  `id` int(11) NOT NULL,
  `nome_empresa` varchar(100) NOT NULL,
  `nome_fantasia` varchar(100) NOT NULL,
  `telefone` varchar(40) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `complemento` varchar(255) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `uf` varchar(3) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `cep` varchar(15) NOT NULL,
  `cnpj` varchar(50) NOT NULL,
  `ie` varchar(50) NOT NULL,
  `inscricao_municipal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `empresa`
--

INSERT INTO `empresa` (`id`, `nome_empresa`, `nome_fantasia`, `telefone`, `endereco`, `numero`, `complemento`, `bairro`, `uf`, `cidade`, `cep`, `cnpj`, `ie`, `inscricao_municipal`) VALUES
(1, 'Lexos Soluções em Tecnologia', 'LEXOS', '(11) 4679-7017', 'Rua dos Goivos', '19', 'Sob Loja', 'Jd. Satélite', 'SP', 'Ferraz de Vasconcelos', '08544-100', '14.785.454/2434-34', '645543870119', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_admin.clientes`
--

CREATE TABLE `tb_admin.clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `cpf_cnpj` varchar(255) NOT NULL,
  `imagem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_admin.clientes`
--

INSERT INTO `tb_admin.clientes` (`id`, `nome`, `email`, `tipo`, `cpf_cnpj`, `imagem`) VALUES
(18, 'Vanessa Mascarenhas', 'vanessa.mascarenhas123@vanessa.com', 'fisico', '404.352.464-65', '5f5d8d957073d.jpg'),
(21, 'Paulo Henrique Amoreira', 'paulo.pha321@recordtv.com', 'fisico', '147.852.396-91', '5f5d7d21cce52.jpeg'),
(22, 'Ana Maria Braga', 'ana.maria222@globotvcorporation.com', 'juridico', '12.454.545/7872-12', '5f5d7d3c0d662.jpg'),
(25, 'Gustavo Alves da Silva', 'gustavo.silva217@fatec.sp.gov.br', 'fisico', '404.310.328-07', '5f80923d13489.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_admin.financeiro`
--

CREATE TABLE `tb_admin.financeiro` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `valor` varchar(255) NOT NULL,
  `vencimento` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `tb_admin.financeiro`
--

INSERT INTO `tb_admin.financeiro` (`id`, `cliente_id`, `nome`, `valor`, `vencimento`, `status`) VALUES
(19, 21, 'Agência', '100,00', '2020-11-01', 0),
(20, 21, 'Agência', '100,00', '2020-11-06', 0),
(21, 21, 'Agência', '100,00', '2020-11-11', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_admin.usuarios`
--

CREATE TABLE `tb_admin.usuarios` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `tb_admin.usuarios`
--

INSERT INTO `tb_admin.usuarios` (`id`, `user`, `password`, `img`, `nome`, `cargo`) VALUES
(3, 'gustavo', '$2y$10$tn/u0DzaJbPb6g9iSu7dPulq7vck3il0UgOwSSl/j1qHkTID2FKyq', '68cb84c059ae4.jpg', 'Gustavo Alves da Silva', 2),
(4, 'maria', '$2y$10$Y/g4UBuwkxSBFIKtLSEkuuqgiqyKzqG8xpN/l2gJIBVr3aHkItM/i', '5f5d089173bcf.jpg', 'Maria das Vegas', 0),
(5, 'paulo', '$2y$10$kbUXMMuya3l6kr/fic6d2uv4je1TmSH4uGrFQtsRw.njSWDgASWKC', '5f5d0ae0423ba.jpeg', 'Paulo Henrique Amorim', 1),
(6, 'famiglia', '$2y$10$X.XXtIf1Ak3RrpcE1RwTG.8B9Fzqnezt1uTka7wXQC5DDT90j6IRe', '5f5d48f1b0119.jpeg', 'Famiglia Silva', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_admin.clientes`
--
ALTER TABLE `tb_admin.clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_admin.financeiro`
--
ALTER TABLE `tb_admin.financeiro`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_admin.usuarios`
--
ALTER TABLE `tb_admin.usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_admin.clientes`
--
ALTER TABLE `tb_admin.clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `tb_admin.financeiro`
--
ALTER TABLE `tb_admin.financeiro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `tb_admin.usuarios`
--
ALTER TABLE `tb_admin.usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
