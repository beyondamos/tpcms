create database `tpcms` charset utf8;
/**
 * 用户表
 */
create table tpcms_user(
	user_id int unsigned not null primary key auto_increment comment '用户id',
	username varchar(32) not null default '' comment '用户名',
	password char(32)  not null default '' comment '用户密码',
	email varchar(32) not null default '' comment '用户邮箱',
	salt char(4) not null default '' comment '密码盐',
	role_id smallint unsigned not null default 0 comment '角色id',
	last_login_time int not null default 0 comment '上次登录时间',
	last_login_ip int not null default 0 comment '上次登录ip',
	add_time int not null default 0 comment '用户添加时间',
	login_number int unsigned not null default 0 comment '用户登录次数', 
	status tinyint not null default 0 comment '用户状态'
)engine = myisam  charset = utf8;

/**
 * 文章表
 */
create table tpcms_article(
	article_id int unsigned not null primary key auto_increment comment '文章id',
	cat_id smallint unsigned not null default 0 comment '分类id',
	title varchar(32) not null default '' comment '标题',
	titleimg varchar(128) not null default '' comment '标题图片',
	big_image varchar(128) not null default '' comment '文章大图',
	content	text not null comment '文章正文',
	author varchar(32) not null default '' comment '作者', 
	keywords varchar(128) not null default '' comment '关键词',
	synopsis text not null comment '内容简介',
	newstime int not null default 0 comment '发布时间',
	clicks mediumint unsigned not null default 0 comment '点击数',
	is_new tinyint not null default 0 comment '是否是最新文章',
	is_hot tinyint not null default 0 comment '是否是最热文章',
	is_recommend tinyint not null default 0 comment '是否是推荐文章',
	status tinyint not null default 0 comment '文章状态 0为审核 1为未审核 2为回收站'
)engine = myisam charset = utf8;

/**
 * 分类表
 */
create table tpcms_category(
	cate_id smallint unsigned not null primary key auto_increment comment '分类id',
	cate_name varchar(32) not null default '' comment '分类名称',
	parent_id smallint unsigned not null default 0 comment '上级分类id',
	cate_img varchar(128) not null default '' comment '分类图片',
	cate_thumb varchar(128) not null default '' comment '分类图片缩略图',
	description text not null comment '分类描述'
)engine = myisam charset = utf8;

/**
 * 权限表
 */
create table tpcms_auth(
	auth_id smallint unsigned not null primary key auto_increment comment '权限id',
	auth_name varchar(12) not null default '' comment '权限名称',
	parent_id smallint unsigned not null default 0 comment '上级权限类别',
	auth_url varchar(50) not null default '' comment '权限路由',
	status tinyint not null default 0 comment '权限状态，是否显示在左侧菜单列表里'
)engine = myisam charset = utf8;

/**
 * 角色表
 */
create table tpcms_role(
	role_id smallint unsigned not null primary key auto_increment comment '角色id',
	role_name varchar(12) not null default '' comment '角色名称',
	role_desc varchar(256) not null default '' comment '角色描述',
	auth_list varchar(1024) not null default '' comment '角色权限的列表'
)engine = myisam charset = utf8;

alter table `tpcms_article` add `big_image` varchar(128) not null default '' comment '文章大图' after `titleimg`;

insert into `tpcms_auth` (`auth_id`,`auth_name`,`parent_id`,`auth_url`,`status`) values ('1', '信息中心', '0', '', '1');
insert into `tpcms_auth` (`auth_id`,`auth_name`,`parent_id`,`auth_url`,`status`) values ('2', '文章管理', '1', 'Article/listing', '1');
insert into `tpcms_auth` (`auth_id`,`auth_name`,`parent_id`,`auth_url`,`status`) values ('3', '分类管理', '1', 'Category/listing', '1');
insert into `tpcms_auth` (`auth_id`,`auth_name`,`parent_id`,`auth_url`,`status`) values ('4', '未审核信息', '1', 'Article/checkListing', '1');
insert into `tpcms_auth` (`auth_id`,`auth_name`,`parent_id`,`auth_url`,`status`) values ('5', '添加文章', '1', 'Article/add', '0');
insert into `tpcms_auth` (`auth_id`,`auth_name`,`parent_id`,`auth_url`,`status`) values ('6', '用户中心', '0', '', '1');
insert into `tpcms_auth` (`auth_id`,`auth_name`,`parent_id`,`auth_url`,`status`) values ('7', '修改个人资料', '6', 'User/personalEdit', '1');
insert into `tpcms_auth` (`auth_id`,`auth_name`,`parent_id`,`auth_url`,`status`) values ('8', '用户管理', '6', 'User/listing', '1');
insert into `tpcms_auth` (`auth_id`,`auth_name`,`parent_id`,`auth_url`,`status`) values ('9', '角色管理', '6', 'Role/listing', '1');
insert into `tpcms_auth` (`auth_id`,`auth_name`,`parent_id`,`auth_url`,`status`) values ('10', '会员中心', '0', '', '1');
insert into `tpcms_auth` (`auth_id`,`auth_name`,`parent_id`,`auth_url`,`status`) values ('11', '会员列表', '10', 'Member/listing', '1');
insert into `tpcms_auth` (`auth_id`,`auth_name`,`parent_id`,`auth_url`,`status`) values ('12', '会员组管理', '10', 'MemberLevel/listing', '1');
insert into `tpcms_auth` (`auth_id`,`auth_name`,`parent_id`,`auth_url`,`status`) values ('13', '数据统计', '0', '', '1');
insert into `tpcms_auth` (`auth_id`,`auth_name`,`parent_id`,`auth_url`,`status`) values ('14', '数据管理', '0', '', '1');
insert into `tpcms_auth` (`auth_id`,`auth_name`,`parent_id`,`auth_url`,`status`) values ('15', '网站设置', '0', '', '1');

insert into `tpcms_role` (`role_id`,`role_name`,`role_desc`,`auth_list`) values ('1','管理员','拥有全部权限','1,2,3,4,5,6,7,8,9,10,11,12,13,14,15');