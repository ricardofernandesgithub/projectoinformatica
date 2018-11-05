-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2018 at 02:06 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projecto`
--
CREATE DATABASE IF NOT EXISTS `projecto` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `projecto`;

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `ID_Categoria` int(11) NOT NULL,
  `Nome_Categoria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dispositivos`
--

CREATE TABLE `dispositivos` (
  `ID_Dispositivo` int(11) NOT NULL,
  `ID_Categoria` int(11) NOT NULL,
  `ID_Estado` int(11) NOT NULL,
  `ID_Edificio` int(11) NOT NULL,
  `ID_Utilizador` int(11) NOT NULL,
  `Nome_Dispositivo` varchar(255) NOT NULL,
  `Modelo` varchar(255) NOT NULL,
  `Endereco_IP` varchar(255) NOT NULL,
  `Endereco_MAC` varchar(255) NOT NULL,
  `Numero_Serie` varchar(255) NOT NULL,
  `Localizacao` varchar(255) NOT NULL,
  `Codigo_Imobilizado` varchar(255) NOT NULL,
  `Adicionado_Em` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `URL_Slug` varchar(255) NOT NULL,
  `Comentario` text NOT NULL,
  `Fotografia` varchar(255) NOT NULL,
  `Coordenada_X` int(11) NOT NULL,
  `Coordenada_Y` int(11) NOT NULL,
  `Localizacao_Mapa` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `edificios`
--

CREATE TABLE `edificios` (
  `ID_Edificio` int(11) NOT NULL,
  `Nome_Edificio` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `estados`
--

CREATE TABLE `estados` (
  `ID_Estado` int(11) NOT NULL,
  `Nome_Estado` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `utilizadores`
--

CREATE TABLE `utilizadores` (
  `ID_Utilizador` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Nome` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Tipo` int(11) NOT NULL,
  `Data_Registo` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`ID_Categoria`);

--
-- Indexes for table `dispositivos`
--
ALTER TABLE `dispositivos`
  ADD PRIMARY KEY (`ID_Dispositivo`);

--
-- Indexes for table `edificios`
--
ALTER TABLE `edificios`
  ADD PRIMARY KEY (`ID_Edificio`);

--
-- Indexes for table `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`ID_Estado`);

--
-- Indexes for table `utilizadores`
--
ALTER TABLE `utilizadores`
  ADD PRIMARY KEY (`ID_Utilizador`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `ID_Categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dispositivos`
--
ALTER TABLE `dispositivos`
  MODIFY `ID_Dispositivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `edificios`
--
ALTER TABLE `edificios`
  MODIFY `ID_Edificio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `estados`
--
ALTER TABLE `estados`
  MODIFY `ID_Estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `utilizadores`
--
ALTER TABLE `utilizadores`
  MODIFY `ID_Utilizador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
