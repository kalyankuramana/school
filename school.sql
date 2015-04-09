-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2015 at 03:43 AM
-- Server version: 5.5.27
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`admin_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL,
  `level` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `email`, `password`, `level`) VALUES
(1, 'Mr. Admin', 'admin', '1234', '1');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE IF NOT EXISTS `book` (
`book_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `author` longtext COLLATE utf8_unicode_ci NOT NULL,
  `class_id` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` longtext COLLATE utf8_unicode_ci NOT NULL,
  `price` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `name`, `description`, `author`, `class_id`, `status`, `price`) VALUES
(2, 'dda', 'SS', 'SS', '3', 'available', '34'),
(3, 'A', 'abc', 'XYZ', '3', 'available', '500');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE IF NOT EXISTS `class` (
`class_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `name_numeric` longtext COLLATE utf8_unicode_ci NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `name`, `name_numeric`, `teacher_id`) VALUES
(3, '12A', '12', 1),
(4, '11A', '11', 2),
(5, '10C', '10', 2);

-- --------------------------------------------------------

--
-- Table structure for table `class_routine`
--

CREATE TABLE IF NOT EXISTS `class_routine` (
`class_routine_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `time_start` int(11) NOT NULL,
  `time_end` int(11) NOT NULL,
  `day` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `class_routine`
--

INSERT INTO `class_routine` (`class_routine_id`, `class_id`, `subject_id`, `time_start`, `time_end`, `day`) VALUES
(1, 3, 2, 2, 4, 'monday');

-- --------------------------------------------------------

--
-- Table structure for table `dormitory`
--

CREATE TABLE IF NOT EXISTS `dormitory` (
`dormitory_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `number_of_room` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dormitory`
--

INSERT INTO `dormitory` (`dormitory_id`, `name`, `number_of_room`, `description`) VALUES
(1, '23', '2', 'SFS');

-- --------------------------------------------------------

--
-- Table structure for table `email_template`
--

CREATE TABLE IF NOT EXISTS `email_template` (
`email_template_id` int(11) NOT NULL,
  `task` longtext COLLATE utf8_unicode_ci NOT NULL,
  `subject` longtext COLLATE utf8_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE IF NOT EXISTS `exam` (
`exam_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date` longtext COLLATE utf8_unicode_ci NOT NULL,
  `comment` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`exam_id`, `name`, `date`, `comment`) VALUES
(1, 'pre', '05/31/2014', 'mandi');

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE IF NOT EXISTS `grade` (
`grade_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `grade_point` longtext COLLATE utf8_unicode_ci NOT NULL,
  `mark_from` int(11) NOT NULL,
  `mark_upto` int(11) NOT NULL,
  `comment` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`grade_id`, `name`, `grade_point`, `mark_from`, `mark_upto`, `comment`) VALUES
(1, 'Ex', '10', 90, 100, 'excellent'),
(2, 'A', '9', 70, 90, '');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
`invoice_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `creation_timestamp` int(11) NOT NULL,
  `payment_timestamp` longtext COLLATE utf8_unicode_ci NOT NULL,
  `payment_method` longtext COLLATE utf8_unicode_ci NOT NULL,
  `payment_details` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'paid or unpaid'
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `student_id`, `title`, `description`, `amount`, `creation_timestamp`, `payment_timestamp`, `payment_method`, `payment_details`, `status`) VALUES
(1, 3, '', '', 0, 0, '', '', '', 'paid'),
(2, 2, '', '', 0, 0, '', '', '', 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE IF NOT EXISTS `language` (
`phrase_id` int(11) NOT NULL,
  `phrase` longtext COLLATE utf8_unicode_ci NOT NULL,
  `english` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=219 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`phrase_id`, `phrase`, `english`) VALUES
(1, 'login', ''),
(2, 'account_type', ''),
(3, 'admin', ''),
(4, 'teacher', ''),
(5, 'student', ''),
(6, 'parent', ''),
(7, 'email', ''),
(8, 'password', ''),
(9, 'forgot_password ?', ''),
(10, 'reset_password', ''),
(11, 'reset', ''),
(12, 'admin_dashboard', ''),
(13, 'account', ''),
(14, 'profile', ''),
(15, 'change_password', ''),
(16, 'logout', ''),
(17, 'panel', ''),
(18, 'dashboard_help', ''),
(19, 'dashboard', ''),
(20, 'student_help', ''),
(21, 'teacher_help', ''),
(22, 'subject_help', ''),
(23, 'subject', ''),
(24, 'class_help', ''),
(25, 'class', ''),
(26, 'exam_help', ''),
(27, 'exam', ''),
(28, 'marks_help', ''),
(29, 'marks-attendance', ''),
(30, 'grade_help', ''),
(31, 'exam-grade', ''),
(32, 'class_routine_help', ''),
(33, 'class_routine', ''),
(34, 'invoice_help', ''),
(35, 'payment', ''),
(36, 'book_help', ''),
(37, 'library', ''),
(38, 'transport_help', ''),
(39, 'transport', ''),
(40, 'dormitory_help', ''),
(41, 'dormitory', ''),
(42, 'noticeboard_help', ''),
(43, 'noticeboard-event', ''),
(44, 'bed_ward_help', ''),
(45, 'settings', ''),
(46, 'system_settings', ''),
(47, 'manage_language', ''),
(48, 'backup_restore', ''),
(49, 'profile_help', ''),
(50, 'manage_student', ''),
(51, 'manage_teacher', ''),
(52, 'noticeboard', ''),
(53, 'language', ''),
(54, 'backup', ''),
(55, 'calendar_schedule', ''),
(56, 'select_a_class', ''),
(57, 'student_list', ''),
(58, 'add_student', ''),
(59, 'roll', ''),
(60, 'photo', ''),
(61, 'student_name', ''),
(62, 'address', ''),
(63, 'options', ''),
(64, 'marksheet', ''),
(65, 'id_card', ''),
(66, 'edit', ''),
(67, 'delete', ''),
(68, 'personal_profile', ''),
(69, 'academic_result', ''),
(70, 'name', ''),
(71, 'birthday', ''),
(72, 'sex', ''),
(73, 'male', ''),
(74, 'female', ''),
(75, 'religion', ''),
(76, 'blood_group', ''),
(77, 'phone', ''),
(78, 'father_name', ''),
(79, 'mother_name', ''),
(80, 'edit_student', ''),
(81, 'teacher_list', ''),
(82, 'add_teacher', ''),
(83, 'teacher_name', ''),
(84, 'edit_teacher', ''),
(85, 'manage_parent', ''),
(86, 'parent_list', ''),
(87, 'parent_name', ''),
(88, 'relation_with_student', ''),
(89, 'parent_email', ''),
(90, 'parent_phone', ''),
(91, 'parrent_address', ''),
(92, 'parrent_occupation', ''),
(93, 'add', ''),
(94, 'parent_of', ''),
(95, 'profession', ''),
(96, 'edit_parent', ''),
(97, 'add_parent', ''),
(98, 'manage_subject', ''),
(99, 'subject_list', ''),
(100, 'add_subject', ''),
(101, 'subject_name', ''),
(102, 'edit_subject', ''),
(103, 'manage_class', ''),
(104, 'class_list', ''),
(105, 'add_class', ''),
(106, 'class_name', ''),
(107, 'numeric_name', ''),
(108, 'name_numeric', ''),
(109, 'edit_class', ''),
(110, 'manage_exam', ''),
(111, 'exam_list', ''),
(112, 'add_exam', ''),
(113, 'exam_name', ''),
(114, 'date', ''),
(115, 'comment', ''),
(116, 'edit_exam', ''),
(117, 'manage_exam_marks', ''),
(118, 'manage_marks', ''),
(119, 'select_exam', ''),
(120, 'select_class', ''),
(121, 'select_subject', ''),
(122, 'select_an_exam', ''),
(123, 'mark_obtained', ''),
(124, 'attendance', ''),
(125, 'manage_grade', ''),
(126, 'grade_list', ''),
(127, 'add_grade', ''),
(128, 'grade_name', ''),
(129, 'grade_point', ''),
(130, 'mark_from', ''),
(131, 'mark_upto', ''),
(132, 'edit_grade', ''),
(133, 'manage_class_routine', ''),
(134, 'class_routine_list', ''),
(135, 'add_class_routine', ''),
(136, 'day', ''),
(137, 'starting_time', ''),
(138, 'ending_time', ''),
(139, 'edit_class_routine', ''),
(140, 'manage_invoice/payment', ''),
(141, 'invoice/payment_list', ''),
(142, 'add_invoice/payment', ''),
(143, 'title', ''),
(144, 'description', ''),
(145, 'amount', ''),
(146, 'status', ''),
(147, 'view_invoice', ''),
(148, 'paid', ''),
(149, 'unpaid', ''),
(150, 'add_invoice', ''),
(151, 'payment_to', ''),
(152, 'bill_to', ''),
(153, 'invoice_title', ''),
(154, 'invoice_id', ''),
(155, 'edit_invoice', ''),
(156, 'manage_library_books', ''),
(157, 'book_list', ''),
(158, 'add_book', ''),
(159, 'book_name', ''),
(160, 'author', ''),
(161, 'price', ''),
(162, 'available', ''),
(163, 'unavailable', ''),
(164, 'edit_book', ''),
(165, 'manage_transport', ''),
(166, 'transport_list', ''),
(167, 'add_transport', ''),
(168, 'route_name', ''),
(169, 'number_of_vehicle', ''),
(170, 'route_fare', ''),
(171, 'edit_transport', ''),
(172, 'manage_dormitory', ''),
(173, 'dormitory_list', ''),
(174, 'add_dormitory', ''),
(175, 'dormitory_name', ''),
(176, 'number_of_room', ''),
(177, 'manage_noticeboard', ''),
(178, 'noticeboard_list', ''),
(179, 'add_noticeboard', ''),
(180, 'notice', ''),
(181, 'add_notice', ''),
(182, 'edit_noticeboard', ''),
(183, 'system_name', ''),
(184, 'save', ''),
(185, 'system_title', ''),
(186, 'paypal_email', ''),
(187, 'currency', ''),
(188, 'phrase_list', ''),
(189, 'add_phrase', ''),
(190, 'add_language', ''),
(191, 'phrase', ''),
(192, 'manage_backup_restore', ''),
(193, 'restore', ''),
(194, 'mark', ''),
(195, 'grade', ''),
(196, 'invoice', ''),
(197, 'book', ''),
(198, 'all', ''),
(199, 'upload_&_restore_from_backup', ''),
(200, 'manage_profile', ''),
(201, 'update_profile', ''),
(202, 'new_password', ''),
(203, 'confirm_new_password', ''),
(204, 'update_password', ''),
(205, 'teacher_dashboard', ''),
(206, 'backup_restore_help', ''),
(207, 'student_dashboard', ''),
(208, 'parent_dashboard', ''),
(209, 'view_marks', ''),
(210, 'delete_language', ''),
(211, 'settings_updated', ''),
(212, 'update_phrase', ''),
(213, 'login_failed', ''),
(214, 'system_email', ''),
(215, 'account_not_found', ''),
(216, 'account_updated', ''),
(217, 'option', ''),
(218, 'edit_phrase', '');

-- --------------------------------------------------------

--
-- Table structure for table `mark`
--

CREATE TABLE IF NOT EXISTS `mark` (
`mark_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `mark_obtained` int(11) NOT NULL DEFAULT '0',
  `mark_total` int(11) NOT NULL DEFAULT '100',
  `attendance` int(11) NOT NULL DEFAULT '0',
  `comment` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mark`
--

INSERT INTO `mark` (`mark_id`, `student_id`, `subject_id`, `class_id`, `exam_id`, `mark_obtained`, `mark_total`, `attendance`, `comment`) VALUES
(1, 3, 2, 4, 1, 85, 100, 1, ''),
(2, 2, 1, 5, 1, 0, 100, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `noticeboard`
--

CREATE TABLE IF NOT EXISTS `noticeboard` (
`notice_id` int(11) NOT NULL,
  `notice_title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `notice` longtext COLLATE utf8_unicode_ci NOT NULL,
  `create_timestamp` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `noticeboard`
--

INSERT INTO `noticeboard` (`notice_id`, `notice_title`, `notice`, `create_timestamp`) VALUES
(1, 'hbwfe', 'fsfs', 1399413600);

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE IF NOT EXISTS `parent` (
`parent_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL,
  `student_id` int(11) NOT NULL,
  `relation_with_student` longtext COLLATE utf8_unicode_ci NOT NULL,
  `phone` longtext COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `profession` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`parent_id`, `name`, `email`, `password`, `student_id`, `relation_with_student`, `phone`, `address`, `profession`) VALUES
(1, 'debuma', 'debuma', '1234', 4, 'ma', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
`payment_id` int(11) NOT NULL,
  `payment_type` longtext COLLATE utf8_unicode_ci NOT NULL,
  `transaction_id` longtext COLLATE utf8_unicode_ci NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `method` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
`settings_id` int(11) NOT NULL,
  `type` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`settings_id`, `type`, `description`) VALUES
(1, 'system_name', 'School Management'),
(2, 'system_title', 'School'),
(3, 'address', 'Burdwan'),
(4, 'phone', '+8012654159'),
(5, 'paypal_email', 'payment@school.com'),
(6, 'currency', 'usd'),
(7, 'system_email', 'school@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
`student_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `birthday` longtext COLLATE utf8_unicode_ci NOT NULL,
  `sex` longtext COLLATE utf8_unicode_ci NOT NULL,
  `religion` longtext COLLATE utf8_unicode_ci NOT NULL,
  `blood_group` longtext COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `phone` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL,
  `father_name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `mother_name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `class_id` longtext COLLATE utf8_unicode_ci NOT NULL,
  `roll` longtext COLLATE utf8_unicode_ci NOT NULL,
  `transport_id` int(11) NOT NULL,
  `dormitory_id` int(11) NOT NULL,
  `dormitory_room_number` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `name`, `birthday`, `sex`, `religion`, `blood_group`, `address`, `phone`, `email`, `password`, `father_name`, `mother_name`, `class_id`, `roll`, `transport_id`, `dormitory_id`, `dormitory_room_number`) VALUES
(1, 'rahul', '0', '0', '0', '0', '0', '0', 'rahul', '1234', 'papu', 'pomi', '3', '12A1', 0, 0, ''),
(2, 'debu', '04/29/2014', 'female', '', '', '', '', 'debu', '1234', '', '', '5', '12A2', 0, 0, ''),
(3, 'pamu', '', 'male', '', '', '', '', 'pamu', '1234', '', '', '4', '11A1', 0, 0, ''),
(4, 'debu', '', 'male', '', '', '', '', 'debu', '1234', '', '', '3', '', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
`subject_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `class_id` int(11) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `name`, `class_id`, `teacher_id`) VALUES
(1, 'history', 5, 1),
(2, 'geography', 4, 2),
(3, 'history', 3, 1),
(4, 'gjhgjjg', 0, 0),
(5, 'adbjfb.', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
`teacher_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `birthday` longtext COLLATE utf8_unicode_ci NOT NULL,
  `sex` longtext COLLATE utf8_unicode_ci NOT NULL,
  `religion` longtext COLLATE utf8_unicode_ci NOT NULL,
  `blood_group` longtext COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `phone` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `name`, `birthday`, `sex`, `religion`, `blood_group`, `address`, `phone`, `email`, `password`) VALUES
(1, 'Benajir Rahaman', '05/17/2014', 'female', '', '', 'barasat', '967494133', 'rahman', '1234'),
(2, 'appu', '03/19/2013', 'male', '', '', 'burdwan', '9233767833', 'appu', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `transport`
--

CREATE TABLE IF NOT EXISTS `transport` (
`transport_id` int(11) NOT NULL,
  `route_name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `number_of_vehicle` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `route_fare` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transport`
--

INSERT INTO `transport` (`transport_id`, `route_name`, `number_of_vehicle`, `description`, `route_fare`) VALUES
(1, 'ASA', '2', 'SS', '34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
 ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
 ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `class_routine`
--
ALTER TABLE `class_routine`
 ADD PRIMARY KEY (`class_routine_id`);

--
-- Indexes for table `dormitory`
--
ALTER TABLE `dormitory`
 ADD PRIMARY KEY (`dormitory_id`);

--
-- Indexes for table `email_template`
--
ALTER TABLE `email_template`
 ADD PRIMARY KEY (`email_template_id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
 ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
 ADD PRIMARY KEY (`grade_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
 ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
 ADD PRIMARY KEY (`phrase_id`);

--
-- Indexes for table `mark`
--
ALTER TABLE `mark`
 ADD PRIMARY KEY (`mark_id`);

--
-- Indexes for table `noticeboard`
--
ALTER TABLE `noticeboard`
 ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
 ADD PRIMARY KEY (`parent_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
 ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
 ADD PRIMARY KEY (`settings_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
 ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
 ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
 ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `transport`
--
ALTER TABLE `transport`
 ADD PRIMARY KEY (`transport_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `class_routine`
--
ALTER TABLE `class_routine`
MODIFY `class_routine_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dormitory`
--
ALTER TABLE `dormitory`
MODIFY `dormitory_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `email_template`
--
ALTER TABLE `email_template`
MODIFY `email_template_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
MODIFY `grade_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
MODIFY `phrase_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=219;
--
-- AUTO_INCREMENT for table `mark`
--
ALTER TABLE `mark`
MODIFY `mark_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `noticeboard`
--
ALTER TABLE `noticeboard`
MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
MODIFY `parent_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
MODIFY `settings_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `transport`
--
ALTER TABLE `transport`
MODIFY `transport_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
