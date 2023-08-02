-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 02 Sie 2023, 19:32
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `baza`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `carassignments`
--

CREATE TABLE `carassignments` (
  `ID_car_ass` int(11) NOT NULL,
  `ID_user` int(11) NOT NULL,
  `ID_car` int(11) NOT NULL,
  `AssignmentStartTime` datetime NOT NULL,
  `AssignmentEndTime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cars`
--

CREATE TABLE `cars` (
  `ID_car` int(11) NOT NULL,
  `model` text COLLATE utf8_polish_ci NOT NULL,
  `info` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `ID_user` int(11) NOT NULL,
  `name` text COLLATE utf8_polish_ci NOT NULL,
  `info` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `carassignments`
--
ALTER TABLE `carassignments`
  ADD PRIMARY KEY (`ID_car_ass`),
  ADD KEY `ID_car` (`ID_car`),
  ADD KEY `ID_user` (`ID_user`);

--
-- Indeksy dla tabeli `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`ID_car`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `carassignments`
--
ALTER TABLE `carassignments`
  MODIFY `ID_car_ass` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `cars`
--
ALTER TABLE `cars`
  MODIFY `ID_car` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `ID_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `carassignments`
--
ALTER TABLE `carassignments`
  ADD CONSTRAINT `carassignments_ibfk_1` FOREIGN KEY (`ID_car`) REFERENCES `cars` (`ID_car`),
  ADD CONSTRAINT `carassignments_ibfk_2` FOREIGN KEY (`ID_user`) REFERENCES `users` (`ID_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
