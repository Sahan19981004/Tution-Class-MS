-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2021 at 06:30 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tuition_center`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `a_username` varchar(50) NOT NULL,
  `a_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `a_username`, `a_password`) VALUES
(1, 'admin', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `att_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `present` tinyint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `complaint_recom`
--

CREATE TABLE `complaint_recom` (
  `complaint_id` int(10) NOT NULL,
  `title` varchar(200) NOT NULL,
  `complaint` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaint_recom`
--

INSERT INTO `complaint_recom` (`complaint_id`, `title`, `complaint`) VALUES
(1, '', 'I like this tuition center classes....'),
(2, '', 'I like this tuition center classes....');

-- --------------------------------------------------------

--
-- Table structure for table `payment_slip`
--

CREATE TABLE `payment_slip` (
  `invoice_no` varchar(50) NOT NULL,
  `name` varchar(150) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `student_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `subject_id` int(10) NOT NULL,
  `subject_name` varchar(150) NOT NULL,
  `grade` char(10) NOT NULL,
  `academic_year` year(4) NOT NULL,
  `student_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`subject_id`, `subject_name`, `grade`, `academic_year`, `student_id`) VALUES
(4, 'Economics', 'A', 2021, 29),
(5, 'Maths', 'B', 2021, 30),
(7, 'Maths', 'C', 2021, 29);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(10) NOT NULL,
  `firstname` varchar(150) NOT NULL,
  `lastname` varchar(150) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(150) NOT NULL,
  `dob` date NOT NULL,
  `subject` varchar(150) NOT NULL,
  `academic_year` year(4) NOT NULL,
  `tp_number` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `s_username` varchar(50) NOT NULL,
  `s_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `firstname`, `lastname`, `gender`, `address`, `dob`, `subject`, `academic_year`, `tp_number`, `email`, `s_username`, `s_password`) VALUES
(20, 'Ram', 'Kumar', 'Male', '122,Main Street,Badulla', '2001-02-01', 'Maths', 2021, '0721212121', 'ram3@gmail.com', 'ram', '1234'),
(22, 'Nimal', 'Perera', 'Male', '12,mn st,badulla', '2002-03-03', 'Maths', 2018, '0111111113', 'ase@kbn.com', 'nimal', '123'),
(23, 'kavindu', 'presenna', 'Male', '190,nm,clmbo', '2002-04-04', 'Maths', 2017, '0757757576', 'vidhya@gmail.com', 'kavin', '12345'),
(24, 'Lahiru', 'Vimal', 'Male', '144, 1st street, Negombo', '2003-01-09', 'Maths', 2017, '0781234567', 'lahiru1@yahoo.com', 'lahiru', '4321'),
(27, 'kavindhu', 'prasadh', 'Male', '34, main street,\r\nbaththeremulla,\r\ngalle.\r\n', '2002-07-24', 'maths', 2017, '0281828364', 'prasadh@gmail.com', 'prasadh', '1234'),
(28, 'a', 'w', 'Male', '1we', '2021-08-10', 'y', 2017, '3456789086', '2@gmail.com', 's', '1234'),
(29, 'vijaya', 'kala', 'Female', '234, passara road, badulla.', '2003-06-30', 'tamil', 2016, '0655081327', 'kala@gmai.com', 'kala', '1234'),
(31, '', '', '', '', '0000-00-00', '', 0000, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` varchar(10) NOT NULL,
  `firstname` varchar(150) NOT NULL,
  `lastname` varchar(150) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(150) NOT NULL,
  `dob` date NOT NULL,
  `academic_year` year(4) NOT NULL,
  `tp_number` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `s_username` varchar(50) NOT NULL,
  `s_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` varchar(5) NOT NULL,
  `subject_name` varchar(150) NOT NULL,
  `subject_fee` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject_name`, `subject_fee`) VALUES
('01ACC', 'Accounting', '1200.00'),
('02BST', 'Business Studies', '1000.00'),
('03ECO', 'Economics', '1000.00'),
('04ICT', 'Information and Communication Technology', '1300.00'),
('04SCI', 'Science', '1500.00'),
('05MTS', 'Mathemeticts', '1300.00');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(10) NOT NULL,
  `subject_name` varchar(150) NOT NULL,
  `subject_fee` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `subject_name`, `subject_fee`) VALUES
(3, 'Science', '1200.00'),
(4, 'Economics', '1000.00'),
(5, 'Maths', '900.00'),
(6, 'English', '700.00'),
(9, 'ict', '1000.00');

-- --------------------------------------------------------

--
-- Table structure for table `subjects_fee`
--

CREATE TABLE `subjects_fee` (
  `invoice_no` int(50) NOT NULL,
  `subject_fee` decimal(10,2) NOT NULL,
  `paid_amount` decimal(10,2) NOT NULL,
  `date` int(11) NOT NULL,
  `subject_id` int(10) NOT NULL,
  `student_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subject_student`
--

CREATE TABLE `subject_student` (
  `subject_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject_student`
--

INSERT INTO `subject_student` (`subject_id`, `student_id`) VALUES
(3, 20),
(4, 20),
(5, 20),
(4, 22),
(5, 22),
(6, 22),
(3, 23),
(5, 23),
(6, 23),
(3, 24),
(4, 24),
(6, 24),
(3, 27),
(4, 27),
(5, 27),
(4, 29),
(5, 31),
(5, 29),
(5, 29),
(6, 31),
(9, 31);

-- --------------------------------------------------------

--
-- Table structure for table `subject_teacher`
--

CREATE TABLE `subject_teacher` (
  `subject_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject_teacher`
--

INSERT INTO `subject_teacher` (`subject_id`, `teacher_id`) VALUES
(3, 35),
(4, 36),
(5, 31),
(6, 34);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(10) NOT NULL,
  `firstname` varchar(150) NOT NULL,
  `lastname` varchar(150) NOT NULL,
  `subject` varchar(150) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(150) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(150) NOT NULL,
  `tp_number` varchar(10) NOT NULL,
  `t_username` varchar(50) NOT NULL,
  `t_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `firstname`, `lastname`, `subject`, `gender`, `address`, `dob`, `email`, `tp_number`, `t_username`, `t_password`) VALUES
(31, 'Jeya', 'Malini', 'Maths', 'Female', '12,Cross Street, Colombo', '2001-02-20', 'ase@gmail.com', '0757757123', 'jeya', '1234'),
(34, 'Jagan', 'ramu', 'English', 'Male', '129,main Street,Badulla.', '1991-02-02', 'ase@vbn.com', '0111111112', 'jagan', '1234'),
(35, 'kavindu', 'presenna', 'Science', 'Male', '22,main street,Kandy', '1989-06-23', 'kavi2@gmail.com', '0757757576', 'kavindu', '1234'),
(36, 'vidhya', 'laksmi', 'Economics', 'Female', '07, school road, jaffna', '1993-01-14', 'vidhya@gmail.com', '095412345', 'vidhya', '1234'),
(38, 'shanthi', 'kumar', 'History', 'Female', '67,mn, colombo.\r\n', '1998-12-12', 'shanthi@gmail.com', '0643213567', 'shanthi', '1234'),
(47, 'meena', 'kumari', 'Tamil', 'Female', '123, main raod,\r\ncolombo\r\n\r\n\r\n', '1990-08-23', 'kumari@gmail.com', '0111111999', 'kumari', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `time_table`
--

CREATE TABLE `time_table` (
  `time_table_id` int(10) NOT NULL,
  `time_table_desc` varchar(150) NOT NULL,
  `academic_year` year(4) NOT NULL,
  `day` varchar(10) NOT NULL,
  `time` time NOT NULL,
  `subject_id` int(10) NOT NULL,
  `teacher_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `a_username` (`a_username`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`att_id`);

--
-- Indexes for table `complaint_recom`
--
ALTER TABLE `complaint_recom`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `payment_slip`
--
ALTER TABLE `payment_slip`
  ADD PRIMARY KEY (`invoice_no`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `s_username` (`s_username`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `tp_number` (`tp_number`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `s_username` (`s_username`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `subjects_fee`
--
ALTER TABLE `subjects_fee`
  ADD PRIMARY KEY (`invoice_no`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`),
  ADD UNIQUE KEY `tp_number` (`tp_number`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `t_username` (`t_username`);

--
-- Indexes for table `time_table`
--
ALTER TABLE `time_table`
  ADD PRIMARY KEY (`time_table_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `complaint_recom`
--
ALTER TABLE `complaint_recom`
  MODIFY `complaint_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `time_table`
--
ALTER TABLE `time_table`
  MODIFY `time_table_id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
