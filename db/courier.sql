-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2021 at 12:45 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `courier`
--

-- --------------------------------------------------------

--
-- Table structure for table `couriertracking`
--

CREATE TABLE `couriertracking` (
  `id` int(11) NOT NULL,
  `courierid` int(11) NOT NULL,
  `rqtpickup` timestamp NOT NULL DEFAULT current_timestamp(),
  `outpick` timestamp NULL DEFAULT NULL,
  `pickedup` timestamp NULL DEFAULT NULL,
  `shipped` timestamp NULL DEFAULT NULL,
  `intransit` timestamp NULL DEFAULT NULL,
  `athub` timestamp NULL DEFAULT NULL,
  `outdeli` timestamp NULL DEFAULT NULL,
  `delivered` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `couriertracking`
--

INSERT INTO `couriertracking` (`id`, `courierid`, `rqtpickup`, `outpick`, `pickedup`, `shipped`, `intransit`, `athub`, `outdeli`, `delivered`) VALUES
(1, 1, '2021-01-01 17:32:31', '2021-01-02 17:32:53', '2021-01-03 17:33:00', '2021-01-04 17:33:04', '2021-01-05 17:33:18', '2021-01-06 17:33:26', '2021-01-06 17:33:29', '2021-01-07 17:33:35'),
(2, 9, '2021-01-01 17:32:31', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 2, '2021-02-08 13:40:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 5, '2021-02-08 13:41:47', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 14, '2021-02-08 13:55:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 15, '2021-02-08 14:01:34', '2021-02-09 12:11:24', '2021-02-09 12:12:03', '2021-02-09 12:22:11', '2021-02-09 12:22:28', '2021-02-09 12:22:41', '2021-02-09 12:22:52', '2021-02-09 12:23:22'),
(8, 16, '2021-02-09 02:44:30', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `txnID` bigint(20) NOT NULL,
  `custid` int(11) NOT NULL,
  `courierid` int(11) NOT NULL,
  `card_name` varchar(30) NOT NULL,
  `card_num` bigint(20) NOT NULL,
  `card_cvc` int(5) NOT NULL,
  `card_exp_month` varchar(2) NOT NULL,
  `card_exp_year` varchar(4) NOT NULL,
  `status` varchar(15) NOT NULL,
  `amount` int(5) NOT NULL,
  `txndate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `txnID`, `custid`, `courierid`, `card_name`, `card_num`, `card_cvc`, `card_exp_month`, `card_exp_year`, `status`, `amount`, `txndate`) VALUES
(6, 20210209104243, 5, 16, 'Ganesh', 4242424242424242, 121, '02', '2022', 'succeeded', 90, '2021-02-09 05:12:43'),
(7, 20210209120516, 5, 15, 'Ganesh', 424242424242424242, 121, '02', '2022', 'succeeded', 1080, '2021-02-09 06:35:16');

-- --------------------------------------------------------

--
-- Table structure for table `staffbank`
--

CREATE TABLE `staffbank` (
  `id` int(11) NOT NULL,
  `staffid` int(11) NOT NULL,
  `acname` varchar(30) NOT NULL,
  `acnum` varchar(15) NOT NULL,
  `ifsc` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staffbank`
--

INSERT INTO `staffbank` (`id`, `staffid`, `acname`, `acnum`, `ifsc`) VALUES
(1, 1, 'Helloo', '121212121212', 'ABCD121212'),
(3, 10, 'Ganesh', '12121212', 'SDASSD1212');

-- --------------------------------------------------------

--
-- Table structure for table `staffsalary`
--

CREATE TABLE `staffsalary` (
  `id` int(11) NOT NULL,
  `staff` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `dot` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staffsalary`
--

INSERT INTO `staffsalary` (`id`, `staff`, `amount`, `dot`) VALUES
(7, 7, 50, '2021-02-05 17:29:49'),
(8, 6, 100, '2021-02-05 17:35:37'),
(11, 6, 50, '2021-02-06 06:47:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(11) NOT NULL,
  `AdminName` varchar(50) DEFAULT NULL,
  `UserName` varchar(50) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Admin', 'admin', 9878987987, 'admin', 'c4ca4238a0b923820dcc509a6f75849b', '2019-03-26 06:14:39');

-- --------------------------------------------------------

--
-- Table structure for table `tblbranch`
--

CREATE TABLE `tblbranch` (
  `ID` int(11) NOT NULL,
  `BranchName` varchar(120) DEFAULT NULL,
  `BranchContactnumber` bigint(11) DEFAULT NULL,
  `BranchEmail` varchar(120) DEFAULT NULL,
  `BranchAddress` varchar(120) DEFAULT NULL,
  `BranchCity` varchar(120) DEFAULT NULL,
  `BranchState` varchar(120) DEFAULT NULL,
  `BranchPincode` varchar(120) DEFAULT NULL,
  `BranchCountry` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbranch`
--

INSERT INTO `tblbranch` (`ID`, `BranchName`, `BranchContactnumber`, `BranchEmail`, `BranchAddress`, `BranchCity`, `BranchState`, `BranchPincode`, `BranchCountry`) VALUES
(6, 'CMS Delhi', 8977977778, 'delhi@gmail.com', 'c-140, mayur vihar ph-3, near sbi bank', 'New Delhi', 'Delhi', '2858978', 'India'),
(7, 'CMS Agra', 8797987777, 'agra@gmail.com', 'D-124, gohana road, near reliance fresh', 'Agra', 'UP', '221001', 'India'),
(8, 'CMS Kanpur', 8988898889, 'kanpur@gmail.com', 'F-171, Maharana Pratap Road Near SBI Bank Block C', 'Kanpur', 'UP', '2210014', 'India'),
(9, 'Test branch', 1234567890, 'test@gmail.com', 'Test Address', 'New Delhi', 'Delhi', '110091', 'India'),
(10, 'Noida Branch', 987654321, 'noidacm@test.com', 'A-1 Sector 63', 'Noida', 'UP', '201301', 'India');

-- --------------------------------------------------------

--
-- Table structure for table `tblcourier`
--

CREATE TABLE `tblcourier` (
  `ID` int(11) NOT NULL,
  `RefNumber` varchar(120) DEFAULT NULL,
  `cid` int(11) NOT NULL DEFAULT 0,
  `SenderBranch` varchar(120) DEFAULT NULL,
  `SenderName` varchar(120) DEFAULT NULL,
  `SenderContactnumber` bigint(11) DEFAULT NULL,
  `SenderAddress` varchar(120) DEFAULT NULL,
  `SenderCity` varchar(120) DEFAULT NULL,
  `SenderState` varchar(120) DEFAULT NULL,
  `SenderPincode` varchar(120) DEFAULT NULL,
  `SenderCountry` varchar(120) DEFAULT NULL,
  `RecipientName` varchar(120) DEFAULT NULL,
  `RecipientContactnumber` bigint(11) DEFAULT NULL,
  `RecipientAddress` varchar(120) DEFAULT NULL,
  `RecipientCity` varchar(120) DEFAULT NULL,
  `RecipientState` varchar(120) DEFAULT NULL,
  `RecipientPincode` varchar(120) DEFAULT NULL,
  `RecipientCountry` varchar(120) DEFAULT NULL,
  `CourierDes` varchar(250) DEFAULT NULL,
  `ParcelWeight` varchar(120) DEFAULT NULL,
  `ParcelDimensionlen` varchar(120) DEFAULT NULL,
  `ParcelDimensionwidth` varchar(120) DEFAULT NULL,
  `ParcelDimensionheight` varchar(120) DEFAULT NULL,
  `ParcelPrice` varchar(120) DEFAULT NULL,
  `Status` varchar(120) DEFAULT NULL,
  `payment` tinyint(1) NOT NULL DEFAULT 0,
  `staffName` varchar(20) DEFAULT NULL,
  `CourierDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `statusdate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcourier`
--

INSERT INTO `tblcourier` (`ID`, `RefNumber`, `cid`, `SenderBranch`, `SenderName`, `SenderContactnumber`, `SenderAddress`, `SenderCity`, `SenderState`, `SenderPincode`, `SenderCountry`, `RecipientName`, `RecipientContactnumber`, `RecipientAddress`, `RecipientCity`, `RecipientState`, `RecipientPincode`, `RecipientCountry`, `CourierDes`, `ParcelWeight`, `ParcelDimensionlen`, `ParcelDimensionwidth`, `ParcelDimensionheight`, `ParcelPrice`, `Status`, `payment`, `staffName`, `CourierDate`, `statusdate`) VALUES
(1, '995097847', 5, 'CMS Agra', 'Jairam', 7797979798, 'F-124, shivala kailash puram,\r\n', 'Varanasi', 'UP', '222221', 'India', 'Kumar', 8987897897, 'G-134, Mayur niwas', 'New Delhi', 'Delhi', '110096', '', 'hjguyuythui', '.5 kg', '25', '35', '20', '200', NULL, 0, 'Harish Pandey', '2018-03-27 17:08:38', '2021-02-03 20:32:02'),
(2, '148776252', 5, 'CMS Agra', 'Akash Jha', 8978897989, 'B-20/122, hauzkhas, Near MTNL office', 'New Delhi', 'Delhi', '222222', 'India', 'Parakash Sharma', 3698745687, 'Flat No.145 frist floor Neeva Aparment Southwest', 'Kanpur', 'UP', '4545145', 'India', 'Parcel Contain Toys', '2kg', '25 inch', '35 inch', '20 inch', '500', NULL, 0, 'Harish Pandey', '2019-03-28 10:45:07', '2019-03-28 10:45:07'),
(3, '887985411', 0, 'CMS Agra', 'Gyan Ganga', 8989898898, 'H-120 gali no 82 near relaince fresh', 'Agra', 'UP', '55555555', 'India', 'Harish', 9898989898, 'koohinoor apartment bulding no 4', 'Allahabad', 'UP', '45445445', 'India', 'NA', '.5kg', '15', '16', '10', '250', NULL, 0, 'Harish Pandey', '2019-03-28 11:28:19', '2019-03-28 11:28:19'),
(4, '997614830', 0, 'CMS Kanpur', 'Rahul Mahajan', 8569745697, 'H.N0-B-3/4, Gulmar Colony ', 'Kanpur', 'UP', '221441', 'India', 'Deepika Singh', 987456123, 'Flat No:104, harishnagar', 'Manaili', 'HP', '551224', 'India', 'Parcel Contain fibre', '3.5 kg', '45 inch', '30 inch', '25 inch', '800 ', 'rqtpickup', 0, 'Jao', '2019-04-03 07:31:36', '2019-04-03 07:31:36'),
(5, '824523415', 0, 'CMS Kanpur', 'Mohan Das', 8979797979, 'abc niwas', 'Kanpur', 'UP', '254879', 'India', 'Kaushal', 9879797979, 'xyz b-3/4 ', 'Muradabad', 'UP', '897979', 'India', 'NA', '1.4', '25 ', '20', '15', '300', 'rqtpickup', 0, 'Kumar', '2019-04-03 16:16:47', '2019-04-03 16:16:47'),
(6, '347227212', 0, 'CMS Kanpur', 'Falguni Singh', 8987897744, 'abc hauz khas', 'Kanpur', 'UP', '897979', 'India', 'Drashan Singh', 7998789887, 'fhgjhuihkkjhklj', 'Lucknow', 'UP', '789898', 'India', 'Parcel contain fibre', '0.5', '8', '10', '12', '80', 'rqtpickup', 0, 'Kumar', '2019-04-03 16:19:27', '2019-04-03 16:19:27'),
(7, '486484879', 0, 'CMS Delhi', 'Ankush Sharma', 789456133, 'Firoz colony H.No:34/44', 'Delhi', 'New Delhi', '456879', 'India', 'Divyansh', 8979797977, 'Viraz Niwas H.No:45-34 A, Near SBI Bank', 'Kanpur', 'UP', '456123', 'India', 'Parcel contains crockery', '2.5', '45', '30', '25', '450', NULL, 0, 'Girish Chandra', '2019-04-04 06:43:01', '2019-04-04 06:43:01'),
(8, '338122505', 0, 'CMS Agra', 'Raghav', 8977997979, 'H.NO:B3/4 shival bajrang park', 'Agra', 'UP', '897977', 'India', 'Manish', 7897798979, 'Banglo No:183, goregao', 'Mumbai', 'Maharastra', '987989', 'India', 'NA', '.50 Kg', '85', '75', '25', '200', NULL, 0, 'Girish Chandra', '2019-04-10 10:54:25', '2019-04-10 10:54:25'),
(9, '700159918', 0, 'Noida Branch', 'Anuj kumar', 2112441241, 'New Dlehi India', 'New Delhi', 'Delhi', '110091', 'India', 'Rahul', 4571545127, 'Pune', 'Pune', 'MH', '123123', 'India', 'This is sample text for Testing', '200 gm', '12', '10', '12', '200', NULL, 0, 'Anuj', '2019-04-14 13:06:01', '2019-04-14 13:06:01'),
(10, '791805913', 0, 'Noida Branch', 'Amit kumar', 1234567890, 'A-10  Noida 63', 'Nodia', 'UP', '201301', 'India', 'Sanjeev', 987654432, 'Gurugram', 'Gurugram', 'Haryana', '124124', 'India', 'This is sample text for testing', '200gm', '12', '10', '20', '125', NULL, 0, 'Girish Chandra', '2019-04-14 13:07:49', '2019-04-14 13:07:49'),
(11, '20210208190606', 5, 'CMS Delhi', 'a a', 9082371474, 'a', 'Mumbai', 'Maharashtra', '605726', 'India', 'a', 9082371474, 'a', 'Mumbai', 'Maharashtra', '121212', 'India', 'a', '12', '1', '1', '12', '1080', NULL, 0, NULL, '2021-02-08 13:36:06', '2021-02-08 13:36:06'),
(12, '20210208191147', 5, 'CMS Delhi', 'a a', 9082371474, 'a', 'Mumbai', 'Maharashtra', '605726', 'India', 'a', 9082371474, 'a', 'Mumbai', 'Maharashtra', '121212', 'India', 'a', '12', '1', '12', '1', '1080', NULL, 0, NULL, '2021-02-08 13:41:47', '2021-02-08 13:41:47'),
(13, '20210208192407', 5, 'CMS Delhi', 'a a', 9082371474, 'a', 'Mumbai', 'Maharashtra', '605726', 'India', 'a', 9082371474, 'a', 'Mumbai', 'Maharashtra', '121112', 'India', 'a', '12', '1', '1', '12', '1080', NULL, 0, NULL, '2021-02-08 13:54:07', '2021-02-08 13:54:07'),
(14, '20210208192549', 5, 'CMS Delhi', 'a a', 9082371474, 'a', 'Mumbai', 'Maharashtra', '605726', 'India', 'a', 9082371474, 'a', 'Mumbai', 'Maharashtra', '121112', 'India', 'a', '12', '1', '1', '12', '1080', 'rqtpickup', 0, 'Ganesh', '2021-02-08 13:55:49', '2021-02-08 13:55:49'),
(15, '20210208193134', 5, 'CMS Delhi', 'a a', 9082371474, 'a', 'Mumbai', 'Maharashtra', '605726', 'India', 'a', 9082371474, 'a', 'Mumbai', 'Maharashtra', '122121', 'India', 'a', '12', '1', '1', '12', '1080', 'delivered', 1, 'Ganesh', '2021-02-08 14:01:34', '2021-02-09 12:23:22'),
(16, '20210209081430', 5, 'CMS Delhi', 'a a', 9082371474, 'a', 'Mumbai', 'Maharashtra', '605726', 'India', 'a', 9082371474, 'a', 'Mumbai', 'Maharashtra', '111111', 'India', 'a', '1', '1', '1', '1', '90', 'rqtpickup', 1, 'Ganesh', '2021-02-09 02:44:30', '2021-02-09 02:44:30');

-- --------------------------------------------------------

--
-- Table structure for table `tblcouriertracking`
--

CREATE TABLE `tblcouriertracking` (
  `ID` int(11) NOT NULL,
  `CourierId` int(11) DEFAULT NULL,
  `remark` mediumtext DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `StatusDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcouriertracking`
--

INSERT INTO `tblcouriertracking` (`ID`, `CourierId`, `remark`, `status`, `StatusDate`) VALUES
(1, 2, ' Courier Shipped', 'Shipped', '2019-03-31 18:07:03'),
(2, 2, ' Product Intransit ', 'Intransit', '2019-03-31 18:15:44'),
(3, 2, ' Product has been deliver to abc.', 'Delivered', '2019-03-31 18:23:17'),
(4, 1, ' Intransit', 'Intransit', '2019-03-31 18:26:57'),
(5, 3, ' Shipped', 'Shipped', '2019-04-01 05:10:08'),
(6, 3, ' Intransit', 'Intransit', '2019-04-01 05:11:39'),
(7, 3, ' Arrived at nearest hub in city', 'Arrived at Destination', '2019-04-01 05:12:33'),
(8, 3, ' Out for delivery Today', 'Out for Delivery', '2019-04-01 05:13:11'),
(9, 3, ' Delivered Receive by Harish', 'Courier Pickup', '2019-04-01 05:13:57'),
(10, 3, ' Delivered', 'Delivered', '2019-04-01 05:14:25'),
(11, 4, ' Parcel Has been picked', 'Shipped', '2019-04-03 07:33:01'),
(12, 4, ' Parcel reached hub city', 'Intransit', '2019-04-03 07:33:51'),
(13, 4, ' Arrived at destination', 'Arrived at Destination', '2019-04-03 07:34:31'),
(14, 4, ' Parcel out for delivery', 'Out for Delivery', '2019-04-03 07:35:10'),
(15, 4, ' Parcel has been delivered', 'Delivered', '2019-04-03 07:35:38'),
(16, 7, ' Courier Pick Up', 'Courier Pickup', '2019-04-04 06:44:38'),
(17, 5, ' Courier has been picked', 'Courier Pickup', '2019-04-04 06:59:54'),
(18, 5, ' Shipped', 'Shipped', '2019-04-04 07:00:23'),
(19, 5, ' Parcel is on the way', 'Intransit', '2019-04-04 07:01:13'),
(20, 5, ' Arrived at destination', 'Arrived at Destination', '2019-04-04 07:02:02'),
(21, 5, ' Out for delivery', 'Out for Delivery', '2019-04-04 07:02:42'),
(22, 6, ' Courier is pickup', 'Courier Pickup', '2019-04-10 10:55:00'),
(23, 7, ' Shipped', 'Shipped', '2019-04-10 10:55:44'),
(24, 10, ' Courier picked up', 'Courier Pickup', '2019-04-14 13:08:20'),
(25, 10, ' Courier is in Intrnaist', 'Intransit', '2019-04-14 13:08:44'),
(26, 7, ' hii', 'Intransit', '2021-01-27 17:40:59');

-- --------------------------------------------------------

--
-- Table structure for table `tblcustomer`
--

CREATE TABLE `tblcustomer` (
  `id` int(11) NOT NULL,
  `fname` varchar(120) NOT NULL,
  `lname` varchar(120) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(120) NOT NULL,
  `city` varchar(120) NOT NULL,
  `state` varchar(120) NOT NULL,
  `country` varchar(120) NOT NULL,
  `pincode` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcustomer`
--

INSERT INTO `tblcustomer` (`id`, `fname`, `lname`, `phone`, `email`, `password`, `address`, `city`, `state`, `country`, `pincode`) VALUES
(5, 'a', 'a', 2147483647, '1121@qasde.comaa', 'c4ca4238a0b923820dcc509a6f75849b', 'a', 'a', 'a', 'a', '605726');

-- --------------------------------------------------------

--
-- Table structure for table `tblstaff`
--

CREATE TABLE `tblstaff` (
  `ID` int(10) NOT NULL,
  `BranchName` varchar(120) DEFAULT NULL,
  `StaffName` varchar(120) DEFAULT NULL,
  `StaffMobilenumber` bigint(11) DEFAULT NULL,
  `StaffEmail` varchar(120) DEFAULT NULL,
  `StaffPassword` varchar(120) DEFAULT NULL,
  `StaffRegdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `bankstatus` int(1) NOT NULL DEFAULT 0,
  `rate` int(11) NOT NULL,
  `paidsalary` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstaff`
--

INSERT INTO `tblstaff` (`ID`, `BranchName`, `StaffName`, `StaffMobilenumber`, `StaffEmail`, `StaffPassword`, `StaffRegdate`, `bankstatus`, `rate`, `paidsalary`) VALUES
(2, 'CMS Delhi', 'Harish Pandey', 8978987996, 'harish@gmail.com', '202cb962ac59075b964b07152d234b70', '2019-03-26 17:33:56', 1, 50, 0),
(3, 'CMS Delhi', 'Jao', 7987464678, 'jao@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '2019-03-26 17:35:56', 0, 50, 0),
(5, 'CMS Agra', 'Kumar', 4789747897, 'kumar@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2019-03-26 17:49:10', 0, 50, 0),
(6, 'CMS Kanpur', 'Girish Chandra', 8989985624, 'chandra@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '2019-04-03 07:03:29', 0, 50, 150),
(7, 'Noida Branch', 'Anuj', 1234567890, 'noidatest@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2019-04-14 12:53:31', 0, 50, 50),
(10, 'CMS Delhi', 'Ganesh', 9082371474, 'ganeshchavan13999@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '2021-02-06 06:56:38', 1, 50, 0),
(11, 'CMS Delhi', 'Ganesh', 9082371474, 'ganeshchan13999@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '2021-02-09 18:13:08', 0, 100, 0),
(13, 'CMS Delhi', 'Ganesh', 9082371474, 'mayurchavan171201@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '2021-02-09 18:14:18', 0, 50, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `couriertracking`
--
ALTER TABLE `couriertracking`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `courierid` (`courierid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `txnID` (`txnID`),
  ADD UNIQUE KEY `courierid` (`courierid`);

--
-- Indexes for table `staffbank`
--
ALTER TABLE `staffbank`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `staffid` (`staffid`);

--
-- Indexes for table `staffsalary`
--
ALTER TABLE `staffsalary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblbranch`
--
ALTER TABLE `tblbranch`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `BranchEmail` (`BranchEmail`);

--
-- Indexes for table `tblcourier`
--
ALTER TABLE `tblcourier`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `RefNumber` (`RefNumber`);

--
-- Indexes for table `tblcouriertracking`
--
ALTER TABLE `tblcouriertracking`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcustomer`
--
ALTER TABLE `tblcustomer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tblstaff`
--
ALTER TABLE `tblstaff`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `StaffEmail` (`StaffEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `couriertracking`
--
ALTER TABLE `couriertracking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `staffbank`
--
ALTER TABLE `staffbank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staffsalary`
--
ALTER TABLE `staffsalary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblbranch`
--
ALTER TABLE `tblbranch`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblcourier`
--
ALTER TABLE `tblcourier`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tblcouriertracking`
--
ALTER TABLE `tblcouriertracking`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tblcustomer`
--
ALTER TABLE `tblcustomer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tblstaff`
--
ALTER TABLE `tblstaff`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
