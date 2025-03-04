-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2025 at 10:13 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `userdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usersId` int(11) NOT NULL,
  `usersName` varchar(128) NOT NULL,
  `usersEmail` varchar(128) NOT NULL,
  `usersUsername` varchar(128) NOT NULL,
  `usersPassword` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usersId`, `usersName`, `usersEmail`, `usersUsername`, `usersPassword`) VALUES
(2, 'cfauna47', 'cfauna@cover.com', 'cfauna47', '$2y$10$JzF6FO9/wfzXo9CQSAc2h.XKpBKDWcSrZjh.HkAluB.gmLRB5nEHa'),
(3, 'nimimi', 'nimi@nightmare.com', 'nimimi', '$2y$10$D9gWS60ZoVYLhLicWRM1MOpNLG9xP8e/nA76xd20EMmsgDnzeQ8zy'),
(4, 'sigmawolf', 'sigma@university.com', 'sigmawolf', '$2y$10$y/z/M/jAT0pM37Tj/wmBdu6fXILa5ETf5XU5rKZ8HchiVPbs4g9dS'),
(5, 'gamingkirin', 'fauna@cover.com', 'gamingkirin', '$2y$10$dBbYNq7Pn5KLo6ctjHSgNexpK9cJLoaE6P38JzqB0vzWli9BDjsqO'),
(9, 'Oozaru Subaru', 'subaru@cover.com', 'subawu', '$2y$10$2/ouSXIAoHtBLe/pN2djIOeOmt3GEvV3gXsdyCsWwXkCNp/EIPLUO'),
(11, 'Test ', 'test@email.com', 'subawu', '$2y$10$H06w8KiyOqc.NjFErlhrnOkbu11oIw29sPFscL09uJJF3Qgn.R/mu'),
(12, 'Inugami Korone', 'korone@cover.com', 'koronesuke', '$2y$10$txVGr7Dg6PwNvm3MtOObxeYVPGAymOiSdeeVIjwFqrW7AvrFR5ww6'),
(13, 'Sigma Wolf', 'wolf@sigma.com', 'sigma', '$2y$10$XyXT.CYaJPxff27s7gazFOTlVhxLo5qplyekqbbY8JyEmWXZNDDby');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usersId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usersId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
