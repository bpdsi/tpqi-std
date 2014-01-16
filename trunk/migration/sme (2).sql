-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Oct 07, 2013 at 11:58 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `sme`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `foundation_detail`
-- 

CREATE TABLE `foundation_detail` (
  `foundation_id` int(11) NOT NULL auto_increment,
  `project_id` int(11) NOT NULL,
  `foundation_name` varchar(255) collate utf8_unicode_ci NOT NULL,
  `foundation_address` varchar(400) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`foundation_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

-- 
-- Dumping data for table `foundation_detail`
-- 

INSERT INTO `foundation_detail` VALUES (1, 1, 'นายวุฒิชัย  แห่วตระกูลปัญญา', 'หจก.ซินกวงน่าน  113 หมู่ 2 ต.ผาสิงห์ อ.เมือง จ.น่าน 55000 โทร.054-771-725 โทรสาร 054-751-665');
INSERT INTO `foundation_detail` VALUES (2, 2, 'ธนาคารพัฒนาวิสาหกิจขนาดกลางและขนาดย่อมแห่งประเทศไทย', 'โทร.02-265-4595 089-500-3787');
INSERT INTO `foundation_detail` VALUES (3, 3, 'ธนาคารพัฒนาวิสาหกิจขนาดกลางและขนาดย่อมแห่งประเทศไทย', 'โทร.02-265-4595 089-500-3787');
INSERT INTO `foundation_detail` VALUES (4, 4, 'บ.ซีพี ออลล์ จำกัด (มหาชน) 283 ถ.สีลม แขวงสีลม เขตบางรัก กทม.10500', 'โทร.02-677-9000 ต่อ1726 หรือ 1719 โทรสาร 02-677-1870');
INSERT INTO `foundation_detail` VALUES (5, 5, 'ธนาคารพัฒนาวิสาหกิจขนาดกลางและขนาดย่อมแห่งประเทศไทย', 'โทร.02-265-4595 089-500-3787');
INSERT INTO `foundation_detail` VALUES (6, 6, 'นายอุดม  ธรรมวาทิน', '494/61 ม.5 ต.บ้านสวน  อ.เมือง จ.ชลบุรี 20000 โทร 081-861-6969 038-275-642');
INSERT INTO `foundation_detail` VALUES (7, 7, 'บริษัท ดีเค.โคโคส จำกัด', '1023 อาคารทีพีเอส ชั้น 5 ถ.พัฒนาการ แขวง/เขต สวนหลวง กทม.10250 โทร 02-369-2663-4 โทรสาร.02-717-9773');
INSERT INTO `foundation_detail` VALUES (8, 8, 'นายสุพงศ์  วังถนอมศักดิ์', '103/1 หมู่ 6 ถ.ดอนตูม  ต.บ่อพลับ อ.เมือง         จ.นครปฐม 73000 โทร.087-758-9765');
INSERT INTO `foundation_detail` VALUES (9, 9, 'น.ส.กัญญาภัค  จริยะเทพถาวร', '94  ม.5  ถ.นางรอง-ปะคำ  ตำบล/อำเภอ นางรอง จ.บุรีรัมย์ 31110 โทร.086-265-1609');
INSERT INTO `foundation_detail` VALUES (10, 10, 'ธนาคารพัฒนาวิสาหกิจขนาดกลางและขนาดย่อมแห่งประเทศไทย', 'โทร.02-265-4595 089-500-3787');
INSERT INTO `foundation_detail` VALUES (11, 11, 'นายภาณุภณ  กุลพัชรวรรณ', '69 หมู่บ้านเอกชัย  ออร์คิดการ์เด้นท์ ถ.เอกชัย-บางบอน 3 แขวง/เขต บางบอน กทม.10150 โทร.02-453-0004 ,080-995-4591');

-- --------------------------------------------------------

-- 
-- Table structure for table `menu_detail`
-- 

CREATE TABLE `menu_detail` (
  `menu_id` int(11) NOT NULL auto_increment,
  `menu_pages` varchar(50) NOT NULL,
  `menu_name` varchar(50) NOT NULL,
  `parent` int(11) NOT NULL,
  `menu_order` int(11) NOT NULL,
  PRIMARY KEY  (`menu_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- 
-- Dumping data for table `menu_detail`
-- 

INSERT INTO `menu_detail` VALUES (1, 'project_search.php', 'สืบค้นโครงการ', 0, 0);
INSERT INTO `menu_detail` VALUES (2, '', 'เจ้าหน้าที่ลงทะเบียน', 0, 1);
INSERT INTO `menu_detail` VALUES (3, 'project_search_input.php', 'จัดการข้อมูลโครงการ', 2, 0);
INSERT INTO `menu_detail` VALUES (4, 'migration/migration_tool.php', 'นำเข้าโครงการ', 2, 2);
INSERT INTO `menu_detail` VALUES (5, 'report/rpt_1.php', 'รายงาน', 0, 2);
INSERT INTO `menu_detail` VALUES (6, 'project_formx.php', 'ลงทะเบียนโครงการ', 2, 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `project_education`
-- 

CREATE TABLE `project_education` (
  `project_id` int(11) NOT NULL auto_increment,
  `project_name` text collate utf8_unicode_ci,
  `staff` text collate utf8_unicode_ci,
  `staff_status` text collate utf8_unicode_ci,
  `staff_ratio` text collate utf8_unicode_ci,
  `staff_hour` text collate utf8_unicode_ci,
  `startdate_project` date default NULL,
  `enddate_project` date default NULL,
  `service_type` text collate utf8_unicode_ci,
  `external_org` text collate utf8_unicode_ci,
  `foundation_name` text collate utf8_unicode_ci,
  `total_income` double default NULL,
  `material_cost` double default NULL,
  `labor_cost` double default NULL,
  `kuservice_cost` double default NULL,
  `service_cost` double default NULL,
  `utilities_cost` double default NULL,
  `tools_cost` double default NULL,
  `inkind` double default NULL,
  `goal_name` text collate utf8_unicode_ci,
  `amount_service` int(11) default NULL,
  `apply_use` text collate utf8_unicode_ci,
  `assess_satisfy` text collate utf8_unicode_ci,
  `result_1` text collate utf8_unicode_ci,
  `result_2` text collate utf8_unicode_ci,
  `result_3` text collate utf8_unicode_ci,
  `result_4` text collate utf8_unicode_ci,
  `asessment_1` text collate utf8_unicode_ci,
  `asessment_2` text collate utf8_unicode_ci,
  `asessment_3` text collate utf8_unicode_ci,
  `asessment_4` text collate utf8_unicode_ci,
  `asessment_5` text collate utf8_unicode_ci,
  PRIMARY KEY  (`project_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

-- 
-- Dumping data for table `project_education`
-- 

INSERT INTO `project_education` VALUES (1, 'การพัฒนาผลิตภัณฑ์ถั่วลิสงป่นอนามัย\nโอนจัดสรรที่ ศธ 0513.12201/0100 (3)\nลว.25 ต.ค.55\nปิดโครงการ ที่ ศธ \n0513.12201/1461 ลว.\n1 พ.ค.56 / ส่งแบบประเมินแล้ว', '', '', '', '', '2012-10-15', '2013-06-30', '', '', '', 70000, 37800, 12600, 1400, 5600, 5040, 7560, 70000, '', 1, '', '', 'ต.ค', '', '', '', 'ค่าเฉลี่ย =5\nมากที่สุด', '', '', '', '');
INSERT INTO `project_education` VALUES (2, 'โครงการพัฒนาผู้ประกอบการ SMEs สู่ระบบมาตรฐานคุณภาพ (ไร่ BN จ.เพชรบูรณ์)\nปิดโครงการ ที่ ศธ \n0513.12201/1295 ลว.\n11 เม.ย.56 / ส่งแบบประเมินแล้ว\n\n', '', '', '', '', '2012-08-01', '2012-12-31', '', '', '', 26000, 0, 23400, 520, 2080, 0, 0, 26000, '', 1, '', '', 'ต.ค', '', '', '', 'ค่าเฉลี่ย =5\nมากที่สุด', '', '', '', '');
INSERT INTO `project_education` VALUES (3, 'โครงการพัฒนาผู้ประกอบการ SMEs สู่ระบบมาตรฐานคุณภาพ (โรงงานลูกชิ้น ช.ชุติมา OK จ.เพชรบูรณ์)\nปิดโครงการ ที่ ศธ \n0513.12201/1296 ลว.\n11 เม.ย.56 / ส่งแบบประเมินแล้ว\n\n', '', '', '', '', '2012-08-01', '2012-12-31', '', '', '', 26000, 0, 23400, 520, 2080, 0, 0, 26000, '', 1, '', '', 'ต.ค.', '', '', '', 'ค่าเฉลี่ย =5\nมากที่สุด', '', '', '', '');
INSERT INTO `project_education` VALUES (4, 'ฝึกอบรมการประเมินคุณภาพทางประสาทสัมผัสของอาหาร\nโอนจัดสรรที่ ศธ 0513.12201/0148(3)\nลว.2 พ.ย.55\nปิดโครงการแล้ว\nศธ 0513.12201/0205\nลว.13 พ.ย.55\nส่งแบบประเมิน/การใช้ประโยชน์งานวิจัยแล้ว', '', '', '', '', '2012-10-08', '1957-01-12', '', '', '', 35000, 18900, 6300, 700, 2800, 1575, 4725, 35000, '', 0, '', '', 'ต.ค.', '', '', '', 'ค่าเฉลี่ย =3.28\nปานกลาง', '', '', '', '');
INSERT INTO `project_education` VALUES (5, 'โครงการพัฒนาผู้ประกอบการ SMEs สู่ระบบมาตรฐานคุณภาพ (กลุ่มสตรีอาสาพัฒนาเกษตรทุ่งสมอ จ.กาญจนบุรี)\nโอนจัดสรรที่ ศธ 0513.12201/0193(3)\nลว.9 พ.ย.55\nปิดโครงการ ที่ ศธ \n0513.12201/0925 ลว.\n28 ก.พ.56 / ส่งแบบประเมินแล้ว', '', '', '', '', '2012-11-01', '2012-12-31', '', '', '', 26000, 0, 23400, 520, 2080, 0, 0, 26000, '', 1, '', '', 'พ.ย.', '', '', '', 'ค่าเฉลี่ย =5\nมากที่สุด', '', '', '', '');
INSERT INTO `project_education` VALUES (6, 'พัฒนาสูตรมะนาวดอง\nทำเรื่องเบิก+จัดสรรแล้ว\n19 พ.ย.55\n(ได้รับใบเสร็จแล้ว)', '', '', '', '', '2012-10-01', '2013-06-28', '', '', '', 31000, 15345, 6975, 620, 2480, 2580, 3000, 31000, '', 1, '', '', 'พ.ย.', '', '', '', '', '', '', '', '');
INSERT INTO `project_education` VALUES (7, 'น้ำกะทิเข้มข้นบรรจุกระป๋อง\nทำเรื่องเบิก+จัดสรรแล้ว\n26พ.ย.55\n(ได้รับใบเสร็จแล้ว \n3 ธ.ค.55)', '', '', '', '', '2012-10-01', '0000-00-00', '', '', '', 50000, 24750, 11250, 1000, 4000, 2500, 6500, 50000, '', 0, '', '', 'พ.ย.', '', '', '', '', '', '', '', '');
INSERT INTO `project_education` VALUES (8, 'การพัฒนาสูตรกุ้งพันอ้อย\nทำเรื่องเบิก+จัดสรรแล้ว\n27 พ.ย.55\n(ได้รับใบเสร็จแล้ว \n20 ธ.ค.55)\nปิดโครงการ ที่ ศธ \n0513.12201/1490 ลว.\n14 พ.ค.56 / ส่งแบบประเมินแล้ว ', '', '', '', '', '2012-11-15', '2013-02-15', '', '', '', 35000, 14625, 7875, 700, 2800, 4000, 5000, 35000, '', 1, '', '', 'พ.ย.', '', '', '', '', '', '', '', '');
INSERT INTO `project_education` VALUES (9, 'การพัฒนาข้าวเกรียบเห็ดฟาง\nปิดโครงการ/ส่งแบบประเมินแล้ว\nที่ ศธ 0513.12201/1216\nลว.2 เม.ย.56', '', '', '', '', '2012-12-03', '2013-01-31', '', '', '', 200002, 8800, 4500, 400, 1600, 200010001000, 270013501350, 20000, '', 1, '', '', 'ธ.ค.', '', '', '', 'ค่าเฉลี่ย =4\nมาก', '', '', '', '');
INSERT INTO `project_education` VALUES (10, 'โครงการพัฒนาผู้ประกอบการ SMEs สู่ระบบมาตรฐานคุณภาพ (สยามบานาน่า,จินตนา สระสำอาง จ.กาญจนบุรี)\n(ทำเรื่องเบิก+จัดสรรแล้ว 17 ธ.ค.55 \nได้รับใบเสร็จแล้ว\nปิดโครงการ/ส่งแบบประเมินแล้ว\nที่ ศธ 0513.12201/1460\nลว.8 พ.ค.56\n', '', '', '', '', '2012-12-12', '2013-03-15', '', '', '', 26000, 0, 23400, 520, 2080, 0, 0, 26000, '', 1, '', '', 'ธ.ค.', '', '', '', '', '', '', '', '');
INSERT INTO `project_education` VALUES (11, 'การทำน้ำก๊วยเตี๋ยวผง\n(ทำเรื่องเบิก+จัดสรรแล้ว 25 ธ.ค.55)', '', '', '', '', '1957-01-28', '2013-05-31', '', '', '', 29000, 14355, 6525, 580, 2320, 2220, 3000, 29000, '', 1, '', '', 'ธ.ค.', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

-- 
-- Table structure for table `project_education_tmp`
-- 

CREATE TABLE `project_education_tmp` (
  `id` int(11) NOT NULL auto_increment,
  `project_name` text collate utf8_unicode_ci,
  `staff` text collate utf8_unicode_ci,
  `staff_status` text collate utf8_unicode_ci,
  `staff_ratio` text collate utf8_unicode_ci,
  `staff_hour` text collate utf8_unicode_ci,
  `enddate_project` text collate utf8_unicode_ci,
  `service_type` text collate utf8_unicode_ci,
  `external_org` text collate utf8_unicode_ci,
  `foundation_name` text collate utf8_unicode_ci,
  `total_income` text collate utf8_unicode_ci,
  `material_cost` text collate utf8_unicode_ci,
  `labor_cost` text collate utf8_unicode_ci,
  `kuservice_cost` text collate utf8_unicode_ci,
  `service_cost` text collate utf8_unicode_ci,
  `utilities_cost` text collate utf8_unicode_ci,
  `tools_cost` text collate utf8_unicode_ci,
  `inkind` text collate utf8_unicode_ci,
  `gold_name` text collate utf8_unicode_ci,
  `amount_service` int(11) default NULL,
  `apply_use` text collate utf8_unicode_ci,
  `assess_satisfy` text collate utf8_unicode_ci,
  `result_1` text collate utf8_unicode_ci,
  `result_2` text collate utf8_unicode_ci,
  `result_3` text collate utf8_unicode_ci,
  `result_4` text collate utf8_unicode_ci,
  `asessment_1` text collate utf8_unicode_ci,
  `asessment_2` text collate utf8_unicode_ci,
  `asessment_3` text collate utf8_unicode_ci,
  `asessment_4` text collate utf8_unicode_ci,
  `asessment_5` text collate utf8_unicode_ci,
  `check_reform` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

-- 
-- Dumping data for table `project_education_tmp`
-- 

INSERT INTO `project_education_tmp` VALUES (1, 'การพัฒนาผลิตภัณฑ์ถั่วลิสงป่นอนามัย\nโอนจัดสรรที่ ศธ 0513.12201/0100 (3)\nลว.25 ต.ค.55\nปิดโครงการ ที่ ศธ \n0513.12201/1461 ลว.\n1 พ.ค.56 / ส่งแบบประเมินแล้ว', 'นางเย็นใจ  ฐิตะฐาน\nน.ส.วาสนา  นาราศรี\nนายญาธิปวีร์  ปักแก้ว', '1\n2\n2', '', '320\n320\n320', '15 ต.ค.55-\n30 มิ.ย.56', '', '', 'นายวุฒิชัย  แห่วตระกูลปัญญา\nหจก.ซินกวงน่าน \n113 หมู่ 2 ต.ผาสิงห์ อ.เมือง จ.น่าน 55000\nโทร.054-771-725\nโทรสาร 054-751-665', '70000', '37800', '12600', '1400', '5,600\n', '5040\nจ่ายแล้ว', '7560\nจ่ายแล้ว', '70000', '', 1, '', '', 'ต.ค', '', '', '', 'ค่าเฉลี่ย =5\nมากที่สุด', '', '', '', '', NULL);
INSERT INTO `project_education_tmp` VALUES (2, 'โครงการพัฒนาผู้ประกอบการ SMEs สู่ระบบมาตรฐานคุณภาพ (ไร่ BN จ.เพชรบูรณ์)\nปิดโครงการ ที่ ศธ \n0513.12201/1295 ลว.\n11 เม.ย.56 / ส่งแบบประเมินแล้ว\n\n', 'น.ส.สุมิตรา  บุญบำรุง\nน.ส.ศรุดา  โลหะนะ\n\n(โครงการที่ปรึกษา ไม่ให้ค่าเครื่องมือฯ และสาธารณูปโภค)', '1\n2', '', '', '1 ส.ค.55-\n31 ธ.ค.55', '', '', 'ธนาคารพัฒนาวิสาหกิจขนาดกลางและขนาดย่อมแห่งประเทศไทย\nโทร.02-265-4595\n089-500-3787', '26000', '0', '23400', '520', '2080', '0\nไม่ให้', '0\nไม่ให้\n\n', '26000', '', 1, '', '', 'ต.ค', '', '', '', 'ค่าเฉลี่ย =5\nมากที่สุด', '', '', '', '', NULL);
INSERT INTO `project_education_tmp` VALUES (3, 'โครงการพัฒนาผู้ประกอบการ SMEs สู่ระบบมาตรฐานคุณภาพ (โรงงานลูกชิ้น ช.ชุติมา OK จ.เพชรบูรณ์)\nปิดโครงการ ที่ ศธ \n0513.12201/1296 ลว.\n11 เม.ย.56 / ส่งแบบประเมินแล้ว\n\n', 'น.ส.สุมิตรา  บุญบำรุง\nน.ส.ศรุดา  โลหะนะ\n\n(โครงการที่ปรึกษา ไม่ให้ค่าเครื่องมือฯ และสาธารณูปโภค)', '1\n2', '', '', '1 ส.ค.55-\n31 ธ.ค.55', '', '', 'ธนาคารพัฒนาวิสาหกิจขนาดกลางและขนาดย่อมแห่งประเทศไทย\nโทร.02-265-4595\n089-500-3787', '26000', '0', '23400', '520', '2080', '0\nไม่ให้', '0\nไม่ให้', '26000', '', 1, '', '', 'ต.ค.', '', '', '', 'ค่าเฉลี่ย =5\nมากที่สุด', '', '', '', '', NULL);
INSERT INTO `project_education_tmp` VALUES (4, 'ฝึกอบรมการประเมินคุณภาพทางประสาทสัมผัสของอาหาร\nโอนจัดสรรที่ ศธ 0513.12201/0148(3)\nลว.2 พ.ย.55\nปิดโครงการแล้ว\nศธ 0513.12201/0205\nลว.13 พ.ย.55\nส่งแบบประเมิน/การใช้ประโยชน์งานวิจัยแล้ว', 'น.ส.ชมดาว  สิกขะมณฑล\nน.ส.อัญชลี  อุษณาสุวรรณ\nน.ส.ทิพย์ธิดา  แก้วตาทิพย์', '1\n\n2\n2', '', '', '8 ต.ค.55-\n12 ต.ค.55\nขอขยาย\nเวลา-\n12 พ.ย.55', '', '', 'บ.ซีพี ออลล์ จำกัด (มหาชน) 283 ถ.สีลม แขวงสีลม เขตบางรัก กทม.10500\nโทร.02-677-9000 ต่อ1726 หรือ 1719\nโทรสาร 02-677-1870', '35000', '18900', '6300', '700', '2800', '1575\nจ่ายแล้ว', '4725\nจ่ายแล้ว', '35000', '', 0, '', '', 'ต.ค.', '', '', '', 'ค่าเฉลี่ย =3.28\nปานกลาง', '', '', '', '', NULL);
INSERT INTO `project_education_tmp` VALUES (5, 'โครงการพัฒนาผู้ประกอบการ SMEs สู่ระบบมาตรฐานคุณภาพ (กลุ่มสตรีอาสาพัฒนาเกษตรทุ่งสมอ จ.กาญจนบุรี)\nโอนจัดสรรที่ ศธ 0513.12201/0193(3)\nลว.9 พ.ย.55\nปิดโครงการ ที่ ศธ \n0513.12201/0925 ลว.\n28 ก.พ.56 / ส่งแบบประเมินแล้ว', 'น.ส.ศรุดา  โลหะนะ\nน.ส.สุมิตรา  บุญบำรุง\n\n\n(โครงการที่ปรึกษา ไม่ให้ค่าเครื่องมือฯ และสาธารณูปโภค)', '1\n2', '', '', '1 พ.ย.55-31 ธ.ค.55', '', '', 'ธนาคารพัฒนาวิสาหกิจขนาดกลางและขนาดย่อมแห่งประเทศไทย\nโทร.02-265-4595\n089-500-3787', '26000', '0', '23400', '520', '2080', '0\nไม่ให้', '0\nไม่ให้', '26000', '', 1, '', '', 'พ.ย.', '', '', '', 'ค่าเฉลี่ย =5\nมากที่สุด', '', '', '', '', NULL);
INSERT INTO `project_education_tmp` VALUES (6, 'พัฒนาสูตรมะนาวดอง\nทำเรื่องเบิก+จัดสรรแล้ว\n19 พ.ย.55\n(ได้รับใบเสร็จแล้ว)', 'น.ส.ช่อลัดดา  เที่ยงพุก', '1', '', '', '1 ต.ค.55-\n28 มิ.ย.56', '', '', 'นายอุดม  ธรรมวาทิน\n494/61 ม.5 ต.บ้านสวน \nอ.เมือง จ.ชลบุรี 20000\nโทร 081-861-6969\n038-275-642', '31000', '15345', '6975', '620', '2480', '2,580\nจ่ายแล้ว', '3,000\nจ่ายแล้ว', '31000', '', 1, '', '', 'พ.ย.', '', '', '', '', '', '', '', '', NULL);
INSERT INTO `project_education_tmp` VALUES (7, 'น้ำกะทิเข้มข้นบรรจุกระป๋อง\nทำเรื่องเบิก+จัดสรรแล้ว\n26พ.ย.55\n(ได้รับใบเสร็จแล้ว \n3 ธ.ค.55)', 'น.ส.สุภัคชนม์  คล่องดี\nนายพิสุทธิ์  บุตรสุวรรณ\nน.ส.วราภรณ์  ประเสริฐ\nนายภูวิษณุ์  โพธิสุข', '2\n1\n1\n1', '', '', '1 ต.ค.55-\n31 มี.ค.56\nขยายเวลาถึง 30 ก.ย.56', '', '', 'บริษัท ดีเค.โคโคส จำกัด\n1023 อาคารทีพีเอส ชั้น 5 ถ.พัฒนาการ แขวง/เขต สวนหลวง กทม.10250\nโทร 02-369-2663-4\nโทรสาร.02-717-9773', '50000', '24750', '11250', '1000', '4000', '2,500\nจ่ายแล้ว', '6,500\nจ่ายแล้ว', '50000', '', 0, '', '', 'พ.ย.', '', '', '', '', '', '', '', '', NULL);
INSERT INTO `project_education_tmp` VALUES (8, 'การพัฒนาสูตรกุ้งพันอ้อย\nทำเรื่องเบิก+จัดสรรแล้ว\n27 พ.ย.55\n(ได้รับใบเสร็จแล้ว \n20 ธ.ค.55)\nปิดโครงการ ที่ ศธ \n0513.12201/1490 ลว.\n14 พ.ค.56 / ส่งแบบประเมินแล้ว ', 'นายสมโภชน์  ใหญ่เอี่ยม\nน.ส.กัษมาพร  ปัญต๊ะบุตร\nนายศิริพงษ์  เทศนา', '1\n2\n2', '', '', '15 พ.ย.55 - 15 ก.พ.56', '', '', 'นายสุพงศ์  วังถนอมศักดิ์\n103/1 หมู่ 6 ถ.ดอนตูม  ต.บ่อพลับ อ.เมือง         จ.นครปฐม 73000\nโทร.087-758-9765', '35000', '14625', '7875', '700', '2800', '4,000\nจ่ายแล้ว', '5,000\nจ่ายแล้ว', '35000', '', 1, '', '', 'พ.ย.', '', '', '', '', '', '', '', '', NULL);
INSERT INTO `project_education_tmp` VALUES (9, 'การพัฒนาข้าวเกรียบเห็ดฟาง\nปิดโครงการ/ส่งแบบประเมินแล้ว\nที่ ศธ 0513.12201/1216\nลว.2 เม.ย.56', 'น.ส.อภิญญา  จุฑางกูร\nนางเย็นใจ  ฐิตะฐาน\nน.ส.วาสนา นาราศรี', '1\n2\n2', '', '', '3 ธ.ค.55-\n31 ม.ค.56', '', '', 'น.ส.กัญญาภัค  จริยะเทพถาวร \n94  ม.5  ถ.นางรอง-ปะคำ \nตำบล/อำเภอ นางรอง\nจ.บุรีรัมย์ 31110\nโทร.086-265-1609', '20,000\nแบ่งจ่าย 2 งวด', '8800', '4500', '400', '1600', '2000\nจ่ายแล้ว1,000\nจ่ายแล้ว1,000', '2700\nจ่ายแล้ว 1,350\nจ่ายแล้ว 1,350', '20000', '', 1, '', '', 'ธ.ค.', '', '', '', 'ค่าเฉลี่ย =4\nมาก', '', '', '', '', NULL);
INSERT INTO `project_education_tmp` VALUES (10, 'โครงการพัฒนาผู้ประกอบการ SMEs สู่ระบบมาตรฐานคุณภาพ (สยามบานาน่า,จินตนา สระสำอาง จ.กาญจนบุรี)\n(ทำเรื่องเบิก+จัดสรรแล้ว 17 ธ.ค.55 \nได้รับใบเสร็จแล้ว\nปิดโครงการ/ส่งแบบประเมินแล้ว\nที่ ศธ 0513.12201/1460\nลว.8 พ.ค.56\n', 'น.ส.ศรุดา  โลหะนะ\nน.ส.สุมิตรา  บุญบำรุง\n(โครงการที่ปรึกษา ไม่ให้ค่าเครื่องมือฯ และสาธารณูปโภค)', '1\n2', '', '', '12 ธ.ค.55-\n15 มี.ค.56', '', '', 'ธนาคารพัฒนาวิสาหกิจขนาดกลางและขนาดย่อมแห่งประเทศไทย\nโทร.02-265-4595\n089-500-3787', '26000', '0', '23400', '520', '2080', '0\nไม่ให้', '0\nไม่ให้', '26000', '', 1, '', '', 'ธ.ค.', '', '', '', '', '', '', '', '', NULL);
INSERT INTO `project_education_tmp` VALUES (11, 'การทำน้ำก๊วยเตี๋ยวผง\n(ทำเรื่องเบิก+จัดสรรแล้ว 25 ธ.ค.55)', 'น.ส.ช่อลัดดา  เที่ยงพุก', '1', '', '', '28ธ.ค.55-\n31 พ.ค.56\n', '', '', 'นายภาณุภณ  กุลพัชรวรรณ\n69 หมู่บ้านเอกชัย  ออร์คิดการ์เด้นท์ ถ.เอกชัย-บางบอน 3 แขวง/เขต บางบอน กทม.10150\nโทร.02-453-0004 ,080-995-4591', '29000', '14355', '6525', '580', '2320', '2,220\nจ่ายแล้ว', '3,000\nจ่ายแล้ว ', '29000', '', 1, '', '', 'ธ.ค.', '', '', '', '', '', '', '', '', NULL);

-- --------------------------------------------------------

-- 
-- Table structure for table `response_detail`
-- 

CREATE TABLE `response_detail` (
  `response_id` int(11) NOT NULL auto_increment,
  `project_id` int(11) NOT NULL,
  `response_name` varchar(400) collate utf8_unicode_ci NOT NULL,
  `response_type` int(11) NOT NULL,
  `response_hrs` double NOT NULL,
  `response_radio` double NOT NULL,
  PRIMARY KEY  (`response_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=31 ;

-- 
-- Dumping data for table `response_detail`
-- 

INSERT INTO `response_detail` VALUES (1, 1, 'นางเย็นใจ  ฐิตะฐาน', 1, 320, 0);
INSERT INTO `response_detail` VALUES (2, 1, 'น.ส.วาสนา  นาราศรี', 2, 320, 0);
INSERT INTO `response_detail` VALUES (3, 1, 'นายญาธิปวีร์  ปักแก้ว', 2, 320, 0);
INSERT INTO `response_detail` VALUES (4, 2, 'น.ส.สุมิตรา  บุญบำรุง', 1, 0, 0);
INSERT INTO `response_detail` VALUES (5, 2, 'น.ส.ศรุดา  โลหะนะ', 2, 0, 0);
INSERT INTO `response_detail` VALUES (6, 2, '(โครงการที่ปรึกษา ไม่ให้ค่าเครื่องมือฯ และสาธารณูปโภค)', 2, 0, 0);
INSERT INTO `response_detail` VALUES (7, 3, 'น.ส.สุมิตรา  บุญบำรุง', 1, 0, 0);
INSERT INTO `response_detail` VALUES (8, 3, 'น.ส.ศรุดา  โลหะนะ', 2, 0, 0);
INSERT INTO `response_detail` VALUES (9, 3, '(โครงการที่ปรึกษา ไม่ให้ค่าเครื่องมือฯ และสาธารณูปโภค)', 2, 0, 0);
INSERT INTO `response_detail` VALUES (10, 4, 'น.ส.ชมดาว  สิกขะมณฑล', 1, 0, 0);
INSERT INTO `response_detail` VALUES (11, 4, 'น.ส.อัญชลี  อุษณาสุวรรณ', 2, 0, 0);
INSERT INTO `response_detail` VALUES (12, 4, 'น.ส.ทิพย์ธิดา  แก้วตาทิพย์', 2, 0, 0);
INSERT INTO `response_detail` VALUES (13, 5, 'น.ส.ศรุดา  โลหะนะ', 1, 0, 0);
INSERT INTO `response_detail` VALUES (14, 5, 'น.ส.สุมิตรา  บุญบำรุง', 2, 0, 0);
INSERT INTO `response_detail` VALUES (15, 5, '(โครงการที่ปรึกษา ไม่ให้ค่าเครื่องมือฯ และสาธารณูปโภค)', 2, 0, 0);
INSERT INTO `response_detail` VALUES (16, 6, 'น.ส.ช่อลัดดา  เที่ยงพุก', 1, 0, 0);
INSERT INTO `response_detail` VALUES (17, 7, 'น.ส.สุภัคชนม์  คล่องดี', 2, 0, 0);
INSERT INTO `response_detail` VALUES (18, 7, 'นายพิสุทธิ์  บุตรสุวรรณ', 1, 0, 0);
INSERT INTO `response_detail` VALUES (19, 7, 'น.ส.วราภรณ์  ประเสริฐ', 1, 0, 0);
INSERT INTO `response_detail` VALUES (20, 7, 'นายภูวิษณุ์  โพธิสุข', 1, 0, 0);
INSERT INTO `response_detail` VALUES (21, 8, 'นายสมโภชน์  ใหญ่เอี่ยม', 1, 0, 0);
INSERT INTO `response_detail` VALUES (22, 8, 'น.ส.กัษมาพร  ปัญต๊ะบุตร', 2, 0, 0);
INSERT INTO `response_detail` VALUES (23, 8, 'นายศิริพงษ์  เทศนา', 2, 0, 0);
INSERT INTO `response_detail` VALUES (24, 9, 'น.ส.อภิญญา  จุฑางกูร', 1, 0, 0);
INSERT INTO `response_detail` VALUES (25, 9, 'นางเย็นใจ  ฐิตะฐาน', 2, 0, 0);
INSERT INTO `response_detail` VALUES (26, 9, 'น.ส.วาสนา นาราศรี', 2, 0, 0);
INSERT INTO `response_detail` VALUES (27, 10, 'น.ส.ศรุดา  โลหะนะ', 1, 0, 0);
INSERT INTO `response_detail` VALUES (28, 10, 'น.ส.สุมิตรา  บุญบำรุง', 2, 0, 0);
INSERT INTO `response_detail` VALUES (29, 10, '(โครงการที่ปรึกษา ไม่ให้ค่าเครื่องมือฯ และสาธารณูปโภค)', 2, 0, 0);
INSERT INTO `response_detail` VALUES (30, 11, 'น.ส.ช่อลัดดา  เที่ยงพุก', 1, 0, 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `response_type`
-- 

CREATE TABLE `response_type` (
  `response_type` int(11) NOT NULL auto_increment,
  `response_type_name` varchar(50) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`response_type`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `response_type`
-- 

INSERT INTO `response_type` VALUES (1, 'หัวหน้าโครงการ');
INSERT INTO `response_type` VALUES (2, 'ผู้ร่วมโครงการ');
