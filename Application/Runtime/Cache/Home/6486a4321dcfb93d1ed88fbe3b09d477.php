<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="renderer" content="webkit">
    <title>房产信息</title>
    <link href="/Public/home/css/base.css" rel="stylesheet" type="text/css"/>
    <link href="/Public/home/css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="/Public/home/js/html5shiv.js"></script>
    <script src="/Public/home/js/respond.min.js"></script>
    <![endif]-->
    <script src="/Public/home/js/jquery-2.1.1.min.js"></script>
    <script src="/Public/home/js/item.js"></script>
    <script src="/Public/home/js/bootstrap.min.js"></script>
</head>
<body>

    
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
        <!--左侧内容区-->
        <div class="contl">

            <!--面包屑导航-->
            <div class="navbred"><span>您当前的位置：</span><a href="/">首页</a>&gt;<span>房产</span></div>


            <!--选项按钮-->
            <div class="headbtn">
                <a href="javascript:;" id="btna" class="headbtnact">最新</a>
                <a href="javascript:;" id="btnb">推荐</a>
            </div>

            <!--选项 最新-->
            <div class="boxcont" id="areaa">
                <?php if(is_array($new_data)): $i = 0; $__LIST__ = $new_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Home/Fangchan/detail', array('id' => $vo['id']));?>"><div class="boxitem">
                        <div class="imglimt"><img src="<?php echo ($vo["titleimg"]); ?>" alt="" /></div>
                        <h2><?php echo ($vo["name"]); ?></h2>
                        <h3><span><?php echo ($vo["housetype"]); ?></span><span><?php echo ($vo["floor"]); ?></span><span><?php echo ($vo["direction"]); ?></span><span>建筑年代：<?php echo ($vo["builttime"]); ?></span></h3>
                        <h4><span><?php echo ($vo["address"]); ?></span></h4>
                        <dl><dt><?php echo ($vo["total"]); ?><span>万</span></dt><dd><?php echo ($vo["unitprice"]); ?><span>元/平米</span></dd></dl>
                        <dl><dt><?php echo ($vo["area"]); ?><span>平米</span></dt><dd>建筑面积</dd></dl>
                    </div></a><?php endforeach; endif; else: echo "" ;endif; ?>  

                <!--再显示10条-->
                <?php echo ($show); ?>

            </div>


            <!--选项 推荐-->
            <div class="boxcont" id="areab" style="display:none;">
                <?php if(is_array($recommend_data)): $i = 0; $__LIST__ = $recommend_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Home/Fangchan/detail');?>"><div class="boxitem">
                    <div class="imglimt"><img src="<?php echo ($vo["titleimg"]); ?>" alt="" /></div>
                    <h2><?php echo ($vo["name"]); ?></h2>
                    <h3><span><?php echo ($vo["housetype"]); ?></span><span><?php echo ($vo["floor"]); ?></span><span><?php echo ($vo["direction"]); ?></span><span>建筑年代：<?php echo ($vo["builttime"]); ?></span></h3>
                    <h4><span><?php echo ($vo["address"]); ?></span></h4>
                    <dl><dt><?php echo ($vo["total"]); ?><span>万</span></dt><dd><?php echo ($vo["unitprice"]); ?><span>元/平米</span></dd></dl>
                    <dl><dt><?php echo ($vo["area"]); ?><span>平米</span></dt><dd>建筑面积</dd></dl>
                </div></a><?php endforeach; endif; else: echo "" ;endif; ?>  
                <!--再显示10条-->
                <?php echo ($show); ?>

            </div>

        </div>


        <!--右侧列表区-->
        <div class="contr">
            <h1>房产推荐榜</h1>

            <!--右侧列表区主推文章-->
            <div class="contlarta">

                <?php if(is_array($ranking_list)): $i = 0; $__LIST__ = $ranking_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Home/Fangchan/detail', array('id' => $vo['id']));?>">
                        <img src="<?php echo ($vo["titleimg"]); ?>" alt="" />
                        <h2><?php echo ($vo["name"]); ?></h2>
                        <h6><span><?php echo ($vo["total"]); ?>万</span><span><?php echo ($vo["area"]); ?>平方</span></h6>
                        <h3><span><?php echo ($vo["address"]); ?></span></h3>
                    </a><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
    </div>

    
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