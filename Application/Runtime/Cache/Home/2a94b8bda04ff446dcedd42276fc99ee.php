<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="renderer" content="webkit">
    <title><?php echo ($site_title); ?></title>
    <meta name="keywords" content="<?php echo ($site_keywords); ?>"/>
    <meta name="description" content="<?php echo ($site_desc); ?>"/>
    <link href="/Public/Home/css/base.css" rel="stylesheet" type="text/css"/>
    <link href="/Public/Home/css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="/Public/Home/js/html5shiv.js"></script>
    <script src="/Public/Home/js/respond.min.js"></script>
    <![endif]-->
    <script src="/Public/Home/js/jquery-2.1.1.min.js"></script>
    <script src="/Public/Home/js/bootstrap.min.js"></script>
</head>
<body style="background-color:#F2F2F2;">

<!--头部模块-->

<!--头部 登录 注册区-->
<div class="nav-top">
    <div class="nav-top-center">
        <div class="nav-top-left">
            <img src="/Public/Home/images/iconphone.png" alt=""/>
            <a href="javascript:;" class="wx">手机网<i><img src="/Public/Home/images/rwmsj.png" alt="" /></i></a>
            <!--<a href="javascript:;">网站导航</a>-->
        </div>
        <div class="nav-top-right">

            <?php if(session('member_id')): ?><a href="<?php echo U('Member/Login/logout');?>">[退出]</a>
                <span>&nbsp;</span>
                <a href=":U('Member/Index/index')"><?php echo (session('member_name')); ?></a>
                <?php else: ?>
            <!--<a href="<?php echo U('Member/register');?>">[注册]</a>-->
            <!--<span>或</span>-->
            <!--<a href="<?php echo U('Member/login');?>">[登录]</a>-->
            <!--<span>请</span>-->
            <a href="<?php echo U('Member/Login/wechatLogin');?>"><img src="/Public/Home/images/icon32_wx_logo.png" style="width: 20px;margin-top:6px;margin-right:10px;" id="wx_log"></a>
                <span>微信登录</span><?php endif; ?>


            <!--<a href="/home/qq_log.php"><img src="/Public/Home/images/qq.png" style="width: 15px;margin-top:6px;margin-right:10px;" id="wx_log"></a>-->
        </div>
    </div>
</div>

<!--logo 搜索区-->
<div class="nav-topb">
    <div class="nav-topb-center">
        <div class="nav-topb-left">
            <a href="/"><img src="/Public/Home/images/logo.png" alt=""/><span>奉贤</span></a>
        </div>
        <div class="nav-topb-right">
            <div class="serh">
                <form action="<?php echo U('Search/index');?>" method="post">
                    <input type="text" name="search" placeholder="请输入搜索内容">
                    <button name="ss" type="submit" value=""><img src="/Public/Home/images/iconsearch.png" /></button>
                </form>
            </div>
        </div>
    </div>
</div>

<!--导航区-->
<div class="nav-topc">
    <div class="nav-topc-center">
        <div class="nav-topc-left">
            <a href="/">首页</a>
            <?php if(is_array($nav_data)): $i = 0; $__LIST__ = $nav_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U('/'.$vo['nav_url']);?>"><?php echo ($vo["nav_name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
</div>



<div class="cont">

    <!--面包屑导航-->
    <div class="navbred"><span>您当前的位置：</span><a href="/">首页</a></div>

    <!--第一块 内容-->
    <div class="contlr">
        <!--第一块左侧-->
        <div class="contlb">
            <!--轮播图 城市生活向导-->
            <div class="contlba-news">
                <div class="contlba-img"><iframe allowtransparency="true" frameborder="0" width="385" height="96" scrolling="no" src="//tianqi.2345.com/plugin/widget/index.htm?s=1&z=3&t=0&v=0&d=2&bd=0&k=000000&f=&q=1&e=1&a=1&c=60298&w=385&h=96&align=left"></iframe></div>
                <!--轮播图-->
                <div class="carousel slide" id="carousel-example"  data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li class="active" data-slide-to="0" data-target="#carousel-example"></li>
                        <li data-slide-to="1" data-target="#carousel-example"></li>
                        <li data-slide-to="2" data-target="#carousel-example"></li>
                        <li data-slide-to="3" data-target="#carousel-example"></li>
                    </ol>
                    <div class="carousel-inner">
                        <?php if(is_array($pc_recommend_data)): $k = 0; $__LIST__ = array_slice($pc_recommend_data,0,4,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><div class="item <?php if($k == 1): ?>active<?php endif; ?>"><a href="<?php echo U($vo['url'].'/'.$vo['article_id']);?>"><img alt="" src="<?php echo ($vo["titleimg"]); ?>" /></a></div><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                    <a class="left carousel-control" href="#carousel-example" data-slide="prev"></a>
                    <a class="right carousel-control" href="#carousel-example" role="button" data-slide="next"></a>
                </div>
                <!--轮播图 end-->
                <h1>城市生活向导</h1>
                <?php if(is_array($pc_new_data)): $i = 0; $__LIST__ = array_slice($pc_new_data,0,7,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U($vo['url'].'/'.$vo['article_id']);?>"><h2><span>[<?php echo ($vo["cate_name"]); ?>]</span><?php echo mb_substr($vo['title'],0,18,'utf-8');?></h2></a><?php endforeach; endif; else: echo "" ;endif; ?>
            </div><!--城市生活向导 end-->

            <!--城市生活向导 右侧-->
            <div class="contlbar-news">
                <?php if(is_array($pc_recommend_data)): $i = 0; $__LIST__ = array_slice($pc_recommend_data,4,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U($vo['url'].'/'.$vo['article_id']);?>"><h4><?php echo ($vo["title"]); ?></h4><h5><?php echo mb_substr(strip_tags(htmlspecialchars_decode($vo['content'])),0,70,'utf-8'); ?></h5></a><?php endforeach; endif; else: echo "" ;endif; ?>

                <?php if(is_array($pc_new_data)): $i = 0; $__LIST__ = array_slice($pc_new_data,7,6,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U($vo['url'].'/'.$vo['article_id']);?>"><h2><span>[<?php echo ($vo["cate_name"]); ?>]</span><?php echo mb_substr($vo['title'],0,28,'utf-8');?></h2></a><?php endforeach; endif; else: echo "" ;endif; ?>

                <hr>
                <?php if(is_array($pc_new_data)): $i = 0; $__LIST__ = array_slice($pc_new_data,13,5,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U($vo['url'].'/'.$vo['article_id']);?>"><h2><span>[<?php echo ($vo["cate_name"]); ?>]</span><?php echo mb_substr($vo['title'],0,28,'utf-8');?></h2></a><?php endforeach; endif; else: echo "" ;endif; ?>
            </div><!--城市生活向导 右侧 end-->

        </div><!--第一块左侧 end-->


        <!--第一块右侧-->
        <div class="contrb">

            <!--我要发帖-->
            <div class="contrb-pub">
                <h1>我要投稿</h1>
                <a href="topicpre.php">全民爆料</a>
            </div><!--我要发帖 end-->


            <!--生活馆专享-->
            <div class="contrb-lb">

                <h1>生活馆专享</h1>

                <div class="item"><a href="<?php echo ($life_adv["adv_url"]); ?>"><img alt="" src="<?php echo ($life_adv["adv_img"]); ?>" width="320" height="100"/></a></div>

            </div><!--生活馆专享 end-->

            <!--今日热点-->
            <div class="contrb-news">

                <h1>招聘信息</h1>
                <?php if(is_array($pc_hot_data)): $i = 0; $__LIST__ = array_slice($pc_hot_data,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U($vo['url'].'/'.$vo['article_id']);?>"><img src="<?php echo ($vo["titleimg"]); ?>" alt="" /><h2><?php echo mb_substr($vo['title'],0,14,'utf-8');?></h2><h3><?php echo mb_substr(strip_tags(htmlspecialchars_decode($vo['content'])),0,16,'utf-8'); ?></h3></a><?php endforeach; endif; else: echo "" ;endif; ?>
                <?php if(is_array($pc_hot_data)): $i = 0; $__LIST__ = array_slice($pc_hot_data,1,5,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U($vo['url'].'/'.$vo['article_id']);?>"><h2><?php echo mb_substr($vo['title'],0,24,'utf-8');?></h2></a><?php endforeach; endif; else: echo "" ;endif; ?>
            </div><!--今日热点 end-->
        </div><!--第一块右侧 end-->
    </div>	<!--第一块 内容 end-->


    <!--广告-->
    <div class="advi">
        <a href="<?php echo ($adv_upper["adv_url"]); ?>"><img src="<?php echo ($adv_upper["adv_img"]); ?>" alt="" height="75"/></a>
    </div><!--广告 end-->


    <!--第二块 内容-->
    <div class="contii">

        <h1>我们爱生活</h1>

        <div class="contiiimg">
            <?php if(is_array($pc_life_data)): $i = 0; $__LIST__ = array_slice($pc_life_data,0,4,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U($vo['url'].'/'.$vo['article_id']);?>"><img src="<?php echo ($vo["titleimg"]); ?>" alt="" /><span><?php echo mb_substr($vo['title'],0,10,'utf-8');?></span></a><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>

        <div class="contiimd">
            <?php if(is_array($pc_life_data)): $i = 0; $__LIST__ = array_slice($pc_life_data,4,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U($vo['url'].'/'.$vo['article_id']);?>"><img src="<?php echo ($vo["titleimg"]); ?>" alt="" /><span><?php echo mb_substr($vo['title'],0,10,'utf-8');?></span></a><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>

        <div class="contiiimg">
            <?php if(is_array($pc_life_data)): $i = 0; $__LIST__ = array_slice($pc_life_data,5,4,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U($vo['url'].'/'.$vo['article_id']);?>"><img src="<?php echo ($vo["titleimg"]); ?>" alt="" /><span><?php echo mb_substr($vo['title'],0,10,'utf-8');?></span></a><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div><!--第二块 内容 end-->


    <!--广告-->
    <div class="advi">
        <a href="<?php echo ($adv_middle["adv_url"]); ?>"><img src="<?php echo ($adv_middle["adv_img"]); ?>" alt="" height="75"/></a>
    </div><!--广告 end-->

    <!--第三块 内容-->
    <div class="contiii">
        <div class="contiiil">
            <h1>玩圈子</h1>
            <?php if(is_array($pc_quanzi_data)): $i = 0; $__LIST__ = $pc_quanzi_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U($vo['url'].'/'.$vo['article_id']);?>"><img src="<?php echo ($vo["titleimg"]); ?>" alt="" /><h2><?php echo mb_substr($vo['title'],0,16,'utf-8');?></h2><h3><?php echo mb_substr(strip_tags(htmlspecialchars_decode($vo['content'])),0,34,'utf-8'); ?></h3></a><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>

        <div class="contiiim">

            <h1>全民运动</h1>
            <?php if(is_array($pc_yundong_data)): $i = 0; $__LIST__ = $pc_yundong_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U($vo['url'].'/'.$vo['article_id']);?>"><img src="<?php echo ($vo["titleimg"]); ?>" alt="" /><h2><?php echo mb_substr($vo['title'],0,18,'utf-8');?></h2><h3><?php echo mb_substr(strip_tags(htmlspecialchars_decode($vo['content'])),0,50,'utf-8'); ?></h3></a><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>

        <div class="contiiir">
            <h1>旅行度假</h1>
            <?php if(is_array($pc_lvxing_data)): $i = 0; $__LIST__ = array_slice($pc_lvxing_data,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U($vo['url'].'/'.$vo['article_id']);?>"><img src="<?php echo ($vo["titleimg"]); ?>" alt="" /><h2><?php echo mb_substr($vo['title'],0,16,'utf-8');?></h2><h3><?php echo mb_substr(strip_tags(htmlspecialchars_decode($vo['content'])),0,34,'utf-8'); ?></h3></a><?php endforeach; endif; else: echo "" ;endif; ?>
            <?php if(is_array($pc_lvxing_data)): $i = 0; $__LIST__ = array_slice($pc_lvxing_data,1,8,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U($vo['url'].'/'.$vo['article_id']);?>"><h2><span></span><?php echo mb_substr($vo['title'],0,20,'utf-8');?></h2></a><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div><!--第三块 内容 end-->

    <!--广告-->
    <div class="advi">
        <a href="<?php echo ($adv_lower["adv_url"]); ?>"><img src="<?php echo ($adv_lower["adv_img"]); ?>" alt="" height="75"/></a>
    </div><!--广告 end-->

    <!--第四块 内容-->
    <div class="contiiii">

        <h1>热门推荐</h1>

        <div class="contiiiil">
            <?php if(is_array($pc_shangjia_data)): $i = 0; $__LIST__ = array_slice($pc_shangjia_data,0,4,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U($vo['url'].'/'.$vo['article_id']);?>"><img src="<?php echo ($vo["titleimg"]); ?>" alt="" /></a><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>

        <div class="contiiiir">
            <?php if(is_array($pc_shangjia_data)): $i = 0; $__LIST__ = array_slice($pc_shangjia_data,4,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U($vo['url'].'/'.$vo['article_id']);?>"><img src="<?php echo ($vo["titleimg"]); ?>" alt="" /></a><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div><!--第四块 内容 end-->

    <!--友情链接-->
    <div class="contfrl">
        <h1>友情链接</h1>
        <?php if(is_array($friendlink_data)): $i = 0; $__LIST__ = $friendlink_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["url_name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>

    </div><!--友情链接 end-->
</div>
<div style="clear:both;"></div>

<!--底部模块-->

<div class="nav-footb col-sm-12 padlr">
    <div class="navfoot-center">
        <a href="<?php echo U('Custom/about');?>">关于社圈</a>&nbsp;|
        <a href="<?php echo U('Custom/joinUs');?>">加入我们</a>&nbsp;|
        <a href="<?php echo U('Custom/privacy');?>">隐私政策</a>&nbsp;|
        <a href="<?php echo U('Custom/ad');?>">广告服务</a>&nbsp;|
        <a href="<?php echo U('Custom/law');?>">法律声明</a>
    </div>
    <div class="navfootb-center">
        Copyright@2016-2017&nbsp;www.ishequan.cn All Rights Reserved.
    </div>
</div>
<script>
    (function(){
        var src = (document.location.protocol == "http:") ? "http://js.passport.qihucdn.com/11.0.1.js?bcc5ec07e29939b4c6dc2a929bcc0e9b":"https://jspassport.ssl.qhimg.com/11.0.1.js?bcc5ec07e29939b4c6dc2a929bcc0e9b";
        document.write('<script src="' + src + '" id="sozz"><\/script>');
    })();
</script>

</body>
</html>