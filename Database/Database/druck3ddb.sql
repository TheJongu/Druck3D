-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 30. Jun 2020 um 16:08
-- Server-Version: 10.4.11-MariaDB
-- PHP-Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `druck3ddb`
--
CREATE DATABASE IF NOT EXISTS `druck3ddb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `druck3ddb`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `artikel`
--

CREATE TABLE `artikel` (
  `PK_Artikel` int(11) NOT NULL,
  `Name` varchar(80) NOT NULL,
  `Preis` double(8,2) NOT NULL,
  `Bildlink` varchar(80) NOT NULL,
  `Beschreibung` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `artikel`
--

INSERT INTO `artikel` (`PK_Artikel`, `Name`, `Preis`, `Bildlink`, `Beschreibung`) VALUES
(1, 'Cybertruck', 5.99, 'img/cyberdruck.jpg', 'Tesla Cybertruck. Dekofigur zum selbst zusammenbauen'),
(2, 'Pikachu', 2.99, 'img/pikachu.jpg', 'Pikachu von Pokemon!'),
(3, 'Baby Yoda', 6.00, 'img/babyyoda.jpg', 'Baby Yoda von Star Wars. Möge die Macht mit dir sein.'),
(4, 'Flaschen Öffner Pistole', 8.99, 'img/bottleopener.png', 'Ein Flaschenöffner mit Zusatzfunktion: Schießen Sie den Kronkorken sofort in den'),
(5, 'Butterfly Messer (Trainer)', 15.99, 'img/butterfly.png', 'Drucken Sie sich ihr eigenes Butterfly-Messer. Trainieren Sie wie ein echter Pro'),
(6, 'Covid 19 Maske', 0.99, 'img/covid19mask.png', 'Drucken Sie zu ihrer Sicherheit eine Maske! Bleiben Sie gesund!'),
(7, 'Covid 19 Statue', 1.99, 'img/covid19toilettpaper.jpg', 'Eine Pandemie ist eine Erfahrung, drucken Sie sich eine Statue!'),
(8, 'Darth Maul', 8.99, 'img/darthmaul.jpg', 'Darthmaul von StarWars. Er trägt sein Doppellichtschwert!'),
(9, 'Fliegende Schildkröte', 15.99, 'img/flyingturtle.jpg', 'Eine coole fliegende Schildkröte mit mechanischer Bewegung!'),
(10, 'Gans von Untitled Goose Game', 6.49, 'img/gooseUntiled.jpg', 'Die Gans von \"Untiled Goose Game\". Als Figur für Ihren Schreibtisch.'),
(11, 'Haus', 25.49, 'img/house.jpg', 'Drucken Sie sich ein Miniaturhaus. Wunderbar für Modellelbauer!'),
(12, 'Impossible Table', 12.99, 'img/impossibletable.jpeg', 'Ein Physik-Spielzeug für Ihren Schreibtisch. Bewundern Sie den unmöglichen Tisch'),
(13, '36 Militärfahrzeuge', 29.99, 'img/moderncars36.png', '36 Militärfahrzeuge zu einem unglaublichen Preis! Perfekt für Modelbauer!'),
(14, 'Origami Panther', 4.99, 'img/pantherOrigani.jpeg', 'Ein Panther nach asiatischer Origami Art. Toll als Sammelfigur'),
(15, 'Eisbär', 29.99, 'img/polarbear.jpg', 'Ein mechanischer Eisbär als Spielzeug. Drehe die Kurbel und er bewegt sich!'),
(16, 'Schleifwerkzeug', 6.75, 'img/sandingtool.jpg', 'Schleifwerkzeug für Sandpapier zum schleifen von Holz oder anderen Werkstoffen.'),
(17, 'Schraubenset', 4.75, 'img/schrauben.png', 'Ein Schraubenset für den Heimwerker. Auch gut als Spielzeug für die kleinen Hand'),
(18, 'Smart Clock Regal', 49.99, 'img/smartclockshelf.jpg', 'Ein Regal mit integrierter Uhr. Besteht aus mehreren Teilen. Zur Beleuchtung wir'),
(19, 'Spielzeugpistole', 8.99, 'img/toygun.jpeg', 'Eine Spielzeugpistole mit modernem Look. Toll als Spielzeug für Kinder'),
(20, 'Drehtisch', 18.99, 'img/turntable.jpg', 'Ein Tisch, welcher sich bei der Betätigung der Kurbel dreht.');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `artikelschlagworte`
--

CREATE TABLE `artikelschlagworte` (
  `FK_Artikel` int(11) NOT NULL,
  `FK_Schlagwort` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `artikelschlagworte`
--

INSERT INTO `artikelschlagworte` (`FK_Artikel`, `FK_Schlagwort`) VALUES
(3, 45),
(3, 12),
(3, 4),
(3, 16),
(3, 41),
(3, 15),
(3, 20),
(3, 13),
(1, 14),
(1, 40),
(1, 11),
(1, 41),
(1, 15),
(1, 10),
(2, 45),
(2, 12),
(2, 3),
(2, 16),
(2, 41),
(2, 27),
(2, 15),
(2, 13),
(4, 22),
(4, 40),
(4, 23),
(4, 41),
(4, 29),
(4, 38),
(4, 27),
(4, 15),
(5, 40),
(5, 23),
(5, 33),
(5, 24),
(5, 30),
(5, 27),
(5, 15),
(5, 34),
(6, 45),
(6, 43),
(6, 21),
(7, 45),
(7, 43),
(7, 21),
(7, 12),
(8, 12),
(8, 16),
(8, 41),
(8, 5),
(8, 27),
(8, 15),
(8, 20),
(9, 40),
(9, 12),
(9, 16),
(9, 41),
(9, 29),
(9, 26),
(9, 27),
(9, 15),
(9, 13),
(10, 12),
(10, 3),
(10, 27),
(10, 13),
(10, 10),
(11, 12),
(11, 42),
(11, 28),
(13, 41),
(13, 31),
(13, 30),
(13, 28),
(13, 27),
(13, 15),
(14, 12),
(14, 41),
(14, 1),
(14, 13),
(17, 35),
(17, 16),
(17, 41),
(17, 36),
(17, 27),
(17, 15),
(17, 34),
(16, 35),
(16, 16),
(16, 41),
(16, 34),
(18, 35),
(18, 44),
(18, 37),
(19, 16),
(19, 41),
(19, 31),
(19, 30),
(19, 38),
(19, 27),
(19, 15),
(20, 40),
(20, 39),
(20, 33),
(20, 27),
(20, 15),
(12, 40),
(12, 12),
(12, 29),
(12, 27),
(12, 15),
(15, 40),
(15, 12),
(15, 41),
(15, 33),
(15, 27),
(15, 15),
(15, 13),
(15, 10);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `gekaufteartikel`
--

CREATE TABLE `gekaufteartikel` (
  `FK_Artikel` int(11) NOT NULL,
  `FK_Nutzer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `nutzer`
--

CREATE TABLE `nutzer` (
  `PK_Nutzer` int(11) NOT NULL,
  `Username` varchar(80) NOT NULL,
  `Firstname` varchar(80) NOT NULL,
  `Lastname` varchar(80) NOT NULL,
  `Email` varchar(80) NOT NULL,
  `Password` varchar(80) NOT NULL,
  `Rechteklasse` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `schlagworte`
--

CREATE TABLE `schlagworte` (
  `PK_Schlagwort` int(11) NOT NULL,
  `Schlagwort` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `schlagworte`
--

INSERT INTO `schlagworte` (`PK_Schlagwort`, `Schlagwort`) VALUES
(1, 'Schwarz'),
(2, 'Pink'),
(3, 'Gelb'),
(4, 'Gruen'),
(5, 'Rot'),
(6, 'Blau'),
(7, 'Lila'),
(8, 'Orange'),
(9, 'Braun'),
(10, 'Weiß'),
(11, 'Grau'),
(12, 'Figur'),
(13, 'Tier'),
(14, 'Auto'),
(15, 'Spielzeug'),
(16, 'Kinder'),
(20, 'Starwars'),
(21, 'Covid'),
(22, 'Beer'),
(23, 'Flaschenöffner'),
(24, 'Messer'),
(25, 'Maske'),
(26, 'Schildkröte'),
(27, 'Spiele'),
(28, 'Modellbau'),
(29, 'Physik'),
(30, 'Militär'),
(31, 'Krieg'),
(32, 'Origami'),
(33, 'Mechanisch'),
(34, 'Werkzeug'),
(35, 'Handwerker'),
(36, 'Schrauben'),
(37, 'Uhr'),
(38, 'Pistole'),
(39, 'Drehtisch'),
(40, 'Beweglich'),
(41, 'Klein'),
(42, 'Gross'),
(43, 'Corona'),
(44, 'Regal'),
(45, 'Asiatisch');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `warenkorbartikel`
--

CREATE TABLE `warenkorbartikel` (
  `FK_Nutzer` int(11) NOT NULL,
  `FK_Artikel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`PK_Artikel`);

--
-- Indizes für die Tabelle `artikelschlagworte`
--
ALTER TABLE `artikelschlagworte`
  ADD KEY `FK_Artikel` (`FK_Artikel`),
  ADD KEY `artikelschlagworte_ibfk_2` (`FK_Schlagwort`);

--
-- Indizes für die Tabelle `gekaufteartikel`
--
ALTER TABLE `gekaufteartikel`
  ADD KEY `FK_Artikel` (`FK_Artikel`),
  ADD KEY `FK_Nutzer` (`FK_Nutzer`);

--
-- Indizes für die Tabelle `nutzer`
--
ALTER TABLE `nutzer`
  ADD PRIMARY KEY (`PK_Nutzer`);

--
-- Indizes für die Tabelle `schlagworte`
--
ALTER TABLE `schlagworte`
  ADD PRIMARY KEY (`PK_Schlagwort`);

--
-- Indizes für die Tabelle `warenkorbartikel`
--
ALTER TABLE `warenkorbartikel`
  ADD KEY `FK_Nutzer` (`FK_Nutzer`),
  ADD KEY `FK_Artikel` (`FK_Artikel`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `artikel`
--
ALTER TABLE `artikel`
  MODIFY `PK_Artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT für Tabelle `nutzer`
--
ALTER TABLE `nutzer`
  MODIFY `PK_Nutzer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `schlagworte`
--
ALTER TABLE `schlagworte`
  MODIFY `PK_Schlagwort` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `artikelschlagworte`
--
ALTER TABLE `artikelschlagworte`
  ADD CONSTRAINT `artikelschlagworte_ibfk_1` FOREIGN KEY (`FK_Artikel`) REFERENCES `artikel` (`PK_Artikel`) ON UPDATE CASCADE,
  ADD CONSTRAINT `artikelschlagworte_ibfk_2` FOREIGN KEY (`FK_Schlagwort`) REFERENCES `schlagworte` (`PK_Schlagwort`) ON UPDATE CASCADE;

--
-- Constraints der Tabelle `gekaufteartikel`
--
ALTER TABLE `gekaufteartikel`
  ADD CONSTRAINT `gekaufteartikel_ibfk_1` FOREIGN KEY (`FK_Artikel`) REFERENCES `artikel` (`PK_Artikel`) ON UPDATE CASCADE,
  ADD CONSTRAINT `gekaufteartikel_ibfk_2` FOREIGN KEY (`FK_Nutzer`) REFERENCES `nutzer` (`PK_Nutzer`) ON UPDATE CASCADE;

--
-- Constraints der Tabelle `warenkorbartikel`
--
ALTER TABLE `warenkorbartikel`
  ADD CONSTRAINT `warenkorbartikel_ibfk_1` FOREIGN KEY (`FK_Artikel`) REFERENCES `artikel` (`PK_Artikel`) ON UPDATE CASCADE,
  ADD CONSTRAINT `warenkorbartikel_ibfk_2` FOREIGN KEY (`FK_Nutzer`) REFERENCES `nutzer` (`PK_Nutzer`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
