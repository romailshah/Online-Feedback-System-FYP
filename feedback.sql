-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2021 at 09:15 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `feedback`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_no` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `status`, `created_no`) VALUES
(3, 'admin', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', '2020-06-14 13:38:09');

-- --------------------------------------------------------

--
-- Table structure for table `assign_teacher`
--

CREATE TABLE `assign_teacher` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `semester` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `assign_test`
--

CREATE TABLE `assign_test` (
  `id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `semester` varchar(50) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign_test`
--

INSERT INTO `assign_test` (`id`, `test_id`, `class_id`, `semester`, `teacher_id`) VALUES
(57, 6, 5, '1st', 9),
(58, 6, 5, '1st', 10),
(59, 6, 6, '6th', 10),
(60, 6, 6, '8th', 9),
(61, 6, 6, '7th', 9),
(62, 6, 6, '6th', 9);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `c_name`, `created_on`) VALUES
(5, 'BSIT', '2020-07-16 21:24:03'),
(6, 'BSCS', '2020-09-28 03:50:50');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reg_no` varchar(100) NOT NULL,
  `class_id` int(11) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `session` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `password`, `reg_no`, `class_id`, `semester`, `session`, `status`, `created_on`) VALUES
(14, 'Zain Aslam', 'zainaslam849@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'BSIT 023R16-86', 5, '1st', '2016-2020', '1', '2020-09-23 17:22:08'),
(15, 'Jamal Ahmad', 'jamal@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'BSIT 023R16-90', 5, '2nd', '2016-2020', '1', '2020-09-23 17:22:55'),
(16, 'Fahad Mansoor', 'Fahad@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'BSIT 023R16-93', 5, '1st', '2016-2020', '1', '2020-09-23 17:23:29'),
(17, 'Ali Raza', 'ali@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'BSIT 023R16-84', 5, '1st', '2016-2020', '1', '2020-09-24 14:41:32'),
(18, 'Tariq Maqsood', 'tariq@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'BSIT 023R16-93', 5, '1st', '2016-2020', '1', '2020-09-29 07:14:17'),
(19, 'Rameez Faheem', 'rameez@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'BSIT 023R16-93', 5, '1st', '2016-2020', '1', '2020-09-29 07:15:41'),
(20, 'Waleed Bhinder', 'waleed@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'BSIT 023R16-81', 5, '1st', '2016-2020', '1', '2020-09-29 07:16:18'),
(21, 'Danish Durani', 'danish@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'BSIT 023R16-64', 5, '1st', '2016-2020', '1', '2020-09-29 07:16:55'),
(22, 'Ahmad Saleem', 'ahmad@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'BSIT 023R16-73', 5, '1st', '2016-2020', '1', '2020-09-29 07:17:46'),
(23, 'Nasir Akram', 'nasir@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'BSIT 023R16-72', 5, '1st', '2016-2020', '1', '2020-09-29 07:18:41'),
(24, 'Dildar Ahmad', 'dildar@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'BSIT 023R16-09', 5, '8th', '2016-2020', '1', '2020-09-29 07:19:42'),
(25, 'Asad Qureshi', 'asad@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'BSIT 023R16-10', 5, '8th', '2015-2019', '1', '2020-09-29 07:20:20'),
(26, 'Hammad Malik', 'hammad@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'BSIT 023R16-12', 5, '8th', '2015-2019', '1', '2020-09-29 07:20:55'),
(27, 'Raja Ahtesham', 'raja@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'BSIT 023R16-13', 5, '8th', '2015-2019', '1', '2020-09-29 07:21:52'),
(34, 'inzamam Balouch', 'inzamam@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'BSCS 023R16-01', 6, '6th', '2016-2020', '1', '2020-10-05 03:32:40'),
(35, 'Saaud Iqbal', 'Saaud@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'BSCS 023R16-02', 6, '6th', '2016-2020', '1', '2020-10-05 03:33:17'),
(36, 'Ameer ul Azeem', 'ameer@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'BSCS 023R16-03', 6, '6th', '2016-2020', '1', '2020-10-05 03:35:55'),
(37, 'Abu Bakar', 'abubakar@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'BSCS 023R16-05', 6, '6th', '2016-2020', '1', '2020-10-05 03:36:46'),
(38, 'Mohsin Malik', 'mohsin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'BSCS 023R16-06', 6, '6th', '2016-2020', '1', '2020-10-05 03:37:58'),
(39, 'intsamUllah Baloch', 'intisam@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'BSCS 023R16-07', 6, '6th', '2016-2020', '1', '2020-10-05 03:39:24'),
(40, 'Faizan Bashir', 'faizan@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'BSIT 023R16-33', 5, '8th', '2016-2020', '1', '2020-10-05 04:10:28'),
(41, 'Adil Bashir', 'adil@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'BSIT 023R16-33', 5, '8th', '2016-2020', '1', '2020-10-05 04:11:57'),
(42, 'Usman Tariq', 'usman@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'BSIT 023R16-34', 5, '8th', '2016-2020', '1', '2020-10-05 04:12:39'),
(43, 'Rizwan Faqeer', 'rizwan@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'BSIT 023R16-35', 5, '8th', '2016-2020', '1', '2020-10-05 04:13:26'),
(44, 'irfan Faqeer', 'irfan@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'BSIT 023R16-36', 5, '8th', '2016-2020', '1', '2020-10-05 04:14:40'),
(45, 'Tasleem Waqar', 'tasleem@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'BSIT 023R16-37', 5, '8th', '2016-2020', '1', '2020-10-05 04:15:18'),
(46, 'Omer Aslam', 'omer@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'BSIT 023R16-37', 5, '8th', '2016-2020', '1', '2020-10-05 04:16:22'),
(47, 'Taiyab Akram', 'taiyab@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'BSIT 023R16-39', 5, '8th', '2016-2020', '1', '2020-10-05 04:24:26'),
(48, 'Amir Quershi', 'amir@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'BSCS 023R16-30', 6, '6th', '2016-2020', '1', '2020-10-05 04:25:34'),
(49, 'waseem Abbas', 'waseem@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'BSCS 023R16-31', 6, '6th', '2016-2020', '1', '2020-10-05 04:26:31'),
(50, 'Ghulam Shahber', 'ghulam@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'BSCS 023R16-32', 6, '6th', '2016-2020', '1', '2020-10-05 04:27:08'),
(51, 'Mubashir Mughal', 'mubashir@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'BSCS 023R16-33', 6, '6th', '2016-2020', '1', '2020-10-05 04:27:54'),
(52, 'Uneeb Ahmad', 'uneeb@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'BSIT 023R16-100', 5, '1st', '2016-2020', '1', '2020-10-11 05:06:45'),
(54, 'Syed Romail Ali Shah', 'romailshah2@gmail.com', 'c7f2f6a553bb625a7ac50b7e2f858850', '2K17-BSCS-101', 6, '8th', '2017-2021', '1', '2021-05-19 14:20:19'),
(55, 'Demo Student', 'demo@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2K17-BSCS-100', 6, '7th', '2018-2022', '1', '2021-05-20 16:42:17');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reg_no` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `department` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `email`, `password`, `reg_no`, `status`, `department`) VALUES
(9, 'Saif Ur Rehman ', 'Saifurrehman@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '198765', 1, 'Computer Science'),
(10, 'kanwar Kaleem Humayiun', 'kanwar@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0987655', 1, 'Computer Science'),
(11, 'Muneeb Ahmad Khan', 'Muneeb@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '224845', 1, 'Mechanical');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `name`, `created_on`) VALUES
(6, 'BSCS Survey', '2020-09-28 03:50:41');

-- --------------------------------------------------------

--
-- Table structure for table `test_questions`
--

CREATE TABLE `test_questions` (
  `id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `options` varchar(255) NOT NULL,
  `points` varchar(200) DEFAULT NULL,
  `total_points` int(11) DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_questions`
--

INSERT INTO `test_questions` (`id`, `test_id`, `question`, `options`, `points`, `total_points`, `created_on`) VALUES
(58, 6, 'The course content was relevant to subject', '{\"option1\":\"Strongly Agree\",\"option2\":\"Agree\",\"option3\":\"Neutral\",\"option4\":\"Disagree\"}', '{\"p_option1\":\"3\",\"p_option2\":\"2\",\"p_option3\":\"1\",\"p_option4\":0}', 3, '2020-09-28 03:51:24'),
(59, 6, 'The course content was easy to understand.', '{\"option1\":\"Strongly Agree\",\"option2\":\"Agree\",\"option3\":\"Neutral\",\"option4\":\"Disagree\"}', '{\"p_option1\":\"3\",\"p_option2\":\"2\",\"p_option3\":\"1\",\"p_option4\":0}', 3, '2020-09-28 03:51:51'),
(60, 6, 'Course content was challenging', '{\"option1\":\"Strongly Agree\",\"option2\":\"Agree\",\"option3\":\"Neutral\",\"option4\":\"Disagree\"}', '{\"p_option1\":\"3\",\"p_option2\":\"2\",\"p_option3\":\"1\",\"p_option4\":0}', 3, '2020-09-28 03:52:13'),
(61, 6, 'The course has made me very interested in further studies in this subject', '{\"option1\":\"Strongly Agree\",\"option2\":\"Agree\",\"option3\":\"Neutral\",\"option4\":\"Disagree\"}', '{\"p_option1\":\"3\",\"p_option2\":\"2\",\"p_option3\":\"1\",\"p_option4\":0}', 3, '2020-09-28 03:52:38'),
(62, 6, 'Teacher is punctual', '{\"option1\":\"Strongly Agree\",\"option2\":\"Agree\",\"option3\":\"Neutral\",\"option4\":\"Disagree\"}', '{\"p_option1\":\"3\",\"p_option2\":\"2\",\"p_option3\":\"1\",\"p_option4\":0}', 3, '2020-09-28 03:53:05'),
(63, 6, 'Teacher is knowledgeable about the subject', '{\"option1\":\"Strongly Agree\",\"option2\":\"Agree\",\"option3\":\"Neutral\",\"option4\":\"Disagree\"}', '{\"p_option1\":\"3\",\"p_option2\":\"2\",\"p_option3\":\"1\",\"p_option4\":0}', 3, '2020-09-28 03:53:27'),
(64, 6, ' Teacher has clear presentation', '{\"option1\":\"Strongly Agree\",\"option2\":\"Agree\",\"option3\":\"Neutral\",\"option4\":\"Disagree\"}', '{\"p_option1\":\"3\",\"p_option2\":\"2\",\"p_option3\":\"1\",\"p_option4\":0}', 3, '2020-09-28 03:53:47'),
(65, 6, 'Teacher motivates for learning', '{\"option1\":\"Strongly Agree\",\"option2\":\"Agree\",\"option3\":\"Neutral\",\"option4\":\"Disagree\"}', '{\"p_option1\":\"3\",\"p_option2\":\"2\",\"p_option3\":\"1\",\"p_option4\":0}', 3, '2020-09-28 03:54:13'),
(66, 6, 'Teacher is available and helpful during scheduled office hours', '{\"option1\":\"Strongly Agree\",\"option2\":\"Agree\",\"option3\":\"Neutral\",\"option4\":\"Disagree\"}', '{\"p_option1\":\"3\",\"p_option2\":\"2\",\"p_option3\":\"1\",\"p_option4\":0}', 3, '2020-09-28 03:54:37'),
(67, 6, 'Teacher provides guidance and counseling properly', '{\"option1\":\"Strongly Agree\",\"option2\":\"Agree\",\"option3\":\"Neutral\",\"option4\":\"Disagree\"}', '{\"p_option1\":\"3\",\"p_option2\":\"2\",\"p_option3\":\"1\",\"p_option4\":0}', 3, '2020-09-28 03:56:34'),
(68, 6, 'Teacher does not discriminate amongst students', '{\"option1\":\"Strongly Agree\",\"option2\":\"Agree\",\"option3\":\"Neutral\",\"option4\":\"Disagree\"}', '{\"p_option1\":\"3\",\"p_option2\":\"2\",\"p_option3\":\"1\",\"p_option4\":0}', 3, '2020-09-28 03:57:00'),
(69, 6, ' Teacher encourages students participation', '{\"option1\":\"Strongly Agree\",\"option2\":\"Agree\",\"option3\":\"Neutral\",\"option4\":\"Disagree\"}', '{\"p_option1\":\"3\",\"p_option2\":\"2\",\"p_option3\":\"1\",\"p_option4\":0}', 3, '2020-09-28 03:57:31'),
(70, 6, 'Teacher uses variety of instructional methods', '{\"option1\":\"Strongly Agree\",\"option2\":\"Agree\",\"option3\":\"Neutral\",\"option4\":\"Disagree\"}', '{\"p_option1\":\"3\",\"p_option2\":\"2\",\"p_option3\":\"1\",\"p_option4\":0}', 3, '2020-09-28 03:57:55'),
(71, 6, 'Teacher Motivates for learning. Encourages to Library/Internet/Articles resources.', '{\"option1\":\"Strongly Agree\",\"option2\":\"Agree\",\"option3\":\"Neutral\",\"option4\":\"Disagree\"}', '{\"p_option1\":\"3\",\"p_option2\":\"2\",\"p_option3\":\"1\",\"p_option4\":0}', 3, '2020-09-28 03:58:22'),
(72, 6, 'Teacher gives citations regarding current situations with reference to Pakistani context', '{\"option1\":\"Strongly Agree\",\"option2\":\"Agree\",\"option3\":\"Neutral\",\"option4\":\"Disagree\"}', '{\"p_option1\":\"3\",\"p_option2\":\"2\",\"p_option3\":\"1\",\"p_option4\":0}', 3, '2020-09-28 03:58:52'),
(73, 6, 'Teacher follows schedule of quizzes/assignments strictly', '{\"option1\":\"Strongly Agree\",\"option2\":\"Agree\",\"option3\":\"Neutral\",\"option4\":\"Disagree\"}', '{\"p_option1\":\"3\",\"p_option2\":\"2\",\"p_option3\":\"1\",\"p_option4\":0}', 3, '2020-09-28 03:59:14'),
(74, 6, 'Teacher provides feedback of quizzes/assignments promptly', '{\"option1\":\"Strongly Agree\",\"option2\":\"Agree\",\"option3\":\"Neutral\",\"option4\":\"Disagree\"}', '{\"p_option1\":\"3\",\"p_option2\":\"2\",\"p_option3\":\"1\",\"p_option4\":0}', 3, '2020-09-28 03:59:37'),
(75, 6, 'Teacher is fair in grading', '{\"option1\":\"Strongly Agree\",\"option2\":\"Agree\",\"option3\":\"Neutral\",\"option4\":\"Disagree\"}', '{\"p_option1\":\"3\",\"p_option2\":\"2\",\"p_option3\":\"1\",\"p_option4\":0}', 3, '2020-09-28 04:00:04'),
(76, 6, 'Teacher is concerned about the student progress', '{\"option1\":\"Strongly Agree\",\"option2\":\"Agree\",\"option3\":\"Neutral\",\"option4\":\"Disagree\"}', '{\"p_option1\":\"3\",\"p_option2\":\"2\",\"p_option3\":\"1\",\"p_option4\":0}', 3, '2020-09-28 04:00:28'),
(77, 6, 'My thinking skills (Analytical and Critical) and communication have improved', '{\"option1\":\"Strongly Agree\",\"option2\":\"Agree\",\"option3\":\"Neutral\",\"option4\":\"Disagree\"}', '{\"p_option1\":\"3\",\"p_option2\":\"2\",\"p_option3\":\"1\",\"p_option4\":0}', 3, '2020-09-28 04:00:54'),
(78, 6, 'I felt encouraged to participate in class', '{\"option1\":\"Strongly Agree\",\"option2\":\"Agree\",\"option3\":\"Neutral\",\"option4\":\"Disagree\"}', '{\"p_option1\":\"3\",\"p_option2\":\"2\",\"p_option3\":\"1\",\"p_option4\":0}', 3, '2020-09-28 04:01:16'),
(79, 6, 'Subject matter has increased my knowledge', '{\"option1\":\"Strongly Agree\",\"option2\":\"Agree\",\"option3\":\"Neutral\",\"option4\":\"Disagree\"}', '{\"p_option1\":\"3\",\"p_option2\":\"2\",\"p_option3\":\"1\",\"p_option4\":0}', 3, '2020-09-28 04:01:40'),
(80, 6, 'Library and computing facilities are sufficient', '{\"option1\":\"Strongly Agree\",\"option2\":\"Agree\",\"option3\":\"Neutral\",\"option4\":\"Disagree\"}', '{\"p_option1\":\"3\",\"p_option2\":\"2\",\"p_option3\":\"1\",\"p_option4\":0}', 3, '2020-09-28 04:02:01'),
(81, 6, 'Student LMS is good', '{\"option1\":\"Strongly Agree\",\"option2\":\"Agree\",\"option3\":\"Neutral\",\"option4\":\"Disagree\"}', '{\"p_option1\":\"3\",\"p_option2\":\"2\",\"p_option3\":\"1\",\"p_option4\":0}', 3, '2020-09-28 04:02:23');

-- --------------------------------------------------------

--
-- Table structure for table `test_result`
--

CREATE TABLE `test_result` (
  `id` int(11) NOT NULL,
  `total_points` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_result`
--

INSERT INTO `test_result` (`id`, `total_points`, `test_id`, `user_id`, `teacher_id`, `created_on`) VALUES
(6, 6, 6, 14, 9, '2020-10-21 23:31:15'),
(7, 13, 6, 16, 9, '2020-10-21 23:32:46'),
(8, 38, 6, 54, 9, '2021-05-19 14:21:08'),
(9, 45, 6, 55, 9, '2021-05-20 16:43:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_teacher`
--
ALTER TABLE `assign_teacher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `assign_test`
--
ALTER TABLE `assign_test`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test_id` (`test_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `program_id` (`class_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_questions`
--
ALTER TABLE `test_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test_questions_ibfk_1` (`test_id`);

--
-- Indexes for table `test_result`
--
ALTER TABLE `test_result`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test_id` (`test_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `assign_teacher`
--
ALTER TABLE `assign_teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `assign_test`
--
ALTER TABLE `assign_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `test_questions`
--
ALTER TABLE `test_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `test_result`
--
ALTER TABLE `test_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assign_teacher`
--
ALTER TABLE `assign_teacher`
  ADD CONSTRAINT `assign_teacher_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `class` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assign_teacher_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `assign_test`
--
ALTER TABLE `assign_test`
  ADD CONSTRAINT `assign_test_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `tests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assign_test_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `class` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `class` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `test_questions`
--
ALTER TABLE `test_questions`
  ADD CONSTRAINT `test_questions_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `tests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `test_result`
--
ALTER TABLE `test_result`
  ADD CONSTRAINT `test_result_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `tests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test_result_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
