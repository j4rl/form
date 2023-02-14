-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 14 feb 2023 kl 09:03
-- Serverversion: 10.4.25-MariaDB
-- PHP-version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `brad`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `tblcitat`
--

CREATE TABLE `tblcitat` (
  `id` int(11) NOT NULL,
  `citat` text NOT NULL,
  `sagtav` varchar(255) NOT NULL,
  `in_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `tblcitat`
--

INSERT INTO `tblcitat` (`id`, `citat`, `sagtav`, `in_date`) VALUES
(1, 'Den som bygger en bro, åker ofta själv däröver.', 'Jenny Jarl', '2023-01-24 08:11:08'),
(3, 'Det kommer att finnas ett behov av upp till ca 6 datorer i framtiden', 'Chefen IBM', '2023-01-24 13:20:44'),
(4, 'Hoppas det regnar på dig tills du blir mjuk!', 'Andreas Mustola', '2023-01-27 10:27:51'),
(5, 'Gräffla. En sån man plockar lingon med.', 'Andreas Mustola', '2023-01-27 10:29:02'),
(6, '*Klassen är på studieresa till Danmark och står utomhus på färjedäcket*\r\nHär ligger ledningen mellan Sverige och Danmark. Men ni ser den inte.', 'Lärare på Bergslagsskolan', '2023-01-27 10:30:55'),
(7, 'Just nu har jag alltid varit här.', 'Charlie Jarl', '2023-01-27 10:31:32'),
(8, 'Jag bor inte långt hemifrån', 'Charlie Jarl', '2023-01-27 10:32:00'),
(9, 'Man kan väl inte vilja ha något som är billigt!?', 'Tommi Peuranen', '2023-01-27 10:39:07'),
(10, 'Jag ska såga ned alla hans träd i trädgården!', 'Elev, arg på en lärare', '2023-01-30 12:26:44'),
(11, 'Kan man bara inte ge bort oanvända subnät till en hemlös?', 'Leo', '2023-01-30 13:29:14'),
(13, 'Det är bättre att ha älskat och förlorat än aldrig ha älskat alls.', 'Alfred Lord Tennyson', '2023-01-31 08:50:28'),
(14, 'Livet är som en chokladask, man vet aldrig vad man får.', 'Forrest Gump', '2023-01-31 08:50:28'),
(15, 'Lycka är inte ett bestående tillstånd. Det är en handling.', 'Aristoteles', '2023-01-31 08:50:28'),
(16, 'Tiden läker inte alla sår, men den gör dem mindre värkande.', 'Unknown', '2023-01-31 08:50:28'),
(17, 'Vägen till framgång är alltid under uppbyggnad.', 'Lily Tomlin', '2023-01-31 08:50:28'),
(18, 'Svårigheter är vägen till framgång.', 'Epictetus', '2023-01-31 08:50:28'),
(19, 'Framgång är inte den sista eller enda målet i livet, men en möjlighet för att göra en skillnad.', 'Zig Ziglar', '2023-01-31 08:50:28'),
(20, 'Framgång är inte en destination, det är en resa.', 'Zig Ziglar', '2023-01-31 08:50:28'),
(21, 'Det är inte tillräckligt att göra ditt bästa. Du måste veta vad ditt bästa är.', 'Ghandi', '2023-01-31 08:50:28'),
(22, 'Inget värdefullt i livet kommer lätt, men det är alltid värt ansträngningen.', 'Unknown', '2023-01-31 08:50:28'),
(23, 'Du kan inte vänta på att den perfekta tillfället ska dyka upp. Skapa den själv.', 'Unknown', '2023-01-31 08:50:28'),
(24, 'Om du vill ha en annorlunda framtid, måste du göra något annorlunda idag.', 'Jim Rohn', '2023-01-31 08:50:28'),
(25, 'Du är inte din förflutna. Du är den du väljer att bli.', 'Unknown', '2023-01-31 08:50:28'),
(26, 'Det är bättre att lära från andras misstag än att lära från sina egna.', 'Unknown', '2023-01-31 08:50:28'),
(27, 'Lärdom är det enda verktyget som kan ta oss från förflutnen och forma vår framtid.', 'Jim Rohn', '2023-01-31 08:50:28'),
(28, 'Det är inte hur många gånger du faller som räknas, det är hur många gånger du reser dig igen.', 'Unknown', '2023-01-31 08:50:28'),
(29, 'Du kan inte förändra din förflutna, men du kan forma din framtid.', 'Unknown', '2023-01-31 08:50:28'),
(30, 'Om du vill ha något du aldrig har haft, måste du göra något du aldrig har gjort.', 'Unknown', '2023-01-31 08:50:28'),
(31, 'Det man kommer ihåg efter man glömt det man lärt sig är kunskap.', 'Ellen Key', '2023-02-13 08:14:31'),
(32, 'It is not that you have to be a rocketsurgeon.', 'George Bush', '2023-02-13 08:57:06');

-- --------------------------------------------------------

--
-- Tabellstruktur `tbluser`
--

CREATE TABLE `tbluser` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `realname` varchar(50) NOT NULL,
  `level` int(11) NOT NULL DEFAULT 100
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `tbluser`
--

INSERT INTO `tbluser` (`id`, `username`, `password`, `realname`, `level`) VALUES
(1, 'jlc', 'e19d5cd5af0378da05f63f891c7467af', 'Charlie Jarl', 100),
(2, 'ssc', 'e99a18c428cb38d5f260853678922e03', 'Sigge Scimatar', 352),
(3, 'britt', 'e99a18c428cb38d5f260853678922e03', 'Britt Ekland', 1000);

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `tblcitat`
--
ALTER TABLE `tblcitat`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `tblcitat`
--
ALTER TABLE `tblcitat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT för tabell `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
