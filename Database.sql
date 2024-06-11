-- CREATE DATABASE wedding_bridge;

-- USE wedding_bridge;

-- CREATE TABLE users (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     name VARCHAR(100) NOT NULL,
--     email VARCHAR(100) NOT NULL UNIQUE,
--     phone VARCHAR(15) NOT NULL,
--     address VARCHAR(255),
--     password VARCHAR(255) NOT NULL
-- );

CREATE DATABASE wedding_bridge;

USE wedding_bridge;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2024 at 07:47 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wedding_bridge`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` int(11) NOT NULL,
  `WedReg_Id` varchar(20) DEFAULT NULL,
  `Entry_Price` int(10) DEFAULT NULL,
  `Bank_name` varchar(100) NOT NULL,
  `Bank_Acc_Name` varchar(100) NOT NULL,
  `Bank_Acc_no` varchar(50) NOT NULL,
  `Branch` varchar(100) NOT NULL,
  `Routing_no` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bride-groom`
--

CREATE TABLE `bride-groom` (
  `id` int(11) NOT NULL,
  `WedReg_Id` varchar(20) DEFAULT NULL,
  `G_first_name` varchar(50) NOT NULL,
  `G_last_name` varchar(50) NOT NULL,
  `G_email` varchar(100) NOT NULL,
  `G_contact` varchar(15) NOT NULL,
  `B_first_name` varchar(50) NOT NULL,
  `B_last_name` varchar(50) NOT NULL,
  `B_email` varchar(100) NOT NULL,
  `B_contact` varchar(15) NOT NULL,
  `wedding_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `news_id` varchar(50) NOT NULL,
  `news_title` text NOT NULL,
  `news_link` varchar(100) DEFAULT NULL,
  `news_content` longtext DEFAULT NULL,
  `news_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `news_id`, `news_title`, `news_link`, `news_content`, `news_img`) VALUES
(17, '1102', 'Want to Attend an Indian Wedding? Now You Can Pay To.', 'https://www.nytimes.com/2023/09/21/style/indian-wedding-tickets-tourists.html', 'BD Wedding Bridge allows tourists to purchase tickets to Bengali weddings. Some say it’s resulted in meaningful cultural exchange. Others believe selling the experience can be cultural fetishism.', 'https://static01.nyt.com/images/2023/09/18/multimedia/TICKETED-INDIAN-WEDDINGS-02-lzfg/TICKETED-INDIAN-WEDDINGS-02-lzfg-jumbo.jpg?quality=75&auto=webp'),
(18, '1103', 'How to (legally) crash an Bengali wedding', 'https://edition.cnn.com/travel/article/join-my-wedding-india/index.html', 'Always fantasized about attending a big blow-out Bangladeshi wedding, complete with days of celebration, delicious food, vibrant interiors and spectacular clothing?\r\nCrashing a random couple’s nuptials isn’t advisable, but there might still be a way to snag an invite.\r\n\r\nThat’s where start-up BDWeddingBridge.com steps in. A global initiative co-founded by entrepreneur Syeed Mahmud in 2024, it connects Bengali couples tying the knot with travelers keen for the ultimate cultural experience.\r\n\r\n- Parkanyi tells CNN Travel.', 'https://media.cnn.com/api/v1/images/stellar/prod/181108114507-namrata-wedding-1.jpg?q=w_1110,c_fill/f_webp'),
(19, '1104', 'বাংলাদেশের এক বিয়ের অনুষ্ঠানে অপরিচিত বিদেশি পর্যটকরা অংশ নিয়েছেন।', 'https://www.bbc.com/bengali/news-37296410', 'উপমহাদেশের অন্যান্য দেশের মতোই বাংলাদেশী পরিবারেও বিয়ের অনুষ্ঠান বেশরিভাগ সময়েই ঝলমলে আর লম্বা সময় ধরে হয়, যেখানে অংশ নেয় পরিবারের সদস্যরা।\r\nতবে এবারই প্রথমবারের মতো একেবারেই অপরিচিত বিদেশি পর্যটকও এ ধরণের বিয়েতে অংশ নেয়ার সুযোগ পাচ্ছে।\r\nপ্রতিদিনের জন্য ৫০ ডলারের বিনিময়ে ওয়েবসাইট থেকে টিকেট কিনে যে কোন দেশ থেকে যে কেউ বিয়ের অতিথি হিসাবে অংশ নিতে পারেন।\r\n\r\nদিল্লি থেকে বিবিসির দিভিয়া আরিয়া জানাচ্ছেন, নাচ-গান ভারতীয় বিয়ের সব সময়ের অনুসঙ্গ। তবে এখানে শুধু ব্যতিক্রম এটাই, এই নাচে অংশ নিচ্ছেন একেবারেই অচেনা কয়েকজন।\r\n-বিবিসি, ইন্ডিয়া', 'https://ichef.bbci.co.uk/images/ic/976x549/p0473jp9.jpg'),
(20, '1105', 'Some couples in India are selling tourists admission to their weddings', 'https://www.cnbc.com/2018/10/16/indian-weddings-tourists-buy-tickets-to-experience-nuptials.html', 'When Surabhi Chauhan, a Delhi-based fund manager, got married last November, roughly 400 guests attended her wedding.\r\n\r\nTwo names on the guest list were people she had never met before: Carly Stevens and Tim Gower.\r\n\r\nThe Australian travel bloggers paid around $200 for a two-day invitation to attend Chauhan’s wedding through a start-up called BD Wedding Bridge.', 'https://image.cnbcfm.com/api/v1/image/105506234-1539571311425carlystevens.jpg?v=1539644878&w=740&h=416&ffmt=webp&vtcrop=y');

-- --------------------------------------------------------

--
-- Table structure for table `regesterd_wedding`
--

CREATE TABLE `regesterd_wedding` (
  `registration_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `Wed_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `super_users`
--

CREATE TABLE `super_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `super_users`
--

INSERT INTO `super_users` (`id`, `username`, `password`) VALUES
(10, 'syeed', '$2y$10$SRlP6P0mh620eFnPtHITQuvrntC8C1iTrEZSUg2tl5Or7B8HJdjkC'),
(13, 'anju', '$2y$10$k/36CuVvZBJUsl9.YrzSfeu9vYch5p2EQD9J34yO8jzk.88HubOY2'),
(15, 'adiba', '$2y$10$mr5a7ZoeDa42mSGiFPA2.eFYvuZadKeskiO36SThDJK6HbVnzeh/u'),
(17, 'admin', '$2y$10$qxYGiZWMZ1V1fuhYsweuuu5cNdkozp7GtkbyDkVmPCrM.8yb4WXdC');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `profile_img` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `weddingevent`
--

CREATE TABLE `weddingevent` (
  `id` int(11) NOT NULL,
  `WedReg_Id` varchar(20) DEFAULT NULL,
  `event_location` varchar(255) NOT NULL,
  `event_start_date` date NOT NULL,
  `event_end_date` date NOT NULL,
  `event_program_list` text NOT NULL,
  `Food` text NOT NULL,
  `Accommodation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bank_ibfk_1` (`WedReg_Id`);

--
-- Indexes for table `bride-groom`
--
ALTER TABLE `bride-groom`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `WedReg_Id` (`WedReg_Id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `news_id` (`news_id`);

--
-- Indexes for table `regesterd_wedding`
--
ALTER TABLE `regesterd_wedding`
  ADD PRIMARY KEY (`registration_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `Wed_id` (`Wed_id`);

--
-- Indexes for table `super_users`
--
ALTER TABLE `super_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `weddingevent`
--
ALTER TABLE `weddingevent`
  ADD PRIMARY KEY (`id`),
  ADD KEY `weddingevent_ibfk_1` (`WedReg_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bride-groom`
--
ALTER TABLE `bride-groom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `regesterd_wedding`
--
ALTER TABLE `regesterd_wedding`
  MODIFY `registration_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `super_users`
--
ALTER TABLE `super_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `weddingevent`
--
ALTER TABLE `weddingevent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bank`
--
ALTER TABLE `bank`
  ADD CONSTRAINT `bank_ibfk_1` FOREIGN KEY (`WedReg_Id`) REFERENCES `bride-groom` (`WedReg_Id`);

--
-- Constraints for table `regesterd_wedding`
--
ALTER TABLE `regesterd_wedding`
  ADD CONSTRAINT `regesterd_wedding_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `regesterd_wedding_ibfk_2` FOREIGN KEY (`Wed_id`) REFERENCES `bride-groom` (`WedReg_Id`);

--
-- Constraints for table `weddingevent`
--
ALTER TABLE `weddingevent`
  ADD CONSTRAINT `weddingevent_ibfk_1` FOREIGN KEY (`WedReg_Id`) REFERENCES `bride-groom` (`WedReg_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
