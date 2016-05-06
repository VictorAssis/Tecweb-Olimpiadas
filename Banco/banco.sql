-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 07-Maio-2016 às 01:11
-- Versão do servidor: 10.1.10-MariaDB
-- PHP Version: 5.5.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `olimpiadas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `compras`
--

CREATE TABLE `compras` (
  `id` int(11) UNSIGNED NOT NULL,
  `usuarios_id` int(11) UNSIGNED NOT NULL,
  `eventos_id` int(11) UNSIGNED NOT NULL,
  `modified` datetime NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `compras`
--

INSERT INTO `compras` (`id`, `usuarios_id`, `eventos_id`, `modified`, `created`) VALUES
(1, 2, 1, '2016-05-03 08:28:25', '2016-05-03 08:28:25'),
(2, 2, 3, '2016-05-03 15:44:04', '2016-05-03 15:44:04'),
(3, 2, 3, '2016-05-03 15:44:13', '2016-05-03 15:44:13'),
(4, 2, 1, '2016-05-03 16:03:21', '2016-05-03 16:03:21'),
(5, 2, 1, '2016-05-03 16:07:01', '2016-05-03 16:07:01'),
(6, 2, 1, '2016-05-03 16:07:07', '2016-05-03 16:07:07');

-- --------------------------------------------------------

--
-- Estrutura da tabela `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) UNSIGNED NOT NULL,
  `locais_id` int(11) UNSIGNED NOT NULL,
  `modalidades_id` int(11) UNSIGNED NOT NULL,
  `data` datetime NOT NULL,
  `descricao` text NOT NULL,
  `preco` double UNSIGNED NOT NULL,
  `modified` datetime NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `eventos`
--

INSERT INTO `eventos` (`id`, `locais_id`, `modalidades_id`, `data`, `descricao`, `preco`, `modified`, `created`) VALUES
(1, 2, 1, '2016-08-05 11:00:00', 'Masculino', 40, '2016-05-07 00:17:15', '2016-05-03 06:40:06'),
(3, 2, 1, '2016-08-05 13:00:00', 'Feminino', 60, '2016-05-07 00:17:27', '2016-05-03 15:43:44'),
(4, 1, 2, '2016-08-06 09:00:00', 'Masculino', 100, '2016-05-07 00:17:47', '2016-05-07 00:17:03'),
(5, 3, 2, '2016-08-06 13:00:00', 'Feminino', 100, '2016-05-07 00:18:15', '2016-05-07 00:18:15'),
(6, 3, 3, '2016-08-07 09:00:00', 'Feminino', 30, '2016-05-07 00:18:49', '2016-05-07 00:18:49'),
(7, 4, 3, '2016-08-07 11:00:00', 'Masculino', 30, '2016-05-07 00:19:25', '2016-05-07 00:19:11'),
(8, 4, 4, '2016-08-08 11:00:00', 'Masculino', 60, '2016-05-07 00:19:57', '2016-05-07 00:19:57'),
(9, 2, 4, '2016-08-08 14:00:00', 'Masculino', 60, '2016-05-07 00:20:24', '2016-05-07 00:20:24');

-- --------------------------------------------------------

--
-- Estrutura da tabela `locais`
--

CREATE TABLE `locais` (
  `id` int(11) UNSIGNED NOT NULL,
  `nome` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `modified` datetime NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `locais`
--

INSERT INTO `locais` (`id`, `nome`, `foto`, `descricao`, `modified`, `created`) VALUES
(1, 'Belo Horizonte', 'belo-horizonte.jpg', '<p>Belo Horizonte &eacute; um munic&iacute;pio brasileiro e a capital do estado de Minas Gerais. Pertence &agrave; Mesorregi&atilde;o Metropolitana de Belo Horizonte e &agrave; Microrregi&atilde;o de Belo Horizonte.</p>', '2016-05-07 00:05:13', '2016-05-03 00:00:00'),
(2, 'Barra da Tijuca', 'barra.jpg', '<p>Barra da Tijuca &eacute; um bairro nobre na Zona Oeste do munic&iacute;pio do Rio de Janeiro, no Brasil. O bairro faz parte da Regi&atilde;o Administrativa da Barra da Tijuca.</p>', '2016-05-07 00:04:54', '2016-05-07 00:04:54'),
(3, 'Copacabana', 'copacabana.jpg', '<p>Copacabana &eacute; um bairro nobre situado na Zona Sul da cidade do Rio de Janeiro, no Brasil. &Eacute; considerado um dos bairros mais famosos e prestigiados do Brasil e um dos mais conhecidos do mundo. Tem o apelido de Princesinha do Mar e Cora&ccedil;&atilde;o da Zona Sul.</p>', '2016-05-07 00:06:04', '2016-05-07 00:06:04'),
(4, 'Deodoro', 'deodoro.jpg', '<p>Deodoro &eacute; um bairro de classe m&eacute;dia da regi&atilde;o do Realengo, Zona Oeste do Rio de Janeiro. Faz limite com os bairros Vila Militar, Campo dos Afonsos, Marechal Hermes, Guadalupe e Ricardo de Albuquerque.</p>', '2016-05-07 00:06:46', '2016-05-07 00:06:46');

-- --------------------------------------------------------

--
-- Estrutura da tabela `locais_atracoes`
--

CREATE TABLE `locais_atracoes` (
  `id` int(10) UNSIGNED NOT NULL,
  `locais_id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `foto` varchar(100) NOT NULL,
  `link` varchar(255) NOT NULL,
  `tipo` tinyint(3) UNSIGNED NOT NULL,
  `modified` datetime NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `locais_atracoes`
--

INSERT INTO `locais_atracoes` (`id`, `locais_id`, `nome`, `descricao`, `foto`, `link`, `tipo`, `modified`, `created`) VALUES
(1, 1, 'Stadt Jever', 'Bar acolhedor para 200 pessoas tem balcão, cervejas e pratos alemães, música de jukebox e 1 mesa de taberna.', 'stadt-jever.jpg', 'https://www.facebook.com/JeverPub/', 0, '2016-05-06 00:00:00', '2016-05-06 00:00:00'),
(2, 1, 'Museu de Ciências Naturais', 'O Museu de Ciências Naturais da Pontifícia Universidade Católica de Minas Gerais é um museu brasileiro de ciências naturais, que por meio de exposições, educação e pesquisa, preserva o patrimônio natural, histórico e cultural do Brasil.', 'museu.jpg', 'http://www.pucminas.br/museu/index_padrao.php', 1, '2016-05-06 00:00:00', '2016-05-06 00:00:00'),
(3, 1, 'Parque Municipal', 'O Parque Municipal Américo Renné Giannetti, com 182.000 m², de área cercada e com guaritas em todas as entradas, é o principal parque de Belo Horizonte.', 'parque.jpg', 'http://portalpbh.pbh.gov.br/pbh/ecp/comunidade.do?evento=portlet&app=fundacaoparque&pg=5521&tax=15256', 2, '2016-05-06 00:00:00', '2016-05-06 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `modalidades`
--

CREATE TABLE `modalidades` (
  `id` int(11) UNSIGNED NOT NULL,
  `nome` varchar(100) NOT NULL,
  `foto_destaque` varchar(100) NOT NULL,
  `foto_lista` varchar(100) NOT NULL,
  `finalidade` text NOT NULL,
  `provas` text NOT NULL,
  `estreia` varchar(255) NOT NULL,
  `regras` text NOT NULL,
  `modified` datetime NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `modalidades`
--

INSERT INTO `modalidades` (`id`, `nome`, `foto_destaque`, `foto_lista`, `finalidade`, `provas`, `estreia`, `regras`, `modified`, `created`) VALUES
(1, 'VÃ´lei de praia', 'volei-praia-destaque.jpg', 'volei-praia-lista.png', 'Em uma quadra de areia dividida por uma rede, duas duplas se enfrentam, com o objetivo de fazer com que a bola toque a quadra do adversÃ¡rio.', '<ul>\r\n<li>Masculino</li>\r\n<li>Feminino</li>\r\n</ul>', 'ATLANTA 1996', '<h2>PONTUA&Ccedil;&Atilde;O</h2>\r\n<p>Cada partida &eacute; disputada em melhor de tr&ecirc;s sets e uma dupla conquista a vit&oacute;ria quando vence dois deles. Os dois primeiros sets s&atilde;o fechados em 21 pontos e o terceiro, quando necess&aacute;rio, em 15, sempre com diferen&ccedil;a m&iacute;nima de dois pontos.&nbsp;</p>\r\n<p>Os pontos s&atilde;o marcados cada vez que uma dupla acerta a bola na quadra do advers&aacute;rio ou quando os rivais n&atilde;o conseguem devolver a bola, cometem uma falta ou s&atilde;o penalizados pelo &aacute;rbitro.</p>\r\n<p>&nbsp;</p>\r\n<h2>AS DUPLAS</h2>\r\n<p>As equipes s&atilde;o formadas por dois jogadores e n&atilde;o contam com reservas. Cada dupla pode tocar at&eacute; tr&ecirc;s vezes consecutivas na bola e o bloqueio &eacute; v&aacute;lido como um toque.</p>\r\n<p>&nbsp;</p>\r\n<h2>POSI&Ccedil;&Atilde;O EM QUADRA</h2>\r\n<p>Os jogadores se alternam no saque, que pode ser efetuado de qualquer posi&ccedil;&atilde;o da zona de saque, no fundo da quadra. Um dos jogadores da equipe que saca faz o bloqueio na rede. Os jogadores podem se colocar em qualquer posi&ccedil;&atilde;o da sua quadra para receber o saque advers&aacute;rio.</p>\r\n<p>&nbsp;</p>\r\n<h2>ARBITRAGEM</h2>\r\n<p>O primeiro &aacute;rbitro, que se posiciona em uma cadeira elevada, &eacute; quem comanda a arbitragem e tem poder de decis&atilde;o sobre todas as quest&otilde;es que envolvem o jogo.</p>\r\n<p>&nbsp;</p>\r\n<h2>EQUIPAMENTOS</h2>\r\n<p>Bola: tem entre 66 e 68cm de circunfer&ecirc;ncia e pesa at&eacute; 280g.</p>\r\n<p>Rede: tem 2,43m de altura nas competi&ccedil;&otilde;es masculinas e 2,24m nas partidas femininas.</p>', '2016-05-06 23:30:57', '2016-05-03 00:00:00'),
(2, 'Futebol', 'futebol-destaque.jpg', 'futebol-lista.png', 'Dois times com 11 jogadores cada devem conduzir a bola com os pÃ©s, em um campo gramado, com o objetivo de acertar o gol adversÃ¡rio e defender seu prÃ³prio.', '<ul>\r\n<li>Masculino</li>\r\n<li>Feminino</li>\r\n</ul>', 'PARIS 1900', '<h2>O TORNEIO</h2>\r\n<p>Cada jogo rende tr&ecirc;s pontos ao time vencedor e nenhum para o perdedor. Em caso de empate, as duas equipes somam um ponto cada.</p>\r\n<p>O campeonato Ol&iacute;mpico masculino &eacute; disputado por jogadores de at&eacute; 23 anos, sendo permitido tr&ecirc;s acima desta idade por sele&ccedil;&atilde;o. No feminino, n&atilde;o h&aacute; restri&ccedil;&otilde;es de idade.</p>\r\n<p>&nbsp;</p>\r\n<h2>DURA&Ccedil;&Atilde;O</h2>\r\n<p>As partidas acontecem em dois tempos de 45 minutos cada, al&eacute;m do tempo extra acrescido pelo &aacute;rbitro. Se um jogo da fase eliminat&oacute;ria terminar empatado, s&atilde;o jogados 30 minutos de prorroga&ccedil;&atilde;o. Caso o empate persista, o vencedor ser&aacute; determinado na cobran&ccedil;a de p&ecirc;naltis.</p>\r\n<p>&nbsp;</p>\r\n<h2>JOGADORES</h2>\r\n<p>Goleiro: normalmente alto e &aacute;gil, &eacute; o &uacute;nico que pode tocar a bola com as m&atilde;os.</p>\r\n<p>Zagueiro: tem a tarefa de impedir o time advers&aacute;rio de marcar.</p>\r\n<p>Lateral: normalmente s&atilde;o dois em cada time e cada um atua em seu lado do gramado por toda a extens&atilde;o do campo, ajudando na defesa e apoiando o ataque.</p>\r\n<p>Meia: no meio-campo, as fun&ccedil;&otilde;es variam. Os jogadores podem ajudar na cobertura da defesa, atuar pelos lados do campo e criar jogadas ofensivas.</p>\r\n<p>Atacante: nesta posi&ccedil;&atilde;o, os jogadores t&ecirc;m perfil variado, desde altos e fortes a pequenos e velozes. Seja qual for o estilo, a miss&atilde;o &eacute; uma s&oacute;: balan&ccedil;ar a rede!</p>\r\n<p>&nbsp;</p>\r\n<h2>ARBITRAGEM</h2>\r\n<p>&Aacute;rbitro principal: assegura o cumprimento das regras no jogo e conta com um apito para iniciar a partida e interromp&ecirc;-la quando necess&aacute;rio. Tamb&eacute;m pode controlar o jogo mostrando o cart&atilde;o amarelo (advert&ecirc;ncia) e vermelho (expuls&atilde;o) aos jogadores.</p>\r\n<p>&Aacute;rbitro auxiliar: conhecido como "bandeirinha", ele ajuda o &aacute;rbitro a cumprir as regras, particularmente o impedimento, levantando sua bandeira para sinalizar a infra&ccedil;&atilde;o.</p>\r\n<p>&nbsp;</p>\r\n<h2>A BOLA</h2>\r\n<p>Tem circunfer&ecirc;ncia que vai de 68cm a 70cm e seu peso varia entre 410g e 450g.</p>', '2016-05-06 23:44:18', '2016-05-03 00:00:00'),
(3, 'Voleibol', 'volei-destaque.jpg', 'volei-lista.png', 'Duas equipes de seis jogadores cada, separadas por uma rede, tÃªm como objetivo somar pontos acertando a bola no chÃ£o da quadra do adversÃ¡rio.', '<ul>\r\n<li>Masculino</li>\r\n<li>Feminino</li>\r\n</ul>', 'TÃ“QUIO 1964', '<h2>PONTUA&Ccedil;&Atilde;O</h2>\r\n<p>O jogo &eacute; disputado em melhor de 5 sets. &nbsp;Os quatro primeiros sets terminam em 25 pontos e o quinto, quando necess&aacute;rio, vai at&eacute; 15 pontos, sendo que &eacute; preciso uma diferen&ccedil;a de pelo menos dois pontos para o encerramento de cada set.</p>\r\n<p>&nbsp;</p>\r\n<h2>SAQUE</h2>\r\n<p>O saque pode ser realizado em toda a extens&atilde;o do fundo da quadra, dentro dos limites laterais. O time pode tocar 3 vezes seguidas na bola antes de lan&ccedil;&aacute;-la para o outro lado da rede.</p>\r\n<p>&nbsp;</p>\r\n<h2>POSI&Ccedil;&Atilde;O EM QUADRA</h2>\r\n<p>Cada vez que uma equipe marca um ponto ap&oacute;s receber o saque advers&aacute;rio, seus jogadores mudam de posi&ccedil;&atilde;o na quadra, movendo-se em sentido hor&aacute;rio.</p>\r\n<p>A linha de tr&ecirc;s metros separa a zona de defesa, no fundo da quadra, da zona de ataque, pr&oacute;xima &agrave; rede.</p>\r\n<p>Os l&iacute;beros usam uniformes de cores diferentes dos outros jogadores e t&ecirc;m atua&ccedil;&atilde;o restrita &agrave; zona de defesa. Com fun&ccedil;&atilde;o apenas defensiva, n&atilde;o podem realizar a&ccedil;&otilde;es de ataque.</p>\r\n<p>&nbsp;</p>\r\n<h2>EQUIPAMENTOS</h2>\r\n<p>Bola: tem entre 65 e 67cm de circunfer&ecirc;ncia e pesa entre 260 e 280g.</p>\r\n<p>Rede: tem 2,43m de altura nas competi&ccedil;&otilde;es masculinas e 2,24m nas partidas femininas.</p>', '2016-05-06 23:49:01', '2016-05-06 23:49:01'),
(4, 'GinÃ¡stica ArtÃ­stica', 'ginastica-destaque.jpg', 'ginastica-lista.png', 'ForÃ§a, equilÃ­brio, flexibilidade... os ginastas devem realizar apresentaÃ§Ãµes em diferentes aparelhos, como barras e trave, assim como saltos e exercÃ­cios de solo, com o menor nÃºmero de erros.', '<ul>\r\n<li>Masculino</li>\r\n<li>Feminino</li>\r\n</ul>', 'ATENAS 1896', '<h2>AS DISPUTAS</h2>\r\n<p>H&aacute; seis aparelhos no masculino e quatro no feminino:</p>\r\n<p>- Barras assim&eacute;tricas e barra de equil&iacute;brio s&atilde;o exclusividades das mulheres</p>\r\n<p>- Barra fixa, barras paralelas, cavalo com al&ccedil;as e argolas se restringem aos homens</p>\r\n<p>- Solo e salto est&atilde;o, por sua vez, no programa de ambas as disputas</p>\r\n<p>As medalhas s&atilde;o distribu&iacute;das em provas individuais, em que o participante compete em todos os aparelhos, por equipes e para cada aparelho.</p>\r\n<p>&nbsp;</p>\r\n<h2>PONTUA&Ccedil;&Atilde;O</h2>\r\n<p>A pontua&ccedil;&atilde;o &eacute; dada por uma banca com nove &aacute;rbitros, que avalia o grau de dificuldade e a qualidade t&eacute;cnica dos movimentos executados em cada prova.</p>\r\n<p>&nbsp;</p>\r\n<h2>CAVALO COM AL&Ccedil;AS</h2>\r\n<p>Com 1,15 metro de altura, a estrutura conta com duas al&ccedil;as em sua superf&iacute;cie, que permitem aos atletas realizar exerc&iacute;cios de for&ccedil;a e coordena&ccedil;&atilde;o motora, como giros e trocas de posi&ccedil;&atilde;o.</p>\r\n<p>&nbsp;</p>\r\n<h2>ARGOLAS</h2>\r\n<p>Duas argolas s&atilde;o penduradas a 2,75 metros do solo, separadas por cerca de 50 cm. A prova consiste em uma s&eacute;rie de exerc&iacute;cios de for&ccedil;a, balan&ccedil;o e equil&iacute;brio, onde o atleta deve sustentar o seu peso e permanecer im&oacute;vel por pelo menos 2 segundos.</p>\r\n<p>&nbsp;</p>\r\n<h2>MESA PARA SALTO</h2>\r\n<p>Usado para dar suporte e impulso a variados saltos e piruetas, o equipamento &eacute; composto por uma pista de 25 metros, que termina em um trampolim de impulso e mesa &ndash; de dimens&otilde;es 120 x 95 cm.</p>\r\n<p>&nbsp;</p>\r\n<h2>TABLADO PARA SOLO</h2>\r\n<p>Superf&iacute;cie de 12x12m, composta de molas, madeira, espuma e carpete. No tablado, os exerc&iacute;cios t&ecirc;m dura&ccedil;&atilde;o de, no m&aacute;ximo, 70 segundos para os homens, enquanto as mulheres devem completar a sua performance em at&eacute; um minuto e meio.</p>\r\n<p>&nbsp;</p>\r\n<h2>BARRAS</h2>\r\n<p>Barra fixa: barra com 2,75m de altura, utilizada para realizar giros e acrobacias.</p>\r\n<p>Barras assim&eacute;tricas: &nbsp;s&atilde;o duas barras, (a mais alta posicionada a 2,4m de altura e a mais baixa a 1,6m) sobre as quais as ginastas realizam acrobacias e piruetas.</p>\r\n<p>Barras paralelas: &nbsp;duas barras, utilizadas para exerc&iacute;cios de equil&iacute;brio e for&ccedil;a, em que o ginasta usa as duas barras obrigatoriamente, passando por todo seu comprimento.</p>', '2016-05-06 23:53:26', '2016-05-06 23:53:26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) UNSIGNED NOT NULL,
  `usuarios_tipos_id` int(11) UNSIGNED NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `telefone` varchar(14) DEFAULT NULL,
  `endereco` text,
  `data_nascimento` date DEFAULT NULL,
  `modified` datetime NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuarios_tipos_id`, `nome`, `email`, `senha`, `cpf`, `telefone`, `endereco`, `data_nascimento`, `modified`, `created`) VALUES
(1, 1, 'Administrador', 'admin@admin.com.br', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, '2016-05-03 00:00:00', '2016-05-03 00:00:00'),
(2, 2, 'Cliente', 'cliente@cliente.com', 'e10adc3949ba59abbe56e057f20f883e', '085.368.376-08', '(31)2515-5631', 'Rua Virgilio Machado, nÂº 242, Apartamento 3', '1995-10-19', '2016-05-03 00:00:00', '2016-05-03 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios_tipos`
--

CREATE TABLE `usuarios_tipos` (
  `id` int(11) UNSIGNED NOT NULL,
  `nome` varchar(100) NOT NULL,
  `modified` datetime NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios_tipos`
--

INSERT INTO `usuarios_tipos` (`id`, `nome`, `modified`, `created`) VALUES
(1, 'Administrador', '2016-03-25 10:38:00', '2016-03-25 10:38:00'),
(2, 'Cliente', '2016-03-25 10:38:00', '2016-03-25 10:38:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuarios_has_eventos_eventos1_idx` (`eventos_id`),
  ADD KEY `fk_usuarios_has_eventos_usuarios1_idx` (`usuarios_id`);

--
-- Indexes for table `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_eventos_modalidades1_idx` (`modalidades_id`),
  ADD KEY `fk_eventos_locais1_idx` (`locais_id`);

--
-- Indexes for table `locais`
--
ALTER TABLE `locais`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locais_atracoes`
--
ALTER TABLE `locais_atracoes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modalidades`
--
ALTER TABLE `modalidades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuarios_usuarios_tipos_idx` (`usuarios_tipos_id`);

--
-- Indexes for table `usuarios_tipos`
--
ALTER TABLE `usuarios_tipos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `locais`
--
ALTER TABLE `locais`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `locais_atracoes`
--
ALTER TABLE `locais_atracoes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `modalidades`
--
ALTER TABLE `modalidades`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `usuarios_tipos`
--
ALTER TABLE `usuarios_tipos`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `fk_usuarios_has_eventos_eventos1` FOREIGN KEY (`eventos_id`) REFERENCES `eventos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuarios_has_eventos_usuarios1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `fk_eventos_locais1` FOREIGN KEY (`locais_id`) REFERENCES `locais` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_eventos_modalidades1` FOREIGN KEY (`modalidades_id`) REFERENCES `modalidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_usuarios_tipos` FOREIGN KEY (`usuarios_tipos_id`) REFERENCES `usuarios_tipos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
