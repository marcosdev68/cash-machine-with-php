-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 18-Out-2018 às 15:58
-- Versão do servidor: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `caixa_eletronico`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `contas`
--

CREATE TABLE `contas` (
  `id` int(11) UNSIGNED NOT NULL,
  `titular` varchar(100) DEFAULT NULL,
  `agencia` int(11) DEFAULT NULL,
  `conta` int(11) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `saldo` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `contas`
--

INSERT INTO `contas` (`id`, `titular`, `agencia`, `conta`, `senha`, `saldo`) VALUES
(1, 'Marcos Andre', 123, 321, '81dc9bdb52d04dc20036dbd8313ed055', 3350.21),
(2, 'Jose Gustavo', 987, 456, '81dc9bdb52d04dc20036dbd8313ed055', 4648.72),
(3, 'Fulano de Tal', 456, 98, '81dc9bdb52d04dc20036dbd8313ed055', 800.84),
(4, 'Usuario Teste', 999, 999, '81dc9bdb52d04dc20036dbd8313ed055', 1280.99),
(5, 'Paulo Soares', 734, 985, '81dc9bdb52d04dc20036dbd8313ed055', 529.36);

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico`
--

CREATE TABLE `historico` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_conta` int(11) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `valor` float DEFAULT NULL,
  `data_operacao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `historico`
--

INSERT INTO `historico` (`id`, `id_conta`, `tipo`, `valor`, `data_operacao`) VALUES
(2, 1, 'Deposito', 600.5, '2018-10-17 09:06:03'),
(3, 1, 'Deposito', 650.2, '2018-10-17 09:06:28'),
(4, 1, 'Retirada', 340.5, '2018-10-17 09:08:46'),
(5, 1, 'Deposito', 390.99, '2018-10-17 10:10:41'),
(6, 1, 'Deposito', 4500, '2018-10-17 10:10:57'),
(7, 1, 'Retirada', 450.99, '2018-10-17 10:11:14'),
(8, 1, 'Retirada', 20, '2018-10-17 10:11:25'),
(9, 1, 'Retirada', 1979.99, '2018-10-17 10:11:48'),
(10, 2, 'Deposito', 20, '2018-10-17 10:12:43'),
(11, 2, 'Deposito', 200000, '2018-10-17 10:12:54'),
(12, 2, 'Retirada', 9650.9, '2018-10-17 10:13:09'),
(13, 2, 'Retirada', 180370, '2018-10-17 10:13:36'),
(14, 2, 'Deposito', 4300.7, '2018-10-17 10:13:52'),
(15, 2, 'Deposito', 9650.9, '2018-10-17 10:14:10'),
(16, 2, 'Deposito', 9650.9, '2018-10-17 10:14:26'),
(17, 2, 'Retirada', 9650.99, '2018-10-17 10:14:50'),
(18, 2, 'Retirada', 9650.99, '2018-10-17 10:15:05'),
(19, 2, 'Retirada', 9650.99, '2018-10-17 10:15:26'),
(20, 3, 'Deposito', 300.54, '2018-10-17 10:16:08'),
(21, 3, 'Deposito', 210.3, '2018-10-17 10:16:20'),
(22, 3, 'Retirada', 499.99, '2018-10-17 10:16:36'),
(23, 3, 'Deposito', 789.99, '2018-10-17 10:16:56'),
(24, 4, 'Deposito', 400, '2018-10-17 10:17:33'),
(25, 4, 'Deposito', 880.99, '2018-10-17 10:17:58'),
(26, 5, 'Deposito', 4399.99, '2018-10-17 10:18:39'),
(27, 5, 'Retirada', 799.99, '2018-10-17 10:18:55'),
(28, 5, 'Retirada', 870.65, '2018-10-17 10:19:21'),
(29, 5, 'Retirada', 2199.99, '2018-10-17 10:20:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contas`
--
ALTER TABLE `contas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `historico`
--
ALTER TABLE `historico`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contas`
--
ALTER TABLE `contas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `historico`
--
ALTER TABLE `historico`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
