<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>用户列表</title>
	<link rel="stylesheet" href="/Public/Admin/lib/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="/Public/Admin/css/main.css">
</head>
<body>
	<div class="container-fluid">
		<ol class="breadcrumb">
			<li><a href="#">首页</a></li>
			<li>用户中心</li>
			<li class="active">用户管理</li>
		</ol>
		<a class="btn btn-primary" href="<?php echo U('add');?>" role="button"><span class="glyphicon glyphicon-plus"></span> 用户添加</a>
		<table class="table table-striped table-bordered">
			<tr class="text-center">
				<th class="text-center">用户id</th>
				<th class="text-center">用户名称</th>
				<th class="text-center">所属角色</th>
				<th class="text-center">上次登录时间</th>
				<th class="text-center">操作</th>
			</tr>
			<?php if(is_array($user_data)): $i = 0; $__LIST__ = $user_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
					<td class="text-center"><?php echo ($vo["user_id"]); ?></td>
					<td class="text-center"><?php echo ($vo["username"]); ?></td>
					<td class="text-center"><?php echo ($vo["role_name"]); ?></td>
					<td class="text-center"><?php echo date('Y-m-d H:i:s',$vo['last_login_time']);?></td>
					<td class="text-center">
						<a class="btn btn-info" href="<?php echo U('User/edit',array('user_id' => $vo['user_id']));?>" role="button">编辑</a>
						<?php if($vo['user_id'] != 1 ): ?><a class="btn btn-danger" href="<?php echo U('User/delete',array('user_id' => $vo['user_id']));?>" role="button">删除</a><?php endif; ?>
					</td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</table>
	</div>
	<script src="/Public/Admin/lib/jquery/jquery-1.11.3.js"></script>
	<script src="/Public/Admin/lib/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>