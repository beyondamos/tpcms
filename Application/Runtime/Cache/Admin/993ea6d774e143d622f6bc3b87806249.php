<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>文章列表</title>
	<link rel="stylesheet" href="/Public/Admin/lib/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="/Public/Admin/css/main.css">
</head>
<body>
	<div class="container-fluid">
		<ol class="breadcrumb">
			<li><a href="./main.html">首页</a></li>
			<li><a href="#">信息中心</a></li>
			<li class="active">文章管理</li>
		</ol>
		<a class="btn btn-danger" href="#" role="button"><span class="glyphicon glyphicon-trash"></span> 批量删除</a>
		<a class="btn btn-primary" href="<?php echo U('add');?>" role="button"><span class="glyphicon glyphicon-plus"></span> 添加文章</a>
		<table class="table table-bordered table-striped table-condensed">
			<tr>
				<th class="text-center"><input type="checkbox"></th>
				<th class="text-center">编号</th>
				<th class="text-center">标题</th>
				<th class="text-center">分类</th>
				<th class="text-center">最后更新</th>
				<th class="text-center">操作</th>
			</tr>
			<tr>
				<td class="text-center"><input type="checkbox"></td>
				<td class="text-center">2</td>
				<td>文章管理文章管理文章管理文章管理文章管理文章管理</td>
				<td class="text-center">4</td>
				<td class="text-center">5</td>
				<td class="text-center">
					<a class="btn btn-info" href="#" role="button">编辑</a>
					<a class="btn btn-warning" href="#" role="button">取消审核</a>
					<a class="btn btn-danger" href="#" role="button">回收站</a>
				</td>
			</tr>
			<tr>
				<td class="text-center"><input type="checkbox"></td>
				<td class="text-center">2</td>
				<td>文章管理文章管理文章管理文章管理文章管理文章管理</td>
				<td class="text-center">4</td>
				<td class="text-center">5</td>
				<td class="text-center">
					<a class="btn btn-info" href="#" role="button">编辑</a>
					<a class="btn btn-warning" href="#" role="button">取消审核</a>
					<a class="btn btn-danger" href="#" role="button">回收站</a>
				</td>
			</tr>
			<tr>
				<td class="text-center"><input type="checkbox"></td>
				<td class="text-center">2</td>
				<td>文章管理文章管理文章管理文章管理文章管理文章管理</td>
				<td class="text-center">4</td>
				<td class="text-center">5</td>
				<td class="text-center">
					<a class="btn btn-info" href="#" role="button">编辑</a>
					<a class="btn btn-warning" href="#" role="button">取消审核</a>
					<a class="btn btn-danger" href="#" role="button">回收站</a>
				</td>
			</tr>
			<tr>
				<td class="text-center"><input type="checkbox"></td>
				<td class="text-center">2</td>
				<td>文章管理文章管理文章管理文章管理文章管理文章管理</td>
				<td class="text-center">4</td>
				<td class="text-center">5</td>
				<td class="text-center">
					<a class="btn btn-info" href="#" role="button">编辑</a>
					<a class="btn btn-warning" href="#" role="button">取消审核</a>
					<a class="btn btn-danger" href="#" role="button">回收站</a>
				</td>
			</tr>
		</table>
		<nav>
			<ul class="pagination">
				<li>
					<a href="#" aria-label="Previous">
						<span aria-hidden="true">&laquo;</span>
					</a>
				</li>
				<li><a href="#">1</a></li>
				<li><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li><a href="#">4</a></li>
				<li><a href="#">5</a></li>
				<li>
					<a href="#" aria-label="Next">
						<span aria-hidden="true">&raquo;</span>
					</a>
				</li>
			</ul>
		</nav>
	</div>
	<script src="/Public/Admin/lib/jquery/jquery-1.11.3.js"></script>
	<script src="/Public/Admin/lib/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>