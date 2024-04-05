-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2022 at 02:07 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farmers_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `clents`
--

CREATE TABLE `clents` (
  `id` int(11) NOT NULL,
  `vet_id` int(11) NOT NULL,
  `farmer_name` varchar(70) NOT NULL,
  `farmer_contact` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clents`
--

INSERT INTO `clents` (`id`, `vet_id`, `farmer_name`, `farmer_contact`, `updated_at`, `created_at`) VALUES
(6, 1287201, 'ken Itirie', '745734271', '2022-07-07 19:08:24', '2022-07-07 19:08:24'),
(7, 912768, 'Mary Wams', '11764200', '2022-08-21 16:38:48', '2022-08-21 16:38:48'),
(8, 1978265, 'Jane Kymo', '712783020', '2022-08-21 19:43:53', '2022-08-21 19:43:53'),
(9, 912768, 'Ibrahim Ali ', '712764900', '2022-08-21 20:06:08', '2022-08-21 20:06:08'),
(12, 100801, 'Steve', '59866', '2022-08-29 17:42:08', '2022-08-29 17:42:08');

-- --------------------------------------------------------

--
-- Table structure for table `cows`
--

CREATE TABLE `cows` (
  `id` int(11) NOT NULL,
  `FarmerReg_No` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` text NOT NULL,
  `sales` decimal(65,2) NOT NULL,
  `farmer_id` int(11) NOT NULL,
  `cow_status` varchar(255) DEFAULT NULL,
  `cow_recommendation` tinyint(1) DEFAULT 0,
  `is_booked` tinyint(1) NOT NULL DEFAULT 0,
  `booked_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cows`
--

INSERT INTO `cows` (`id`, `FarmerReg_No`, `name`, `type`, `sales`, `farmer_id`, `cow_status`, `cow_recommendation`, `is_booked`, `booked_at`) VALUES
(8, 9001, 'f', 'freshian', '106.00', 0, 'healthy', 1, 1, '2022-09-03 11:40:00'),
(9, 9001, 'A', 'gurnsey', '4.00', 0, 'healthy', 0, 0, NULL),
(10, 9001, 'a', 'ayrshire', '30.00', 0, 'healthy', 0, 0, NULL),
(11, 19990, 'a', 'freshian', '7.00', 0, NULL, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `Staff_No` int(11) NOT NULL,
  `EmployeeContact` int(10) NOT NULL,
  `EmployeeID` int(10) NOT NULL,
  `EmpName` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`Staff_No`, `EmployeeContact`, `EmployeeID`, `EmpName`, `email`, `password`) VALUES
(101, 723819002, 2901872, 'Mina Leo', 'minaleo@gmail.com', '25f5373ea7cccb9128cb6605c90890'),
(102, 753620933, 35892701, 'Musa Keen', 'keen@gmail.com', '0380e9d8206eb61d1212026548a406'),
(103, 719728028, 3479190, 'Estrol Khan', 'estrol@gmail.com', '8437a7fa4dd35de9da26b9cd8fa03e'),
(104, 729083682, 3387974, 'Barack Kibe', 'barack@gmail.com', '9753b3b1ecebc7571db0712604ead1'),
(105, 732784911, 32748950, 'Stanley Silo', 'silostan@gmail.com', '4ccf1792fc504c468b86c78adbea66'),
(106, 712894758, 30985730, 'James Ryan', 'ryan@gmail.com', '253a6beebc75ff876e0be1caa82c92'),
(1012, 719567930, 1025, 'Steve', 'youtsteve1@gmail.com', 'a3876fafbc8b9b9d3820b6e3a610e3d2'),
(1025, 59866, 36564761, 'Steve', 'youtsteve3@gmail.com', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `farmers`
--

CREATE TABLE `farmers` (
  `FarmerReg_No` int(11) NOT NULL,
  `FarmerName` varchar(70) CHARACTER SET utf8mb4 NOT NULL,
  `FarmerContact` int(10) NOT NULL,
  `FarmerId_No` int(10) NOT NULL,
  `FarmerLocation` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `vet` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `farmers`
--

INSERT INTO `farmers` (`FarmerReg_No`, `FarmerName`, `FarmerContact`, `FarmerId_No`, `FarmerLocation`, `password`, `vet`) VALUES
(900, 'Gideon', 59866, 900, 'Githunguri', '098f6bcd4621d373cade4e832627b4f6', 'Elijah Kole'),
(1999, 'uncosam', 59866, 9000, 'Githunguri', 'a3876fafbc8b9b9d3820b6e3a610e3d2', NULL),
(9001, 'Steve', 59866, 9001, 'Githunguri', 'a3876fafbc8b9b9d3820b6e3a610e3d2', NULL),
(9005, 'Gideon', 59866, 9000, 'Githunguri', 'a3876fafbc8b9b9d3820b6e3a610e3d2', NULL),
(9010, 'Steve', 59866, 0, 'Githunguri', 'a3876fafbc8b9b9d3820b6e3a610e3d2', NULL),
(9021, 'Steve', 59866, 0, 'Githunguri', 'a3876fafbc8b9b9d3820b6e3a610e3d2', NULL),
(19990, 'Steve', 719567930, 1999, 'Githunguri', 'a3876fafbc8b9b9d3820b6e3a610e3d2', NULL),
(90075, 'Gideon', 59866, 36564761, 'Githunguri', '21232f297a57a5a743894a0e4a801fc3', NULL),
(90101, 'Steve', 59866, 0, 'Githunguri', 'a3876fafbc8b9b9d3820b6e3a610e3d2', NULL),
(102113, 'ken Itirie', 745734271, 36897243, 'Kwamaiko', '4eacc26e8f1808e3c7e241e9818fe2', 'Steve Otieno'),
(120101, 'Joshua Kal', 712765385, 25677893, 'Githunguri', 'b6f7378aa1cbefa1b7d24cb9653884', 'test'),
(120102, 'Mary Wams', 11764200, 34715281, 'Ikinu', 'f1b20d1b42de3298191f8ecc9f9e61', NULL),
(120103, 'Ibrahim Ali ', 712764900, 3286109, 'Ikinu', '5672a6a8505d88141602c24e3e74f3', NULL),
(120104, 'Ann Ersa', 725751019, 3487190, 'Kambaa', '11b394de38c1e1c37bb3fe6a1ac298', NULL),
(120105, 'Fidel Castro', 7887542, 24113268, 'Kahuruko', '308880e5fc976f3f0b291908805d3f', 'Robert Keith'),
(120106, 'Kim Lee', 718437192, 11907462, 'ikinu', 'fb1d04e3c300f6b354dfde55135ce4', NULL),
(120107, 'Jane Kymo', 712783020, 1020671, 'Kambaa', 'f7fe88f04ef7270c0423e7e7b13983', 'Mita Gozbert'),
(120108, 'Timothy Kahira', 711684624, 35721600, 'Githunguri', '591c57c951de0db5b6fd842c2d08c8', NULL),
(120109, 'Esther Mio', 726810223, 1127890, 'Githiga', '377ff91667eccb84fb69bf05c3032c', 'Johnson Kima'),
(120110, 'Fidrola Esie', 726784119, 1287520, 'Kwamaiko', '288a49c8c17c5ae6a275cdb5759e6b', NULL),
(120111, 'Joyce Lifa', 726766401, 91671820, 'Githunguri', '38324a3416200fde47c30c2653eeeb', NULL),
(120112, 'Mary Kio', 732675910, 2390865, 'Kahuruko', 'e50486fdf51830ef4ed83b8f2dcc47', NULL),
(120114, 'Steve Kiha', 721795776, 10786530, 'Githiga', 'b99598c60f210d2cc35f648589db20', NULL),
(120115, 'Keen Juma', 728976482, 57890453, 'ikinu', '3a5726e39e5c2975742857a81c8194', 'Douglas Meko'),
(120116, 'Mistro Kirwa', 72697039, 2907584, 'Githiga', '5b8ba5e8043daf9f516dcc62846e422d', NULL),
(120117, 'Emmah Kera', 716729502, 31092746, 'Kwamaiko', '21e549d1cb7bd09290086c322510a504', NULL),
(120118, 'Ian Kim', 752692793, 2689394, 'Kahuruko', '5300c44783ce36654f6a419ccc9f50d3', NULL),
(120220, 'ian', 74785947, 2674849, 'Kwamaiko', 'dbb9e4a44209c72c08a464eb4f3244c5', NULL),
(900777, 'uncosam', 59866, 36564761, 'Githunguri', '21232f297a57a5a743894a0e4a801fc3', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`) VALUES
(1, 'Githunguri'),
(2, 'Kambaa'),
(3, 'Ikinu'),
(4, 'Githiga'),
(5, ' Kahuruko'),
(6, ' Kwamaiko');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `Notification_Id` int(11) NOT NULL,
  `Message` varchar(100) NOT NULL,
  `vet_id` int(11) DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'admin',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`Notification_Id`, `Message`, `vet_id`, `type`, `created_at`) VALUES
(40401, 'The cooperative is ready to work with you to boost your farming techniques and output', 0, 'admin', '2022-09-08 11:05:51'),
(40402, 'Find your farming progress in the Status report and check your growth.', 0, 'admin', '2022-09-08 11:05:51'),
(40403, 'uuuuuuu', 0, 'admin', '2022-09-08 11:05:51'),
(40404, 'ttttttttttttttttttttttttttttttttttttttttttttt', 0, 'admin', '2022-09-08 11:05:51'),
(40405, 'test', 0, 'admin', '2022-09-08 11:05:51'),
(40406, 'kill', 0, 'admin', '2022-09-08 11:05:51'),
(40407, 'Farmer with Reg no 9001 has updated the status of his cows', 0, 'admin', '2022-09-08 11:05:51'),
(40408, 'Farmer with Reg no 9001 has updated the status of his cows', 0, 'admin', '2022-09-08 11:08:35');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `FarmerReg_No` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(65,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `FarmerLocation` varchar(255) NOT NULL,
  `src` varchar(255) NOT NULL,
  `payment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `FarmerReg_No`, `name`, `price`, `created_at`, `update_at`, `FarmerLocation`, `src`, `payment`) VALUES
(80, 9001, 'dairy', '80.00', '2022-08-29 20:19:16', '2022-08-29 20:19:16', 'Githunguri', 'images/dairy.jpg', 'cash'),
(81, 9001, 'pellets', '20.00', '2022-08-29 20:19:16', '2022-08-29 20:19:16', 'Githunguri', 'images/pellets.jpg', 'cash'),
(82, 9001, 'salt', '20.00', '2022-08-29 20:19:16', '2022-08-29 20:19:16', 'Githunguri', 'images/salt.jpeg', 'cash'),
(83, 9001, 'dairy', '80.00', '2022-08-29 20:20:03', '2022-08-29 20:20:03', 'Githunguri', 'images/dairy.jpg', 'cash'),
(84, 9001, 'pellets', '20.00', '2022-08-29 20:20:03', '2022-08-29 20:20:03', 'Githunguri', 'images/pellets.jpg', 'cash'),
(85, 9001, 'salt', '20.00', '2022-08-29 20:20:03', '2022-08-29 20:20:03', 'Githunguri', 'images/salt.jpeg', 'cash'),
(86, 9001, 'dairy', '80.00', '2022-08-30 07:58:30', '2022-08-30 07:58:30', 'Githunguri', 'images/dairy.jpg', 'cash'),
(87, 9001, 'pellets', '20.00', '2022-08-30 07:58:31', '2022-08-30 07:58:31', 'Githunguri', 'images/pellets.jpg', 'cash'),
(88, 9001, 'salt', '20.00', '2022-08-30 07:58:32', '2022-08-30 07:58:32', 'Githunguri', 'images/salt.jpeg', 'cash'),
(89, 9001, 'dairy', '80.00', '2022-08-30 07:58:49', '2022-08-30 07:58:49', 'Githunguri', 'images/dairy.jpg', 'cash'),
(90, 9001, 'pellets', '20.00', '2022-08-30 07:58:49', '2022-08-30 07:58:49', 'Githunguri', 'images/pellets.jpg', 'cash'),
(91, 9001, 'salt', '20.00', '2022-08-30 07:58:49', '2022-08-30 07:58:49', 'Githunguri', 'images/salt.jpeg', 'cash'),
(92, 9001, 'dairy', '80.00', '2022-08-30 08:01:14', '2022-08-30 08:01:14', 'Githunguri', 'images/dairy.jpg', 'cash'),
(93, 9001, 'pellets', '20.00', '2022-08-30 08:01:14', '2022-08-30 08:01:14', 'Githunguri', 'images/pellets.jpg', 'cash'),
(94, 9001, 'salt', '20.00', '2022-08-30 08:01:14', '2022-08-30 08:01:14', 'Githunguri', 'images/salt.jpeg', 'cash'),
(95, 9001, 'dairy', '80.00', '2022-08-30 08:01:26', '2022-08-30 08:01:26', 'Githunguri', 'images/dairy.jpg', 'cash'),
(96, 9001, 'pellets', '20.00', '2022-08-30 08:01:26', '2022-08-30 08:01:26', 'Githunguri', 'images/pellets.jpg', 'cash'),
(97, 9001, 'salt', '20.00', '2022-08-30 08:01:26', '2022-08-30 08:01:26', 'Githunguri', 'images/salt.jpeg', 'cash'),
(98, 9001, 'dairy', '80.00', '2022-08-30 08:02:42', '2022-08-30 08:02:42', 'Githunguri', 'images/dairy.jpg', 'cash'),
(99, 9001, 'pellets', '20.00', '2022-08-30 08:02:42', '2022-08-30 08:02:42', 'Githunguri', 'images/pellets.jpg', 'cash'),
(100, 9001, 'salt', '20.00', '2022-08-30 08:02:43', '2022-08-30 08:02:43', 'Githunguri', 'images/salt.jpeg', 'cash'),
(101, 9001, 'dairy', '80.00', '2022-08-30 08:02:51', '2022-08-30 08:02:51', 'Githunguri', 'images/dairy.jpg', 'mpesa'),
(102, 9001, 'pellets', '20.00', '2022-08-30 08:02:51', '2022-08-30 08:02:51', 'Githunguri', 'images/pellets.jpg', 'mpesa'),
(103, 9001, 'salt', '20.00', '2022-08-30 08:02:51', '2022-08-30 08:02:51', 'Githunguri', 'images/salt.jpeg', 'mpesa');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `Brand` varchar(20) NOT NULL,
  `Message` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `img_dir` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `Brand`, `Message`, `price`, `img_dir`) VALUES
(1, 'salt', 'ttttttttttttttttttttt', 20, 'images/salt.jpeg'),
(2, 'dairy', 'ttttttttttttttttttttt', 80, 'images/dairy.jpg'),
(3, 'pellets', 'ttttttttttttttttttttt', 20, 'images/pellets.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `recommendations`
--

CREATE TABLE `recommendations` (
  `id` int(11) NOT NULL,
  `FarmerReg_No` int(11) NOT NULL,
  `cow_id` int(11) NOT NULL,
  `cow_name` varchar(255) NOT NULL,
  `list` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recommendations`
--

INSERT INTO `recommendations` (`id`, `FarmerReg_No`, `cow_id`, `cow_name`, `list`) VALUES
(2, 9001, 5, 'b', '[\"yes\",\"yes\",\"yes\"]'),
(3, 9001, 8, 'f', '[\"yes\",\"yes\"]');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `created_at`) VALUES
('81k5poc21orqfjlfm5te0u5cpp', 900, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36 OPR/86.0.4363.70', '2022-06-13 16:14:47'),
('e2slpvqspjnkdh8s0lmts8mv0u', 120117, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.64 Safari/537.36 Edg/101.0.1210.53', '2022-06-14 11:21:44'),
('h8ittlieq07tsqolmlon2iu45a', 9001, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 OPR/89.0.4447.64', '2022-08-23 15:15:00'),
('vj07i4q1694v2ntkvgbvadtt8g', 120116, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.124 Safari/537.36 Edg/102.0.1245.41', '2022-06-17 12:32:52');

-- --------------------------------------------------------

--
-- Table structure for table `status_report`
--

CREATE TABLE `status_report` (
  `Report_No` int(11) NOT NULL,
  `AverageSales` float NOT NULL,
  `StatusReport` varchar(30) DEFAULT NULL,
  `FarmerReg_No` int(10) NOT NULL,
  `Vet_No` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `vets`
--

CREATE TABLE `vets` (
  `VetName` varchar(30) NOT NULL,
  `Vet_ID` int(10) NOT NULL,
  `VetContact` int(10) NOT NULL,
  `VetLocation` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vets`
--

INSERT INTO `vets` (`VetName`, `Vet_ID`, `VetContact`, `VetLocation`, `email`, `password`) VALUES
('test', 100801, 59866, 'Githunguri', 'youtsteve1@gmail.com', 'a3876fafbc8b9b9d3820b6e3a610e3d2'),
('Johnson Kima', 109461, 719028262, 'Githiga', 'operations@johnsonvets.com', '967b146a077fb9456ecb0112ec8576'),
('Aisha Borabu', 912768, 710926532, 'Ikinu', 'Boraaisha@gmail.com', '7cf99d63f03f4fd8451c1cd960f78d'),
('Steve Otieno', 961392, 715962191, 'Kwamaiko', 'Otisteve@gmail.com', 'a316e26100c86b506d35035c458623'),
('Ruth Daima', 1287201, 721761390, 'Kwamaiko', 'daimaruth@gmail.com', 'cd0996628a92c8df8aee0535166aa6'),
('Mita Gozbert', 1978265, 700728153, 'Kambaa', 'Mitavets@gmail.com', 'a64904ea717195331d99d4697ff92e'),
('Elijah Kole', 2378610, 734810821, 'Githunguri', 'kole78@gmail.com', '362e56b64a87faea74dca974dd12e9'),
('Nancy Britam', 2378951, 714792012, 'Kambaa', 'services@Nancyvets.com', '721685700dafa8978b39094ca27167'),
('Douglas Meko', 2789371, 726801853, 'Ikinu', 'douglasmeko@gmail.com', '2950b71db805fd2eab69def64f8f57'),
('Robert Keith', 2789610, 719629011, 'Kahuruko', 'keithrobert@gmail.com', 'b60fc116aaf12d53ee507df62f68b1'),
('Kelvin Brian', 2818290, 719722900, 'Githiga', 'Briankelvinvets@gmail.com', '6133039d19b429b59b43f5ec26f2d9'),
('Joel Kinzani', 3062811, 730628115, 'Githunguri', 'kinzani@gmail.com', '4e2d501732fee422168e99e8ed9d6e'),
('Jack Oloo', 3209476, 2147483647, 'Githiga', 'jack@gmail.com', '786f02ad12ae770c263e44dadea1ba'),
('Mike Goodluck', 22097561, 778261074, 'Kahuruko', 'Goodluck@gmail.com', 'fc00407535b1956c7b47f29f0a669c');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clents`
--
ALTER TABLE `clents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vet_id` (`vet_id`),
  ADD KEY `farmer_name` (`farmer_name`);

--
-- Indexes for table `cows`
--
ALTER TABLE `cows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FarmerReg_No` (`FarmerReg_No`),
  ADD KEY `farmer_id` (`farmer_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`Staff_No`);

--
-- Indexes for table `farmers`
--
ALTER TABLE `farmers`
  ADD PRIMARY KEY (`FarmerReg_No`),
  ADD KEY `FarmerName` (`FarmerName`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`Notification_Id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `recommendations`
--
ALTER TABLE `recommendations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_report`
--
ALTER TABLE `status_report`
  ADD PRIMARY KEY (`Report_No`),
  ADD KEY `AverageSales` (`AverageSales`,`FarmerReg_No`,`Vet_No`),
  ADD KEY `FarmerReg_No` (`FarmerReg_No`),
  ADD KEY `Vet_No` (`Vet_No`);

--
-- Indexes for table `vets`
--
ALTER TABLE `vets`
  ADD PRIMARY KEY (`Vet_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clents`
--
ALTER TABLE `clents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cows`
--
ALTER TABLE `cows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `Notification_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40409;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `recommendations`
--
ALTER TABLE `recommendations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clents`
--
ALTER TABLE `clents`
  ADD CONSTRAINT `clents_ibfk_1` FOREIGN KEY (`vet_id`) REFERENCES `vets` (`Vet_ID`),
  ADD CONSTRAINT `clents_ibfk_2` FOREIGN KEY (`farmer_name`) REFERENCES `farmers` (`FarmerName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `status_report`
--
ALTER TABLE `status_report`
  ADD CONSTRAINT `status_report_ibfk_1` FOREIGN KEY (`FarmerReg_No`) REFERENCES `farmers` (`FarmerReg_No`),
  ADD CONSTRAINT `status_report_ibfk_2` FOREIGN KEY (`Vet_No`) REFERENCES `vets` (`Vet_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
