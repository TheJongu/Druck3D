-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 18. Jun 2020 um 18:03
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
(15, 'Delorian', 5.99, 'delorian.png', 'Das Auto von \"Zur?ck in die Zukunft\"!'),
(16, 'Pikachu', 2.99, 'pikachu.png', 'Pikachu von Pokemon!');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `artikelreview`
--

CREATE TABLE `artikelreview` (
  `FK_Artikel` int(11) NOT NULL,
  `FK_Review` int(11) NOT NULL,
  `FK_Nutzer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(15, 10),
(15, 11),
(15, 14),
(16, 3),
(16, 11),
(16, 12),
(16, 13);

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
-- Tabellenstruktur für Tabelle `review`
--

CREATE TABLE `review` (
  `PK_Review` int(11) NOT NULL,
  `Reviewtext` int(11) NOT NULL,
  `Bewertung` double(8,2) NOT NULL
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
(11, 'Spielzeug'),
(12, 'Figur'),
(13, 'Tier'),
(14, 'Auto');

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
-- Indizes für die Tabelle `artikelreview`
--
ALTER TABLE `artikelreview`
  ADD KEY `FK_Artikel` (`FK_Artikel`),
  ADD KEY `FK_Review` (`FK_Review`),
  ADD KEY `FK_Nutzer` (`FK_Nutzer`);

--
-- Indizes für die Tabelle `artikelschlagworte`
--
ALTER TABLE `artikelschlagworte`
  ADD KEY `FK_Artikel` (`FK_Artikel`),
  ADD KEY `artikelschlagworte_ibfk_2` (`FK_Schlagwort`);

--
-- Indizes für die Tabelle `nutzer`
--
ALTER TABLE `nutzer`
  ADD PRIMARY KEY (`PK_Nutzer`);

--
-- Indizes für die Tabelle `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`PK_Review`);

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
  MODIFY `PK_Artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT für Tabelle `nutzer`
--
ALTER TABLE `nutzer`
  MODIFY `PK_Nutzer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `review`
--
ALTER TABLE `review`
  MODIFY `PK_Review` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `schlagworte`
--
ALTER TABLE `schlagworte`
  MODIFY `PK_Schlagwort` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `artikelreview`
--
ALTER TABLE `artikelreview`
  ADD CONSTRAINT `artikelreview_ibfk_1` FOREIGN KEY (`FK_Artikel`) REFERENCES `artikel` (`PK_Artikel`) ON UPDATE CASCADE,
  ADD CONSTRAINT `artikelreview_ibfk_2` FOREIGN KEY (`FK_Review`) REFERENCES `review` (`PK_Review`);

--
-- Constraints der Tabelle `artikelschlagworte`
--
ALTER TABLE `artikelschlagworte`
  ADD CONSTRAINT `artikelschlagworte_ibfk_1` FOREIGN KEY (`FK_Artikel`) REFERENCES `artikel` (`PK_Artikel`) ON UPDATE CASCADE,
  ADD CONSTRAINT `artikelschlagworte_ibfk_2` FOREIGN KEY (`FK_Schlagwort`) REFERENCES `schlagworte` (`PK_Schlagwort`) ON UPDATE CASCADE;

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
