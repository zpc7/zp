/*
Navicat MySQL Data Transfer

Source Server         : mydb
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : zp

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-08-12 21:53:03
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `zp_admin`
-- ----------------------------
DROP TABLE IF EXISTS `zp_admin`;
CREATE TABLE `zp_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `nickname` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zp_admin
-- ----------------------------
INSERT INTO `zp_admin` VALUES ('1', 'jason', '杰森', 'king');

-- ----------------------------
-- Table structure for `zp_collect`
-- ----------------------------
DROP TABLE IF EXISTS `zp_collect`;
CREATE TABLE `zp_collect` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned NOT NULL,
  `cid` int(10) unsigned NOT NULL,
  `jobid` int(10) unsigned DEFAULT NULL,
  `ctime` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=176 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zp_collect
-- ----------------------------
INSERT INTO `zp_collect` VALUES ('156', '13', '12', '25', '2016-06-10 23:00:44');
INSERT INTO `zp_collect` VALUES ('171', '12', '12', '0', '2016-06-14 16:42:02');
INSERT INTO `zp_collect` VALUES ('172', '12', '12', '25', '2016-06-14 16:42:06');
INSERT INTO `zp_collect` VALUES ('173', '12', '7', '23', '2016-06-14 16:42:15');
INSERT INTO `zp_collect` VALUES ('174', '12', '7', '24', '2016-06-14 16:42:21');
INSERT INTO `zp_collect` VALUES ('175', '13', '7', '0', '2016-06-15 00:24:00');

-- ----------------------------
-- Table structure for `zp_company`
-- ----------------------------
DROP TABLE IF EXISTS `zp_company`;
CREATE TABLE `zp_company` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `address` varchar(30) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `tell` varchar(20) DEFAULT NULL,
  `industry` varchar(20) DEFAULT NULL,
  `scale` int(10) DEFAULT NULL,
  `tag` varchar(20) DEFAULT NULL,
  `url` varchar(50) DEFAULT NULL,
  `logopath` varchar(100) DEFAULT NULL,
  `estabtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `pv` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zp_company
-- ----------------------------
INSERT INTO `zp_company` VALUES ('1', '999', '888', '聚美优品', '中国北京市朝阳区', '聚美优品是一家化妆品限时特卖商城，其前身为团美网，由陈欧、戴雨森等创立于2010年3月。聚美优品首创“化妆品团购”模式：每天在网站推荐十几款热门化妆品。2010年9月，团美网正式全面启用聚美优品新品牌，并且启用全新顶级域名。', '400-123-8888', 'IT互联网', '2000', '化妆品特卖网站', 'www.jumei.com', '../uploads/61f7682d5f10d800ff2f38334f63ea60.jpg', '2015-05-31 00:00:00', '0');
INSERT INTO `zp_company` VALUES ('7', 'baidu', '777', '百度', '中国北京', '百度（Nasdaq：BIDU）是全球最大的中文搜索引擎、最大的中文网站。2000年1月由李彦宏创立于北京中关村，致力于向人们提供“简单，可依赖”的信息获取方式。“百度”二字源于中国宋朝词人辛弃疾的《青玉案·元夕》词句“众里寻他千百度”，象征着百度对中文信息检索技术的执著追求。', '400-820-8820', 'IT互联网', '20000', '百度一下，你就知道', 'www.baidu.com', '../uploads/1d66922983403af0e8b02de07ba96cfe.jpg', '2000-01-01 00:00:00', '0');
INSERT INTO `zp_company` VALUES ('8', 'jingdong', '777', '京东', '中国北京市朝阳区北辰西路8号北辰世纪中心A座', '京东（JD.com）是中国最大的自营式电商企业，2015年第一季度在中国自营式B2C电商市场的占有率为56.3%。目前，京东集团旗下设有京东商城、京东金融、拍拍网、京东智能、O2O及海外事业部。2014年5月，京东在美国纳斯达克证券交易所正式挂牌上市（股票代码：JD），是中国第一个成功赴美上市的大型综合型电商平台，与腾讯、百度等中国互联网巨头共同跻身全球前十大互联网公司排行榜。2014年，京东市场交易额达到2602亿元，净收入达到1150亿元。', '400-606-5500', '网络零售服务', '35000', '网购上京东，省钱又放心', 'www.jd.com', '../uploads/9af814c612f03ad9e43f2b852e7bb15d.jpg', '1998-06-18 00:00:00', '0');
INSERT INTO `zp_company` VALUES ('9', 'baicizhan', '777', '百词斩', '成都市滨江东路168号', '百词斩是一家处于高速成长阶段的创业公司，我们立志做中国最好的在线教育公司。这里员工大都来自于大型互联网公司，在这里你既可以学习到大型互联网公司做事的方法和思维，也可以体会到创业者的热血与火焰。我们讲究轻松、有爱、无节操的团队氛围，喜欢奇思妙想，积极乐观的人。如果你对互联网充满好奇，如果你对如何将东西卖给上百万人感到兴奋，请联系我们。我们希望你能满足如下几个小要求：1、 能接受每周6天，朝9晚6，或者朝10晚7的弹性工作制。2、 喜欢与人打交道，擅长跨部门、跨公司沟通。3、 对于如何进行互联网产品的营销有浓厚兴趣，学习能力强，踏实肯干。4、 文字功底扎实，思维活跃，喜欢用文字来表达情绪和想法。', '028-86711702', '教育', '50', '一款针对英语学习开发的一款“图背单词软件', 'http://www.baicizhan.com/', '../uploads/c5bfd2181eb22df7b1655a314673a0a7.jpg', '2016-06-06 21:12:16', '0');
INSERT INTO `zp_company` VALUES ('10', 'zhihu', '777', '知乎', null, null, null, null, null, null, null, '../uploads/aaef54435cc465cf0d808ff48e58a88e.jpg', '2016-06-08 21:10:44', '0');
INSERT INTO `zp_company` VALUES ('11', 'lianjia', '777', '链家网', null, null, null, null, null, null, null, '../uploads/7d70df96a1d4eaff4ff5bec8d8453bcf.jpg', '2016-06-08 21:22:18', '0');
INSERT INTO `zp_company` VALUES ('12', 'McDonald', '777', '麦当劳', '海南省海口市龙华区滨海大道115号海垦国际金融中心6层', '麦当劳是世界闻名的全球500强企业之一，在全球超过119个国家和地区经营超过33,500间麦当劳餐厅，每天为6,780万顾客提供优质食品。在2012年全球品牌价值调研中，麦当劳名列第7位，是前10名中唯一的餐饮业公司。', '400-851-7517', '餐饮', '2000', 'I LOVE IT', 'www.mcdonalds.com.cn', '../uploads/9915d9dafa42623c95e20ad3756fde17.jpg', '2015-09-15 00:00:00', '0');

-- ----------------------------
-- Table structure for `zp_cresumes`
-- ----------------------------
DROP TABLE IF EXISTS `zp_cresumes`;
CREATE TABLE `zp_cresumes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned NOT NULL,
  `cid` int(10) unsigned NOT NULL,
  `jobid` int(10) unsigned NOT NULL,
  `receivedtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zp_cresumes
-- ----------------------------
INSERT INTO `zp_cresumes` VALUES ('37', '13', '8', '15', '2016-06-10 02:58:19');
INSERT INTO `zp_cresumes` VALUES ('38', '13', '7', '23', '2016-06-10 03:03:25');
INSERT INTO `zp_cresumes` VALUES ('39', '13', '9', '18', '2016-06-10 03:08:52');
INSERT INTO `zp_cresumes` VALUES ('40', '13', '7', '24', '2016-06-10 03:17:18');
INSERT INTO `zp_cresumes` VALUES ('41', '12', '1', '13', '2016-06-10 03:40:28');
INSERT INTO `zp_cresumes` VALUES ('42', '13', '1', '13', '2016-06-10 14:01:06');
INSERT INTO `zp_cresumes` VALUES ('43', '12', '7', '23', '2016-06-10 16:29:46');
INSERT INTO `zp_cresumes` VALUES ('44', '12', '1', '14', '2016-06-12 03:13:06');

-- ----------------------------
-- Table structure for `zp_deliver`
-- ----------------------------
DROP TABLE IF EXISTS `zp_deliver`;
CREATE TABLE `zp_deliver` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned NOT NULL,
  `jobid` int(10) unsigned NOT NULL,
  `delivertime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zp_deliver
-- ----------------------------
INSERT INTO `zp_deliver` VALUES ('3', '13', '15', '2016-06-10 02:58:19');
INSERT INTO `zp_deliver` VALUES ('4', '13', '23', '2016-06-10 03:03:25');
INSERT INTO `zp_deliver` VALUES ('5', '13', '18', '2016-06-10 03:08:52');
INSERT INTO `zp_deliver` VALUES ('6', '13', '24', '2016-06-10 03:17:18');
INSERT INTO `zp_deliver` VALUES ('7', '12', '13', '2016-06-10 03:40:28');
INSERT INTO `zp_deliver` VALUES ('8', '13', '13', '2016-06-10 14:01:06');
INSERT INTO `zp_deliver` VALUES ('9', '12', '23', '2016-06-10 16:29:46');
INSERT INTO `zp_deliver` VALUES ('10', '12', '14', '2016-06-12 03:13:06');

-- ----------------------------
-- Table structure for `zp_jobs`
-- ----------------------------
DROP TABLE IF EXISTS `zp_jobs`;
CREATE TABLE `zp_jobs` (
  `jobid` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `jobname` varchar(20) DEFAULT NULL,
  `jobaddress` varchar(50) DEFAULT NULL,
  `jobcate` varchar(20) DEFAULT NULL,
  `jobdesc` varchar(500) DEFAULT NULL,
  `jobsubid` int(100) DEFAULT NULL,
  `jobpay` varchar(20) DEFAULT NULL,
  `jobtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `jobscan` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`jobid`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zp_jobs
-- ----------------------------
INSERT INTO `zp_jobs` VALUES ('13', 'web前端', '上海', '软件开发', '熟练使用HTML+CSS+JavaScript', '1', '6000', '2016-06-01 20:22:19', '99');
INSERT INTO `zp_jobs` VALUES ('14', '软件测试工程师', '上海', '测试', '要求必备的基础技能', '1', '4000', '2016-06-02 20:22:20', '88');
INSERT INTO `zp_jobs` VALUES ('15', '测试工程实习生', '北京', '技术', '岗位职责：\r\n1. 根据产品需求设计测试数据和测试用例；\r\n2. 完成产品及需求的测试上线及线上验证；\r\n3. 准确地定位并跟踪问题，推动问题及时合理地解决；\r\n4. 搭建、维护测试环境；\r\n任职资格：\r\n1. 统招本科、计算机相关专业，17年毕业；\r\n2. 了解测试用例设计、测试文档编写；\r\n3. 熟悉Linux环境 和 shell命令，能够独立搭建和维护测试环境；\r\n4. 熟悉数据库的基本操作、能编写常用sql命令；\r\n5. 具备较强的协调与沟通、分析与表达能力、能够推动测试进度；\r\n6. 熟悉测试代码、java语言设计、性能测试、安全测试等优先；\r\n7. 每周保证4-5天的实习时间。', '8', '6000', '2016-06-03 20:22:25', '77');
INSERT INTO `zp_jobs` VALUES ('16', '8778787', '北京', '金融', '岗位职责：\r\n1、辅助业务开展方案编写、实施及相关项目对外合作谈判并负责对合作项目的进度跟进、管理；\r\n2、辅助挖掘股票分析师及投顾经理，为京东股票的产品和服务寻找新的业务增长点；\r\n3、负责收集市场竞争对手的准确信息，制定对比方案、报告；\r\n4、支持对商务协议、合同的文件整理、进度督办、用印审批及存档工作。\r\n\r\n任职资格：\r\n1、重点院校金融相关专业；\r\n2、具有敏感的商业和市场意识，分析问题及解决问题能力强；\r\n3、在读大四或研一。', '8', '4000', '2016-06-04 20:22:27', '66');
INSERT INTO `zp_jobs` VALUES ('17', 'web前端工程师', '上海', '技术', '工作职责：\r\n1、熟悉html5、css3、div+css、原生JavaScript、熟悉jquery，熟悉W3C标准；             \r\n2、 移动端各类浏览器与手机机型适配和优化；                                                                 \r\n3、配合后台开发人员实现产品界面和功能；\r\n4、与后台程序配合，高效率高质量地完成前端页面的实现工作；\r\n5、根据设计的需求，制作网页动效。\r\n任职资格：\r\n1、本科（大三），硕士（研一、研二）在读；                                                                                        \r\n2、沟通能力强，责任心强，有较强的组织协调能力，能承受工作压力；                                                                      \r\n3、具备强烈地学习欲望和学习能力。', '8', '5000', '2016-06-05 20:22:29', '55');
INSERT INTO `zp_jobs` VALUES ('18', '英语编辑', '成都', '编辑', '参加过4、6级专四专八托福雅思(任意一种)考试，并达到过较高的分数（超高分会让我们看到你)\r\n脑子灵光，胆大心细\r\n善于沟通，能独立解决问题\r\n入职至少三个月，每周至少五天\r\n在校大学生\r\n\r\n如果你还喜欢看美剧，对英语学习有独到的见解和方法，就快拿简历砸我们吧', '9', '3000', '2016-06-06 20:22:31', '44');
INSERT INTO `zp_jobs` VALUES ('20', 'IOS工程师', '深圳', '软件开发', '52555555555555555', '9', '10000', '2016-06-07 20:22:33', '33');
INSERT INTO `zp_jobs` VALUES ('23', '百度糯米UX', '北京', '设计', '只要你是极客', '7', '10000', '2016-06-08 08:49:15', '59');
INSERT INTO `zp_jobs` VALUES ('24', 'ios工程师', '重庆', '来发', 'ios', '7', '5000', '2016-06-10 01:11:01', null);
INSERT INTO `zp_jobs` VALUES ('25', '办公室实习生', '海南', '行政', '岗位要求：\r\n1.招募全职实习生2名，性别不限；\r\n2.本科以上学历，专业为人力资源管理或工商管理类；\r\n3.英语4级以上，具有一定的英语阅读理解能力；\r\n4.细心、耐心、有较好的亲和力；\r\n5.具有较强的学习能力，对人力资源管理及行政管理有浓厚的兴趣；\r\n6.实习期最短要求为4个月；\r\n7.有驾照，会驾车者优先考虑；\r\n8.年龄：18-25岁；', '12', '5000', '2016-06-10 06:49:44', null);

-- ----------------------------
-- Table structure for `zp_personal`
-- ----------------------------
DROP TABLE IF EXISTS `zp_personal`;
CREATE TABLE `zp_personal` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `age` int(10) DEFAULT NULL,
  `gender` enum('男','女','保密') NOT NULL DEFAULT '保密',
  `edu` varchar(20) DEFAULT NULL,
  `tell` varchar(20) DEFAULT NULL,
  `major` varchar(20) DEFAULT NULL,
  `regtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zp_personal
-- ----------------------------
INSERT INTO `zp_personal` VALUES ('12', '777', '777', '寒冬', '35', '男', '博士', '18380447486', '计算机科学与技术', '2016-05-30 11:50:40');
INSERT INTO `zp_personal` VALUES ('13', 'pc', '2333', '郑鹏程', '22', '男', '本科', '17098334033', '软件工程', '2016-06-06 07:36:41');

-- ----------------------------
-- Table structure for `zp_resumes`
-- ----------------------------
DROP TABLE IF EXISTS `zp_resumes`;
CREATE TABLE `zp_resumes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `pid` int(10) NOT NULL,
  `resumepath` varchar(100) NOT NULL,
  `updatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zp_resumes
-- ----------------------------
INSERT INTO `zp_resumes` VALUES ('1', '12', '../uploads/27fb6e5b774c2cdf0bb33eb7e426699c.pdf', '2016-06-10 03:39:03');
INSERT INTO `zp_resumes` VALUES ('3', '13', '../uploads/408e51b97e53a77fb483cf462939942d.pdf', '2016-06-15 00:23:29');
