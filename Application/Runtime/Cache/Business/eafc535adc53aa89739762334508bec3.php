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
    <a href="<?php echo U('Index/index');?>" class="head-icon-l"><img src="/Public/Business/images/back.png" /></a>
    <span>活动列表</span>
    <a href="<?php echo U('Login/logout');?>" class="head-icon-r"><img src="/Public/Business/images/exit.png" /></a>
</div>
<div class="blank50"></div>
<div class="wrapb">
    <div class="itemlist">
        <ul>
            <a href="javascript:;"><li>
                <span>序号</span>
                <span>活动名称</span>
                <span>参与人数</span>
                <span>获奖人数</span>
                <span>兑奖人数</span>
            </li></a>
        </ul>
        <ul>
            <?php $i = 1 ;foreach($list as $val):?>
            <a href="detail.php?activity_id=<?php echo $val['activity_id'];?>"><li>
                <span><?php echo $i;?></span>
                <span><?php echo $val['activity_name'];?></span>
                <span><?php echo $val['partake_count'];?></span>
                <span><?php echo $val['win_count'];?></span>
                <span><?php echo $val['cashprize_count'];?></span>
            </li></a>
            <?php $i++; endforeach;?>
        </ul>
    </div>
</div>
<!--页脚-->

<footer>
    <a href="tel:02160523954" >客服电话：021 - 6052 3954</a>
    <img src="images/logo.png" alt="" />
</footer>

</body>
</html>