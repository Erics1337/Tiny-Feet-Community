DROP TABLE IF EXISTS `Users`;
DROP TABLE IF EXISTS `Posts`;


CREATE TABLE `Users` (
  `id` int(11) NOT NULL,
  `username` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `fullName` varchar(200) DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `zip` int(5) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `county` varchar(200) DEFAULT NULL,
  `state` varchar(200) DEFAULT NULL,
  `about` text,
  `contributions` int(5) DEFAULT 0,
  `theme` varchar(5) DEFAULT 'off',
  -- `profilePicUrl` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `Posts` (
  `id` int(11) NOT NULL,
  `user_id` int(200) DEFAULT NULL,
  `topic` varchar(50) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `body` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `Posts`
  ADD PRIMARY KEY (`id`),
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
  ADD FOREIGN KEY (user_id) REFERENCES Users(ID);