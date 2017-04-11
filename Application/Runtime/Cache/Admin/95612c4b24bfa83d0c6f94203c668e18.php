<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>分类添加</title>
	<link rel="stylesheet" href="/Public/Admin/lib/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="/Public/Admin/css/main.css">
</head>
<body>
	<div class="container-fluid">
		<ol class="breadcrumb">
			<li><a href="#">首页</a></li>
			<li>信息中心</li>
			<li class="active">分类添加</li>
		</ol>
		<form action="<?php echo U('add');?>" class="form-horizontal" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label for="category_name" class="col-md-1 control-label">分类名称</label>
				<div class="col-md-3">
					<input type="text" class="form-control" id="category_name" name="cate_name" placeholder="请输入分类名称">
				</div>
			</div>
			<div class="form-group">
				<label for="parent_category" class="col-md-1 control-label">上级分类</label>
				<div class="col-md-3">
					<select name="parent_id" class="form-control">
						<option value="0">顶级分类</option>
						<?php if(is_array($category_data)): $i = 0; $__LIST__ = $category_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$category): $mod = ($i % 2 );++$i;?><option value="<?php echo ($category["cate_id"]); ?>"><?php echo str_repeat('&nbsp;&nbsp;',$category['level']*2); echo ($category["cate_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="img" class="col-md-1 control-label">分类图片</label>
				<div class="col-md-3">
					<input type="file" class="form-control" id="img" name="cate_img">
				</div>
			</div>
			<div class="form-group">
				<label for="description" class="col-md-1 control-label">分类描述</label>
				<div class="col-md-4">
					<textarea name="description" id="description" class="form-control" rows="4"></textarea>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-offset-1 col-md-2">
					<input class="btn btn-info" type="submit" value="提交" >
					<input class="btn btn-danger" type="reset" value="重置">
				</div>

			</div>
		</form>
	</div>
	<script src="/Public/Admin/lib/jquery/jquery-1.11.3.js"></script>
	<script src="/Public/Admin/lib/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>