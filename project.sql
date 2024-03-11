-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2024 at 07:07 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `farmer`
--

CREATE TABLE `farmer` (
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `farmer`
--

INSERT INTO `farmer` (`username`, `password`) VALUES
('mukhil', '1234'),
('gopal', '123');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_image` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_image`, `product_name`, `product_price`, `product_description`) VALUES
('veg1.jpg', 'Tomato', '35.00', 'Tomatoes are a popular and versatile fruit that is used in various cuisines worldwide. They are known for their rich, tangy flavor and are commonly used in salads, sauces, and various cooked dishes.'),
('Wheat.jpg', 'Wheat', '145.00', 'Wheat is a cereal grain that is widely cultivated and consumed globally. It is a key ingredient in a variety of food products, such as bread, pasta, cereals, and pastries. Wheat has a mild, nutty flavor and is known for its versatility and nutritional value, providing essential nutrients like carbohydrates, fiber, and some essential vitamins and minerals.'),
('Cabbage.jpg', 'Cabbage', '30.00', 'Cabbage is a leafy vegetable that comes in different varieties, such as green, red, and savoy. It has a mild, slightly peppery flavor and can be enjoyed raw in salads, fermented for sauerkraut, or cooked in various dishes like stir-fries and soups.'),
('Coffee.jpg', 'Coffee', '280.00', 'Coffee is a popular beverage made from roasted coffee beans, known for its rich, complex flavors and stimulating effects due to its caffeine content. It is enjoyed in various forms, including espresso, cappuccino, latte, and drip coffee, and is a staple for many people worldwide.'),
('orange.jpg', 'Orange', '120.00', 'Oranges are citrus fruits known for their refreshing and tangy flavor. They are rich in vitamin C and are often consumed fresh, juiced, or used in various culinary applications, such as salads, desserts, and beverages.'),
('Green Grapes.jpg', 'Green Grapes', '140.00', 'Green grapes are a type of grape that is known for its sweet and slightly tart flavor. These grapes are a popular and refreshing fruit that can be enjoyed fresh, added to fruit salads, or used in various culinary creations. They are often used to make white wine and are a common snacking option due to their juicy texture and naturally sweet taste. Green grapes are also packed with essential vitamins and minerals, making them a healthy and delicious addition to any diet.'),
('Apple.jpg', 'Apple', '200.00', 'testing the product'),
('Coconut.jpg', 'coc', '50.00', 'gvhbjnm'),
('Carrot.jpg', 'carrot', '35.00', 'dfghjknm,dresdfghjk');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`) VALUES
('jaya', '1234'),
('js', '12347');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `email`, `password`) VALUES
('jaya', 'jaya@2003', '123'),
('logesh', 'l@gmail.com', '1234'),
('logesh', 'l@gmail.com', '1234'),
('nan', 'n@gmail.com', '12345');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
