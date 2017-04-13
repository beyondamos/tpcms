<?php
return array(
	'SHOW_PAGE_TRACE' 		=>	true, //页面追踪
	//'配置项'=>'配置值'
	'TMPL_L_DELIM'          =>  '<{',            // 模板引擎普通标签开始标记
    'TMPL_R_DELIM'          =>  '}>',            // 模板引擎普通标签结束标记
    'LOAD_EXT_CONFIG' 		=>  'db',			 //加载数据库配置
    'UPLOAD_IMAGE_DIR'	    =>  '/Public/Upload/image/',	//上传图片的路径
    'UPLOAD_THUMB_DIR' 		=>  '/Public/Upload/thumbnail/',      //缩略图的路径

    /* URL设置 */
    'URL_CASE_INSENSITIVE'  =>  false,   // 默认false 表示URL区分大小写 true则表示不区分大小写
    'URL_MODEL'             =>  1,       // URL访问模式,pathinfo模式


    // 允许访问的模块列表
	'MODULE_ALLOW_LIST'    =>    array('Home','Admin'),
	'DEFAULT_MODULE'       =>    'Home',  // 默认模块

);