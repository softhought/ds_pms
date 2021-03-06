/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.5.5-10.1.34-MariaDB : Database - pms
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`pms` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `pms`;

/*Table structure for table `activity_log` */

DROP TABLE IF EXISTS `activity_log`;

CREATE TABLE `activity_log` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `activity_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `activity_module` varchar(255) DEFAULT NULL,
  `module_master_id` int(20) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `from_method` varchar(100) DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `user_browser` varchar(255) DEFAULT NULL,
  `user_platform` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `activity_log` */

/*Table structure for table `advice_details` */

DROP TABLE IF EXISTS `advice_details`;

CREATE TABLE `advice_details` (
  `advice_details_id` int(10) NOT NULL AUTO_INCREMENT,
  `case_master_id` int(10) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `advice_type` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `advice` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `is_advice_option` enum('Y','N') CHARACTER SET latin1 DEFAULT NULL,
  `advice_options` varchar(500) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`advice_details_id`)
) ENGINE=InnoDB AUTO_INCREMENT=506 DEFAULT CHARSET=utf8;

/*Data for the table `advice_details` */

insert  into `advice_details`(`advice_details_id`,`case_master_id`,`created_on`,`advice_type`,`advice`,`is_advice_option`,`advice_options`) values (65,4,'2019-07-18 00:00:00','I','1. To avoid physical and mental stress.Have adequate sleep preferably 2 hours in afternoon and 8 hours at night.','N','a'),(66,4,'2019-07-18 00:00:00','I','2. To eat healthy diet -  to eat fresh fruits,fresh vegetables and freshly prepared food mostly,to avoid processed food as much as possible.','N',''),(67,4,'2019-07-18 00:00:00','I','3. To limit coffee consumption - not more than 1 cup per day. To stop smoking/drinking(if used to do such). Not to take meat liver.','N',''),(68,4,'2019-07-18 00:00:00','I','4. Not to lift heavy weight .Avoid jerking as far as possible.','N',''),(69,4,'2019-07-18 00:00:00','II','1. up to 28 weeks -> To attend emergency in case of heavy bleeding per vagina / severe pain abdomen / any other serious problem occurence .','N',''),(70,4,'2019-07-18 00:00:00','II','2. after 28 weeks -> to attend emergency in case of  severe pain abdomen / bleeding per vagina/less foetal movement(<10 / 2 hr while using in bed in lateral position ) /water leakage.','N',''),(71,4,'2019-07-18 00:00:00','III','1. To check bp','Y','daily,before taking  tablet given for raised blood pressure,on alternate days,twice weekly,others'),(72,4,'2019-07-18 00:00:00','III','2. To check CBG as','Y','advised,others,fasting before lunch 2 hr after lunch'),(73,4,'2019-07-18 00:00:00','III','3. To attend emergency in case of blurring of vision,headache,vomiting,epigastric pain,less urine volume,double vision,fits','N',''),(101,4,'2019-07-19 00:00:00','I','1. To avoid physical and mental stress.Have adequate sleep preferably 2 hours in afternoon and 8 hours at night.','N','a'),(102,4,'2019-07-19 00:00:00','I','2. To eat healthy diet -  to eat fresh fruits,fresh vegetables and freshly prepared food mostly,to avoid processed food as much as possible.','N',''),(103,4,'2019-07-19 00:00:00','I','3. To limit coffee consumption - not more than 1 cup per day. To stop smoking/drinking(if used to do such). Not to take meat liver.\r\n','N',''),(104,4,'2019-07-19 00:00:00','I','4. Not to lift heavy weight .Avoid jerking as far as possible.','N',''),(105,4,'2019-07-19 00:00:00','II','1. up to 28 weeks -> To attend emergency in case of heavy bleeding per vagina / severe pain abdomen / any other serious problem occurence .','N',''),(106,4,'2019-07-19 00:00:00','II','2. after 28 weeks -> to attend emergency in case of  severe pain abdomen / bleeding per vagina/less foetal movement(<10 / 2 hr while using in bed in lateral position ) /water leakage.','N',''),(107,4,'2019-07-19 00:00:00','III','1. To check bp','Y','daily,on alternate days,twice weekly,others'),(108,4,'2019-07-19 00:00:00','III','2. To check CBG as','Y','advised,others,fasting before lunch 2 hr after lunch,testing'),(109,4,'2019-07-19 00:00:00','III','3. To attend emergency in case of blurring of vision,headache,vomiting,epigastric pain,less urine volume,double vision,fits','N',''),(128,4,'2019-07-20 00:00:00','I','1. To avoid physical and mental stress.Have adequate sleep preferably 2 hours in afternoon and 8 hours at night.','N','a'),(129,4,'2019-07-20 00:00:00','I','2. To eat healthy diet -  to eat fresh fruits,fresh vegetables and freshly prepared food mostly,to avoid processed food as much as possible.','N',''),(130,4,'2019-07-20 00:00:00','I','3. To limit coffee consumption - not more than 1 cup per day. To stop smoking/drinking(if used to do such). Not to take meat liver.\r\n','N',''),(131,4,'2019-07-20 00:00:00','I','4. Not to lift heavy weight .Avoid jerking as far as possible.','N',''),(132,4,'2019-07-20 00:00:00','II','1. up to 28 weeks -> To attend emergency in case of heavy bleeding per vagina / severe pain abdomen / any other serious problem occurence .','N',''),(133,4,'2019-07-20 00:00:00','II','2. after 28 weeks -> to attend emergency in case of  severe pain abdomen / bleeding per vagina/less foetal movement(<10 / 2 hr while using in bed in lateral position ) /water leakage.','N',''),(134,4,'2019-07-20 00:00:00','III','1. To check bp','Y','daily,on alternate days,twice weekly,others'),(135,4,'2019-07-20 00:00:00','III','2. To check CBG as','Y','advised,others,fasting before lunch 2 hr after lunch,testing'),(136,4,'2019-07-20 00:00:00','III','3. To attend emergency in case of blurring of vision,headache,vomiting,epigastric pain,less urine volume,double vision,fits','N',''),(389,4,'2019-07-22 00:00:00','I','1. To avoid physical and mental stress.Have adequate sleep preferably 2 hours in afternoon and 8 hours at night.','N','a'),(390,4,'2019-07-22 00:00:00','I','2. To eat healthy diet -  to eat fresh fruits,fresh vegetables and freshly prepared food mostly,to avoid processed food as much as possible.','N',''),(391,4,'2019-07-22 00:00:00','I','3. To limit coffee consumption - not more than 1 cup per day. To stop smoking/drinking(if used to do such). Not to take meat liver.\r\n','N',''),(392,4,'2019-07-22 00:00:00','I','4. Not to lift heavy weight .Avoid jerking as far as possible.','N',''),(393,4,'2019-07-22 00:00:00','II','1. up to 28 weeks -> To attend emergency in case of heavy bleeding per vagina / severe pain abdomen / any other serious problem occurence .','N',''),(394,4,'2019-07-22 00:00:00','II','2. after 28 weeks -> to attend emergency in case of  severe pain abdomen / bleeding per vagina/less foetal movement(<10 / 2 hr while using in bed in lateral position ) /water leakage.','N',''),(395,4,'2019-07-22 00:00:00','III','1. To check bp','Y','daily,on alternate days,twice weekly,others'),(396,4,'2019-07-22 00:00:00','III','2. To check CBG as','Y','advised,others,fasting before lunch 2 hr after lunch,testing,abcd'),(397,4,'2019-07-22 00:00:00','III','3. To attend emergency in case of blurring of vision,headache,vomiting,epigastric pain,less urine volume,double vision,fits','N',''),(479,4,'2019-07-23 00:00:00','I','1. To avoid physical and mental stress.Have adequate sleep preferably 2 hours in afternoon and 8 hours at night.','N','a'),(480,4,'2019-07-23 00:00:00','I','2. To eat healthy diet -  to eat fresh fruits,fresh vegetables and freshly prepared food mostly,to avoid processed food as much as possible.','N',''),(481,4,'2019-07-23 00:00:00','I','3. To limit coffee consumption - not more than 1 cup per day. To stop smoking/drinking(if used to do such). Not to take meat liver.\r\n','N',''),(482,4,'2019-07-23 00:00:00','I','4. Not to lift heavy weight .Avoid jerking as far as possible.','N',''),(483,4,'2019-07-23 00:00:00','II','1. up to 28 weeks -> To attend emergency in case of heavy bleeding per vagina / severe pain abdomen / any other serious problem occurence .','N',''),(484,4,'2019-07-23 00:00:00','II','2. after 28 weeks -> to attend emergency in case of  severe pain abdomen / bleeding per vagina/less foetal movement(<10 / 2 hr while using in bed in lateral position ) /water leakage.','N',''),(485,4,'2019-07-23 00:00:00','III','1. To check bp','Y','daily,on alternate days,twice weekly,others'),(486,4,'2019-07-23 00:00:00','III','2. To check CBG as','Y','advised,others,fasting before lunch 2 hr after lunch,testing,abcd'),(487,4,'2019-07-23 00:00:00','III','3. To attend emergency in case of blurring of vision,headache,vomiting,epigastric pain,less urine volume,double vision,fits','N',''),(497,20,'2019-07-24 00:00:00','I','1. To avoid physical and mental stress.Have adequate sleep preferably 2 hours in afternoon and 8 hours at night.','N','a'),(498,20,'2019-07-24 00:00:00','I','2. To eat healthy diet -  to eat fresh fruits,fresh vegetables and freshly prepared food mostly,to avoid processed food as much as possible.','N',''),(499,20,'2019-07-24 00:00:00','I','3. To limit coffee consumption - not more than 1 cup per day. To stop smoking/drinking(if used to do such). Not to take meat liver.','N',''),(500,20,'2019-07-24 00:00:00','I','4. Not to lift heavy weight .Avoid jerking as far as possible.','N',''),(501,20,'2019-07-24 00:00:00','II','1. up to 28 weeks -> To attend emergency in case of heavy bleeding per vagina / severe pain abdomen / any other serious problem occurence .','N',''),(502,20,'2019-07-24 00:00:00','II','2. after 28 weeks -> to attend emergency in case of  severe pain abdomen / bleeding per vagina/less foetal movement(<10 / 2 hr while using in bed in lateral position ) /water leakage.','N',''),(503,20,'2019-07-24 00:00:00','III','1. To check bp','Y','daily,before taking  tablet given for raised blood pressure,on alternate days,twice weekly,others'),(504,20,'2019-07-24 00:00:00','III','2. To check CBG as','Y','advised,others,fasting before lunch 2 hr after lunch,fasting before dinner 2 hr after dinner,daily,weekly,on alternate days'),(505,20,'2019-07-24 00:00:00','III','3. To attend emergency in case of blurring of vision,headache,vomiting,epigastric pain,less urine volume,double vision,fits','N','');

/*Table structure for table `advice_master` */

DROP TABLE IF EXISTS `advice_master`;

CREATE TABLE `advice_master` (
  `advice_id` int(10) NOT NULL AUTO_INCREMENT,
  `sl_no` int(10) DEFAULT NULL,
  `advice_type` enum('I','II','III') DEFAULT NULL,
  `advice` varchar(255) DEFAULT NULL,
  `is_advice_option` enum('Y','N') DEFAULT NULL,
  `advice_options` varchar(500) DEFAULT NULL,
  `is_active` enum('Y','N') DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  PRIMARY KEY (`advice_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `advice_master` */

insert  into `advice_master`(`advice_id`,`sl_no`,`advice_type`,`advice`,`is_advice_option`,`advice_options`,`is_active`,`created_on`) values (1,1,'I','To avoid physical and mental stress.Have adequate sleep preferably 2 hours in afternoon and 8 hours at night.','N','a','Y','2019-07-18 00:00:00'),(2,1,'II','up to 28 weeks -&gt; To attend emergency in case of heavy bleeding per vagina / severe pain abdomen / any other serious problem occurence .','N','','Y','2019-07-18 00:00:00'),(3,2,'I','To eat healthy diet -  to eat fresh fruits,fresh vegetables and freshly prepared food mostly,to avoid processed food as much as possible.','N','','Y','2019-07-18 00:00:00'),(4,3,'I','To limit coffee consumption - not more than 1 cup per day. To stop smoking/drinking(if used to do such). Not to take meat liver.','N','','Y','2019-07-18 00:00:00'),(5,4,'I','Not to lift heavy weight .Avoid jerking as far as possible.','N','','Y','2019-07-18 00:00:00'),(6,2,'II','after 28 weeks -&gt; to attend emergency in case of  severe pain abdomen / bleeding per vagina/less foetal movement(&lt;10 / 2 hr while using in bed in lateral position ) /water leakage.','N','','Y','2019-07-18 00:00:00'),(7,1,'III','To check bp','Y','daily,before taking  tablet given for raised blood pressure,on alternate days,twice weekly,others','Y','2019-07-18 00:00:00'),(8,2,'III','To check CBG as','Y','advised,others,fasting before lunch 2 hr after lunch,fasting before dinner 2 hr after dinner,daily,weekly,on alternate days','Y','2019-07-18 00:00:00'),(9,3,'III','To attend emergency in case of blurring of vision,headache,vomiting,epigastric pain,less urine volume,double vision,fits','N','','Y','2019-07-18 00:00:00');

/*Table structure for table `antenantal_master` */

DROP TABLE IF EXISTS `antenantal_master`;

CREATE TABLE `antenantal_master` (
  `antenantal_id` int(10) NOT NULL AUTO_INCREMENT,
  `case_master_id` int(10) DEFAULT NULL,
  `wife_bloodgroup` int(10) DEFAULT NULL,
  `husband_bloodgroup` int(10) DEFAULT NULL,
  `wife_occupation` int(10) DEFAULT NULL,
  `husband_occupation` int(10) DEFAULT NULL,
  `wife_education` int(10) DEFAULT NULL,
  `husband_education` int(10) DEFAULT NULL,
  `married_for_year` varchar(255) DEFAULT NULL,
  `trying_for_year` varchar(255) DEFAULT NULL,
  `medicine_concieve` varchar(500) DEFAULT NULL,
  `procedure_concieve` varchar(500) DEFAULT NULL,
  `procedure_date` datetime DEFAULT NULL,
  `cigarette_addiction` enum('Yes','No') DEFAULT NULL,
  `cigarette_per_day` varchar(255) DEFAULT NULL,
  `alcohol_addiction` enum('Never','Occasional','Regular') DEFAULT NULL,
  `other_addiction` varchar(500) DEFAULT NULL,
  `lmp_date` datetime DEFAULT NULL,
  `edd_date` datetime DEFAULT NULL,
  `usg_week` varchar(255) DEFAULT NULL,
  `seleddbyusg_date` datetime DEFAULT NULL,
  `usg_days` varchar(255) DEFAULT NULL,
  `usg_date` datetime DEFAULT NULL,
  `parity_term_delivery` varchar(10) DEFAULT NULL COMMENT 'Obstetrics History',
  `parity_preterm` varchar(10) DEFAULT NULL COMMENT 'Obstetrics History',
  `parity_abortion` varchar(10) DEFAULT NULL COMMENT 'Obstetrics History',
  `parity_issue` varchar(10) DEFAULT NULL COMMENT 'Obstetrics History',
  `gravida_parity` varchar(255) DEFAULT NULL COMMENT 'Obstetrics History',
  `spontaneous_abortion` varchar(255) DEFAULT NULL COMMENT 'Obstetrics History',
  `menstrual_cycle_type` enum('Regular','Irregular') DEFAULT NULL,
  `menstrual_flow` enum('Average','Moderate','Severe') DEFAULT NULL,
  `menstrual_duration_days` varchar(255) DEFAULT NULL,
  `menstrual_cycle_days` varchar(255) DEFAULT NULL,
  `cycle_days_pm` varchar(25) DEFAULT NULL,
  `cycle_plusminusdays` varchar(25) DEFAULT NULL,
  `diseases_ids` varchar(255) DEFAULT NULL,
  `is_other_diseases` enum('Y','N') DEFAULT NULL,
  `other_diseases` varchar(255) DEFAULT NULL,
  `any_allergy` varchar(500) DEFAULT NULL,
  `vaccination_ids` varchar(255) DEFAULT NULL,
  `highrisk_ids` varchar(10) DEFAULT NULL,
  `is_highrisk_others` enum('Y','N') DEFAULT NULL,
  `highrisk_others` varchar(255) DEFAULT NULL,
  `tt1_taken_on` datetime DEFAULT NULL,
  `tt1_tobe_taken_on` datetime DEFAULT NULL,
  `tt2_taken_on` datetime DEFAULT NULL,
  `tt2_tobe_taken_on` datetime DEFAULT NULL,
  `tdap_taken_on` datetime DEFAULT NULL,
  `tdap_tobe_taken_on` datetime DEFAULT NULL,
  PRIMARY KEY (`antenantal_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

/*Data for the table `antenantal_master` */

insert  into `antenantal_master`(`antenantal_id`,`case_master_id`,`wife_bloodgroup`,`husband_bloodgroup`,`wife_occupation`,`husband_occupation`,`wife_education`,`husband_education`,`married_for_year`,`trying_for_year`,`medicine_concieve`,`procedure_concieve`,`procedure_date`,`cigarette_addiction`,`cigarette_per_day`,`alcohol_addiction`,`other_addiction`,`lmp_date`,`edd_date`,`usg_week`,`seleddbyusg_date`,`usg_days`,`usg_date`,`parity_term_delivery`,`parity_preterm`,`parity_abortion`,`parity_issue`,`gravida_parity`,`spontaneous_abortion`,`menstrual_cycle_type`,`menstrual_flow`,`menstrual_duration_days`,`menstrual_cycle_days`,`cycle_days_pm`,`cycle_plusminusdays`,`diseases_ids`,`is_other_diseases`,`other_diseases`,`any_allergy`,`vaccination_ids`,`highrisk_ids`,`is_highrisk_others`,`highrisk_others`,`tt1_taken_on`,`tt1_tobe_taken_on`,`tt2_taken_on`,`tt2_tobe_taken_on`,`tdap_taken_on`,`tdap_tobe_taken_on`) values (5,4,7,5,4,2,1,4,'7','5','Clomiphene,Gonadotropins','IVF->FET','2020-07-23 00:00:00','No','12','Never','','2019-06-01 00:00:00','2020-03-07 00:00:00','7','2019-08-01 00:00:00','3','2020-03-16 00:00:00','1','2','','7','4','0','Regular','','10','30','M','2','1,3','N',NULL,'skin problem','1,5','1,3','N','','2019-07-02 00:00:00','2019-07-14 00:00:00','2019-07-20 00:00:00','2019-07-22 00:00:00','2019-07-21 00:00:00','2019-07-31 00:00:00'),(13,5,0,0,0,0,0,0,'0','0','','',NULL,'','','','',NULL,NULL,'0',NULL,'0',NULL,'0','0','0','0','0','0','','','','',NULL,NULL,'','N',NULL,'','','','N','',NULL,NULL,NULL,NULL,NULL,NULL),(14,3,0,0,0,0,0,0,'0','0','','',NULL,'','','','',NULL,NULL,'0',NULL,'0',NULL,'0','0','0','0','0','0','','','','',NULL,NULL,'','N',NULL,'','','','N','',NULL,NULL,NULL,NULL,NULL,NULL),(15,15,0,0,0,0,0,0,'0','0','','',NULL,'','','','',NULL,NULL,'0',NULL,'0',NULL,'0','0','0','0','0','0','','','','',NULL,NULL,'','N',NULL,'','','','N','',NULL,NULL,NULL,NULL,NULL,NULL),(16,16,5,0,0,0,1,0,'0','0','Clomiphene','',NULL,'','','','',NULL,NULL,'0',NULL,'0',NULL,'0','0','0','0','0','0','','','','',NULL,NULL,'','N',NULL,'','','','N','',NULL,NULL,NULL,NULL,NULL,NULL),(17,17,0,0,0,0,0,0,'0','0','Clomiphene','',NULL,'','','','',NULL,NULL,'0',NULL,'0',NULL,'0','0','0','0','0','0','','','','',NULL,NULL,'','N',NULL,'','','','N','',NULL,NULL,NULL,NULL,NULL,NULL),(18,19,0,0,0,0,0,0,'0','0','','',NULL,'','','','',NULL,NULL,'',NULL,'',NULL,'1','2','4','2','','','','','','',NULL,NULL,'','N',NULL,'','','','N','',NULL,NULL,NULL,NULL,NULL,NULL),(19,20,1,0,0,0,0,0,'0','0','','IUI','2019-07-24 00:00:00','','','','',NULL,NULL,'',NULL,'',NULL,'','','','','','','','','','30','P','','','N',NULL,'','','','N','',NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `blood_group` */

DROP TABLE IF EXISTS `blood_group`;

CREATE TABLE `blood_group` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `bld_group_code` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `blood_group` */

insert  into `blood_group`(`id`,`bld_group_code`) values (1,'A+'),(2,'A-'),(3,'B+'),(4,'B-'),(5,'AB+'),(6,'AB-'),(7,'O+'),(8,'O-'),(9,'UNKNOWN');

/*Table structure for table `case_master` */

DROP TABLE IF EXISTS `case_master`;

CREATE TABLE `case_master` (
  `case_id` int(10) NOT NULL AUTO_INCREMENT,
  `case_no` varchar(255) DEFAULT NULL,
  `patient_id` int(10) DEFAULT NULL,
  `clinic_id` int(10) DEFAULT NULL,
  `major_group` enum('Obstetrics','Gynecologic','Infertility') DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `patient_reg_type` enum('New','Existing') DEFAULT NULL,
  `previous_case_id` int(10) DEFAULT NULL,
  `doctor_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`case_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

/*Data for the table `case_master` */

insert  into `case_master`(`case_id`,`case_no`,`patient_id`,`clinic_id`,`major_group`,`created_on`,`patient_reg_type`,`previous_case_id`,`doctor_id`) values (1,'ILS/00016/19',12,1,'Obstetrics','2019-05-30 00:00:00',NULL,NULL,NULL),(2,'ILS/00017/19',13,1,'Obstetrics','2019-05-30 00:00:00',NULL,NULL,NULL),(3,'ILS/00018/19',14,1,'Obstetrics','2019-05-30 00:00:00',NULL,NULL,NULL),(4,'ILS/00019/19',15,1,'Obstetrics','2019-05-30 00:00:00',NULL,NULL,NULL),(5,'ILS/00020/19',16,1,'Obstetrics','2019-06-10 00:00:00',NULL,NULL,NULL),(15,'ILS/00031/19',20,1,'Obstetrics','2019-06-11 00:00:00','New',NULL,NULL),(16,'ILS/00032/19',21,1,'Obstetrics','2019-06-19 00:00:00','New',NULL,NULL),(17,'ILS/00033/19',15,1,'Obstetrics','2019-06-22 00:00:00','Existing',4,NULL),(18,'ILS/00034/19',22,1,'Obstetrics','2019-06-24 00:00:00','New',NULL,NULL),(19,'ILS/00035/19',12,1,'Obstetrics','2019-06-24 00:00:00','Existing',1,NULL),(20,'ILS/00036/19',23,1,'Obstetrics','2019-07-24 00:00:00','New',NULL,NULL),(21,'ILS/00037/19',23,1,'Obstetrics','2019-07-24 00:00:00','Existing',20,NULL),(22,'ILS/00038/19',24,1,'Obstetrics','2019-07-29 00:00:00','New',NULL,1),(23,'ILS/00039/19',24,1,'Obstetrics','2019-07-29 00:00:00','Existing',22,1);

/*Table structure for table `case_visit_master` */

DROP TABLE IF EXISTS `case_visit_master`;

CREATE TABLE `case_visit_master` (
  `visit_master_id` int(10) DEFAULT NULL,
  `case_master_id` int(10) DEFAULT NULL,
  `visit_date` datetime DEFAULT NULL,
  `created_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `case_visit_master` */

/*Table structure for table `clinic_details` */

DROP TABLE IF EXISTS `clinic_details`;

CREATE TABLE `clinic_details` (
  `clinic_details_id` int(10) NOT NULL AUTO_INCREMENT,
  `clinic_master_id` int(10) DEFAULT NULL,
  `day_id` int(10) DEFAULT NULL,
  `is_by_appointment` enum('Y','N') DEFAULT NULL,
  `from_time` varchar(255) DEFAULT NULL,
  `to_time` varchar(255) DEFAULT NULL,
  `is_active` enum('Y','N') DEFAULT 'Y',
  PRIMARY KEY (`clinic_details_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

/*Data for the table `clinic_details` */

insert  into `clinic_details`(`clinic_details_id`,`clinic_master_id`,`day_id`,`is_by_appointment`,`from_time`,`to_time`,`is_active`) values (13,4,1,'N','08:30 pm','10:30 pm','Y'),(14,4,2,'N','08:30 pm','10:30 am','Y'),(15,4,4,'N','08:30 pm','10:30 am','Y'),(16,5,5,'Y',NULL,NULL,'Y'),(17,6,1,'N','07:30 am','10:30 pm','Y'),(18,6,2,'Y',NULL,NULL,'Y'),(22,7,2,'N','12:45 pm','03:45 pm','Y'),(23,7,6,'Y',NULL,NULL,'Y'),(24,7,7,'Y',NULL,NULL,'Y'),(25,8,6,'Y',NULL,NULL,'Y'),(30,1,5,'Y',NULL,NULL,'Y'),(31,1,6,'N','01:05 pm','01:30 pm','Y');

/*Table structure for table `clinic_master` */

DROP TABLE IF EXISTS `clinic_master`;

CREATE TABLE `clinic_master` (
  `clinic_id` int(10) NOT NULL AUTO_INCREMENT,
  `clinic_name` varchar(255) DEFAULT NULL,
  `phno` varchar(255) DEFAULT NULL,
  `address` text,
  `cliniccode` varchar(20) DEFAULT NULL,
  `is_active` enum('Y','N') DEFAULT 'Y',
  `logo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`clinic_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `clinic_master` */

insert  into `clinic_master`(`clinic_id`,`clinic_name`,`phno`,`address`,`cliniccode`,`is_active`,`logo`) values (1,'ILS Hospitals','9153575808','1, Mall Road, Near, Nagerbazar Flyover, Dum Dum, Kolkata, West Bengal 700080','ILS','Y','ils_logo.jpg'),(4,'Apollo Clinic','033 4021 2525','P-72, Prince Anwar Shah Rd, Jodhpur Park, Kolkata, West Bengal 700045',NULL,'Y',NULL),(5,'Thyro Care','033 2425 0154','A/, 131, Raipur Rd E, Nainan Para, Baghajatin Colony, Kolkata, West Bengal 700092',NULL,'Y',NULL),(6,'Dr Batra’s Homeopathy Clinic','070450 06060','3/100, Ground Floor, Sapno Neer Apartment Chittaranjan Colony,Near Ekta Heights, Jadavpur, Kolkata, West Bengal 700032',NULL,'Y',NULL),(7,'IVF Doctor','094333 67751','Kali Temple Rd, Kalighat, Kolkata, West Bengal 700026',NULL,'Y',NULL),(8,'test','9999999','as','TES','Y',NULL);

/*Table structure for table `clinical_examination_details` */

DROP TABLE IF EXISTS `clinical_examination_details`;

CREATE TABLE `clinical_examination_details` (
  `clinical_exm_dtl_id` int(10) NOT NULL AUTO_INCREMENT,
  `case_master_id` int(10) DEFAULT NULL,
  `examination_date` datetime DEFAULT NULL,
  `weeks_by_lmp` varchar(255) DEFAULT NULL,
  `days_by_lmp` varchar(255) DEFAULT NULL,
  `weeks_by_usg` varchar(255) DEFAULT NULL,
  `days_by_usg` varchar(255) DEFAULT NULL,
  `cliexm_weight` varchar(255) DEFAULT NULL,
  `cliexm_bp_s` varchar(255) DEFAULT NULL,
  `cliexm_bp_d` varchar(255) DEFAULT NULL,
  `cliexm_pallor` varchar(255) DEFAULT NULL,
  `cliexm_oedema` varchar(255) DEFAULT NULL,
  `fundal_height` varchar(255) DEFAULT NULL,
  `cliexm_sfh` varchar(255) DEFAULT NULL,
  `cliexm_fsh` varchar(255) DEFAULT NULL,
  `cliexm_appointment_date` datetime DEFAULT NULL,
  `cliexm_after_week` varchar(255) DEFAULT NULL,
  `cliexm_after_days` varchar(255) DEFAULT NULL,
  `entry_date` datetime DEFAULT NULL,
  PRIMARY KEY (`clinical_exm_dtl_id`)
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=utf8;

/*Data for the table `clinical_examination_details` */

insert  into `clinical_examination_details`(`clinical_exm_dtl_id`,`case_master_id`,`examination_date`,`weeks_by_lmp`,`days_by_lmp`,`weeks_by_usg`,`days_by_usg`,`cliexm_weight`,`cliexm_bp_s`,`cliexm_bp_d`,`cliexm_pallor`,`cliexm_oedema`,`fundal_height`,`cliexm_sfh`,`cliexm_fsh`,`cliexm_appointment_date`,`cliexm_after_week`,`cliexm_after_days`,`entry_date`) values (123,4,'2019-08-20 00:00:00','11','3','2','5','59','59','33','Mod','Nil','22','4','4',NULL,'5','4','2019-07-23 00:00:00'),(125,20,NULL,'','','','','','','','','','','','',NULL,'','','2019-07-24 00:00:00');

/*Table structure for table `complication_master` */

DROP TABLE IF EXISTS `complication_master`;

CREATE TABLE `complication_master` (
  `complication_id` int(10) NOT NULL AUTO_INCREMENT,
  `complication_name` varchar(255) DEFAULT NULL,
  `is_active` enum('Y','N') DEFAULT 'Y',
  PRIMARY KEY (`complication_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `complication_master` */

insert  into `complication_master`(`complication_id`,`complication_name`,`is_active`) values (1,'Threatened abortion','Y'),(2,'Missed abortion','Y'),(3,'Operative intervention cerclage / Suction evacuation','Y'),(4,'Molar pregnancy','Y'),(5,'PPROM','Y'),(6,'PROM','Y'),(7,'Preterm labor','Y'),(8,'APH','Y'),(9,'IUD','Y'),(10,'IUGR','Y'),(11,'PPH','Y');

/*Table structure for table `day_master` */

DROP TABLE IF EXISTS `day_master`;

CREATE TABLE `day_master` (
  `day_id` int(11) NOT NULL AUTO_INCREMENT,
  `day_code` varchar(50) DEFAULT NULL,
  `day_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`day_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `day_master` */

insert  into `day_master`(`day_id`,`day_code`,`day_name`) values (1,'Mon','Monday'),(2,'Tue','Tuesday'),(3,'Wed','Wednesday'),(4,'Thu','Thursday'),(5,'Fri','Friday'),(6,'Sat','Saturday'),(7,'Sun','Sunday');

/*Table structure for table `diseases_master` */

DROP TABLE IF EXISTS `diseases_master`;

CREATE TABLE `diseases_master` (
  `diseases_id` int(10) NOT NULL AUTO_INCREMENT,
  `diseases_name` varchar(255) DEFAULT NULL,
  `types` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`diseases_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

/*Data for the table `diseases_master` */

insert  into `diseases_master`(`diseases_id`,`diseases_name`,`types`) values (1,'Thyroid',NULL),(2,'Anaemia',NULL),(3,'Heart Disease',NULL),(4,'Jaundice',NULL),(5,'Asthma',NULL),(6,'Hypertension',NULL),(7,'Diabetes GDM',''),(8,'Diabetes Type I',NULL),(9,'Diabetes Type II',NULL),(10,'Kidney Disease',NULL),(11,'Chicken Pox',NULL),(12,'Others',NULL);

/*Table structure for table `doctor_master` */

DROP TABLE IF EXISTS `doctor_master`;

CREATE TABLE `doctor_master` (
  `doctor_id` int(10) NOT NULL AUTO_INCREMENT,
  `doctor_name` varchar(255) DEFAULT NULL,
  `is_active` enum('Y','N') DEFAULT NULL,
  `dr_reg_no` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`doctor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `doctor_master` */

insert  into `doctor_master`(`doctor_id`,`doctor_name`,`is_active`,`dr_reg_no`) values (1,'Dr.Sutapa Sen','Y','123456');

/*Table structure for table `education_qualification` */

DROP TABLE IF EXISTS `education_qualification`;

CREATE TABLE `education_qualification` (
  `qualification_id` int(10) NOT NULL AUTO_INCREMENT,
  `qualification` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`qualification_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `education_qualification` */

insert  into `education_qualification`(`qualification_id`,`qualification`) values (1,'8th'),(2,'Madhyamik'),(3,'Higher secondary'),(4,'Graduation ');

/*Table structure for table `examination_master` */

DROP TABLE IF EXISTS `examination_master`;

CREATE TABLE `examination_master` (
  `examination_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Its a First examination table',
  `case_master_id` int(10) DEFAULT NULL,
  `exam_height` varchar(255) DEFAULT NULL,
  `exam_weight` varchar(255) DEFAULT NULL,
  `exam_bmi` varchar(255) DEFAULT NULL,
  `exam_pluse` varchar(255) DEFAULT NULL,
  `exam_bp_systolic` varchar(255) DEFAULT NULL,
  `exam_bp_diastolic` varchar(255) DEFAULT NULL,
  `exam_pallor` varchar(255) DEFAULT NULL,
  `exam_icterus` varchar(255) DEFAULT NULL,
  `exam_thyroid` varchar(255) DEFAULT NULL,
  `exam_teeth` varchar(255) DEFAULT NULL,
  `exam_cvs` varchar(255) DEFAULT NULL,
  `exam_chest` varchar(255) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  PRIMARY KEY (`examination_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `examination_master` */

insert  into `examination_master`(`examination_id`,`case_master_id`,`exam_height`,`exam_weight`,`exam_bmi`,`exam_pluse`,`exam_bp_systolic`,`exam_bp_diastolic`,`exam_pallor`,`exam_icterus`,`exam_thyroid`,`exam_teeth`,`exam_cvs`,`exam_chest`,`created_on`) values (2,4,'1','2','19.6','4','5','6','Mod','Present','7','8','9',NULL,'2019-06-10 00:00:00'),(5,4,'1','2','3','4','5','6','Mod','Present','7','8','9',NULL,'2019-06-10 00:00:00'),(6,4,'1','2','3','4','5','6','Mod','Present','7','8','9',NULL,'2019-06-10 00:00:00'),(7,4,'1','2','3','4','5','6','Mod','Present','7','8','9','45','2019-06-10 00:00:00'),(8,4,'11','21','31','41','51','61','Severe','Nil','71','81','91','451','2019-06-10 00:00:00'),(9,4,'10','21','20','30','51','61','Severe','Nil','71','81','91','Normal','2019-06-10 00:00:00'),(10,4,'10','21','20','30','51','61','Severe','Nil','71','81','91','Normal2','2019-06-11 00:00:00'),(11,4,'10','21','20','30','51','61','Severe','Nil','71','81','91','Normal2','2019-06-11 00:00:00'),(13,4,'10','21','20','30','51','61','Severe','Nil','75','81','91','Normal','2019-06-22 00:00:00');

/*Table structure for table `family_history_component` */

DROP TABLE IF EXISTS `family_history_component`;

CREATE TABLE `family_history_component` (
  `family_component_id` int(10) NOT NULL AUTO_INCREMENT,
  `component_name` varchar(255) DEFAULT NULL,
  `is_textfield` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`family_component_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `family_history_component` */

insert  into `family_history_component`(`family_component_id`,`component_name`,`is_textfield`) values (1,'Hypertension','N'),(2,'Diabetes Type I','N'),(3,'Diabetes Type II','N'),(4,'Any Bleeding Disorder','N'),(5,'Down\'s','N'),(6,'Twin','N'),(7,'Any Other','Y');

/*Table structure for table `family_history_details` */

DROP TABLE IF EXISTS `family_history_details`;

CREATE TABLE `family_history_details` (
  `fmly_history_id` int(10) NOT NULL AUTO_INCREMENT,
  `case_master_id` int(10) DEFAULT NULL,
  `family_comp_mst_id` int(10) DEFAULT NULL,
  `othercomptext` varchar(255) DEFAULT NULL,
  `is_father` enum('Y','N') DEFAULT NULL,
  `is_mother` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`fmly_history_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2199 DEFAULT CHARSET=latin1;

/*Data for the table `family_history_details` */

insert  into `family_history_details`(`fmly_history_id`,`case_master_id`,`family_comp_mst_id`,`othercomptext`,`is_father`,`is_mother`) values (379,15,1,'','N','N'),(380,15,2,'','N','N'),(381,15,3,'','N','N'),(382,15,4,'','N','N'),(383,15,5,'','N','N'),(384,15,6,'','N','N'),(385,15,7,'','N','N'),(1002,16,1,'','N','N'),(1003,16,2,'','N','N'),(1004,16,3,'','N','N'),(1005,16,4,'','N','N'),(1006,16,5,'','N','N'),(1007,16,6,'','N','N'),(1008,16,7,'','N','N'),(1114,17,1,'','N','N'),(1115,17,2,'','N','N'),(1116,17,3,'','N','N'),(1117,17,4,'','N','N'),(1118,17,5,'','N','N'),(1119,17,6,'','N','N'),(1120,17,7,'','N','N'),(1219,19,1,'','N','N'),(1220,19,2,'','N','N'),(1221,19,3,'','N','N'),(1222,19,4,'','N','N'),(1223,19,5,'','N','N'),(1224,19,6,'','N','N'),(1225,19,7,'','N','N'),(2178,4,1,'','Y','N'),(2179,4,2,'','N','Y'),(2180,4,3,'','Y','N'),(2181,4,4,'','Y','N'),(2182,4,5,'','Y','N'),(2183,4,6,'','N','Y'),(2184,4,7,'anyother','N','N'),(2192,20,1,'','N','N'),(2193,20,2,'','N','N'),(2194,20,3,'','N','N'),(2195,20,4,'','N','N'),(2196,20,5,'','N','N'),(2197,20,6,'','N','N'),(2198,20,7,'','N','N');

/*Table structure for table `gender_master` */

DROP TABLE IF EXISTS `gender_master`;

CREATE TABLE `gender_master` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `gender` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `gender_master` */

insert  into `gender_master`(`id`,`gender`) values (1,'Male'),(2,'Female'),(3,'Other');

/*Table structure for table `high_risk_master` */

DROP TABLE IF EXISTS `high_risk_master`;

CREATE TABLE `high_risk_master` (
  `high_risk_id` int(10) NOT NULL AUTO_INCREMENT,
  `risk_type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`high_risk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `high_risk_master` */

insert  into `high_risk_master`(`high_risk_id`,`risk_type`) values (1,'IUGR'),(2,'DM'),(3,'PIH'),(4,'Recurrent Abortion'),(5,'Others');

/*Table structure for table `investigation_component` */

DROP TABLE IF EXISTS `investigation_component`;

CREATE TABLE `investigation_component` (
  `investigation_comp_id` int(10) NOT NULL AUTO_INCREMENT,
  `inv_component_name` varchar(255) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`investigation_comp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `investigation_component` */

insert  into `investigation_component`(`investigation_comp_id`,`inv_component_name`,`unit`) values (1,'Hb','gm/dl'),(2,'TC',''),(3,'DC',''),(4,'FBS',''),(5,'PPBS',''),(6,'VDRL',''),(7,'HIB 1',''),(8,'HIB 2',''),(9,'Hbs Ag','');

/*Table structure for table `investigation_record_master` */

DROP TABLE IF EXISTS `investigation_record_master`;

CREATE TABLE `investigation_record_master` (
  `inv_record_id` int(10) NOT NULL AUTO_INCREMENT,
  `case_master_id` int(10) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `hb_result` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `hb_date` datetime DEFAULT NULL,
  `tc_result` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `tc_date` datetime DEFAULT NULL,
  `dc_result` varchar(255) DEFAULT NULL,
  `dc_date` datetime DEFAULT NULL,
  `fbs_result` varchar(255) DEFAULT NULL,
  `fbs_date` datetime DEFAULT NULL,
  `ppbs_result` varchar(255) DEFAULT NULL,
  `ppbs_date` datetime DEFAULT NULL,
  `vdrl_result` varchar(255) DEFAULT NULL,
  `vdrl_date` datetime DEFAULT NULL,
  `hiv_one_result` varchar(255) DEFAULT NULL,
  `hiv_one_date` datetime DEFAULT NULL,
  `hiv_two_result` varchar(255) DEFAULT NULL,
  `hiv_two_date` datetime DEFAULT NULL,
  `hbsag_result` varchar(255) DEFAULT NULL,
  `hbsag_date` datetime DEFAULT NULL,
  `antihcv_result` varchar(255) DEFAULT NULL,
  `antihcv_date` datetime DEFAULT NULL,
  `urine_re_result` varchar(255) DEFAULT NULL,
  `urine_re_date` datetime DEFAULT NULL,
  `cs_sensitive_to_result` varchar(255) DEFAULT NULL,
  `cs_sensitive_date` datetime DEFAULT NULL,
  `stsh_result` varchar(255) DEFAULT NULL,
  `stsh_date` datetime DEFAULT NULL,
  `s_urea_result` varchar(255) DEFAULT NULL,
  `s_urea_date` datetime DEFAULT NULL,
  `s_creatinine_result` varchar(255) DEFAULT NULL,
  `s_creatinine_date` datetime DEFAULT NULL,
  `combined_test_result` varchar(255) DEFAULT NULL,
  `combined_test_date` datetime DEFAULT NULL,
  `thalassemia_result` varchar(255) DEFAULT NULL,
  `thalassemia_date` datetime DEFAULT NULL,
  `usg_scan_date` datetime DEFAULT NULL,
  `usg_slf_week` varchar(25) DEFAULT NULL,
  `usg_slf_day` varchar(25) DEFAULT NULL,
  `nt_scan_date` datetime DEFAULT NULL,
  `nt_scan_lowerrisk` varchar(255) DEFAULT NULL,
  `nt_scan_highrisk` varchar(255) DEFAULT NULL,
  `anomaly_scan_date` datetime DEFAULT NULL,
  `anomaly_slf_week` varchar(25) DEFAULT NULL,
  `anomaly_slf_day` varchar(25) DEFAULT NULL,
  `anomaly_placenta` varchar(255) DEFAULT NULL,
  `is_no_anomaly_seen` enum('Y','N') DEFAULT NULL,
  `is_other_anomaly` enum('Y','N') DEFAULT NULL,
  `other_anomaly` varchar(255) DEFAULT NULL,
  `growth_date` datetime DEFAULT NULL,
  `growth_slf_week` varchar(25) DEFAULT NULL,
  `growth_slf_day` varchar(25) DEFAULT NULL,
  `growth_presentation` varchar(255) DEFAULT NULL,
  `growth_afi` varchar(255) DEFAULT NULL,
  `growth_liquor` varchar(255) DEFAULT NULL,
  `doppler_scan_date` datetime DEFAULT NULL,
  `doppler_slf_week` varchar(255) DEFAULT NULL,
  `doppler_slf_day` varchar(255) DEFAULT NULL,
  `doppler_presentation` varchar(255) DEFAULT NULL,
  `doppler_afi` varchar(255) DEFAULT NULL,
  `doppler_liquor` varchar(255) DEFAULT NULL,
  `doppler_checkbox` varchar(255) DEFAULT NULL,
  `umbilical_artery_pi` varchar(255) DEFAULT NULL,
  `mca_pi` varchar(255) DEFAULT NULL,
  `cp_ratio` varchar(255) DEFAULT NULL,
  `doppler_parameters_others` varchar(255) DEFAULT NULL,
  `others_investigation` varchar(255) DEFAULT NULL,
  `others_investigation_date` datetime DEFAULT NULL,
  PRIMARY KEY (`inv_record_id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;

/*Data for the table `investigation_record_master` */

insert  into `investigation_record_master`(`inv_record_id`,`case_master_id`,`created_on`,`hb_result`,`hb_date`,`tc_result`,`tc_date`,`dc_result`,`dc_date`,`fbs_result`,`fbs_date`,`ppbs_result`,`ppbs_date`,`vdrl_result`,`vdrl_date`,`hiv_one_result`,`hiv_one_date`,`hiv_two_result`,`hiv_two_date`,`hbsag_result`,`hbsag_date`,`antihcv_result`,`antihcv_date`,`urine_re_result`,`urine_re_date`,`cs_sensitive_to_result`,`cs_sensitive_date`,`stsh_result`,`stsh_date`,`s_urea_result`,`s_urea_date`,`s_creatinine_result`,`s_creatinine_date`,`combined_test_result`,`combined_test_date`,`thalassemia_result`,`thalassemia_date`,`usg_scan_date`,`usg_slf_week`,`usg_slf_day`,`nt_scan_date`,`nt_scan_lowerrisk`,`nt_scan_highrisk`,`anomaly_scan_date`,`anomaly_slf_week`,`anomaly_slf_day`,`anomaly_placenta`,`is_no_anomaly_seen`,`is_other_anomaly`,`other_anomaly`,`growth_date`,`growth_slf_week`,`growth_slf_day`,`growth_presentation`,`growth_afi`,`growth_liquor`,`doppler_scan_date`,`doppler_slf_week`,`doppler_slf_day`,`doppler_presentation`,`doppler_afi`,`doppler_liquor`,`doppler_checkbox`,`umbilical_artery_pi`,`mca_pi`,`cp_ratio`,`doppler_parameters_others`,`others_investigation`,`others_investigation_date`) values (1,4,'2019-06-11 00:00:00','z','2019-06-11 00:00:00','3','2019-06-01 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,4,'2019-06-11 00:00:00','1','2019-06-11 00:00:00','2','2019-06-12 00:00:00','3','2019-06-13 00:00:00','4','2019-06-14 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,4,'2019-06-11 00:00:00','1','2019-06-11 00:00:00','2','2019-06-12 00:00:00','3','2019-06-13 00:00:00','4','2019-06-14 00:00:00','5','2019-06-15 00:00:00','6','2019-06-16 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,4,'2019-06-13 00:00:00','1','2019-06-11 00:00:00','2','2019-06-12 00:00:00','3','2019-06-13 00:00:00','4','2019-06-14 00:00:00','5','2019-06-15 00:00:00','6','2019-06-16 00:00:00','7','2019-06-17 00:00:00','8','2019-06-18 00:00:00','9','2019-06-19 00:00:00','10','2019-06-10 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(9,4,'2019-06-13 00:00:00','1','2019-06-11 00:00:00','2','2019-06-12 00:00:00','3','2019-06-13 00:00:00','4','2019-06-14 00:00:00','5','2019-06-15 00:00:00','6','2019-06-16 00:00:00','7','2019-06-17 00:00:00','8','2019-06-18 00:00:00','9','2019-06-19 00:00:00','10','2019-06-10 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(10,4,'2019-06-13 00:00:00','1','2019-06-11 00:00:00','2','2019-06-12 00:00:00','3','2019-06-13 00:00:00','4','2019-06-14 00:00:00','5','2019-06-15 00:00:00','6','2019-06-16 00:00:00','7','2019-06-17 00:00:00','8','2019-06-18 00:00:00','9','2019-06-19 00:00:00','10','2019-06-10 00:00:00','21','2019-06-21 00:00:00','22','2019-06-22 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(12,4,'2019-06-13 00:00:00','1','2019-06-11 00:00:00','2','2019-06-12 00:00:00','3','2019-06-13 00:00:00','4','2019-06-14 00:00:00','5','2019-06-15 00:00:00','6','2019-06-16 00:00:00','7','2019-06-17 00:00:00','8','2019-06-18 00:00:00','9','2019-06-19 00:00:00','10','2019-06-10 00:00:00','21','2019-06-21 00:00:00','22','2019-06-22 00:00:00','23','2019-06-23 00:00:00','24','2019-06-24 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(13,4,'2019-06-13 00:00:00','1','2019-06-11 00:00:00','2','2019-06-12 00:00:00','3','2019-06-13 00:00:00','4','2019-06-14 00:00:00','5','2019-06-15 00:00:00','6','2019-06-16 00:00:00','7','2019-06-17 00:00:00','8','2019-06-18 00:00:00','9','2019-06-19 00:00:00','10','2019-06-10 00:00:00','21','2019-06-21 00:00:00','22','2019-06-22 00:00:00','23','2019-06-23 00:00:00','24','2019-06-24 00:00:00','25','2019-06-25 00:00:00','26','2019-06-26 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(14,4,'2019-06-13 00:00:00','1','2019-06-11 00:00:00','2','2019-06-12 00:00:00','3','2019-06-13 00:00:00','4','2019-06-14 00:00:00','5','2019-06-15 00:00:00','6','2019-06-16 00:00:00','7','2019-06-17 00:00:00','8','2019-06-18 00:00:00','9','2019-06-19 00:00:00','10','2019-06-10 00:00:00','21','2019-06-21 00:00:00','22','2019-06-22 00:00:00','23','2019-06-23 00:00:00','24','2019-06-24 00:00:00','25','2019-06-25 00:00:00','26','2019-06-26 00:00:00','27','2019-06-27 00:00:00','2019-06-28 00:00:00','8','5',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(15,4,'2019-06-13 00:00:00','1','2019-06-11 00:00:00','2','2019-06-12 00:00:00','3','2019-06-13 00:00:00','4','2019-06-14 00:00:00','5','2019-06-15 00:00:00','6','2019-06-16 00:00:00','7','2019-06-17 00:00:00','8','2019-06-18 00:00:00','9','2019-06-19 00:00:00','10','2019-06-10 00:00:00','21','2019-06-21 00:00:00','22','2019-06-22 00:00:00','23','2019-06-23 00:00:00','24','2019-06-24 00:00:00','25','2019-06-25 00:00:00','26','2019-06-26 00:00:00','27','2019-06-27 00:00:00','2019-06-28 00:00:00','8','5','2019-06-29 00:00:00','Down\'s',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(18,4,'2019-06-13 00:00:00','1','2019-06-11 00:00:00','2','2019-06-12 00:00:00','3','2019-06-13 00:00:00','4','2019-06-14 00:00:00','5','2019-06-15 00:00:00','6','2019-06-16 00:00:00','7','2019-06-17 00:00:00','8','2019-06-18 00:00:00','9','2019-06-19 00:00:00','10','2019-06-10 00:00:00','21','2019-06-21 00:00:00','22','2019-06-22 00:00:00','23','2019-06-23 00:00:00','24','2019-06-24 00:00:00','25','2019-06-25 00:00:00','26','2019-06-26 00:00:00','27','2019-06-27 00:00:00','2019-06-28 00:00:00','8','5','2019-06-29 00:00:00','Down\'s','Edward','2019-06-30 00:00:00','24','5',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(19,4,'2019-06-13 00:00:00','1','2019-06-11 00:00:00','2','2019-06-12 00:00:00','3','2019-06-13 00:00:00','4','2019-06-14 00:00:00','5','2019-06-15 00:00:00','6','2019-06-16 00:00:00','7','2019-06-17 00:00:00','8','2019-06-18 00:00:00','9','2019-06-19 00:00:00','10','2019-06-10 00:00:00','21','2019-06-21 00:00:00','22','2019-06-22 00:00:00','23','2019-06-23 00:00:00','24','2019-06-24 00:00:00','25','2019-06-25 00:00:00','26','2019-06-26 00:00:00','27','2019-06-27 00:00:00','2019-06-28 00:00:00','8','5','2019-06-29 00:00:00','Down\'s','Edward','2019-06-30 00:00:00','24','5','1,','Y','Y','fssd',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(23,4,'2019-06-14 00:00:00','1','2019-06-11 00:00:00','2','2019-06-12 00:00:00','3','2019-06-13 00:00:00','4','2019-06-14 00:00:00','5','2019-06-15 00:00:00','6','2019-06-16 00:00:00','7','2019-06-17 00:00:00','8','2019-06-18 00:00:00','9','2019-06-19 00:00:00','10','2019-06-10 00:00:00','21','2019-06-21 00:00:00','22','2019-06-22 00:00:00','23','2019-06-23 00:00:00','24','2019-06-24 00:00:00','25','2019-06-25 00:00:00','26','2019-06-26 00:00:00','27','2019-06-27 00:00:00','2019-06-28 00:00:00','8','5','2019-06-29 00:00:00','Down\'s','Edward','2019-06-30 00:00:00','24','5','3,4','Y','Y','ttdadx','2019-06-01 00:00:00','18','7',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(24,4,'2019-06-14 00:00:00','1','2019-06-11 00:00:00','2','2019-06-12 00:00:00','3','2019-06-13 00:00:00','4','2019-06-14 00:00:00','5','2019-06-15 00:00:00','6','2019-06-16 00:00:00','7','2019-06-17 00:00:00','8','2019-06-18 00:00:00','9','2019-06-19 00:00:00','10','2019-06-10 00:00:00','21','2019-06-21 00:00:00','22','2019-06-22 00:00:00','23','2019-06-23 00:00:00','24','2019-06-24 00:00:00','25','2019-06-25 00:00:00','26','2019-06-26 00:00:00','27','2019-06-27 00:00:00','2019-06-28 00:00:00','8','5','2019-06-29 00:00:00','Down\'s','Edward','2019-06-30 00:00:00','24','5','3,4','Y','Y','ttdadx','2019-06-01 00:00:00','18','6',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(25,4,'2019-06-18 00:00:00','','2019-06-11 00:00:00','2','2019-06-12 00:00:00','3','2019-06-13 00:00:00','4','2019-06-14 00:00:00','5','2019-06-15 00:00:00','6','2019-06-16 00:00:00','7','2019-06-17 00:00:00','8','2019-06-18 00:00:00','9','2019-06-19 00:00:00','10','2019-06-10 00:00:00','21','2019-06-21 00:00:00','22','2019-06-22 00:00:00','23','2019-06-23 00:00:00','24','2019-06-24 00:00:00','25','2019-06-25 00:00:00','26','2019-06-26 00:00:00','27','2019-06-27 00:00:00','2019-06-28 00:00:00','8','5','2019-06-29 00:00:00','Down\'s','Edward','2019-06-30 00:00:00','24','5','3,4','Y','Y','ttdadx','2019-06-01 00:00:00','18','6',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(26,4,'2019-06-18 00:00:00','1','2019-06-11 00:00:00','2','2019-06-12 00:00:00','3','2019-06-13 00:00:00','4','2019-06-14 00:00:00','5','2019-06-15 00:00:00','6','2019-06-16 00:00:00','7','2019-06-17 00:00:00','8','2019-06-18 00:00:00','9','2019-06-19 00:00:00','10','2019-06-10 00:00:00','21','2019-06-21 00:00:00','22','2019-06-22 00:00:00','23','2019-06-23 00:00:00','24','2019-06-24 00:00:00','25','2019-06-25 00:00:00','26','2019-06-26 00:00:00','27','2019-06-27 00:00:00','2019-06-28 00:00:00','8','5','2019-06-29 00:00:00','Down\'s','Edward','2019-06-30 00:00:00','24','5','3,4','Y','Y','ttdadx','2019-06-01 00:00:00','18','6',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(27,4,'2019-06-18 00:00:00','1',NULL,'2','2019-06-12 00:00:00','3','2019-06-13 00:00:00','4','2019-06-14 00:00:00','5','2019-06-15 00:00:00','6','2019-06-16 00:00:00','7','2019-06-17 00:00:00','8','2019-06-18 00:00:00','9','2019-06-19 00:00:00','10','2019-06-10 00:00:00','21','2019-06-21 00:00:00','22','2019-06-22 00:00:00','23','2019-06-23 00:00:00','24','2019-06-24 00:00:00','25','2019-06-25 00:00:00','26','2019-06-26 00:00:00','27','2019-06-27 00:00:00','2019-06-28 00:00:00','8','5','2019-06-29 00:00:00','Down\'s','Edward','2019-06-30 00:00:00','24','5','3,4','Y','Y','ttdadx','2019-06-01 00:00:00','18','6',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(28,4,'2019-06-18 00:00:00','1',NULL,'2','2019-06-12 00:00:00','3','2019-06-13 00:00:00','4','2019-06-14 00:00:00','5','2019-06-15 00:00:00','6','2019-06-16 00:00:00','7','2019-06-17 00:00:00','8','2019-06-18 00:00:00','9','2019-06-19 00:00:00','10','2019-06-10 00:00:00','21','2019-06-21 00:00:00','22','2019-06-22 00:00:00','23','2019-06-23 00:00:00','24','2019-06-24 00:00:00','25','2019-06-25 00:00:00','26','2019-06-26 00:00:00','27','2019-06-27 00:00:00','2019-06-28 00:00:00','8','5','2019-06-29 00:00:00','Down\'s','Edward','2019-06-30 00:00:00','24','5','3,4','Y','Y','ttdadx','2019-06-01 00:00:00','18','6',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(29,4,'2019-06-18 00:00:00','1',NULL,'2','2019-06-12 00:00:00','3','2019-06-13 00:00:00','4','2019-06-14 00:00:00','5','2019-06-15 00:00:00','6','2019-06-16 00:00:00','7','2019-06-17 00:00:00','8','2019-06-18 00:00:00','9','2019-06-19 00:00:00','10','2019-06-10 00:00:00','21','2019-06-21 00:00:00','22','2019-06-22 00:00:00','23','2019-06-23 00:00:00','24','2019-06-24 00:00:00','25','2019-06-25 00:00:00','26','2019-06-26 00:00:00','27','2019-06-27 00:00:00','2019-06-28 00:00:00','8','5','2019-06-29 00:00:00','Down\'s','Edward','2019-06-30 00:00:00','24','5','3,4','Y','Y','ttdadx','2019-06-01 00:00:00','18','6',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(30,4,'2019-06-18 00:00:00','1',NULL,'2','2019-06-12 00:00:00','3','2019-06-13 00:00:00','4','2019-06-14 00:00:00','5','2019-06-15 00:00:00','6','2019-06-16 00:00:00','7','2019-06-17 00:00:00','8','2019-06-18 00:00:00','9','2019-06-19 00:00:00','10','2019-06-10 00:00:00','21','2019-06-21 00:00:00','22','2019-06-22 00:00:00','23','2019-06-23 00:00:00','24','2019-06-24 00:00:00','25','2019-06-25 00:00:00','26','2019-06-26 00:00:00','27','2019-06-27 00:00:00','2019-06-28 00:00:00','8','5','2019-06-29 00:00:00','Down\'s','Edward','2019-06-30 00:00:00','24','5','3,4','Y','Y','ttdadx','2019-06-01 00:00:00','18','6',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(32,4,'2019-06-22 00:00:00','1',NULL,'2','2019-06-12 00:00:00','3','2019-06-13 00:00:00','4','2019-06-14 00:00:00','5','2019-06-15 00:00:00','6','2019-06-16 00:00:00','7','2019-06-17 00:00:00','8','2019-06-18 00:00:00','9','2019-06-19 00:00:00','10','2019-06-10 00:00:00','21','2019-06-21 00:00:00','22','2019-06-22 00:00:00','23','2019-06-23 00:00:00','24','2019-06-24 00:00:00','25','2019-06-25 00:00:00','26','2019-06-26 00:00:00','27','2019-06-27 00:00:00','2019-06-28 00:00:00','8','5','2019-06-29 00:00:00','Down\'s','Edward','2019-06-30 00:00:00','24','5','3,4','Y','Y','ttdadx','2019-06-01 00:00:00','20','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(35,19,'2019-06-24 00:00:00','102','2019-06-18 00:00:00','12',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,NULL,'0','0',NULL,'0','0',NULL,'0','0','','Y','N','',NULL,'0','0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(36,4,'2019-07-04 00:00:00','',NULL,'2','2019-06-12 00:00:00','3','2019-06-13 00:00:00','4','2019-06-14 00:00:00','5','2019-06-15 00:00:00','6','2019-06-16 00:00:00','7','2019-06-17 00:00:00','8','2019-06-18 00:00:00','9','2019-06-19 00:00:00','10','2019-06-10 00:00:00','21','2019-06-21 00:00:00','22','2019-06-22 00:00:00','23','2019-06-23 00:00:00','24','2019-06-24 00:00:00','25','2019-06-25 00:00:00','26','2019-06-26 00:00:00','27','2019-06-27 00:00:00','2019-06-28 00:00:00','8','5','2019-06-29 00:00:00','Down\'s','Edward','2019-06-30 00:00:00','24','5','3,4','Y','Y','ttdadx','2019-06-01 00:00:00','20','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(53,4,'2019-07-16 00:00:00','',NULL,'2','2019-06-12 00:00:00','3','2019-06-13 00:00:00','4','2019-06-14 00:00:00','5','2019-06-15 00:00:00','6','2019-06-16 00:00:00','7','2019-06-17 00:00:00','8','2019-06-18 00:00:00','9','2019-06-19 00:00:00','10','2019-06-10 00:00:00','21','2019-06-21 00:00:00','22','2019-06-22 00:00:00','23','2019-06-23 00:00:00','24','2019-06-24 00:00:00','25','2019-06-25 00:00:00','26','2019-06-26 00:00:00','27','2019-06-27 00:00:00','2019-06-28 00:00:00','8','5','2019-06-29 00:00:00','Down\'s,Edward','Down\'s,Edward,Patan','2019-06-30 00:00:00','24','5','3,4','Y','Y','ttdadx','2019-06-01 00:00:00','20','1','Transverse lie','10','','2019-07-30 00:00:00','22','5','Oblique lie','8','Inadequate','Normal','1','2','3','4','other','2019-07-25 00:00:00'),(58,4,'2019-07-23 00:00:00','',NULL,'2','2019-06-12 00:00:00','3','2019-06-13 00:00:00','4','2019-06-14 00:00:00','5','2019-06-15 00:00:00','6','2019-06-16 00:00:00','7','2019-06-17 00:00:00','8','2019-06-18 00:00:00','9','2019-06-19 00:00:00','10','2019-06-10 00:00:00','21','2019-06-21 00:00:00','22','2019-06-22 00:00:00','23','2019-06-23 00:00:00','24','2019-06-24 00:00:00','25','2019-06-25 00:00:00','26','2019-06-26 00:00:00','27','2019-06-27 00:00:00','2019-06-28 00:00:00','8','5','2019-06-29 00:00:00','Down\'s,Edward','Down\'s,Edward,Patan','2019-06-30 00:00:00','24','5','3,4','Y','Y','ttdadx','2019-06-01 00:00:00','20','1','Transverse lie','10','Inadequate','2019-07-30 00:00:00','22','5','Oblique lie','8','Inadequate',NULL,'','','','','',NULL);

/*Table structure for table `medical_problem` */

DROP TABLE IF EXISTS `medical_problem`;

CREATE TABLE `medical_problem` (
  `medicle_problem_id` int(10) NOT NULL AUTO_INCREMENT,
  `problem` varchar(255) DEFAULT NULL,
  `is_active` enum('Y','N') DEFAULT 'Y',
  PRIMARY KEY (`medicle_problem_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `medical_problem` */

insert  into `medical_problem`(`medicle_problem_id`,`problem`,`is_active`) values (1,'Asthma','Y'),(2,'GDM','Y'),(3,'PIH','Y'),(4,'Chr. hypertension','Y'),(5,'Type IIDM','Y'),(6,'Others','Y');

/*Table structure for table `medicine_category` */

DROP TABLE IF EXISTS `medicine_category`;

CREATE TABLE `medicine_category` (
  `med_cat_id` int(10) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`med_cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

/*Data for the table `medicine_category` */

insert  into `medicine_category`(`med_cat_id`,`category`) values (1,'Vitamin'),(2,'Antiemetic'),(3,'Antacid'),(4,'Laxative'),(5,'Thyroid Medicine'),(6,'Iron'),(7,'Calcium'),(8,'Medicine for HTN'),(9,'Anti Stretch Mark Cream'),(10,'Dietary Supplements'),(11,'Antispasmodic'),(12,'Progesterone'),(13,'Heparin'),(14,'Antibiotic'),(15,'Others');

/*Table structure for table `medicine_master` */

DROP TABLE IF EXISTS `medicine_master`;

CREATE TABLE `medicine_master` (
  `medicine_id` int(10) NOT NULL AUTO_INCREMENT,
  `medicine_name` varchar(255) DEFAULT NULL,
  `medicine_type` int(10) DEFAULT NULL,
  `brand_name` varchar(255) DEFAULT NULL,
  `generic` varchar(255) DEFAULT NULL,
  `is_active` enum('Y','N') DEFAULT 'Y',
  `instruction` varchar(500) DEFAULT NULL,
  `category_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`medicine_id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8;

/*Data for the table `medicine_master` */

insert  into `medicine_master`(`medicine_id`,`medicine_name`,`medicine_type`,`brand_name`,`generic`,`is_active`,`instruction`,`category_id`) values (1,'Fol 123',2,NULL,NULL,'Y','1 tab once daily',1),(2,'Innovfol',2,NULL,NULL,'Y','1 tab once daily',1),(3,'Folinext Gold',2,NULL,NULL,'Y','1 tab once daily',1),(4,'Ondem 4mg',2,NULL,NULL,'Y','1 tab sos in case of excessive vomiting (not more than thrice daily)',2),(5,'Folinext D',2,NULL,NULL,'Y','1 tab once daily',1),(6,'Doxinate',2,NULL,NULL,'Y','1 tab once daily before breakfast and 1-2 at bedtime',2),(7,'Zofer 4mg',2,NULL,NULL,'Y','1 tab sos in case of excessive vomiting (not more than thrice daily)',2),(8,'Ondem MD 4mg',2,NULL,NULL,'Y','1 tab sos in case of excessive vomiting (not more than thrice daily)',2),(9,'Innov Fol D3',2,NULL,NULL,'Y','1 tab once daily',1),(10,'Zofer MD 4mg',2,NULL,NULL,'Y','1 tab sos in case of excessive vomiting (not more than thrice daily)',2),(11,'Pantop MPS',1,NULL,NULL,'Y','2 tsf once/twice daily after food in case of acidity',3),(12,'Pan MPS',1,NULL,NULL,'Y','2 tsf once/twice daily after food in case of acidity',3),(13,'Mucaine Gel',1,NULL,NULL,'Y','3 tsf stat in case of severe upper abdominal discomforte/pair',3),(14,'Duphalac',1,NULL,NULL,'Y','3 tsf once/twice daily in case of hard stool.after food',4),(15,'Cremaffin',1,NULL,NULL,'Y','3 tsf once/twice daily in case of hard stool.after food',4),(16,'Thyronorm 12.5',2,NULL,NULL,'Y','one/ 1.5 tab once daily before breakfast',5),(17,'Thyronorm 25',2,NULL,NULL,'Y','one/ 1.5 tab once daily before breakfast',5),(18,'Thyronorm 50',2,NULL,NULL,'Y','one/ 1.5 tab once daily before breakfast',5),(19,'Thyronorm 62.5',2,NULL,NULL,'Y','one/ 1.5 tab once daily before breakfast',5),(20,'Thyronorm 75',2,NULL,NULL,'Y','one/ 1.5 tab once daily before breakfast',5),(21,'Thyronorm 87.5',2,NULL,NULL,'Y','one/ 1.5 tab once daily before breakfast',5),(22,'Thyronorm 100',2,NULL,NULL,'Y','one/ 1.5 tab once daily before breakfast',5),(23,'Thyronorm 125',2,NULL,NULL,'Y','one/ 1.5 tab once daily before breakfast',5),(24,'CPink',2,NULL,NULL,'Y','1 tab once/twice daily after lunch/meal',6),(25,'Richar CR 75',2,NULL,NULL,'Y','1 tab once/twice daily after lunch/meal',6),(26,'Richar CR 100',2,NULL,NULL,'Y','1 tab once/twice daily after lunch/meal',6),(27,'Feronia -D3',2,NULL,NULL,'Y','1 tab once/twice daily after lunch/meal',6),(28,'Ferium XT',2,NULL,NULL,'Y','1 tab once/twice daily after lunch/meal',6),(29,'Actrin',2,NULL,NULL,'Y','1 tab once/twice daily after lunch/meal',6),(30,'Cheri XT',2,NULL,NULL,'Y','1 tab once/twice daily after lunch/meal',6),(31,'Hemfer XT',2,NULL,NULL,'Y','1 tab once/twice daily after lunch/meal',6),(32,'Softeron Z',2,NULL,NULL,'Y','1 tab once/twice daily after lunch/meal',6),(33,'Vehycal',2,NULL,NULL,'Y','1 tab once/twice daily after food',7),(34,'CCM',2,NULL,NULL,'Y','1 tab once/twice daily after food',7),(35,'Gemcal Mom',2,NULL,NULL,'Y','1 tab once/twice daily after food',7),(36,'Gemcal XT',2,NULL,NULL,'Y','1 tab once/twice daily after food',7),(37,'Zecal Active',2,NULL,NULL,'Y','1 tab once/twice daily after food',7),(38,'Calcimax Forte',2,NULL,NULL,'Y','1 tab once/twice daily after food',7),(39,'Lobet',2,NULL,NULL,'Y','1 tab/2 tab once/twice/thrice daily after food',8),(40,'Labebet 100mg',2,NULL,NULL,'Y','1 tab/2 tab once/twice/thrice daily after food',8),(41,'Nicardia Retard 20mg',2,NULL,NULL,'Y','1 tab once/twice daily after food',8),(42,'Luciara',8,NULL,NULL,'Y','twice daily to apply adequately over abdomen and thighs after bath at bedtime',9),(43,'Dermadew Aloe',8,NULL,NULL,'Y','twice daily to apply adequately over abdomen and thighs after bath at bedtime',9),(44,'Rich Glow Gel',8,NULL,NULL,'Y','twice daily to apply adequately over abdomen and thighs after bath at bedtime',9),(45,'Protinules PL',6,NULL,NULL,'Y','to consume with milk once daily',10),(46,'Pro PL',6,NULL,NULL,'Y','to consume with milk once daily',10),(47,'Baby &amp; Me',6,NULL,NULL,'Y','to consume with milk once daily',10),(48,'Lactonic Granules',6,NULL,NULL,'Y','to consume with milk once-twice daily',10),(49,'Hermin oral',9,NULL,NULL,'Y','one sachet once daily to consume with water',10),(50,'LRZin Forte',9,NULL,NULL,'Y','one sachet once daily to consume with water',10),(51,'Drotin DS',2,NULL,NULL,'Y','1 tab sos/twice daily for pain abdomen',11),(52,'Duphaston 10 Mg',2,NULL,NULL,'Y','1 tab twice daily/thrice daily',12),(53,'Depot Provera 500mg',4,NULL,NULL,'Y','1M stat / 1M weekly x 4weeks',12),(54,'Susten SR 300',2,NULL,NULL,'Y','1 tab once daily',12),(55,'Susten',2,NULL,NULL,'Y','1 tab once daily',12),(56,'Susten 100mg',4,NULL,NULL,'Y','1amp/2amp 1M once daily X 7/10 days',12),(57,'(Enoxaparin) Lonopin 40mg',4,NULL,NULL,'Y','sc once daily / on alternate days',13),(58,'(Enoxaparin) Lonopin 60mg',4,NULL,NULL,'Y','sc once daily / on alternate days',13),(59,'(Enoxaparin) Lonopin 80mg',4,NULL,NULL,'Y','sc once daily / on alternate days',13),(60,'Azithral 500',2,NULL,NULL,'Y','1 tab once before food x 5 days',14),(61,'metrogyl 400',2,NULL,NULL,'Y','1 tab twice daily after food x 3 days',14),(62,'Candid CL vaginal capsule',3,NULL,NULL,'Y','to insert inside the birth canal x 6 night at bedtime',14),(63,'ORS',9,NULL,NULL,'Y','1 sachet to be mixed with 1 liter of water and to consume frequently till  loose motion subsides.',15),(64,'TT 0.5ml',4,NULL,NULL,'Y','in on date (1st dose) and 2nd dose to be taken after 4 weeks',15),(65,'Betnesol 12 Mg',4,NULL,NULL,'Y','1M to be taken on 1day/2 day before OT/date',15),(66,'Tdap(Boostrix)',4,NULL,NULL,'Y','',15);

/*Table structure for table `medicine_type` */

DROP TABLE IF EXISTS `medicine_type`;

CREATE TABLE `medicine_type` (
  `medicine_type_id` int(10) NOT NULL AUTO_INCREMENT,
  `medicine_type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`medicine_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `medicine_type` */

insert  into `medicine_type`(`medicine_type_id`,`medicine_type`) values (1,'Syrup'),(2,'Tablet'),(3,'Capsule'),(4,'Injection'),(5,'Surgical Items'),(6,'Powder'),(7,'Drop'),(8,'Ointment'),(9,'Sachet');

/*Table structure for table `menstrual_medecine_details` */

DROP TABLE IF EXISTS `menstrual_medecine_details`;

CREATE TABLE `menstrual_medecine_details` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `medicine_name` varchar(255) DEFAULT NULL,
  `medicine_duration` varchar(255) DEFAULT NULL,
  `case_master_id` int(10) DEFAULT NULL COMMENT 'Table:case_master',
  `created_on` datetime DEFAULT NULL,
  `medicine_mst_id` int(10) DEFAULT NULL COMMENT 'Table:medicine_master',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=497 DEFAULT CHARSET=utf8;

/*Data for the table `menstrual_medecine_details` */

insert  into `menstrual_medecine_details`(`id`,`medicine_name`,`medicine_duration`,`case_master_id`,`created_on`,`medicine_mst_id`) values (309,'av','',16,'2019-06-19 00:00:00',NULL),(496,NULL,'10',4,'2019-07-23 00:00:00',1);

/*Table structure for table `menu_master` */

DROP TABLE IF EXISTS `menu_master`;

CREATE TABLE `menu_master` (
  `menu_id` int(10) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(255) DEFAULT NULL,
  `menu_link` varchar(255) DEFAULT NULL,
  `is_parent` enum('P','SM','SSM','C') DEFAULT NULL COMMENT 'P= Parent,SM=Sub Menu, SSM= Sub Sub Menu',
  `parent_id` int(10) DEFAULT NULL,
  `menu_srl` int(10) DEFAULT NULL,
  `is_active` enum('Y','N') DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `menu_master` */

insert  into `menu_master`(`menu_id`,`menu_name`,`menu_link`,`is_parent`,`parent_id`,`menu_srl`,`is_active`,`created_on`) values (1,'Get Ready',NULL,'P',NULL,1,'Y','2019-05-22 15:02:45'),(2,'Clinic Setup','Clinicsetup','C',1,1,'Y','2019-05-22 15:27:13'),(3,'Medicine','medicine','C',1,2,'Y','2019-05-22 15:27:35'),(4,'Complication','complication','C',1,3,'Y','2019-05-22 15:29:41'),(5,'Medical Problem','medicalproblem','C',1,4,'Y','2019-05-22 15:30:51'),(6,'Case','patientcase/selecttreatment','P',NULL,2,'Y','2019-05-28 17:09:39'),(7,'Investigation','investigationcomponent','C',1,5,'Y','2019-06-11 11:39:15'),(8,'Advice','advice','C',1,6,'Y','2019-07-18 12:22:50');

/*Table structure for table `occupation_master` */

DROP TABLE IF EXISTS `occupation_master`;

CREATE TABLE `occupation_master` (
  `occupation_id` int(10) NOT NULL AUTO_INCREMENT,
  `occupation` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`occupation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `occupation_master` */

insert  into `occupation_master`(`occupation_id`,`occupation`) values (1,'Service'),(2,'Business'),(3,'Teacher'),(4,'House Wife');

/*Table structure for table `patient_master` */

DROP TABLE IF EXISTS `patient_master`;

CREATE TABLE `patient_master` (
  `patient_id` int(10) NOT NULL AUTO_INCREMENT,
  `reg_date` datetime DEFAULT NULL,
  `selfmobile` varchar(20) DEFAULT NULL,
  `alternate_mobile` varchar(20) DEFAULT NULL,
  `patientname` varchar(255) DEFAULT NULL,
  `patientage` varchar(25) DEFAULT NULL,
  `patientgender` int(10) DEFAULT NULL,
  `bloodgroup` int(10) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `last_modified` datetime DEFAULT NULL,
  `husband_bloodgroup` int(10) DEFAULT NULL,
  `address` text,
  PRIMARY KEY (`patient_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

/*Data for the table `patient_master` */

insert  into `patient_master`(`patient_id`,`reg_date`,`selfmobile`,`alternate_mobile`,`patientname`,`patientage`,`patientgender`,`bloodgroup`,`created_on`,`last_modified`,`husband_bloodgroup`,`address`) values (12,'2019-05-30 00:00:00','9874566512','','Rahul Ghosh','23',2,NULL,'2019-05-30 15:39:10','2019-06-24 14:33:27',NULL,'abc'),(13,'2019-05-30 00:00:00','2','2','Ravi Teja','2',2,2,'2019-05-30 15:50:47','2019-06-10 13:07:15',NULL,NULL),(14,'2019-05-30 00:00:00','2','2','Amit Roy','2',2,2,'2019-05-30 15:51:13',NULL,NULL,NULL),(15,'2019-05-30 00:00:00','91535758029','91535758030','Rani Paul','39',2,NULL,'2019-05-30 15:52:29','2019-07-18 19:51:09',NULL,'2/E,4th Floor,Raktima Apartment ,Kolkata, West Bengal - 700052'),(16,'2019-06-10 00:00:00','9153588888','','Riya','25',2,7,'2019-06-10 11:24:11','2019-06-11 16:29:28',NULL,NULL),(20,'2019-06-11 00:00:00','11','1','q','2',2,9,'2019-06-11 16:39:09',NULL,NULL,NULL),(21,'2019-06-19 00:00:00','9988774455','','A Ghosh','29',2,5,'2019-06-19 13:32:50',NULL,5,'a'),(22,'2019-06-24 00:00:00','9988774455','','Asin','32',2,NULL,'2019-06-24 14:24:04',NULL,NULL,''),(23,'2019-07-24 00:00:00','7003319369','','S das','32',2,NULL,'2019-07-24 13:13:41','2019-07-24 13:46:03',NULL,'dd'),(24,'2019-07-29 00:00:00','7897894563','','aaa','23',2,NULL,'2019-07-29 11:40:36','2019-07-29 11:41:05',NULL,'');

/*Table structure for table `placenta_master` */

DROP TABLE IF EXISTS `placenta_master`;

CREATE TABLE `placenta_master` (
  `placenta_id` int(10) NOT NULL AUTO_INCREMENT,
  `placenta_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`placenta_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `placenta_master` */

insert  into `placenta_master`(`placenta_id`,`placenta_name`) values (1,'Ant'),(2,'Post'),(3,'Fundal'),(4,'Upper Seg'),(5,'Lower Seg');

/*Table structure for table `prescription_investigation_dtl` */

DROP TABLE IF EXISTS `prescription_investigation_dtl`;

CREATE TABLE `prescription_investigation_dtl` (
  `prescription_inv_id` int(10) NOT NULL AUTO_INCREMENT,
  `prescription_mst_id` int(10) DEFAULT NULL,
  `investigation_comp_id` int(10) DEFAULT NULL COMMENT 'investigation_component',
  `created_on` datetime DEFAULT NULL,
  PRIMARY KEY (`prescription_inv_id`)
) ENGINE=InnoDB AUTO_INCREMENT=598 DEFAULT CHARSET=utf8;

/*Data for the table `prescription_investigation_dtl` */

insert  into `prescription_investigation_dtl`(`prescription_inv_id`,`prescription_mst_id`,`investigation_comp_id`,`created_on`) values (1,5,1,'2019-06-14 00:00:00'),(2,5,2,'2019-06-14 00:00:00'),(3,6,1,'2019-06-14 00:00:00'),(4,6,2,'2019-06-14 00:00:00'),(5,7,1,'2019-06-14 00:00:00'),(6,7,2,'2019-06-14 00:00:00'),(7,7,5,'2019-06-14 00:00:00'),(8,8,1,'2019-06-14 00:00:00'),(9,8,2,'2019-06-14 00:00:00'),(10,8,5,'2019-06-14 00:00:00'),(11,8,9,'2019-06-14 00:00:00'),(12,9,1,'2019-06-18 00:00:00'),(13,9,2,'2019-06-18 00:00:00'),(14,9,5,'2019-06-18 00:00:00'),(15,9,9,'2019-06-18 00:00:00'),(16,10,1,'2019-06-18 00:00:00'),(17,10,2,'2019-06-18 00:00:00'),(18,10,5,'2019-06-18 00:00:00'),(19,10,9,'2019-06-18 00:00:00'),(20,11,1,'2019-06-19 00:00:00'),(21,11,2,'2019-06-19 00:00:00'),(22,11,5,'2019-06-19 00:00:00'),(23,11,9,'2019-06-19 00:00:00'),(24,12,1,'2019-06-19 00:00:00'),(25,12,2,'2019-06-19 00:00:00'),(26,12,5,'2019-06-19 00:00:00'),(27,12,9,'2019-06-19 00:00:00'),(28,13,1,'2019-06-19 00:00:00'),(29,13,2,'2019-06-19 00:00:00'),(30,13,5,'2019-06-19 00:00:00'),(31,13,9,'2019-06-19 00:00:00'),(32,14,1,'2019-06-19 00:00:00'),(33,14,2,'2019-06-19 00:00:00'),(34,14,5,'2019-06-19 00:00:00'),(35,14,9,'2019-06-19 00:00:00'),(36,15,1,'2019-06-19 00:00:00'),(37,15,2,'2019-06-19 00:00:00'),(38,15,5,'2019-06-19 00:00:00'),(39,16,1,'2019-06-19 00:00:00'),(40,16,2,'2019-06-19 00:00:00'),(41,16,5,'2019-06-19 00:00:00'),(42,16,9,'2019-06-19 00:00:00'),(43,17,1,'2019-06-19 00:00:00'),(44,17,2,'2019-06-19 00:00:00'),(45,17,5,'2019-06-19 00:00:00'),(46,17,9,'2019-06-19 00:00:00'),(47,18,1,'2019-06-21 00:00:00'),(48,18,2,'2019-06-21 00:00:00'),(49,18,5,'2019-06-21 00:00:00'),(50,18,9,'2019-06-21 00:00:00'),(59,21,1,'2019-06-21 00:00:00'),(60,21,2,'2019-06-21 00:00:00'),(61,21,5,'2019-06-21 00:00:00'),(62,21,9,'2019-06-21 00:00:00'),(79,26,1,'2019-06-22 00:00:00'),(80,26,2,'2019-06-22 00:00:00'),(81,26,5,'2019-06-22 00:00:00'),(82,26,9,'2019-06-22 00:00:00'),(91,49,1,'2019-06-24 00:00:00'),(92,49,2,'2019-06-24 00:00:00'),(93,49,5,'2019-06-24 00:00:00'),(94,49,9,'2019-06-24 00:00:00'),(119,56,1,'2019-07-02 00:00:00'),(120,56,2,'2019-07-02 00:00:00'),(121,56,5,'2019-07-02 00:00:00'),(122,56,9,'2019-07-02 00:00:00'),(195,75,1,'2019-07-03 00:00:00'),(196,75,2,'2019-07-03 00:00:00'),(197,75,5,'2019-07-03 00:00:00'),(198,75,9,'2019-07-03 00:00:00'),(275,95,1,'2019-07-04 00:00:00'),(276,95,2,'2019-07-04 00:00:00'),(277,95,5,'2019-07-04 00:00:00'),(278,95,9,'2019-07-04 00:00:00'),(311,104,1,'2019-07-12 00:00:00'),(312,104,2,'2019-07-12 00:00:00'),(313,104,5,'2019-07-12 00:00:00'),(314,104,9,'2019-07-12 00:00:00'),(383,122,1,'2019-07-16 00:00:00'),(384,122,2,'2019-07-16 00:00:00'),(385,122,5,'2019-07-16 00:00:00'),(386,122,9,'2019-07-16 00:00:00'),(447,138,1,'2019-07-18 00:00:00'),(448,138,2,'2019-07-18 00:00:00'),(449,138,5,'2019-07-18 00:00:00'),(450,138,9,'2019-07-18 00:00:00'),(499,151,1,'2019-07-19 00:00:00'),(500,151,2,'2019-07-19 00:00:00'),(501,151,5,'2019-07-19 00:00:00'),(502,151,9,'2019-07-19 00:00:00'),(511,154,1,'2019-07-20 00:00:00'),(512,154,2,'2019-07-20 00:00:00'),(513,154,5,'2019-07-20 00:00:00'),(514,154,9,'2019-07-20 00:00:00'),(576,183,1,'2019-07-22 00:00:00'),(577,183,5,'2019-07-22 00:00:00'),(596,193,1,'2019-07-23 00:00:00'),(597,193,5,'2019-07-23 00:00:00');

/*Table structure for table `prescription_master` */

DROP TABLE IF EXISTS `prescription_master`;

CREATE TABLE `prescription_master` (
  `prescription_id` int(10) NOT NULL AUTO_INCREMENT,
  `case_master_id` int(10) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `doctor_note` text,
  `next_checkup_dt` datetime DEFAULT NULL,
  `entry_date` datetime DEFAULT NULL,
  PRIMARY KEY (`prescription_id`)
) ENGINE=InnoDB AUTO_INCREMENT=196 DEFAULT CHARSET=utf8;

/*Data for the table `prescription_master` */

insert  into `prescription_master`(`prescription_id`,`case_master_id`,`created_on`,`doctor_note`,`next_checkup_dt`,`entry_date`) values (1,4,'2019-06-14 00:00:00',' st','2019-06-30 00:00:00',NULL),(2,4,'2019-06-14 00:00:00','  st',NULL,NULL),(3,4,'2019-06-14 00:00:00','   st',NULL,NULL),(4,4,'2019-06-14 00:00:00','    st',NULL,NULL),(5,4,'2019-06-14 00:00:00','     st',NULL,NULL),(6,4,'2019-06-14 00:00:00','      st',NULL,NULL),(7,4,'2019-06-14 17:48:33','doctor notes',NULL,NULL),(8,4,'2019-06-14 18:55:55',' doctor notes','2019-06-30 00:00:00',NULL),(9,4,'2019-06-18 18:39:46','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',NULL,NULL),(10,4,'2019-06-18 18:39:52','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','2019-06-18 00:00:00',NULL),(11,4,'2019-06-19 15:03:09',' Lorem Ipsum is simply dummy text of the printing and typesetting industry.','2019-06-20 00:00:00',NULL),(17,4,'2019-06-19 15:38:40','  Lorem Ipsum is simply dummy text .',NULL,NULL),(21,4,'2019-06-21 12:25:26','Lorem Ipsum is simply dummy text .','2019-06-30 00:00:00','2019-06-21 00:00:00'),(26,4,'2019-06-22 11:57:23','Lorem Ipsum is simply dummy text .',NULL,'2019-06-22 00:00:00'),(33,17,'2019-06-22 14:32:30','',NULL,'2019-06-22 00:00:00'),(48,19,'2019-06-24 17:47:42','',NULL,'2019-06-24 00:00:00'),(49,4,'2019-06-24 18:32:39','Lorem Ipsum is simply dummy text .',NULL,'2019-06-24 00:00:00'),(56,4,'2019-07-02 18:40:50','Lorem Ipsum is simply dummy text .',NULL,'2019-07-02 00:00:00'),(75,4,'2019-07-03 19:29:20','Lorem Ipsum is simply dummy text .',NULL,'2019-07-03 00:00:00'),(95,4,'2019-07-04 18:56:43','Lorem Ipsum is simply dummy text .',NULL,'2019-07-04 00:00:00'),(104,4,'2019-07-12 16:55:20','Lorem Ipsum is simply dummy text .',NULL,'2019-07-12 00:00:00'),(122,4,'2019-07-16 18:44:24','Lorem Ipsum is simply dummy text .',NULL,'2019-07-16 00:00:00'),(138,4,'2019-07-18 20:01:46','Lorem Ipsum is simply dummy text .',NULL,'2019-07-18 00:00:00'),(151,4,'2019-07-19 19:49:56','Lorem Ipsum is simply dummy text .',NULL,'2019-07-19 00:00:00'),(154,4,'2019-07-20 17:15:55','Lorem Ipsum is simply dummy text .',NULL,'2019-07-20 00:00:00'),(183,4,'2019-07-22 20:04:48','Lorem Ipsum is simply dummy text .',NULL,'2019-07-22 00:00:00'),(193,4,'2019-07-23 14:37:00','',NULL,'2019-07-23 00:00:00'),(195,20,'2019-07-24 13:32:30','',NULL,'2019-07-24 00:00:00');

/*Table structure for table `prescription_medicine_dtl` */

DROP TABLE IF EXISTS `prescription_medicine_dtl`;

CREATE TABLE `prescription_medicine_dtl` (
  `medicine_dtl_id` int(10) NOT NULL AUTO_INCREMENT,
  `prescription_mst_id` int(10) DEFAULT NULL,
  `medicine_id` int(10) DEFAULT NULL,
  `dosage` varchar(25) DEFAULT NULL,
  `frequency` varchar(25) DEFAULT NULL,
  `days` varchar(25) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `med_instruction` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`medicine_dtl_id`)
) ENGINE=InnoDB AUTO_INCREMENT=460 DEFAULT CHARSET=latin1;

/*Data for the table `prescription_medicine_dtl` */

insert  into `prescription_medicine_dtl`(`medicine_dtl_id`,`prescription_mst_id`,`medicine_id`,`dosage`,`frequency`,`days`,`created_on`,`med_instruction`) values (3,3,1,'0.5','OD','2','2019-06-14 00:00:00',NULL),(4,5,2,'1','OD','2','2019-06-14 00:00:00',NULL),(5,6,2,'1','OD','2','2019-06-14 00:00:00',NULL),(6,6,1,'0.5','0','','2019-06-14 00:00:00',NULL),(7,7,2,'1','OD','2','2019-06-14 00:00:00',NULL),(8,7,1,'0.5','0','','2019-06-14 00:00:00',NULL),(9,8,2,'1','OD','2','2019-06-14 00:00:00',NULL),(10,8,1,'0.5','0','','2019-06-14 00:00:00',NULL),(11,9,2,'1','OD','2','2019-06-18 00:00:00',NULL),(12,9,1,'0.5','0','','2019-06-18 00:00:00',NULL),(13,10,2,'1','OD','2','2019-06-18 00:00:00',NULL),(14,10,1,'0.5','0','','2019-06-18 00:00:00',NULL),(15,11,2,'1','OD','2','2019-06-19 00:00:00',NULL),(16,11,1,'0.5','0','','2019-06-19 00:00:00',NULL),(17,12,2,'1','OD','2','2019-06-19 00:00:00',NULL),(18,12,1,'0.5','0','','2019-06-19 00:00:00',NULL),(19,13,2,'1','OD','2','2019-06-19 00:00:00',NULL),(20,13,1,'0.5','0','','2019-06-19 00:00:00',NULL),(21,14,2,'1','OD','2','2019-06-19 00:00:00',NULL),(22,14,1,'0.5','0','','2019-06-19 00:00:00',NULL),(23,15,2,'1','OD','2','2019-06-19 00:00:00',NULL),(24,15,1,'0.5','0','','2019-06-19 00:00:00',NULL),(25,16,2,'1','OD','2','2019-06-19 00:00:00',NULL),(26,16,1,'0.5','0','','2019-06-19 00:00:00',NULL),(27,16,3,'1','0','1','2019-06-19 00:00:00',NULL),(28,17,2,'1','OD','2','2019-06-19 00:00:00',NULL),(29,17,1,'0.5','0','','2019-06-19 00:00:00',NULL),(30,18,2,'1','OD','2','2019-06-21 00:00:00',NULL),(31,18,1,'0.5','0','','2019-06-21 00:00:00',NULL),(36,21,2,'1','OD','2','2019-06-21 00:00:00',NULL),(37,21,1,'0.5','0','','2019-06-21 00:00:00',NULL),(46,26,2,'1','OD','2','2019-06-22 00:00:00',NULL),(47,26,1,'0.5','0','','2019-06-22 00:00:00',NULL),(57,48,1,'0.5','OD','2','2019-06-24 00:00:00',NULL),(58,49,2,'1','OD','2','2019-06-24 00:00:00',NULL),(59,49,1,'0.5','0','','2019-06-24 00:00:00',NULL),(72,56,2,'1','OD','2','2019-07-02 00:00:00',NULL),(73,56,1,'0.5','0','','2019-07-02 00:00:00',NULL),(110,75,2,'1','OD','2','2019-07-03 00:00:00',NULL),(111,75,1,'0.5','0','','2019-07-03 00:00:00',NULL),(112,75,13,'1.5','0','','2019-07-03 00:00:00',NULL),(170,95,2,'1','OD','2','2019-07-04 00:00:00',NULL),(171,95,1,'0.5','0','','2019-07-04 00:00:00',NULL),(172,95,2,'0','0','','2019-07-04 00:00:00',NULL),(197,104,2,'1','OD','2','2019-07-12 00:00:00',NULL),(198,104,1,'0.5','0','','2019-07-12 00:00:00',NULL),(199,104,2,'0','0','','2019-07-12 00:00:00',NULL),(251,122,2,'1','OD','2','2019-07-16 00:00:00',NULL),(252,122,1,'0.5','0','','2019-07-16 00:00:00',NULL),(253,122,2,'0','0','','2019-07-16 00:00:00',NULL),(299,138,2,'1','OD','2','2019-07-18 00:00:00',NULL),(300,138,1,'0.5','0','','2019-07-18 00:00:00',NULL),(301,138,2,'0','0','','2019-07-18 00:00:00',NULL),(339,151,2,'1','OD','2','2019-07-19 00:00:00',NULL),(340,151,1,'0.5','0','','2019-07-19 00:00:00',NULL),(341,151,2,'0','0','','2019-07-19 00:00:00',NULL),(342,151,2,'1','0','','2019-07-19 00:00:00',NULL),(343,151,2,'0.5','0','','2019-07-19 00:00:00',NULL),(347,154,1,'0','0','','2019-07-20 00:00:00',''),(348,154,8,'0','0','','2019-07-20 00:00:00',''),(349,154,8,'0','0','','2019-07-20 00:00:00',''),(350,154,1,'0','0','','2019-07-20 00:00:00','redt'),(428,183,2,'','','5','2019-07-22 00:00:00','1 tab once daily'),(429,183,10,'','','2','2019-07-22 00:00:00','1 tab sos in case of excessive vomiting (not more than thrice daily)'),(430,183,10,'','OD','','2019-07-22 00:00:00','1 tab sos in case of excessive vomiting (not more than thrice daily)'),(458,193,10,'','OD','','2019-07-23 00:00:00','1 tab sos in case of excessive vomiting (not more than thrice daily)'),(459,193,2,'','BD','','2019-07-23 00:00:00','1 tab once daily');

/*Table structure for table `previous_child_birth_history` */

DROP TABLE IF EXISTS `previous_child_birth_history`;

CREATE TABLE `previous_child_birth_history` (
  `child_dtl_id` int(10) NOT NULL AUTO_INCREMENT,
  `case_master_id` int(10) DEFAULT NULL,
  `birthplace` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `complication` varchar(255) DEFAULT NULL,
  `medicalproblem` varchar(255) DEFAULT NULL,
  `is_othermedprob` enum('Y','N') DEFAULT NULL,
  `medicalproblem_other` varchar(255) DEFAULT NULL,
  `delevery_type` enum('CS','ND','SE') DEFAULT NULL,
  `babygender` int(10) DEFAULT NULL,
  `babyage` varchar(255) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  PRIMARY KEY (`child_dtl_id`)
) ENGINE=InnoDB AUTO_INCREMENT=925 DEFAULT CHARSET=utf8;

/*Data for the table `previous_child_birth_history` */

insert  into `previous_child_birth_history`(`child_dtl_id`,`case_master_id`,`birthplace`,`year`,`complication`,`medicalproblem`,`is_othermedprob`,`medicalproblem_other`,`delevery_type`,`babygender`,`babyage`,`created_on`) values (506,17,'','','','','N',NULL,'CS',2,'0.00','2019-06-22 14:32:30'),(922,4,'kolkata','2009','4,5,6,7','1,2,6','Y','','ND',1,'10','2019-07-23 14:37:01'),(923,4,'Howrah','2008','7,10,11','5','N',NULL,'ND',2,'11','2019-07-23 14:37:01'),(924,4,'fd','2016','4,8','6','Y','sasafdg,essfrs','SE',1,'3','2019-07-23 14:37:01');

/*Table structure for table `regular_medicines_details` */

DROP TABLE IF EXISTS `regular_medicines_details`;

CREATE TABLE `regular_medicines_details` (
  `regular_medicines_dtl_id` int(10) NOT NULL AUTO_INCREMENT,
  `case_master_id` int(10) DEFAULT NULL,
  `medicine_name` varchar(255) DEFAULT NULL,
  `medicine_dose` varchar(255) DEFAULT NULL,
  `for_year` varchar(10) DEFAULT NULL,
  `for_month` varchar(10) DEFAULT NULL,
  `medicine_mst_id` int(10) DEFAULT NULL COMMENT 'Table:medicine_master',
  PRIMARY KEY (`regular_medicines_dtl_id`)
) ENGINE=InnoDB AUTO_INCREMENT=522 DEFAULT CHARSET=utf8;

/*Data for the table `regular_medicines_details` */

insert  into `regular_medicines_details`(`regular_medicines_dtl_id`,`case_master_id`,`medicine_name`,`medicine_dose`,`for_year`,`for_month`,`medicine_mst_id`) values (236,17,'Medicine  A','2','4','0',NULL),(248,19,'abc','0','0','1',NULL),(520,4,NULL,'7.5','10','7',1),(521,4,NULL,'0.5','','',4);

/*Table structure for table `serial_master` */

DROP TABLE IF EXISTS `serial_master`;

CREATE TABLE `serial_master` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `next_serial_no` varchar(6) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `year` int(10) DEFAULT NULL,
  `clinic_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `serial_master` */

insert  into `serial_master`(`id`,`next_serial_no`,`type`,`year`,`clinic_id`) values (4,'40','NEWCASE',2019,1),(5,'1','NEWCASE',2019,8),(6,'1','NEWCASE',2020,8),(7,'1','NEWCASE',2021,8),(8,'1','NEWCASE',2022,8),(9,'1','NEWCASE',2023,8);

/*Table structure for table `surgery_details` */

DROP TABLE IF EXISTS `surgery_details`;

CREATE TABLE `surgery_details` (
  `surgery_details_id` int(10) NOT NULL AUTO_INCREMENT,
  `case_master_id` int(10) DEFAULT NULL,
  `surgery_mst_id` int(10) DEFAULT NULL,
  `other_surgery_name` varchar(255) DEFAULT NULL,
  `yearback` int(10) DEFAULT NULL,
  PRIMARY KEY (`surgery_details_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1993 DEFAULT CHARSET=utf8;

/*Data for the table `surgery_details` */

insert  into `surgery_details`(`surgery_details_id`,`case_master_id`,`surgery_mst_id`,`other_surgery_name`,`yearback`) values (433,15,1,'',NULL),(434,15,2,'',NULL),(435,15,3,'',NULL),(436,15,4,'',NULL),(437,15,5,'',NULL),(438,15,6,'',NULL),(967,16,1,'',NULL),(968,16,2,'',NULL),(969,16,3,'',NULL),(970,16,4,'',NULL),(971,16,5,'',NULL),(972,16,6,'',NULL),(1063,17,1,'',NULL),(1064,17,2,'',NULL),(1065,17,3,'',NULL),(1066,17,4,'',NULL),(1067,17,5,'',NULL),(1068,17,6,'',NULL),(1153,19,1,'',NULL),(1154,19,2,'',NULL),(1155,19,3,'',NULL),(1156,19,4,'',NULL),(1157,19,5,'',NULL),(1158,19,6,'',NULL),(1975,4,1,'',2),(1976,4,2,'',3),(1977,4,3,'',6),(1978,4,4,'',2),(1979,4,5,'',3),(1980,4,6,'Other Surgery Abc',2),(1987,20,1,'',NULL),(1988,20,2,'',NULL),(1989,20,3,'',NULL),(1990,20,4,'',NULL),(1991,20,5,'',NULL),(1992,20,6,'',NULL);

/*Table structure for table `surgery_master` */

DROP TABLE IF EXISTS `surgery_master`;

CREATE TABLE `surgery_master` (
  `surgery_id` int(10) NOT NULL AUTO_INCREMENT,
  `surgery_name` varchar(255) DEFAULT NULL,
  `is_textfield` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`surgery_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `surgery_master` */

insert  into `surgery_master`(`surgery_id`,`surgery_name`,`is_textfield`) values (1,'LUCS','N'),(2,'NTP','N'),(3,'Diagnostic laparoscopy','N'),(4,'Appendix','N'),(5,'Myomectomy','N'),(6,'Others Surgery','Y');

/*Table structure for table `user_master` */

DROP TABLE IF EXISTS `user_master`;

CREATE TABLE `user_master` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `is_active` enum('Y','N') DEFAULT NULL,
  `user_role` int(10) DEFAULT NULL,
  `doctor_id` int(10) DEFAULT NULL,
  `clinic_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `user_master` */

insert  into `user_master`(`user_id`,`username`,`password`,`is_active`,`user_role`,`doctor_id`,`clinic_id`) values (1,'admin','21232f297a57a5a743894a0e4a801fc3','Y',1,1,1);

/*Table structure for table `user_role_master` */

DROP TABLE IF EXISTS `user_role_master`;

CREATE TABLE `user_role_master` (
  `role_id` int(10) NOT NULL AUTO_INCREMENT,
  `role` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `user_role_master` */

insert  into `user_role_master`(`role_id`,`role`) values (1,'DEVELOPER'),(2,'SUPERADMIN'),(3,'ADMIN'),(4,'DOCTOR');

/*Table structure for table `vaccination_master` */

DROP TABLE IF EXISTS `vaccination_master`;

CREATE TABLE `vaccination_master` (
  `vaccination_id` int(10) NOT NULL AUTO_INCREMENT,
  `vaccination_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`vaccination_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `vaccination_master` */

insert  into `vaccination_master`(`vaccination_id`,`vaccination_name`) values (1,'MMR'),(2,'Chicken Pox'),(3,'Hepatitis B'),(4,'CACX'),(5,'TT');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
