-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2022 at 03:27 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `survay`
--

-- --------------------------------------------------------

--
-- Table structure for table `goals`
--

CREATE TABLE `goals` (
  `sno` int(2) NOT NULL,
  `gid` varchar(2) NOT NULL,
  `goal` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `goals`
--

INSERT INTO `goals` (`sno`, `gid`, `goal`) VALUES
(1, 'sr', ' Scientist or Researcher Or Related.'),
(2, 'se', 'Software Engineer or Related.'),
(3, 'dr', ' Doctor Or Related Post.'),
(4, 'gv', 'Goverment Job.'),
(5, 'tr', ' Teacher/ Professor etc.'),
(6, 'lr', 'Lawyer or Related.'),
(7, 'bn', ' A Businessman.'),
(8, 'ar', 'Army Man / Officer.'),
(9, 'or', 'Other.');

-- --------------------------------------------------------

--
-- Table structure for table `survaydata`
--

CREATE TABLE `survaydata` (
  `Sno` int(2) NOT NULL,
  `token` varchar(8) NOT NULL,
  `dob` date NOT NULL,
  `cls` varchar(8) NOT NULL,
  `marks9` int(2) NOT NULL,
  `marks10` int(2) NOT NULL,
  `interest` varchar(35) NOT NULL,
  `goal` varchar(35) NOT NULL,
  `willPow` enum('Yes','No') NOT NULL,
  `true2Others` enum('Yes','No','Sometimes','NA') NOT NULL,
  `true2Self` enum('Yes','No','Sometimes','NA') NOT NULL,
  `lazy` enum('Yes','No','Sometimes','NA') NOT NULL,
  `honest` enum('Yes','No') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `survaydata`
--

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `Sno` int(3) NOT NULL,
  `Name` varchar(35) NOT NULL,
  `token` varchar(8) NOT NULL,
  `used` tinyint(1) NOT NULL,
  `class` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`Sno`, `Name`, `token`, `used`, `class`) VALUES
(3, '', 'BCAGLTVL', 0, ''),
(4, '', 'BCAIDBMW', 0, ''),
(5, '', 'BCAJHJCX', 0, ''),
(6, '', 'BCAPCAYN', 0, ''),
(7, '', 'BCAEUNPV', 0, ''),
(8, '', 'BCAVZOSC', 0, ''),
(9, '', 'BCAHTXIP', 0, ''),
(10, '', 'BCAOCHCF', 0, ''),
(11, '', 'BCAQEUYR', 0, ''),
(12, '', 'BCASKGYB', 0, ''),
(14, '', 'BCAGHYEW', 0, ''),
(15, '', 'BCAURDON', 0, ''),
(17, '', 'BCATGBEA', 0, ''),
(19, '', 'BCAQHADS', 0, ''),
(20, '', 'BCASMUEO', 0, ''),
(21, '', 'BCAUYBHQ', 0, ''),
(22, '', 'BCASWNPC', 0, ''),
(23, '', 'BCAPRJUV', 0, ''),
(24, '', 'BCAWGUCM', 0, ''),
(26, '', 'BCACPQZN', 0, ''),
(27, '', 'BCAFBKIE', 0, ''),
(28, '', 'BCAGEMZF', 0, ''),
(29, '', 'BCAWVGFB', 0, ''),
(30, '', 'BCAWJCGZ', 0, ''),
(31, '', 'BCAHGJKE', 0, ''),
(32, '', 'BCAYEAGW', 0, ''),
(33, '', 'BCAMDWBL', 0, ''),
(34, '', 'BCAOTHTY', 0, ''),
(35, '', 'BCATGDPI', 0, ''),
(37, '', 'BCAEMFOI', 0, ''),
(38, '', 'BCAPOLDU', 0, ''),
(39, '', 'BCAHNZPN', 0, ''),
(40, '', 'BCAFSUCQ', 0, ''),
(41, '', 'BCASEMRP', 0, ''),
(42, '', 'BCAXSHJW', 0, ''),
(43, '', 'BCAKWLCA', 0, ''),
(44, '', 'BCAPKUOH', 0, ''),
(47, '', 'BCAQZDHD', 0, ''),
(49, '', 'BCABRJWL', 0, ''),
(50, '', 'BCAHSFMI', 0, ''),
(51, '', 'BCAVQTYN', 0, ''),
(74, '', 'BCABAFKO', 0, ''),
(76, '', 'BCAEUNDG', 0, ''),
(77, '', 'BCAUMKJC', 0, ''),
(78, '', 'BCAEVIZC', 0, ''),
(80, '', 'BCAQWJHR', 0, ''),
(81, '', 'BCAYSXNG', 0, ''),
(82, '', 'BCAOUYRB', 0, ''),
(83, '', 'BCAUKOLX', 0, ''),
(84, '', 'BCAAQNFZ', 0, ''),
(85, '', 'BCAQNHCO', 0, ''),
(86, '', 'BCAJTAKR', 0, ''),
(87, '', 'BCAEXOEP', 0, ''),
(88, '', 'BCALYNZJ', 0, ''),
(89, '', 'BCAXEVWJ', 0, ''),
(90, '', 'BCAOVZIU', 0, ''),
(91, '', 'BCAZDZFY', 0, ''),
(92, '', 'BCAPRJLN', 0, ''),
(93, '', 'BCAUDGPF', 0, ''),
(94, '', 'BCALVDVH', 0, ''),
(95, '', 'BCASBICX', 0, ''),
(96, '', 'BCAPFRFV', 0, ''),
(97, '', 'BCAZVPGB', 0, ''),
(98, '', 'BCAWMHCB', 0, ''),
(99, '', 'BCARNISB', 0, ''),
(100, '', 'BCAGQULS', 0, ''),
(102, '', 'BCAVBSKX', 0, ''),
(103, '', 'BCATQKBH', 0, ''),
(104, '', 'BCAGPAFV', 0, ''),
(105, '', 'BCAEJABP', 0, ''),
(106, '', 'BCAXQIQF', 0, ''),
(107, '', 'BCAUYSYI', 0, ''),
(108, '', 'BCAUEFKZ', 0, ''),
(109, '', 'BCAYQDOQ', 0, ''),
(110, '', 'BCAGFOSK', 0, ''),
(111, '', 'BCAAJBCY', 0, ''),
(115, '', 'BCAILVPG', 0, ''),
(116, '', 'BCATHKOK', 0, ''),
(117, '', 'BCASILKQ', 0, ''),
(119, '', 'BCAQZCST', 0, ''),
(120, '', 'BCAXGTQA', 0, ''),
(121, '', 'BCASCFZI', 0, ''),
(122, '', 'BCANXLRL', 0, ''),
(123, '', 'BCAPXKVS', 0, ''),
(124, '', 'BCAKBJYJ', 0, ''),
(125, '', 'BCAGMPMD', 0, ''),
(126, '', 'BCANBYFU', 0, ''),
(127, '', 'BCAOARXG', 0, ''),
(128, '', 'BCAACSBJ', 0, ''),
(129, '', 'BCABNIWS', 0, ''),
(130, '', 'BCAMZCNE', 0, ''),
(131, '', 'BCASXQBQ', 0, ''),
(132, '', 'BCARFAXI', 0, ''),
(136, '', 'BCAHMWPT', 0, ''),
(137, '', 'BCASTFWQ', 0, ''),
(138, '', 'BCAODWIZ', 0, ''),
(139, '', 'BCAQMQNG', 0, ''),
(140, '', 'BCASLSRS', 0, ''),
(141, '', 'BCAWXQAE', 0, ''),
(142, '', 'BCANIWGI', 0, ''),
(143, '', 'BCAYCDZA', 0, ''),
(144, '', 'BCAUVBSW', 0, ''),
(145, '', 'BCAYVQEP', 0, ''),
(146, '', 'BCAXLGFM', 0, ''),
(147, '', 'BCADEMCW', 0, ''),
(148, '', 'BCAILHAL', 0, ''),
(149, '', 'BCAYBTVK', 0, ''),
(150, '', 'BCACOSKU', 0, ''),
(151, '', 'BCADRGKL', 0, ''),
(152, '', 'BCAMBCTQ', 0, ''),
(153, '', 'BCAYNLKN', 0, ''),
(154, '', 'BCANXWYC', 0, ''),
(155, '', 'BCACAEXY', 0, ''),
(156, '', 'BCANWVIY', 0, ''),
(157, '', 'BCATXYBX', 0, ''),
(158, '', 'BCAMSIZH', 0, ''),
(159, '', 'BCACVIGY', 0, ''),
(160, '', 'BCAFTWJF', 0, ''),
(161, '', 'BCAZNOTP', 0, ''),
(162, '', 'BCASQDMI', 0, ''),
(163, '', 'BCAUKVDL', 0, ''),
(164, '', 'BCANDLVX', 0, ''),
(165, '', 'BCAHDGLH', 0, ''),
(166, '', 'BCATSMDL', 0, ''),
(167, '', 'BCAIYSRY', 0, ''),
(168, '', 'BCAEVYQS', 0, ''),
(169, '', 'BCASJXMN', 0, ''),
(170, '', 'BCAKFDFH', 0, ''),
(171, '', 'BCAPYTWK', 0, ''),
(172, '', 'BCAQVAHY', 0, ''),
(173, '', 'BCAXYOIX', 0, ''),
(174, '', 'BCAPQYCI', 0, ''),
(175, '', 'BCAUBOKR', 0, ''),
(176, '', 'BCAZFPEW', 0, ''),
(177, '', 'BCAHCLSU', 0, ''),
(178, '', 'BCARNBHM', 0, ''),
(179, '', 'BCAPCXDE', 0, ''),
(180, '', 'BCAQNMIR', 0, ''),
(181, '', 'BCAJDSPV', 0, ''),
(182, '', 'BCAZCNGW', 0, ''),
(183, '', 'BCAGNSTN', 0, ''),
(184, '', 'BCAOYPZQ', 0, ''),
(185, '', 'BCADTYJP', 0, ''),
(186, '', 'BCAEFZRO', 0, ''),
(187, '', 'BCALPVAH', 0, ''),
(188, '', 'BCADKIVO', 0, ''),
(189, '', 'BCAOZUTC', 0, ''),
(190, '', 'BCANALIZ', 0, ''),
(191, '', 'BCADUTUV', 0, ''),
(192, '', 'BCALDNGL', 0, ''),
(193, '', 'BCABJUFR', 0, ''),
(194, '', 'BCACJZVU', 0, ''),
(195, '', 'BCACHGNI', 0, ''),
(196, '', 'BCAQUYIG', 0, ''),
(197, '', 'BCANLWHE', 0, ''),
(198, '', 'BCAQLNGT', 0, ''),
(199, '', 'BCAIVYAO', 0, ''),
(200, '', 'BCAHATPX', 0, ''),
(201, '', 'BCACKGOG', 0, ''),
(202, '', 'BCAPCZJS', 0, ''),
(203, '', 'BCAJCKDR', 0, ''),
(204, '', 'BCASITGQ', 0, ''),
(205, '', 'BCAFDOHJ', 0, ''),
(206, '', 'BCADZIGD', 0, ''),
(207, '', 'BCASRJGR', 0, ''),
(208, '', 'BCAHXDGX', 0, ''),
(209, '', 'BCAUWXUV', 0, ''),
(210, '', 'BCAECGBH', 0, ''),
(211, '', 'BCABDOZF', 0, ''),
(212, '', 'BCAYACUI', 0, ''),
(213, '', 'BCATLNBU', 0, ''),
(214, '', 'BCASDSLU', 0, ''),
(215, '', 'BCAUDEHF', 0, ''),
(216, '', 'BCAHOMCP', 0, ''),
(217, '', 'BCAOLVZA', 0, ''),
(218, '', 'BCAZMZET', 0, ''),
(219, '', 'BCAFGTCF', 0, ''),
(220, '', 'BCATCTOB', 0, ''),
(221, '', 'BCALRPXQ', 0, ''),
(222, '', 'BCAIKRJH', 0, ''),
(223, '', 'BCARPDYK', 0, ''),
(224, '', 'BCAZAFJW', 0, ''),
(225, '', 'BCAXHAJT', 0, ''),
(226, '', 'BCAMXFKU', 0, ''),
(227, '', 'BCAZFNJK', 0, ''),
(228, '', 'BCAMYAHR', 0, ''),
(229, '', 'BCAXONJX', 0, ''),
(230, '', 'BCAEXPYF', 0, ''),
(231, '', 'BCAGZWKQ', 0, ''),
(232, '', 'BCAIFRLO', 0, ''),
(233, '', 'BCADJEYV', 0, ''),
(234, '', 'BCAJCQXQ', 0, ''),
(235, '', 'BCAXZRIZ', 0, ''),
(236, '', 'BCAEHNYU', 0, ''),
(237, '', 'BCAOUMQH', 0, ''),
(238, '', 'BCADFAKF', 0, ''),
(239, '', 'BCAZTGHN', 0, ''),
(240, '', 'BCASOEHL', 0, ''),
(241, '', 'BCASBZDR', 0, ''),
(242, '', 'BCAXLEWV', 0, ''),
(345, '', 'BCALDSHL', 0, ''),
(346, '', 'BCACPMPT', 0, ''),
(347, '', 'BCAPSKJQ', 0, ''),
(348, '', 'BCAQTRUK', 0, ''),
(349, '', 'BCAFJPKF', 0, ''),
(350, '', 'BCATSXEC', 0, ''),
(351, '', 'BCABGEJL', 0, ''),
(352, '', 'BCAELYOR', 0, ''),
(353, '', 'BCACXISP', 0, ''),
(354, '', 'BCAUOWPJ', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `goals`
--
ALTER TABLE `goals`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `gid` (`gid`),
  ADD UNIQUE KEY `goal` (`goal`);

--
-- Indexes for table `survaydata`
--
ALTER TABLE `survaydata`
  ADD PRIMARY KEY (`Sno`),
  ADD UNIQUE KEY `token` (`token`,`goal`) USING BTREE;

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`Sno`),
  ADD UNIQUE KEY `token` (`token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `goals`
--
ALTER TABLE `goals`
  MODIFY `sno` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `survaydata`
--
ALTER TABLE `survaydata`
  MODIFY `Sno` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `Sno` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=356;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `survaydata`
--
ALTER TABLE `survaydata`
  ADD CONSTRAINT `survaydata_ibfk_1` FOREIGN KEY (`token`) REFERENCES `tokens` (`token`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
