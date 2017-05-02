<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link href="/Public/Home/css/base0405a.css" rel="stylesheet" type="text/css"/>
    <link rel="SHORTCUT ICON" href="<?php echo 'http://'.$_SERVER['HTTP_HOST']; ?>/favicon.ico">
    <!--[if lt IE 9]>
    <script src="/Public/Home/css/html5shiv.js"></script>
    <script src="/Public/Home/css/respond.min.js"></script>
    <![endif]-->
    <script src="/Public/Home/css/jquery-2.1.1.min.js"></script>
    <script src="/Public/Home/css/item.js"></script>
    <script src="/Public/Home/css/bootstrap.min.js"></script>
    <title>奉贤社圈网--奉贤网络社区平台，奉贤网络社交圈</title>
    <meta name="keywords" content="奉贤社圈网,奉贤社区网站,奉贤社交圈,奉贤朋友圈,奉贤兴趣爱好圈,奉贤活动圈"/>
    <meta name="description" content="奉贤社圈网,奉贤社区网站,奉贤社交圈,奉贤朋友圈,奉贤兴趣爱好圈,奉贤活动圈"/>
    <script>
        var _hmt = _hmt || [];
        (function() {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?236971c0a464e1b54ed9392a9f6a3d5a";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>
</head>
<body>

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

            <?php if(session('member_id')): ?><a href="<?php echo U('Member/logout');?>">[退出]</a>
                <span>&nbsp;</span>
                <a href=""><?php echo (session('member_name')); ?></a>
                <?php else: ?>
            <a href="<?php echo U('Member/register');?>">[注册]</a>
            <span>或</span>
            <a href="<?php echo U('Member/login');?>">[登录]</a>
            <span>请</span>
            <a href="<?php echo U('Member/wechatLogin');?>"><img src="/Public/Home/images/icon32_wx_logo.png" style="width: 20px;margin-top:6px;margin-right:10px;" id="wx_log"></a><?php endif; ?>


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



<div class="contbk">
    <div class="cont">
        <!--左侧内容区-->

        <!--左侧导航-->
        <!--左侧导航-->
<div class="docl" id="navId">
    <a href="<?php echo U('Custom/about');?>">关于社圈</a>
    <a href="<?php echo U('Custom/ad');?>">广告服务</a>
    <a href="<?php echo U('Custom/privacy');?>">隐私政策</a>
    <a href="<?php echo U('Custom/law');?>">法律声明</a>
    <a href="<?php echo U('Custom/joinUs');?>">加入我们</a>
</div>

        <div class="docr">
            <h1> 关于社圈</h1>
            <p>
            <p>
                社圈网（www.ishequan.cn），致力于分享生活乐趣与价值，为用户提供便捷的生活交流空间和体贴的本地服务，同时为商家提供线上线下无缝融合的互动营销解决方案。
            </p>
            <p>
                社圈网的核心用户群是18-55岁之间生活在奉贤本地的都市男女，他们热爱生活、爱分享、在旅行、生活、育儿、美食等方面，分享经验，相互帮助。他们热衷参加各种线上线下的活动。社圈网已经成为他们生活中不可或缺的部分。
            </p>
            <p>
                在为用户提供旅行、生活、育儿、美食等领域的个性化服务的同时，社圈网致力于为商家提供线上线下无缝融合的互动营销解决方案，建立了独特的社会化营销商业模式。同时将社交、本地和移动等功能紧密融合，为用户和客户提供了成熟的社会化信息服务平台。
            </p>
            <p>
                在社圈网，你可以随时和志趣相同的网友讨论旅行、生活、育儿、美食等方面的话题，并获得真诚的帮助。
            </p>        </p>
        </div>
    </div>
</div>

<script type="text/javascript">
    currentActive("navId","docl-act");
    function currentActive(navId,curClass){
        var navId=document.getElementById(navId);
        var links=navId.getElementsByTagName("a");
        var currentLink=window.location.href;
        for(var i=0;i<links.length;i++){
            var menuLink=links[i].href;
            if(currentLink.indexOf(menuLink)!=-1){
                links[i].className=curClass;
            }else{
                links[i].className="";
            }
        }
    }
</script>

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
        <div class="backtop"><img src="/Public/Home/images/backtop.png" alt="" id="backtop"/></div>
        Copyright@2016-2017&nbsp;www.ishequan.cn All Rights Reserved.
    </div>
</div>

<script>
    $('#backtop').click(function(){
        $('html,body').animate({scrollTop: '0px'}, 800);
    });
</script>


<script type="text/javascript">
    $(document).ready(function(){
        var obj = $('.docl');
        var offset = obj.offset();
        var topOffset = offset.top;
        var marginTop = obj.css("marginTop");
        var marginLeft = obj.css("marginLeft");
        $(window).scroll(function() {
            var scrollTop = $(window).scrollTop();
            if (scrollTop >= topOffset){
                obj.css({
                    marginTop: -160,
                    position: 'fixed',
                });
            }
            if (scrollTop < topOffset){

                obj.css({
                    marginTop: marginTop,
                    position: 'fixed',
                });
            }
        });
    });
</script></body>
</html>