-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2018 at 12:06 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codeigniter`
--

-- --------------------------------------------------------

--
-- Table structure for table `choices`
--

CREATE TABLE `choices` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `choice` text NOT NULL,
  `is_correct` varchar(1) NOT NULL COMMENT '0 - wrong| 1 - correct',
  `status` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `course` text NOT NULL,
  `chapter` varchar(5) NOT NULL,
  `question` text NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_fname` varchar(251) NOT NULL,
  `user_lname` varchar(251) NOT NULL,
  `user_birthday` date NOT NULL,
  `user_profession` varchar(251) NOT NULL DEFAULT 'N/A',
  `user_gender` varchar(1) NOT NULL,
  `user_address` text NOT NULL,
  `user_number` varchar(21) NOT NULL,
  `user_email` varchar(52) NOT NULL,
  `user_password` text NOT NULL,
  `user_lastlogin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_registered` date NOT NULL,
  `user_islogin` varchar(1) NOT NULL DEFAULT '0',
  `user_type` varchar(1) NOT NULL DEFAULT '2' COMMENT '0-admin|1-moderators|2-users',
  `user_status` varchar(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_fname`, `user_lname`, `user_birthday`, `user_profession`, `user_gender`, `user_address`, `user_number`, `user_email`, `user_password`, `user_lastlogin`, `user_registered`, `user_islogin`, `user_type`, `user_status`) VALUES
(1, 'asds', 'asd', '0000-00-00', 'N/A', '', '', '', 'kevinpoy@proweaver.net', '6c14da109e294d1e8155be8aa4b1ce8e', '2017-12-29 09:23:12', '0000-00-00', '', '2', '1'),
(2, 'Kevin', 'Pepito', '0000-00-00', 'N/A', '', '', '', 'kevinpoy07@gmail.com', '6c14da109e294d1e8155be8aa4b1ce8e', '2017-12-29 09:29:30', '0000-00-00', '', '2', '0'),
(3, 'Akagami No', 'Shanks', '1993-01-17', 'Professor X', 'M', 'Present Address', '09770136299', 'shanks@proweaver.net', '0f2a65dde6a346464229988fb49c5ad1', '2017-12-29 10:10:08', '2017-12-29', '1', '2', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `choices`
--
ALTER TABLE `choices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `choices`
--
ALTER TABLE `choices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
