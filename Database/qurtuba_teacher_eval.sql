-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2019 at 09:29 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qurtuba_teacher_eval`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `DepartmentID` int(15) NOT NULL,
  `DepartmentName` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`DepartmentID`, `DepartmentName`) VALUES
(1, 'Sciences & Information Technology'),
(2, 'Political Science');

-- --------------------------------------------------------

--
-- Table structure for table `evaldetail`
--

CREATE TABLE `evaldetail` (
  `DetailID` int(15) NOT NULL,
  `MainID` int(15) NOT NULL,
  `QuestionID` int(15) NOT NULL,
  `Marks` int(150) NOT NULL,
  `StatusID` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `evalmain`
--

CREATE TABLE `evalmain` (
  `MainID` int(15) NOT NULL,
  `StudentID` int(15) NOT NULL,
  `TeacherID` int(15) NOT NULL,
  `SubjectID` int(15) NOT NULL,
  `SemesterID` int(15) NOT NULL,
  `DepartmentID` int(15) NOT NULL,
  `Systime` varchar(150) NOT NULL,
  `StatusID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `evaluation`
--

CREATE TABLE `evaluation` (
  `eval_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `tech_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `question` varchar(250) NOT NULL,
  `eval_ans` varchar(30) NOT NULL,
  `comments` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluation`
--

INSERT INTO `evaluation` (`eval_id`, `stu_id`, `tech_id`, `sub_id`, `question`, `eval_ans`, `comments`) VALUES
(1, 1, 1, 1, '1', '2', ''),
(2, 1, 1, 1, '2', '2', ''),
(3, 1, 1, 1, '3', '2', ''),
(4, 1, 1, 1, '4', '2', ''),
(5, 1, 1, 1, '5', '2', ''),
(6, 1, 1, 1, '6', '3', ''),
(7, 1, 1, 1, '7', '3', ''),
(8, 1, 1, 1, '8', '3', ''),
(9, 1, 1, 1, '9', '2', ''),
(10, 1, 1, 1, '10', '2', ''),
(11, 1, 1, 1, '11', '4', ''),
(12, 1, 1, 1, '12', '2', ''),
(13, 2, 1, 1, '1', '1', ''),
(14, 2, 1, 1, '2', '3', ''),
(15, 2, 1, 1, '3', '2', ''),
(16, 2, 1, 1, '4', '2', ''),
(17, 2, 1, 1, '5', '2', ''),
(18, 2, 1, 1, '6', '2', ''),
(19, 2, 1, 1, '7', '2', ''),
(20, 2, 1, 1, '8', '2', ''),
(21, 2, 1, 1, '9', '2', ''),
(22, 2, 1, 1, '10', '2', ''),
(23, 2, 1, 1, '11', '2', ''),
(24, 2, 1, 1, '12', '2', ''),
(25, 10, 2, 7, '1', '2', ''),
(26, 10, 2, 7, '2', '2', ''),
(27, 10, 2, 7, '3', '3', ''),
(28, 10, 2, 7, '4', '2', ''),
(29, 10, 2, 7, '5', '3', ''),
(30, 10, 2, 7, '6', '3', ''),
(31, 10, 2, 7, '7', '2', ''),
(32, 10, 2, 7, '8', '2', ''),
(33, 10, 2, 7, '9', '3', ''),
(34, 10, 2, 7, '10', '2', ''),
(35, 10, 2, 7, '11', '2', ''),
(36, 10, 2, 7, '12', '2', ''),
(37, 3, 1, 14, '1', '1', ''),
(38, 3, 1, 14, '2', '2', ''),
(39, 3, 1, 14, '3', '1', ''),
(40, 3, 1, 14, '4', '2', ''),
(41, 3, 1, 14, '5', '4', ''),
(42, 3, 1, 14, '6', '4', ''),
(43, 3, 1, 14, '7', '4', ''),
(44, 3, 1, 14, '8', '4', ''),
(45, 3, 1, 14, '9', '4', ''),
(46, 3, 1, 14, '10', '4', ''),
(47, 3, 1, 14, '11', '4', ''),
(48, 3, 1, 14, '12', '4', ''),
(49, 12, 10, 1, '1', '3', ''),
(50, 12, 10, 1, '2', '3', ''),
(51, 12, 10, 1, '3', '3', ''),
(52, 12, 10, 1, '4', '3', ''),
(53, 12, 10, 1, '5', '3', ''),
(54, 12, 10, 1, '6', '3', ''),
(55, 12, 10, 1, '7', '3', ''),
(56, 12, 10, 1, '8', '3', ''),
(57, 12, 10, 1, '9', '3', ''),
(58, 12, 10, 1, '10', '3', ''),
(59, 12, 10, 1, '11', '3', ''),
(60, 12, 10, 1, '12', '3', ''),
(61, 13, 10, 15, '1', '2', ''),
(62, 13, 10, 15, '2', '1', ''),
(63, 13, 10, 15, '3', '2', ''),
(64, 13, 10, 15, '4', '3', ''),
(65, 13, 10, 15, '5', '1', ''),
(66, 13, 10, 15, '6', '2', ''),
(67, 13, 10, 15, '7', '3', ''),
(68, 13, 10, 15, '8', '1', ''),
(69, 13, 10, 15, '9', '2', ''),
(70, 13, 10, 15, '10', '1', ''),
(71, 13, 10, 15, '11', '2', ''),
(72, 13, 10, 15, '12', '1', ''),
(73, 14, 10, 15, '1', '3', ''),
(74, 14, 10, 15, '2', '3', ''),
(75, 14, 10, 15, '3', '3', ''),
(76, 14, 10, 15, '4', '3', ''),
(77, 14, 10, 15, '5', '3', ''),
(78, 14, 10, 15, '6', '3', ''),
(79, 14, 10, 15, '7', '3', ''),
(80, 14, 10, 15, '8', '3', ''),
(81, 14, 10, 15, '9', '3', ''),
(82, 14, 10, 15, '10', '3', ''),
(83, 14, 10, 15, '11', '3', ''),
(84, 14, 10, 15, '12', '3', ''),
(85, 16, 12, 16, '1', '3', ''),
(86, 16, 12, 16, '2', '3', ''),
(87, 16, 12, 16, '3', '3', ''),
(88, 16, 12, 16, '4', '3', ''),
(89, 16, 12, 16, '5', '3', ''),
(90, 16, 12, 16, '6', '3', ''),
(91, 16, 12, 16, '7', '3', ''),
(92, 16, 12, 16, '8', '3', ''),
(93, 16, 12, 16, '9', '3', ''),
(94, 16, 12, 16, '10', '3', ''),
(95, 16, 12, 16, '11', '3', ''),
(96, 16, 12, 16, '12', '3', '');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `ProgramID` int(15) NOT NULL,
  `ProgramName` varchar(50) NOT NULL,
  `DepartmentID` int(15) NOT NULL,
  `Semesters` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`ProgramID`, `ProgramName`, `DepartmentID`, `Semesters`) VALUES
(1, 'MBA', 0, 4),
(2, 'BBA', 2, 8),
(3, 'BCS', 0, 8),
(4, 'MCS', 0, 4),
(5, 'International Relation ', 3, 4),
(6, 'Political Science', 3, 4),
(7, 'BA(English)', 4, 4),
(8, 'MA(English)', 4, 4),
(9, 'ADE', 5, 4),
(10, 'B.Ed ', 5, 4),
(14, 'BSIT', 0, 4),
(15, 'BSED', 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `QuestionID` int(15) NOT NULL,
  `QuestionText` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`QuestionID`, `QuestionText`) VALUES
(1, 'He/She is prepared for each class.'),
(2, 'He/She demonstrates knowledge of the subject.'),
(3, 'He/She has completed the whole course.'),
(4, 'He/She provides additional materiel apart from the textbook. '),
(5, 'He/She present and communicates the subject matter effectively.'),
(6, 'He/She shows respect towards students and encourages class participation.'),
(7, 'He/She maintains an environment that is conductive to learning. '),
(8, 'He/She arrives on time.'),
(9, 'He/She leaves class on time.'),
(10, 'He/She is fair in examination.'),
(11, 'He/She was available during the specified office hours and for after class consultations .'),
(12, 'He/She responds to the students questions effectively.');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `semester_id` int(11) NOT NULL,
  `semester` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`semester_id`, `semester`) VALUES
(1, '1st'),
(2, '2nd'),
(3, '3rd'),
(4, '4th'),
(5, '5th'),
(6, '6th'),
(7, '7th'),
(8, '8th');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `SessionID` int(11) NOT NULL,
  `SessionName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`SessionID`, `SessionName`) VALUES
(1, '1st semester-2019'),
(2, '2nd semester-2019');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `StudentID` int(15) NOT NULL,
  `StudentName` varchar(50) NOT NULL,
  `FatherName` varchar(50) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `SessionID` int(11) NOT NULL,
  `ProgramID` int(15) NOT NULL,
  `DepartmentID` int(15) NOT NULL,
  `SemesterID` int(15) NOT NULL,
  `RollNO` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`StudentID`, `StudentName`, `FatherName`, `Gender`, `SessionID`, `ProgramID`, `DepartmentID`, `SemesterID`, `RollNO`, `Password`) VALUES
(12, 'patrick', 'oyardo', 'male', 1, 3, 1, 1, '100-1100', 'patrick'),
(13, 'paul', 'villaro', 'male', 1, 14, 1, 1, '100-1101', 'paul'),
(14, 'melody', 'Nevallo', 'female', 1, 14, 1, 1, '100-1102', 'melody'),
(16, 'e', 'e', 'male', 1, 15, 2, 1, '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `SubjectID` int(15) NOT NULL,
  `Subjectcode` varchar(30) NOT NULL,
  `SubjectName` varchar(50) NOT NULL,
  `SemesterID` int(15) NOT NULL,
  `ProgramID` int(15) NOT NULL,
  `DepartmentID` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`SubjectID`, `Subjectcode`, `SubjectName`, `SemesterID`, `ProgramID`, `DepartmentID`) VALUES
(1, 'CS-01', 'C++', 1, 3, 1),
(15, 'BSIT-OOP', 'Object Oriented Programming', 1, 14, 1),
(16, 'BSED-101', 'PolSci', 1, 15, 2);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `TeacherID` int(15) NOT NULL,
  `TeacherName` varchar(50) NOT NULL,
  `FatherName` varchar(50) NOT NULL,
  `CNIC` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`TeacherID`, `TeacherName`, `FatherName`, `CNIC`) VALUES
(10, 'Tavu', 'Pogi', '100-1211'),
(12, 'Jordan', 'Mejo Cute', '100-1211');

-- --------------------------------------------------------

--
-- Table structure for table `teachersubject`
--

CREATE TABLE `teachersubject` (
  `RID` int(11) NOT NULL,
  `TeacherID` int(15) NOT NULL,
  `SubjectID` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachersubject`
--

INSERT INTO `teachersubject` (`RID`, `TeacherID`, `SubjectID`) VALUES
(4, 2, 2),
(5, 2, 7),
(6, 2, 12),
(7, 3, 2),
(8, 3, 6),
(9, 3, 10),
(10, 3, 12),
(11, 4, 8),
(12, 4, 9),
(13, 5, 2),
(14, 5, 6),
(15, 5, 12),
(16, 6, 9),
(17, 7, 12),
(18, 8, 3),
(19, 8, 4),
(20, 9, 10),
(21, 9, 11),
(23, 3, 1),
(24, 2, 1),
(39, 1, 14),
(40, 1, 1),
(41, 1, 2),
(42, 1, 3),
(43, 1, 4),
(48, 10, 1),
(49, 10, 15),
(50, 11, 1),
(51, 11, 15),
(52, 12, 16);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(15) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `UserName`, `Password`) VALUES
(7, 'admin', 'admin'),
(8, 'admin2', 'admin2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`DepartmentID`);

--
-- Indexes for table `evaldetail`
--
ALTER TABLE `evaldetail`
  ADD PRIMARY KEY (`DetailID`);

--
-- Indexes for table `evalmain`
--
ALTER TABLE `evalmain`
  ADD PRIMARY KEY (`MainID`);

--
-- Indexes for table `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`eval_id`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`ProgramID`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`QuestionID`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`semester_id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`SessionID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`StudentID`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`SubjectID`),
  ADD UNIQUE KEY `Subjectcode` (`Subjectcode`),
  ADD KEY `Subjectcode_2` (`Subjectcode`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`TeacherID`);

--
-- Indexes for table `teachersubject`
--
ALTER TABLE `teachersubject`
  ADD PRIMARY KEY (`RID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `DepartmentID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `evaldetail`
--
ALTER TABLE `evaldetail`
  MODIFY `DetailID` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `evalmain`
--
ALTER TABLE `evalmain`
  MODIFY `MainID` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `eval_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `ProgramID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `QuestionID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `semester_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `SessionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `StudentID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `SubjectID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `TeacherID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `teachersubject`
--
ALTER TABLE `teachersubject`
  MODIFY `RID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
