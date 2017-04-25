<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="renderer" content="webkit">
    <title>甫劳科技后台管理系统</title>
	<link href="/Public/Admin/css/base.css" rel="stylesheet" type="text/css"/>
    <link href="/Public/Admin/css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="/Public/Admin/js/html5shiv.js"></script>
    <script src="/Public/Admin/js/respond.min.js"></script>
    <![endif]-->
	<script src="/Public/Admin/js/jquery-1.11.1.min.js"></script>
    <script src="/Public/Admin/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="ban-log">
		<img src="/Public/Admin/images/imgbk.png" alt="" />
		<img src="/Public/Admin/images/logob.png" alt="" />
		<h1>甫劳科技后台管理系统</h1>
		<h2>flower Background management system</h2>
	</div>
	<div class="log"><div class="logx">
		<form action="<?php echo U('Login/index');?>" method="post">
			<input type="text" class="in-hd" placeholder="用户名"  name="username" />
			<input type="password"  class="in-mm" placeholder="密&nbsp;&nbsp;&nbsp;码" name="password"/>
			<input type="text"  class="in-yz" placeholder="验证码" name="verify"/>
			<img src="<?php echo U('Login/verify');?>" class="in-yztp" alt="" />
			<label><input type="checkbox"/>&nbsp;记住密码</label>
			<input type="submit" value="登&nbsp;&nbsp;&nbsp;录" class="in-btn btn btn-block" />
		</form>
	</div>
		<div class="nav-footb col-sm-12">
			<div class="navfootb-center">
				Copyright©2017-2020&nbsp;&nbsp;&nbsp;甫劳计算机科技(上海)有限公司&nbsp;&nbsp;&nbsp;版权所有&nbsp;v1.0
			</div>
		</div>
	</div>
	<script>
		$().ready(function(){
			$(".in-yztp").click(function(){
				var src = $(this).attr('src');
				$(this).attr('src',src+'?_='+$.now());
			});
		});
	</script>
</body>
</html>