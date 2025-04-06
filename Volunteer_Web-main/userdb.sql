-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2025 at 04:12 PM
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
DROP TABLE IF EXISTS users;

CREATE TABLE `users` (
  `usersId` int(11) NOT NULL,
  `usersName` varchar(128) NOT NULL,
  `usersEmail` varchar(128) NOT NULL,
  `usersUsername` varchar(128) NOT NULL,
  `usersPassword` varchar(128) NOT NULL,
  `userHours` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usersId`, `usersName`, `usersEmail`, `usersUsername`, `usersPassword`, `userHours`) VALUES
(2, 'Luigi', 'luigi@luigi.com', 'Luigi78', '$2y$10$JzF6FO9/wfzXo9CQSAc2h.XKpBKDWcSrZjh.HkAluB.gmLRB5nEHa', 200),
(3, 'Kermit', 'Kermit@frog.com', 'Kermit_', '$2y$10$D9gWS60ZoVYLhLicWRM1MOpNLG9xP8e/nA76xd20EMmsgDnzeQ8zy', 180),
(4, 'Sharon', 'Sharong@fakefake.com', 'Sharon_', '$2y$10$y/z/M/jAT0pM37Tj/wmBdu6fXILa5ETf5XU5rKZ8HchiVPbs4g9dS', 20),
(5, 'Lindsay', 'Lindsay@fake.com', 'Lindsay_', '$2y$10$dBbYNq7Pn5KLo6ctjHSgNexpK9cJLoaE6P38JzqB0vzWli9BDjsqO', 99),
(9, 'Tabatha', 'Tabatha@real.com', 'Tabatha1', '$2y$10$2/ouSXIAoHtBLe/pN2djIOeOmt3GEvV3gXsdyCsWwXkCNp/EIPLUO', 140),
(11, 'Sigmawolf', 'real_sigma@wolf.com', 'the_wolf', '$2y$10$H06w8KiyOqc.NjFErlhrnOkbu11oIw29sPFscL09uJJF3Qgn.R/mu', 25),
(12, 'Silas', 'Silas@fake.com', 'Silas_', '$2y$10$txVGr7Dg6PwNvm3MtOObxeYVPGAymOiSdeeVIjwFqrW7AvrFR5ww6', 121),
(13, 'Arden', 'Arden@hill.com', 'Arden_', '$2y$10$XyXT.CYaJPxff27s7gazFOTlVhxLo5qplyekqbbY8JyEmWXZNDDby', 8);

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
