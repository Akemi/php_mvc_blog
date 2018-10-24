-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Oct 24, 2018 at 11:30 PM
-- Server version: 5.5.42
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `url`, `content`, `date`, `post_id`) VALUES
(1, 'comUser1', 'url1', 'comUser1  content1', '2018-10-24 00:00:00', 1),
(2, 'comUser2', 'url2', 'comUser2 content2', '2018-10-24 02:00:00', 1),
(11, 'comUser3', 'url3', 'content3', '2018-10-24 17:29:10', 1),
(12, 'test1', 'hgfhg', 'fhgfghfd', '2018-10-24 22:04:06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `picture` varchar(511) NOT NULL,
  `date` datetime NOT NULL,
  `content` text NOT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `picture`, `date`, `content`, `author_id`) VALUES
(1, 'title1', 'https://via.placeholder.com/200x100', '2018-10-23 00:00:00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus velit ut porttitor hendrerit. Praesent aliquam lorem ipsum, non pulvinar metus bibendum quis. Cras mollis, erat et vestibulum dapibus, nisl orci imperdiet sem, aliquet fermentum mauris dolor eget nisl. Sed vel pellentesque metus. Quisque ut lorem ultrices urna venenatis tincidunt vitae et massa. Maecenas bibendum condimentum quam, et ultrices erat lacinia vitae. Etiam porttitor odio sit amet risus pellentesque ullamcorper. Suspendisse dapibus tincidunt eros, nec finibus purus convallis in. Mauris sollicitudin commodo mauris a tincidunt. Sed dui augue, ornare non nunc et, mollis pharetra leo. Mauris ac placerat nisi. Mauris.\r\n', 1),
(2, 'title2', 'https://via.placeholder.com/200x150', '2018-10-24 00:00:00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus velit ut porttitor hendrerit. Praesent aliquam lorem ipsum, non pulvinar metus bibendum quis. Cras mollis, erat et vestibulum dapibus, nisl orci imperdiet sem, aliquet fermentum mauris dolor eget nisl. Sed vel pellentesque metus. Quisque ut lorem ultrices urna venenatis tincidunt vitae et massa. Maecenas bibendum condimentum quam, et ultrices erat lacinia vitae. Etiam porttitor odio sit amet risus pellentesque ullamcorper. Suspendisse dapibus tincidunt eros, nec finibus purus convallis in. Mauris sollicitudin commodo mauris a tincidunt. Sed dui augue, ornare non nunc et, mollis pharetra leo. Mauris ac placerat nisi. Mauris.\r\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `mail`, `password`) VALUES
(1, 'user1', 'user1@blog.de', '$2y$10$of7NfjZ/TOlYuUMOKBCvceMeR.fZFZFKw61Lrwp9xlMd4qYg3Vegm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post` (`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `author` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`);
