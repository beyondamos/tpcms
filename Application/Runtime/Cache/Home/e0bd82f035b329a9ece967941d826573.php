<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="Zh-cn">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link href="/Public/Mobile/css/normalize.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Mobile/css/basem.css" rel="stylesheet" type="text/css">
    <script src="/Public/Mobile/js/jquery-2.1.1.min.js"></script>
    <script src="/Public/Mobile/js/item.js"></script>
    <script src="/Public/Mobile/js/bootstrap.min.js"></script>
    <title></title>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
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

<div id="nav-left" class="nav-left">

    <a href="#" class="xnav-left-exit"><img src="/Public/Mobile/images/arr.png" alt=""/></a>

    <!--<img src="images/logo.png" alt=""/>-->
    <div class="nav-left-main">

        <a href="/">首页</a>
        <!--<a href="/home/m/wx_log.php">微信</a>-->
        <!--<a href="list.php">Portrait</a>
            <li><a href="list.php">Celebrity</a></li>
            <li><a href="list.php">Business</a></li>
            <li><a href="list.php">Family</a></li>
        <a href="list.php">Event</a>
        <a href="list.php">Travel</a>
        <a href="list.php">Nature</a>
        <a href="Contact.php">Contact</a>-->

        <!--<div class="nav-left-share">
            <a href="javascript:;"><img src="images/iconf.png" alt=""/></a>
            <a href="javascript:;"><img src="images/icont.png" alt=""/></a>
            <a href="javascript:;"><img src="images/icons.png" alt=""/></a>
            <a href="javascript:;"><img src="images/iconw.png" alt=""/></a>
        </div>-->
    </div>
</div>
<div class="head">
    <a href="#nav-left"><img src="/Public/Mobile/images/iconhead.png" /></a>
    <a href="javascript:;" style="visibility:hidden;"></a>
    <a href="index.php"><span><img src="/Public/Mobile/images/logo.png" alt="" /></span></a>
    <a href="index.php?id=15"><img src="/Public/Mobile/images/iconmore.png" /></a>
    <a href="index.php?id=16"><img src="/Public/Mobile/images/iconsearch.png" /></a>
</div>

<div class="cont">
    <!--头部选项开始-->
    <div class="headbt"></div>
    <div class="headbtn">
        <a href="/" id="btna" class="headbtnact" >全部</a>
        <?php if(is_array($nav_data)): $i = 0; $__LIST__ = $nav_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U('/'.$vo['nav_url']);?>" class="headbtnact" ><?php echo ($vo["nav_name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
    <!--头部选项结束-->

    <div class="boxcont">
        <?php if(is_array($new_data)): $i = 0; $__LIST__ = $new_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U($vo['url'].'/'.$vo['article_id']);?>">
                <div class="boxitem">
                    <div class="imglimt"><img src="<?php echo ($vo["titleimg"]); ?>" alt=""/></div>
                    <h2><?php echo ($vo["title"]); ?></h2>
                    <div class="praise">
                        <img src="/Public/Mobile/images/iconeye.png" alt=""/><span><?php echo ($vo["clicks"]); ?></span>
                        <img src="/Public/Mobile/images/iconstar.png" alt=""/><span>20</span>
                        <span><?php echo ($vo["newstime"]); ?></span>
                    </div>
                </div>
            </a>
    </div><?php endforeach; endif; else: echo "" ;endif; ?>
    <div id="Loading"></div>
</div>
</body>
</html>