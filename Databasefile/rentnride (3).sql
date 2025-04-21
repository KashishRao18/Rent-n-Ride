-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2024 at 06:09 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentnride`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Name` varchar(40) DEFAULT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` char(32) DEFAULT NULL,
  `Status` enum('Active','Deactive') DEFAULT 'Active',
  `Role` enum('admin','manager','employee') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Name`, `Email`, `Password`, `Status`, `Role`) VALUES
('Kashish', '21bmiit148@gmail.com', '78df129b04db6341256e22293cad55be', 'Active', 'admin'),
('Pinal', 'rupavatiyap15@gmail.com', 'db0c44450b5635080c8d8cf95ee2c963', 'Active', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `Booking_Id` varchar(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Registration_No` varchar(10) NOT NULL,
  `City_Id` int(11) NOT NULL,
  `Start_Date` date NOT NULL,
  `End_Date` date NOT NULL,
  `Start_Meter` varchar(10) NOT NULL,
  `End_Meter` varchar(10) NOT NULL,
  `Start_Time` time NOT NULL,
  `End_Time` time NOT NULL,
  `Security_Deposit` int(10) NOT NULL,
  `Selected_Kms` int(11) NOT NULL,
  `Offer` double NOT NULL,
  `Amount` double NOT NULL,
  `Booking_Date` date DEFAULT NULL,
  `Status` enum('Current','Pending','Completed') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`Booking_Id`, `Email`, `Registration_No`, `City_Id`, `Start_Date`, `End_Date`, `Start_Meter`, `End_Meter`, `Start_Time`, `End_Time`, `Security_Deposit`, `Selected_Kms`, `Offer`, `Amount`, `Booking_Date`, `Status`) VALUES
('129380', '21bmiit064@gmail.com', 'GJ06TT7235', 8, '2023-12-08', '2023-12-11', '', '', '08:27:00', '07:27:00', 3000, 781, 0, 23306, '2023-12-07', 'Completed'),
('200515', '21bmiit064@gmail.com', 'GJ16PR8811', 5, '2024-04-17', '2024-04-18', '', '', '22:05:00', '22:05:00', 2000, 480, 0, 10640, '2024-04-15', 'Completed'),
('530079', '21bmiit123@gmail.com', 'GJ16KL9755', 7, '2023-11-21', '2023-11-22', '', '', '16:43:00', '16:43:00', 2000, 264, 0, 7280, '2023-11-07', 'Completed'),
('601655', 'pinal01@gmail.com', 'GJ16KL9755', 7, '2023-12-15', '2023-12-20', '', '', '12:20:00', '13:22:00', 2000, 1331, 0, 28620, '2023-12-09', 'Completed'),
('614181', 'pinal01@gmail.com', 'GJ01DS4434', 6, '2023-12-11', '2023-12-12', '', '', '11:00:00', '11:00:00', 3000, 264, 0, 9336, '2023-12-09', 'Completed'),
('652959', 'pinal01@gmail.com', 'GJ03SL2252', 5, '2023-12-09', '2023-12-11', '', '', '15:43:00', '13:47:00', 3000, 506, 0, 15650, '2023-12-09', 'Completed'),
('712850', '21bmiit064@gmail.com', 'GJ01DS4434', 6, '2023-11-08', '2023-11-09', '', '', '00:30:00', '20:30:00', 3000, 484, 0, 14616, '2023-11-05', 'Completed'),
('725173', 'tejasbadhiwala@gmail.com', 'GJ05ND8234', 5, '2023-11-08', '2023-11-09', '', '', '07:30:00', '08:40:00', 2000, 200, 0, 5200, '2023-11-06', 'Completed'),
('726060', '21bmiit064@gmail.com', 'GJ06TT7235', 8, '2024-03-26', '2024-03-27', '', '', '23:10:00', '17:14:00', 3000, 198, 0, 8148, '2024-03-11', 'Completed'),
('759245', '21bmiit064@gmail.com', 'GJ01DS4434', 6, '2023-11-07', '2023-11-09', '', '', '13:30:00', '15:30:00', 3000, 550, 0, 16200, '2023-11-07', 'Completed'),
('779864', '21bmiit064@gmail.com', 'GJ06VM8825', 8, '2023-11-14', '2023-11-15', '', '', '15:08:00', '11:12:00', 3000, 160, 0, 6360, '2023-11-07', 'Completed'),
('785228', '21bmiit064@gmail.com', 'GJ03SL2252', 5, '2023-12-21', '2023-12-26', '', '', '00:23:00', '02:26:00', 3000, 1342, 0, 36550, '2023-12-08', 'Completed'),
('922792', '21bmiit148@gmail.com', 'GJ01RS5577', 6, '2023-11-08', '2023-11-14', '', '', '16:00:00', '20:00:00', 3000, 1628, 0, 43700, '2023-11-06', 'Completed'),
('947295', 'bhumika.patel@utu.ac.in', 'GJ01RS5577', 6, '2023-11-10', '2023-11-15', '', '', '15:06:00', '15:07:00', 3000, 1320, 0, 36000, '2023-11-07', 'Completed'),
('952854', '21bmiit063@gmail.com', 'GJ03MG7856', 10, '2023-11-07', '2023-11-08', '', '', '00:45:00', '05:45:00', 3000, 319, 0, 10337, '2023-11-05', 'Completed'),
('964425', '21bmiit064@gmail.com', 'GJ01DS4434', 6, '2024-03-19', '2024-03-20', '', '', '18:05:00', '19:07:00', 3000, 200, 0, 7800, '2024-03-11', 'Completed'),
('964474', '21bmiit135@gmail.com', 'GJ03MG7878', 10, '2023-11-08', '2023-11-09', '', '', '11:00:00', '14:00:00', 2000, 297, 0, 7643, '2023-11-06', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `Registration_No` varchar(10) NOT NULL,
  `Name` varchar(40) DEFAULT NULL,
  `Brand` varchar(40) DEFAULT NULL,
  `ModelYear` varchar(4) DEFAULT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `City` varchar(20) DEFAULT NULL,
  `Category_Id` varchar(10) DEFAULT NULL,
  `Status` enum('Active','Deactive') DEFAULT NULL,
  `Hire_Cost` int(8) DEFAULT NULL,
  `Speed` varchar(30) DEFAULT NULL,
  `Policy_No` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`Registration_No`, `Name`, `Brand`, `ModelYear`, `Image`, `City`, `Category_Id`, `Status`, `Hire_Cost`, `Speed`, `Policy_No`) VALUES
('GJ01DS4434', 'A4', 'Audi', '2015', 'GJ01DS4434.jpg', 'Ahmedabad', 'CFV3243432', 'Active', 24, '13.8kpl - 17.3kpl', '12345678901'),
('GJ01RS5577', 'Jaguar Xm', 'Jaguar', '2023', 'GJ01RS5577.png', 'Ahmedabad', 'SEDAN4PM', 'Active', 25, '23.9kpl-24.8kpl', '98765432198'),
('GJ03MG7856', 'Seltos', 'Kia', '2020', 'GJ03MG7856.jpg', 'RAjkot', 'SUV4P3M', 'Active', 23, '23.1kpl-23.8kpl', '87632019732'),
('GJ03MG7878', 'Sonet', 'Kia', '2020', 'GJ03MG7878.jpeg', 'Rajkot', 'SUV4P3M', 'Active', 19, '22.5kpl-23.3kpl', '67890865431'),
('GJ03RB8006', 'Xuv700', 'Mahindra', '2023', 'GJ03RB8006.jpeg', 'Rajkot', 'SUV4P3M', 'Active', 20, '23.9kpl-24.8kpl', '12345678909'),
('GJ03SL2252', 'Creta', 'Hyundai', '2023', 'GJ03SL2252.webp', 'Surat', 'SUV4P3M', 'Active', 25, '22.5kpl-23.3kpl', '56789012340'),
('GJ03UL3398', 'Siaz', 'Suzuki', '2020', 'GJ03UL3398.jpeg', 'Rajkot', 'SEDAN4PM', 'Active', 18, '18.5kpl-20.3kpl', '56791238746'),
('GJ05BD3887', 'Avanti', 'DC', '2021', 'GJ05BD3887.jpg', 'Surat', 'CFV3243432', 'Active', 22, '13.8kpl - 17.3kpl', '12345634251'),
('GJ05ND8234', 'Compass', 'Jeep', '2014', 'GJ05ND8234.jpg', 'Surat', 'CFV3243432', 'Active', 16, '13.8kpl - 17.3kpl', '87654321094'),
('GJ06TT7235', 'BMW 5 series', 'BMW', '2022', 'GJ06TT7235.png', 'Vadodara', 'SEDAN4PM', 'Active', 26, '23.1kpl-23.8kpl', '89065321876'),
('GJ06VM8825', 'Range Rover', 'LandRover', '2022', 'GJ06VM8825.jpg', 'Vadodara', 'SUV4P3M', 'Active', 21, '23.3kpl-24.1kpl', '23450987123'),
('GJ16KL9755', 'Mercedes-Benz', 'Mercedes', '2019', 'GJ16KL9755.jpg', 'Bharuch', 'SEDAN4PM', 'Active', 20, '22.5kpl-23.3kpl', '23450987123'),
('GJ16PR8811', 'I20', 'Hyundai', '2022', 'GJ16PR8811.webp', 'Surat', 'CFV3243432', 'Active', 18, '18.5kpl-20.3kpl', '10982348762'),
('GJ16SD9912', 'Fronx', 'Suzuki', '2023', 'GJ16SD9912.webp', 'Bharuch', 'SUV4P3M', 'Active', 21, '23.9kpl-24.8kpl', '67892310872'),
('GJ16UL3421', 'Punch', 'TATA', '2021', 'GJ16UL3421.webp', 'Surat', 'CFV3243432', 'Active', 17, '16.5kpl-18.3kpl', '34509192873'),
('GJ27MG9988', 'Harrier', 'TATA', '2019', 'GJ27MG9988.jpg', 'Navsari', 'SUV4P3M', 'Active', 16, '20.5kpl-21.7kpl', '19286401927'),
('GJ27WD4578', 'Nexon ', 'TATA', '2020', 'GJ27WD4578.webp', 'Navsari', 'SUV4P3M', 'Active', 20, '23.1kpl-23.8kpl', '50198273641');

-- --------------------------------------------------------

--
-- Table structure for table `car_category`
--

CREATE TABLE `car_category` (
  `Category_Id` varchar(10) NOT NULL,
  `Category_Name` varchar(25) DEFAULT NULL,
  `Seats` enum('2','4','8') DEFAULT NULL,
  `Fuel` enum('Petrol','CNG','Diesel','Electric') DEFAULT NULL,
  `Transmission` enum('Manual','Automatic') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car_category`
--

INSERT INTO `car_category` (`Category_Id`, `Category_Name`, `Seats`, `Fuel`, `Transmission`) VALUES
('CFV3243432', 'Hatchback', '', 'Diesel', 'Manual'),
('MUV99876', 'MUV', '4', 'Petrol', 'Manual'),
('SEDAN4PM', 'Sedan', '4', 'Diesel', 'Manual'),
('SPORT99871', 'Sportcar', '2', 'Diesel', 'Automatic'),
('SUV4P3M', 'SUV', '4', 'Petrol', 'Automatic');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `City_Id` int(11) NOT NULL,
  `City` varchar(50) NOT NULL,
  `Address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`City_Id`, `City`, `Address`) VALUES
(5, 'Surat', 'Quick Car Hire, Sufi Baug, Mahidharpura, Begampura, Surat, Gujarat 395003.'),
(6, 'Ahmedabad ', 'Quick Car Hire, Gita Mandir Rd, Dharmyug Colony, Gita Mandir, Ahmedabad, Gujarat 380022.'),
(7, 'Bharuch', 'Quick Car Hire, Railway Station Rd, Moficer Compound, Bharuch, Gujarat 392001.'),
(8, 'Vadodara', 'Quick Car Hire, Near Maharaja Sayajirao University, Sayajiganj, Vadodara, Gujarat 390020'),
(10, 'Rajkot', 'Quick Car Hire, Indira Carcal, University Road, New Empire, Rajkot, Gujarat 360001.');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `Contact_Id` int(11) NOT NULL,
  `Name` varchar(40) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Subject` varchar(100) DEFAULT NULL,
  `Message` longtext DEFAULT NULL,
  `Status` enum('Unread','Read') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`Contact_Id`, `Name`, `Email`, `Subject`, `Message`, `Status`) VALUES
(8, 'Shivani', '21bmiit069@gmail.com', 'related to offer', 'please provide your offer', 'Read'),
(9, 'Anvi', 'anviutu@gmail.com', 'Quick car hire', 'inquiry about car', 'Read'),
(10, 'kashish rao', '21bmiit148@gmail.com', 'related to car', 'not clean at all', 'Unread'),
(12, 'Pinal', '21bmiit064@gmail.com', 'related to car', 'Blah Blah Blahh', 'Unread');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Name` varchar(40) DEFAULT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` char(32) DEFAULT NULL,
  `Mobile` varchar(10) DEFAULT NULL,
  `Date_Of_Birth` date DEFAULT NULL,
  `Driving_Licence` varchar(15) DEFAULT NULL,
  `AadharCard` varchar(12) DEFAULT NULL,
  `Image` varchar(255) NOT NULL,
  `Registration_Date` date DEFAULT NULL,
  `Status` enum('Active','Deactive') NOT NULL,
  `Expiration_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Name`, `Email`, `Password`, `Mobile`, `Date_Of_Birth`, `Driving_Licence`, `AadharCard`, `Image`, `Registration_Date`, `Status`, `Expiration_date`) VALUES
('Anvi Patel', '20bmiit081@gmail.com', '082db0d22c563f0fa178abf178f18df4', '7654381083', '2003-06-24', 'GJ6728368199283', '988643134256', 'Anvi Patel.png', '2023-11-04', 'Active', '0000-00-00'),
('Girish Suthar', '21bmiit063@gmail.com', '407853ce4d5fd70247ce5234e6a34004', '8976432690', '2003-06-01', 'HJ6790754212356', '895422095615', 'Girish.png', '2023-11-03', 'Active', '2005-11-02'),
('Pinal Rupavatiya', '21bmiit064@gmail.com', 'db0c44450b5635080c8d8cf95ee2c963', '8733030041', '2004-06-24', 'DL0987654321345', '789065432123', 'avtargirl.png\r\n', '2023-08-22', 'Active', '2030-05-17'),
('Pinal Rupavatiya', '21bmiit065@gmail.com', '566dd48ff73f5dd4616823addc987001', '9887655435', '2004-11-10', 'GJ1234567890987', '456723450987', 'Pinal Rupavatiya.png', '2023-11-04', 'Active', '0000-00-00'),
('Shivani Patel', '21bmiit069@gmail.com', '0e40c34d0c05fcfb9da599b57d5122a7', '9876543210', '2005-08-10', 'GJ1234456789009', '234567789890', 'Shivani Patel.png', '2023-08-31', 'Active', '0000-00-00'),
('Happy', '21bmiit123@gmail.com', '594a32c647c5b48f44ff18ddbc88c5e8', '9876543266', '2005-11-05', 'HJ6790754212377', '789065432344', 'Happy.jpeg', '2023-11-07', 'Active', '0000-00-00'),
('Happy Movaliya', '21bmiit135@gmail.com', '594a32c647c5b48f44ff18ddbc88c5e8', '9876543213', '2005-11-01', 'GJ8765432345678', '876512345987', 'Happy.png', '2023-11-06', 'Active', '2005-11-01'),
('kashish', '21bmiit148@gmail.com', '249bd2327caba0da1ffeb8cfb011ffbe', '9726435592', '2003-09-18', 'RK0987654321267', '848656532412', 'kashish.png', '2023-11-06', 'Active', '0000-00-00'),
('Bhumika Patel', 'bhumika.patel@utu.ac.in', '871a37e4ce0cfbc4fe5ffcd99cd1b787', '9876543277', '2005-11-02', 'GJ5565434678989', '456723450956', 'Bhumika Patel.txt', '2023-11-07', 'Active', '0000-00-00'),
('jinal', 'jinals530@gmail.com', '639aae868b2b6016811b701d7c0a35b4', '9726435592', '2004-01-07', 'GJ1234456789009', '234567789890', 'jinal.', '2023-11-02', 'Active', '2029-06-10'),
('Pinal Rupavatiya', 'pinal01@gmail.com', 'db0c44450b5635080c8d8cf95ee2c963', '8733030041', '2004-11-27', 'GJ9845321876432', '897643210976', 'Pinal Rupavatiya.png', '2023-12-08', 'Active', '2030-05-11'),
('Tejas Badhiwala', 'tejasbadhiwala@gmail.com', '15e8e7c72ea16ca290930fd7c4db760b', '8733030000', '2003-06-01', 'GJ6788543212345', '987234567987', 'Tejas Badhiwala.png', '2023-11-06', 'Active', '2030-06-26');

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE `offer` (
  `Code` varchar(10) NOT NULL,
  `Name` varchar(40) DEFAULT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `Percentage` int(2) DEFAULT NULL,
  `Start_Date` date DEFAULT NULL,
  `End_Date` date DEFAULT NULL,
  `Status` enum('Active','Deactive') DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offer`
--

INSERT INTO `offer` (`Code`, `Name`, `Image`, `Percentage`, `Start_Date`, `End_Date`, `Status`) VALUES
('DTO8888', 'Dhan Teras Offer', 'DTO8888.jpeg', 22, '2023-11-03', '2023-11-10', 'Deactive'),
('DWL2023', 'Diwali offer', 'DWL2023.jpeg', 25, '2023-10-31', '2023-11-15', 'Deactive');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `Page_id` int(8) NOT NULL,
  `Page_name` varchar(150) DEFAULT NULL,
  `Page_type` varchar(150) DEFAULT NULL,
  `Page_details` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`Page_id`, `Page_name`, `Page_type`, `Page_details`) VALUES
(1, 'Terms and Conditions', 'terms', '<p><strong>(1) ACCEPTANCE OF TERMS</strong><br>Welcome to Rent N Ride! provide you the car at your services: legal terms n condition for booking a car Renters must use the vehicle only for personal use, adhere to traffic laws, and not use the vehicle for any illegal activities or transportation of hazardous materials. Users must make a reservation and provide accurate payment information. Charges may include rental fees, taxes, and additional service. Vehicle Return: Renters must return the vehicle at the agreed-upon time and location. Late returns may incur additional fees. Privacy policy the company\'s negligence. The system should include a privacy policy outlining how customer data is collected, used, and protected. the vehicle can be booked for a week if need for more than again car registration is needed. legal documentation soft copy should be submited at the time of pick up.</p>'),
(5, 'ABOUT US', 'ABOUT', '<h2><strong>Welcome to Rent N Ride </strong></h2><p>Welcome to the world of the car [RENT N RIDE] we are here for your service. Explore the car and take the advantages of the offer the luxurious car on few tap. its a small car branch which provide serval car in rent for making trip and enjoy the day with our dream car. we are giving wheels to your dream book now for more vulnerable experience and future plans  </p>');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentId` varchar(100) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `bookingId` varchar(10) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `paymentDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentId`, `Email`, `bookingId`, `amount`, `paymentDate`) VALUES
('pay_Mwpkz2vtTVN9Od', '21bmiit064@gmail.com', '712850', '14616.00', '2023-11-05 14:58:30'),
('pay_Mx4ZNOIMAKt8wJ', '21bmiit135@gmail.com', '964474', '7643.00', '2023-11-06 05:27:55'),
('pay_Mx7iMr8FBmEOLC', '21bmiit148@gmail.com', '922792', '43700.00', '2023-11-06 08:32:30'),
('pay_MxSaQcBdnpzR4v', '21bmiit064@gmail.com', '759245', '16200.00', '2023-11-07 04:57:34'),
('pay_MxTMl33QTcQeWf', '21bmiit064@gmail.com', '779864', '6360.00', '2023-11-07 05:43:19'),
('pay_MxTohsS8VXcyvu', '21bmiit123@gmail.com', '530079', '7280.00', '2023-11-07 06:09:50'),
('pay_MxUEsKlHptt6fu', 'bhumika.patel@utu.ac.in', '947295', '36000.00', '2023-11-07 06:34:35'),
('pay_N9uHcc7AQir5qQ', '21bmiit064@gmail.com', '785228', '36550.00', '2023-12-08 15:51:12'),
('pay_N9Zs4ekwBbsOAA', '21bmiit064@gmail.com', '129380', '23306.00', '2023-12-07 19:53:09'),
('pay_NA7wlQ0NDGqyXt', 'pinal01@gmail.com', '652959', '15650.00', '2023-12-09 05:13:10'),
('pay_NA9GmHxxOJpGyw', 'pinal01@gmail.com', '614181', '9336.00', '2023-12-09 06:30:52'),
('pay_Nl03edoEc1RbBd', '21bmiit064@gmail.com', '964425', '7800.00', '2024-03-11 09:33:19'),
('pay_Nl2F4uPcft7y9H', '21bmiit064@gmail.com', '726060', '8148.00', '2024-03-11 11:41:30'),
('pay_NytqvOnlrCmkBx', '21bmiit064@gmail.com', '200515', '10640.00', '2024-04-15 12:35:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`Booking_Id`),
  ADD KEY `Email` (`Email`),
  ADD KEY `Registration_No` (`Registration_No`),
  ADD KEY `City_Id` (`City_Id`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`Registration_No`),
  ADD KEY `Category_id` (`Category_Id`);

--
-- Indexes for table `car_category`
--
ALTER TABLE `car_category`
  ADD PRIMARY KEY (`Category_Id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`City_Id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`Contact_Id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`Code`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`Page_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentId`),
  ADD KEY `Email` (`Email`),
  ADD KEY `bookingId` (`bookingId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `City_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `Contact_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `Page_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `Email` FOREIGN KEY (`Email`) REFERENCES `customer` (`Email`),
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`Registration_No`) REFERENCES `car` (`Registration_No`);

--
-- Constraints for table `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `car_ibfk_1` FOREIGN KEY (`Category_Id`) REFERENCES `car_category` (`Category_Id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`Email`) REFERENCES `customer` (`Email`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`bookingId`) REFERENCES `booking` (`Booking_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
