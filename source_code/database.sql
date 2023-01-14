-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 14 jan 2023 om 22:36
-- Serverversie: 10.4.25-MariaDB
-- PHP-versie: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hotel`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(500) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(500) NOT NULL,
  `gender` varchar(500) NOT NULL,
  `dob` text NOT NULL,
  `contact` text NOT NULL,
  `address` varchar(500) NOT NULL,
  `image` varchar(2000) NOT NULL,
  `created_on` date NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `fname`, `lname`, `gender`, `dob`, `contact`, `address`, `image`, `created_on`, `group_id`) VALUES
(1, 'admin@admin.com', 'admin@admin.com', 'aa7f019c326413d5b8bcad4314228bcd33ef557f5d81c7cc977f7728156f4357', 'Mister', 'Administrator', 'Male', '', '', '', '', '2018-04-30', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `manage_website`
--

CREATE TABLE `manage_website` (
  `id` int(11) NOT NULL,
  `title` varchar(600) NOT NULL,
  `short_title` varchar(600) NOT NULL,
  `logo` text NOT NULL,
  `footer` text NOT NULL,
  `currency_code` varchar(600) NOT NULL,
  `currency_symbol` varchar(600) NOT NULL,
  `login_logo` text NOT NULL,
  `invoice_logo` text NOT NULL,
  `background_login_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `manage_website`
--

INSERT INTO `manage_website` (`id`, `title`, `short_title`, `logo`, `footer`, `currency_code`, `currency_symbol`, `login_logo`, `invoice_logo`, `background_login_image`) VALUES
(1, '', '', 'logo png.png', '', '', '', 'logo png.png', '', '1 (1).jpg');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `id` int(200) NOT NULL,
  `name` varchar(500) NOT NULL,
  `roomname` varchar(500) NOT NULL,
  `kidno` int(200) NOT NULL,
  `adultno` int(200) NOT NULL,
  `fromdate` date NOT NULL,
  `todate` date NOT NULL,
  `taxamount` int(200) NOT NULL,
  `totalamount` int(200) NOT NULL,
  `paid` int(200) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `tbl_booking`
--

INSERT INTO `tbl_booking` (`id`, `name`, `roomname`, `kidno`, `adultno`, `fromdate`, `todate`, `taxamount`, `totalamount`, `paid`, `created_date`) VALUES
(39, '1', '1,', 0, 1, '2023-01-14', '2023-01-16', 157, 130, 0, '2023-01-14'),
(40, '11', '2,', 0, 1, '2023-01-14', '2023-01-16', 157, 130, 0, '2023-01-14');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_currency`
--

CREATE TABLE `tbl_currency` (
  `id` int(11) NOT NULL,
  `currcode` varchar(50) NOT NULL,
  `currsymbol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `tbl_currency`
--

INSERT INTO `tbl_currency` (`id`, `currcode`, `currsymbol`) VALUES
(1, 'EUR', '€');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `birthdate` date NOT NULL,
  `contact` varchar(200) NOT NULL,
  `address` varchar(300) NOT NULL,
  `created_date` date NOT NULL,
  `comments` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `email`, `gender`, `birthdate`, `contact`, `address`, `created_date`, `comments`) VALUES
(1, 'Daniel Yil', 'danielyil@gmail.com', 'Male', '1985-10-21', '0612345567', 'straatnaam ', '2023-01-07', 'customer wants TV in his room'),
(11, 'Marietje', 'marietje@marietje.nl', 'Female', '2000-01-01', '0640460488', 'straatnaam', '2023-01-11', 'customer likes pizza'),
(14, 'Murat', 'murat@gmail.com', 'Male', '1970-01-01', '061234578', 'straatnaam', '2023-01-13', 'wants piece :)');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_discount`
--

CREATE TABLE `tbl_discount` (
  `id` int(50) NOT NULL,
  `discountname` varchar(50) NOT NULL,
  `percentage` int(50) NOT NULL,
  `expirydate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `tbl_discount`
--

INSERT INTO `tbl_discount` (`id`, `discountname`, `percentage`, `expirydate`) VALUES
(1, 'Flat', 25, '2019-07-27'),
(2, 'upto', 50, '2019-07-31');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_email_config`
--

CREATE TABLE `tbl_email_config` (
  `e_id` int(21) NOT NULL,
  `name` varchar(500) NOT NULL,
  `mail_driver_host` varchar(5000) NOT NULL,
  `mail_port` int(50) NOT NULL,
  `mail_username` varchar(50) NOT NULL,
  `mail_password` varchar(30) NOT NULL,
  `mail_encrypt` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `tbl_email_config`
--

INSERT INTO `tbl_email_config` (`e_id`, `name`, `mail_driver_host`, `mail_port`, `mail_username`, `mail_password`, `mail_encrypt`) VALUES
(1, '<hotal_booking> ', '', 587, '', '', '');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `id` int(100) NOT NULL,
  `bookingid` int(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `datee` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `tbl_payment`
--

INSERT INTO `tbl_payment` (`id`, `bookingid`, `amount`, `datee`) VALUES
(9, 2, 236, '2023-01-14');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_rooms`
--

CREATE TABLE `tbl_rooms` (
  `id` int(50) NOT NULL,
  `floorno` int(50) NOT NULL,
  `roomname` varchar(50) NOT NULL,
  `peradultprice` int(50) NOT NULL,
  `perkidprice` int(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `comments` varchar(300) NOT NULL,
  `bed` varchar(1) NOT NULL DEFAULT '1',
  `shower` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `tbl_rooms`
--

INSERT INTO `tbl_rooms` (`id`, `floorno`, `roomname`, `peradultprice`, `perkidprice`, `color`, `comments`, `bed`, `shower`) VALUES
(1, 0, '0.14', 65, 25, '', '', '2', 0),
(2, 1, '1.11', 65, 25, '', '', '1', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_tax`
--

CREATE TABLE `tbl_tax` (
  `id` int(50) NOT NULL,
  `taxname` varchar(50) NOT NULL,
  `percentage` int(50) NOT NULL,
  `shortcode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `tbl_tax`
--

INSERT INTO `tbl_tax` (`id`, `taxname`, `percentage`, `shortcode`) VALUES
(6, 'Default tax', 21, 'tax21');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `manage_website`
--
ALTER TABLE `manage_website`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `tbl_currency`
--
ALTER TABLE `tbl_currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `tbl_discount`
--
ALTER TABLE `tbl_discount`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `tbl_email_config`
--
ALTER TABLE `tbl_email_config`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexen voor tabel `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `tbl_rooms`
--
ALTER TABLE `tbl_rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `tbl_tax`
--
ALTER TABLE `tbl_tax`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `manage_website`
--
ALTER TABLE `manage_website`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT voor een tabel `tbl_currency`
--
ALTER TABLE `tbl_currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT voor een tabel `tbl_discount`
--
ALTER TABLE `tbl_discount`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `tbl_email_config`
--
ALTER TABLE `tbl_email_config`
  MODIFY `e_id` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT voor een tabel `tbl_rooms`
--
ALTER TABLE `tbl_rooms`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT voor een tabel `tbl_tax`
--
ALTER TABLE `tbl_tax`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
