-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 20, 2023 at 04:18 PM
-- Server version: 10.6.12-MariaDB-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ltw`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_account`
--

CREATE TABLE `tb_account` (
  `id_account` int(8) NOT NULL,
  `username` varchar(255) NOT NULL,
  `displayname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sesso` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_account`
--

INSERT INTO `tb_account` (`id_account`, `username`, `displayname`, `password`, `email`, `sesso`) VALUES
(1, 'Amministratore', 'Amministratore', '$2y$10$i4zGe3Wo6RwK/XLiFW4V0ODy0OmAg1wo904gE7H.xeS.9t8p8UE2q', 'prova@prova.it', 'M')

-- --------------------------------------------------------

--
-- Table structure for table `tb_allievo`
--

CREATE TABLE `tb_allievo` (
  `id_anagrafica` int(11) NOT NULL,
  `note` varchar(500) DEFAULT '',
  `oresvolte` int(11) NOT NULL DEFAULT 0,
  `id_user_modifica` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_allievo-modulo`
--

CREATE TABLE `tb_allievo-modulo` (
  `id_modulo` int(11) NOT NULL,
  `id_allievo` int(11) NOT NULL,
  `id_user_modifica` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_anagrafica`
--

CREATE TABLE `tb_anagrafica` (
  `id_anagrafica` int(11) NOT NULL,
  `cognome` varchar(255) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `comune_nascita` varchar(255) DEFAULT NULL,
  `provincia_nascita` varchar(100) DEFAULT NULL,
  `data_nascita` varchar(255) DEFAULT NULL,
  `cittadinanza_id` int(6) DEFAULT NULL,
  `provincia_residenza` varchar(255) DEFAULT NULL,
  `comune_residenza` varchar(255) DEFAULT NULL,
  `cap_residenza` varchar(255) DEFAULT NULL,
  `indirizzo_residenza` varchar(255) DEFAULT NULL,
  `cf` varchar(255) DEFAULT NULL,
  `titolo_studio` varchar(255) DEFAULT NULL,
  `web` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `id_user_modifica` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `tb_anagrafica`
--

INSERT INTO `tb_anagrafica` (`id_anagrafica`, `cognome`, `nome`, `comune_nascita`, `provincia_nascita`, `data_nascita`, `cittadinanza_id`, `provincia_residenza`, `comune_residenza`, `cap_residenza`, `indirizzo_residenza`, `cf`, `titolo_studio`, `web`, `email`, `id_user_modifica`) VALUES
(75, 'Belcastro', 'Davide', 'Roma', 'Roma', '29/05/2001', 2, 'Roma', 'Roma', '00166', 'via di casa', 'codice', 'Diploma', 'instagram', 'davide_belcastro@yahoo.it', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_aula`
--

CREATE TABLE `tb_aula` (
  `id_aula` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `indirizzo` varchar(255) NOT NULL,
  `capienza` int(11) DEFAULT 1,
  `disponibilitada` datetime NOT NULL,
  `disponibilitaa` datetime NOT NULL,
  `dtinserimento` datetime NOT NULL DEFAULT current_timestamp(),
  `id_user_modifica` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_aula`
--

INSERT INTO `tb_aula` (`id_aula`, `nome`, `indirizzo`, `capienza`, `disponibilitada`, `disponibilitaa`, `dtinserimento`, `id_user_modifica`) VALUES
(19, 'aula1', 'Viale Regina Elena', 100, '2023-05-19 18:50:23', '2023-05-19 18:50:23', '2023-05-19 18:50:23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_calendario`
--

CREATE TABLE `tb_calendario` (
  `id` int(11) NOT NULL,
  `datestamp` int(11) NOT NULL DEFAULT 0,
  `stimestamp` int(20) DEFAULT NULL,
  `etimestamp` int(20) DEFAULT NULL,
  `resource` varchar(50) DEFAULT NULL,
  `descr` varchar(50) DEFAULT NULL,
  `id_progetto` int(11) NOT NULL,
  `id_corso` int(11) NOT NULL,
  `id_modulo` int(11) DEFAULT NULL,
  `id_docente` int(11) DEFAULT -1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_calendario`
--

INSERT INTO `tb_calendario` (`id`, `datestamp`, `stimestamp`, `etimestamp`, `resource`, `descr`, `id_progetto`, `id_corso`, `id_modulo`, `id_docente`) VALUES
(131, 1684447200, 1684483200, 1684490400, 'aula1', 'teoria', 97, 37, 21, 75);

--
-- Triggers `tb_calendario`
--
DELIMITER $$
CREATE TRIGGER `tr_oreDeleteC` AFTER DELETE ON `tb_calendario` FOR EACH ROW update tb_corso set tb_corso.oreinserite = 
(
    (select sum(tb_corso.oreinserite) from tb_corso where tb_corso.id_corso =old.id_corso) + ((old.etimestamp - old.stimestamp) / 3600 ))
where tb_corso.id_corso = old.id_corso
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_oreDeleteM` AFTER DELETE ON `tb_calendario` FOR EACH ROW update tb_modulo set tb_modulo.oreinserite = 
(
    (select sum(tb_modulo.oreinserite) from tb_modulo where tb_modulo.id_modulo =old.id_modulo) + ((old.etimestamp - old.stimestamp) / 3600 ))
where tb_modulo.id_modulo = old.id_modulo
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_oreDeleteP` AFTER DELETE ON `tb_calendario` FOR EACH ROW update tb_progetto set tb_progetto.numoreinserite = 
(
    (select sum(tb_progetto.numoreinserite) from tb_progetto where tb_progetto.id_progetto = old.id_progetto) - ((old.etimestamp - old.stimestamp) / 3600 ))
where tb_progetto.id_progetto = old.id_progetto
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_oreInseriteC` AFTER INSERT ON `tb_calendario` FOR EACH ROW update tb_corso set tb_corso.oreinserite = 
(
    (select sum(tb_corso.oreinserite) from tb_corso where tb_corso.id_corso =new.id_corso) + ((new.etimestamp - new.stimestamp) / 3600 ))
where tb_corso.id_corso = new.id_corso
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_oreInseriteM` AFTER INSERT ON `tb_calendario` FOR EACH ROW update tb_modulo set tb_modulo.oreinserite = 
(
    (select sum(tb_modulo.oreinserite) from tb_modulo where tb_modulo.id_modulo =new.id_modulo) + ((new.etimestamp - new.stimestamp) / 3600 ))
where tb_modulo.id_modulo = new.id_modulo
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_oreInseriteP` AFTER INSERT ON `tb_calendario` FOR EACH ROW update tb_progetto set tb_progetto.numoreinserite = 
(
    (select sum(tb_progetto.numoreinserite) from tb_progetto where tb_progetto.id_progetto =new.id_progetto) + ((new.etimestamp - new.stimestamp) / 3600 ))
where tb_progetto.id_progetto = new.id_progetto
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_oreUpdateC` AFTER UPDATE ON `tb_calendario` FOR EACH ROW update tb_corso set tb_corso.oreinserite = 
(
    (
        select sum(tb_corso.oreinserite) from tb_corso where   tb_corso.id_corso = new.id_corso)
    
    - ((old.etimestamp - old.stimestamp) / 3600 ))  +   ((new.etimestamp - new.stimestamp) / 3600 )
where tb_corso.id_corso = new.id_corso
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_oreUpdateM` AFTER UPDATE ON `tb_calendario` FOR EACH ROW update tb_modulo set tb_modulo.oreinserite = 
(
    (
        select sum(tb_modulo.oreinserite) from tb_modulo where   tb_modulo.id_modulo = new.id_modulo)
    
    - ((old.etimestamp - old.stimestamp) / 3600 ))  +   ((new.etimestamp - new.stimestamp) / 3600 )
where tb_modulo.id_modulo = new.id_modulo
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_oreUpdateP` AFTER UPDATE ON `tb_calendario` FOR EACH ROW update tb_progetto set tb_progetto.numoreinserite = 
(
    (
        select sum(tb_progetto.numoreinserite) from tb_progetto where   tb_progetto.id_progetto = new.id_progetto)
    
    - ((old.etimestamp - old.stimestamp) / 3600 ))  +   ((new.etimestamp - new.stimestamp) / 3600 )
where tb_progetto.id_progetto = new.id_progetto
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_cittadinanza`
--

CREATE TABLE `tb_cittadinanza` (
  `ID` int(11) NOT NULL,
  `codice_istat` varchar(255) DEFAULT NULL,
  `descrizione_nazione` varchar(255) DEFAULT NULL,
  `descrizione_cittadinanza` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `tb_cittadinanza`
--

INSERT INTO `tb_cittadinanza` (`ID`, `codice_istat`, `descrizione_nazione`, `descrizione_cittadinanza`) VALUES
(1, NULL, NULL, NULL),
(2, '000', 'ITALIA', 'ITALIANA'),
(3, '201', 'ALBANIA', 'ALBANESE'),
(4, '202', 'ANDORRA', 'ANDORRANA'),
(5, '203', 'AUSTRIA', 'AUSTRIACA'),
(6, '206', 'BELGIO', 'BELGA'),
(7, '209', 'BULGARIA', 'BULGARA'),
(8, '212', 'DANIMARCA', 'DANESE'),
(9, '214', 'FINLANDIA', 'FINLANDESE'),
(10, '215', 'FRANCIA', 'FRANCESE'),
(11, '216', 'GERMANIA', 'TEDESCA'),
(12, '219', 'REGNO UNITO', 'BRITANNICA'),
(13, '220', 'GRECIA', 'GRECA'),
(14, '221', 'IRLANDA', 'IRLANDESE'),
(15, '223', 'ISLANDA', 'ISLANDESE'),
(16, '224', 'SERBIA E MONTENEGRO', 'SERBA / MONTENEGRINA'),
(17, '225', 'LIECHTENSTEIN', 'LIECHTENSTEIN'),
(18, '226', 'LUSSEMBURGO', 'LUSSEMBURGHESE'),
(19, '227', 'MALTA', 'MALTESE'),
(20, '229', 'MONACO', 'MONEGASCA'),
(21, '231', 'NORVEGIA', 'NORVEGESE'),
(22, '232', 'PAESI BASSI', 'OLANDESE'),
(23, '233', 'POLONIA', 'POLACCA'),
(24, '234', 'PORTOGALLO', 'PORTOGHESE'),
(25, '235', 'ROMANIA', 'ROMENA'),
(26, '236', 'SAN MARINO', 'SANMARINESE'),
(27, '239', 'SPAGNA', 'SPAGNOLA'),
(28, '240', 'SVEZIA', 'SVEDESE'),
(29, '241', 'SVIZZERA', 'SVIZZERA'),
(30, '243', 'UCRAINA', 'UCRAINA'),
(31, '244', 'UNGHERIA', 'UNGHERESE'),
(32, '245', 'RUSSA, Federazione', 'RUSSA'),
(33, '246', 'SANTA SEDE', 'SANTA SEDE'),
(34, '247', 'ESTONIA', 'ESTONE'),
(35, '248', 'LETTONIA', 'LETTONE'),
(36, '249', 'LITUANIA', 'LITUANA'),
(37, '250', 'CROAZIA', 'CROATA'),
(38, '251', 'SLOVENIA', 'SLOVENA'),
(39, '252', 'BOSNIA-ERZEGOVINA', 'BOSNIACA'),
(40, '253', 'MACEDONIA, ex REP. JUGOSLAVIA', 'MACEDONE'),
(41, '254', 'Moldova', 'Moldova'),
(42, '255', 'SLOVACCHIA', 'SLOVACCA'),
(43, '256', 'BIELORUSSIA', 'BIELORUSSA'),
(44, '257', 'CECA, Repubblica', 'CECA'),
(45, '270', 'MONTENEGRO', 'MONTENEGRINA'),
(46, '271', 'SERBIA', 'SERBA'),
(47, '301', 'AFGHANISTAN', 'AFGHANA'),
(48, '302', 'ARABIA SAUDITA', 'SAUDITA'),
(49, '304', 'BAHREIN', 'BAHREIN'),
(50, '305', 'BANGLADESH', 'BANGLADESH'),
(51, '306', 'BHUTAN', 'BHUTANESE '),
(52, '307', 'MYANMAR', 'BIRMANA'),
(53, '309', 'BRUNEI', 'BRUNEI'),
(54, '310', 'CAMBOGIA', 'CAMBOGIANA'),
(55, '311', 'SRI LANKA', 'CINGALESE'),
(56, '314', 'Cinese, Repubblica Popolare', 'CINESE'),
(57, '315', 'CIPRO', 'CIPRIOTA'),
(58, '319', 'Corea, Repubblica Popolare', 'NORDCOREANA'),
(59, '320', 'Corea, Repubblica', 'SUDCOREANA'),
(60, '322', 'EMIRATI ARABI UNITI', 'EMIRATI ARABI UNITI'),
(61, '323', 'FILIPPINE', 'FILIPPINA'),
(62, '324', 'Territori Autonomia Palestinese', 'PALESTINESE'),
(63, '326', 'GIAPPONE', 'GIAPPONESE'),
(64, '327', 'GIORDANIA', 'GIORDANA'),
(65, '330', 'INDIA', 'INDIANA'),
(66, '331', 'INDONESIA', 'INDONESIANA'),
(67, '332', 'IRAN', 'IRANIANA'),
(68, '333', 'IRAQ', 'IRACHENA'),
(69, '334', 'ISRAELE', 'ISRAELIANA'),
(70, '335', 'KUWAIT', 'KUATIANA'),
(71, '336', 'LAOS', 'LAOTIANA'),
(72, '337', 'LIBANO', 'LIBANESE'),
(73, '338', 'Timor Orientale', 'Timor Orientale'),
(74, '339', 'MALDIVE', 'MALDIVE'),
(75, '340', 'MALAYSIA', 'MALESIANA'),
(76, '341', 'MONGOLIA', 'MONGOLA'),
(77, '342', 'NEPAL', 'NEPALESE'),
(78, '343', 'OMAN', 'OMAN'),
(79, '344', 'PAKISTAN', 'PACHISTANA'),
(80, '345', 'QATAR', 'QATAR'),
(81, '346', 'SINGAPORE', 'SINGAPORE'),
(82, '348', 'SIRIA', 'SIRIANA'),
(83, '349', 'THAILANDIA', 'TAILANDESE'),
(84, '351', 'TURCHIA', 'TURCA'),
(85, '353', 'VIETNAM', 'VIETNAMITA'),
(86, '354', 'YEMEN', 'YEMENITA'),
(87, '356', 'KAZAKHSTAN', 'KAZAKA'),
(88, '357', 'UZBEKISTAN', 'UZBEKA'),
(89, '358', 'ARMENIA', 'ARMENA'),
(90, '359', 'AZERBAIGIAN', 'AZERBAIGIAN'),
(91, '360', 'GEORGIA', 'GEORGIANA'),
(92, '361', 'KIRGHIZISTAN', 'KIRGISA'),
(93, '362', 'TAGIKISTAN', 'TAGIKA'),
(94, '363', 'TAIWAN', 'TAIWAN'),
(95, '364', 'TURKMENISTAN', 'TURKMENA'),
(96, '401', 'ALGERIA', 'ALGERINA'),
(97, '402', 'ANGOLA', 'ANGOLANA'),
(98, '404', 'COSTA D\'AVORIO', 'IVORIANA'),
(99, '406', 'BENIN', 'BENIN'),
(100, '408', 'BOTSWANA', 'BOTSWANA'),
(101, '409', 'BURKINA FASO', 'BURKINA FASO'),
(102, '410', 'BURUNDI', 'BURUNDI'),
(103, '411', 'CAMERUN', 'CAMERUNENSE'),
(104, '413', 'CAPO VERDE', 'CAPOVERDIANA'),
(105, '414', 'Centrafricana, Repubblica', 'Centrafricana, Repubblica'),
(106, '415', 'CIAD', 'CIAD'),
(107, '417', 'COMORE', 'COMORE'),
(108, '418', 'CONGO ', 'CONGOLESE'),
(109, '419', 'EGITTO', 'EGIZIANA'),
(110, '420', 'ETIOPIA', 'ETIOPE'),
(111, '421', 'GABON', 'GABON'),
(112, '422', 'GAMBIA', 'GAMBIA'),
(113, '423', 'GHANA', 'GHANESE'),
(114, '424', 'GIBUTI', 'GIBUTI'),
(115, '425', 'GUINEA', 'GUINEA'),
(116, '426', 'GUINEA BISSAU', 'GUINEA BISSAU'),
(117, '427', 'GUINEA EQUATORIALE', 'GUINEA EQUATORIALE'),
(118, '428', 'KENYA', 'KENIANA'),
(119, '429', 'LESOTHO', 'LESOTHO'),
(120, '430', 'LIBERIA', 'LIBERIANA'),
(121, '431', 'LIBIA', 'LIBICA'),
(122, '432', 'MADAGASCAR', 'MADAGASCAR'),
(123, '434', 'MALAWI', 'MALAWI'),
(124, '435', 'MALI', 'MALI'),
(125, '436', 'MAROCCO', 'MAROCCHINA'),
(126, '437', 'MAURITANIA', 'MAURITANIA'),
(127, '438', 'Mauritius', 'Mauritius'),
(128, '440', 'MOZAMBICO', 'MOZAMBICO'),
(129, '441', 'NAMIBIA', 'NAMIBIA'),
(130, '442', 'NIGER', 'NIGER'),
(131, '443', 'NIGERIA', 'NIGERIANA'),
(132, '446', 'RUANDA', 'RUANDA'),
(133, '448', 'Sao Tome\' e Principe', 'Sao Tom\' e Principe'),
(134, '449', 'Seycelles', 'Seycelles'),
(135, '450', 'SENEGAL', 'SENEGALESE'),
(136, '451', 'SIERRA LEONE', 'SIERRA LEONE'),
(137, '453', 'SOMALIA', 'SOMALA'),
(138, '454', 'SUD AFRICA', 'SUDAFRICANA'),
(139, '455', 'SUDAN', 'SUDANESE'),
(140, '456', 'SWAZILAND', 'SWAZILAND'),
(141, '457', 'TANZANIA', 'TANZANIANA'),
(142, '458', 'TOGO', 'TOGOLESE'),
(143, '460', 'TUNISIA', 'TUNISINA'),
(144, '461', 'UGANDA', 'UGANDESE'),
(145, '463', 'Congo, Rep.Democratica', 'Congo, Rep.Democratica'),
(146, '464', 'ZAMBIA', 'ZAMBESE'),
(147, '465', 'ZIMBABWE', 'ZIMBABWE'),
(148, '466', 'ERITREA', 'ERITREA'),
(149, '503', 'ANTIGUA E BARBUDA', 'ANTIGUA E BARBUDA'),
(150, '505', 'BAHAMAS', 'BAHAMAS'),
(151, '506', 'BARBADOS', 'BARBADOS'),
(152, '507', 'BELIZE', 'BELIZE'),
(153, '509', 'CANADA', 'CANADESE'),
(154, '513', 'COSTA RICA', 'COSTATICANA'),
(155, '514', 'CUBA', 'CUBANA'),
(156, '515', 'DOMINICA', 'DOMINICA'),
(157, '516', 'Dominicana, Repubblica', 'Dominicana, Repubblica'),
(158, '517', 'EL SALVADOR', 'SALVADOREGNA'),
(159, '518', 'GIAMAICA', 'GIAMAICANA'),
(160, '519', 'GRENADA', 'GRENADA'),
(161, '523', 'GUATEMALA', 'GUATEMALTECA'),
(162, '524', 'HAITI', 'HAITIANA'),
(163, '525', 'HONDURAS', 'HONDUREGNA'),
(164, '527', 'MESSICO', 'MESSICANA'),
(165, '529', 'NICARAGUA', 'NICARACUENSE'),
(166, '530', 'PANAMA', 'PANAMENSE'),
(167, '532', 'SAINT LUCIA', 'SAINT LUCIA'),
(168, '533', 'Saint Vincent e Grenadin', 'Saint Vincent e Grenadin'),
(169, '534', 'Saint Kitts e Nevis', 'Saint Kitts e Nevis'),
(170, '536', 'STATI UNITI D\'AMERICA', 'STATUNITENSE'),
(171, '602', 'ARGENTINA', 'ARGENTINA'),
(172, '604', 'BOLIVIA', 'BOLIVIANA'),
(173, '605', 'BRASILE', 'BRASILIANA'),
(174, '606', 'CILE', 'CILENA'),
(175, '608', 'COLOMBIA', 'COLOMBIANA'),
(176, '609', 'ECUADOR', 'ECUADOREGNA'),
(177, '612', 'GUYANA', 'GUYANA'),
(178, '614', 'PARAGUAY', 'PARAGUAIANA'),
(179, '615', 'PERU\'', 'PERUVIANA'),
(180, '616', 'SURINAME', 'SURINAME'),
(181, '617', 'TRINIDAD E TOBAGO', 'TRINIDAD E TOBAGO'),
(182, '618', 'URUGUAY', 'URUGUAIANA'),
(183, '619', 'VENEZUELA', 'VENEZUELANA'),
(184, '701', 'AUSTRALIA', 'AUSTRALIANA'),
(185, '703', 'FIGI', 'FIGI'),
(186, '708', 'KIRIBATI', 'KIRIBATI'),
(187, '712', 'Marshall, Isole', 'Marshall, Isole'),
(188, '713', 'Micronesia, Stati Federati', 'Micronesia, Stati Federati'),
(189, '715', 'NAURU', 'NAURU'),
(190, '719', 'NUOVA ZELANDA', 'NEOZELANDESE'),
(191, '720', 'PALAU', 'PALAU'),
(192, '721', 'PAPUA NUOVA GUINEA', 'PAPUA NUOVA GUINEA'),
(193, '725', 'Salomone, Isole', 'Salomone, Isole'),
(194, '727', 'SAMOA', 'SAMOA'),
(195, '730', 'TONGA', 'TONGA'),
(196, '731', 'TUVALU', 'TUVALU'),
(197, '732', 'VANUATU', 'VANUATU'),
(198, '999', 'APOLIDE', 'APOLIDE');

-- --------------------------------------------------------

--
-- Table structure for table `tb_corso`
--

CREATE TABLE `tb_corso` (
  `id_corso` int(11) NOT NULL,
  `id_progetto` int(11) NOT NULL DEFAULT 0,
  `titolo` varchar(255) DEFAULT '',
  `dtinizio` datetime DEFAULT NULL,
  `dtfine` datetime DEFAULT NULL,
  `orepreviste` double DEFAULT NULL,
  `oreinserite` int(11) DEFAULT 0,
  `orerealizzate` int(11) DEFAULT 0,
  `numallieviprevisti` int(11) DEFAULT NULL,
  `id_user_modifica` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_corso`
--

INSERT INTO `tb_corso` (`id_corso`, `id_progetto`, `titolo`, `dtinizio`, `dtfine`, `orepreviste`, `oreinserite`, `orerealizzate`, `numallieviprevisti`, `id_user_modifica`) VALUES
(36, 98, 'corso1', '2023-05-19 18:47:39', '2023-05-19 18:47:39', 23, 0, 0, 6, 1),
(37, 97, 'corso2', '2023-05-19 18:48:07', '2023-05-19 18:48:07', 34, 14, 2, 45, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_docente`
--

CREATE TABLE `tb_docente` (
  `id_anagrafica` int(11) NOT NULL,
  `note` varchar(500) DEFAULT NULL,
  `oresvolte` double NOT NULL DEFAULT 0,
  `guadagno` double NOT NULL DEFAULT 0,
  `id_user_modifica` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `tb_docente`
--

INSERT INTO `tb_docente` (`id_anagrafica`, `note`, `oresvolte`, `guadagno`, `id_user_modifica`) VALUES
(75, 'docente di informatica', 2, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_docentemodulo`
--

CREATE TABLE `tb_docentemodulo` (
  `id_modulo` int(11) NOT NULL,
  `id_docente` int(11) NOT NULL,
  `costoorario` double NOT NULL DEFAULT 0,
  `id_user_modifica` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_docentemodulo`
--

INSERT INTO `tb_docentemodulo` (`id_modulo`, `id_docente`, `costoorario`, `id_user_modifica`) VALUES
(21, 75, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_entefinanziante`
--

CREATE TABLE `tb_entefinanziante` (
  `id_entefinanziante` int(11) NOT NULL,
  `denominazione` varchar(255) NOT NULL,
  `id_user_modifica` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `tb_entefinanziante`
--

INSERT INTO `tb_entefinanziante` (`id_entefinanziante`, `denominazione`, `id_user_modifica`) VALUES
(41, 'ente2', 1),
(40, 'ente1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_modulo`
--

CREATE TABLE `tb_modulo` (
  `id_modulo` int(11) NOT NULL,
  `id_corso` int(11) NOT NULL DEFAULT 0,
  `titolo` varchar(255) DEFAULT NULL,
  `orepreviste` double DEFAULT NULL,
  `oreinserite` int(11) DEFAULT 0,
  `orerealizzate` int(11) DEFAULT 0,
  `id_user_modifica` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `tb_modulo`
--

INSERT INTO `tb_modulo` (`id_modulo`, `id_corso`, `titolo`, `orepreviste`, `oreinserite`, `orerealizzate`, `id_user_modifica`) VALUES
(20, 36, 'modulo1', 26, 0, 0, 1),
(21, 37, 'modulo2', 45, 14, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_progetto`
--

CREATE TABLE `tb_progetto` (
  `id_progetto` int(11) NOT NULL,
  `id_entefinanziante` int(11) DEFAULT 0,
  `nomeprogetto` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `dtinizio` datetime DEFAULT NULL,
  `dtfine` datetime DEFAULT NULL,
  `numallieviprevisti` int(11) DEFAULT 0,
  `numallievifinali` int(11) DEFAULT 0,
  `numorepreviste` double DEFAULT 0,
  `numorerealizzate` double DEFAULT 0,
  `numoreinserite` int(11) DEFAULT 0,
  `id_user_modifica` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_progetto`
--

INSERT INTO `tb_progetto` (`id_progetto`, `id_entefinanziante`, `nomeprogetto`, `dtinizio`, `dtfine`, `numallieviprevisti`, `numallievifinali`, `numorepreviste`, `numorerealizzate`, `numoreinserite`, `id_user_modifica`) VALUES
(97, 40, 'progetto1', '2023-05-19 18:45:22', '2023-05-19 18:45:22', 100, 0, 50, 2, 2, 1),
(98, 40, 'progetto2', '2023-05-19 18:45:46', '2023-05-19 18:45:46', 12, 0, 200, 0, 0, 1),
(99, 41, 'progetto3', '2023-05-19 18:46:04', '2023-05-19 18:46:04', 45, 0, 23, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_regpresdoc`
--

CREATE TABLE `tb_regpresdoc` (
  `id_pres` int(11) NOT NULL,
  `id_lezione_modulo` int(11) NOT NULL,
  `fine` time NOT NULL,
  `inizio` time NOT NULL,
  `note` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `tb_regpresdoc`
--

INSERT INTO `tb_regpresdoc` (`id_pres`, `id_lezione_modulo`, `fine`, `inizio`, `note`) VALUES
(35, 131, '12:00:00', '10:00:00', 'svolto lezione');

--
-- Triggers `tb_regpresdoc`
--
DELIMITER $$
CREATE TRIGGER `tr_guadagno` AFTER INSERT ON `tb_regpresdoc` FOR EACH ROW update tb_docente set guadagno =
(select guadagno from tb_docente where id_anagrafica = (select id_docente from tb_calendario where tb_calendario.id = new.id_lezione_modulo))
+
((new.fine- new.inizio) /10000) * (select distinct costoorario from tb_docentemodulo where id_docente = (select id_docente from tb_calendario where tb_calendario.id =new.id_lezione_modulo) and id_modulo = (select id_modulo from tb_calendario where tb_calendario.id =new.id_lezione_modulo))
where id_anagrafica = (select id_docente from tb_calendario where tb_calendario.id =new.id_lezione_modulo)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_oreSvolteC` AFTER INSERT ON `tb_regpresdoc` FOR EACH ROW update tb_corso set tb_corso.orerealizzate = 
    (
        select sum(tb_corso.orerealizzate) from tb_corso where tb_corso.id_corso =(select id_corso from tb_calendario where tb_calendario.id = new.id_lezione_modulo))

    
    
   + 
    
    ((
       new.fine  - new.inizio
   
    )/10000)
    
where tb_corso.id_corso =(select id_corso from tb_calendario where tb_calendario.id = new.id_lezione_modulo)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_oreSvolteM` AFTER INSERT ON `tb_regpresdoc` FOR EACH ROW update tb_modulo set tb_modulo.orerealizzate = 
    (
        select sum(tb_modulo.orerealizzate) from tb_modulo where tb_modulo.id_modulo =(select id_modulo from tb_calendario where tb_calendario.id = new.id_lezione_modulo))

    
    
   + 
    
    ((
       new.fine  - new.inizio
   
    )/10000)
    
where tb_modulo.id_modulo =(select id_modulo from tb_calendario where tb_calendario.id = new.id_lezione_modulo)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_oreSvolteP` AFTER INSERT ON `tb_regpresdoc` FOR EACH ROW update tb_progetto set tb_progetto.numorerealizzate = 
    (
        select sum(tb_progetto.numorerealizzate) from tb_progetto where tb_progetto.id_progetto =(select id_progetto from tb_calendario where tb_calendario.id = new.id_lezione_modulo))

    
    
   + 
    
    ((
       new.fine  - new.inizio
   
    )/10000)
    
where tb_progetto.id_progetto =(select id_progetto from tb_calendario where tb_calendario.id = new.id_lezione_modulo)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_oresvolteD` AFTER INSERT ON `tb_regpresdoc` FOR EACH ROW update tb_docente set tb_docente.oresvolte = 
(
    (select sum(tb_docente.oresvolte) from tb_docente where tb_docente.id_anagrafica =(select id_docente from tb_calendario where tb_calendario.id = new.id_lezione_modulo)) + 
    
    (
       new.fine  - new.inizio
   
    )/10000)
    
where tb_docente.id_anagrafica =(select id_docente from tb_calendario where tb_calendario.id = new.id_lezione_modulo)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_regpresenzeanag`
--

CREATE TABLE `tb_regpresenzeanag` (
  `id_regpres` int(11) NOT NULL,
  `id_lezione_modulo` int(11) NOT NULL,
  `id_anagrafica` int(11) DEFAULT NULL,
  `note` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Triggers `tb_regpresenzeanag`
--
DELIMITER $$
CREATE TRIGGER `tr_oresvolte` AFTER INSERT ON `tb_regpresenzeanag` FOR EACH ROW update tb_allievo set tb_allievo.oresvolte = 
(
    (select sum(tb_allievo.oresvolte) from tb_allievo where tb_allievo.id_anagrafica =new.id_anagrafica) + 
    
    ((
        (select etimestamp from tb_calendario where tb_calendario.id = new.id_lezione_modulo) - (select stimestamp from tb_calendario where tb_calendario.id = new.id_lezione_modulo)) / 3600 )
    )
where tb_allievo.id_anagrafica = new.id_anagrafica
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_account`
--
ALTER TABLE `tb_account`
  ADD PRIMARY KEY (`id_account`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tb_allievo`
--
ALTER TABLE `tb_allievo`
  ADD PRIMARY KEY (`id_anagrafica`);

--
-- Indexes for table `tb_allievo-modulo`
--
ALTER TABLE `tb_allievo-modulo`
  ADD PRIMARY KEY (`id_modulo`,`id_allievo`);

--
-- Indexes for table `tb_anagrafica`
--
ALTER TABLE `tb_anagrafica`
  ADD PRIMARY KEY (`id_anagrafica`),
  ADD UNIQUE KEY `cf` (`cf`) USING BTREE;

--
-- Indexes for table `tb_aula`
--
ALTER TABLE `tb_aula`
  ADD PRIMARY KEY (`id_aula`);

--
-- Indexes for table `tb_calendario`
--
ALTER TABLE `tb_calendario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `datestamp` (`datestamp`,`id_modulo`);

--
-- Indexes for table `tb_cittadinanza`
--
ALTER TABLE `tb_cittadinanza`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `codice_istat` (`codice_istat`);

--
-- Indexes for table `tb_corso`
--
ALTER TABLE `tb_corso`
  ADD PRIMARY KEY (`id_corso`),
  ADD UNIQUE KEY `titolo` (`titolo`,`id_progetto`) USING BTREE;

--
-- Indexes for table `tb_docente`
--
ALTER TABLE `tb_docente`
  ADD PRIMARY KEY (`id_anagrafica`);

--
-- Indexes for table `tb_docentemodulo`
--
ALTER TABLE `tb_docentemodulo`
  ADD PRIMARY KEY (`id_modulo`,`id_docente`);

--
-- Indexes for table `tb_entefinanziante`
--
ALTER TABLE `tb_entefinanziante`
  ADD PRIMARY KEY (`id_entefinanziante`) USING BTREE;

--
-- Indexes for table `tb_modulo`
--
ALTER TABLE `tb_modulo`
  ADD PRIMARY KEY (`id_modulo`);

--
-- Indexes for table `tb_progetto`
--
ALTER TABLE `tb_progetto`
  ADD PRIMARY KEY (`id_progetto`);

--
-- Indexes for table `tb_regpresdoc`
--
ALTER TABLE `tb_regpresdoc`
  ADD PRIMARY KEY (`id_pres`),
  ADD UNIQUE KEY `id_lezione_modulo` (`id_lezione_modulo`);

--
-- Indexes for table `tb_regpresenzeanag`
--
ALTER TABLE `tb_regpresenzeanag`
  ADD PRIMARY KEY (`id_regpres`),
  ADD UNIQUE KEY `id_lezione_modulo` (`id_lezione_modulo`,`id_anagrafica`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_account`
--
ALTER TABLE `tb_account`
  MODIFY `id_account` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_anagrafica`
--
ALTER TABLE `tb_anagrafica`
  MODIFY `id_anagrafica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `tb_aula`
--
ALTER TABLE `tb_aula`
  MODIFY `id_aula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_calendario`
--
ALTER TABLE `tb_calendario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `tb_cittadinanza`
--
ALTER TABLE `tb_cittadinanza`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT for table `tb_corso`
--
ALTER TABLE `tb_corso`
  MODIFY `id_corso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tb_entefinanziante`
--
ALTER TABLE `tb_entefinanziante`
  MODIFY `id_entefinanziante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tb_modulo`
--
ALTER TABLE `tb_modulo`
  MODIFY `id_modulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_progetto`
--
ALTER TABLE `tb_progetto`
  MODIFY `id_progetto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `tb_regpresdoc`
--
ALTER TABLE `tb_regpresdoc`
  MODIFY `id_pres` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tb_regpresenzeanag`
--
ALTER TABLE `tb_regpresenzeanag`
  MODIFY `id_regpres` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
