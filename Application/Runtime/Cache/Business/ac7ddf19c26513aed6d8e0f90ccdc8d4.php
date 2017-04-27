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

<div class="log-main">
    <img src="/Public/Business/images/logo.png" alt="" />
    <h4>商家后台管理系统</h4>
    <div class="logcont">
        <form action="<?php echo U('Login/index');?>" method="post">
            <input type="text" name="user_name" class="inuser" placeholder="用户名" />
            <input type="password" name="pwd" class="inmm" placeholder="密码" />
            <input type="submit" name="submit" value="登录" class="inbtn" />
        </form>
    </div>
</div>

<!--页脚-->
<footer>
    <a href="tel:02160523954" >客服电话：021 - 6052 3954</a>
    <img src="images/logo.png" alt="" />
</footer>

</body>
</html>