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
            <select name="activity_id" class="selseh">
                <?php if(is_array($activity_data)): $i = 0; $__LIST__ = $activity_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["activity_id"]); ?>"><?php echo ($vo["activity_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
            <input type="text" name="voucher" class="inseh" placeholder="请输入" />
            <input type="submit" name="submit" value="查询" id="test" class="inbtn" />
        </form>
    </div>

    <!--查询结果-->
    <div class="detailist">
        <ul>
            <li>
                <span>用户名</span>
                <span>兑奖凭证</span>
                <span>兑奖时间</span>
                <span>操作</span>
            </li>
        </ul>

        <?php if(is_array($partake_data)): $i = 0; $__LIST__ = $partake_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><ul>
            <li>
                <span><?php echo ($vo["user_name"]); ?></span>
                <span><?php echo ($vo["voucher"]); ?></span>

                <span><?php echo $vo['confirm_time'] == 0 ? '' : date('Y-m-d H:i:s', $vo['confirm_time']); ?></span>
                <span>
                <?php if($vo['business_confirm'] == 0): ?><a class="btn btn-default btn-xs" href="<?php echo U('Partake/confirm', array('id' => $vo['id'], 'activity_id'=> $vo['activity_id']));?>" role="button">确认兑奖</a>
                    <?php else: ?>已兑奖<?php endif; ?>
                </span>
            </li>
        </ul><?php endforeach; endif; else: echo "" ;endif; ?>

    </div>
</div>

<!--页脚-->
<footer>
    <a href="tel:02160523954" >客服电话：021 - 6052 3954</a>
    <img src="images/logo.png" alt="" />
</footer>


</body>
</html>