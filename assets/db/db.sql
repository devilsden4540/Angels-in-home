/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 5.5.8-log : Database - angle_homes
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`angle_homes` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `angle_homes`;

/*Table structure for table `bookings` */

DROP TABLE IF EXISTS `bookings`;

CREATE TABLE `bookings` (
  `bid` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) DEFAULT NULL,
  `sid` int(11) DEFAULT NULL,
  `nid` int(11) DEFAULT NULL,
  `bdate` date DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Pending',
  PRIMARY KEY (`bid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `bookings` */

insert  into `bookings`(`bid`,`cid`,`sid`,`nid`,`bdate`,`status`) values 
(1,2,3,1,'2022-10-15','Approved'),
(7,4,3,1,'2022-10-15','Approved');

/*Table structure for table `customers` */

DROP TABLE IF EXISTS `customers`;

CREATE TABLE `customers` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(30) DEFAULT NULL,
  `district` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `customers` */

insert  into `customers`(`cid`,`name`,`email`,`phone`,`address`,`district`) values 
(2,'AK','ak@mail.com','9090909090','Ak Adrs\r\nVVV','Ernakulam'),
(4,'Deepak','de@mail.com','6787678678','DE\r\nADRS','Ernakulam');

/*Table structure for table `feedback` */

DROP TABLE IF EXISTS `feedback`;

CREATE TABLE `feedback` (
  `fid` int(11) NOT NULL AUTO_INCREMENT,
  `nid` int(11) DEFAULT NULL,
  `feedback` varchar(200) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`fid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `feedback` */

insert  into `feedback`(`fid`,`nid`,`feedback`,`cid`,`date`) values 
(1,1,'Nice',2,'2022-10-15');

/*Table structure for table `login` */

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
  `lid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `uname` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `utype` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`lid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `login` */

insert  into `login`(`lid`,`uid`,`uname`,`password`,`utype`,`status`) values 
(1,1,'vis@mail.com','Vis@12345','Nurse','Active'),
(3,0,'admin@gmail.com','admin','Admin','Active'),
(4,2,'ak@mail.com','Ak@12345','Customer','Active'),
(6,4,'de@mail.com','De@12345','Customer','Active');

/*Table structure for table `nurses` */

DROP TABLE IF EXISTS `nurses`;

CREATE TABLE `nurses` (
  `nid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `address` varchar(30) DEFAULT NULL,
  `district` varchar(30) DEFAULT NULL,
  `qualification` varchar(30) DEFAULT NULL,
  `experience` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`nid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `nurses` */

insert  into `nurses`(`nid`,`name`,`email`,`phone`,`address`,`district`,`qualification`,`experience`) values 
(1,'Vis','vis@mail.com','9898989890','Vis Adrs','Ernakulam','MSC','5');

/*Table structure for table `service` */

DROP TABLE IF EXISTS `service`;

CREATE TABLE `service` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `service` varchar(30) DEFAULT NULL,
  `docs` varchar(200) DEFAULT NULL,
  `cost` varchar(20) DEFAULT NULL,
  `nid` int(11) DEFAULT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `service` */

insert  into `service`(`sid`,`service`,`docs`,`cost`,`nid`) values 
(3,'Home care','./images/13184987_5127314.jpg','20000',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
