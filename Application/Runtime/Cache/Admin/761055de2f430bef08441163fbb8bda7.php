<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>文章编辑</title>
	<link rel="stylesheet" href="/Public/Admin/lib/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="/Public/Admin/css/main.css">
</head>
<body>
	<div class="container-fluid">
		<ol class="breadcrumb">
			<li><a href="#">首页</a></li>
			<li><a href="news_list.html">信息中心</a></li>
			<li class="active">文章编辑</li>
		</ol>
		<div class="row">
			<form class="form-horizontal col-md-8" action="<?php echo U('edit');?>" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="title" class="col-md-2 control-label">标题</label>
					<div class="col-md-8">
						<input class="form-control" id="title" name="title" placeholder="请输入标题" value="<?php echo ($article_info["article"]["title"]); ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">文章分类</label>
					<div class="col-md-3">
						<select class="form-control" name="cate_id">
							<option value="0">请选择分类</option>
							<?php if(is_array($article_info["category"])): $i = 0; $__LIST__ = $article_info["category"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["cate_id"]); ?>" <?php if($vo['cate_id'] == $article_info['article']['cate_id']): ?>selected<?php endif; ?>><?php echo str_repeat('--',$vo['level']*2); echo ($vo["cate_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="content" class="col-md-2 control-label">信息属性</label>
					<div class="col-md-10">
						<div class="checkbox">
							<label >
								<input type="checkbox" name="status" <?php if($article_info['article']['status'] == 1): ?>checked<?php endif; ?>>审核
							</label>
							<label >
								<input type="checkbox" name="is_new" <?php if($article_info['article']['is_new'] == 1): ?>checked<?php endif; ?> >最新
							</label>
							<label >
								<input type="checkbox" name="is_hot" <?php if($article_info['article']['is_hot'] == 1): ?>checked<?php endif; ?>>最热
							</label>
							<label>
								<input type="checkbox" name="is_recommend" <?php if($article_info['article']['is_recommend'] == 1): ?>checked<?php endif; ?>>推荐
							</label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="keywords" class="col-md-2 control-label">关键词</label>
					<div class="col-sm-8">
						<input class="form-control" id="keywords" name="keywords" placeholder="请输入关键词" value="<?php echo ($article_info["article"]["keywords"]); ?>">
						<p class="help-block">多个关键词用 "," 半角逗号隔开</p>
					</div>
				</div>
				<div class="form-group">
					<label for="img" class="col-md-2 control-label">标题图片</label>
					<div class="col-md-3">
						<input class="form-control" type="file" id="title" name="titleimg">
					</div>
				</div>
				<div class="form-group">
					<label for="tags" class="col-md-2 control-label">标签</label>
					<div class="col-sm-8">
						<input class="form-control" id="tags" name="tags" placeholder="请输入标签">
						<p class="help-block">多个标签用 "," 半角逗号隔开</p>
					</div>
				</div>
				<div class="form-group">
					<label for="synopsis" class="col-md-2 control-label">内容简介</label>
					<div class="col-md-5">
						<textarea class="form-control" rows="4" name="synopsis" id="synopsis"><?php echo ($article_info["article"]["synopsis"]); ?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="author" class="col-md-2 control-label">作者</label>
					<div class="col-md-2">
						<input class="form-control" id="author" name="author" placeholder="请输入作者名字" value="<?php echo ($article_info["aritlce"]["author"]); ?>">
					</div>
				</div>
<!-- 				<div class="form-group">
					<label for="newstime" class="col-md-2 control-label">发布时间</label>
					<div class="col-md-3">
						<div class="input-group">
							<input class="form-control " id="newstime" name="newstime">
							<span class="input-group-btn">
								<button class="btn btn-default" type="button">设为当前时间</button>
							</span>
						</div>
					</div>
				</div> -->
				<div class="form-group">
					<label for="clicks" class="col-md-2 control-label">点击数</label>
					<div class="col-md-2">
						<input class="form-control" id="clicks" name="clicks" value="<?php echo ($article_info["article"]["clicks"]); ?>">
					</div>
				</div>
				<div class="form-group">
					<label for="content" class="col-md-2 control-label">正文</label>
					<div class="col-md-10">
						<!-- <textarea class="form-control" rows="10" id="content"> -->
						<!-- 加载编辑器的容器 -->
						<script id="container" name="content" type="text/plain">
						</script>
						<!-- </textarea> -->
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<textarea id='ue_hidden' style="display:none"><?php echo ($article_info["article"]["content"]); ?></textarea>
						<input type="hidden" name="article_id" value="<?php echo ($article_info["article"]["article_id"]); ?>">
						<input class="btn btn-info" type="submit" value="提交">
						<input class="btn btn-warning" type="reset" value="重置">
					</div>
				</div>
			</form>
		</div>
	</div>
	<script src="/Public/Admin/lib/jquery/jquery-1.11.3.js"></script>
	<script src="/Public/Admin/lib/bootstrap/js/bootstrap.min.js"></script>
	<!-- 编辑器配置文件 -->
	<script type="text/javascript" src="/Public/plugins/Ueditor/ueditor.config.js"></script>
	<!-- 编辑器源码文件 -->
	<script type="text/javascript" src="/Public/plugins/Ueditor/ueditor.all.js"></script>
	<!-- 实例化编辑器 -->
	<script type="text/javascript">
		var editor = UE.getEditor('container');
		//对编辑器的操作最好在编辑器ready之后再做
		editor.ready(function() {
		    //设置编辑器的内容
		    editor.setContent($("#ue_hidden").val());
		});
	</script>
</body>
</html>