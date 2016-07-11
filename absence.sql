/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50536
Source Host           : localhost:3306
Source Database       : absence

Target Server Type    : MYSQL
Target Server Version : 50536
File Encoding         : 65001

Date: 2016-07-06 20:13:12
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `course`
-- ----------------------------
DROP TABLE IF EXISTS `course`;
CREATE TABLE `course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cGrade` varchar(5) DEFAULT NULL,
  `cName` varchar(20) DEFAULT NULL,
  `tID` varchar(13) DEFAULT NULL,
  `cClass` varchar(30) DEFAULT NULL,
  `aID` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of course
-- ----------------------------
INSERT INTO course VALUES ('2', '2014', '数据结构', '1', '14-2', '10120070');
INSERT INTO course VALUES ('4', '2013', 'C#', '1', '13-2', '10120070');
INSERT INTO course VALUES ('9', '2016', '项目实训', '1', '16-3', '10120070');
INSERT INTO course VALUES ('12', '2017', 'Java', '1', '17-2', '10120070');
INSERT INTO course VALUES ('13', '2017', 'JavaWeb', '1', '17-5', '10120070');
INSERT INTO course VALUES ('14', '2018', 'JavaWeb', '1', '18-3', '10120070');

-- ----------------------------
-- Table structure for `present`
-- ----------------------------
DROP TABLE IF EXISTS `present`;
CREATE TABLE `present` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sID` varchar(13) DEFAULT NULL,
  `sName` varchar(20) DEFAULT NULL,
  `sDelDate` date DEFAULT NULL,
  `sAddTimes` int(11) DEFAULT NULL,
  `sCourse` varchar(255) DEFAULT NULL,
  `sTeacher` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of present
-- ----------------------------
INSERT INTO present VALUES ('5', '1427152083', '杨森源', '2016-07-12', null, '2', '1');
INSERT INTO present VALUES ('6', '1427152073', '李贤', '2016-07-12', null, '4', '1');
INSERT INTO present VALUES ('23', '1427152073', '李贤', '2016-07-07', null, '9', '1');
INSERT INTO present VALUES ('24', '1427152073', '李贤', '2016-07-06', null, '2', '1');
INSERT INTO present VALUES ('25', '1427152073', '李贤', '2016-07-06', null, '2', '1');

-- ----------------------------
-- Table structure for `student`
-- ----------------------------
DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sID` varchar(13) DEFAULT NULL,
  `sName` varchar(20) DEFAULT NULL,
  `sCourse` varchar(30) DEFAULT NULL,
  `sAssistant` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of student
-- ----------------------------
INSERT INTO student VALUES ('8', '1427152073', '李贤', '4', '10120070');
INSERT INTO student VALUES ('9', '1427152083', '杨森源', '4', '10120070');
INSERT INTO student VALUES ('10', '1427152073', '李贤', '4', '10120070');
INSERT INTO student VALUES ('11', '1427152083', '杨森源', '4', '10120070');
INSERT INTO student VALUES ('12', '1427152073', '李贤', '4', '10120070');
INSERT INTO student VALUES ('13', '1427152083', '杨森源', '4', '10120070');
INSERT INTO student VALUES ('16', '1427152073', '李贤', '2', '10120070');
INSERT INTO student VALUES ('17', '1427152083', '杨森源', '2', '10120070');
INSERT INTO student VALUES ('20', '1427152073', '李贤', '9', '10120070');
INSERT INTO student VALUES ('21', '1427152083', '杨森源', '9', '10120070');
INSERT INTO student VALUES ('22', '1427152073', '李贤', '12', '10120070');
INSERT INTO student VALUES ('23', '1427152083', '杨森源', '12', '10120070');
INSERT INTO student VALUES ('24', '1427152073', '李贤', '13', '10120070');
INSERT INTO student VALUES ('25', '1427152083', '杨森源', '13', '10120070');
INSERT INTO student VALUES ('26', '1427152073', '李贤', '14', '10120070');
INSERT INTO student VALUES ('27', '1427152083', '杨森源', '14', '10120070');

-- ----------------------------
-- Table structure for `tuser`
-- ----------------------------
DROP TABLE IF EXISTS `tuser`;
CREATE TABLE `tuser` (
  `tID` varchar(255) NOT NULL,
  `tName` varchar(50) DEFAULT NULL,
  `tPassword` varchar(80) DEFAULT NULL,
  `tIsAssistant` int(2) DEFAULT '0',
  PRIMARY KEY (`tID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tuser
-- ----------------------------
INSERT INTO tuser VALUES ('1', '李贤', 'e10adc3949ba59abbe56e057f20f883e', '0');
INSERT INTO tuser VALUES ('10120070', '姚莉', '123456', '1');
