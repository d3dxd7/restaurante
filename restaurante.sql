-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Maio-2023 às 21:29
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `restaurante`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`) VALUES
(1, 'Marmitas'),
(2, 'Bebidas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidades`
--

CREATE TABLE `cidades` (
  `id` int(11) NOT NULL,
  `estado_id` int(11) NOT NULL,
  `nome` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `cidades`
--

INSERT INTO `cidades` (`id`, `estado_id`, `nome`) VALUES
(1, 1, 'Sales'),
(2, 1, 'Irapuã'),
(3, 2, 'Belo Horizonte');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `telefone` varchar(128) NOT NULL,
  `cidade_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `email`, `telefone`, `cidade_id`) VALUES
(1, 'José da Silva', 'jose.da.silva@gmail.com', '17999991111', 1),
(2, 'João Oliveira', 'joao.oliveira@gmail.com', '17999992222', 2),
(3, 'Paulo Ferreira', 'paulo.ferreira@gmail.com', '17999993333', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `continentes`
--

CREATE TABLE `continentes` (
  `id` int(11) NOT NULL,
  `nome` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estados`
--

CREATE TABLE `estados` (
  `id` int(11) NOT NULL,
  `nome` varchar(128) NOT NULL,
  `sigla` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `estados`
--

INSERT INTO `estados` (`id`, `nome`, `sigla`) VALUES
(1, 'São Paulo', 'SP'),
(2, 'Minas Gerais', 'MG'),
(3, 'Paraná', 'PR');

-- --------------------------------------------------------

--
-- Estrutura da tabela `paises`
--

CREATE TABLE `paises` (
  `id` int(11) NOT NULL,
  `nome` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `produto_id` int(11) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `data` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `cliente_id`, `produto_id`, `preco`, `quantidade`, `total`, `data`) VALUES
(1, 1, 1, '29.90', 1, '29.90', '2023-04-19 18:49:42'),
(2, 2, 2, '34.90', 2, '69.80', '2023-04-19 18:50:15'),
(4, 1, 2, '34.90', 1, '34.90', '2023-04-19 20:41:51');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(128) NOT NULL,
  `imagem` varchar(256) DEFAULT NULL,
  `preco` decimal(10,2) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `imagem`, `preco`, `categoria_id`, `status`) VALUES
(1, 'Feijoada', '20230503150657_d0e0c81855cd707956261cacde65f1dd.jpg', '29.00', 1, '1'),
(2, 'Baião de dois', 'baiao-de-dois.jpg', '35.90', 1, '1'),
(3, 'Água 500 ml', 'agua-500-ml.jpg', '19.49', 2, '1'),
(4, 'Coca-cola 600 ml', 'coca-cola-600-ml', '9.90', 2, '1'),
(6, 'OJHP', 'OJHP.jpg', '2.40', 1, '1'),
(7, 'IFIZ', 'IFIZ.jpg', '3.60', 1, '1'),
(8, 'SURJ', 'SURJ.jpg', '4.80', 1, '1'),
(9, 'EUWI', 'EUWI.jpg', '6.00', 1, '1'),
(10, 'TYDZ', 'TYDZ.jpg', '7.20', 1, '1'),
(11, 'QCDR', 'QCDR.jpg', '8.40', 1, '1'),
(12, 'FGME', 'FGME.jpg', '9.60', 1, '1'),
(13, 'FWUR', 'FWUR.jpg', '10.80', 1, '1'),
(14, 'KSMX', 'KSMX.jpg', '12.00', 1, '1'),
(15, 'NNLM', 'NNLM.jpg', '13.20', 1, '1'),
(16, 'PMVL', 'PMVL.jpg', '14.40', 1, '1'),
(17, 'HKBG', 'HKBG.jpg', '15.60', 1, '1'),
(18, 'LIBO', 'LIBO.jpg', '16.80', 1, '1'),
(19, 'PRFH', 'PRFH.jpg', '18.00', 1, '1'),
(20, 'RODO', 'RODO.jpg', '19.20', 1, '1'),
(21, 'MLRT', 'MLRT.jpg', '20.40', 1, '1'),
(22, 'PMWN', 'PMWN.jpg', '21.60', 1, '1'),
(23, 'RTZS', 'RTZS.jpg', '22.80', 1, '1'),
(24, 'NJDD', 'NJDD.jpg', '24.00', 1, '1'),
(25, 'EEWV', 'EEWV.jpg', '25.20', 1, '1'),
(26, 'YPSS', 'YPSS.jpg', '26.40', 1, '1'),
(27, 'HXZT', 'HXZT.jpg', '27.60', 1, '1'),
(28, 'OPBG', 'OPBG.jpg', '28.80', 1, '1'),
(29, 'HINY', 'HINY.jpg', '30.00', 1, '1'),
(30, 'DGBN', 'DGBN.jpg', '31.20', 1, '1'),
(31, 'HLKI', 'HLKI.jpg', '32.40', 1, '1'),
(32, 'BFLF', 'BFLF.jpg', '33.60', 1, '1'),
(33, 'UWPN', 'UWPN.jpg', '34.80', 1, '1'),
(34, 'NVDR', 'NVDR.jpg', '36.00', 1, '1'),
(35, 'NBAA', 'NBAA.jpg', '37.20', 1, '1'),
(36, 'VNCO', 'VNCO.jpg', '38.40', 1, '1'),
(37, 'IEVS', 'IEVS.jpg', '39.60', 1, '1'),
(38, 'FIFE', 'FIFE.jpg', '40.80', 1, '1'),
(39, 'CCPQ', 'CCPQ.jpg', '42.00', 1, '1'),
(40, 'AOAT', 'AOAT.jpg', '43.20', 1, '1'),
(41, 'OCSG', 'OCSG.jpg', '44.40', 1, '1'),
(42, 'UDOQ', 'UDOQ.jpg', '45.60', 1, '1'),
(43, 'BUVQ', 'BUVQ.jpg', '46.80', 1, '1'),
(44, 'ICVO', 'ICVO.jpg', '48.00', 1, '1'),
(45, 'ZTQB', 'ZTQB.jpg', '49.20', 1, '1'),
(46, 'NVUL', 'NVUL.jpg', '50.40', 1, '1'),
(47, 'BDRM', 'BDRM.jpg', '51.60', 1, '1'),
(48, 'BDMY', 'BDMY.jpg', '52.80', 1, '1'),
(49, 'CDYI', 'CDYI.jpg', '54.00', 1, '1'),
(50, 'GJXG', 'GJXG.jpg', '55.20', 1, '1'),
(51, 'RJHK', 'RJHK.jpg', '56.40', 1, '1'),
(52, 'GXIZ', 'GXIZ.jpg', '57.60', 1, '1'),
(53, 'UVXK', 'UVXK.jpg', '58.80', 1, '1'),
(54, 'VSEF', 'VSEF.jpg', '60.00', 1, '1'),
(55, 'Teste', '20230503184404_49c5a835d2587320570d36299c427407.jpg', '19.95', 2, '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `senha` varchar(128) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `senha`, `status`) VALUES
(1, 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', '1'),
(6, 'joao.oliveira@gmail.com', '202cb962ac59075b964b07152d234b70', '1');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cidades`
--
ALTER TABLE `cidades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estado_id` (`estado_id`);

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cidade_id` (`cidade_id`);

--
-- Índices para tabela `continentes`
--
ALTER TABLE `continentes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_id` (`cliente_id`),
  ADD KEY `produto_id` (`produto_id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `cidades`
--
ALTER TABLE `cidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `continentes`
--
ALTER TABLE `continentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `estados`
--
ALTER TABLE `estados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `paises`
--
ALTER TABLE `paises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cidades`
--
ALTER TABLE `cidades`
  ADD CONSTRAINT `cidades_ibfk_1` FOREIGN KEY (`estado_id`) REFERENCES `estados` (`id`);

--
-- Limitadores para a tabela `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`cidade_id`) REFERENCES `cidades` (`id`);

--
-- Limitadores para a tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`);

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `produtos_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
