-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 06, 2025 at 11:51 PM
-- Server version: 8.4.3
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `aviso`
--

CREATE TABLE `aviso` (
  `idAviso` int NOT NULL,
  `tituloAviso` varchar(50) DEFAULT NULL,
  `descricaoAviso` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `validadeAviso` datetime DEFAULT NULL,
  `criadorAviso` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `aviso`
--

INSERT INTO `aviso` (`idAviso`, `tituloAviso`, `descricaoAviso`, `validadeAviso`, `criadorAviso`) VALUES
(1, 'MANUTENÇÃO NO SISTEMA', 'Informamos que o sistema do Portal: IF Mais passará por uma manutenção programada no dia 06/07/2025, das 22h ás 02h. Durante esse período, os serviços poderão ficar temporariamente indisponíveis.\r\nAgradecemos pela compreensão e estamos trabalhando para melhorar continuamente nossa plataforma.', '2025-07-07 02:00:00', 2),
(2, 'Sistemas de Avisos', 'O sistema de avisos está pronto!!! YEPPIE', '2025-07-06 23:59:00', 2),
(7, 'Alteração na data da Oficina de PHP', 'Foi informado que a oficina ocorreria no dia 25/08, porém por problemas pessoas a professora Henata terá que se ausentar nesse dia, então a mesma está remarcada para o dia 31/08!', '2025-08-31 23:59:00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `endereco`
--

CREATE TABLE `endereco` (
  `cep` char(8) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `cidade` varchar(24) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `rua` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `endereco`
--

INSERT INTO `endereco` (`cep`, `estado`, `cidade`, `bairro`, `rua`) VALUES
('35661166', 'MG', 'Pará de Minas', 'São Francisco', 'Rua Frei Egídio'),
('84267330', 'PR', 'Telêmaco Borba', 'Parque Limeira Área II', 'Rua Uvaranal');

-- --------------------------------------------------------

--
-- Table structure for table `endereco_pessoa`
--

CREATE TABLE `endereco_pessoa` (
  `cepEndereco` char(8) NOT NULL,
  `cpfPessoa` char(11) NOT NULL,
  `numero` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `endereco_pessoa`
--

INSERT INTO `endereco_pessoa` (`cepEndereco`, `cpfPessoa`, `numero`) VALUES
('35661166', '12345678910', '32'),
('35661166', '16926915769', '52'),
('84267330', '12421421412', '2'),
('84267330', '49480733854', '3');

-- --------------------------------------------------------

--
-- Table structure for table `oficina`
--

CREATE TABLE `oficina` (
  `idOficina` int NOT NULL,
  `tituloOficina` varchar(50) DEFAULT NULL,
  `descricaoOficina` varchar(500) DEFAULT NULL,
  `dataOficina` date DEFAULT NULL,
  `horaOficina` time DEFAULT NULL,
  `criadorOficina` int DEFAULT NULL,
  `fotoOficina` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `oficina`
--

INSERT INTO `oficina` (`idOficina`, `tituloOficina`, `descricaoOficina`, `dataOficina`, `horaOficina`, `criadorOficina`, `fotoOficina`) VALUES
(2, 'Oficina: PHP para Iniciantes', 'Neste curso prático, você vai aprender os fundamentos do PHP de forma descomplicada, mesmo que nunca tenha programado antes. Vamos cobrir desde a instalação do ambiente até a criação de suas primeiras aplicações web interativas.', '2025-08-31', '08:00:00', 2, 'storage/oficinas/imagem_2025-07-06_165631813.png'),
(4, 'Oficina: Pescaria para Profissionais', 'Neste encontro exclusivo, vamos mergulhar em estratégias avançadas, focar em tecnologias de ponta e compartilhar insights valiosos para você otimizar seus resultados e se tornar um pescador de elite. Chega de pescar por sorte, é hora de pescar com estratégia e conhecimento!', '2025-09-08', '08:30:00', 4, 'storage/oficinas/imagem_2025-07-06_201913458.png');

-- --------------------------------------------------------

--
-- Table structure for table `pessoa`
--

CREATE TABLE `pessoa` (
  `cpfPessoa` char(11) NOT NULL,
  `nomePessoa` varchar(100) NOT NULL,
  `dataNasc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pessoa`
--

INSERT INTO `pessoa` (`cpfPessoa`, `nomePessoa`, `dataNasc`) VALUES
('12345678910', 'Henatinha Goiabinhas', '2006-06-12'),
('12421421412', 'Arabella Hideki Tsugikava', '2005-09-12'),
('16926915769', 'Cesar Fernandes', '2000-09-15'),
('49480733854', 'Ricardo Hideki Tsugikava Junior', '2005-09-29');

-- --------------------------------------------------------

--
-- Table structure for table `professores_oficina`
--

CREATE TABLE `professores_oficina` (
  `idOficina` int NOT NULL,
  `cpfProfessor` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `professores_oficina`
--

INSERT INTO `professores_oficina` (`idOficina`, `cpfProfessor`) VALUES
(2, '12345678910'),
(2, '12421421412'),
(4, '16926915769'),
(2, '49480733854');

-- --------------------------------------------------------

--
-- Table structure for table `titulacao`
--

CREATE TABLE `titulacao` (
  `idTitulacao` int NOT NULL,
  `tipoTitulacao` varchar(12) NOT NULL,
  `nomeTitulacao` varchar(125) NOT NULL,
  `instituicao` varchar(150) NOT NULL,
  `anoInicio` smallint NOT NULL,
  `anoFim` smallint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `titulacao`
--

INSERT INTO `titulacao` (`idTitulacao`, `tipoTitulacao`, `nomeTitulacao`, `instituicao`, `anoInicio`, `anoFim`) VALUES
(1, 'Graduação', 'Tecnologia em Análise e Desenvolvimento de Sistemas', 'Instituto Federal do Paraná - Campus Telêmaco Borba', 2024, 2027),
(2, 'Bacharelado', 'Engenharia de Software', 'Unicesumar', 2024, 2028),
(3, 'Mestrado', 'Engenharia da Computação', 'Universidade Federal de Tecnologia do Paraná', 2029, 2034),
(4, 'Graduação', 'Engenharia de Software', 'Unicesumar', 2025, 2027),
(5, 'Graduação', 'Engenharia de Software', 'Universidade Estadual de Manaus', 2023, 2025),
(6, 'Mestrado', 'Design Gráfico', 'Universidade Estadual de Manaus', 2025, 2028),
(7, 'Doutorado', 'Engenharia de Pesca', 'Universidade Federal de Pescaria de São Paulo', 2024, 2028);

-- --------------------------------------------------------

--
-- Table structure for table `titulacao_pessoa`
--

CREATE TABLE `titulacao_pessoa` (
  `idTitulacao` int NOT NULL,
  `cpfPessoa` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `titulacao_pessoa`
--

INSERT INTO `titulacao_pessoa` (`idTitulacao`, `cpfPessoa`) VALUES
(5, '12345678910'),
(6, '12345678910'),
(3, '12421421412'),
(4, '12421421412'),
(7, '16926915769'),
(1, '49480733854'),
(2, '49480733854');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int NOT NULL,
  `emailUsuario` varchar(235) NOT NULL,
  `senhaHash` varchar(200) NOT NULL,
  `telefone` varchar(11) NOT NULL,
  `fotoUsuario` varchar(100) DEFAULT NULL,
  `sobreUsuario` varchar(500) DEFAULT NULL,
  `cpfPessoa` char(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `emailUsuario`, `senhaHash`, `telefone`, `fotoUsuario`, `sobreUsuario`, `cpfPessoa`) VALUES
(1, 'dekyifprtb@gmail.com', '$2y$10$/bX0MABA07mOaMK03IIo7OISbeuH7lwhNA/dXSwkyK4XRfNCprvS2', '42999853509', 'storage/usuarios/socorro.png', 'Testando', '49480733854'),
(2, 'arabellaHarvey@gmail.com', '$2y$10$8lv4HZ.WSQlwHBSymKUeeOGMFBucPlH6hiawDO9vsQzec9WuW2gre', '42999853509', 'storage/usuarios/Icon.png', 'IT\'S ARABELLA', '12421421412'),
(3, 'truehenata@gmail.com', '$2y$10$1RquR6XDtKoLXundsecMWe3gkg/4a1AyyF4z9vgbd0V7YX/fBfM0y', '90999999999', 'storage/usuarios/PICT0012.jpg', 'AAAAAAAAAAAAAAAAAAAAAAAAAA', '12345678910'),
(4, 'peixeHumano@ifpr.professor.com', '$2y$10$hhlpCIYAJQrEcdar3XvYhu3aiQuGsKxN30H.VP6zumi4lZagFKzqG', '42912341241', 'storage/usuarios/GkplWDyWwAAaz4T.jpg', 'Sou professor do instituto federal', '16926915769');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aviso`
--
ALTER TABLE `aviso`
  ADD PRIMARY KEY (`idAviso`),
  ADD KEY `criadorAviso` (`criadorAviso`);

--
-- Indexes for table `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`cep`);

--
-- Indexes for table `endereco_pessoa`
--
ALTER TABLE `endereco_pessoa`
  ADD PRIMARY KEY (`cepEndereco`,`cpfPessoa`),
  ADD KEY `cpfPessoa` (`cpfPessoa`);

--
-- Indexes for table `oficina`
--
ALTER TABLE `oficina`
  ADD PRIMARY KEY (`idOficina`),
  ADD KEY `criadorOficina` (`criadorOficina`);

--
-- Indexes for table `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`cpfPessoa`);

--
-- Indexes for table `professores_oficina`
--
ALTER TABLE `professores_oficina`
  ADD PRIMARY KEY (`idOficina`,`cpfProfessor`),
  ADD KEY `cpfProfessor` (`cpfProfessor`);

--
-- Indexes for table `titulacao`
--
ALTER TABLE `titulacao`
  ADD PRIMARY KEY (`idTitulacao`);

--
-- Indexes for table `titulacao_pessoa`
--
ALTER TABLE `titulacao_pessoa`
  ADD PRIMARY KEY (`idTitulacao`,`cpfPessoa`),
  ADD KEY `cpfPessoa` (`cpfPessoa`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `cpfPessoa` (`cpfPessoa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aviso`
--
ALTER TABLE `aviso`
  MODIFY `idAviso` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `oficina`
--
ALTER TABLE `oficina`
  MODIFY `idOficina` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `titulacao`
--
ALTER TABLE `titulacao`
  MODIFY `idTitulacao` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aviso`
--
ALTER TABLE `aviso`
  ADD CONSTRAINT `aviso_ibfk_1` FOREIGN KEY (`criadorAviso`) REFERENCES `usuario` (`idUsuario`);

--
-- Constraints for table `endereco_pessoa`
--
ALTER TABLE `endereco_pessoa`
  ADD CONSTRAINT `endereco_pessoa_ibfk_1` FOREIGN KEY (`cepEndereco`) REFERENCES `endereco` (`cep`),
  ADD CONSTRAINT `endereco_pessoa_ibfk_2` FOREIGN KEY (`cpfPessoa`) REFERENCES `pessoa` (`cpfPessoa`);

--
-- Constraints for table `oficina`
--
ALTER TABLE `oficina`
  ADD CONSTRAINT `oficina_ibfk_1` FOREIGN KEY (`criadorOficina`) REFERENCES `usuario` (`idUsuario`);

--
-- Constraints for table `professores_oficina`
--
ALTER TABLE `professores_oficina`
  ADD CONSTRAINT `professores_oficina_ibfk_1` FOREIGN KEY (`idOficina`) REFERENCES `oficina` (`idOficina`),
  ADD CONSTRAINT `professores_oficina_ibfk_2` FOREIGN KEY (`cpfProfessor`) REFERENCES `pessoa` (`cpfPessoa`);

--
-- Constraints for table `titulacao_pessoa`
--
ALTER TABLE `titulacao_pessoa`
  ADD CONSTRAINT `titulacao_pessoa_ibfk_1` FOREIGN KEY (`idTitulacao`) REFERENCES `titulacao` (`idTitulacao`),
  ADD CONSTRAINT `titulacao_pessoa_ibfk_2` FOREIGN KEY (`cpfPessoa`) REFERENCES `pessoa` (`cpfPessoa`);

--
-- Constraints for table `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`cpfPessoa`) REFERENCES `pessoa` (`cpfPessoa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
