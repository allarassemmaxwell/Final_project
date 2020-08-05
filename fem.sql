-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 05, 2020 at 11:08 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fem`
--

-- --------------------------------------------------------

--
-- Table structure for table `Contact`
--

CREATE TABLE `Contact` (
  `contact_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Contact`
--

INSERT INTO `Contact` (`contact_id`, `first_name`, `last_name`, `email`, `subject`, `message`, `created_at`) VALUES
(1, 'Allarassem', 'Maxime', 'a@gmail.com', 'sd', 'Crestwood Marketing & Communications Ltd is an integrated communications agency that endeavours to professionally solve sophisticated business and communications problems by strategically utilizing data-driven and other exceptional approaches to enhance and protect brands and reputations.\r\nWe pride ourselves in a competent and creative team of communication, public relations, advertising, design and marketing practitioners and strategists,\r\nwith vast and distinguished experience.', '2020-08-04 22:36:43'),
(2, 'Alla', 'Max', 'ad@gmail.com', 'subject 1', 'Crestwood Marketing & Communications Ltd is an integrated communications agency that endeavours to professionally solve sophisticated business and communications problems by strategically utilizing data-driven and other exceptional approaches to enhance and protect brands and reputations.\r\nWe pride ourselves in a competent and creative team of communication, public relations, advertising, design and marketing practitioners and strategists,\r\nwith vast and distinguished experience.', '2020-08-04 22:47:44');

-- --------------------------------------------------------

--
-- Table structure for table `Expense`
--

CREATE TABLE `Expense` (
  `expense_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_service_id` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Expense`
--

INSERT INTO `Expense` (`expense_id`, `user_id`, `product_service_id`, `price`, `created_at`) VALUES
(12, 4, 7, '200', '2020-07-11 23:53:31'),
(24, 5, 14, '100', '2020-07-15 22:01:24'),
(25, 5, 14, '12', '2020-07-17 22:01:23'),
(26, 4, 7, '1000', '2020-07-27 21:18:20');

-- --------------------------------------------------------

--
-- Table structure for table `Income`
--

CREATE TABLE `Income` (
  `income_id` int(11) NOT NULL,
  `source_id` int(11) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Income`
--

INSERT INTO `Income` (`income_id`, `source_id`, `amount`, `created_at`, `user_id`) VALUES
(18, 35, '40', '2020-07-11 23:38:23', 4),
(22, 38, '20000', '2020-07-15 21:58:15', 5),
(25, 34, '30000', '2020-07-25 11:28:18', 4);

-- --------------------------------------------------------

--
-- Table structure for table `ProductService`
--

CREATE TABLE `ProductService` (
  `product_service_id` int(11) NOT NULL,
  `product_service_category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ProductService`
--

INSERT INTO `ProductService` (`product_service_id`, `product_service_category_id`, `name`, `created_at`, `user_id`) VALUES
(7, 10, 'Product 2', '2020-07-11 23:49:54', 4),
(14, 18, 'Mango', '2020-07-15 21:59:10', 5);

-- --------------------------------------------------------

--
-- Table structure for table `ProductServiceCategory`
--

CREATE TABLE `ProductServiceCategory` (
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ProductServiceCategory`
--

INSERT INTO `ProductServiceCategory` (`category_id`, `user_id`, `name`, `created_at`) VALUES
(6, 4, 'Category 1', '2020-07-11 23:42:59'),
(10, 4, 'Category 2', '2020-07-11 23:44:59'),
(11, 4, 'Category 3', '2020-07-11 23:45:05'),
(12, 4, 'Category 4', '2020-07-11 23:45:11'),
(18, 5, 'Food', '2020-07-15 21:58:45');

-- --------------------------------------------------------

--
-- Table structure for table `Report`
--

CREATE TABLE `Report` (
  `report_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `expense_id` int(11) NOT NULL,
  `income_id` int(11) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Saving`
--

CREATE TABLE `Saving` (
  `saving_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `expense_id` int(11) NOT NULL,
  `income_id` int(11) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Source`
--

CREATE TABLE `Source` (
  `source_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Source`
--

INSERT INTO `Source` (`source_id`, `user_id`, `name`, `created_at`) VALUES
(34, 4, 'Source 3', '2020-07-11 23:28:32'),
(35, 4, 'Source 4', '2020-07-11 23:28:36'),
(38, 5, 'System Analyst', '2020-07-15 21:56:26'),
(39, 4, 'Source 2', '2020-07-25 11:28:28');

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `family_number` int(3) NOT NULL DEFAULT 0,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `user_password` varchar(200) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`user_id`, `first_name`, `last_name`, `user_email`, `family_number`, `is_admin`, `user_password`, `created_at`) VALUES
(3, 'Allarassem', 'Maxwell', 'alla@gmail.com', 0, 1, '59d4b220ea33c6b20362cc77fd961f13', '2020-06-06'),
(4, 'Allarassem', 'Maxime', 'a@gmail.com', 0, 0, '59d4b220ea33c6b20362cc77fd961f13', '2020-06-06'),
(5, 'Victoria', 'Solmem', 'victoria@gmail.com', 0, 0, '59d4b220ea33c6b20362cc77fd961f13', '2020-07-16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Contact`
--
ALTER TABLE `Contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `Expense`
--
ALTER TABLE `Expense`
  ADD PRIMARY KEY (`expense_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_service_id` (`product_service_id`);

--
-- Indexes for table `Income`
--
ALTER TABLE `Income`
  ADD PRIMARY KEY (`income_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `source_id` (`source_id`);

--
-- Indexes for table `ProductService`
--
ALTER TABLE `ProductService`
  ADD PRIMARY KEY (`product_service_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_service_category_id` (`product_service_category_id`);

--
-- Indexes for table `ProductServiceCategory`
--
ALTER TABLE `ProductServiceCategory`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `Report`
--
ALTER TABLE `Report`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `income_id` (`income_id`),
  ADD KEY `expense_id` (`expense_id`);

--
-- Indexes for table `Saving`
--
ALTER TABLE `Saving`
  ADD PRIMARY KEY (`saving_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `expense_id` (`expense_id`),
  ADD KEY `income_id` (`income_id`);

--
-- Indexes for table `Source`
--
ALTER TABLE `Source`
  ADD PRIMARY KEY (`source_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Contact`
--
ALTER TABLE `Contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Expense`
--
ALTER TABLE `Expense`
  MODIFY `expense_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `Income`
--
ALTER TABLE `Income`
  MODIFY `income_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `ProductService`
--
ALTER TABLE `ProductService`
  MODIFY `product_service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ProductServiceCategory`
--
ALTER TABLE `ProductServiceCategory`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `Report`
--
ALTER TABLE `Report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Saving`
--
ALTER TABLE `Saving`
  MODIFY `saving_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Source`
--
ALTER TABLE `Source`
  MODIFY `source_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Expense`
--
ALTER TABLE `Expense`
  ADD CONSTRAINT `expense_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `User` (`user_id`),
  ADD CONSTRAINT `expense_ibfk_2` FOREIGN KEY (`product_service_id`) REFERENCES `ProductService` (`product_service_id`);

--
-- Constraints for table `Income`
--
ALTER TABLE `Income`
  ADD CONSTRAINT `income_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `User` (`user_id`),
  ADD CONSTRAINT `income_ibfk_2` FOREIGN KEY (`source_id`) REFERENCES `Source` (`source_id`);

--
-- Constraints for table `ProductService`
--
ALTER TABLE `ProductService`
  ADD CONSTRAINT `productservice_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `User` (`user_id`),
  ADD CONSTRAINT `productservice_ibfk_2` FOREIGN KEY (`product_service_category_id`) REFERENCES `ProductServiceCategory` (`category_id`);

--
-- Constraints for table `ProductServiceCategory`
--
ALTER TABLE `ProductServiceCategory`
  ADD CONSTRAINT `productservicecategory_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `User` (`user_id`);

--
-- Constraints for table `Report`
--
ALTER TABLE `Report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `User` (`user_id`),
  ADD CONSTRAINT `report_ibfk_2` FOREIGN KEY (`income_id`) REFERENCES `Income` (`income_id`),
  ADD CONSTRAINT `report_ibfk_3` FOREIGN KEY (`expense_id`) REFERENCES `Expense` (`expense_id`);

--
-- Constraints for table `Saving`
--
ALTER TABLE `Saving`
  ADD CONSTRAINT `saving_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `User` (`user_id`),
  ADD CONSTRAINT `saving_ibfk_2` FOREIGN KEY (`expense_id`) REFERENCES `Expense` (`expense_id`),
  ADD CONSTRAINT `saving_ibfk_3` FOREIGN KEY (`income_id`) REFERENCES `Income` (`income_id`);

--
-- Constraints for table `Source`
--
ALTER TABLE `Source`
  ADD CONSTRAINT `source_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `User` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
