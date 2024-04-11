-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2024 at 09:41 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lfgwebsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `aplprofile`
--

CREATE TABLE `aplprofile` (
  `gamertag` varchar(50) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rank` varchar(50) DEFAULT NULL,
  `game` varchar(50) NOT NULL,
  `server_region` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `codprofile`
--

CREATE TABLE `codprofile` (
  `gamertag` varchar(50) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rank` varchar(50) DEFAULT NULL,
  `game` varchar(50) NOT NULL,
  `server_region` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `csprofile`
--

CREATE TABLE `csprofile` (
  `gamertag` varchar(50) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rank` varchar(50) DEFAULT NULL,
  `game` varchar(50) NOT NULL,
  `server_region` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `forumcomments`
--

CREATE TABLE `forumcomments` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `comment_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `forumpost`
--

CREATE TABLE `forumpost` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `game` varchar(100) DEFAULT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `playercount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forumpost`
--

INSERT INTO `forumpost` (`post_id`, `user_id`, `title`, `content`, `game`, `post_date`, `playercount`) VALUES
(25, 10, 'John', 'JohnJohnJohnJohn', 'Apex', '2024-04-03 18:58:46', 2);

-- --------------------------------------------------------

--
-- Table structure for table `friendslist`
--

CREATE TABLE `friendslist` (
  `friendid` int(11) NOT NULL,
  `user1_id` int(11) DEFAULT NULL,
  `user2_id` int(11) DEFAULT NULL,
  `status` enum('pending','accepted') DEFAULT 'pending',
  `request_user_id` int(11) DEFAULT NULL,
  `request_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `group_id` int(11) NOT NULL,
  `group_name` varchar(100) NOT NULL,
  `createdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_id`, `group_name`, `createdate`) VALUES
(13, 'Casual Apex', '2024-03-12 23:11:43'),
(14, 'Ranked', '2024-03-12 23:12:40'),
(15, 'Ranked duo', '2024-03-12 23:13:45'),
(16, 'Test', '2024-03-13 19:55:34'),
(17, 'Test', '2024-04-03 18:48:44'),
(18, 'test', '2024-04-03 18:56:49'),
(19, 'test', '2024-04-03 18:56:59'),
(20, 'test', '2024-04-03 18:57:17'),
(21, 'John', '2024-04-03 18:58:46'),
(22, 'JohnJohnJohnJohn', '2024-04-03 18:58:53'),
(23, 'JohnJohn', '2024-04-03 18:59:02'),
(24, 'deletee', '2024-04-03 19:30:39');

-- --------------------------------------------------------

--
-- Table structure for table `group_members`
--

CREATE TABLE `group_members` (
  `member_id` int(11) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `group_members`
--

INSERT INTO `group_members` (`member_id`, `group_id`, `user_id`) VALUES
(36, 13, 10),
(37, 14, 11),
(40, 16, 10),
(41, 14, 10),
(42, 15, 10),
(43, 16, 10),
(44, 16, 10),
(45, 16, 10),
(46, 16, 11),
(47, 21, 10),
(48, 22, 10),
(49, 23, 10),
(50, 24, 10);

-- --------------------------------------------------------

--
-- Table structure for table `group_messages`
--

CREATE TABLE `group_messages` (
  `message_id` int(11) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `parent_message_id` int(11) DEFAULT NULL,
  `message_text` text NOT NULL,
  `sent_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `group_messages`
--

INSERT INTO `group_messages` (`message_id`, `group_id`, `sender_id`, `parent_message_id`, `message_text`, `sent_at`) VALUES
(17, 14, 11, NULL, 'Hi', '2024-03-12 23:16:35'),
(19, 14, 10, NULL, 'Hi', '2024-03-13 19:56:06');

-- --------------------------------------------------------

--
-- Table structure for table `privatemessages`
--

CREATE TABLE `privatemessages` (
  `message_id` int(11) NOT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `message` text NOT NULL,
  `sent_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `r6profile`
--

CREATE TABLE `r6profile` (
  `gamertag` varchar(50) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rank` varchar(50) DEFAULT NULL,
  `game` varchar(50) NOT NULL,
  `server_region` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `recipients`
--

CREATE TABLE `recipients` (
  `recipient_id` int(11) NOT NULL,
  `message_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `read_status` enum('read','unread') DEFAULT 'unread'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `reply_id` int(11) NOT NULL,
  `message_id` int(11) DEFAULT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `reply_text` text NOT NULL,
  `reply_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `userprofile`
--

CREATE TABLE `userprofile` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_admin` tinyint(1) DEFAULT 0,
  `region` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userprofile`
--

INSERT INTO `userprofile` (`user_id`, `username`, `password`, `email`, `full_name`, `created_at`, `is_admin`, `region`) VALUES
(10, 'John', '$2y$10$ce.NOBz68ou7AstEGQL55.BO6VEV.ZnerimNPbnZULkts7wbuDDz2', 'John@gmail.com', NULL, '2024-03-12 23:10:06', 0, 'NA'),
(11, 'Devin', '$2y$10$rWU7WE8eDBkdxTmjmmqfF.FHeDAVrZslNYav6T.wjA.lVq./fLOT.', 'Devin@gmail.com', NULL, '2024-03-12 23:10:20', 0, 'NA'),
(14, 'Admin', '$2y$10$TBZ/cPLHTiIvOD1rTFWWy.vfsItlIK4sDlGO8veBN8h7OL7GTI0Z6', 'Admin@gmail.com', NULL, '2024-04-03 16:52:50', 1, 'NA');

-- --------------------------------------------------------

--
-- Table structure for table `valprofile`
--

CREATE TABLE `valprofile` (
  `gamertag` varchar(50) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rank` varchar(50) DEFAULT NULL,
  `game` varchar(50) NOT NULL,
  `server_region` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aplprofile`
--
ALTER TABLE `aplprofile`
  ADD PRIMARY KEY (`gamertag`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `codprofile`
--
ALTER TABLE `codprofile`
  ADD PRIMARY KEY (`gamertag`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `csprofile`
--
ALTER TABLE `csprofile`
  ADD PRIMARY KEY (`gamertag`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `forumcomments`
--
ALTER TABLE `forumcomments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `forumpost`
--
ALTER TABLE `forumpost`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `friendslist`
--
ALTER TABLE `friendslist`
  ADD PRIMARY KEY (`friendid`),
  ADD KEY `user1_id` (`user1_id`),
  ADD KEY `user2_id` (`user2_id`),
  ADD KEY `request_user_id` (`request_user_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `group_members`
--
ALTER TABLE `group_members`
  ADD PRIMARY KEY (`member_id`),
  ADD KEY `group_members_ibfk_2` (`user_id`),
  ADD KEY `group_members_ibfk_1` (`group_id`);

--
-- Indexes for table `group_messages`
--
ALTER TABLE `group_messages`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `group_messages_ibfk_2` (`sender_id`),
  ADD KEY `group_messages_ibfk_1` (`group_id`),
  ADD KEY `group_messages_ibfk_3` (`parent_message_id`);

--
-- Indexes for table `privatemessages`
--
ALTER TABLE `privatemessages`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `sender_id` (`sender_id`);

--
-- Indexes for table `r6profile`
--
ALTER TABLE `r6profile`
  ADD PRIMARY KEY (`gamertag`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `recipients`
--
ALTER TABLE `recipients`
  ADD PRIMARY KEY (`recipient_id`),
  ADD KEY `message_id` (`message_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`reply_id`),
  ADD KEY `message_id` (`message_id`),
  ADD KEY `sender_id` (`sender_id`);

--
-- Indexes for table `userprofile`
--
ALTER TABLE `userprofile`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `valprofile`
--
ALTER TABLE `valprofile`
  ADD PRIMARY KEY (`gamertag`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `forumpost`
--
ALTER TABLE `forumpost`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `friendslist`
--
ALTER TABLE `friendslist`
  MODIFY `friendid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `group_members`
--
ALTER TABLE `group_members`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `group_messages`
--
ALTER TABLE `group_messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `privatemessages`
--
ALTER TABLE `privatemessages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recipients`
--
ALTER TABLE `recipients`
  MODIFY `recipient_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userprofile`
--
ALTER TABLE `userprofile`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aplprofile`
--
ALTER TABLE `aplprofile`
  ADD CONSTRAINT `aplprofile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `userprofile` (`user_id`);

--
-- Constraints for table `codprofile`
--
ALTER TABLE `codprofile`
  ADD CONSTRAINT `codprofile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `userprofile` (`user_id`);

--
-- Constraints for table `csprofile`
--
ALTER TABLE `csprofile`
  ADD CONSTRAINT `csprofile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `userprofile` (`user_id`);

--
-- Constraints for table `forumcomments`
--
ALTER TABLE `forumcomments`
  ADD CONSTRAINT `forumcomments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `forumpost` (`post_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `forumcomments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `userprofile` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `forumpost`
--
ALTER TABLE `forumpost`
  ADD CONSTRAINT `forumpost_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `userprofile` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `userprofile` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `friendslist`
--
ALTER TABLE `friendslist`
  ADD CONSTRAINT `friendslist_ibfk_1` FOREIGN KEY (`user1_id`) REFERENCES `userprofile` (`user_id`),
  ADD CONSTRAINT `friendslist_ibfk_2` FOREIGN KEY (`user2_id`) REFERENCES `userprofile` (`user_id`),
  ADD CONSTRAINT `friendslist_ibfk_3` FOREIGN KEY (`request_user_id`) REFERENCES `userprofile` (`user_id`);

--
-- Constraints for table `group_members`
--
ALTER TABLE `group_members`
  ADD CONSTRAINT `group_members_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `group_members_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `userprofile` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `group_messages`
--
ALTER TABLE `group_messages`
  ADD CONSTRAINT `group_messages_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `group_messages_ibfk_2` FOREIGN KEY (`sender_id`) REFERENCES `userprofile` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `group_messages_ibfk_3` FOREIGN KEY (`parent_message_id`) REFERENCES `group_messages` (`message_id`) ON DELETE CASCADE;

--
-- Constraints for table `privatemessages`
--
ALTER TABLE `privatemessages`
  ADD CONSTRAINT `privatemessages_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `userprofile` (`user_id`);

--
-- Constraints for table `r6profile`
--
ALTER TABLE `r6profile`
  ADD CONSTRAINT `r6profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `userprofile` (`user_id`);

--
-- Constraints for table `recipients`
--
ALTER TABLE `recipients`
  ADD CONSTRAINT `recipients_ibfk_1` FOREIGN KEY (`message_id`) REFERENCES `privatemessages` (`message_id`),
  ADD CONSTRAINT `recipients_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `userprofile` (`user_id`);

--
-- Constraints for table `replies`
--
ALTER TABLE `replies`
  ADD CONSTRAINT `replies_ibfk_1` FOREIGN KEY (`message_id`) REFERENCES `privatemessages` (`message_id`),
  ADD CONSTRAINT `replies_ibfk_2` FOREIGN KEY (`sender_id`) REFERENCES `userprofile` (`user_id`);

--
-- Constraints for table `valprofile`
--
ALTER TABLE `valprofile`
  ADD CONSTRAINT `valprofile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `userprofile` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
