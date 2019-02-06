-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 04/02/2016 às 02:57
-- Versão do servidor: 10.0.17-MariaDB
-- Versão do PHP: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `exemplo`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `matricula` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `nivel` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `matricula`,`email`, `senha`, `nivel`) VALUES
(1, 'Joao', '1555', 'joao@gmail.com','12345', 1),
(2, 'Marta', '2000', 'marta@gmail.com','12345', 2);


--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


CREATE DATABASE IF NOT EXISTS sgoa;

SELECT  DATABASE sgoa;

CREATE TABLE IF NOT EXISTS usuarios (
us_nome VARCHAR (40) NOT NULL,
us_matricula INT (10),
us_email VARCHAR (40) NOT NULL UNIQUE,
us_senha VARCHAR (30) NOT NULL,
us_prioridade INT (1),
us_id INT NOT NULL AUTO_INCREMENT,
PRIMARY KEY (us_id)
)

ENGINE = MyISAM;

CREATE TABLE IF NOT EXISTS ocorrencias (
oc_id INT NOT NULL AUTO_INCREMENT,
oc_nome VARCHAR (100) NOT NULL,
oc_matricula VARCHAR (10) NOT NULL,
oc_data DATE NOT NULL,
oc_turno VARCHAR (40) NOT NULL,
oc_ocorrencia VARCHAR (250) NOT NULL,
oc_ocorrido VARCHAR (400) NOT NULL,
oc_processo VARCHAR(40) NOT NULL,
oc_sancao VARCHAR (250) NOT NULL,
oc_depoimento VARCHAR (40) NOT NULL,
PRIMARY KEY (oc_id)
)

CREATE TABLE IF NOT EXISTS ticket (
tk_nome VARCHAR (100) NOT NULL,
tk_matricula VARCHAR (10) NOT NULL,
tk_data DATE NOT NULL,
tk_turno VARCHAR (20) NOT NULL,
tk_ocorrido VARCHAR (400) NOT NULL,
tk_turma VARCHAR (100) NOT NULL,
tk_envolvidos VARCHAR (100) NOT NULL,
tk_nivel VARCHAR (10) NOT NULL,
tk_id INT NOT NULL AUTO_INCREMENT,
PRIMARY KEY (tk_id) 
)
ENGINE = MyISAM;

