-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 11-Jan-2018 às 23:06
-- Versão do servidor: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.1.12-3+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ClinicaMartin`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `Consulta`
--

CREATE TABLE `Consulta` (
  `id_consulta` int(11) NOT NULL,
  `id_medico` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `data_consulta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `observacoes` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Medico`
--

CREATE TABLE `Medico` (
  `id_medico` int(11) NOT NULL,
  `nome_medico` varchar(80) NOT NULL,
  `crm` varchar(10) NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `senha` varchar(300) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `Medico`
--

INSERT INTO `Medico` (`id_medico`, `nome_medico`, `crm`, `categoria`, `senha`, `email`) VALUES
(6, 'medico', '757474', 'Oftamologista', '$2y$10$0f3oLboOpWQELXoBBV5u8eb6Qx2wkJuXJqDBELqIaCrDKpu9exisO', 'medico@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Paciente`
--

CREATE TABLE `Paciente` (
  `id_paciente` int(11) NOT NULL,
  `nome_paciente` varchar(80) NOT NULL,
  `telefone` varchar(10) NOT NULL,
  `senha` varchar(300) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `Paciente`
--

INSERT INTO `Paciente` (`id_paciente`, `nome_paciente`, `telefone`, `senha`, `email`) VALUES
(22, 'paciente', '999764664', '$2y$10$b5TUHLGwCQEjdDvwLAQPZ.LDR4mOs34eH8SBsUxJXrPVn0EPhRXNK', 'paciente@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Consulta`
--
ALTER TABLE `Consulta`
  ADD PRIMARY KEY (`id_consulta`);

--
-- Indexes for table `Medico`
--
ALTER TABLE `Medico`
  ADD PRIMARY KEY (`id_medico`);

--
-- Indexes for table `Paciente`
--
ALTER TABLE `Paciente`
  ADD PRIMARY KEY (`id_paciente`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Consulta`
--
ALTER TABLE `Consulta`
  MODIFY `id_consulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `Medico`
--
ALTER TABLE `Medico`
  MODIFY `id_medico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `Paciente`
--
ALTER TABLE `Paciente`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
DELIMITER $$
--
-- Eventos
--
CREATE DEFINER=`root`@`localhost` EVENT `delete_all_expired` ON SCHEDULE EVERY 1 DAY STARTS '2018-01-11 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM Consulta WHERE data_consulta < NOW()$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
