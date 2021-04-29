DROP TABLE IF EXISTS `Users`;
DROP TABLE IF EXISTS `Posts`;


CREATE TABLE `Users` (
  `id` int(11) NOT NULL,
  `username` varchar(22) DEFAULT NULL,
  `email` varchar(22) DEFAULT NULL,
    -- `firstName` varchar(22) DEFAULT NULL,
  -- `lastName` varchar(22) DEFAULT NULL,
  -- `city` varchar(22) DEFAULT NULL,
  -- `county` varchar(22) DEFAULT NULL,
  -- `zip` int(5) DEFAULT NULL,
  -- `theme` tinyint(1) DEFAULT 0,
  -- `profilePicUrl` varchar(60) DEFAULT NULL,
  `password` varchar(22) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `Posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,  
  -- `zip` int(5) DEFAULT NULL,
  -- `city` varchar(255) DEFAULT NULL,
  -- `county` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `body` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



ALTER TABLE `Posts`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `Posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE Posts
ADD FOREIGN KEY (user_id) REFERENCES Users(ID);

-- ONLY WORKS FROM HERE ON DOWN
-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 28, 2021 at 11:28 PM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `shareposts`
--

-- --------------------------------------------------------

--
-- Table structure for table `Posts`
--

CREATE TABLE `Posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `body` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `id` int(11) NOT NULL,
  `username` varchar(22) DEFAULT NULL,
  `email` varchar(22) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Posts`
--
ALTER TABLE `Posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Posts`
--
ALTER TABLE `Posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;



