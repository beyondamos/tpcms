<?php
return array(
	// 'SHOW_PAGE_TRACE' 		=>	true, //页面追踪
	'LOAD_EXT_CONFIG' 		=>  'db',			 //加载数据库配置
	//'配置项'=>'配置值'
    'TMPL_L_DELIM'    =>    '<{',
    'TMPL_R_DELIM'    =>    '}>',

    // 允许访问的模块列表
	'MODULE_ALLOW_LIST'    =>    array('Home','Admin','Business','Member','Wechat'),
	'DEFAULT_MODULE'       =>    'Home',  // 默认模块

	/* URL设置 */
    'URL_CASE_INSENSITIVE'  =>  false,   // 默认false 表示URL区分大小写 true则表示不区分大小写
    'URL_MODEL'             =>  2,       // URL访问模式,pathinfo模式


	'UPLOAD' => './Public/Upload/',  //上传图片的路径

	'Wechat' => array(
		'token'=>'ishequan', //填写你设定的key
		'encodingaeskey'=>'XOKWvCaqcZFxH3Dy8l8Ky7PDOsDhIhUuUjCyegTrvGT', //填写加密用的EncodingAESKey
		'appid'=>'wx6b02d891922e20f3', //填写高级调用功能的app id, 请在微信开发模式后台查询
		'appsecret'=>'5442fd3ad6d5cc081569d5e13c65fb92' //填写高级调用功能的密钥
	),
);