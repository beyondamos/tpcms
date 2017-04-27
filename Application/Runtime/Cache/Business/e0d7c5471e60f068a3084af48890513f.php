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
    <span>查询兑奖</span>
    <a href="<?php echo U('Login/logout');?>" class="head-icon-r"><img src="/Public/Business/images/exit.png" /></a>
</div>
<div class="blank50"></div>



<div class="wrapb">
    <!--查询-->
    <div class="boxseh">
        <form action="" method="post">
            <select name="activity_name" class="selseh">
                <?php foreach($activities as $val):?>
                <option value="<?php echo $val['activity_id'];?>"><?php echo $val['activity_name'];?></option>
                <?php endforeach;?>
            </select>
            <input type="text" name="plate_number" class="inseh" placeholder="请输入" />
            <input type="submit" name="submit" value="查询" id="test" class="inbtn" />
        </form>
    </div>

    <!--查询结果-->
    <div class="detailist">
        <ul>
            <li>
                <span>用户名</span>
                <span>兑奖凭证</span>
                <span>是否兑奖</span>
                <span>兑奖时间</span>
                <span>操作</span>
            </li>
        </ul>
        <?php foreach($user_info as $val):?>
        <ul>
            <li>
                <span><?php echo $val['user_name'];?></span>
                <span><?php echo $val['voucher'];?></span>
                <span><?php echo $val['business_confirm'] == 1 ? '已经兑奖' : '未兑奖' ;?></span>
                <span><?php echo $val['confirm_time'] == 0 ? '&nbsp;' : date('m-d H:i:s',$val['confirm_time']);?></span>
                <?php if($val['business_confirm'] == 0):?>
                <span><a class="btn btn-default btn-xs" href="search.php?activity_id=<?php echo $activity_name;?>&id=<?php echo $val['id'];?>" role="button">确认兑奖</a></span>
                <?php else:?>
                <span></span>
                <?php endif;?>
            </li>
        </ul>
        <?php endforeach;?>
    </div>
</div>

<!--页脚-->
<footer>
    <a href="tel:02160523954" >客服电话：021 - 6052 3954</a>
    <img src="images/logo.png" alt="" />
</footer>


</body>
</html>