<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>分类列表</title>
	<link rel="stylesheet" href="/Public/Admin/lib/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="/Public/Admin/css/main.css">
</head>
<body>
	<div class="container-fluid">
		<ol class="breadcrumb">
			<li><a href="#">首页</a></li>
			<li>信息中心</li>
			<li class="active">分类管理</li>
		</ol>
		<a class="btn btn-primary" href="<?php echo U('add');?>" role="button"><span class="glyphicon glyphicon-plus"></span> 添加分类</a>
		<table class="table table-striped table-bordered">
			<tr class="text-center">
				<th class="text-center">分类id</th>
				<th class="text-center">分类名称</th>
				<th class="text-center">文章数</th>
				<th class="text-center">访问量</th>
				<th class="text-center">操作</th>
			</tr>
			<?php if(is_array($category_data)): $i = 0; $__LIST__ = $category_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
					<td class="text-center"><?php echo ($val["cate_id"]); ?></td>
					<td><?php echo str_repeat('----',$val['level']); echo ($val["cate_name"]); ?></td>
					<td class="text-center">3</td>
					<td class="text-center">4</td>
					<td class="text-center">
						<a class="btn btn-info" href="#" role="button">编辑</a>
						<a class="btn btn-danger" href="#" role="button">删除</a>
					</td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</table>
	</div>
	<script src="/Public/Admin/lib/jquery/jquery-1.11.3.js"></script>
	<script src="/Public/Admin/lib/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>