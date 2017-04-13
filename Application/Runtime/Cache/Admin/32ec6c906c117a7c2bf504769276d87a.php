<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8">	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>后台登录页面</title>
	<link rel="stylesheet" href="/Public/Admin/lib/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="/Public/Admin/css/main.css">
</head>
<body>
	<div class="container" id="login">
		<div class="page-header col-md-offset-2">
			<h1>后台登录 </h1>
		</div>
		<form action="<?php echo U('Login/login');?>" method="post" class="form-horizontal">
			<div class="form-group">
				<label for="username" class="col-md-2 control-label">用户名</label>
				<div class="col-md-4">
					<input  class="form-control" id="username" placeholder="请输入用户名" name="username">
				</div>
			</div>
			<div class="form-group">
				<label for="password" class="col-md-2 control-label">密码</label>
				<div class="col-md-4">
					<input type="password" class="form-control" id="password" placeholder="请输入密码" name="password">
				</div>
			</div>
			<div class="checkbox">
				<label class="col-md-offset-2">
					<input type="checkbox" > 记住我
				</label>
			</div>
			<input type="submit" class="btn btn-default col-md-offset-2" name="submit" value="登录">
		</form>
	</div>
	<script src="/Public/Admin/lib/jquery/jquery-1.11.3.js"></script>
	<script src="/Public/Admin/lib/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>