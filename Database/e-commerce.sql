-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 18, 2023 at 10:59 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `Account`
--

CREATE TABLE `Account` (
  `Id` int(11) NOT NULL,
  `Username` varchar(300) NOT NULL,
  `Email` varchar(300) NOT NULL,
  `Password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Account`
--

INSERT INTO `Account` (`Id`, `Username`, `Email`, `Password`) VALUES
(1, 'Abdellah Laraki', 'abdellahlaraki16@gmail.com', 'ab12'),
(2, 'kamal', 'kamal@gmail.com', 'km12'),
(3, 'hassan', 'hassan@gmail.com', 'hs12'),
(4, 'hh', 'hh', 'hh');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id` int(11) NOT NULL,
  `admin` varchar(200) NOT NULL,
  `Password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id`, `admin`, `Password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `Id_cart` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `Id_client` int(11) NOT NULL,
  `Product_size` varchar(200) NOT NULL,
  `Product_quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`Id_cart`, `id_product`, `Id_client`, `Product_size`, `Product_quantity`) VALUES
(6, 6, 2, 'XL', 1),
(7, 5, 2, 'S', 1),
(8, 4, 2, 'S', 4);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Id_category` int(11) NOT NULL,
  `Nom_category` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Id_category`, `Nom_category`) VALUES
(1, 'T-shirt'),
(2, 'pantes'),
(3, 'watches'),
(4, 'shoes'),
(7, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `Orders`
--

CREATE TABLE `Orders` (
  `Id_order` int(11) NOT NULL,
  `UserName` varchar(200) NOT NULL,
  `Adresse` varchar(200) NOT NULL,
  `PhoneNumber` varchar(200) NOT NULL,
  `Country` varchar(200) NOT NULL,
  `City` varchar(200) NOT NULL,
  `Total_price` varchar(200) NOT NULL,
  `Order_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ID_Product` int(11) NOT NULL,
  `Id_client` int(11) NOT NULL,
  `Payement_methode` varchar(200) NOT NULL,
  `Product_Size` varchar(200) NOT NULL,
  `Product_quantity` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Orders`
--

INSERT INTO `Orders` (`Id_order`, `UserName`, `Adresse`, `PhoneNumber`, `Country`, `City`, `Total_price`, `Order_time`, `ID_Product`, `Id_client`, `Payement_methode`, `Product_Size`, `Product_quantity`) VALUES
(11, 'hassan', 'diarb', '0675324683', 'Maroc', 'casa', '550', '2023-01-18 16:59:36', 4, 3, 'COD', 'S', '1'),
(12, 'hassan', 'diarb', '0675324683', 'Maroc', 'casa', '110', '2023-01-18 17:25:16', 5, 3, 'COD', 'S', '1'),
(13, 'hassan', 'diarb', '0675324683', 'Maroc', 'casa', '55000', '2023-01-18 21:48:48', 4, 3, 'COD', 'S', '1'),
(14, 'hassan', 'diarb', '0675324683', 'Maroc', 'casa', '110', '2023-01-18 21:48:55', 5, 3, 'COD', 'XL', '5'),
(15, 'Abdellah', 'bouskoura', '0675324683', 'france', 'parix', '3300', '2023-01-18 21:53:37', 9, 1, 'COD', 'S', '1');

-- --------------------------------------------------------

--
-- Table structure for table `Product`
--

CREATE TABLE `Product` (
  `Id` int(11) NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Price` varchar(200) NOT NULL,
  `Description` varchar(400) NOT NULL,
  `Img1` varchar(300) NOT NULL,
  `Img2` varchar(300) NOT NULL,
  `Img3` varchar(300) NOT NULL,
  `Img4` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Product`
--

INSERT INTO `Product` (`Id`, `categorie_id`, `Name`, `Price`, `Description`, `Img1`, `Img2`, `Img3`, `Img4`) VALUES
(4, 4, 'test', '5000', 'test update', 'category-1.jpg', 'product-10.jpg', 'product-11.jpg', 'product-11.jpg'),
(5, 1, 'red printed T-shirt', '10', ' Give your summer wardrobe a style upgrade with the HRX Men’s active T-shirt. Team it with a pair of shorts for your morning workout or a denims for an evening out with the guys.', 'product-4.jpg', 'tshirt.jpeg', 'product-6.jpg', 'product-4.jpg'),
(6, 4, 'sport shoes', '30', ' Give your summer wardrobe a style upgrade with the HRX Men’s active shoes. Team it with a pair of shorts for your morning workout or a denims for an evening out with the guys.', 'product-11.jpg', 'product-2.jpg', 'product-5.jpg', 'product-5.jpg'),
(7, 7, 'test', '40', 'test update', 'buy-3.jpg', 'buy-1.jpg', 'buy-3.jpg', 'gallery-4.jpg'),
(8, 1, 'test4', '500', 'test description', 'buy-1.jpg', 'buy-2.jpg', 'buy-3.jpg', 'gallery-1.jpg'),
(9, 3, 'best watches', '300', 'luxury watches  designed specially for you to enjoy the time ', 'exclusive.png', 'product-9.jpg', 'product-8.jpg', 'product-9.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `ID_product` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nom`, `ID_product`) VALUES
(1, 'njbh', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Account`
--
ALTER TABLE `Account`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`Id_cart`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `Id_client` (`Id_client`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Id_category`);

--
-- Indexes for table `Orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`Id_order`);

--
-- Indexes for table `Product`
--
ALTER TABLE `Product`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `ID_product` (`ID_product`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Account`
--
ALTER TABLE `Account`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `Id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `Orders`
--
ALTER TABLE `Orders`
  MODIFY `Id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `Product`
--
ALTER TABLE `Product`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `Product` (`Id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`Id_client`) REFERENCES `Account` (`Id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`ID_product`) REFERENCES `Product` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
