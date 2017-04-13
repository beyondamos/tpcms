<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>文章添加</title>
	<link rel="stylesheet" href="/Public/Admin/lib/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="/Public/Admin/css/main.css">
	<link rel="stylesheet" href="/Public/plugins/uploadify/uploadify.css">
</head>
<body>
	<div class="container-fluid">
		<ol class="breadcrumb">
			<li><a href="#">首页</a></li>
			<li><a href="news_list.html">信息中心</a></li>
			<li class="active">文章添加</li>
		</ol>
		<div class="row">
			<form class="form-horizontal col-md-8" action="<?php echo U('add');?>" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="title" class="col-md-2 control-label">标题</label>
					<div class="col-md-8">
						<input class="form-control" id="title" name="title" placeholder="请输入标题">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">文章分类</label>
					<div class="col-md-3">
						<select class="form-control" name="cate_id">
							<option value="0">请选择分类</option>
							<?php if(is_array($category_data)): $i = 0; $__LIST__ = $category_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["cate_id"]); ?>"><?php echo str_repeat('--',$vo['level']*2); echo ($vo["cate_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="content" class="col-md-2 control-label">信息属性</label>
					<div class="col-md-10">
						<div class="checkbox">
							<label >
								<input type="checkbox" name="status" checked>审核
							</label>
							<label >
								<input type="checkbox" name="is_new">最新
							</label>
							<label >
								<input type="checkbox" name="is_hot">最热
							</label>
							<label>
								<input type="checkbox" name="is_recommend">推荐
							</label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="keywords" class="col-md-2 control-label">关键词</label>
					<div class="col-sm-8">
						<input class="form-control" id="keywords" name="keywords" placeholder="请输入关键词">
						<p class="help-block">多个关键词用 "," 半角逗号隔开</p>
					</div>
				</div>
				<div class="form-group">
					<label for="img" class="col-md-2 control-label">标题图片</label>
					<div class="col-md-3">
						<!-- <input class="form-control" type="file" id="title" name="titleimg"> -->

		                <input id="file_upload" name="file_upload"  type="file" multiple="true" >
		                <img style="display: none" id="upload_org_code_img" src="" width="150" height="150">
		                <input id="file_upload_image" name="titleimg" type="hidden" multiple="true" value="">

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
						<textarea class="form-control" rows="4" name="synopsis" id="synopsis"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="author" class="col-md-2 control-label">作者</label>
					<div class="col-md-2">
						<input class="form-control" id="author" name="author" placeholder="请输入作者名字">
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
						<input class="form-control" id="clicks" name="clicks" value="1">
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
						<input class="btn btn-info" type="submit" value="提交">
						<input class="btn btn-warning" type="reset" value="重置">
					</div>
				</div>
			</form>
		</div>
	</div>
	<script src="/Public/Admin/lib/jquery/jquery-1.11.3.js"></script>
	<script src="/Public/plugins/uploadify/jquery.uploadify.min.js"></script>
	<script src="/Public/Admin/lib/bootstrap/js/bootstrap.min.js"></script>
	<!-- 编辑器配置文件 -->
	<script type="text/javascript" src="/Public/plugins/Ueditor/ueditor.config.js"></script>
	<!-- 编辑器源码文件 -->
	<script type="text/javascript" src="/Public/plugins/Ueditor/ueditor.all.js"></script>
	<!-- 实例化编辑器 -->
	<script type="text/javascript">
		var editor = UE.getEditor('container');

		$(function() {
		    $('#file_upload').uploadify({
		        'swf'      : '/Public/plugins/uploadify/uploadify.swf',
		        'uploader' : '<?php echo U('Article/upload');?>',
		        'buttonText': '上传图片',
		        // Put your options here
		        'onUploadSuccess' : function(file, data, response) {
            		if(response){
            			// console.log(data);
            			// var obj = eval(data); //由JSON字符串转换为JSON对象
            			var data = $.parseJSON(data);
            			$('#upload_org_code_img').attr('src', data);
            			$('#upload_org_code_img').show();
            			$('#file_upload_image').attr('value', data);
            		}
        		}
		    });
		});
	</script>
</body>
</html>