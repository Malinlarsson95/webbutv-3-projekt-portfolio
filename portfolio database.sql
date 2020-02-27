-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 28 feb 2020 kl 00:08
-- Serverversion: 10.1.37-MariaDB
-- PHP-version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `portfolio`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `studies`
--

CREATE TABLE `studies` (
  `_id` int(11) NOT NULL,
  `school` varchar(124) NOT NULL,
  `educationName` varchar(124) NOT NULL,
  `startDate` varchar(50) NOT NULL,
  `endDate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `studies`
--

INSERT INTO `studies` (`_id`, `school`, `educationName`, `startDate`, `endDate`) VALUES
(3, 'Komvux', 'FÃ¶retagsekonomi 1', '2016/02', '2016/06'),
(4, 'Komvux', 'FÃ¶retagsekonomi 2', '2016/09', '2016/12'),
(5, 'Komvux', 'Specialkoster', '2016/02', '2016/06'),
(6, 'Mittuniversitet', 'Webbutveckling', '2018/09', '2020/06'),
(7, 'Bromangymnasiet', 'Restaurang och livsmedel', '2011/09', '2014/06');

-- --------------------------------------------------------

--
-- Tabellstruktur `websites`
--

CREATE TABLE `websites` (
  `_id` int(11) NOT NULL,
  `siteTitle` varchar(124) NOT NULL,
  `siteUrl` varchar(124) NOT NULL,
  `siteDescription` varchar(500) NOT NULL,
  `createdDate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `websites`
--

INSERT INTO `websites` (`_id`, `siteTitle`, `siteUrl`, `siteDescription`, `createdDate`) VALUES
(9, 'SkogsfÃ¶retaget AB', 'http://studenter.miun.se/~mala1812/dt152g/moment1/', 'Uppgift i kursen &quot;Webbdesign fÃ¶r CMS&quot;. Vi skulle fritt designa om en existerande hemsida. ', '2019/05'),
(10, 'Nonstop Gaming', 'http://studenter.miun.se/~mala1812/dt163g/projekt/index.html', 'Uppgift frÃ¥n kursen &quot;Digital bildbehandling fÃ¶r webben&quot; dÃ¤r vi skulle gÃ¶ra en fiktiv webbshop(utan riktig funktionalitet). All grafik Ã¤ven bilder och symboler skulle vi skapa sjÃ¤lva.', '2019/01'),
(11, 'CafÃ© Lugna HÃ¶rnet', 'http://studenter.miun.se/~mala1812/gd008g/mall/', 'En uppgift frÃ¥n kursen &quot;typografi och form fÃ¶r webben&quot;. Stor fokus pÃ¥ teckensnitt och lÃ¤sbarheten. ', '2018/12'),
(12, 'ArbetsfÃ¶rmedlingens API', 'http://studenter.miun.se/~mala1812/dt084g/projekt/', 'Uppgift i kursen &quot;Introduktion till JavaScript&quot; dÃ¤r jag skulle konsumera ArbetsfÃ¶rmedlingens API sÃ¥ att man kan se lediga jobb pÃ¥ webbplatsen.', '2018/10'),
(13, 'REST WebbtjÃ¤nst', 'http://e3c.se/webbutv/webbutv3/mom5/index.html', 'Uppgift i kursen &quot;Webbutveckling III&quot; dÃ¤r vi skulle skapa en REST webbtjÃ¤nst som lagrar de kurser jag lÃ¤st. Den konsumeras av webbplatsen med JavaScript och gÃ¥r att lÃ¤sa in, radera rad och skapa ny rad.', '2019/11');

-- --------------------------------------------------------

--
-- Tabellstruktur `works`
--

CREATE TABLE `works` (
  `_id` int(11) NOT NULL,
  `workTitle` varchar(124) NOT NULL,
  `workPlace` varchar(124) NOT NULL,
  `startDate` varchar(50) NOT NULL,
  `endDate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `works`
--

INSERT INTO `works` (`_id`, `workTitle`, `workPlace`, `startDate`, `endDate`) VALUES
(7, 'Feriejobb fÃ¶rskola', 'NorrgÃ¥rdens fÃ¶rskola', '2012/06', '2012/07'),
(8, 'VÃ¥rdbitrÃ¤de', 'Lyckbacken', '2013/06', '2015/08'),
(9, 'MÃ¥lare', 'Jo-be fastigheter', '2015/08', '2015/09'),
(10, 'Kock', 'Kostenheten', '2016/01', '2019/09'),
(11, 'BadmintontrÃ¤nare', 'EnÃ¥ngers Badminton', '2018/09', 'PÃ¥gÃ¥ende');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `studies`
--
ALTER TABLE `studies`
  ADD PRIMARY KEY (`_id`);

--
-- Index för tabell `websites`
--
ALTER TABLE `websites`
  ADD PRIMARY KEY (`_id`);

--
-- Index för tabell `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`_id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `studies`
--
ALTER TABLE `studies`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT för tabell `websites`
--
ALTER TABLE `websites`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT för tabell `works`
--
ALTER TABLE `works`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
