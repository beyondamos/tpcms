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
    <a href="list.php" class="head-icon-l"><img src="/Public/Business/images/back.png" /></a>
    <span>活动详情</span>
    <a href="index.php?act=logout" class="head-icon-r"><img src="/Public/Business/images/exit.png" /></a>
</div>
<div class="blank50"></div>

<div class="wrapb">
    <div class="detailist">
        <ul>
            <a href="javascript:;"><li>
                <span>用户名</span>
                <span>兑奖凭证</span>
                <span>是否兑奖</span>
                <span>兑奖时间</span>
                <span>操作</span>
            </li></a>
        </ul>
        <ul>
            <?php foreach($activity_info as $val):?>
            <li>
                <span><?php echo $val['user_name'];?></span>
                <span><?php echo $val['voucher'];?></span>
                <span><?php echo $val['business_confirm'] == 0 ? '未兑奖' : '已经兑奖';?></span>
                <span><?php echo $val['confirm_time'] == 0 ? '': date('Y-m-d H:i:s',$val['confirm_time']);?></span>
                <?php if($val['business_confirm'] == 0):?>
                <span><a class="btn btn-default btn-xs" href="detail.php?activity_id=<?php echo $_GET['activity_id']?>&id=<?php echo $val['id'];?>" role="button">确认兑奖</a></span>
                <?php else:?>
                <span></span>
                <?php endif;?>
            </li>
            <?php endforeach;?>
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