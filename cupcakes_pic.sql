-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 27-Nov-2022 às 23:49
-- Versão do servidor: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cupcakes_pic`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens`
--

CREATE TABLE `itens` (
  `id` int(8) NOT NULL,
  `name` char(50) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `image` text NOT NULL,
  `categoria` char(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `itens`
--

INSERT INTO `itens` (`id`, `name`, `description`, `price`, `image`, `categoria`) VALUES
(1, 'Cupcake de Chocolate 5', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dictum libero a tellus pharetra dapibus. Phasellus vel arcu lobortis, ultricies ipsum vel, mattis mi. In hac habitasse platea dictumst. In convallis est leo. Donec fringilla urna eget nunc ultrices, sed rhoncus libero malesuada. Donec non libero arcu. Fusce in quam a dolor dignissim sollicitudin id eu ipsum. Aenean ac tortor vel est vulputate lacinia non id nulla. Duis id tincidunt tortor. Aliquam erat volutpat. Nulla ornare, odio ac malesuada rhoncus, tellus dolor vulputate dolor, sit amet vestibulum ipsum leo id augue. ', '10.00', '9c5f91587fd617b4b4c92bb2f5746888.jpg', 'Padrão'),
(2, 'Cupcake de Alpino', '2. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dictum libero a tellus pharetra dapibus. Phasellus vel arcu lobortis, ultricies ipsum vel, mattis mi. In hac habitasse platea dictumst. In convallis est leo. Donec fringilla urna eget nunc ultrices, sed rhoncus libero malesuada. Donec non libero arcu. Fusce in quam a dolor dignissim sollicitudin id eu ipsum. Aenean ac tortor vel est vulputate lacinia non id nulla. Duis id tincidunt tortor. Aliquam erat volutpat. Nulla ornare, odio ac malesuada rhoncus, tellus dolor vulputate dolor, sit amet vestibulum ipsum leo id augue. ', '10.00', 'cupcake-alpino.jpg', 'Especial'),
(8, 'Produto teste 45', '5testasrxdtfgyuhu aoutfdqglfb IQBAK', '12.50', '17bdb3f3186a9b2dd455c05a73803eef.jpg', 'Teste'),
(7, 'Teste 5', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dictum libero a tellus pharetra dapibus. Phasellus vel arcu lobortis, ultricies ipsum vel, mattis mi. In hac habitasse platea dictumst. In convallis est leo. Donec fringilla urna eget nunc ultrices, sed rhoncus libero malesuada. Donec non libero arcu. Fusce in quam a dolor dignissim sollicitudin id eu ipsum. Aenean ac tortor vel est vulputate lacinia non id nulla. Duis id ', '20.00', '0dbdcd06f6b46aa33c434d7b315f81c9.jpg', 'Teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `id` int(8) NOT NULL,
  `nome_cliente` varchar(100) NOT NULL,
  `endereco` varchar(500) NOT NULL,
  `produto_id` int(40) NOT NULL,
  `valor` decimal(8,2) NOT NULL,
  `quantidade` int(8) NOT NULL,
  `status` char(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`id`, `nome_cliente`, `endereco`, `produto_id`, `valor`, `quantidade`, `status`) VALUES
(1, 'Bryan Nóbrega', 'Rua dos bobos, 0', 1, '30.00', 3, 'Finalizado'),
(2, 'Sandy Nóbrega', 'Rua Quarenta, 10', 1, '40.00', 4, 'Finalizado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(8) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `level`) VALUES
(3, 'bryan_nobrega', 'fdcea7d4e730fa70c190493ee6a209df4c3ef287', 'usuario@email.com', 2),
(4, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin@email.com', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `itens`
--
ALTER TABLE `itens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `itens`
--
ALTER TABLE `itens`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
