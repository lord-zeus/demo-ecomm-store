-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 10, 2016 at 06:28 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Example 1'),
(2, 'Example 2');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_amount` float NOT NULL,
  `order_transaction` varchar(255) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `order_currency` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_amount`, `order_transaction`, `order_status`, `order_currency`) VALUES
(1, 489, '32431341', 'Completed', 'USD'),
(2, 489, '32431341', 'Completed', 'USD'),
(3, 489, '32431341', 'Completed', 'USD');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `product_price` float NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_description` text NOT NULL,
  `product_short_desc` text NOT NULL,
  `product_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_category_id`, `product_price`, `product_quantity`, `product_description`, `product_short_desc`, `product_image`) VALUES
(1, 'Product 1', 1, 39.99, 5, 'Bacon ipsum dolor amet kevin beef sirloin spare ribs landjaeger short ribs chuck ribeye. Ground round ball tip kielbasa meatball, turducken ribeye filet mignon pig andouille salami venison. Shankle corned beef bacon, picanha shank short loin rump pancetta doner andouille fatback prosciutto shoulder. Ribeye pig meatloaf leberkas beef ribs ham hock tri-tip jerky turkey venison swine jowl meatball ball tip. Spare ribs tail beef ribs, pastrami pig jowl ground round andouille salami venison corned beef filet mignon bresaola.', 'Bacon ipsum dolor amet kevin beef sirloin spare ribs landjaeger short ribs chuck ribeye. Ground round ball tip kielbasa meatball, turducken ribeye filet mignon pig andouille salami venison. Shankle corned beef bacon, picanha shank short loin rump pancetta doner andouille fatback prosciutto shoulder.', 'http://placehold.it/320x150'),
(2, 'Product 2', 1, 109.99, 4, 'Bacon ipsum dolor amet kevin beef sirloin spare ribs landjaeger short ribs chuck ribeye. Ground round ball tip kielbasa meatball, turducken ribeye filet mignon pig andouille salami venison. Shankle corned beef bacon, picanha shank short loin rump pancetta doner andouille fatback prosciutto shoulder. Ribeye pig meatloaf leberkas beef ribs ham hock tri-tip jerky turkey venison swine jowl meatball ball tip. Spare ribs tail beef ribs, pastrami pig jowl ground round andouille salami venison corned beef filet mignon bresaola.', 'Bacon ipsum dolor amet kevin beef sirloin spare ribs landjaeger short ribs chuck ribeye. Ground round ball tip kielbasa meatball, turducken ribeye filet mignon pig andouille salami venison. Shankle corned beef bacon, picanha shank short loin rump pancetta doner andouille fatback prosciutto shoulder.', 'http://placehold.it/320x150');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`) VALUES
(1, 'edwindiaz', 'mail@mail.com', 'hello'),
(2, 'rico', 'rico@mail.com', 'hello');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
