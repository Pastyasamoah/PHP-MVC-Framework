-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2021 at 12:16 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `azone_network`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `AboutID` int(10) UNSIGNED NOT NULL,
  `Category` char(1) NOT NULL COMMENT 'A=About; B=Board\r\n',
  `Mission` text NOT NULL,
  `Vision` text NOT NULL,
  `CoreValues` text NOT NULL,
  `Achievements` text NOT NULL,
  `Email1` varchar(150) NOT NULL,
  `Email2` varchar(150) NOT NULL,
  `Contact1` varchar(15) NOT NULL,
  `Contact2` varchar(15) NOT NULL,
  `FacebookHandle` varchar(255) NOT NULL,
  `TwitterHandle` varchar(255) NOT NULL,
  `InstagramHandle` varchar(255) NOT NULL,
  `LinkedinHandle` varchar(255) NOT NULL,
  `BankName` varchar(255) NOT NULL,
  `BankBranch` varchar(150) NOT NULL,
  `BankAccountName` varchar(150) NOT NULL,
  `BankAccountNumber` varchar(150) NOT NULL,
  `MTNHolderName` varchar(255) NOT NULL,
  `MTNNumber` varchar(15) NOT NULL,
  `VodaHolderName` varchar(255) NOT NULL,
  `VodaNumber` varchar(15) NOT NULL,
  `AirtelTigoHolderName` varchar(255) NOT NULL,
  `AirtelTigoNumber` varchar(15) NOT NULL,
  `AttachedDocument` varchar(150) NOT NULL,
  `BoardMemberProfilePicture` varchar(150) NOT NULL,
  `BoardMemberName` varchar(255) NOT NULL,
  `BoardMemberContact` varchar(15) NOT NULL,
  `BoardMemberEmail` varchar(150) NOT NULL,
  `BoardMemberProfile` text NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `DateCreated` datetime NOT NULL DEFAULT current_timestamp(),
  `UpdatedBy` int(11) NOT NULL,
  `DateUpdated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `CommentID` int(11) NOT NULL,
  `NewsID` int(11) NOT NULL,
  `Comment` text NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `DateAdded` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`CommentID`, `NewsID`, `Comment`, `Name`, `Email`, `DateAdded`) VALUES
(1, 1, 'This is interesting', 'Emmanuella', 'emmanuella@gmail.com', '2021-08-26 21:09:09'),
(2, 1, 'Another comment Another comment Another comment Another comment Another comment Another comment Another comment Another comment Another comment Another comment Another comment Another comment Another comment Another comment Another comment Another comment Another comment Another comment Another comment Another comment Another comment Another comment Another comment Another comment', 'James Aidoo', 'james@gmail.com', '2021-08-26 21:09:32'),
(3, 2, 'This is a new comment all together', 'Pasty ASamoah', 'pastyasamoah13@gmail.com', '2021-08-26 21:10:00');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `NewsID` int(10) UNSIGNED NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `Attachment` varchar(255) NOT NULL,
  `Source` varchar(255) NOT NULL,
  `Status` int(11) NOT NULL DEFAULT 0 COMMENT '1= Published; 0= Not Published',
  `Views` int(11) NOT NULL DEFAULT 0,
  `Likes` int(11) NOT NULL DEFAULT 0,
  `CreatedBy` int(11) NOT NULL,
  `DateCreated` int(11) NOT NULL DEFAULT current_timestamp(),
  `UpdatedBy` int(11) NOT NULL,
  `DateUpdated` int(11) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `privileges`
--

CREATE TABLE `privileges` (
  `PrivilegeID` int(10) UNSIGNED NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Mentors` varchar(10) NOT NULL,
  `Mentees` varchar(10) NOT NULL,
  `Members` varchar(10) NOT NULL,
  `Visitors` varchar(10) NOT NULL,
  `News` varchar(10) NOT NULL,
  `Scholarships` varchar(10) NOT NULL,
  `Galleries` varchar(10) NOT NULL,
  `Events` varchar(10) NOT NULL,
  `AboutUs` varchar(10) NOT NULL,
  `System` varchar(10) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `DateCreated` datetime NOT NULL DEFAULT current_timestamp(),
  `UpdatedBy` int(11) NOT NULL,
  `DateUpdated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(10) UNSIGNED NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Contact` varchar(150) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Active` tinyint(4) NOT NULL DEFAULT 1,
  `PrivilegeID` int(11) NOT NULL,
  `ProfilePicture` varchar(255) NOT NULL,
  `CreatedBy` int(11) NOT NULL DEFAULT 0,
  `DateCreated` datetime NOT NULL DEFAULT current_timestamp(),
  `UpdatedBy` int(11) NOT NULL,
  `DateUpdated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Name`, `Contact`, `Email`, `Password`, `Active`, `PrivilegeID`, `ProfilePicture`, `CreatedBy`, `DateCreated`, `UpdatedBy`, `DateUpdated`) VALUES
(1, 'System Administrator', '', 'admin@wallscomputing.com', '37e207e6544070a837b444534ab0b40f', 1, 1, '', 0, '2021-08-19 08:53:32', 1, '2021-08-19 08:53:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`AboutID`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`CommentID`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`NewsID`);

--
-- Indexes for table `privileges`
--
ALTER TABLE `privileges`
  ADD PRIMARY KEY (`PrivilegeID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `AboutID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `CommentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `NewsID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `privileges`
--
ALTER TABLE `privileges`
  MODIFY `PrivilegeID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
