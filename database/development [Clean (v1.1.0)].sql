-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2018 at 08:13 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `./app/config/default.php`
--
CREATE DATABASE IF NOT EXISTS `{{DB_DATABASE}}` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `{{DB_DATABASE}}`;

-- --------------------------------------------------------

--
-- Table structure for table `exemplar`
--

CREATE TABLE `exemplar` (
  `eID` int(11) NOT NULL COMMENT 'Exemplar ID',
  `fk_fID` int(11) NOT NULL COMMENT 'Film ID',
  `fK_tID` int(11) NOT NULL COMMENT 'Typ ID'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `filme`
--

CREATE TABLE `filme` (
  `fID` int(11) NOT NULL COMMENT 'FilmID',
  `title` varchar(128) NOT NULL COMMENT 'Titel',
  `fsk` varchar(2) NOT NULL COMMENT 'FSK',
  `description` varchar(1024) NOT NULL COMMENT 'Beschreibung',
  `runtime` varchar(3) NOT NULL COMMENT 'Filmlänge',
  `releaseDate` date NOT NULL COMMENT 'Erscheinungsdatum',
  `trailerLink` varchar(255) NOT NULL COMMENT 'YouTube Trailer Link [Embed]',
  `coverImagePath` varchar(255) NOT NULL COMMENT 'Cover Pfad'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategorie`
--

CREATE TABLE `kategorie` (
  `katID` int(11) NOT NULL COMMENT 'Kategorie ID',
  `kategorie` varchar(50) NOT NULL COMMENT 'Kategorie Name'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kat_link`
--

CREATE TABLE `kat_link` (
  `ID` int(11) NOT NULL COMMENT 'Normal ID',
  `fk_fID` int(11) NOT NULL COMMENT 'Film ID',
  `fk_katID` int(11) NOT NULL COMMENT 'Kategorie ID'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kunden`
--

CREATE TABLE `kunden` (
  `kID` int(11) NOT NULL COMMENT 'Kunden ID',
  `name` varchar(50) NOT NULL COMMENT 'Name',
  `vorname` varchar(50) NOT NULL COMMENT 'Vorname',
  `geburtsdatum` date NOT NULL COMMENT 'Geburtsdatum',
  `fk_plzID` int(5) NOT NULL COMMENT 'PLZ',
  `strasse` varchar(50) NOT NULL COMMENT 'Strasse',
  `email` varchar(128) NOT NULL COMMENT 'E-Mail (Login)',
  `password` varchar(128) NOT NULL COMMENT 'Password (Login)'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mitarbeiter`
--

CREATE TABLE `mitarbeiter` (
  `aID` int(11) NOT NULL COMMENT 'Admin ID',
  `firstname` varchar(50) NOT NULL COMMENT 'Vorname',
  `surname` varchar(50) NOT NULL COMMENT 'Nachname',
  `email` varchar(128) NOT NULL COMMENT 'E-Mail (Login)',
  `password` varchar(128) NOT NULL COMMENT 'Password (Login)'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ort`
--

CREATE TABLE `ort` (
  `ID` int(11) NOT NULL,
  `plz` varchar(8) NOT NULL,
  `stadt` varchar(50) NOT NULL COMMENT 'Stadt'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `regisseur`
--

CREATE TABLE `regisseur` (
  `rID` int(11) NOT NULL COMMENT 'Regisseur ID',
  `name` varchar(128) NOT NULL COMMENT 'Vor- und Nachname'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rid_link`
--

CREATE TABLE `rid_link` (
  `ID` int(11) NOT NULL COMMENT 'Normal ID',
  `fk_fID` int(11) NOT NULL COMMENT 'Film ID',
  `fk_rID` int(11) NOT NULL COMMENT 'Regisseur ID'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rueckgabe`
--

CREATE TABLE `rueckgabe` (
  `ID` int(11) NOT NULL COMMENT 'Normal ID',
  `fk_vID` int(11) NOT NULL COMMENT 'Verleih ID',
  `fk_eID` int(11) NOT NULL COMMENT 'Exemplar ID',
  `rueckgabedatum` date NOT NULL COMMENT 'Rückgabedatum'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `schauspieler`
--

CREATE TABLE `schauspieler` (
  `sID` int(11) NOT NULL COMMENT 'Schauspieler ID',
  `name` varchar(128) NOT NULL COMMENT 'Vor- und Nachname'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sid_link`
--

CREATE TABLE `sid_link` (
  `ID` int(11) NOT NULL COMMENT 'Normal ID',
  `fk_fID` int(11) NOT NULL COMMENT 'Film ID',
  `fk_sID` int(11) NOT NULL COMMENT 'Schauspieler ID'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `typ`
--

CREATE TABLE `typ` (
  `tID` int(11) NOT NULL COMMENT 'Typ ID',
  `typ` varchar(50) NOT NULL COMMENT 'Typ Art',
  `preis` decimal(10,0) NOT NULL COMMENT 'Preis',
  `frist` int(11) NOT NULL COMMENT 'Frist in Tage'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `typ`
--

INSERT INTO `typ` (`tID`, `typ`, `preis`, `frist`) VALUES
(1, 'BluRay', '5', 7),
(2, 'DvD', '3', 7);

-- --------------------------------------------------------

--
-- Table structure for table `verleih`
--

CREATE TABLE `verleih` (
  `vID` int(11) NOT NULL COMMENT 'Verleih ID',
  `fk_kID` int(11) NOT NULL COMMENT 'Kunden ID',
  `ausgabedatum` date NOT NULL COMMENT 'Ausgabedatum'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `versions`
--

CREATE TABLE `versions` (
  `ID` int(11) NOT NULL,
  `version` varchar(15) NOT NULL,
  `notes` varchar(128) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `versions`
--

INSERT INTO `versions` (`ID`, `version`, `notes`, `date_created`) VALUES
(1, '1.0.0b', '1.0.0 BETA', '2018-05-24 18:00:00'),
(2, '1.0.0', '1.0.0 RELEASE', '2018-05-31 18:00:00'),
(3, '1.1.0', 'Many improvments, ready-to-use for live server', '2018-06-02 16:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exemplar`
--
ALTER TABLE `exemplar`
  ADD PRIMARY KEY (`eID`);

--
-- Indexes for table `filme`
--
ALTER TABLE `filme`
  ADD PRIMARY KEY (`fID`);

--
-- Indexes for table `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`katID`);

--
-- Indexes for table `kat_link`
--
ALTER TABLE `kat_link`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `kunden`
--
ALTER TABLE `kunden`
  ADD PRIMARY KEY (`kID`);

--
-- Indexes for table `mitarbeiter`
--
ALTER TABLE `mitarbeiter`
  ADD PRIMARY KEY (`aID`);

--
-- Indexes for table `ort`
--
ALTER TABLE `ort`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `regisseur`
--
ALTER TABLE `regisseur`
  ADD PRIMARY KEY (`rID`);

--
-- Indexes for table `rid_link`
--
ALTER TABLE `rid_link`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `rueckgabe`
--
ALTER TABLE `rueckgabe`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `schauspieler`
--
ALTER TABLE `schauspieler`
  ADD PRIMARY KEY (`sID`);

--
-- Indexes for table `sid_link`
--
ALTER TABLE `sid_link`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `typ`
--
ALTER TABLE `typ`
  ADD PRIMARY KEY (`tID`);

--
-- Indexes for table `verleih`
--
ALTER TABLE `verleih`
  ADD PRIMARY KEY (`vID`);

--
-- Indexes for table `versions`
--
ALTER TABLE `versions`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exemplar`
--
ALTER TABLE `exemplar`
  MODIFY `eID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Exemplar ID';

--
-- AUTO_INCREMENT for table `filme`
--
ALTER TABLE `filme`
  MODIFY `fID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'FilmID';

--
-- AUTO_INCREMENT for table `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `katID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Kategorie ID';

--
-- AUTO_INCREMENT for table `kat_link`
--
ALTER TABLE `kat_link`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Normal ID';

--
-- AUTO_INCREMENT for table `kunden`
--
ALTER TABLE `kunden`
  MODIFY `kID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Kunden ID';

--
-- AUTO_INCREMENT for table `mitarbeiter`
--
ALTER TABLE `mitarbeiter`
  MODIFY `aID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Admin ID';

--
-- AUTO_INCREMENT for table `ort`
--
ALTER TABLE `ort`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `regisseur`
--
ALTER TABLE `regisseur`
  MODIFY `rID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Regisseur ID';

--
-- AUTO_INCREMENT for table `rid_link`
--
ALTER TABLE `rid_link`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Normal ID';

--
-- AUTO_INCREMENT for table `rueckgabe`
--
ALTER TABLE `rueckgabe`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Normal ID';

--
-- AUTO_INCREMENT for table `schauspieler`
--
ALTER TABLE `schauspieler`
  MODIFY `sID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Schauspieler ID';

--
-- AUTO_INCREMENT for table `sid_link`
--
ALTER TABLE `sid_link`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Normal ID';

--
-- AUTO_INCREMENT for table `typ`
--
ALTER TABLE `typ`
  MODIFY `tID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Typ ID', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `verleih`
--
ALTER TABLE `verleih`
  MODIFY `vID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Verleih ID';

--
-- AUTO_INCREMENT for table `versions`
--
ALTER TABLE `versions`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
