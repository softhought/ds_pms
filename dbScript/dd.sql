/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.5.5-10.1.34-MariaDB : Database - teasamrat
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`teasamrat` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `teasamrat`;

/*Table structure for table `closing_stock_accnt_mapping` */

DROP TABLE IF EXISTS `closing_stock_accnt_mapping`;

CREATE TABLE `closing_stock_accnt_mapping` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `closing_stk_dr_accId` int(20) DEFAULT NULL,
  `closing_stk_cr_accid` int(20) DEFAULT NULL,
  `companyId` int(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `closing_stock_accnt_mapping` */

insert  into `closing_stock_accnt_mapping`(`id`,`closing_stk_dr_accId`,`closing_stk_cr_accid`,`companyId`) values (1,628,831,1),(2,717,NULL,3);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
