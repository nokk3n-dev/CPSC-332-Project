-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2024 at 08:07 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aem`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `EventID` int(11) NOT NULL,
  `StartTime` time DEFAULT NULL,
  `EndTime` time DEFAULT NULL,
  `StartDate` date DEFAULT NULL,
  `EndDate` date DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `Status` enum('Published','Unpublished') DEFAULT NULL,
  `SubmissionDeadline` date DEFAULT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `MaxCapacity` int(11) DEFAULT NULL,
  `VenueID` int(11) DEFAULT NULL,
  `UniversityID` int(11) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `City` varchar(100) DEFAULT NULL,
  `State` varchar(100) DEFAULT NULL,
  `ZipCode` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`EventID`, `StartTime`, `EndTime`, `StartDate`, `EndDate`, `Description`, `Status`, `SubmissionDeadline`, `Name`, `MaxCapacity`, `VenueID`, `UniversityID`, `Address`, `City`, `State`, `ZipCode`) VALUES
(1, '10:00:00', '00:00:00', '2024-05-03', '2024-05-06', 'Celebration for all things LA', 'Published', '2024-05-03', 'LA Expo 2024', 1000, 1, 1, '123 Main St', 'Los Angeles', 'CA', '98008');

-- --------------------------------------------------------

--
-- Table structure for table `eventkeynotespeaker`
--

CREATE TABLE `eventkeynotespeaker` (
  `EventID` int(11) NOT NULL,
  `SpeakerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `eventpresenter`
--

CREATE TABLE `eventpresenter` (
  `EventID` int(11) NOT NULL,
  `PresenterID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `eventsponsor`
--

CREATE TABLE `eventsponsor` (
  `EventID` int(11) NOT NULL,
  `SponsorID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `keynotespeaker`
--

CREATE TABLE `keynotespeaker` (
  `SpeakerID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Affiliation` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `presenter`
--

CREATE TABLE `presenter` (
  `PresenterID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `Affiliation` varchar(100) DEFAULT NULL,
  `PresenterName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sponsor`
--

CREATE TABLE `sponsor` (
  `SponsorID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Level` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `university`
--

CREATE TABLE `university` (
  `UniversityID` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `university`
--

INSERT INTO `university` (`UniversityID`, `Name`) VALUES
(1, 'University of Southern California');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `Fname` varchar(50) DEFAULT NULL,
  `Lname` varchar(50) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `PhoneNumber` varchar(20) DEFAULT NULL,
  `IsAdmin` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Fname`, `Lname`, `Email`, `Password`, `PhoneNumber`, `IsAdmin`) VALUES
(1, 'admin', '', 'admin@example.com', 'flanksteak', '123456789', 1),
(2, 'Violet', 'Evergarden', 'vevergarden@chpostal.com', 'Pa22w0rd#1', '1234567890', 0),
(3, 'Jaden', 'Johnson', 'jadenjohnson@jaden.com', 'J@d3nIsL@m3', '1234567890', 0),
(4, 'User1', 'default', 'User1@example.com', 'User1@example.com', '', 0),
(5, 'User2', 'default', 'User2@example.com', 'User2@example.com', '', 0),
(6, 'User3', 'default', 'User3@example.com', 'User3@example.com', '', 0),
(7, 'User4', 'default', 'User4@example.com', 'User4@example.com', '', 0),
(8, 'User5', 'default', 'User5@example.com', 'User5@example.com', '', 0),
(9, 'User6', 'default', 'User6@example.com', 'User6@example.com', '', 0),
(10, 'User7', 'default', 'User7@example.com', 'User7@example.com', '', 0),
(11, 'User8', 'default', 'User8@example.com', 'User8@example.com', '', 0),
(12, 'User9', 'x', 'User9@example.com', 'User9@example.com', '', 0),
(13, 'User10', 'x', 'User10@example.com', 'User10@example.com', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE `venue` (
  `VenueID` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `ZipCode` varchar(20) DEFAULT NULL,
  `City` varchar(100) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `UniversityID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`VenueID`, `Name`, `ZipCode`, `City`, `Address`, `UniversityID`) VALUES
(1, 'USC Football Stadium', '90089', 'Los Angeles', '123 Main Street', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`EventID`),
  ADD KEY `VenueID` (`VenueID`),
  ADD KEY `UniversityID` (`UniversityID`);

--
-- Indexes for table `eventkeynotespeaker`
--
ALTER TABLE `eventkeynotespeaker`
  ADD PRIMARY KEY (`EventID`,`SpeakerID`),
  ADD KEY `SpeakerID` (`SpeakerID`);

--
-- Indexes for table `eventpresenter`
--
ALTER TABLE `eventpresenter`
  ADD PRIMARY KEY (`EventID`,`PresenterID`),
  ADD KEY `PresenterID` (`PresenterID`);

--
-- Indexes for table `eventsponsor`
--
ALTER TABLE `eventsponsor`
  ADD PRIMARY KEY (`EventID`,`SponsorID`),
  ADD KEY `SponsorID` (`SponsorID`);

--
-- Indexes for table `keynotespeaker`
--
ALTER TABLE `keynotespeaker`
  ADD PRIMARY KEY (`SpeakerID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `presenter`
--
ALTER TABLE `presenter`
  ADD PRIMARY KEY (`PresenterID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `sponsor`
--
ALTER TABLE `sponsor`
  ADD PRIMARY KEY (`SponsorID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `university`
--
ALTER TABLE `university`
  ADD PRIMARY KEY (`UniversityID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Password` (`Password`);

--
-- Indexes for table `venue`
--
ALTER TABLE `venue`
  ADD PRIMARY KEY (`VenueID`),
  ADD KEY `UniversityID` (`UniversityID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `EventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `keynotespeaker`
--
ALTER TABLE `keynotespeaker`
  MODIFY `SpeakerID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `presenter`
--
ALTER TABLE `presenter`
  MODIFY `PresenterID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sponsor`
--
ALTER TABLE `sponsor`
  MODIFY `SponsorID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university`
--
ALTER TABLE `university`
  MODIFY `UniversityID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `venue`
--
ALTER TABLE `venue`
  MODIFY `VenueID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`VenueID`) REFERENCES `venue` (`VenueID`),
  ADD CONSTRAINT `event_ibfk_2` FOREIGN KEY (`UniversityID`) REFERENCES `university` (`UniversityID`);

--
-- Constraints for table `eventkeynotespeaker`
--
ALTER TABLE `eventkeynotespeaker`
  ADD CONSTRAINT `eventkeynotespeaker_ibfk_1` FOREIGN KEY (`EventID`) REFERENCES `event` (`EventID`),
  ADD CONSTRAINT `eventkeynotespeaker_ibfk_2` FOREIGN KEY (`SpeakerID`) REFERENCES `keynotespeaker` (`SpeakerID`);

--
-- Constraints for table `eventpresenter`
--
ALTER TABLE `eventpresenter`
  ADD CONSTRAINT `eventpresenter_ibfk_1` FOREIGN KEY (`EventID`) REFERENCES `event` (`EventID`),
  ADD CONSTRAINT `eventpresenter_ibfk_2` FOREIGN KEY (`PresenterID`) REFERENCES `presenter` (`PresenterID`);

--
-- Constraints for table `eventsponsor`
--
ALTER TABLE `eventsponsor`
  ADD CONSTRAINT `eventsponsor_ibfk_1` FOREIGN KEY (`EventID`) REFERENCES `event` (`EventID`),
  ADD CONSTRAINT `eventsponsor_ibfk_2` FOREIGN KEY (`SponsorID`) REFERENCES `sponsor` (`SponsorID`);

--
-- Constraints for table `keynotespeaker`
--
ALTER TABLE `keynotespeaker`
  ADD CONSTRAINT `keynotespeaker_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `presenter`
--
ALTER TABLE `presenter`
  ADD CONSTRAINT `presenter_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `sponsor`
--
ALTER TABLE `sponsor`
  ADD CONSTRAINT `sponsor_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `venue`
--
ALTER TABLE `venue`
  ADD CONSTRAINT `venue_ibfk_1` FOREIGN KEY (`UniversityID`) REFERENCES `university` (`UniversityID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
