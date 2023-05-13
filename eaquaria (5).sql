-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2023 at 06:08 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eaquaria`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `address`, `latitude`, `longitude`) VALUES
(1, '11th Street, Cebu City, Philippines', '10.3405524', '123.9070829'),
(2, '13th Avenue, Cebu City, Philippines', '10.3037528', '123.9103411'),
(3, '14 J. Solon Drive, Cebu City 6000, Philippines', '10.3203582', '123.902555'),
(4, '17 R. Duterte Street, Cebu City 6000, Philippines', '10.3149076', '123.8822221'),
(5, '18 Horseshoe Drive, Cebu City, Philippines', '10.3103537', '123.8813721'),
(6, '2 Diamond Street, Cebu City 6000, Philippines', '10.3238126', '123.9021845'),
(7, '2-14 J. Solon Drive, Cebu City 6000, Philippines', '10.3203582', '123.902555'),
(8, '22 Macopa St., Cebu City, Philippines', '10.2916965', '123.8656139'),
(9, '27 San Antonio road, Cebu City, Philippines', '10.2881668', '123.8738679'),
(10, '29 Pelaez Extension, Cebu City, Philippines', '10.3041811', '123.8970854'),
(11, '2nd St., Cebu City, Philippines', '10.3101812', '123.914807'),
(12, '2nd Street, Cebu City, Cebu, Philippines', '10.3375092', '123.9072416'),
(13, '305 R. Duterte Street, Cebu City, Philippines', '10.3135394', '123.8796542'),
(14, '31-A Vicente Gullas Street, Cebu City 6000, Philippines', '10.2974296', '123.9047994'),
(15, '315 Katipunan Street, Cebu City, Philippines', '10.2990496', '123.8815247'),
(16, '37 Sampaguita Street, Cebu City, Philippines', '10.347041', '123.8900025'),
(17, '3rd Avenue, Cebu City 6000, Philippines', '10.3064153', '123.9145862'),
(18, '3rd Street, Cebu City, Philippines', '10.3375555', '123.9078905'),
(19, '403 Sanciangko Street, Cebu City 6000, Philippines', '10.2962882', '123.8920943'),
(20, '41 King\'s Road North, Cebu City, Philippines', '10.3502537', '123.9103153'),
(21, '42 Wilson Street, Cebu City 6000, Philippines', '10.3337244', '123.9016289'),
(22, '4th Street, Cebu City, Philippines', '10.3086098', '123.8872234'),
(23, '655 Dionisio Jakosalem Street, Cebu City, Philippines', '10.3004531', '123.9015308'),
(24, '82 N. Escario Street, Cebu City 6000, Philippines', '10.3167153', '123.8942925'),
(25, '892 Cebu South Road, Fooda Saversmart, Cebu City, Philippines', '10.2892597', '123.872329'),
(26, '96-F Gorordo Avenue, Cebu City, Philippines', '10.3142573', '123.902032'),
(27, 'A Borres Street, Cebu City, Philippines', '10.2917387', '123.8936765'),
(28, 'A Tormis Street, Cebu City, Philippines', '10.3006304', '123.8893536'),
(29, 'A. Borromeo St, Cebu City, Philippines', '10.2954676', '123.8965157'),
(30, 'A. Borromeo Street, Cebu City, Philippines', '10.2954676', '123.8965157'),
(31, 'A. Climaco Street, Cebu City, Philippines', '10.3136905', '123.8900474'),
(32, 'A. Gabuya Street, Cebu City, Philippines', '10.276382', '123.857859'),
(33, 'A. Lopez Street, Cebu City 6000, Philippines', '10.2993925', '123.8838018'),
(34, 'A. Pigafetta Street, Cebu City, Philippines', '10.2927527', '123.9054369'),
(35, 'A. S. Fortuna Street, Cebu City, Philippines', '10.3407659', '123.9211343'),
(36, 'A. Soriano Avenue, Cebu City, Philippines', '10.3107696', '123.9142853'),
(37, 'A.M Arcilla Road, Cebu City, Philippines', '10.4130579', '123.8945516'),
(38, 'A.Soriano Ave, Cebu City, Philippines', '10.3107696', '123.9142853'),
(39, 'Abad Street, Cebu City, Philippines', '10.3285773', '123.9062947'),
(40, 'Acacia Street, Cebu City, Philippines', '10.3233076', '123.8952202'),
(41, 'Access Path to Highway, Cebu City, Philippines', '10.2810314', '123.8600632'),
(42, 'Access Road, Cebu City, Philippines', '10.2946893', '123.8722965'),
(43, 'Adelfa, Cebu City, Philippines', '10.3104286', '123.8905289'),
(44, 'Adlawon, Cebu City, Philippines', '10.4406378', '123.869035'),
(45, 'Andres Abellana Street, Cebu City, Philippines', '10.319846', '123.8867578'),
(46, 'Apas, Cebu City, Philippines', '10.3376616', '123.9079235'),
(47, 'Apitong Street, Cebu City, Philippines', '10.3197668', '123.9024326'),
(48, 'Approach Road - University of Cebu Mambaling Maritiem Campus, Cebu City, Philippines', '10.2860229', '123.8789712'),
(49, 'Archbishop Reyes Avenue, Cebu City, Philippines', '10.3208657', '123.9041927'),
(50, 'Arlington Pond Street, Cebu City, Philippines', '10.3071266', '123.8941982'),
(51, 'Ascencion Street, Cebu City, Philippines', '10.3037957', '123.8932615'),
(52, 'Atillo Compound, Cebu City, Philippines', '10.2960002', '123.8757673'),
(53, 'Ayala Center Cebu PUJ Terminal, Cardinal Rosales Avenue, Cebu Business Park Waste Water Treatment Fa', '10.31754', '123.9057056'),
(54, 'Ayala Center Cebu PUJ Terminal, Cardinal Rosales Avenue, Cebu City 6000, Philippines', '10.317219', '123.9052885'),
(55, 'Ayala Public Utility Vehicle Terminal, Archbishop Reyes Avenue, Cebu Business Park, Cebu City, Phili', '10.318864', '123.9035148'),
(56, 'Ayala Public Utility Vehicle Terminal, Archbishop Reyes Avenue, Cebu City, Philippines', '10.318864', '123.9035148'),
(57, 'Ayala Road, Cebu Business Park Waste Water Treatment Facility, Cebu City, Philippines', '10.3141501', '123.9044684'),
(58, 'Ayala Road, Cebu City, Philippines', '10.3141501', '123.9044684'),
(59, 'Ayala Terminal, Archbishop Reyes Avenue, Cebu City, Philippines', '10.3191673', '123.9033763'),
(60, 'B Avenue, Cebu City, Philippines', '10.3497777', '123.9134484'),
(61, 'B. Aranas Street, Cebu City, Philippines', '10.2947327', '123.8893743'),
(62, 'B. Benedicto Street, Cebu City 6000, Philippines', '10.30351', '123.9094037'),
(63, 'B. Rodriguez Street, Cebu City, Philippines', '10.3082014', '123.88966'),
(64, 'B. Tumulak Street, Cebu City, Philippines', '10.4338207', '123.8757706'),
(65, 'B. Zubiri Street, Cebu City, Philippines', '10.2988337', '123.8804828'),
(66, 'Babag, Cebu City, Philippines', '10.3770829', '123.8550829'),
(67, 'Bacayan, Cebu City, Philippines', '10.3835968', '123.9220336'),
(68, 'Balagtas Street, Cebu City, Philippines', '10.2956118', '123.8937969'),
(69, 'Balintawak, Cebu City, Philippines', '10.295348', '123.8986346'),
(70, 'Balud St, Cebu City, Philippines', '10.2912887', '123.8727151'),
(71, 'Banilad, Cebu City, Philippines', '10.3506292', '123.9135389'),
(72, 'Banilad-Talamban Flyover, Cebu City, Philippines', '10.3433361', '123.9122937'),
(73, 'Banogon Street, Cebu City, Philippines', '10.3370976', '123.9051881'),
(74, 'Bantayan Road, Cebu City, Philippines', '10.3137241', '123.9048316'),
(75, 'Barangay San Jose, Cebu City, Philippines', '10.3790811', '123.9128253'),
(76, 'Barangay Tisa, Cebu City, Philippines', '10.301553', '123.870527'),
(77, 'Baron Lane, Cebu City, Philippines', '10.3173866', '123.880586'),
(78, 'Basak San Nicolas, Cebu City, Philippines', '10.2871901', '123.8704301'),
(79, 'Basilica Menore Del Santo Nino, Cebu City, Philippines', '10.2940663', '123.9021044'),
(80, 'Bauhinia Drive, Cebu City, Philippines', '10.3283666', '123.9112544'),
(81, 'Bayabas Extn, Cebu City, Philippines', '10.2933235', '123.8734202'),
(82, 'Belgium Street, Cebu City 6000, Philippines', '10.2895059', '123.8941652'),
(83, 'Biliran Road, Cebu Business Park Waste Water Treatment Facility, Cebu City, Philippines', '10.318991', '123.906173'),
(84, 'Biliran Road, Cebu City, Philippines', '10.318991', '123.906173'),
(85, 'Bohol Avenue, Cebu Business Park Waste Water Treatment Facility, Cebu City, Philippines', '10.3184635', '123.9037204'),
(86, 'Bohol Avenue, Cebu City, Philippines', '10.3184635', '123.9037204'),
(87, 'Bonbon - Sudlon 2 Barangay Road, Cebu City, Philippines', '10.3700154', '123.8193951'),
(88, 'Bonbon, Cebu City, Philippines', '10.3673295', '123.8355465'),
(89, 'Budlaan, Cebu City, Philippines', '10.3800111', '123.8913539'),
(90, 'Buhisan Road, Cebu City, Philippines', '10.2982562', '123.8647316'),
(91, 'Bulacao, Cebu City, Philippines', '10.2722832', '123.8536876'),
(92, 'Busay, Cebu City, Philippines', '10.3641103', '123.882985'),
(93, 'C. Arellano Boulevard, Cebu City, Cebu, Philippines', '10.2995857', '123.9103564'),
(94, 'C. Arellano Boulevard, Cebu City, Philippines', '10.2995857', '123.9103564'),
(95, 'C. Mina Street, Cebu City, Philippines', '10.3141184', '123.9134592'),
(96, 'C. Oporto, Cebu City, Philippines', '10.4440706', '123.8890626'),
(97, 'C. Rosal Street, Cebu City, Philippines', '10.3207323', '123.9009227'),
(98, 'Cabangahan Road, Cebu City, Philippines', '10.4047512', '123.9259897'),
(99, 'Cabarrubias st., Cebu City, Philippines', '10.2998511', '123.8719691'),
(100, 'Calamba, Cebu City, Philippines', '10.3029443', '123.8850773'),
(101, 'Calambe Cemetery, Cebu City, Philippines', '10.303359', '123.8860447'),
(102, 'Camia Street, Cebu City, Philippines', '10.3154889', '123.8930966'),
(103, 'Camotes Road, Cebu City, Philippines', '10.3158987', '123.9095874'),
(104, 'Camp Lapulapu Road, Cebu City, Philippines', '10.3410297', '123.9076589'),
(105, 'Camputhaw, Cebu City, Philippines', '10.3155742', '123.8955381'),
(106, 'Candido Padilla Street, Cebu City, Philippines', '10.2929555', '123.8859488'),
(107, 'Capitol Compound Road, Cebu City 6000, Philippines', '10.317413', '123.8911781'),
(108, 'Capitol Site, Cebu City, Philippines', '10.3143431', '123.8906566'),
(109, 'Cardinal Rosales Avenue, Cebu Business Park Waste Water Treatment Facility, Cebu City, Philippines', '10.313674', '123.909342'),
(110, 'Cardinal Rosales Avenue, Cebu City, Cebu, Philippines', '10.31752', '123.9073363'),
(111, 'Cardinal Rosales Avenue, Cebu City, Philippines', '10.31752', '123.9073363'),
(112, 'Carreta, Cebu City, Philippines', '10.3097859', '123.9087868'),
(113, 'Cebu Business Park, Cebu City, Philippines', '10.3173504', '123.9059978'),
(114, 'Cebu City Hall, Cebu City, Philippines', '10.2929349', '123.9015526'),
(115, 'Cebu City Medical Center, Cebu City, Philippines', '10.2979499', '123.8920902'),
(116, 'Cebu City, Philippines', '10.3156992', '123.8854366'),
(117, 'Cebu Doctors University Hospital, Cebu City, Philippines', '10.3144559', '123.8920288'),
(118, 'Cebu I.T. Park, Apas, Cebu City, Philippines', '10.3304499', '123.9073923'),
(119, 'Cebu IT Park, Cebu City, Philippines', '10.3304499', '123.9073923'),
(120, 'Cebu Metropolitan Cathedral, Cebu City, Philippines', '10.2955765', '123.9029952'),
(121, 'Cebu Park District, Cebu City, Philippines', '10.3138378', '123.9054313'),
(122, 'Cebu Provincial Capitol, Cebu City, Cebu, Philippines', '10.3168489', '123.8906336'),
(123, 'Cebu Provincial South Bus Terminal, Cebu City, Philippines', '10.2976322', '123.8934881'),
(124, 'Cebu South Coastal Road, Cebu City, Philippines', '10.2752191', '123.8800898'),
(125, 'Cebu South Road Properties, Cebu City, Philippines', '10.2700647', '123.8742644'),
(126, 'Cebu South Road, Cebu City, Cebu, Philippines', '10.2747242', '123.8505238'),
(127, 'Cebu South Road, Cebu City, Philippines', '10.2747242', '123.8505238'),
(128, 'Cebu Tops Road, Cebu City, Philippines', '10.3746303', '123.870819'),
(129, 'Cebu Transcentral Highway, Cebu City, Philippines', '10.4101054', '123.8283213'),
(130, 'Cebu Veterans Drive, Cebu City, Philippines', '10.3436859', '123.8939261'),
(131, 'Cebu-Mactan Ferry Terminal, Pier 3, Cebu City, Philippines', '10.2971645', '123.9111257'),
(132, 'Citi Park, Cebu City, Cebu, Philippines', '10.325736', '123.916709'),
(133, 'City Hall Lane, Cebu City, Philippines', '10.2929349', '123.9015526'),
(134, 'Cogon Ramos, Cebu City, Philippines', '10.3086946', '123.8976302'),
(135, 'Cogon, Cebu City, Philippines', '10.2746116', '123.8598049'),
(136, 'Colon Street, Cebu City, Cebu, Philippines', '10.2967423', '123.8990289'),
(137, 'Colon Street, Cebu City, Philippines', '10.2967423', '123.8990289'),
(138, 'Colonnade Super Market, Cebu City, Philippines', '10.2971613', '123.8999591'),
(139, 'Colorado Street, Cebu City, Philippines', '10.2798022', '123.8489512'),
(140, 'CSCR Tunnel, Cebu City, Philippines', '10.2921561', '123.9042286'),
(141, 'D. Jakosalem Street, Cebu City, Philippines', '10.3023118', '123.9005693'),
(142, 'D.Jakosalem St, Cebu City, Philippines', '10.3023118', '123.9005693'),
(143, 'Daffodil Street, Cebu City, Philippines', '10.3913628', '123.9174194'),
(144, 'Dapdap st., Cebu City, Philippines', '10.2907121', '123.8716274'),
(145, 'Day-as, Cebu City, Philippines', '10.3021715', '123.9018141'),
(146, 'Dept of Foreign Affairs, Cebu City, Philippines', '10.2939933', '123.9038796'),
(147, 'Diamond Street, Cebu City, Philippines', '10.3029888', '123.8719064'),
(148, 'Dionisio Jakosalem Street, Cebu City, Cebu, Philippines', '10.3023118', '123.9005693'),
(149, 'Dionisio Jakosalem Street, Cebu City, Philippines', '10.3023118', '123.9005693'),
(150, 'Don Gil Garcia Street, Cebu City, Cebu, Philippines', '10.314563', '123.8907315'),
(151, 'Don Gil Garcia Street, Cebu City, Philippines', '10.314563', '123.8907315'),
(152, 'Don Jose Avila Street, Cebu City, Philippines', '10.315032', '123.8920273'),
(153, 'Don Julio Llorente Street, Cebu City, Philippines', '10.311072', '123.8919835'),
(154, 'Don Mariano Cui Street, Cebu City, Philippines', '10.312576', '123.8909273'),
(155, 'Do¤a Modesta Gaisano Street, Cebu City, Philippines', '10.3301953', '123.8933654'),
(156, 'Dr Pablo U. Abella Street, Cebu City, Philippines', '10.3074631', '123.881439'),
(157, 'Dr. Jose Ses Reyes Street, Cebu City, Philippines', '10.3205857', '123.8984377'),
(158, 'Dr. Pablo U. Abella St, Cebu City, Philippines', '10.3074631', '123.881439'),
(159, 'Duljo, Cebu City, Philippines', '10.292778', '123.8843799'),
(160, 'E Sabellano Street, Cebu City, Philippines', '10.2887262', '123.8585634'),
(161, 'Echavez Extension, Cebu City, Philippines', '10.304902', '123.898927'),
(162, 'Edison Street, Cebu City, Philippines', '10.3315516', '123.9011532'),
(163, 'El Filibusterismo Street, Cebu City, Philippines', '10.2924882', '123.8970427'),
(164, 'Elizabeth Pond Street, Cebu City, Philippines', '10.3141382', '123.896293'),
(165, 'Emerald, Cebu City, Philippines', '10.3362564', '123.9162017'),
(166, 'Emilio Osme¤a Street, Cebu City, Philippines', '10.318264', '123.8864453'),
(167, 'Ermita, Cebu City, Philippines', '10.2918161', '123.8976302'),
(168, 'Esca¤o Street, Cebu City, Philippines', '10.3156992', '123.8854366'),
(169, 'Extension Road to Tabukanal, Cebu City, Cebu, Philippines', '10.2793236', '123.8593408'),
(170, 'F Villa Street, Cebu City, Philippines', '10.3036115', '123.9054422'),
(171, 'F. Cabahug Street, Cebu City, Cebu, Philippines', '10.3241604', '123.9150873'),
(172, 'F. Cabahug Street, Cebu City, Philippines', '10.3241604', '123.9150873'),
(173, 'F. Calderon Street, Cebu City, Philippines', '10.2917189', '123.8983101'),
(174, 'F. Gochan St., Cebu City, Philippines', '10.3200307', '123.9150336'),
(175, 'F. Gonzales Street, Cebu City, Philippines', '10.293587', '123.900532'),
(176, 'F. Jaca Street, Cebu City 6000, Philippines', '10.2740898', '123.8568914'),
(177, 'F. Manalo Street, Cebu City, Philippines', '10.3127739', '123.8991925'),
(178, 'F. Pacana Street, Cebu City, Philippines', '10.2989936', '123.8751091'),
(179, 'F. Rallos Street, Cebu City, Philippines', '10.2924147', '123.8942787'),
(180, 'F. Ramos Ext., Cebu City, Philippines', '10.3127029', '123.8933976'),
(181, 'F. Ramos Street, Cebu City 6000, Philippines', '10.3069957', '123.8965369'),
(182, 'F. Urdaneta Street, Cebu City, Philippines', '10.2952644', '123.9044362'),
(183, 'F.Jaca, Cebu City, Philippines', '10.2740898', '123.8568914'),
(184, 'Fairlane Village Road, Cebu City, Philippines', '10.3217485', '123.8832823'),
(185, 'Felimon Caburnay Street, Cebu City, Philippines', '10.2989498', '123.8678911'),
(186, 'Filimon Sotto Drive, Cebu City, Philippines', '10.3131543', '123.9008019'),
(187, 'First Street, Cebu City, Philippines', '10.3155579', '123.8801233'),
(188, 'Fooda Saversmart, Fooda, Cebu City, Philippines', '10.311667', '123.898497'),
(189, 'Francisco Llamas St., Cebu City, Philippines', '10.2955481', '123.8698331'),
(190, 'Francisco Llamas Street, Cebu City, Philippines', '10.2955481', '123.8698331'),
(191, 'Friendship Street, Cebu City, Philippines', '10.3286397', '123.8917118'),
(192, 'Fuente Osme¤a Circle, Cebu City, Cebu, Philippines', '10.3102031', '123.8936769'),
(193, 'Fuente Osme¤a Circle, Cebu City, Philippines', '10.3102031', '123.8936769'),
(194, 'Fuente-Don Mariano Qui Access Road, Cebu City, Philippines', '10.3099126', '123.8923439'),
(195, 'G. Gaisano Street, Cebu City, Philippines', '10.3042699', '123.9089765'),
(196, 'G. Lavillez Street, Cebu City, Philippines', '10.2995251', '123.9070116'),
(197, 'Gabuya Street, Cebu City, Philippines', '10.276382', '123.857859'),
(198, 'Gaisano Main, Cebu City, Philippines', '10.2975856', '123.9017269'),
(199, 'Gen T Galicano, Cebu City, Philippines', '10.3089383', '123.887997'),
(200, 'Gen. Echavez Street, Cebu City, Philippines', '10.3079619', '123.9030737'),
(201, 'Gen. Maxilom Extension, Cebu City, Philippines', '10.3029112', '123.9133503'),
(202, 'Gen. Sepulveda Street, Cebu City, Philippines', '10.3081888', '123.9021184'),
(203, 'General Arcadio Maxilom Avenue, Cebu City 6000, Philippines', '10.3106145', '123.896144'),
(204, 'General Maxilom Avenue Extension, Cebu City, Philippines', '10.306426', '123.910329'),
(205, 'General Maxilom Avenue, Cebu City 6000, Philippines', '10.3106145', '123.896144'),
(206, 'Generoso Street, Cebu City, Philippines', '10.3369673', '123.9050857'),
(207, 'Golam Drive, Cebu City, Philippines', '10.3249188', '123.9098453'),
(208, 'Golden Sun Drive, Cebu City 6000, Philippines', '10.3329541', '123.9104457'),
(209, 'Gonzales Compound, Cebu City, Philippines', '10.3164089', '123.8995117'),
(210, 'Good Shepherd St, Cebu City, Philippines', '10.313852', '123.8768497'),
(211, 'Good Shepherd St., Cebu City, Philippines', '10.313852', '123.8768497'),
(212, 'Gorordo Ave, Cebu City, Philippines', '10.3205967', '123.8991322'),
(213, 'Gorordo Avenue, Cebu City, Philippines', '10.3205967', '123.8991322'),
(214, 'Gorordo Avenue, UP Cebu, Cebu City, Philippines', '10.3222907', '123.8981953'),
(215, 'Gov. M. Cuenco Avenue, Cebu City, Cebu, Philippines', '10.3490999', '123.9132795'),
(216, 'Gov. M. Cuenco Avenue, Cebu City, Philippines', '10.3490999', '123.9132795'),
(217, 'Gov. M. Roa Avenue, Cebu City, Philippines', '10.3152327', '123.8914801'),
(218, 'Gov. M. Roa Street, Cebu City 6000, Philippines', '10.3129914', '123.8924226'),
(219, 'Gov. M. Roa Street, Cebu City, Philippines', '10.3139624', '123.8924211'),
(220, 'Gran Tierra Suites, 207 Don Mariano Cui Street, Cebu City, Philippines', '10.3142694', '123.8905223'),
(221, 'Greenbelt Drive, Cebu City, Philippines', '10.2943452', '123.8590287'),
(222, 'Guadalajara, Cebu City, Philippines', '10.3257369', '123.879565'),
(223, 'Guadalupe, Cebu City, Philippines', '10.3156173', '123.8854377'),
(224, 'Guba, Cebu City, Philippines', '10.4283049', '123.8913539'),
(225, 'GV Tower Hotel, Cebu City, Philippines', '10.2976027', '123.8974172'),
(226, 'H Abellana, Cebu City, Philippines', '10.3693278', '123.9266057'),
(227, 'H. Borgonia Street, Cebu City, Philippines', '10.3137792', '123.9127045'),
(228, 'Hi-Way 11, Cebu City, Philippines', '10.3713025', '123.9186096'),
(229, 'Hipodromo, Cebu City, Philippines', '10.3123623', '123.9073923'),
(230, 'Hipolito Street, Cebu City, Philippines', '10.3311545', '123.8763133'),
(231, 'His Dwelling Christian Church, Cebu City, Philippines', '10.3068914', '123.8938236'),
(232, 'Hiway 77, Cebu City, Philippines', '10.3663682', '123.9171724'),
(233, 'I Tabura Streeet, Cebu City, Philippines', '10.2800301', '123.8566409'),
(234, 'III-3 Purok 8 Camputhaw, Cebu City, Philippines', '10.3205175', '123.8968348'),
(235, 'Imus Avenue, Cebu City, Philippines', '10.3054458', '123.9046851'),
(236, 'Inayawan, Cebu City, Philippines', '10.2661473', '123.8648496'),
(237, 'India St., Cebu City, Philippines', '10.3323022', '123.9072507'),
(238, 'Inez Villa Street, Cebu City, Philippines', '10.3045407', '123.905106'),
(239, 'Isagani, Cebu City, Philippines', '10.2997877', '123.9032105'),
(240, 'J Llorente St., Cebu City, Philippines', '10.3110072', '123.8939863'),
(241, 'J Panis Street, Cebu City, Philippines', '10.3374623', '123.9125191'),
(242, 'J Tabura Street, Cebu City, Philippines', '10.2789774', '123.8566391'),
(243, 'J. Abad Santos Street, Cebu City, Philippines', '10.3267821', '123.911406'),
(244, 'J. Alcantara Street, Cebu City, Philippines', '10.2998758', '123.8917171'),
(245, 'J. Climaco Street, Cebu City 6000, Philippines', '10.2949834', '123.8953891'),
(246, 'J. De Vera Street, Cebu City, Philippines', '10.3086003', '123.9143463'),
(247, 'J. De Veyra Street, Cebu City, 6000 Cebu, Philippines', '10.3087762', '123.9147102'),
(248, 'J. Fortich Street, Cebu City, Philippines', '10.3132861', '123.8825814'),
(249, 'J. Llorente Street, Cebu City, Philippines', '10.3110072', '123.8939863'),
(250, 'J. M. Basa Street, Cebu City, Philippines', '10.2936348', '123.8895701'),
(251, 'J. Solon Drive, Cebu City 6000, Philippines', '10.3227223', '123.9015596'),
(252, 'J. Solon Drive, Cebu City, Philippines', '10.3227223', '123.9015596'),
(253, 'J. Urgello Street, Cebu City, Philippines', '10.302048', '123.8930974'),
(254, 'J.C. Zamora Street, Cebu City 6000, Philippines', '10.2989683', '123.9025734'),
(255, 'J.Panis St., Cebu City, Philippines', '10.3374623', '123.9125191'),
(256, 'Jade Street, Cebu City, Philippines', '10.3611909', '123.913423'),
(257, 'Janssen Road, Cebu City, Philippines', '10.2831547', '123.8701841'),
(258, 'Jasmin Street, Cebu City, Philippines', '10.312576', '123.8909273'),
(259, 'Jerusalem Street, Cebu City, Philippines', '10.3862534', '123.9199263'),
(260, 'Jose L Briones Street, Cebu City 6000, Philippines', '10.3078946', '123.9150229'),
(261, 'Jose L Briones Street, Cebu City, Philippines', '10.3078946', '123.9150229'),
(262, 'Jose Maria del Mar St, Cebu City, Philippines', '10.3311724', '123.9084917'),
(263, 'Jose Maria del Mar Street, Cebu City 6000, Philippines', '10.3290473', '123.9068258'),
(264, 'Jose Maria del Mar Street, Cebu City, Philippines', '10.3311724', '123.9084917'),
(265, 'Juan Luna Avenue Extension, Cebu City, Cebu, Philippines', '10.3115906', '123.9169418'),
(266, 'Juan Luna Avenue Extension, Cebu City, Philippines', '10.3115906', '123.9169418'),
(267, 'Juan Luna Avenue, Cebu City, Philippines', '10.3175661', '123.9126331'),
(268, 'Juan Luna Extension, Cebu City 6000, Philippines', '10.3124466', '123.9185327'),
(269, 'Juan Luna Extension, Cebu City, Philippines', '10.3087106', '123.9193329'),
(270, 'Juana Osme¤a Street, Cebu City, Cebu, Philippines', '10.3137186', '123.8944852'),
(271, 'Juana Osme¤a Street, Cebu City, Philippines', '10.3137186', '123.8944852'),
(272, 'Jumalon St., Cebu City, Philippines', '10.2898383', '123.8652875'),
(273, 'Junquera Street, Cebu City, Philippines', '10.3007009', '123.8989454'),
(274, 'JY Square Mall, Cebu City, Philippines', '10.3305933', '123.8988523'),
(275, 'Kalubihan, Cebu City, Philippines', '10.296378', '123.8972815'),
(276, 'Kalunasan, Cebu City, Philippines', '10.3502923', '123.8774052'),
(277, 'Kamagayan, Cebu City, Philippines', '10.2991446', '123.8993735'),
(278, 'Kaohsiung Street, Cebu City, Philippines', '10.3127638', '123.9200261'),
(279, 'Kasambagan, Cebu City, Philippines', '10.3289586', '123.9156227'),
(280, 'Katipunan Street, Cebu City 6000, Philippines', '10.3004488', '123.8751988'),
(281, 'Katipunan Street, Cebu City, Philippines', '10.3004488', '123.8751988'),
(282, 'Kauswagan Road, Cebu City 6000, Philippines', '10.3726977', '123.9150074'),
(283, 'Kinasang-an, Cebu City, Philippines', '10.2793807', '123.8599664'),
(284, 'L. Bacayo Street, Cebu City, Philippines', '10.319148', '123.8872942'),
(285, 'L. Flores Street, Cebu City, Philippines', '10.2916395', '123.8946834'),
(286, 'La Guardia Street, Cebu City, Philippines', '10.3305568', '123.9036839'),
(287, 'La Montana Homes Cabangahan Road, Cebu City, Philippines', '10.4047689', '123.9260803'),
(288, 'Labangon, Cebu City, Philippines', '10.2989677', '123.8813181'),
(289, 'Lahug Brgy. Hall, Cebu City, Philippines', '10.324223', '123.8984788'),
(290, 'Lahug Skywalk, Cebu City, Philippines', '10.3245747', '123.8982886'),
(291, 'Lahug, Cebu City, Philippines', '10.3338299', '123.8941434'),
(292, 'Legaspi Exit, Cebu City, Philippines', '10.2939139', '123.9061751'),
(293, 'Legaspi Ext., Cebu City, Philippines', '10.2939139', '123.9061751'),
(294, 'Legaspi Street, Cebu City, Philippines', '10.2955389', '123.9017567'),
(295, 'Leon Kilat St, Cebu City, Philippines', '10.2963913', '123.8962662'),
(296, 'Leon Kilat Street, Cebu City, Cebu, Philippines', '10.2963913', '123.8962662'),
(297, 'Leon Kilat Street, Cebu City, Philippines', '10.2963913', '123.8962662'),
(298, 'Lincoln Street, Cebu City, Philippines', '10.2933657', '123.8988723'),
(299, 'Lopez Jaena, Cebu City, Philippines', '10.299757', '123.9050706'),
(300, 'Lorega San Miguel, Cebu City, Philippines', '10.306664', '123.9046033'),
(301, 'Lorega Street, Cebu City, Philippines', '10.3064908', '123.9044595'),
(302, 'lot 27 Francisco Llamas St., Cebu City 6000, Philippines', '10.2949115', '123.8698579'),
(303, 'Lucio Lopez Drive, Cebu City, Philippines', '10.3024974', '123.8858085'),
(304, 'Luz, Cebu City, Philippines', '10.3208026', '123.9073923'),
(305, 'Luzon Avenue, Cebu City, Philippines', '10.3168235', '123.9041725'),
(306, 'M. Borces Street, Cebu City, Philippines', '10.3130061', '123.9130877'),
(307, 'M. C. Briones Street, Cebu City, Cebu, Philippines', '10.2922011', '123.9002884'),
(308, 'M. C. Briones Street, Cebu City, Philippines', '10.2922011', '123.9002884'),
(309, 'M. Cuenco Avenue, Cebu City, Philippines', '10.2999962', '123.90635'),
(310, 'M. J. Cuenco Avenue, Cebu City, Cebu, Philippines', '10.2999962', '123.90635'),
(311, 'M. J. Cuenco Avenue, Cebu City, Philippines', '10.2999962', '123.90635'),
(312, 'M. L. Quezon Street, Cebu City, Philippines', '10.3527174', '123.9228174'),
(313, 'M. P. Yap Street, Cebu City, Philippines', '10.3136724', '123.8940051'),
(314, 'M. Velez Street, Cebu City, Philippines', '10.3165079', '123.8875517'),
(315, 'Mabini Street, Cebu City 6000, Philippines', '10.2955765', '123.9029952'),
(316, 'Mabini Street, Cebu City, Philippines', '10.2979721', '123.9037308'),
(317, 'Mabolo, Cebu City, Philippines', '10.3159922', '123.9136387'),
(318, 'Magallanes St, Cebu City, Philippines', '10.2941956', '123.8999677'),
(319, 'Magallanes Street, Cebu City 6000, Philippines', '10.2933804', '123.8962821'),
(320, 'Magallanes Street, Cebu City, Philippines', '10.2941956', '123.8999677'),
(321, 'Main Street, Cebu City, Philippines', '10.350972', '123.9118659'),
(322, 'Malubog, Cebu City, Philippines', '10.3795765', '123.8711162'),
(323, 'Mambaling Flyover, Cebu City, Philippines', '10.2912263', '123.8773972'),
(324, 'Mambaling, Cebu City, Philippines', '10.287282', '123.8795172'),
(325, 'Manalili Street, Cebu City, Philippines', '10.2939589', '123.8989211'),
(326, 'Mango Square Mall, Cebu City, Philippines', '10.310299', '123.895522'),
(327, 'Metro Colon, Cebu City, Philippines', '10.295899', '123.8982618'),
(328, 'Middle Nivel Hills Road, Cebu City 6000, Philippines', '10.3424867', '123.8965081'),
(329, 'Mindanao Avenue, Cebu City 6000, Philippines', '10.320379', '123.9046079'),
(330, 'Mindanao Avenue, Cebu City, Philippines', '10.3199507', '123.9057268'),
(331, 'Miramonte - Riverdale Road, Cebu City, Philippines', '10.4080701', '123.9179754'),
(332, 'Mirasol Street, Cebu City, Philippines', '10.3092993', '123.889858'),
(333, 'Molave Street, Cebu City, Cebu, Philippines', '10.3194766', '123.9018707'),
(334, 'Molave Street, Cebu City, Philippines', '10.3194766', '123.9018707'),
(335, 'Morales Street, Cebu City, Philippines', '10.3191756', '123.89905'),
(336, 'Mutra Road, Cebu City 600, Philippines', '10.3031289', '123.867243'),
(337, 'N Bacalso Avenue, Cebu City 6000, Philippines', '10.2774357', '123.8539274'),
(338, 'N Bacalso Avenue, Cebu City, Philippines', '10.2881334', '123.864659'),
(339, 'N Escario Street, Cebu City, Philippines', '10.3178656', '123.8966632'),
(340, 'N. Bacalso Avenue, Cebu City, 6000 Cebu, Philippines', '10.2774357', '123.8539274'),
(341, 'N. Bacalso Avenue, Cebu City, Cebu, Philippines', '10.2881334', '123.864659'),
(342, 'N. Bacalso Avenue, Cebu City, Philippines', '10.2881334', '123.864659'),
(343, 'N. Escario Street, Cebu City 6000, Philippines', '10.3171095', '123.8939273'),
(344, 'N. Escario Street, Cebu City, Philippines', '10.3178656', '123.8966632'),
(345, 'Nangka St, Cebu City, Philippines', '10.292983', '123.8722913'),
(346, 'NAS AIR/ BESTGAS ROAD, Cebu City, Philippines', '10.2895961', '123.8707403'),
(347, 'Natalio Bacalso Avenue, Cebu City, Philippines', '10.2881334', '123.864659'),
(348, 'National Statistics Offcie, Cebu City, Cebu, Philippines', '10.2994127', '123.9061755'),
(349, 'Naya Road, Cebu City, Philippines', '10.3069479', '123.868685'),
(350, 'New Era, Cebu City, Philippines', '10.3187726', '123.9102881'),
(351, 'New Frontier, Cebu City, Philippines', '10.321403', '123.9150044'),
(352, 'North Reclamation Area, Cebu City, Philippines', '10.3078656', '123.915058'),
(353, 'NS Road, Cebu City, Philippines', '10.3738115', '123.9269072'),
(354, 'Old Access Road, Cebu City, Philippines', '10.3031682', '123.9045677'),
(355, 'Old Bonifacio Street, Cebu City, Cebu, Philippines', '10.3440167', '123.9132366'),
(356, 'Old Bonifacio Street, Cebu City, Philippines', '10.3440167', '123.9132366'),
(357, 'Old Cara Road, Cebu City, Philippines', '10.3389068', '123.9129993'),
(358, 'Omega Street, Cebu City, Philippines', '10.3368021', '123.9061266'),
(359, 'OPPRA Unit 2 Area, Cebu City, Philippines', '10.3286725', '123.8889085'),
(360, 'Orchids Street, Cebu City, Philippines', '10.3750848', '123.9172465'),
(361, 'Osmena Blvd, Cebu City, Philippines', '10.3038148', '123.8953502'),
(362, 'Osme¤a Boulevard, Cebu City 6000, Philippines', '10.3108897', '123.89301'),
(363, 'Osme¤a Boulevard, Cebu City, Cebu, Philippines', '10.3038148', '123.8953502'),
(364, 'Osme¤a Boulevard, Cebu City, Philippines', '10.3038148', '123.8953502'),
(365, 'P Sanchez Street, Cebu City, Philippines', '10.2942723', '123.8849367'),
(366, 'P. Burgos Street, Cebu City 6000, Philippines', '10.2958104', '123.9035732'),
(367, 'P. Burgos Street, Cebu City, Philippines', '10.2949148', '123.9033405'),
(368, 'P. Cabantan, Cebu City, Philippines', '10.321315', '123.9072458'),
(369, 'P. Cui Street, Cebu City, Philippines', '10.3019728', '123.8992113'),
(370, 'P. Rodriguez Street, Cebu City, Cebu, Philippines', '10.312953', '123.8898312'),
(371, 'P. Zamora Street, Cebu City 6000, Philippines', '10.2946058', '123.9023368'),
(372, 'P.Burgos St, Cebu City, Philippines', '10.2949148', '123.9033405'),
(373, 'Padriga Street, Cebu City, Philippines', '10.3299129', '123.9071332'),
(374, 'Pahina Central, Cebu City, Philippines', '10.2959269', '123.8934461'),
(375, 'Pahina San Nicolas, Cebu City, Philippines', '10.2938584', '123.8930974'),
(376, 'Panay Road, Cebu Business Park Waste Water Treatment Facility, Cebu City, Philippines', '10.317361', '123.907923'),
(377, 'Panay Road, Cebu City, Philippines', '10.317361', '123.907923'),
(378, 'Panganiban Street, Cebu City, Philippines', '10.2955518', '123.8932538'),
(379, 'Pantaleon del Rosario Street, Cebu City, Cebu, Philippines', '10.3005314', '123.8986226'),
(380, 'Pantaleon del Rosario Street, Cebu City, Philippines', '10.3005314', '123.8986226'),
(381, 'Paradise Village Road, Cebu City, Philippines', '10.3346138', '123.9136188'),
(382, 'Pardo, Cebu City, Philippines', '10.2785117', '123.8543127'),
(383, 'Pari-an, Cebu City, Philippines', '10.2988149', '123.9021627'),
(384, 'Paseo Don Sergio, Cebu City, Philippines', '10.3582306', '123.8993588'),
(385, 'Paseo Esperanza, Cebu City, Philippines', '10.3586354', '123.9029215'),
(386, 'Paseo Eulalia, Cebu City, Philippines', '10.3487424', '123.9049365'),
(387, 'Paseo Rodulfo, Cebu City, Philippines', '10.3598695', '123.9038384'),
(388, 'Paseo Saturnino, Cebu City, Philippines', '10.3439001', '123.9107733'),
(389, 'Pasil, Cebu City, Philippines', '10.2911047', '123.8934461'),
(390, 'Pasteur Street, Cebu City, Philippines', '10.3318445', '123.9001662'),
(391, 'Pelaez Street, Cebu City, Philippines', '10.2995981', '123.8981011'),
(392, 'Petunia Street, Cebu City, Philippines', '10.3750848', '123.9172465'),
(393, 'Phase 3, St. Jude Acres,Bulacao Pardo Hyacinth Street, Cebu City, Philippines', '10.2735309', '123.8494653'),
(394, 'Pina St, Cebu City, Cebu, Philippines', '10.292962', '123.8715481'),
(395, 'Pit-os, Cebu City, Philippines', '10.3987593', '123.9197345'),
(396, 'Plaridel Ext., Cebu City, Philippines', '10.2957395', '123.9012337'),
(397, 'Plaridel St, Cebu City, Cebu, Philippines', '10.2941956', '123.8999677'),
(398, 'Plaridel Street, Cebu City, Cebu, Philippines', '10.2941956', '123.8999677'),
(399, 'Plaridel Street, Cebu City, Philippines', '10.2941956', '123.8999677'),
(400, 'Polog, Cebu City, Philippines', '10.407128', '123.9422488'),
(401, 'Pope John Paul II Avenue, Cebu City, Cebu, Philippines', '10.3201198', '123.9111212'),
(402, 'Pope John Paul II Avenue, Cebu City, Philippines', '10.3201198', '123.9111212'),
(403, 'Pres. Magsaysay Street Pres. Magsaysay Street, Cebu City 6000, Philippines', '10.3266286', '123.9143659'),
(404, 'Pres. Magsaysay Street, Cebu City 6000, Philippines', '10.3266286', '123.9143659'),
(405, 'Pres. Magsaysay Street, Cebu City, Philippines', '10.3266286', '123.9143659'),
(406, 'Pres. Quirino Street, Cebu City, Philippines', '10.3249099', '123.9143081'),
(407, 'Pres. Roxas St, Cebu City, Philippines', '10.3229334', '123.9138843'),
(408, 'Prince Road, Cebu City, Philippines', '10.3171161', '123.8814792'),
(409, 'Progreso Street, Cebu City, Philippines', '10.2922014', '123.8990336'),
(410, 'Punta Princesa, Cebu City, Philippines', '10.294754', '123.8676399'),
(411, 'Queen City Memorial Garden, Cebu City, Philippines', '10.309265', '123.91226'),
(412, 'Queen\'s Road, Cebu City, Philippines', '10.3126474', '123.8984259'),
(413, 'Quezon Boulevard, Cebu City, Philippines', '10.2985848', '123.91078'),
(414, 'Quiot Pardo, Cebu City, Philippines', '10.2950296', '123.8550829'),
(415, 'R Colina, Cebu City, Philippines', '10.3182424', '123.9142371'),
(416, 'R Gullas Street, Cebu City, Philippines', '10.2969085', '123.9021698'),
(417, 'R. Aboitiz Street, Cebu City, Philippines', '10.3124928', '123.8949881'),
(418, 'R. Arcenas Street, Cebu City, Philippines', '10.3092266', '123.8730475'),
(419, 'R. Duterte Street, Cebu City 6000, Philippines', '10.3130729', '123.8785901'),
(420, 'R. Duterte Street, Cebu City, Philippines', '10.3134494', '123.8797814'),
(421, 'R. Landon Extension, Cebu City, Philippines', '10.3018223', '123.8951893'),
(422, 'R. Landon Street, Cebu City, Philippines', '10.3029558', '123.8982323'),
(423, 'R. Magsaysay Street, Cebu City, Philippines', '10.2912352', '123.8922898'),
(424, 'R. Mercado Street, Cebu City, Philippines', '10.3035825', '123.9071801'),
(425, 'R. Padilla Street, Cebu City, Philippines', '10.2936847', '123.8831771'),
(426, 'Rahmann St, Cebu City, Philippines', '10.3090464', '123.9015917'),
(427, 'Rahmann Street, Cebu City, Philippines', '10.3090464', '123.9015917'),
(428, 'Regla Street, Cebu City, Philippines', '10.3166082', '123.9123592'),
(429, 'Rizal Ave Ext., Cebu City, Philippines', '10.274725', '123.859932'),
(430, 'Road 6, Cebu City, Philippines', '10.3111534', '123.9159801'),
(431, 'Robinsons Place, Cebu City, Philippines', '10.3042607', '123.9111991'),
(432, 'Rosal St, Cebu City, Philippines', '10.3104371', '123.8906844'),
(433, 'Rosal Street, Cebu City, Philippines', '10.3104371', '123.8906844'),
(434, 'Saint Jude Street, Cebu City, Philippines', '10.3131209', '123.9084903'),
(435, 'Saint Lawrence Street, Cebu City, Philippines', '10.3312228', '123.9023983'),
(436, 'Salinas Drive Extension, Cebu City, Philippines', '10.3298821', '123.9007555'),
(437, 'Salinas Drive, Cebu City, Philippines', '10.3298821', '123.9007555'),
(438, 'Salvador Extension, Cebu City, Philippines', '10.302435', '123.8795693'),
(439, 'Salvador Street, Cebu City, Philippines', '10.3041987', '123.8771072'),
(440, 'Samar Loop, Cebu City, Philippines', '10.3158311', '123.9069899'),
(441, 'Sambag I, Cebu City, Philippines', '10.3014347', '123.8927487'),
(442, 'Sambag II, Cebu City, Philippines', '10.3059021', '123.8906566'),
(443, 'San Agustin Village Road, Cebu City, Philippines', '10.2736691', '123.8550996'),
(444, 'San Antonio, Cebu City, Philippines', '10.3014605', '123.8976302'),
(445, 'San Bernardino Street, Cebu City, Philippines', '10.2925172', '123.8777255'),
(446, 'San Jose, Cebu City, Philippines', '10.3790811', '123.9128253'),
(447, 'San Nicolas De Tolentino Parish Church, Cebu City, Philippines', '10.2936929', '123.8915338'),
(448, 'San Nicolas Proper, Cebu City, Philippines', '10.2945304', '123.8899592'),
(449, 'San Roque Road, Cebu City, Philippines', '10.2895854', '123.8763758'),
(450, 'San Roque Street, Cebu City 6000, Philippines', '10.3196613', '123.9083214'),
(451, 'San Roque Street, Cebu City, Philippines', '10.3196613', '123.9083214'),
(452, 'San Roque, Cebu City, Philippines', '10.2949641', '123.9066951'),
(453, 'Sanciangko Street, Cebu City, Philippines', '10.2972938', '123.8960221'),
(454, 'Sanjercas Ville Road, Cebu City, Philippines', '10.3288741', '123.8993721'),
(455, 'Sanson Road, Cebu City, Philippines', '10.3314565', '123.8967152'),
(456, 'Santa Cruz, Cebu City, Philippines', '10.3052424', '123.8962355'),
(457, 'Santo Nino Chapel Lane, Cebu City, Philippines', '10.3428018', '123.8985116'),
(458, 'Santo Ni¤o, Cebu City, Philippines', '10.295103', '123.9004195'),
(459, 'Sapangdaku, Cebu City, Philippines', '10.3453683', '123.8578735'),
(460, 'Sapphire Street, Cebu City, Philippines', '10.3035654', '123.8729042'),
(461, 'Sarrosa International Hotel, Cebu City, Philippines', '10.3247558', '123.9152907'),
(462, 'Sawang Calero, Cebu City, Philippines', '10.2903933', '123.8892618'),
(463, 'Sepulveda Street, Cebu City, Philippines', '10.3081888', '123.9021184'),
(464, 'Sergio Osme¤a Boulevard, Cebu City 6000, Philippines', '10.3062854', '123.9156828'),
(465, 'Sikatuna Street, Cebu City, Philippines', '10.3026114', '123.9019284'),
(466, 'Silver Street, Cebu City, Philippines', '10.3050023', '123.8712358'),
(467, 'Sindulan Street, Cebu City, Philippines', '10.3207743', '123.9168269'),
(468, 'Singson Street, Cebu City, Philippines', '10.3102563', '123.8994692'),
(469, 'Siquijor Road, Cebu City, Philippines', '10.3200664', '123.9065683'),
(470, 'Sitio Fatima Stairway, Cebu City, Philippines', '10.3386514', '123.8961374'),
(471, 'SM carpark, Cebu City, Philippines', '10.3114191', '123.9178164'),
(472, 'SM City Cebu GT Express Terminal, Juan Luna Avenue, Cebu City 6000, Philippines', '10.3194874', '123.9119615'),
(473, 'SM City Cebu PUJ Terminal, Juan Luna Avenue, Cebu City 6000, Philippines', '10.3194874', '123.9119615'),
(474, 'SM City Cebu, Juan Luna Avenue, Cebu City 6000, Philippines', '10.3194874', '123.9119615'),
(475, 'Social Security System, Cebu City, Philippines', '10.303866', '123.911182'),
(476, 'Sogo Hotel, Cebu City, Philippines', '10.2978171', '123.897782'),
(477, 'South Western University, Cebu City, Philippines', '10.3031882', '123.8913253'),
(478, 'Spolarium Street, Cebu City, Philippines', '10.2921688', '123.887938'),
(479, 'SRP-Mambaling Road, Cebu City, Philippines', '10.2865621', '123.8799115'),
(480, 'St Jude Street, Cebu City, Philippines', '10.3131209', '123.9084903'),
(481, 'St Lawrence Street, Cebu City, Philippines', '10.3312228', '123.9023983'),
(482, 'St Moritz Road, Cebu City, Philippines', '10.3156943', '123.9021576'),
(483, 'St. Michael Road, Cebu City, Philippines', '10.3368425', '123.9140184'),
(484, 'St. Moritz Road, Cebu City, Philippines', '10.3156943', '123.9021576'),
(485, 'St.Joseph Parish, Cebu City, Cebu, Philippines', '10.314917', '123.914195'),
(486, 'Stephenson Street, Cebu City 6000, Philippines', '10.3343403', '123.9009694'),
(487, 'Sto Nino Road, Cebu City, Cebu, Philippines', '10.3040075', '123.8936943'),
(488, 'Sudlon, Cebu City, Philippines', '10.3284235', '123.8958625'),
(489, 'Sunshine Valley Road, Cebu City, Philippines', '10.3384074', '123.8639829'),
(490, 'Supercat Terminal, Cebu City, Philippines', '10.3156992', '123.8854366'),
(491, 'Supercat Terminal, Pier 4, Cebu City, Philippines', '10.3028618', '123.9149736'),
(492, 'T Abella Street, Cebu City, Philippines', '10.2948956', '123.890649'),
(493, 'T. Brezlin Street, Cebu City, Cebu, Philippines', '10.3235522', '123.9144865'),
(494, 'T. Padilla, Cebu City, Philippines', '10.3030472', '123.9046033'),
(495, 'Tabada st., Cebu City, Philippines', '10.2873852', '123.8746678'),
(496, 'Taboan Public Market, Cebu City, Philippines', '10.295522', '123.8911419'),
(497, 'Tagunol Street, Cebu City, Philippines', '10.288496', '123.873699'),
(498, 'Talamban Road, Cebu City, Philippines', '10.3746321', '123.919199'),
(499, 'Talamban, Cebu City, Philippines', '10.3670682', '123.9173923'),
(500, 'Tejero, Cebu City, Philippines', '10.3039229', '123.9073923'),
(501, 'The Persimmon, Cebu City, Philippines', '10.3123922', '123.911094'),
(502, 'Tiburcio Padilla Street, Cebu City, Philippines', '10.3019728', '123.9073451'),
(503, 'Tinago, Cebu City, Philippines', '10.2991008', '123.9073923'),
(504, 'Tisa, Cebu City, Philippines', '10.301553', '123.870527'),
(505, 'Tojong Street, Cebu City, Philippines', '10.3191876', '123.9012913'),
(506, 'Toledo - Tabunok Road, Cebu City, Philippines', '10.3019692', '123.8167844'),
(507, 'Topaz St, Cebu City 6000, Philippines', '10.3230135', '123.9153357'),
(508, 'Topaz Street, Cebu City, Philippines', '10.3230983', '123.915212'),
(509, 'Torquoise Street, Cebu City, Philippines', '10.3617205', '123.9130785'),
(510, 'Transworld Airlines, Cebu City 6000, Philippines', '10.3156992', '123.8854366'),
(511, 'Tres de Abril Extension, Cebu City, Philippines', '10.2959334', '123.887089'),
(512, 'Tres de Abril St., Cebu City, Philippines', '10.2976607', '123.8823523'),
(513, 'Tres de Abril Street Extension, Cebu City, Philippines', '10.2961095', '123.8879262'),
(514, 'Tres de Abril Street, Cebu City, Philippines', '10.2976607', '123.8823523'),
(515, 'University of San Carlos TC, University of San Carlos, Cebu City, Philippines', '10.3526039', '123.9128329'),
(516, 'University of San Jose Recoletos, Cebu City, Philippines', '10.293997', '123.8975074'),
(517, 'University of The Philippines, UP Cebu, Cebu City, Philippines', '10.3222907', '123.8981953'),
(518, 'University of Visayas, University of the Visayas (Main Campus), Cebu City, Philippines', '10.2984693', '123.901289'),
(519, 'Unnamed Road, Cebu City 6012, Philippines', '10.3156992', '123.8854366'),
(520, 'Unnamed Road, Cebu City, Philippines', '10.3156992', '123.8854366'),
(521, 'Urgello road, Cebu City, Philippines', '10.3044782', '123.8912494'),
(522, 'Uytengsu Street, Cebu City, Philippines', '10.303623', '123.8935724'),
(523, 'V-1 Gov. M. Cuenco Avenue, Cebu City 6000, Philippines', '10.3517158', '123.9140705'),
(524, 'V. Ranudo Ext., Cebu City, Philippines', '10.3074057', '123.898128'),
(525, 'V. Ranudo Street, Cebu City, Philippines', '10.3074057', '123.898128'),
(526, 'V. Urgello Street, Cebu City, Philippines', '10.3049165', '123.8930395'),
(527, 'Veco Road, Cebu City, Philippines', '10.3388838', '123.913876'),
(528, 'Vicente Rama Avenue, Cebu City, Philippines', '10.3122817', '123.8861825'),
(529, 'Vicente Sotto Hospital, Cebu City, Philippines', '10.30898', '123.891732'),
(530, 'Villa Amores 1st Street, Cebu City, Philippines', '10.3335654', '123.9076467'),
(531, 'Villa Aznar Road, Cebu City, Philippines', '10.303681', '123.8919668'),
(532, 'Villagonzalo Street, Cebu City, Philippines', '10.3012482', '123.9086144'),
(533, 'Visitacion Street, Cebu City, Philippines', '10.3056099', '123.8915406'),
(534, 'W Geonzon Street, Cebu City 6000, Philippines', '10.3304789', '123.906177'),
(535, 'W Geonzon Street, Cebu City, Philippines', '10.3304789', '123.906177'),
(536, 'Weesam Ferry Terminal, Cebu City, Philippines', '10.302793', '123.9159'),
(537, 'Wilson Street, Cebu City, Philippines', '10.335054', '123.9024327'),
(538, 'Ybanez Compound Road, Cebu City, Philippines', '10.2892956', '123.8801145'),
(539, 'Zapatera, Cebu City, Philippines', '10.3081997', '123.9018141'),
(540, 'Zulueta Street, Cebu City, Philippines', '10.2985619', '123.9049727');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `breedersblog`
--

CREATE TABLE `breedersblog` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `purpose` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `breedersblog`
--

INSERT INTO `breedersblog` (`id`, `user_id`, `description`, `purpose`, `image`, `date_created`) VALUES
(1, 1, 'Shheeeessshhhhh', 'Hello World', 'maxresdefault.jpg', '2023-04-16 00:24:52'),
(3, 4, 'asdasd', 'asda', 'dadaada.jpg', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `seller` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double(11,2) NOT NULL,
  `total` double(11,2) NOT NULL,
  `isOrdered` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `seller`, `product_id`, `quantity`, `price`, `total`, `isOrdered`, `date_created`) VALUES
(54, 13, 1, 1, 1, 1207.00, 1207.00, 'Yes', '2023-05-08 11:06:13'),
(55, 4, 1, 2, 2, 75.00, 150.00, 'Yes', '2023-05-08 01:07:31'),
(57, 4, 1, 3, 1, 200.00, 200.00, 'Yes', '2023-05-08 07:58:24'),
(61, 4, 1, 2, 2, 75.00, 150.00, 'No', '2023-05-09 12:10:00');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `chat_id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `opened` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`chat_id`, `from_id`, `to_id`, `message`, `opened`, `created_at`) VALUES
(0, 10, 1, 'Sheessh', 0, '2023-04-24 01:04:21'),
(0, 10, 1, 'Sheessh', 0, '2023-04-24 01:04:21'),
(0, 4, 1, 'matic oyy', 0, '2023-05-08 13:08:59'),
(0, 4, 1, 'halo', 0, '2023-05-08 22:57:25'),
(0, 10, 1, 'Sheessh', 0, '2023-04-24 01:04:21'),
(0, 10, 1, 'Sheessh', 0, '2023-04-24 01:04:21'),
(0, 4, 1, 'matic oyy', 0, '2023-05-08 13:08:59'),
(0, 4, 1, 'halo', 0, '2023-05-08 22:57:25'),
(0, 10, 1, 'Sheessh', 0, '2023-04-24 01:04:21'),
(0, 10, 1, 'Sheessh', 0, '2023-04-24 01:04:21'),
(0, 4, 1, 'matic oyy', 0, '2023-05-08 13:08:59'),
(0, 4, 1, 'halo', 0, '2023-05-08 22:57:25');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `breedersblog_id` int(11) NOT NULL,
  `parent_comment_id` int(11) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `comment_sender_name` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `breedersblog_id`, `parent_comment_id`, `comment`, `comment_sender_name`, `user_id`, `date`) VALUES
(36, 1, 0, 'asdasd', 'Essej Oredarap', 4, '2023-05-08 16:44:34'),
(37, 1, 0, 'yep cock\r\n', 'Lourence Manlangit', 1, '2023-05-08 16:48:56');

-- --------------------------------------------------------

--
-- Table structure for table `conversations`
--

CREATE TABLE `conversations` (
  `conversation_id` int(11) NOT NULL,
  `user_1` int(11) NOT NULL,
  `user_2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `conversations`
--

INSERT INTO `conversations` (`conversation_id`, `user_1`, `user_2`) VALUES
(0, 10, 1),
(0, 10, 1),
(0, 4, 1),
(0, 10, 1),
(0, 10, 1),
(0, 4, 1),
(0, 10, 1),
(0, 10, 1),
(0, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `feedback` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `user_id`, `product_id`, `rate`, `feedback`, `date_created`) VALUES
(2, 10, 5, 4, 'Naays', '2023-04-24 01:06:45'),
(3, 13, 2, 5, '123', '2023-05-08 10:45:52');

-- --------------------------------------------------------

--
-- Table structure for table `fish_manual`
--

CREATE TABLE `fish_manual` (
  `manual_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `manual_img` varchar(100) NOT NULL,
  `description1` text NOT NULL,
  `manual_img1` varchar(100) NOT NULL,
  `description2` text NOT NULL,
  `manual_img2` varchar(100) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fish_manual`
--

INSERT INTO `fish_manual` (`manual_id`, `admin_id`, `title`, `description`, `manual_img`, `description1`, `manual_img1`, `description2`, `manual_img2`, `date_created`) VALUES
(3, 1, 'DD', 'dfgdfgdfgdfgdfg', 'dadaada.jpg', '1', 'dadaada.jpg', '1', 'dadaada.jpg', '2023-05-08 10:37:08'),
(8, 1, 'asdas', 'asdasdasdasdasdasdasdasd', 'dadaada.jpg', 'asdasd', 'isda1.jpg', 'asdasd', 'isda2.jpg', '2023-05-08 10:36:51');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `isRead` varchar(50) NOT NULL,
  `date_send` datetime NOT NULL,
  `redirect` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `user_id`, `isRead`, `date_send`, `redirect`) VALUES
(2, 1, 'Yes', '2023-04-30 08:26:53', 'manageOrders.php'),
(9, 1, 'Yes', '2023-05-01 01:20:32', 'manageOrders.php'),
(10, 3, 'Yes', '2023-05-01 11:16:03', 'myPurchase.php'),
(12, 1, 'Yes', '2023-05-02 12:21:30', 'manageOrders.php'),
(13, 3, 'Yes', '2023-05-02 12:27:41', 'manageOrders.php'),
(14, 1, 'Yes', '2023-05-03 11:40:02', 'manageOrders.php'),
(15, 3, 'Yes', '2023-05-03 11:40:14', 'manageOrders.php'),
(16, 1, 'Yes', '2023-05-03 11:43:33', 'manageOrders.php'),
(17, 1, 'Yes', '2023-05-03 23:19:24', 'manageOrders.php'),
(18, 3, 'Yes', '2023-05-04 00:04:03', 'myPurchase.php'),
(19, 1, 'Yes', '2023-05-07 00:01:43', 'manageOrders.php'),
(20, 1, 'Yes', '2023-05-07 00:01:43', 'manageOrders.php'),
(21, 3, 'Yes', '2023-05-07 00:07:03', 'manageOrders.php'),
(22, 1, 'Yes', '2023-05-07 09:30:36', 'manageOrders.php'),
(23, 1, 'Yes', '2023-05-07 09:30:36', 'manageOrders.php'),
(24, 3, 'Yes', '2023-05-07 09:30:46', 'myPurchase.php'),
(25, 3, 'Yes', '2023-05-07 09:30:48', 'myPurchase.php'),
(26, 13, 'Yes', '2023-05-07 04:47:50', 'manageSubscription.php'),
(27, 14, 'No', '2023-05-07 04:48:06', 'manageSubscription.php'),
(29, 13, 'Yes', '2023-05-08 01:35:27', 'manageSubscription.php'),
(30, 1, 'Yes', '2023-05-08 10:43:31', 'manageOrders.php'),
(31, 13, 'Yes', '2023-05-08 10:43:41', 'myPurchase.php'),
(32, 1, 'Yes', '2023-05-08 11:13:58', 'manageOrders.php'),
(33, 13, 'No', '2023-05-08 11:36:52', 'myPurchase.php'),
(34, 1, 'Yes', '2023-05-08 13:07:47', 'manageOrders.php'),
(35, 4, 'Yes', '2023-05-08 13:08:39', 'myPurchase.php'),
(36, 1, 'Yes', '2023-05-08 19:58:56', 'manageOrders.php'),
(37, 4, 'Yes', '2023-05-08 20:01:35', 'myPurchase.php');

-- --------------------------------------------------------

--
-- Table structure for table `notification_details`
--

CREATE TABLE `notification_details` (
  `notification_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `Description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification_details`
--

INSERT INTO `notification_details` (`notification_id`, `title`, `Description`) VALUES
(2, 'Product Approval', 'Someone Ordered your product'),
(9, 'Product Order', 'Kurt Capiliordered your product Oxygen Filter'),
(10, 'Product Accepted', 'Lourence Manlangit accepted your order for Gold Fish'),
(12, 'Product Order', 'Elmo Ranash ordered your product fdsf'),
(13, 'Product Order', 'Elmo Ranash ordered your product dffsfss'),
(14, 'Product Order', 'Kurt Capili ordered your product Sheeshables Aquarium'),
(15, 'Product Order', 'Kurt Capili ordered your product Hello Worldssss'),
(16, 'Product Order', 'Kurt Capili ordered your product Sheeshables Aquarium'),
(17, 'Product Order', 'Kurt Capili ordered your product Sheeshables Aquarium'),
(18, 'Product Accepted', 'Lourence Manlangit accepted your order for Sheeshables Aquarium'),
(19, 'Product Order', 'ez fix ordered your product Sheeshables Aquarium'),
(20, 'Product Order', 'ez fix ordered your product Gold Fish'),
(21, 'Product Order', 'ez fix ordered your product Hello Worldssss'),
(22, 'Product Order', 'Kurt Capili ordered your product Sheeshables Aquarium'),
(23, 'Product Order', 'Kurt Capili ordered your product Oxygen Filter'),
(24, 'Product Accepted', 'Lourence Manlangit accepted your order for Sheeshables Aquarium'),
(25, 'Product Accepted', 'Lourence Manlangit accepted your order for Oxygen Filter'),
(26, 'Approved Subscription', 'E-Aquaria Administrator Approved Your Subscription'),
(27, 'Approved Subscription', 'E-Aquaria Administrator Approved Your Subscription'),
(29, 'Approved Subscription', 'E-Aquaria Administrator Disapproved Your Subscription'),
(30, 'Product Order', 'ez fix ordered your product Gold Fish'),
(31, 'Product Accepted', 'Lourence Manlangit accepted your order for Gold Fish'),
(32, 'Product Order', 'ez fix ordered your product Sheeshables Aquarium'),
(33, 'Product Accepted', 'Lourence Manlangit accepted your order for Sheeshables Aquarium'),
(34, 'Product Order', 'Essej Oredarap ordered your product Gold Fish'),
(35, 'Product Accepted', 'Lourence Manlangit accepted your order for Gold Fish'),
(36, 'Product Order', 'Essej Oredarap ordered your product Oxygen Filter'),
(37, 'Product Accepted', 'Lourence Manlangit accepted your order for Oxygen Filter');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `ref_order` varchar(50) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `seller` int(11) NOT NULL,
  `isAccept` varchar(50) NOT NULL,
  `isPayed` varchar(50) NOT NULL,
  `payment_option` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `ref_order`, `cart_id`, `user_id`, `product_id`, `date_created`, `date_end`, `status`, `seller`, `isAccept`, `isPayed`, `payment_option`) VALUES
(35, 'T818TWJXLU', 54, 13, 1, '2023-05-08 11:13:58', '2023-05-12 23:06:54', 'received', 1, 'Yes', 'No', '1'),
(36, 'zaCrEJ6fkU', 55, 4, 2, '2023-05-08 13:07:47', '0000-00-00 00:00:00', 'Approved', 1, 'Yes', 'No', '1'),
(37, 'PQ9rpoquaJ', 57, 4, 3, '2023-05-08 19:58:56', '2023-05-12 23:06:54', 'received', 1, 'Yes', 'Yes', '2');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact_number` varchar(50) NOT NULL,
  `shipping_address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `name`, `contact_number`, `shipping_address`) VALUES
(35, 'ez fix', '0999999999', '13th Avenue, Cebu City, Philippines'),
(36, 'Jesse Paradero', '09865154', 'Pasil Cebu City'),
(37, 'Jesse Paradero', '09865154', 'Pasil Cebu City');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `typeofpayment` varchar(100) NOT NULL,
  `receipt_img` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL,
  `amount` double(11,2) NOT NULL,
  `reference_no` varchar(100) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `user_id`, `typeofpayment`, `receipt_img`, `date_created`, `amount`, `reference_no`, `order_id`) VALUES
(11, 4, 'Gcash', '../img/dadaada.jpg', '2023-05-08 08:01:50', 200.00, '125125', 37);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `isDelete` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `date_created`, `isDelete`) VALUES
(1, 1, '2023-04-14 10:59:12', 'Yes'),
(2, 1, '2023-04-14 11:11:13', 'Yes'),
(3, 1, '2023-04-14 11:15:49', 'No'),
(4, 3, '2023-04-18 12:35:37', 'No'),
(5, 3, '2023-04-18 02:02:25', 'No'),
(6, 1, '2023-04-21 10:24:17', 'No'),
(7, 6, '2023-05-03 10:36:20', 'No'),
(8, 6, '2023-05-04 10:57:45', 'No'),
(9, 6, '2023-05-04 11:06:28', 'No'),
(10, 13, '2023-05-06 19:58:21', 'No'),
(11, 13, '2023-05-06 19:59:18', 'No'),
(12, 13, '2023-05-06 20:04:13', 'No'),
(13, 4, '2023-05-09 07:48:14', 'No'),
(14, 13, '2023-05-09 08:09:22', 'No'),
(15, 4, '2023-05-09 08:13:47', 'No'),
(16, 4, '2023-05-09 08:17:31', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` text NOT NULL,
  `price` double(11,2) NOT NULL,
  `product_img` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `tank_type` varchar(50) NOT NULL,
  `dimension` varchar(50) NOT NULL,
  `thickness` varchar(50) NOT NULL,
  `fish_type` varchar(50) NOT NULL,
  `fish_class` varchar(50) NOT NULL,
  `size` varchar(100) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `age` varchar(50) NOT NULL,
  `specification` varchar(100) NOT NULL,
  `expiration_date` date NOT NULL,
  `benefits` varchar(100) NOT NULL,
  `shipping_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`product_id`, `product_name`, `quantity`, `description`, `price`, `product_img`, `category`, `tank_type`, `dimension`, `thickness`, `fish_type`, `fish_class`, `size`, `gender`, `age`, `specification`, `expiration_date`, `benefits`, `shipping_type`) VALUES
(1, 'Sheeshables Aquarium', 24, 'a container (such as a glass tank) or an artificial pond in which living aquatic animals or plants a', 1207.00, '../img/aq1.jpg', 'Aquarium', 'Betta Tank', '1280 x 720', '60', '', '', '', '', '', '', '0000-00-00', '', 'Pickup'),
(2, 'Gold Fish', 19, 'The Goldfish is a freshwater fish in the family Cyprinidae of order Cypriniformes. It is commonly ke', 75.00, '../img/1 .jpg', 'Fishes', '', '', '', 'Live Bearer', 'Community Fish', '16', 'Male', '1 Month', '', '0000-00-00', '', ''),
(3, 'Oxygen Filter', 5, 'Filters help increase oxygen because they move water, so make sure your current filter is operating ', 200.00, '../img/162234615_263836855351348_5965082064244389058_o.jpg', 'Equipment & Accessories', '', '', '', '', '', '', '', '', 'Chargable sheessh', '0000-00-00', '', ''),
(4, 'Hello Worldssss', 2, 'Hello worwld                                                                                        ', 1000.00, '../img/binary to octal (3).jpg', 'Aquarium', 'Viewing Tank', '1280 * 720', '20', '', '', '', '', '', '', '0000-00-00', '', 'Nanno Tank'),
(5, 'dffsfss', 212121, '212121                                                                                              ', 121.00, '../img/', 'Aquarium', 'Betta Tank', 'fdsf', 'sfs', '', '', '', '', '', '', '0000-00-00', '', 'Pickup'),
(6, 'fdsf', 5, '21212121                                                                                                                                                                                                                                            ', 21212.00, '../img/binary to octal.jpg', 'Aquarium', 'Betta Tank', 'fsf', 'sfsf', '', '', '', '', '', '', '0000-00-00', '', ''),
(7, 'fdsfs', 1212, 'svsc', 1212.00, '../img/images.jpg', 'Fishes', '', '', '', 'Live Bearer', 'Monster Fish', 'fdsfsf', 'Male', 'fdsfsf', '', '0000-00-00', '', ''),
(8, 'dsada', 3, 'ads', 121.00, '../img/receipt.png', 'Fishes', '', '', '', 'Egg Layer', 'Monster Fish', 'fsdfs', 'Male', 'dsa', '', '0000-00-00', '', ''),
(9, 'dsada', 1, 'as', 2.00, '../img/320006439_685136099767240_5444985790781888081_n.jpg', 'Aquarium', 'Nanno Tank', 'dsada', 'sdsada', '', '', '', '', '', '', '0000-00-00', '', ''),
(10, 'Goldfish', 32323232, 'tyryrytr', 323232.00, '../img/2.png', 'Aquarium', 'Betta Tank', '121211212', 'fgfgfggf', '', '', '', '', '', '', '0000-00-00', '', ''),
(11, 'vcxvvxvx', 232323, 'vcxgdfgdfgdg', 32323.00, '../img/2.png', 'Fishes', '', '', '', 'Live Bearer', 'Monster Fish', 'dsfsfsf', 'Female', 'fdsfsfsfs', '', '0000-00-00', '', ''),
(12, 'gdfgdgdg23232', 3434, 'fdsfsfssdfsdf', 324334.00, '../img/qweqwe.png', 'Probiotics', '', '', '', '', '', '', '', '', '', '2023-06-15', 'gfdgdgfdgdgd', ''),
(13, 'asdas', 33, 'asdasd', 23123.00, '../img/dadaada.jpg', 'Aquarium', 'Aquascaping Tank', 'asdasd', 'asdasd', '', '', '', '', '', '', '0000-00-00', '', ''),
(14, '1212', 1212121, 'fdsfsf', 121212.00, '../img/FLOORPLAN.jpg', 'Vitamins', '', '', '', '', '', '', '', '', '', '2023-05-03', 'fdsfsf', ''),
(15, 'dfsfs', 2121212, 'dfsfsfsfsd', 1212121.00, '../img/FLOORPLAN.jpg', 'Aquarium', 'Viewing Tank', 'fdsfsf', 'sfsfds', '', '', '', '', '', '', '0000-00-00', '', ''),
(16, 'f23231231', 2121212121, 'dsadadada', 1212121.00, '../img/FLOORPLAN.jpg', 'Probiotics', '', '', '', '', '', '', '', '', '', '2023-06-08', 'sdfsfsdfsfdfsf', '');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `img`) VALUES
(1, 1, '../img/aq1.jpg'),
(2, 1, '../img/aq2.jpg'),
(3, 1, '../img/aq3.jpg'),
(4, 2, '../img/1 .jpg'),
(5, 2, '../img/g2.jpg'),
(6, 2, '../img/g3.jpg'),
(7, 3, '../img/162234615_263836855351348_5965082064244389058_o.jpg'),
(8, 3, '../img/ox2.jpg'),
(9, 3, '../img/2 .jpg'),
(10, 4, '../img/hobby.png'),
(11, 4, '../img/Admin.png'),
(12, 4, '../img/buyer.png'),
(13, 5, '../img/2d1b0e17-f.png'),
(14, 5, '../img/1a4e5aef-a.png'),
(15, 5, '../img/....png'),
(16, 6, '../img/binary to octal.jpg'),
(17, 6, '../img/D.png'),
(18, 6, '../img/1 .jpg'),
(19, 7, '../img/images.jpg'),
(20, 7, '../img/320006439_685136099767240_5444985790781888081_n.jpg'),
(21, 7, '../img/320006439_685136099767240_5444985790781888081_n-removebg-preview.png'),
(22, 8, '../img/receipt.png'),
(23, 8, '../img/320006439_685136099767240_5444985790781888081_n-removebg-preview.png'),
(24, 8, '../img/images.jpg'),
(25, 9, '../img/320006439_685136099767240_5444985790781888081_n.jpg'),
(26, 9, '../img/320006439_685136099767240_5444985790781888081_n.jpg'),
(27, 9, '../img/320006439_685136099767240_5444985790781888081_n.jpg'),
(28, 10, '../img/2.png'),
(29, 10, '../img/3.png'),
(30, 10, '../img/5.png'),
(31, 11, '../img/2.png'),
(32, 11, '../img/5.png'),
(33, 11, '../img/qweqwe.png'),
(34, 12, '../img/qweqwe.png'),
(35, 12, '../img/ban.png'),
(36, 12, '../img/Diagram1.jpeg'),
(37, 13, '../img/dadaada.jpg'),
(38, 13, '../img/isda1.jpg'),
(39, 13, '../img/isda1.jpg'),
(40, 14, '../img/FLOORPLAN.jpg'),
(41, 14, '../img/320006439_685136099767240_5444985790781888081_n.jpg'),
(42, 14, '../img/myDiv (3).png'),
(43, 15, '../img/FLOORPLAN.jpg'),
(44, 15, '../img/320006439_685136099767240_5444985790781888081_n.jpg'),
(45, 15, '../img/ProofOfPayment_klienton_klienton.png'),
(46, 16, '../img/FLOORPLAN.jpg'),
(47, 16, '../img/pexels-fahad-alani-1677116.jpg'),
(48, 16, '../img/logo-removebg-preview.png');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `report_id` int(11) NOT NULL,
  `reporter_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `reason` varchar(100) NOT NULL,
  `date_reported` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`report_id`, `reporter_id`, `product_id`, `reason`, `date_reported`) VALUES
(1, 3, 2, 'Reason2', '2023-04-16 05:24:43'),
(2, 13, 1, 'Unrelated Items/Products', '2023-05-08 10:40:52');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_info`
--

CREATE TABLE `shipping_info` (
  `shipping_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `shipping_name` varchar(50) NOT NULL,
  `shipping_address` varchar(50) NOT NULL,
  `shipping_contact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shipping_info`
--

INSERT INTO `shipping_info` (`shipping_id`, `user_id`, `shipping_name`, `shipping_address`, `shipping_contact`) VALUES
(1, 1, 'Lourence Klient Manlangit', 'Lahug Cebu City', '092121212'),
(2, 2, 'Ares Inoc', 'Pasil Cebu City', '0956565645'),
(3, 3, 'Kurt Capili', 'Guadalupe Cebu City2', '0952665'),
(4, 4, 'Jesse Paradero', 'Pasil Cebu City', '09865154'),
(5, 5, 'Joniever Enot', 'Pardo Cebu City', '095656565654'),
(6, 6, 'Ichigo Kurosaki', '3rd Avenue, Cebu City 6000, Philippines', '0926262626'),
(7, 7, 'Lourence Klient Manlangit', '305 R. Duterte Street, Cebu City, Philippines', '12'),
(8, 9, 'Hey Joe', '3rd Avenue, Cebu City 6000, Philippines', '09999999999'),
(9, 10, 'fsfsf sfsfs', '37 Sampaguita Street, Cebu City, Philippines', '11111111111'),
(10, 11, 'Elmo Ranash', '3rd Street, Cebu City, Philippines', '09264871522'),
(11, 13, 'ez fix', '13th Avenue, Cebu City, Philippines', '0999999999'),
(12, 14, 'Killua Kill', '11th Street, Cebu City, Philippines', '09222222222');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `subscription_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `subscription_type` varchar(100) NOT NULL,
  `number_of_products` varchar(100) NOT NULL,
  `typeofpayment` varchar(100) NOT NULL,
  `amount` double(11,2) NOT NULL,
  `status` varchar(100) NOT NULL,
  `reference_number` int(11) NOT NULL,
  `receipt_img` varchar(100) NOT NULL,
  `date_started` datetime NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`subscription_id`, `user_id`, `subscription_type`, `number_of_products`, `typeofpayment`, `amount`, `status`, `reference_number`, `receipt_img`, `date_started`, `date_created`, `date_end`) VALUES
(18, 13, '1', '27', 'Gcash', 170.00, 'Approved', 5646565, '../img/FLOORPLAN.jpg', '2023-05-17 10:59:05', '2023-05-09 00:09:22', '2023-05-31 10:59:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `isVerified` varchar(50) NOT NULL,
  `date_verified` datetime NOT NULL,
  `isLoggedIn` varchar(100) NOT NULL,
  `isSubscribe` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email_address`, `isVerified`, `date_verified`, `isLoggedIn`, `isSubscribe`) VALUES
(1, 'Klient101', 'Klient101', 'klient@gmail.com', 'Yes', '2023-04-13 20:07:23', 'No', 'No'),
(2, 'Ares101', 'Ares101', 'Ares101@gmail.com', 'Yes', '2023-04-13 20:07:23', 'No', 'No'),
(3, 'Kurt101', 'Kurt101', 'Kurt101t@gmail.com', 'Yes', '2023-04-13 20:07:23', 'No', 'No'),
(4, 'esse101', 'esse101', 'esse101@gmail.com', 'Yes', '2023-04-13 20:07:23', 'No', 'No'),
(5, 'enot101', 'enot101', 'enot101@gmail.com', 'Yes', '2023-04-13 20:07:23', 'No', 'No'),
(6, 'ichigo101', '123', 'ichigo101@gmail.com', 'Yes', '2023-04-14 01:07:51', 'No', 'No'),
(7, 'hey101', 'hey101', 'hey101@gmail.com', 'Yes', '2023-04-21 01:51:26', '', 'No'),
(8, 'hey111', 'hey111', 'hey111@gmail.com', 'Yes', '2023-04-21 01:59:00', 'No', 'No'),
(9, 'helloWorld', 'helloWorld', 'helloWorld@gmail.com', 'Yes', '2023-04-21 11:28:39', '', 'No'),
(10, 'ynahak', 'ynahak', 'ynahak@gmail.com', 'Yes', '2023-04-23 11:56:36', '', 'No'),
(11, 'ranash101', 'ranash101', 'ranash101@gmail.com', 'Yes', '2023-04-24 08:55:53', '', 'No'),
(12, 'ranash1011111', 'ranash1011111', 'ranash101111@gmail.com', 'Yes', '2023-05-02 12:37:43', '', 'No'),
(13, 'ezfix', 'ezfix', 'ezfix@gmail.com', 'Yes', '2023-05-06 07:18:11', 'No', 'Yes'),
(14, 'killua101', 'killua101', 'killua101@gmail.com', 'Yes', '2023-05-07 04:07:42', 'No', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `mi` varchar(100) NOT NULL,
  `address_id` int(11) NOT NULL,
  `contact_number` varchar(100) NOT NULL,
  `user_img` varchar(100) NOT NULL DEFAULT 'defaultimage.png',
  `gcash_number` varchar(50) NOT NULL,
  `gcash_name` varchar(100) NOT NULL,
  `last_seen` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_id`, `first_name`, `last_name`, `mi`, `address_id`, `contact_number`, `user_img`, `gcash_number`, `gcash_name`, `last_seen`) VALUES
(1, 'Lourence', 'Manlangit', 'P.', 291, '09277181964', '../img/defaultima1ge.png', '09277181964', 'Klieentoon', NULL),
(2, 'Ares', 'Inoc', '', 389, '095656747845', '', '095656747845', 'Ares', NULL),
(3, 'Kurt', 'Capili', '', 223, '0956871245', '', '0956871245', 'Kurt', NULL),
(4, 'Essej', 'Oredarap', '', 389, '0945485787', '../img/dadaada.jpg', '0945485787', 'Essej', '2023-05-09 00:21:52'),
(5, 'Joniever', 'Enot', '', 382, '0956512132', '', '0956512132', 'Enot', NULL),
(6, 'Ichigo', 'Kurosaki', '', 17, '0926262626', '', '092626262', 'Sheesh', NULL),
(7, 'Lourence Klient', 'Manlangit', '', 13, '12', '', '09262626', 'ellow', NULL),
(9, 'Hey', 'Joe', '', 17, '09999999999', '', '09999999999', 'Klieeent', NULL),
(10, 'fsfsf', 'sfsfs', 's', 16, '11111111111', '', '11111111111', 'sdfdfsdsfsfsfsfdsfsfds', '2023-04-24 01:04:44'),
(11, 'Elmo', 'Ranash', 'A', 18, '09264871522', '', '09264871522', 'Elmo Ranash', NULL),
(13, 'ez', 'fix', 'a', 2, '0999999999', 'defaultimage.png', '09565009978', 'Ares Ann S. Inoc', '2023-05-08 11:46:28'),
(14, 'Killua', 'Kill', 'a', 1, '09222222222', 'defaultimage.png', '09455555555', 'Elmo Ranash', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `verification_codes`
--

CREATE TABLE `verification_codes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `token` varchar(100) NOT NULL,
  `date_send` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `verification_codes`
--

INSERT INTO `verification_codes` (`id`, `user_id`, `email_address`, `token`, `date_send`) VALUES
(1, 6, 'ichigo101@gmail.com', '53402', '2023-04-14 01:06:55'),
(2, 7, 'hey101@gmail.com', '25174', '2023-04-21 01:50:48'),
(3, 8, 'hey111@gmail.com', '39800', '2023-04-21 01:58:45'),
(4, 9, 'helloWorld@gmail.com', '86382', '2023-04-21 11:28:06'),
(5, 10, 'ynahak@gmail.com', '13910', '2023-04-23 11:56:13'),
(6, 11, 'ranash101@gmail.com', '51447', '2023-04-24 08:55:34'),
(7, 12, 'ranash101111@gmail.com', '67121', '2023-05-02 12:37:17'),
(8, 13, 'ezfix@gmail.com', '89599', '2023-05-06 07:17:49'),
(9, 14, 'killua101@gmail.com', '47128', '2023-05-07 04:07:20');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `breedersblog`
--
ALTER TABLE `breedersblog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `breedersblog_ibfk_1` (`user_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `carts_ibfk_3` (`user_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comment_ibfk_1` (`breedersblog_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feedbacks_ibfk_1` (`user_id`),
  ADD KEY `feedbacks_ibfk_2` (`product_id`);

--
-- Indexes for table `fish_manual`
--
ALTER TABLE `fish_manual`
  ADD PRIMARY KEY (`manual_id`),
  ADD KEY `fish_manual_ibfk_1` (`admin_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `notification_details`
--
ALTER TABLE `notification_details`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_ibfk_1` (`user_id`),
  ADD KEY `orders_ibfk_2` (`product_id`),
  ADD KEY `seller` (`seller`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `payment_ibfk_1` (`user_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_ibfk_1` (`product_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `reports_ibfk_2` (`reporter_id`),
  ADD KEY `reports_ibfk_1` (`product_id`);

--
-- Indexes for table `shipping_info`
--
ALTER TABLE `shipping_info`
  ADD PRIMARY KEY (`shipping_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`subscription_id`),
  ADD KEY `subscription_ibfk_1` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `address_id` (`address_id`);

--
-- Indexes for table `verification_codes`
--
ALTER TABLE `verification_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `verification_codes_ibfk_1` (`user_id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=541;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `breedersblog`
--
ALTER TABLE `breedersblog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fish_manual`
--
ALTER TABLE `fish_manual`
  MODIFY `manual_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shipping_info`
--
ALTER TABLE `shipping_info`
  MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `subscription_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `verification_codes`
--
ALTER TABLE `verification_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `breedersblog`
--
ALTER TABLE `breedersblog`
  ADD CONSTRAINT `breedersblog_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carts_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carts_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`breedersblog_id`) REFERENCES `breedersblog` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD CONSTRAINT `feedbacks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `feedbacks_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fish_manual`
--
ALTER TABLE `fish_manual`
  ADD CONSTRAINT `fish_manual_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notification_details`
--
ALTER TABLE `notification_details`
  ADD CONSTRAINT `notification_details_ibfk_1` FOREIGN KEY (`notification_id`) REFERENCES `notification` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`seller`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_details`
--
ALTER TABLE `product_details`
  ADD CONSTRAINT `product_details_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reports_ibfk_2` FOREIGN KEY (`reporter_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shipping_info`
--
ALTER TABLE `shipping_info`
  ADD CONSTRAINT `shipping_info_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subscription`
--
ALTER TABLE `subscription`
  ADD CONSTRAINT `subscription_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `user_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_details_ibfk_2` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`);

--
-- Constraints for table `verification_codes`
--
ALTER TABLE `verification_codes`
  ADD CONSTRAINT `verification_codes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wishlists_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
