/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.21-MariaDB : Database - softui
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`softui` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `softui`;

/*Table structure for table `courses` */

DROP TABLE IF EXISTS `courses`;

CREATE TABLE `courses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `specialization_id` int(10) unsigned NOT NULL,
  `en` varchar(50) CHARACTER SET ascii DEFAULT NULL,
  `fr` varchar(50) DEFAULT NULL,
  `ar` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `spec_id` (`specialization_id`),
  CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`specialization_id`) REFERENCES `specializations` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

/*Data for the table `courses` */

insert  into `courses`(`id`,`specialization_id`,`en`,`fr`,`ar`,`created_at`,`updated_at`) values 
(1,1,'mechanical engineering','Sciences et Technologie','علوم و تكنولوجيا','2021-11-24 21:08:44','2021-11-26 17:38:02'),
(2,1,'course 02','Sciences de la matière','علوم المادة','2021-11-24 21:08:46','2021-11-26 13:33:11'),
(3,1,'course 03','Mathematiques et informatique','رياضيات و إعلام آلي','2021-11-24 21:08:48','2021-11-26 13:33:14'),
(4,4,'course 04','Sciences de la nature et de la vie','علوم الطبيعة و الحياة','2021-11-24 21:08:50','2021-11-26 13:33:19'),
(5,5,'course 05','Sciences de la Terre et de l\'Univers','علوم الأرض و الكون','2021-11-24 21:08:52','2021-11-26 13:33:21'),
(6,6,'course 06','Sciences Economiques, de Gestion et Comerciales','علوم إقتصادية, تسيير و علوم تجارية','2021-11-24 21:08:54','2021-11-26 13:33:23'),
(7,7,'course 07','Droit et Sciences Politiques','حقوق و علوم سياسية','2021-11-24 21:08:57','2021-11-26 13:33:25'),
(8,8,'course 08','Lettres et Langues Etrangeres','آداب و لغات أجنبية','2021-11-24 21:08:59','2021-11-26 13:33:29'),
(9,9,'course 09','Sciences Humaines et Sociales','علوم إنسانية و إجتماعية','2021-11-24 21:09:06','2021-11-26 13:33:34'),
(10,10,'course 10','Sciences et Techniques des Activités Physiques et ','علوم و تقنيات النشاطات البدنية و الرياضية','2021-11-24 21:09:08','2021-11-26 13:33:36'),
(11,11,'course 11','Arts','فنون','2021-11-24 21:09:10','2021-11-26 13:33:39'),
(12,12,'course 12','Langue et littératures Arabes','لغة و أدب عربي','2021-11-24 21:09:11','2021-11-26 13:33:41'),
(13,13,'course 13','Langue et Culture Amazighes','لغة و ثقافة امازيغية','2021-11-24 21:09:15','2021-11-26 13:33:43'),
(14,14,'course 14','Architecture, Urbanisme et Métiers de la Ville','هندسة معمارية, عمران و مهن المدينة','2021-11-24 21:09:17','2021-11-26 13:33:46');

/*Table structure for table `faculties` */

DROP TABLE IF EXISTS `faculties`;

CREATE TABLE `faculties` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `training_id` int(10) unsigned NOT NULL,
  `en` varchar(50) CHARACTER SET ascii DEFAULT NULL,
  `fr` varchar(50) DEFAULT NULL,
  `ar` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `training_id` (`training_id`),
  CONSTRAINT `faculties_ibfk_1` FOREIGN KEY (`training_id`) REFERENCES `trainings` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

/*Data for the table `faculties` */

insert  into `faculties`(`id`,`training_id`,`en`,`fr`,`ar`,`created_at`,`updated_at`) values 
(1,1,'Facs 01','Sciences et Technologie','علوم و تكنولوجيا','2021-11-24 21:08:44','2021-11-26 11:47:29'),
(2,1,'Facs 02','Sciences de la matière','علوم المادة','2021-11-24 21:08:46','2021-11-26 11:47:29'),
(3,1,'Facs 03','Mathematiques et informatique','رياضيات و إعلام آلي','2021-11-24 21:08:48','2021-11-26 11:47:29'),
(4,4,'Facs 04','Sciences de la nature et de la vie','علوم الطبيعة و الحياة','2021-11-24 21:08:50','2021-11-26 11:47:33'),
(5,5,'Facs 05','Sciences de la Terre et de l\'Univers','علوم الأرض و الكون','2021-11-24 21:08:52','2021-11-26 11:47:33'),
(6,6,'Facs 06','Sciences Economiques, de Gestion et Comerciales','علوم إقتصادية, تسيير و علوم تجارية','2021-11-24 21:08:54','2021-11-26 11:47:33'),
(7,7,'Facs 07','Droit et Sciences Politiques','حقوق و علوم سياسية','2021-11-24 21:08:57','2021-11-26 11:47:34'),
(8,8,'Facs 08','Lettres et Langues Etrangeres','آداب و لغات أجنبية','2021-11-24 21:08:59','2021-11-26 11:47:34'),
(9,9,'Facs 09','Sciences Humaines et Sociales','علوم إنسانية و إجتماعية','2021-11-24 21:09:06','2021-11-26 11:47:35'),
(10,10,'Facs 10','Sciences et Techniques des Activités Physiques et ','علوم و تقنيات النشاطات البدنية و الرياضية','2021-11-24 21:09:08','2021-11-26 11:47:36'),
(11,11,'Facs 11','Arts','فنون','2021-11-24 21:09:10','2021-11-26 11:47:37'),
(12,12,'Facs 12','Langue et littératures Arabes','لغة و أدب عربي','2021-11-24 21:09:11','2021-11-26 11:47:37'),
(13,13,'Facs 13','Langue et Culture Amazighes','لغة و ثقافة امازيغية','2021-11-24 21:09:15','2021-11-26 11:47:38'),
(14,14,'Facs 14','Architecture, Urbanisme et Métiers de la Ville','هندسة معمارية, عمران و مهن المدينة','2021-11-24 21:09:17','2021-11-26 11:47:39');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `levels` */

DROP TABLE IF EXISTS `levels`;

CREATE TABLE `levels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `symbol` varchar(10) CHARACTER SET ascii NOT NULL,
  `en` varchar(50) CHARACTER SET ascii DEFAULT NULL,
  `fr` varchar(50) DEFAULT NULL,
  `ar` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `training_sym` (`symbol`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

/*Data for the table `levels` */

insert  into `levels`(`id`,`symbol`,`en`,`fr`,`ar`,`created_at`,`updated_at`) values 
(1,'L1','L1','','','2021-11-24 21:08:44','2021-11-26 12:16:47'),
(2,'L2','L2','','','2021-11-24 21:08:46','2021-11-26 12:16:47'),
(3,'L3','L3','','','2021-11-24 21:08:48','2021-11-26 12:16:47'),
(4,'M1','M1','','','2021-11-24 21:08:50','2021-11-26 12:16:46'),
(5,'M2','M2','','','2021-11-24 21:08:52','2021-11-26 12:16:46');

/*Table structure for table `material_languages` */

DROP TABLE IF EXISTS `material_languages`;

CREATE TABLE `material_languages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `course_id` int(10) unsigned NOT NULL,
  `language` enum('en','fr','ar') DEFAULT NULL,
  `created_by` int(10) unsigned NOT NULL,
  `updated_by` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `material_languages` */

insert  into `material_languages`(`id`,`course_id`,`language`,`created_by`,`updated_by`,`title`,`description`,`created_at`,`updated_at`) values 
(1,1,'en',1,1,'wwwwwwwww','wwwwwwwwwwwww','2021-11-27 05:18:30','2021-11-27 05:18:30');

/*Table structure for table `materials` */

DROP TABLE IF EXISTS `materials`;

CREATE TABLE `materials` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `specialization_id` int(10) unsigned NOT NULL,
  `level` varchar(10) CHARACTER SET ascii NOT NULL,
  `faculty_id` int(10) unsigned DEFAULT NULL,
  `training_id` int(10) unsigned DEFAULT NULL,
  `created_by` int(10) unsigned NOT NULL,
  `updated_by` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `filename` varchar(100) DEFAULT NULL,
  `filepath` varchar(255) CHARACTER SET ascii NOT NULL,
  `filetype` tinyint(4) NOT NULL DEFAULT 0,
  `filesize` int(11) NOT NULL DEFAULT 0,
  `cate_course` tinyint(3) unsigned NOT NULL DEFAULT 0,
  `cate_exercise` tinyint(3) unsigned NOT NULL DEFAULT 0,
  `cate_exam` tinyint(3) unsigned NOT NULL,
  `protected` varchar(255) CHARACTER SET ascii DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `specialization_id` (`specialization_id`),
  KEY `level_id` (`level`),
  CONSTRAINT `materials_ibfk_1` FOREIGN KEY (`specialization_id`) REFERENCES `specializations` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `materials` */

insert  into `materials`(`id`,`specialization_id`,`level`,`faculty_id`,`training_id`,`created_by`,`updated_by`,`title`,`description`,`filename`,`filepath`,`filetype`,`filesize`,`cate_course`,`cate_exercise`,`cate_exam`,`protected`,`created_at`,`updated_at`) values 
(1,1,'L1',1,1,1,1,'wwwwwwwww','wwwwwwwwwwwww','ArNlgka3keQAanfU7LiBEyjqoXx7nCYcWsN1yYv6.zip','1/courses/ArNlgka3keQAanfU7LiBEyjqoXx7nCYcWsN1yYv6.zip',3,27459,1,1,1,NULL,'2021-11-27 05:18:30','2021-11-27 05:18:30');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1);

/*Table structure for table `option` */

DROP TABLE IF EXISTS `option`;

CREATE TABLE `option` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `option` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `value` longtext COLLATE utf8_persian_ci DEFAULT NULL,
  `mode` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

/*Data for the table `option` */

insert  into `option`(`id`,`option`,`value`,`mode`) values 
(5,'site_email','mail@prodevelopers.eu',''),
(6,'site_title','Proacademy',''),
(7,'blog_comment','0',NULL),
(8,'blog_post_count','6',NULL),
(10,'main_page_popular_container','1',NULL),
(11,'category_content_count','12',NULL),
(12,'main_page_newest_container','1',NULL),
(13,'category_most_sell_container','1',NULL),
(15,'main_page_blog_post_count','2',NULL),
(16,'video_watermark','/bin/admin/mobile%20app%20icon/business%20(4).png',NULL),
(17,'content_terms','<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>',NULL),
(18,'chart_day_count','15',NULL),
(20,'site_income','50',NULL),
(21,'user_register_mode','deactive',NULL),
(22,'user_register_active_email','11',NULL),
(23,'user_register_wellcome_email','12',NULL),
(24,'site_withdraw_price','25000',NULL),
(25,'factor_watermark','/bin/admin/images/logo/logo-small.png',NULL),
(26,'factor_seconder','John',NULL),
(27,'factor_approver','Albert',NULL),
(28,'site_disable','0',NULL),
(29,'site_popup','0',NULL),
(30,'popup_image',NULL,NULL),
(31,'popup_url','/jhghj',NULL),
(32,'main_page_slider_content','17,18,19,20',NULL),
(33,'multiselect','22',NULL),
(34,'main_page_slider_timer','9000',NULL),
(35,'footer_col1_title','About Proacademy',NULL),
(36,'footer_col1_content','<p style=\"text-align:left\">Pro Academy is very professional learning & teaching platform. You can simply upload your courses & learn from professional educators online. Pro Academy has many built-in features that can resolve all your needs.<br></p>',NULL),
(37,'footer_col2_title','Links',NULL),
(38,'footer_col2_content','<ul><li style=\"text-align: justify;\">About Us</li><li style=\"text-align: justify;\">Contact Us</li><li style=\"text-align: justify;\">Terms &amp; Rules</li><li style=\"text-align: justify;\">FAQ</li><li style=\"text-align: justify;\">Knowledgebase</li><li style=\"text-align: justify;\">Vendors Panel</li><li style=\"text-align: justify;\">Start Learning</li></ul>',NULL),
(39,'footer_col3_title','Payment Gateways',NULL),
(40,'footer_col3_content','<p style=\"text-align: left;\"><img src=\"data:image/png;base64,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\" data-filename=\"paypal.png\" style=\"width: 128px;\"><br></p>',NULL),
(41,'footer_col4_title','Guaranty',NULL),
(42,'footer_col4_content','<p><img src=\"data:image/png;base64,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\" data-filename=\"shield (1).png\" style=\"width: 128px;\"><br></p>',NULL),
(43,'site_logo','/bin/admin/images/logo/main-logo.png',NULL),
(44,'site_logo_type','/bin/admin/images/logo/logotype.png',NULL),
(45,'request_page_icon','/bin/admin/request icon/programming.jpg',NULL),
(46,'request_term','<p>Before send your request, read term and rules.</p><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.<br></p>',NULL),
(47,'site_videoads','0',NULL),
(48,'site_videoads_source','https://www.youtube.com/watch?v=F4dxophs_o0',NULL),
(49,'site_videoads_poster','/bin/admin/files/cmsdef/preroll-ads-cover.jpg',NULL),
(50,'site_videoads_url','',NULL),
(51,'site_videoads_time','7',NULL),
(52,'seller_not_apply','Dear user, your financial & identity information not verified. It can cause a delay in the payout process.',NULL),
(53,'notification_template_change_group','7',NULL),
(54,'notification_template_get_medal','8',NULL),
(55,'notification_template_delete_medal','26',NULL),
(56,'notification_template_content_pre_publish','10',NULL),
(57,'notification_template_content_publish','11',NULL),
(58,'notification_template_content_change','11',NULL),
(59,'notification_template_content_delete','13',NULL),
(60,'notification_template_content_comment_new','14',NULL),
(61,'notification_template_content_support_new','24',NULL),
(62,'notification_template_request_get','16',NULL),
(63,'notification_template_request_publish','17',NULL),
(64,'notification_template_request_draft','18',NULL),
(65,'notification_template_request_req','19',NULL),
(66,'notification_template_request_follow','20',NULL),
(67,'notification_template_ticket_new','21',NULL),
(68,'notification_template_ticket_reply','22',NULL),
(69,'notification_template_withdraw_new','7',NULL),
(70,'notification_template_withdraw_pay','24',NULL),
(71,'notification_template_buy_new','25',NULL),
(72,'notification_template_sell_new','26',NULL),
(73,'notification_template_feedback_new','27',NULL),
(74,'notification_template_buy_post_withdraw','27',NULL),
(75,'article_post_count','6',NULL),
(76,'main_page_article_post_count','4',NULL),
(77,'main_page_slide','/bin/admin/files/cover(10).jpg',NULL),
(78,'upload_page_background','/bin/admin/files/cmsdef/upload.jpg',NULL),
(79,'main_js',NULL,NULL),
(80,'main_css','The CSS code goes here...',NULL),
(81,'login_page_background','/bin/admin/files/cmsdef/login.jpg',NULL),
(82,'pages_content_delete','<p><br></p>',NULL),
(83,'pages_terms','<p dir=\"RTL\">Terms &amp; rules goes here</p><p dir=\"RTL\"><br></p><ul>\r\n</ul>',NULL),
(84,'pages_contact','<p style=\"text-align:justify\"><br></p>\r\n\r\n<p><span style=\"font-size:18px\"><img alt=\"\" src=\"https://www.shareicon.net/data/32x32/2016/09/10/828132_gps_400x512.png\" style=\"height:16px; width:16px\">&nbsp;Address goes here</span></p>\r\n\r\n<p><span style=\"font-size:18px\"><img alt=\"\" src=\"https://www.shareicon.net/data/32x32/2016/02/05/714409_phone_512x512.png\" style=\"height:18px; width:18px\">&nbsp;+1-283 526236</span></p>\r\n\r\n<p><span style=\"font-size:18px\"><img alt=\"\" src=\"https://www.shareicon.net/data/32x32/2015/12/30/695303_email_512x512.png\" style=\"height:18px; width:18px\">&nbsp;sales@proacademy.eu</span></p>\r\n\r\n<p dir=\"ltr\" style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p dir=\"ltr\" style=\"text-align:justify\">&nbsp;</p>',NULL),
(85,'pages_about','<p><span style=\"text-align: center;\">Pro Academy is a very professional learning &amp; teaching platform. You can simply upload your courses &amp; learn from professional educators online. Pro Academy has many built-in features that can resolve all your needs.</span></p><div><span style=\"text-align: center;\"><br></span></div>',NULL),
(86,'pages_help','<p>Help and tips go here.<br></p>',NULL),
(87,'pages_content_update','<p><br></p>',NULL),
(88,'site_income_private','30',NULL),
(89,'main_page_slide_title','Professional Learning & Teaching Platform',NULL),
(90,'main_page_slide_text','Proacademy is very professional learning & teaching platform. You can simply upload your courses & learn from professional educators online. Proacademy has many built-in features that can resolve all your needs.',NULL),
(91,'main_page_slide_btn_1_text','Start Learnings',NULL),
(92,'main_page_slide_btn_2_text','Start Teachings',NULL),
(93,'main_page_slide_btn_1_url','category?order=new',NULL),
(94,'main_page_slide_btn_2_url','/user/content/new',NULL),
(95,'main_page_vip_container','1',NULL),
(96,'default_avatar','/bin/admin/files/10179153.jpg',NULL),
(97,'default_user_avatar','/bin/admin/files/boy.svg',NULL),
(98,'default_user_cover','/bin/admin/files/ctest4.jpg',NULL),
(99,'default_chanel_icon','/bin/admin/files/cmsdef/default-channel.svg',NULL),
(100,'default_chanel_cover','/bin/admin/files/ctest4.jpg',NULL),
(101,'user_register_rest_email',NULL,NULL),
(102,'user_register_new_password_email','14',NULL),
(103,'user_register_reset_email','13',NULL),
(104,'triangle-banner-top-image',NULL,NULL),
(105,'triangle-banner-top-url',NULL,NULL),
(106,'triangle-banner-bottom-image',NULL,NULL),
(107,'triangle-banner-bottom-url','#test',NULL),
(108,'banner-html-box',NULL,NULL),
(109,'email_notification_template','15',NULL),
(110,'currency','IDR',NULL),
(111,'site_rtl','0',NULL),
(112,'site_videoads_title','test',NULL),
(113,'site_videoads_roll_type','preRoll',NULL),
(114,'site_description','The description goes here...',NULL),
(115,'gateway_paypal','1',NULL),
(116,'gateway_paytm','1',NULL),
(117,'gateway_payu','1',NULL),
(118,'site_preloader','0',NULL),
(119,'default_customer_dashboard_cover','/bin/admin/panel%20banner.png',NULL),
(120,'site_language','tr',NULL),
(121,'become_vendor','0',NULL),
(122,'gateway_paystack','1',NULL),
(123,'duplicate_login','0',NULL),
(124,'_token','yKndAex2OwbIkoN7qjNLyUNR9xNL8dirHldxgoaC',NULL),
(125,'files',NULL,NULL),
(126,'gateway_razorpay','1',NULL),
(127,'site_language_select','[\"tr\"]',NULL),
(128,'user_register_captcha','0',NULL),
(129,'site_fav','/bin/admin/images/logo/favicon.png',NULL),
(130,'main_live_class','1',NULL),
(131,'gateway_cinetpay','0',NULL),
(132,'gateway_stripe','1',NULL),
(133,'plasma_middle_feature_live_class_count','12',NULL),
(134,'plasma_middle_feature_video_courses_count','25',NULL),
(135,'plasma_middle_feature_instructor_count','18',NULL),
(136,'plasma_middle_feature_student_count','290',NULL),
(137,'plasma_middle_feature_enable','1',NULL),
(138,'testimonials_enable','1','normal'),
(139,'testimonials_items','[{\"text\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\",\"avatar\":\"\\/bin\\/admin\\/vannary.jpg\",\"name\":\"Addy Morphy\"},{\"text\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\",\"avatar\":\"\\/bin\\/admin\\/vannary.jpg\",\"name\":\"Addy Morphy\"},{\"text\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\",\"avatar\":\"\\/bin\\/admin\\/vannary.jpg\",\"name\":\"Addy Morphy\"},{\"text\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\",\"avatar\":\"\\/bin\\/admin\\/vannary.jpg\",\"name\":\"Addy Morphy\"}]','normal'),
(140,'option','testimonials_items',NULL),
(141,'plasma_live_class_text','Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tempora delectus, dolorum odit ipsam cum ratione eveniet blanditiis sed impedit nemo veniam, architecto fuga temporibus, suscipit officia similique repellat eligendi consectetur.',NULL),
(142,'plasma_live_class_enable','1',NULL),
(143,'site_meta_description',NULL,NULL),
(144,'meta_keyword',NULL,NULL);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `settings` */

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(40) CHARACTER SET ascii NOT NULL,
  `value` varchar(200) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `settings` */

insert  into `settings`(`id`,`key`,`value`,`description`,`created_at`,`updated_at`) values 
(1,'lang','en','current interface language : en/fr/ar\r\n','2021-11-24 21:22:32','2021-11-24 21:23:07');

/*Table structure for table `specializations` */

DROP TABLE IF EXISTS `specializations`;

CREATE TABLE `specializations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `faculty_id` int(10) unsigned NOT NULL,
  `en` varchar(50) CHARACTER SET ascii DEFAULT NULL,
  `fr` varchar(50) DEFAULT NULL,
  `ar` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `training_id` (`faculty_id`),
  CONSTRAINT `specializations_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

/*Data for the table `specializations` */

insert  into `specializations`(`id`,`faculty_id`,`en`,`fr`,`ar`,`created_at`,`updated_at`) values 
(1,1,'energetic mechanical engineering','Sciences et Technologie','علوم و تكنولوجيا','2021-11-24 21:08:44','2021-11-26 17:39:31'),
(2,1,'Specialization 02','Sciences de la matière','علوم المادة','2021-11-24 21:08:46','2021-11-26 12:06:34'),
(3,1,'Specialization 03','Mathematiques et informatique','رياضيات و إعلام آلي','2021-11-24 21:08:48','2021-11-26 12:06:37'),
(4,4,'Specialization 04','Sciences de la nature et de la vie','علوم الطبيعة و الحياة','2021-11-24 21:08:50','2021-11-26 12:06:40'),
(5,5,'Specialization 05','Sciences de la Terre et de l\'Univers','علوم الأرض و الكون','2021-11-24 21:08:52','2021-11-26 12:06:42'),
(6,6,'Specialization 06','Sciences Economiques, de Gestion et Comerciales','علوم إقتصادية, تسيير و علوم تجارية','2021-11-24 21:08:54','2021-11-26 12:06:44'),
(7,7,'Specialization 07','Droit et Sciences Politiques','حقوق و علوم سياسية','2021-11-24 21:08:57','2021-11-26 12:06:46'),
(8,8,'Specialization 08','Lettres et Langues Etrangeres','آداب و لغات أجنبية','2021-11-24 21:08:59','2021-11-26 12:06:48'),
(9,9,'Specialization 09','Sciences Humaines et Sociales','علوم إنسانية و إجتماعية','2021-11-24 21:09:06','2021-11-26 12:06:49'),
(10,10,'Specialization 10','Sciences et Techniques des Activités Physiques et ','علوم و تقنيات النشاطات البدنية و الرياضية','2021-11-24 21:09:08','2021-11-26 12:06:51'),
(11,11,'Specialization 11','Arts','فنون','2021-11-24 21:09:10','2021-11-26 12:06:53'),
(12,12,'Specialization 12','Langue et littératures Arabes','لغة و أدب عربي','2021-11-24 21:09:11','2021-11-26 12:06:55'),
(13,13,'Specialization 13','Langue et Culture Amazighes','لغة و ثقافة امازيغية','2021-11-24 21:09:15','2021-11-26 12:06:57'),
(14,14,'Facs 14','Architecture, Urbanisme et Métiers de la Ville','هندسة معمارية, عمران و مهن المدينة','2021-11-24 21:09:17','2021-11-26 11:47:39');

/*Table structure for table `trainings` */

DROP TABLE IF EXISTS `trainings`;

CREATE TABLE `trainings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `symbol` varchar(10) CHARACTER SET ascii NOT NULL,
  `en` varchar(50) CHARACTER SET ascii DEFAULT NULL,
  `fr` varchar(50) DEFAULT NULL,
  `ar` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `training_sym` (`symbol`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

/*Data for the table `trainings` */

insert  into `trainings`(`id`,`symbol`,`en`,`fr`,`ar`,`created_at`,`updated_at`) values 
(1,'D01','Sciences and Technology','Sciences et Technologie','علوم و تكنولوجيا','2021-11-24 21:08:44','2021-11-24 21:10:38'),
(2,'D02','Science of matter','Sciences de la matière','علوم المادة','2021-11-24 21:08:46','2021-11-24 21:17:31'),
(3,'D03','Mathematics and Computer Science','Mathematiques et informatique','رياضيات و إعلام آلي','2021-11-24 21:08:48','2021-11-24 21:17:42'),
(4,'D04','Nature and life sciences','Sciences de la nature et de la vie','علوم الطبيعة و الحياة','2021-11-24 21:08:50','2021-11-24 21:17:50'),
(5,'D05','Earth and Universe Sciences','Sciences de la Terre et de l\'Univers','علوم الأرض و الكون','2021-11-24 21:08:52','2021-11-24 21:17:57'),
(6,'D06','Economics, Management and Commercial Sciences','Sciences Economiques, de Gestion et Comerciales','علوم إقتصادية, تسيير و علوم تجارية','2021-11-24 21:08:54','2021-11-24 21:18:06'),
(7,'D07','Law and Political Sciences','Droit et Sciences Politiques','حقوق و علوم سياسية','2021-11-24 21:08:57','2021-11-24 21:14:48'),
(8,'D08','Letters and Foreign Languages','Lettres et Langues Etrangeres','آداب و لغات أجنبية','2021-11-24 21:08:59','2021-11-24 21:18:18'),
(9,'D09','Humanities and Social Sciences','Sciences Humaines et Sociales','علوم إنسانية و إجتماعية','2021-11-24 21:09:06','2021-11-24 21:18:29'),
(10,'D10','Sciences and Techniques of Physical and Sports Act','Sciences et Techniques des Activités Physiques et ','علوم و تقنيات النشاطات البدنية و الرياضية','2021-11-24 21:09:08','2021-11-24 21:18:50'),
(11,'D11','Arts','Arts','فنون','2021-11-24 21:09:10','2021-11-24 21:19:02'),
(12,'D12','Arabic language and literature','Langue et littératures Arabes','لغة و أدب عربي','2021-11-24 21:09:11','2021-11-24 21:19:22'),
(13,'D13','Amazigh Language and Culture','Langue et Culture Amazighes','لغة و ثقافة امازيغية','2021-11-24 21:09:15','2021-11-24 21:19:30'),
(14,'D14','Architecture, Urbanism and City Trades','Architecture, Urbanisme et Métiers de la Ville','هندسة معمارية, عمران و مهن المدينة','2021-11-24 21:09:17','2021-11-24 21:19:36');

/*Table structure for table `translates` */

DROP TABLE IF EXISTS `translates`;

CREATE TABLE `translates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'general',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=150 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `translates` */

insert  into `translates`(`id`,`lang`,`key`,`value`,`collection`,`created_at`,`updated_at`) values 
(1,'en','Mailbox Small Title','Test the Spammyness of your Emails','general',NULL,'2021-09-14 05:25:59'),
(2,'en','Mailbox Description','Forget about spam, advertising mailings, hacking and attacking robots. Keep your real mailbox clean and secure. Mails Tester provides temporary, secure, anonymous, free, disposable email address.','general',NULL,'2021-09-14 05:25:59'),
(3,'en','Refresh','Refresh','general',NULL,'2021-09-14 05:25:59'),
(4,'en','Change','Change','general',NULL,'2021-09-14 05:25:59'),
(5,'en','Delete','Delete','general',NULL,'2021-09-14 05:25:59'),
(6,'en','Sender','Sender','general',NULL,'2021-09-14 05:25:59'),
(7,'en','Subject','Subject','general',NULL,'2021-09-14 05:25:59'),
(8,'en','View','View','general',NULL,'2021-09-14 05:25:59'),
(9,'en','Your inbox is empty','Your inbox is empty','general',NULL,'2021-09-14 05:25:59'),
(10,'en','Waiting for incoming emails','Waiting for incoming emails','general',NULL,'2021-09-14 05:25:59'),
(11,'en','Awesome Features','Awesome Features','general',NULL,'2021-09-14 05:25:59'),
(12,'en','Features Description','Disposable temporary email protects your real email address from spam, advertising mailings, malwares.','general',NULL,'2021-09-14 05:25:59'),
(13,'en','Popular Posts','Popular Posts','general',NULL,'2021-09-14 05:25:59'),
(14,'en','Back To List','Back To List','general',NULL,'2021-09-14 05:25:59'),
(15,'en','Attachments','Attachments','general',NULL,'2021-09-14 05:25:59'),
(16,'en','Copyright','Copyright ©2021 - MailsTester','general',NULL,'2021-09-14 05:25:59'),
(17,'en','Blog','Blog','general',NULL,'2021-09-14 05:25:59'),
(18,'en','Categories','Categories','general',NULL,'2021-09-14 05:26:00'),
(19,'en','Leave a Reply','Leave a Reply','general',NULL,'2021-09-14 05:26:00'),
(20,'en','Change E-mail Address','Change E-mail Address','general',NULL,'2021-09-14 05:26:00'),
(21,'en','Change Description','<b>Mails Tester</b> provides the ability to change your temporary email address on this page. <br> <br> To change or recover the email address, please enter the desired E-mail address and choose domain.','general',NULL,'2021-09-14 05:26:00'),
(22,'en','Contact Us','Contact Us','general',NULL,'2021-09-14 05:26:00'),
(23,'en','Contact Description','We’re here to help and answer any question you might have. <br> We look forward to hearing from you ?','general',NULL,'2021-09-14 05:26:00'),
(24,'en','Emails Created','Emails Created','general',NULL,'2021-09-14 05:26:00'),
(25,'en','Messages Received','Messages Received','general',NULL,'2021-09-14 05:26:00'),
(26,'en','Cookie Message','Your experience on this site will be improved by allowing cookies.','general',NULL,'2021-09-14 05:26:00'),
(27,'en','Cookie Button','Allow cookies','general',NULL,'2021-09-14 05:26:00'),
(29,'en','Change Email','Change Email','general','2021-09-14 06:33:28','2021-09-14 06:34:44'),
(30,'en','INBOX','INBOX','general','2021-09-17 01:41:58','2021-09-17 01:41:58'),
(31,'en','We will add a contact from as soon as possible','We will add a contact from as soon as possible','general','2021-09-17 01:42:47','2021-09-17 01:42:47'),
(32,'en','Enter Your Mail!','Enter Your Mail!','general','2021-09-17 01:43:09','2021-09-17 01:43:09'),
(33,'en','Published in','Published in','general','2021-09-17 01:44:40','2021-09-17 01:44:40'),
(34,'en','Date','Date','general','2021-09-17 01:45:57','2021-09-17 01:45:57'),
(35,'en','The address you have chosen is already in use. Please choose a different one.','The address you have chosen is already in use. Please choose a different one.','general','2021-09-17 01:51:41','2021-09-17 01:51:41'),
(36,'en','Your Name','Your Name','general','2021-09-17 01:57:24','2021-09-17 01:57:24'),
(37,'en','Your Email','Your Email','general','2021-09-17 01:57:24','2021-09-17 01:57:24'),
(38,'en','Your Phone','Your Phone','general','2021-09-17 01:57:24','2021-09-17 01:57:24'),
(39,'en','Your Message','Your Message','general','2021-09-17 01:57:24','2021-09-17 01:57:24'),
(40,'en','Send Message','Send Message','general','2021-09-17 01:57:24','2021-09-17 01:57:24'),
(41,'en','We have received your message and would like to thank you for writing to us.','We have received your message and would like to thank you for writing to us.','general','2021-09-17 01:57:56','2021-09-17 01:57:56'),
(42,'en','Not Found','Not Found','general','2021-09-17 02:24:13','2021-09-17 02:24:13'),
(43,'en','Page Not Found','Page Not Found','general','2021-09-17 02:24:13','2021-09-17 02:24:13'),
(44,'en','We are sorry but the page you are looking for was not found','We are sorry but the page you are looking for was not found','general','2021-09-17 02:24:13','2021-09-17 02:24:13'),
(45,'en','Back to Home','Back to Home','general','2021-09-17 02:24:13','2021-09-17 02:24:13'),
(46,'en','Unauthorised','Unauthorised','general','2021-09-17 02:24:38','2021-09-17 02:24:38'),
(47,'en','Forbidden','Forbidden','general','2021-09-17 02:24:50','2021-09-17 02:24:50'),
(48,'en','Method Not Allowed','Method Not Allowed','general','2021-09-17 02:25:00','2021-09-17 02:25:00'),
(49,'en','Something is broken. Please let us know what you were doing when this error occurred. We will fix it as soon as possible. Sorry for any inconvenience caused.','Something is broken. Please let us know what you were doing when this error occurred. We will fix it as soon as possible. Sorry for any inconvenience caused.','general','2021-09-17 02:25:00','2021-09-17 02:25:00'),
(50,'en','Page Expired','Page Expired','general','2021-09-17 02:25:11','2021-09-17 02:25:11'),
(51,'en','Too Many Requests','Too Many Requests','general','2021-09-17 02:25:16','2021-09-17 02:25:16'),
(52,'en','Internal Server Error','Internal Server Error','general','2021-09-17 02:25:25','2021-09-17 02:25:25'),
(53,'en','Oops… You just found an error page','Oops… You just found an error page','general','2021-09-17 02:25:25','2021-09-17 02:25:25'),
(54,'en','We are sorry but our server encountered an internal error','We are sorry but our server encountered an internal error','general','2021-09-17 02:25:25','2021-09-17 02:25:25'),
(55,'en','Service Unavailable','Service Unavailable','general','2021-09-17 02:25:36','2021-09-17 02:25:36'),
(56,'ar','Mailbox Small Title','بريدك الإلكتروني المؤقت','general','2021-09-17 02:41:04','2021-09-17 02:56:02'),
(57,'ar','Mailbox Description','تخلص الآن من الرسائل المتطفلة ورسائل الاعلانات و الاختراقات والهجوم الآلي. أبقى صندوق البريد الخاص بك نظيفا وآمنا. Temp Mail يزودك بعنوان بريد الكتروني آمن ومؤقت ومجاني ومجهول ويمكنك التخلص منه في أي وقت','general','2021-09-17 02:41:04','2021-09-17 02:56:02'),
(58,'ar','Refresh','تحديث','general','2021-09-17 02:41:04','2021-09-17 02:56:02'),
(59,'ar','Change','تغيير','general','2021-09-17 02:41:04','2021-09-17 02:56:02'),
(60,'ar','Delete','إحذف','general','2021-09-17 02:41:04','2021-09-17 02:56:02'),
(61,'ar','Sender','المرسل','general','2021-09-17 02:41:04','2021-09-17 02:56:02'),
(62,'ar','Subject','الموضوع','general','2021-09-17 02:41:04','2021-09-17 02:56:02'),
(63,'ar','View','مشاهدة','general','2021-09-17 02:41:04','2021-09-17 02:56:02'),
(64,'ar','Your inbox is empty','صندوق الوارد الخاص بك فارغ','general','2021-09-17 02:41:04','2021-09-17 02:56:02'),
(65,'ar','Waiting for incoming emails','في انتظار رسائل البريد الإلكتروني الواردة','general','2021-09-17 02:41:04','2021-09-17 02:56:02'),
(66,'ar','Awesome Features','ميزات رائعة','general','2021-09-17 02:41:04','2021-09-17 02:56:02'),
(67,'ar','Features Description','يحمي البريد الإلكتروني المؤقت الذي يمكن التخلص منه عنوان بريدك الإلكتروني الحقيقي من البريد العشوائي والمراسلات الإعلانية والبرامج الضارة.','general','2021-09-17 02:41:04','2021-09-17 02:56:02'),
(68,'ar','Popular Posts','مقالات شائعة','general','2021-09-17 02:41:04','2021-09-17 02:56:02'),
(69,'ar','Back To List','الرجوع للقائمة','general','2021-09-17 02:41:04','2021-09-17 02:56:02'),
(70,'ar','Attachments','مرفقات','general','2021-09-17 02:41:04','2021-09-17 02:56:02'),
(71,'ar','Copyright','جميع الحقوق محفوضة 2021 - TrashMails','general','2021-09-17 02:41:04','2021-09-17 02:56:02'),
(72,'ar','Blog','مدونة','general','2021-09-17 02:41:04','2021-09-17 02:56:02'),
(73,'ar','Categories','الاقسام','general','2021-09-17 02:41:04','2021-09-17 02:56:02'),
(74,'ar','Leave a Reply','اترك تعليقا','general','2021-09-17 02:41:04','2021-09-17 02:56:02'),
(75,'ar','Change E-mail Address','قم بتغير البريد الالكتروني','general','2021-09-17 02:41:04','2021-09-17 02:56:02'),
(76,'ar','Change Description','لتغير عنوان البريد الإلكتروني، يرجى ادخال عنوان البريد الالكتروني الذي ترغب به ومن ثم أنقر على حفظ.','general','2021-09-17 02:41:04','2021-09-17 02:56:02'),
(77,'ar','Contact Us','اتصل بنا','general','2021-09-17 02:41:04','2021-09-17 02:56:02'),
(78,'ar','Contact Description','نحن هنا للمساعدة والإجابة على أي سؤال قد يكون لديك.','general','2021-09-17 02:41:04','2021-09-17 02:56:02'),
(79,'ar','Emails Created','عدد الإيميلات المؤقتة','general','2021-09-17 02:41:04','2021-09-17 02:56:02'),
(80,'ar','Messages Received','عدد الرسائل المستقبلة','general','2021-09-17 02:41:04','2021-09-17 02:56:02'),
(81,'ar','Cookie Message','سيتم تحسين تجربتك على هذا الموقع من خلال السماح بملفات تعريف الارتباط.','general','2021-09-17 02:41:04','2021-09-17 02:56:02'),
(82,'ar','Cookie Button','السماح','general','2021-09-17 02:41:04','2021-09-17 02:56:02'),
(84,'ar','Change Email','تغيير','general','2021-09-17 02:41:04','2021-09-17 02:56:02'),
(85,'ar','INBOX','صندوق الواردات','general','2021-09-17 02:41:04','2021-09-17 02:56:02'),
(86,'ar','We will add a contact from as soon as possible','سوف نضيف وسائل الاتصال في اقرب وقت ممكن','general','2021-09-17 02:41:04','2021-09-17 02:56:02'),
(87,'ar','Enter Your Mail!','اسم الذي تريده','general','2021-09-17 02:41:04','2021-09-17 02:56:02'),
(88,'ar','Published in','نشر في','general','2021-09-17 02:41:04','2021-09-17 02:56:02'),
(89,'ar','Date','تاريخ','general','2021-09-17 02:41:04','2021-09-17 02:56:02'),
(90,'ar','The address you have chosen is already in use. Please choose a different one.','الاسم الذي اذخلته مستعمل من قبل , الرجاء استخدم عنوان مختلف','general','2021-09-17 02:41:04','2021-09-17 02:56:02'),
(91,'ar','Your Name','الاسم الكامل','general','2021-09-17 02:41:04','2021-09-17 02:56:02'),
(92,'ar','Your Email','بريدك الالكتوني','general','2021-09-17 02:41:04','2021-09-17 02:56:02'),
(93,'ar','Your Phone','رقم الهاتف','general','2021-09-17 02:41:04','2021-09-17 02:56:02'),
(94,'ar','Your Message','الرسالة','general','2021-09-17 02:41:04','2021-09-17 02:56:02'),
(95,'ar','Send Message','ارسل','general','2021-09-17 02:41:04','2021-09-17 02:56:02'),
(96,'ar','We have received your message and would like to thank you for writing to us.','لقد تلقينا رسالتك ونود أن نشكرك على مراسلتنا.','general','2021-09-17 02:41:04','2021-09-17 02:56:02'),
(97,'ar','Not Found','الصفحة غير موجودة','general','2021-09-17 02:41:04','2021-09-17 02:56:02'),
(98,'ar','Page Not Found','الصفحة غير موجودة','general','2021-09-17 02:41:04','2021-09-17 02:56:02'),
(99,'ar','We are sorry but the page you are looking for was not found','نحن آسفون ولكن الصفحة التي تبحث عنها لم يتم العثور عليها','general','2021-09-17 02:41:04','2021-09-17 02:56:02'),
(100,'ar','Back to Home','العودة إلى الرئسية','general','2021-09-17 02:41:04','2021-09-17 02:56:02'),
(101,'ar','Unauthorised','غير مصرح','general','2021-09-17 02:41:04','2021-09-17 02:56:02'),
(102,'ar','Forbidden','ممنوع الذخول الى هده الصفحة','general','2021-09-17 02:41:04','2021-09-17 02:56:02'),
(103,'ar','Method Not Allowed','طريقة غير مسموحة','general','2021-09-17 02:41:04','2021-09-17 02:56:02'),
(104,'ar','Something is broken. Please let us know what you were doing when this error occurred. We will fix it as soon as possible. Sorry for any inconvenience caused.','شيء ما مكسور. الرجاء إخبارنا بما كنت تفعله عندما حدث هذا الخطأ. ونحن سوف إصلاحه في أقرب وقت ممكن. اعتذر على أي ازعاج حدث.','general','2021-09-17 02:41:04','2021-09-17 02:56:02'),
(105,'ar','Page Expired','انتهت صلاحية الرابط','general','2021-09-17 02:41:04','2021-09-17 02:56:02'),
(106,'ar','Too Many Requests','طلبات كثيرة جدا','general','2021-09-17 02:41:04','2021-09-17 02:56:02'),
(107,'ar','Internal Server Error','خطأ في الخادم الداخلي','general','2021-09-17 02:41:04','2021-09-17 02:56:02'),
(108,'ar','Oops… You just found an error page','عفوًا ... لقد عثرت للتو على صفحة خطأ','general','2021-09-17 02:41:04','2021-09-17 02:56:02'),
(109,'ar','We are sorry but our server encountered an internal error','نحن آسفون ولكن خادمنا واجه خطأ داخلي','general','2021-09-17 02:41:04','2021-09-17 02:56:02'),
(110,'ar','Service Unavailable','الخدمة غير متوفرة','general','2021-09-17 02:41:04','2021-09-17 02:56:02'),
(111,'en','Default Title',NULL,'seo','2021-11-02 09:03:52','2021-11-02 09:03:52'),
(112,'ar','Default Title',NULL,'seo','2021-11-02 09:03:52','2021-11-02 09:03:52'),
(113,'en','Default Description',NULL,'seo','2021-11-02 09:03:52','2021-11-02 09:03:52'),
(114,'ar','Default Description',NULL,'seo','2021-11-02 09:03:52','2021-11-02 09:03:52'),
(115,'en','Default keywords',NULL,'seo','2021-11-02 09:03:52','2021-11-02 09:03:52'),
(116,'ar','Default keywords',NULL,'seo','2021-11-02 09:03:52','2021-11-02 09:03:52'),
(117,'en','Home Page Title',NULL,'seo','2021-11-02 09:03:52','2021-11-02 09:03:52'),
(118,'ar','Home Page Title',NULL,'seo','2021-11-02 09:03:52','2021-11-02 09:03:52'),
(119,'en','Home Page Description',NULL,'seo','2021-11-02 09:03:52','2021-11-02 09:03:52'),
(120,'ar','Home Page Description',NULL,'seo','2021-11-02 09:03:52','2021-11-02 09:03:52'),
(121,'en','Home Page keywords',NULL,'seo','2021-11-02 09:03:52','2021-11-02 09:03:52'),
(122,'ar','Home Page keywords',NULL,'seo','2021-11-02 09:03:52','2021-11-02 09:03:52'),
(123,'en','Change Page Title',NULL,'seo','2021-11-02 09:03:52','2021-11-02 09:03:52'),
(124,'ar','Change Page Title',NULL,'seo','2021-11-02 09:03:52','2021-11-02 09:03:52'),
(125,'en','Change Page Description',NULL,'seo','2021-11-02 09:03:52','2021-11-02 09:03:52'),
(126,'ar','Change Page Description',NULL,'seo','2021-11-02 09:03:52','2021-11-02 09:03:52'),
(127,'en','Change Page keywords',NULL,'seo','2021-11-02 09:03:52','2021-11-02 09:03:52'),
(128,'ar','Change Page keywords',NULL,'seo','2021-11-02 09:03:52','2021-11-02 09:03:52'),
(129,'en','Blog Title',NULL,'seo','2021-11-02 09:03:52','2021-11-02 09:03:52'),
(130,'ar','Blog Title',NULL,'seo','2021-11-02 09:03:52','2021-11-02 09:03:52'),
(131,'en','Blog Description',NULL,'seo','2021-11-02 09:03:52','2021-11-02 09:03:52'),
(132,'ar','Blog Description',NULL,'seo','2021-11-02 09:03:52','2021-11-02 09:03:52'),
(133,'en','Blog keywords',NULL,'seo','2021-11-02 09:03:52','2021-11-02 09:03:52'),
(134,'ar','Blog keywords',NULL,'seo','2021-11-02 09:03:52','2021-11-02 09:03:52'),
(135,'en','Contact Page Title',NULL,'seo','2021-11-02 09:03:52','2021-11-02 09:03:52'),
(136,'ar','Contact Page Title',NULL,'seo','2021-11-02 09:03:52','2021-11-02 09:03:52'),
(137,'en','Contact Page Description',NULL,'seo','2021-11-02 09:03:52','2021-11-02 09:03:52'),
(138,'ar','Contact Page Description',NULL,'seo','2021-11-02 09:03:52','2021-11-02 09:03:52'),
(139,'en','Contact Page keywords',NULL,'seo','2021-11-02 09:03:52','2021-11-02 09:03:52'),
(140,'ar','Contact Page keywords',NULL,'seo','2021-11-02 09:03:52','2021-11-02 09:03:52'),
(141,'en','Homepage Title',NULL,'general','2021-11-11 06:11:15','2021-11-11 06:11:15'),
(142,'ar','Homepage Title',NULL,'general','2021-11-11 06:11:15','2021-11-11 06:11:15'),
(143,'en','Click To Copy!',NULL,'general','2021-11-11 06:11:15','2021-11-11 06:11:15'),
(144,'ar','Click To Copy!',NULL,'general','2021-11-11 06:11:15','2021-11-11 06:11:15'),
(145,'en','Copied!',NULL,'general','2021-11-11 06:11:15','2021-11-11 06:11:15'),
(146,'ar','Copied!',NULL,'general','2021-11-11 06:11:15','2021-11-11 06:11:15'),
(147,'en','Could not found results.','Could not found results.','general','2021-11-24 13:20:49','2021-11-24 22:22:52'),
(148,'fr','Could not found results.',NULL,'general','2021-11-24 13:20:49','2021-11-24 13:20:49'),
(149,'ar','Could not found results.',NULL,'general','2021-11-24 13:20:49','2021-11-24 13:20:49');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`phone`,`location`,`about`,`remember_token`,`created_at`,`updated_at`) values 
(1,'admin','admin@softui.com','2021-11-22 01:08:50','$2y$10$szhhLsyM.13bUYWiQJ1rPu5Gfp0zTdnHTU.bRKSdiEILO78KS/tBK',NULL,NULL,NULL,'JgRevVHyfVEWTkSGXLlGVhCkgUfL23cAL4c32KSDTNp4SwA1L1dd0bSlQxHp','2021-11-22 01:08:50','2021-11-22 01:08:50'),
(2,'aaa','aaa@gmail.com',NULL,'$2y$10$QA9lOY0McbJLikc7x9ZduufpGJjuurWT0hW7k33k37ETV2zyM/kCO',NULL,NULL,NULL,NULL,'2021-11-22 05:12:22','2021-11-22 05:12:22');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
