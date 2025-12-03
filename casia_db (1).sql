-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2025 at 05:21 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `casia_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Food and drinks'),
(2, 'Household items'),
(3, 'Personal care');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `name`, `email`, `phone`) VALUES
(2, 'Kyle Andrew', 'kyle@gmail.com', '09269839549'),
(3, 'Kyle Andrew', 'kyle@gmail.com', '09269839549'),
(4, 'Kyle Andrew', 'kyle@gmail.com', '09269839549'),
(5, 'Kyle Andrew', 'kyle@gmail.com', '09269839549'),
(6, 'Kyle Andrew', 'kyle@gmail.com', '09269839549'),
(7, 'Kyle Andrew', 'kyle@gmail.com', '09269839549');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `order_date`, `total`) VALUES
(1, 5, '2025-12-03', 152.00),
(2, 6, '2025-12-03', 132.00),
(3, 7, '2025-12-04', 779.00);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `item_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`item_id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(1, 1, 7, 1, 37.00),
(2, 1, 5, 1, 75.00),
(3, 1, 2, 1, 20.00),
(4, 1, 1, 1, 20.00),
(5, 2, 7, 1, 37.00),
(6, 2, 5, 1, 75.00),
(7, 2, 2, 1, 20.00),
(8, 3, 5, 1, 75.00),
(9, 3, 9, 1, 50.00),
(10, 3, 7, 2, 37.00),
(11, 3, 22, 2, 245.00),
(12, 3, 20, 1, 90.00);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `product_name` varchar(150) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `category_id`, `product_name`, `price`, `stock`, `image`) VALUES
(1, 1, 'Piattos ', 20.00, 9, 'uploads/piattos.jpg'),
(2, 1, 'Nova', 20.00, 5, 'uploads/nova.jpg'),
(3, 2, 'Surf ', 10.00, 20, 'uploads/surf.jpg'),
(4, 2, 'Zonrox', 25.00, 10, 'uploads/zonrox.jpg'),
(5, 3, 'Dove', 75.00, 2, 'uploads/dove.jpg'),
(6, 3, 'Tooth Paste', 23.00, 15, 'uploads/toothpaste.jpg'),
(7, 1, 'Chuckie ', 37.00, 4, 'uploads/chuckie.jpg'),
(9, 1, 'Chips Ahoy Cookies', 50.00, 19, 'uploads/chipsahoy.jpg'),
(10, 1, 'Oreo Original', 45.00, 30, 'uploads/oreo.jpg'),
(11, 1, 'Lays Classic', 40.00, 25, 'uploads/lays.jpg'),
(12, 1, 'Coca-Cola 330ml', 25.00, 50, 'uploads/coke.jpg'),
(13, 1, 'Sprite 330ml', 25.00, 50, 'uploads/sprite.jpg'),
(14, 1, 'Royal Orange 330ml', 25.00, 40, 'uploads/royal.jpg'),
(15, 2, 'Ariel Detergent Powder', 16.00, 15, 'uploads/ariel.jpg'),
(16, 2, 'Joy 500ml', 80.00, 20, 'uploads/joy.jpg'),
(17, 2, 'Glads Garbage Bags (10pcs)', 35.00, 40, 'uploads/glads.jpg'),
(18, 2, 'Lysol 500ml', 165.00, 25, 'uploads/lysol.jpg'),
(19, 2, 'Safe-Guard Soap Bar', 50.00, 30, 'uploads/safe.jpg'),
(20, 3, 'Palmolive Shampoo 300ml', 90.00, 24, 'uploads/palmolive.jpg'),
(21, 3, 'Safe-GuardSoap Bar', 30.00, 50, 'uploads/safe.jpg'),
(22, 3, 'Listerine 500ml', 245.00, 8, 'uploads/listerine.jpg'),
(23, 3, 'Oral-B Toothbrush', 40.00, 45, 'uploads/tbrush.jpg'),
(24, 3, 'Ethyl Alcohol 300ml', 60.00, 35, 'uploads/alc.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
