-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 21, 2020 at 03:25 PM
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
(4, 'Maxime', 'Allarassem', 'a@gmail.com', 'Testing', 'I  needed to build an SVG pie chart and found some great examples of pie charts, but it took a while for me to decipher what exactly was going on in each example. Below, I’m going to break down, step by step, how to understand and build your own SVG pie chart.\r\n\r\n\r\nCreate the SVG\r\n\r\nWhat We Did\r\nCreate an SVG element to work with.\r\nSet both the height and width to 20px (20 pixels). This gives us a small image, but we can always scale it up with CSS.\r\nDefine the viewBox (understanding viewBox) so that viewable area covers the entire SVG.\r\nAdd Some Circles\r\n\r\nWhat We Did\r\nAdd a circle (mdn.io/circle) element for the background of the pie chart.\r\nCircle elements need a radius, or r, attribute to define the width of the circle. You can position them along the X and Y axis by setting the cx and cy attributes respectively.\r\nClone the background circle. This second circle becomes the pie slice, and we’ll temporarily set the fill color to bisque so we can see what we’re doing.\r\nFrom Border to Wedge\r\n\r\nWhat We Did\r\nAdd a tomato colored stroke (mdn.io/stroke) to the image.\r\nSince the width of the stroke is centered on the edge of the circle, we resize the bisque circle to be half the size of the background.\r\nCreate wedge shapes by setting the stroke-dasharray (mdn.io/stroke-dasharray). Wedges will be 1 pixel wide with 3 pixels of space between them.\r\nSet the stroke-width (mdn.io/stroke-width) to be equal to the radius of the background circle (10px) so that it extends from the center of the circle to the edge.\r\nDo Some Math\r\n\r\nWhat We Did\r\nSet the stroke-dasharray gap to the circumference of the bisque circle to ensure only one wedge is visible.\r\nUse the CSS calc() (mdn.io/calc) function to convert the number for the wedge width into a percentage.\r\nIt’s important to note that using the calc function like this might not work in all browsers, including IE11 and older. So if browser support is a concern you’ll either have to manually calculate the percentage (in this case the value would be 10.99), or if you have multiple pie charts on the page, you can use JavaScript to do that math for you.\r\n\r\nClean Up The Code\r\n\r\nWhat We Did\r\nSet the fill color of the bisque circle to transparent so the base circle is no longer visible.\r\nUse the transform (mdn.io/svg/transform) attribute and the rotate() function to rotate the pie wedge -90 degrees so that it starts at the top of the circle.\r\nUse the translate() function to pull the wedge back down -20 pixels (the height of the SVG) after the circle rotates out of view.\r\nAnd there you have a basic SVG pie chart. With a little bit of imagination and some CSS and Javascript, you can build upon the example above to create donut charts, animated charts, and interactive charts. Happy coding!\r\n\r\n', '2020-10-17 22:43:22'),
(5, 'FirstName', 'LastName', 'useremail@gmail.com', 'Donation', 'With the other basic shapes, including rect, line and polygon we can make any type of SVG chart that our heart desires. The real question is this: do we really want to? For example, line charts are certainly possible to make when you’re editing an SVG by hand, but I wouldn’t necessarily recommend it since the syntax is a bit complex, especially if you wanted to do something like curve the line.', '2020-10-18 21:53:11');

-- --------------------------------------------------------

--
-- Table structure for table `ContactResponse`
--

CREATE TABLE `ContactResponse` (
  `contact_response_id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ContactResponse`
--

INSERT INTO `ContactResponse` (`contact_response_id`, `contact_id`, `staff_id`, `message`, `created_at`) VALUES
(1, 4, 35, 'Contact reply 1', '2020-10-18 14:47:34');

-- --------------------------------------------------------

--
-- Table structure for table `Expense`
--

CREATE TABLE `Expense` (
  `expense_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_service_id` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `income_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Expense`
--

INSERT INTO `Expense` (`expense_id`, `user_id`, `product_service_id`, `price`, `created_at`, `income_id`) VALUES
(122, 34, 205, '1000', '2020-10-04 17:17:20', 76),
(123, 34, 204, '1000', '2020-10-10 17:17:44', 74),
(124, 34, 202, '2000', '2020-10-06 17:18:01', 74),
(125, 34, 201, '500', '2020-10-10 17:18:19', 74),
(126, 34, 200, '2500', '2020-10-03 17:19:06', 74),
(127, 34, 199, '500', '2020-10-11 17:19:20', 74),
(128, 34, 198, '3000', '2020-10-11 17:19:37', 74),
(129, 34, 197, '5000', '2020-10-09 17:19:51', 74),
(130, 34, 196, '2500', '2020-10-11 17:20:10', 74),
(131, 34, 195, '3500', '2020-10-08 17:20:28', 74),
(132, 34, 194, '5000', '2020-10-05 17:21:02', 74),
(133, 34, 193, '1500', '2020-10-02 17:21:16', 74),
(134, 34, 192, '2000', '2020-10-11 17:21:42', 74),
(135, 34, 191, '2000', '2020-10-08 17:22:49', 75),
(136, 34, 190, '2000', '2020-10-08 17:23:22', 75),
(137, 34, 189, '5000', '2020-10-02 17:23:39', 74),
(138, 34, 182, '2000', '2020-10-10 17:24:20', 75),
(139, 34, 181, '2000', '2020-10-08 17:24:45', 74),
(140, 34, 180, '5000', '2020-10-04 17:27:03', 76),
(141, 34, 179, '2000', '2020-10-04 17:27:17', 74),
(142, 34, 178, '1000', '2020-10-16 17:27:32', 75),
(143, 34, 177, '2500', '2020-10-09 17:27:46', 75),
(144, 34, 176, '5000', '2020-10-07 17:28:06', 75),
(145, 34, 175, '1500', '2020-10-08 17:29:28', 75),
(146, 34, 173, '1500', '2020-10-10 17:29:53', 76),
(147, 34, 172, '2000', '2020-10-07 17:30:25', 75),
(148, 34, 171, '5000', '2020-10-04 17:30:54', 74),
(149, 34, 164, '3000', '2020-10-07 17:31:27', 76),
(150, 34, 162, '5000', '2020-10-05 17:31:54', 76),
(151, 34, 161, '5000', '2020-10-09 17:32:10', 75),
(152, 34, 158, '2500', '2020-10-01 17:32:47', 75),
(153, 34, 157, '7000', '2020-10-06 17:33:04', 76),
(154, 34, 155, '600', '2020-10-10 17:33:24', 75),
(155, 34, 160, '1000', '2020-10-04 17:48:23', 75),
(157, 34, 146, '2000', '2020-09-25 19:58:23', 77),
(158, 34, 154, '1500', '2020-09-14 19:58:59', 77),
(159, 34, 147, '2000', '2020-09-17 20:45:15', 77),
(160, 34, 142, '1000', '2020-10-07 20:49:55', 74),
(161, 34, 154, '1000', '2020-09-28 20:50:53', 77),
(162, 34, 155, '1000', '2020-09-14 20:51:13', 77),
(163, 34, 200, '2000', '2020-09-06 20:54:12', 77),
(164, 34, 199, '1000', '2020-09-29 20:54:33', 77),
(165, 34, 146, '1000', '2020-10-11 20:57:49', 75),
(166, 34, 167, '1500', '2020-10-11 20:58:18', 75),
(167, 34, 157, '30000', '2020-09-23 06:49:28', 77),
(168, 34, 190, '5000', '2020-09-12 06:49:45', 77),
(169, 34, 153, '5000', '2020-09-20 06:51:23', 77),
(170, 34, 194, '3000', '2020-09-19 06:51:44', 77),
(171, 34, 178, '1000', '2020-09-08 06:52:08', 77),
(172, 34, 205, '1000', '2020-09-07 07:03:04', 77),
(173, 34, 192, '20000', '2020-09-05 07:03:26', 77),
(174, 34, 180, '35000', '2020-09-04 07:03:43', 77),
(176, 34, 173, '1500', '2020-09-02 07:04:18', 77),
(177, 34, 170, '1000', '2020-09-01 07:04:43', 77),
(178, 34, 155, '1200', '2020-10-09 07:05:02', 74),
(179, 34, 149, '2000', '2020-10-12 07:05:27', 74),
(180, 34, 200, '600', '2020-10-12 07:48:06', 74),
(181, 34, 149, '200', '2020-10-12 07:48:34', 75),
(182, 34, 197, '800', '2020-10-17 07:49:17', 75),
(187, 34, 167, '200', '2020-10-17 22:27:59', 76),
(195, 34, 178, '200', '2020-10-18 21:20:03', 76),
(196, 34, 190, '800', '2020-10-18 21:23:55', 75),
(197, 34, 146, '1000', '2020-10-18 21:25:24', 75);

-- --------------------------------------------------------

--
-- Table structure for table `Help`
--

CREATE TABLE `Help` (
  `help_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Help`
--

INSERT INTO `Help` (`help_id`, `user_id`, `message`, `created_at`) VALUES
(5, 34, 'This is the second help', '2020-10-18 13:44:46'),
(6, 34, 'Well, one of the peculiarities of styling SVG with CSS is that there are only certain properties we can control. If we want to change the x or y coordinates of a g for instance (without using the CSS transform property) then we’ll need to use JavaScript. What makes this even stranger if you’re unfamiliar with the SVG syntax is that CSS properties will have an affect on certain elements, but not others.', '2020-10-18 13:45:10'),
(7, 34, 'Well, one of the peculiarities of styling SVG with CSS is that there are only certain properties we can control. If we want to change the x or y coordinates of a g for instance (without using the CSS transform property) then we’ll need to use JavaScript. What makes this even stranger if you’re unfamiliar with the SVG syntax is that CSS properties will have an affect on certain elements, but not others.', '2020-10-18 13:45:13'),
(8, 34, 'With the other basic shapes, including rect, line and polygon we can make any type of SVG chart that our heart desires. The real question is this: do we really want to? For example, line charts are certainly possible to make when you’re editing an SVG by hand, but I wouldn’t necessarily recommend it since the syntax is a bit complex, especially if you wanted to do something like curve the line.', '2020-10-18 21:42:44'),
(9, 34, 'wfuhweifwefjihvujeowfef', '2020-10-20 14:22:23');

-- --------------------------------------------------------

--
-- Table structure for table `HelpResponse`
--

CREATE TABLE `HelpResponse` (
  `help_response_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `HelpResponse`
--

INSERT INTO `HelpResponse` (`help_response_id`, `user_id`, `staff_id`, `message`, `created_at`) VALUES
(1, 34, 35, 'This is the first answer', '2020-10-18 14:18:29'),
(2, 34, 35, 'sdsdsd', '2020-10-18 14:19:43'),
(3, 34, 35, 'Well, one of the peculiarities of styling SVG with CSS is that there are only certain properties we can control. If we want to change the x or y coordinates of a g for instance (without using the CSS transform property) then we’ll need to use JavaScript. What makes this even stranger if you’re unfamiliar with the SVG syntax is that CSS properties will have an affect on certain elements, but not others.                ', '2020-10-18 21:29:53'),
(4, 34, 35, 'gshdihiajpodkapkda', '2020-10-20 14:29:46');

-- --------------------------------------------------------

--
-- Table structure for table `Income`
--

CREATE TABLE `Income` (
  `income_id` int(11) NOT NULL,
  `source_id` int(11) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL,
  `remaining_amount` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Income`
--

INSERT INTO `Income` (`income_id`, `source_id`, `amount`, `created_at`, `user_id`, `remaining_amount`) VALUES
(74, 72, '75000', '2020-10-05 23:33:40', 34, '27200'),
(75, 71, '40000', '2020-10-05 23:33:51', 34, '7600'),
(76, 70, '25000', '2020-10-05 23:34:07', 34, '2100'),
(77, 70, '150000', '2020-09-01 18:45:09', 34, '37000');

-- --------------------------------------------------------

--
-- Table structure for table `PasswordReset`
--

CREATE TABLE `PasswordReset` (
  `password_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_token` varchar(255) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(141, 82, 'Mortgage or rent', '2020-09-27 15:06:21', 34),
(142, 82, 'Property taxes', '2020-09-27 15:06:32', 34),
(143, 82, 'Household repairs', '2020-09-27 15:06:42', 34),
(144, 83, 'Car payment', '2020-09-27 15:06:51', 34),
(145, 83, 'Car warranty', '2020-09-27 15:07:00', 34),
(146, 83, 'Gas', '2020-09-27 15:07:08', 34),
(147, 83, 'Tires', '2020-09-27 15:07:16', 34),
(148, 83, 'Maintenance and oil changes', '2020-09-27 15:07:26', 34),
(149, 83, 'Parking fees', '2020-09-27 15:07:38', 34),
(150, 83, 'Repairs', '2020-09-27 15:07:46', 34),
(151, 83, 'Registration and DMV Fees', '2020-09-27 15:07:55', 34),
(152, 84, 'Groceries', '2020-09-27 15:08:04', 34),
(153, 84, 'Restaurants', '2020-09-27 15:08:12', 34),
(154, 85, 'Electricity', '2020-09-27 15:08:23', 34),
(155, 85, 'Water', '2020-09-27 15:08:31', 34),
(156, 85, 'Garbage', '2020-09-27 15:08:39', 34),
(157, 85, 'Phones', '2020-09-27 15:08:48', 34),
(158, 85, 'Internet', '2020-09-27 15:08:59', 34),
(159, 86, 'Adults’ clothing', '2020-09-27 15:09:20', 34),
(160, 86, 'Adults’ shoes', '2020-09-27 15:09:33', 34),
(161, 86, 'Children’s clothing', '2020-09-27 15:09:42', 34),
(162, 86, 'Children’s shoes', '2020-09-27 15:09:52', 34),
(163, 87, 'Primary care', '2020-09-27 15:10:03', 34),
(164, 87, 'Dental care', '2020-09-27 15:10:16', 34),
(165, 87, 'Specialty care (dermatologists, orthodontics, optometrists, etc.)', '2020-09-27 15:10:33', 34),
(166, 87, 'Urgent care', '2020-09-27 15:10:41', 34),
(167, 87, 'Medications', '2020-09-27 15:10:50', 34),
(168, 87, 'Medical devices', '2020-09-27 15:10:59', 34),
(169, 88, 'Health insurance', '2020-09-27 15:11:14', 34),
(170, 88, 'Homeowner’s or renter’s insurance', '2020-09-27 15:11:26', 34),
(171, 88, 'Home warranty or protection plan', '2020-09-27 15:11:36', 34),
(172, 88, 'Life insurance', '2020-09-27 15:11:47', 34),
(173, 89, 'Toiletries', '2020-09-27 15:11:59', 34),
(174, 89, 'Laundry detergent', '2020-09-27 15:12:47', 34),
(175, 89, 'Cleaning supplies', '2020-09-27 15:13:02', 34),
(176, 89, 'Tools', '2020-09-27 15:13:11', 34),
(177, 90, 'Gym memberships', '2020-09-27 15:13:22', 34),
(178, 90, 'Haircuts', '2020-09-27 15:13:30', 34),
(179, 90, 'Salon services', '2020-09-27 15:13:39', 34),
(180, 90, 'Cosmetics (like makeup or services like laser hair removal)', '2020-09-27 15:13:52', 34),
(181, 90, 'Babysitter', '2020-09-27 15:14:00', 34),
(182, 90, 'Subscriptions', '2020-09-27 15:14:11', 34),
(183, 91, 'Personal loans', '2020-09-27 15:14:26', 34),
(184, 91, 'Student loans', '2020-09-27 15:14:35', 34),
(185, 91, 'Credit cards', '2020-09-27 15:14:46', 34),
(186, 92, 'Financial planning', '2020-09-27 15:15:06', 34),
(187, 93, 'Children’s college', '2020-09-27 15:15:20', 34),
(188, 93, 'Your college', '2020-09-27 15:15:30', 34),
(189, 93, 'School supplies', '2020-09-27 15:15:42', 34),
(190, 93, 'Books', '2020-09-27 15:16:13', 34),
(191, 94, 'Emergency fund', '2020-09-27 15:16:31', 34),
(192, 94, 'Big purchases like a new mattress or laptop', '2020-09-27 15:16:40', 34),
(193, 94, 'Other savings', '2020-09-27 15:16:48', 34),
(194, 95, 'Birthday', '2020-09-27 15:17:02', 34),
(195, 95, 'Anniversary', '2020-09-27 15:17:09', 34),
(196, 95, 'Wedding', '2020-09-27 15:17:16', 34),
(197, 95, 'Christmas', '2020-09-27 15:17:25', 34),
(198, 95, 'Special occasion', '2020-09-27 15:17:37', 34),
(199, 95, 'Charities', '2020-09-27 15:17:45', 34),
(200, 96, 'Alcohol and/or bars', '2020-09-27 15:17:56', 34),
(201, 96, 'Games', '2020-09-27 15:18:02', 34),
(202, 96, 'Movies', '2020-09-27 15:18:10', 34),
(203, 96, 'Concerts', '2020-09-27 15:18:17', 34),
(204, 96, 'Vacations', '2020-09-27 15:18:25', 34),
(205, 96, 'Subscriptions (Netflix, Amazon, Hulu, etc.)', '2020-09-27 15:18:36', 34);

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
(82, 34, 'Housing', '2020-09-27 15:03:22'),
(83, 34, 'Transportation', '2020-09-27 15:03:28'),
(84, 34, 'Food', '2020-09-27 15:03:36'),
(85, 34, 'Utilities', '2020-09-27 15:03:43'),
(86, 34, 'Clothing', '2020-09-27 15:03:51'),
(87, 34, 'Medical/Healthcare', '2020-09-27 15:03:59'),
(88, 34, 'Insurance', '2020-09-27 15:04:06'),
(89, 34, 'Household Items/Supplies', '2020-09-27 15:04:13'),
(90, 34, 'Personal', '2020-09-27 15:04:37'),
(91, 34, 'Debt', '2020-09-27 15:04:44'),
(92, 34, 'Retirement', '2020-09-27 15:04:50'),
(93, 34, 'Education', '2020-09-27 15:05:00'),
(94, 34, 'Savings', '2020-09-27 15:05:06'),
(95, 34, 'Gifts/Donations', '2020-09-27 15:05:13'),
(96, 34, 'Entertainment', '2020-09-27 15:05:19');

-- --------------------------------------------------------

--
-- Table structure for table `ProjectedExpense`
--

CREATE TABLE `ProjectedExpense` (
  `projected_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_service_id` int(11) NOT NULL,
  `projected_date` date NOT NULL,
  `projected_amount` decimal(10,0) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ProjectedExpense`
--

INSERT INTO `ProjectedExpense` (`projected_id`, `user_id`, `product_service_id`, `projected_date`, `projected_amount`, `created_at`) VALUES
(13, 34, 205, '2020-10-01', '1000', '2020-10-11 17:37:27'),
(14, 34, 200, '2020-10-01', '3000', '2020-10-11 17:37:50'),
(15, 34, 190, '2020-11-01', '4000', '2020-10-11 17:39:10'),
(16, 34, 194, '2020-11-01', '2500', '2020-10-11 17:39:29'),
(17, 34, 177, '2020-11-01', '3500', '2020-10-11 17:40:15'),
(18, 34, 200, '2020-09-01', '3500', '2020-09-02 17:40:59'),
(19, 34, 155, '2020-09-01', '1500', '2020-09-01 17:41:28'),
(20, 34, 199, '2020-09-01', '2000', '2020-09-01 17:42:14'),
(21, 34, 200, '2020-11-01', '3000', '2020-10-11 17:42:48'),
(22, 34, 154, '2020-09-01', '2000', '2020-09-01 17:44:05'),
(23, 34, 153, '2020-11-01', '3500', '2020-10-11 17:44:56'),
(24, 34, 146, '2020-10-01', '2000', '2020-10-11 17:47:45'),
(28, 34, 203, '2020-08-01', '21', '2020-10-18 00:13:43'),
(29, 34, 203, '2020-08-01', '21', '2020-10-18 00:15:00'),
(30, 34, 199, '2020-03-01', '21', '2020-10-18 00:15:13'),
(31, 34, 192, '2020-07-01', '21', '2020-10-18 00:16:45'),
(32, 34, 192, '2020-07-01', '21', '2020-10-18 00:19:06'),
(33, 34, 192, '2020-07-01', '21', '2020-10-18 00:19:19'),
(34, 34, 192, '2020-07-01', '21', '2020-10-18 00:19:45'),
(35, 34, 192, '2020-07-01', '21', '2020-10-18 00:19:56'),
(36, 34, 192, '2020-07-01', '21', '2020-10-18 00:20:47'),
(37, 34, 192, '2020-07-01', '21', '2020-10-18 00:21:12'),
(38, 34, 192, '2020-07-01', '21', '2020-10-18 00:21:47'),
(39, 34, 192, '2020-07-01', '21', '2020-10-18 00:22:10'),
(40, 34, 192, '2020-07-01', '21', '2020-10-18 00:24:15');

-- --------------------------------------------------------

--
-- Table structure for table `Saving`
--

CREATE TABLE `Saving` (
  `saving_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `income_id` int(11) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Saving`
--

INSERT INTO `Saving` (`saving_id`, `user_id`, `income_id`, `amount`, `created_at`) VALUES
(89, 34, 77, '37000', '2020-09-30');

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
(70, 34, 'Allarassem Maxime', '2020-09-27 15:00:38'),
(71, 34, 'Olga Moguina', '2020-09-27 15:01:08'),
(72, 34, 'Amina Lynda', '2020-09-27 15:01:17');

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `user_password` varchar(200) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`user_id`, `first_name`, `last_name`, `user_email`, `is_admin`, `user_password`, `created_at`) VALUES
(34, 'Allarassem', 'Maxime', 'a@gmail.com', 0, '59d4b220ea33c6b20362cc77fd961f13', '2020-09-27'),
(35, 'Admin', 'Name', 'admin@gmail.com', 1, '59d4b220ea33c6b20362cc77fd961f13', '2020-09-27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Contact`
--
ALTER TABLE `Contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `ContactResponse`
--
ALTER TABLE `ContactResponse`
  ADD PRIMARY KEY (`contact_response_id`);

--
-- Indexes for table `Expense`
--
ALTER TABLE `Expense`
  ADD PRIMARY KEY (`expense_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_service_id` (`product_service_id`),
  ADD KEY `income_id` (`income_id`);

--
-- Indexes for table `Help`
--
ALTER TABLE `Help`
  ADD PRIMARY KEY (`help_id`);

--
-- Indexes for table `HelpResponse`
--
ALTER TABLE `HelpResponse`
  ADD PRIMARY KEY (`help_response_id`);

--
-- Indexes for table `Income`
--
ALTER TABLE `Income`
  ADD PRIMARY KEY (`income_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `source_id` (`source_id`);

--
-- Indexes for table `PasswordReset`
--
ALTER TABLE `PasswordReset`
  ADD PRIMARY KEY (`password_id`),
  ADD UNIQUE KEY `user_token` (`user_token`);

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
-- Indexes for table `ProjectedExpense`
--
ALTER TABLE `ProjectedExpense`
  ADD PRIMARY KEY (`projected_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_service_id` (`product_service_id`);

--
-- Indexes for table `Saving`
--
ALTER TABLE `Saving`
  ADD PRIMARY KEY (`saving_id`),
  ADD KEY `user_id` (`user_id`),
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
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ContactResponse`
--
ALTER TABLE `ContactResponse`
  MODIFY `contact_response_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Expense`
--
ALTER TABLE `Expense`
  MODIFY `expense_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `Help`
--
ALTER TABLE `Help`
  MODIFY `help_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `HelpResponse`
--
ALTER TABLE `HelpResponse`
  MODIFY `help_response_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Income`
--
ALTER TABLE `Income`
  MODIFY `income_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `PasswordReset`
--
ALTER TABLE `PasswordReset`
  MODIFY `password_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ProductService`
--
ALTER TABLE `ProductService`
  MODIFY `product_service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;

--
-- AUTO_INCREMENT for table `ProductServiceCategory`
--
ALTER TABLE `ProductServiceCategory`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `ProjectedExpense`
--
ALTER TABLE `ProjectedExpense`
  MODIFY `projected_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `Saving`
--
ALTER TABLE `Saving`
  MODIFY `saving_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `Source`
--
ALTER TABLE `Source`
  MODIFY `source_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Expense`
--
ALTER TABLE `Expense`
  ADD CONSTRAINT `expense_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `User` (`user_id`),
  ADD CONSTRAINT `expense_ibfk_2` FOREIGN KEY (`product_service_id`) REFERENCES `ProductService` (`product_service_id`),
  ADD CONSTRAINT `expense_ibfk_3` FOREIGN KEY (`income_id`) REFERENCES `Income` (`income_id`);

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
-- Constraints for table `ProjectedExpense`
--
ALTER TABLE `ProjectedExpense`
  ADD CONSTRAINT `projectedexpense_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `User` (`user_id`),
  ADD CONSTRAINT `projectedexpense_ibfk_2` FOREIGN KEY (`product_service_id`) REFERENCES `ProductService` (`product_service_id`);

--
-- Constraints for table `Saving`
--
ALTER TABLE `Saving`
  ADD CONSTRAINT `saving_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `User` (`user_id`),
  ADD CONSTRAINT `saving_ibfk_2` FOREIGN KEY (`income_id`) REFERENCES `Income` (`income_id`);

--
-- Constraints for table `Source`
--
ALTER TABLE `Source`
  ADD CONSTRAINT `source_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `User` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
