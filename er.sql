-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016 m. Geg 16 d. 23:54
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `er`
--

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `firma`
--

CREATE TABLE `firma` (
  `pavadinimas` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Sukurta duomenų kopija lentelei `firma`
--

INSERT INTO `firma` (`pavadinimas`) VALUES
('Acer'),
('AlienWare'),
('Apple'),
('Asus'),
('atlaikysnetatominisprogimatech'),
('compaq'),
('DELL'),
('estar'),
('galgeriaunepirkt'),
('Google'),
('grumpycat'),
('HP'),
('jeinesugespomenesiobussustrai'),
('kakava'),
('kebab'),
('kiniskikompai'),
('Lada'),
('lameit'),
('Lempatech'),
('Lenovo'),
('MSI'),
('netnertiekfirmu'),
('Odiga'),
('Pasmusvisadpavasaris'),
('Patysgeriausikompai'),
('Skarbonke'),
('Toshiba'),
('Tranzistorius'),
('vazelinas'),
('zuvedra');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `kietasis_diskas`
--

CREATE TABLE `kietasis_diskas` (
  `firma` varchar(255) COLLATE utf8_lithuanian_ci DEFAULT NULL,
  `modelis` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  `atminties_kiekis` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Sukurta duomenų kopija lentelei `kietasis_diskas`
--

INSERT INTO `kietasis_diskas` (`firma`, `modelis`, `atminties_kiekis`) VALUES
('Samsung', 'g', 1000),
('Samsung', 'g1', 2000),
('Samsung', 'g10', 1000),
('Samsung', 'g11', 1000),
('Samsung', 'g12', 1000),
('Samsung', 'g13', 1000),
('Samsung', 'g14', 1000),
('Samsung', 'g2', 750),
('Samsung', 'g3', 1000),
('Samsung', 'g4', 1000),
('Samsung', 'g5', 1000),
('Samsung', 'g6', 1000),
('Samsung', 'g7', 1000),
('Samsung', 'g8', 1000),
('Samsung', 'g9', 1000),
('WD', 'k', 2000),
('WD', 'k1', 1000),
('WD', 'k10', 2000),
('WD', 'k11', 2000),
('WD', 'k12', 2000),
('WD', 'k13', 2000),
('WD', 'k14', 2000),
('WD', 'k2', 4000),
('WD', 'k3', 2000),
('WD', 'k4', 2000),
('WD', 'k5', 2000),
('WD', 'k6', 2000),
('WD', 'k7', 2000),
('WD', 'k8', 2000),
('WD', 'k9', 2000);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `klientas`
--

CREATE TABLE `klientas` (
  `asmens_kodas` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  `vardas` varchar(255) COLLATE utf8_lithuanian_ci DEFAULT NULL,
  `pavardė` varchar(255) COLLATE utf8_lithuanian_ci DEFAULT NULL,
  `telefono_numeris` int(11) DEFAULT NULL,
  `el_paštas` varchar(255) COLLATE utf8_lithuanian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Sukurta duomenų kopija lentelei `klientas`
--

INSERT INTO `klientas` (`asmens_kodas`, `vardas`, `pavardė`, `telefono_numeris`, `el_paštas`) VALUES
('26007160651', 'a', 'aa', 86666661, 'a@gmail.com'),
('27209188215', 'c', 'cc', 86666663, 'c@gmail.com'),
('27310195561', 'd', 'dd', 86666664, 'd@gmail.com'),
('27411202642', 'e', 'ee', 86666665, 'e@gmail.com'),
('27512211683', 'f', 'ff', 86666666, 'f@gmail.com'),
('28205282162', 'joana', 'Salygaitė', 865558655, 'joana@gmail.com'),
('28403115246', 'n', 'nn', 865555553, 'n@gmail.com'),
('28502112568', 'o', 'oo', 865555554, 'o@gmail.com'),
('28503120002', 'Janina', 'Paulauskaitė', 864828438, 'jan@gmail.com'),
('28601152822', 'p', 'pp', 865555555, 'p@gmail.com'),
('28705140254', 'Fiona', 'Jakauskė', 867582422, 'fija@gmail.com'),
('28904185462', 't', 'tt', 865555558, 't@gmail.com'),
('29202110001', 'Agnė', 'Padagaitė', 864524968, 'agne.padagaite@gmail.com'),
('29308222486', 'x', 'xx', 865558653, 'x@gmail.com'),
('36808171648', 'b', 'bb', 86666662, 'b@gmail.com'),
('37611222156', 'g', 'gg', 86666667, 'g@gmail.com'),
('37710232546', 'h', 'hh', 86666668, 'h@gmail.com'),
('37809242165', 'i', 'ii', 86666669, 'i@gmail.com'),
('37908252145', 'j', 'jj', 86666660, 'j@gmail.com'),
('38007262552', 'k', 'kk', 865555550, 'k@gmail.com'),
('38106272462', 'l', 'll', 865555551, 'l@gmail.com'),
('38304102163', 'm', 'mm', 865555552, 'm@gmail.com'),
('38505155843', 'y', 'yy', 865558654, 'y@gmail.com'),
('38604130003', 'Petras', 'Petrauskas', 865852598, 'piotr@yahoo.com'),
('38702162565', 'r', 'rr', 865555556, 'r@gmail.com'),
('38803172546', 's', 'ss', 865555557, 's@gmail.com'),
('39001100000', 'Jonas', 'Liapas', 864859364, 'lala@gmail.com'),
('39005192668', 'u', 'uu', 865555559, 'u@gmail.com'),
('39006150561', 'Herkus', 'Mantas', 864792588, 'boom@gmail.com'),
('39106202486', 'v', 'vv', 865558651, 'v@gmail.com'),
('39207212162', 'z', 'zz', 865558652, 'z@gmail.com');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `kompiuteris`
--

CREATE TABLE `kompiuteris` (
  `id` int(11) NOT NULL,
  `pagminimo_data` date DEFAULT NULL,
  `atminties_kiekis` int(11) DEFAULT NULL,
  `fk_Procesoriusmodelis` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  `fk_Vaizdo_plokštėmodelis` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  `fk_Kietasis_diskasmodelis` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  `fk_Modelioid` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Sukurta duomenų kopija lentelei `kompiuteris`
--

INSERT INTO `kompiuteris` (`id`, `pagminimo_data`, `atminties_kiekis`, `fk_Procesoriusmodelis`, `fk_Vaizdo_plokštėmodelis`, `fk_Kietasis_diskasmodelis`, `fk_Modelioid`) VALUES
(1, '2015-11-15', 8, 'i5-4550U', '940M', 'g4', 'xxl'),
(2, '2015-02-28', 6, 'i3-4020', '740M', 'k', 'xxl'),
(3, '2016-01-20', 8, 'i5-5415', 'gt710M', 'g1', 'xxl'),
(4, '2015-11-15', 6, 'Atom3-6521', 'GT870', 'k2', 'xxl'),
(5, '2015-06-30', 4, 'M3-6426', 'gtx920', 'g10', 'xxl'),
(6, '2015-03-20', 8, 'i5-5415', 'gt920M', 'k8', 'xxl'),
(7, '2016-01-04', 16, 'i7-6200MQ', 'r7-478', 'k11', 'xxl'),
(8, '2015-03-12', 4, 'celeron 3221', 'gt920M', 'g11', 'xxl'),
(9, '2015-07-20', 6, 'i3-4020', 'gtx880M', 'g9', 'xxl'),
(10, '2015-11-13', 8, 'celeron 4681', 'gtx880M', 'g5', 'xxl'),
(11, '2015-03-13', 8, 'M3-6157', 'gtx880M', 'g4', 'xxl'),
(12, '2015-07-17', 8, 'i5-4550U', 'gt910M', 'g6', 'xxl'),
(13, '2015-08-08', 6, 'celeron 3221', 'GT870', 'k12', 'xxl'),
(14, '2016-02-02', 4, 'Pentium 4300', 'gt710M', 'k3', 'xxl'),
(15, '2015-12-12', 8, 'Pentium 4751', 'gtx880M', 'g2', 'xxl'),
(16, '2015-11-19', 16, 'r4465', 'gt740M', 'k5', 'xxl'),
(17, '2016-03-29', 8, 'M3-6157', 'r9', 'k3', 'xxl'),
(18, '2015-06-20', 8, 'M3-6426', 'gtx900M', 'g4', 'xxl'),
(19, '2016-03-12', 6, 'M3-6005', 'gtx940M', 'k1', 'xxl'),
(20, '2015-05-12', 8, 'celeron 3221', 'gtx880M', 'g9', 'xxl'),
(21, '2015-08-13', 8, 'i3-4020', 'gt740M', 'g3', 'xxl'),
(22, '2015-07-12', 4, 'celeron 3221', '940M', 'k7', 'xxl'),
(23, '2016-02-12', 6, 'celeron 4681', 'gt820M', 'g3', 'xxl'),
(24, '2015-12-14', 8, 'r7484', 'r9', 'k1', 'xxl'),
(25, '0000-00-00', 8, 'i5-5415', 'gt740M', 'g7', 'xxl'),
(26, '2016-01-12', 6, 'Atom3-6541', 'gtx940M', 'k2', 'xxl'),
(27, '2015-04-03', 16, 'celeron 3221', 'gt740M', 'g1', 'xxl'),
(28, '2016-03-12', 32, 'i7-6200MQ', 'gtx940M', 'g10', 'xxl'),
(29, '2015-03-15', 8, 'celeron', 'gt920M', 'g9', 'xxl'),
(30, '2015-06-15', 8, 'celeron 4557', 'gt740M', 'g13', 'xxl');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `modelis`
--

CREATE TABLE `modelis` (
  `pavadinimas` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  `fk_Firmapavadinimas` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Sukurta duomenų kopija lentelei `modelis`
--

INSERT INTO `modelis` (`pavadinimas`, `fk_Firmapavadinimas`) VALUES
('hzrher', 'Acer'),
('stjsth', 'Acer'),
('trjstr', 'Acer'),
('trsgjntx', 'Acer'),
('xxxl', 'Acer'),
('srtsrergd', 'AlienWare'),
('tjrdtj', 'AlienWare'),
('fxnjxtjt', 'Apple'),
('rstjstj', 'Apple'),
('stjts', 'Apple'),
('xxl', 'Apple'),
('ehstt', 'Asus'),
('tsrjsrj', 'Asus'),
('dagwargn', 'compaq'),
('dymtkyd', 'compaq'),
('atentn', 'DELL'),
('hserthesh', 'DELL'),
('ydyjydj', 'DELL'),
('rsnthb', 'Google'),
('nrsth', 'HP'),
('nsztnr', 'HP'),
('srtjsrt', 'HP'),
('gfnsrth', 'Lenovo'),
('rehegrvd', 'MSI'),
('rjtrhzzreh', 'Skarbonke'),
('gfjtr', 'Toshiba'),
('srtjstrm', 'Toshiba'),
('stjtsazt', 'Toshiba'),
('xtjxrh', 'Toshiba'),
('gnxgnt', 'vazelinas');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `nuoma`
--

CREATE TABLE `nuoma` (
  `data` date DEFAULT NULL,
  `kaina` float DEFAULT NULL,
  `grąžinimo_data` date DEFAULT NULL,
  `id_Nuoma` int(11) NOT NULL,
  `fk_Kompiuterisid` int(11) NOT NULL,
  `fk_Klientasasmens_kodas` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Sukurta duomenų kopija lentelei `nuoma`
--

INSERT INTO `nuoma` (`data`, `kaina`, `grąžinimo_data`, `id_Nuoma`, `fk_Kompiuterisid`, `fk_Klientasasmens_kodas`) VALUES
('2015-05-20', 40, '2015-05-28', 1, 9, '39005192668'),
('2015-04-20', 80, '2015-06-08', 2, 8, '38702162565'),
('2015-05-23', 10, '2015-05-30', 3, 7, '38803172546'),
('2015-04-20', 30, '2015-05-15', 4, 6, '37809242165'),
('2015-04-20', 20, '2015-05-20', 5, 5, '27209188215'),
('2015-03-22', 40, '2015-05-20', 6, 4, '37809242165'),
('2015-04-10', 20, '2015-05-23', 7, 3, '26007160651'),
('2015-04-20', 15, '2015-05-13', 8, 2, '28502112568'),
('2015-05-15', 5, '2015-05-20', 9, 10, '39005192668'),
('2015-05-15', 7, '2015-05-28', 10, 1, '28705140254'),
('2015-07-15', 20, '2015-07-20', 11, 28, '39001100000'),
('2015-07-01', 30, '2015-07-15', 12, 26, '38803172546'),
('2015-06-15', 30, '2015-07-15', 13, 13, '29308222486'),
('2015-04-15', 60, '2015-07-15', 14, 13, '28904185462'),
('2015-05-15', 40, '2015-07-15', 15, 14, '39005192668'),
('2015-07-01', 16, '2015-07-30', 16, 26, '28601152822'),
('2015-07-15', 30, '2015-09-15', 17, 5, '28503120002'),
('2015-07-15', 20, '2015-08-15', 18, 23, '37710232546'),
('2015-07-15', 15, '2015-07-30', 19, 22, '38604130003'),
('2015-06-15', 20, '2015-07-28', 20, 21, '38304102163'),
('2015-06-15', 25, '2015-07-20', 21, 20, '39005192668'),
('2015-07-15', 8, '2015-07-20', 22, 19, '39106202486'),
('2015-07-11', 12, '2015-07-30', 23, 18, '39006150561'),
('2015-05-15', 50, '2015-07-15', 24, 17, '39006150561'),
('2015-03-15', 100, '2015-07-15', 25, 16, '28904185462'),
('2015-05-15', 70, '2015-07-15', 26, 15, '39005192668'),
('2015-05-15', 60, '2015-06-05', 27, 14, '39006150561'),
('2015-05-15', 60, '2015-08-15', 28, 13, '37908252145'),
('2015-05-15', 40, '2015-07-15', 29, 12, '28904185462'),
('2015-07-15', 120, '2016-02-15', 30, 11, '38803172546');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `papildoma_paslauga`
--

CREATE TABLE `papildoma_paslauga` (
  `kaina` float DEFAULT NULL,
  `kiekis` int(11) DEFAULT NULL,
  `id_Papildoma_paslauga` int(11) NOT NULL,
  `fk_Pardavimasid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Sukurta duomenų kopija lentelei `papildoma_paslauga`
--

INSERT INTO `papildoma_paslauga` (`kaina`, `kiekis`, `id_Papildoma_paslauga`, `fk_Pardavimasid`) VALUES
(15, 1, 1, 10),
(20, 3, 2, 9),
(26, 3, 3, 8),
(28, 2, 4, 7),
(0, 0, 5, 6),
(15, 2, 6, 4),
(14, 1, 7, 5),
(38, 1, 8, 3),
(40, 4, 9, 2),
(25, 1, 10, 1),
(15, 1, 11, 30),
(30, 3, 12, 29),
(10, 1, 13, 28),
(20, 2, 14, 27),
(15, 3, 15, 26),
(40, 3, 16, 25),
(50, 6, 17, 24),
(30, 2, 18, 23),
(20, 1, 19, 22),
(30, 2, 20, 21),
(30, 1, 21, 20),
(40, 3, 22, 19),
(45, 3, 23, 18),
(35, 3, 24, 17),
(25, 2, 25, 16),
(25, 4, 26, 15),
(15, 3, 27, 14),
(50, 8, 28, 13),
(0, 0, 29, 12),
(30, 2, 30, 11);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `pardavimas`
--

CREATE TABLE `pardavimas` (
  `id` int(11) NOT NULL,
  `data` date DEFAULT NULL,
  `garantija` int(11) DEFAULT NULL,
  `kaina` float DEFAULT NULL,
  `papildomo_draudimo_trukme` int(11) DEFAULT NULL,
  `pratestos_garantijos_trukme` int(11) DEFAULT NULL,
  `draudimo_ir_garantijos_kaina` float DEFAULT NULL,
  `fk_Kompiuterisid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Sukurta duomenų kopija lentelei `pardavimas`
--

INSERT INTO `pardavimas` (`id`, `data`, `garantija`, `kaina`, `papildomo_draudimo_trukme`, `pratestos_garantijos_trukme`, `draudimo_ir_garantijos_kaina`, `fk_Kompiuterisid`) VALUES
(1, '2015-03-30', 2, 300, 0, 0, 0, 3),
(2, '2015-04-03', 2, 340, 0, 0, 0, 17),
(3, '2015-07-27', 2, 400, 0, 0, 0, 8),
(4, '2015-07-27', 2, 450, 0, 0, 0, 7),
(5, '2015-07-27', 3, 400, 1, 0, 20, 5),
(6, '2015-08-05', 2, 404, 1, 1, 30, 14),
(7, '2015-08-14', 2, 420, 1, 0, 22, 1),
(8, '2015-09-03', 2, 500, 2, 2, 50, 19),
(9, '2015-09-22', 3, 500, 1, 2, 40, 28),
(10, '2015-09-23', 1, 530, 1, 3, 45, 29),
(11, '2015-10-21', 2, 542, 1, 2, 30, 27),
(12, '2015-10-23', 2, 504, 0, 0, 0, 9),
(13, '2015-11-26', 3, 600, 0, 0, 0, 23),
(14, '2015-12-30', 3, 652, 0, 0, 0, 26),
(15, '2016-01-20', 2, 1200, 0, 0, 0, 8),
(16, '2016-01-20', 2, 123, 0, 0, 0, 4),
(17, '2016-02-19', 2, 244, 0, 0, 0, 14),
(18, '2016-03-02', 3, 300, 0, 0, 0, 28),
(19, '2016-03-02', 2, 345, 0, 0, 0, 5),
(20, '2016-04-13', 2, 354, 0, 0, 0, 26),
(21, '2015-06-15', 2, 450, 0, 0, 0, 10),
(22, '2016-01-01', 2, 420, 1, 1, 15, 7),
(23, '2015-11-29', 3, 560, 2, 3, 40, 24),
(24, '2015-11-24', 2, 560, 0, 0, 0, 19),
(25, '2016-01-05', 3, 660, 0, 0, 0, 27),
(26, '2015-01-12', 2, 350, 0, 0, 0, 7),
(27, '2015-12-13', 3, 420, 0, 0, 0, 6),
(28, '2015-10-13', 3, 550, 0, 0, 0, 4),
(29, '2015-10-23', 2, 560, 0, 0, 0, 28),
(30, '2016-02-27', 3, 234, 0, 0, 0, 18);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `procesorius`
--

CREATE TABLE `procesorius` (
  `firma` varchar(255) COLLATE utf8_lithuanian_ci DEFAULT NULL,
  `modelis` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  `procesoriaus_taktinis_dažnis` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Sukurta duomenų kopija lentelei `procesorius`
--

INSERT INTO `procesorius` (`firma`, `modelis`, `procesoriaus_taktinis_dažnis`) VALUES
('Intel', 'Atom3-6426', 1.9),
('Intel', 'Atom3-6521', 1),
('Intel', 'Atom3-6541', 1.8),
('Intel', 'celeron', 2.3),
('Intel', 'celeron 3221', 2.4),
('Intel', 'celeron 3721', 2.2),
('Intel', 'celeron 4221', 2.5),
('Intel', 'celeron 4557', 2),
('Intel', 'celeron 4681', 2.4),
('Intel', 'i3-4020', 2),
('Intel', 'i5-4550U', 3.2),
('Intel', 'i5-5415', 3.1),
('Intel', 'i5-5421', 3.2),
('Intel', 'i5-6425', 3.7),
('Intel', 'i7-6200MQ', 3.6),
('Intel', 'M3-6005', 1.2),
('Intel', 'M3-6157', 1.4),
('Intel', 'M3-6426', 2),
('Intel', 'Pentium 4300', 2.4),
('Intel', 'Pentium 4322', 2.6),
('Intel', 'Pentium 4751', 2.6),
('AMD', 'r224', 3),
('AMD', 'r2448', 2.6),
('AMD', 'r4254', 3.6),
('AMD', 'r4465', 2.3),
('AMD', 'r4875', 3.4),
('AMD', 'r7484', 2.1),
('AMD', 'r7524', 3.6),
('AMD', 'r8482', 3.2),
('AMD', 'r8522', 3);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `sąskaita`
--

CREATE TABLE `sąskaita` (
  `nr` int(11) NOT NULL,
  `data` date DEFAULT NULL,
  `fk_Klientasasmens_kodas` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  `fk_kompiuterisid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Sukurta duomenų kopija lentelei `sąskaita`
--

INSERT INTO `sąskaita` (`nr`, `data`, `fk_Klientasasmens_kodas`, `fk_kompiuterisid`) VALUES
(1, '2015-06-30', '28403115246', 30),
(2, '2015-06-30', '28705140254', 29),
(3, '2015-06-30', '36808171648', 28),
(4, '2015-06-30', '39005192668', 27),
(5, '2015-06-30', '39001100000', 26),
(6, '2015-06-30', '37809242165', 25),
(7, '2015-06-30', '39106202486', 24),
(8, '2015-06-30', '37809242165', 23),
(9, '2015-06-30', '28601152822', 22),
(10, '2015-06-30', '28403115246', 21),
(11, '2015-06-30', '37611222156', 20),
(12, '2015-06-30', '38702162565', 19),
(13, '2015-06-30', '37908252145', 18),
(14, '2015-06-30', '37611222156', 17),
(15, '2015-06-30', '39106202486', 16),
(16, '2015-06-30', '27310195561', 15),
(17, '2015-06-30', '37611222156', 14),
(18, '2015-06-30', '27411202642', 13),
(19, '2015-06-30', '28403115246', 12),
(20, '2015-06-30', '27411202642', 11),
(21, '2015-06-30', '28904185462', 10),
(22, '2015-06-30', '38702162565', 9),
(23, '2015-06-30', '39006150561', 8),
(24, '2015-06-30', '38304102163', 7),
(25, '2015-06-30', '38304102163', 6),
(26, '2015-06-30', '37908252145', 5),
(27, '2015-06-30', '38604130003', 4),
(28, '2015-06-30', '28502112568', 3),
(29, '2015-06-30', '27209188215', 2),
(30, '2015-06-30', '37611222156', 1);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `vaizdo_plokštė`
--

CREATE TABLE `vaizdo_plokštė` (
  `firma` varchar(255) COLLATE utf8_lithuanian_ci DEFAULT NULL,
  `modelis` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  `vaizdo_plokštės_atmintis` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Sukurta duomenų kopija lentelei `vaizdo_plokštė`
--

INSERT INTO `vaizdo_plokštė` (`firma`, `modelis`, `vaizdo_plokštės_atmintis`) VALUES
('NVidia', '740M', 2),
('NVidia', '940M', 2),
('NVidia', 'gt540M', 1),
('NVidia', 'gt710M', 1),
('NVidia', 'gt740M', 2),
('NVidia', 'gt820M', 2),
('NVIDIA', 'GT870', 2),
('NVidia', 'gt910M', 2),
('NVidia', 'gt920M', 2),
('NVidia', 'gtx720M', 1),
('NVidia', 'gtx880M', 2),
('NVidia', 'gtx900M', 2),
('NVIDIA', 'gtx920', 4),
('NVidia', 'gtx930M', 2),
('NVidia', 'gtx940M', 4),
('Ati', 'r5-489', 1),
('Ati', 'r5-754', 2),
('Ati', 'r7-468', 2),
('Ati', 'r7-478', 2),
('Ati', 'r9', 2),
('Ati', 'r9-456', 2),
('Ati', 'r9-4873', 2),
('Ati', 'r9-489', 2),
('Ati', 'r9-547', 1),
('Ati', 'r9-577', 2),
('Ati', 'r9-758', 2),
('Ati', 'r9-777', 2),
('Ati', 'r9-792', 4),
('Ati', 'r9-843', 4),
('Ati', 'r9-8947', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `firma`
--
ALTER TABLE `firma`
  ADD PRIMARY KEY (`pavadinimas`);

--
-- Indexes for table `kietasis_diskas`
--
ALTER TABLE `kietasis_diskas`
  ADD PRIMARY KEY (`modelis`);

--
-- Indexes for table `klientas`
--
ALTER TABLE `klientas`
  ADD PRIMARY KEY (`asmens_kodas`);

--
-- Indexes for table `kompiuteris`
--
ALTER TABLE `kompiuteris`
  ADD PRIMARY KEY (`id`),
  ADD KEY `turi` (`fk_Procesoriusmodelis`),
  ADD KEY `fk_Vaizdo_plokštėmodelis` (`fk_Vaizdo_plokštėmodelis`),
  ADD KEY `fk_Kietasis_diskasmodelis` (`fk_Kietasis_diskasmodelis`),
  ADD KEY `fk_Modelioid` (`fk_Modelioid`);

--
-- Indexes for table `modelis`
--
ALTER TABLE `modelis`
  ADD PRIMARY KEY (`pavadinimas`),
  ADD KEY `fk_Firmapavadinimas` (`fk_Firmapavadinimas`);

--
-- Indexes for table `nuoma`
--
ALTER TABLE `nuoma`
  ADD PRIMARY KEY (`id_Nuoma`),
  ADD KEY `fk_Kompiuterisid` (`fk_Kompiuterisid`),
  ADD KEY `fk_Klientasasmens_kodas` (`fk_Klientasasmens_kodas`);

--
-- Indexes for table `papildoma_paslauga`
--
ALTER TABLE `papildoma_paslauga`
  ADD PRIMARY KEY (`id_Papildoma_paslauga`),
  ADD KEY `priskirta` (`fk_Pardavimasid`);

--
-- Indexes for table `pardavimas`
--
ALTER TABLE `pardavimas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `priskirtas` (`fk_Kompiuterisid`);

--
-- Indexes for table `procesorius`
--
ALTER TABLE `procesorius`
  ADD PRIMARY KEY (`modelis`);

--
-- Indexes for table `sąskaita`
--
ALTER TABLE `sąskaita`
  ADD PRIMARY KEY (`nr`),
  ADD KEY `fk_Klientasasmens_kodas` (`fk_Klientasasmens_kodas`),
  ADD KEY `fk_kompiuterisid` (`fk_kompiuterisid`);

--
-- Indexes for table `vaizdo_plokštė`
--
ALTER TABLE `vaizdo_plokštė`
  ADD PRIMARY KEY (`modelis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sąskaita`
--
ALTER TABLE `sąskaita`
  MODIFY `nr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- Apribojimai eksportuotom lentelėm
--

--
-- Apribojimai lentelei `kompiuteris`
--
ALTER TABLE `kompiuteris`
  ADD CONSTRAINT `kompiuteris_ibfk_1` FOREIGN KEY (`fk_Vaizdo_plokštėmodelis`) REFERENCES `vaizdo_plokštė` (`modelis`),
  ADD CONSTRAINT `kompiuteris_ibfk_2` FOREIGN KEY (`fk_Kietasis_diskasmodelis`) REFERENCES `kietasis_diskas` (`modelis`),
  ADD CONSTRAINT `kompiuteris_ibfk_3` FOREIGN KEY (`fk_Modelioid`) REFERENCES `modelis` (`pavadinimas`),
  ADD CONSTRAINT `turi` FOREIGN KEY (`fk_Procesoriusmodelis`) REFERENCES `procesorius` (`modelis`);

--
-- Apribojimai lentelei `modelis`
--
ALTER TABLE `modelis`
  ADD CONSTRAINT `modelis_ibfk_2` FOREIGN KEY (`fk_Firmapavadinimas`) REFERENCES `firma` (`pavadinimas`);

--
-- Apribojimai lentelei `nuoma`
--
ALTER TABLE `nuoma`
  ADD CONSTRAINT `nuoma_ibfk_1` FOREIGN KEY (`fk_Kompiuterisid`) REFERENCES `kompiuteris` (`id`),
  ADD CONSTRAINT `nuoma_ibfk_2` FOREIGN KEY (`fk_Klientasasmens_kodas`) REFERENCES `klientas` (`asmens_kodas`);

--
-- Apribojimai lentelei `papildoma_paslauga`
--
ALTER TABLE `papildoma_paslauga`
  ADD CONSTRAINT `priskirta` FOREIGN KEY (`fk_Pardavimasid`) REFERENCES `pardavimas` (`id`);

--
-- Apribojimai lentelei `pardavimas`
--
ALTER TABLE `pardavimas`
  ADD CONSTRAINT `priskirtas` FOREIGN KEY (`fk_Kompiuterisid`) REFERENCES `kompiuteris` (`id`);

--
-- Apribojimai lentelei `sąskaita`
--
ALTER TABLE `sąskaita`
  ADD CONSTRAINT `sąskaita_ibfk_1` FOREIGN KEY (`fk_Klientasasmens_kodas`) REFERENCES `klientas` (`asmens_kodas`),
  ADD CONSTRAINT `sąskaita_ibfk_2` FOREIGN KEY (`fk_kompiuterisid`) REFERENCES `kompiuteris` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
