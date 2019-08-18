-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2016 at 10:39 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(1, 'Sciences & IT'),
(2, 'Management Science'),
(3, 'IR & Political science'),
(4, 'Linguistics, Literature & Religious Studies'),
(5, 'Teachers Education');

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
(36, 10, 2, 7, '12', '2', '');

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
(1, 'MBA', 2, 4),
(2, 'BBA', 2, 8),
(3, 'BCS', 1, 8),
(4, 'MCS', 1, 4),
(5, 'International Relation ', 3, 4),
(6, 'Political Science', 3, 4),
(7, 'BA(English)', 4, 4),
(8, 'MA(English)', 4, 4),
(9, 'ADE', 5, 4),
(10, 'B.Ed ', 5, 4),
(11, 'M.Ed', 5, 4),
(13, 'M.Ed hm', 5, 4);

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
(1, 'fall-2015'),
(2, 'Autumn-2015');

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
(1, 'Muhammad Zabih Ullah', 'Toor Shahzada', 'male', 1, 3, 1, 3, 'BCS1', 'BCS1'),
(2, 'mujeeb Ullah', 'Abdul wahab', 'male', 1, 3, 1, 3, 'BCS2', 'BCS2'),
(3, 'Abdullah', 'Gul Bashah', 'male', 1, 3, 1, 3, 'BCS3', 'BCS3'),
(4, 'Muhammad Arif', 'Hizbul Ullah', 'male', 1, 4, 1, 1, 'MCS1', 'MCS1'),
(5, 'Mati Ullah ', 'Haji fidaa Jan', 'male', 1, 4, 1, 1, 'MCS2', 'MCS2'),
(6, 'Arsalan khan ', 'gul ali', 'male', 1, 4, 1, 1, 'MCS3', 'MCS3'),
(7, 'Tausif Khan', 'khan zada', 'male', 1, 2, 2, 2, 'BBA1', 'BBA1'),
(8, 'Naymat syed', 'badshah khan', 'male', 1, 2, 2, 2, 'BBA2', 'BBA2'),
(9, 'Syed Nisar alam', 'syed jan alam', 'male', 1, 2, 2, 2, 'BBA3', 'BBA3'),
(10, 'Shahsawar Khan', 'ghulam hussain ', 'male', 1, 1, 2, 1, 'MBA1', 'MBA1'),
(11, 'Syed hamrah', 'khalil khan', 'male', 1, 1, 2, 1, 'MBA2', 'MBA22');

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
(2, 'CS-02', 'Introduction to Computer', 1, 3, 1),
(3, 'ENG-01', 'English', 1, 3, 4),
(4, 'ISM-01', 'Islamic Studies', 2, 2, 4),
(5, 'CS-03', 'Introduction to Computer', 1, 4, 1),
(6, 'CS-04', 'Advance Programming', 1, 4, 1),
(7, 'MS-01', 'Introduction to Bussience', 1, 1, 2),
(8, 'MS-02', 'Accounting', 2, 1, 2),
(9, 'MS-03', 'Auditing ', 1, 1, 2),
(10, 'MS-04', 'Micro economics ', 1, 2, 2),
(11, 'MS-05', 'macro ecnomics', 1, 2, 2),
(12, 'MS-06', 'Auditing ', 1, 2, 2),
(13, 'CS-08', 'java', 1, 3, 1),
(14, 'CS-003', 'OO programming', 2, 3, 1);

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
(1, 'Sir Sajid Rehman', 'khan', '130938374'),
(2, 'Sir Kashif amin', 'amin khan', '84877'),
(3, 'Sir imran khan', 'khan', '8465'),
(4, 'Sir Naveed', 'khan', '573645'),
(5, 'Sir javeed', 'khan', '3879'),
(6, 'Sir ahmad', 'khan', '837'),
(7, 'sir Saleem khan', 'khan', '8373'),
(8, 'Sir Taj Rehman', 'khan', '838'),
(9, 'Sir Murtaza', 'khan', '8304');

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
(39, 1, 14);

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
  MODIFY `DepartmentID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
  MODIFY `eval_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `ProgramID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
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
  MODIFY `StudentID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `SubjectID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `TeacherID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `teachersubject`
--
ALTER TABLE `teachersubject`
  MODIFY `RID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
