-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas generowania: 11 Cze 2016, 17:52
-- Wersja serwera: 10.1.10-MariaDB
-- Wersja PHP: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `antykwariat`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ksiazki`
--

CREATE TABLE `ksiazki` (
  `id_ksiazki` int(11) NOT NULL,
  `tytul` varchar(25) COLLATE utf8_polish_ci NOT NULL,
  `autor` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `rok` int(11) NOT NULL,
  `cena` decimal(11,2) NOT NULL,
  `opis` varchar(1000) COLLATE utf8_polish_ci NOT NULL,
  `zdjecie` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `id_kategorii` int(11) NOT NULL,
  `dostepnosc` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `ksiazki`
--

INSERT INTO `ksiazki` (`id_ksiazki`, `tytul`, `autor`, `rok`, `cena`, `opis`, `zdjecie`, `id_kategorii`, `dostepnosc`) VALUES
(1, 'Ogniem i Mieczem', 'Henryk Sienkiewicz', 2004, '20.90', 'Ta książka to klasyka.', 'ogniem.jpg', 2, 1),
(2, 'Wiedźmin cz.1', 'Andrzej Sapkowski', 2002, '36.00', 'Druga część przygód Geralta.', 'wiedzminT1.jpg', 1, 1),
(3, 'World of Warcraft', 'King William', 2015, '24.00', 'Książka o Illidanie Stormrage.', 'warcraft.jpg', 1, 1),
(4, 'Pasterska korona', 'Pratchett Terry ', 2010, '26.90', 'Ostatnia powieść ze Świata Dysku.', 'pratchet.jpg', 1, 1),
(5, 'Wiedźmin Czas pogardy', 'Andrzej Sapkowski', 2009, '23.90', 'Nastał czas pogardy, czas miecza i topora.', 'pogardy.jpg', 1, 1),
(6, 'Tom 1. Gra o tron', 'Martin George R. R.', 2010, '30.20', 'Zbliża się kolejna zima, lodowate wichry i mrozy wieją z północy.', 'tron.jpg', 1, 1),
(7, 'Kołek na dachu', 'Hearne Kevin', 2011, '29.90', 'Jak człowiek żyje sobie już dobre dwa tysiące lat, to nie ma mocnych.', 'kolek.jpg', 1, 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `ksiazki`
--
ALTER TABLE `ksiazki`
  ADD PRIMARY KEY (`id_ksiazki`),
  ADD KEY `idkategorii` (`id_kategorii`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `ksiazki`
--
ALTER TABLE `ksiazki`
  MODIFY `id_ksiazki` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `ksiazki`
--
ALTER TABLE `ksiazki`
  ADD CONSTRAINT `ksiazki_ibfk_1` FOREIGN KEY (`id_kategorii`) REFERENCES `kategorie` (`id_kategorii`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
