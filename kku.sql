/* Database name = kku */
CREATE TABLE `department` (
  `NAME` varchar(16) NOT NULL,
  `PHONENUMBER` varchar(16) DEFAULT NULL,
  `LOCATION` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`NAME`)
);
CREATE TABLE `openedlecture` (
  `lectureNumber` char(4) NOT NULL,
  `classiFication` char(4) NOT NULL,
  `PersonLimit` int NOT NULL,
  `Language` varchar(10) NOT NULL,
  `department` varchar(16) NOT NULL,
  `lectureTime` varchar(16) NOT NULL,
  `gradePoint` smallint NOT NULL,
  `lectureName` varchar(16) NOT NULL,
  `professor` varchar(16) NOT NULL,
  `grade` int NOT NULL,
  PRIMARY KEY (`lectureNumber`)
);
CREATE TABLE `professor` (
  `professorID` varchar(16) NOT NULL,
  `password` varchar(16) NOT NULL,
  `department` varchar(16) NOT NULL,
  `Residentnumber` varchar(16) NOT NULL,
  `major` varchar(16) NOT NULL,
  `lab` varchar(16) NOT NULL,
  `professorName` varchar(16) NOT NULL,
  `Phonenumber` varchar(30) NOT NULL,
  `addr` varchar(30) NOT NULL,
  `mDate` date NOT NULL,
  PRIMARY KEY (`professorID`)
);
CREATE TABLE `student` (
  `studentNumber` char(9) NOT NULL,
  `password` varchar(16) NOT NULL,
  `department` varchar(16) NOT NULL,
  `ResidentNumber` char(13) NOT NULL,
  `addr` varchar(30) NOT NULL,
  `major` varchar(16) NOT NULL,
  `studentName` varchar(16) NOT NULL,
  `mDate` date NOT NULL,
  `phonenumber` varchar(16) NOT NULL,
  PRIMARY KEY (`studentNumber`)
);

