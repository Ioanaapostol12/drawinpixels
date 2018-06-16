-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.22-0ubuntu0.16.04.1 - (Ubuntu)
-- Server OS:                    Linux
-- HeidiSQL Version:             9.5.0.5249
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for drawinpixels
CREATE DATABASE IF NOT EXISTS `drawinpixels` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `drawinpixels`;

-- Dumping structure for table drawinpixels.comanda
CREATE TABLE IF NOT EXISTS `comanda` (
  `nr_comanda` int(11) NOT NULL AUTO_INCREMENT,
  `tip_serviciu` varchar(30) NOT NULL,
  `data_preluare` date NOT NULL,
  `data_finalizare` date NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `stare_comanda` varchar(30) NOT NULL,
  `id_curs` int(11) NOT NULL,
  PRIMARY KEY (`nr_comanda`),
  KEY `id_user` (`id_user`),
  KEY `id_curs` (`id_curs`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table drawinpixels.comanda: ~6 rows (approximately)
/*!40000 ALTER TABLE `comanda` DISABLE KEYS */;
INSERT INTO `comanda` (`nr_comanda`, `tip_serviciu`, `data_preluare`, `data_finalizare`, `id_user`, `stare_comanda`, `id_curs`) VALUES
	(1, 'e-learning', '2018-03-01', '2018-03-02', 'ioanaapostol12', 'finalizata', 1),
	(2, 'e-learning', '2018-03-03', '2018-03-04', 'helvigalexandra', 'finalizata', 2),
	(3, 'e-learning', '2018-05-23', '2018-04-24', 'raduandreea', 'finalizata', 4),
	(4, 'e-learning', '2018-04-25', '2018-04-26', 'puiudiana', 'finalizata', 2),
	(5, 'e-learning', '2018-05-02', '2018-05-03', 'manearobert', 'finalizata', 5),
	(6, 'e-learning', '2018-04-30', '2018-05-02', 'ioanaapostol12', 'finalizata', 3);
/*!40000 ALTER TABLE `comanda` ENABLE KEYS */;

-- Dumping structure for table drawinpixels.cursuri
CREATE TABLE IF NOT EXISTS `cursuri` (
  `id_curs` int(11) NOT NULL AUTO_INCREMENT,
  `denumire` varchar(40) NOT NULL,
  `data_aparitie` date NOT NULL,
  `data_modificare` date NOT NULL,
  PRIMARY KEY (`id_curs`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table drawinpixels.cursuri: ~5 rows (approximately)
/*!40000 ALTER TABLE `cursuri` DISABLE KEYS */;
INSERT INTO `cursuri` (`id_curs`, `denumire`, `data_aparitie`, `data_modificare`) VALUES
	(1, 'Expunerea corecta', '2018-02-01', '2018-04-01'),
	(2, 'Reguli de compozitie', '2018-03-01', '2018-04-01'),
	(3, 'Stiluri de fotografie', '2018-03-01', '2018-04-01'),
	(4, 'Creativitatea in fotografie', '2018-03-01', '2018-04-01'),
	(5, 'Alegerea obiectivelor', '2018-03-01', '2018-04-01');
/*!40000 ALTER TABLE `cursuri` ENABLE KEYS */;

-- Dumping structure for table drawinpixels.facturi
CREATE TABLE IF NOT EXISTS `facturi` (
  `nr_factura` int(11) NOT NULL AUTO_INCREMENT,
  `cod_factura` varchar(10) NOT NULL,
  `data` date NOT NULL,
  `pret` int(11) NOT NULL,
  PRIMARY KEY (`nr_factura`)
) ENGINE=InnoDB AUTO_INCREMENT=667 DEFAULT CHARSET=latin1;

-- Dumping data for table drawinpixels.facturi: ~6 rows (approximately)
/*!40000 ALTER TABLE `facturi` DISABLE KEYS */;
INSERT INTO `facturi` (`nr_factura`, `cod_factura`, `data`, `pret`) VALUES
	(111, 'adf111', '2018-03-01', 39),
	(222, 'abc222', '2018-03-03', 85),
	(333, 'dra333', '2018-04-23', 85),
	(444, 'dra444', '2018-04-25', 85),
	(555, 'dra555', '2018-05-02', 125),
	(666, 'daw666', '2018-04-30', 89);
/*!40000 ALTER TABLE `facturi` ENABLE KEYS */;

-- Dumping structure for table drawinpixels.linie comanda
CREATE TABLE IF NOT EXISTS `linie comanda` (
  `id_comanda` varchar(20) NOT NULL,
  `data_realizare` date NOT NULL,
  `pret_total` int(11) NOT NULL,
  `nr_comanda` int(11) NOT NULL,
  `id_curs` int(11) NOT NULL,
  `nr_factura` int(11) NOT NULL,
  PRIMARY KEY (`id_comanda`),
  KEY `nr_comanda` (`nr_comanda`),
  KEY `id_curs` (`id_curs`),
  KEY `nr_factura` (`nr_factura`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table drawinpixels.linie comanda: ~6 rows (approximately)
/*!40000 ALTER TABLE `linie comanda` DISABLE KEYS */;
INSERT INTO `linie comanda` (`id_comanda`, `data_realizare`, `pret_total`, `nr_comanda`, `id_curs`, `nr_factura`) VALUES
	('0001', '2018-03-01', 85, 1, 1, 111),
	('0002', '2018-03-03', 85, 2, 2, 222),
	('0003', '2018-04-23', 85, 4, 4, 333),
	('0004', '2018-04-25', 85, 2, 2, 444),
	('0005', '2018-05-02', 125, 5, 5, 555),
	('0006', '2018-04-30', 89, 3, 3, 666);
/*!40000 ALTER TABLE `linie comanda` ENABLE KEYS */;

-- Dumping structure for table drawinpixels.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `data_singup` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `phone` int(11) DEFAULT NULL,
  `address` text,
  `role` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table drawinpixels.users: ~6 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `password`, `email`, `first_name`, `last_name`, `data_singup`, `phone`, `address`, `role`) VALUES
	(1, 'helvigalexandra', '1234', 'helvigalexandra@gmail.com', 'Alexandra', 'Helvig', '2018-03-03 00:00:00', 764934990, 'Str. Lahovari 4', NULL),
	(2, 'ioanaapostol12', '1234', 'ioanaapostol12@yahoo.com', 'Ioana', 'Apostol', '2018-03-01 00:00:00', 764934980, 'str. Barsanesti 6', NULL),
	(3, 'manearobert', '1234', 'manearobert@yahoo.com', 'Robert', 'Manea', '2018-05-02 00:00:00', 745635982, 'Str. Banu Manta 56', NULL),
	(4, 'puiudiana', '1234', 'puiudiana@gmail.com', 'Diana', 'Puiu', '2018-04-25 00:00:00', 745935698, 'Bd. Preciziei 7', NULL),
	(5, 'raduandreea', '1234', 'raduandreea@yahoo.com', 'Andreea', 'Radu', '2018-04-23 00:00:00', 765649380, 'Str. Mariuca 5', NULL),
	(6, 'admin', 'asdx32', 'u.valentin89@gmail.com', 'Ungureanu', 'Valentin', '2018-06-14 21:59:13', NULL, NULL, 'ROLE_ADMIN');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
