-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 14 Iun 2018 la 18:22
-- Versiune server: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `drawinpixels`
--

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `comanda`
--

CREATE TABLE `comanda` (
  `nr_comanda` int(11) NOT NULL,
  `tip_serviciu` varchar(30) NOT NULL,
  `data_preluare` date NOT NULL,
  `data_finalizare` date NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `stare_comanda` varchar(30) NOT NULL,
  `id_curs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `comanda`
--

INSERT INTO `comanda` (`nr_comanda`, `tip_serviciu`, `data_preluare`, `data_finalizare`, `id_user`, `stare_comanda`, `id_curs`) VALUES
(1, 'e-learning', '2018-03-01', '2018-03-02', 'ioanaapostol12', 'finalizata', 1),
(2, 'e-learning', '2018-03-03', '2018-03-04', 'helvigalexandra', 'finalizata', 2),
(3, 'e-learning', '2018-05-23', '2018-04-24', 'raduandreea', 'finalizata', 4),
(4, 'e-learning', '2018-04-25', '2018-04-26', 'puiudiana', 'finalizata', 2),
(5, 'e-learning', '2018-05-02', '2018-05-03', 'manearobert', 'finalizata', 5),
(6, 'e-learning', '2018-04-30', '2018-05-02', 'ioanaapostol12', 'finalizata', 3);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `cursuri`
--

CREATE TABLE `cursuri` (
  `id_curs` int(11) NOT NULL,
  `denumire` varchar(40) NOT NULL,
  `data_aparitie` date NOT NULL,
  `data_modificare` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `cursuri`
--

INSERT INTO `cursuri` (`id_curs`, `denumire`, `data_aparitie`, `data_modificare`) VALUES
(1, 'Expunerea corecta', '2018-02-01', '2018-04-01'),
(2, 'Reguli de compozitie', '2018-03-01', '2018-04-01'),
(3, 'Stiluri de fotografie', '2018-03-01', '2018-04-01'),
(4, 'Creativitatea in fotografie', '2018-03-01', '2018-04-01'),
(5, 'Alegerea obiectivelor', '2018-03-01', '2018-04-01');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `facturi`
--

CREATE TABLE `facturi` (
  `nr_factura` int(11) NOT NULL,
  `cod_factura` varchar(10) NOT NULL,
  `data` date NOT NULL,
  `pret` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `facturi`
--

INSERT INTO `facturi` (`nr_factura`, `cod_factura`, `data`, `pret`) VALUES
(111, 'adf111', '2018-03-01', 39),
(222, 'abc222', '2018-03-03', 85),
(333, 'dra333', '2018-04-23', 85),
(444, 'dra444', '2018-04-25', 85),
(555, 'dra555', '2018-05-02', 125),
(666, 'daw666', '2018-04-30', 89);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `linie comanda`
--

CREATE TABLE `linie comanda` (
  `id_comanda` varchar(20) NOT NULL,
  `data_realizare` date NOT NULL,
  `pret_total` int(11) NOT NULL,
  `nr_comanda` int(11) NOT NULL,
  `id_curs` int(11) NOT NULL,
  `nr_factura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `linie comanda`
--

INSERT INTO `linie comanda` (`id_comanda`, `data_realizare`, `pret_total`, `nr_comanda`, `id_curs`, `nr_factura`) VALUES
('0001', '2018-03-01', 85, 1, 1, 111),
('0002', '2018-03-03', 85, 2, 2, 222),
('0003', '2018-04-23', 85, 4, 4, 333),
('0004', '2018-04-25', 85, 2, 2, 444),
('0005', '2018-05-02', 125, 5, 5, 555),
('0006', '2018-04-30', 89, 3, 3, 666);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `utilizatori`
--

CREATE TABLE `utilizatori` (
  `username` varchar(200) NOT NULL,
  `parola` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `prenume` varchar(20) NOT NULL,
  `nume` varchar(20) NOT NULL,
  `data_singup` date NOT NULL,
  `telefon` int(11) NOT NULL,
  `adresa` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `utilizatori`
--

INSERT INTO `utilizatori` (`username`, `parola`, `email`, `prenume`, `nume`, `data_singup`, `telefon`, `adresa`) VALUES
('helvigalexandra', '1234', 'helvigalexandra@gmail.com', 'Alexandra', 'Helvig', '2018-03-03', 764934990, 'Str. Lahovari 4'),
('ioanaapostol12', '1234', 'ioanaapostol12@yahoo.com', 'Ioana', 'Apostol', '2018-03-01', 764934980, 'str. Barsanesti 6'),
('manearobert', '1234', 'manearobert@yahoo.com', 'Robert', 'Manea', '2018-05-02', 745635982, 'Str. Banu Manta 56'),
('puiudiana', '1234', 'puiudiana@gmail.com', 'Diana', 'Puiu', '2018-04-25', 745935698, 'Bd. Preciziei 7'),
('raduandreea', '1234', 'raduandreea@yahoo.com', 'Andreea', 'Radu', '2018-04-23', 765649380, 'Str. Mariuca 5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comanda`
--
ALTER TABLE `comanda`
  ADD PRIMARY KEY (`nr_comanda`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_curs` (`id_curs`);

--
-- Indexes for table `cursuri`
--
ALTER TABLE `cursuri`
  ADD PRIMARY KEY (`id_curs`);

--
-- Indexes for table `facturi`
--
ALTER TABLE `facturi`
  ADD PRIMARY KEY (`nr_factura`);

--
-- Indexes for table `linie comanda`
--
ALTER TABLE `linie comanda`
  ADD PRIMARY KEY (`id_comanda`),
  ADD KEY `nr_comanda` (`nr_comanda`),
  ADD KEY `id_curs` (`id_curs`),
  ADD KEY `nr_factura` (`nr_factura`);

--
-- Indexes for table `utilizatori`
--
ALTER TABLE `utilizatori`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comanda`
--
ALTER TABLE `comanda`
  MODIFY `nr_comanda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cursuri`
--
ALTER TABLE `cursuri`
  MODIFY `id_curs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `facturi`
--
ALTER TABLE `facturi`
  MODIFY `nr_factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=667;

--
-- Restrictii pentru tabele sterse
--

--
-- Restrictii pentru tabele `comanda`
--
ALTER TABLE `comanda`
  ADD CONSTRAINT `comanda_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `utilizatori` (`username`),
  ADD CONSTRAINT `comanda_ibfk_2` FOREIGN KEY (`id_curs`) REFERENCES `cursuri` (`id_curs`);

--
-- Restrictii pentru tabele `linie comanda`
--
ALTER TABLE `linie comanda`
  ADD CONSTRAINT `linie comanda_ibfk_1` FOREIGN KEY (`nr_comanda`) REFERENCES `comanda` (`nr_comanda`),
  ADD CONSTRAINT `linie comanda_ibfk_2` FOREIGN KEY (`id_curs`) REFERENCES `cursuri` (`id_curs`),
  ADD CONSTRAINT `linie comanda_ibfk_3` FOREIGN KEY (`nr_factura`) REFERENCES `facturi` (`nr_factura`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
