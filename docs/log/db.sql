-- linzequan 20171129
-- 添加内容分类表
create table `curio_clazz` (
    `id` int not null auto_increment comment '自增id',
    `name_en` varchar(255) comment '分类英文',
    `name_tc` varchar(255) comment '分类繁体',
    `parent_id` int default 0 comment '父级分类id',
    `sort` int(8) default 0 comment '排序。数值越大，越靠前',
    primary key (`id`)
) engine = myisam character set utf8 collate utf8_general_ci comment = '内容分类表';


-- linzequan 20171129
-- 添加内容表
create table `curio_content` (
    `id` int not null auto_increment comment '自增id',
    `title_en` varchar(255) comment '名称英文',
    `title_tc` varchar(255) comment '名称繁体',
    `clazz_id` int default 0 comment '分类id',
    `pic` varchar(255) comment '封面图',
    `content_en` longtext comment '内容英文',
    `content_tc` longtext comment '内容繁体',
    `author` varchar(64) comment '作者',
    `create_time` int comment '创建时间戳',
    `update_time` int comment '更新时间戳',
    `create_userid` int comment '创建者id',
    `update_userid` int comment '更新者id',
    primary key (`id`)
) engine = myisam character set utf8 collate utf8_general_ci comment = '内容表';


-- linzequan 20171129
-- 添加轮播图表
create table `curio_banner` (
    `id` int not null auto_increment comment '自增id',
    `url_en` varchar(512) comment '链接英文',
    `url_tc` varchar(512) comment '链接繁体',
    `pic` varchar(255) default '' comment '图片',
    `sort` int(8) default 0 comment '排序。数值越大，越靠前',
    primary key(`id`)
) engine = myisam character set utf8 collate utf8_general_ci comment = '首页轮播图';


-- linzequan 20171129
-- 添加图录分类表
create table `curio_pic_clazz` (
    `id` int not null auto_increment comment '自增id',
    `name_en` varchar(255) comment '分类英文',
    `name_tc` varchar(255) comment '分类繁体',
    `parent_id` int default 0 comment '父级分类id',
    `sort` int(8) default 0 comment '排序。数值越大，越靠前',
    primary key (`id`)
) engine = myisam character set utf8 collate utf8_general_ci comment = '图录分类表';


-- linzequan 20171129
-- 添加图录内容表
create table `curio_pic_content` (
    `id` int not null auto_increment comment '自增id',
    `title_en` varchar(255) comment '名称英文',
    `title_tc` varchar(255) comment '名称繁体',
    `clazz_id` int comment '分类id',
    `pic` varchar(512) comment '图片json',
    `num` varchar(255) comment '标号',
    `prize_en` varchar(255) comment '价格英文',
    `prize_tc` varchar(255) comment '价格繁体',
    `size_en` varchar(255) comment '尺寸英文',
    `size_tc` varchar(255) comment '尺寸繁体',
    `standard_en` varchar(512) comment '规格英文',
    `standard_tc` varchar(512) comment '规格中文',
    `descript_en` longtext comment '描述英文',
    `descript_tc` longtext comment '描述繁体',
    `sort` int(8) default 0 comment '排序。数值越大，越靠前',
    primary key (`id`)
) engine = myisam character set utf8 collate utf8_general_ci comment = '图录内容表';


-- linzequan 20171129
-- 添加站内通知表
create table `curio_notice` (
    `id` int not null auto_increment comment '自增id',
    `content_en` varchar(512) comment '站内通知英文',
    `content_tc` varchar(512) comment '站内通知繁体',
    `url_en` varchar(512) comment '跳转链接英文',
    `url_tc` varchar(512) comment '跳转链接繁体',
    `sort` int(8) default 0 comment '排序。数值越大，越靠前',
    primary key (`id`)
) engine = myisam character set utf8 collate utf8_general_ci comment = '站内通知表';


-- linzequan 20171202
-- 添加默认菜单栏
INSERT INTO `sys_menu` VALUES (1,0,'内容分类','/adm/clazz',5,'class',1511833914,1512183403,1,1),(2,0,'内容管理','/adm/content',5,'news',1511833938,1512183433,1,1),(3,0,'轮播图管理','/adm/banner',5,'banner',1511833978,1512146899,1,1),(4,0,'图录分类','/adm/pic_clazz',5,'pic_clazz',1511834061,1512148977,1,1),(5,0,'图录管理','/adm/pic_content',5,'pic_content',1511834167,1512149375,1,1),(6,0,'站内通知','/adm/notice',5,'notice',1511834186,NULL,1,NULL);


-- linzequan 20171202
-- 内容管理表添加描述字段
alter table `curio_content` add `descript_en` varchar(1024) default '' comment '描述英文';
alter table `curio_content` add `descript_tc` varchar(1024) default '' comment '描述繁体';


-- linzequan 20171203
-- 图录表添加创建时间、更新时间字段
alter table `curio_pic_content` add `create_time` int comment '创建时间';
alter table `curio_pic_content` add `update_time` int comment '更新时间';
