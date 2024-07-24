-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 24/07/2024 às 01:09
-- Versão do servidor: 8.3.0
-- Versão do PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tb_produtos`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_categoria`
--

DROP TABLE IF EXISTS `tbl_categoria`;
CREATE TABLE IF NOT EXISTS `tbl_categoria` (
  `id_categoria` int NOT NULL AUTO_INCREMENT,
  `nome_descricao` varchar(60) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `tbl_categoria`
--

INSERT INTO `tbl_categoria` (`id_categoria`, `nome_descricao`) VALUES
(1, 'Hortifruti'),
(2, 'Bebidas'),
(3, 'Laticínios'),
(4, 'Higiene'),
(5, 'Limpeza'),
(6, 'Frios'),
(7, 'chocolates'),
(8, 'Açougue');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_produto`
--

DROP TABLE IF EXISTS `tbl_produto`;
CREATE TABLE IF NOT EXISTS `tbl_produto` (
  `id_produto` int NOT NULL AUTO_INCREMENT,
  `codigodebarra` varchar(70) DEFAULT NULL,
  `nome_produto` varchar(70) DEFAULT NULL,
  `descricao_produto` varchar(1000) DEFAULT NULL,
  `preco` decimal(10,2) DEFAULT NULL,
  `data_cadastro` date DEFAULT NULL,
  `id_status` int DEFAULT NULL,
  `id_categoria` int DEFAULT NULL,
  PRIMARY KEY (`id_produto`),
  KEY `id_status` (`id_status`),
  KEY `id_categoria` (`id_categoria`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `tbl_produto`
--

INSERT INTO `tbl_produto` (`id_produto`, `codigodebarra`, `nome_produto`, `descricao_produto`, `preco`, `data_cadastro`, `id_status`, `id_categoria`) VALUES
(1, '7891234567890', 'Agua Mineral', 'Agua mineral natural sem gas 500ml', 2.00, '2024-07-20', 1, 2),
(2, '7892345678901', 'Leite Integral', 'Leite integral 1 litro', 4.00, '2024-07-19', 1, 3),
(3, '7893456789012', 'Sabonete', 'Sabonete em barra 90g', 1.00, '2024-07-18', 1, 4),
(4, '7894567890123', 'Detergente Líquido', 'Detergente líquido 500ml', 3.50, '2024-07-17', 2, 5),
(5, '7895678901234', 'Presunto Fatiado', 'Presunto fatiado 200g', 5.50, '2024-07-19', 2, 6),
(10, '23453424342', 'teste', 'teste', 5.00, '2024-07-23', 1, 8);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_status`
--

DROP TABLE IF EXISTS `tbl_status`;
CREATE TABLE IF NOT EXISTS `tbl_status` (
  `id_status` int NOT NULL AUTO_INCREMENT,
  `descricao_status` varchar(50) NOT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `tbl_status`
--

INSERT INTO `tbl_status` (`id_status`, `descricao_status`) VALUES
(1, 'ativo'),
(2, 'inativo');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
