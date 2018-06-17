-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2018 at 08:12 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `exemplar`
--

CREATE TABLE `exemplar` (
  `eID` int(11) NOT NULL COMMENT 'Exemplar ID',
  `fk_fID` int(11) NOT NULL COMMENT 'Film ID',
  `fK_tID` int(11) NOT NULL COMMENT 'Typ ID'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exemplar`
--

INSERT INTO `exemplar` (`eID`, `fk_fID`, `fK_tID`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 2, 1),
(4, 3, 1),
(5, 4, 1),
(6, 5, 1),
(7, 6, 1),
(8, 7, 1),
(9, 8, 2),
(10, 9, 1),
(11, 10, 1),
(12, 11, 1),
(13, 12, 1),
(14, 13, 1),
(15, 14, 1),
(16, 15, 1),
(17, 16, 2),
(18, 16, 1),
(19, 17, 2),
(20, 18, 2),
(21, 19, 1),
(22, 20, 2);

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

--
-- Dumping data for table `filme`
--

INSERT INTO `filme` (`fID`, `title`, `fsk`, `description`, `runtime`, `releaseDate`, `trailerLink`, `coverImagePath`) VALUES
(1, 'Kimi No Na Wa (Your Name.)', '-', 'High schoolers Mitsuha and Taki are complete strangers living separate lives. But one night, they suddenly switch places. Mitsuha wakes up in Takiâ€™s body, and he in hers. This bizarre occurrence continues to happen randomly, and the two must adjust their lives around each other.', '106', '2016-07-03', 'https://www.youtube.com/embed/xU47nhruN-Q', '../../../img/upload/covers/5af45f86a80682.97200171.jpg'),
(2, 'Koe No Katachi (A Silent Voice)', '6', 'Shouya Ishida starts bullying the new girl in class, Shouko Nishimiya, because she is deaf. But as the teasing continues, the rest of the class starts to turn on Shouya for his lack of compassion. When they leave elementary school, Shouko and Shouya do not speak to each other again... until an older, wiser Shouya, tormented by his past behaviour, decides he must see Shouko once more. He wants to atone for his sins, but is it already too late...?', '130', '2017-09-20', 'https://www.youtube.com/embed/Ivrq1ZwsRps', '../../../img/upload/covers/5af460244ff809.61507067.jpg'),
(3, 'The Anthem of the Heart', '6', 'A young girl had her voice magically taken away so that she would never hurt people with it, but her outlook changes when she encounters music and friendship.', '119', '2015-03-30', 'https://www.youtube.com/embed/EnbgMjdguxI', '../../../img/upload/covers/5af4626516fb40.92808841.jpg'),
(4, 'Finding Dory', '-', 'Dory is reunited with her friends Nemo and Marlin in the search for answers about her past. What can she remember? Who are her parents? And where did she learn to speak Whale?', '97', '2016-06-08', 'https://www.youtube.com/embed/0tkLUap7oGQ', '../../../img/upload/covers/5af4636b17a327.44229151.jpg'),
(5, 'Ready Player One', '12', 'When the creator of a popular video game system dies, a virtual contest is created to compete for his fortune.', '140', '2018-03-11', 'https://www.youtube.com/embed/cSp1dM2Vj48', '../../../img/upload/covers/5af46553a4daf6.12809302.jpg'),
(6, 'Deadpool', '16', 'Deadpool tells the origin story of former Special Forces operative turned mercenary Wade Wilson, who after being subjected to a rogue experiment that leaves him with accelerated healing powers, adopts the alter ego Deadpool. Armed with his new abilities and a dark, twisted sense of humor, Deadpool hunts down the man who nearly destroyed his life.', '108', '2016-02-12', 'https://www.youtube.com/embed/Xithigfg7dA', '../../../img/upload/covers/5af46670edea06.62090073.jpg'),
(7, 'Deadpool 2', '16', 'Wisecracking mercenary Deadpool battles the evil and powerful Cable and other bad guys to save a boy\'s life.', '108', '2018-05-17', 'https://www.youtube.com/embed/D86RtevtfrA', '../../../img/upload/covers/5af46746e5cd97.14152951.jpg'),
(8, 'E.T. The Extra-Terrestrial', '6', 'After a gentle alien becomes stranded on Earth, the being is discovered and befriended by a young boy named Elliott. Bringing the extraterrestrial into his suburban California house, Elliott introduces E.T., as the alien is dubbed, to his brother and his little sister, Gertie, and the children decide to keep its existence a secret. Soon, however, E.T. falls ill, resulting in government intervention and a dire situation for both Elliott and the alien.', '115', '1982-05-11', 'https://www.youtube.com/embed/qYAETtIIClk', '../../../img/upload/covers/5af468a5601b45.12997576.jpg'),
(9, 'Machete', '18', 'After being set-up and betrayed by the man who hired him to assassinate a Texas Senator, an ex-Federale launches a brutal rampage of revenge against his former boss.', '105', '2010-09-03', '', '../../../img/upload/covers/5af99ea6ab0335.76674196.jpg'),
(10, 'The Hobbit: An Unexpected Journey', '12', 'Bilbo Baggins, a hobbit enjoying his quiet life, is swept into an epic quest by Gandalf the Grey and thirteen dwarves who seek to reclaim their mountain home from Smaug, the dragon.', '169', '2012-12-14', 'https://www.youtube.com/embed/9PSXjr1gbjc', '../../../img/upload/covers/5af99fa06d48d6.62132628.jpg'),
(11, 'The Hobbit: The Desolation of Smaug', '12', 'The Dwarves, Bilbo and Gandalf have successfully escaped the Misty Mountains, and Bilbo has gained the One Ring. They all continue their journey to get their gold back from the Dragon, Smaug.', '161', '2013-12-13', 'https://www.youtube.com/embed/fnaojlfdUbs', '../../../img/upload/covers/5af9a009b8c790.29009264.jpg'),
(12, 'The Hobbit: The Battle of the Five Armies', '12', 'Immediately after the events of The Desolation of Smaug, Bilbo and the dwarves try to defend Erebor\'s mountain of treasure from others who claim it: the men of the ruined Laketown and the elves of Mirkwood. Meanwhile an army of Orcs led by Azog the Defiler is marching on Erebor, fueled by the rise of the dark lord Sauron. Dwarves, elves and men must unite, and the hope for Middle-Earth falls into Bilbo\'s hands.', '144', '2014-12-17', 'https://www.youtube.com/embed/iVAgTiBrrDA', '../../../img/upload/covers/5af9a0abe09b23.68192357.jpg'),
(13, 'Machete Kills', '18', 'Ex-Federale agent Machete is recruited by the President of the United States for a mission which would be impossible for any mortal man â€“ he must take down a madman revolutionary and an eccentric billionaire arms dealer who has hatched a plan to spread war and anarchy across the planet.', '107', '2013-10-11', 'https://www.youtube.com/embed/DwbG64YC-vQ', '../../../img/upload/covers/5af9a238815944.72158343.jpg'),
(14, 'The Accountant', '16', 'As a math savant uncooks the books for a new client, the Treasury Department closes in on his activities and the body count starts to rise.', '128', '2016-10-10', 'https://www.youtube.com/embed/DBfsgcswlYQ', '../../../img/upload/covers/5af9a3a4c77807.70937829.jpg'),
(15, 'Money Monster', '12', 'Financial TV host Lee Gates and his producer Patty are put in an extreme situation when an irate investor takes over their studio.', '98', '2016-05-13', 'https://www.youtube.com/embed/qr_nGAbFkmk', '../../../img/upload/covers/5af9a436e78273.51807479.jpg'),
(16, 'Transcendence', '12', 'Two leading computer scientists work toward their goal of Technological Singularity, as a radical anti-technology organization fights to prevent them from creating a world where computers can transcend the abilities of the human brain.', '119', '2014-04-17', 'https://www.youtube.com/embed/VCTen3-B8GU', '../../../img/upload/covers/5af9a509207109.67127952.jpg'),
(17, 'Pulp Fiction', '18', 'A burger-loving hit man, his philosophical partner, a drug-addled gangster\'s moll and a washed-up boxer converge in this sprawling, comedic crime caper. Their adventures unfurl in three stories that ingeniously trip back and forth in time.', '154', '1994-09-23', 'https://www.youtube.com/embed/s7EdQ4FqbhY', '../../../img/upload/covers/5af9a5bb3ecc69.52530278.jpg'),
(18, 'Fight Club', '16', 'A ticking-time-bomb insomniac and a slippery soap salesman channel primal male aggression into a shocking new form of therapy. Their concept catches on, with underground \"fight clubs\" forming in every town, until an eccentric gets in the way and ignites an out-of-control spiral toward oblivion.', '139', '1999-09-21', 'https://www.youtube.com/embed/SUXWAEX2jlg', '../../../img/upload/covers/5af9a668ae9ca1.46970826.jpg'),
(19, 'Sherlock: The Final Problem', '12', 'Long buried secrets finally come to light as someone has been playing a very long game indeed. Sherlock and John face their greatest ever challenge. Is the game finally over?', '90', '2017-01-15', 'https://www.youtube.com/embed/461kin_O8WA', '../../../img/upload/covers/5af9a73977d8c6.37712655.jpg'),
(20, 'You Don\'t Mess with the Zohan', '12', 'An Israeli counterterrorism soldier with a secretly fabulous ambition to become a Manhattan hairstylist. Zohan\'s desire runs so deep that he\'ll do anything -- including faking his own death and going head-to-head with an Arab cab driver -- to make his dreams come true.', '113', '2008-06-06', 'https://www.youtube.com/embed/ucmnTmYpGhI', '../../../img/upload/covers/5af9a805d905c3.03504336.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kategorie`
--

CREATE TABLE `kategorie` (
  `katID` int(11) NOT NULL COMMENT 'Kategorie ID',
  `kategorie` varchar(50) NOT NULL COMMENT 'Kategorie Name'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategorie`
--

INSERT INTO `kategorie` (`katID`, `kategorie`) VALUES
(1, 'Romance'),
(2, 'Animation'),
(3, 'Drama'),
(4, 'Fantasy'),
(5, 'Adventure'),
(6, 'Comedy'),
(7, 'Family'),
(8, 'Action'),
(9, 'Science Fiction'),
(10, 'Thriller'),
(11, 'Crime'),
(12, 'Mystery');

-- --------------------------------------------------------

--
-- Table structure for table `kat_link`
--

CREATE TABLE `kat_link` (
  `ID` int(11) NOT NULL COMMENT 'Normal ID',
  `fk_fID` int(11) NOT NULL COMMENT 'Film ID',
  `fk_katID` int(11) NOT NULL COMMENT 'Kategorie ID'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kat_link`
--

INSERT INTO `kat_link` (`ID`, `fk_fID`, `fk_katID`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 2),
(5, 2, 3),
(6, 3, 4),
(7, 3, 2),
(8, 3, 3),
(9, 4, 5),
(10, 4, 6),
(11, 4, 7),
(12, 4, 2),
(13, 5, 8),
(14, 5, 9),
(15, 5, 5),
(16, 6, 8),
(17, 6, 5),
(18, 6, 6),
(19, 7, 8),
(20, 7, 6),
(21, 7, 9),
(22, 8, 5),
(23, 8, 7),
(24, 8, 4),
(25, 8, 9),
(26, 9, 10),
(27, 9, 8),
(28, 9, 6),
(29, 10, 8),
(30, 10, 5),
(31, 10, 4),
(32, 11, 8),
(33, 11, 5),
(34, 11, 4),
(35, 12, 8),
(36, 12, 5),
(37, 12, 4),
(38, 13, 11),
(39, 13, 8),
(40, 13, 10),
(41, 14, 11),
(42, 14, 3),
(43, 14, 10),
(44, 16, 12),
(45, 16, 3),
(46, 16, 9),
(47, 16, 10),
(48, 17, 11),
(49, 17, 10),
(50, 18, 3),
(51, 19, 3),
(52, 19, 12),
(53, 20, 8),
(54, 20, 6);

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

--
-- Dumping data for table `kunden`
--

INSERT INTO `kunden` (`kID`, `name`, `vorname`, `geburtsdatum`, `fk_plzID`, `strasse`, `email`, `password`) VALUES
(3, 'Yoghurtbecher', 'Sven', '1999-01-01', 2, 'Becherweg 1337', 'yoghurt@becher.de', '$2y$10$l/rCZzdc/u3CzBFdpNGej.ti8o1vG3q0Wp.2xiPOkJC4G2e.9fWuO'),
(4, 'Krebs', 'Eugene', '1980-09-02', 3, 'Krabenallee 20', 'krabs@krossekrabbe.bk', '$2y$10$lXALN9Zh//yptdUkrm9FkOsSKCACf272xR/V8HigFHvzNud1ih5LS'),
(5, 'Yagami', 'Light', '1985-07-26', 4, 'Deathstreet 6', 'light@yagami.jp', '$2y$10$qgRHwE3sdajASEn9f.CFV..jBlQ/CMsDdazZcNQnq7LnJdURxh3H6'),
(6, 'Fuchs', 'Swiper', '1988-01-01', 1, 'Dorastrasse 5', 'swiper@nikelodeon.com', '$2y$10$9Lp6ya71.5LrEZcHGGb00.pm5rjSMBsJb8NdEWY98o37wzp7WNfr.'),
(7, 'Mann', 'Sand', '2001-02-25', 5, 'Sandkasten 5', 'sand@sand.sand', '$2y$10$w5Ph2P87mArxE3uTOVxS1.w5w.9slGWq9ZLo4bNlfNg9BdDkJNRy2'),
(8, 'Mueller', 'Manfred', '2005-02-10', 6, 'Unter der Bruecke 7', 'mueller@manni.com', '$2y$10$TiUE8TbvCcSiEBBHwe2BAe9oQwLhRM30aujl0XcwoAWFWrrV5Oyqi'),
(9, 'Hain', 'David', '1974-04-16', 7, 'Hain 4', 'hain@giga.de', '$2y$10$nDi9bqkMbiLhB5Kpi3438.mvpf601jfF2CoHVb2Use0bI1/pAAVlG'),
(10, 'Rodiguez', 'Zohan', '1985-08-02', 8, 'Zohanweg 69', 'zohan@no-mail.de', '$2y$10$QCfT4XSDkxenyQuQtK5a2Og9tiM/ikaqIoRxzILcNNtPEbLeITm5O'),
(11, 'Rhabarber', 'Erdbeer', '2000-02-02', 9, 'Rhabarberweg 98', 'erdbeer@rhababer.de', '$2y$10$aQ2X8VjbLC7a34x0bspR8Os.LiBrA54B8LagjF1g2nlr5wqtyCuqm'),
(12, 'Frikadelle', 'Muehlen', '1983-02-15', 10, 'An der Muehle 1834', 'muehel@frikadellen.de', '$2y$10$dHvVr/jE7vD0uQHCEAfU6.M.9vhTklnD4ki4Tz/dkfFG1B32U0mhG'),
(13, 'Wurst', 'Hans', '1993-09-30', 1, 'Wurststrasse 1', 'hans@wurst.de', '$2y$10$3G3dkuOg3h7TIQAEeIM0aeOdIRw27fajcZm/cgb5CX1Bn.BGnWRFi'),
(14, 'Kazuto', 'Kirigaya', '2005-10-07', 11, 'Beater Allee 100', 'kirito@sao.jp', '$2y$10$HPl6qn6uO3e5CKJpXQ7HxuWQWr1FZ1Rdx5Xhlw7xGHP3qM0LBsBl.'),
(15, 'Asuna', 'Yuuki', '2005-09-30', 11, 'Beater Allee 100', 'asuna@sao.jp', '$2y$10$e2ubYD7SfHMORtKAq8CsieSgrxTDI9aJEltCM1hixRRbk8frVQD2m'),
(16, 'Okabe', 'Rintaro', '1991-12-14', 12, 'Hououin Kyouma Strasse 2025', 'okarin@el-psy-congroo.jp', '$2y$10$SeXtju/rZUy07eV2lkwUie9/s3IG2oUAsPN8XvNP3J6EKrDZYhmGS'),
(17, 'Shiba', 'Tatsuya', '1996-11-05', 13, 'Four Leaves Technology 2', 'taurus@silver.jp', '$2y$10$ifzPJK4LL7esR4okltYi4ubfi.lQEW17Xib6OUIYp9ZpSyn4hpsMO'),
(18, 'Elric', 'Edward', '1999-07-14', 14, 'Xerxes 2', 'edward@fullmetal.jp', '$2y$10$N87NKhgcpzbo3N6LVF7A3eX4U0srhHf/NfrS9WLN7szrLFS1FYNGe'),
(19, 'Elric', 'Alphonse', '2000-07-14', 14, 'Xerxes 2', 'alphonse@fullmetal.jp', '$2y$10$4DPVewbuZK3BS2f1yz9pvuk.vkeHBXiRMcfeIALrQZIb0NaMtuFUK'),
(20, 'Lamperouge', 'Lelouch', '1999-12-05', 15, 'Knightmare 99', 'zero@black-knight.jp', '$2y$10$8kSKPV7IHO40gWrTPsLHXu3xMiarrQpAOUzKSjAv8kYVANJnBg0yG');

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

--
-- Dumping data for table `ort`
--

INSERT INTO `ort` (`ID`, `plz`, `stadt`) VALUES
(1, '45678', 'Idiotendorf'),
(2, '01139', 'Dresden'),
(3, '12345', 'Bikini-Bottom'),
(4, '00000', 'Kanto'),
(5, '55555', 'Sandstadt'),
(6, '77777', 'Moskau'),
(7, '65656', 'Hainstadt'),
(8, '69696', 'Israel'),
(9, '20202', 'Erdbeerdorf'),
(10, '01834', 'Ruegenwald'),
(11, '01337', 'Aincrad'),
(12, '05100', 'SERN'),
(13, '02090', 'Yotsuba'),
(14, '32323', 'Resembool'),
(15, '02018', 'Britannia');

-- --------------------------------------------------------

--
-- Table structure for table `regisseur`
--

CREATE TABLE `regisseur` (
  `rID` int(11) NOT NULL COMMENT 'Regisseur ID',
  `name` varchar(128) NOT NULL COMMENT 'Vor- und Nachname'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `regisseur`
--

INSERT INTO `regisseur` (`rID`, `name`) VALUES
(1, 'Makoto Shinkai'),
(2, 'Naoko Yamada'),
(3, 'Tatsuyuki Nagai'),
(4, 'Andrew Stanton'),
(5, 'Steven Spielberg'),
(6, 'Tim Miller'),
(7, 'David Leitch'),
(8, 'Robert Rodriguez'),
(9, 'Peter Jackson'),
(10, 'Jodie Foster'),
(11, 'Wally Pfister'),
(12, 'Quentin Tarantino'),
(13, 'David Fincher'),
(14, 'Benjamin Caron'),
(15, 'Dennis Dugan');

-- --------------------------------------------------------

--
-- Table structure for table `rid_link`
--

CREATE TABLE `rid_link` (
  `ID` int(11) NOT NULL COMMENT 'Normal ID',
  `fk_fID` int(11) NOT NULL COMMENT 'Film ID',
  `fk_rID` int(11) NOT NULL COMMENT 'Regisseur ID'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rid_link`
--

INSERT INTO `rid_link` (`ID`, `fk_fID`, `fk_rID`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(5, 5, 5),
(6, 6, 6),
(7, 7, 7),
(8, 8, 5),
(9, 9, 8),
(10, 10, 9),
(11, 11, 9),
(12, 12, 9),
(13, 13, 8),
(14, 14, 0),
(15, 15, 10),
(16, 16, 11),
(17, 17, 12),
(18, 18, 13),
(19, 19, 14),
(20, 20, 15);

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

--
-- Dumping data for table `schauspieler`
--

INSERT INTO `schauspieler` (`sID`, `name`) VALUES
(1, 'Ryan Reynolds'),
(2, 'Drew Barrymore'),
(3, 'Danny Trejo'),
(4, 'Martin Freeman'),
(5, 'Ben Affleck'),
(6, 'George Clooney'),
(7, 'Johnny Depp'),
(8, 'John Travolta'),
(9, 'Edward Norton'),
(10, 'Benedict Cumberbatch'),
(11, 'Adam Sandler');

-- --------------------------------------------------------

--
-- Table structure for table `sid_link`
--

CREATE TABLE `sid_link` (
  `ID` int(11) NOT NULL COMMENT 'Normal ID',
  `fk_fID` int(11) NOT NULL COMMENT 'Film ID',
  `fk_sID` int(11) NOT NULL COMMENT 'Schauspieler ID'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sid_link`
--

INSERT INTO `sid_link` (`ID`, `fk_fID`, `fk_sID`) VALUES
(1, 6, 1),
(2, 7, 1),
(3, 8, 2),
(4, 9, 3),
(5, 10, 4),
(6, 11, 4),
(7, 12, 4),
(8, 13, 3),
(9, 14, 5),
(10, 15, 6),
(11, 16, 7),
(12, 17, 8),
(13, 18, 9),
(14, 19, 10),
(15, 19, 4),
(16, 20, 11);

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
  MODIFY `eID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Exemplar ID', AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `filme`
--
ALTER TABLE `filme`
  MODIFY `fID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'FilmID', AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `katID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Kategorie ID', AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kat_link`
--
ALTER TABLE `kat_link`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Normal ID', AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `kunden`
--
ALTER TABLE `kunden`
  MODIFY `kID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Kunden ID', AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `mitarbeiter`
--
ALTER TABLE `mitarbeiter`
  MODIFY `aID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Admin ID';

--
-- AUTO_INCREMENT for table `ort`
--
ALTER TABLE `ort`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `regisseur`
--
ALTER TABLE `regisseur`
  MODIFY `rID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Regisseur ID', AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `rid_link`
--
ALTER TABLE `rid_link`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Normal ID', AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `rueckgabe`
--
ALTER TABLE `rueckgabe`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Normal ID';

--
-- AUTO_INCREMENT for table `schauspieler`
--
ALTER TABLE `schauspieler`
  MODIFY `sID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Schauspieler ID', AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sid_link`
--
ALTER TABLE `sid_link`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Normal ID', AUTO_INCREMENT=17;

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
