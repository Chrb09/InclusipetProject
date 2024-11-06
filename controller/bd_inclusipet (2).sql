-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01-Nov-2024 às 20:19
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_inclusipet`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `adocao`
--

CREATE TABLE `adocao` (
  `CodAdocao` int(11) NOT NULL,
  `CodEspecie` int(11) NOT NULL,
  `CodCliente` int(11) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Idade` int(11) NOT NULL,
  `Porte` varchar(20) NOT NULL,
  `Castrado` tinyint(1) NOT NULL,
  `Sexo` char(5) NOT NULL,
  `Descricao` varchar(80) NOT NULL,
  `Detalhes` varchar(250) NOT NULL,
  `Telefone` varchar(15) NOT NULL,
  `Endereco` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `adocao`
--

INSERT INTO `adocao` (`CodAdocao`, `CodEspecie`, `CodCliente`, `Nome`, `Idade`, `Porte`, `Castrado`, `Sexo`, `Descricao`, `Detalhes`, `Telefone`, `Endereco`) VALUES
(1, 1, 3, 'Fonseca', 15, 'Grande', 1, 'M', 'Um cachorro de olhos marrons claros, de porte médio, velho, de pelagem curta, br', '', '(11) 11111-1111', 'Av. Águia de Haia'),
(2, 2, 3, 'Afrodite', 7, 'Pequeno', 1, 'F', 'Gata jovem de olhos azuis de pelagem dourada, nascida sem as pernas traseiras. F', '', '(11) 11111-1111', 'Av. Águia de Haia '),
(3, 1, 2, 'Neném', 8, 'Médio', 1, 'F', 'Cadela de porte médio, peluda, pelagem preta e que possui manchas brancas nas pa', '', '(11) 11111-1111', 'Av. Águia de Haia '),
(4, 1, 1, 'Max', 2, 'Médio-grande', 2, 'M', 'Um cachorro de porte médio, juvenil, de pelagem preta com manchas brancas no que', '', '(11) 11111-1111', 'Av. Águia de Haia '),
(5, 2, 2, 'Fofinha', 5, 'Pequeno', 1, 'F', 'Gata jovem, de olhos azuis, branca com manchas marrons e pretas pelo seu corpo. ', '', '(11) 11111-1111', 'Av. Águia de Haia '),
(6, 1, 1, 'Marrom', 10, 'Médio', 1, 'M', 'Cachorro adulto, marrom de patas brancas e de olhos castanhos. Após sofrer um ac', '', '(11) 11111-1111', 'Av. Águia de Haia '),
(7, 1, 2, 'Belinha', 11, 'Pequeno', 1, 'F', 'Cadela fêmea de porte pequeno, apesar de ser mais velha, é super brincalhona. Go', '', '(11) 11111-1111', 'Av. Águia de Haia ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `agendamento`
--

CREATE TABLE `agendamento` (
  `CodAgendamento` int(11) NOT NULL,
  `CodFuncionario` int(11) NOT NULL,
  `CodAnimal` int(11) NOT NULL,
  `CodCliente` int(11) NOT NULL,
  `CodUnidade` int(11) NOT NULL,
  `Data` date NOT NULL,
  `Hora` time NOT NULL,
  `Info` varchar(200) DEFAULT NULL,
  `Resultado` varchar(1) DEFAULT NULL,
  `CodServico` int(11) NOT NULL,
  `Cancelado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `agendamento`
--

INSERT INTO `agendamento` (`CodAgendamento`, `CodFuncionario`, `CodAnimal`, `CodCliente`, `CodUnidade`, `Data`, `Hora`, `Info`, `Resultado`, `CodServico`, `Cancelado`) VALUES
(1, 1, 1, 3, 3, '2024-11-21', '16:00:00', NULL, NULL, 5, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `animal`
--

CREATE TABLE `animal` (
  `CodAnimal` int(11) NOT NULL,
  `CodRaca` int(11) NOT NULL,
  `CodCliente` int(11) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Sexo` char(5) NOT NULL,
  `DataNasc` date DEFAULT NULL,
  `DataAprox` year(4) DEFAULT NULL,
  `Peso` double NOT NULL,
  `Castrado` tinyint(1) NOT NULL,
  `Imagem` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `animal`
--

INSERT INTO `animal` (`CodAnimal`, `CodRaca`, `CodCliente`, `Nome`, `Sexo`, `DataNasc`, `DataAprox`, `Peso`, `Castrado`, `Imagem`) VALUES
(1, 1, 1, 'Fonseca', 'Macho', NULL, 2008, 8, 1, '899c2a0ad9e039fd880ea084e33e63b9f5d5c881a3412fb08416b649f576574a0f1fbb50f643f831e1fe9b7e24ee7d6ce219fda82c3e7e7f45eb9f4b.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargo`
--

CREATE TABLE `cargo` (
  `CodCargo` int(11) NOT NULL,
  `Descricao` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cargo`
--

INSERT INTO `cargo` (`CodCargo`, `Descricao`) VALUES
(1, 'Neurologista'),
(2, 'Clínico'),
(3, 'Fisioterapista'),
(4, 'Cirugião');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `CodCliente` int(11) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `DataNasc` date NOT NULL,
  `Telefone` varchar(15) NOT NULL,
  `CEP` varchar(9) NOT NULL,
  `CPF` varchar(14) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Senha` varchar(200) NOT NULL,
  `Token` varchar(200) DEFAULT NULL,
  `Imagem` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`CodCliente`, `Nome`, `DataNasc`, `Telefone`, `CEP`, `CPF`, `Email`, `Senha`, `Token`, `Imagem`) VALUES
(1, 'Miguel Yudi Baba', '2004-04-11', '(11)91234-5678', '69093-809', '252.910.260-06', 'hatsunemikulover@gmail.com', '$2y$10$maUt5gopWT2QyGQwbvqvrOavMQLPZMvoAfZ/nwmJUf/nzDTegBUHG', 'ec4636cc09a127bc25696cf09a8be2b994a48b6a906b24b0708e6037e83b884caabc85b736e4da5dc84208e5e085bcb4aca4', '1ca8d7315c43466b033f3e8010eb5aac93ec0747f8cbabc5f4418148f15a70f51301fad027425e4e4d39fac4ec103e62db1b2f12441d37d95285b3e8.jpg'),
(2, 'Giovanna Andrade', '2005-12-01', '(11)98765-4321', '69093-943', '558.736.462-77', 'guminum1fan@gmail.com', '$2y$10$.3zyiv01/u9T/s4RzxCZU.EGfH1GMwaMxRTISP8UEB3kcF9qT1NYG', '0b20086e04644102b0ee13c2957f9654050c0eeef15585c93557211df4cac680848e1d1357ee2b952cd55eacc5d5b5e5a82e', '06bd2382a46bb721eb2d9e53346e14cc14f41a810efec63b87c1a1764d804d7ce6c992569ffd61277f00c23a0de4bfaf4fb205f65c3b4385d28c6fc9.jpg'),
(3, 'Amanda Farias', '2005-07-05', '(11)99767-9687', '69504-344', '979.607.567-66', 'voviikoffe@gmail.com', '$2y$10$2JorqrnxcluOX0yFTnsJkOavgHDf8aLaMSmnMdzDQ1BE9DSesq6ZO', 'fb0b4c18493698a81d1318a5c6ff8e081410b824bb632109637b694bc6d749a64610b9a2acad4c62155f414e1c6e1e8e59cc', '7315de3c0089c9172ff6a3833453269dc967bed03f4ff94bd7cc16bd669ed85e5f448ba29433a1b13047b0344faa6724e17243ee1fb3d919d863bbe5.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `especie`
--

CREATE TABLE `especie` (
  `CodEspecie` int(11) NOT NULL,
  `Descricao` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `especie`
--

INSERT INTO `especie` (`CodEspecie`, `Descricao`) VALUES
(1, 'Canino'),
(2, 'Gato'),
(3, 'Pássaro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `CodFuncionario` int(11) NOT NULL,
  `CodCargo` int(11) NOT NULL,
  `Senha` varchar(200) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `RG` varchar(12) NOT NULL,
  `CPF` varchar(14) NOT NULL,
  `Telefone` varchar(15) NOT NULL,
  `CEP` varchar(9) NOT NULL,
  `CodUnidade` int(11) NOT NULL,
  `Token` varchar(200) DEFAULT NULL,
  `Imagem` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`CodFuncionario`, `CodCargo`, `Senha`, `Nome`, `RG`, `CPF`, `Telefone`, `CEP`, `CodUnidade`, `Token`, `Imagem`) VALUES
(1, 1, '$2y$10$1xGy5hDzqYwYgJ/QuxEm1.rXLAHJHLOpu0TsRmMCMy8dGGbOtHNAC', 'Bernardo Vieira', '28.407.303-9', '343.243.242-34', '(43)24324-2343', '43242-343', 1, 'ee4cdf5cc2b7d945ef44d0f98fcb8344dd024c585751e061ba6dd93cd98b0b44e3b195a260a9880c805fb8caab7aa0028e12', NULL),
(2, 3, '$2y$10$qV5DDHbg71bpwzlupW8px.5WIqIQnH1eGcfl/vZdjLlyBIu.Dmxxy', 'Beatriz Silva', '32.321.900-7', '435.435.345-34', '(32)23423-4324', '54354-354', 2, '196ab39fcf61c66855c3ff7bc0ef96c60cd9903d561152f218834944dfb1611a82a5acece27de59f7896ed225299f52c39a2', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem_adocao`
--

CREATE TABLE `imagem_adocao` (
  `CodAdocao` int(11) NOT NULL,
  `Imagem` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `raca`
--

CREATE TABLE `raca` (
  `CodRaca` int(11) NOT NULL,
  `CodEspecie` int(11) NOT NULL,
  `Descricao` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `raca`
--

INSERT INTO `raca` (`CodRaca`, `CodEspecie`, `Descricao`) VALUES
(1, 1, 'Vira-Lata'),
(2, 1, 'Border Collie'),
(3, 1, 'Lhasa Apso'),
(4, 1, 'Pastor Alemão'),
(5, 3, 'Calopsita'),
(6, 2, 'Vira-Lata'),
(7, 1, 'Chihuahua');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

CREATE TABLE `servico` (
  `CodServico` int(11) NOT NULL,
  `Descricao` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `servico`
--

INSERT INTO `servico` (`CodServico`, `Descricao`) VALUES
(1, 'Fisioterapia'),
(2, 'Ortopedia'),
(3, 'Neurologia'),
(4, 'Terapia Comportament'),
(5, 'Aconselhamento');

-- --------------------------------------------------------

--
-- Estrutura da tabela `unidade`
--

CREATE TABLE `unidade` (
  `CodUnidade` int(11) NOT NULL,
  `Nome` varchar(35) NOT NULL,
  `Endereco` varchar(50) NOT NULL,
  `Bairro` varchar(50) NOT NULL,
  `Telefone` varchar(15) NOT NULL,
  `HorarioInicial` time DEFAULT NULL,
  `HorarioFinal` time DEFAULT NULL,
  `Link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `unidade`
--

INSERT INTO `unidade` (`CodUnidade`, `Nome`, `Endereco`, `Bairro`, `Telefone`, `HorarioInicial`, `HorarioFinal`, `Link`) VALUES
(1, 'Inclusipet - Guarulhos', 'R. Conceição da Feira', 'Jardim pres. dutra - SP', '(11) 11111-1111', '08:00:00', '21:00:00', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3660.9433340295095!2d-46.433593725612525!3d-23.426414056646507!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce89f1b8bcf965%3A0xff24a059d917838b!2sR.%20Concei%C3%A7%C3%A3o%20da%20Feira%20-%20Jardim%20Pres.%20Dutra%2C%20Guarulhos%20-%20SP%2C%2007173-010!5e0!3m2!1spt-BR!2sbr!4v1697764260412!5m2!1spt-BR!2sbr'),
(2, 'Inclusipet - Vila Cisper', 'R. Cícero Dantas', 'Vila Cisper - SP', '(11) 22222-2222', '08:00:00', '18:00:00', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3658.9811661599797!2d-46.497951325609456!3d-23.497187859235876!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce605e5a1481e3%3A0xb0cd6094d2133515!2sR.%20C%C3%ADcero%20Dantas%20-%20Ermelino%20Matarazzo%2C%20S%C3%A3o%20Paulo%20-%20SP%2C%2003818-130!5e0!3m2!1spt-BR!2sbr!4v1697773935746!5m2!1spt-BR!2sbr'),
(3, 'Inclusipet - Artur Alvim', 'Av. Líder', 'Artur Alvim - SP', '(11) 33333-3333', '10:00:00', '18:00:00', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.369311320792!2d-46.47061682560695!3d-23.555176061363234!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce66e1dbe1105b%3A0xb388139f5d5c5750!2sAv.%20L%C3%ADder%20-%20Artur%20Alvim%2C%20S%C3%A3o%20Paulo%20-%20SP!5e0!3m2!1spt-BR!2sbr!4v1697774090354!5m2!1spt-BR!2sbr');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `adocao`
--
ALTER TABLE `adocao`
  ADD PRIMARY KEY (`CodAdocao`),
  ADD KEY `CodClienteAdocao` (`CodCliente`),
  ADD KEY `CodEspecieAdocao` (`CodEspecie`);

--
-- Índices para tabela `agendamento`
--
ALTER TABLE `agendamento`
  ADD PRIMARY KEY (`CodAgendamento`),
  ADD KEY `CodAnimalAgendamento` (`CodAnimal`),
  ADD KEY `CodClienteAgendamento` (`CodCliente`),
  ADD KEY `CodFuncionarioAgendamento` (`CodFuncionario`),
  ADD KEY `CodUnidadeAgendamento` (`CodUnidade`),
  ADD KEY `CodServicoAgendamento` (`CodServico`);

--
-- Índices para tabela `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`CodAnimal`),
  ADD KEY `CodRacaAnimal` (`CodRaca`),
  ADD KEY `CodClienteAnimal` (`CodCliente`);

--
-- Índices para tabela `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`CodCargo`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`CodCliente`),
  ADD UNIQUE KEY `CPF` (`CPF`);

--
-- Índices para tabela `especie`
--
ALTER TABLE `especie`
  ADD PRIMARY KEY (`CodEspecie`);

--
-- Índices para tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`CodFuncionario`),
  ADD UNIQUE KEY `RG` (`RG`),
  ADD UNIQUE KEY `CPF` (`CPF`),
  ADD KEY `CodCargoFuncionario` (`CodCargo`),
  ADD KEY `CodUnidadeFuncionario` (`CodUnidade`);

--
-- Índices para tabela `imagem_adocao`
--
ALTER TABLE `imagem_adocao`
  ADD KEY `CodAdocaoImagem` (`CodAdocao`);

--
-- Índices para tabela `raca`
--
ALTER TABLE `raca`
  ADD PRIMARY KEY (`CodRaca`),
  ADD KEY `CodEspecieRaca` (`CodEspecie`);

--
-- Índices para tabela `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`CodServico`);

--
-- Índices para tabela `unidade`
--
ALTER TABLE `unidade`
  ADD PRIMARY KEY (`CodUnidade`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `adocao`
--
ALTER TABLE `adocao`
  MODIFY `CodAdocao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `agendamento`
--
ALTER TABLE `agendamento`
  MODIFY `CodAgendamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `animal`
--
ALTER TABLE `animal`
  MODIFY `CodAnimal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `cargo`
--
ALTER TABLE `cargo`
  MODIFY `CodCargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `CodCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `especie`
--
ALTER TABLE `especie`
  MODIFY `CodEspecie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `CodFuncionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `raca`
--
ALTER TABLE `raca`
  MODIFY `CodRaca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `servico`
--
ALTER TABLE `servico`
  MODIFY `CodServico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `unidade`
--
ALTER TABLE `unidade`
  MODIFY `CodUnidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `adocao`
--
ALTER TABLE `adocao`
  ADD CONSTRAINT `CodClienteAdocao` FOREIGN KEY (`CodCliente`) REFERENCES `cliente` (`CodCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `CodEspecieAdocao` FOREIGN KEY (`CodEspecie`) REFERENCES `especie` (`CodEspecie`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `agendamento`
--
ALTER TABLE `agendamento`
  ADD CONSTRAINT `CodAnimalAgendamento` FOREIGN KEY (`CodAnimal`) REFERENCES `animal` (`CodAnimal`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `CodClienteAgendamento` FOREIGN KEY (`CodCliente`) REFERENCES `cliente` (`CodCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `CodFuncionarioAgendamento` FOREIGN KEY (`CodFuncionario`) REFERENCES `funcionario` (`CodFuncionario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `CodServicoAgendamento` FOREIGN KEY (`CodServico`) REFERENCES `servico` (`CodServico`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `CodUnidadeAgendamento` FOREIGN KEY (`CodUnidade`) REFERENCES `unidade` (`CodUnidade`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `CodClienteAnimal` FOREIGN KEY (`CodCliente`) REFERENCES `cliente` (`CodCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `CodRacaAnimal` FOREIGN KEY (`CodRaca`) REFERENCES `raca` (`CodRaca`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `CodCargoFuncionario` FOREIGN KEY (`CodCargo`) REFERENCES `cargo` (`CodCargo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `CodUnidadeFuncionario` FOREIGN KEY (`CodUnidade`) REFERENCES `unidade` (`CodUnidade`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `imagem_adocao`
--
ALTER TABLE `imagem_adocao`
  ADD CONSTRAINT `CodAdocaoImagem` FOREIGN KEY (`CodAdocao`) REFERENCES `adocao` (`CodAdocao`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `raca`
--
ALTER TABLE `raca`
  ADD CONSTRAINT `CodEspecieRaca` FOREIGN KEY (`CodEspecie`) REFERENCES `especie` (`CodEspecie`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
