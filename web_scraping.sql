-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 04, 2020 at 10:19 AM
-- Server version: 5.7.30-0ubuntu0.18.04.1
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_scraping`
--

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `id_film` varchar(16) NOT NULL,
  `title` varchar(128) NOT NULL,
  `genre` varchar(64) NOT NULL,
  `durasi` varchar(8) NOT NULL,
  `tahun` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`id_film`, `title`, `genre`, `durasi`, `tahun`) VALUES
('MOV0001', 'FROZEN 2', 'ANIMATION', '103', '2019'),
('MOV0002', 'JUMANJI: THE NEXT LEVEL', 'ACTION', '122', '2019'),
('MOV0003', 'JERITAN MALAM', 'HORROR', '119', '2019'),
('MOV0004', 'EGGNOID', 'DRAMA', '102', '2019'),
('MOV0005', 'REMBULAN TENGGELAM DI WAJAHMU', 'DRAMA', '93', '2019'),
('MOV0006', 'TOKYO GHOUL S', 'FANTASY', '101', '2019'),
('MOV0007', 'RUMAH KENTANG: THE BEGINNING', 'HORROR', '102', '2019');

-- --------------------------------------------------------

--
-- Table structure for table `jam_tayang`
--

CREATE TABLE `jam_tayang` (
  `id_jam_tayang` int(11) NOT NULL,
  `id_film` varchar(16) NOT NULL,
  `id_url` varchar(16) NOT NULL,
  `jam` varchar(8) NOT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jam_tayang`
--

INSERT INTO `jam_tayang` (`id_jam_tayang`, `id_film`, `id_url`, `jam`, `tanggal`) VALUES
(371, 'MOV0001', 'URL001', '10:30', '2020-06-27'),
(372, 'MOV0001', 'URL001', '12:45', '2020-06-27'),
(373, 'MOV0001', 'URL001', '15:00', '2020-06-27'),
(374, 'MOV0001', 'URL001', '17:15', '2020-06-27'),
(375, 'MOV0001', 'URL001', '19:30', '2020-06-27'),
(376, 'MOV0001', 'URL001', '21:45', '2020-06-27'),
(377, 'MOV0002', 'URL001', '10:45', '2020-06-27'),
(378, 'MOV0002', 'URL001', '13:15', '2020-06-27'),
(379, 'MOV0002', 'URL001', '15:45', '2020-06-27'),
(380, 'MOV0002', 'URL001', '18:15', '2020-06-27'),
(381, 'MOV0002', 'URL001', '20:45', '2020-06-27'),
(382, 'MOV0002', 'URL001', '11:30', '2020-06-27'),
(383, 'MOV0002', 'URL001', '14:00', '2020-06-27'),
(384, 'MOV0002', 'URL001', '16:30', '2020-06-27'),
(385, 'MOV0002', 'URL001', '19:00', '2020-06-27'),
(386, 'MOV0002', 'URL001', '21:30', '2020-06-27'),
(387, 'MOV0003', 'URL001', '11:00', '2020-06-27'),
(388, 'MOV0003', 'URL001', '13:30', '2020-06-27'),
(389, 'MOV0003', 'URL001', '16:00', '2020-06-27'),
(390, 'MOV0003', 'URL001', '18:30', '2020-06-27'),
(391, 'MOV0003', 'URL001', '21:00', '2020-06-27'),
(392, 'MOV0004', 'URL001', '11:25', '2020-06-27'),
(393, 'MOV0004', 'URL001', '15:55', '2020-06-27'),
(394, 'MOV0004', 'URL001', '18:10', '2020-06-27'),
(395, 'MOV0004', 'URL001', '20:25', '2020-06-27'),
(396, 'MOV0005', 'URL001', '11:45', '2020-06-27'),
(397, 'MOV0005', 'URL001', '13:50', '2020-06-27'),
(398, 'MOV0005', 'URL001', '15:55', '2020-06-27'),
(399, 'MOV0005', 'URL001', '18:00', '2020-06-27'),
(400, 'MOV0005', 'URL001', '20:05', '2020-06-27'),
(401, 'MOV0005', 'URL001', '22:05', '2020-06-27'),
(402, 'MOV0006', 'URL001', '12:05', '2020-06-27'),
(403, 'MOV0006', 'URL001', '18:35', '2020-06-27'),
(404, 'MOV0006', 'URL001', '13:40', '2020-06-27'),
(405, 'MOV0007', 'URL001', '14:15', '2020-06-27'),
(406, 'MOV0007', 'URL001', '16:25', '2020-06-27'),
(407, 'MOV0007', 'URL001', '20:45', '2020-06-27'),
(408, 'MOV0001', 'URL002', '10:35', '2020-06-27'),
(409, 'MOV0001', 'URL002', '12:50', '2020-06-27'),
(410, 'MOV0001', 'URL002', '15:05', '2020-06-27'),
(411, 'MOV0001', 'URL002', '17:20', '2020-06-27'),
(412, 'MOV0001', 'URL002', '19:35', '2020-06-27'),
(413, 'MOV0001', 'URL002', '21:50', '2020-06-27'),
(414, 'MOV0002', 'URL002', '10:50', '2020-06-27'),
(415, 'MOV0002', 'URL002', '13:20', '2020-06-27'),
(416, 'MOV0002', 'URL002', '15:50', '2020-06-27'),
(417, 'MOV0002', 'URL002', '18:20', '2020-06-27'),
(418, 'MOV0002', 'URL002', '20:50', '2020-06-27'),
(419, 'MOV0002', 'URL002', '11:35', '2020-06-27'),
(420, 'MOV0002', 'URL002', '14:05', '2020-06-27'),
(421, 'MOV0002', 'URL002', '16:35', '2020-06-27'),
(422, 'MOV0002', 'URL002', '19:05', '2020-06-27'),
(423, 'MOV0002', 'URL002', '21:35', '2020-06-27'),
(424, 'MOV0003', 'URL002', '11:05', '2020-06-27'),
(425, 'MOV0003', 'URL002', '13:35', '2020-06-27'),
(426, 'MOV0003', 'URL002', '16:05', '2020-06-27'),
(427, 'MOV0003', 'URL002', '18:35', '2020-06-27'),
(428, 'MOV0003', 'URL002', '21:05', '2020-06-27'),
(429, 'MOV0004', 'URL002', '11:30', '2020-06-27'),
(430, 'MOV0004', 'URL002', '16:00', '2020-06-27'),
(431, 'MOV0004', 'URL002', '18:15', '2020-06-27'),
(432, 'MOV0004', 'URL002', '20:25', '2020-06-27'),
(433, 'MOV0005', 'URL002', '11:50', '2020-06-27'),
(434, 'MOV0005', 'URL002', '13:55', '2020-06-27'),
(435, 'MOV0005', 'URL002', '16:00', '2020-06-27'),
(436, 'MOV0005', 'URL002', '18:05', '2020-06-27'),
(437, 'MOV0005', 'URL002', '20:10', '2020-06-27'),
(438, 'MOV0005', 'URL002', '22:10', '2020-06-27'),
(439, 'MOV0006', 'URL002', '12:10', '2020-06-27'),
(440, 'MOV0006', 'URL002', '18:40', '2020-06-27'),
(441, 'MOV0006', 'URL002', '13:45', '2020-06-27'),
(442, 'MOV0007', 'URL002', '14:20', '2020-06-27'),
(443, 'MOV0007', 'URL002', '16:30', '2020-06-27'),
(444, 'MOV0007', 'URL002', '20:50', '2020-06-27'),
(445, 'MOV0001', 'URL003', '10:40', '2020-06-27'),
(446, 'MOV0001', 'URL003', '12:55', '2020-06-27'),
(447, 'MOV0001', 'URL003', '15:10', '2020-06-27'),
(448, 'MOV0001', 'URL003', '17:25', '2020-06-27'),
(449, 'MOV0001', 'URL003', '19:40', '2020-06-27'),
(450, 'MOV0001', 'URL003', '21:55', '2020-06-27'),
(451, 'MOV0002', 'URL003', '10:55', '2020-06-27'),
(452, 'MOV0002', 'URL003', '13:25', '2020-06-27'),
(453, 'MOV0002', 'URL003', '15:55', '2020-06-27'),
(454, 'MOV0002', 'URL003', '18:25', '2020-06-27'),
(455, 'MOV0002', 'URL003', '20:55', '2020-06-27'),
(456, 'MOV0002', 'URL003', '11:40', '2020-06-27'),
(457, 'MOV0002', 'URL003', '14:10', '2020-06-27'),
(458, 'MOV0002', 'URL003', '16:40', '2020-06-27'),
(459, 'MOV0002', 'URL003', '19:10', '2020-06-27'),
(460, 'MOV0002', 'URL003', '21:40', '2020-06-27'),
(461, 'MOV0003', 'URL003', '11:10', '2020-06-27'),
(462, 'MOV0003', 'URL003', '13:40', '2020-06-27'),
(463, 'MOV0003', 'URL003', '16:50', '2020-06-27'),
(464, 'MOV0003', 'URL003', '18:40', '2020-06-27'),
(465, 'MOV0003', 'URL003', '21:50', '2020-06-27'),
(466, 'MOV0004', 'URL003', '11:35', '2020-06-27'),
(467, 'MOV0004', 'URL003', '16:05', '2020-06-27'),
(468, 'MOV0004', 'URL003', '18:20', '2020-06-27'),
(469, 'MOV0004', 'URL003', '20:35', '2020-06-27'),
(470, 'MOV0005', 'URL003', '11:55', '2020-06-27'),
(471, 'MOV0005', 'URL003', '14:00', '2020-06-27'),
(472, 'MOV0005', 'URL003', '16:05', '2020-06-27'),
(473, 'MOV0005', 'URL003', '18:10', '2020-06-27'),
(474, 'MOV0005', 'URL003', '20:15', '2020-06-27'),
(475, 'MOV0005', 'URL003', '22:15', '2020-06-27'),
(476, 'MOV0006', 'URL003', '12:15', '2020-06-27'),
(477, 'MOV0006', 'URL003', '18:45', '2020-06-27'),
(478, 'MOV0006', 'URL003', '13:50', '2020-06-27'),
(479, 'MOV0007', 'URL003', '14:25', '2020-06-27'),
(480, 'MOV0007', 'URL003', '16:35', '2020-06-27'),
(481, 'MOV0007', 'URL003', '20:55', '2020-06-27');

-- --------------------------------------------------------

--
-- Table structure for table `url`
--

CREATE TABLE `url` (
  `id_url` varchar(16) NOT NULL,
  `url` varchar(128) NOT NULL,
  `lokasi` varchar(256) NOT NULL,
  `script_loc` varchar(256) NOT NULL,
  `last_scraped` date NOT NULL DEFAULT '2020-05-05'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `url`
--

INSERT INTO `url` (`id_url`, `url`, `lokasi`, `script_loc`, `last_scraped`) VALUES
('URL001', 'http://localhost/backup_data/cgv20191212festive.php', 'CGV Festive Walk', 'upload/URL001.js', '2020-06-27'),
('URL002', 'http://localhost/backup_data/cgv20191213techno.php', 'CGV Techno Mart', 'upload/URL002.js', '2020-06-27'),
('URL003', 'http://localhost/backup_data/cgv20191220cimall.php', 'CGV Cikampek Mall', 'upload/URL003.js', '2020-06-27'),
('URL004', 'https://www.cgv.id/en/schedule/cinema/019', 'Festive Walk', 'upload/URL004.js', '2020-06-26');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `nama_pengguna` varchar(32) NOT NULL,
  `kata_sandi` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nama_pengguna`, `kata_sandi`) VALUES
('danz', '$2y$10$.kFff/KMCmmUak.EXQi8Z.3bXWY3so6d8QijxmgkDo59tn09a3Tgu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id_film`);

--
-- Indexes for table `jam_tayang`
--
ALTER TABLE `jam_tayang`
  ADD PRIMARY KEY (`id_jam_tayang`);

--
-- Indexes for table `url`
--
ALTER TABLE `url`
  ADD PRIMARY KEY (`id_url`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nama_pengguna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jam_tayang`
--
ALTER TABLE `jam_tayang`
  MODIFY `id_jam_tayang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=482;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
