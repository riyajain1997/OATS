-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2020 at 11:26 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbalumni`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblblogs`
--

CREATE TABLE `tblblogs` (
  `Bid` int(11) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Content` text NOT NULL,
  `File` varchar(100) NOT NULL,
  `CreatedDate` date NOT NULL,
  `Uid` int(11) NOT NULL,
  `IsActive` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblboard`
--

CREATE TABLE `tblboard` (
  `Boardid` int(11) NOT NULL,
  `BoardName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblboard`
--

INSERT INTO `tblboard` (`Boardid`, `BoardName`) VALUES
(1, 'Andhra Pradesh Board of Secondary Education, Hyderabad'),
(2, 'Assam Board of Secondary Education, Guwahati'),
(3, 'Bihar School Examination Board, Patna'),
(4, 'Bihar Sanskrit Shiksha Board, Patna'),
(5, 'Chhatisgarh Board of Secondary Education, Raipur'),
(6, 'Goa Board of Secondary & Higher Secondary Education, Goa'),
(7, 'Gujarat Secondary & Higher Secondary Education Board, Gandhi Nagar'),
(8, 'Haryana Board of Education, Hansi Road, Bhiwani'),
(9, 'Himachal Pradesh Board of School Education, Dharamshala'),
(10, 'J&K State Board of School Education, Jammu'),
(11, 'Jharkhand Academic Council, Ranchi'),
(12, 'Karnataka Secondary Education Examination Borad, Bangalore'),
(13, 'Kerala Board of Higher Secondary Education, Thiruvananthapuram'),
(14, 'Maharashtra State Board of Secondary and Higher Secondary Education, Pune'),
(15, 'Madhya Pradesh Board of Secondary Education, Bhopal'),
(16, 'Manipur Board of Secondary Education, Imphal'),
(17, 'Meghalaya Board of School Education, Meghalaya'),
(18, 'Mizoram Board of School Education Chaltlan, Aizawl'),
(19, 'Nagaland Board of School Education, Kohima'),
(20, 'Orissa Council of Higher Secondary Education Bhubaneswar'),
(21, 'Punjab School Education Board, Mohali'),
(22, 'Rajasthan Board of Secondary Education, Ajmer'),
(23, 'Tamil Nadu Board of Secondary Education, Chennai'),
(24, 'Tripura Board of Secondary Education, Agartala, Tripura West'),
(25, 'U.P. Board of High School & Intermediate Education, Allahabad'),
(26, 'Uttranchal Shiksha Evm Pariksha Parishad, Ram Nagar, Nainital'),
(27, 'West Bengal Council of Higher Secondary Education, Calcutta'),
(28, 'National Institute of Open Schooling (formarly National Open School), New Delhi'),
(29, 'Central Board of Secondary Education, Delhi'),
(30, 'Rashtriya Sanskrit Sansthan, New Delhi'),
(31, 'Gurukul Kangri Vishwavidyalaya, Haridwar'),
(32, 'Directorate of Army Education, New Delhi'),
(33, 'Aligarh Muslim University, Aligarh'),
(34, 'Jamia Miliya Hamdard University'),
(35, 'Banasthali Vidyapith, Banasthali, Rajasthan'),
(36, 'Jamia Millia Islamia, New Delhi');

-- --------------------------------------------------------

--
-- Table structure for table `tblclass`
--

CREATE TABLE `tblclass` (
  `Classid` int(11) NOT NULL,
  `ClassName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblclass`
--

INSERT INTO `tblclass` (`Classid`, `ClassName`) VALUES
(1, 'SSC\r\n'),
(2, 'HSC'),
(3, 'Diploma'),
(4, 'Graduation'),
(5, 'Post Graduation'),
(6, 'PhD');

-- --------------------------------------------------------

--
-- Table structure for table `tblcollege`
--

CREATE TABLE `tblcollege` (
  `Collegeid` int(11) NOT NULL,
  `CollegeName` varchar(100) NOT NULL,
  `Universityid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcollege`
--

INSERT INTO `tblcollege` (`Collegeid`, `CollegeName`, `Universityid`) VALUES
(1, 'MIT School of Technology Management', 1),
(2, 'Bonnie Foi College', 2),
(3, 'Christ College', 2),
(4, 'Acharya Jagadish Chandra Bose College', 3),
(5, 'Goenka College of Commerce & Business Administration', 3),
(6, 'Hans Raj College', 4),
(7, 'Kirori Mal College', 4),
(8, 'Sinhgad Technical Education Society', 5),
(9, 'Vishwakarma Institute of Technology', 5),
(10, 'Fergusson College', 5),
(11, 'Symbiosis College of Arts and Commerce', 5),
(12, 'Madras Christian College', 6),
(13, 'Presidency College, Chennai', 6),
(14, 'Loyola College Chennai', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tblcontact`
--

CREATE TABLE `tblcontact` (
  `Cid` int(11) NOT NULL,
  `Uid` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Phone` bigint(20) NOT NULL,
  `Subject` varchar(100) NOT NULL,
  `Description` text NOT NULL,
  `IsActive` tinyint(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcontact`
--

INSERT INTO `tblcontact` (`Cid`, `Uid`, `Name`, `Email`, `Phone`, `Subject`, `Description`, `IsActive`) VALUES
(1, 0, 'Abhilasha Kumari', 'poojakusingh1234@gmail.com', 5566778899, 'new', 'first try', 1),
(2, 0, 'Abhilasha Kumari', 'poojakusingh1234@gmail.com', 5566778899, 'new', 'first try', 1),
(3, 0, 'Abhilasha Kumari', 'poojakusingh1234@gmail.com', 5566778899, 'new', 'first try', 1),
(4, 0, 'Abhilasha Kumari', 'poojakusingh1234@gmail.com', 5566778899, 'new', 'first try', 1),
(5, 2, 'riya jain', 'riyajain@gmail.com', 2233114433, 'alumni test', 'is it working?', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblcourse`
--

CREATE TABLE `tblcourse` (
  `Courseid` int(11) NOT NULL,
  `CourseName` varchar(100) NOT NULL,
  `Deptid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcourse`
--

INSERT INTO `tblcourse` (`Courseid`, `CourseName`, `Deptid`) VALUES
(1, 'Thermodynamics', 1),
(2, 'Fluid Mechanics', 1),
(3, 'Engineering Drawing and graphics', 2),
(4, 'Geotechnical Engineering', 2),
(5, 'Biochemical Engineering', 3),
(6, 'Reaction Engineering', 3),
(7, 'BA Liberal Arts', 4),
(8, 'BA (Hons) English', 4),
(9, 'B. Des. Product Design', 5),
(10, 'Visual Communication Design', 5),
(11, 'MCA', 6),
(12, 'BSC', 6),
(13, 'B.Tech Electrical Engineering', 7),
(14, 'MBA', 8),
(15, 'BBA-CA', 8),
(16, 'B.Pharm', 9),
(17, 'M.Pharm', 9),
(18, 'B.COM', 10),
(19, 'M.COM', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbldepartment`
--

CREATE TABLE `tbldepartment` (
  `Deptid` int(11) NOT NULL,
  `DeptName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbldepartment`
--

INSERT INTO `tbldepartment` (`Deptid`, `DeptName`) VALUES
(1, 'School of Mechanical Engineering'),
(2, 'School of Civil Engineering'),
(3, 'School of Chemical Engineering\r\n'),
(4, 'School of Liberal Arts '),
(5, 'School of Design'),
(6, 'School of Computer Science'),
(7, 'School of Electrical Engineering'),
(8, 'School of Management'),
(9, 'School of  Pharmacy'),
(10, 'School of Commerce');

-- --------------------------------------------------------

--
-- Table structure for table `tbldesignation`
--

CREATE TABLE `tbldesignation` (
  `Desigid` int(11) NOT NULL,
  `DesigName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbldesignation`
--

INSERT INTO `tbldesignation` (`Desigid`, `DesigName`) VALUES
(1, 'Head of Department'),
(2, 'Associate Head of Department'),
(3, 'Dean'),
(4, 'Director'),
(5, 'Professor'),
(6, 'Assistant Professor'),
(7, 'Registar'),
(8, 'Lab Assistant'),
(9, 'Visiting Faculty'),
(10, 'Non Teaching Faculty'),
(11, 'Librarian');

-- --------------------------------------------------------

--
-- Table structure for table `tbleducation`
--

CREATE TABLE `tbleducation` (
  `Educationid` int(11) NOT NULL,
  `Classid` int(11) NOT NULL,
  `Boardid` int(11) NOT NULL,
  `Universityid` int(11) NOT NULL,
  `Collegeid` int(11) NOT NULL,
  `Year` year(4) NOT NULL,
  `Percentage` float NOT NULL,
  `Uid` int(11) NOT NULL,
  `IsActive` tinyint(4) NOT NULL,
  `Specialization` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblevent`
--

CREATE TABLE `tblevent` (
  `Eid` int(11) NOT NULL,
  `Ename` varchar(100) NOT NULL,
  `Location` varchar(100) NOT NULL,
  `Elink` varchar(100) NOT NULL,
  `Edate` date NOT NULL,
  `Etime` time NOT NULL,
  `Edescription` text NOT NULL,
  `CreatedUid` int(11) NOT NULL,
  `AlumniUid` int(11) NOT NULL,
  `Deptid` int(11) NOT NULL,
  `IsAccepted` tinyint(7) NOT NULL,
  `IsActive` tinyint(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblgroupmember`
--

CREATE TABLE `tblgroupmember` (
  `Gmid` int(11) NOT NULL,
  `Sgid` int(11) NOT NULL,
  `Uid` int(11) NOT NULL,
  `LeaderMember` varchar(100) NOT NULL,
  `IsActive` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblgroupmember`
--

INSERT INTO `tblgroupmember` (`Gmid`, `Sgid`, `Uid`, `LeaderMember`, `IsActive`) VALUES
(1, 18, 1, 'Leader', 1),
(2, 18, 2, 'Member', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblregister`
--

CREATE TABLE `tblregister` (
  `Uid` int(11) NOT NULL,
  `PrnEmpno` int(11) NOT NULL,
  `Fname` varchar(100) NOT NULL,
  `Lname` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Dob` date NOT NULL,
  `Phone` bigint(20) NOT NULL,
  `Usertype` varchar(100) NOT NULL,
  `JoinYear` year(4) NOT NULL,
  `PassYear` year(4) NOT NULL,
  `Cousreid` int(11) DEFAULT NULL,
  `Deptid` int(11) DEFAULT NULL,
  `Desigid` int(11) DEFAULT NULL,
  `About` text DEFAULT NULL,
  `IsActive` tinyint(7) NOT NULL,
  `ProfilePic` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblregister`
--

INSERT INTO `tblregister` (`Uid`, `PrnEmpno`, `Fname`, `Lname`, `Email`, `Password`, `Gender`, `Dob`, `Phone`, `Usertype`, `JoinYear`, `PassYear`, `Cousreid`, `Deptid`, `Desigid`, `About`, `IsActive`, `ProfilePic`) VALUES
(1, 1042180522, 'Abhilasha', 'oso', 'ppoo@gmail.com', 'abhi', 'Female', '0000-00-00', 1112221112, 'Student', 2019, 2022, 1, 1, 0, NULL, 1, NULL),
(2, 1223112211, 'Riya', 'Jain', 'riya@gmail.com', 'riya', 'Female', '2011-11-11', 123456, 'Alumni', 0000, 2011, 1, 0, 11, 'riya here', 1, 'Marksheet.jpg'),
(4, 1104, 'Jignesh', 'Mahadik', 'jignesh@gmail.com', 'jignesh', 'Male', '0000-00-00', 2211334455, 'Staff', 0000, 0000, 0, 1, 2, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblskill`
--

CREATE TABLE `tblskill` (
  `Skillid` int(11) NOT NULL,
  `SkillName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblskill`
--

INSERT INTO `tblskill` (`Skillid`, `SkillName`) VALUES
(1, 'ASP.NET'),
(2, 'Ajax'),
(3, 'HTML'),
(4, 'CSS'),
(5, 'Javascript'),
(6, 'Json'),
(7, 'PHP'),
(8, 'Java'),
(9, 'Pyhton'),
(10, 'Bootstrap'),
(11, 'C'),
(12, 'C++'),
(13, 'C#'),
(14, 'Perl'),
(15, 'Go'),
(16, 'Scala'),
(17, 'Kotlin'),
(18, 'R'),
(19, 'Ruby'),
(20, 'Rust'),
(21, 'Organization Behaviour'),
(22, 'Swift'),
(23, 'MySQL'),
(24, 'MongoDB'),
(25, 'PostgreSQL'),
(26, 'Cloud Computing'),
(27, 'Machine Learning'),
(28, 'DataScience'),
(29, 'Linux OS'),
(30, 'Project Management'),
(31, 'Business process analysis'),
(32, 'Information systems design'),
(33, 'Data analysis'),
(34, 'TypeScript'),
(35, 'Django'),
(36, 'Android'),
(37, 'Artificial Intelligence'),
(38, 'Buisness Intelligence'),
(39, 'DBMS'),
(40, 'Computer Network'),
(41, 'Critical Thinking'),
(42, 'Numerical'),
(43, 'Basic Circuit'),
(44, 'Problem Solving'),
(45, 'Leadership'),
(46, 'Teamwork'),
(47, 'Initaitive'),
(48, 'Strategic Thinking'),
(49, 'Global Orientation'),
(50, 'Analytical Skills'),
(51, 'Statistic'),
(52, 'Human Anatomy'),
(53, 'Inorganic Chemistry'),
(54, 'Remedical Biology'),
(55, 'Biology'),
(56, 'Physiology'),
(57, 'Pharmaceutical'),
(58, 'Microbial & Cellular Biology'),
(59, 'Bioprocess Engineering'),
(60, 'Pharmacognosy'),
(61, 'Financial Mng'),
(62, 'Economics'),
(63, 'Marketing Behaviour'),
(64, 'Global Trade & Finance'),
(65, 'Laws of Physics'),
(66, 'Mathematics'),
(67, 'Chemistry'),
(68, 'Engineering Design,Modeling'),
(69, 'Fluid Mechanism'),
(70, 'Technical Analysis'),
(71, 'Lubrication System Modeling'),
(72, 'Creativity'),
(73, 'Typography'),
(74, 'Branding'),
(75, 'Proportions & Perspective'),
(76, 'Principal Soil'),
(77, 'Geological & Natural Environment'),
(78, 'Measurement, Analytical Skills'),
(79, 'Artistic'),
(80, 'Facial Expressions & Body Gestures');

-- --------------------------------------------------------

--
-- Table structure for table `tblstaff`
--

CREATE TABLE `tblstaff` (
  `Staffid` int(11) NOT NULL,
  `EmpNo` int(11) NOT NULL,
  `Sfname` varchar(100) NOT NULL,
  `Slname` varchar(100) NOT NULL,
  `Sdob` date NOT NULL,
  `Sgender` varchar(100) NOT NULL,
  `Sjoin` year(4) NOT NULL,
  `Desigid` int(11) NOT NULL,
  `Deptid` int(11) NOT NULL,
  `IsActive` tinyint(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblstaff`
--

INSERT INTO `tblstaff` (`Staffid`, `EmpNo`, `Sfname`, `Slname`, `Sdob`, `Sgender`, `Sjoin`, `Desigid`, `Deptid`, `IsActive`) VALUES
(1, 1001, 'Anamika', 'Hazra', '1980-05-02', 'Female', 2005, 1, 1, 1),
(2, 1002, 'Abhishek', 'Pradhan', '1985-04-04', 'Male', 2015, 1, 2, 1),
(3, 1003, 'Priya', 'Kachhap', '1981-03-10', 'Female', 2004, 1, 3, 1),
(4, 1004, 'Rahul', 'Nigam', '1975-12-01', 'Male', 1999, 1, 4, 1),
(5, 1005, 'Anjali', 'Sharma', '1976-07-09', 'Female', 1999, 1, 5, 1),
(6, 1006, 'Ankit', 'Pandey', '1979-11-07', 'Male', 2003, 1, 6, 1),
(7, 1007, 'Sneha', 'Patil', '1977-09-09', 'Female', 2005, 1, 7, 1),
(8, 1008, 'Deepak', 'Patil', '1982-01-01', 'Male', 2007, 1, 8, 1),
(9, 1009, 'Neha', 'Singh', '1983-02-03', 'Female', 2005, 1, 9, 1),
(10, 1010, 'Manmohan', 'Singh', '1980-06-14', 'Male', 2002, 1, 10, 1),
(11, 1011, 'Sakshi', 'Mahto', '1982-09-30', 'Female', 2005, 2, 1, 1),
(12, 1012, 'Aditya', 'Rana', '1975-09-08', 'Male', 2000, 2, 2, 1),
(13, 1013, 'Sangeeta', 'Sinha', '1975-05-08', 'Female', 2001, 2, 3, 1),
(14, 1014, 'Sumit', 'Singh', '1985-05-08', 'Male', 2015, 2, 4, 1),
(15, 1015, 'Isha', 'Sharma', '1970-02-22', 'Female', 2000, 2, 5, 1),
(16, 1016, 'Amit', 'Patil', '1974-03-06', 'Male', 2001, 2, 6, 1),
(17, 1017, 'Raveena', 'Pandey', '1978-11-12', 'Female', 2005, 2, 7, 1),
(18, 1018, 'Anmol', 'Jain', '1979-12-01', 'Male', 2003, 2, 8, 1),
(19, 1019, 'Megha', 'Mahato', '1976-10-08', 'Female', 2001, 2, 9, 1),
(20, 1020, 'Ravi', 'Rana', '1975-07-08', 'Male', 2002, 2, 10, 1),
(21, 1021, 'Aradhya', 'Patil', '1980-01-27', 'Female', 2002, 5, 1, 1),
(22, 1022, 'Ashwin', 'Kirdat', '1982-03-07', 'Male', 2007, 5, 2, 1),
(23, 1023, 'Arundati', 'Singh', '1975-04-12', 'Female', 2002, 5, 3, 1),
(24, 1024, 'Jignesh', 'Mahadik', '1976-05-19', 'Male', 2005, 5, 4, 1),
(25, 1025, 'Riya', 'Sharma', '1974-06-28', 'Female', 2006, 5, 5, 1),
(26, 1026, 'Sohail', 'Pandey', '1979-04-08', 'Male', 2008, 5, 6, 1),
(27, 1027, 'Sonam', 'Rana', '1982-06-15', 'Female', 2002, 5, 7, 1),
(28, 1028, 'Shiva', 'Vyas', '1977-12-20', 'Male', 2005, 5, 8, 1),
(29, 1029, 'Sonia', 'Murmu', '1978-07-07', 'Female', 2002, 5, 9, 1),
(30, 1030, 'Shivali', 'Kirdat', '1983-05-18', 'Female', 2003, 5, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblstudent`
--

CREATE TABLE `tblstudent` (
  `Studentid` int(11) NOT NULL,
  `StudentPrn` int(11) NOT NULL,
  `StudentFname` varchar(100) NOT NULL,
  `StudentLname` varchar(100) NOT NULL,
  `StudentDob` date NOT NULL,
  `StudentGender` varchar(100) NOT NULL,
  `StudentJoinyear` year(4) NOT NULL,
  `StudentPassyear` year(4) NOT NULL,
  `Courseid` int(11) NOT NULL,
  `Deptid` int(11) NOT NULL,
  `IsActive` tinyint(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblstudent`
--

INSERT INTO `tblstudent` (`Studentid`, `StudentPrn`, `StudentFname`, `StudentLname`, `StudentDob`, `StudentGender`, `StudentJoinyear`, `StudentPassyear`, `Courseid`, `Deptid`, `IsActive`) VALUES
(1, 1042180522, 'Abhilasha', 'Kumari', '1997-07-09', 'Female', 2018, 2022, 1, 1, 1),
(2, 1042180052, 'Balwant', 'Ghanekar', '1997-04-11', 'Male', 2018, 2022, 2, 1, 1),
(3, 1042180091, 'Sayali', 'Patil', '1995-05-15', 'Female', 2015, 2019, 1, 1, 1),
(4, 1042180851, 'Bhaskar', 'Mondal', '1995-09-21', 'Male', 2015, 2019, 2, 1, 1),
(5, 1042180021, 'Shivali', 'Kirdat', '1997-08-31', 'Female', 2018, 2022, 3, 2, 1),
(6, 1042180211, 'Chirag', 'Kapadia', '1997-05-30', 'Male', 2018, 2022, 4, 2, 1),
(7, 1042185022, 'Sayali', 'Amrutkar', '1995-12-28', 'Female', 2015, 2019, 3, 2, 1),
(8, 1042180999, 'Sidharth', 'Walke', '1995-01-02', 'Male', 2015, 2019, 4, 2, 1),
(9, 1042180320, 'Vinaya', 'Kulkarni', '1997-08-21', 'Female', 2018, 2022, 5, 3, 1),
(10, 1042180444, 'Saurabh', 'Pandey', '1997-02-03', 'Male', 2018, 2022, 6, 3, 1),
(11, 1042180332, 'Pratiksha', 'Vidhale', '1995-03-09', 'Female', 2015, 2019, 5, 3, 1),
(12, 1042180333, 'Himanshu', 'Purohit', '1995-04-29', 'Male', 2015, 2019, 6, 3, 1),
(13, 1042180334, 'Kanu', 'Pradhan', '1997-11-01', 'Female', 2018, 2021, 7, 4, 1),
(14, 1042180335, 'Shiva', 'Mahto', '1995-08-22', 'Male', 2015, 2018, 7, 4, 1),
(15, 1042180336, 'Pragya', 'Behra', '1997-10-18', 'Female', 2018, 2021, 8, 4, 1),
(16, 1042180337, 'Abhinay', 'Kumar', '1995-11-21', 'Male', 2015, 2018, 8, 4, 1),
(17, 1042180338, 'Payal', 'Khot', '1997-11-07', 'Female', 2018, 2022, 9, 5, 1),
(18, 1042180339, 'Santosh', 'Sahu', '1995-12-12', 'Male', 2015, 2019, 9, 5, 1),
(19, 1042180340, 'Nikita', 'Agarwal', '1997-10-09', 'Female', 2018, 2022, 10, 5, 1),
(20, 1042180341, 'Srikanth', 'Pandey', '1995-05-11', 'Male', 2015, 2019, 10, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblstudentgroup`
--

CREATE TABLE `tblstudentgroup` (
  `Sgid` int(11) NOT NULL,
  `Sgname` varchar(100) NOT NULL,
  `Courseid` int(11) NOT NULL,
  `Deptid` int(11) NOT NULL,
  `Sgyear` tinyint(4) NOT NULL,
  `Uid` int(11) NOT NULL,
  `IsAccpeted` tinyint(4) NOT NULL,
  `IsActive` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblstudentgroup`
--

INSERT INTO `tblstudentgroup` (`Sgid`, `Sgname`, `Courseid`, `Deptid`, `Sgyear`, `Uid`, `IsAccpeted`, `IsActive`) VALUES
(18, 'Group MCA', 1, 1, 3, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbluserskill`
--

CREATE TABLE `tbluserskill` (
  `Usid` int(11) NOT NULL,
  `Skillid` int(11) NOT NULL,
  `Uid` int(11) NOT NULL,
  `IsActive` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblwork`
--

CREATE TABLE `tblwork` (
  `Wid` int(11) NOT NULL,
  `Designation` varchar(100) NOT NULL,
  `Oragnisation` varchar(100) NOT NULL,
  `JoinDate` date NOT NULL,
  `leavingDate` date NOT NULL,
  `Experience` text NOT NULL,
  `Uid` int(11) NOT NULL,
  `IsActive` tinyint(4) NOT NULL,
  `CurrentComp` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbuniversity`
--

CREATE TABLE `tbuniversity` (
  `Universityid` int(11) NOT NULL,
  `UniversityName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbuniversity`
--

INSERT INTO `tbuniversity` (`Universityid`, `UniversityName`) VALUES
(1, 'MIT-WPU'),
(2, 'Barkatullah University'),
(3, 'University of Calcutta'),
(4, 'Delhi University'),
(5, 'Savitribai phule pune university'),
(6, 'Madras university');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblblogs`
--
ALTER TABLE `tblblogs`
  ADD PRIMARY KEY (`Bid`);

--
-- Indexes for table `tblboard`
--
ALTER TABLE `tblboard`
  ADD PRIMARY KEY (`Boardid`);

--
-- Indexes for table `tblclass`
--
ALTER TABLE `tblclass`
  ADD PRIMARY KEY (`Classid`);

--
-- Indexes for table `tblcollege`
--
ALTER TABLE `tblcollege`
  ADD PRIMARY KEY (`Collegeid`);

--
-- Indexes for table `tblcontact`
--
ALTER TABLE `tblcontact`
  ADD PRIMARY KEY (`Cid`);

--
-- Indexes for table `tblcourse`
--
ALTER TABLE `tblcourse`
  ADD PRIMARY KEY (`Courseid`);

--
-- Indexes for table `tbldepartment`
--
ALTER TABLE `tbldepartment`
  ADD PRIMARY KEY (`Deptid`);

--
-- Indexes for table `tbldesignation`
--
ALTER TABLE `tbldesignation`
  ADD PRIMARY KEY (`Desigid`);

--
-- Indexes for table `tbleducation`
--
ALTER TABLE `tbleducation`
  ADD PRIMARY KEY (`Educationid`);

--
-- Indexes for table `tblevent`
--
ALTER TABLE `tblevent`
  ADD PRIMARY KEY (`Eid`);

--
-- Indexes for table `tblgroupmember`
--
ALTER TABLE `tblgroupmember`
  ADD PRIMARY KEY (`Gmid`);

--
-- Indexes for table `tblregister`
--
ALTER TABLE `tblregister`
  ADD PRIMARY KEY (`Uid`);

--
-- Indexes for table `tblskill`
--
ALTER TABLE `tblskill`
  ADD PRIMARY KEY (`Skillid`);

--
-- Indexes for table `tblstaff`
--
ALTER TABLE `tblstaff`
  ADD PRIMARY KEY (`Staffid`);

--
-- Indexes for table `tblstudent`
--
ALTER TABLE `tblstudent`
  ADD PRIMARY KEY (`Studentid`);

--
-- Indexes for table `tblstudentgroup`
--
ALTER TABLE `tblstudentgroup`
  ADD PRIMARY KEY (`Sgid`);

--
-- Indexes for table `tbluserskill`
--
ALTER TABLE `tbluserskill`
  ADD PRIMARY KEY (`Usid`);

--
-- Indexes for table `tblwork`
--
ALTER TABLE `tblwork`
  ADD PRIMARY KEY (`Wid`);

--
-- Indexes for table `tbuniversity`
--
ALTER TABLE `tbuniversity`
  ADD PRIMARY KEY (`Universityid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblblogs`
--
ALTER TABLE `tblblogs`
  MODIFY `Bid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblboard`
--
ALTER TABLE `tblboard`
  MODIFY `Boardid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tblclass`
--
ALTER TABLE `tblclass`
  MODIFY `Classid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblcollege`
--
ALTER TABLE `tblcollege`
  MODIFY `Collegeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tblcontact`
--
ALTER TABLE `tblcontact`
  MODIFY `Cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblcourse`
--
ALTER TABLE `tblcourse`
  MODIFY `Courseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbldepartment`
--
ALTER TABLE `tbldepartment`
  MODIFY `Deptid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbldesignation`
--
ALTER TABLE `tbldesignation`
  MODIFY `Desigid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbleducation`
--
ALTER TABLE `tbleducation`
  MODIFY `Educationid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblevent`
--
ALTER TABLE `tblevent`
  MODIFY `Eid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblgroupmember`
--
ALTER TABLE `tblgroupmember`
  MODIFY `Gmid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblregister`
--
ALTER TABLE `tblregister`
  MODIFY `Uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblskill`
--
ALTER TABLE `tblskill`
  MODIFY `Skillid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `tblstaff`
--
ALTER TABLE `tblstaff`
  MODIFY `Staffid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tblstudent`
--
ALTER TABLE `tblstudent`
  MODIFY `Studentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tblstudentgroup`
--
ALTER TABLE `tblstudentgroup`
  MODIFY `Sgid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbluserskill`
--
ALTER TABLE `tbluserskill`
  MODIFY `Usid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblwork`
--
ALTER TABLE `tblwork`
  MODIFY `Wid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbuniversity`
--
ALTER TABLE `tbuniversity`
  MODIFY `Universityid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
