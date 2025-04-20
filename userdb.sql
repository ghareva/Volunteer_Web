-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2025 at 07:47 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12


-- disable FK‐checks so drops won’t fail
SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `availability`;
DROP TABLE IF EXISTS `events`;
DROP TABLE IF EXISTS `volunteer_companies`;
DROP TABLE IF EXISTS `users`;

-- re‐enable FK‐checks
SET FOREIGN_KEY_CHECKS = 1;


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
-- Table structure for table `availability`
--

CREATE TABLE `availability` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `day_of_week` varchar(10) NOT NULL,
  `time_block` time NOT NULL,
  `available` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `availability`
--

INSERT INTO `availability` (`id`, `user_id`, `day_of_week`, `time_block`, `available`) VALUES
(21, 3, 'Mon', '00:00:00', 1),
(22, 3, 'Mon', '01:00:00', 1),
(23, 3, 'Mon', '02:00:00', 1),
(24, 3, 'Mon', '03:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `user_id`, `title`, `start`, `end`) VALUES
(1, 3, 'Gooning Sesh', '2025-04-14 00:00:00', '2025-04-15 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(128) NOT NULL,
  `lastname` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `streetname` varchar(128) DEFAULT NULL,
  `city` varchar(128) DEFAULT NULL,
  `state` varchar(128) DEFAULT NULL,
  `zipcode` varchar(128) DEFAULT NULL,
  `phonenumber` varchar(128) DEFAULT NULL,
  `profile_picture` varchar(128) DEFAULT NULL,
  `volunteer_hours` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `streetname`, `city`, `state`, `zipcode`, `phonenumber`, `profile_picture`, `volunteer_hours`) VALUES
(1, 'Nimi', 'Nightmare', 'nimi@nightmare.com', '$2y$10$jAMZiwBw2/7cAwZ2qepcc.KLYje5tXNh16R.JJ7Wzt6Bce4FRs.Jq', 'Nimi Street 123', 'Ohio', 'OH', '23456', '345 567-7890', 'profile_1.png', 0),
(2, 'Dooby', 'Doob', 'dooby@doob.com', '$2y$10$TyFYTUdcvrWqp7lSkzYmROhtd47VpuU3Qguk/1oNA8wOWtz6hOUtu', 'Dooby Street', 'Doob', 'AL', '12345', '123 456-7890', 'profile_2.gif', 0),
(3, 'Sigma', 'Wolf', 'sigma@university.com', '$2y$10$RG.WmRL8j6TYKIH1xSeM9.kyS0.IRcW5PbS7OTHzfLZmR1dk2pVma', NULL, NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `volunteer_companies`
--

CREATE TABLE `volunteer_companies` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `volunteering_type` enum('business','shelter','soup kitchen','event','personal') NOT NULL,
  `organization_type` enum('501c3','personal','private','non-profit','government','other') NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `volunteer_companies`
--

INSERT INTO `volunteer_companies` (`id`, `name`, `address`, `city`, `phone`, `volunteering_type`, `organization_type`, `created_at`, `image_url`) VALUES
(1, 'Helping Hands', '123 Main St', 'Springfield', '555-123-4567', 'shelter', 'non-profit', '2025-03-06 22:59:46', 'images/helping_hands.jpg'),
(2, 'Green Earth Plan', '456 Elm St', 'Greendale', '555-987-6543', 'business', '501c3', '2025-03-06 22:59:46', 'images/green_earth_plan.jpg'),
(3, 'Safe Haven', '789 Oak Ave', 'Fairview', '555-555-1111', 'shelter', 'non-profit', '2025-03-06 22:59:46', 'images/safe_haven.jpg'),
(4, 'Community Harvest', '101 Maple Rd', 'Brookfield', '555-444-2222', 'soup kitchen', '501c3', '2025-03-06 22:59:46', 'images/community_harvest.jpg'),
(5, 'Clean City Crew', '202 Pine Blvd', 'Riverside', '555-333-1212', 'event', 'government', '2025-03-06 22:59:46', 'images/clean_city_crew.jpg'),
(6, 'Urban Outreach', '303 Cedar St', 'Lakeside', '555-111-5656', 'personal', 'other', '2025-03-06 22:59:46', 'images/urban_outreach.jpg'),
(7, 'River Rescue', '404 Birch Ln', 'Bridgeport', '555-444-7878', 'event', '501c3', '2025-03-06 22:59:46', 'images/river_rescue.jpg'),
(8, 'Neighborhood Care', '505 Walnut Dr', 'Hillview', '555-222-4545', 'business', 'private', '2025-03-06 22:59:46', 'images/neighborhood_care.jpg'),
(9, 'Food for All', '606 Poplar Ave', 'Oakwood', '555-999-1234', 'soup kitchen', 'non-profit', '2025-03-06 22:59:46', 'images/food_for_all.jpg'),
(10, 'City Park Volunteers', '707 Ash Ct', 'Cedarville', '555-888-9999', 'event', 'government', '2025-03-06 22:59:46', 'images/city_park_volunteers.jpg'),
(11, 'Sunrise Support', '808 Magnolia Rd', 'Rosewood', '555-000-1122', 'shelter', '501c3', '2025-03-06 22:59:46', 'images/sunrise_support.jpg'),
(12, 'Eco Warriors', '909 Pinecrest Dr', 'Greendale', '555-333-9898', 'business', 'private', '2025-03-06 22:59:46', 'images/eco_warriors.jpg'),
(13, 'Hopeful Hearts', '111 Maplewood Ln', 'Springfield', '555-123-9999', 'personal', 'non-profit', '2025-03-06 22:59:46', 'images/hopeful_hearts.jpg'),
(14, 'Helping Paws', '222 Dogwood St', 'Fairview', '555-101-2020', 'shelter', 'personal', '2025-03-06 22:59:46', 'images/helping_paws.jpg'),
(15, 'Meal Makers', '333 River Rd', 'Brookfield', '555-202-3030', 'soup kitchen', 'other', '2025-03-06 22:59:46', 'images/meal_makers.jpg'),
(16, 'GreenThumb Initiative', '444 Forest Ave', 'Hillview', '555-303-4040', 'event', '501c3', '2025-03-06 22:59:46', 'images/greenthumb_initiative.jpg'),
(17, 'Reading Buddies', '555 Library Ln', 'Riverside', '555-404-5050', 'personal', 'non-profit', '2025-03-06 22:59:46', 'images/reading_buddies.jpg'),
(18, 'Habitat Builders', '666 Hammer St', 'Bridgeport', '555-505-6060', 'business', '501c3', '2025-03-06 22:59:46', 'images/habitat_builders.jpg'),
(19, 'Open Arms', '777 Peach Dr', 'Lakeside', '555-606-7070', 'shelter', 'non-profit', '2025-03-06 22:59:46', 'images/open_arms.jpg'),
(20, 'Feeding Neighbors', '888 Market St', 'Oakwood', '555-707-8080', 'soup kitchen', 'government', '2025-03-06 22:59:46', 'images/feeding_neighbors.jpg'),
(21, 'Parkside Helpers', '999 Greenway Ln', 'Rosewood', '555-808-9090', 'event', 'private', '2025-03-06 22:59:46', 'images/parkside_helpers.jpg'),
(22, 'Warm Winters', '1001 Frost St', 'Cedarville', '555-111-0000', 'personal', 'other', '2025-03-06 22:59:46', 'images/warm_winters.jpg'),
(23, 'Community Crafters', '1102 Artisan Ave', 'Fairview', '555-222-1111', 'business', '501c3', '2025-03-06 22:59:46', 'images/community_crafters.jpg'),
(24, 'Shelter for All', '1203 Shelter Way', 'Brookfield', '555-333-2222', 'shelter', 'non-profit', '2025-03-06 22:59:46', 'images/shelter_for_all.jpg'),
(25, 'Meals on Wheels', '1304 Rolling Rd', 'Greendale', '555-444-3333', 'soup kitchen', '501c3', '2025-03-06 22:59:46', 'images/meals_on_wheels.jpg'),
(26, 'Beach Cleanup Crew', '1405 Shoreline Dr', 'Riverside', '555-555-4444', 'event', 'personal', '2025-03-06 22:59:46', 'images/beach_cleanup_crew.jpg'),
(27, 'Garden Givers', '1506 Bloom Ln', 'Lakeside', '555-666-5555', 'personal', 'private', '2025-03-06 22:59:46', 'images/garden_givers.jpg'),
(28, 'Neighborhood Tutors', '1607 Scholar St', 'Hillview', '555-777-6666', 'business', 'other', '2025-03-06 22:59:46', 'images/neighborhood_tutors.jpg'),
(29, 'Women in Need', '1708 Lady Ln', 'Bridgeport', '555-888-7777', 'shelter', '501c3', '2025-03-06 22:59:46', 'images/women_in_need.jpg'),
(30, 'Soup n Share', '1809 Broth Ave', 'Oakwood', '555-999-8888', 'soup kitchen', 'private', '2025-03-06 22:59:46', 'images/soup_n_share.jpg'),
(31, 'Harvest Hands', '1901 Orchard Rd', 'Rosewood', '555-101-9999', 'event', 'non-profit', '2025-03-06 22:59:46', 'images/harvest_hands.jpg'),
(32, 'Helping Elders', '2002 Sunrise Ct', 'Springfield', '555-202-0000', 'personal', 'government', '2025-03-06 22:59:46', 'images/helping_elders.jpg'),
(33, 'Safe Shores', '2103 Coastal Dr', 'Fairview', '555-303-1111', 'shelter', 'personal', '2025-03-06 22:59:46', 'images/safe_shores.jpg'),
(34, 'Art for All', '2204 Canvas St', 'Greendale', '555-404-2222', 'business', 'other', '2025-03-06 22:59:46', 'images/art_for_all.jpg'),
(35, 'Community Runners', '2305 Track Ln', 'Brookfield', '555-505-3333', 'event', 'personal', '2025-03-06 22:59:46', 'images/community_runners.jpg'),
(36, 'Street Outreach', '2406 Hope Ave', 'Cedarville', '555-606-4444', 'personal', 'private', '2025-03-06 22:59:46', 'images/street_outreach.jpg'),
(37, 'Hope Springs', '2507 Well St', 'Lakeside', '555-707-5555', 'shelter', '501c3', '2025-03-06 22:59:46', 'images/hope_springs.jpg'),
(38, 'Soul Soup Kitchen', '2608 Harvest Ln', 'Bridgeport', '555-808-6666', 'soup kitchen', 'non-profit', '2025-03-06 22:59:46', 'images/soul_soup_kitchen.jpg'),
(39, 'Green Light', '2709 Renewable Rd', 'Riverside', '555-909-7777', 'business', 'government', '2025-03-06 22:59:46', 'images/green_light.jpg'),
(40, 'Open Fields', '1002 Walnut St', 'Rosewood', '555-440-3322', 'event', 'other', '2025-03-06 22:59:46', 'images/open_fields.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `availability`
--
ALTER TABLE `availability`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`day_of_week`,`time_block`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `volunteer_companies`
--
ALTER TABLE `volunteer_companies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `availability`
--
ALTER TABLE `availability`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `volunteer_companies`
--
ALTER TABLE `volunteer_companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `availability`
--
ALTER TABLE `availability`
  ADD CONSTRAINT `availability_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
