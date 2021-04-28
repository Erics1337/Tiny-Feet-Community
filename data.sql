-- DROP TABLE IF EXISTS `Users`;
-- DROP TABLE IF EXISTS `Posts`;

-- CREATE TABLE Users (
--     id INT PRIMARY KEY AUTO_INCREMENT,
--     username VARCHAR(22),
--     email VARCHAR(22),
--     password VARCHAR(60),
--     created_at datetime DEFAULT CURRENT_TIMESTAMP,
--     firstName VARCHAR(22),
--     lastName VARCHAR(22),
--     city VARCHAR(22),
--     county VARCHAR(22),
--     zip INT,
--     theme TINYINT(1) DEFAULT 0,
--     profilePicURL VARCHAR(33)

-- );

-- CREATE TABLE Posts (
--     id INT PRIMARY KEY AUTO_INCREMENT,
--     user_id INT,
--     zip INT,
--     city VARCHAR(22),
--     county VARCHAR(22),
--     title VARCHAR(255),
--     body TEXT,
--     created_at datetime DEFAULT CURRENT_TIMESTAMP
-- );

-- ALTER TABLE Posts
-- ADD FOREIGN KEY (user_id) REFERENCES Users(ID);



CREATE TABLE `Posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `Users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);