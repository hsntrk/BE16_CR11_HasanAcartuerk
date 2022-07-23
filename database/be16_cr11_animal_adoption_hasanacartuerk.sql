-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2022 at 11:47 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `be16_cr11_animal_adoption_hasanacartuerk`
--
CREATE DATABASE IF NOT EXISTS `be16_cr11_animal_adoption_hasanacartuerk` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `be16_cr11_animal_adoption_hasanacartuerk`;

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `id` int(11) NOT NULL,
  `name` varchar(90) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `breed` varchar(70) NOT NULL,
  `size` varchar(15) NOT NULL,
  `age` tinyint(3) NOT NULL,
  `vaccine` enum('vaccinated','not vaccinated') DEFAULT 'vaccinated',
  `description` varchar(200) NOT NULL,
  `location` varchar(150) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `status` enum('available','adopted') DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`id`, `name`, `gender`, `breed`, `size`, `age`, `vaccine`, `description`, `location`, `picture`, `status`) VALUES
(1, 'Ripku', 'male', 'rabbit', 'small', 5, 'vaccinated', 'playful, loves carrots, and is curious', 'Rotenturmgasse 15', 'rabbit.jpg', 'available'),
(2, 'Buki', 'female', 'budgie', 'small', 5, 'vaccinated', 'very calm budgerigar, makes human-like noises in front of it, playful', 'Ennsgasse 5', 'budgie.jpg', 'available'),
(3, 'Tiko', 'male', 'Bull Terrier', 'large', 9, 'vaccinated', 'as a loving protector, loves to play with balls and with the water', 'Daumegasse 11', 'dog_bullterrier.jpg', 'available'),
(4, 'Kando', 'male', 'Shepherd dog', 'large', 10, 'not vaccinated', 'very smart, observes and obeys, due to his age he needs a quiet place to stay', 'Vorgartenstrasse 55', 'dog_kangal.jpg', 'available'),
(5, 'Cukomi', 'female', 'Chihuahua dog', 'medium', 5, 'vaccinated', 'very good-looking, well-groomed Chihuahua, feels at home anywhere', 'Enkplatz 1', 'dog_chihuahua.jpg', 'available'),
(6, 'Akipa', 'female', 'Spitz dog', 'medium', 10, 'not vaccinated', 'still playful despite her old age, loves to hike together', 'Troststrasse 14', 'dog_zwergspitz.jpg', 'available'),
(7, 'Fusly', 'male', 'Persian Longhair Cat', 'small', 11, 'vaccinated', 'loves fish, likes to be cuddled a lot, not afraid of water', 'Taubstugasse 95', 'cat_persian.jpg', 'available'),
(8, 'Sibash', 'female', 'Siberian Cat', 'medium', 4, 'not vaccinated', 'purebred siberian cat, likes to play with strings, every now and then she lets herself be petted, very calm', 'Zippererplatz 2', 'cat_sibirian.jpg', 'available'),
(9, 'Finhalu', 'male', 'Mainecoon Cat', 'medium', 3, 'vaccinated', 'outdoors, loves the cold, sleeps during the day, very active at night, also likes to play', 'Doeblingerstrasse 111', 'cat_maine_coon.jpg', 'available'),
(10, 'Simka', 'female', 'Siamese Cat', 'medium', 2, 'vaccinated', 'very curious, not afraid of children, very pretty eyes, likes to climb cat trees', 'Landstrasse 165', 'cat_siamese.jpg', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `pet_adoption`
--

CREATE TABLE `pet_adoption` (
  `id` int(11) NOT NULL,
  `fk_user_id` int(11) NOT NULL,
  `fk_animal_id` int(11) NOT NULL,
  `adoption_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(5) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `phone_number`, `address`, `picture`, `password`, `status`) VALUES
(1, 'Hasan', 'Acartuerk', 'hadev@mailbox.org', '066000111111', 'Simmeringer Hauptstrasse', 'ich.jpg', '123456789', 'adm'),
(2, 'Sandra', 'Bella', 'sandra@gmail.com', '0660123123123', 'Leopold Moses Gasse 4, 1020 Wien', 'sandra.jpg', '123456789', 'user'),
(3, 'Hasan', 'Acartuerk', 'hsk@mailbox.org', '06600000000', 'Simmeringer Hauptstrasse', '62da82e692d71.png', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', 'adm'),
(4, 'Bianca', 'Nadl', 'bianca@gmail.com', '0660123123123', 'Landeggstrasse 120', '62da905236d87.jpg', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', 'user'),
(5, 'Mohammad', 'Helli', 'helli@mailbox.org', '123456789', 'Troststrasse 80', '62da88cf98de3.jpg', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', 'user'),
(6, 'Testuser', 'Testuser', 'test@mailbox.org', '04546546464654', 'address', '62dacbac3ecc9.jpg', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', 'user'),
(8, 'Jim', 'Harris', 'harris@mailbox.org', '123456789', 'jimstrasse 8', '62dae6895f9b0.jpg', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', 'user'),
(9, 'testuser', 'testuser', 'test@test.org', '123456789', 'teststrasse', 'avatar.png', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pet_adoption`
--
ALTER TABLE `pet_adoption`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`fk_user_id`),
  ADD KEY `fk_animal_id` (`fk_animal_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `pet_adoption`
--
ALTER TABLE `pet_adoption`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pet_adoption`
--
ALTER TABLE `pet_adoption`
  ADD CONSTRAINT `pet_adoption_ibfk_1` FOREIGN KEY (`fk_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pet_adoption_ibfk_2` FOREIGN KEY (`fk_animal_id`) REFERENCES `animals` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
