/*
SQLyog Ultimate v8.5 
MySQL - 5.5.23 : Database - b_l_bank
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`b_l_bank` /*!40100 DEFAULT CHARACTER SET utf8 */;

/*Table structure for table `bl_ctg` */

CREATE TABLE `bl_ctg` (
  `Ctg_Id` varchar(10) NOT NULL,
  `Ctg_Name` varchar(20) DEFAULT NULL,
  `Ctg_Desc` text,
  PRIMARY KEY (`Ctg_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `bl_ctg` */

insert  into `bl_ctg`(`Ctg_Id`,`Ctg_Name`,`Ctg_Desc`) values ('001','A',NULL);
insert  into `bl_ctg`(`Ctg_Id`,`Ctg_Name`,`Ctg_Desc`) values ('002','B',NULL);
insert  into `bl_ctg`(`Ctg_Id`,`Ctg_Name`,`Ctg_Desc`) values ('003','O',NULL);

/*Table structure for table `center` */

CREATE TABLE `center` (
  `center_id` varchar(20) NOT NULL,
  `center_name` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`center_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `center` */

insert  into `center`(`center_id`,`center_name`) values ('111','orotha');
insert  into `center`(`center_id`,`center_name`) values ('222','sembel');

/*Table structure for table `donation` */

CREATE TABLE `donation` (
  `donation_id` varchar(20) NOT NULL,
  `Fname` varchar(100) DEFAULT NULL,
  `Lname` varchar(100) DEFAULT NULL,
  `gen` char(1) DEFAULT NULL,
  `Age` int(3) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `don_date` date DEFAULT NULL,
  `Bl_type` varchar(10) DEFAULT NULL,
  UNIQUE KEY `NewIndex1` (`donation_id`),
  KEY `FK_donation` (`Bl_type`),
  CONSTRAINT `FK_donation` FOREIGN KEY (`Bl_type`) REFERENCES `bl_ctg` (`Ctg_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `donation` */

insert  into `donation`(`donation_id`,`Fname`,`Lname`,`gen`,`Age`,`address`,`don_date`,`Bl_type`) values ('don_111','ttt','fff','M',27,'aaaaaaaaaaaaa','2018-10-10','001');
insert  into `donation`(`donation_id`,`Fname`,`Lname`,`gen`,`Age`,`address`,`don_date`,`Bl_type`) values ('don_222','sss','ddd','F',20,'vvvvvvvvvv','2018-10-11','002');
insert  into `donation`(`donation_id`,`Fname`,`Lname`,`gen`,`Age`,`address`,`don_date`,`Bl_type`) values ('don_333','rrr','bbbb','M',56,'uuuuuuuuuuu','2018-10-10','001');
insert  into `donation`(`donation_id`,`Fname`,`Lname`,`gen`,`Age`,`address`,`don_date`,`Bl_type`) values ('don_444','kkkk','nnnn','F',17,'oooooo','2018-12-10','003');
insert  into `donation`(`donation_id`,`Fname`,`Lname`,`gen`,`Age`,`address`,`don_date`,`Bl_type`) values ('don_555',NULL,NULL,'M',NULL,NULL,NULL,NULL);
insert  into `donation`(`donation_id`,`Fname`,`Lname`,`gen`,`Age`,`address`,`don_date`,`Bl_type`) values ('don_666','uuu','yyy','F',NULL,NULL,NULL,NULL);

/*Table structure for table `donor_account` */

CREATE TABLE `donor_account` (
  `donation_id` varchar(50) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  UNIQUE KEY `NewIndex1` (`donation_id`),
  KEY `FK_donor_accountn` (`role`),
  CONSTRAINT `FK_donor_account` FOREIGN KEY (`role`) REFERENCES `roles` (`role_id`),
  CONSTRAINT `FK_donor_account_1` FOREIGN KEY (`donation_id`) REFERENCES `donation` (`donation_id`),
  CONSTRAINT `FK_donor_account_11` FOREIGN KEY (`donation_id`) REFERENCES `donation` (`donation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `donor_account` */

insert  into `donor_account`(`donation_id`,`username`,`password`,`role`) values ('don_111','sss','sss','444');
insert  into `donor_account`(`donation_id`,`username`,`password`,`role`) values ('don_222','aaa','aaa','444');
insert  into `donor_account`(`donation_id`,`username`,`password`,`role`) values ('don_333','ttt','ttt','444');
insert  into `donor_account`(`donation_id`,`username`,`password`,`role`) values ('don_444','yyy','yyy','444');
insert  into `donor_account`(`donation_id`,`username`,`password`,`role`) values ('don_555','zzz','zzz','444');
insert  into `donor_account`(`donation_id`,`username`,`password`,`role`) values ('don_666','hhh','hhh','444');

/*Table structure for table `person_info` */

CREATE TABLE `person_info` (
  `Per_id` varchar(50) NOT NULL,
  `Fname` text,
  `Lname` text,
  `Age` int(3) DEFAULT NULL,
  `Gender` char(1) DEFAULT NULL,
  `Favorite` varchar(100) DEFAULT NULL,
  `Ctg_Id` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`Per_id`),
  KEY `FK_person_info` (`Ctg_Id`),
  CONSTRAINT `FK_person_info` FOREIGN KEY (`Ctg_Id`) REFERENCES `bl_ctg` (`Ctg_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `person_info` */

insert  into `person_info`(`Per_id`,`Fname`,`Lname`,`Age`,`Gender`,`Favorite`,`Ctg_Id`) values ('34r642','gg','bb',5,'M','0','003');

/*Table structure for table `posts` */

CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post` text,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `posts` */

/*Table structure for table `roles` */

CREATE TABLE `roles` (
  `role_id` varchar(10) NOT NULL,
  `role_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `roles` */

insert  into `roles`(`role_id`,`role_name`) values ('111','user');
insert  into `roles`(`role_id`,`role_name`) values ('222','admin');
insert  into `roles`(`role_id`,`role_name`) values ('333','moderator');
insert  into `roles`(`role_id`,`role_name`) values ('444','donor');

/*Table structure for table `spl_ctg` */

CREATE TABLE `spl_ctg` (
  `spl_ctg_id` varchar(20) NOT NULL,
  `spl_ctg_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`spl_ctg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `spl_ctg` */

insert  into `spl_ctg`(`spl_ctg_id`,`spl_ctg_name`) values ('AAA','Red');
insert  into `spl_ctg`(`spl_ctg_id`,`spl_ctg_name`) values ('BBB','White');
insert  into `spl_ctg`(`spl_ctg_id`,`spl_ctg_name`) values ('CCC','hemoglopin');
insert  into `spl_ctg`(`spl_ctg_id`,`spl_ctg_name`) values ('DDD','Unit');

/*Table structure for table `spl_tbl` */

CREATE TABLE `spl_tbl` (
  `packet_id` varchar(20) NOT NULL,
  `donation_id` varchar(50) DEFAULT NULL,
  `spl_ctg_id` varchar(20) DEFAULT 'Null',
  `center_id` varchar(20) DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `date_taken` date DEFAULT NULL,
  `status` varchar(5) DEFAULT NULL,
  `descr` text,
  PRIMARY KEY (`packet_id`),
  KEY `FK_spl_tbl` (`center_id`),
  KEY `FK_spl_tbl_1` (`spl_ctg_id`),
  KEY `FK_spl_tbl_don_1` (`donation_id`),
  CONSTRAINT `FK_spl_tbl` FOREIGN KEY (`center_id`) REFERENCES `center` (`center_id`),
  CONSTRAINT `FK_spl_tbl_1` FOREIGN KEY (`spl_ctg_id`) REFERENCES `spl_ctg` (`spl_ctg_id`),
  CONSTRAINT `FK_spl_tbl_don_1` FOREIGN KEY (`donation_id`) REFERENCES `donation` (`donation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `spl_tbl` */

insert  into `spl_tbl`(`packet_id`,`donation_id`,`spl_ctg_id`,`center_id`,`date_created`,`date_taken`,`status`,`descr`) values ('p1','don_111','AAA','111','2018-01-10','2018-11-30',NULL,NULL);
insert  into `spl_tbl`(`packet_id`,`donation_id`,`spl_ctg_id`,`center_id`,`date_created`,`date_taken`,`status`,`descr`) values ('p10','don_444','BBB',NULL,'2018-10-15',NULL,NULL,'bbbb');
insert  into `spl_tbl`(`packet_id`,`donation_id`,`spl_ctg_id`,`center_id`,`date_created`,`date_taken`,`status`,`descr`) values ('p11','don_444','BBB','222','2018-10-15','2018-10-30',NULL,'bbbb');
insert  into `spl_tbl`(`packet_id`,`donation_id`,`spl_ctg_id`,`center_id`,`date_created`,`date_taken`,`status`,`descr`) values ('p15','don_222','AAA',NULL,'2018-10-10',NULL,NULL,'');
insert  into `spl_tbl`(`packet_id`,`donation_id`,`spl_ctg_id`,`center_id`,`date_created`,`date_taken`,`status`,`descr`) values ('p19','don_222','AAA',NULL,'2018-01-10',NULL,NULL,'');
insert  into `spl_tbl`(`packet_id`,`donation_id`,`spl_ctg_id`,`center_id`,`date_created`,`date_taken`,`status`,`descr`) values ('p2','don_111','CCC',NULL,'2018-01-10',NULL,NULL,'');
insert  into `spl_tbl`(`packet_id`,`donation_id`,`spl_ctg_id`,`center_id`,`date_created`,`date_taken`,`status`,`descr`) values ('p3','don_111','CCC',NULL,'2018-01-10',NULL,NULL,NULL);
insert  into `spl_tbl`(`packet_id`,`donation_id`,`spl_ctg_id`,`center_id`,`date_created`,`date_taken`,`status`,`descr`) values ('p4','don_222','AAA','222','2018-03-10','2018-10-20',NULL,NULL);
insert  into `spl_tbl`(`packet_id`,`donation_id`,`spl_ctg_id`,`center_id`,`date_created`,`date_taken`,`status`,`descr`) values ('p5','don_444','BBB','222','2018-10-15','2018-10-20',NULL,NULL);
insert  into `spl_tbl`(`packet_id`,`donation_id`,`spl_ctg_id`,`center_id`,`date_created`,`date_taken`,`status`,`descr`) values ('p6','don_444','CCC','111','2018-10-15','2018-10-20',NULL,'descn');
insert  into `spl_tbl`(`packet_id`,`donation_id`,`spl_ctg_id`,`center_id`,`date_created`,`date_taken`,`status`,`descr`) values ('p7','don_444','BBB','222','2018-10-15','2018-10-20',NULL,'bbbb');
insert  into `spl_tbl`(`packet_id`,`donation_id`,`spl_ctg_id`,`center_id`,`date_created`,`date_taken`,`status`,`descr`) values ('p8','don_444','AAA',NULL,'2018-10-15',NULL,NULL,'bbbb');
insert  into `spl_tbl`(`packet_id`,`donation_id`,`spl_ctg_id`,`center_id`,`date_created`,`date_taken`,`status`,`descr`) values ('p9','don_444','DDD','111','2018-10-15','2018-10-20',NULL,'bbbb');

/*Table structure for table `spl_tbl_center_tbl` */

CREATE TABLE `spl_tbl_center_tbl` (
  `center_id` varchar(50) NOT NULL,
  `packet_id` varchar(20) DEFAULT NULL,
  `date_taken` date DEFAULT NULL,
  KEY `FK_spl_tbl_center_tbl1` (`packet_id`),
  KEY `FK_spl_tbl_center_tbl` (`center_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `spl_tbl_center_tbl` */

insert  into `spl_tbl_center_tbl`(`center_id`,`packet_id`,`date_taken`) values ('111','bl_001','2018-04-10');

/*Table structure for table `spl_tbl_spl_ctg` */

CREATE TABLE `spl_tbl_spl_ctg` (
  `spl_id` varchar(20) DEFAULT NULL,
  `spl_ctg_id` varchar(20) DEFAULT NULL,
  `qnt` int(11) DEFAULT NULL,
  `status` varchar(5) DEFAULT NULL,
  KEY `FK_spl_tbl_spl_ctg` (`spl_id`),
  KEY `FK_spl_tbl_spl_ctg1` (`spl_ctg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `spl_tbl_spl_ctg` */

insert  into `spl_tbl_spl_ctg`(`spl_id`,`spl_ctg_id`,`qnt`,`status`) values ('bl_001','AAA',10,NULL);
insert  into `spl_tbl_spl_ctg`(`spl_id`,`spl_ctg_id`,`qnt`,`status`) values ('bl_001','BBB',20,NULL);
insert  into `spl_tbl_spl_ctg`(`spl_id`,`spl_ctg_id`,`qnt`,`status`) values ('bl_001','CCC',30,NULL);
insert  into `spl_tbl_spl_ctg`(`spl_id`,`spl_ctg_id`,`qnt`,`status`) values ('bl_002','AAA',11,NULL);
insert  into `spl_tbl_spl_ctg`(`spl_id`,`spl_ctg_id`,`qnt`,`status`) values ('bl_002','BBB',22,NULL);
insert  into `spl_tbl_spl_ctg`(`spl_id`,`spl_ctg_id`,`qnt`,`status`) values ('bl_002','CCC',33,NULL);
insert  into `spl_tbl_spl_ctg`(`spl_id`,`spl_ctg_id`,`qnt`,`status`) values ('bl_003','DDD',55,NULL);

/*Table structure for table `user` */

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role_id` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`username`),
  KEY `FK_user` (`role_id`),
  CONSTRAINT `FK_user` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `user` */

insert  into `user`(`username`,`password`,`role_id`) values ('aaa','aaa','111');
insert  into `user`(`username`,`password`,`role_id`) values ('bbb','bbb','222');
insert  into `user`(`username`,`password`,`role_id`) values ('ccc','ccc','333');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
