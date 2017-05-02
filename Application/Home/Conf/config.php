<?php
return array(
	//'配置项'=>'配置值'
    'TMPL_PARSE_STRING'  => array(
        '__JS__'     => '/Public/Home/js',
        '__CSS__'     => '/Public/Home/css',
        '__FONTS__'     => '/Public/Home/fonts',
        '__IMG__'     => '/Public/Home/images',
    ),
    'URL_ROUTER_ON'         =>  true,   // 是否开启URL路由
    'URL_ROUTE_RULES' => array( //定义路由规则
        'Custom/about'  => 'Custom/about',
        'Custom/joinUs'  => 'Custom/joinUs',
        'Custom/privacy'  => 'Custom/privacy',
        'Custom/ad'  => 'Custom/ad',
        'Custom/law'  => 'Custom/law',
        'Search/index'  => 'Search/index',
        'Member/login'  => 'Member/login',
        'Member/register'  => 'Member/register',
        'Index/showMore'    => 'Index/showMore',
        'Member/wechatLogin'    => 'Member/wechatLogin',
        'Member/wechatLoginCallback'    => 'Member/wechatLoginCallback',
        'Member/logout'    => 'Member/logout',
        'Index/index'   => 'Index/index',
        'Article/zan'   => 'Article/zan',
        'Index/showCategories'   => 'Index/showCategories',
        'Article/dropDown'   => 'Article/dropDown',
//		'/^blog\/(\d+)$/'        => 'Blog/read?id=:1',
//		'/^blog\/(\d+)\/(\d+)$/' => 'Blog/achive?year=:1&month=:2',
//		'/^blog\/(\d+)_(\d+)$/'  => 'blog.php?id=:1&page=:2',
        '/^([a-zA-Z]+\/)+(\d+)$/'	=> 'Article/detail?article_id=:2',
        '/^([a-zA-Z]+\/)*([a-zA-Z]+)$/'	=> 'Article/listing?cate_name=:2',
    ),
);