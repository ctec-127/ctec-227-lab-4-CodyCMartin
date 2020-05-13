-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2019 at 07:41 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE
= "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT
= 0;
START TRANSACTION;
SET time_zone
= "+00:00";


--
-- Database: `lab5`
--



--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery`
(
  `user_id` int
(11) NOT NULL,
`username` varchar
(15) NOT NULL,
  `email` varchar
(64) NOT NULL,
  `first_name` varchar
(30) NOT NULL,
  `last_name` varchar
(30) NOT NULL,
  `password` varchar
(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
ADD UNIQUE KEY
(`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `user_id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

