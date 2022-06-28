-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Jun-2022 às 21:12
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_sitealmir`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_postagens`
--

CREATE TABLE `tb_postagens` (
  `id_post` int(5) NOT NULL,
  `titulo` varchar(60) NOT NULL,
  `imagem` varchar(60) NOT NULL,
  `texto` varchar(140) NOT NULL,
  `dt` date NOT NULL,
  `hr` time NOT NULL,
  `page` int(1) NOT NULL,
  `id_user` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_postagens`
--

INSERT INTO `tb_postagens` (`id_post`, `titulo`, `imagem`, `texto`, `dt`, `hr`, `page`, `id_user`) VALUES
(1, 'Naruto', 'naruto.png', 'blablalsasld asd asdas  das', '2022-06-28', '15:52:24', 1, 2),
(2, 'Fanart feita por Ebenezer', 'fanart3.jpg', 'fsdf fds fhnjhjghsdf sdf', '2022-06-28', '15:52:35', 2, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(5) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `lembrete` varchar(60) NOT NULL,
  `foto` varchar(60) DEFAULT NULL,
  `nivel` int(1) NOT NULL,
  `dt` date DEFAULT NULL,
  `hr` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nome`, `email`, `senha`, `lembrete`, `foto`, `nivel`, `dt`, `hr`) VALUES
(1, 'Adriano Zimermam', 'adriano-zimerman@hotmail.com', 'markin123', 'Nome+num', 'naruto.jpg', 1, '2022-06-23', '03:47:35'),
(2, 'Matheus Zimerman', 'zimmerman-matheus@outlook.com', 'matheus123', 'Nome+num', 'sasuke.jpg', 1, '2022-06-23', '03:47:35'),
(3, 'rennier', 'ebenezer@gmail.com', 'ebe-nezer', 'nome estranho', 'semfoto.png', 2, '2022-06-23', '03:50:35'),
(4, 'ratinho', 'ratinho@gmail.com', '123', '123', 'fanart2.jpg', 5, '2022-06-28', '14:24:38'),
(5, 'rapaz', 'rapaz@gmail.com', '123', '123', 'fanart3.jpg', 5, '2022-06-28', '14:26:19');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_postagens`
--
ALTER TABLE `tb_postagens`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `id_user` (`id_user`);

--
-- Índices para tabela `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_postagens`
--
ALTER TABLE `tb_postagens`
  MODIFY `id_post` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_postagens`
--
ALTER TABLE `tb_postagens`
  ADD CONSTRAINT `tb_postagens_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
