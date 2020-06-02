-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 22 Maj 2020, 13:38
-- Wersja serwera: 10.1.26-MariaDB
-- Wersja PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `ai`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klienci`
--

CREATE TABLE `klienci` (
  `id` int(11) NOT NULL,
  `imie` varchar(255) NOT NULL,
  `nazwisko` varchar(255) NOT NULL,
  `pesel` char(11) NOT NULL,
  `miasto` varchar(255) NOT NULL,
  `telefon` char(9) NOT NULL,
  `kod_indeks` char(7) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kolory`
--

CREATE TABLE `kolory` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `kolory`
--

INSERT INTO `kolory` (`id`, `nazwa`) VALUES
(1, 'orginalny'),
(2, 'bialy'),
(3, 'czarny'),
(4, 'niebieski'),
(5, 'czerwony'),
(6, 'zielony');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kontakt`
--

CREATE TABLE `kontakt` (
  `id` int(11) NOT NULL,
  `imie` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `temat` varchar(255) NOT NULL,
  `wiadomosc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `marki`
--

CREATE TABLE `marki` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `marki`
--

INSERT INTO `marki` (`id`, `nazwa`) VALUES
(1, 'Dodge'),
(2, 'Chevrolet'),
(3, 'Lamborghini'),
(4, 'Audi'),
(5, 'Mazda'),
(6, 'Toyota');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `modele`
--

CREATE TABLE `modele` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(255) NOT NULL,
  `id_marki` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `modele`
--

INSERT INTO `modele` (`id`, `nazwa`, `id_marki`) VALUES
(1, 'Viper GTS', 1),
(2, 'Camaro', 2),
(3, 'Aventador', 3),
(4, 'RS4', 4),
(5, '3', 5),
(6, 'Supra MK4', 6);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pojazdy`
--

CREATE TABLE `pojazdy` (
  `id` int(11) NOT NULL,
  `id_modelu` int(11) DEFAULT NULL,
  `id_silnika` int(11) DEFAULT NULL,
  `id_koloru` int(11) NOT NULL,
  `rok_produkcji` int(11) NOT NULL,
  `cena` int(11) NOT NULL,
  `przebieg` int(11) NOT NULL,
  `stan` varchar(255) NOT NULL,
  `opis` text NOT NULL,
  `czy_sprzedano` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `pojazdy`
--

INSERT INTO `pojazdy` (`id`, `id_modelu`, `id_silnika`, `id_koloru`, `rok_produkcji`, `cena`, `przebieg`, `stan`, `opis`, `czy_sprzedano`) VALUES
(1, 1, 1, 1, 2015, 250000, 25000, 'Uzywany', 'Samochod uzywany, byl wykorzystywany do testow na torze w Niemczech \"Zielone Piekielko\"', 1),
(2, 2, 10, 5, 2016, 399999, 5, 'Nowy', 'Nowy samochod z fabryki.', 1),
(3, 3, 3, 3, 2018, 1500001, 2, 'Nowy', 'Nowy samochod z fabryki.', 1),
(4, 4, 8, 4, 2012, 125999, 200000, 'Uzywany', 'Uzywany samochod przez 2 wlascicieli, po wielu lat bezwypadkowej jazdy.', 1),
(5, 5, 4, 3, 2013, 75499, 250000, 'Uzywany', 'Dwoch wlascicieli, kilka stluczek, mechanicznie sprawny.', 1),
(6, 6, 2, 1, 1993, 250000, 157000, 'Uzywany', 'Jeden wlasciciel, samochod mocno zmodyfikowany, glownie na wystawy.', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `silniki`
--

CREATE TABLE `silniki` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(255) NOT NULL,
  `typ_silnika` varchar(255) NOT NULL,
  `moc_silnika` int(11) NOT NULL,
  `pojemnosc_silnika` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `silniki`
--

INSERT INTO `silniki` (`id`, `nazwa`, `typ_silnika`, `moc_silnika`, `pojemnosc_silnika`) VALUES
(1, '1,6 MCR', 'diesel', 120, 1600),
(2, '2JZ', 'benzyna', 1700, 2997),
(3, '1,9 TDI', 'diesel', 150, 1900),
(4, '2.5 T', 'benzyna', 300, 2500),
(5, 'D4D', 'diesel', 180, 2200),
(6, '3.5 TurboDiesel', 'diesel', 375, 3500),
(7, 'v8 5.0 Hyper', 'benzyna', 320, 5000),
(8, 'V8 6.0 turbo', 'benzyna', 550, 6000),
(9, 'V16 10.0', 'benzyna', 1000, 10000),
(10, 'V12 8.0', 'benzyna', 700, 8000);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `transakcje`
--

CREATE TABLE `transakcje` (
  `id` int(11) NOT NULL,
  `id_klienta` int(11) NOT NULL,
  `id_pojazdu` int(11) NOT NULL,
  `data_transakcji` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `klienci`
--
ALTER TABLE `klienci`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kolory`
--
ALTER TABLE `kolory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kontakt`
--
ALTER TABLE `kontakt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marki`
--
ALTER TABLE `marki`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modele`
--
ALTER TABLE `modele`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_marki` (`id_marki`);

--
-- Indexes for table `pojazdy`
--
ALTER TABLE `pojazdy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_modelu` (`id_modelu`),
  ADD KEY `id_silnika` (`id_silnika`),
  ADD KEY `id_koloru` (`id_koloru`);

--
-- Indexes for table `silniki`
--
ALTER TABLE `silniki`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transakcje`
--
ALTER TABLE `transakcje`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_klienta` (`id_klienta`),
  ADD KEY `id_pojazdu` (`id_pojazdu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `klienci`
--
ALTER TABLE `klienci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `kolory`
--
ALTER TABLE `kolory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `kontakt`
--
ALTER TABLE `kontakt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT dla tabeli `marki`
--
ALTER TABLE `marki`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `modele`
--
ALTER TABLE `modele`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `pojazdy`
--
ALTER TABLE `pojazdy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `silniki`
--
ALTER TABLE `silniki`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT dla tabeli `transakcje`
--
ALTER TABLE `transakcje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `modele`
--
ALTER TABLE `modele`
  ADD CONSTRAINT `modele_ibfk_1` FOREIGN KEY (`id_marki`) REFERENCES `marki` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Ograniczenia dla tabeli `pojazdy`
--
ALTER TABLE `pojazdy`
  ADD CONSTRAINT `pojazdy_ibfk_1` FOREIGN KEY (`id_silnika`) REFERENCES `silniki` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `pojazdy_ibfk_2` FOREIGN KEY (`id_modelu`) REFERENCES `modele` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pojazdy_ibfk_3` FOREIGN KEY (`id_koloru`) REFERENCES `kolory` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `transakcje`
--
ALTER TABLE `transakcje`
  ADD CONSTRAINT `transakcje_ibfk_1` FOREIGN KEY (`id_pojazdu`) REFERENCES `pojazdy` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transakcje_ibfk_2` FOREIGN KEY (`id_klienta`) REFERENCES `klienci` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
