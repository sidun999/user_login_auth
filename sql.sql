/*
SQLyog Ultimate v11.24 (32 bit)
MySQL - 5.6.21 : Database - github_user_login_auth
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `bd_ip_list` */

DROP TABLE IF EXISTS `bd_ip_list`;

CREATE TABLE `bd_ip_list` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ip` varchar(20) DEFAULT NULL,
  `type` smallint(5) unsigned DEFAULT '0',
  `status` smallint(5) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `bd_ip_list` */

/*Table structure for table `bd_rbac_access` */

DROP TABLE IF EXISTS `bd_rbac_access`;

CREATE TABLE `bd_rbac_access` (
  `role_id` smallint(6) unsigned NOT NULL,
  `node_id` smallint(6) unsigned NOT NULL,
  `pid` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) NOT NULL,
  `module` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='权限分配';

/*Data for the table `bd_rbac_access` */

insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (3,20,19,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (3,19,1,2,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (3,13,1,0,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (3,6,2,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (3,7,2,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (3,4,2,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (3,5,2,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (3,3,2,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (3,2,1,2,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (3,36,21,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (3,35,21,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (3,34,21,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (3,30,21,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (3,21,18,2,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (3,18,1,0,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (3,228,195,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (3,204,195,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (3,203,195,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (3,202,195,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (3,201,195,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (3,195,14,2,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (3,225,213,2,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (3,224,213,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (3,223,213,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (3,222,213,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (3,217,213,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (3,216,213,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (3,215,213,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (3,214,213,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (3,213,14,2,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (3,210,209,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (3,211,209,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (3,209,14,2,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (3,227,205,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (3,208,205,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (3,207,205,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (3,206,205,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (3,205,14,2,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (3,185,180,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (3,184,180,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (3,183,180,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (3,182,180,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (3,181,180,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (3,180,14,2,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (5,216,213,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (5,213,14,2,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (5,210,209,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (5,211,209,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (5,209,14,2,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (5,227,205,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (5,208,205,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (5,207,205,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (5,206,205,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (5,205,14,2,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (5,14,1,0,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (5,1,0,1,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (7,269,264,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (7,268,264,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (7,259,264,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (7,264,14,2,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (7,267,265,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (7,266,265,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (7,258,265,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (7,265,14,2,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (7,15,25,0,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (7,25,14,0,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (7,14,1,0,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (7,1,0,1,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (2,312,247,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (2,303,247,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (2,302,247,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (2,300,247,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (2,294,247,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (2,293,247,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (2,247,14,2,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (2,310,299,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (2,309,299,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (2,299,14,2,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (2,308,301,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (4,20,19,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (4,19,1,2,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (4,13,1,0,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (1,277,21,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (1,271,21,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (1,270,21,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (1,21,18,2,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (1,246,245,0,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (1,245,18,2,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (1,18,1,0,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (1,20,19,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (1,19,1,2,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (1,279,1,2,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (1,283,282,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (1,282,278,2,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (1,281,280,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (1,280,278,2,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (1,278,1,2,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (1,273,272,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (1,272,14,2,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (1,250,247,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (1,248,247,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (1,247,14,2,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (1,15,25,0,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (1,25,14,0,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (1,14,1,0,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (1,1,0,1,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (4,6,2,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (4,7,2,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (4,4,2,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (4,5,2,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (4,3,2,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (4,2,1,2,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (4,17,8,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (4,11,8,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (4,10,8,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (4,9,8,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (4,16,8,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (4,8,28,2,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (4,28,45,0,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (4,51,46,0,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (4,50,46,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (4,49,46,0,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (4,48,46,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (4,47,46,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (4,46,45,2,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (4,45,1,0,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (4,225,213,2,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (4,224,213,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (4,223,213,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (4,222,213,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (4,217,213,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (4,216,213,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (4,215,213,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (4,214,213,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (4,213,14,2,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (4,211,209,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (4,210,209,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (4,209,14,2,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (4,227,205,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (4,208,205,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (4,207,205,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (4,206,205,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (4,205,14,2,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (4,218,195,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (4,204,195,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (4,203,195,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (4,202,195,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (4,201,195,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (4,195,14,2,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (4,184,180,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (4,183,180,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (4,182,180,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (4,181,180,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (4,180,14,2,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (4,15,25,0,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (4,25,14,0,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (4,14,1,0,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (4,1,0,1,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (3,15,25,0,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (3,25,14,0,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (3,14,1,0,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (3,1,0,1,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (2,307,301,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (2,301,14,2,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (2,306,304,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (2,305,304,3,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (2,304,14,2,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (2,15,25,0,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (2,25,14,0,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (2,14,1,0,NULL);
insert  into `bd_rbac_access`(`role_id`,`node_id`,`pid`,`level`,`module`) values (2,1,0,1,NULL);

/*Table structure for table `bd_rbac_node` */

DROP TABLE IF EXISTS `bd_rbac_node`;

CREATE TABLE `bd_rbac_node` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '节点名称',
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '菜单名称',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否激活 1：是 2：否',
  `remark` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '备注说明',
  `pid` smallint(6) unsigned NOT NULL COMMENT '父ID',
  `level` tinyint(1) unsigned NOT NULL COMMENT '节点等级',
  `data` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '附加参数',
  `sort` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '排序权重',
  `display` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '菜单显示类型 0:不显示 1:导航菜单 2:左侧菜单',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=324 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='节点';

/*Data for the table `bd_rbac_node` */

insert  into `bd_rbac_node`(`id`,`name`,`title`,`status`,`remark`,`pid`,`level`,`data`,`sort`,`display`) values (25,'my','主控制板',1,'',14,0,'',9999,2);
insert  into `bd_rbac_node`(`id`,`name`,`title`,`status`,`remark`,`pid`,`level`,`data`,`sort`,`display`) values (21,'rbacManager','后台导航及权限管理',1,'',18,2,'',0,2);
insert  into `bd_rbac_node`(`id`,`name`,`title`,`status`,`remark`,`pid`,`level`,`data`,`sort`,`display`) values (20,'delCore','删除核心缓存',1,'',19,3,'',0,0);
insert  into `bd_rbac_node`(`id`,`name`,`title`,`status`,`remark`,`pid`,`level`,`data`,`sort`,`display`) values (19,'cache','缓存模块',1,'',1,2,'',0,0);
insert  into `bd_rbac_node`(`id`,`name`,`title`,`status`,`remark`,`pid`,`level`,`data`,`sort`,`display`) values (18,'systemManager','系统管理',1,'',1,0,'',10,1);
insert  into `bd_rbac_node`(`id`,`name`,`title`,`status`,`remark`,`pid`,`level`,`data`,`sort`,`display`) values (15,'main','系统环境',1,'快捷菜单',25,0,'?s=/Admin/Index/main',10,2);
insert  into `bd_rbac_node`(`id`,`name`,`title`,`status`,`remark`,`pid`,`level`,`data`,`sort`,`display`) values (14,'contentManager','内容管理',1,'',1,0,'',100,1);
insert  into `bd_rbac_node`(`id`,`name`,`title`,`status`,`remark`,`pid`,`level`,`data`,`sort`,`display`) values (1,'Admin','后台组',1,'不可删除',0,1,NULL,0,0);
insert  into `bd_rbac_node`(`id`,`name`,`title`,`status`,`remark`,`pid`,`level`,`data`,`sort`,`display`) values (270,'RbacUser_role','后台角色管理',1,'',21,3,'?s=/Admin/RbacUser/role',0,2);
insert  into `bd_rbac_node`(`id`,`name`,`title`,`status`,`remark`,`pid`,`level`,`data`,`sort`,`display`) values (271,'RbacUser_Index','后台用户管理',1,'',21,3,'?s=/Admin/RbacUser/Index',0,2);
insert  into `bd_rbac_node`(`id`,`name`,`title`,`status`,`remark`,`pid`,`level`,`data`,`sort`,`display`) values (68,'uploadify','控件文件上传',1,'',65,3,'',0,0);
insert  into `bd_rbac_node`(`id`,`name`,`title`,`status`,`remark`,`pid`,`level`,`data`,`sort`,`display`) values (277,'RbacNode_index','后台菜单管理',1,'',21,3,'?s=/Admin/RbacNode/index',0,2);

/*Table structure for table `bd_rbac_role` */

DROP TABLE IF EXISTS `bd_rbac_role`;

CREATE TABLE `bd_rbac_role` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '后台组名',
  `pid` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '父ID',
  `status` tinyint(1) unsigned DEFAULT '0' COMMENT '是否激活 1：是 0：否',
  `sort` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '排序权重',
  `remark` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '备注说明',
  `cat_access` text COLLATE utf8_unicode_ci COMMENT '内容管理权限',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='角色';

/*Data for the table `bd_rbac_role` */

insert  into `bd_rbac_role`(`id`,`name`,`pid`,`status`,`sort`,`remark`,`cat_access`) values (1,'超级管理员',0,1,50,'超级管理员组','');
insert  into `bd_rbac_role`(`id`,`name`,`pid`,`status`,`sort`,`remark`,`cat_access`) values (2,'内容编辑组',0,1,40,'管理网站内容','');

/*Table structure for table `bd_rbac_role_user` */

DROP TABLE IF EXISTS `bd_rbac_role_user`;

CREATE TABLE `bd_rbac_role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` smallint(6) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='用户角色关系';

/*Data for the table `bd_rbac_role_user` */

insert  into `bd_rbac_role_user`(`user_id`,`role_id`) values (15,6);
insert  into `bd_rbac_role_user`(`user_id`,`role_id`) values (1,1);
insert  into `bd_rbac_role_user`(`user_id`,`role_id`) values (10,4);
insert  into `bd_rbac_role_user`(`user_id`,`role_id`) values (11,2);
insert  into `bd_rbac_role_user`(`user_id`,`role_id`) values (32,5);
insert  into `bd_rbac_role_user`(`user_id`,`role_id`) values (13,5);
insert  into `bd_rbac_role_user`(`user_id`,`role_id`) values (16,5);
insert  into `bd_rbac_role_user`(`user_id`,`role_id`) values (17,5);
insert  into `bd_rbac_role_user`(`user_id`,`role_id`) values (18,1);
insert  into `bd_rbac_role_user`(`user_id`,`role_id`) values (19,5);
insert  into `bd_rbac_role_user`(`user_id`,`role_id`) values (20,5);
insert  into `bd_rbac_role_user`(`user_id`,`role_id`) values (21,1);
insert  into `bd_rbac_role_user`(`user_id`,`role_id`) values (22,5);
insert  into `bd_rbac_role_user`(`user_id`,`role_id`) values (23,5);
insert  into `bd_rbac_role_user`(`user_id`,`role_id`) values (24,5);
insert  into `bd_rbac_role_user`(`user_id`,`role_id`) values (25,5);
insert  into `bd_rbac_role_user`(`user_id`,`role_id`) values (31,1);
insert  into `bd_rbac_role_user`(`user_id`,`role_id`) values (35,2);

/*Table structure for table `bd_rbac_user` */

DROP TABLE IF EXISTS `bd_rbac_user`;

CREATE TABLE `bd_rbac_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `role` smallint(6) unsigned NOT NULL COMMENT '组ID',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '状态 1:启用 0:禁止',
  `remark` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '备注说明',
  `last_login_time` int(11) unsigned DEFAULT NULL COMMENT '最后登录时间',
  `last_login_ip` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '最后登录IP',
  `last_location` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '最后登录位置',
  `isdelete` tinyint(1) unsigned DEFAULT '0',
  `uname` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '用户姓名',
  `mobile` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '联系电话',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='用户表';

/*Data for the table `bd_rbac_user` */

insert  into `bd_rbac_user`(`id`,`username`,`password`,`role`,`status`,`remark`,`last_login_time`,`last_login_ip`,`last_location`,`isdelete`,`uname`,`mobile`) values (1,'admin','0538f1e279dca16741891333f514a921',1,1,'超级管理员',1516339211,'127.0.0.1','',0,'admin','1234567890');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
