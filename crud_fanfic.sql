-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Mar-2024 às 01:00
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
-- Banco de dados: `crud_fanfic`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `capitulos`
--

CREATE TABLE `capitulos` (
  `id_capitulo` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `texto` text NOT NULL,
  `fanfic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `categorias` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `categorias`) VALUES
(1, 'Fantasia'),
(2, 'Terror'),
(3, 'Romance'),
(4, 'Drama'),
(5, 'Aventura'),
(6, 'Suspense'),
(7, 'Ação'),
(8, 'Comedia'),
(9, 'Guerra'),
(10, 'Luta');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fanfic`
--

CREATE TABLE `fanfic` (
  `id_fanfic` int(11) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `sinopse` text NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `nome_user` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `concluido` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `fanfic`
--

INSERT INTO `fanfic` (`id_fanfic`, `imagem`, `titulo`, `sinopse`, `categoria_id`, `nome_user`, `user_id`, `concluido`) VALUES
(11, '../../Resources/Assets/Uploads/download.jpg', 'Teste 2', 'Lorem ipsum dolor sit amet. Et velit consequatur vel tenetur voluptatum qui soluta odio eos suscipit voluptatem est omnis harum in dolore sint. Eos voluptatem reiciendis ea dolores aperiam At quia officia qui laboriosam doloribus et doloremque dolore ut laborum earum. Est incidunt autem non dolore voluptatem in architecto error sed inventore cumque aut voluptas reiciendis eos molestiae quia. In consequatur nemo eum doloremque tempore aut omnis repudiandae ut error tempore aut optio numquam.', 1, 'Wesley', 2, 1),
(12, '../../Resources/Assets/Uploads/7695278932c2e062956c227d4c0cef69.jpg', 'Teste M', 'Lorem ipsum dolor sit amet. Et velit consequatur vel tenetur voluptatum qui soluta odio eos suscipit voluptatem est omnis harum in dolore sint. Eos voluptatem reiciendis ea dolores aperiam At quia officia qui laboriosam doloribus et doloremque dolore ut laborum earum. Est incidunt autem non dolore voluptatem in architecto error sed inventore cumque aut voluptas reiciendis eos molestiae quia. In consequatur nemo eum doloremque tempore aut omnis repudiandae ut error tempore aut optio numquam.', 10, 'Mel', 3, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `log_cad`
--

CREATE TABLE `log_cad` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `log_cad`
--

INSERT INTO `log_cad` (`id`, `nome`, `email`, `senha`) VALUES
(2, 'Wesley', 'wesley@gmail.com', '12345'),
(3, 'Mel', 'melyssa@gmail.com', '12345');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `capitulos`
--
ALTER TABLE `capitulos`
  ADD PRIMARY KEY (`id_capitulo`),
  ADD KEY `capitulos_fanfic_id_FK` (`fanfic_id`);

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Índices para tabela `fanfic`
--
ALTER TABLE `fanfic`
  ADD PRIMARY KEY (`id_fanfic`),
  ADD KEY `fanfic_categoria_id_FK` (`categoria_id`),
  ADD KEY `fanfic_user_id_FK` (`user_id`);

--
-- Índices para tabela `log_cad`
--
ALTER TABLE `log_cad`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `capitulos`
--
ALTER TABLE `capitulos`
  MODIFY `id_capitulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `fanfic`
--
ALTER TABLE `fanfic`
  MODIFY `id_fanfic` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `log_cad`
--
ALTER TABLE `log_cad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `capitulos`
--
ALTER TABLE `capitulos`
  ADD CONSTRAINT `capitulos_fanfic_id_FK` FOREIGN KEY (`fanfic_id`) REFERENCES `fanfic` (`id_fanfic`);

--
-- Limitadores para a tabela `fanfic`
--
ALTER TABLE `fanfic`
  ADD CONSTRAINT `fanfic_categoria_id_FK` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id_categoria`),
  ADD CONSTRAINT `fanfic_user_id_FK` FOREIGN KEY (`user_id`) REFERENCES `log_cad` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
