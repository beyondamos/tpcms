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
		<button id="unCheck" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> 批量取消审核</button>
		<a class="btn btn-primary" href="<?php echo U('add');?>" role="button"><span class="glyphicon glyphicon-plus"></span> 添加文章</a>
		<form id="checkform" method="post" action="">
		<table class="table table-bordered table-striped table-condensed table-hover">
			<tr>
				<th class="text-center">选择</th>
				<th class="text-center">编号</th>
				<th class="text-center">标题</th>
				<th class="text-center">分类</th>
				<th class="text-center">最后更新</th>
				<th class="text-center">操作</th>
			</tr>
			<?php if(is_array($article_info)): $i = 0; $__LIST__ = $article_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
				<td class="text-center"><input type="checkbox" name="article_id[]" value="<?php echo ($vo["article_id"]); ?>"></td>
				<td class="text-center"><?php echo ($vo["article_id"]); ?></td>
				<td><?php echo ($vo["title"]); ?></td>
				<td class="text-center"><?php echo ($vo["cate_name"]); ?></td>
				<td class="text-center"><?php echo date('Y-m-d H:i:s',$vo['newstime']);?></td>
				<td class="text-center">
					<a class="btn btn-info" href="<?php echo U('edit', array('article_id' => $vo['article_id']));?>" role="button">编辑</a>
					<a class="btn btn-warning" href="<?php echo U('unCheck',array('article_id'=>$vo['article_id']));?>" role="button">取消审核</a>
				</td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</table>
		</form>
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
	<script>
		$().ready(function(){
			$('#unCheck').click(function(){
				$('#checkform').attr('action','<?php echo U('unCheck');?>');
				$("#checkform").submit();
			});
		});
	</script>
</body>
</html>