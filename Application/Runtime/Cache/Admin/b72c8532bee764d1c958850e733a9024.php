<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>角色列表</title>
	<link rel="stylesheet" href="/Public/Admin/lib/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="/Public/Admin/css/main.css">
</head>
<body>
	<div class="container-fluid">
		<ol class="breadcrumb">
			<li><a href="#">首页</a></li>
			<li>用户中心</li>
			<li class="active">角色管理</li>
		</ol>
		<a class="btn btn-primary" href="<?php echo U('add');?>" role="button"><span class="glyphicon glyphicon-plus"></span> 角色添加</a>
		<table class="table table-striped table-bordered">
			<tr class="text-center">
				<th class="text-center">角色id</th>
				<th class="text-center">角色名称</th>
				<th class="text-center">角色描述</th>
				<th class="text-center">操作</th>
			</tr>
			<?php if(is_array($role_data)): $i = 0; $__LIST__ = $role_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
					<td class="text-center"><?php echo ($vo["role_id"]); ?></td>
					<td class="text-center"><?php echo ($vo["role_name"]); ?></td>
					<td class="text-center"><?php echo ($vo["role_desc"]); ?></td>
					<?php if($vo['role_id'] != 1): ?><td class="text-center">
						<a class="btn btn-info" href="<?php echo U('Role/edit',array('role_id' => $vo['role_id']));?>" role="button">编辑</a>
						<a class="btn btn-danger" href="<?php echo U('Role/delete',array('role_id' => $vo['role_id']));?>" role="button">删除</a>
					</td><?php endif; ?>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</table>
	</div>
	<script src="/Public/Admin/lib/jquery/jquery-1.11.3.js"></script>
	<script src="/Public/Admin/lib/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>