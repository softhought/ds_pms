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
  `diseases_ids` varchar(255) DEFAULT NULL,
  `is_other_diseases` enum('Y','N') DEFAULT NULL,
  `other_diseases` varchar(255) DEFAULT NULL,
  `any_allergy` varchar(500) DEFAULT NULL,
  `vaccination_ids` varchar(255) DEFAULT NULL,
  `highrisk_ids` varchar(10) DEFAULT NULL,
  `is_highrisk_others` enum('Y','N') DEFAULT NULL,
  `highrisk_others` varchar(255) DEFAULT NULL,
  `tt_taken_on_tobe_taken_on` datetime DEFAULT NULL,
  `tdap_taken_on_tobe_taken_on` datetime DEFAULT NULL,
  PRIMARY KEY (`antenantal_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

/*Data for the table `antenantal_master` */

insert  into `antenantal_master`(`antenantal_id`,`case_master_id`,`wife_bloodgroup`,`husband_bloodgroup`,`wife_occupation`,`husband_occupation`,`wife_education`,`husband_education`,`married_for_year`,`trying_for_year`,`medicine_concieve`,`procedure_concieve`,`procedure_date`,`cigarette_addiction`,`cigarette_per_day`,`alcohol_addiction`,`other_addiction`,`lmp_date`,`edd_date`,`usg_week`,`seleddbyusg_date`,`usg_days`,`usg_date`,`parity_term_delivery`,`parity_preterm`,`parity_abortion`,`parity_issue`,`gravida_parity`,`spontaneous_abortion`,`menstrual_cycle_type`,`menstrual_flow`,`menstrual_duration_days`,`menstrual_cycle_days`,`diseases_ids`,`is_other_diseases`,`other_diseases`,`any_allergy`,`vaccination_ids`,`highrisk_ids`,`is_highrisk_others`,`highrisk_others`,`tt_taken_on_tobe_taken_on`,`tdap_taken_on_tobe_taken_on`) values (5,4,7,5,4,2,1,4,'7','5','Clomiphene,Gonadotropins','IUI','2020-07-23 00:00:00','No','12','Never','','2019-06-01 00:00:00','2020-03-07 00:00:00','7','2019-08-01 00:00:00','3','2020-03-16 00:00:00','4','5','6','7','','6','Regular','','10','20','6,7,8','N',NULL,'skin problem','1,5','1,2,5','Y','other high risk','2019-07-02 00:00:00','2019-07-21 00:00:00'),(13,5,0,0,0,0,0,0,'0','0','','',NULL,'','','','',NULL,NULL,'0',NULL,'0',NULL,'0','0','0','0','0','0','','','','','','N',NULL,'','','','N','',NULL,NULL),(14,3,0,0,0,0,0,0,'0','0','','',NULL,'','','','',NULL,NULL,'0',NULL,'0',NULL,'0','0','0','0','0','0','','','','','','N',NULL,'','','','N','',NULL,NULL),(15,15,0,0,0,0,0,0,'0','0','','',NULL,'','','','',NULL,NULL,'0',NULL,'0',NULL,'0','0','0','0','0','0','','','','','','N',NULL,'','','','N','',NULL,NULL),(16,16,5,0,0,0,1,0,'0','0','Clomiphene','',NULL,'','','','',NULL,NULL,'0',NULL,'0',NULL,'0','0','0','0','0','0','','','','','','N',NULL,'','','','N','',NULL,NULL),(17,17,0,0,0,0,0,0,'0','0','Clomiphene','',NULL,'','','','',NULL,NULL,'0',NULL,'0',NULL,'0','0','0','0','0','0','','','','','','N',NULL,'','','','N','',NULL,NULL),(18,19,0,0,0,0,0,0,'0','0','','',NULL,'','','','',NULL,NULL,'',NULL,'',NULL,'1','2','4','2','','','','','','','','N',NULL,'','','','N','',NULL,NULL);

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
  PRIMARY KEY (`case_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

/*Data for the table `case_master` */

insert  into `case_master`(`case_id`,`case_no`,`patient_id`,`clinic_id`,`major_group`,`created_on`,`patient_reg_type`,`previous_case_id`) values (1,'ILS/00016/19',12,1,'Obstetrics','2019-05-30 00:00:00',NULL,NULL),(2,'ILS/00017/19',13,1,'Obstetrics','2019-05-30 00:00:00',NULL,NULL),(3,'ILS/00018/19',14,1,'Obstetrics','2019-05-30 00:00:00',NULL,NULL),(4,'ILS/00019/19',15,1,'Obstetrics','2019-05-30 00:00:00',NULL,NULL),(5,'ILS/00020/19',16,1,'Obstetrics','2019-06-10 00:00:00',NULL,NULL),(15,'ILS/00031/19',20,1,'Obstetrics','2019-06-11 00:00:00','New',NULL),(16,'ILS/00032/19',21,1,'Obstetrics','2019-06-19 00:00:00','New',NULL),(17,'ILS/00033/19',15,1,'Obstetrics','2019-06-22 00:00:00','Existing',4),(18,'ILS/00034/19',22,1,'Obstetrics','2019-06-24 00:00:00','New',NULL),(19,'ILS/00035/19',12,1,'Obstetrics','2019-06-24 00:00:00','Existing',1);

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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

/*Data for the table `clinical_examination_details` */

insert  into `clinical_examination_details`(`clinical_exm_dtl_id`,`case_master_id`,`examination_date`,`weeks_by_lmp`,`days_by_lmp`,`weeks_by_usg`,`days_by_usg`,`cliexm_weight`,`cliexm_bp_s`,`cliexm_bp_d`,`cliexm_pallor`,`cliexm_oedema`,`fundal_height`,`cliexm_sfh`,`cliexm_fsh`,`cliexm_appointment_date`,`cliexm_after_week`,`cliexm_after_days`,`entry_date`) values (33,4,'2019-08-20 00:00:00','11','3','2','5','59','59','33','Mod','44','22','4','4',NULL,'5','4','2019-07-04 00:00:00');

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
  PRIMARY KEY (`doctor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `doctor_master` */

insert  into `doctor_master`(`doctor_id`,`doctor_name`,`is_active`) values (1,'Dr.Sutapa Sen','Y');

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
  `exam_cus` varchar(255) DEFAULT NULL,
  `exam_chest` varchar(255) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  PRIMARY KEY (`examination_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

/*Data for the table `examination_master` */

insert  into `examination_master`(`examination_id`,`case_master_id`,`exam_height`,`exam_weight`,`exam_bmi`,`exam_pluse`,`exam_bp_systolic`,`exam_bp_diastolic`,`exam_pallor`,`exam_icterus`,`exam_thyroid`,`exam_teeth`,`exam_cus`,`exam_chest`,`created_on`) values (2,4,'1','2','19.6','4','5','6','Mod','Present','7','8','9',NULL,'2019-06-10 00:00:00'),(5,4,'1','2','3','4','5','6','Mod','Present','7','8','9',NULL,'2019-06-10 00:00:00'),(6,4,'1','2','3','4','5','6','Mod','Present','7','8','9',NULL,'2019-06-10 00:00:00'),(7,4,'1','2','3','4','5','6','Mod','Present','7','8','9','45','2019-06-10 00:00:00'),(8,4,'11','21','31','41','51','61','Severe','Nil','71','81','91','451','2019-06-10 00:00:00'),(9,4,'10','21','20','30','51','61','Severe','Nil','71','81','91','Normal','2019-06-10 00:00:00'),(10,4,'10','21','20','30','51','61','Severe','Nil','71','81','91','Normal2','2019-06-11 00:00:00'),(11,4,'10','21','20','30','51','61','Severe','Nil','71','81','91','Normal2','2019-06-11 00:00:00'),(13,4,'10','21','20','30','51','61','Severe','Nil','75','81','91','Normal','2019-06-22 00:00:00'),(15,19,'','','','','','','Nil','Present','Normal','Normal','Normal','Normal','2019-06-24 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=1555 DEFAULT CHARSET=latin1;

/*Data for the table `family_history_details` */

insert  into `family_history_details`(`fmly_history_id`,`case_master_id`,`family_comp_mst_id`,`othercomptext`,`is_father`,`is_mother`) values (379,15,1,'','N','N'),(380,15,2,'','N','N'),(381,15,3,'','N','N'),(382,15,4,'','N','N'),(383,15,5,'','N','N'),(384,15,6,'','N','N'),(385,15,7,'','N','N'),(1002,16,1,'','N','N'),(1003,16,2,'','N','N'),(1004,16,3,'','N','N'),(1005,16,4,'','N','N'),(1006,16,5,'','N','N'),(1007,16,6,'','N','N'),(1008,16,7,'','N','N'),(1114,17,1,'','N','N'),(1115,17,2,'','N','N'),(1116,17,3,'','N','N'),(1117,17,4,'','N','N'),(1118,17,5,'','N','N'),(1119,17,6,'','N','N'),(1120,17,7,'','N','N'),(1219,19,1,'','N','N'),(1220,19,2,'','N','N'),(1221,19,3,'','N','N'),(1222,19,4,'','N','N'),(1223,19,5,'','N','N'),(1224,19,6,'','N','N'),(1225,19,7,'','N','N'),(1548,4,1,'','Y','N'),(1549,4,2,'','N','Y'),(1550,4,3,'','Y','N'),(1551,4,4,'','Y','N'),(1552,4,5,'','Y','N'),(1553,4,6,'','N','Y'),(1554,4,7,'anyother','Y','N');

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
  PRIMARY KEY (`inv_record_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

/*Data for the table `investigation_record_master` */

insert  into `investigation_record_master`(`inv_record_id`,`case_master_id`,`created_on`,`hb_result`,`hb_date`,`tc_result`,`tc_date`,`dc_result`,`dc_date`,`fbs_result`,`fbs_date`,`ppbs_result`,`ppbs_date`,`vdrl_result`,`vdrl_date`,`hiv_one_result`,`hiv_one_date`,`hiv_two_result`,`hiv_two_date`,`hbsag_result`,`hbsag_date`,`antihcv_result`,`antihcv_date`,`urine_re_result`,`urine_re_date`,`cs_sensitive_to_result`,`cs_sensitive_date`,`stsh_result`,`stsh_date`,`s_urea_result`,`s_urea_date`,`s_creatinine_result`,`s_creatinine_date`,`combined_test_result`,`combined_test_date`,`thalassemia_result`,`thalassemia_date`,`usg_scan_date`,`usg_slf_week`,`usg_slf_day`,`nt_scan_date`,`nt_scan_lowerrisk`,`nt_scan_highrisk`,`anomaly_scan_date`,`anomaly_slf_week`,`anomaly_slf_day`,`anomaly_placenta`,`is_no_anomaly_seen`,`is_other_anomaly`,`other_anomaly`,`growth_date`,`growth_slf_week`,`growth_slf_day`) values (1,4,'2019-06-11 00:00:00','z','2019-06-11 00:00:00','3','2019-06-01 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,4,'2019-06-11 00:00:00','1','2019-06-11 00:00:00','2','2019-06-12 00:00:00','3','2019-06-13 00:00:00','4','2019-06-14 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,4,'2019-06-11 00:00:00','1','2019-06-11 00:00:00','2','2019-06-12 00:00:00','3','2019-06-13 00:00:00','4','2019-06-14 00:00:00','5','2019-06-15 00:00:00','6','2019-06-16 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,4,'2019-06-13 00:00:00','1','2019-06-11 00:00:00','2','2019-06-12 00:00:00','3','2019-06-13 00:00:00','4','2019-06-14 00:00:00','5','2019-06-15 00:00:00','6','2019-06-16 00:00:00','7','2019-06-17 00:00:00','8','2019-06-18 00:00:00','9','2019-06-19 00:00:00','10','2019-06-10 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(9,4,'2019-06-13 00:00:00','1','2019-06-11 00:00:00','2','2019-06-12 00:00:00','3','2019-06-13 00:00:00','4','2019-06-14 00:00:00','5','2019-06-15 00:00:00','6','2019-06-16 00:00:00','7','2019-06-17 00:00:00','8','2019-06-18 00:00:00','9','2019-06-19 00:00:00','10','2019-06-10 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(10,4,'2019-06-13 00:00:00','1','2019-06-11 00:00:00','2','2019-06-12 00:00:00','3','2019-06-13 00:00:00','4','2019-06-14 00:00:00','5','2019-06-15 00:00:00','6','2019-06-16 00:00:00','7','2019-06-17 00:00:00','8','2019-06-18 00:00:00','9','2019-06-19 00:00:00','10','2019-06-10 00:00:00','21','2019-06-21 00:00:00','22','2019-06-22 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(12,4,'2019-06-13 00:00:00','1','2019-06-11 00:00:00','2','2019-06-12 00:00:00','3','2019-06-13 00:00:00','4','2019-06-14 00:00:00','5','2019-06-15 00:00:00','6','2019-06-16 00:00:00','7','2019-06-17 00:00:00','8','2019-06-18 00:00:00','9','2019-06-19 00:00:00','10','2019-06-10 00:00:00','21','2019-06-21 00:00:00','22','2019-06-22 00:00:00','23','2019-06-23 00:00:00','24','2019-06-24 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(13,4,'2019-06-13 00:00:00','1','2019-06-11 00:00:00','2','2019-06-12 00:00:00','3','2019-06-13 00:00:00','4','2019-06-14 00:00:00','5','2019-06-15 00:00:00','6','2019-06-16 00:00:00','7','2019-06-17 00:00:00','8','2019-06-18 00:00:00','9','2019-06-19 00:00:00','10','2019-06-10 00:00:00','21','2019-06-21 00:00:00','22','2019-06-22 00:00:00','23','2019-06-23 00:00:00','24','2019-06-24 00:00:00','25','2019-06-25 00:00:00','26','2019-06-26 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(14,4,'2019-06-13 00:00:00','1','2019-06-11 00:00:00','2','2019-06-12 00:00:00','3','2019-06-13 00:00:00','4','2019-06-14 00:00:00','5','2019-06-15 00:00:00','6','2019-06-16 00:00:00','7','2019-06-17 00:00:00','8','2019-06-18 00:00:00','9','2019-06-19 00:00:00','10','2019-06-10 00:00:00','21','2019-06-21 00:00:00','22','2019-06-22 00:00:00','23','2019-06-23 00:00:00','24','2019-06-24 00:00:00','25','2019-06-25 00:00:00','26','2019-06-26 00:00:00','27','2019-06-27 00:00:00','2019-06-28 00:00:00','8','5',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(15,4,'2019-06-13 00:00:00','1','2019-06-11 00:00:00','2','2019-06-12 00:00:00','3','2019-06-13 00:00:00','4','2019-06-14 00:00:00','5','2019-06-15 00:00:00','6','2019-06-16 00:00:00','7','2019-06-17 00:00:00','8','2019-06-18 00:00:00','9','2019-06-19 00:00:00','10','2019-06-10 00:00:00','21','2019-06-21 00:00:00','22','2019-06-22 00:00:00','23','2019-06-23 00:00:00','24','2019-06-24 00:00:00','25','2019-06-25 00:00:00','26','2019-06-26 00:00:00','27','2019-06-27 00:00:00','2019-06-28 00:00:00','8','5','2019-06-29 00:00:00','Down\'s',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(18,4,'2019-06-13 00:00:00','1','2019-06-11 00:00:00','2','2019-06-12 00:00:00','3','2019-06-13 00:00:00','4','2019-06-14 00:00:00','5','2019-06-15 00:00:00','6','2019-06-16 00:00:00','7','2019-06-17 00:00:00','8','2019-06-18 00:00:00','9','2019-06-19 00:00:00','10','2019-06-10 00:00:00','21','2019-06-21 00:00:00','22','2019-06-22 00:00:00','23','2019-06-23 00:00:00','24','2019-06-24 00:00:00','25','2019-06-25 00:00:00','26','2019-06-26 00:00:00','27','2019-06-27 00:00:00','2019-06-28 00:00:00','8','5','2019-06-29 00:00:00','Down\'s','Edward','2019-06-30 00:00:00','24','5',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(19,4,'2019-06-13 00:00:00','1','2019-06-11 00:00:00','2','2019-06-12 00:00:00','3','2019-06-13 00:00:00','4','2019-06-14 00:00:00','5','2019-06-15 00:00:00','6','2019-06-16 00:00:00','7','2019-06-17 00:00:00','8','2019-06-18 00:00:00','9','2019-06-19 00:00:00','10','2019-06-10 00:00:00','21','2019-06-21 00:00:00','22','2019-06-22 00:00:00','23','2019-06-23 00:00:00','24','2019-06-24 00:00:00','25','2019-06-25 00:00:00','26','2019-06-26 00:00:00','27','2019-06-27 00:00:00','2019-06-28 00:00:00','8','5','2019-06-29 00:00:00','Down\'s','Edward','2019-06-30 00:00:00','24','5','1,','Y','Y','fssd',NULL,NULL,NULL),(23,4,'2019-06-14 00:00:00','1','2019-06-11 00:00:00','2','2019-06-12 00:00:00','3','2019-06-13 00:00:00','4','2019-06-14 00:00:00','5','2019-06-15 00:00:00','6','2019-06-16 00:00:00','7','2019-06-17 00:00:00','8','2019-06-18 00:00:00','9','2019-06-19 00:00:00','10','2019-06-10 00:00:00','21','2019-06-21 00:00:00','22','2019-06-22 00:00:00','23','2019-06-23 00:00:00','24','2019-06-24 00:00:00','25','2019-06-25 00:00:00','26','2019-06-26 00:00:00','27','2019-06-27 00:00:00','2019-06-28 00:00:00','8','5','2019-06-29 00:00:00','Down\'s','Edward','2019-06-30 00:00:00','24','5','3,4','Y','Y','ttdadx','2019-06-01 00:00:00','18','7'),(24,4,'2019-06-14 00:00:00','1','2019-06-11 00:00:00','2','2019-06-12 00:00:00','3','2019-06-13 00:00:00','4','2019-06-14 00:00:00','5','2019-06-15 00:00:00','6','2019-06-16 00:00:00','7','2019-06-17 00:00:00','8','2019-06-18 00:00:00','9','2019-06-19 00:00:00','10','2019-06-10 00:00:00','21','2019-06-21 00:00:00','22','2019-06-22 00:00:00','23','2019-06-23 00:00:00','24','2019-06-24 00:00:00','25','2019-06-25 00:00:00','26','2019-06-26 00:00:00','27','2019-06-27 00:00:00','2019-06-28 00:00:00','8','5','2019-06-29 00:00:00','Down\'s','Edward','2019-06-30 00:00:00','24','5','3,4','Y','Y','ttdadx','2019-06-01 00:00:00','18','6'),(25,4,'2019-06-18 00:00:00','','2019-06-11 00:00:00','2','2019-06-12 00:00:00','3','2019-06-13 00:00:00','4','2019-06-14 00:00:00','5','2019-06-15 00:00:00','6','2019-06-16 00:00:00','7','2019-06-17 00:00:00','8','2019-06-18 00:00:00','9','2019-06-19 00:00:00','10','2019-06-10 00:00:00','21','2019-06-21 00:00:00','22','2019-06-22 00:00:00','23','2019-06-23 00:00:00','24','2019-06-24 00:00:00','25','2019-06-25 00:00:00','26','2019-06-26 00:00:00','27','2019-06-27 00:00:00','2019-06-28 00:00:00','8','5','2019-06-29 00:00:00','Down\'s','Edward','2019-06-30 00:00:00','24','5','3,4','Y','Y','ttdadx','2019-06-01 00:00:00','18','6'),(26,4,'2019-06-18 00:00:00','1','2019-06-11 00:00:00','2','2019-06-12 00:00:00','3','2019-06-13 00:00:00','4','2019-06-14 00:00:00','5','2019-06-15 00:00:00','6','2019-06-16 00:00:00','7','2019-06-17 00:00:00','8','2019-06-18 00:00:00','9','2019-06-19 00:00:00','10','2019-06-10 00:00:00','21','2019-06-21 00:00:00','22','2019-06-22 00:00:00','23','2019-06-23 00:00:00','24','2019-06-24 00:00:00','25','2019-06-25 00:00:00','26','2019-06-26 00:00:00','27','2019-06-27 00:00:00','2019-06-28 00:00:00','8','5','2019-06-29 00:00:00','Down\'s','Edward','2019-06-30 00:00:00','24','5','3,4','Y','Y','ttdadx','2019-06-01 00:00:00','18','6'),(27,4,'2019-06-18 00:00:00','1',NULL,'2','2019-06-12 00:00:00','3','2019-06-13 00:00:00','4','2019-06-14 00:00:00','5','2019-06-15 00:00:00','6','2019-06-16 00:00:00','7','2019-06-17 00:00:00','8','2019-06-18 00:00:00','9','2019-06-19 00:00:00','10','2019-06-10 00:00:00','21','2019-06-21 00:00:00','22','2019-06-22 00:00:00','23','2019-06-23 00:00:00','24','2019-06-24 00:00:00','25','2019-06-25 00:00:00','26','2019-06-26 00:00:00','27','2019-06-27 00:00:00','2019-06-28 00:00:00','8','5','2019-06-29 00:00:00','Down\'s','Edward','2019-06-30 00:00:00','24','5','3,4','Y','Y','ttdadx','2019-06-01 00:00:00','18','6'),(28,4,'2019-06-18 00:00:00','1',NULL,'2','2019-06-12 00:00:00','3','2019-06-13 00:00:00','4','2019-06-14 00:00:00','5','2019-06-15 00:00:00','6','2019-06-16 00:00:00','7','2019-06-17 00:00:00','8','2019-06-18 00:00:00','9','2019-06-19 00:00:00','10','2019-06-10 00:00:00','21','2019-06-21 00:00:00','22','2019-06-22 00:00:00','23','2019-06-23 00:00:00','24','2019-06-24 00:00:00','25','2019-06-25 00:00:00','26','2019-06-26 00:00:00','27','2019-06-27 00:00:00','2019-06-28 00:00:00','8','5','2019-06-29 00:00:00','Down\'s','Edward','2019-06-30 00:00:00','24','5','3,4','Y','Y','ttdadx','2019-06-01 00:00:00','18','6'),(29,4,'2019-06-18 00:00:00','1',NULL,'2','2019-06-12 00:00:00','3','2019-06-13 00:00:00','4','2019-06-14 00:00:00','5','2019-06-15 00:00:00','6','2019-06-16 00:00:00','7','2019-06-17 00:00:00','8','2019-06-18 00:00:00','9','2019-06-19 00:00:00','10','2019-06-10 00:00:00','21','2019-06-21 00:00:00','22','2019-06-22 00:00:00','23','2019-06-23 00:00:00','24','2019-06-24 00:00:00','25','2019-06-25 00:00:00','26','2019-06-26 00:00:00','27','2019-06-27 00:00:00','2019-06-28 00:00:00','8','5','2019-06-29 00:00:00','Down\'s','Edward','2019-06-30 00:00:00','24','5','3,4','Y','Y','ttdadx','2019-06-01 00:00:00','18','6'),(30,4,'2019-06-18 00:00:00','1',NULL,'2','2019-06-12 00:00:00','3','2019-06-13 00:00:00','4','2019-06-14 00:00:00','5','2019-06-15 00:00:00','6','2019-06-16 00:00:00','7','2019-06-17 00:00:00','8','2019-06-18 00:00:00','9','2019-06-19 00:00:00','10','2019-06-10 00:00:00','21','2019-06-21 00:00:00','22','2019-06-22 00:00:00','23','2019-06-23 00:00:00','24','2019-06-24 00:00:00','25','2019-06-25 00:00:00','26','2019-06-26 00:00:00','27','2019-06-27 00:00:00','2019-06-28 00:00:00','8','5','2019-06-29 00:00:00','Down\'s','Edward','2019-06-30 00:00:00','24','5','3,4','Y','Y','ttdadx','2019-06-01 00:00:00','18','6'),(32,4,'2019-06-22 00:00:00','1',NULL,'2','2019-06-12 00:00:00','3','2019-06-13 00:00:00','4','2019-06-14 00:00:00','5','2019-06-15 00:00:00','6','2019-06-16 00:00:00','7','2019-06-17 00:00:00','8','2019-06-18 00:00:00','9','2019-06-19 00:00:00','10','2019-06-10 00:00:00','21','2019-06-21 00:00:00','22','2019-06-22 00:00:00','23','2019-06-23 00:00:00','24','2019-06-24 00:00:00','25','2019-06-25 00:00:00','26','2019-06-26 00:00:00','27','2019-06-27 00:00:00','2019-06-28 00:00:00','8','5','2019-06-29 00:00:00','Down\'s','Edward','2019-06-30 00:00:00','24','5','3,4','Y','Y','ttdadx','2019-06-01 00:00:00','20','1'),(35,19,'2019-06-24 00:00:00','102','2019-06-18 00:00:00','12',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,'',NULL,NULL,'0','0',NULL,'0','0',NULL,'0','0','','Y','N','',NULL,'0','0'),(36,4,'2019-07-04 00:00:00','',NULL,'2','2019-06-12 00:00:00','3','2019-06-13 00:00:00','4','2019-06-14 00:00:00','5','2019-06-15 00:00:00','6','2019-06-16 00:00:00','7','2019-06-17 00:00:00','8','2019-06-18 00:00:00','9','2019-06-19 00:00:00','10','2019-06-10 00:00:00','21','2019-06-21 00:00:00','22','2019-06-22 00:00:00','23','2019-06-23 00:00:00','24','2019-06-24 00:00:00','25','2019-06-25 00:00:00','26','2019-06-26 00:00:00','27','2019-06-27 00:00:00','2019-06-28 00:00:00','8','5','2019-06-29 00:00:00','Down\'s','Edward','2019-06-30 00:00:00','24','5','3,4','Y','Y','ttdadx','2019-06-01 00:00:00','20','1');

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

/*Table structure for table `medicine_master` */

DROP TABLE IF EXISTS `medicine_master`;

CREATE TABLE `medicine_master` (
  `medicine_id` int(10) NOT NULL AUTO_INCREMENT,
  `medicine_name` varchar(255) DEFAULT NULL,
  `medicine_type` int(10) DEFAULT NULL,
  `brand_name` varchar(255) DEFAULT NULL,
  `generic` varchar(255) DEFAULT NULL,
  `is_active` enum('Y','N') DEFAULT 'Y',
  PRIMARY KEY (`medicine_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `medicine_master` */

insert  into `medicine_master`(`medicine_id`,`medicine_name`,`medicine_type`,`brand_name`,`generic`,`is_active`) values (1,'Pan-D',2,NULL,NULL,'Y'),(2,'ACCLUDUS - P',2,NULL,NULL,'Y'),(3,'CPZ 50',2,NULL,NULL,'Y'),(4,'axd',2,NULL,NULL,'Y'),(5,'pqrs',2,NULL,NULL,'Y'),(6,'wer',2,NULL,NULL,'Y'),(7,'regular',2,NULL,NULL,'Y');

/*Table structure for table `medicine_type` */

DROP TABLE IF EXISTS `medicine_type`;

CREATE TABLE `medicine_type` (
  `medicine_type_id` int(10) NOT NULL AUTO_INCREMENT,
  `medicine_type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`medicine_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `medicine_type` */

insert  into `medicine_type`(`medicine_type_id`,`medicine_type`) values (1,'Syrup'),(2,'Tablet'),(3,'Capsule'),(4,'Injection'),(5,'Surgical Items'),(6,'Powder Capsules'),(7,'Drop'),(8,'Ointment');

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
) ENGINE=InnoDB AUTO_INCREMENT=407 DEFAULT CHARSET=utf8;

/*Data for the table `menstrual_medecine_details` */

insert  into `menstrual_medecine_details`(`id`,`medicine_name`,`medicine_duration`,`case_master_id`,`created_on`,`medicine_mst_id`) values (309,'av','',16,'2019-06-19 00:00:00',NULL),(406,NULL,'10',4,'2019-07-04 00:00:00',1);

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `menu_master` */

insert  into `menu_master`(`menu_id`,`menu_name`,`menu_link`,`is_parent`,`parent_id`,`menu_srl`,`is_active`,`created_on`) values (1,'Get Ready',NULL,'P',NULL,1,'Y','2019-05-22 15:02:45'),(2,'Clinic Setup','Clinicsetup','C',1,1,'Y','2019-05-22 15:27:13'),(3,'Medicine','medicine','C',1,2,'Y','2019-05-22 15:27:35'),(4,'Complication','complication','C',1,3,'Y','2019-05-22 15:29:41'),(5,'Medical Problem','medicalproblem','C',1,4,'Y','2019-05-22 15:30:51'),(6,'Case','patientcase/selecttreatment','P',NULL,2,'Y','2019-05-28 17:09:39'),(7,'Investigation','investigationcomponent','C',1,5,'Y','2019-06-11 11:39:15');

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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

/*Data for the table `patient_master` */

insert  into `patient_master`(`patient_id`,`reg_date`,`selfmobile`,`alternate_mobile`,`patientname`,`patientage`,`patientgender`,`bloodgroup`,`created_on`,`last_modified`,`husband_bloodgroup`,`address`) values (12,'2019-05-30 00:00:00','9874566512','','Rahul Ghosh','23',2,NULL,'2019-05-30 15:39:10','2019-06-24 14:33:27',NULL,'abc'),(13,'2019-05-30 00:00:00','2','2','Ravi Teja','2',2,2,'2019-05-30 15:50:47','2019-06-10 13:07:15',NULL,NULL),(14,'2019-05-30 00:00:00','2','2','Amit Roy','2',2,2,'2019-05-30 15:51:13',NULL,NULL,NULL),(15,'2019-05-30 00:00:00','91535758029','91535758030','Rani Paul','39',2,NULL,'2019-05-30 15:52:29','2019-07-03 17:17:39',NULL,'2/E,4th Floor,Raktima Apartment ,Kolkata, West Bengal - 700052'),(16,'2019-06-10 00:00:00','9153588888','','Riya','25',2,7,'2019-06-10 11:24:11','2019-06-11 16:29:28',NULL,NULL),(20,'2019-06-11 00:00:00','11','1','q','2',2,9,'2019-06-11 16:39:09',NULL,NULL,NULL),(21,'2019-06-19 00:00:00','9988774455','','A Ghosh','29',2,5,'2019-06-19 13:32:50',NULL,5,'a'),(22,'2019-06-24 00:00:00','9988774455','','Asin','32',2,NULL,'2019-06-24 14:24:04',NULL,NULL,'');

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
) ENGINE=InnoDB AUTO_INCREMENT=279 DEFAULT CHARSET=utf8;

/*Data for the table `prescription_investigation_dtl` */

insert  into `prescription_investigation_dtl`(`prescription_inv_id`,`prescription_mst_id`,`investigation_comp_id`,`created_on`) values (1,5,1,'2019-06-14 00:00:00'),(2,5,2,'2019-06-14 00:00:00'),(3,6,1,'2019-06-14 00:00:00'),(4,6,2,'2019-06-14 00:00:00'),(5,7,1,'2019-06-14 00:00:00'),(6,7,2,'2019-06-14 00:00:00'),(7,7,5,'2019-06-14 00:00:00'),(8,8,1,'2019-06-14 00:00:00'),(9,8,2,'2019-06-14 00:00:00'),(10,8,5,'2019-06-14 00:00:00'),(11,8,9,'2019-06-14 00:00:00'),(12,9,1,'2019-06-18 00:00:00'),(13,9,2,'2019-06-18 00:00:00'),(14,9,5,'2019-06-18 00:00:00'),(15,9,9,'2019-06-18 00:00:00'),(16,10,1,'2019-06-18 00:00:00'),(17,10,2,'2019-06-18 00:00:00'),(18,10,5,'2019-06-18 00:00:00'),(19,10,9,'2019-06-18 00:00:00'),(20,11,1,'2019-06-19 00:00:00'),(21,11,2,'2019-06-19 00:00:00'),(22,11,5,'2019-06-19 00:00:00'),(23,11,9,'2019-06-19 00:00:00'),(24,12,1,'2019-06-19 00:00:00'),(25,12,2,'2019-06-19 00:00:00'),(26,12,5,'2019-06-19 00:00:00'),(27,12,9,'2019-06-19 00:00:00'),(28,13,1,'2019-06-19 00:00:00'),(29,13,2,'2019-06-19 00:00:00'),(30,13,5,'2019-06-19 00:00:00'),(31,13,9,'2019-06-19 00:00:00'),(32,14,1,'2019-06-19 00:00:00'),(33,14,2,'2019-06-19 00:00:00'),(34,14,5,'2019-06-19 00:00:00'),(35,14,9,'2019-06-19 00:00:00'),(36,15,1,'2019-06-19 00:00:00'),(37,15,2,'2019-06-19 00:00:00'),(38,15,5,'2019-06-19 00:00:00'),(39,16,1,'2019-06-19 00:00:00'),(40,16,2,'2019-06-19 00:00:00'),(41,16,5,'2019-06-19 00:00:00'),(42,16,9,'2019-06-19 00:00:00'),(43,17,1,'2019-06-19 00:00:00'),(44,17,2,'2019-06-19 00:00:00'),(45,17,5,'2019-06-19 00:00:00'),(46,17,9,'2019-06-19 00:00:00'),(47,18,1,'2019-06-21 00:00:00'),(48,18,2,'2019-06-21 00:00:00'),(49,18,5,'2019-06-21 00:00:00'),(50,18,9,'2019-06-21 00:00:00'),(59,21,1,'2019-06-21 00:00:00'),(60,21,2,'2019-06-21 00:00:00'),(61,21,5,'2019-06-21 00:00:00'),(62,21,9,'2019-06-21 00:00:00'),(79,26,1,'2019-06-22 00:00:00'),(80,26,2,'2019-06-22 00:00:00'),(81,26,5,'2019-06-22 00:00:00'),(82,26,9,'2019-06-22 00:00:00'),(91,49,1,'2019-06-24 00:00:00'),(92,49,2,'2019-06-24 00:00:00'),(93,49,5,'2019-06-24 00:00:00'),(94,49,9,'2019-06-24 00:00:00'),(119,56,1,'2019-07-02 00:00:00'),(120,56,2,'2019-07-02 00:00:00'),(121,56,5,'2019-07-02 00:00:00'),(122,56,9,'2019-07-02 00:00:00'),(195,75,1,'2019-07-03 00:00:00'),(196,75,2,'2019-07-03 00:00:00'),(197,75,5,'2019-07-03 00:00:00'),(198,75,9,'2019-07-03 00:00:00'),(275,95,1,'2019-07-04 00:00:00'),(276,95,2,'2019-07-04 00:00:00'),(277,95,5,'2019-07-04 00:00:00'),(278,95,9,'2019-07-04 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8;

/*Data for the table `prescription_master` */

insert  into `prescription_master`(`prescription_id`,`case_master_id`,`created_on`,`doctor_note`,`next_checkup_dt`,`entry_date`) values (1,4,'2019-06-14 00:00:00',' st','2019-06-30 00:00:00',NULL),(2,4,'2019-06-14 00:00:00','  st',NULL,NULL),(3,4,'2019-06-14 00:00:00','   st',NULL,NULL),(4,4,'2019-06-14 00:00:00','    st',NULL,NULL),(5,4,'2019-06-14 00:00:00','     st',NULL,NULL),(6,4,'2019-06-14 00:00:00','      st',NULL,NULL),(7,4,'2019-06-14 17:48:33','doctor notes',NULL,NULL),(8,4,'2019-06-14 18:55:55',' doctor notes','2019-06-30 00:00:00',NULL),(9,4,'2019-06-18 18:39:46','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',NULL,NULL),(10,4,'2019-06-18 18:39:52','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','2019-06-18 00:00:00',NULL),(11,4,'2019-06-19 15:03:09',' Lorem Ipsum is simply dummy text of the printing and typesetting industry.','2019-06-20 00:00:00',NULL),(17,4,'2019-06-19 15:38:40','  Lorem Ipsum is simply dummy text .',NULL,NULL),(21,4,'2019-06-21 12:25:26','Lorem Ipsum is simply dummy text .','2019-06-30 00:00:00','2019-06-21 00:00:00'),(26,4,'2019-06-22 11:57:23','Lorem Ipsum is simply dummy text .',NULL,'2019-06-22 00:00:00'),(33,17,'2019-06-22 14:32:30','',NULL,'2019-06-22 00:00:00'),(48,19,'2019-06-24 17:47:42','',NULL,'2019-06-24 00:00:00'),(49,4,'2019-06-24 18:32:39','Lorem Ipsum is simply dummy text .',NULL,'2019-06-24 00:00:00'),(56,4,'2019-07-02 18:40:50','Lorem Ipsum is simply dummy text .',NULL,'2019-07-02 00:00:00'),(75,4,'2019-07-03 19:29:20','Lorem Ipsum is simply dummy text .',NULL,'2019-07-03 00:00:00'),(95,4,'2019-07-04 18:56:43','Lorem Ipsum is simply dummy text .',NULL,'2019-07-04 00:00:00');

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
  PRIMARY KEY (`medicine_dtl_id`)
) ENGINE=InnoDB AUTO_INCREMENT=173 DEFAULT CHARSET=latin1;

/*Data for the table `prescription_medicine_dtl` */

insert  into `prescription_medicine_dtl`(`medicine_dtl_id`,`prescription_mst_id`,`medicine_id`,`dosage`,`frequency`,`days`,`created_on`) values (3,3,1,'0.5','OD','2','2019-06-14 00:00:00'),(4,5,2,'1','OD','2','2019-06-14 00:00:00'),(5,6,2,'1','OD','2','2019-06-14 00:00:00'),(6,6,1,'0.5','0','','2019-06-14 00:00:00'),(7,7,2,'1','OD','2','2019-06-14 00:00:00'),(8,7,1,'0.5','0','','2019-06-14 00:00:00'),(9,8,2,'1','OD','2','2019-06-14 00:00:00'),(10,8,1,'0.5','0','','2019-06-14 00:00:00'),(11,9,2,'1','OD','2','2019-06-18 00:00:00'),(12,9,1,'0.5','0','','2019-06-18 00:00:00'),(13,10,2,'1','OD','2','2019-06-18 00:00:00'),(14,10,1,'0.5','0','','2019-06-18 00:00:00'),(15,11,2,'1','OD','2','2019-06-19 00:00:00'),(16,11,1,'0.5','0','','2019-06-19 00:00:00'),(17,12,2,'1','OD','2','2019-06-19 00:00:00'),(18,12,1,'0.5','0','','2019-06-19 00:00:00'),(19,13,2,'1','OD','2','2019-06-19 00:00:00'),(20,13,1,'0.5','0','','2019-06-19 00:00:00'),(21,14,2,'1','OD','2','2019-06-19 00:00:00'),(22,14,1,'0.5','0','','2019-06-19 00:00:00'),(23,15,2,'1','OD','2','2019-06-19 00:00:00'),(24,15,1,'0.5','0','','2019-06-19 00:00:00'),(25,16,2,'1','OD','2','2019-06-19 00:00:00'),(26,16,1,'0.5','0','','2019-06-19 00:00:00'),(27,16,3,'1','0','1','2019-06-19 00:00:00'),(28,17,2,'1','OD','2','2019-06-19 00:00:00'),(29,17,1,'0.5','0','','2019-06-19 00:00:00'),(30,18,2,'1','OD','2','2019-06-21 00:00:00'),(31,18,1,'0.5','0','','2019-06-21 00:00:00'),(36,21,2,'1','OD','2','2019-06-21 00:00:00'),(37,21,1,'0.5','0','','2019-06-21 00:00:00'),(46,26,2,'1','OD','2','2019-06-22 00:00:00'),(47,26,1,'0.5','0','','2019-06-22 00:00:00'),(57,48,1,'0.5','OD','2','2019-06-24 00:00:00'),(58,49,2,'1','OD','2','2019-06-24 00:00:00'),(59,49,1,'0.5','0','','2019-06-24 00:00:00'),(72,56,2,'1','OD','2','2019-07-02 00:00:00'),(73,56,1,'0.5','0','','2019-07-02 00:00:00'),(110,75,2,'1','OD','2','2019-07-03 00:00:00'),(111,75,1,'0.5','0','','2019-07-03 00:00:00'),(112,75,13,'1.5','0','','2019-07-03 00:00:00'),(170,95,2,'1','OD','2','2019-07-04 00:00:00'),(171,95,1,'0.5','0','','2019-07-04 00:00:00'),(172,95,2,'0','0','','2019-07-04 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=655 DEFAULT CHARSET=utf8;

/*Data for the table `previous_child_birth_history` */

insert  into `previous_child_birth_history`(`child_dtl_id`,`case_master_id`,`birthplace`,`year`,`complication`,`medicalproblem`,`is_othermedprob`,`medicalproblem_other`,`delevery_type`,`babygender`,`babyage`,`created_on`) values (506,17,'','','','','N',NULL,'CS',2,'0.00','2019-06-22 14:32:30'),(652,4,'kolkata','','4,5,6,7','1,2,6','Y','','CS',1,'2.00','2019-07-04 18:56:43'),(653,4,'Howrah','','7,10,11','5','N',NULL,'ND',2,'20.00','2019-07-04 18:56:43'),(654,4,'fd','2012','4,8','6','Y','sasafdg,essfrs','CS',1,'20.00','2019-07-04 18:56:44');

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
) ENGINE=InnoDB AUTO_INCREMENT=344 DEFAULT CHARSET=utf8;

/*Data for the table `regular_medicines_details` */

insert  into `regular_medicines_details`(`regular_medicines_dtl_id`,`case_master_id`,`medicine_name`,`medicine_dose`,`for_year`,`for_month`,`medicine_mst_id`) values (236,17,'Medicine  A','2','4','0',NULL),(248,19,'abc','0','0','1',NULL),(342,4,NULL,'7.5','10','7',1),(343,4,NULL,'5','12','10',3);

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

insert  into `serial_master`(`id`,`next_serial_no`,`type`,`year`,`clinic_id`) values (4,'36','NEWCASE',2019,1),(5,'1','NEWCASE',2019,8),(6,'1','NEWCASE',2020,8),(7,'1','NEWCASE',2021,8),(8,'1','NEWCASE',2022,8),(9,'1','NEWCASE',2023,8);

/*Table structure for table `surgery_details` */

DROP TABLE IF EXISTS `surgery_details`;

CREATE TABLE `surgery_details` (
  `surgery_details_id` int(10) NOT NULL AUTO_INCREMENT,
  `case_master_id` int(10) DEFAULT NULL,
  `surgery_mst_id` int(10) DEFAULT NULL,
  `other_surgery_name` varchar(255) DEFAULT NULL,
  `yearback` int(10) DEFAULT NULL,
  PRIMARY KEY (`surgery_details_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1441 DEFAULT CHARSET=utf8;

/*Data for the table `surgery_details` */

insert  into `surgery_details`(`surgery_details_id`,`case_master_id`,`surgery_mst_id`,`other_surgery_name`,`yearback`) values (433,15,1,'',NULL),(434,15,2,'',NULL),(435,15,3,'',NULL),(436,15,4,'',NULL),(437,15,5,'',NULL),(438,15,6,'',NULL),(967,16,1,'',NULL),(968,16,2,'',NULL),(969,16,3,'',NULL),(970,16,4,'',NULL),(971,16,5,'',NULL),(972,16,6,'',NULL),(1063,17,1,'',NULL),(1064,17,2,'',NULL),(1065,17,3,'',NULL),(1066,17,4,'',NULL),(1067,17,5,'',NULL),(1068,17,6,'',NULL),(1153,19,1,'',NULL),(1154,19,2,'',NULL),(1155,19,3,'',NULL),(1156,19,4,'',NULL),(1157,19,5,'',NULL),(1158,19,6,'',NULL),(1435,4,1,'',2),(1436,4,2,'',3),(1437,4,3,'',6),(1438,4,4,'',2),(1439,4,5,'',3),(1440,4,6,'Other Surgery Abc',2);

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
