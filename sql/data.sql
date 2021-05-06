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



-- POPULATE TABLES Not Required




INSERT INTO `Users` (`id`, `username`, `email`, `fullName`, `phone`, `zip`, `city`, `county`, `state`, `about`, `contributions`, `theme`, `password`, `created_at`) VALUES
(1, 'User_One', 'erics1337@gmail.com', 'Eric Swanson', '5186942779', 81230, 'Gunnison', 'Gunnison', 'Colorado', NULL, 5, NULL, '$2y$10$edu9zpcA9rsPX9FFhbLrRe1a6IEPs3KvZhetvjAC.1Izx1.AW/n6q', '2021-05-03 02:05:24'),
(2, 'User_Two', 'userTwo@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'off', '$2y$10$spxOu/Iyc6KjIKpcVkmQquGxG/eqc.l6NlbhDmHZ2JmibnQymNHWK', '2021-05-03 02:05:52'),
(3, 'User_Three', 'userThree@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'off', '$2y$10$JUSSJ3YFkCxu7XOkNDIz7e9AMZObNm/Kw1tPtRwSqAk.nhdNKvYZO', '2021-05-03 02:06:22'),
(4, 'User_Four', 'userFour@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'off', '$2y$10$Qfl0qlUJ.eTtDYcUQA8Z.ezHa8woLzrICybh1wlQkcIeBbtKNRaBS', '2021-05-03 02:06:50'),
(5, 'User_Five', 'userFive@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'off', '$2y$10$/uCKIxQCGDCA4HhTAibfiO3/pP7QcsNAPJjZj1znxAX1ahUF876by', '2021-05-03 02:07:10');


INSERT INTO `Posts` (`id`, `user_id`, `title`, `topic`, `body`, `created_at`) VALUES
(1, 1, 'Found Data For My County', 'userSubmitted', '&#34;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&#34;', '2021-05-03 02:10:14'),
(2, 1, 'I Found This CAP Solution Worked Really Well For My Community', 'CapSol', '&#34;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&#34;', '2021-05-03 02:11:36'),
(3, 1, 'I Found a New Co-Benefit For My Community', 'CommCoB', '&#34;But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?&#34;', '2021-05-03 02:13:25'),
(4, 1, 'I Just Wanted To Say I Think This Website Is Really Great!', 'other', '&#34;At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.&#34;', '2021-05-03 02:14:05'),
(5, 1, 'There Is An Error In One Of Your Data Points For My Community', 'userSubmitted', '&#34;On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.&#34;', '2021-05-03 02:15:14');