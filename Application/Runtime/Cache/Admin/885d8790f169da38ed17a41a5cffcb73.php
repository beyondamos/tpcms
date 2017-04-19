<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>修改个人资料</title>
	<link rel="stylesheet" href="/Public/Admin/lib/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="/Public/Admin/css/main.css">
</head>
<body>
	<div class="container-fluid">
		<ol class="breadcrumb">
			<li><a href="#">首页</a></li>
			<li>用户中心</li>
			<li class="active">修改个人资料</li>
		</ol>
		<form action="<?php echo U('modifypersonal');?>" class="form-horizontal" method="post">
			<div class="form-group">
				<label for="username" class="col-md-2 control-label">用户名称</label>
				<div class="col-md-2">
					<input type="text" class="form-control" id="username" placeholder="角色名称" name="username" value="<?php echo ($user_data["username"]); ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="password" class="col-md-2 control-label">密码</label>
				<div class="col-md-2">
					<input type="password" name="password" id="password" class="form-control" placeholder="密码">
				</div>
			</div>
			<div class="form-group">
				<label for="password2" class="col-md-2 control-label">重复密码</label>
				<div class="col-md-2">
					<input type="password" name="password2" id="password2" class="form-control" placeholder="重复密码">
				</div>
			</div>
			<div class="form-group">
				<label for="email" class="col-md-2 control-label">邮箱</label>
				<div class="col-md-2">
					<input type="email" id="email" class="form-control" placeholder="邮箱" name="email"  value="<?php echo ($user_data["email"]); ?>">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<input type="hidden" name="user_id" value="<?php echo (session('user_id')); ?>">
					<button type="submit" class="btn btn-info">提交</button>
					<button type="reset" class="btn btn-warning">重置</button>
				</div>
			</div>
		</form>
	</div>
	<script src="/Public/Admin/lib/jquery/jquery-1.11.3.js"></script>
	<script src="/Public/Admin/lib/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>