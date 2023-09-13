-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2023 at 02:05 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `violations`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`admin_Id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `suffix` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date_registered` date NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'Staff',
  `verification_code` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_Id`, `firstname`, `middlename`, `lastname`, `suffix`, `gender`, `dob`, `age`, `address`, `email`, `contact`, `password`, `image`, `date_registered`, `user_type`, `verification_code`) VALUES
(1, 'Christian', 'Cabag', 'Son', '', 'Male', '2022-04-07', 23, 'Purok San Isidro, Sitio Upper Landing, Daanlungsod, Medellin, Cebu', 'admin@gmail.com', '09359428963', '21232f297a57a5a743894a0e4a801fc3', 'art-hauntington-jzY0KRJopEI-unsplash.jpg', '2022-04-17', 'Admin', ''),
(2, 'Erwin', 'User', 'User', '', 'Male', '2022-12-07', 1, 'User, User, User', 'sonerwin12@gmail.com', '9359428963', '0192023a7bbd73250516f069df18b500', '1.jpg', '2022-12-01', 'Staff', '508516'),
(3, 'address', 'addressaddress', 'address', '', 'Female', '2023-01-03', 2, 'address', 'admaddressin@gmail.com', '9132456789', 'de5a18d52133ef21f211020ceb464c07', '2.jpg', '2023-01-05', 'Staff', '');

-- --------------------------------------------------------

--
-- Table structure for table `impound`
--

CREATE TABLE IF NOT EXISTS `impound` (
`impound_Id` int(11) NOT NULL,
  `impound_violator_Id` int(11) NOT NULL,
  `ticket` varchar(255) NOT NULL,
  `chassis_no` varchar(255) NOT NULL,
  `engine_no` varchar(255) NOT NULL,
  `plate_no` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `impound_penalty` varchar(255) NOT NULL,
  `date_impound` varchar(255) NOT NULL,
  `vehicle` varchar(255) NOT NULL,
  `ownership` varchar(255) NOT NULL,
  `accident` varchar(255) NOT NULL,
  `official_receipt` varchar(255) NOT NULL,
  `release_status` varchar(100) NOT NULL DEFAULT 'Pending',
  `release_date` varchar(100) NOT NULL DEFAULT 'N/A',
  `deleted` int(11) NOT NULL DEFAULT '0' COMMENT '0=Not deleted, 1=Archived'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

--
-- Dumping data for table `impound`
--

INSERT INTO `impound` (`impound_Id`, `impound_violator_Id`, `ticket`, `chassis_no`, `engine_no`, `plate_no`, `color`, `impound_penalty`, `date_impound`, `vehicle`, `ownership`, `accident`, `official_receipt`, `release_status`, `release_date`, `deleted`) VALUES
(63, 28, 'fds', 'fdsf', 'fdsfsd', 'fdsf', 'fds', '432', '2022-11-10', 'Truck', 'Public', 'Yes', 'fdsfsd', 'Pending', 'N/A', 0),
(64, 27, '1234', 'gdfgd', 'gfdgd', 'dsfsdfs', 'gfdgdfg', '32', '2022-12-25', '', '', '', 'fdsfsd', 'Pending', 'N/A', 1);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
`logID` int(11) NOT NULL,
  `adminID` int(11) NOT NULL,
  `logDate` varchar(255) NOT NULL,
  `logoutDate` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`logID`, `adminID`, `logDate`, `logoutDate`) VALUES
(11, 1, 'November 29, 2022 17:19:33', 'November 29, 2022 17:19:59'),
(12, 1, 'November 29, 2022 17:27:41', 'November 29, 2022 17:43:03'),
(36, 1, 'November 30, 2022 14:50:37', ''),
(37, 1, 'December 01, 2022 03:26:24', 'December 01, 2022 07:07:33'),
(38, 1, 'December 01, 2022 07:07:39', ''),
(39, 2, 'December 01, 2022 07:16:15', ''),
(40, 2, 'December 01, 2022 07:17:26', 'December 01, 2022 07:22:24'),
(41, 2, 'December 01, 2022 07:26:06', ''),
(42, 1, 'December 01, 2022 07:36:00', ''),
(43, 1, 'December 03, 2022 04:27:50', ''),
(44, 2, 'December 03, 2022 16:13:15', ''),
(45, 2, 'December 05, 2022 03:26:28', ''),
(46, 1, 'January 05, 2023 11:03:10', 'January 05, 2023 11:04:16'),
(47, 1, 'January 05, 2023 11:51:30', 'January 05, 2023 11:53:05'),
(48, 2, 'January 05, 2023 11:53:15', 'January 05, 2023 11:53:22'),
(49, 2, 'January 05, 2023 11:57:03', 'January 05, 2023 11:59:05'),
(50, 1, 'January 05, 2023 11:59:14', ''),
(51, 1, 'January 05, 2023 12:07:32', ''),
(52, 2, 'January 05, 2023 12:14:28', ''),
(53, 1, 'January 05, 2023 12:26:43', ''),
(54, 2, 'January 05, 2023 12:44:20', ''),
(55, 1, 'January 05, 2023 12:52:14', ''),
(56, 2, 'January 05, 2023 13:03:23', ''),
(57, 1, 'January 05, 2023 13:04:12', 'January 05, 2023 13:41:02'),
(58, 1, 'January 05, 2023 14:02:22', 'January 05, 2023 14:02:26'),
(59, 1, 'January 05, 2023 14:02:55', '');

-- --------------------------------------------------------

--
-- Table structure for table `violations`
--

CREATE TABLE IF NOT EXISTS `violations` (
`violation_Id` int(11) NOT NULL,
  `violation` varchar(255) NOT NULL,
  `penalty` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `violations`
--

INSERT INTO `violations` (`violation_Id`, `violation`, `penalty`) VALUES
(2, 'Driving Without Driver''s License', '3000'),
(3, 'No Helmet', '1000'),
(4, 'Illegal Parking', '1000'),
(5, 'Disregarding Traffic Signs', '2000'),
(6, 'Driving Under The Influence', '10000'),
(7, 'Minor Driving Motorcycle', '3000'),
(8, 'No O.R./C.R.', '1000'),
(9, 'No Plate Number', '5000'),
(10, 'Dirty Plate Number', '5000'),
(11, 'Not Firmly Attached Plate Number', '5000'),
(12, 'No Muffler', '5000'),
(13, 'Improvised Muffler', '5000'),
(14, 'No Signal Lights', '5000'),
(15, 'No Tail Lights', '5000'),
(16, 'No Brake Lights', '5000'),
(17, 'No Head Lights', '5000'),
(18, 'Defective Brakes', '5000'),
(19, 'No Side Mirror', '5000'),
(20, 'No Horns', '5000');

-- --------------------------------------------------------

--
-- Table structure for table `violators`
--

CREATE TABLE IF NOT EXISTS `violators` (
`violator_Id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `civil_status` varchar(100) NOT NULL,
  `province` varchar(255) NOT NULL,
  `municipality` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `confiscated_Id` varchar(255) NOT NULL,
  `plate_no` varchar(255) NOT NULL,
  `traffic_offense_ticket` varchar(255) NOT NULL,
  `violators_violation` text NOT NULL,
  `payment` varchar(255) NOT NULL DEFAULT 'Unpaid',
  `date_violated` varchar(100) NOT NULL,
  `vehicle_type` varchar(255) NOT NULL,
  `ownership` varchar(255) NOT NULL,
  `accident` varchar(255) NOT NULL,
  `date_paid` varchar(255) NOT NULL,
  `official_receipt` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'user.png',
  `date_added` varchar(255) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0' COMMENT '0=Not deleted, 1=Archived'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `violators`
--

INSERT INTO `violators` (`violator_Id`, `name`, `gender`, `civil_status`, `province`, `municipality`, `barangay`, `contact`, `confiscated_Id`, `plate_no`, `traffic_offense_ticket`, `violators_violation`, `payment`, `date_violated`, `vehicle_type`, `ownership`, `accident`, `date_paid`, `official_receipt`, `image`, `date_added`, `deleted`) VALUES
(27, 'ereetetetetete', 'Male', 'Married', 'Medellin', 'fdsfsf', 'dsfsdf', 'fdgdg', 'sfds', 'dsfsdfs', 'fdsf', 'Defective Brakes - P 5000.00,Disregarding Traffic Signs - P 2000.00,Driving Without Driver''s License - P 3000.00,Improvised Muffler - P 5000.00,No Brake Lights - P 5000.00,No Helmet - P 1000.00,No Muffler - P 5000.00,No Plate Number - P 5000.00,No Signal Lights - P 5000.00,Not Firmly Attached Plate Number - P 5000.00,', 'Unpaid', '2022-12-05', 'Jeep', 'Public', 'Yes', '2022-12-05', 'fdsfsd', 'wp4813161-simple-minimalist-wallpapers.jpg', '2022-12-01', 0),
(28, 'd', 'Male', 'Married', 'd', 'd', 'd', 'd', 'd', 'd', 'd', 'Defective Brakes - P 5000.00,Disregarding Traffic Signs - P 2000.00,Driving Without Driver''s License - P 3000.00,No Brake Lights - P 5000.00,No Head Lights - P 5000.00,No Helmet - P 1000.00,No Horns - P 5000.00,No Muffler - P 5000.00,No O.R./C.R. - P 1000', 'Unpaid', '2022-12-20', 'Jeep', 'Government', 'No', '2022-12-06', 'd', 'wallpaperflare.com_wallpaper (1).jpg', '2022-12-01', 0),
(29, 'gfdg', 'Male', 'Single', 'd', 's', 'g', 'gfg', 'gfd', 'gf', 'gfd', 'Defective Brakes - P 5000.00,Disregarding Traffic Signs - P 2000.00,Driving Without Driver''s License - P 3000.00,Improvised Muffler - P 5000.00,No Brake Lights - P 5000.00,No Helmet - P 1000.00,', 'Paid', '2022-12-13', 'Car', 'Government', 'No', '2022-12-13', 'gfd', 'wallpaperflare.com_wallpaper (1).jpg', '2022-12-01', 0),
(30, 'vb', 'Male', 'Single', 'vb', 'vb', 'vb', 'vb', 'vb', 'vb', 'vb', 'Defective Brakes - P 5000.00,Disregarding Traffic Signs - P 2000.00,Driving Without Driver''s License - P 3000.00,Improvised Muffler - P 5000.00,No Brake Lights - P 5000.00,No Helmet - P 1000.00,No Muffler - P 5000.00,No Plate Number - P 5000.00,No Signal ', 'Unpaid', '2022-12-26', 'Jeep', 'Public', 'No', '2022-12-28', 'vb', 'minimalism-1644666519306-6515.jpg', '2022-12-01', 1),
(31, 'bb', 'Female', 'Married', 'bb', 'bb', 'bbb', 'bb', 'bb', 'bbb', 'bb', 'No Head Lights - P 5000.00,No Horns - P 5000.00,No O.R./C.R. - P 1000.00,No Side Mirror - P 5000.00,No Tail Lights - P 5000.00,', 'Unpaid', '2022-12-14', 'Car', 'Private', 'No', '2022-12-15', 'bb', 'user.png', '2022-12-01', 0),
(32, 'fdsfd', 'Male', 'Married', 'fds', 'fdsfs', 'fdsf', 'sdfdsf', 'sd', 'fds', 'fdsfds', 'Defective Brakes - P 5000.00,Driving Without Driver''s License - P 3000.00,No Brake Lights - P 5000.00,', 'Unpaid', '2023-01-02', 'Jeep', 'Public', 'No', '2023-01-03', 'fdsfds', 'user.png', '2023-01-05', 0),
(33, 'gfdgdfgd', 'Male', 'Married', 'gfd', 'gdfg', 'fdgdfg', 'dfgdf', 'gdfg', 'gdfg', 'gfdgdf', 'Defective Brakes - P 5000.00,', 'Unpaid', '2023-01-02', 'Car', 'Private', 'Yes', '2023-01-03', 'gfdgd', 'user.png', '2023-01-05', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`admin_Id`);

--
-- Indexes for table `impound`
--
ALTER TABLE `impound`
 ADD PRIMARY KEY (`impound_Id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
 ADD PRIMARY KEY (`logID`);

--
-- Indexes for table `violations`
--
ALTER TABLE `violations`
 ADD PRIMARY KEY (`violation_Id`);

--
-- Indexes for table `violators`
--
ALTER TABLE `violators`
 ADD PRIMARY KEY (`violator_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `admin_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `impound`
--
ALTER TABLE `impound`
MODIFY `impound_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
MODIFY `logID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `violations`
--
ALTER TABLE `violations`
MODIFY `violation_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `violators`
--
ALTER TABLE `violators`
MODIFY `violator_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
