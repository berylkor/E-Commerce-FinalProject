-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2024 at 01:06 PM
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
-- Database: `niche_mgt`
--

-- --------------------------------------------------------

--
-- Table structure for table `approvals`
--

CREATE TABLE `approvals` (
  `approval_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `approval_status` enum('Pending','Approved','Rejected') DEFAULT 'Pending',
  `approval_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assigned_customers`
--

CREATE TABLE `assigned_customers` (
  `assign_id` int(11) NOT NULL,
  `shopper_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `theme` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `product_id`, `customer_id`, `qty`) VALUES
(1, 1, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `commissions`
--

CREATE TABLE `commissions` (
  `commission_id` int(11) NOT NULL,
  `shopper_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `sale_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `conversations`
--

CREATE TABLE `conversations` (
  `message_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `shopper_id` int(11) NOT NULL,
  `sender` enum('Customer','Shopper') NOT NULL,
  `message` text NOT NULL,
  `sent_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `shopper_id` int(11) DEFAULT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `shipping_fee` decimal(10,2) DEFAULT 0.00,
  `status` enum('Pending','Shipped','Delivered','Cancelled') DEFAULT 'Pending',
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `orderdetail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `privileges`
--

CREATE TABLE `privileges` (
  `privilege_id` int(11) NOT NULL,
  `tier` enum('Basic Shopper','Essential Shopper','Premium Shopper','Elite Shopper') DEFAULT 'Basic Shopper',
  `monthly_fee` decimal(10,2) NOT NULL,
  `usage_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `privileges`
--

INSERT INTO `privileges` (`privilege_id`, `tier`, `monthly_fee`, `usage_total`) VALUES
(1, 'Basic Shopper', 0.00, 0),
(2, 'Essential Shopper', 19.99, 10),
(3, 'Premium Shopper', 29.99, 30),
(4, 'Elite Shopper', 69.99, 10000000);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `theme_id` int(11) NOT NULL,
  `link` varchar(2083) NOT NULL,
  `image_url` varchar(2083) DEFAULT NULL,
  `avg_score` decimal(3,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviewer`
--

CREATE TABLE `reviewer` (
  `reviewer_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 3,
  `profession` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviewer`
--

INSERT INTO `reviewer` (`reviewer_id`, `name`, `password`, `email`, `contact`, `role_id`, `profession`) VALUES
(1, 'Ama Koram', '$2y$10$LGXbeuWCCyiNPIQunlircekSYjl76Aen9gj8Y.99sTE1l9gDslPbe', 'berylkoram378@outlook.com', '0506204139', 3, 'Travel Blogger'),
(2, 'Spencer James', '$2y$10$n/Q.WWvBysa4ynuFoRkdZOAFGxYc2.Q/TtSuXrxD8CrkJLA.DYkXe', 'spencerjames@gmail.com', '0506204139', 3, 'Professional Athlete');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `reviewer_id` int(11) NOT NULL,
  `score` tinyint(4) NOT NULL CHECK (`score` between 1 and 5),
  `comment` text DEFAULT NULL,
  `theme` int(11) NOT NULL,
  `url` varchar(2000) NOT NULL,
  `image` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `product_name`, `reviewer_id`, `score`, `comment`, `theme`, `url`, `image`, `created_at`) VALUES
(2, 'Football Gloves', 2, 5, 'These football gloves offer excellent grip, durability, and comfort. The tacky palm enhances ball control, while the breathable fabric keeps hands dry. Perfect for both beginners and pros, they provide a snug fit without restricting movement. Ideal for wet or dry conditions, these gloves are a great value for performance.', 3, 'https://www.amazon.com/HANDLANDY-Football-Gloves-Receiver-Stretch/dp/B0BM92VC8V/ref=sr_1_6?crid=KHH8G1GQBNBN&dib=eyJ2IjoiMSJ9.OR2LOzZnRUvvLU8zxndjiXkI4iH0h2x0rATnjBabGkZHsnBFX_D3PUgrxTprtHTRYlK1KBk6wZXkB92kdOGSjgo-9xoNMdi2BukkLjqTj3ukjOTqhiXyQ9aYpAQmBH-CjP-ou6r__zJJq6hwqwulnu511_N2OqbGqw78PEWc1aAG9rhlF-O17USZUuakX1frEOTV32EugQeUakUSa7F1CVwYHMKtUdJxDXcRsUwRUOFOgWeMhMgJfapS090ntmO6mBxlA-ebfHM9VDDJWQXE4AMDUY1YWVSoKhLwA4ebRUU.7lRZG_V151Jrdm1Rk4AZ9nlDXfI685Zi-Z5kKOaNOZ0&dib_tag=se&keywords=football%2Bgloves&qid=1732600354&sprefix=foot%2Caps%2C341&sr=8-6&th=1', '../images/gloves.jpg', '2024-11-26 06:45:21'),
(3, 'Cleets', 2, 4, 'These cleats deliver exceptional traction, stability, and comfort on the field. Designed with lightweight materials, they enhance speed and agility while ensuring durability. The snug fit and cushioned sole reduce fatigue during intense play. Ideal for various surfaces, they offer reliable grip and support, making them a top choice for players.', 3, 'https://www.amazon.com/PUMA-ATTACANTO-Artificial-Sneaker-Black-Silver/dp/B0C51FVKDV/ref=sr_1_5?crid=3997H1M5BWNN5&dib=eyJ2IjoiMSJ9.3LQId4gx5l61eabpVF_U4frG6IL_bjdf1O59XqavxGoVAaxwu82X921l0DpW9PdMjCmbmeFkukIG00uEPPQ-SEDvLlIOSPKPVZHtdUdi0WV7frW0HIvR0bL3-B2wx3RinuZTxFsw9w4DVk58q0cuzc0vpAxPvp-TA4mfzPaKjlAR7tDDngojJ48Mi4UT_gu9S9AohpjiGnsDc47lmxms8n36j6ZGcdwGBKXk2mCTHyMkb5f6kNTtbrO-XelV-oFk74C36t0cfKtLDi4h03KEuG31HIP294DVJzxI5gCAaXE.MjnkhLchZB67lMCH1GAwuNHYhMv9TYnbC1BFsNjxSTQ&dib_tag=se&keywords=cleats&qid=1732613283&sprefix=cleet%2Caps%2C351&sr=8-5', '../images/cleets.jpg', '2024-11-26 09:30:14'),
(4, 'Protein', 2, 3, 'This protein powder provides a smooth texture and great taste, blending easily with liquids. Packed with essential amino acids, it supports muscle recovery and growth. Low in sugar and available in multiple flavors, it suits a variety of fitness goals, making it a reliable option for post-workout nutrition.', 3, 'https://www.amazon.com/Ancient-Nutrition-Collagen-Protein-Vanilla/dp/B07D41R677/ref=sr_1_6?crid=FOJS684QY17&dib=eyJ2IjoiMSJ9.lFWeL8wz4R2YF9LGc3Q8Wqx1bFmYW_xBmothk1ULMwqN2bCEbbnYoqCldG5b-cfMtpfU4-xWJjrGbNeq06PZI0aycWIW4Dpvas-3he3-erwYu8jEPtLDfk4Hccc0mX-SM2Q6pfkyvwrSObNaaGCF55LLX5FQhz_WRzEPvA4I2o7PbAp-JCZA6tiMON41C7kP38fUi48av8uzS3fg3QwtrKjf5RzSuyOYsET8Qz-tU7BNl1rZ4Zqhq-sLkdkAyA5HrDWbSLsnDivtb0-7GrHFc1HYqxhop-wihgv5WQYhLZ0.qMdm8_w2DOQ8bOGI1d-8RasHOX2ZYejcxEdGWdMxadg&dib_tag=se&keywords=protein+powder&qid=1732614899&sprefix=pr%2Caps%2C3230&sr=8-6', '../images/protein.jpg', '2024-11-26 10:47:10');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` enum('Administrator','Customer','Expert Reviewer','Personal Shopper') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'Administrator'),
(2, 'Customer'),
(3, 'Expert Reviewer'),
(4, 'Personal Shopper');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_fees`
--

CREATE TABLE `shipping_fees` (
  `fee_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `fee` decimal(10,2) DEFAULT 0.00,
  `waived` tinyint(1) DEFAULT 0,
  `country` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shipping_fees`
--

INSERT INTO `shipping_fees` (`fee_id`, `customer_id`, `fee`, `waived`, `country`, `city`, `street`) VALUES
(1, 4, 25.50, 0, 'Ghana', 'Accra', 'No. 53 Ofro Osro Street');

-- --------------------------------------------------------

--
-- Table structure for table `shopper`
--

CREATE TABLE `shopper` (
  `shopper_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role_id` int(11) NOT NULL,
  `theme` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shopper`
--

INSERT INTO `shopper` (`shopper_id`, `name`, `email`, `contact`, `password`, `role_id`, `theme`) VALUES
(1, 'Baaba Boham', 'baababoham@gmail.com', '0506204139', '$2y$10$57KdKJVamLK9Tzfh6/ySReabThlSiEy..3gwISw7k5D8o12h6Azne', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sourced_items`
--

CREATE TABLE `sourced_items` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(200) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `shopper_id` int(11) NOT NULL,
  `Price` double NOT NULL,
  `item_img` varchar(2000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sourced_items`
--

INSERT INTO `sourced_items` (`item_id`, `item_name`, `customer_id`, `shopper_id`, `Price`, `item_img`, `created_at`) VALUES
(1, 'Specialty Beads', 4, 7, 12, '../images/beads.jpeg', '2024-11-28 10:58:52');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `subscription_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `privilege_id` int(11) NOT NULL DEFAULT 1,
  `usage_count` int(11) DEFAULT 0,
  `points` int(11) DEFAULT 0,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `themes`
--

CREATE TABLE `themes` (
  `theme_id` int(11) NOT NULL,
  `theme_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `themes`
--

INSERT INTO `themes` (`theme_id`, `theme_name`) VALUES
(1, 'Media'),
(2, 'Entertainment'),
(3, 'Artifacts'),
(4, 'Food Experiences');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `points_earned` int(11) GENERATED ALWAYS AS (floor(`amount` / 2)) STORED,
  `transaction_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `location` varchar(100) NOT NULL,
  `profession` varchar(100) DEFAULT NULL,
  `role_id` int(11) NOT NULL DEFAULT 2,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `contact`, `password`, `location`, `profession`, `role_id`, `created_at`) VALUES
(4, 'Beryl Koram', 'berylkoram378@gmail.com', '0506204139', '$2y$10$DqNypqNvVf1OMCwo59XfeOD9WYB.pyrSdgGhHH0ZuG7K7J6AXb/Ii', 'Ghana', NULL, 2, '2024-11-26 04:43:28'),
(5, 'Ama Koram', 'berylkoram378@outlook.com', '0506204139', '$2y$10$LGXbeuWCCyiNPIQunlircekSYjl76Aen9gj8Y.99sTE1l9gDslPbe', '', 'Travel Blogger', 3, '2024-11-26 05:21:38'),
(6, 'Grace James', 'gracejames@outlook.com', '0506204139', '$2y$10$CA71TLu5FwOVHhBWbXcCquZn3SSGuRcutMlHMje4RvdIbPKNd6RwK', '', 'Influencer', 2, '2024-11-26 05:30:44'),
(7, 'Spencer James', 'spencerjames@gmail.com', '0506204139', '$2y$10$n/Q.WWvBysa4ynuFoRkdZOAFGxYc2.Q/TtSuXrxD8CrkJLA.DYkXe', '', 'Professional Athlete', 3, '2024-11-26 05:36:28'),
(8, 'Baaba Boham', 'baababoham@gmail.com', '0506204139', '$2y$10$57KdKJVamLK9Tzfh6/ySReabThlSiEy..3gwISw7k5D8o12h6Azne', '', NULL, 4, '2024-11-26 10:42:40'),
(9, 'Beryl A A Koram', 'beryl.koram@gmail.com', '0506204139', '$2y$10$XUZcE3yMdyG5oUd83c41w.Ue504IJVS37157TfhINVC01Siu.59SW', 'Ghana', NULL, 1, '2024-11-29 10:33:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approvals`
--
ALTER TABLE `approvals`
  ADD PRIMARY KEY (`approval_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `assigned_customers`
--
ALTER TABLE `assigned_customers`
  ADD PRIMARY KEY (`assign_id`),
  ADD KEY `shopper` (`shopper_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `customer` (`customer_id`),
  ADD KEY `product` (`product_id`);

--
-- Indexes for table `commissions`
--
ALTER TABLE `commissions`
  ADD PRIMARY KEY (`commission_id`),
  ADD KEY `shopper_id` (`shopper_id`);

--
-- Indexes for table `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `shopper_id` (`shopper_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `shopper_id` (`shopper_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`orderdetail_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `privileges`
--
ALTER TABLE `privileges`
  ADD PRIMARY KEY (`privilege_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `theme_id` (`theme_id`);

--
-- Indexes for table `reviewer`
--
ALTER TABLE `reviewer`
  ADD PRIMARY KEY (`reviewer_id`),
  ADD KEY `role` (`role_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `reviewer_id` (`reviewer_id`),
  ADD KEY `reviews_ibfk_3` (`theme`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`),
  ADD UNIQUE KEY `role_name` (`role_name`);

--
-- Indexes for table `shipping_fees`
--
ALTER TABLE `shipping_fees`
  ADD PRIMARY KEY (`fee_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `shopper`
--
ALTER TABLE `shopper`
  ADD PRIMARY KEY (`shopper_id`),
  ADD KEY `theme` (`theme`),
  ADD KEY `role_fk` (`role_id`);

--
-- Indexes for table `sourced_items`
--
ALTER TABLE `sourced_items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `shopper_id` (`shopper_id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`subscription_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `privilege_id` (`privilege_id`);

--
-- Indexes for table `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`theme_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `approvals`
--
ALTER TABLE `approvals`
  MODIFY `approval_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assigned_customers`
--
ALTER TABLE `assigned_customers`
  MODIFY `assign_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `commissions`
--
ALTER TABLE `commissions`
  MODIFY `commission_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `orderdetail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `privileges`
--
ALTER TABLE `privileges`
  MODIFY `privilege_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviewer`
--
ALTER TABLE `reviewer`
  MODIFY `reviewer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shipping_fees`
--
ALTER TABLE `shipping_fees`
  MODIFY `fee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shopper`
--
ALTER TABLE `shopper`
  MODIFY `shopper_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sourced_items`
--
ALTER TABLE `sourced_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `subscription_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `themes`
--
ALTER TABLE `themes`
  MODIFY `theme_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `approvals`
--
ALTER TABLE `approvals`
  ADD CONSTRAINT `approvals_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `assigned_customers`
--
ALTER TABLE `assigned_customers`
  ADD CONSTRAINT `shopper` FOREIGN KEY (`shopper_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `customer` FOREIGN KEY (`customer_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product` FOREIGN KEY (`product_id`) REFERENCES `sourced_items` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `commissions`
--
ALTER TABLE `commissions`
  ADD CONSTRAINT `commissions_ibfk_1` FOREIGN KEY (`shopper_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `conversations`
--
ALTER TABLE `conversations`
  ADD CONSTRAINT `conversations_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `conversations_ibfk_2` FOREIGN KEY (`shopper_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`shopper_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `sourced_items` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`theme_id`) REFERENCES `themes` (`theme_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviewer`
--
ALTER TABLE `reviewer`
  ADD CONSTRAINT `role` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`theme`) REFERENCES `themes` (`theme_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_3` FOREIGN KEY (`reviewer_id`) REFERENCES `reviewer` (`reviewer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shipping_fees`
--
ALTER TABLE `shipping_fees`
  ADD CONSTRAINT `shipping_fees_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shopper`
--
ALTER TABLE `shopper`
  ADD CONSTRAINT `role_fk` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `theme` FOREIGN KEY (`theme`) REFERENCES `themes` (`theme_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sourced_items`
--
ALTER TABLE `sourced_items`
  ADD CONSTRAINT `sourced_items_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sourced_items_ibfk_2` FOREIGN KEY (`shopper_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD CONSTRAINT `subscriptions_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subscriptions_ibfk_2` FOREIGN KEY (`privilege_id`) REFERENCES `privileges` (`privilege_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
