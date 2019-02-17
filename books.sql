-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Gegenereerd op: 16 apr 2018 om 018:59
-- Serverversie: 5.6.35
-- PHP-versie: 7.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toDoList`
--

CREATE DATABASE IF NOT EXISTS `toDoList` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `toDoList`;
--
-- Tabelstructuur voor tabel `list`
--

CREATE TABLE IF NOT EXISTS `list` (
  `list_id` int(11) NOT NULL,
  `list_name` varchar(255) NOT NULL,
  `list_item` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `list`
--

INSERT INTO `list` (`list_id`, `list_name`, `list_item`) VALUES
(1, 'Boodschappen', 'Nutella', 'Kaas'),
(5, 'Kleding', 'Jurkjes', '');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
