<!-- 
PARA A INSEÇÃO DO ADMINISTRADOR: 

INSERT INTO cadastroadm (nome,email, senha)
VALUES ('digitar nome', 'digitar email', 'digitar senha');
-->
<!-- - phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01/11/2024 às 17:10
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `educamentes`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `aluno`
--

CREATE TABLE `aluno` (
  `matricula` int(11) NOT NULL,
  `nome` varchar(225) NOT NULL,
  `ano_ingresso` year(4) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `tipo_sanguineo` varchar(45) DEFAULT NULL,
  `deficiencia` varchar(255) DEFAULT NULL,
  `alergia` varchar(255) DEFAULT NULL,
  `nome_mae` varchar(105) DEFAULT NULL,
  `id_responsavel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `aluno`
--

INSERT INTO `aluno` (`matricula`, `nome`, `ano_ingresso`, `data_nascimento`, `tipo_sanguineo`, `deficiencia`, `alergia`, `nome_mae`, `id_responsavel`) VALUES
(1, 'Lucas Lopes', '2024', '2236-08-05', 'AB-', 'nula', 'nula', 'João Lucas Barreto Lopes', 34),
(2, 'Gabriela Almeida dos Santos', '2024', '0987-02-25', 'AB+', 'nula', 'nula', 'Alice Gomes', 35),
(6, 'Luna lopes', '2015', '2022-03-01', 'A-', '', '', 'João Lucas Barreto Lopes', 34),
(8, 'Julia Martinez', '2016', '2012-04-05', 'A+', '', '', 'Lucia Gomes Martinez', 34),
(9, 'Vitória Cristina Martins e Martins', '2015', '2015-12-02', 'B+', '', 'nula', 'Marcia Ribeiro', 34),
(10, 'Gabriela Almeida', '2015', '2024-11-07', 'AB-', '', 'nula', 'Marcia Ribeiro da Silva', 34);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastroadm`
--

CREATE TABLE `cadastroadm` (
  `id_Adm` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cadastroadm`
--

INSERT INTO `cadastroadm` (`id_Adm`, `nome`, `email`, `senha`, `foto`) VALUES
(1, 'Vitória Martins', 'vihmartins330@gmail.com', '2525', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `professores`
--

CREATE TABLE `professores` (
  `id_professor` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `responsaveis`
--

CREATE TABLE `responsaveis` (
  `id_responsavel` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `responsaveis`
--

INSERT INTO `responsaveis` (`id_responsavel`, `usuario_id`) VALUES
(34, 47),
(35, 48);

-- --------------------------------------------------------

--
-- Estrutura para tabela `turma`
--

CREATE TABLE `turma` (
  `idTurma` int(11) NOT NULL,
  `nome_turma` varchar(45) NOT NULL,
  `serie` varchar(45) DEFAULT NULL,
  `turno` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `perfil` varchar(50) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome`, `email`, `cpf`, `perfil`, `senha`) VALUES
(47, 'Marcia Ribeiro ', 'joao.pereira@email.com', '987.654.321-00', 'responsavel', '2541'),
(48, 'Alice Gomes da silva', 'alicegomes524@gmail.com', '937.216.093-87', 'responsavel', '2525');

--
-- Acionadores `usuarios`
--
DELIMITER $$
CREATE TRIGGER `atualizar_nome_responsavel` AFTER UPDATE ON `usuarios` FOR EACH ROW BEGIN
    -- Atualiza o nome do responsável na tabela aluno com base no id_responsavel
    UPDATE aluno
    SET nome_mae = NEW.nome  -- Supondo que o nome do responsável vai para o campo nome_mae
    WHERE id_responsavel = NEW.id_usuario;  -- Atualiza o registro do aluno que possui este responsável
END
$$
DELIMITER ;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`matricula`),
  ADD KEY `id_responsavel` (`id_responsavel`);

--
-- Índices de tabela `cadastroadm`
--
ALTER TABLE `cadastroadm`
  ADD PRIMARY KEY (`id_Adm`);

--
-- Índices de tabela `professores`
--
ALTER TABLE `professores`
  ADD PRIMARY KEY (`id_professor`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices de tabela `responsaveis`
--
ALTER TABLE `responsaveis`
  ADD PRIMARY KEY (`id_responsavel`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices de tabela `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`idTurma`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aluno`
--
ALTER TABLE `aluno`
  MODIFY `matricula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `cadastroadm`
--
ALTER TABLE `cadastroadm`
  MODIFY `id_Adm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `professores`
--
ALTER TABLE `professores`
  MODIFY `id_professor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `responsaveis`
--
ALTER TABLE `responsaveis`
  MODIFY `id_responsavel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de tabela `turma`
--
ALTER TABLE `turma`
  MODIFY `idTurma` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `aluno_ibfk_1` FOREIGN KEY (`id_responsavel`) REFERENCES `responsaveis` (`id_responsavel`);

--
-- Restrições para tabelas `professores`
--
ALTER TABLE `professores`
  ADD CONSTRAINT `professores_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id_usuario`);

--
-- Restrições para tabelas `responsaveis`
--
ALTER TABLE `responsaveis`
  ADD CONSTRAINT `responsaveis_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */; -->

