-- MariaDB dump 10.19  Distrib 10.4.28-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: tbm_final_audit
-- ------------------------------------------------------
-- Server version	10.4.28-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `committee_exports`
--

DROP TABLE IF EXISTS `committee_exports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `committee_exports` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `exp_id` varchar(255) DEFAULT NULL,
  `comm_id` varchar(255) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `comm_status` varchar(255) DEFAULT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `comm_send_status` varchar(211) NOT NULL DEFAULT '0',
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `committee_exports`
--

LOCK TABLES `committee_exports` WRITE;
/*!40000 ALTER TABLE `committee_exports` DISABLE KEYS */;
INSERT INTO `committee_exports` VALUES (1,'112','5','Applicant has clarified that they are selling only comercially available cell line from atcc','Approve','No Objection subject to declaration from applicant that cell lines are not genetically engineered','1','2024-04-15 05:16:04.000000','2024-04-24 02:03:41'),(2,'112','6','Applicant has clarified that they are selling only comercially available cell line from atcc','Approve','Approved as per agreed SoP.','1','2024-04-15 05:16:04.000000','2024-05-28 05:39:24'),(3,'112','7','Applicant has clarified that they are selling only comercially available cell line from atcc','Reject','CDSCO has no comment as not under CDSCO purview','1','2024-04-15 05:16:04.000000','2024-05-26 05:17:48'),(4,'112','8','Applicant has clarified that they are selling only comercially available cell line from atcc',NULL,NULL,'0','2024-04-15 05:16:04.000000','2024-04-15 05:16:04'),(5,'112','9','Applicant has clarified that they are selling only comercially available cell line from atcc',NULL,NULL,'0','2024-04-15 05:16:04.000000','2024-04-15 05:16:04'),(6,'112','10','Applicant has clarified that they are selling only comercially available cell line from atcc','Approve','Concur with ICMR comments','1','2024-04-15 05:16:04.000000','2024-05-13 11:12:24'),(7,'112','11','Applicant has clarified that they are selling only comercially available cell line from atcc','Approve','Application is regarding Cell Culture and Research, Hence ICMR may approve','1','2024-04-15 05:16:04.000000','2024-05-28 07:28:14'),(8,'112','21','Applicant has clarified that they are selling only comercially available cell line from atcc',NULL,NULL,'0','2024-04-15 05:16:04.000000','2024-04-15 05:16:04'),(9,'113','3','Test Comments','Approve','testing purpose','1','2024-04-15 09:20:54.000000','2024-04-23 10:42:05'),(10,'116','5','Please note this application is for IMPORT of samples hence can be rejected','Approve','The Department has No Objection on this application','1','2024-05-10 11:08:00.000000','2024-05-15 08:47:42'),(11,'116','6','Please note this application is for IMPORT of samples hence can be rejected','Reject','Application is for import of samples hence rejected','1','2024-05-10 11:08:00.000000','2024-05-14 05:10:29'),(12,'116','7','Please note this application is for IMPORT of samples hence can be rejected','Reject','not related to CDSCO','1','2024-05-10 11:08:00.000000','2024-05-26 05:16:33'),(13,'116','8','Please note this application is for IMPORT of samples hence can be rejected',NULL,NULL,'0','2024-05-10 11:08:00.000000','2024-05-10 11:08:00'),(14,'116','9','Please note this application is for IMPORT of samples hence can be rejected',NULL,NULL,'0','2024-05-10 11:08:00.000000','2024-05-10 11:08:00'),(15,'116','10','Please note this application is for IMPORT of samples hence can be rejected','Reject','Concur with ICMR','1','2024-05-10 11:08:00.000000','2024-05-13 11:11:57'),(16,'116','11','Please note this application is for IMPORT of samples hence can be rejected','Approve','The application submitted pertains to quality and calibration of tests, hence ICMR may examine','1','2024-05-10 11:08:00.000000','2024-05-28 07:26:42'),(17,'116','21','Please note this application is for IMPORT of samples hence can be rejected',NULL,NULL,'0','2024-05-10 11:08:00.000000','2024-05-10 11:08:00'),(18,'117','5','for review and comments','Approve','No Objection subject to declaration from applicant that cell lines are not genetically engineered','1','2024-05-22 10:16:48.000000','2024-05-27 12:03:12'),(19,'117','6','for review and comments','Approve','Approved as per agreed SoP.','1','2024-05-22 10:16:48.000000','2024-05-28 05:38:03'),(20,'117','7','for review and comments',NULL,NULL,'0','2024-05-22 10:16:48.000000','2024-05-22 10:16:48'),(21,'117','8','for review and comments',NULL,NULL,'0','2024-05-22 10:16:48.000000','2024-05-22 10:16:48'),(22,'117','9','for review and comments',NULL,NULL,'0','2024-05-22 10:16:48.000000','2024-05-22 10:16:48'),(23,'117','10','for review and comments',NULL,NULL,'0','2024-05-22 10:16:48.000000','2024-05-22 10:16:48'),(24,'117','11','for review and comments','Approve','The application submitted pertains to Research, hence approval in this matter pertains to ICMR','1','2024-05-22 10:16:48.000000','2024-05-28 07:24:11'),(25,'117','21','for review and comments',NULL,NULL,'0','2024-05-22 10:16:48.000000','2024-05-22 10:16:48'),(26,'118','5','Please see the email for the clarification received from the applicant',NULL,NULL,'0','2024-06-25 10:25:22.000000','2024-06-25 10:25:22'),(27,'118','6','Please see the email for the clarification received from the applicant',NULL,NULL,'0','2024-06-25 10:25:22.000000','2024-06-25 10:25:22'),(28,'118','7','Please see the email for the clarification received from the applicant',NULL,NULL,'0','2024-06-25 10:25:22.000000','2024-06-25 10:25:22'),(29,'118','8','Please see the email for the clarification received from the applicant',NULL,NULL,'0','2024-06-25 10:25:22.000000','2024-06-25 10:25:22'),(30,'118','9','Please see the email for the clarification received from the applicant',NULL,NULL,'0','2024-06-25 10:25:22.000000','2024-06-25 10:25:22'),(31,'118','10','Please see the email for the clarification received from the applicant',NULL,NULL,'0','2024-06-25 10:25:22.000000','2024-06-25 10:25:22'),(32,'118','11','Please see the email for the clarification received from the applicant',NULL,NULL,'0','2024-06-25 10:25:22.000000','2024-06-25 10:25:22'),(33,'118','21','Please see the email for the clarification received from the applicant',NULL,NULL,'0','2024-06-25 10:25:22.000000','2024-06-25 10:25:22'),(34,'120','3','please check the application fot testing purpose','Approve','good form the my side','1','2024-06-27 06:05:10.000000','2024-06-28 02:04:28'),(35,'120','4','please check the application fot testing purpose',NULL,NULL,'0','2024-06-27 06:05:10.000000','2024-06-27 06:05:10'),(36,'114','3','test comment',NULL,NULL,'0','2024-07-03 01:37:30.000000','2024-07-03 01:37:30'),(37,'114','4','test comment',NULL,NULL,'0','2024-07-03 01:37:30.000000','2024-07-03 01:37:30'),(38,'115','3','Test ICMR Comments',NULL,NULL,'0','2024-07-03 03:29:55.000000','2024-07-03 03:29:55'),(39,'115','4','Test ICMR Comments',NULL,NULL,'0','2024-07-03 03:29:55.000000','2024-07-03 03:29:55'),(40,'121','3','ICMR Test Comments','Approve','very good form all data are good','1','2024-07-03 06:20:09.000000','2024-07-03 06:21:30'),(41,'121','4','ICMR Test Comments',NULL,NULL,'0','2024-07-03 06:20:09.000000','2024-07-03 06:20:09'),(42,'122','3','Test Comment by ICMR','Reject','Not good form please check it','1','2024-07-03 06:20:42.000000','2024-07-03 06:22:31'),(43,'122','4','Test Comment by ICMR',NULL,NULL,'0','2024-07-03 06:20:42.000000','2024-07-03 06:20:42'),(44,'123','3','comment by ICMR','Reject','Pease check it','1','2024-07-03 06:47:48.000000','2024-07-03 06:48:57'),(45,'123','4','comment by ICMR',NULL,NULL,'0','2024-07-03 06:47:48.000000','2024-07-03 06:47:48'),(46,'124','3','comment bu icmr','Approve','Comment by committee','1','2024-07-04 04:39:04.000000','2024-07-04 04:44:57'),(47,'124','4','comment bu icmr',NULL,NULL,'0','2024-07-04 04:39:04.000000','2024-07-04 04:39:04');
/*!40000 ALTER TABLE `committee_exports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `committee_import`
--

DROP TABLE IF EXISTS `committee_import`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `committee_import` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `imp_id` varchar(211) DEFAULT NULL,
  `comm_id` varchar(211) DEFAULT NULL,
  `remark` varchar(211) DEFAULT NULL,
  `comm_status` varchar(211) DEFAULT '0',
  `comments` varchar(211) DEFAULT NULL,
  `comm_send_status` varchar(211) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `committee_import`
--

LOCK TABLES `committee_import` WRITE;
/*!40000 ALTER TABLE `committee_import` DISABLE KEYS */;
INSERT INTO `committee_import` VALUES (22,'22','11','hello','Approve','done','1','2024-02-21 08:27:38','2024-02-21 01:20:28'),(23,'22','12','hello','Approve','done','1','2024-02-21 08:27:38','2024-02-21 01:20:31'),(24,'22','13','hello','Approve','done','1','2024-02-21 08:27:38','2024-02-21 01:20:33'),(25,'22','14','hello','Approve','done','1','2024-02-21 08:27:38','2024-02-21 01:20:36'),(26,'22','15','hello','Approve','done','1','2024-02-21 08:27:38','2024-02-21 08:56:02');
/*!40000 ALTER TABLE `committee_import` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `districts`
--

DROP TABLE IF EXISTS `districts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `districts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `district_name` varchar(255) NOT NULL,
  `state_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `districts`
--

LOCK TABLES `districts` WRITE;
/*!40000 ALTER TABLE `districts` DISABLE KEYS */;
/*!40000 ALTER TABLE `districts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exp_noc_issueds`
--

DROP TABLE IF EXISTS `exp_noc_issueds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exp_noc_issueds` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `exp_id` bigint(20) unsigned NOT NULL,
  `noc_number` varchar(255) DEFAULT NULL,
  `sending_iec_number` varchar(255) DEFAULT NULL,
  `application_number` varchar(255) DEFAULT NULL,
  `sending_applicant_name` varchar(255) DEFAULT NULL,
  `sending_address` varchar(255) DEFAULT NULL,
  `unit_number` varchar(255) DEFAULT NULL,
  `unit_quan` varchar(255) DEFAULT NULL,
  `name_of_sender` varchar(211) DEFAULT NULL,
  `company_name` varchar(211) DEFAULT NULL,
  `purpose_of` varchar(211) DEFAULT NULL,
  `specify_purpose_end_use_details` varchar(256) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `exp_id` (`exp_id`),
  CONSTRAINT `exp_id` FOREIGN KEY (`exp_id`) REFERENCES `exporters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exp_noc_issueds`
--

LOCK TABLES `exp_noc_issueds` WRITE;
/*!40000 ALTER TABLE `exp_noc_issueds` DISABLE KEYS */;
INSERT INTO `exp_noc_issueds` VALUES (1,30,113,'EXPORT-NOC-287030','0202009378','AURU/E/2024/00113','AURUM PHARMACHEM PRIVATE LIMITED','11, B.B.GANGULY  STREET,,2ND FLOOR,KOLKATA,WEST BENGAL,700012','2','L',NULL,'','Calibration/ Quality assurance',NULL,NULL,'2024-04-23 11:26:11','2024-04-23 11:26:11'),(2,30,113,'EXPORT-NOC-680196','0202009378','AURU/E/2024/00113','AURUM PHARMACHEM PRIVATE LIMITED','11, B.B.GANGULY  STREET,,2ND FLOOR,KOLKATA,WEST BENGAL,700012','2','L',NULL,'','Calibration/ Quality assurance',NULL,NULL,'2024-04-23 11:40:53','2024-04-23 11:40:53'),(3,28,112,'EXPORT-NOC-861612','0414040635','NEXT/E/2024/00001','NEXT-GEN BIO','NO.4/6 SOORATHAMMAN KOIL STREET,NEW PERUNGALATHUR,KANCHIPURAM,TAMIL NADU,600063','3','ML',NULL,'','cell culture studies',NULL,NULL,'2024-04-25 07:31:21','2024-04-25 07:31:21'),(4,30,113,'EXPORT-NOC-808590','0202009378','AURU/E/2024/00113','AURUM PHARMACHEM PRIVATE LIMITED','11, B.B.GANGULY  STREET,,2ND FLOOR,KOLKATA,WEST BENGAL,700012','2','L',NULL,'','Calibration/ Quality assurance',NULL,NULL,'2024-04-25 13:15:16','2024-04-25 13:15:16'),(5,30,113,'EXPORT-NOC-260353','0202009378','AURU/E/2024/00113','AURUM PHARMACHEM PRIVATE LIMITED','11, B.B.GANGULY  STREET,,2ND FLOOR,KOLKATA,WEST BENGAL,700012','2','L',NULL,'','Calibration/ Quality assurance',NULL,NULL,'2024-04-25 13:18:03','2024-04-25 13:18:03'),(6,30,113,'EXPORT-NOC-577186','0202009378','AURU/E/2024/00113','AURUM PHARMACHEM PRIVATE LIMITED','11, B.B.GANGULY  STREET,,2ND FLOOR,KOLKATA,WEST BENGAL,700012','2','L',NULL,'','Calibration/ Quality assurance',NULL,NULL,'2024-04-25 13:19:40','2024-04-25 13:19:40'),(7,30,113,'EXPORT-NOC-319257','0202009378','AURU/E/2024/00113','AURUM PHARMACHEM PRIVATE LIMITED','11, B.B.GANGULY  STREET,,2ND FLOOR,KOLKATA,WEST BENGAL,700012','2','L',NULL,'','Calibration/ Quality assurance',NULL,NULL,'2024-04-25 13:21:29','2024-04-25 13:21:29'),(8,30,113,'EXPORT-NOC-174644','0202009378','AURU/E/2024/00113','AURUM PHARMACHEM PRIVATE LIMITED','11, B.B.GANGULY  STREET,,2ND FLOOR,KOLKATA,WEST BENGAL,700012','2','L',NULL,'','Calibration/ Quality assurance',NULL,NULL,'2024-04-25 13:44:27','2024-04-25 13:44:27'),(9,28,117,'EXPORT-NOC-584838','0414040635','NEXT/E/2024/00117','NEXT-GEN BIO','NO.4/6 SOORATHAMMAN KOIL STREET,NEW PERUNGALATHUR,KANCHIPURAM,TAMIL NADU,600063','2','ML',NULL,'','FOR CELL CULTURE PURPOSE ONLY',NULL,NULL,'2024-05-29 09:23:56','2024-05-29 09:23:56'),(10,39,120,'EXPORT-NOC-420203','1234567890','TEST/E/2024/00120','TEST DGFT IEC','GATE NO 3, UDYOG BHAWAN,11-RAFI MARG Contact No: 9911229509,DELHI,DELHI,110011','21','ML',NULL,'','Clinical Diagnostics/ Testing',NULL,'10.197.254.120','2024-06-28 05:04:35','2024-06-28 05:04:35'),(11,30,113,'EXPORT-NOC-321974','0202009378','AURU/E/2024/00113','AURUM PHARMACHEM PRIVATE LIMITED','11, B.B.GANGULY  STREET,,2ND FLOOR,KOLKATA,WEST BENGAL,700012','2','L',NULL,'','Calibration/ Quality assurance',NULL,NULL,'2024-07-03 01:40:04','2024-07-03 01:40:04'),(12,39,121,'EXPORT-NOC-225284','1234567890','TEST/E/2024/00121','TEST DGFT IEC','GATE NO 3, UDYOG BHAWAN,11-RAFI MARG Contact No: 9911229509,DELHI,DELHI,110011','12','ML',NULL,'','Calibration/ Quality assurance',NULL,'10.197.254.88','2024-07-03 06:29:26','2024-07-03 06:29:26');
/*!40000 ALTER TABLE `exp_noc_issueds` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exporters`
--

DROP TABLE IF EXISTS `exporters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exporters` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(211) DEFAULT NULL,
  `ip_address` varchar(211) DEFAULT NULL,
  `application_number` varchar(255) DEFAULT NULL,
  `sending_iec_number` varchar(255) DEFAULT NULL,
  `sending_applicant_name` varchar(255) DEFAULT NULL,
  `sending_applicant_design` varchar(255) DEFAULT NULL,
  `sending_add_company_institute` varchar(255) DEFAULT NULL,
  `comp_institute_denied_export_auth_last_3_years` varchar(255) DEFAULT NULL,
  `denied_export_auth_last_3_years_yes_no` varchar(255) DEFAULT NULL,
  `upload_comp_institute_denied_export` varchar(255) DEFAULT NULL,
  `receving_recipient_name` varchar(255) DEFAULT NULL,
  `receving_recipient_design` varchar(255) DEFAULT NULL,
  `receiving_add_company_institute` varchar(255) DEFAULT NULL,
  `end_user_receiving_party` varchar(255) DEFAULT NULL,
  `end_user_receiving_party_yes_no` varchar(255) DEFAULT NULL,
  `end_user_name` varchar(255) DEFAULT NULL,
  `end_user_address` varchar(255) DEFAULT NULL,
  `hs_code` varchar(255) DEFAULT NULL,
  `hs_code_description` varchar(256) DEFAULT NULL,
  `natural_biomaterial_exported` varchar(255) DEFAULT NULL,
  `natural_biomaterial_exported_details` varchar(256) DEFAULT NULL,
  `natural_biomaterial_exported_any_tissue_details` text DEFAULT NULL,
  `sample_collected` varchar(255) DEFAULT NULL,
  `sample_collected_details` varchar(256) DEFAULT NULL,
  `samples_being_exported` varchar(255) DEFAULT NULL,
  `samples_being_exported_details` varchar(256) DEFAULT NULL,
  `exported_number` varchar(255) DEFAULT NULL,
  `exported_volume` varchar(255) DEFAULT NULL,
  `vol_of_sample_text` varchar(11) DEFAULT NULL,
  `repeat_samples_envisaged` varchar(255) DEFAULT NULL,
  `repeat_samples_envisaged_yes_no` varchar(255) DEFAULT NULL,
  `specify_purpose_end_use` varchar(255) DEFAULT NULL,
  `specify_purpose_end_use_details` varchar(255) DEFAULT NULL,
  `samples_used_research_analysis` varchar(255) DEFAULT NULL,
  `samples_used_research_analysis_yes_no` varchar(255) DEFAULT NULL,
  `samples_used_research_analysis_details` text DEFAULT NULL,
  `leftover_samples_store` varchar(255) DEFAULT NULL,
  `leftover_samples_store_yes_no` varchar(255) DEFAULT NULL,
  `purpose_sample_store` varchar(255) DEFAULT NULL,
  `purpose_sample_store_details` varchar(255) DEFAULT NULL,
  `duration_sample_store` varchar(255) DEFAULT NULL,
  `facility_sample_store` varchar(255) DEFAULT NULL,
  `national_security_angle` varchar(255) DEFAULT NULL,
  `national_security_angle_yes_no` varchar(255) DEFAULT NULL,
  `foreign_country_army_military` varchar(255) DEFAULT NULL,
  `foreign_country_army_military_yes_no` varchar(255) DEFAULT NULL,
  `biomaterial_micro_organisms_approval` varchar(255) DEFAULT NULL,
  `biomaterial_micro_organisms_approval_file` varchar(255) DEFAULT NULL,
  `ibsc_rcgm_approval_applicable` varchar(255) DEFAULT NULL,
  `ibsc_rcgm_approval_applicable_file` varchar(255) DEFAULT NULL,
  `sender_certify_information_provided` varchar(255) DEFAULT NULL,
  `certified_copy_proforma` varchar(255) DEFAULT NULL,
  `sender_signature` varchar(255) DEFAULT NULL,
  `sender_name` varchar(255) DEFAULT NULL,
  `sender_designation` varchar(255) DEFAULT NULL,
  `sender_address` varchar(255) DEFAULT NULL,
  `sender_date` varchar(211) DEFAULT NULL,
  `recipient_certify_samples_referred` varchar(255) DEFAULT NULL,
  `recipient_name_institution` varchar(255) DEFAULT NULL,
  `recipient_utilized_for_purpose` varchar(255) DEFAULT NULL,
  `recipient_signature` varchar(255) DEFAULT NULL,
  `recipient_name` varchar(255) DEFAULT NULL,
  `recipient_designation` varchar(255) DEFAULT NULL,
  `recipient_address` varchar(255) DEFAULT NULL,
  `recipient_date` timestamp NULL DEFAULT NULL,
  `declaration_letter` varchar(255) DEFAULT NULL,
  `status` varchar(211) NOT NULL DEFAULT '0',
  `reject_reason` text DEFAULT NULL,
  `icmr_off_status` varchar(211) DEFAULT '0',
  `icmr_noc_status` varchar(211) NOT NULL DEFAULT '0',
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exporters`
--

LOCK TABLES `exporters` WRITE;
/*!40000 ALTER TABLE `exporters` DISABLE KEYS */;
INSERT INTO `exporters` VALUES (112,'28',NULL,'NEXT/E/2024/00001','0414040635','NEXT-GEN BIO','PROPRIETOR','NO.4/6 SOORATHAMMAN KOIL STREET,NEW PERUNGALATHUR,KANCHIPURAM,TAMIL NADU,600063',NULL,'No',NULL,'T.Gnana Ruban','EXECUTIVE','Post Box No 1268,Postal code 111, MUSCAT, OMAN',NULL,'No',NULL,NULL,'30021290','Other','Any Tissue/Cells','cell lines for cell culture studies',NULL,'Research laboratory',NULL,'No',NULL,'3','ML','3',NULL,'No','Others','cell culture studies','Others','Yes','cell culture studies',NULL,'No','Retesting purposes',NULL,'two months','-80 degree academic institution',NULL,'No',NULL,'No','No',NULL,'No',NULL,'cell culture studies','512-1712914388.pdf',NULL,NULL,NULL,NULL,NULL,'NEXT-GEN BIO',NULL,'cell culture studies',NULL,NULL,NULL,NULL,NULL,'733-1712914388.pdf','0',NULL,'1','1','2024-04-25 07:31:21','2024-04-25 07:31:21'),(113,'30',NULL,'AURU/E/2024/00113','0202009378','AURUM PHARMACHEM PRIVATE LIMITED','TD','11, B.B.GANGULY  STREET,,2ND FLOOR,KOLKATA,WEST BENGAL,700012','Test1','Yes','568-1712926972.pdf','RAHUL SINGH','Manager','USA',NULL,'No',NULL,NULL,'30021210','For diphtheria','Serum',NULL,NULL,'Clinical/ Diagnostic laboratory',NULL,'No',NULL,'2','L','Test vol',NULL,'No','Calibration/ Quality assurance',NULL,'','No',NULL,NULL,'No','Retesting purposes',NULL,'2 years','uk',NULL,'No',NULL,'No','No',NULL,'No',NULL,'Calibration/ Quality assurance','412-1712926972.pdf',NULL,NULL,NULL,NULL,NULL,'AURUM PHARMACHEM PRIVATE LIMITED','RAHUL SINGH','Calibration/ Quality assurance',NULL,NULL,NULL,NULL,NULL,'619-1712926972.pdf','0','NULL','1','1','2024-07-03 07:10:04','2024-07-03 07:10:04'),(114,'32',NULL,'GLOS/E/2024/00114','0402023471','GLOSEL INDIA IMPEX PRIVATE LIMITED','OperationManager','FIRST FLOOR , AGURCHAND MANSION,NO.150, ANNA SALAI,MOUNT ROAD Contact No: 919566069888,CHENNAI,TAMIL NADU,600002',NULL,'No',NULL,'Dr. Marion Bimmler','Doctor','E.R.D.E.AAK-Diagnostik GmbH Robert-Rossle-Street No.10 House No. 55 Berlin, Buch - 13125',NULL,'No',NULL,NULL,'30029010','Human Blood','Serum',NULL,NULL,'Outpatient hospital facility',NULL,'Yes','For testing Purpose','1','ML','5ML Vial','3 Month once - need to send for  diagnostic testing laboratory purpose .','Yes','Clinical Diagnostics/ Testing',NULL,'','No',NULL,'5 ML VIAL','Yes','Retesting purposes',NULL,'One week','Lab',NULL,'No',NULL,'No','No',NULL,'No',NULL,'Clinical Diagnostics/ Testing','942-1715168848.pdf',NULL,NULL,NULL,NULL,NULL,'GLOSEL INDIA IMPEX PRIVATE LIMITED',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'515-1715168848.pdf','0',NULL,'1','0','2024-07-03 07:07:30','2024-07-03 07:07:30'),(115,'32',NULL,'GLOS/E/2024/00115','0402023471','GLOSEL INDIA IMPEX PRIVATE LIMITED','OperationManager','FIRST FLOOR , AGURCHAND MANSION,NO.150, ANNA SALAI,MOUNT ROAD Contact No: 919566069888,CHENNAI,TAMIL NADU,600002',NULL,'No',NULL,'Dr Med.Nina Babel','Doctor','St. Josef Hospital,IFL - Institute for Research and Teaching,AG Babel, Gudrunstrasse 56,House H, 2nd floor, H2.110, Bochum - 44791 Germany.',NULL,'No',NULL,NULL,'30029010','Human BloodHuman Blood','Serum',NULL,NULL,'Outpatient hospital facility',NULL,'Yes','Blood testing purpose','1','ML','5ML Vial','3 Months Once - need to be sent for testing purpose','Yes','Clinical Diagnostics/ Testing',NULL,'','No',NULL,'5 Ml only so no leftover','Yes','Retesting purposes',NULL,'One week','Lab',NULL,'No',NULL,'No','No',NULL,'No',NULL,'Clinical Diagnostics/ TestingClinical Diagnostics/ Testing','835-1715171378.pdf',NULL,NULL,NULL,NULL,NULL,'GLOSEL INDIA IMPEX PRIVATE LIMITED','Dr Med.Nina Babel',NULL,NULL,NULL,NULL,NULL,NULL,'628-1715171378.pdf','0',NULL,'1','0','2024-07-03 08:59:55','2024-07-03 08:59:55'),(116,'33',NULL,'TRAX/E/2024/00116','LCCPS6769M','TRAX DIAGNOSTICS AND RESEARCH LABORATORY','MR','NO. 1052-A, 6TH MAIN ROAD ERI SCHEME, MOGAPPAIR,,CHENNAI,TAMIL NADU,600037',NULL,'No',NULL,'Amy Death','Miss','UK NEQAS for H and I , welsh blood service, ely volly road, talbot green pontyclun CF72 9WB, United Kingdom',NULL,'No',NULL,NULL,'30029010','Human Blood','Whole blood',NULL,NULL,'Clinical/ Diagnostic laboratory',NULL,'Yes','Blood taken for QC','4 TUBES','ML','20',NULL,'No','Calibration/ Quality assurance',NULL,'','No',NULL,NULL,'No','Retesting purposes',NULL,'nill','nill',NULL,'No',NULL,'No','No',NULL,'No',NULL,'Calibration/ Quality assurance','138-1715172727.pdf',NULL,NULL,NULL,NULL,NULL,'TRAX DIAGNOSTICS AND RESEARCH LABORATORY','Amy Death','Calibration/ Quality assurance',NULL,NULL,NULL,NULL,NULL,'527-1715172727.pdf','1','Request is for Import of samples but present online portal grants NOC for Export of Samples only','1','0','2024-05-14 05:40:54','2024-05-14 05:40:54'),(117,'28',NULL,'NEXT/E/2024/00117','0414040635','NEXT-GEN BIO','PROPRIETOR','NO.4/6 SOORATHAMMAN KOIL STREET,NEW PERUNGALATHUR,KANCHIPURAM,TAMIL NADU,600063',NULL,'No',NULL,'T.Gnana Ruban','EXECUTIVE','Post Box No 1268,Postal code 111, MUSCAT, OMAN','DR SHERIFF','Yes','Sultan Qaboos University','Muscat Oman','30021290','Other','Any Tissue/Cells','ATCC CELL CULTURE COMERCIALLY AVAILABLE',NULL,'Research laboratory',NULL,'Yes','yes details attached for cell culture purpose only','2','ML','2','against order only','Yes','Others','FOR CELL CULTURE PURPOSE ONLY','Others','Yes','for cell culture purpose only',NULL,'No','Further analysis','for cell culture purpose only','two months','-80 degree academic institution',NULL,'No',NULL,'No','No',NULL,'No',NULL,'FOR CELL CULTURE PURPOSE ONLY','407-1716354938.pdf',NULL,NULL,NULL,NULL,NULL,'NEXT-GEN BIO',NULL,'FOR CELL CULTURE PURPOSE ONLY',NULL,NULL,NULL,NULL,NULL,'280-1716354938.pdf','0',NULL,'1','1','2024-05-29 09:23:57','2024-05-29 09:23:57'),(118,'37',NULL,'ZIOL/E/2024/00118','AACCZ2805P','ZIOLA RESEARCH PRIVATE LIMITED','CEO','No.950, MCECHS Layout, 80 Feet Double Road,Dr. SRK Nagar Post, Sreerampur, Bangalore,Bangalore,KARNATAKA,560077',NULL,'No',NULL,'Dana Immerso','Director','1321 mountain view circle ,Azusa,CA 91702',NULL,'No',NULL,NULL,'30029010','Human Blood','Any Tissue/Cells','Cryopreserved 1-2mm tissue sample',NULL,'Clinical/ Diagnostic laboratory',NULL,'Yes','Yes We have collected the ICF from every subject','7','ML','1','Yes, we may collect similar samples','Yes','Clinical Diagnostics/ Testing',NULL,'Genomic studies/Gene Variant/SNP analysis','Yes',NULL,'Depending upon the quantity of samples left over the client will be storing them for  research','Yes','Further analysis','Analysis of Gene response to new therapy','5 years','Laboratory under -80 c freezer',NULL,'No',NULL,'No','No',NULL,'No',NULL,'Clinical Diagnostics/ Testing','194-1718977746.pdf',NULL,NULL,NULL,NULL,NULL,'ZIOLA RESEARCH PRIVATE LIMITED','Dana Immerso','Clinical Diagnostics/ Testing',NULL,NULL,NULL,NULL,NULL,'902-1718977746.pdf','0',NULL,'1','0','2024-06-25 10:25:22','2024-06-25 10:25:22'),(119,'27',NULL,'HYDE/E/2024/00119','0991011244','HYDERABAD EYE RESEARCH  FOUNDATION','Clinician','Kallam Anji Reddy Campus,ROAD NO.2,BANJARA HILLS Contact No: 919959113232,HYDERABAD,TELANGANA,500034',NULL,'No',NULL,'Doug D. Chung','Lab Head','Laragen,  10601 Virginia Ave, Culver City, CA 90232  Culver City CA 90232  United States','The analyzed data and unused samples will be shared for further research analysis','Yes','Anthony J. Aldave','The Stein Eye Institute,  Department of Ophthalmology, David Geffen School of Medicine, University of California, Los Angeles  200 Stein Plaza, UCLA  Los Angeles, CA 90095-7003','30029010','Human Blood','Whole blood',NULL,NULL,'Inpatient hospital facility',NULL,'Yes','The subjects were informed sample collection for research purpose.','250','ML','5',NULL,'No','Others','Clinical and genetic testing for research purpose','Genomic studies/Gene Variant/SNP analysis','Yes',NULL,'The blood sample will be subjected for DNA extraction, and leftover blood will be stored in -80 C','Yes','Further analysis','Further analysis will involve detection of disease markers (proteins and cytokine)','2 y','The Stein Eye Institute,   -80 facilities',NULL,'No',NULL,'No','No',NULL,'No',NULL,'Clinical and genetic testing for research purpose','557-1719391738.pdf',NULL,NULL,NULL,NULL,NULL,'HYDERABAD EYE RESEARCH  FOUNDATION',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'470-1719391738.pdf','0',NULL,'0','0','2024-06-26 08:48:58','2024-06-26 08:48:58'),(120,'39','10.197.254.120','TEST/E/2024/00120','1234567890','TEST DGFT IEC','TEST','GATE NO 3, UDYOG BHAWAN,11-RAFI MARG Contact No: 9911229509,DELHI,DELHI,110011','test1','Yes','239-1719480961.pdf','test2','test3','test4','test5','Yes','test6','test7','30021210','For diphtheria','Buffy coat',NULL,NULL,'Clinical/ Diagnostic laboratory',NULL,'Yes','test8','21','ML','12','test9','Yes','Clinical Diagnostics/ Testing',NULL,'Proteomic Studies','Yes',NULL,'test10','Yes','Retesting purposes',NULL,'test11','test12','test13','Yes','test14','Yes','Yes','100-1719480961.pdf','Yes','917-1719480961.pdf','Clinical Diagnostics/ Testing','999-1719480961.pdf',NULL,NULL,NULL,NULL,NULL,'TEST DGFT IEC','test2','Clinical Diagnostics/ Testing',NULL,NULL,NULL,NULL,NULL,'703-1719480961.pdf','0',NULL,'1','1','2024-06-28 10:34:38','2024-06-28 10:34:38'),(121,'39','10.197.254.88','TEST/E/2024/00121','1234567890','TEST DGFT IEC','TEST','GATE NO 3, UDYOG BHAWAN,11-RAFI MARG Contact No: 9911229509,DELHI,DELHI,110011','Test','Yes','512-1719996175.pdf','Test1','Test2','Test3','Test4','Yes','Test5','Test6','30021020','Antisera and other blood fractions and immunological products, whether or not modified or obtained by means of biotechnological processes','Buffy coat',NULL,NULL,'Outpatient hospital facility',NULL,'Yes','Test7','12','ML','Test-12','Test8','Yes','Calibration/ Quality assurance',NULL,'Transcriptomics Studies','Yes',NULL,'Test9','Yes','Retesting purposes',NULL,'5 Days','Test10','Test11','Yes','Test12','Yes','Yes','902-1719996175.pdf','Yes','401-1719996175.pdf','Calibration/ Quality assurance','983-1719996175.pdf',NULL,NULL,NULL,NULL,NULL,'TEST DGFT IEC','Test1','Calibration/ Quality assurance',NULL,NULL,NULL,NULL,NULL,'738-1719996175.pdf','0',NULL,'1','1','2024-07-03 11:59:26','2024-07-03 11:59:26'),(122,'39','10.197.254.88','TEST/E/2024/00122','1234567890','TEST DGFT IEC','TEST','GATE NO 3, UDYOG BHAWAN,11-RAFI MARG Contact No: 9911229509,DELHI,DELHI,110011','Test1','Yes','633-1720007101.pdf','Test2','test3','test4','test5','Yes','test6','test7','30021091','Antisera and other blood fractions and immunological products, whether or not modified or obtained by means of biotechnological processes','Plasma',NULL,NULL,'Outpatient hospital facility',NULL,'Yes','test8','12','μL','Test-12','test9','Yes','Calibration/ Quality assurance',NULL,'Transcriptomics Studies','Yes',NULL,'test10','Yes','Retesting purposes',NULL,'5 Days','USA','test11','Yes','test12','Yes','Yes','708-1720007101.pdf','Yes','882-1720007101.pdf','Calibration/ Quality assurance','810-1720007101.pdf',NULL,NULL,NULL,NULL,NULL,'TEST DGFT IEC','Test2','Calibration/ Quality assurance',NULL,NULL,NULL,NULL,NULL,'175-1720007101.pdf','0','Request is for Export of samples but present online portal grants NOC for Export of Samples only','1','0','2024-07-04 10:56:55','2024-07-04 10:56:55'),(123,'39','10.197.254.88','TEST/E/2024/00123','1234567890','TEST DGFT IEC','TEST','GATE NO 3, UDYOG BHAWAN,11-RAFI MARG Contact No: 9911229509,DELHI,DELHI,110011','test1','Yes','608-1720008985.pdf','Raju','SEO','Noida','test2','Yes','test3','Delhi','30021210','For diphtheria','Others','test4',NULL,'Others','test5','Yes','test6','13','ML','Test','test7','Yes','Others','test8','Others','Yes','test9','test10','Yes','Further analysis','test11','5 Days','USA','test12','Yes','test13','Yes','Yes','241-1720008985.pdf','Yes','762-1720008985.pdf','test8','161-1720008985.pdf',NULL,NULL,NULL,NULL,NULL,'TEST DGFT IEC','Raju','test8',NULL,NULL,NULL,NULL,NULL,'235-1720008985.pdf','0','Form Rejected due to chnage','1','0','2024-07-04 10:56:55','2024-07-04 10:56:55'),(124,'39','10.197.254.22','TEST/E/2024/00124','1234567890','TEST DGFT IEC','TEST','GATE NO 3, UDYOG BHAWAN,11-RAFI MARG Contact No: 9911229509,DELHI,DELHI,110011','test','Yes','404-1720074354.pdf','Disuza','Developer','USA','test','Yes','Disuza','USA','30021230','For rabies','Plasma',NULL,NULL,'Research laboratory',NULL,'Yes','test','23','ML','sfsdfsdf','test','Yes','Others','test','Others','Yes','test','test','Yes','Further analysis','test','12 Months','Storage',NULL,'No',NULL,'No','No',NULL,'No',NULL,'test','327-1720074354.pdf',NULL,NULL,NULL,NULL,NULL,'TEST DGFT IEC','Disuza','test',NULL,NULL,NULL,NULL,NULL,'316-1720074354.pdf','1','reject test 124','1','0','2024-07-04 10:59:18','2024-07-04 10:59:18');
/*!40000 ALTER TABLE `exporters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exporters_old_new`
--

DROP TABLE IF EXISTS `exporters_old_new`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exporters_old_new` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(211) DEFAULT NULL,
  `ip_address` varchar(211) DEFAULT NULL,
  `application_number` varchar(255) DEFAULT NULL,
  `sending_iec_number` varchar(255) DEFAULT NULL,
  `sending_applicant_name` varchar(255) DEFAULT NULL,
  `sending_applicant_design` varchar(255) DEFAULT NULL,
  `sending_add_company_institute` varchar(255) DEFAULT NULL,
  `comp_institute_denied_export_auth_last_3_years` varchar(255) DEFAULT NULL,
  `upload_comp_institute_denied_export` varchar(255) DEFAULT NULL,
  `receving_recipient_name` varchar(255) DEFAULT NULL,
  `receving_recipient_design` varchar(255) DEFAULT NULL,
  `receiving_add_company_institute` varchar(255) DEFAULT NULL,
  `end_user_receiving_party` varchar(255) DEFAULT NULL,
  `end_user_name` varchar(255) DEFAULT NULL,
  `end_user_address` varchar(255) DEFAULT NULL,
  `hs_code` varchar(255) DEFAULT NULL,
  `hs_code_description` varchar(255) DEFAULT NULL,
  `natural_biomaterial_exported` varchar(255) DEFAULT NULL,
  `natural_biomaterial_exported_details` varchar(255) DEFAULT NULL,
  `sample_collected` varchar(255) DEFAULT NULL,
  `sample_collected_details` varchar(255) DEFAULT NULL,
  `samples_being_exported` varchar(255) DEFAULT NULL,
  `samples_being_exported_details` varchar(255) DEFAULT NULL,
  `exported_number` varchar(255) DEFAULT NULL,
  `exported_volume` varchar(255) DEFAULT NULL,
  `repeat_samples_envisaged` varchar(255) DEFAULT NULL,
  `specify_purpose_end_use` varchar(255) DEFAULT NULL,
  `samples_used_research_analysis` varchar(255) DEFAULT NULL,
  `leftover_samples_store` varchar(255) DEFAULT NULL,
  `purpose_sample_store` varchar(255) DEFAULT NULL,
  `duration_sample_store` varchar(255) DEFAULT NULL,
  `facility_sample_store` varchar(255) DEFAULT NULL,
  `national_security_angle` varchar(255) DEFAULT NULL,
  `foreign_country_army_military` varchar(255) DEFAULT NULL,
  `biomaterial_micro_organisms_approval` varchar(255) DEFAULT NULL,
  `biomaterial_micro_organisms_approval_file` varchar(255) DEFAULT NULL,
  `ibsc_rcgm_approval_applicable` varchar(255) DEFAULT NULL,
  `ibsc_rcgm_approval_applicable_file` varchar(255) DEFAULT NULL,
  `sender_certify_information_provided` varchar(255) DEFAULT NULL,
  `certified_copy_proforma` varchar(255) DEFAULT NULL,
  `sender_signature` varchar(255) DEFAULT NULL,
  `sender_name` varchar(255) DEFAULT NULL,
  `sender_designation` varchar(255) DEFAULT NULL,
  `sender_address` varchar(255) DEFAULT NULL,
  `sender_date` varchar(211) DEFAULT NULL,
  `recipient_certify_samples_referred` varchar(255) DEFAULT NULL,
  `recipient_name_institution` varchar(255) DEFAULT NULL,
  `recipient_utilized_for_purpose` varchar(255) DEFAULT NULL,
  `recipient_signature` varchar(255) DEFAULT NULL,
  `recipient_name` varchar(255) DEFAULT NULL,
  `recipient_designation` varchar(255) DEFAULT NULL,
  `recipient_address` varchar(255) DEFAULT NULL,
  `recipient_date` timestamp NULL DEFAULT NULL,
  `declaration_letter` varchar(255) DEFAULT NULL,
  `icmr_off_status` varchar(211) DEFAULT '0',
  `icmr_noc_status` varchar(211) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exporters_old_new`
--

LOCK TABLES `exporters_old_new` WRITE;
/*!40000 ALTER TABLE `exporters_old_new` DISABLE KEYS */;
INSERT INTO `exporters_old_new` VALUES (1,'3',NULL,'ICMR/EXPORT/2024/689457','0200015443','OSTER CHEMICAL & PHARMACEUTICAL WORKS PVT LTD','Importer','Delhi','Test','334-1709014707.pdf','Mohan','Manager','Mumbai','Test','Rohit','New Delhi','30012010','Liquid extracts of liver','whole blood,Serum,other','Test','Outpatient hospital facility',NULL,'Yes','Test','12',NULL,'Test','Calibration/ Quality assurance,Clinical Diagnostics/ Testing,','other,Test','Test','Retesting purposes,','5 Days','Kolkatta','Test','Test','Yes','313-1709014707.pdf','Yes','164-1709014707.pdf','Calibration/ Quality assurance,Clinical Diagnostics/ Testing','244-1709014708.pdf',NULL,'OSTER CHEMICAL & PHARMACEUTICAL WORKS PVT LTD','Importer','Delhi','27-02-2024 11:44:42','OSTER CHEMICAL & PHARMACEUTICAL WORKS PVT LTD','Mohan','Calibration/ Quality assurance,Clinical Diagnostics/ Testing',NULL,NULL,NULL,NULL,NULL,'555-1709014707.pdf','1','0','2024-02-27 00:48:28','2024-02-27 00:48:28');
/*!40000 ALTER TABLE `exporters_old_new` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exportersdrafts`
--

DROP TABLE IF EXISTS `exportersdrafts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exportersdrafts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(211) DEFAULT NULL,
  `ip_address` varchar(211) DEFAULT NULL,
  `application_number` varchar(255) DEFAULT NULL,
  `sending_iec_number` varchar(255) DEFAULT NULL,
  `sending_applicant_name` varchar(255) DEFAULT NULL,
  `sending_applicant_design` varchar(255) DEFAULT NULL,
  `sending_add_company_institute` varchar(255) DEFAULT NULL,
  `comp_institute_denied_export_auth_last_3_years` varchar(255) DEFAULT NULL,
  `denied_export_auth_last_3_years_yes_no` varchar(255) DEFAULT NULL,
  `upload_comp_institute_denied_export` varchar(255) DEFAULT NULL,
  `receving_recipient_name` varchar(255) DEFAULT NULL,
  `receving_recipient_design` varchar(255) DEFAULT NULL,
  `receiving_add_company_institute` varchar(255) DEFAULT NULL,
  `end_user_receiving_party` varchar(255) DEFAULT NULL,
  `end_user_receiving_party_yes_no` varchar(255) DEFAULT NULL,
  `end_user_name` varchar(255) DEFAULT NULL,
  `end_user_address` varchar(255) DEFAULT NULL,
  `hs_code` varchar(255) DEFAULT NULL,
  `hs_code_description` varchar(256) DEFAULT NULL,
  `natural_biomaterial_exported` varchar(255) DEFAULT NULL,
  `natural_biomaterial_exported_details` varchar(256) DEFAULT NULL,
  `natural_biomaterial_exported_any_tissue_details` text DEFAULT NULL,
  `sample_collected` varchar(255) DEFAULT NULL,
  `sample_collected_details` varchar(256) DEFAULT NULL,
  `samples_being_exported` varchar(255) DEFAULT NULL,
  `samples_being_exported_details` varchar(256) DEFAULT NULL,
  `exported_number` varchar(255) DEFAULT NULL,
  `exported_volume` varchar(255) DEFAULT NULL,
  `vol_of_sample_text` varchar(11) DEFAULT NULL,
  `repeat_samples_envisaged` varchar(255) DEFAULT NULL,
  `repeat_samples_envisaged_yes_no` varchar(255) DEFAULT NULL,
  `specify_purpose_end_use` varchar(255) DEFAULT NULL,
  `specify_purpose_end_use_details` varchar(255) DEFAULT NULL,
  `samples_used_research_analysis` varchar(255) DEFAULT NULL,
  `samples_used_research_analysis_yes_no` varchar(255) DEFAULT NULL,
  `samples_used_research_analysis_details` text DEFAULT NULL,
  `leftover_samples_store` varchar(255) DEFAULT NULL,
  `leftover_samples_store_yes_no` varchar(255) DEFAULT NULL,
  `purpose_sample_store` varchar(255) DEFAULT NULL,
  `purpose_sample_store_details` varchar(255) DEFAULT NULL,
  `duration_sample_store` varchar(255) DEFAULT NULL,
  `facility_sample_store` varchar(255) DEFAULT NULL,
  `national_security_angle` varchar(255) DEFAULT NULL,
  `national_security_angle_yes_no` varchar(255) DEFAULT NULL,
  `foreign_country_army_military` varchar(255) DEFAULT NULL,
  `foreign_country_army_military_yes_no` varchar(255) DEFAULT NULL,
  `biomaterial_micro_organisms_approval` varchar(255) DEFAULT NULL,
  `biomaterial_micro_organisms_approval_file` varchar(255) DEFAULT NULL,
  `ibsc_rcgm_approval_applicable` varchar(255) DEFAULT NULL,
  `ibsc_rcgm_approval_applicable_file` varchar(255) DEFAULT NULL,
  `sender_certify_information_provided` varchar(255) DEFAULT NULL,
  `certified_copy_proforma` varchar(255) DEFAULT NULL,
  `sender_signature` varchar(255) DEFAULT NULL,
  `sender_name` varchar(255) DEFAULT NULL,
  `sender_designation` varchar(255) DEFAULT NULL,
  `sender_address` varchar(255) DEFAULT NULL,
  `sender_date` varchar(211) DEFAULT NULL,
  `recipient_certify_samples_referred` varchar(255) DEFAULT NULL,
  `recipient_name_institution` varchar(255) DEFAULT NULL,
  `recipient_utilized_for_purpose` varchar(255) DEFAULT NULL,
  `recipient_signature` varchar(255) DEFAULT NULL,
  `recipient_name` varchar(255) DEFAULT NULL,
  `recipient_designation` varchar(255) DEFAULT NULL,
  `recipient_address` varchar(255) DEFAULT NULL,
  `recipient_date` timestamp NULL DEFAULT NULL,
  `declaration_letter` varchar(255) DEFAULT NULL,
  `status` varchar(211) NOT NULL DEFAULT '0',
  `reject_reason` text DEFAULT NULL,
  `icmr_off_status` varchar(211) DEFAULT '0',
  `icmr_noc_status` varchar(211) NOT NULL DEFAULT '0',
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=133 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exportersdrafts`
--

LOCK TABLES `exportersdrafts` WRITE;
/*!40000 ALTER TABLE `exportersdrafts` DISABLE KEYS */;
INSERT INTO `exportersdrafts` VALUES (90,'21',NULL,'ICMR/EXPORT/2024/00001','0588138690','BHARAT HEAVY ELECTRICALS LIMITED','Sr. Scientist','BHEL HOUSE SIRI FORT,ASIAN GAMES VILL,NEW DELHI,DELHI,110049','jai Shri Ram1','yes','429-1709530092.pdf','RAHUL SINGH','Manager','DELHI','jai Shri Ram2','Yes','clinton','USA-1','30012010','Liquid extracts of liver','Whole blood,Buffy coat,Serum,Plasma,Other body fluids','jai Shri Ram3',NULL,'Inpatient hospital facility,Outpatient hospital facility,Others','jai Shri Ram5','No',NULL,'2','ML',NULL,'jai Shri Ram6','Yes','Calibration/ Quality assurance,Others','jai Shri Ram6','Genomic studies/Gene Variant/SNP analysis,Transcriptomics Studies,Others','Yes','jai Shri Ram7',NULL,NULL,'Retesting purposes,Further analysis','jai Shri Ram8','2 Years','ABC','jai Shri Ram9','Yes','jai Shri Ram10','Yes','Yes','921-1709530092.txt','Yes','227-1709530092.txt','Calibration/ Quality assurance, Others,','377-1709530092.txt',NULL,'BHARAT HEAVY ELECTRICALS LIMITED','Sr. Scientist','BHEL HOUSE SIRI FORT','04-03-2024 10:48:15','BHARAT HEAVY ELECTRICALS LIMITED','RAHUL SINGH','Calibration/ Quality assurance, Others,',NULL,NULL,NULL,NULL,NULL,'417-1709530092.txt','1',NULL,'1','0','2024-03-08 20:11:06','2024-03-08 20:11:06'),(91,'3',NULL,'ICMR/EXPORT/2024/00091','0200015443','OSTER CHEMICAL & PHARMACEUTICAL WORKS PVT LTD','Importer','Delhi,,,,','adda','yes','283-1709618488.pdf','Disuza','Developer','USA','sadadad','Yes','Disuza','USA','30012020','Liver extracts, dry','Extracted RNA,Other body fluids','asddad',NULL,'Outpatient hospital facility',NULL,'No',NULL,'23','ML',NULL,NULL,'No','Clinical Diagnostics/ Testing',NULL,'','No',NULL,NULL,NULL,'Retesting purposes',NULL,'12 Months','Storage',NULL,'No',NULL,'No','No',NULL,'No',NULL,'Clinical Diagnostics/ Testing,','699-1709618488.pdf',NULL,'OSTER CHEMICAL & PHARMACEUTICAL WORKS PVT LTD','Importer','Delhi','05-03-2024 11:29:38','OSTER CHEMICAL & PHARMACEUTICAL WORKS PVT LTD','Disuza','Clinical Diagnostics/ Testing,',NULL,NULL,NULL,NULL,NULL,'377-1709618488.pdf','1',NULL,'0','0','2024-03-07 10:59:55','2024-03-07 10:59:55'),(92,'3',NULL,'ICMR/EXPORT/2024/00092','0200015443','OSTER CHEMICAL & PHARMACEUTICAL WORKS PVT LTD','Importer','Delhi,,,,',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,'',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'OSTER CHEMICAL & PHARMACEUTICAL WORKS PVT LTD','Importer','Delhi','06-03-2024 12:43:17','OSTER CHEMICAL & PHARMACEUTICAL WORKS PVT LTD',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0','0','2024-03-06 01:44:13','2024-03-06 01:44:13'),(93,'3',NULL,'ICMR/EXPORT/2024/00094','0200015443','OSTER CHEMICAL & PHARMACEUTICAL WORKS PVT LTD','Importer','Delhi,,,,','tes5t','yes','494-1709719878.pdf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,'',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'OSTER CHEMICAL & PHARMACEUTICAL WORKS PVT LTD','Importer','Delhi','06-03-2024 15:40:14','OSTER CHEMICAL & PHARMACEUTICAL WORKS PVT LTD',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0','0','2024-03-06 04:41:19','2024-03-06 10:11:19'),(94,'3',NULL,'ICMR/EXPORT/2024/00094','0200015443','OSTER CHEMICAL & PHARMACEUTICAL WORKS PVT LTD','Importer','Delhi,,,,',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,'',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'OSTER CHEMICAL & PHARMACEUTICAL WORKS PVT LTD','Importer','Delhi','06-03-2024 16:43:25','OSTER CHEMICAL & PHARMACEUTICAL WORKS PVT LTD',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0','0','2024-03-06 05:44:00','2024-03-06 05:44:00'),(95,'3',NULL,'ICMR/EXPORT/2024/00095','0200015443','OSTER CHEMICAL & PHARMACEUTICAL WORKS PVT LTD','Importer','Delhi,,,,',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,'',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'OSTER CHEMICAL & PHARMACEUTICAL WORKS PVT LTD','Importer','Delhi','06-03-2024 16:47:01','OSTER CHEMICAL & PHARMACEUTICAL WORKS PVT LTD',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0','0','2024-03-06 05:47:07','2024-03-06 05:47:07'),(96,'3',NULL,'DRAFT/E/2024/00097','0200015443','OSTER CHEMICAL & PHARMACEUTICAL WORKS PVT LTD','Importer','Delhi,,,,',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,'',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'OSTER CHEMICAL & PHARMACEUTICAL WORKS PVT LTD','Importer','Delhi','06-03-2024 17:11:06','OSTER CHEMICAL & PHARMACEUTICAL WORKS PVT LTD',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0','0','2024-03-06 06:11:11','2024-03-06 11:41:11'),(97,'3',NULL,'DRAFT/E/2024/00097','0200015443','OSTER CHEMICAL & PHARMACEUTICAL WORKS PVT LTD','Importer','Delhi,,,,','test','Yes','868-1709733558.pdf','Disuza','Developer','USA','test2','Yes','Disuza','USA','30012020','Liver extracts, dry','Any Tissue/Cells,Other body fluids','test4','test3','Others','test5','Yes','test6','23','ML',NULL,NULL,'No','Others','test7','Others','Yes','ddfsfffsf',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'OSTER CHEMICAL & PHARMACEUTICAL WORKS PVT LTD','Importer','Delhi','07-03-2024 13:53:23','OSTER CHEMICAL & PHARMACEUTICAL WORKS PVT LTD',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0','0','2024-03-07 02:55:14','2024-03-07 08:25:14'),(98,'3',NULL,'DRAFT/E/2024/00098','0200015443','OSTER CHEMICAL & PHARMACEUTICAL WORKS PVT LTD','Importer','Delhi,,,,','t1','Yes','915-1709805791.pdf','Disuza','Developer','USA','t2','Yes','Disuza','USA','30012020','Liver extracts, dry','Any Tissue/Cells,Other body fluids','t4','t3','Others','t5','Yes','t6','23','ML',NULL,'t7','Yes','Others','t8','Others','Yes','t9','t10','Yes','Further analysis','t11','12 Months','Storage','t12','Yes','t13','Yes','Yes','144-1709805791.pdf','Yes','483-1709805791.pdf',NULL,'655-1709805791.pdf',NULL,'OSTER CHEMICAL & PHARMACEUTICAL WORKS PVT LTD','Importer','Delhi','07-03-2024 15:41:51','OSTER CHEMICAL & PHARMACEUTICAL WORKS PVT LTD',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'700-1709805791.pdf','0',NULL,'0','0','2024-03-07 04:42:04','2024-03-07 10:12:04'),(99,'3',NULL,'DRAFT/E/2024/00099','0200015443','OSTER CHEMICAL & PHARMACEUTICAL WORKS PVT LTD','Importer','Delhi,,,,','t1','Yes','843-1709807528.pdf','Disuza','Developer','USA','t2','Yes','Disuza','USA','30012020','Liver extracts, dry','Any Tissue/Cells,Other body fluids','t4','t3','Others','t5','Yes','t6','23','ML',NULL,'t7','Yes','Others','t8','Others','Yes','t9','t10','Yes','Further analysis','t11','12 Months','Storage','t13','Yes','t14','Yes','Yes','443-1709807528.pdf','Yes','800-1709807528.pdf','Others','245-1709807528.pdf',NULL,'OSTER CHEMICAL & PHARMACEUTICAL WORKS PVT LTD','Importer','Delhi','07-03-2024 15:59:21','OSTER CHEMICAL & PHARMACEUTICAL WORKS PVT LTD','Disuza','Others',NULL,NULL,NULL,NULL,NULL,'295-1709807528.pdf','1',NULL,'0','0','2024-03-07 11:00:01','2024-03-07 11:00:01'),(100,'1',NULL,'DRAFT/E/2024/00100','AAICR8954R','RUDANI ENTERPRISES PRIVATE LIMITED','Manager','new ashok nagar,b block,north delhi,delhi,110096',',k;k','Yes','813-1709925767.pdf','rahul','bnbn','USA',NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,'',NULL,'No',NULL,NULL,NULL,NULL,NULL,'No','',NULL,'','No',NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'No',NULL,NULL,NULL,NULL,NULL,NULL,'RUDANI ENTERPRISES PRIVATE LIMITED','Manager','new ashok nagar','09-03-2024 00:52:54','RUDANI ENTERPRISES PRIVATE LIMITED',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1',NULL,'0','0','2024-03-09 03:25:45','2024-03-08 19:25:45'),(101,'1',NULL,'DRAFT/E/2024/00101','AAICR8954R','RUDANI ENTERPRISES PRIVATE LIMITED','Manager','new ashok nagar,b block,north delhi,delhi,110096','test1','Yes','224-1709927790.pdf','rahul','developer','USA','test2','Yes','Rama','test3','30012010','Liquid extracts of liver','Any Tissue/Cells,Other body fluids','test4','test3','Others','test5','Yes','test6','21','ML',NULL,'test7','Yes','Others','test8','Others','Yes','test9','test10','Yes','Further analysis','test11','2 years','asddad','test12','Yes','test613','Yes','Yes','180-1709927790.pdf','Yes','857-1709927790.pdf','Others','576-1709927790.pdf',NULL,'RUDANI ENTERPRISES PRIVATE LIMITED','Manager','new ashok nagar','09-03-2024 01:15:31','RUDANI ENTERPRISES PRIVATE LIMITED','rahul','Others',NULL,NULL,NULL,NULL,NULL,'723-1709927790.pdf','1',NULL,'0','0','2024-03-09 03:56:30','2024-03-09 03:56:30'),(102,'1',NULL,'DRAFT/E/2024/00102','AAICR8954R','RUDANI ENTERPRISES PRIVATE LIMITED','Manager','SHOP NO. 04 PRABHU SHILP APARTMENT,TAPOVAN ROAD, DWARKA Contact No: 919890266903,OPP PODAR SCHOOL NASHIK,MAHARASHTRA,422011','jai Mahakal1','Yes','685-1709934962.pdf','John','CEO','New york','jai Mahakal2','Yes','Maxwell','US','30012010','Liquid extracts of liver','Whole blood,Buffy coat,Any Tissue/Cells,Other body fluids','jai Mahakal4','jai Mahakal3','Inpatient hospital facility',NULL,'Yes','jai Mahakal5','21','μL',NULL,'jai Mahakal6','Yes','Calibration/ Quality assurance',NULL,'Transcriptomics Studies,Others','Yes','jai Mahakal7','jai Mahakal8','Yes','Retesting purposes',NULL,'2 years','UK','jai Mahakal10','Yes',NULL,'No','Yes','937-1709934962.pdf','Yes','296-1709934962.pdf','Calibration/ Quality assurance','447-1709934963.pdf',NULL,'RUDANI ENTERPRISES PRIVATE LIMITED','Manager','SHOP NO. 04 PRABHU SHILP APARTMENT','09-03-2024 03:13:53','RUDANI ENTERPRISES PRIVATE LIMITED','John','Calibration/ Quality assurance',NULL,NULL,NULL,NULL,NULL,'160-1709934962.pdf','0',NULL,'0','0','2024-03-09 05:57:32','2024-03-08 21:57:32'),(103,'1',NULL,'DRAFT/E/2024/00103','AAICR8954R','RUDANI ENTERPRISES PRIVATE LIMITED','Manager','SHOP NO. 04 PRABHU SHILP APARTMENT,TAPOVAN ROAD, DWARKA Contact No: 919890266903,OPP PODAR SCHOOL NASHIK,MAHARASHTRA,422011',NULL,'Yes',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,'',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'RUDANI ENTERPRISES PRIVATE LIMITED','Manager','SHOP NO. 04 PRABHU SHILP APARTMENT','13-03-2024 11:09:36','RUDANI ENTERPRISES PRIVATE LIMITED',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1',NULL,'0','0','2024-03-13 00:09:40','2024-03-13 05:39:40'),(104,'1',NULL,'DRAFT/E/2024/00104','AAICR8954R','RUDANI ENTERPRISES PRIVATE LIMITED','Manager','SHOP NO. 04 PRABHU SHILP APARTMENT,TAPOVAN ROAD, DWARKA Contact No: 919890266903,OPP PODAR SCHOOL NASHIK,MAHARASHTRA,422011',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'30012010','Liquid extracts of liver','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,'',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'RUDANI ENTERPRISES PRIVATE LIMITED','Manager','SHOP NO. 04 PRABHU SHILP APARTMENT','12-03-2024 19:11:59','RUDANI ENTERPRISES PRIVATE LIMITED',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1',NULL,'0','0','2024-03-12 08:12:10','2024-03-12 08:12:10'),(105,'1',NULL,'DRAFT/E/2024/00105','AAICR8954R','RUDANI ENTERPRISES PRIVATE LIMITED','Manager','SHOP NO. 04 PRABHU SHILP APARTMENT,TAPOVAN ROAD, DWARKA Contact No: 919890266903,OPP PODAR SCHOOL NASHIK,MAHARASHTRA,422011',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,'',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'RUDANI ENTERPRISES PRIVATE LIMITED','Manager','SHOP NO. 04 PRABHU SHILP APARTMENT','13-03-2024 11:08:20','RUDANI ENTERPRISES PRIVATE LIMITED',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0','0','2024-03-13 00:20:29','2024-03-13 05:50:29'),(106,'1',NULL,'DRAFT/E/2024/00106','AAICR8954R','RUDANI ENTERPRISES PRIVATE LIMITED','Manager','SHOP NO. 04 PRABHU SHILP APARTMENT,TAPOVAN ROAD, DWARKA Contact No: 919890266903,OPP PODAR SCHOOL NASHIK,MAHARASHTRA,422011',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,'',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'RUDANI ENTERPRISES PRIVATE LIMITED','Manager','SHOP NO. 04 PRABHU SHILP APARTMENT','13-03-2024 11:09:47','RUDANI ENTERPRISES PRIVATE LIMITED',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0','0','2024-03-13 00:10:18','2024-03-13 05:40:18'),(107,'1',NULL,'DRAFT/E/2024/00107','AAICR8954R','RUDANI ENTERPRISES PRIVATE LIMITED','Manager','SHOP NO. 04 PRABHU SHILP APARTMENT,TAPOVAN ROAD, DWARKA Contact No: 919890266903,OPP PODAR SCHOOL NASHIK,MAHARASHTRA,422011',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,'',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'RUDANI ENTERPRISES PRIVATE LIMITED','Manager','SHOP NO. 04 PRABHU SHILP APARTMENT','13-03-2024 15:37:55','RUDANI ENTERPRISES PRIVATE LIMITED',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1',NULL,'0','0','2024-03-13 04:38:07','2024-03-13 04:38:07'),(108,'5',NULL,'DRAFT/E/2024/00108','1234567890','TEST DGFT IEC','ABl','GATE NO 3, UDYOG BHAWAN,11-RAFI MARG Contact No: 9911229509,DELHI,DELHI,110011','jai Shri Ram1','Yes','628-1710326299.pdf','RAHUL SINGH','Manager','USA','jai Shri Ram2','Yes','clinton','USA-1','30012010','Liquid extracts of liver','',NULL,NULL,'Inpatient hospital facility',NULL,'Yes','jai Shri Ram3','2','ML','Test','jai Shri Ram4','Yes','Calibration/ Quality assurance',NULL,'','No',NULL,'jai Shri Ram6','Yes','Further analysis','jai Shri Ram7','2 years','uk',NULL,'No','jai Shri Ram9','Yes','Yes','846-1710326299.pdf','Yes','847-1710326299.pdf','Calibration/ Quality assurance','887-1710326299.pdf',NULL,'TEST DGFT IEC','ABl','GATE NO 3, UDYOG BHAWAN','13-03-2024 16:05:10','TEST DGFT IEC','RAHUL SINGH','Calibration/ Quality assurance',NULL,NULL,NULL,NULL,NULL,'964-1710326299.pdf','0',NULL,'0','0','2024-03-13 05:16:46','2024-03-13 10:46:46'),(109,'1',NULL,'DRAFT/E/2024/00109','AAICR8954R','RUDANI ENTERPRISES PRIVATE LIMITED','Manager','SHOP NO. 04 PRABHU SHILP APARTMENT,TAPOVAN ROAD, DWARKA Contact No: 919890266903,OPP PODAR SCHOOL NASHIK,MAHARASHTRA,422011','Mahakal1','Yes','906-1710334500.pdf','RAHUL SINGH','Manager','USA','Mahakal2','Yes','clinton','USA-1','30021020','Antisera and other blood fractions and immunological products, whether or not modified or obtained by means of biotechnological processes','',NULL,NULL,'Clinical/ Diagnostic laboratory',NULL,'Yes','Mahakal3','2','ML','Test','Mahakal4','Yes','Calibration/ Quality assurance',NULL,'','Yes',NULL,'Mahakal5','Yes','Retesting purposes',NULL,'2 years','uk','Mahakal6','Yes','Mahakal7','Yes','Yes','560-1710334500.pdf','Yes','871-1710334500.pdf','Calibration/ Quality assurance','495-1710334500.pdf',NULL,'RUDANI ENTERPRISES PRIVATE LIMITED','Manager','SHOP NO. 04 PRABHU SHILP APARTMENT','13-03-2024 18:19:26','RUDANI ENTERPRISES PRIVATE LIMITED','RAHUL SINGH','Calibration/ Quality assurance',NULL,NULL,NULL,NULL,NULL,'962-1710334500.pdf','0',NULL,'0','0','2024-03-13 07:29:17','2024-03-13 12:59:17'),(110,'13',NULL,'DRAFT/E/2024/00110','0202009378','AURUM PHARMACHEM PRIVATE LIMITED','ihd','11, B.B.GANGULY  STREET,,2ND FLOOR,KOLKATA,WEST BENGAL,700012',NULL,'Yes','431-1710389811.pdf','rrr','rrr','rr','rrr','Yes','rrr','rr','30021220','For tetanus','',NULL,NULL,'Outpatient hospital facility',NULL,'Yes','rrr','50  slides','μL','100','rrr','Yes','Clinical Diagnostics/ Testing',NULL,'','Yes',NULL,'rrr','Yes','Retesting purposes',NULL,'rrrrr months','123dfff','gff','Yes','ffff','Yes','Yes','688-1710389811.pdf','Yes','637-1710389811.pdf','Clinical Diagnostics/ Testing',NULL,NULL,'AURUM PHARMACHEM PRIVATE LIMITED','ihd','11, B.B.GANGULY  STREET,','14-03-2024 09:39:16','AURUM PHARMACHEM PRIVATE LIMITED','rrr','Clinical Diagnostics/ Testing',NULL,NULL,NULL,NULL,NULL,'109-1710389811.pdf','1',NULL,'0','0','2024-03-13 22:46:51','2024-03-13 22:46:51'),(111,'14',NULL,'DRAFT/E/2024/00111','0201012219','ESKAG PHARMA PVT LTD','programmer','AG - 112, Suite No. 804 & 805,Sector - II, Baishakhi , Salt Lake,,KOLKATA (W.B.),WEST BENGAL,700091','test1','Yes','365-1710394138.pdf','testname','testdesig','ICMR 142,','test2','Yes','testend','test add','30021091','Antisera and other blood fractions and immunological products, whether or not modified or obtained by means of biotechnological processes','',NULL,NULL,'Inpatient hospital facility',NULL,'Yes','test3','20','ML','3','test4','Yes','Clinical Diagnostics/ Testing',NULL,'','Yes',NULL,'test6','Yes','Retesting purposes',NULL,'12 months','test','test7','Yes','test8','Yes','Yes','430-1710394138.pdf','Yes','505-1710394138.pdf','Clinical Diagnostics/ Testing','607-1710394138.pdf',NULL,'ESKAG PHARMA PVT LTD','programmer','AG - 112, Suite No. 804 & 805','14-03-2024 11:32:13','ESKAG PHARMA PVT LTD',NULL,'Clinical Diagnostics/ Testing',NULL,NULL,NULL,NULL,NULL,'827-1710394138.pdf','0',NULL,'0','0','2024-03-14 00:34:36','2024-03-14 06:04:36'),(112,'13',NULL,'DRAFT/E/2024/00112','0202009378','AURUM PHARMACHEM PRIVATE LIMITED','ihd','11, B.B.GANGULY  STREET,,2ND FLOOR,KOLKATA,WEST BENGAL,700012','test IMRAN','Yes','575-1710408584.docx','testIMRAN','testIMRAN','test IMRAN','test IMRAN','Yes','testIMRAN','test IMRAN','30021091','Antisera and other blood fractions and immunological products, whether or not modified or obtained by means of biotechnological processes','','test IMRAN',NULL,'Inpatient hospital facility',NULL,'Yes','test IMRAN','556','ML','bloodc 455',NULL,'No','Others','test IMRAN','','Yes',NULL,'test IMRAN','Yes','Further analysis','test IMRAN','2 years','test IMRAN',NULL,'No','test IMRAN','Yes','Yes','393-1710408584.docx','Yes','647-1710408584.docx','Others','212-1710408584.pdf',NULL,'AURUM PHARMACHEM PRIVATE LIMITED','ihd','11, B.B.GANGULY  STREET,','14-03-2024 14:53:01','AURUM PHARMACHEM PRIVATE LIMITED','testIMRAN','Others',NULL,NULL,NULL,NULL,NULL,'165-1710408584.pdf','0',NULL,'0','0','2024-03-14 04:02:44','2024-03-14 09:32:44'),(113,'14',NULL,'DRAFT/E/2024/00113','0201012219','ESKAG PHARMA PVT LTD','programmer','AG - 112, Suite No. 804 & 805,Sector - II, Baishakhi , Salt Lake,,KOLKATA (W.B.),WEST BENGAL,700091',NULL,'Yes',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,'Others','sfsdgvbdfg',NULL,NULL,NULL,NULL,'34234',NULL,NULL,'Others','fdsfdgvdfgv','',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Others',NULL,NULL,'ESKAG PHARMA PVT LTD','programmer','AG - 112, Suite No. 804 & 805','18-03-2024 15:11:46','ESKAG PHARMA PVT LTD',NULL,'Others',NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'0','0','2024-03-19 23:45:47','2024-03-20 05:15:47'),(114,'15',NULL,'DRAFT/E/2024/00114','0200015443','OSTER CHEMICAL & PHARMACEUTICAL WORKS PVT LTD','manager','124/4A, MANICKTOLA STREET,,,KOLKATA,WEST BENGAL,700006',NULL,NULL,NULL,'fadfa','fadfa','fadfadfa',NULL,NULL,NULL,NULL,'30021210','For diphtheria','',NULL,NULL,'Clinical/ Diagnostic laboratory',NULL,NULL,NULL,'1','ML','2',NULL,NULL,'',NULL,'',NULL,NULL,NULL,NULL,'',NULL,'12',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'265-1711102586.',NULL,NULL,NULL,NULL,NULL,'OSTER CHEMICAL & PHARMACEUTICAL WORKS PVT LTD','fadfa',NULL,NULL,NULL,NULL,NULL,NULL,'865-1711102586.','1',NULL,'0','0','2024-03-22 04:46:26','2024-03-22 04:46:26'),(115,'15',NULL,'DRAFT/E/2024/00115','0200015443','OSTER CHEMICAL & PHARMACEUTICAL WORKS PVT LTD','manager','124/4A, MANICKTOLA STREET,,,KOLKATA,WEST BENGAL,700006',NULL,NULL,NULL,'12','12','21',NULL,'No',NULL,NULL,'30021230','For rabies','',NULL,NULL,'Clinical/ Diagnostic laboratory',NULL,'No',NULL,'12','ML','12',NULL,'No','Calibration/ Quality assurance',NULL,'','No',NULL,NULL,'No','Retesting purposes',NULL,'12','12',NULL,'No',NULL,'No','No',NULL,'No',NULL,NULL,'473-1711103534.',NULL,NULL,NULL,NULL,NULL,'OSTER CHEMICAL & PHARMACEUTICAL WORKS PVT LTD',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'935-1711103534.','0',NULL,'0','0','2024-03-22 05:05:32','2024-03-22 10:35:32'),(116,'15',NULL,'DRAFT/E/2024/00116','0200015443','OSTER CHEMICAL & PHARMACEUTICAL WORKS PVT LTD','manager','124/4A, MANICKTOLA STREET,,,KOLKATA,WEST BENGAL,700006','provide details','Yes','508-1711521206.docx','name of the rec','test imran designation','test address','yes add details','Yes','name end user','address end user','30021020','Antisera and other blood fractions and immunological products, whether or not modified or obtained by means of biotechnological processes','','other body fluids',NULL,'Others','others text Where were the samples collected?','Yes','yes Provide details','56','ML','20','Yes, provide details','Yes','Others','Specify purpose/ end use others text','','Yes','yes other text','yes provide details text','Yes','Further analysis','please specify','30 days duration','TEST facility, USA','yes Provide details','Yes','yes Provide details','Yes','Yes','100-1711521206.pdf','Yes','261-1711521206.pdf','Specify purpose/ end use opthers text','711-1711521206.pdf',NULL,NULL,NULL,NULL,NULL,'OSTER CHEMICAL & PHARMACEUTICAL WORKS PVT LTD','name of the rec','Specify purpose/ end use opthers text',NULL,NULL,NULL,NULL,NULL,'222-1711521206.docx','0',NULL,'0','0','2024-03-27 01:07:08','2024-03-27 06:37:08'),(117,'15',NULL,'DRAFT/E/2024/00117','0200015443','OSTER CHEMICAL & PHARMACEUTICAL WORKS PVT LTD','manager','124/4A, MANICKTOLA STREET,,,KOLKATA,WEST BENGAL,700006',NULL,'Yes',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Others','Test data of nature',NULL,'Others','Test',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Others','Add details','',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Add details',NULL,NULL,NULL,NULL,NULL,NULL,'OSTER CHEMICAL & PHARMACEUTICAL WORKS PVT LTD',NULL,'Add details',NULL,NULL,NULL,NULL,NULL,NULL,'1',NULL,'0','0','2024-03-27 02:42:45','2024-03-27 08:12:45'),(118,'26',NULL,'DRAFT/E/2024/00118','ABWFA0295L','AXTON GLOBAL','Testing','5 SUBHAM BUNGLOW, OPP. BABUL BAUGH PARTY PLOT,,NR. SINDHUBHAVAN, BODAKDEV,,AHMEDABAD,GUJARAT,380054',NULL,'No',NULL,'test pratima','test designation','V. Ramalingaswami Bhawan, P.O. Box No. 4911 Ansari Nagar, New Delhi - 110029',NULL,'No',NULL,NULL,'30021091','Antisera and other blood fractions and immunological products, whether or not modified or obtained by means of biotechnological processes','Others','Other Whole Blood',NULL,'Outpatient hospital facility',NULL,'No',NULL,'1000','ML','10',NULL,'No','Others','Other testing Purpose/end use','','No',NULL,NULL,'No','Further analysis','other sample storage testing','12 months','Facility where samples testing',NULL,'No',NULL,'No','No',NULL,'No',NULL,'Other testing Purpose/end use','635-1712645926.pdf',NULL,NULL,NULL,NULL,NULL,'AXTON GLOBAL','test pratima','Other testing Purpose/end use',NULL,NULL,NULL,NULL,NULL,'920-1712645926.pdf','1',NULL,'0','0','2024-04-09 06:58:46','2024-04-09 06:58:46'),(119,'26',NULL,'DRAFT/E/2024/00119','ABWFA0295L','AXTON GLOBALL','Testing','5 SUBHAM BUNGLOW, OPP. BABUL BAUGH PARTY PLOT,,NR. SINDHUBHAVAN, BODAKDEV,,AHMEDABAD,GUJARAT,380054',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,'',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'AXTON GLOBAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1',NULL,'0','0','2024-04-09 11:02:21','2024-04-09 11:02:21'),(120,'26',NULL,'DRAFT/E/2024/00120','ABWFA0295L','AXTON GLOBAL','Testing','5 SUBHAM BUNGLOW, OPP. BABUL BAUGH PARTY PLOT,,NR. SINDHUBHAVAN, BODAKDEV,,AHMEDABAD,GUJARAT,380054','Test1','Yes','919-1712741461.pdf','Raju','Manager','UK',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,'',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'AXTON GLOBAL','Raju',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1',NULL,'0','0','2024-04-10 09:31:01','2024-04-10 09:31:01'),(121,'26',NULL,'DRAFT/E/2024/00121','ABWFA0295L','AXTON GLOBAL','Testing','5 SUBHAM BUNGLOW, OPP. BABUL BAUGH PARTY PLOT,,NR. SINDHUBHAVAN, BODAKDEV,,AHMEDABAD,GUJARAT,380054',NULL,NULL,NULL,'rahul','DEVELOPER','V. Ramalingaswami Bhawan, P.O. Box No. 4911 Ansari Nagar, New Delhi - 110029',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,'',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'AXTON GLOBAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1',NULL,'0','0','2024-04-10 10:01:01','2024-04-10 10:01:01'),(122,'28',NULL,'DRAFT/E/2024/00122','0414040635','NEXT-GEN BIO','PROPRIETOR','NO.4/6 SOORATHAMMAN KOIL STREET,NEW PERUNGALATHUR,KANCHIPURAM,TAMIL NADU,600063',NULL,NULL,NULL,'T.Gnana Ruban','EXECUTIVE','Post Box No 1268,Postal code 111, MUSCAT, OMAN',NULL,'No',NULL,NULL,'30021290','Other','Any Tissue/Cells',NULL,NULL,'Research laboratory',NULL,'No',NULL,'3','ML','3',NULL,'No','Others',NULL,'Others','No',NULL,NULL,'No','Retesting purposes',NULL,'two months','-80 degree academic institution',NULL,'No',NULL,'No','No',NULL,'No',NULL,NULL,'529-1712900322.pdf',NULL,NULL,NULL,NULL,NULL,'NEXT-GEN BIO','T.Gnana Ruban',NULL,NULL,NULL,NULL,NULL,NULL,'884-1712900322.pdf','0',NULL,'0','0','2024-04-12 09:33:08','2024-04-12 09:33:08'),(123,'26',NULL,'DRAFT/E/2024/00123','ABWFA0295L','AXTON GLOBAL','Testing','5 SUBHAM BUNGLOW, OPP. BABUL BAUGH PARTY PLOT,,NR. SINDHUBHAVAN, BODAKDEV,,AHMEDABAD,GUJARAT,380054',NULL,'Yes','595-1713178717.pdf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,'',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'AXTON GLOBAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1',NULL,'0','0','2024-04-15 10:58:37','2024-04-15 10:58:37'),(124,'27',NULL,'DRAFT/E/2024/00124','0991011244','HYDERABAD EYE RESEARCH  FOUNDATION','Clinician','Kallam Anji Reddy Campus,ROAD NO.2,BANJARA HILLS Contact No: 919959113232,HYDERABAD,TELANGANA,500034',NULL,'No',NULL,'Doug D. Chung','Lab Head','Laragen,  10601 Virginia Ave, Culver City, CA 90232  Culver City CA 90232  United States','The analyzed data and unused samples will be shared for further research analysis','Yes','Anthony J. Aldave','The Stein Eye Institute,  Department of Ophthalmology, David Geffen School of Medicine, University of California, Los Angeles  200 Stein Plaza, UCLA  Los Angeles, CA 90095-7003','30029010','Human Blood','Whole blood',NULL,NULL,'Inpatient hospital facility',NULL,'Yes','The subjects were informed sample collection for research purpose.','250','ML','5',NULL,'No','Others','Clinical and genetic testing for research purpose','Genomic studies/Gene Variant/SNP analysis','Yes',NULL,'The blood sample will be subjected for DNA extraction, and leftover blood will be stored in -80 C','Yes','Further analysis','Further analysis will involve detection of disease markers (proteins and cytokine)','2 y','The Stein Eye Institute,   -80 facilities',NULL,'No',NULL,'No','No',NULL,'No',NULL,'Clinical and genetic testing for research purpose','622-1719288134.pdf',NULL,NULL,NULL,NULL,NULL,'HYDERABAD EYE RESEARCH  FOUNDATION',NULL,'Clinical and genetic testing for research purpose',NULL,NULL,NULL,NULL,NULL,'758-1719288134.pdf','0',NULL,'0','0','2024-06-26 08:48:58','2024-06-26 08:48:58'),(125,'32',NULL,'DRAFT/E/2024/00125','0402023471','GLOSEL INDIA IMPEX PRIVATE LIMITED','OperationManager','FIRST FLOOR , AGURCHAND MANSION,NO.150, ANNA SALAI,MOUNT ROAD Contact No: 919566069888,CHENNAI,TAMIL NADU,600002',NULL,'No',NULL,'Dr. Marion Bimmler','Doctor','E.R.D.E.AAK-Diagnostik GmbH Robert-Rossle-Street No.10 House No. 55 Berlin, Buch - 13125',NULL,'No',NULL,NULL,'30029010','Human Blood','Serum',NULL,NULL,'Outpatient hospital facility',NULL,'Yes','For testing Purpose','1','ML','5ML Vial','3 Month once - need to send for  diagnostic testing laboratory purpose .','Yes','Clinical Diagnostics/ Testing',NULL,'','No',NULL,NULL,'No','',NULL,NULL,NULL,NULL,'No',NULL,'No','No',NULL,'No',NULL,'Clinical Diagnostics/ Testing','945-1715167933.pdf',NULL,NULL,NULL,NULL,NULL,'GLOSEL INDIA IMPEX PRIVATE LIMITED',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'262-1715167933.pdf','0',NULL,'0','0','2024-05-08 11:47:28','2024-05-08 11:47:28'),(126,'32',NULL,'DRAFT/E/2024/00126','0402023471','GLOSEL INDIA IMPEX PRIVATE LIMITED','OperationManager','FIRST FLOOR , AGURCHAND MANSION,NO.150, ANNA SALAI,MOUNT ROAD Contact No: 919566069888,CHENNAI,TAMIL NADU,600002',NULL,'No',NULL,'Dr Med.Nina Babel','Doctor','St. Josef Hospital,IFL - Institute for Research and Teaching,AG Babel, Gudrunstrasse 56,House H, 2nd floor, H2.110, Bochum - 44791 Germany.',NULL,'No',NULL,NULL,'30029010','Human Blood','Serum',NULL,NULL,'Outpatient hospital facility',NULL,'Yes','Blood testing purpose','1','ML','5ML Vial','3 Months Once - need to be sent for testing purpose','Yes','Clinical Diagnostics/ Testing',NULL,'','No',NULL,'5 Ml only so no leftover','Yes','Retesting purposes',NULL,'One week','Lab',NULL,'No',NULL,'No','No',NULL,'No',NULL,'Clinical Diagnostics/ Testing','709-1715171249.pdf',NULL,NULL,NULL,NULL,NULL,'GLOSEL INDIA IMPEX PRIVATE LIMITED','Dr Med.Nina Babel','Clinical Diagnostics/ Testing',NULL,NULL,NULL,NULL,NULL,'149-1715171249.pdf','0',NULL,'0','0','2024-05-08 12:29:38','2024-05-08 12:29:38'),(127,'28',NULL,'DRAFT/E/2024/00127','0414040635','NEXT-GEN BIO','PROPRIETOR','NO.4/6 SOORATHAMMAN KOIL STREET,NEW PERUNGALATHUR,KANCHIPURAM,TAMIL NADU,600063',NULL,NULL,NULL,'T.Gnana Ruban','EXECUTIVE','Post Box No 1268,Postal code 111, MUSCAT, OMAN',NULL,'No',NULL,NULL,'30021290','Other','Any Tissue/Cells',NULL,NULL,'Research laboratory',NULL,NULL,NULL,'2','ML','2',NULL,'Yes','Others',NULL,'Others','Yes',NULL,NULL,'No','Further analysis',NULL,'two months','-80 degree academic institution',NULL,'No',NULL,'No','No',NULL,'No',NULL,NULL,'203-1715671389.pdf',NULL,NULL,NULL,NULL,NULL,'NEXT-GEN BIO','T.Gnana Ruban',NULL,NULL,NULL,NULL,NULL,NULL,'405-1715671389.pdf','1',NULL,'0','0','2024-05-14 07:23:09','2024-05-14 07:23:09'),(128,'28',NULL,'DRAFT/E/2024/00128','0414040635','NEXT-GEN BIO','PROPRIETOR','NO.4/6 SOORATHAMMAN KOIL STREET,NEW PERUNGALATHUR,KANCHIPURAM,TAMIL NADU,600063',NULL,'No',NULL,'T.Gnana Ruban','EXECUTIVE','Post Box No 1268,Postal code 111, MUSCAT, OMAN','DR SHERIFF','Yes','Sultan Qaboos University','Muscat, Oman','30021290','Other','Any Tissue/Cells','ATCC CELL CULTURE COMERCIALLY AVAILABLE',NULL,'Research laboratory',NULL,'Yes','yes details attached for cell culture purpose only','2','ML','2','against order only','Yes','Others',NULL,'Others','Yes','for cell culture purpose only',NULL,'No','Further analysis','for cell culture purpose only','two months','-80 degree academic institution',NULL,'No',NULL,'No','No',NULL,'No',NULL,NULL,'346-1716354764.pdf',NULL,NULL,NULL,NULL,NULL,'NEXT-GEN BIO',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'239-1716354764.pdf','0',NULL,'0','0','2024-05-22 05:15:38','2024-05-22 05:15:38'),(129,'26',NULL,'DRAFT/E/2024/00129',NULL,'AXTON GLOBAL','Testing','5 SUBHAM BUNGLOW, OPP. BABUL BAUGH PARTY PLOT,,NR. SINDHUBHAVAN, BODAKDEV,,AHMEDABAD,GUJARAT,380054',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,'',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'AXTON GLOBAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1',NULL,'0','0','2024-06-06 05:36:15','2024-06-06 05:36:15'),(130,'26',NULL,'DRAFT/E/2024/00130','ABWFA0295L','AXTON GLOBAL','Testing','5 SUBHAM BUNGLOW, OPP. BABUL BAUGH PARTY PLOT,,NR. SINDHUBHAVAN, BODAKDEV,,AHMEDABAD,GUJARAT,380054',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,'',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'AXTON GLOBAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1',NULL,'0','0','2024-06-10 04:12:23','2024-06-10 04:12:23'),(131,'42',NULL,'DRAFT/E/2024/00131','AAICG1934A','GADAG CLINICAL DATA (OPC) PRIVATE LIMITED','Director','Plot No 301/B, Kumar Poomappa Pawar, Nagavi, Gadag,,GADAG,KARNATAKA,582101',NULL,'No',NULL,NULL,NULL,NULL,NULL,'No',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Research laboratory',NULL,NULL,NULL,NULL,'ML',NULL,NULL,NULL,'',NULL,'',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'GADAG CLINICAL DATA (OPC) PRIVATE LIMITED',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1',NULL,'0','0','2024-06-25 08:51:20','2024-06-25 08:51:20'),(132,'39','10.197.254.22','DRAFT/E/2024/00132','1234567890','TEST DGFT IEC','TEST','GATE NO 3, UDYOG BHAWAN,11-RAFI MARG Contact No: 9911229509,DELHI,DELHI,110011','test','Yes','675-1720073933.pdf','Disuza','Developer','USA','test','Yes','Disuza','USA','30021220','For tetanus','Serum',NULL,NULL,'Others','test','Yes','test','23','ML','1','test','Yes','Others','test','Others','Yes','test','test','Yes','Further analysis','test','12 Months','Storage',NULL,'No',NULL,'No','No',NULL,'No',NULL,'test','144-1720073933.pdf',NULL,NULL,NULL,NULL,NULL,'TEST DGFT IEC','Disuza','test',NULL,NULL,NULL,NULL,NULL,'529-1720073933.pdf','1',NULL,'0','0','2024-07-04 00:48:53','2024-07-04 00:48:53');
/*!40000 ALTER TABLE `exportersdrafts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `home_banners`
--

DROP TABLE IF EXISTS `home_banners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `home_banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(211) DEFAULT NULL,
  `slug` varchar(211) DEFAULT NULL,
  `banner_link` varchar(211) DEFAULT NULL,
  `image` varchar(211) DEFAULT NULL,
  `desc` varchar(211) DEFAULT NULL,
  `status` varchar(211) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `home_banners`
--

LOCK TABLES `home_banners` WRITE;
/*!40000 ALTER TABLE `home_banners` DISABLE KEYS */;
INSERT INTO `home_banners` VALUES (7,'hacked by sixenn45','ffjsjw',NULL,'1718359549.png','j','1','2024-05-03 15:12:57','2024-06-21 17:47:03');
/*!40000 ALTER TABLE `home_banners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hs_code_items`
--

DROP TABLE IF EXISTS `hs_code_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hs_code_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `hs_code` varchar(255) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `import_policy` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hs_code_items`
--

LOCK TABLES `hs_code_items` WRITE;
/*!40000 ALTER TABLE `hs_code_items` DISABLE KEYS */;
INSERT INTO `hs_code_items` VALUES (1,'30021020','Antisera and other blood fractions and immunological products, whether or not modified or obtained by means of biotechnological processes',NULL,'1','2023-12-20 04:32:51','2023-12-20 04:32:51'),(2,'30021091','Antisera and other blood fractions and immunological products, whether or not modified or obtained by means of biotechnological processes',NULL,'1','2023-12-20 04:32:51','2023-12-20 04:32:51'),(3,'30021210','For diphtheria',NULL,'1','2023-12-20 04:32:51','2023-12-20 04:32:51'),(4,'30021220','For tetanus',NULL,'1','2023-12-20 04:32:51','2023-12-20 04:32:51'),(5,'30021230','For rabies',NULL,'1','2023-12-20 04:32:51','2023-12-20 04:32:51'),(6,'30021240','For snake venom',NULL,'1','2023-12-20 04:32:51','2023-12-20 04:32:51'),(7,'30021290','Other',NULL,'1','2024-03-13 05:24:47','2024-03-13 05:24:47'),(8,'30029010','Human Blood',NULL,'1','2024-03-13 05:24:47','2024-03-13 05:24:47');
/*!40000 ALTER TABLE `hs_code_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `human_samples`
--

DROP TABLE IF EXISTS `human_samples`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `human_samples` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `send_ifc_number` varchar(255) DEFAULT NULL,
  `send_name_design_applicant` varchar(255) DEFAULT NULL,
  `send_add_company_institute` varchar(255) DEFAULT NULL,
  `comp_intitute_denied_export_auth_last_3_years` varchar(255) DEFAULT NULL,
  `receive_name_desgn_recipient` varchar(255) DEFAULT NULL,
  `receive_add_company_institute` varchar(255) DEFAULT NULL,
  `end_user_receiv_party` varchar(255) DEFAULT NULL,
  `name_and_add_end_user` varchar(255) DEFAULT NULL,
  `hs_code_item_exported` varchar(255) DEFAULT NULL,
  `natural_biomateria_exported` varchar(255) DEFAULT NULL,
  `sample_collected` varchar(255) DEFAULT NULL,
  `sampes_being_exported` varchar(255) DEFAULT NULL,
  `exported_number` varchar(255) DEFAULT NULL,
  `exported_volume` varchar(255) DEFAULT NULL,
  `repeat_sampes_envisaged` varchar(255) DEFAULT NULL,
  `specify_purpose_end_use` varchar(255) DEFAULT NULL,
  `sampes_used_research_analysis` varchar(255) DEFAULT NULL,
  `puspose_sample_store` varchar(255) DEFAULT NULL,
  `duration_sample_store` varchar(255) DEFAULT NULL,
  `facility_sample_store` varchar(255) DEFAULT NULL,
  `biomaterial_micro_organisms_approval` varchar(255) DEFAULT NULL,
  `ibsc_rcgm_approval_applicable` varchar(255) DEFAULT NULL,
  `sender_certify_information_provided` varchar(255) DEFAULT NULL,
  `sender_signature` varchar(255) DEFAULT NULL,
  `sender_name` varchar(255) DEFAULT NULL,
  `sender_designation` varchar(255) DEFAULT NULL,
  `sender_address` varchar(255) DEFAULT NULL,
  `sender_date` timestamp NULL DEFAULT NULL,
  `recipient_certify_applicant_and_company` varchar(255) DEFAULT NULL,
  `recipient_granted_permission_to_export` varchar(255) DEFAULT NULL,
  `recipient_number_and_description` varchar(255) DEFAULT NULL,
  `recipient_name_and_Company` varchar(255) DEFAULT NULL,
  `recipient_country_destination` varchar(255) DEFAULT NULL,
  `recipient_signature` varchar(255) DEFAULT NULL,
  `recipient_name` varchar(255) DEFAULT NULL,
  `recipient_designation` varchar(255) DEFAULT NULL,
  `recipient_address` varchar(255) DEFAULT NULL,
  `recipient_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `human_samples`
--

LOCK TABLES `human_samples` WRITE;
/*!40000 ALTER TABLE `human_samples` DISABLE KEYS */;
/*!40000 ALTER TABLE `human_samples` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imp_exp_user`
--

DROP TABLE IF EXISTS `imp_exp_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `imp_exp_user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `roll` varchar(211) DEFAULT NULL,
  `iec_code` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `address2` varchar(211) DEFAULT NULL,
  `city` varchar(211) DEFAULT NULL,
  `states` varchar(211) DEFAULT NULL,
  `pincode` varchar(211) DEFAULT NULL,
  `address` longtext NOT NULL,
  `email` varchar(255) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `department` varchar(211) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email_otp` int(11) DEFAULT NULL,
  `email_otp_used` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `imp_exp_user_iec_code_unique` (`iec_code`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imp_exp_user`
--

LOCK TABLES `imp_exp_user` WRITE;
/*!40000 ALTER TABLE `imp_exp_user` DISABLE KEYS */;
INSERT INTO `imp_exp_user` VALUES (2,'icmr',NULL,'Dr. Mohan',NULL,NULL,NULL,NULL,'New Delhi','web.aloksingh8190@gmail.com','53Qv7XpHVG1gRNGd74hGA0AZDbeFHjFvkxwgdyNbWiPsUiMRfJxVVQWdG0cmWtRP','7479874986','Sr Consultant','ICMR','1','10.23.25.5','e3e1511325e2a33bc3bde999c521927213111c5b4f2c0d61aa7de54ab9ae3a95',934532,0,'2024-07-11 09:33:12','2024-07-11 09:33:12'),(3,'comm',NULL,'Dr. Reena Roy',NULL,NULL,NULL,NULL,'Mumbai','aashish.comm@yopmail.com','IPv9WhLTnmlv4HcZ8yPw5DkzC7mam3CImZla7cApU5nQgH99JvqXCSvZIgwLFWPV','7479874986','Scientist -C','DHR','1','10.23.25.5','e3e1511325e2a33bc3bde999c521927213111c5b4f2c0d61aa7de54ab9ae3a95',382439,1,'2024-07-11 09:22:20','2024-07-11 09:22:20'),(4,'comm',NULL,'Dr. Mathur',NULL,NULL,NULL,NULL,'New Delhi','alok.comm2@yopmail.com','SLOQRUYAcr9dO0Jt78yqQ2yTRySIfyBIpeGEJDsnEqcmO5xIWB7ahFxMqI3XJiIN','8882165414','Sr. Scientist -C','ICMR','1','10.23.25.5','$2y$10$knqdAgJ2FlGDLOUu2MkGuOuxs5WeBewL6pwJaOIERQQ9.2t8qRXs.',NULL,NULL,'2024-07-08 11:44:35','2024-07-08 06:16:35'),(5,'comm',NULL,'Dr. Lokesh Kumar Narnoliya',NULL,NULL,NULL,NULL,'','lokesh.narnoliya@dbt.nic.in',NULL,'011-24363012','Scientist D  ','DBT','1','','$2y$10$07pFTribEGaYK6eLw5FPd.z.l8BEE7324TB65OuzbWJFntHWJJU.6',NULL,NULL,'2024-03-13 05:29:37','2024-03-13 05:29:37'),(6,'comm',NULL,'Ms. Pratibha Kumari',NULL,NULL,NULL,NULL,'','pratibha.kumari@nic.in',NULL,'9818831179','Deputy Director General of Foreign Trade','DGFT','1','','$2y$10$07pFTribEGaYK6eLw5FPd.z.l8BEE7324TB65OuzbWJFntHWJJU.6',NULL,NULL,'2024-03-13 05:29:37','2024-03-13 05:29:37'),(7,'comm',NULL,'Dr Rubina Bose',NULL,NULL,NULL,NULL,'','bose.rubina@yahoo.com',NULL,'8447054771','Deputy Drugs Controller(India), CDSCO','DCGI/CDSCO','1','','$2y$10$07pFTribEGaYK6eLw5FPd.z.l8BEE7324TB65OuzbWJFntHWJJU.6',NULL,NULL,'2024-03-13 05:32:43','2024-03-13 05:32:43'),(8,'comm',NULL,'Shri Om Prakash Meena',NULL,NULL,NULL,NULL,'','om.p.meena4@gov.in',NULL,'9953810573','Assistant Director','MHA','1','','$2y$10$07pFTribEGaYK6eLw5FPd.z.l8BEE7324TB65OuzbWJFntHWJJU.6',NULL,NULL,'2024-03-13 05:32:43','2024-03-13 05:32:43'),(9,'comm',NULL,'Shri Subhro Chakraborty',NULL,NULL,NULL,NULL,'','subhro.chakra77@gov.in',NULL,'9968915803','ACIO','MHA','1','','$2y$10$07pFTribEGaYK6eLw5FPd.z.l8BEE7324TB65OuzbWJFntHWJJU.6',NULL,NULL,'2024-03-13 05:35:05','2024-03-13 05:35:05'),(10,'comm',NULL,'R Ananth',NULL,NULL,NULL,NULL,'','dircus@nic.in',NULL,'9873554773','DS(CUSTOMS)','Customs','1','','$2y$10$07pFTribEGaYK6eLw5FPd.z.l8BEE7324TB65OuzbWJFntHWJJU.6',NULL,NULL,'2024-03-13 05:35:05','2024-03-13 05:35:05'),(11,'comm',NULL,'Dr Shikha Vardan',NULL,NULL,NULL,NULL,'','shikha.vardhan@gov.in',NULL,'8285405075','ADG(IH)','DGHS','1','','$2y$10$07pFTribEGaYK6eLw5FPd.z.l8BEE7324TB65OuzbWJFntHWJJU.6',NULL,NULL,'2024-03-13 05:37:06','2024-03-13 05:37:06'),(17,'imp-exp','0311000096','J.A. UNITED EXPORTS PRIVATE LIMITED','CENTER SEC-19 VASHI TURBHE ROAD','VASHI','MAHARASHTRA','400705','B 506 507, CITY MALL, MAYURESH TRADE','jaexports@gmail.com',NULL,'9920421685','Director','Monthu Rosario','1','10.23.25.5','$2y$10$87gmn2LGv5byNKzd00Zb1OEM1/MULjLLZLosdaK8Zzls5ptABwYFu',NULL,NULL,'2024-03-14 00:23:34','2024-03-14 00:25:09'),(18,'icmr',NULL,'Dr Remma Roshan',NULL,NULL,NULL,NULL,'Ansari Nagar New Delhi','thbm.hq@icmr.gov.in','BxomloP6NCOndtf7nA8b9D3u47qQ19BadgPdOSiRKNDw0KTY7YWv9cqlsLa9m9ZO','9910944549','Scientists-C','ISD','1','10.23.25.5','e3e1511325e2a33bc3bde999c521927213111c5b4f2c0d61aa7de54ab9ae3a95',608050,0,'2024-07-10 10:49:43','2024-07-10 10:49:43'),(19,'nic','null','Shri Shubendu Kumar',NULL,NULL,NULL,NULL,'CGO Complex, New Delhi','hq.health@nic.in',NULL,'9810727757','Scientist-G','Health','1','null','$2y$10$0.36G0d8O0jUZfbHHuDlS.ig1GoqQqp24J8tW4cSrQtlvcs8yqTMy',NULL,NULL,'2024-03-18 10:55:38','2024-03-18 10:55:38'),(20,'imp-exp','0709015992','MS CLINICAL RESEARCH PRIVATE LIMITED','Cambridge Layout Ulsoor','Bangalore','KARNATAKA','560008','327/15, 1st Main Road','aahan.sachdev@msclinical.com',NULL,'9880755883','Director','Aahan Sachdev','1','10.23.25.5','$2y$10$ToixHjpaxov/Er2gy.jCje1hejetGjWO6AE2dfQxEsjRcwMvQOdwC',NULL,NULL,'2024-03-20 08:57:12','2024-03-20 08:58:08'),(21,'comm',NULL,'Dr. Nitin K Jain',NULL,NULL,NULL,NULL,'','nitink.jain@nic.in',NULL,'7827574690','Scientist G','DBT','','','$2y$10$07pFTribEGaYK6eLw5FPd.z.l8BEE7324TB65OuzbWJFntHWJJU.6',NULL,NULL,'2024-03-21 02:49:24','2024-03-21 02:49:24'),(23,'icmr',NULL,'Dr Ajeet Kumar Mohanty',NULL,NULL,NULL,NULL,'ICMR-NIMR, Field  Unit, Goa','ajeet.mohanty.nimr@gov.in',NULL,'9823679337','Asst. Research Scientist','Ministry of health and family welfare','1','10.23.25.5',NULL,NULL,NULL,'2024-03-25 23:52:30','2024-03-25 23:52:30'),(25,'imp-exp','0915000938','SAPIEN BIOSCIENCES PRIVATE LIMITED','AHERF BLDG, APOLLO HOSPITALS, JUBILEE HILLS','HYDERABAD,','TELANGANA','500096','8-2-293/82/J-III/DH/900, 1ST FLOOR,','kazam@sapienbio.com',NULL,'8520042772','Manager','MohammedKazamuddin','1','10.23.25.5','$2y$10$fBkuYUaBnvQzcm03CkC.sOplEaMEKmGBHHlrw1WPEi4yWXtUOJere',NULL,NULL,'2024-04-08 01:17:06','2024-04-08 01:19:24'),(26,'imp-exp','ABWFA0295L','AXTON GLOBAL','NR. SINDHUBHAVAN, BODAKDEV,','AHMEDABAD','GUJARAT','380054','5 SUBHAM BUNGLOW, OPP. BABUL BAUGH PARTY PLOT,','pratimaicmr@gmail.com',NULL,'9898976375','Testing','PratimaTesting','1','10.23.25.5','$2y$10$nPmAY9UOkdMUZjGkMO6ma.JZtK.VpnfJY/VcCg55lowPPpNfGHy2O',NULL,NULL,'2024-04-09 06:42:19','2024-04-09 06:43:19'),(27,'imp-exp','0991011244','HYDERABAD EYE RESEARCH  FOUNDATION','ROAD NO.2,BANJARA HILLS Contact No: 919959113232','HYDERABAD','TELANGANA','500034','Kallam Anji Reddy Campus','muralidhar@lvpei.org',NULL,'8008616868','Clinician','MuralidharRamappa','1','10.23.25.5','$2y$10$nPmAY9UOkdMUZjGkMO6ma.JZtK.VpnfJY/VcCg55lowPPpNfGHy2O',NULL,NULL,'2024-04-10 03:18:31','2024-04-15 09:15:25'),(28,'imp-exp','0414040635','NEXT-GEN BIO','NEW PERUNGALATHUR','KANCHIPURAM','TAMIL NADU','600063','NO.4/6 SOORATHAMMAN KOIL STREET','info@nextgenbio.co.in',NULL,'9500004598','PROPRIETOR','BHARATHKUMAR','1','10.23.25.5','$2y$10$d6HZuI.v9ZSWSop8tlTofOyHDgMb7cRI0wxFAMsSG5NBFKG7i7PkC',NULL,NULL,'2024-04-11 08:45:12','2024-04-11 10:21:15'),(29,'imp-exp','0200015443','OSTER CHEMICAL & PHARMACEUTICAL WORKS PVT LTD',NULL,'KOLKATA','WEST BENGAL','700006','124/4A, MANICKTOLA STREET,','parveenb@nic.in',NULL,'9433161735','TD','ParveenBhardwaj','1','10.23.25.5',NULL,NULL,NULL,'2024-04-12 07:04:13','2024-04-12 07:04:13'),(30,'imp-exp','0202009378','AURUM PHARMACHEM PRIVATE LIMITED','2ND FLOOR','KOLKATA','WEST BENGAL','700012','11, B.B.GANGULY  STREET,','parveen3383@gmail.com',NULL,'9831025709','TD','ParveenBhardwaj','1','10.23.25.5','$2y$10$jK/hJOzHQt41uYh3Ur1vdusiiZXg3WyTxqdHEeSaqCi2cMyFtN27m',NULL,NULL,'2024-04-12 07:10:34','2024-04-12 07:12:20'),(31,'icmr',NULL,'GANESH CHANDRA SAHOO',NULL,NULL,NULL,NULL,'ICMR-RMRI, Agam kuan,Patna 800007','ganeshiitkgp@gmail.com',NULL,'6201404787','Scientist E','Virology','1','10.23.25.5','$2y$10$5yZcjgrWI5pjOSf7Aqpk3uDQxc/KIzY0434JeCQWhGwTIobxdr9ye',NULL,NULL,'2024-04-21 10:46:29','2024-04-21 10:53:10'),(32,'imp-exp','0402023471','GLOSEL INDIA IMPEX PRIVATE LIMITED','NO.150, ANNA SALAI,MOUNT ROAD Contact No: 919566069888','CHENNAI','TAMIL NADU','600002','FIRST FLOOR , AGURCHAND MANSION','sengamalam.g@glosel.com',NULL,'9381865725','OperationManager','Sengamalam','1','10.23.25.5','$2y$10$uW7yHsgfL5pJMlT/YUdLc.znpUUyFAiifnQQivBsiZWPMSv6/jLk2',NULL,NULL,'2024-05-08 09:55:00','2024-05-08 09:58:54'),(33,'imp-exp','LCCPS6769M','TRAX DIAGNOSTICS AND RESEARCH LABORATORY',NULL,'CHENNAI','TAMIL NADU','600037','NO. 1052-A, 6TH MAIN ROAD ERI SCHEME, MOGAPPAIR','isfaq@vatskamedtech.com',NULL,'7010702294','MR','ISFAQASIF','1','10.23.25.5','$2y$10$0HVP3q.3JTW/k9ESs.RAr.BZCpVIr55HD3Eh7dMqB9CaH1pj11Fzu',NULL,NULL,'2024-05-08 11:57:45','2024-05-08 12:13:00'),(34,'imp-exp','AAYCS0381B','NEUBERG DIAGNOSTICS PRIVATE LIMITED','Rajiv Gandhi Salai, Old MahabaliPuram Road,','CHENNAI','TAMIL NADU','600096','Plot No 7, Industrial Estate','vikrant.neware@ncgmglobal.com',NULL,'9003038233','Vice President','Vikrant Neware','1','10.23.25.5','$2y$10$0jMuBd2slElJT7eDvs4yqOwNmTO1YMPFfnIk6NlzASs0iYP/88pmS',NULL,NULL,'2024-05-27 10:05:35','2024-05-27 10:06:24'),(35,'imp-exp','0516988816','QASCENT RESEARCH SOLUTIONS PRIVATE LIMITED','NEAR DURGAPURI CHOWK, SHAHDRA, NEW DELHI','DELHI','DELHI','110032','B-103, STREET NO-4, JYOTI COLONY','subhash@qascentresearch.com',NULL,'9540038430','Director','SubhashSugathan','1','10.23.25.5','$2y$10$CJKbf2mvdTkcoOYqxUMfn.pjKw.jJn5k.apu6rxtJYRa4pYjsBNga',NULL,NULL,'2024-05-29 06:56:58','2024-05-29 06:59:18'),(36,'imp-exp','AAICB6387J','BIOSPECIMEN SOLUTIONS PRIVATE LIMITED','Dr Shivaram Karanth Nagar','Bangalore','KARNATAKA','560077','No.899/2, 1st Floor, MCECHS Layout','info@biospecimensolutions.in',NULL,'9986958631','Executive Director','Sai Krishna M V','1','10.23.25.5','$2y$10$B4SIoixtu5RCgCkwYxE16OPdB6anPM63KMzOZJ4ZzigB04uEa9KNi',NULL,NULL,'2024-05-31 06:20:06','2024-06-21 12:46:01'),(37,'imp-exp','AACCZ2805P','ZIOLA RESEARCH PRIVATE LIMITED','Dr. SRK Nagar Post, Sreerampur, Bangalore','Bangalore','KARNATAKA','560077','No.950, MCECHS Layout, 80 Feet Double Road','info@ziolaresearch.com',NULL,'7993035079','CEO','MVRAMYA','1','10.23.25.5','$2y$10$m4lE9uZPk6IRWZ4d.AucpO1wjtqZksH23QPkWvJ1BehQPg4nvCwry',NULL,NULL,'2024-05-31 06:44:02','2024-06-21 13:07:40'),(38,'imp-exp','AAICR8954R','RUDANI ENTERPRISES PRIVATE LIMITED','TAPOVAN ROAD, DWARKA Contact No: 919890266903','OPP PODAR SCHOOL NASHIK','MAHARASHTRA','422011','SHOP NO. 04 PRABHU SHILP APARTMENT','admin@gmail.com',NULL,'9890266903','tester','testertesting','1','10.23.25.5',NULL,NULL,NULL,'2024-06-06 05:11:16','2024-06-06 05:11:16'),(39,'imp-exp','1234567890','TEST DGFT IEC','11-RAFI MARG Contact No: 9911229509','DELHI','DELHI','110011','GATE NO 3, UDYOG BHAWAN','aashish.iec@yopmail.com','hClN47xZRstapMgXmtSWv8soy4RCRz8TUuY19ouYbCPghBmrhXp5yKxuQprMYZ6l','9953931136','TEST','Tes','1','10.23.25.5','e3e1511325e2a33bc3bde999c521927213111c5b4f2c0d61aa7de54ab9ae3a95',638745,0,'2024-07-11 10:14:32','2024-07-11 10:14:32'),(40,'imp-exp','AAICG8845L','GENEAURA PRIVATE LIMITED',NULL,'CHENNAI','TAMIL NADU','600040','4TH STREET,THENDRAL COLONY','care@geneaura.com',NULL,'8072361738','Director','Janani','1','10.23.25.5','$2y$10$hAjWdu83vPw9FNzeUmJfMuZ9PunT4P9c2i2KLTls4MxOPK24Q2rzG',NULL,NULL,'2024-06-15 08:45:47','2024-06-15 08:47:15'),(41,'imp-exp','AANCR1787P','RETRO BIOTECH AND RESEARCH PRIVATE LIMITED',', KAILASH PURI, JAGATPURA','Jaipur','RAJASTHAN','302017','FLAT NO T-I, PLOT NO 50','aditya@retrobiotech.in',NULL,'9887036285','Dierctor','Aditya','1','10.23.25.5','$2y$10$pgcikJcOfnCtzIXv1.cuFuRds5YgBgkSqyuJdGnuf24y/P3O33MOy',NULL,NULL,'2024-06-20 06:27:15','2024-06-20 06:45:23'),(42,'imp-exp','AAICG1934A','GADAG CLINICAL DATA (OPC) PRIVATE LIMITED',NULL,'GADAG','KARNATAKA','582101','Plot No 301/B, Kumar Poomappa Pawar, Nagavi, Gadag','kumar.pawar@elk.health',NULL,'9011144067','Director','KumarPawar','1','10.23.25.5','$2y$10$sM9sKb7EPnWfltqzA/BeVOi3kbM7Kng.QXT8.ui1u8aiY2JdzAqny',NULL,NULL,'2024-06-25 08:10:03','2024-06-25 08:35:16'),(43,'imp-exp','3212010240','ACME PROGEN BIOTECH (INDIA) PRIVATE LIMITED','BALAJI NAGAR, ADVAIDA ASHRAM ROAD, Contact No: 04272448884','SALEM / TAMIL NADU','TAMIL NADU','636016','NO.260 G, RAM SQUARE, 2ND FLOOR,','acmeprogen@gmail.com',NULL,'9791773344','Director','CHITRA','1','10.23.25.5','$2y$10$CGX9XkqnhE/XibjLUTV9BO9TFJZsozOtqpKrkWhZ/jzSYsiCJFkbm',NULL,NULL,'2024-06-26 05:59:03','2024-06-26 06:03:25');
/*!40000 ALTER TABLE `imp_exp_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imp_noc_issueds`
--

DROP TABLE IF EXISTS `imp_noc_issueds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `imp_noc_issueds` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `imp_id` int(10) NOT NULL,
  `noc_number` varchar(255) DEFAULT NULL,
  `iec_code` varchar(255) DEFAULT NULL,
  `application_number` varchar(255) DEFAULT NULL,
  `name_of_applicant` varchar(255) DEFAULT NULL,
  `address_company` varchar(255) DEFAULT NULL,
  `dsc_e_sing` varchar(255) DEFAULT NULL,
  `qr_code` varchar(255) DEFAULT NULL,
  `unit_number` varchar(211) DEFAULT NULL,
  `unit_quan` varchar(211) DEFAULT NULL,
  `name_of_sender` varchar(211) DEFAULT NULL,
  `company_name` varchar(211) DEFAULT NULL,
  `purpose_of` varchar(211) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `imp_ide` (`imp_id`),
  CONSTRAINT `imp_ide` FOREIGN KEY (`imp_id`) REFERENCES `import` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imp_noc_issueds`
--

LOCK TABLES `imp_noc_issueds` WRITE;
/*!40000 ALTER TABLE `imp_noc_issueds` DISABLE KEYS */;
/*!40000 ALTER TABLE `imp_noc_issueds` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `import`
--

DROP TABLE IF EXISTS `import`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `import` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `userid` varchar(211) DEFAULT NULL,
  `ip_address` varchar(211) DEFAULT NULL,
  `application_number` varchar(255) DEFAULT NULL,
  `iec_number` varchar(255) DEFAULT NULL,
  `name_of_applicant` varchar(255) DEFAULT NULL,
  `name_of_designation` varchar(255) DEFAULT NULL,
  `address_company` varchar(255) DEFAULT NULL,
  `company_denied_import` varchar(255) DEFAULT NULL,
  `denied_import_upload` varchar(255) DEFAULT NULL,
  `name_of_sender` varchar(255) DEFAULT NULL,
  `designation_of_sender` varchar(255) DEFAULT NULL,
  `address_of_company` varchar(255) DEFAULT NULL,
  `hs_code` varchar(255) DEFAULT NULL,
  `nature_biomaterial` varchar(255) DEFAULT NULL,
  `Quantity_import_num` varchar(255) DEFAULT NULL,
  `Quantity_import_vol` varchar(255) DEFAULT NULL,
  `repeat_import` varchar(255) DEFAULT NULL,
  `purpose_end_use` varchar(255) DEFAULT NULL,
  `biosafety_infectious` varchar(255) DEFAULT NULL,
  `biosafety_infectious_description` text DEFAULT NULL,
  `biosafety_materials` varchar(255) DEFAULT NULL,
  `biosafety_materials_description` text DEFAULT NULL,
  `biosafety_vectors` varchar(255) DEFAULT NULL,
  `biosafety_vectors_description` text DEFAULT NULL,
  `biosafety_nucleic` varchar(255) DEFAULT NULL,
  `biosafety_nucleic_description` text DEFAULT NULL,
  `biosafety_concerns` varchar(255) DEFAULT NULL,
  `biological_material` varchar(255) DEFAULT NULL,
  `purpose_of` varchar(255) DEFAULT NULL,
  `purpose_of_one` varchar(255) DEFAULT NULL,
  `signature` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `dates` varchar(255) DEFAULT NULL,
  `icmr_off_status` varchar(211) NOT NULL DEFAULT '0',
  `icmr_noc_status` varchar(211) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `import`
--

LOCK TABLES `import` WRITE;
/*!40000 ALTER TABLE `import` DISABLE KEYS */;
INSERT INTO `import` VALUES (19,'1',NULL,'ICMR/IMPORT/2024/951673','AAICR8954R','RUDANI ENTERPRISES PRIVATE LIMITED','Manager','new ashok nagar',',gjfgj',NULL,'rahul','developer','USA','30012030',',','12',NULL,',ghkgkh','Clinical Diagnostics/Testing,','yes','jlhjl',NULL,'jhlhjl','yes','hjlhjl','yes','jhlhjl',NULL,'1708390879.pdf','Clinical Diagnostics/Testing','Clinical Diagnostics/Testing',NULL,'RUDANI ENTERPRISES PRIVATE LIMITED','Manager','New Delhi','20-02-2024','0','0','2024-02-20 09:01:19','2024-02-20 09:01:19'),(22,'1',NULL,'ICMR/IMPORT/2024/951677','AAICR8954R','RUDANI ENTERPRISES PRIVATE LIMITED','Manager','new ashok nagar',',gjfgj',NULL,'rahul','developer','USA','30012030',',','12',NULL,',ghkgkh','Clinical Diagnostics/Testing,','yes','jlhjl',NULL,'jhlhjl','yes','hjlhjl','yes','jhlhjl',NULL,'1708390879.pdf','Clinical Diagnostics/Testing','Clinical Diagnostics/Testing',NULL,'RUDANI ENTERPRISES PRIVATE LIMITED','Manager','New Delhi','20-02-2024','1','1','2024-02-20 09:01:19','2024-02-20 09:01:19');
/*!40000 ALTER TABLE `import` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2023_10_06_051213_create_human_samples_table',1),(6,'2023_10_10_043724_create_exporters_table',1),(7,'2023_10_12_172455_create_import_table',1),(8,'2023_11_29_062110_create_imp_exp_user_table',1),(9,'2023_12_01_055556_create_states_table',1),(10,'2023_12_01_055729_create_districts_table',1),(11,'2023_12_01_063015_create_pincodes_table',1),(12,'2023_12_04_092717_create__role_table',1),(13,'2023_12_20_095421_create__hs_code_table',2),(14,'2023_12_20_095422_create_hs_code_table',3),(15,'2023_12_22_043622_create_noc_issueds_table',4),(16,'2023_12_22_043623_create_noc_issueds_table',5),(17,'2023_12_26_042701_create_imp_noc_issueds_table',6),(18,'2023_12_26_042738_create_exp_noc_issueds_table',7);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nature_of_biomaterial_options`
--

DROP TABLE IF EXISTS `nature_of_biomaterial_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nature_of_biomaterial_options` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `status` int(50) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nature_of_biomaterial_options`
--

LOCK TABLES `nature_of_biomaterial_options` WRITE;
/*!40000 ALTER TABLE `nature_of_biomaterial_options` DISABLE KEYS */;
INSERT INTO `nature_of_biomaterial_options` VALUES (1,'Whole blood','Whole blood',1,'2024-02-28 10:59:17','2024-02-28 10:59:17'),(2,'Buffy coat','Buffy coat',1,'2024-02-28 10:59:17','2024-02-28 10:59:17'),(3,'Serum','Serum',1,'2024-02-28 11:00:54','2024-02-28 11:00:54'),(4,'Plasma','Plasma',1,'2024-02-28 11:02:13','2024-02-28 11:02:13'),(5,'Urine','Urine',1,'2024-02-28 11:02:32','2024-02-28 11:02:32'),(7,'Nucleic acid(Extracted DNA)','Nucleic acid(Extracted DNA)',1,'2024-02-28 11:04:32','2024-02-28 11:04:32'),(8,'Nucleic acid(Extracted RNA)','Nucleic acid(Extracted RNA)',1,'2024-02-28 11:04:32','2024-02-28 11:04:32'),(9,'Any Tissue/Cells','Any Tissue/Cells',1,'2024-02-28 11:05:46','2024-02-28 11:05:46'),(10,'Other body fluids','Other body fluids',1,'2024-02-28 11:05:46','2024-02-28 11:05:46'),(11,'Others','Others',1,'2024-03-27 11:28:56','2024-03-27 11:28:56');
/*!40000 ALTER TABLE `nature_of_biomaterial_options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `noc_issued`
--

DROP TABLE IF EXISTS `noc_issued`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `noc_issued` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `noc_number` varchar(255) DEFAULT NULL,
  `iec_code` varchar(255) DEFAULT NULL,
  `name_of_applicant` varchar(255) DEFAULT NULL,
  `address_company` varchar(255) DEFAULT NULL,
  `application_number` varchar(255) DEFAULT NULL,
  `imp_exp_id` varchar(255) DEFAULT NULL,
  `dsc_e_sing` varchar(255) DEFAULT NULL,
  `qr_code` varchar(255) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `noc_issued`
--

LOCK TABLES `noc_issued` WRITE;
/*!40000 ALTER TABLE `noc_issued` DISABLE KEYS */;
/*!40000 ALTER TABLE `noc_issued` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pincodes`
--

DROP TABLE IF EXISTS `pincodes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pincodes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pincode` varchar(255) NOT NULL,
  `district_name` varchar(255) NOT NULL,
  `state_name` varchar(255) NOT NULL,
  `district_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pincodes`
--

LOCK TABLES `pincodes` WRITE;
/*!40000 ALTER TABLE `pincodes` DISABLE KEYS */;
/*!40000 ALTER TABLE `pincodes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purpose_of_end_use_options`
--

DROP TABLE IF EXISTS `purpose_of_end_use_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purpose_of_end_use_options` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `status` int(50) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purpose_of_end_use_options`
--

LOCK TABLES `purpose_of_end_use_options` WRITE;
/*!40000 ALTER TABLE `purpose_of_end_use_options` DISABLE KEYS */;
INSERT INTO `purpose_of_end_use_options` VALUES (1,'Calibration/ Quality assurance','Calibration/ Quality assurance',1,'2024-02-28 11:36:07','2024-02-28 11:36:07'),(2,'Clinical Diagnostics/ Testing','Clinical Diagnostics/ Testing',1,'2024-02-28 11:36:07','2024-02-28 11:36:07'),(3,'Others','Others',1,'2024-02-28 11:40:46','2024-02-28 11:40:46');
/*!40000 ALTER TABLE `purpose_of_end_use_options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purpose_of_sample_storage_options`
--

DROP TABLE IF EXISTS `purpose_of_sample_storage_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purpose_of_sample_storage_options` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `status` int(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purpose_of_sample_storage_options`
--

LOCK TABLES `purpose_of_sample_storage_options` WRITE;
/*!40000 ALTER TABLE `purpose_of_sample_storage_options` DISABLE KEYS */;
INSERT INTO `purpose_of_sample_storage_options` VALUES (1,'Retesting purposes','Retesting purposes',1,'2024-02-28 11:43:31','2024-02-28 11:43:31'),(2,'Further analysis(please specify genetic analysis or any other analysis)','Further analysis',1,'2024-02-28 11:43:31','2024-02-28 11:43:31');
/*!40000 ALTER TABLE `purpose_of_sample_storage_options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'SuperAdmin',1,'2023-12-04 04:27:48','2023-12-04 04:27:48'),(2,'Icmr',1,'2023-12-04 04:27:48','2023-12-04 04:27:48'),(3,'ImporterExporter',1,'2023-12-04 04:27:48','2023-12-04 04:27:48'),(4,'ApprovalsCommitteeOfficer',1,'2023-12-04 04:27:48','2023-12-04 04:27:48');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `samples_exported_volume_options`
--

DROP TABLE IF EXISTS `samples_exported_volume_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `samples_exported_volume_options` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `status` int(50) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `samples_exported_volume_options`
--

LOCK TABLES `samples_exported_volume_options` WRITE;
/*!40000 ALTER TABLE `samples_exported_volume_options` DISABLE KEYS */;
INSERT INTO `samples_exported_volume_options` VALUES (1,'ML','ML',1,'2024-02-28 11:32:34','2024-02-28 11:32:34'),(2,'L','L',1,'2024-02-28 11:32:34','2024-02-28 11:32:34'),(3,'μL','μL',1,'2024-03-08 12:36:15','2024-03-08 12:36:15');
/*!40000 ALTER TABLE `samples_exported_volume_options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `states` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `state_name` varchar(255) NOT NULL,
  `state_abb` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `states`
--

LOCK TABLES `states` WRITE;
/*!40000 ALTER TABLE `states` DISABLE KEYS */;
/*!40000 ALTER TABLE `states` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `role_id` bigint(20) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Super Admin','superadmin123',NULL,'admin@gmail.com','2024-02-15 20:42:20','$2y$10$fyhu6ePgzRxGSFF5D.tJdOQjOzVv9NKUlst6J0uwz.NE6gPCKMKNm',NULL,'2024-02-15 20:42:20','2024-02-15 20:42:20');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `weather_sample_used_research_analysis_options`
--

DROP TABLE IF EXISTS `weather_sample_used_research_analysis_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `weather_sample_used_research_analysis_options` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `weather_sample_used_research_analysis_options`
--

LOCK TABLES `weather_sample_used_research_analysis_options` WRITE;
/*!40000 ALTER TABLE `weather_sample_used_research_analysis_options` DISABLE KEYS */;
INSERT INTO `weather_sample_used_research_analysis_options` VALUES (1,'Genomic studies/Gene Variant/SNP analysis','Genomic studies/Gene Variant/SNP analysis',1,'2024-02-28 11:56:50','2024-02-28 11:56:50'),(2,'Transcriptomics Studies','Transcriptomics Studies',1,'2024-02-28 11:56:50','2024-02-28 11:56:50'),(3,'Proteomic Studies','Proteomic Studies',1,'2024-02-28 12:00:48','2024-02-28 12:00:48'),(4,'Metabolomic Studies','Metabolomic Studies',1,'2024-02-28 12:00:48','2024-02-28 12:00:48'),(5,'Others','Others',1,'2024-02-28 12:01:56','2024-02-28 12:01:56');
/*!40000 ALTER TABLE `weather_sample_used_research_analysis_options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `where_the_samples_collected_options`
--

DROP TABLE IF EXISTS `where_the_samples_collected_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `where_the_samples_collected_options` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `status` int(50) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `where_the_samples_collected_options`
--

LOCK TABLES `where_the_samples_collected_options` WRITE;
/*!40000 ALTER TABLE `where_the_samples_collected_options` DISABLE KEYS */;
INSERT INTO `where_the_samples_collected_options` VALUES (1,'Inpatient hospital facility','Inpatient hospital facility',1,'2024-02-28 11:12:59','2024-02-28 11:12:59'),(2,'Outpatient hospital facility','Outpatient hospital facility',1,'2024-02-28 11:12:59','2024-02-28 11:12:59'),(3,'Clinical/ Diagnostic laboratory','Clinical/ Diagnostic laboratory',1,'2024-02-28 11:14:24','2024-02-28 11:14:24'),(4,'Research laboratory','Research laboratory',1,'2024-02-28 11:14:24','2024-02-28 11:14:24'),(5,'Others','Others',1,'2024-02-28 11:16:07','2024-02-28 11:16:07');
/*!40000 ALTER TABLE `where_the_samples_collected_options` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-07-12 12:31:30
