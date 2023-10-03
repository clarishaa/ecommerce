-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 03, 2023 at 11:25 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'best sellers'),
(2, 'featured'),
(3, 'new arrival'),
(4, 'special');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text,
  `image` varchar(50) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `category_id` int DEFAULT NULL,
  `quantity` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `description`, `image`, `price`, `category_id`, `quantity`) VALUES
(8, 'Cotton Blend T-Shirt', 'Classic cotton blend t-shirt with a comfortable fit.', '/Cotton Blend T-Shirt.jpg', 24.99, 1, 100),
(9, 'Slim Fit Denim Jeans', 'Premium slim fit jeans made from high-quality denim.', '/Slim Fit Denim Jeans.avif', 59.99, 1, 50),
(10, 'Casual Plaid Shirt', 'Stylish plaid shirt for everyday wear.', '/Casual Plaid Shirt.jpg', 34.99, 1, 75),
(11, 'Leather Jacket', 'Genuine leather jacket with a timeless design.', '/Leather Jacket.jpg', 129.99, 2, 30),
(12, 'Wool Blend Coat', 'Warm and stylish wool blend coat for colder days.', '/Wool Blend Coat.webp', 89.99, 2, 20),
(13, 'Athletic Running Shoes', 'High-performance running shoes for athletes.', '/Athletic Running Shoes.jpg', 79.99, 2, 40),
(14, 'Silk Evening Gown', 'Elegant silk evening gown for special occasions.', '/Silk Evening Gown.webp', 199.99, 3, 10),
(15, 'Formal Men\'s Suit', 'Classic formal suit for men, perfect for weddings.', '/Formal Men\'s Suit.jpg', 149.99, 3, 15),
(16, 'Vintage Sunglasses', 'Retro-style sunglasses with UV protection.', '/Vintage Sunglasses.jpg', 29.99, 3, 50),
(17, 'Leather Backpack', 'Stylish and durable leather backpack for daily use.', '/Leather Backpack.jpg', 79.99, 4, 25),
(18, 'Canvas Messenger Bag', 'Versatile canvas messenger bag with multiple compartments.', '/Canvas Messenger Bag.jpg', 49.99, 4, 35),
(19, 'Travel Luggage Set', 'Complete luggage set for your travel needs.', '/Travel Luggage Set.webp', 199.99, 4, 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(7, 'qwerty', '$2y$10$wBv/x78Ljg5BiUejoSXeiujUx.BxB29WHtdmQYy6Pvd', 'qwerty@gmail.com'),
(10, 'Admin', '$2y$10$.EBBr5RIHFdbb2qveLOME.rQmGsr6Zktpd1jnJYiFVGvRtFrbDVeq', 'admin@gmail.com'),
(11, 'Clarish', '$2y$10$i6auYln3HYIYXRrw2AS/buEa8NW02/9MoQBImHXmNZMLA0h2SM9/m', 'jrishh2902@gmail.com'),
(12, 'Caelyn', '$2y$10$DvLh9.4bDQNHNT67fWEZfeybqlT0r6VCizI57p.hq90azJyV.6HYK', 'cae@gmail.com'),
(13, 'Caelyn', '$2y$10$LOg8mL/qPqSzhPGuy1A0ROcMYYcsA9sahMhZFmsOFaI4eYUGni1CC', 'caelyn@gmail.com'),
(14, 'jrishh2929@gmail.com', '$2y$10$L0Nw591FkzkT6Y.taalgW.C63ca78I0Ikl6AEyQ7WqePK8qB120gW', 'jrishh2929@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
