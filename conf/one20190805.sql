/*
SQLyog 企业版 - MySQL GUI v8.14 
MySQL - 5.1.73 : Database - one
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`one` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `one`;

/*Table structure for table `one_action` */

DROP TABLE IF EXISTS `one_action`;

CREATE TABLE `one_action` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` char(30) NOT NULL DEFAULT '' COMMENT '行为唯一标识',
  `title` char(80) NOT NULL DEFAULT '' COMMENT '行为说明',
  `remark` char(140) NOT NULL DEFAULT '' COMMENT '行为描述',
  `rule` text NOT NULL COMMENT '行为规则',
  `log` text NOT NULL COMMENT '日志规则',
  `type` tinyint(2) unsigned NOT NULL DEFAULT '1' COMMENT '类型',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '状态',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='系统行为表';

/*Data for the table `one_action` */

insert  into `one_action`(`id`,`name`,`title`,`remark`,`rule`,`log`,`type`,`status`,`update_time`) values (1,'user_login','用户登录','积分+10，每天一次','table:member|field:score|condition:uid={$self} AND status>-1|rule:score+10|cycle:24|max:1;','[user|get_nickname]在[time|time_format]登录了后台',1,1,1387181220),(2,'add_article','发布文章','积分+5，每天上限5次','table:member|field:score|condition:uid={$self}|rule:score+5|cycle:24|max:5','',2,0,1380173180),(3,'review','评论','评论积分+1，无限制','table:member|field:score|condition:uid={$self}|rule:score+1','',2,1,1383285646),(4,'add_document','发表文档','积分+10，每天上限5次','table:member|field:score|condition:uid={$self}|rule:score+10|cycle:24|max:5','[user|get_nickname]在[time|time_format]发表了一篇文章。\r\n表[model]，记录编号[record]。',2,0,1386139726),(5,'add_document_topic','发表讨论','积分+5，每天上限10次','table:member|field:score|condition:uid={$self}|rule:score+5|cycle:24|max:10','',2,0,1383285551),(6,'update_config','更新配置','新增或修改或删除配置','','',1,1,1383294988),(7,'update_model','更新模型','新增或修改模型','','',1,1,1383295057),(8,'update_attribute','更新属性','新增或更新或删除属性','','',1,1,1383295963),(9,'update_channel','更新导航','新增或修改或删除导航','','',1,1,1383296301),(10,'update_menu','更新菜单','新增或修改或删除菜单','','',1,1,1383296392),(11,'update_category','更新分类','新增或修改或删除分类','','',1,1,1383296765);

/*Table structure for table `one_action_log` */

DROP TABLE IF EXISTS `one_action_log`;

CREATE TABLE `one_action_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `action_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '行为id',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '执行用户id',
  `action_ip` bigint(20) NOT NULL COMMENT '执行行为者ip',
  `model` varchar(50) NOT NULL DEFAULT '' COMMENT '触发行为的表',
  `record_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '触发行为的数据id',
  `remark` varchar(255) NOT NULL DEFAULT '' COMMENT '日志备注',
  `status` tinyint(2) NOT NULL DEFAULT '1' COMMENT '状态',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '执行行为的时间',
  PRIMARY KEY (`id`),
  KEY `action_ip_ix` (`action_ip`),
  KEY `action_id_ix` (`action_id`),
  KEY `user_id_ix` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=69 DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED COMMENT='行为日志表';

/*Data for the table `one_action_log` */

insert  into `one_action_log`(`id`,`action_id`,`user_id`,`action_ip`,`model`,`record_id`,`remark`,`status`,`create_time`) values (1,1,1,2130706433,'member',1,'admin在2016-11-24 20:36登录了后台',1,1479990977),(2,1,1,2130706433,'member',1,'admin在2016-11-24 21:22登录了后台',1,1479993746),(3,1,1,2130706433,'member',1,'admin在2016-11-28 08:50登录了后台',1,1480294251),(4,7,1,2130706433,'model',3,'操作url：/Admin/Model/update.html',1,1480294560),(5,9,1,2130706433,'channel',0,'操作url：/Admin/Channel/del/id/3.html',1,1480294808),(6,9,1,2130706433,'channel',0,'操作url：/Admin/Channel/del/id/2.html',1,1480294812),(7,9,1,2130706433,'channel',0,'操作url：/Admin/Channel/del/id/1.html',1,1480294816),(8,10,1,2130706433,'Menu',0,'操作url：/Admin/Menu/del/id/43.html',1,1480294822),(9,10,1,2130706433,'Menu',0,'操作url：/Admin/Menu/del/id/93.html',1,1480294826),(10,10,1,2130706433,'Menu',0,'操作url：/Admin/Menu/del/id/2.html',1,1480294842),(11,1,1,2130706433,'member',1,'admin在2016-11-28 21:42登录了后台',1,1480340555),(12,10,1,2130706433,'Menu',122,'操作url：/Admin/Menu/add.html',1,1480342207),(13,10,1,2130706433,'Menu',122,'操作url：/Admin/Menu/edit.html',1,1480342235),(14,10,1,2130706433,'Menu',122,'操作url：/Admin/Menu/edit.html',1,1480342247),(15,10,1,2130706433,'Menu',68,'操作url：/Admin/Menu/edit.html',1,1480342260),(16,10,1,2130706433,'Menu',122,'操作url：/Admin/Menu/edit.html',1,1480342326),(17,10,1,2130706433,'Menu',122,'操作url：/Admin/Menu/edit.html',1,1480342356),(18,10,1,2130706433,'Menu',123,'操作url：/Admin/Menu/add.html',1,1480342405),(19,10,1,2130706433,'Menu',124,'操作url：/Admin/Menu/add.html',1,1480342449),(20,10,1,2130706433,'Menu',124,'操作url：/Admin/Menu/edit.html',1,1480342460),(21,10,1,2130706433,'Menu',123,'操作url：/Admin/Menu/edit.html',1,1480342475),(22,10,1,2130706433,'Menu',123,'操作url：/Admin/Menu/edit.html',1,1480342496),(23,10,1,2130706433,'Menu',124,'操作url：/Admin/Menu/edit.html',1,1480342509),(24,1,2,2130706433,'member',2,'scut在2016-11-29 08:51登录了后台',1,1480380695),(25,1,1,2130706433,'member',1,'admin在2016-11-29 08:51登录了后台',1,1480380718),(26,1,2,2130706433,'member',2,'scut在2016-11-29 08:54登录了后台',1,1480380876),(27,1,2,2130706433,'member',2,'scut在2016-11-29 08:56登录了后台',1,1480381006),(28,10,1,2130706433,'Menu',123,'操作url：/Admin/Menu/edit.html',1,1480487826),(29,1,1,2130706433,'member',1,'admin在2016-12-02 11:11登录了后台',1,1480648301),(30,1,1,2130706433,'member',1,'admin在2016-12-05 11:29登录了后台',1,1480908598),(31,10,1,2130706433,'Menu',0,'操作url：/Admin/Menu/del/id/124.html<br>',1,1480908735),(32,10,1,2130706433,'Menu',123,'操作url：/Admin/Menu/edit.html<br>',1,1480908745),(33,1,1,2130706433,'member',1,'admin在2016-12-27 17:23登录了后台',1,1482830581),(34,1,1,2130706433,'member',1,'admin在2017-07-25 18:13登录了后台',1,1500977595),(35,1,1,2130706433,'member',1,'admin在2017-07-26 11:01登录了后台',1,1501038060),(36,1,1,2130706433,'member',1,'admin在2017-07-26 16:54登录了后台',1,1501059267),(37,1,1,2130706433,'member',1,'admin在2017-09-14 16:21登录了后台',1,1505377303),(38,1,1,167772674,'member',1,'admin在2017-09-21 16:00登录了后台',1,1505980839),(39,1,1,-1220565862,'member',1,'admin在2017-09-21 16:05登录了后台',1,1505981159),(40,1,1,-1220565862,'member',1,'admin在2017-09-27 11:26登录了后台',1,1506482790),(41,1,1,167772674,'member',1,'admin在2017-09-27 14:27登录了后台',1,1506493626),(42,1,1,167772674,'member',1,'admin在2017-10-10 14:15登录了后台',1,1507616119),(43,10,1,167772674,'Menu',68,'操作url：/Admin/Menu/edit.html',1,1507617370),(44,10,1,167772674,'Menu',16,'操作url：/Admin/Menu/edit.html',1,1507618753),(45,10,1,167772674,'Menu',0,'操作url：/Admin/Menu/del/id/1.html',1,1507618772),(46,1,1,167772674,'member',1,'admin在2017-10-10 15:32登录了后台',1,1507620727),(47,1,1,167772674,'member',1,'admin在2017-10-13 09:20登录了后台',1,1507857639),(48,10,1,167772674,'Menu',127,'操作url：/Admin/Menu/add.html',1,1507857777),(49,10,1,167772674,'Menu',128,'操作url：/Admin/Menu/add.html',1,1507857848),(50,10,1,167772674,'Menu',127,'操作url：/Admin/Menu/edit.html',1,1507857871),(51,10,1,167772674,'Menu',124,'操作url：/Admin/Menu/edit.html',1,1507857884),(52,10,1,167772674,'Menu',125,'操作url：/Admin/Menu/edit.html',1,1507857891),(53,10,1,167772674,'Menu',125,'操作url：/Admin/Menu/edit.html',1,1507857902),(54,10,1,167772674,'Menu',125,'操作url：/Admin/Menu/edit.html',1,1507857923),(55,10,1,167772674,'Menu',126,'操作url：/Admin/Menu/edit.html',1,1507857939),(56,10,1,167772674,'Menu',123,'操作url：/Admin/Menu/edit.html',1,1507857949),(57,10,1,167772674,'Menu',127,'操作url：/Admin/Menu/edit.html',1,1507857974),(58,1,1,-1220565862,'member',1,'admin在2017-10-13 09:29登录了后台',1,1507858149),(59,10,1,-1220565862,'Menu',122,'操作url：/Admin/Menu/edit.html',1,1507858235),(60,1,1,-1220565862,'member',1,'admin在2017-11-16 17:20登录了后台',1,1510824014),(61,1,1,-1220565862,'member',1,'admin在2017-11-16 17:21登录了后台',1,1510824072),(62,1,1,-1220565862,'member',1,'admin在2017-11-16 17:22登录了后台',1,1510824123),(63,1,1,-1220565862,'member',1,'admin在2017-11-16 17:22登录了后台',1,1510824170),(64,1,1,-899076238,'member',1,'admin在2017-12-02 16:25登录了后台',1,1512203146),(65,10,1,-899076238,'Menu',127,'操作url：/Admin/Menu/edit.html',1,1512203788),(66,10,1,-899076238,'Menu',127,'操作url：/Admin/Menu/edit.html',1,1512203794),(67,10,1,-899076238,'Menu',128,'操作url：/Admin/Menu/edit.html',1,1512203806),(68,1,1,-1220565862,'member',1,'admin在2017-12-06 12:26登录了后台',1,1512534378);

/*Table structure for table `one_addons` */

DROP TABLE IF EXISTS `one_addons`;

CREATE TABLE `one_addons` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(40) NOT NULL COMMENT '插件名或标识',
  `title` varchar(20) NOT NULL DEFAULT '' COMMENT '中文名',
  `description` text COMMENT '插件描述',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态',
  `config` text COMMENT '配置',
  `author` varchar(40) DEFAULT '' COMMENT '作者',
  `version` varchar(20) DEFAULT '' COMMENT '版本号',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '安装时间',
  `has_adminlist` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否有后台列表',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COMMENT='插件表';

/*Data for the table `one_addons` */

insert  into `one_addons`(`id`,`name`,`title`,`description`,`status`,`config`,`author`,`version`,`create_time`,`has_adminlist`) values (15,'EditorForAdmin','后台编辑器','用于增强整站长文本的输入和显示',1,'{\"editor_type\":\"2\",\"editor_wysiwyg\":\"1\",\"editor_height\":\"500px\",\"editor_resize_type\":\"1\"}','thinkphp','0.1',1383126253,0),(2,'SiteStat','站点统计信息','统计站点的基础信息',1,'{\"title\":\"\\u7cfb\\u7edf\\u4fe1\\u606f\",\"width\":\"1\",\"display\":\"1\",\"status\":\"0\"}','thinkphp','0.1',1379512015,0),(3,'DevTeam','开发团队信息','开发团队成员信息',1,'{\"title\":\"OneThink\\u5f00\\u53d1\\u56e2\\u961f\",\"width\":\"2\",\"display\":\"1\"}','thinkphp','0.1',1379512022,0),(4,'SystemInfo','系统环境信息','用于显示一些服务器的信息',1,'{\"title\":\"\\u7cfb\\u7edf\\u4fe1\\u606f\",\"width\":\"2\",\"display\":\"1\"}','thinkphp','0.1',1379512036,0),(5,'Editor','前台编辑器','用于增强整站长文本的输入和显示',1,'{\"editor_type\":\"2\",\"editor_wysiwyg\":\"1\",\"editor_height\":\"300px\",\"editor_resize_type\":\"1\"}','thinkphp','0.1',1379830910,0),(6,'Attachment','附件','用于文档模型上传附件',1,'null','thinkphp','0.1',1379842319,1),(9,'SocialComment','通用社交化评论','集成了各种社交化评论插件，轻松集成到系统中。',1,'{\"comment_type\":\"1\",\"comment_uid_youyan\":\"\",\"comment_short_name_duoshuo\":\"\",\"comment_data_list_duoshuo\":\"\"}','thinkphp','0.1',1380273962,0);

/*Table structure for table `one_attachment` */

DROP TABLE IF EXISTS `one_attachment`;

CREATE TABLE `one_attachment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
  `title` char(30) NOT NULL DEFAULT '' COMMENT '附件显示名',
  `type` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '附件类型',
  `source` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '资源ID',
  `record_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '关联记录ID',
  `download` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '下载次数',
  `size` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '附件大小',
  `dir` int(12) unsigned NOT NULL DEFAULT '0' COMMENT '上级目录ID',
  `sort` int(8) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`),
  KEY `idx_record_status` (`record_id`,`status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='附件表';

/*Data for the table `one_attachment` */

/*Table structure for table `one_attribute` */

DROP TABLE IF EXISTS `one_attribute`;

CREATE TABLE `one_attribute` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '字段名',
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '字段注释',
  `field` varchar(100) NOT NULL DEFAULT '' COMMENT '字段定义',
  `type` varchar(20) NOT NULL DEFAULT '' COMMENT '数据类型',
  `value` varchar(100) NOT NULL DEFAULT '' COMMENT '字段默认值',
  `remark` varchar(100) NOT NULL DEFAULT '' COMMENT '备注',
  `is_show` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否显示',
  `extra` varchar(255) NOT NULL DEFAULT '' COMMENT '参数',
  `model_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '模型id',
  `is_must` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否必填',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '状态',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `validate_rule` varchar(255) NOT NULL,
  `validate_time` tinyint(1) unsigned NOT NULL,
  `error_info` varchar(100) NOT NULL,
  `validate_type` varchar(25) NOT NULL,
  `auto_rule` varchar(100) NOT NULL,
  `auto_time` tinyint(1) unsigned NOT NULL,
  `auto_type` varchar(25) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `model_id` (`model_id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COMMENT='模型属性表';

/*Data for the table `one_attribute` */

insert  into `one_attribute`(`id`,`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) values (1,'uid','用户ID','int(10) unsigned NOT NULL ','num','0','',0,'',1,0,1,1384508362,1383891233,'',0,'','','',0,''),(2,'name','标识','char(40) NOT NULL ','string','','同一根节点下标识不重复',1,'',1,0,1,1383894743,1383891233,'',0,'','','',0,''),(3,'title','标题','char(80) NOT NULL ','string','','文档标题',1,'',1,0,1,1383894778,1383891233,'',0,'','','',0,''),(4,'category_id','所属分类','int(10) unsigned NOT NULL ','string','','',0,'',1,0,1,1384508336,1383891233,'',0,'','','',0,''),(5,'description','描述','char(140) NOT NULL ','textarea','','',1,'',1,0,1,1383894927,1383891233,'',0,'','','',0,''),(6,'root','根节点','int(10) unsigned NOT NULL ','num','0','该文档的顶级文档编号',0,'',1,0,1,1384508323,1383891233,'',0,'','','',0,''),(7,'pid','所属ID','int(10) unsigned NOT NULL ','num','0','父文档编号',0,'',1,0,1,1384508543,1383891233,'',0,'','','',0,''),(8,'model_id','内容模型ID','tinyint(3) unsigned NOT NULL ','num','0','该文档所对应的模型',0,'',1,0,1,1384508350,1383891233,'',0,'','','',0,''),(9,'type','内容类型','tinyint(3) unsigned NOT NULL ','select','2','',1,'1:目录\r\n2:主题\r\n3:段落',1,0,1,1384511157,1383891233,'',0,'','','',0,''),(10,'position','推荐位','smallint(5) unsigned NOT NULL ','checkbox','0','多个推荐则将其推荐值相加',1,'1:列表推荐\r\n2:频道页推荐\r\n4:首页推荐',1,0,1,1383895640,1383891233,'',0,'','','',0,''),(11,'link_id','外链','int(10) unsigned NOT NULL ','num','0','0-非外链，大于0-外链ID,需要函数进行链接与编号的转换',1,'',1,0,1,1383895757,1383891233,'',0,'','','',0,''),(12,'cover_id','封面','int(10) unsigned NOT NULL ','picture','0','0-无封面，大于0-封面图片ID，需要函数处理',1,'',1,0,1,1384147827,1383891233,'',0,'','','',0,''),(13,'display','可见性','tinyint(3) unsigned NOT NULL ','radio','1','',1,'0:不可见\r\n1:所有人可见',1,0,1,1386662271,1383891233,'',0,'','regex','',0,'function'),(14,'deadline','截至时间','int(10) unsigned NOT NULL ','datetime','0','0-永久有效',1,'',1,0,1,1387163248,1383891233,'',0,'','regex','',0,'function'),(15,'attach','附件数量','tinyint(3) unsigned NOT NULL ','num','0','',0,'',1,0,1,1387260355,1383891233,'',0,'','regex','',0,'function'),(16,'view','浏览量','int(10) unsigned NOT NULL ','num','0','',1,'',1,0,1,1383895835,1383891233,'',0,'','','',0,''),(17,'comment','评论数','int(10) unsigned NOT NULL ','num','0','',1,'',1,0,1,1383895846,1383891233,'',0,'','','',0,''),(18,'extend','扩展统计字段','int(10) unsigned NOT NULL ','num','0','根据需求自行使用',0,'',1,0,1,1384508264,1383891233,'',0,'','','',0,''),(19,'level','优先级','int(10) unsigned NOT NULL ','num','0','越高排序越靠前',1,'',1,0,1,1383895894,1383891233,'',0,'','','',0,''),(20,'create_time','创建时间','int(10) unsigned NOT NULL ','datetime','0','',1,'',1,0,1,1383895903,1383891233,'',0,'','','',0,''),(21,'update_time','更新时间','int(10) unsigned NOT NULL ','datetime','0','',0,'',1,0,1,1384508277,1383891233,'',0,'','','',0,''),(22,'status','数据状态','tinyint(4) NOT NULL ','radio','0','',0,'-1:删除\r\n0:禁用\r\n1:正常\r\n2:待审核\r\n3:草稿',1,0,1,1384508496,1383891233,'',0,'','','',0,''),(23,'parse','内容解析类型','tinyint(3) unsigned NOT NULL ','select','0','',0,'0:html\r\n1:ubb\r\n2:markdown',2,0,1,1384511049,1383891243,'',0,'','','',0,''),(24,'content','文章内容','text NOT NULL ','editor','','',1,'',2,0,1,1383896225,1383891243,'',0,'','','',0,''),(25,'template','详情页显示模板','varchar(100) NOT NULL ','string','','参照display方法参数的定义',1,'',2,0,1,1383896190,1383891243,'',0,'','','',0,''),(26,'bookmark','收藏数','int(10) unsigned NOT NULL ','num','0','',1,'',2,0,1,1383896103,1383891243,'',0,'','','',0,''),(27,'parse','内容解析类型','tinyint(3) unsigned NOT NULL ','select','0','',0,'0:html\r\n1:ubb\r\n2:markdown',3,0,1,1387260461,1383891252,'',0,'','regex','',0,'function'),(28,'content','下载详细描述','text NOT NULL ','editor','','',1,'',3,0,1,1383896438,1383891252,'',0,'','','',0,''),(29,'template','详情页显示模板','varchar(100) NOT NULL ','string','','',1,'',3,0,1,1383896429,1383891252,'',0,'','','',0,''),(30,'file_id','文件ID','int(10) unsigned NOT NULL ','file','0','需要函数处理',1,'',3,0,1,1383896415,1383891252,'',0,'','','',0,''),(31,'download','下载次数','int(10) unsigned NOT NULL ','num','0','',1,'',3,0,1,1383896380,1383891252,'',0,'','','',0,''),(32,'size','文件大小','bigint(20) unsigned NOT NULL ','num','0','单位bit',1,'',3,0,1,1383896371,1383891252,'',0,'','','',0,'');

/*Table structure for table `one_auth_extend` */

DROP TABLE IF EXISTS `one_auth_extend`;

CREATE TABLE `one_auth_extend` (
  `group_id` mediumint(10) unsigned NOT NULL COMMENT '用户id',
  `extend_id` mediumint(8) unsigned NOT NULL COMMENT '扩展表中数据的id',
  `type` tinyint(1) unsigned NOT NULL COMMENT '扩展类型标识 1:栏目分类权限;2:模型权限',
  UNIQUE KEY `group_extend_type` (`group_id`,`extend_id`,`type`),
  KEY `uid` (`group_id`),
  KEY `group_id` (`extend_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户组与分类的对应关系表';

/*Data for the table `one_auth_extend` */

insert  into `one_auth_extend`(`group_id`,`extend_id`,`type`) values (1,1,1),(1,1,2),(1,2,1),(1,2,2),(1,3,1),(1,3,2),(1,4,1),(1,37,1);

/*Table structure for table `one_auth_group` */

DROP TABLE IF EXISTS `one_auth_group`;

CREATE TABLE `one_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户组id,自增主键',
  `module` varchar(20) NOT NULL COMMENT '用户组所属模块',
  `type` tinyint(4) NOT NULL COMMENT '组类型',
  `title` char(20) NOT NULL DEFAULT '' COMMENT '用户组中文名称',
  `description` varchar(80) NOT NULL DEFAULT '' COMMENT '描述信息',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '用户组状态：为1正常，为0禁用,-1为删除',
  `rules` varchar(500) NOT NULL DEFAULT '' COMMENT '用户组拥有的规则id，多个规则 , 隔开',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `one_auth_group` */

insert  into `one_auth_group`(`id`,`module`,`type`,`title`,`description`,`status`,`rules`) values (1,'admin',1,'默认用户组','',1,'1,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,80,81,82,83,84,86,87,88,89,90,91,92,93,94,95,100,102,103,217,218,219'),(2,'admin',1,'测试用户','测试用户',1,'1,217,218,219');

/*Table structure for table `one_auth_group_access` */

DROP TABLE IF EXISTS `one_auth_group_access`;

CREATE TABLE `one_auth_group_access` (
  `uid` int(10) unsigned NOT NULL COMMENT '用户id',
  `group_id` mediumint(8) unsigned NOT NULL COMMENT '用户组id',
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `one_auth_group_access` */

insert  into `one_auth_group_access`(`uid`,`group_id`) values (2,2);

/*Table structure for table `one_auth_rule` */

DROP TABLE IF EXISTS `one_auth_rule`;

CREATE TABLE `one_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '规则id,自增主键',
  `module` varchar(20) NOT NULL COMMENT '规则所属module',
  `type` tinyint(2) NOT NULL DEFAULT '1' COMMENT '1-url;2-主菜单',
  `name` char(80) NOT NULL DEFAULT '' COMMENT '规则唯一英文标识',
  `title` char(20) NOT NULL DEFAULT '' COMMENT '规则中文描述',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否有效(0:无效,1:有效)',
  `condition` varchar(300) NOT NULL DEFAULT '' COMMENT '规则附加条件',
  PRIMARY KEY (`id`),
  KEY `module` (`module`,`status`,`type`)
) ENGINE=MyISAM AUTO_INCREMENT=220 DEFAULT CHARSET=utf8;

/*Data for the table `one_auth_rule` */

insert  into `one_auth_rule`(`id`,`module`,`type`,`name`,`title`,`status`,`condition`) values (1,'admin',2,'Admin/Index/index','首页',1,''),(2,'admin',2,'Admin/Article/mydocument','内容',-1,''),(3,'admin',2,'Admin/User/index','用户',1,''),(4,'admin',2,'Admin/Addons/index','扩展',-1,''),(5,'admin',2,'Admin/Config/group','系统',1,''),(7,'admin',1,'Admin/article/add','新增',1,''),(8,'admin',1,'Admin/article/edit','编辑',1,''),(9,'admin',1,'Admin/article/setStatus','改变状态',1,''),(10,'admin',1,'Admin/article/update','保存',1,''),(11,'admin',1,'Admin/article/autoSave','保存草稿',1,''),(12,'admin',1,'Admin/article/move','移动',1,''),(13,'admin',1,'Admin/article/copy','复制',1,''),(14,'admin',1,'Admin/article/paste','粘贴',1,''),(15,'admin',1,'Admin/article/permit','还原',1,''),(16,'admin',1,'Admin/article/clear','清空',1,''),(17,'admin',1,'Admin/article/index','文档列表',1,''),(18,'admin',1,'Admin/article/recycle','回收站',1,''),(19,'admin',1,'Admin/User/addaction','新增用户行为',1,''),(20,'admin',1,'Admin/User/editaction','编辑用户行为',1,''),(21,'admin',1,'Admin/User/saveAction','保存用户行为',1,''),(22,'admin',1,'Admin/User/setStatus','变更行为状态',1,''),(23,'admin',1,'Admin/User/changeStatus?method=forbidUser','禁用会员',1,''),(24,'admin',1,'Admin/User/changeStatus?method=resumeUser','启用会员',1,''),(25,'admin',1,'Admin/User/changeStatus?method=deleteUser','删除会员',1,''),(26,'admin',1,'Admin/User/index','用户信息',1,''),(27,'admin',1,'Admin/User/action','用户行为',1,''),(28,'admin',1,'Admin/AuthManager/changeStatus?method=deleteGroup','删除',1,''),(29,'admin',1,'Admin/AuthManager/changeStatus?method=forbidGroup','禁用',1,''),(30,'admin',1,'Admin/AuthManager/changeStatus?method=resumeGroup','恢复',1,''),(31,'admin',1,'Admin/AuthManager/createGroup','新增',1,''),(32,'admin',1,'Admin/AuthManager/editGroup','编辑',1,''),(33,'admin',1,'Admin/AuthManager/writeGroup','保存用户组',1,''),(34,'admin',1,'Admin/AuthManager/group','授权',1,''),(35,'admin',1,'Admin/AuthManager/access','访问授权',1,''),(36,'admin',1,'Admin/AuthManager/user','成员授权',1,''),(37,'admin',1,'Admin/AuthManager/removeFromGroup','解除授权',1,''),(38,'admin',1,'Admin/AuthManager/addToGroup','保存成员授权',1,''),(39,'admin',1,'Admin/AuthManager/category','分类授权',1,''),(40,'admin',1,'Admin/AuthManager/addToCategory','保存分类授权',1,''),(41,'admin',1,'Admin/AuthManager/index','权限管理',1,''),(42,'admin',1,'Admin/Addons/create','创建',1,''),(43,'admin',1,'Admin/Addons/checkForm','检测创建',1,''),(44,'admin',1,'Admin/Addons/preview','预览',1,''),(45,'admin',1,'Admin/Addons/build','快速生成插件',1,''),(46,'admin',1,'Admin/Addons/config','设置',1,''),(47,'admin',1,'Admin/Addons/disable','禁用',1,''),(48,'admin',1,'Admin/Addons/enable','启用',1,''),(49,'admin',1,'Admin/Addons/install','安装',1,''),(50,'admin',1,'Admin/Addons/uninstall','卸载',1,''),(51,'admin',1,'Admin/Addons/saveconfig','更新配置',1,''),(52,'admin',1,'Admin/Addons/adminList','插件后台列表',1,''),(53,'admin',1,'Admin/Addons/execute','URL方式访问插件',1,''),(54,'admin',1,'Admin/Addons/index','插件管理',1,''),(55,'admin',1,'Admin/Addons/hooks','钩子管理',1,''),(56,'admin',1,'Admin/model/add','新增',1,''),(57,'admin',1,'Admin/model/edit','编辑',1,''),(58,'admin',1,'Admin/model/setStatus','改变状态',1,''),(59,'admin',1,'Admin/model/update','保存数据',1,''),(60,'admin',1,'Admin/Model/index','模型管理',1,''),(61,'admin',1,'Admin/Config/edit','编辑',1,''),(62,'admin',1,'Admin/Config/del','删除',1,''),(63,'admin',1,'Admin/Config/add','新增',1,''),(64,'admin',1,'Admin/Config/save','保存',1,''),(65,'admin',1,'Admin/Config/group','网站设置',1,''),(66,'admin',1,'Admin/Config/index','配置管理',1,''),(67,'admin',1,'Admin/Channel/add','新增',1,''),(68,'admin',1,'Admin/Channel/edit','编辑',1,''),(69,'admin',1,'Admin/Channel/del','删除',1,''),(70,'admin',1,'Admin/Channel/index','导航管理',1,''),(71,'admin',1,'Admin/Category/edit','编辑',1,''),(72,'admin',1,'Admin/Category/add','新增',1,''),(73,'admin',1,'Admin/Category/remove','删除',1,''),(74,'admin',1,'Admin/Category/index','分类管理',1,''),(75,'admin',1,'Admin/file/upload','上传控件',-1,''),(76,'admin',1,'Admin/file/uploadPicture','上传图片',-1,''),(77,'admin',1,'Admin/file/download','下载',-1,''),(94,'admin',1,'Admin/AuthManager/modelauth','模型授权',1,''),(79,'admin',1,'Admin/article/batchOperate','导入',1,''),(80,'admin',1,'Admin/Database/index?type=export','备份数据库',1,''),(81,'admin',1,'Admin/Database/index?type=import','还原数据库',1,''),(82,'admin',1,'Admin/Database/export','备份',1,''),(83,'admin',1,'Admin/Database/optimize','优化表',1,''),(84,'admin',1,'Admin/Database/repair','修复表',1,''),(86,'admin',1,'Admin/Database/import','恢复',1,''),(87,'admin',1,'Admin/Database/del','删除',1,''),(88,'admin',1,'Admin/User/add','新增用户',1,''),(89,'admin',1,'Admin/Attribute/index','属性管理',1,''),(90,'admin',1,'Admin/Attribute/add','新增',1,''),(91,'admin',1,'Admin/Attribute/edit','编辑',1,''),(92,'admin',1,'Admin/Attribute/setStatus','改变状态',1,''),(93,'admin',1,'Admin/Attribute/update','保存数据',1,''),(95,'admin',1,'Admin/AuthManager/addToModel','保存模型授权',1,''),(96,'admin',1,'Admin/Category/move','移动',-1,''),(97,'admin',1,'Admin/Category/merge','合并',-1,''),(98,'admin',1,'Admin/Config/menu','后台菜单管理',-1,''),(99,'admin',1,'Admin/Article/mydocument','内容',-1,''),(100,'admin',1,'Admin/Menu/index','菜单管理',1,''),(101,'admin',1,'Admin/other','其他',-1,''),(102,'admin',1,'Admin/Menu/add','新增',1,''),(103,'admin',1,'Admin/Menu/edit','编辑',1,''),(104,'admin',1,'Admin/Think/lists?model=article','文章管理',-1,''),(105,'admin',1,'Admin/Think/lists?model=download','下载管理',1,''),(106,'admin',1,'Admin/Think/lists?model=config','配置管理',1,''),(107,'admin',1,'Admin/Action/actionlog','行为日志',1,''),(108,'admin',1,'Admin/User/updatePassword','修改密码',1,''),(109,'admin',1,'Admin/User/updateNickname','修改昵称',1,''),(110,'admin',1,'Admin/action/edit','查看行为日志',1,''),(205,'admin',1,'Admin/think/add','新增数据',1,''),(111,'admin',2,'Admin/article/index','文档列表',-1,''),(112,'admin',2,'Admin/article/add','新增',-1,''),(113,'admin',2,'Admin/article/edit','编辑',-1,''),(114,'admin',2,'Admin/article/setStatus','改变状态',-1,''),(115,'admin',2,'Admin/article/update','保存',-1,''),(116,'admin',2,'Admin/article/autoSave','保存草稿',-1,''),(117,'admin',2,'Admin/article/move','移动',-1,''),(118,'admin',2,'Admin/article/copy','复制',-1,''),(119,'admin',2,'Admin/article/paste','粘贴',-1,''),(120,'admin',2,'Admin/article/batchOperate','导入',-1,''),(121,'admin',2,'Admin/article/recycle','回收站',-1,''),(122,'admin',2,'Admin/article/permit','还原',-1,''),(123,'admin',2,'Admin/article/clear','清空',-1,''),(124,'admin',2,'Admin/User/add','新增用户',-1,''),(125,'admin',2,'Admin/User/action','用户行为',-1,''),(126,'admin',2,'Admin/User/addAction','新增用户行为',-1,''),(127,'admin',2,'Admin/User/editAction','编辑用户行为',-1,''),(128,'admin',2,'Admin/User/saveAction','保存用户行为',-1,''),(129,'admin',2,'Admin/User/setStatus','变更行为状态',-1,''),(130,'admin',2,'Admin/User/changeStatus?method=forbidUser','禁用会员',-1,''),(131,'admin',2,'Admin/User/changeStatus?method=resumeUser','启用会员',-1,''),(132,'admin',2,'Admin/User/changeStatus?method=deleteUser','删除会员',-1,''),(133,'admin',2,'Admin/AuthManager/index','权限管理',-1,''),(134,'admin',2,'Admin/AuthManager/changeStatus?method=deleteGroup','删除',-1,''),(135,'admin',2,'Admin/AuthManager/changeStatus?method=forbidGroup','禁用',-1,''),(136,'admin',2,'Admin/AuthManager/changeStatus?method=resumeGroup','恢复',-1,''),(137,'admin',2,'Admin/AuthManager/createGroup','新增',-1,''),(138,'admin',2,'Admin/AuthManager/editGroup','编辑',-1,''),(139,'admin',2,'Admin/AuthManager/writeGroup','保存用户组',-1,''),(140,'admin',2,'Admin/AuthManager/group','授权',-1,''),(141,'admin',2,'Admin/AuthManager/access','访问授权',-1,''),(142,'admin',2,'Admin/AuthManager/user','成员授权',-1,''),(143,'admin',2,'Admin/AuthManager/removeFromGroup','解除授权',-1,''),(144,'admin',2,'Admin/AuthManager/addToGroup','保存成员授权',-1,''),(145,'admin',2,'Admin/AuthManager/category','分类授权',-1,''),(146,'admin',2,'Admin/AuthManager/addToCategory','保存分类授权',-1,''),(147,'admin',2,'Admin/AuthManager/modelauth','模型授权',-1,''),(148,'admin',2,'Admin/AuthManager/addToModel','保存模型授权',-1,''),(149,'admin',2,'Admin/Addons/create','创建',-1,''),(150,'admin',2,'Admin/Addons/checkForm','检测创建',-1,''),(151,'admin',2,'Admin/Addons/preview','预览',-1,''),(152,'admin',2,'Admin/Addons/build','快速生成插件',-1,''),(153,'admin',2,'Admin/Addons/config','设置',-1,''),(154,'admin',2,'Admin/Addons/disable','禁用',-1,''),(155,'admin',2,'Admin/Addons/enable','启用',-1,''),(156,'admin',2,'Admin/Addons/install','安装',-1,''),(157,'admin',2,'Admin/Addons/uninstall','卸载',-1,''),(158,'admin',2,'Admin/Addons/saveconfig','更新配置',-1,''),(159,'admin',2,'Admin/Addons/adminList','插件后台列表',-1,''),(160,'admin',2,'Admin/Addons/execute','URL方式访问插件',-1,''),(161,'admin',2,'Admin/Addons/hooks','钩子管理',-1,''),(162,'admin',2,'Admin/Model/index','模型管理',-1,''),(163,'admin',2,'Admin/model/add','新增',-1,''),(164,'admin',2,'Admin/model/edit','编辑',-1,''),(165,'admin',2,'Admin/model/setStatus','改变状态',-1,''),(166,'admin',2,'Admin/model/update','保存数据',-1,''),(167,'admin',2,'Admin/Attribute/index','属性管理',-1,''),(168,'admin',2,'Admin/Attribute/add','新增',-1,''),(169,'admin',2,'Admin/Attribute/edit','编辑',-1,''),(170,'admin',2,'Admin/Attribute/setStatus','改变状态',-1,''),(171,'admin',2,'Admin/Attribute/update','保存数据',-1,''),(172,'admin',2,'Admin/Config/index','配置管理',-1,''),(173,'admin',2,'Admin/Config/edit','编辑',-1,''),(174,'admin',2,'Admin/Config/del','删除',-1,''),(175,'admin',2,'Admin/Config/add','新增',-1,''),(176,'admin',2,'Admin/Config/save','保存',-1,''),(177,'admin',2,'Admin/Menu/index','菜单管理',-1,''),(178,'admin',2,'Admin/Channel/index','导航管理',-1,''),(179,'admin',2,'Admin/Channel/add','新增',-1,''),(180,'admin',2,'Admin/Channel/edit','编辑',-1,''),(181,'admin',2,'Admin/Channel/del','删除',-1,''),(182,'admin',2,'Admin/Category/index','分类管理',-1,''),(183,'admin',2,'Admin/Category/edit','编辑',-1,''),(184,'admin',2,'Admin/Category/add','新增',-1,''),(185,'admin',2,'Admin/Category/remove','删除',-1,''),(186,'admin',2,'Admin/Category/move','移动',-1,''),(187,'admin',2,'Admin/Category/merge','合并',-1,''),(188,'admin',2,'Admin/Database/index?type=export','备份数据库',-1,''),(189,'admin',2,'Admin/Database/export','备份',-1,''),(190,'admin',2,'Admin/Database/optimize','优化表',-1,''),(191,'admin',2,'Admin/Database/repair','修复表',-1,''),(192,'admin',2,'Admin/Database/index?type=import','还原数据库',-1,''),(193,'admin',2,'Admin/Database/import','恢复',-1,''),(194,'admin',2,'Admin/Database/del','删除',-1,''),(195,'admin',2,'Admin/other','其他',-1,''),(196,'admin',2,'Admin/Menu/add','新增',-1,''),(197,'admin',2,'Admin/Menu/edit','编辑',-1,''),(198,'admin',2,'Admin/Think/lists?model=article','应用',-1,''),(199,'admin',2,'Admin/Think/lists?model=download','下载管理',-1,''),(200,'admin',2,'Admin/Think/lists?model=config','应用',-1,''),(201,'admin',2,'Admin/Action/actionlog','行为日志',-1,''),(202,'admin',2,'Admin/User/updatePassword','修改密码',-1,''),(203,'admin',2,'Admin/User/updateNickname','修改昵称',-1,''),(204,'admin',2,'Admin/action/edit','查看行为日志',-1,''),(206,'admin',1,'Admin/think/edit','编辑数据',1,''),(207,'admin',1,'Admin/Menu/import','导入',1,''),(208,'admin',1,'Admin/Model/generate','生成',1,''),(209,'admin',1,'Admin/Addons/addHook','新增钩子',1,''),(210,'admin',1,'Admin/Addons/edithook','编辑钩子',1,''),(211,'admin',1,'Admin/Article/sort','文档排序',1,''),(212,'admin',1,'Admin/Config/sort','排序',1,''),(213,'admin',1,'Admin/Menu/sort','排序',1,''),(214,'admin',1,'Admin/Channel/sort','排序',1,''),(215,'admin',1,'Admin/Category/operate/type/move','移动',1,''),(216,'admin',1,'Admin/Category/operate/type/merge','合并',1,''),(217,'admin',2,'Admin/Down/index','导入数据',1,''),(218,'admin',1,'Admin/Down/Compond','导入化合物excel',1,''),(219,'admin',1,'Admin/Down/Reaction','导入反应excel',1,'');

/*Table structure for table `one_category` */

DROP TABLE IF EXISTS `one_category`;

CREATE TABLE `one_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '分类ID',
  `name` varchar(30) NOT NULL COMMENT '标志',
  `title` varchar(50) NOT NULL COMMENT '标题',
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上级分类ID',
  `sort` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序（同级有效）',
  `list_row` tinyint(3) unsigned NOT NULL DEFAULT '10' COMMENT '列表每页行数',
  `meta_title` varchar(50) NOT NULL DEFAULT '' COMMENT 'SEO的网页标题',
  `keywords` varchar(255) NOT NULL DEFAULT '' COMMENT '关键字',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '描述',
  `template_index` varchar(100) NOT NULL COMMENT '频道页模板',
  `template_lists` varchar(100) NOT NULL COMMENT '列表页模板',
  `template_detail` varchar(100) NOT NULL COMMENT '详情页模板',
  `template_edit` varchar(100) NOT NULL COMMENT '编辑页模板',
  `model` varchar(100) NOT NULL DEFAULT '' COMMENT '关联模型',
  `type` varchar(100) NOT NULL DEFAULT '' COMMENT '允许发布的内容类型',
  `link_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '外链',
  `allow_publish` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否允许发布内容',
  `display` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '可见性',
  `reply` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否允许回复',
  `check` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '发布的文章是否需要审核',
  `reply_model` varchar(100) NOT NULL DEFAULT '',
  `extend` text NOT NULL COMMENT '扩展设置',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '数据状态',
  `icon` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '分类图标',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_name` (`name`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COMMENT='分类表';

/*Data for the table `one_category` */

insert  into `one_category`(`id`,`name`,`title`,`pid`,`sort`,`list_row`,`meta_title`,`keywords`,`description`,`template_index`,`template_lists`,`template_detail`,`template_edit`,`model`,`type`,`link_id`,`allow_publish`,`display`,`reply`,`check`,`reply_model`,`extend`,`create_time`,`update_time`,`status`,`icon`) values (1,'blog','博客',0,0,10,'','','','','','','','2','2,1',0,0,1,0,0,'1','',1379474947,1382701539,0,0),(2,'default_blog','默认分类',1,1,10,'','','','','','','','2','2,1,3',0,1,1,0,1,'1','',1379475028,1386839751,0,31);

/*Table structure for table `one_channel` */

DROP TABLE IF EXISTS `one_channel`;

CREATE TABLE `one_channel` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '频道ID',
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上级频道ID',
  `title` char(30) NOT NULL COMMENT '频道标题',
  `url` char(100) NOT NULL COMMENT '频道连接',
  `sort` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '导航排序',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态',
  `target` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '新窗口打开',
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `one_channel` */

/*Table structure for table `one_compound` */

DROP TABLE IF EXISTS `one_compound`;

CREATE TABLE `one_compound` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `c_chemicals` varchar(255) NOT NULL COMMENT '化合物分子式，供搜索',
  `c_name1` varchar(255) DEFAULT NULL COMMENT '化合物第一个名字(供显示)',
  `c_name2` varchar(255) DEFAULT NULL COMMENT '化合物第二个名字(供显示)',
  `c_cas` varchar(255) DEFAULT NULL COMMENT 'CAS(供显示)',
  `c_recursive` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否循环获取 1-是 0-否',
  `c_is_ro2` varchar(255) DEFAULT NULL COMMENT '(预留他用)',
  `c_is_primary` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否主要化合物 1-是 2-否(预留他用)',
  `c_is_organic` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否有机物 1-是 2-否(预留他用)',
  `c_img` varchar(255) DEFAULT NULL COMMENT '化合物对应图片名称(供显示)',
  `c_document` varchar(255) DEFAULT NULL COMMENT '化合物对应文件名称（供显示,供下载用）',
  `c_add_time` int(11) DEFAULT NULL COMMENT '添加时间',
  `c_is_show` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否显示 1-是 0-否',
  PRIMARY KEY (`id`),
  KEY `NewIndex1` (`c_chemicals`)
) ENGINE=InnoDB AUTO_INCREMENT=849 DEFAULT CHARSET=utf8 COMMENT='化合物';

/*Data for the table `one_compound` */

insert  into `one_compound`(`id`,`c_chemicals`,`c_name1`,`c_name2`,`c_cas`,`c_recursive`,`c_is_ro2`,`c_is_primary`,`c_is_organic`,`c_img`,`c_document`,`c_add_time`,`c_is_show`) values (705,'Cl','Chlorine Atom',NULL,'1-2-45',0,NULL,0,0,'Cl.gif','CH4.pdf',1506495329,1),(706,'HCl',NULL,NULL,NULL,0,NULL,0,0,'HCl.gif',NULL,1506495329,1),(707,'OH','Hydroxyl',NULL,NULL,0,NULL,0,0,'OH.gif',NULL,1506495329,1),(708,'O3P',NULL,NULL,NULL,0,NULL,0,0,'O3P.gif',NULL,1506495329,1),(709,'O1D',NULL,NULL,NULL,0,NULL,0,0,'O1D.gif',NULL,1506495329,1),(710,'O3','Ozone',NULL,NULL,0,NULL,0,0,'O3.gif',NULL,1506495329,1),(711,'HO2','Hydroperoxy',NULL,NULL,0,NULL,0,0,'HO2.gif',NULL,1506495329,1),(712,'H2O',NULL,NULL,NULL,0,NULL,0,0,'H2O.gif',NULL,1506495329,1),(713,'H2O2',NULL,NULL,NULL,0,NULL,0,0,'H2O2.gif',NULL,1506495329,1),(714,'NO','Nitrogen Oxide',NULL,NULL,0,NULL,0,0,'NO.gif',NULL,1506495329,1),(715,'NO2','Nitrogen Dioxide',NULL,NULL,0,NULL,0,0,'NO2.gif',NULL,1506495329,1),(716,'NO3','Nitrogen Trioxide',NULL,NULL,0,NULL,0,0,'NO3.gif',NULL,1506495329,1),(717,'N2O5',NULL,NULL,NULL,0,NULL,0,0,'N2O5.gif',NULL,1506495329,1),(718,'HONO',NULL,NULL,NULL,0,NULL,0,0,'HONO.gif',NULL,1506495329,1),(719,'HNO3',NULL,NULL,NULL,0,NULL,0,0,'HNO3.gif',NULL,1506495329,1),(720,'HO2NO2',NULL,NULL,NULL,0,NULL,0,0,'HO2NO2.gif',NULL,1506495329,1),(721,'SO2',NULL,NULL,NULL,0,NULL,0,0,'SO2.gif',NULL,1506495329,1),(722,'HOSO2',NULL,NULL,NULL,0,NULL,0,0,'HOSO2.gif',NULL,1506495329,1),(723,'SO3',NULL,NULL,NULL,0,NULL,0,0,'SO3.gif',NULL,1506495329,1),(724,'H2SO4',NULL,NULL,NULL,0,NULL,0,0,'H2SO4.gif',NULL,1506495329,1),(725,'Br',NULL,NULL,NULL,0,NULL,0,0,'Br.gif',NULL,1506495329,1),(726,'BrO',NULL,NULL,NULL,0,NULL,0,0,'BrO.gif',NULL,1506495329,1),(727,'HBr',NULL,NULL,NULL,0,NULL,0,0,'HBr.gif',NULL,1506495329,1),(728,'I',NULL,NULL,NULL,0,NULL,0,0,'I.gif',NULL,1506495329,1),(729,'IO',NULL,NULL,NULL,0,NULL,0,0,'IO.gif',NULL,1506495329,1),(730,'HI',NULL,NULL,NULL,0,NULL,0,0,'HI.gif',NULL,1506495329,1),(731,'CO','Carbon Monooxide',NULL,NULL,0,NULL,0,0,'CO.gif',NULL,1506495329,1),(732,'CO2',NULL,NULL,NULL,0,NULL,0,0,'CO2.gif',NULL,1506495329,1),(733,'',NULL,NULL,NULL,0,NULL,0,0,'',NULL,1506495329,1),(734,'C2H6','Methane',NULL,NULL,1,NULL,1,1,'C2H6.gif',NULL,1506495329,1),(735,'C2H5O2',NULL,NULL,NULL,1,NULL,0,0,'C2H5O2.gif',NULL,1506495329,1),(736,'C2H5OOH',NULL,NULL,NULL,1,NULL,0,0,'C2H5OOH.gif',NULL,1506495329,1),(737,'C2H5OH',NULL,NULL,NULL,1,NULL,0,0,'C2H5OH.gif',NULL,1506495329,1),(738,'C2H5NO3',NULL,NULL,NULL,1,NULL,0,0,'C2H5NO3.gif',NULL,1506495329,1),(739,'C2H5O',NULL,NULL,NULL,1,NULL,0,0,'C2H5O.gif',NULL,1506495329,1),(740,'CH3CHO',NULL,NULL,NULL,1,NULL,0,0,'CH3CHO.gif',NULL,1506495329,1),(741,'HOCH2CH2O2',NULL,NULL,NULL,1,NULL,0,0,'HOCH2CH2O2.gif',NULL,1506495329,1),(742,'CH3O2',NULL,NULL,NULL,1,NULL,0,0,'CH3O2.gif',NULL,1506495329,1),(743,'CH3CO3',NULL,NULL,NULL,1,NULL,0,0,'CH3CO3.gif',NULL,1506495329,1),(744,'HCOCH2O2','Methylperoxy',NULL,NULL,1,NULL,0,0,'HCOCH2O2.gif',NULL,1506495329,1),(745,'HYETHO2H','Methoxyl',NULL,NULL,1,NULL,0,0,'HYETHO2H.gif',NULL,1506495329,1),(746,'ETHOHNO3',NULL,NULL,NULL,1,NULL,0,0,'ETHOHNO3.gif',NULL,1506495329,1),(747,'HOCH2CH2O','Hydrolmethylperoxy',NULL,NULL,1,NULL,0,0,'HOCH2CH2O.gif',NULL,1506495329,1),(748,'ETHGLY ','Ethane',NULL,NULL,1,NULL,0,1,'ETHGLY .gif',NULL,1506495329,1),(749,'HOCH2CHO',NULL,NULL,NULL,1,NULL,0,0,'HOCH2CHO.gif',NULL,1506495329,1),(750,'CH3OOH','Ethanol',NULL,NULL,1,NULL,0,1,'CH3OOH.gif',NULL,1506495329,1),(751,'HCHO',NULL,NULL,NULL,1,NULL,0,0,'HCHO.gif',NULL,1506495329,1),(752,'CH3NO3','Acetylaldehyde',NULL,NULL,1,NULL,0,0,'CH3NO3.gif',NULL,1506495329,1),(753,'CH3O',NULL,NULL,NULL,1,NULL,0,0,'CH3O.gif',NULL,1506495329,1),(754,'CH3O2NO2','Acetic Acid',NULL,NULL,1,NULL,0,0,'CH3O2NO2.gif',NULL,1506495329,1),(755,'CH3OH',NULL,NULL,NULL,1,NULL,0,0,'CH3OH.gif',NULL,1506495329,1),(756,'CH3CO2H',NULL,NULL,NULL,1,NULL,0,0,'CH3CO2H.gif',NULL,1506495329,1),(757,'CH3CO3H',NULL,NULL,NULL,1,NULL,0,0,'CH3CO3H.gif',NULL,1506495329,1),(758,'PAN',NULL,NULL,NULL,1,NULL,0,0,'PAN.gif',NULL,1506495329,1),(759,'HCOCH2OOH',NULL,NULL,NULL,1,NULL,0,0,'HCOCH2OOH.gif',NULL,1506495329,1),(760,'HCOCH2O',NULL,NULL,NULL,1,NULL,0,0,'HCOCH2O.gif',NULL,1506495329,1),(761,'GLYOX','Hydrolmethylperoxy',NULL,NULL,1,'1',0,1,'GLYOX.gif',NULL,1506495329,1),(762,'HOCH2CO3','Ethoxyl',NULL,NULL,1,NULL,0,1,'HOCH2CO3.gif',NULL,1506495329,1),(763,'HCOCO','Ethylperoxy',NULL,NULL,1,'1',0,1,'HCOCO.gif',NULL,1506495329,1),(764,'HOCH2CO2H',NULL,NULL,NULL,1,NULL,0,0,'HOCH2CO2H.gif',NULL,1506495329,1),(765,'HOCH2CO3H',NULL,NULL,NULL,1,NULL,0,0,'HOCH2CO3H.gif',NULL,1506495329,1),(766,'PHAN',NULL,NULL,NULL,0,NULL,0,0,'PHAN.gif',NULL,1506495329,1),(767,'HCOCO3',NULL,NULL,NULL,0,NULL,0,0,'HCOCO3.gif',NULL,1506495329,1),(768,'HCOCO2H',NULL,NULL,NULL,0,NULL,0,0,'HCOCO2H.gif',NULL,1506495329,1),(769,'HCOCO3H',NULL,NULL,NULL,0,NULL,0,0,'HCOCO3H.gif',NULL,1506495329,1),(770,'',NULL,NULL,NULL,0,NULL,0,0,'.gif',NULL,1506495329,1),(771,'C2H4',NULL,NULL,NULL,1,NULL,0,0,'C2H4.gif',NULL,1506495329,1),(772,'ETHENO3O2',NULL,NULL,NULL,1,NULL,0,0,'ETHENO3O2.gif',NULL,1506495329,1),(773,'CH2OOA',NULL,NULL,NULL,1,NULL,0,0,'CH2OOA.gif',NULL,1506495329,1),(774,'ETHO2HNO3',NULL,NULL,NULL,1,NULL,0,0,'ETHO2HNO3.gif',NULL,1506495329,1),(775,'ETHENO3O',NULL,NULL,NULL,1,NULL,0,0,'ETHENO3O.gif',NULL,1506495329,1),(776,'NO3CH2CHO',NULL,NULL,NULL,1,NULL,0,0,'NO3CH2CHO.gif',NULL,1506495329,1),(777,'CH2OO',NULL,NULL,NULL,1,NULL,0,0,'CH2OO.gif',NULL,1506495329,1),(778,'ETHGLY',NULL,NULL,NULL,1,NULL,0,0,'ETHGLY.gif',NULL,1506495329,1),(779,'NO3CH2CO3',NULL,NULL,NULL,1,NULL,0,0,'NO3CH2CO3.gif',NULL,1506495329,1),(780,'HCOOH',NULL,NULL,NULL,1,NULL,0,0,'HCOOH.gif',NULL,1506495329,1),(781,'NO3CH2CO2H',NULL,NULL,NULL,1,NULL,0,0,'NO3CH2CO2H.gif',NULL,1506495329,1),(782,'NO3CH2CO3H',NULL,NULL,NULL,1,NULL,0,0,'NO3CH2CO3H.gif',NULL,1506495329,1),(783,'NO3CH2PAN',NULL,NULL,NULL,1,NULL,0,0,'NO3CH2PAN.gif',NULL,1506495329,1),(784,'',NULL,NULL,NULL,0,NULL,0,0,'.gif',NULL,1506495329,1),(785,'C3H8',NULL,NULL,NULL,1,NULL,0,0,'C3H8.gif',NULL,1506495329,1),(786,'IC3H7O2',NULL,NULL,NULL,1,NULL,0,0,'IC3H7O2.gif',NULL,1506495329,1),(787,'NC3H7O2',NULL,NULL,NULL,1,NULL,0,0,'NC3H7O2.gif',NULL,1506495329,1),(788,'IC3H7NO3',NULL,NULL,NULL,1,NULL,0,0,'IC3H7NO3.gif',NULL,1506495329,1),(789,'IC3H7O',NULL,NULL,NULL,1,NULL,0,0,'IC3H7O.gif',NULL,1506495329,1),(790,'CH3COCH3',NULL,NULL,NULL,1,NULL,0,0,'CH3COCH3.gif',NULL,1506495329,1),(791,'IPROPOL',NULL,NULL,NULL,1,NULL,0,0,'IPROPOL.gif',NULL,1506495329,1),(792,'NC3H7OOH',NULL,NULL,NULL,1,NULL,0,0,'NC3H7OOH.gif',NULL,1506495329,1),(793,'NC3H7NO3',NULL,NULL,NULL,1,NULL,0,0,'NC3H7NO3.gif',NULL,1506495329,1),(794,'NC3H7O',NULL,NULL,NULL,1,NULL,0,0,'NC3H7O.gif',NULL,1506495329,1),(795,'C2H5CHO',NULL,NULL,NULL,1,NULL,0,0,'C2H5CHO.gif',NULL,1506495329,1),(796,'NPROPOL',NULL,NULL,NULL,1,NULL,0,0,'NPROPOL.gif',NULL,1506495329,1),(797,'CH3COCH2O2',NULL,NULL,NULL,1,NULL,0,0,'CH3COCH2O2.gif',NULL,1506495329,1),(798,'IPROPOLO2',NULL,NULL,NULL,1,NULL,0,0,'IPROPOLO2.gif',NULL,1506495329,1),(799,'C2H5CO3',NULL,NULL,NULL,1,NULL,0,0,'C2H5CO3.gif',NULL,1506495329,1),(800,'HO1C3O2',NULL,NULL,NULL,1,NULL,0,0,'HO1C3O2.gif',NULL,1506495329,1),(801,'HYPROPO2',NULL,NULL,NULL,1,NULL,0,0,'HYPROPO2.gif',NULL,1506495329,1),(802,'CH3COCH2O',NULL,NULL,NULL,1,NULL,0,0,'CH3COCH2O.gif',NULL,1506495329,1),(803,'HYPERACET',NULL,NULL,NULL,1,NULL,0,0,'HYPERACET.gif',NULL,1506495329,1),(804,'ACETOL',NULL,NULL,NULL,1,NULL,0,0,'ACETOL.gif',NULL,1506495329,1),(805,'MGLYOX',NULL,NULL,NULL,1,NULL,0,0,'MGLYOX.gif',NULL,1506495329,1),(806,'IPROPOLO2H',NULL,NULL,NULL,1,NULL,0,0,'IPROPOLO2H.gif',NULL,1506495329,1),(807,'IPROPOLO',NULL,NULL,NULL,1,NULL,0,0,'IPROPOLO.gif',NULL,1506495329,1),(808,'PROLNO3',NULL,NULL,NULL,1,NULL,0,0,'PROLNO3.gif',NULL,1506495329,1),(809,'CH3CHOHCHO',NULL,NULL,NULL,1,NULL,0,0,'CH3CHOHCHO.gif',NULL,1506495329,1),(810,'PROPGLY',NULL,NULL,NULL,1,NULL,0,0,'PROPGLY.gif',NULL,1506495329,1),(811,'PERPROACID',NULL,NULL,NULL,1,NULL,0,0,'PERPROACID.gif',NULL,1506495329,1),(812,'PROPACID',NULL,NULL,NULL,1,NULL,0,0,'PROPACID.gif',NULL,1506495329,1),(813,'PPN',NULL,NULL,NULL,1,NULL,0,0,'PPN.gif',NULL,1506495329,1),(814,'HO1C3OOH',NULL,NULL,NULL,1,NULL,0,0,'HO1C3OOH.gif',NULL,1506495329,1),(815,'HO1C3NO3',NULL,NULL,NULL,1,NULL,0,0,'HO1C3NO3.gif',NULL,1506495329,1),(816,'HO1C3O',NULL,NULL,NULL,1,NULL,0,0,'HO1C3O.gif',NULL,1506495329,1),(817,'HOC2H4CHO',NULL,NULL,NULL,1,NULL,0,0,'HOC2H4CHO.gif',NULL,1506495329,1),(818,'HOC3H6OH',NULL,NULL,NULL,1,NULL,0,0,'HOC3H6OH.gif',NULL,1506495329,1),(819,'HYPROPO2H',NULL,NULL,NULL,1,NULL,0,0,'HYPROPO2H.gif',NULL,1506495329,1),(820,'HYPROPO',NULL,NULL,NULL,1,NULL,0,0,'HYPROPO.gif',NULL,1506495329,1),(821,'PROPOLNO3',NULL,NULL,NULL,1,NULL,0,0,'PROPOLNO3.gif',NULL,1506495329,1),(822,'CH3CHOHCO3',NULL,NULL,NULL,1,NULL,0,0,'CH3CHOHCO3.gif',NULL,1506495329,1),(823,'HOC2H4CO3',NULL,NULL,NULL,1,NULL,0,0,'HOC2H4CO3.gif',NULL,1506495329,1),(824,'IPROPOLPER',NULL,NULL,NULL,1,NULL,0,0,'IPROPOLPER.gif',NULL,1506495329,1),(825,'IPROPOLPAN',NULL,NULL,NULL,1,NULL,0,0,'IPROPOLPAN.gif',NULL,1506495329,1),(826,'HOC2H4CO2H',NULL,NULL,NULL,1,NULL,0,0,'HOC2H4CO2H.gif',NULL,1506495329,1),(827,'HOC2H4CO3H',NULL,NULL,NULL,1,NULL,0,0,'HOC2H4CO3H.gif',NULL,1506495329,1),(828,'C3PAN1',NULL,NULL,NULL,1,NULL,0,0,'C3PAN1.gif',NULL,1506495329,1),(829,'',NULL,NULL,NULL,0,NULL,0,0,'.gif',NULL,1506495329,1),(830,'C3H6',NULL,NULL,NULL,1,NULL,0,0,'C3H6.gif',NULL,1506495329,1),(831,'PRONO3AO2',NULL,NULL,NULL,1,NULL,0,0,'PRONO3AO2.gif',NULL,1506495329,1),(832,'PRONO3BO2',NULL,NULL,NULL,1,NULL,0,0,'PRONO3BO2.gif',NULL,1506495329,1),(833,'CH2OOB',NULL,NULL,NULL,1,NULL,0,0,'CH2OOB.gif',NULL,1506495329,1),(834,'CH3CHOOA',NULL,NULL,NULL,1,NULL,0,0,'CH3CHOOA.gif',NULL,1506495329,1),(835,'PR1O2HNO3',NULL,NULL,NULL,1,NULL,0,0,'PR1O2HNO3.gif',NULL,1506495329,1),(836,'PRONO3AO',NULL,NULL,NULL,1,NULL,0,0,'PRONO3AO.gif',NULL,1506495329,1),(837,'CHOPRNO3',NULL,NULL,NULL,1,NULL,0,0,'CHOPRNO3.gif',NULL,1506495329,1),(838,'PR2O2HNO3',NULL,NULL,NULL,1,NULL,0,0,'PR2O2HNO3.gif',NULL,1506495329,1),(839,'PRONO3BO',NULL,NULL,NULL,1,NULL,0,0,'PRONO3BO.gif',NULL,1506495329,1),(840,'NOA',NULL,NULL,NULL,1,NULL,0,0,'NOA.gif',NULL,1506495329,1),(841,'CH200',NULL,NULL,NULL,1,NULL,0,0,'CH200.gif',NULL,1506495329,1),(842,'CH3CHOO',NULL,NULL,NULL,1,NULL,0,0,'CH3CHOO.gif',NULL,1506495329,1),(843,'CH4',NULL,NULL,NULL,1,NULL,0,0,'CH4.gif',NULL,1506495329,1),(844,'PRNO3CO3',NULL,NULL,NULL,1,NULL,0,0,'PRNO3CO3.gif',NULL,1506495329,1),(845,'PROPALO',NULL,NULL,NULL,1,NULL,0,0,'PROPALO.gif',NULL,1506495329,1),(846,'PRNO3CO2H',NULL,NULL,NULL,1,NULL,0,0,'PRNO3CO2H.gif',NULL,1506495329,1),(847,'PRNO3CO3H',NULL,NULL,NULL,1,NULL,0,0,'PRNO3CO3H.gif',NULL,1506495329,1),(848,'PRNO3PAN',NULL,NULL,NULL,1,NULL,0,0,'PRNO3PAN.gif',NULL,1506495329,1);

/*Table structure for table `one_compound_reaction` */

DROP TABLE IF EXISTS `one_compound_reaction`;

CREATE TABLE `one_compound_reaction` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `r_reactant1` varchar(255) NOT NULL COMMENT '反应物1',
  `r_reactant2` varchar(255) DEFAULT '' COMMENT '反应物2',
  `r_reactant3` varchar(255) DEFAULT '' COMMENT '反应物3',
  `r_product1` varchar(255) NOT NULL COMMENT '产物1',
  `r_product2` varchar(255) DEFAULT '' COMMENT '产物2',
  `r_product3` varchar(255) DEFAULT '' COMMENT '产物3',
  `r_kt` varchar(255) DEFAULT '' COMMENT '反应参数',
  `r_document` varchar(255) DEFAULT '' COMMENT '反应对应文件名称（供下载用）',
  `r_add_time` int(11) DEFAULT NULL COMMENT '注册时间',
  `r_is_show` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否显示 1-是 0-否',
  PRIMARY KEY (`id`),
  KEY `NewIndex1` (`r_reactant1`)
) ENGINE=InnoDB AUTO_INCREMENT=1371 DEFAULT CHARSET=utf8 COMMENT='化合物反应（关系表）';

/*Data for the table `one_compound_reaction` */

insert  into `one_compound_reaction`(`id`,`r_reactant1`,`r_reactant2`,`r_reactant3`,`r_product1`,`r_product2`,`r_product3`,`r_kt`,`r_document`,`r_add_time`,`r_is_show`) values (686,'C2H6','Cl',NULL,'C2H5O2','HCl',NULL,'8.3D-11*EXP(-100/TEMP)','R1.pdf',1506495330,1),(687,'C2H6','OH',NULL,'C2H5O2',NULL,NULL,'6.9D-12*EXP(-1000/TEMP)',NULL,1506495330,1),(688,'C2H5O2','HO2',NULL,'C2H5OOH',NULL,NULL,'4.3D-13*EXP(870/TEMP)',NULL,1506495330,1),(689,'C2H5O2','NO',NULL,'C2H5ONO2',NULL,NULL,'2.55D-12*EXP(380/TEMP)*0.009',NULL,1506495330,1),(690,'C2H5O2','NO',NULL,'C2H5O','NO2',NULL,'2.55D-12*EXP(380/TEMP)*0.991',NULL,1506495330,1),(691,'C2H5O2','NO3',NULL,'C2H5O','NO2',NULL,'KRO2NO3',NULL,1506495330,1),(692,'C2H5O2',NULL,NULL,'C2H5O',NULL,NULL,'2*(KCH3O2*6.4D-14*(TEMP/300)@0*EXP(0/TEMP))@0.5*RO2*0.6',NULL,1506495330,1),(693,'C2H5O2',NULL,NULL,'C2H5OH',NULL,NULL,'2*(KCH3O2*6.4D-14*(TEMP/300)@0*EXP(0/TEMP))@0.5*RO2*0.2',NULL,1506495330,1),(694,'C2H5O2',NULL,NULL,'CH3CHO',NULL,NULL,'2*(KCH3O2*6.4D-14*(TEMP/300)@0*EXP(0/TEMP))@0.5*RO2*0.2',NULL,1506495330,1),(695,'C2H5OOH',NULL,NULL,'C2H5O','OH',NULL,'J<41>',NULL,1506495330,1),(696,'C2H5OOH','OH',NULL,'C2H5O2',NULL,NULL,'1.90D-12*EXP(190/TEMP)',NULL,1506495330,1),(697,'C2H5OOH','OH',NULL,'CH3CHO','OH',NULL,'8.01D-12',NULL,1506495330,1),(698,'C2H5OH','OH',NULL,'C2H5O',NULL,NULL,'3.0D-12*EXP(20/TEMP)*0.05',NULL,1506495330,1),(699,'C2H5OH','OH',NULL,'CH3CHO','HO2',NULL,'3.0D-12*EXP(20/TEMP)*0.90',NULL,1506495330,1),(700,'C2H5OH','OH',NULL,'HOCH2CH2O2',NULL,NULL,'3.0D-12*EXP(20/TEMP)*0.05',NULL,1506495330,1),(701,'C2H5NO3',NULL,NULL,'C2H5O','NO2',NULL,'J<52>',NULL,1506495330,1),(702,'C2H5NO3','OH',NULL,'CH3CHO','NO2',NULL,'6.7D-13*EXP(-395/TEMP)',NULL,1506495330,1),(703,'C2H5O',NULL,NULL,'CH3O2','CH2O',NULL,'2.4D-14*EXP(-325/TEMP)*O2',NULL,1506495330,1),(704,'CH3CHO',NULL,NULL,'CH3O2','HO2',NULL,'J<13>',NULL,1506495330,1),(705,'CH3CHO','NO3',NULL,'CH3CO3','HNO3',NULL,'1.4D-12*EXP(-1860/TEMP)',NULL,1506495330,1),(706,'CH3CHO','OH',NULL,'CH3CO3',NULL,NULL,'4.7D-12*EXP(345/TEMP)*0.95',NULL,1506495330,1),(707,'CH3CHO','OH',NULL,'HCOCH2O2',NULL,NULL,'4.7D-12*EXP(345/TEMP)*0.05',NULL,1506495330,1),(708,'HOCH2CH2O2','HO2',NULL,'HYETHO2H',NULL,NULL,'1.53D-13*EXP(1300/TEMP)',NULL,1506495330,1),(709,'HOCH2CH2O2','NO',NULL,'ETHOHNO3',NULL,NULL,'KRO2NO*0.005',NULL,1506495330,1),(710,'HOCH2CH2O2','NO',NULL,'HOCH2CH2O','NO2',NULL,'KRO2NO*0.995',NULL,1506495330,1),(711,'HOCH2CH2O2','NO3',NULL,'HOCH2CH2O','NO2',NULL,'KRO2NO3',NULL,1506495330,1),(712,'HOCH2CH2O2',NULL,NULL,'ETHGLY',NULL,NULL,'2*(KCH3O2*7.8D-14*EXP(1000/TEMP))@0.5*RO2*0.2',NULL,1506495330,1),(713,'HOCH2CH2O2',NULL,NULL,'HOCH2CH2O',NULL,NULL,'2*(KCH3O2*7.8D-14*EXP(1000/TEMP))@0.5*RO2*0.6',NULL,1506495330,1),(714,'HOCH2CH2O2',NULL,NULL,'HOCH2CHO',NULL,NULL,'2*(KCH3O2*7.8D-14*EXP(1000/TEMP))@0.5*RO2*0.2',NULL,1506495330,1),(715,'CH3O2','HO2',NULL,'CH3OOH',NULL,NULL,'3.8D-13*EXP(780/TEMP)*(1-1/(1+498*EXP(-1160/TEMP)))',NULL,1506495330,1),(716,'CH3O2','HO2',NULL,'CH2O',NULL,NULL,'3.8D-13*EXP(780/TEMP)*(1/(1+498*EXP(-1160/TEMP)))',NULL,1506495330,1),(717,'CH3O2','NO',NULL,'CH3NO3',NULL,NULL,'2.3D-12*EXP(360/TEMP)*0.001',NULL,1506495330,1),(718,'CH3O2','NO',NULL,'CH3O','NO2',NULL,'2.3D-12*EXP(360/TEMP)*0.999',NULL,1506495330,1),(719,'CH3O2','NO2',NULL,'CH3O2NO2',NULL,NULL,'KMT13',NULL,1506495330,1),(720,'CH3O2','NO3',NULL,'CH3O','NO2',NULL,'1.2D-12',NULL,1506495330,1),(721,'CH3O2',NULL,NULL,'CH3O',NULL,NULL,'2*KCH3O2*RO2*7.18*EXP(-885/TEMP)',NULL,1506495330,1),(722,'CH3O2',NULL,NULL,'CH3OH',NULL,NULL,'2*KCH3O2*RO2*0.5*(1-7.18*EXP(-885/TEMP))',NULL,1506495330,1),(723,'CH3O2',NULL,NULL,'HCHO',NULL,NULL,'2*KCH3O2*RO2*0.5*(1-7.18*EXP(-885/TEMP))',NULL,1506495330,1),(724,'CH3CO3','HO2',NULL,'CH3CO2H','O3',NULL,'KAPHO2*0.15',NULL,1506495330,1),(725,'CH3CO3','HO2',NULL,'CH3CO3H',NULL,NULL,'KAPHO2*0.41',NULL,1506495330,1),(726,'CH3CO3','HO2',NULL,'CH3O2','OH',NULL,'KAPHO2*0.44',NULL,1506495330,1),(727,'CH3CO3','NO',NULL,'CH3O2','NO2',NULL,'7.5D-12*EXP(290/TEMP)',NULL,1506495330,1),(728,'CH3CO3','NO2',NULL,'PAN',NULL,NULL,'KFPAN',NULL,1506495330,1),(729,'CH3CO3','NO3',NULL,'CH3O2','NO2',NULL,'4.0D-12',NULL,1506495330,1),(730,'CH3CO3',NULL,NULL,'CH3CO2H',NULL,NULL,'2*(K298CH3O2*2.9D-12*EXP(500/TEMP))@0.5*RO2*0.3',NULL,1506495330,1),(731,'CH3CO3',NULL,NULL,'CH3O2',NULL,NULL,'2*(K298CH3O2*2.9D-12*EXP(500/TEMP))@0.5*RO2*0.7',NULL,1506495330,1),(732,'HCOCH2O2','HO2',NULL,'HCOCH2COOH',NULL,NULL,'KRO2HO2*0.387',NULL,1506495330,1),(733,'HCOCH2O2','NO',NULL,'HCOCH2O','NO2',NULL,'KRO2NO',NULL,1506495330,1),(734,'HCOCH2O2','NO3',NULL,'HCOCH2O','NO2',NULL,'KRO2NO3',NULL,1506495330,1),(735,'HCOCH2O2',NULL,NULL,'GLYOX',NULL,NULL,'2.00D-12*0.2*RO2',NULL,1506495330,1),(736,'HCOCH2O2',NULL,NULL,'HCOCH2O',NULL,NULL,'2.00D-12*0.6*RO2',NULL,1506495330,1),(737,'HCOCH2O2',NULL,NULL,'HOCH2CHO',NULL,NULL,'2.00D-12*0.2*RO2',NULL,1506495330,1),(738,'HYETHO2H','OH',NULL,'HOCH2CH2O2',NULL,NULL,'1.90D-12*EXP(190/TEMP)',NULL,1506495330,1),(739,'HYETHO2H','OH',NULL,'HOCH2CHO','OH',NULL,'1.38D-11',NULL,1506495330,1),(740,'HYETHO2H',NULL,NULL,'HOCH2CH2O','OH',NULL,'J<41>',NULL,1506495330,1),(741,'ETHOHNO3','OH',NULL,'HOCH2CHO','NO2',NULL,'8.40D-13',NULL,1506495330,1),(742,'HOCH2CH2O',NULL,NULL,'HCHO','HO2',NULL,'9.50D+13*EXP(-5988/TEMP)',NULL,1506495330,1),(743,'HOCH2CH2O',NULL,NULL,'HOCH2CHO','HO2',NULL,'KROPRIM*O2',NULL,1506495330,1),(744,'ETHGLY ','OH',NULL,'HOCH2CHO','HO2',NULL,'1.45D-11',NULL,1506495330,1),(745,'HOCH2CHO','NO3',NULL,'HOCH2CO3','HNO3',NULL,'KNO3AL',NULL,1506495330,1),(746,'HOCH2CHO','OH',NULL,'GLYOX','HO2',NULL,'1.00D-11*0.200',NULL,1506495330,1),(747,'HOCH2CHO','OH',NULL,'HOCH2CO3',NULL,NULL,'1.00D-11*0.800',NULL,1506495330,1),(748,'HOCH2CHO',NULL,NULL,'HCHo','HO2',NULL,'J<15>',NULL,1506495330,1),(749,'CH3OOH',NULL,NULL,'CH3O','OH',NULL,'J<41>',NULL,1506495330,1),(750,'CH3OOH','OH',NULL,'CH3O2',NULL,NULL,'5.3D-12*EXP(190/TEMP)*0.6',NULL,1506495330,1),(751,'CH3OOH','OH',NULL,'HCHO','OH',NULL,'5.3D-12*EXP(190/TEMP)*0.4',NULL,1506495330,1),(752,'HCHO',NULL,NULL,'HO2 ','CO',NULL,'J<11>',NULL,1506495330,1),(753,'HCHO',NULL,NULL,'H2','CO',NULL,'J<12>',NULL,1506495330,1),(754,'HCHO','NO3',NULL,'HNO3','HO2',NULL,'5.5D-16',NULL,1506495330,1),(755,'HCHO','OH ',NULL,'HO2','CO',NULL,'5.4D-12*EXP(135/TEMP)',NULL,1506495330,1),(756,'CH3NO3',NULL,NULL,'CH3O ','NO2',NULL,'J<51>',NULL,1506495330,1),(757,'CH3NO3','OH',NULL,'HCHO','NO2',NULL,'4.0D-13*EXP(-845/TEMP)',NULL,1506495330,1),(758,'CH3O',NULL,NULL,'HCHO','HO2',NULL,'7.2D-14*EXP(-1080/TEMP)*O2',NULL,1506495330,1),(759,'CH3O2NO2',NULL,NULL,'CH3O2','NO2',NULL,'KMT14',NULL,1506495330,1),(760,'CH3OH','OH',NULL,'HCHO','HO2',NULL,'2.85D-12*EXP(-345/TEMP)',NULL,1506495330,1),(761,'CH3CO2H','OH',NULL,'CH3O2',NULL,NULL,'8.00D-13',NULL,1506495330,1),(762,'CH3CO3H','OH',NULL,'CH3CO3',NULL,NULL,'3.70D-12',NULL,1506495330,1),(763,'CH3CO3H',NULL,NULL,'CH3O2','OH',NULL,'J<41>',NULL,1506495330,1),(764,'PAN','OH',NULL,'HCHO','NO2',NULL,'3D-14',NULL,1506495330,1),(765,'PAN',NULL,NULL,'HCHO','NO2',NULL,'KBPAN',NULL,1506495330,1),(766,'HCOCH2OOH','OH ',NULL,'GLYOX','OH',NULL,'2.91D-11',NULL,1506495330,1),(767,'HCOCH2OOH','OH',NULL,'HCOCH2O2',NULL,NULL,'1.90D-12*EXP(190/TEMP)',NULL,1506495330,1),(768,'HCOCH2OOH',NULL,NULL,'HCOCH2O','OH',NULL,'J<41>',NULL,1506495330,1),(769,'HCOCH2OOH',NULL,NULL,'HO2','HCHO','OH','J<15>',NULL,1506495330,1),(770,'HCOCH2O',NULL,NULL,'HCHO','HO2',NULL,'KDEC',NULL,1506495330,1),(771,'GLYOX',NULL,NULL,'H2',NULL,NULL,'J<31>',NULL,1506495330,1),(772,'GLYOX',NULL,NULL,'HO2',NULL,NULL,'J<33>',NULL,1506495330,1),(773,'GLYOX',NULL,NULL,'HCHO',NULL,NULL,'J<32>',NULL,1506495330,1),(774,'GLYOX','NO3',NULL,'HCOCO','HNO3',NULL,'KNO3AL',NULL,1506495330,1),(775,'GLYOX','OH',NULL,'HCOCO',NULL,NULL,'3.1D-12*EXP(340/TEMP)',NULL,1506495330,1),(776,'HOCH2CO3','HO2',NULL,'HCHO','HO2','OH','KAPHO2*0.44',NULL,1506495330,1),(777,'HOCH2CO3','HO2',NULL,'HOCH2CO2H','O3',NULL,'KAPHO2*0.15',NULL,1506495330,1),(778,'HOCH2CO3','HO2',NULL,'HOCH2CO3H',NULL,NULL,'KAPHO2*0.41',NULL,1506495330,1),(779,'HOCH2CO3','NO',NULL,'HCHO','HO2','NO2','KAPNO',NULL,1506495330,1),(780,'HOCH2CO3','NO2',NULL,'PHAN',NULL,NULL,'KFPAN',NULL,1506495330,1),(781,'HOCH2CO3','NO3',NULL,'HCHO','HO2','NO2','KRO2NO3*1.74',NULL,1506495330,1),(782,'HOCH2CO3',NULL,NULL,'HCHO','HO2',NULL,'1.00D-11*0.7*RO2',NULL,1506495330,1),(783,'HOCH2CO3',NULL,NULL,'HOCH2CO2H',NULL,NULL,'1.00D-11*0.3*RO2',NULL,1506495330,1),(784,'HCOCO',NULL,NULL,'HO2',NULL,NULL,'7.00D11*EXP(-3160/TEMP)',NULL,1506495330,1),(785,'HCOCO',NULL,NULL,'HO2',NULL,NULL,'5.00D-12*O2',NULL,1506495330,1),(786,'HCOCO',NULL,NULL,'OH',NULL,NULL,'5.00D-12*O2*3.2*(1-EXP(-550/TEMP))',NULL,1506495330,1),(787,'HCOCO',NULL,NULL,'HCOCO3',NULL,NULL,'5.00D-12*O2*3.2*EXP(-550/TEMP)',NULL,1506495330,1),(788,'HOCH2CO2H','OH ',NULL,'HCHO','HO2',NULL,'2.73D-12',NULL,1506495330,1),(789,'HOCH2CO2H','OH ',NULL,'HOCH2CO3',NULL,NULL,'6.19D-12',NULL,1506495330,1),(790,'HOCH2CO2H',NULL,NULL,'HCHO','HO2','OH','J<41>',NULL,1506495330,1),(791,'HOCH2CO3H','OH',NULL,'HOCH2CO3',NULL,NULL,'6.19D-12',NULL,1506495330,1),(792,'HOCH2CO3H',NULL,NULL,'HCHO','HO2','OH','J<41>',NULL,1506495330,1),(793,'PHAN','OH ',NULL,'HCHO','NO2',NULL,'1.12D-12',NULL,1506495330,1),(794,'PHAN',NULL,NULL,'HOCH2CO3','NO2',NULL,'KBPAN',NULL,1506495330,1),(795,'HCOCO3','HO2',NULL,'HCOCO2H','O3',NULL,'KAPHO2*0.15',NULL,1506495330,1),(796,'HCOCO3','HO2',NULL,'HCOCO3H',NULL,NULL,'KAPHO2*0.41',NULL,1506495330,1),(797,'HCOCO3','HO2',NULL,'HO2','OH',NULL,'KAPHO2*0.44',NULL,1506495330,1),(798,'HCOCO3','NO',NULL,'HO2','NO2',NULL,'KAPNO',NULL,1506495330,1),(799,'HCOCO3','NO2',NULL,'HO2','NO3',NULL,'KFPAN',NULL,1506495330,1),(800,'HCOCO3','NO3',NULL,'HO2','NO2',NULL,'KRO2NO3*1.74',NULL,1506495330,1),(801,'HCOCO3',NULL,NULL,'HO2',NULL,NULL,'1.00D-11*0.7*RO2',NULL,1506495330,1),(802,'HCOCO3',NULL,NULL,'HCOCO2H',NULL,NULL,'1.00D-11*0.3*RO2',NULL,1506495330,1),(803,'HCOCO2H',NULL,NULL,'HO2',NULL,NULL,'J<34>',NULL,1506495330,1),(804,'HCOCO2H','OH',NULL,'HO2','OH',NULL,'1.23D-11',NULL,1506495330,1),(805,'HCOCO3H',NULL,NULL,'HO2','OH',NULL,'J<41>',NULL,1506495330,1),(806,'HCOCO3H',NULL,NULL,'HO2',NULL,NULL,'J<15>',NULL,1506495330,1),(807,'HCOCO3H','OH',NULL,'HCOCO3',NULL,NULL,'1.58D-11',NULL,1506495330,1),(808,'',NULL,NULL,'',NULL,NULL,NULL,NULL,1506495330,1),(809,'',NULL,NULL,'',NULL,NULL,NULL,NULL,1506495330,1),(810,'',NULL,NULL,'',NULL,NULL,NULL,NULL,1506495330,1),(811,'C2H4','NO3',NULL,'ETHENO3O2',NULL,NULL,'3.3D-12*EXP(-2880/TEMP)',NULL,1506495330,1),(812,'C2H4',' O3',NULL,'HCHO','CH2OOA',NULL,'9.1D-15*EXP(-2580/TEMP)',NULL,1506495330,1),(813,'C2H4','OH',NULL,'HOCH2CH2O2',NULL,NULL,'KMT15',NULL,1506495330,1),(814,'ETHENO3O2','HO2',NULL,'ETHO2HNO3',NULL,NULL,NULL,NULL,1506495330,1),(815,'ETHENO3O2','NO',NULL,'ETHENO3O','NO2',NULL,'KRO2NO',NULL,1506495330,1),(816,'ETHENO3O2','NO3',NULL,'ETHENO3O','NO2',NULL,'KRO2NO3',NULL,1506495330,1),(817,'ETHENO3O2',NULL,NULL,'ETHENO3O',NULL,NULL,'6.00D-13*0.6*RO2',NULL,1506495330,1),(818,'ETHENO3O2',NULL,NULL,'ETHOHNO3',NULL,NULL,'6.00D-13*0.2*RO2',NULL,1506495330,1),(819,'ETHENO3O2',NULL,NULL,'NO3CH2CHO',NULL,NULL,'6.00D-13*0.2*RO2',NULL,1506495330,1),(820,'HCHO',NULL,NULL,'CO','2HO2',NULL,'J<11>',NULL,1506495330,1),(821,'HCHO',NULL,NULL,'H2','CO',NULL,'J<12>',NULL,1506495330,1),(822,'HCHO','NO3',NULL,'HNO3','CO','HO2','5.5D-16',NULL,1506495330,1),(823,'HCHO','OH',NULL,'HO2','CO',NULL,'5.4D-12*EXP(135/TEMP)',NULL,1506495330,1),(824,'CH2OOA',NULL,NULL,'CH2OO',NULL,NULL,'KDEC*0.37',NULL,1506495330,1),(825,'CH2OOA',NULL,NULL,'CO',NULL,NULL,'KDEC*0.50',NULL,1506495330,1),(826,'CH2OOA',NULL,NULL,'HO2','CO','OH','KDEC*0.13',NULL,1506495330,1),(827,'HOCH2CH2O2','HO2',NULL,'HYETHO2H',NULL,NULL,'1.53D-13*EXP(1300/TEMP)',NULL,1506495330,1),(828,'HOCH2CH2O2','NO',NULL,'ETHOHNO3',NULL,NULL,'KRO2NO*0.005',NULL,1506495330,1),(829,'HOCH2CH2O2','NO',NULL,'HOCH2CH2O','NO2',NULL,'KRO2NO*0.995',NULL,1506495330,1),(830,'HOCH2CH2O2','NO3',NULL,'HOCH2CH2O','NO2',NULL,'KRO2NO3',NULL,1506495330,1),(831,'HOCH2CH2O2',NULL,NULL,'ETHGLY',NULL,NULL,'2*(KCH3O2*7.8D-14*EXP(1000/TEMP))@0.5*RO2*0.2',NULL,1506495330,1),(832,'HOCH2CH2O2',NULL,NULL,'HOCH2CH2O',NULL,NULL,'2*(KCH3O2*7.8D-14*EXP(1000/TEMP))@0.5*RO2*0.6',NULL,1506495330,1),(833,'HOCH2CH2O2',NULL,NULL,'HOCH2CHO',NULL,NULL,'2*(KCH3O2*7.8D-14*EXP(1000/TEMP))@0.5*RO2*0.2',NULL,1506495330,1),(834,'ETHO2HNO3','OH',NULL,'ETHENO3O2',NULL,NULL,'1.90D-12*EXP(190/TEMP)',NULL,1506495330,1),(835,'ETHO2HNO3','OH',NULL,'NO3CH2CHO','OH',NULL,'1.62D-12',NULL,1506495330,1),(836,'ETHO2HNO3',NULL,NULL,'ETHENO3O','OH',NULL,'J<41>',NULL,1506495330,1),(837,'ETHENO3O',NULL,NULL,'NO2','HCHO',NULL,'7.00D+03',NULL,1506495330,1),(838,'ETHENO3O',NULL,NULL,'NO3CH2CHO','HO2',NULL,'KROPRIM*O2',NULL,1506495330,1),(839,'ETHOHNO3','OH',NULL,'HOCH2CHO','NO2',NULL,'8.40D-13',NULL,1506495330,1),(840,'NO3CH2CHO','NO3',NULL,'NO3CH2CO3','HNO3',NULL,'KNO3AL',NULL,1506495330,1),(841,'NO3CH2CHO','OH',NULL,'NO3CH2CO3',NULL,NULL,'3.40D-12',NULL,1506495330,1),(842,'NO3CH2CHO',NULL,NULL,'NO2','HCOCH2O',NULL,'J<56>*4.3',NULL,1506495330,1),(843,'CH2OO','CO',NULL,'HCHO',NULL,NULL,'1.20D-15',NULL,1506495330,1),(844,'CH2OO','NO',NULL,'HCHO','NO2',NULL,'1.00D-14',NULL,1506495330,1),(845,'CH2OO','NO2',NULL,'HCHO','NO3',NULL,'1.00D-15',NULL,1506495330,1),(846,'CH2OO','SO2',NULL,'HCHO','SO3',NULL,'7.00D-14',NULL,1506495330,1),(847,'CH2OO',NULL,NULL,'HCHO','H2O2',NULL,'6.00D-18*H2O',NULL,1506495330,1),(848,'CH2OO',NULL,NULL,'HCOOH',NULL,NULL,'1.00D-17*H2O',NULL,1506495330,1),(849,'HYETHO2H','OH',NULL,'HOCH2CH2O2',NULL,NULL,'1.90D-12*EXP(190/TEMP)',NULL,1506495330,1),(850,'HYETHO2H','OH',NULL,'HOCH2CHO','OH',NULL,'1.38D-11',NULL,1506495330,1),(851,'HYETHO2H',NULL,NULL,'HOCH2CH2O','OH',NULL,'J<41>',NULL,1506495330,1),(852,'HOCH2CH2O',NULL,NULL,'2HCHO','HO2',NULL,'9.50D+13*EXP(-5988/TEMP)',NULL,1506495330,1),(853,'HOCH2CH2O',NULL,NULL,'HOCH2CHO','HO2',NULL,'KROPRIM*O2',NULL,1506495330,1),(854,'ETHGLY','OH',NULL,'HOCH2CHO','HO2',NULL,'1.45D-11',NULL,1506495330,1),(855,'HOCH2CHO','NO3',NULL,'HOCH2CO3','HNO3',NULL,'KNO3AL',NULL,1506495330,1),(856,'HOCH2CHO','OH',NULL,'GLYOX','HO2',NULL,'1.00D-11*0.200',NULL,1506495330,1),(857,'HOCH2CHO','OH',NULL,'HOCH2CO3',NULL,NULL,'1.00D-11*0.800',NULL,1506495330,1),(858,'HOCH2CHO',NULL,NULL,'HCHO','2HO2','CO','J<15>',NULL,1506495330,1),(859,'NO3CH2CO3','HO2',NULL,'HCHO','NO2','OH','KAPHO2*0.44',NULL,1506495330,1),(860,'NO3CH2CO3','HO2',NULL,'NO3CH2CO2H','O3',NULL,'KAPHO2*0.15',NULL,1506495330,1),(861,'NO3CH2CO3','HO2',NULL,'NO3CH2CO3H',NULL,NULL,'KAPHO2*0.41',NULL,1506495330,1),(862,'NO3CH2CO3','NO',NULL,'HCHO','2NO2',NULL,'KAPNO',NULL,1506495330,1),(863,'NO3CH2CO3','NO2',NULL,'NO3CH2PAN',NULL,NULL,'KFPAN',NULL,1506495330,1),(864,'NO3CH2CO3','NO3',NULL,'HCHO','2NO2',NULL,'KRO2NO3*1.74',NULL,1506495330,1),(865,'NO3CH2CO3',NULL,NULL,'HCHO','NO2',NULL,'1.00D-11*0.7*RO2',NULL,1506495330,1),(866,'NO3CH2CO3',NULL,NULL,'NO3CH2CO2H',NULL,NULL,'1.00D-11*0.3*RO2',NULL,1506495330,1),(867,'HCOCH2O',NULL,NULL,'HCHO','CO','HO2','KDEC',NULL,1506495330,1),(868,'HCOOH','OH',NULL,'HO2',NULL,NULL,'4.5D-13',NULL,1506495330,1),(869,'HOCH2CO3','HO2',NULL,'HCHO','HO2','OH','KAPHO2*0.44',NULL,1506495330,1),(870,'HOCH2CO3','HO2',NULL,'HOCH2CO2H','O3',NULL,'KAPHO2*0.15',NULL,1506495330,1),(871,'HOCH2CO3','HO2',NULL,'OCH2CO3H',NULL,NULL,'KAPHO2*0.41',NULL,1506495330,1),(872,'HOCH2CO3','NO',NULL,'NO2','HO2','HCHO','KAPNO',NULL,1506495330,1),(873,'HOCH2CO3','NO2',NULL,'PHAN',NULL,NULL,'KFPAN',NULL,1506495330,1),(874,'HOCH2CO3','NO3',NULL,'NO2','HO2','HCHO','KRO2NO3*1.74',NULL,1506495330,1),(875,'HOCH2CO3',NULL,NULL,'HCHO','HO2',NULL,'1.00D-11*0.7*RO2',NULL,1506495330,1),(876,'HOCH2CO3',NULL,NULL,'HOCH2CO2H',NULL,NULL,'1.00D-11*0.3*RO2',NULL,1506495330,1),(877,'GLYOX',NULL,NULL,'H2','2CO',NULL,'J<31>',NULL,1506495330,1),(878,'GLYOX',NULL,NULL,'2CO','2HO2',NULL,'J<33>',NULL,1506495330,1),(879,'GLYOX',NULL,NULL,'HCHO','CO',NULL,'J<32>',NULL,1506495330,1),(880,'GLYOX','NO3',NULL,'HCOCO','HNO3',NULL,'KNO3AL',NULL,1506495330,1),(881,'GLYOX','OH',NULL,'HCOCO',NULL,NULL,'3.1D-12*EXP(340/TEMP)',NULL,1506495330,1),(882,'NO3CH2CO2H','OH',NULL,'HCHO','NO2',NULL,'1.68D-13',NULL,1506495330,1),(883,'NO3CH2CO3H','OH',NULL,'NO3CH2CO3',NULL,NULL,'3.63D-12',NULL,1506495330,1),(884,'NO3CH2CO3H',NULL,NULL,'HCHO','NO2','OH','J<41>',NULL,1506495330,1),(885,'NO3CH2PAN','OH',NULL,'HCHO','CO','2NO2','1.12D-14',NULL,1506495330,1),(886,'NO3CH2PAN',NULL,NULL,'NO3CH2CO3','NO2',NULL,'KBPAN',NULL,1506495330,1),(887,'HOCH2CO2H','OH',NULL,'HCHO','HO2',NULL,'2.73D-12',NULL,1506495330,1),(888,'HOCH2CO3H',NULL,NULL,'HOCH2CO3',NULL,NULL,'6.19D-12',NULL,1506495330,1),(889,'HOCH2CO3H',NULL,NULL,'HCHO','HO2','OH','J<41>',NULL,1506495330,1),(890,'PHAN',NULL,NULL,'HOCH2CO3','NO2',NULL,'KBPAN',NULL,1506495330,1),(891,'PHAN','OH',NULL,'HCHO','HO2','OH','1.12D-12',NULL,1506495330,1),(892,'HCOCO',NULL,NULL,'2CO','HO2',NULL,'7.00D11*EXP(-3160/TEMP)',NULL,1506495330,1),(893,'HCOCO',NULL,NULL,'2CO','HO2',NULL,'7.00D11*EXP(-3160/TEMP)',NULL,1506495330,1),(894,'HCOCO',NULL,NULL,'CO','OH',NULL,'5.00D-12*O2*3.2*(1-EXP(-550/TEMP))',NULL,1506495330,1),(895,'HCOCO',NULL,NULL,'HCOCO3',NULL,NULL,'5.00D-12*O2*3.2*EXP(-550/TEMP)',NULL,1506495330,1),(896,'HCOCO3','HO2',NULL,'HCOCO2H','O3',NULL,'KAPHO2*0.15',NULL,1506495330,1),(897,'HCOCO3','HO2',NULL,'HCOCO3H',NULL,NULL,'KAPHO2*0.41',NULL,1506495330,1),(898,'HCOCO3','HO2',NULL,'HO2','CO','OH','KAPHO2*0.44',NULL,1506495330,1),(899,'HCOCO3','NO',NULL,'HO2','CO','NO2','KAPNO',NULL,1506495330,1),(900,'HCOCO3','NO2',NULL,'HO2','CO','NO3','KFPAN',NULL,1506495330,1),(901,'HCOCO3','NO3',NULL,'HO2','CO','NO2','KRO2NO3*1.74',NULL,1506495330,1),(902,'HCOCO3',NULL,NULL,'CO','HO2',NULL,'1.00D-11*0.7*RO2',NULL,1506495330,1),(903,'HCOCO3',NULL,NULL,'HCOCO2H',NULL,NULL,'1.00D-11*0.3*RO2',NULL,1506495330,1),(904,'HCOCO2H',NULL,NULL,'2HO2','CO',NULL,'J<34>',NULL,1506495330,1),(905,'HCOCO2H','OH',NULL,'HO2','CO',NULL,'1.23D-11',NULL,1506495330,1),(906,'HCOCO3H',NULL,NULL,'HO2','CO','OH','J<41>',NULL,1506495330,1),(907,'HCOCO3H',NULL,NULL,'HO2','CO','OH','J<15>',NULL,1506495330,1),(908,'HCOCO3H','OH',NULL,'HCOCO3',NULL,NULL,'1.58D-11',NULL,1506495330,1),(909,'',NULL,NULL,'',NULL,NULL,NULL,NULL,1506495330,1),(910,'',NULL,NULL,'',NULL,NULL,NULL,NULL,1506495330,1),(911,'C3H8','CL',NULL,'IC3H7O2',NULL,NULL,'1.4D-10*0.43*EXP(75/TEMP)',NULL,1506495330,1),(912,'C3H8','CL',NULL,'NC3H7O2',NULL,NULL,'1.4D-10*0.59*EXP(-90/TEMP)',NULL,1506495330,1),(913,'C3H8','OH',NULL,'IC3H7O2',NULL,NULL,'7.6D-12*EXP(-585/TEMP)*0.736',NULL,1506495330,1),(914,'C3H8','OH',NULL,'NC3H7O2',NULL,NULL,'7.6D-12*EXP(-585/TEMP)*0.264',NULL,1506495330,1),(915,'IC3H7O2','HO2',NULL,'IC3H7OOH',NULL,NULL,'KRO2HO2*0.520',NULL,1506495330,1),(916,'IC3H7O2','NO',NULL,'IC3H7NO3',NULL,NULL,'2.7D-12*EXP(360/TEMP)*0.042',NULL,1506495330,1),(917,'IC3H7O2','NO',NULL,'IC3H7O','NO2',NULL,'2.7D-12*EXP(360/TEMP)*0.042',NULL,1506495330,1),(918,'IC3H7O2','NO3',NULL,'IC3H7O','NO2',NULL,'2.7D-12*EXP(360/TEMP)*0.958',NULL,1506495330,1),(919,'IC3H7O2',NULL,NULL,'CH3COCH3',NULL,NULL,'2*(KCH3O2*1.6D-12*EXP(-2200/TEMP))@0.5*RO2*0.2',NULL,1506495330,1),(920,'IC3H7O2',NULL,NULL,'IC3H7O',NULL,NULL,'2*(KCH3O2*1.6D-12*EXP(-2200/TEMP))@0.5*RO2*0.6',NULL,1506495330,1),(921,'IC3H7O2',NULL,NULL,'IPROPOL',NULL,NULL,'2*(KCH3O2*1.6D12*EX(2200/TEMP))@0.5*RO2*0.2',NULL,1506495330,1),(922,'NC3H7O2','HO2',NULL,'NC3H7OOH',NULL,NULL,'KRO2HO2*0.520',NULL,1506495330,1),(923,'NC3H7O2','NO',NULL,'NC3H7NO3',NULL,NULL,'2.9D-12*EXP(350/TEMP)*0.020',NULL,1506495330,1),(924,'NC3H7O2','NO',NULL,'NC3H7O','NO2',NULL,'2.9D-12*EXP(350/TEMP)*0.980',NULL,1506495330,1),(925,'NC3H7O2','NO3',NULL,'NC3H7O','NO2',NULL,'KRO2NO3',NULL,1506495330,1),(926,'NC3H7O2',NULL,NULL,'C2H5CHO',NULL,NULL,'2*(K298CH3O2*3D-13)@0.5*RO2*0.2',NULL,1506495330,1),(927,'NC3H7O2',NULL,NULL,'NC3H7O',NULL,NULL,'2*(K298CH3O2*3D-13)@0.5*RO2*0.6',NULL,1506495330,1),(928,'NC3H7O2',NULL,NULL,'NPROPOL',NULL,NULL,'2*(K298CH3O2*3D-13)@0.5*RO2*0.2',NULL,1506495330,1),(929,'IC3H7OOH',NULL,NULL,'IC3H7O','OH',NULL,'J<41>',NULL,1506495330,1),(930,'IC3H7OOH','OH',NULL,'CH3COCH3','OH',NULL,'1.66D-11',NULL,1506495330,1),(931,'IC3H7OOH','OH',NULL,'IC3H7O2',NULL,NULL,'1.90D-12*EXP(190/TEMP)',NULL,1506495330,1),(932,'IC3H7NO3',NULL,NULL,'IC3H7O','NO2',NULL,'J<54>',NULL,1506495330,1),(933,'IC3H7NO3','OH ',NULL,'CH3COCH3','NO2',NULL,'6.2D-13*EXP(-230/TEMP)',NULL,1506495330,1),(934,'IC3H7O',NULL,NULL,'IC3H7O','HO2',NULL,'1.5D-14*EXP(-230/TEMP)*O2',NULL,1506495330,1),(935,'CH3COCH3','OH',NULL,'CH3COCH2O2',NULL,NULL,'8.8D-12*EXP(-1320/TEMP) + 1.7D-14*EXP(423/TEMP)',NULL,1506495330,1),(936,'CH3COCH3',NULL,NULL,'CH3CO3','CH3O2',NULL,'J<21>',NULL,1506495330,1),(937,'IPROPOL','OH',NULL,'CH3COCH3','HO2',NULL,'2.6D-12*EXP(200/TEMP)*0.861',NULL,1506495330,1),(938,'IPROPOL','OH',NULL,'IPROPOLO2',NULL,NULL,'2.6D-12*EXP(200/TEMP)*0.139',NULL,1506495330,1),(939,'NC3H7OOH',NULL,NULL,'NC3H7O','OH',NULL,'J<41>',NULL,1506495330,1),(940,'NC3H7OOH','OH',NULL,'C2H5CHO','OH',NULL,'1.10D-11',NULL,1506495330,1),(941,'NC3H7OOH','OH',NULL,'NC3H7O2',NULL,NULL,'1.90D-12*EXP(190/TEMP)',NULL,1506495330,1),(942,'NC3H7NO3',NULL,NULL,'NC3H7O','NO2',NULL,'J<53>',NULL,1506495330,1),(943,'NC3H7NO3','OH',NULL,'C2H5CHO','NO2',NULL,'5.8D-13',NULL,1506495330,1),(944,'NC3H7O',NULL,NULL,'C2H5CHO','HO2',NULL,'2.6D-14*EXP(-255/TEMP)*O2',NULL,1506495330,1),(945,'C2H5CHO','NO3',NULL,'C2H5CO3','HNO3',NULL,'3.24D-12*EXP(-1860/TEMP)',NULL,1506495330,1),(946,'C2H5CHO','OH',NULL,'C2H5CO3',NULL,NULL,'4.9D-12*EXP(405/TEMP)',NULL,1506495330,1),(947,'C2H5CHO',NULL,NULL,'C2H5O2','HO2','CO','J<14>',NULL,1506495330,1),(948,'NPROPOL','OH',NULL,'C2H5CHO','HO2',NULL,'4.6D-12*EXP(70/TEMP)*0.494',NULL,1506495330,1),(949,'NPROPOL','OH',NULL,'HO1C3O2',NULL,NULL,'4.6D-12*EXP(70/TEMP)*0.063',NULL,1506495330,1),(950,'NPROPOL','OH',NULL,'HYPROPO2',NULL,NULL,'4.6D-12*EXP(70/TEMP)*0.443',NULL,1506495330,1),(951,'CH3COCH2O2','HO2',NULL,'CH3COCH2O','OH',NULL,'1.36D-13*EXP(1250/TEMP)*0.15',NULL,1506495330,1),(952,'CH3COCH2O2','HO2',NULL,'HYPERACET',NULL,NULL,'1.36D-13*EXP(1250/TEMP)*0.85',NULL,1506495330,1),(953,'CH3COCH2O2','NO',NULL,'CH3COCH2O','NO2',NULL,'KRO2NO',NULL,1506495330,1),(954,'CH3COCH2O2','NO3',NULL,'CH3COCH2O','NO2',NULL,'KRO2NO3',NULL,1506495330,1),(955,'CH3COCH2O2',NULL,NULL,'ACETOL',NULL,NULL,'2*(K298CH3O2*8.0D-12)@0.5*RO2*0.2',NULL,1506495330,1),(956,'CH3COCH2O2',NULL,NULL,'CH3COCH2O',NULL,NULL,'2*(K298CH3O2*8.0D-12)@0.5*RO2*0.6',NULL,1506495330,1),(957,'CH3COCH2O2',NULL,NULL,'MGLYOX',NULL,NULL,'2*(K298CH3O2*8.0D-12)@0.5*RO2*0.2',NULL,1506495330,1),(958,'CH3CO3','HO2',NULL,'CH3CO2H','O3',NULL,'KAPHO2*0.15',NULL,1506495330,1),(959,'CH3CO3','HO2',NULL,'CH3CO3H',NULL,NULL,'KAPHO2*0.41',NULL,1506495330,1),(960,'CH3CO3','HO2',NULL,'CH3O2','OH',NULL,'KAPHO2*0.44',NULL,1506495330,1),(961,'CH3CO3','NO',NULL,'CH3O2','NO2',NULL,'7.5D-12*EXP(290/TEMP)',NULL,1506495330,1),(962,'CH3CO3','NO2',NULL,'PAN',NULL,NULL,'KFPAN',NULL,1506495330,1),(963,'CH3CO3','NO3',NULL,'CH3O2','CH3O2',NULL,'4.0D-12',NULL,1506495330,1),(964,'CH3CO3',NULL,NULL,'CH3CO2H',NULL,NULL,'2*(K298CH3O2*2.9D-12*EXP(500/TEMP))@0.5*RO2*0.3',NULL,1506495330,1),(965,'CH3CO3',NULL,NULL,'CH3O2',NULL,NULL,'2*(K298CH3O2*2.9D12*EXP(500/TEMP))@0.5*RO2*0.7',NULL,1506495330,1),(966,'CH3O2','HO2',NULL,'CH3OOH',NULL,NULL,'3.8D-13*EXP(780/TEMP)*(1-1/(1+498*EXP(-1160/TEMP)))',NULL,1506495330,1),(967,'CH3O2','HO2',NULL,'HCHO',NULL,NULL,'3.8D-13*EXP(780/TEMP)*(1/(1+498*EXP(-1160/TEMP)))',NULL,1506495330,1),(968,'CH3O2','NO',NULL,'CH3NO3',NULL,NULL,'2.3D-12*EXP(360/TEMP)*0.001',NULL,1506495330,1),(969,'CH3O2','NO',NULL,'CH3O','NO2',NULL,'2.3D-12*EXP(360/TEMP)*0.999',NULL,1506495330,1),(970,'CH3O2','NO2',NULL,'CH3O2NO2',NULL,NULL,'KMT13',NULL,1506495330,1),(971,'CH3O2','NO3',NULL,'CH3O','NO2',NULL,'1.2D-12',NULL,1506495330,1),(972,'CH3O2',NULL,NULL,'CH3O',NULL,NULL,'2*KCH3O2*RO2*7.18*EXP(-885/TEMP)',NULL,1506495330,1),(973,'CH3O2',NULL,NULL,'CH3OH',NULL,NULL,'2*KCH3O2*RO2*0.5*(1-7.18*EXP(-885/TEMP))',NULL,1506495330,1),(974,'CH3O2',NULL,NULL,'HCHO',NULL,NULL,'2*KCH3O2*RO2*0.5*(1-7.18*EXP(-885/TEMP))',NULL,1506495330,1),(975,'IPROPOLO2','HO2',NULL,'IPROPOLO2H',NULL,NULL,'KRO2HO2*0.520',NULL,1506495330,1),(976,'IPROPOLO2','NO',NULL,'IPROPOLO','NO2',NULL,'KRO2NO*0.991',NULL,1506495330,1),(977,'IPROPOLO2','NO',NULL,'PROLNO3',NULL,NULL,'KRO2NO*0.009',NULL,1506495330,1),(978,'IPROPOLO2','NO3',NULL,'IPROPOLO','NO2',NULL,'KRO2NO3',NULL,1506495330,1),(979,'IPROPOLO2',NULL,NULL,'CH3CHOHCHO',NULL,NULL,'2.00D-12*0.2*RO2',NULL,1506495330,1),(980,'IPROPOLO2',NULL,NULL,'IPROPOLO',NULL,NULL,'2.00D-12*0.6*RO2',NULL,1506495330,1),(981,'IPROPOLO2',NULL,NULL,'PROPGLY',NULL,NULL,'2.00D-12*0.2*RO2',NULL,1506495330,1),(982,'C2H5CO3','HO2',NULL,'C2H5O2','OH',NULL,'KAPHO2*0.44',NULL,1506495330,1),(983,'C2H5CO3','HO2',NULL,'PERPROACID',NULL,NULL,'KAPHO2*0.41',NULL,1506495330,1),(984,'C2H5CO3','HO2',NULL,'PROPACID','O3',NULL,'KAPHO2*0.15',NULL,1506495330,1),(985,'C2H5CO3','NO',NULL,'NO2','C2H5O2',NULL,'6.7D-12*EXP(340/TEMP)',NULL,1506495330,1),(986,'C2H5CO3','NO2',NULL,'PPN',NULL,NULL,'KFPAN',NULL,1506495330,1),(987,'C2H5CO3','NO3',NULL,'C2H5O2','NO2',NULL,'KRO2NO3*1.74',NULL,1506495330,1),(988,'C2H5CO3',NULL,NULL,'C2H5O2',NULL,NULL,'1.00D-11*0.7*RO2',NULL,1506495330,1),(989,'C2H5CO3',NULL,NULL,'PROPACID',NULL,NULL,'1.00D-11*0.3*RO2',NULL,1506495330,1),(990,'C2H5O2','HO2',NULL,'C2H5OOH',NULL,NULL,'4.3D-13*EXP(870/TEMP)',NULL,1506495330,1),(991,'C2H5O2','NO',NULL,'C2H5NO3',NULL,NULL,'2.55D-12*EXP(380/TEMP)*0.009',NULL,1506495330,1),(992,'C2H5O2','NO',NULL,'C2H5O','NO2',NULL,'2.55D-12*EXP(380/TEMP)*0.991',NULL,1506495330,1),(993,'C2H5O2','NO3',NULL,'C2H5O','NO2',NULL,'KRO2NO3',NULL,1506495330,1),(994,'C2H5O2',NULL,NULL,'C2H5O',NULL,NULL,'2*(KCH3O2*6.4D14*(TEMP/300)@0*EXP(0/TEMP))@0.5*RO2*0.6',NULL,1506495330,1),(995,'C2H5O2',NULL,NULL,'C2H5OH',NULL,NULL,'2*(KCH3O2*6.4D-14*(TEMP/300)@0*EXP(0/TEMP))@0.5*RO2*0.2',NULL,1506495330,1),(996,'C2H5O2',NULL,NULL,'CH3CHO',NULL,NULL,'2*(KCH3O2*6.4D-14*(TEMP/300)@0*EXP(0/TEMP))@0.5*RO2*0.2',NULL,1506495330,1),(997,'HO1C3O2','HO2',NULL,'HO1C3OOH',NULL,NULL,'KRO2HO2*0.520',NULL,1506495330,1),(998,'HO1C3O2','NO',NULL,'HO1C3NO3',NULL,NULL,'KRO2NO*0.019',NULL,1506495330,1),(999,'HO1C3O2','NO',NULL,'HO1C3O','NO2',NULL,'KRO2NO*0.981',NULL,1506495330,1),(1000,'HO1C3O2','NO3',NULL,'HO1C3O','NO2',NULL,'KRO2NO3*1.74',NULL,1506495330,1),(1001,'HO1C3O2',NULL,NULL,'HO1C3O',NULL,NULL,'6.00D-13*0.6*RO2',NULL,1506495330,1),(1002,'HO1C3O2',NULL,NULL,'HOC2H4CHO',NULL,NULL,'6.00D-13*0.2*RO2',NULL,1506495330,1),(1003,'HO1C3O2',NULL,NULL,'HOC3H6OH',NULL,NULL,'6.00D-13*0.2*RO2',NULL,1506495330,1),(1004,'HYPROPO2','HO2',NULL,'HYPROPO2H',NULL,NULL,'KRO2HO2*0.520',NULL,1506495330,1),(1005,'HYPROPO2','NO3',NULL,'HYPROPO','NO2',NULL,'KRO2NO3',NULL,1506495330,1),(1006,'HYPROPO2',NULL,NULL,'ACETOL',NULL,NULL,'8.80D-13*0.2*RO2',NULL,1506495330,1),(1007,'HYPROPO2',NULL,NULL,'HYPROPO',NULL,NULL,'8.80D-13*0.6*RO2',NULL,1506495330,1),(1008,'HYPROPO2',NULL,NULL,'PROPGLY',NULL,NULL,'8.80D-13*0.2*RO2',NULL,1506495330,1),(1009,'HYPROPO2','NO',NULL,'HYPROPO','NO2',NULL,'KRO2NO*0.977',NULL,1506495330,1),(1010,'HYPROPO2','NO',NULL,'PROPOLNO3',NULL,NULL,'KRO2NO*0.023',NULL,1506495330,1),(1011,'CH3COCH2O','OH',NULL,'CH3CO3','HCHO',NULL,'KDEC',NULL,1506495330,1),(1012,'HYPERACET','OH',NULL,'CH3COCH2O2',NULL,NULL,'1.90D-12*EXP(190/TEMP)',NULL,1506495330,1),(1013,'HYPERACET',NULL,NULL,'MGLYOX','OH',NULL,'8.39D-12',NULL,1506495330,1),(1014,'HYPERACET',NULL,NULL,'CH3CO3','HCHO','OH','J<22>',NULL,1506495330,1),(1015,'HYPERACET',NULL,NULL,'CH3COCH2O','OH',NULL,'J<41>',NULL,1506495330,1),(1016,'ACETOL','OH',NULL,'MGLYOX','HO2',NULL,'1.6D-12*EXP(305/TEMP)',NULL,1506495330,1),(1017,'ACETOL',NULL,NULL,'CH3CO3','HCHO','HO2','J<22>',NULL,1506495330,1),(1018,'MGLYOX',NULL,NULL,'CH3CO3','CO','HO2','J<34>',NULL,1506495330,1),(1019,'MGLYOX','NO3',NULL,'CH3CO3','CO','HNO3','KNO3AL*2.4',NULL,1506495330,1),(1020,'MGLYOX','OH',NULL,'CH3CO3','CO',NULL,'1.9D-12*EXP(575/TEMP)',NULL,1506495330,1),(1021,'CH3CO2H','OH',NULL,'CH3O2',NULL,NULL,'8.00D-13',NULL,1506495330,1),(1022,'CH3CO3H','OH',NULL,'CH3CO3',NULL,NULL,'3.70D-12',NULL,1506495330,1),(1023,'CH3CO3H',NULL,NULL,'CH3O2','OH',NULL,'J<41>',NULL,1506495330,1),(1024,'PAN','OH',NULL,'HCHO','CO','NO2','3D-14',NULL,1506495330,1),(1025,'PAN',NULL,NULL,'CH3CO3','NO2',NULL,'KBPAN',NULL,1506495330,1),(1026,'CH3OOH',NULL,NULL,'CH3O','OH',NULL,'J<41>',NULL,1506495330,1),(1027,'CH3OOH','OH',NULL,'CH3O2',NULL,NULL,'5.3D-12*EXP(190/TEMP)*0.6',NULL,1506495330,1),(1028,'CH3OOH','OH',NULL,'HCHO','OH',NULL,'5.3D-12*EXP(190/TEMP)*0.4',NULL,1506495330,1),(1029,'HCHO',NULL,NULL,'CO','2HO2',NULL,'J<11>',NULL,1506495330,1),(1030,'HCHO',NULL,NULL,'H2','CO',NULL,'J<12>',NULL,1506495330,1),(1031,'HCHO','NO3',NULL,'HNO3','CO','HO2','5.5D-16',NULL,1506495330,1),(1032,'HCHO','OH',NULL,'HO2','CO',NULL,'5.4D-12*EXP(135/TEMP)',NULL,1506495330,1),(1033,'CH3NO3',NULL,NULL,'CH3O ','NO2',NULL,'J<51>',NULL,1506495330,1),(1034,'CH3NO3','OH',NULL,'HCHO','NO2',NULL,'4.0D-13*EXP(-845/TEMP)',NULL,1506495330,1),(1035,'CH3O',NULL,NULL,'HCHO','HO2',NULL,'7.2D-14*EXP(-1080/TEMP)*O2',NULL,1506495330,1),(1036,'CH3O2NO2',NULL,NULL,'CH3O2','NO2',NULL,'KMT14',NULL,1506495330,1),(1037,'CH3OH','OH',NULL,'HCHO','HO2',NULL,'2.85D-12*EXP(-345/TEMP)',NULL,1506495330,1),(1038,'IPROPOLO2H','OH',NULL,'CH3CHOHCHO','OH',NULL,'1.83D-11',NULL,1506495330,1),(1039,'IPROPOLO2H','OH',NULL,'IPROPOLO2',NULL,NULL,'1.90D-12*EXP(190/TEMP)',NULL,1506495330,1),(1040,'IPROPOLO2H',NULL,NULL,'IPROPOLO','OH',NULL,'J<41>',NULL,1506495330,1),(1041,'IPROPOLO',NULL,NULL,'CH3CHO','HCHO','HO2','2.00D+14*EXP(-5505/TEMP)',NULL,1506495330,1),(1042,'PROLNO3','OH',NULL,'CH3CHOHCHO','NO2',NULL,'1.71D-12',NULL,1506495330,1),(1043,'CH3CHOHCHO','NO3',NULL,'CH3CHOHCO3','HNO3',NULL,'KNO3AL*2.4',NULL,1506495330,1),(1044,'CH3CHOHCHO','OH',NULL,'CH3CHOHCO3',NULL,NULL,'1.7D-11',NULL,1506495330,1),(1045,'CH3CHOHCHO',NULL,NULL,'CH3CHO','2HO2','CO','J<17>',NULL,1506495330,1),(1046,'PROPGLY','OH',NULL,'ACETOL','HO2',NULL,'1.20D-11*0.613',NULL,1506495330,1),(1047,'PROPGLY','OH',NULL,'CH3CHOHCHO','HO2',NULL,'1.20D-11*0.387',NULL,1506495330,1),(1048,'PERPROACID','OH',NULL,'C2H5CO3',NULL,NULL,'4.42D-12',NULL,1506495330,1),(1049,'PERPROACID',NULL,NULL,'C2H5O2','OH',NULL,'J<41>',NULL,1506495330,1),(1050,'PROPACID','OH',NULL,'CH3CHO','CO','NO2','1.27D-12',NULL,1506495330,1),(1051,'PPN','OH',NULL,'C2H5CO3','NO2',NULL,'1.27D-12',NULL,1506495330,1),(1052,'PPN',NULL,NULL,'C2H5CO3','NO2',NULL,'1.7D-3*EXP(-11280/TEMP)',NULL,1506495330,1),(1053,'C2H5OOH',NULL,NULL,'C2H5O','OH',NULL,'J<41>',NULL,1506495330,1),(1054,'C2H5OOH','OH',NULL,'C2H5O2',NULL,NULL,'1.90D-12*EXP(190/TEMP)',NULL,1506495330,1),(1055,'C2H5OOH','OH',NULL,'CH3CHO','OH',NULL,'8.01D-12',NULL,1506495330,1),(1056,'C2H5OH','OH',NULL,'C2H5O',NULL,NULL,'3.0D-12*EXP(20/TEMP)*0.05',NULL,1506495330,1),(1057,'C2H5OH','OH',NULL,'CH3CHO','HO2',NULL,'3.0D-12*EXP(20/TEMP)*0.90',NULL,1506495330,1),(1058,'C2H5OH','OH',NULL,'HOCH2CH2O2',NULL,NULL,'3.0D-12*EXP(20/TEMP)*0.05',NULL,1506495330,1),(1059,'C2H5NO3',NULL,NULL,'C2H5O','NO2',NULL,'J<52>',NULL,1506495330,1),(1060,'C2H5NO3','OH',NULL,'CH3CHO','NO2',NULL,'6.7D-13*EXP(-395/TEMP)',NULL,1506495330,1),(1061,'C2H5O',NULL,NULL,'CH3O2','CH2O',NULL,'2.4D-14*EXP(-325/TEMP)*O2',NULL,1506495330,1),(1062,'CH3CHO',NULL,NULL,'CH3O2','HO2',NULL,'J<13>',NULL,1506495330,1),(1063,'CH3CHO','NO3',NULL,'CH3CO3','HNO3',NULL,'1.4D-12*EXP(-1860/TEMP)',NULL,1506495330,1),(1064,'CH3CHO','OH',NULL,'CH3CO3',NULL,NULL,'4.7D-12*EXP(345/TEMP)*0.95',NULL,1506495330,1),(1065,'CH3CHO','OH',NULL,'HCOCH2O2',NULL,NULL,'4.7D-12*EXP(345/TEMP)*0.05',NULL,1506495330,1),(1066,'HO1C3OOH',NULL,NULL,'HO1C3O','OH',NULL,'J<41>',NULL,1506495330,1),(1067,'HO1C3OOH','OH',NULL,'HO1C3O2',NULL,NULL,'1.90D-12*EXP(190/TEMP)',NULL,1506495330,1),(1068,'HO1C3OOH','OH',NULL,'HOC2H4CHO ','OH',NULL,'1.52D-11',NULL,1506495330,1),(1069,'HO1C3NO3',NULL,NULL,'HO1C3O','NO2',NULL,'J<53>',NULL,1506495330,1),(1070,'HO1C3NO3','OH',NULL,'HOC2H4CHO','NO2',NULL,'4.44D-12',NULL,1506495330,1),(1071,'HO1C3O',NULL,NULL,'HOC2H4CHO','HO2',NULL,'KROPRIM*O2',NULL,1506495330,1),(1072,'HOC2H4CHO',NULL,NULL,'HOCH2CH2O2','HO2','CO','J<15>',NULL,1506495330,1),(1073,'HOC2H4CHO','NO3',NULL,'HOC2H4CO3','HNO3',NULL,'KNO3AL*2.4',NULL,1506495330,1),(1074,'HOC2H4CHO','OH',NULL,'HOC2H4CO3',NULL,NULL,'3.06D-11',NULL,1506495330,1),(1075,'HOC3H6OH','OH',NULL,'HOC2H4CHO','HO2',NULL,'9.73D-12',NULL,1506495330,1),(1076,'HYPROPO2H','OH',NULL,'ACETOL','OH',NULL,'2.44D-11',NULL,1506495330,1),(1077,'HYPROPO2H','OH',NULL,'HYPROPO2',NULL,NULL,'1.90D-12*EXP(190/TEMP)',NULL,1506495330,1),(1078,'HYPROPO2H',NULL,NULL,'HYPROPO','OH',NULL,'J<41>',NULL,1506495330,1),(1079,'HYPROPO',NULL,NULL,'CH3CHO','HCHO','HO2','2.00D+14*EXP(-6410/TEMP)',NULL,1506495330,1),(1080,'PROPOLNO3','OH',NULL,'ACETOL','NO2',NULL,'9.16D-13',NULL,1506495330,1),(1081,'CH3CHOHCO3','HO2',NULL,'CH3CHO','HO2','OH','KAPHO2*0.44',NULL,1506495330,1),(1082,'CH3CHOHCO3','HO2',NULL,'IPROPOLPER',NULL,NULL,'KAPHO2*0.56',NULL,1506495330,1),(1083,'CH3CHOHCO3','NO',NULL,'CH3CHO','HO2','NO2','KAPNO',NULL,1506495330,1),(1084,'CH3CHOHCO3','NO2',NULL,'IPROPOLPAN',NULL,NULL,'KFPAN',NULL,1506495330,1),(1085,'CH3CHOHCO3','NO3',NULL,'CH3CHO','HO2','NO2','KRO2NO3*1.74',NULL,1506495330,1),(1086,'CH3CHOHCO3',NULL,NULL,'CH3CHO','HO2',NULL,'1.00D-11*RO2',NULL,1506495330,1),(1087,'HOCH2CH2O2','HO2',NULL,'HYETHO2H',NULL,NULL,'1.53D-13*EXP(1300/TEMP)',NULL,1506495330,1),(1088,'HOCH2CH2O2','NO',NULL,'ETHOHNO3',NULL,NULL,'KRO2NO*0.005',NULL,1506495330,1),(1089,'HOCH2CH2O2','NO',NULL,'HOCH2CH2O','NO2',NULL,'KRO2NO*0.995',NULL,1506495330,1),(1090,'HOCH2CH2O2','NO3',NULL,'HOCH2CH2O','NO2',NULL,'KRO2NO3',NULL,1506495330,1),(1091,'HOCH2CH2O2',NULL,NULL,'ETHGLY',NULL,NULL,'2*(KCH3O2*7.8D-14*EXP(1000/TEMP))@0.5*RO2*0.2',NULL,1506495330,1),(1092,'HOCH2CH2O2',NULL,NULL,'HOCH2CH2O',NULL,NULL,'2*(KCH3O2*7.8D-14*EXP(1000/TEMP))@0.5*RO2*0.6',NULL,1506495330,1),(1093,'HOCH2CH2O2',NULL,NULL,'HOCH2CHO',NULL,NULL,'2*(KCH3O2*7.8D-14*EXP(1000/TEMP))@0.5*RO2*0.2',NULL,1506495330,1),(1094,'HCOCH2O2','HO2',NULL,'HCOCH2COOH',NULL,NULL,'KRO2HO2*0.387',NULL,1506495330,1),(1095,'HCOCH2O2','NO',NULL,'HCOCH2O','NO2',NULL,'KRO2NO',NULL,1506495330,1),(1096,'HCOCH2O2','NO3',NULL,'HCOCH2O','NO2',NULL,'KRO2NO3',NULL,1506495330,1),(1097,'HCOCH2O2',NULL,NULL,'GLYOX',NULL,NULL,'2.00D-12*0.2*RO2',NULL,1506495330,1),(1098,'HCOCH2O2',NULL,NULL,'HCOCH2O',NULL,NULL,'2.00D-12*0.6*RO2',NULL,1506495330,1),(1099,'HCOCH2O2',NULL,NULL,'HOCH2CHO',NULL,NULL,'2.00D-12*0.2*RO2',NULL,1506495330,1),(1100,'HOC2H4CO3','HO2',NULL,'HOC2H4CO2H','O3',NULL,'KAPHO2*0.15',NULL,1506495330,1),(1101,'HOC2H4CO3','HO2',NULL,'HOC2H4CO3H',NULL,NULL,'KAPHO2*0.41',NULL,1506495330,1),(1102,'HOC2H4CO3','HO2',NULL,'HOCH2CH2O2','OH',NULL,'KAPHO2*0.44',NULL,1506495330,1),(1103,'HOC2H4CO3','NO',NULL,'HOCH2CH2O2','NO2',NULL,'KAPNO',NULL,1506495330,1),(1104,'HOC2H4CO3','NO2',NULL,'C3PAN1',NULL,NULL,'KFPAN',NULL,1506495330,1),(1105,'HOC2H4CO3','NO3',NULL,'HOCH2CH2O2','NO2',NULL,'KRO2NO3*1.74',NULL,1506495330,1),(1106,'HOC2H4CO3',NULL,NULL,'HOC2H4CO2H',NULL,NULL,'1.00D-11*0.3*RO2',NULL,1506495330,1),(1107,'HOC2H4CO3',NULL,NULL,'HOCH2CH2O2',NULL,NULL,'1.00D-11*0.7*RO2',NULL,1506495330,1),(1108,'IPROPOLPER','OH',NULL,'CH3CHOHCO3',NULL,NULL,'9.34D-12',NULL,1506495330,1),(1109,'IPROPOLPER',NULL,NULL,'CH3CHO','HO2','OH','J<41>',NULL,1506495330,1),(1110,'IPROPOLPAN','OH',NULL,'CH3CHO','CO','NO2','2.34D-12',NULL,1506495330,1),(1111,'IPROPOLPAN',NULL,NULL,'CH3CHOHCO3','NO2',NULL,'KBPAN',NULL,1506495330,1),(1112,'HYETHO2H','OH',NULL,'HOCH2CH2O2',NULL,NULL,'1.90D-12*EXP(190/TEMP)',NULL,1506495330,1),(1113,'HYETHO2H','OH',NULL,'HOCH2CHO','OH',NULL,'1.38D-11',NULL,1506495330,1),(1114,'HYETHO2H',NULL,NULL,'HOCH2CH2O','OH',NULL,'J<41>',NULL,1506495330,1),(1115,'ETHOHNO3','OH',NULL,'HOCH2CHO','NO2',NULL,'8.40D-13',NULL,1506495330,1),(1116,'HOCH2CH2O',NULL,NULL,'2HCHO','HO2',NULL,'9.50D+13*EXP(-5988/TEMP)',NULL,1506495330,1),(1117,'HOCH2CH2O',NULL,NULL,'HOCH2CHO','HO2',NULL,'KROPRIM*O2',NULL,1506495330,1),(1118,'ETHGLY','OH',NULL,'HOCH2CHO','HO2',NULL,'1.45D-11',NULL,1506495330,1),(1119,'HOCH2CHO','NO3',NULL,'HOCH2CO3','HNO3',NULL,'KNO3AL',NULL,1506495330,1),(1120,'HOCH2CHO','OH',NULL,'GLYOX','HO2',NULL,'1.00D-11*0.200',NULL,1506495330,1),(1121,'HOCH2CHO','OH',NULL,'HOCH2CO3',NULL,NULL,'1.00D-11*0.800',NULL,1506495330,1),(1122,'HOCH2CHO',NULL,NULL,'HCHO','2HO2','CO','J<15>',NULL,1506495330,1),(1123,'HCOCH2OOH','OH ',NULL,'GLYOX','OH',NULL,'2.91D-11',NULL,1506495330,1),(1124,'HCOCH2OOH','OH',NULL,'HCOCH2O2',NULL,NULL,'1.90D-12*EXP(190/TEMP)',NULL,1506495330,1),(1125,'HCOCH2OOH',NULL,NULL,'HCOCH2O','OH',NULL,'J<41>',NULL,1506495330,1),(1126,'HCOCH2OOH',NULL,NULL,'HO2','HCHO','OH','J<15>',NULL,1506495330,1),(1127,'HCOCH2O',NULL,NULL,'HCHO','HO2',NULL,'KDEC',NULL,1506495330,1),(1128,'GLYOX',NULL,NULL,'H2',NULL,NULL,'J<31>',NULL,1506495330,1),(1129,'GLYOX',NULL,NULL,'HO2',NULL,NULL,'J<33>',NULL,1506495330,1),(1130,'GLYOX',NULL,NULL,'HCHO',NULL,NULL,'J<32>',NULL,1506495330,1),(1131,'GLYOX','NO3',NULL,'HCOCO','HNO3',NULL,'KNO3AL',NULL,1506495330,1),(1132,'GLYOX','OH',NULL,'HCOCO',NULL,NULL,'3.1D-12*EXP(340/TEMP)',NULL,1506495330,1),(1133,'HOC2H4CO2H','OH',NULL,'HOCH2CH2O2',NULL,NULL,'1.39D-11',NULL,1506495330,1),(1134,'HOC2H4CO3H',NULL,NULL,'HOCH2CH2O2','OH',NULL,'J<41>',NULL,1506495330,1),(1135,'HOC2H4CO3H','OH',NULL,'HOC2H4CO3',NULL,NULL,'1.73D-11',NULL,1506495330,1),(1136,'C3PAN1',NULL,NULL,'HOC2H4CO3','NO2',NULL,'KBPAN',NULL,1506495330,1),(1137,'C3PAN1','OH',NULL,'HOCH2CHO','CO','NO2','4.51D-12',NULL,1506495330,1),(1138,'HOCH2CO3','HO2',NULL,'HCHO','HO2','OH','KAPHO2*0.44',NULL,1506495330,1),(1139,'HOCH2CO3','HO2',NULL,'HOCH2CO2H','O3',NULL,'KAPHO2*0.15',NULL,1506495330,1),(1140,'HOCH2CO3','HO2',NULL,'OCH2CO3H',NULL,NULL,'KAPHO2*0.41',NULL,1506495330,1),(1141,'HOCH2CO3','NO',NULL,'NO2','HO2','HCHO','KAPNO',NULL,1506495330,1),(1142,'HOCH2CO3','NO2',NULL,'PHAN',NULL,NULL,'KFPAN',NULL,1506495330,1),(1143,'HOCH2CO3','NO3',NULL,'NO2','HO2','HCHO','KRO2NO3*1.74',NULL,1506495330,1),(1144,'HOCH2CO3',NULL,NULL,'HCHO','HO2',NULL,'1.00D-11*0.7*RO2',NULL,1506495330,1),(1145,'HOCH2CO3',NULL,NULL,'HOCH2CO2H',NULL,NULL,'1.00D-11*0.3*RO2',NULL,1506495330,1),(1146,'HCOCO',NULL,NULL,'2CO','HO2',NULL,'7.00D11*EXP(-3160/TEMP)',NULL,1506495330,1),(1147,'HCOCO',NULL,NULL,'2CO','HO2',NULL,'7.00D11*EXP(-3160/TEMP)',NULL,1506495330,1),(1148,'HCOCO',NULL,NULL,'CO','OH',NULL,'5.00D-12*O2*3.2*(1-EXP(-550/TEMP))',NULL,1506495330,1),(1149,'HCOCO',NULL,NULL,'HCOCO3',NULL,NULL,'5.00D-12*O2*3.2*EXP(-550/TEMP)',NULL,1506495330,1),(1150,'HOCH2CO2H','OH',NULL,'HCHO','HO2',NULL,'2.73D-12',NULL,1506495330,1),(1151,'HOCH2CO3H',NULL,NULL,'HOCH2CO3',NULL,NULL,'6.19D-12',NULL,1506495330,1),(1152,'HOCH2CO3H',NULL,NULL,'HCHO','HO2','OH','J<41>',NULL,1506495330,1),(1153,'PHAN',NULL,NULL,'HOCH2CO3','NO2',NULL,'KBPAN',NULL,1506495330,1),(1154,'PHAN','OH',NULL,'HCHO','HO2','OH','1.12D-12',NULL,1506495330,1),(1155,'HCOCO3','HO2',NULL,'HCOCO2H','O3',NULL,'KAPHO2*0.15',NULL,1506495330,1),(1156,'HCOCO3','HO2',NULL,'HCOCO3H',NULL,NULL,'KAPHO2*0.41',NULL,1506495330,1),(1157,'HCOCO3','HO2',NULL,'HO2','OH',NULL,'KAPHO2*0.44',NULL,1506495330,1),(1158,'HCOCO3','NO',NULL,'HO2','NO2',NULL,'KAPNO',NULL,1506495330,1),(1159,'HCOCO3','NO2',NULL,'HO2','NO3',NULL,'KFPAN',NULL,1506495330,1),(1160,'HCOCO3','NO3',NULL,'HO2','NO2',NULL,'KRO2NO3*1.74',NULL,1506495330,1),(1161,'HCOCO3',NULL,NULL,'HO2',NULL,NULL,'1.00D-11*0.7*RO2',NULL,1506495330,1),(1162,'HCOCO3',NULL,NULL,'HCOCO2H',NULL,NULL,'1.00D-11*0.3*RO2',NULL,1506495330,1),(1163,'HCOCO2H',NULL,NULL,'HO2',NULL,NULL,'J<34>',NULL,1506495330,1),(1164,'HCOCO2H','OH',NULL,'HO2','OH',NULL,'1.23D-11',NULL,1506495330,1),(1165,'HCOCO3H',NULL,NULL,'HO2','OH',NULL,'J<41>',NULL,1506495330,1),(1166,'HCOCO3H',NULL,NULL,'HO2',NULL,NULL,'J<15>',NULL,1506495330,1),(1167,'HCOCO3H','OH',NULL,'HCOCO3',NULL,NULL,'1.58D-11',NULL,1506495330,1),(1168,'',NULL,NULL,'',NULL,NULL,NULL,NULL,1506495330,1),(1169,'',NULL,NULL,'',NULL,NULL,NULL,NULL,1506495330,1),(1170,'C3H6','NO3',NULL,'PRONO3AO2',NULL,NULL,'4.6D-13*EXP(-1155/TEMP)*0.35',NULL,1506495330,1),(1171,'C3H6','NO3',NULL,'PRONO3BO2',NULL,NULL,'4.6D-13*EXP(-1155/TEMP)*0.65',NULL,1506495330,1),(1172,'C3H6','O3',NULL,'CH2OOB','CH3CHO',NULL,'5.5D-15*EXP(-1880/TEMP)*0.5',NULL,1506495330,1),(1173,'C3H6','O3',NULL,'CH3CHOOA','HCHO',NULL,'5.5D-15*EXP(-1880/TEMP)*0.5',NULL,1506495330,1),(1174,'C3H6','OH',NULL,'HYPROPO2',NULL,NULL,'KMT16*0.87',NULL,1506495330,1),(1175,'C3H6','OH',NULL,'IPROPOLO2',NULL,NULL,'KMT16*0.13',NULL,1506495330,1),(1176,'PRONO3AO2','HO2',NULL,'PR1O2HNO3',NULL,NULL,'KRO2HO2*0.520',NULL,1506495330,1),(1177,'PRONO3AO2','NO3',NULL,'PRONO3AO','NO2',NULL,'KRO2NO',NULL,1506495330,1),(1178,'PRONO3AO2','NO3',NULL,'PRONO3AO','NO2',NULL,'KRO2NO3',NULL,1506495330,1),(1179,'PRONO3AO2',NULL,NULL,'CHOPRNO3',NULL,NULL,'6.00D-13*0.2*RO2',NULL,1506495330,1),(1180,'PRONO3AO2',NULL,NULL,'PRONO3AO',NULL,NULL,'6.00D-13*0.6*RO2',NULL,1506495330,1),(1181,'PRONO3AO2',NULL,NULL,'PROPOLNO3',NULL,NULL,'6.00D-13*0.2*RO2',NULL,1506495330,1),(1182,'PRONO3BO2','HO2',NULL,'PR2O2HNO3',NULL,NULL,'KRO2HO2*0.520',NULL,1506495330,1),(1183,'PRONO3BO2','NO',NULL,'PRONO3BO','NO2',NULL,'KRO2NO',NULL,1506495330,1),(1184,'PRONO3BO2','NO3',NULL,'PRONO3BO','NO2',NULL,'KRO2NO3',NULL,1506495330,1),(1185,'PRONO3BO2',NULL,NULL,'NOA',NULL,NULL,'4.00D-14*0.2*RO2',NULL,1506495330,1),(1186,'PRONO3BO2',NULL,NULL,'PROLNO3',NULL,NULL,'4.00D-14*0.2*RO2',NULL,1506495330,1),(1187,'PRONO3BO2',NULL,NULL,'PRONO3BO',NULL,NULL,'4.00D-14*0.6*RO2',NULL,1506495330,1),(1188,'CH2OOB',NULL,NULL,'CH200',NULL,NULL,'KDEC*0.24',NULL,1506495330,1),(1189,'CH2OOB',NULL,NULL,'CO',NULL,NULL,'KDEC*0.40',NULL,1506495330,1),(1190,'CH2OOB',NULL,NULL,'HO2','CO','OH','KDEC*0.36',NULL,1506495330,1),(1191,'CH3CHO',NULL,NULL,'CH3O2','HO2','CO','J<13>',NULL,1506495330,1),(1192,'CH3CHO','NO3',NULL,'CH3CO3','HNO3',NULL,'1.4D-12*EXP(-1860/TEMP)',NULL,1506495330,1),(1193,'CH3CHO','OH',NULL,'CH3CO3',NULL,NULL,'4.7D-12*EXP(345/TEMP)*0.95',NULL,1506495330,1),(1194,'CH3CHO','OH',NULL,'HCOCH2O2',NULL,NULL,'4.7D-12*EXP(345/TEMP)*0.05',NULL,1506495330,1),(1195,'CH3CHOOA',NULL,NULL,'CH3CHOO',NULL,NULL,'KDEC*0.24',NULL,1506495330,1),(1196,'CH3CHOOA',NULL,NULL,'CH3O2','CO','OH','KDEC*0.36',NULL,1506495330,1),(1197,'CH3CHOOA',NULL,NULL,'CH3O2','HO2',NULL,'KDEC*0.20',NULL,1506495330,1),(1198,'CH3CHOOA',NULL,NULL,'CH4',NULL,NULL,'KDEC*0.20',NULL,1506495330,1),(1199,'HCHO',NULL,NULL,'CO','HO2','HO2','J<11>',NULL,1506495330,1),(1200,'HCHO',NULL,NULL,'H2','CO',NULL,'J<12>',NULL,1506495330,1),(1201,'HCHO','NO3',NULL,'HONO3','CO','HO2','5.5D-16',NULL,1506495330,1),(1202,'HCHO','OH',NULL,'HO2','CO',NULL,'5.4D-12*EXP(135/TEMP)',NULL,1506495330,1),(1203,'HYPROPO2','HO2',NULL,'HYPROPO2H',NULL,NULL,'KRO2HO2*0.520',NULL,1506495330,1),(1204,'HYPROPO2','NO3',NULL,'HYPROPO','NO2',NULL,'KRO2NO3',NULL,1506495330,1),(1205,'HYPROPO2',NULL,NULL,'ACETOL',NULL,NULL,'8.80D-13*0.2*RO2',NULL,1506495330,1),(1206,'HYPROPO2',NULL,NULL,'HYPROPO',NULL,NULL,'8.80D-13*0.6*RO2',NULL,1506495330,1),(1207,'HYPROPO2',NULL,NULL,'PROPGLY',NULL,NULL,'8.80D-13*0.2*RO2',NULL,1506495330,1),(1208,'HYPROPO2','NO',NULL,'HYPROPO','NO2',NULL,'KRO2NO*0.977',NULL,1506495330,1),(1209,'HYPROPO2','NO',NULL,'PROPOLNO3',NULL,NULL,'KRO2NO*0.023',NULL,1506495330,1),(1210,'IPROPOLO2','HO2',NULL,'IPROPOLO2H',NULL,NULL,'KRO2HO2*0.520',NULL,1506495330,1),(1211,'IPROPOLO2','NO',NULL,'IPROPOLO','NO2',NULL,'KRO2NO*0.991',NULL,1506495330,1),(1212,'IPROPOLO2','NO',NULL,'PROLNO3',NULL,NULL,'KRO2NO*0.009',NULL,1506495330,1),(1213,'IPROPOLO2','NO3',NULL,'IPROPOLO','NO2',NULL,'KRO2NO3',NULL,1506495330,1),(1214,'IPROPOLO2',NULL,NULL,'CH3CHOHCHO',NULL,NULL,'2.00D-12*0.2*RO2',NULL,1506495330,1),(1215,'IPROPOLO2',NULL,NULL,'IPROPOLO',NULL,NULL,'2.00D-12*0.6*RO2',NULL,1506495330,1),(1216,'IPROPOLO2',NULL,NULL,'PROPGLY',NULL,NULL,'2.00D-12*0.2*RO2',NULL,1506495330,1),(1217,'PR1O2HNO3','OH',NULL,'CHOPRNO3','OH',NULL,'1.69D-12',NULL,1506495330,1),(1218,'PR1O2HNO3','OH',NULL,'PRONO3AO2',NULL,NULL,'1.90D-12*EXP(190/TEMP)',NULL,1506495330,1),(1219,'PR1O2HNO3',NULL,NULL,'PRONO3AO','OH',NULL,'J<41>',NULL,1506495330,1),(1220,'PRONO3AO',NULL,NULL,'CHOPRNO3','HO2',NULL,'KROPRIM*O2',NULL,1506495330,1),(1221,'PRONO3AO',NULL,NULL,'CH3CHO','HCHO','NO2','7.00D+03',NULL,1506495330,1),(1222,'CHOPRNO3','NO3',NULL,'PRNO3CO3','HNO3',NULL,'KNO3AL*2.4',NULL,1506495330,1),(1223,'CHOPRNO3','OH',NULL,'PRNO3CO3',NULL,NULL,'3.55D-12',NULL,1506495330,1),(1224,'CHOPRNO3',NULL,NULL,'PROPALO','NO2',NULL,'J<56>*10',NULL,1506495330,1),(1225,'PROPOLNO3','OH',NULL,'ACETOL','NO2',NULL,'9.16D-13',NULL,1506495330,1),(1226,'PR2O2HNO3','OH',NULL,'NOA','OH',NULL,'3.47D-12',NULL,1506495330,1),(1227,'PR2O2HNO3','OH',NULL,'PRONO3BO2',NULL,NULL,'1.90D-12*EXP(190/TEMP)',NULL,1506495330,1),(1228,'PR2O2HNO3',NULL,NULL,'PRONO3BO','OH',NULL,'J<41>',NULL,1506495330,1),(1229,'PRONO3BO',NULL,NULL,'CH3CHO','HCHO','NO2','7.00D+03',NULL,1506495330,1),(1230,'PRONO3BO',NULL,NULL,'NOA','HO2',NULL,'KROSEC*O2',NULL,1506495330,1),(1231,'NOA','OH',NULL,'MGLYOX','NO2',NULL,'6.70D-13',NULL,1506495330,1),(1232,'NOA',NULL,NULL,'CH3COCH2O','NO2',NULL,'J<56>',NULL,1506495330,1),(1233,'PROLNO3','OH',NULL,'CH3CHOHCHO','NO2',NULL,'1.71D-12',NULL,1506495330,1),(1234,'CH200','CO',NULL,'HCHO',NULL,NULL,'1.20D-15',NULL,1506495330,1),(1235,'CH200','NO',NULL,'HCHO','NO2',NULL,'1.00D-14',NULL,1506495330,1),(1236,'CH200','NO2',NULL,'HCHO','NO3',NULL,'1.00D-15',NULL,1506495330,1),(1237,'CH200','SO2',NULL,'HCHO','SO3',NULL,'7.00D-14',NULL,1506495330,1),(1238,'CH200',NULL,NULL,'HCHO','H2O2',NULL,'6.00D-18*H2O',NULL,1506495330,1),(1239,'CH200',NULL,NULL,'HCOOH',NULL,NULL,'1.00D-17*H2O',NULL,1506495330,1),(1240,'CH3O2','HO2',NULL,'HCHO',NULL,NULL,'3.8D-13*EXP(780/TEMP)*(1/(1+498*EXP(-1160/TEMP)))',NULL,1506495330,1),(1241,'CH3O2','NO',NULL,'CH3NO3',NULL,NULL,'2.3D-12*EXP(360/TEMP)*0.001',NULL,1506495330,1),(1242,'CH3O2','NO',NULL,'CH3O','NO2',NULL,'2.3D-12*EXP(360/TEMP)*0.999',NULL,1506495330,1),(1243,'CH3O2','NO2',NULL,'CH3O2NO2',NULL,NULL,'KMT13',NULL,1506495330,1),(1244,'CH3O2','NO3',NULL,'CH3O','NO2',NULL,'1.2D-12',NULL,1506495330,1),(1245,'CH3O2',NULL,NULL,'CH3O',NULL,NULL,'2*KCH3O2*RO2*7.18*EXP(-885/TEMP)',NULL,1506495330,1),(1246,'CH3O2',NULL,NULL,'CH3OH',NULL,NULL,'2*KCH3O2*RO2*0.5*(1-7.18*EXP(-885/TEMP))',NULL,1506495330,1),(1247,'CH3O2',NULL,NULL,'HCHO',NULL,NULL,'2*KCH3O2*RO2*0.5*(1-7.18*EXP(-885/TEMP))',NULL,1506495330,1),(1248,'CH3CO3','HO2',NULL,'CH3CO2H','O3',NULL,'KAPHO2*0.15',NULL,1506495330,1),(1249,'CH3CO3','HO2',NULL,'CH3CO3H',NULL,NULL,'KAPHO2*0.41',NULL,1506495330,1),(1250,'CH3CO3','HO2',NULL,'CH3O2','OH',NULL,'KAPHO2*0.44',NULL,1506495330,1),(1251,'CH3CO3','NO',NULL,'CH3O2','NO2',NULL,'7.5D-12*EXP(290/TEMP)',NULL,1506495330,1),(1252,'CH3CO3','NO2',NULL,'PAN',NULL,NULL,'KFPAN',NULL,1506495330,1),(1253,'CH3CO3','NO3',NULL,'CH3O2','NO2',NULL,'4.0D-12',NULL,1506495330,1),(1254,'CH3CO3',NULL,NULL,'CH3CO2H',NULL,NULL,'2*(K298CH3O2*2.9D-12*EXP(500/TEMP))@0.5*RO2*0.3',NULL,1506495330,1),(1255,'CH3CO3',NULL,NULL,'CH3O2',NULL,NULL,'2*(K298CH3O2*2.9D-12*EXP(500/TEMP))@0.5*RO2*0.7',NULL,1506495330,1),(1256,'HCOCH2O2','HO2',NULL,'HCOCH2OOH',NULL,NULL,'KRO2HO2*0.387',NULL,1506495330,1),(1257,'HCOCH2O2','NO',NULL,'HCOCH2O','NO2',NULL,'KRO2NO',NULL,1506495330,1),(1258,'HCOCH2O2','NO3',NULL,'HCOCH2O','NO2',NULL,'KRO2NO3',NULL,1506495330,1),(1259,'HCOCH2O2',NULL,NULL,'GLYOX',NULL,NULL,'2.00D-12*0.2*RO2',NULL,1506495330,1),(1260,'HCOCH2O2',NULL,NULL,'HCOCH2O',NULL,NULL,'2.00D-12*0.6*RO2',NULL,1506495330,1),(1261,'HCOCH2O2',NULL,NULL,'HOCH2CHO',NULL,NULL,'2.00D-12*0.2*RO2',NULL,1506495330,1),(1262,'CH3CHOO','CO',NULL,'CH3CHO',NULL,NULL,'1.20D-15',NULL,1506495330,1),(1263,'CH3CHOO','NO',NULL,'CH3CHO','NO2',NULL,'1.00D-14',NULL,1506495330,1),(1264,'CH3CHOO','NO2',NULL,'CH3CHO','NO3',NULL,'1.00D-15',NULL,1506495330,1),(1265,'CH3CHOO','SO2',NULL,'CH3CHO','SO3',NULL,'7.00D-14',NULL,1506495330,1),(1266,'CH3CHOO',NULL,NULL,'CH3CHO','H2O2',NULL,'6.00D-18*H2O',NULL,1506495330,1),(1267,'CH3CHOO',NULL,NULL,'CH3CO2H',NULL,NULL,'1.00D-17*H2O',NULL,1506495330,1),(1268,'CH4','CL',NULL,'CH3O2',NULL,NULL,'6.6D-12*EXP(-1240/TEMP)',NULL,1506495330,1),(1269,'CH4','OH',NULL,'CH3O2',NULL,NULL,'1.85D-12*EXP(-1690/TEMP)',NULL,1506495330,1),(1270,'HYPROPO2H','OH',NULL,'ACETOL','OH',NULL,'2.44D-11',NULL,1506495330,1),(1271,'HYPROPO2H','OH',NULL,'HYPROPO2',NULL,NULL,'1.90D-12*EXP(190/TEMP)',NULL,1506495330,1),(1272,'HYPROPO2H',NULL,NULL,'HYPROPO','OH',NULL,'J<41>',NULL,1506495330,1),(1273,'HYPROPO',NULL,NULL,'CH3CHO','HCHO','HO2','2.00D+14*EXP(-6410/TEMP)',NULL,1506495330,1),(1274,'ACETOL','OH',NULL,'MGLYOX','HO2',NULL,'1.6D-12*EXP(305/TEMP)',NULL,1506495330,1),(1275,'ACETOL',NULL,NULL,'CH3CO3','HCHO','HO2','J<22>',NULL,1506495330,1),(1276,'PROPGLY','OH',NULL,'ACETOL','HO2',NULL,'1.20D-11*0.613',NULL,1506495330,1),(1277,'PROPGLY','OH',NULL,'CH3CHOHCHO','HO2',NULL,'1.20D-11*0.387',NULL,1506495330,1),(1278,'IPROPOLO2H','OH',NULL,'CH3CHOHCHO','OH',NULL,'1.83D-11',NULL,1506495330,1),(1279,'IPROPOLO2H','OH',NULL,'IPROPOLO2',NULL,NULL,'1.90D-12*EXP(190/TEMP)',NULL,1506495330,1),(1280,'IPROPOLO2H',NULL,NULL,'IPROPOLO','OH',NULL,'J<41>',NULL,1506495330,1),(1281,'IPROPOLO',NULL,NULL,'CH3CHO','HCHO','HO2','2.00D+14*EXP(-5505/TEMP)',NULL,1506495330,1),(1282,'CH3CHOHCHO','NO3',NULL,'CH3CHOHCO3','HNO3',NULL,'KNO3AL*2.4',NULL,1506495330,1),(1283,'CH3CHOHCHO','OH',NULL,'CH3CHOHCO3',NULL,NULL,'1.7D-11',NULL,1506495330,1),(1284,'CH3CHOHCHO',NULL,NULL,'CH3CHO','HO2','CO','J<17>',NULL,1506495330,1),(1285,'PRNO3CO3','HO2',NULL,'CH3CHO','NO2','OH','KAPHO2*0.44',NULL,1506495330,1),(1286,'PRNO3CO3','HO2',NULL,'PRNO3CO2H','O3',NULL,'KAPHO2*0.15',NULL,1506495330,1),(1287,'PRNO3CO3','HO2',NULL,'PRNO3CO3H',NULL,NULL,'KAPHO2*0.41',NULL,1506495330,1),(1288,'PRNO3CO3','NO',NULL,'CH3CHO','NO2','NO2','KAPNO',NULL,1506495330,1),(1289,'PRNO3CO3','NO2',NULL,'PRNO3PAN',NULL,NULL,'KFPAN',NULL,1506495330,1),(1290,'PRNO3CO3','NO3',NULL,'CH3CHO','NO2','NO2','KRO2NO3*1.74',NULL,1506495330,1),(1291,'PRNO3CO3',NULL,NULL,'CH3CHO','NO2',NULL,'1.00D-11*0.7*RO2',NULL,1506495330,1),(1292,'PRNO3CO3',NULL,NULL,'PRNO3CO2H',NULL,NULL,'1.00D-11*0.3*RO2',NULL,1506495330,1),(1293,'PROPALO',NULL,NULL,'CH3CHO','HO2','CO','KDEC',NULL,1506495330,1),(1294,'MGLYOX',NULL,NULL,'CH3CO3','CO','HO2','J<34>',NULL,1506495330,1),(1295,'MGLYOX','NO3',NULL,'CH3CO3','CO','HNO3','KNO3AL*2.4',NULL,1506495330,1),(1296,'MGLYOX','OH',NULL,'CH3CO3','CO',NULL,'1.9D-12*EXP(575/TEMP)',NULL,1506495330,1),(1297,'CH3COCH2O',NULL,NULL,'CH3CO3','HCHO',NULL,'KDEC',NULL,1506495330,1),(1298,'HCOOH','OH',NULL,'HO2',NULL,NULL,'4.5D-13',NULL,1506495330,1),(1299,'CH3OOH',NULL,NULL,'CH3O','OH',NULL,'J<41>',NULL,1506495330,1),(1300,'CH3OOH','OH',NULL,'CH3O2',NULL,NULL,'5.3D-12*EXP(190/TEMP)*0.6',NULL,1506495330,1),(1301,'CH3OOH','OH',NULL,'HCHO','OH',NULL,'5.3D-12*EXP(190/TEMP)*0.4',NULL,1506495330,1),(1302,'CH3NO3',NULL,NULL,'CH3O','NO2',NULL,'J<51>',NULL,1506495330,1),(1303,'CH3NO3','OH',NULL,'HCHO','NO2',NULL,'4.0D-13*EXP(-845/TEMP)',NULL,1506495330,1),(1304,'CH3O',NULL,NULL,'HCHO','HO2',NULL,'7.2D-14*EXP(-1080/TEMP)*O2',NULL,1506495330,1),(1305,'CH3O2NO2',NULL,NULL,'CH3O2','NO2',NULL,'KMT14',NULL,1506495330,1),(1306,'CH3OH','OH',NULL,'HO2','HCHO',NULL,'2.85D-12*EXP(-345/TEMP)',NULL,1506495330,1),(1307,'CH3CO2H','OH',NULL,'CH3O2',NULL,NULL,'8.00D-13',NULL,1506495330,1),(1308,'CH3CO3H','OH',NULL,'CH3CO3',NULL,NULL,'3.70D-12',NULL,1506495330,1),(1309,'CH3CO3H',NULL,NULL,'CH3O2','OH',NULL,'J<41>',NULL,1506495330,1),(1310,'PAN','OH',NULL,'HCHO','CO','NO2','3D-14',NULL,1506495330,1),(1311,'PAN',NULL,NULL,'CH3CO3','NO2',NULL,'KBPAN',NULL,1506495330,1),(1312,'HCOCH2OOH','OH',NULL,'GLYOX','OH',NULL,'2.91D-11',NULL,1506495330,1),(1313,'HCOCH2OOH','OH',NULL,'HCOCH2O2',NULL,NULL,'1.90D-12*EXP(190/TEMP)',NULL,1506495330,1),(1314,'HCOCH2OOH',NULL,NULL,'HCOCH2O','OH',NULL,'J<41>',NULL,1506495330,1),(1315,'HCOCH2OOH',NULL,NULL,'HCHO','HO2','CO','J<15>',NULL,1506495330,1),(1316,'HCOCH2O',NULL,NULL,'HCHO','HO2','CO','KDEC',NULL,1506495330,1),(1317,'GLYOX',NULL,NULL,'CO','CO','H2','J<31>',NULL,1506495330,1),(1318,'GLYOX',NULL,NULL,'CO','CO','HO2','J<33>',NULL,1506495330,1),(1319,'GLYOX',NULL,NULL,'HCHO','CO',NULL,'J<32>',NULL,1506495330,1),(1320,'GLYOX','NO3',NULL,'HCOCO','HNO3',NULL,'KNO3AL',NULL,1506495330,1),(1321,'GLYOX','OH',NULL,'HCOCO',NULL,NULL,'3.1D-12*EXP(340/TEMP)',NULL,1506495330,1),(1322,'HOCH2CHO','NO3',NULL,'HOCH2CO3','HNO3',NULL,'KNO3AL',NULL,1506495330,1),(1323,'HOCH2CHO','OH',NULL,'GLYOX','HO2',NULL,'1.00D-11*0.200',NULL,1506495330,1),(1324,'HOCH2CHO','OH',NULL,'HOCH2CO3',NULL,NULL,'1.00D-11*0.800',NULL,1506495330,1),(1325,'HOCH2CHO',NULL,NULL,'HCHO','HO2','CO','J<15>',NULL,1506495330,1),(1326,'CH3CHOHCO3','HO2',NULL,'CH3CHO','HO2','OH','KAPHO2*0.44',NULL,1506495330,1),(1327,'CH3CHOHCO3','HO2',NULL,'IPROPOLPER',NULL,NULL,'KAPHO2*0.56',NULL,1506495330,1),(1328,'CH3CHOHCO3','NO',NULL,'CH3CHO','HO2','NO2','KAPNO',NULL,1506495330,1),(1329,'CH3CHOHCO3','NO2',NULL,'IPROPOLPAN',NULL,NULL,'KFPAN',NULL,1506495330,1),(1330,'CH3CHOHCO3','NO3',NULL,'CH3CHO','HO2','NO2','KRO2NO3*1.74',NULL,1506495330,1),(1331,'CH3CHOHCO3',NULL,NULL,'CH3CHO','HO2',NULL,'1.00D-11*RO2',NULL,1506495330,1),(1332,'PRNO3CO2H','OH',NULL,'CH3CHO','NO2',NULL,'3.14D-13',NULL,1506495330,1),(1333,'PRNO3CO3H','OH',NULL,'PRNO3CO3',NULL,NULL,'3.77D-12',NULL,1506495330,1),(1334,'PRNO3CO3H',NULL,NULL,'CH3CHO','NO2','OH','J<41>',NULL,1506495330,1),(1335,'PRNO3PAN','OH',NULL,'CH3CHO','NO2','CO','1.43D-13',NULL,1506495330,1),(1336,'PRNO3PAN',NULL,NULL,'PRNO3CO3','NO2',NULL,'KBPAN',NULL,1506495330,1),(1337,'HCOCO',NULL,NULL,'CO','CO','HO2','7.00D11*EXP(-3160/TEMP)',NULL,1506495330,1),(1338,'HCOCO',NULL,NULL,'CO','CO','HO2','5.00D-12*O2',NULL,1506495330,1),(1339,'HCOCO',NULL,NULL,'CO','OH',NULL,'5.00D-12*O2*3.2*(1-EXP(-550/TEMP))',NULL,1506495330,1),(1340,'HCOCO',NULL,NULL,'HCOCO3',NULL,NULL,'5.00D-12*O2*3.2*EXP(-550/TEMP)',NULL,1506495330,1),(1341,'HOCH2CO3','HO2',NULL,'HO2','HCHO','OH','KAPHO2*0.44',NULL,1506495330,1),(1342,'HOCH2CO3','HO2',NULL,'HOCH2CO2H','O3',NULL,'KAPHO2*0.15',NULL,1506495330,1),(1343,'HOCH2CO3','HO2',NULL,'HOCH2CO3H',NULL,NULL,'KAPHO2*0.41',NULL,1506495330,1),(1344,'HOCH2CO3','NO',NULL,'HCHO','NO2','HO2','KAPNO',NULL,1506495330,1),(1345,'HOCH2CO3','NO2',NULL,'PHAN',NULL,NULL,'KFPAN',NULL,1506495330,1),(1346,'HOCH2CO3','NO3',NULL,'HCHO','NO2','HO2','KRO2NO3*1.74',NULL,1506495330,1),(1347,'HOCH2CO3',NULL,NULL,'HCHO','HO2',NULL,'1.00D-11*0.7*RO2',NULL,1506495330,1),(1348,'HOCH2CO3',NULL,NULL,'HOCH2CO2H',NULL,NULL,'1.00D-11*0.3*RO2',NULL,1506495330,1),(1349,'IPROPOLPER','OH',NULL,'CH3CHOHCO3',NULL,NULL,'9.34D-12',NULL,1506495330,1),(1350,'IPROPOLPER',NULL,NULL,'CH3CHO','HO2','OH','J<41>',NULL,1506495330,1),(1351,'IPROPOLPAN','OH',NULL,'CH3CHO','CO','NO2','2.34D-12',NULL,1506495330,1),(1352,'IPROPOLPAN',NULL,NULL,'CH3CHOHCO3','NO2',NULL,'KBPAN',NULL,1506495330,1),(1353,'HCOCO3','HO2',NULL,'HCOCO2H','O3',NULL,'KAPHO2*0.15',NULL,1506495330,1),(1354,'HCOCO3','HO2',NULL,'HCOCO3H',NULL,NULL,'KAPHO2*0.41',NULL,1506495330,1),(1355,'HCOCO3','HO2',NULL,'HO2','CO','OH','KAPHO2*0.44',NULL,1506495330,1),(1356,'HCOCO3','NO',NULL,'HO3','CO','NO2','KAPNO',NULL,1506495330,1),(1357,'HCOCO3','NO2',NULL,'HO2','CO','NO3','KFPAN',NULL,1506495330,1),(1358,'HCOCO3','NO3',NULL,'HO3','CO','NO2','KRO2NO3*1.74',NULL,1506495330,1),(1359,'HCOCO3',NULL,NULL,'HO2','CO',NULL,'1.00D-11*0.7*RO2',NULL,1506495330,1),(1360,'HCOCO3',NULL,NULL,'HCOCO2H',NULL,NULL,'1.00D-11*0.3*RO2',NULL,1506495330,1),(1361,'HOCH2CO2H','OH',NULL,'HCHO','HO2',NULL,'2.73D-12',NULL,1506495330,1),(1362,'HOCH2CO3H','OH',NULL,'HOCH2CO3',NULL,NULL,'6.19D-12',NULL,1506495330,1),(1363,'HOCH2CO3H',NULL,NULL,'HCHO','HO2','OH','J<41>',NULL,1506495330,1),(1364,'PHAN','OH',NULL,'HCHO','CO','NO2','1.12D-12',NULL,1506495330,1),(1365,'PHAN',NULL,NULL,'HOCH2CO3','NO2',NULL,'KBPAN',NULL,1506495330,1),(1366,'HCOCO2H',NULL,NULL,'HO2','HO2','CO','J<34>',NULL,1506495330,1),(1367,'HCOCO2H','OH',NULL,'CO','HO2',NULL,'1.23D-11',NULL,1506495330,1),(1368,'HCOCO3H',NULL,NULL,'HO2','CO','OH','J<41>',NULL,1506495330,1),(1369,'HCOCO3H',NULL,NULL,'HO2','CO','OH','J<15>',NULL,1506495330,1),(1370,'HCOCO3H','OH',NULL,'HCOCO3',NULL,NULL,'1.58D-11',NULL,1506495330,1);

/*Table structure for table `one_config` */

DROP TABLE IF EXISTS `one_config`;

CREATE TABLE `one_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '配置ID',
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '配置名称',
  `type` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '配置类型',
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '配置说明',
  `group` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '配置分组',
  `extra` varchar(255) NOT NULL DEFAULT '' COMMENT '配置值',
  `remark` varchar(100) NOT NULL COMMENT '配置说明',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态',
  `value` text NOT NULL COMMENT '配置值',
  `sort` smallint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_name` (`name`),
  KEY `type` (`type`),
  KEY `group` (`group`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

/*Data for the table `one_config` */

insert  into `one_config`(`id`,`name`,`type`,`title`,`group`,`extra`,`remark`,`create_time`,`update_time`,`status`,`value`,`sort`) values (1,'WEB_SITE_TITLE',1,'网站标题',1,'','网站标题前台显示标题',1378898976,1379235274,1,'管理框架',0),(2,'WEB_SITE_DESCRIPTION',2,'网站描述',1,'','网站搜索引擎描述',1378898976,1379235841,1,'管理框架',1),(3,'WEB_SITE_KEYWORD',2,'网站关键字',1,'','网站搜索引擎关键字',1378898976,1381390100,1,'',8),(4,'WEB_SITE_CLOSE',4,'关闭站点',1,'0:关闭,1:开启','站点关闭后其他用户不能访问，管理员可以正常访问',1378898976,1379235296,1,'1',1),(9,'CONFIG_TYPE_LIST',3,'配置类型列表',4,'','主要用于数据解析和页面表单的生成',1378898976,1379235348,1,'0:数字\r\n1:字符\r\n2:文本\r\n3:数组\r\n4:枚举',2),(10,'WEB_SITE_ICP',1,'网站备案号',1,'','设置在网站底部显示的备案号，如“沪ICP备12007941号-2',1378900335,1379235859,1,'',9),(11,'DOCUMENT_POSITION',3,'文档推荐位',2,'','文档推荐位，推荐到多个位置KEY值相加即可',1379053380,1379235329,1,'',3),(12,'DOCUMENT_DISPLAY',3,'文档可见性',2,'','文章可见性仅影响前台显示，后台不收影响',1379056370,1379235322,1,'',4),(13,'COLOR_STYLE',4,'后台色系',1,'default_color:默认\r\nblue_color:紫罗兰','后台颜色风格',1379122533,1379235904,1,'default_color',10),(20,'CONFIG_GROUP_LIST',3,'配置分组',4,'','配置分组',1379228036,1384418383,1,'1:基本\r\n2:内容\r\n3:用户\r\n4:系统',4),(21,'HOOKS_TYPE',3,'钩子的类型',4,'','类型 1-用于扩展显示内容，2-用于扩展业务处理',1379313397,1379313407,1,'1:视图\r\n2:控制器',6),(22,'AUTH_CONFIG',3,'Auth配置',4,'','自定义Auth.class.php类配置',1379409310,1379409564,1,'AUTH_ON:1\r\nAUTH_TYPE:2',8),(23,'OPEN_DRAFTBOX',4,'是否开启草稿功能',2,'0:关闭草稿功能\r\n1:开启草稿功能\r\n','新增文章时的草稿功能配置',1379484332,1379484591,1,'1',1),(24,'DRAFT_AOTOSAVE_INTERVAL',0,'自动保存草稿时间',2,'','自动保存草稿的时间间隔，单位：秒',1379484574,1386143323,1,'60',2),(25,'LIST_ROWS',0,'后台每页记录数',2,'','后台数据每页显示记录数',1379503896,1380427745,1,'10',10),(26,'USER_ALLOW_REGISTER',4,'是否允许用户注册',3,'0:关闭注册\r\n1:允许注册','是否开放用户注册',1379504487,1379504580,1,'1',3),(27,'CODEMIRROR_THEME',4,'预览插件的CodeMirror主题',4,'3024-day:3024 day\r\n3024-night:3024 night\r\nambiance:ambiance\r\nbase16-dark:base16 dark\r\nbase16-light:base16 light\r\nblackboard:blackboard\r\ncobalt:cobalt\r\neclipse:eclipse\r\nelegant:elegant\r\nerlang-dark:erlang-dark\r\nlesser-dark:lesser-dark\r\nmidnight:midnight','详情见CodeMirror官网',1379814385,1384740813,1,'ambiance',3),(28,'DATA_BACKUP_PATH',1,'数据库备份根路径',4,'','路径必须以 / 结尾',1381482411,1381482411,1,'./Data/',5),(29,'DATA_BACKUP_PART_SIZE',0,'数据库备份卷大小',4,'','该值用于限制压缩后的分卷最大长度。单位：B；建议设置20M',1381482488,1381729564,1,'20971520',7),(30,'DATA_BACKUP_COMPRESS',4,'数据库备份文件是否启用压缩',4,'0:不压缩\r\n1:启用压缩','压缩备份文件需要PHP环境支持gzopen,gzwrite函数',1381713345,1381729544,1,'1',9),(31,'DATA_BACKUP_COMPRESS_LEVEL',4,'数据库备份文件压缩级别',4,'1:普通\r\n4:一般\r\n9:最高','数据库备份文件的压缩级别，该配置在开启压缩时生效',1381713408,1381713408,1,'9',10),(32,'DEVELOP_MODE',4,'开启开发者模式',4,'0:关闭\r\n1:开启','是否开启开发者模式',1383105995,1383291877,1,'1',11),(33,'ALLOW_VISIT',3,'不受限控制器方法',0,'','',1386644047,1386644741,1,'0:article/draftbox\r\n1:article/mydocument\r\n2:Category/tree\r\n3:Index/verify\r\n4:file/upload\r\n5:file/download\r\n6:user/updatePassword\r\n7:user/updateNickname\r\n8:user/submitPassword\r\n9:user/submitNickname\r\n10:file/uploadpicture',0),(34,'DENY_VISIT',3,'超管专限控制器方法',0,'','仅超级管理员可访问的控制器方法',1386644141,1386644659,1,'0:Addons/addhook\r\n1:Addons/edithook\r\n2:Addons/delhook\r\n3:Addons/updateHook\r\n4:Admin/getMenus\r\n5:Admin/recordList\r\n6:AuthManager/updateRules\r\n7:AuthManager/tree',0),(35,'REPLY_LIST_ROWS',0,'回复列表每页条数',2,'','',1386645376,1387178083,1,'10',0),(36,'ADMIN_ALLOW_IP',2,'后台允许访问IP',4,'','多个用逗号分隔，如果不配置表示不限制IP访问',1387165454,1387165553,1,'',12),(37,'SHOW_PAGE_TRACE',4,'是否显示页面Trace',4,'0:关闭\r\n1:开启','是否显示页面Trace信息',1387165685,1387165685,1,'0',1);

/*Table structure for table `one_constant` */

DROP TABLE IF EXISTS `one_constant`;

CREATE TABLE `one_constant` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `c_key` varchar(255) NOT NULL COMMENT '常数键',
  `c_value` varchar(255) NOT NULL COMMENT '常数值',
  `c_add_time` int(11) NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='常数表';

/*Data for the table `one_constant` */

insert  into `one_constant`(`id`,`c_key`,`c_value`,`c_add_time`) values (10,'k8','1.23D-13',1506495332);

/*Table structure for table `one_document` */

DROP TABLE IF EXISTS `one_document`;

CREATE TABLE `one_document` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '文档ID',
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
  `name` char(40) NOT NULL DEFAULT '' COMMENT '标识',
  `title` char(80) NOT NULL DEFAULT '' COMMENT '标题',
  `category_id` int(10) unsigned NOT NULL COMMENT '所属分类',
  `description` char(140) NOT NULL DEFAULT '' COMMENT '描述',
  `root` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '根节点',
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '所属ID',
  `model_id` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '内容模型ID',
  `type` tinyint(3) unsigned NOT NULL DEFAULT '2' COMMENT '内容类型',
  `position` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '推荐位',
  `link_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '外链',
  `cover_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '封面',
  `display` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '可见性',
  `deadline` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '截至时间',
  `attach` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '附件数量',
  `view` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '浏览量',
  `comment` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '评论数',
  `extend` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '扩展统计字段',
  `level` int(10) NOT NULL DEFAULT '0' COMMENT '优先级',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '数据状态',
  PRIMARY KEY (`id`),
  KEY `idx_category_status` (`category_id`,`status`),
  KEY `idx_status_type_pid` (`status`,`uid`,`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='文档模型基础表';

/*Data for the table `one_document` */

insert  into `one_document`(`id`,`uid`,`name`,`title`,`category_id`,`description`,`root`,`pid`,`model_id`,`type`,`position`,`link_id`,`cover_id`,`display`,`deadline`,`attach`,`view`,`comment`,`extend`,`level`,`create_time`,`update_time`,`status`) values (1,1,'','',2,'',0,0,2,2,0,0,0,1,0,0,8,0,0,0,1387260660,1387263112,1);

/*Table structure for table `one_document_article` */

DROP TABLE IF EXISTS `one_document_article`;

CREATE TABLE `one_document_article` (
  `id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文档ID',
  `parse` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '内容解析类型',
  `content` text NOT NULL COMMENT '文章内容',
  `template` varchar(100) NOT NULL DEFAULT '' COMMENT '详情页显示模板',
  `bookmark` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '收藏数',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文档模型文章表';

/*Data for the table `one_document_article` */

insert  into `one_document_article`(`id`,`parse`,`content`,`template`,`bookmark`) values (1,0,'<h1>\r\n	OneThink1.0正式版发布&nbsp;\r\n</h1>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<strong>OneThink是一个开源的内容管理框架，基于最新的ThinkPHP3.2版本开发，提供更方便、更安全的WEB应用开发体验，采用了全新的架构设计和命名空间机制，融合了模块化、驱动化和插件化的设计理念于一体，开启了国内WEB应用傻瓜式开发的新潮流。&nbsp;</strong> \r\n</p>\r\n<h2>\r\n	主要特性：\r\n</h2>\r\n<p>\r\n	1. 基于ThinkPHP最新3.2版本。\r\n</p>\r\n<p>\r\n	2. 模块化：全新的架构和模块化的开发机制，便于灵活扩展和二次开发。&nbsp;\r\n</p>\r\n<p>\r\n	3. 文档模型/分类体系：通过和文档模型绑定，以及不同的文档类型，不同分类可以实现差异化的功能，轻松实现诸如资讯、下载、讨论和图片等功能。\r\n</p>\r\n<p>\r\n	4. 开源免费：OneThink遵循Apache2开源协议,免费提供使用。&nbsp;\r\n</p>\r\n<p>\r\n	5. 用户行为：支持自定义用户行为，可以对单个用户或者群体用户的行为进行记录及分享，为您的运营决策提供有效参考数据。\r\n</p>\r\n<p>\r\n	6. 云端部署：通过驱动的方式可以轻松支持平台的部署，让您的网站无缝迁移，内置已经支持SAE和BAE3.0。\r\n</p>\r\n<p>\r\n	7. 云服务支持：即将启动支持云存储、云安全、云过滤和云统计等服务，更多贴心的服务让您的网站更安心。\r\n</p>\r\n<p>\r\n	8. 安全稳健：提供稳健的安全策略，包括备份恢复、容错、防止恶意攻击登录，网页防篡改等多项安全管理功能，保证系统安全，可靠、稳定的运行。&nbsp;\r\n</p>\r\n<p>\r\n	9. 应用仓库：官方应用仓库拥有大量来自第三方插件和应用模块、模板主题，有众多来自开源社区的贡献，让您的网站“One”美无缺。&nbsp;\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<strong>&nbsp;OneThink集成了一个完善的后台管理体系和前台模板标签系统，让你轻松管理数据和进行前台网站的标签式开发。&nbsp;</strong> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<h2>\r\n	后台主要功能：\r\n</h2>\r\n<p>\r\n	1. 用户Passport系统\r\n</p>\r\n<p>\r\n	2. 配置管理系统&nbsp;\r\n</p>\r\n<p>\r\n	3. 权限控制系统\r\n</p>\r\n<p>\r\n	4. 后台建模系统&nbsp;\r\n</p>\r\n<p>\r\n	5. 多级分类系统&nbsp;\r\n</p>\r\n<p>\r\n	6. 用户行为系统&nbsp;\r\n</p>\r\n<p>\r\n	7. 钩子和插件系统\r\n</p>\r\n<p>\r\n	8. 系统日志系统&nbsp;\r\n</p>\r\n<p>\r\n	9. 数据备份和还原\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	&nbsp;[ 官方下载：&nbsp;<a href=\"http://www.onethink.cn/download.html\" target=\"_blank\">http://www.onethink.cn/download.html</a>&nbsp;&nbsp;开发手册：<a href=\"http://document.onethink.cn/\" target=\"_blank\">http://document.onethink.cn/</a>&nbsp;]&nbsp;\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<strong>OneThink开发团队 2013</strong> \r\n</p>','',0);

/*Table structure for table `one_document_download` */

DROP TABLE IF EXISTS `one_document_download`;

CREATE TABLE `one_document_download` (
  `id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文档ID',
  `parse` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '内容解析类型',
  `content` text NOT NULL COMMENT '下载详细描述',
  `template` varchar(100) NOT NULL DEFAULT '' COMMENT '详情页显示模板',
  `file_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文件ID',
  `download` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '下载次数',
  `size` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '文件大小',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文档模型下载表';

/*Data for the table `one_document_download` */

/*Table structure for table `one_file` */

DROP TABLE IF EXISTS `one_file`;

CREATE TABLE `one_file` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '文件ID',
  `name` char(30) NOT NULL DEFAULT '' COMMENT '原始文件名',
  `savename` char(20) NOT NULL DEFAULT '' COMMENT '保存名称',
  `savepath` char(30) NOT NULL DEFAULT '' COMMENT '文件保存路径',
  `ext` char(5) NOT NULL DEFAULT '' COMMENT '文件后缀',
  `mime` char(40) NOT NULL DEFAULT '' COMMENT '文件mime类型',
  `size` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文件大小',
  `md5` char(32) NOT NULL DEFAULT '' COMMENT '文件md5',
  `sha1` char(40) NOT NULL DEFAULT '' COMMENT '文件 sha1编码',
  `location` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '文件保存位置',
  `create_time` int(10) unsigned NOT NULL COMMENT '上传时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_md5` (`md5`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文件表';

/*Data for the table `one_file` */

/*Table structure for table `one_hooks` */

DROP TABLE IF EXISTS `one_hooks`;

CREATE TABLE `one_hooks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(40) NOT NULL DEFAULT '' COMMENT '钩子名称',
  `description` text NOT NULL COMMENT '描述',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '类型',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `addons` varchar(255) NOT NULL DEFAULT '' COMMENT '钩子挂载的插件 ''，''分割',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

/*Data for the table `one_hooks` */

insert  into `one_hooks`(`id`,`name`,`description`,`type`,`update_time`,`addons`) values (1,'pageHeader','页面header钩子，一般用于加载插件CSS文件和代码',1,0,''),(2,'pageFooter','页面footer钩子，一般用于加载插件JS文件和JS代码',1,0,'ReturnTop'),(3,'documentEditForm','添加编辑表单的 扩展内容钩子',1,0,'Attachment'),(4,'documentDetailAfter','文档末尾显示',1,0,'Attachment,SocialComment'),(5,'documentDetailBefore','页面内容前显示用钩子',1,0,''),(6,'documentSaveComplete','保存文档数据后的扩展钩子',2,0,'Attachment'),(7,'documentEditFormContent','添加编辑表单的内容显示钩子',1,0,'Editor'),(8,'adminArticleEdit','后台内容编辑页编辑器',1,1378982734,'EditorForAdmin'),(13,'AdminIndex','首页小格子个性化显示',1,1382596073,'SiteStat,SystemInfo,DevTeam'),(14,'topicComment','评论提交方式扩展钩子。',1,1380163518,'Editor'),(16,'app_begin','应用开始',2,1384481614,'');

/*Table structure for table `one_log` */

DROP TABLE IF EXISTS `one_log`;

CREATE TABLE `one_log` (
  `log_id` int(10) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(20) DEFAULT NULL COMMENT '模块名',
  `controller_name` varchar(20) DEFAULT NULL COMMENT '控制器名',
  `action_name` varchar(20) DEFAULT NULL COMMENT '方法名',
  `user_id` int(10) NOT NULL DEFAULT '0' COMMENT '操作人id',
  `log_name` varchar(200) DEFAULT NULL COMMENT '操作人账号',
  `act_time` int(10) NOT NULL DEFAULT '0' COMMENT '操作时间',
  `log_content` text NOT NULL COMMENT '日志内容',
  `other_info` varchar(200) DEFAULT NULL COMMENT '浏览器标识：IP,BROWSER',
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='操作日志';

/*Data for the table `one_log` */

insert  into `one_log`(`log_id`,`module_name`,`controller_name`,`action_name`,`user_id`,`log_name`,`act_time`,`log_content`,`other_info`) values (1,NULL,NULL,NULL,1,NULL,1512535331,'上传图片成功，res:1,id:705,c_img:20171206/QQ截图20171206122749.png','183.63.164.154;Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36');

/*Table structure for table `one_member` */

DROP TABLE IF EXISTS `one_member`;

CREATE TABLE `one_member` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `nickname` char(16) NOT NULL DEFAULT '' COMMENT '昵称',
  `sex` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '性别',
  `birthday` date NOT NULL DEFAULT '0000-00-00' COMMENT '生日',
  `qq` char(10) NOT NULL DEFAULT '' COMMENT 'qq号',
  `score` mediumint(8) NOT NULL DEFAULT '0' COMMENT '用户积分',
  `login` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '登录次数',
  `reg_ip` bigint(20) NOT NULL DEFAULT '0' COMMENT '注册IP',
  `reg_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '注册时间',
  `last_login_ip` bigint(20) NOT NULL DEFAULT '0' COMMENT '最后登录IP',
  `last_login_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '会员状态',
  PRIMARY KEY (`uid`),
  KEY `status` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='会员表';

/*Data for the table `one_member` */

insert  into `one_member`(`uid`,`nickname`,`sex`,`birthday`,`qq`,`score`,`login`,`reg_ip`,`reg_time`,`last_login_ip`,`last_login_time`,`status`) values (1,'管理员',0,'0000-00-00','',140,27,0,1479990936,3074401434,1512534378,1),(2,'scut',0,'0000-00-00','',10,3,0,0,2130706433,1480381006,1);

/*Table structure for table `one_menu` */

DROP TABLE IF EXISTS `one_menu`;

CREATE TABLE `one_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '文档ID',
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '标题',
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上级分类ID',
  `sort` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序（同级有效）',
  `url` char(255) NOT NULL DEFAULT '' COMMENT '链接地址',
  `hide` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否隐藏',
  `tip` varchar(255) NOT NULL DEFAULT '' COMMENT '提示',
  `group` varchar(50) DEFAULT '' COMMENT '分组',
  `is_dev` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否仅开发者模式可见',
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=129 DEFAULT CHARSET=utf8;

/*Data for the table `one_menu` */

insert  into `one_menu`(`id`,`title`,`pid`,`sort`,`url`,`hide`,`tip`,`group`,`is_dev`) values (127,'上传图片',122,5,'Down/image',1,'','',0),(122,'数据',0,3,'Down/index',0,'','',0),(3,'文档列表',2,0,'article/index',1,'','内容',0),(4,'新增',3,0,'article/add',0,'','',0),(5,'编辑',3,0,'article/edit',0,'','',0),(6,'改变状态',3,0,'article/setStatus',0,'','',0),(7,'保存',3,0,'article/update',0,'','',0),(8,'保存草稿',3,0,'article/autoSave',0,'','',0),(9,'移动',3,0,'article/move',0,'','',0),(10,'复制',3,0,'article/copy',0,'','',0),(11,'粘贴',3,0,'article/paste',0,'','',0),(12,'导入',3,0,'article/batchOperate',0,'','',0),(13,'回收站',2,0,'article/recycle',1,'','内容',0),(14,'还原',13,0,'article/permit',0,'','',0),(15,'清空',13,0,'article/clear',0,'','',0),(16,'用户',0,5,'User/index',0,'','',1),(17,'用户信息',16,0,'User/index',0,'','用户管理',0),(18,'新增用户',17,0,'User/add',0,'添加新用户','',0),(19,'用户行为',16,0,'User/action',0,'','行为管理',0),(20,'新增用户行为',19,0,'User/addaction',0,'','',0),(21,'编辑用户行为',19,0,'User/editaction',0,'','',0),(22,'保存用户行为',19,0,'User/saveAction',0,'\"用户->用户行为\"保存编辑和新增的用户行为','',0),(23,'变更行为状态',19,0,'User/setStatus',0,'\"用户->用户行为\"中的启用,禁用和删除权限','',0),(24,'禁用会员',19,0,'User/changeStatus?method=forbidUser',0,'\"用户->用户信息\"中的禁用','',0),(25,'启用会员',19,0,'User/changeStatus?method=resumeUser',0,'\"用户->用户信息\"中的启用','',0),(26,'删除会员',19,0,'User/changeStatus?method=deleteUser',0,'\"用户->用户信息\"中的删除','',0),(27,'权限管理',16,0,'AuthManager/index',0,'','用户管理',0),(28,'删除',27,0,'AuthManager/changeStatus?method=deleteGroup',0,'删除用户组','',0),(29,'禁用',27,0,'AuthManager/changeStatus?method=forbidGroup',0,'禁用用户组','',0),(30,'恢复',27,0,'AuthManager/changeStatus?method=resumeGroup',0,'恢复已禁用的用户组','',0),(31,'新增',27,0,'AuthManager/createGroup',0,'创建新的用户组','',0),(32,'编辑',27,0,'AuthManager/editGroup',0,'编辑用户组名称和描述','',0),(33,'保存用户组',27,0,'AuthManager/writeGroup',0,'新增和编辑用户组的\"保存\"按钮','',0),(34,'授权',27,0,'AuthManager/group',0,'\"后台 \\ 用户 \\ 用户信息\"列表页的\"授权\"操作按钮,用于设置用户所属用户组','',0),(35,'访问授权',27,0,'AuthManager/access',0,'\"后台 \\ 用户 \\ 权限管理\"列表页的\"访问授权\"操作按钮','',0),(36,'成员授权',27,0,'AuthManager/user',0,'\"后台 \\ 用户 \\ 权限管理\"列表页的\"成员授权\"操作按钮','',0),(37,'解除授权',27,0,'AuthManager/removeFromGroup',0,'\"成员授权\"列表页内的解除授权操作按钮','',0),(38,'保存成员授权',27,0,'AuthManager/addToGroup',0,'\"用户信息\"列表页\"授权\"时的\"保存\"按钮和\"成员授权\"里右上角的\"添加\"按钮)','',0),(39,'分类授权',27,0,'AuthManager/category',0,'\"后台 \\ 用户 \\ 权限管理\"列表页的\"分类授权\"操作按钮','',0),(40,'保存分类授权',27,0,'AuthManager/addToCategory',0,'\"分类授权\"页面的\"保存\"按钮','',0),(41,'模型授权',27,0,'AuthManager/modelauth',0,'\"后台 \\ 用户 \\ 权限管理\"列表页的\"模型授权\"操作按钮','',0),(42,'保存模型授权',27,0,'AuthManager/addToModel',0,'\"分类授权\"页面的\"保存\"按钮','',0),(44,'插件管理',43,1,'Addons/index',0,'','扩展',0),(45,'创建',44,0,'Addons/create',0,'服务器上创建插件结构向导','',0),(46,'检测创建',44,0,'Addons/checkForm',0,'检测插件是否可以创建','',0),(47,'预览',44,0,'Addons/preview',0,'预览插件定义类文件','',0),(48,'快速生成插件',44,0,'Addons/build',0,'开始生成插件结构','',0),(49,'设置',44,0,'Addons/config',0,'设置插件配置','',0),(50,'禁用',44,0,'Addons/disable',0,'禁用插件','',0),(51,'启用',44,0,'Addons/enable',0,'启用插件','',0),(52,'安装',44,0,'Addons/install',0,'安装插件','',0),(53,'卸载',44,0,'Addons/uninstall',0,'卸载插件','',0),(54,'更新配置',44,0,'Addons/saveconfig',0,'更新插件配置处理','',0),(55,'插件后台列表',44,0,'Addons/adminList',0,'','',0),(56,'URL方式访问插件',44,0,'Addons/execute',0,'控制是否有权限通过url访问插件控制器方法','',0),(57,'钩子管理',43,2,'Addons/hooks',0,'','扩展',0),(58,'模型管理',68,3,'Model/index',0,'','系统设置',0),(59,'新增',58,0,'model/add',0,'','',0),(60,'编辑',58,0,'model/edit',0,'','',0),(61,'改变状态',58,0,'model/setStatus',0,'','',0),(62,'保存数据',58,0,'model/update',0,'','',0),(63,'属性管理',68,0,'Attribute/index',1,'网站属性配置。','',0),(64,'新增',63,0,'Attribute/add',0,'','',0),(65,'编辑',63,0,'Attribute/edit',0,'','',0),(66,'改变状态',63,0,'Attribute/setStatus',0,'','',0),(67,'保存数据',63,0,'Attribute/update',0,'','',0),(68,'系统',0,4,'Config/group',0,'','',1),(69,'网站设置',68,1,'Config/group',0,'','系统设置',0),(70,'配置管理',68,4,'Config/index',0,'','系统设置',0),(71,'编辑',70,0,'Config/edit',0,'新增编辑和保存配置','',0),(72,'删除',70,0,'Config/del',0,'删除配置','',0),(73,'新增',70,0,'Config/add',0,'新增配置','',0),(74,'保存',70,0,'Config/save',0,'保存配置','',0),(75,'菜单管理',68,5,'Menu/index',0,'','系统设置',0),(76,'导航管理',68,6,'Channel/index',0,'','系统设置',0),(77,'新增',76,0,'Channel/add',0,'','',0),(78,'编辑',76,0,'Channel/edit',0,'','',0),(79,'删除',76,0,'Channel/del',0,'','',0),(80,'分类管理',68,2,'Category/index',0,'','系统设置',0),(81,'编辑',80,0,'Category/edit',0,'编辑和保存栏目分类','',0),(82,'新增',80,0,'Category/add',0,'新增栏目分类','',0),(83,'删除',80,0,'Category/remove',0,'删除栏目分类','',0),(84,'移动',80,0,'Category/operate/type/move',0,'移动栏目分类','',0),(85,'合并',80,0,'Category/operate/type/merge',0,'合并栏目分类','',0),(86,'备份数据库',68,0,'Database/index?type=export',0,'','数据备份',0),(87,'备份',86,0,'Database/export',0,'备份数据库','',0),(88,'优化表',86,0,'Database/optimize',0,'优化数据表','',0),(89,'修复表',86,0,'Database/repair',0,'修复数据表','',0),(90,'还原数据库',68,0,'Database/index?type=import',0,'','数据备份',0),(91,'恢复',90,0,'Database/import',0,'数据库恢复','',0),(92,'删除',90,0,'Database/del',0,'删除备份文件','',0),(123,'导入化合物excel',122,4,'Down/Index',0,'','',0),(96,'新增',75,0,'Menu/add',0,'','系统设置',0),(98,'编辑',75,0,'Menu/edit',0,'','',0),(104,'下载管理',102,0,'Think/lists?model=download',0,'','',0),(105,'配置管理',102,0,'Think/lists?model=config',0,'','',0),(106,'行为日志',16,0,'Action/actionlog',0,'','行为管理',0),(108,'修改密码',16,0,'User/updatePassword',1,'','',0),(109,'修改昵称',16,0,'User/updateNickname',1,'','',0),(110,'查看行为日志',106,0,'action/edit',1,'','',0),(112,'新增数据',58,0,'think/add',1,'','',0),(113,'编辑数据',58,0,'think/edit',1,'','',0),(114,'导入',75,0,'Menu/import',0,'','',0),(115,'生成',58,0,'Model/generate',0,'','',0),(116,'新增钩子',57,0,'Addons/addHook',0,'','',0),(117,'编辑钩子',57,0,'Addons/edithook',0,'','',0),(118,'文档排序',3,0,'Article/sort',1,'','',0),(119,'排序',70,0,'Config/sort',1,'','',0),(120,'排序',75,0,'Menu/sort',1,'','',0),(121,'排序',76,0,'Channel/sort',1,'','',0),(124,'化合物列表',122,1,'Down/CompoundList',0,'','',0),(125,'反应列表',122,2,'Down/ReactionList',0,'','',0),(126,'常量列表',122,3,'Down/ConstantList',0,'','',0),(128,'上传PDF文件',122,6,'Down/pdf',1,'','',0);

/*Table structure for table `one_model` */

DROP TABLE IF EXISTS `one_model`;

CREATE TABLE `one_model` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '模型ID',
  `name` char(30) NOT NULL DEFAULT '' COMMENT '模型标识',
  `title` char(30) NOT NULL DEFAULT '' COMMENT '模型名称',
  `extend` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '继承的模型',
  `relation` varchar(30) NOT NULL DEFAULT '' COMMENT '继承与被继承模型的关联字段',
  `need_pk` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '新建表时是否需要主键字段',
  `field_sort` text NOT NULL COMMENT '表单字段排序',
  `field_group` varchar(255) NOT NULL DEFAULT '1:基础' COMMENT '字段分组',
  `attribute_list` text NOT NULL COMMENT '属性列表（表的字段）',
  `template_list` varchar(100) NOT NULL DEFAULT '' COMMENT '列表模板',
  `template_add` varchar(100) NOT NULL DEFAULT '' COMMENT '新增模板',
  `template_edit` varchar(100) NOT NULL DEFAULT '' COMMENT '编辑模板',
  `list_grid` text NOT NULL COMMENT '列表定义',
  `list_row` smallint(2) unsigned NOT NULL DEFAULT '10' COMMENT '列表数据长度',
  `search_key` varchar(50) NOT NULL DEFAULT '' COMMENT '默认搜索字段',
  `search_list` varchar(255) NOT NULL DEFAULT '' COMMENT '高级搜索的字段',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '状态',
  `engine_type` varchar(25) NOT NULL DEFAULT 'MyISAM' COMMENT '数据库引擎',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='文档模型表';

/*Data for the table `one_model` */

insert  into `one_model`(`id`,`name`,`title`,`extend`,`relation`,`need_pk`,`field_sort`,`field_group`,`attribute_list`,`template_list`,`template_add`,`template_edit`,`list_grid`,`list_row`,`search_key`,`search_list`,`create_time`,`update_time`,`status`,`engine_type`) values (1,'document','基础文档',0,'',1,'{\"1\":[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"12\",\"13\",\"14\",\"15\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\"]}','1:基础','','','','','id:编号\r\ntitle:标题:article/index?cate_id=[category_id]&pid=[id]\r\ntype|get_document_type:类型\r\nlevel:优先级\r\nupdate_time|time_format:最后更新\r\nstatus_text:状态\r\nview:浏览\r\nid:操作:[EDIT]&cate_id=[category_id]|编辑,article/setstatus?status=-1&ids=[id]|删除',0,'','',1383891233,1384507827,1,'MyISAM'),(2,'article','文章',1,'',1,'{\"1\":[\"3\",\"24\",\"2\",\"5\"],\"2\":[\"9\",\"13\",\"19\",\"10\",\"12\",\"16\",\"17\",\"26\",\"20\",\"14\",\"11\",\"25\"]}','1:基础,2:扩展','','','','','id:编号\r\ntitle:标题:article/edit?cate_id=[category_id]&id=[id]\r\ncontent:内容',0,'','',1383891243,1387260622,1,'MyISAM'),(3,'upload','上传数据',0,'',1,'{\"1\":[\"3\",\"28\",\"30\",\"32\",\"2\",\"5\",\"31\"],\"2\":[\"13\",\"10\",\"9\",\"12\",\"16\",\"17\",\"19\",\"11\",\"20\",\"14\",\"29\"]}','1:基础,2:扩展','','','','','id:编号\r\ntitle:标题',0,'','',1383891252,1480294560,1,'MyISAM');

/*Table structure for table `one_picture` */

DROP TABLE IF EXISTS `one_picture`;

CREATE TABLE `one_picture` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id自增',
  `path` varchar(255) NOT NULL DEFAULT '' COMMENT '路径',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '图片链接',
  `md5` char(32) NOT NULL DEFAULT '' COMMENT '文件md5',
  `sha1` char(40) NOT NULL DEFAULT '' COMMENT '文件 sha1编码',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '状态',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `one_picture` */

/*Table structure for table `one_ucenter_admin` */

DROP TABLE IF EXISTS `one_ucenter_admin`;

CREATE TABLE `one_ucenter_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '管理员ID',
  `member_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '管理员用户ID',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '管理员状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='管理员表';

/*Data for the table `one_ucenter_admin` */

/*Table structure for table `one_ucenter_app` */

DROP TABLE IF EXISTS `one_ucenter_app`;

CREATE TABLE `one_ucenter_app` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '应用ID',
  `title` varchar(30) NOT NULL COMMENT '应用名称',
  `url` varchar(100) NOT NULL COMMENT '应用URL',
  `ip` char(15) NOT NULL COMMENT '应用IP',
  `auth_key` varchar(100) NOT NULL COMMENT '加密KEY',
  `sys_login` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '同步登陆',
  `allow_ip` varchar(255) NOT NULL COMMENT '允许访问的IP',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '应用状态',
  PRIMARY KEY (`id`),
  KEY `status` (`status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='应用表';

/*Data for the table `one_ucenter_app` */

/*Table structure for table `one_ucenter_member` */

DROP TABLE IF EXISTS `one_ucenter_member`;

CREATE TABLE `one_ucenter_member` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `username` char(16) NOT NULL COMMENT '用户名',
  `password` char(32) NOT NULL COMMENT '密码',
  `email` char(32) NOT NULL COMMENT '用户邮箱',
  `mobile` char(15) NOT NULL COMMENT '用户手机',
  `reg_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '注册时间',
  `reg_ip` bigint(20) NOT NULL DEFAULT '0' COMMENT '注册IP',
  `last_login_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  `last_login_ip` bigint(20) NOT NULL DEFAULT '0' COMMENT '最后登录IP',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(4) DEFAULT '0' COMMENT '用户状态',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `status` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='用户表';

/*Data for the table `one_ucenter_member` */

insert  into `one_ucenter_member`(`id`,`username`,`password`,`email`,`mobile`,`reg_time`,`reg_ip`,`last_login_time`,`last_login_ip`,`update_time`,`status`) values (1,'admin','607885d7924e07b834e0b7085aa7cba7','578919255@qq.com','',1479990936,2130706433,1512534378,3074401434,1479990936,1);

/*Table structure for table `one_ucenter_setting` */

DROP TABLE IF EXISTS `one_ucenter_setting`;

CREATE TABLE `one_ucenter_setting` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '设置ID',
  `type` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '配置类型（1-用户配置）',
  `value` text NOT NULL COMMENT '配置数据',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='设置表';

/*Data for the table `one_ucenter_setting` */

/*Table structure for table `one_url` */

DROP TABLE IF EXISTS `one_url`;

CREATE TABLE `one_url` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '链接唯一标识',
  `url` char(255) NOT NULL DEFAULT '' COMMENT '链接地址',
  `short` char(100) NOT NULL DEFAULT '' COMMENT '短网址',
  `status` tinyint(2) NOT NULL DEFAULT '2' COMMENT '状态',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_url` (`url`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='链接表';

/*Data for the table `one_url` */

/*Table structure for table `one_userdata` */

DROP TABLE IF EXISTS `one_userdata`;

CREATE TABLE `one_userdata` (
  `uid` int(10) unsigned NOT NULL COMMENT '用户id',
  `type` tinyint(3) unsigned NOT NULL COMMENT '类型标识',
  `target_id` int(10) unsigned NOT NULL COMMENT '目标id',
  UNIQUE KEY `uid` (`uid`,`type`,`target_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `one_userdata` */

/*Table structure for table `one_users` */

DROP TABLE IF EXISTS `one_users`;

CREATE TABLE `one_users` (
  `u_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `u_name` varchar(40) NOT NULL COMMENT '帐号',
  `u_pwd` varchar(100) NOT NULL COMMENT '密码',
  `u_login_time` int(11) NOT NULL COMMENT '最后一次登录时间',
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户表';

/*Data for the table `one_users` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
