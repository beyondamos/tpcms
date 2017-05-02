<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link href="/Public/Home/css/base0405a.css" rel="stylesheet" type="text/css"/>
    <link rel="SHORTCUT ICON" href="<?php echo 'http://'.$_SERVER['HTTP_HOST']; ?>/favicon.ico">
    <!--[if lt IE 9]>
    <script src="/Public/Home/js/html5shiv.js"></script>
    <script src="/Public/Home/js/respond.min.js"></script>
    <![endif]-->
    <script src="/Public/Home/js/jquery-2.1.1.min.js"></script>
    <script src="/Public/Home/js/item.js"></script>
    <script src="/Public/Home/js/bootstrap.min.js"></script>
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



<div class="cont">
    <!--左侧内容区-->
    <div class="contl">

        <!--面包屑导航-->
        <div class="navbred"><span>您当前的位置：</span><a href="/">首页</a>
        </div>
        <script>
            var stop=true;
            var s = 1;
            $(function(){
                $("#showmore").click(function(){
                    var  none = $("#none").html();
                    if(none != undefined){
                        stop = false;
                        $("#showmore").css('display','none');
                    }
                    if(stop==true){
                        stop=false;
                        $.post("<?php echo U('Index/showMore');?>", {start:s, },function(txt){
                            $("#showmore").before(txt);
                            stop=true;
                            s= s+1;
                        },"text");
                    }
                })
                $("#showmoreb").click(function(){
                    var  none = $("#none").html();
                    if(none != undefined){
                        stop = false;
                        $("#showmoreb").css('display','none');
                    }
                    if(stop==true){
                        stop=false;
                        $.post("<?php echo U('Index/showMore');?>", {start:s, },function(txt){
                            $("#showmoreb").before(txt);
                            stop=true;
                            s= s+1;
                        },"text");
                    }
                })
            });
        </script>

        <!--选项按钮-->
        <div class="headbtn">
            <a href="javascript:;" id="btna" class="headbtnact">最新</a>
            <a href="javascript:;" id="btnb">推荐</a>
        </div>

        <!--选项 最新-->
        <div class="boxcont" id="areaa">
            <?php if(is_array($new_data)): $i = 0; $__LIST__ = $new_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U($vo['url'].'/'.$vo['article_id']);?>"><div class="boxitem">
                <div class="imglimt"><img src="<?php echo ($vo["titleimg"]); ?>" alt="<?php echo ($vo["title"]); ?>" /></div>
                <h2><?php echo ($vo["title"]); ?></h2>
                <h3><?php echo ($vo["jianjie"]); ?></h3>
                <h4><img src="/Public/Home/images/iconclock.png" alt="" /><?php echo ($vo["newstime"]); ?></h4>
                <h5><img src="/Public/Home/images/iconeye.png" alt="" /><?php echo ($vo["clicks"]); ?></h5>
                <h5><img src="/Public/Home/images/iconstar.png" alt="" /><?php echo ($vo["zan"]); ?></h5>
            </div></a><?php endforeach; endif; else: echo "" ;endif; ?>
            <!--再显示10条-->
            <a href="javascript:" class="showmore" id="showmore">再显示10条新闻</a>
            <!--再显示10条-->

        </div>
        <!--选项 推荐-->
        <div class="boxcont" id="areab" style="display:none;">

            <?php if(is_array($recommed_data)): $i = 0; $__LIST__ = $recommed_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U($vo['url'].'/'.$vo['article_id']);?>"><div class="boxitem">
                <div class="imglimt"><img src="<?php echo ($vo["titleimg"]); ?>" alt="<?php echo ($vo["title"]); ?>" /></div>
                <h2><?php echo ($vo["title"]); ?></h2>
                <h3><?php echo mb_substr(strip_tags($vo['content']),0,30,'utf-8'); ?></h3>
                <h4><img src="/Public/Home/images/iconclock.png" alt="" /><?php echo ($vo["newstime"]); ?></h4>
                <h5><img src="/Public/Home/images/iconeye.png" alt="" /><?php echo ($vo["clicks"]); ?></h5>
                <h5><img src="/Public/Home/images/iconstar.png" alt="" />32</h5>
            </div></a><?php endforeach; endif; else: echo "" ;endif; ?>

            <!--再显示10条-->
            <a href="javascript:;" class="showmore" id="showmoreb">再显示10条新闻</a>

        </div>

    </div>

    <script type="text/javascript">

        $(document).ready(function(){
            var obj = $('.contr');
            var offset = obj.offset();
            var topOffset = offset.top;
            var leftOffset = 900;
            var marginTop = obj.css("marginTop");
            var marginLeft = obj.css("marginLeft");
            $(window).scroll(function() {
                var scrollTop = $(window).scrollTop();
                if (scrollTop >= topOffset){
                    obj.css({
                        marginTop: -140,
                        marginLeft: leftOffset,
                        position: 'fixed',
                    });
                }
                if (scrollTop < topOffset){

                    obj.css({
                        marginTop: marginTop,
                        marginLeft: marginLeft,
                        position: 'relative',
                    });
                }
            });
        });

    </script>

    <!--右侧列表模块-->
    
<!--右侧列表区-->
<div class="contr">
    <h1>大家都爱看</h1>
    <!--右侧列表区主推文章-->
    <div class="contlarta">
        <?php if(is_array($right_data)): $i = 0; $__LIST__ = array_slice($right_data,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U($vo['url'].'/'.$vo['article_id']);?>">
            <img src="<?php echo ($vo["titleimg"]); ?>" alt="" />
            <h2><?php echo mb_substr($vo['title'],0,30,'utf-8');?></h2>
            <h3><?php echo ($vo["newstime"]); ?></h3>
        </a><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
    <!--右侧列表区次要文章-->
    <div class="contlartb">
        <?php if(is_array($right_data)): $i = 0; $__LIST__ = array_slice($right_data,3,null,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U($vo['url'].'/'.$vo['article_id']);?>">
            <?php echo mb_substr($vo['title'],0,14,'utf-8');?><span><?php echo ($vo["newstime"]); ?></span>
        </a><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
</div>

</div>

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
</script>
</body>
</html>