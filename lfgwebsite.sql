-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2024 at 09:45 PM
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
  `post_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Table structure for table `group_members`
--

CREATE TABLE `group_members` (
  `member_id` int(11) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `is_admin` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  ADD KEY `group_id` (`group_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `group_messages`
--
ALTER TABLE `group_messages`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `sender_id` (`sender_id`),
  ADD KEY `parent_message_id` (`parent_message_id`);

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
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `friendslist`
--
ALTER TABLE `friendslist`
  MODIFY `friendid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `group_members`
--
ALTER TABLE `group_members`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `group_messages`
--
ALTER TABLE `group_messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `forumpost_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `userprofile` (`user_id`),
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
  ADD CONSTRAINT `group_members_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`),
  ADD CONSTRAINT `group_members_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `userprofile` (`user_id`);

--
-- Constraints for table `group_messages`
--
ALTER TABLE `group_messages`
  ADD CONSTRAINT `group_messages_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`),
  ADD CONSTRAINT `group_messages_ibfk_2` FOREIGN KEY (`sender_id`) REFERENCES `userprofile` (`user_id`),
  ADD CONSTRAINT `group_messages_ibfk_3` FOREIGN KEY (`parent_message_id`) REFERENCES `group_messages` (`message_id`);

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
