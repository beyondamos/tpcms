<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="Zh-cn">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>商家后台管理系统</title>
    <link href="/Public/Business/css/basem.css" rel="stylesheet" type="text/css">
    <link href="/Public/Business/css/bootstrap.min.css" rel="stylesheet">
    <script src="/Public/Business/js/jquery-1.11.1.min.js"></script>
    <script src="/Public/Business/js/bootstrap.min.js"></script>
    <script src="/Public/Business/js/layer/layer.js"></script>
</head>

<body>

<!--标题栏-->
<div class="head">
    <a onclick="javascript:history.back(-1);" class="head-icon-l"><img src="/Public/Business/images/back.png" /></a>
    <span>商家后台管理系统</span>
    <a href="<?php echo U('Login/logout');?>" class="head-icon-r"><img src="/Public/Business/images/exit.png" /></a>
</div>
<div class="blank50"></div>


<div class="wrap">
    <!--头部信息区-->
    <div class="boxhead">
        <h1><?php echo ($business_data["business_name"]); ?></h1>
        <a href="">总活动数<br/><?php echo ($activity_count); ?></a>
        <a href="">总参与人数<br/><?php echo ($business_data["partake_count"]); ?></a>
        <a href="">总获奖人数<br/><?php echo ($business_data["win_count"]); ?></a>
    </div>

    <!--按钮区-->
    <div class="boxbtn">
        <a href="<?php echo U('Activity/index');?>"><img src="/Public/Business/images/iconevent.png" alt="" /><br/>活动列表
            <a href="<?php echo U('Partake/search');?>"><img src="/Public/Business/images/iconchange.png" alt="" /><br/>查询兑奖
    </div>
</div>

<!--页脚-->
<footer>
    <a href="tel:02160523954" >客服电话：021 - 6052 3954</a>
    <img src="images/logo.png" alt="" />
</footer>

</body>
</html>