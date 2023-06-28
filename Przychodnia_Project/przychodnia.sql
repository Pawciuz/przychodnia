-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 28 Cze 2023, 23:44
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `przychodnia`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `lekarze`
--

CREATE TABLE `lekarze` (
  `id_lekarza` int(11) NOT NULL,
  `imię` varchar(50) NOT NULL,
  `nazwisko` varchar(50) NOT NULL,
  `Płeć` varchar(1) NOT NULL,
  `PESEL` bigint(11) NOT NULL,
  `Ulica` varchar(50) NOT NULL,
  `Nr_domu` varchar(3) NOT NULL,
  `Nr_lokalu` varchar(3) NOT NULL,
  `Kod_pocztowy` varchar(7) NOT NULL,
  `Miasto` varchar(70) NOT NULL,
  `Specjalizacja` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `lekarze`
--

INSERT INTO `lekarze` (`id_lekarza`, `imię`, `nazwisko`, `Płeć`, `PESEL`, `Ulica`, `Nr_domu`, `Nr_lokalu`, `Kod_pocztowy`, `Miasto`, `Specjalizacja`) VALUES
(3, 'Grzegorz', 'Floryda', 'm', 23131345678, 'Kotowska', '12', '12', '32-123', 'Lublin', 'Chirurgia'),
(4, 'Anna', 'Jantar', 'k', 12313131341, 'Krukowska', '141', '543', '13-123', 'Krasnystaw', 'Alergologia'),
(5, 'Maria', 'Kotek', 'k', 2131313131, 'Kupkowa', '21', '12a', '12-123', 'Krasnystaw', 'Pediatria'),
(6, 'Jerzy', 'Domański', 'm', 12313141414, 'Domańska', '13', '31a', '21-132', 'Świdnik', 'Urologia'),
(7, 'Damian', 'Kuczyński', 'm', 1231341414, 'Polska', '23', '123', '12-123', 'Kraśnik', 'Alergologia'),
(8, 'Krzysztof', 'Ibisz', 'm', 213131313, 'Krokowa', '12', '12a', '21-123', 'Mętów', 'Alergologia'),
(9, 'Julia', 'Bączek', 'k', 1231313141, 'Marudna', '12', '13c', '12-123', 'Wojtków', 'Dermatologia'),
(10, 'Hanna', 'Kozaczek', 'k', 12313141414, 'Krucza', '123', '321', '21-432', 'Korek', 'Diabetologia'),
(11, 'Rafał', 'Bartek', 'm', 2131314141, 'Polakowa', '13', '123', '51-123', 'Hystków', 'Endokrynologia'),
(12, 'Garol', 'Koździewski', 'm', 21313141414, 'Świdnikowa', '12', '412', '12-123', 'Świdnik', 'Ginekologia');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `logowania`
--

CREATE TABLE `logowania` (
  `id_logowanie` int(11) NOT NULL,
  `login` varchar(30) NOT NULL,
  `haslo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `logowania`
--

INSERT INTO `logowania` (`id_logowanie`, `login`, `haslo`) VALUES
(5, 'admin', '25f43b1486ad95a1398e3eeb3d83bc4010015fcc9bedb35b432e00298d5021f7'),
(6, 'maciuś', 'f40e6ebae59a8315904bd6565b75524929431b8a41544263213950848612cff4'),
(7, 'kupka', '04ffd9018a409123ad00e3ec315cd4f782f2adae8f4c3a4fa709df79c4a7f43a'),
(8, 'as', 'f4bf9f7fcbedaba0392f108c59d8f4a38b3838efb64877380171b54475c2ade8'),
(11, 'pawel123', 'd83b5e88057f661b2e95dc3db9b0812edd106cb42f6f6e696adb49ccde332387'),
(12, 'admin', '25f43b1486ad95a1398e3eeb3d83bc4010015fcc9bedb35b432e00298d5021f7'),
(13, 'kacper123', '9077f15b4aaaf62951176bb23653dd5d5a65ac7a0c4b5593de251d96529b30dd'),
(16, 'Playek', 'b03ddf3ca2e714a6548e7495e2a03f5e824eaac9837cd7f159c67b90fb4b7342');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pacjenci`
--

CREATE TABLE `pacjenci` (
  `id_pacjenta` int(11) NOT NULL,
  `Imię` varchar(50) NOT NULL,
  `Nazwisko` varchar(50) NOT NULL,
  `Płeć` varchar(1) NOT NULL,
  `PESEL` bigint(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `Data_urodzenia` date NOT NULL,
  `Ulica` varchar(50) DEFAULT NULL,
  `Nr_domu` varchar(3) DEFAULT NULL,
  `Nr_lokalu` varchar(3) NOT NULL,
  `Kod_pocztowy` varchar(7) NOT NULL,
  `Miasto` varchar(70) NOT NULL,
  `id_logowania` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `pacjenci`
--

INSERT INTO `pacjenci` (`id_pacjenta`, `Imię`, `Nazwisko`, `Płeć`, `PESEL`, `email`, `Data_urodzenia`, `Ulica`, `Nr_domu`, `Nr_lokalu`, `Kod_pocztowy`, `Miasto`, `id_logowania`) VALUES
(2, 'Zuzanna', 'Horodko', 'k', 2147483647, '', '0000-00-00', 'Kwiatek', '43', '50', '23-132', 'Woszczele', 5),
(3, 'Pawel', 'Grądek', 'm', 2147483647, '', '0000-00-00', 'Północna', '43', '50', '21-132', 'Lublin', 5),
(4, 'Cezary', 'Horodko', 'm', 2147483647, '', '0000-00-00', 'Kwiatek', '43', '141', '', '', 5),
(5, 'Zuzanna', 'Horodko', 'm', 2147483647, '', '0000-00-00', 'Kwiatek', '43', '50', '20-131', 'Lublin', 8),
(6, 'Zuzanna', 'Grądek', 'm', 2147483647, '', '0000-00-00', 'Kwiatek', '43', '41a', '21-132', 'Lublin', 7),
(7, 'Pawel', 'Horodko', 'm', 3210313121, 'pawelekhorodko123@gmail.com', '2009-02-20', 'Północna', '43', '12', '23-132', 'Lublin', 11),
(8, 'Zuzanna', 'Grądek', 'm', 3210313121, '', '2021-04-09', 'Kwiatek', '43', '41a', '20-131', 'Woszczele', 5),
(9, 'Kacper', 'Mazurek', 'm', 23131313131, 'kacpermazurek@gmail.com', '2021-05-20', 'Północna', '43', '12', '23-132', 'Lublin', 13),
(11, 'Zuzanna', 'Horodko', 'k', 3210313121, '', '2021-10-20', 'Kwiatek', '43', '51', '20-131', 'Lublin', 16);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wizyty`
--

CREATE TABLE `wizyty` (
  `id_wizyty` int(11) NOT NULL,
  `id_pacjenta` int(11) NOT NULL,
  `id_lekarza` int(11) NOT NULL,
  `Data_wizyty` date NOT NULL,
  `Godzina` varchar(11) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `wizyty`
--

INSERT INTO `wizyty` (`id_wizyty`, `id_pacjenta`, `id_lekarza`, `Data_wizyty`, `Godzina`) VALUES
(1, 2, 4, '2021-04-07', '19:20:02'),
(2, 6, 3, '2021-04-24', '19:20:02'),
(13, 7, 8, '2021-05-26', '14.30'),
(14, 7, 5, '2021-05-15', '14.30'),
(15, 7, 6, '2021-05-18', '10.30'),
(17, 9, 5, '2021-05-21', '15.30'),
(23, 7, 8, '2021-05-21', '12.30'),
(28, 9, 8, '2021-04-28', '16.30'),
(31, 7, 7, '2021-05-15', '11.30'),
(32, 7, 5, '2021-05-06', '10.30'),
(34, 9, 6, '2021-05-20', '7.30'),
(36, 7, 7, '2021-05-25', '13.30'),
(37, 7, 5, '2021-05-21', '13.30'),
(38, 11, 7, '2021-10-23', '10.30'),
(39, 7, 7, '2022-01-20', '7.30');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `lekarze`
--
ALTER TABLE `lekarze`
  ADD PRIMARY KEY (`id_lekarza`);

--
-- Indeksy dla tabeli `logowania`
--
ALTER TABLE `logowania`
  ADD PRIMARY KEY (`id_logowanie`);

--
-- Indeksy dla tabeli `pacjenci`
--
ALTER TABLE `pacjenci`
  ADD PRIMARY KEY (`id_pacjenta`),
  ADD KEY `id_logowania` (`id_logowania`);

--
-- Indeksy dla tabeli `wizyty`
--
ALTER TABLE `wizyty`
  ADD PRIMARY KEY (`id_wizyty`),
  ADD KEY `id_pacjenta` (`id_pacjenta`),
  ADD KEY `id_lekarza` (`id_lekarza`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `lekarze`
--
ALTER TABLE `lekarze`
  MODIFY `id_lekarza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT dla tabeli `logowania`
--
ALTER TABLE `logowania`
  MODIFY `id_logowanie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT dla tabeli `pacjenci`
--
ALTER TABLE `pacjenci`
  MODIFY `id_pacjenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT dla tabeli `wizyty`
--
ALTER TABLE `wizyty`
  MODIFY `id_wizyty` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `wizyty`
--
ALTER TABLE `wizyty`
  ADD CONSTRAINT `wizyty_ibfk_1` FOREIGN KEY (`id_lekarza`) REFERENCES `lekarze` (`id_lekarza`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
