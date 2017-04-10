create database `tpcms` charset utf8;
/**
 * 用户表
 */
create table tpcms_user(
	user_id int unsigned not null primary key auto_increment comment '用户id',
	user_name varchar(32) not null default '' comment '用户名',
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


