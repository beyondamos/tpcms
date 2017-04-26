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
    <a href="<?php echo U('Index/showCategories');?>"><img src="/Public/Mobile/images/iconmore.png" /></a>
    <a href="<?php echo U('Search/index');?>"><img src="/Public/Mobile/images/iconsearch.png" /></a>
</div>

<div class="cont">
    <div class="headbt"></div>
    <div class="boxchan">
        <h1>频道</h1>
        <?php if(is_array($category_data)): $i = 0; $__LIST__ = array_slice($category_data,0,10,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U('/'.$vo['url']);?>" ><?php echo ($vo["cate_name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>

    <div class="boxchan">
        <h1>推荐</h1>
        <?php if(is_array($category_data)): $i = 0; $__LIST__ = array_slice($category_data,10,10,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U('/'.$vo['url']);?>" ><?php echo ($vo["cate_name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
</div>
</body>
</html>