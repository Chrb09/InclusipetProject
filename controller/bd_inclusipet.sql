-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16/11/2024 às 19:06
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
-- Banco de dados: `bd_inclusipet`
--
CREATE DATABASE IF NOT EXISTS `bd_inclusipet` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bd_inclusipet`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `adocao`
--

CREATE TABLE `adocao` (
  `CodAdocao` int(11) NOT NULL,
  `CodEspecie` int(11) NOT NULL,
  `CodCliente` int(11) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Idade` int(11) DEFAULT NULL,
  `Porte` varchar(20) NOT NULL,
  `Castrado` tinyint(1) NOT NULL,
  `Sexo` char(5) NOT NULL,
  `Descricao` text NOT NULL,
  `Telefone` varchar(15) NOT NULL,
  `Endereco` varchar(50) NOT NULL,
  `Adotado` tinyint(1) NOT NULL,
  `Aprovado` tinyint(1) NOT NULL,
  `MotivoRecusar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `adocao`
--

INSERT INTO `adocao` (`CodAdocao`, `CodEspecie`, `CodCliente`, `Nome`, `Idade`, `Porte`, `Castrado`, `Sexo`, `Descricao`, `Telefone`, `Endereco`, `Adotado`, `Aprovado`, `MotivoRecusar`) VALUES
(1, 1, 3, 'Fonseca', 15, 'Grande', 1, 'Macho', 'Um cachorro de olhos marrons claros, de porte médio, velho, de pelagem curta, branca e com manchas pretas pelo seu corpo.', '(11) 11111-1111', 'Av. Águia de Haia', 0, 1, ''),
(2, 2, 3, 'Afrodite', 7, 'Pequeno', 1, 'Fêmea', 'Gata jovem de olhos azuis de pelagem dourada, nascida sem as pernas traseiras. Foi achada ainda filhote e levada para um centro de adoção.', '(11) 11111-1111', 'Av. Águia de Haia ', 0, 1, ''),
(3, 1, 2, 'Neném', 8, 'Médio', 1, 'Fêmea', 'Cadela de porte médio, peluda, pelagem preta e que possui manchas brancas nas patas. Possui dificuldades em andar devido um acidente de carro.', '(11) 11111-1111', 'Av. Águia de Haia ', 0, 1, ''),
(4, 1, 1, 'Max', 2, 'Médio', 0, 'Macho', 'Um cachorro de porte médio, juvenil, de pelagem preta com manchas brancas no queixo, no peito e na barriga.', '(11) 11111-1111', 'Av. Águia de Haia ', 0, 1, ''),
(5, 2, 2, 'Fofinha', 5, 'Pequeno', 1, 'Fêmea', 'Gata jovem, de olhos azuis, branca com manchas marrons e pretas pelo seu corpo. Precisa de cuidado especial devido a doença FeLV, a leucemia felina.', '(11) 11111-1111', 'Av. Águia de Haia ', 0, 1, ''),
(6, 1, 1, 'Marrom', 10, 'Médio', 1, 'Macho', 'Cachorro adulto, marrom de patas brancas e de olhos castanhos. Após sofrer um acidente de carro lutou bastante pela sua vida e agora procura por um lar com muito amor e carinho.', '(11) 11111-1111', 'Av. Águia de Haia ', 0, 0, 'Falta informação'),
(7, 1, 1, 'Bolinha', 12, 'Pequeno', 1, 'Fêmea', 'Cadela de pequeno porte, com 12 anos de idade, de pelagem dourada e de olhos castanhos. Sofreu abuso dos seus donos anteriores e agora procura por uma casa que lhe proporcione bastante amor e carinho.', '(11) 11111-1111', 'Av. Águia de Haia ', 1, 1, ''),
(8, 3, 3, 'Bebê', 2, 'Pequeno', 1, 'Macho', 'Calopsita jovem, amarelada e de bochechas vermelhas e muito agitada.', '(11) 11111-1111', 'Av. Águia de Haia ', 0, 1, ''),
(9, 2, 1, 'Amarela', 2, 'Pequeno', 1, 'Fêmea', 'Gata jovem e ativa, ama comer pão com leite de café da manhã e tem a cauda tortinha.', '(11) 11111-1111', 'Av. Águia de Haia ', 0, 0, ''),
(10, 1, 2, 'Belinha', 11, 'Pequeno', 1, 'Fêmea', 'Cadela de porte pequeno, apesar de ser mais velha, é super brincalhona.', '(11) 11111-1111', 'Av. Águia de Haia ', 0, 1, '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `agendamento`
--

CREATE TABLE `agendamento` (
  `CodAgendamento` int(11) NOT NULL,
  `CodFuncionario` int(11) NOT NULL,
  `CodAnimal` int(11) NOT NULL,
  `CodCliente` int(11) NOT NULL,
  `Data` date NOT NULL,
  `Hora` time NOT NULL,
  `Info` varchar(200) DEFAULT NULL,
  `Resultado` varchar(200) DEFAULT NULL,
  `CodServico` int(11) NOT NULL,
  `Cancelado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `agendamento`
--

INSERT INTO `agendamento` (`CodAgendamento`, `CodFuncionario`, `CodAnimal`, `CodCliente`,`Data`, `Hora`, `Info`, `Resultado`, `CodServico`, `Cancelado`) VALUES
(1, 1, 1, 3,'2024-10-21', '16:00:00', 'Exame Mensal Legal do cachorro fez tanana uou varias linha shikanoko nokonoko koshi tan tan', NULL, 1, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `animal`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `animal`
--

INSERT INTO `animal` (`CodAnimal`, `CodRaca`, `CodCliente`, `Nome`, `Sexo`, `DataNasc`, `DataAprox`, `Peso`, `Castrado`, `Imagem`) VALUES
(1, 1, 3, 'Fonseca', 'Macho', NULL, '2008', 8, 1, '899c2a0ad9e039fd880ea084e33e63b9f5d5c881a3412fb08416b649f576574a0f1fbb50f643f831e1fe9b7e24ee7d6ce219fda82c3e7e7f45eb9f4b.jpg'),
(2, 6, 1, 'Gatoso', 'Macho', NULL, '2018', 7, 0, 'b96a17248182eccc5556c5c06aa14cb66a6b56794f0bd2727021e01d376f37f5e796a5fbdfba13721cde25548bc2e0937aea8f9fe70a0bdca258fc19.jpg'),
(3, 11, 1, 'Uga', 'Macho', NULL, '2015', 15, 0, 'a597cd6455419c8c3a1e8f233674cfee1d4efd899baa84b23d7ed0c847de5cc7d54ca1d2d9b348122b43e5c8262ae99f5f9f87a863375c6dfdffde2d.jpg'),
(4, 7, 3, 'Kira', 'Fêmea', '2024-09-01', NULL, 2, 0, '49fa20f0f8b61899f146a94c7f7b1991ac9f9ebda64ced6979c31a9d8a2e3d4882c72ace260b460ce487a4acb38cadb8bd51d2901d5e010bc856b234.jpg'),
(5, 9, 3, 'Georgina', 'Fêmea', NULL, '2020', 6, 0, '393b3ce2b9a842e488813916db4baf9362c18aa25b81dd06a74c1e9214e4c45430004e33ba84b4eaaffd9cff8ad1cd3cd6df7bab0155fabceb18cd0b.jpg'),
(6, 8, 2, 'Louro', 'Macho', NULL, '2000', 3, 0, '242fe7a229a937ea40fad6eb4b66e3d969df4c75c78114b5059e21f5804c887d9c698dd366e0c707de7995089260a55a2449e0eaf4d4c1c140ae3340.jpg'),
(7, 10, 2, 'Let me do it', 'Fêmea', '2017-02-23', NULL, 15, 0, 'fde6f643e2c9e9cbaaf330c16221e01b0556578ee1edfe8785884da7a3ec8d36b293f12049984ec13206eb0573f2f757dd915faa8fe0b4ed007fd6bd.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cargo`
--

CREATE TABLE `cargo` (
  `CodCargo` int(11) NOT NULL,
  `Descricao` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cargo`
--

INSERT INTO `cargo` (`CodCargo`, `Descricao`) VALUES
(1, 'Neurologista'),
(2, 'Clínico'),
(3, 'Fisioterapista'),
(4, 'Cirugião');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`CodCliente`, `Nome`, `DataNasc`, `Telefone`, `CEP`, `CPF`, `Email`, `Senha`, `Token`, `Imagem`) VALUES
(1, 'Miguel Yudi Baba', '2004-04-11', '(11)91234-5678', '69093-809', '252.910.260-06', 'hatsunemikulover@gmail.com', '$2y$10$maUt5gopWT2QyGQwbvqvrOavMQLPZMvoAfZ/nwmJUf/nzDTegBUHG', '3f0569055c364c1138f8f47aa6df00bd361bbac31f8bb3532cd726bfd75c9fb680b4fdafbc657d119c9650652549967e748d', '1ca8d7315c43466b033f3e8010eb5aac93ec0747f8cbabc5f4418148f15a70f51301fad027425e4e4d39fac4ec103e62db1b2f12441d37d95285b3e8.jpg'),
(2, 'Giovanna Andrade', '2005-12-01', '(11)98765-4321', '69093-943', '558.736.462-77', 'guminum1fan@gmail.com', '$2y$10$.3zyiv01/u9T/s4RzxCZU.EGfH1GMwaMxRTISP8UEB3kcF9qT1NYG', 'e42048ccedd5cf2fbf487670f84179e906c65c0445d3fbc48cd1ce368c0373322cdc397d24ca44678796a9ddf01f75691678', '06bd2382a46bb721eb2d9e53346e14cc14f41a810efec63b87c1a1764d804d7ce6c992569ffd61277f00c23a0de4bfaf4fb205f65c3b4385d28c6fc9.jpg'),
(3, 'Amanda Farias', '2005-07-05', '(11)99767-9687', '69504-344', '979.607.567-66', 'voviikoffe@gmail.com', '$2y$10$2JorqrnxcluOX0yFTnsJkOavgHDf8aLaMSmnMdzDQ1BE9DSesq6ZO', 'ea9b94baeaba91e4cb77423d0ca23655dc6bd7da1b8680490199a7b4a2d2414ab3e39853e73e8e022af8825534219d0a0ce4', '7315de3c0089c9172ff6a3833453269dc967bed03f4ff94bd7cc16bd669ed85e5f448ba29433a1b13047b0344faa6724e17243ee1fb3d919d863bbe5.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `detalhes_adocao`
--

CREATE TABLE `detalhes_adocao` (
  `CodAdocao` int(11) NOT NULL,
  `Detalhe` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `detalhes_adocao`
--

INSERT INTO `detalhes_adocao` (`CodAdocao`, `Detalhe`) VALUES
(1, 'Vira-Lata'),
(1, 'Brincalhão'),
(1, 'Ama comer escondido'),
(1, 'Precisa de carinho'),
(2, 'Laranja'),
(2, 'Agitada'),
(2, 'Necessidades Especiais'),
(3, 'Vira-Lata'),
(3, 'Dificuldades em pular e correr'),
(3, 'Não alimentar demais'),
(3, 'Precisa de carinho'),
(4, 'Vira-Lata'),
(4, 'Brincalhão'),
(4, 'Adora abraços'),
(4, 'Pula muito'),
(5, 'Branco & Marrom'),
(5, 'Precisa de distância de outros animais'),
(5, 'Adora sache'),
(5, 'Precisa de carinho'),
(6, 'Vira-Lata'),
(6, 'Brincalhão'),
(6, 'Necessidades Especiais'),
(6, 'Precisa de carinho'),
(7, 'Vira-Lata'),
(7, 'Necessidades Especiais'),
(7, 'Gosta de Flores'),
(8, 'Calopsita'),
(8, 'Brincalhão'),
(8, 'Adora comer escondido'),
(8, 'Precisa de carinho'),
(9, 'Laranja & Branco'),
(9, 'Adora sapato'),
(9, 'Precisa de carinho'),
(10, 'Precisa de carinho');

-- --------------------------------------------------------

--
-- Estrutura para tabela `especie`
--

CREATE TABLE `especie` (
  `CodEspecie` int(11) NOT NULL,
  `Descricao` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `especie`
--

INSERT INTO `especie` (`CodEspecie`, `Descricao`) VALUES
(1, 'Canino'),
(2, 'Gato'),
(3, 'Pássaro'),
(4, 'Outro');

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionario`
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
  `Imagem` varchar(200) DEFAULT NULL,
  `DataAdmissao` date DEFAULT NULL,
  `Admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `funcionario`
--

INSERT INTO `funcionario` (`CodFuncionario`, `CodCargo`, `Senha`, `Nome`, `RG`, `CPF`, `Telefone`, `CEP`, `CodUnidade`, `Token`, `Imagem`, `DataAdmissao`, `Admin`) VALUES
(1, 1, '$2y$10$1xGy5hDzqYwYgJ/QuxEm1.rXLAHJHLOpu0TsRmMCMy8dGGbOtHNAC', 'Bernardo Vieira', '28.407.303-9', '343.243.242-34', '(43)24324-2343', '43242-343', 1, '79750b1f574c211863ee7abd284823d67d024b681fc4e148dfa9a067e8f39e5436d44f9e30f76f5468cc37d929235eefcdd3', '0ced47bb60892e9d94cbb0672da56cf7dbeb9df979fac7db103cac37f3bbc905ce2a36ed9a7f5812b0ce11545b992d012d7e199be81f87199d366b2e.jpg', '2018-04-11', '0'),
(2, 3, '$2y$10$qV5DDHbg71bpwzlupW8px.5WIqIQnH1eGcfl/vZdjLlyBIu.Dmxxy', 'Beatriz Silva', '32.321.900-7', '435.435.345-34', '(32)23423-4324', '54354-354', 2, '196ab39fcf61c66855c3ff7bc0ef96c60cd9903d561152f218834944dfb1611a82a5acece27de59f7896ed225299f52c39a2', 'f4f7fa2bc1692741c240e7876a9efa235eb25ebb1fe57821eb0738fbda79bcaed40c6aeb202e1353aa773a1f683535c38c3ab04bf164da3b5ba894b3.jpg', '2021-01-28', '0'),
(3, 2, '$2y$10$TevL319S70MSocMQFMScgesRurqFehI.NFBKDXAe38RTTp1biLmJO', 'Carlos Henrique', '20.660.013-6', '829.472.660-56', '(98) 92779-1950', '81256-183', 3, '7ee5a502ff6eecdf3be1fa051c21393e3769ca7326f2d72d2f6981db00df0e748dc2816f3d6c931fc2c9a3e035866da7c12c', '0c2af29f3a1f94a7bbd7f805dc704630992924c1f0d294d6a5e69a99572fa3a2043544a9b0d8e018d128b122e2ec9c1130fbe5e4f351657ccc1b5431.jpg', '2016-07-16', '1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `imagem_adocao`
--

CREATE TABLE `imagem_adocao` (
  `CodAdocao` int(11) NOT NULL,
  `Imagem` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `imagem_adocao`
--

INSERT INTO `imagem_adocao` (`CodAdocao`, `Imagem`) VALUES
(1, '142ca4bbf8a3a4843a6d1ecce3863b3e3e7d1e339765959e1efc235bdaba8ca40dec420257db21e06dafe468abaa7720e856ba555c893d5629c075d1.jpg'),
(1, '0f15590f44d14bc614909a2f3b9fcdad94f0c7be40e1a94ac1ad7e13a6544807b729fd5186a2d6ce25cea071683b21f234738ec03c76a6a58c0cdfe9.jpg'),
(1, '228db783c3f23a72046a5b0dc1b23dd1e3601aa5a47850ea31743c5d078895ba5006df966b18d611d6d5d00d9fcc8a4e2ce226a11824bc603afc0e37.jpg'),
(1, 'a33c90738c607ed4c70ab34f98b2eafa422111e8838d18dfa240c47367e0abb03c33cf02902b7c6266ab87ce1ee46d9578dafa74e19d80ec072de445.jpg'),
(1, 'aeb281858333162c4649c69d79e6a1d07d9eeab828b73a4c12f651d04ad451ff5d60300e35ff494cd391487fce246589964d7fd18e60e4a869f7e83d.jpg'),
(2, '18c13ca6de1f08375dc67c7e3616765e75e91899d5e67a0792a5bea92a35e4591a00e7e5e63d2729fa02a502e85b6d4cdcc32acbcaa673d3dbeb15c8.jpg'),
(2, '4667fbeda7be678b65c255569c172a6cbc789b87c52169743fdf6635766283ef60702903c6639ff2bcceaaa7aa8df94bca105a8b7d5d0f43999f4574.jpg'),
(2, 'd01c1b12873ed496367673fafbf074a89ff363fccdc10ec6373198f29a0191364325410b68f8b9175da3febc6e0f50706d6eab6af93c382e76d06418.jpg'),
(2, '1a5e4a27651c1a27ef2fd1388db2cd8f77b632257299e0c2a1dbbb5664dd019643784c98b7601903d36d342b9c26c02e2d114ac206a06ac278849ff4.jpg'),
(2, 'd6b51d7b559cb64662bc512f6d263d5fa7340d66478504d9dacd233495f7e0daaa31248b34a210e3e4703f66d36a016dd3e6b3723ffd873ba1909cc6.jpg'),
(3, '8d741e1d7bfd89ee151a1294691d2795ad84e0d9988457c399805d305c7dc14a66c35ce6257aac49a16e2333c6b21d258ae8841b108958e3bef2078b.jpg'),
(3, '9dbfcb8ecf5e1cd35294c886aff604763c6a57d465a62a42eda4657497cd7ebc38b148d54eced2999dff285c1a7f205e124edb4092b29d266654d129.jpg'),
(3, 'a1c1c940aff6ac1fdca96d7451c50fb9eeb7cad494ba0a6991167b97d83b8d1318a365f3ab71c8d7b086a2524bd3f5332ddff4954694a6e0dc9382ec.jpg'),
(3, 'd9026575c86d4aafad9d883fcd9dcba188ef90c101bc9e2c5e818a47cc245b9f4ccfb1cc3da1f77bf355610fc036bce987772df9f26b04f8e41d6e99.jpg'),
(3, '79328c889a636edfb70f1ec5b93afd970b87c9eb51b0960c04f14d3c78a669551c70ba371c65bbb4bf8849f40565cc2e8b39b9cb13914680824a4e37.jpg'),
(4, 'b9386bee4896446ee163f7e80779842ceae53d1caf71c9a103bdac66cc8bd1540a6d4499b5e1f36d352fcb759c014ed6663c1100f6eddcd7091858de.jpg'),
(4, 'fc93210f043db3623585dba6cdda533cf3ca8ef038665ac21ac8420714c13ee728f680a5007805f1fce0db62f2a79ff742c71dfd3ed4a62042f0ee4d.jpg'),
(4, '57701f4d97207c1b4052f6c6c62674c53abcef2ff454c124385581a70a526983676a83971b5177c85515ed5c073730c84e9104f47ab04f3cd3705aaf.jpg'),
(4, '405ab92f0fa8e885095c538b5e1c8c02a771674fa7138e8b3f5ecfaac16c7f5556440d2e58ecb721f3550b841395f1776cc632286cacfbfb871bd4c1.jpg'),
(4, '8562bba89a4bcd98b63bdee18e7d5c1dc502a5e00f0cf96c88cc3d4d41118689fb683e952ea65572f4118008147aa04def0f203b6860b65624969e30.jpg'),
(5, '37d3c8a8d4dcf0a77ded3b11be49038635016d45ca0f9b213033348b77b3525ef512b48192e3d82a5f4c7a75a60c035199d80c8f7708844b41a173e9.jpg'),
(5, 'c94f6e11a9a3b7c3b5dd3b874c637c6ed499103e3c5bdb9ca8fa8ec9152a193cc5e82893353a7c044707f410f722e7e4e1e51aade58c3ef33a713366.jpg'),
(5, '939668372b8f73c69626e6d3a0cdff2bb010e6c902aa7953b972f23979a38660bd407af890b1904866a6ae65288722a8d980f5f1dc607291923d1283.jpg'),
(5, 'e975da67f34080f4d2319780fca4a78cff331b95f20fed6973dbe6b69aca325b4e1129d5300fcf377e58e0c9859c3589b87a4f364309be2c175b9195.jpg'),
(5, '9db1d1d992b917c3a572b640aa500d7685552f6a8d56eebae2783a3e136ade36dfa8aaae9da0a36809ac38ba0046f0bb9a469526579c10a9ba1d4b62.jpg'),
(6, 'cee01bf49032d9230b25c1e8b4d7b77b3e20e7a023cb5504adfda037577bc2889c1544ffaca5cec3a34d9251a03735c1dfa16598a420f9fa7ef87448.jpg'),
(6, 'cd5f04ea3703302ac9a5acb74905b49b98261d99fc1106043994dc381273af9ef9febd5bb2f2ea7b29bb32213fde5e780b0390c5ce8cc553203934aa.jpg'),
(6, 'c69cae9c00987be2ef58c0c4df187fe35d5bdd8426d3f06b8c56a1f11ac5b18082f9adf364797a41e7278e6ef08934ea5d6a1d576cc46d65e3716587.jpg'),
(6, '9b2583c780f5905fc36befe1911d039a88c522d20dc645517bb60c2c63b5c7b6087219261f6fa784da2f18edd821f434b8b1394373976ab627790a68.jpg'),
(6, '8ab11ac81edaebb70cfa1c0fafac9cdac841ab535bbe0ac1e41ede114c944754b148033509e7d0d25e06376698d9ed2dac4c506767f127f5e992ba50.jpg'),
(7, '4595c65a660a58e29ce650db9dd733200e63c002ea4aec839d649827c5ac57fea50fdb0dd835d7e341f8411b08e95c3085b279447cedcfa4103c4b68.jpg'),
(7, 'ec47b11de899153c2d0caf1812971d4aa875e367006d646f9a56d5b74f9b1893a667da4e14f61e9ac8b9790618f56bb9fe69166c359454dfb6442d9a.jpg'),
(7, 'c7680b92821574605e0d17bec164734d12bf5b031e4d352ed68e648445e0528a65c992e8729228138ad53bc657384e736e8647cead103da9483ee9af.jpg'),
(7, '18a5e4c1bfe1f7ffe776714cf2644c3b5d4c2a801d8cfddf5f541906d7e0a16e0c3777c4b3f9e05f70b3aaf884153a311c7b7ce20e01ecf3cd6ab383.jpg'),
(7, '3befbdb4a98118863a015e994e8ea36d3ece958cf4993792095aa21ee0318a17e79c460a6f7b6c361d18dfe8efb8e271da0a9746afc9317489db32db.jpg'),
(8, 'd04e6e0ae7083b14393e743364908f6ed378e88588d7c9938bd7d35555a8d0114cb3dfa49b13fc4523f9ef8be947154867cb652ae808fbbcdcbd7227.jpg'),
(8, '8f4f17287c5ce91d2e10474d7ec8cba0a38757896aab3bb933eecd5f93e002530bfc7681a3f7e2316de1069107a8c7a17de4c698c151dffe23bf275e.jpg'),
(8, '9f985f653ed8814c44b3dde8ed255d5aaf4151ae8d5b8eaafff470678bedcde7638d5d22dbea722509b44fc276a4647f0d52778a9aefb587b244f901.jpg'),
(8, 'ba4f694d7e65fae3782f43f11804f25e80efe178e77edec5ea67107ea3587a1b4cce2aefceb16bc079bd88a78d1e9e52dbab8731735e3479dc5fdfa2.jpg'),
(8, '436cc4a56fd1ff1b3b7ddf521b992bcb15653ee0157cac8e06df9aa27f2acdd0920c7bd64747432efb23ca16e7b99fbbee27d0c460f97077d6665d77.jpg'),
(9, '3c2d766f99a648aa1b81de4975053de9e5a31fdef0a0826dd421faa90543b9281beddf62f2e08d47331bc27183467742e7dfa5e7b15fecc7029e2362.jpg'),
(9, '39d16db3ef850b61c11a3231023a2e10558785edc3217ea29b9b7fc99eccc117c308c835f3e21bc42f685a86945fc6a6c590e921836f5639c2c1ebd1.jpg'),
(9, '6f8136fb5f19a59437a80874182d233e293d0a503610f54602818ceb0c3210538e05d8590f7db512790a005f0daa1e569c2e6559067b2f47a3bf57cc.jpg'),
(9, 'd14b140ca86bef382801975a26d976bc90c32604ed1165ea28ef5fca6e823a23e5ab280b5af577f3f817468085b681e716044761b45c01c0f0ad8a80.jpg'),
(9, '3306b06009000f8a67edb151c757f7662e7f9721860e12d4c16208359d619ffd83a35738407a54f6e5337cca4ad1ab52557c37acda9824b823bb7b2b.jpg'),
(10, '36add5d8725292a5d5142b7eebd10eb23a45c89588653321e2a39a8bb80c4e34cffd93ee32cde7302d50df35bac0450c163248f673f4f1b87aab10cd.jpg'),
(10, '65e605f9a2e9b1179e3d3bcfc5bb7dd981a8e692b075366af35c57d493c1f979d80772f676e4f79bec6c5893fec84bd4efaf46ff399c2d6b9591bbed.jpg'),
(10, '65e46ff1508dbf0ed2c454b377852a14ea759c084b5cfaed8ba9cc308228094104d537551c7e824e93adbb961a2f8f6ff12a12c1961a7d04f74f8440.jpg'),
(10, 'e334da6404238fc2a8b05272b199921a8f4f8fd8d65a00e17a0abbd629884993fcff826c84a73c61ef0de7d5a60b3f8056d5ae7b8d7e0b793fc961c4.jpg'),
(10, '5a89d6b3d4e56a0932cfa509aaa07f67c75715b6c2dcd3d8720187a34d99887c31361f01007e44ed632a450e405213559a8bef518ab2895558432824.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `raca`
--

CREATE TABLE `raca` (
  `CodRaca` int(11) NOT NULL,
  `CodEspecie` int(11) NOT NULL,
  `Descricao` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `raca`
--

INSERT INTO `raca` (`CodRaca`, `CodEspecie`, `Descricao`) VALUES
(1, 1, 'Vira-Lata'),
(2, 1, 'Border Collie'),
(3, 1, 'Lhasa Apso'),
(4, 1, 'Pastor Alemão'),
(5, 3, 'Calopsita'),
(6, 2, 'Vira-Lata'),
(7, 1, 'Chihuahua'),
(8, 3, 'Outro'),
(9, 2, 'Outro'),
(10, 1, 'Outro'),
(11, 4, 'Outro');

-- --------------------------------------------------------

--
-- Estrutura para tabela `servico`
--

CREATE TABLE `servico` (
  `CodServico` int(11) NOT NULL,
  `Descricao` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `servico`
--

INSERT INTO `servico` (`CodServico`, `Descricao`) VALUES
(1, 'Atendimento Veterinário'),
(2, 'Cirurgias & Procedimentos'),
(3, 'Vacinação');

-- --------------------------------------------------------

--
-- Estrutura para tabela `unidade`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `unidade`
--

INSERT INTO `unidade` (`CodUnidade`, `Nome`, `Endereco`, `Bairro`, `Telefone`, `HorarioInicial`, `HorarioFinal`, `Link`) VALUES
(1, 'Inclusipet - Guarulhos', 'R. Conceição da Feira', 'Jardim pres. dutra - SP', '(11) 11111-1111', '08:00:00', '21:00:00', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3660.9433340295095!2d-46.433593725612525!3d-23.426414056646507!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce89f1b8bcf965%3A0xff24a059d917838b!2sR.%20Concei%C3%A7%C3%A3o%20da%20Feira%20-%20Jardim%20Pres.%20Dutra%2C%20Guarulhos%20-%20SP%2C%2007173-010!5e0!3m2!1spt-BR!2sbr!4v1697764260412!5m2!1spt-BR!2sbr'),
(2, 'Inclusipet - Vila Cisper', 'R. Cícero Dantas', 'Vila Cisper - SP', '(11) 22222-2222', '08:00:00', '18:00:00', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3658.9811661599797!2d-46.497951325609456!3d-23.497187859235876!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce605e5a1481e3%3A0xb0cd6094d2133515!2sR.%20C%C3%ADcero%20Dantas%20-%20Ermelino%20Matarazzo%2C%20S%C3%A3o%20Paulo%20-%20SP%2C%2003818-130!5e0!3m2!1spt-BR!2sbr!4v1697773935746!5m2!1spt-BR!2sbr'),
(3, 'Inclusipet - Artur Alvim', 'Av. Líder', 'Artur Alvim - SP', '(11) 33333-3333', '10:00:00', '18:00:00', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.369311320792!2d-46.47061682560695!3d-23.555176061363234!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce66e1dbe1105b%3A0xb388139f5d5c5750!2sAv.%20L%C3%ADder%20-%20Artur%20Alvim%2C%20S%C3%A3o%20Paulo%20-%20SP!5e0!3m2!1spt-BR!2sbr!4v1697774090354!5m2!1spt-BR!2sbr');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `adocao`
--
ALTER TABLE `adocao`
  ADD PRIMARY KEY (`CodAdocao`),
  ADD KEY `CodClienteAdocao` (`CodCliente`),
  ADD KEY `CodEspecieAdocao` (`CodEspecie`);

--
-- Índices de tabela `agendamento`
--
ALTER TABLE `agendamento`
  ADD PRIMARY KEY (`CodAgendamento`),
  ADD KEY `CodAnimalAgendamento` (`CodAnimal`),
  ADD KEY `CodClienteAgendamento` (`CodCliente`),
  ADD KEY `CodFuncionarioAgendamento` (`CodFuncionario`),
  ADD KEY `CodServicoAgendamento` (`CodServico`);

--
-- Índices de tabela `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`CodAnimal`),
  ADD KEY `CodRacaAnimal` (`CodRaca`),
  ADD KEY `CodClienteAnimal` (`CodCliente`);

--
-- Índices de tabela `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`CodCargo`);

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`CodCliente`),
  ADD UNIQUE KEY `CPF` (`CPF`);

--
-- Índices de tabela `detalhes_adocao`
--
ALTER TABLE `detalhes_adocao`
  ADD KEY `CodAdocaoDetalhes` (`CodAdocao`);

--
-- Índices de tabela `especie`
--
ALTER TABLE `especie`
  ADD PRIMARY KEY (`CodEspecie`);

--
-- Índices de tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`CodFuncionario`),
  ADD UNIQUE KEY `RG` (`RG`),
  ADD UNIQUE KEY `CPF` (`CPF`),
  ADD KEY `CodCargoFuncionario` (`CodCargo`),
  ADD KEY `CodUnidadeFuncionario` (`CodUnidade`);

--
-- Índices de tabela `imagem_adocao`
--
ALTER TABLE `imagem_adocao`
  ADD KEY `CodAdocaoImagem` (`CodAdocao`);

--
-- Índices de tabela `raca`
--
ALTER TABLE `raca`
  ADD PRIMARY KEY (`CodRaca`),
  ADD KEY `CodEspecieRaca` (`CodEspecie`);

--
-- Índices de tabela `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`CodServico`);

--
-- Índices de tabela `unidade`
--
ALTER TABLE `unidade`
  ADD PRIMARY KEY (`CodUnidade`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `adocao`
--
ALTER TABLE `adocao`
  MODIFY `CodAdocao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `agendamento`
--
ALTER TABLE `agendamento`
  MODIFY `CodAgendamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `animal`
--
ALTER TABLE `animal`
  MODIFY `CodAnimal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `CodEspecie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `CodFuncionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `raca`
--
ALTER TABLE `raca`
  MODIFY `CodRaca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `adocao`
--
ALTER TABLE `adocao`
  ADD CONSTRAINT `CodClienteAdocao` FOREIGN KEY (`CodCliente`) REFERENCES `cliente` (`CodCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `CodEspecieAdocao` FOREIGN KEY (`CodEspecie`) REFERENCES `especie` (`CodEspecie`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `agendamento`
--
ALTER TABLE `agendamento`
  ADD CONSTRAINT `CodAnimalAgendamento` FOREIGN KEY (`CodAnimal`) REFERENCES `animal` (`CodAnimal`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `CodClienteAgendamento` FOREIGN KEY (`CodCliente`) REFERENCES `cliente` (`CodCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `CodFuncionarioAgendamento` FOREIGN KEY (`CodFuncionario`) REFERENCES `funcionario` (`CodFuncionario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `CodServicoAgendamento` FOREIGN KEY (`CodServico`) REFERENCES `servico` (`CodServico`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `CodClienteAnimal` FOREIGN KEY (`CodCliente`) REFERENCES `cliente` (`CodCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `CodRacaAnimal` FOREIGN KEY (`CodRaca`) REFERENCES `raca` (`CodRaca`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `CodCargoFuncionario` FOREIGN KEY (`CodCargo`) REFERENCES `cargo` (`CodCargo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `CodUnidadeFuncionario` FOREIGN KEY (`CodUnidade`) REFERENCES `unidade` (`CodUnidade`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `imagem_adocao`
--
ALTER TABLE `imagem_adocao`
  ADD CONSTRAINT `CodAdocaoImagem` FOREIGN KEY (`CodAdocao`) REFERENCES `adocao` (`CodAdocao`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `raca`
--
ALTER TABLE `raca`
  ADD CONSTRAINT `CodEspecieRaca` FOREIGN KEY (`CodEspecie`) REFERENCES `especie` (`CodEspecie`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
