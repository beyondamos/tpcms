<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="renderer" content="webkit">
	<title>甫劳科技后台管理系统</title>
	<link href="/Public/Admin/css/base.css" rel="stylesheet" type="text/css"/>
	<link href="/Public/Admin/css/bootstrap.min.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="/Public/Admin/js/html5shiv.js"></script>
	<script src="/Public/Admin/js/respond.min.js"></script>
	<![endif]-->
	<script src="/Public/Admin/js/jquery-1.11.1.min.js"></script>
	<script src="/Public/Admin/js/bootstrap.min.js"></script>
</head>
<body>
<div class="nav-top">
	<div class="nav-top-center">
		<div class="nav-top-left">
			<a href="<?php echo U('Admin/Index/index');?>"><img src="/Public/Admin/images/logo.png" alt=""/><span>后台管理</span></a>
		</div>
		<div class="nav-top-right">
			
			<!--用户及下拉列表-->
			<ul id="topnav">
				<li>
					<a href="javascript:;"><?php echo ($login_user_data["username"]); ?><!-- <img src="/Public/Admin/images/ard.png" alt="" /> --></a><!--用户名-->
					<img src="/Public/Admin/images/head.jpg" alt=""/><!--用户头像-->
<!-- 					<span><dl>
						<a href="javascript:;">基本资料</a><br/>
						<a href="javascript:;">账号信息</a><br/>
					</dl></span> -->
				</li>
			</ul>
			
			<a href="<?php echo U('Login/logout');?>" class="topnavimg">退出登录</a>
			<a href="<?php echo U('Home/Index/index');?>" target="_blank" class="topnavimg">网站首页</a>
		</div>
	</div>
</div>
<div class="nav-topb"></div>
<div style="float:left" id="my_menu" class="sdmenu">
	<div>
		<span><a href="<?php echo U('Admin/Index/index');?>">首&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;页</a></span>
	</div>
	<?php if(is_array($user_auth_list)): $i = 0; $__LIST__ = $user_auth_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div>
		<span><?php echo ($vo[0]['auth_name']); ?><i class="glyphicon glyphicon-plus" aria-hidden="true"></i></span>
		<?php if(is_array($vo)): $i = 0; $__LIST__ = array_slice($vo,1,null,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i; if($val['status'] == 1): ?><a href="<?php echo U($val['auth_url']) ?>"><?php echo ($val["auth_name"]); ?></a><?php endif; endforeach; endif; else: echo "" ;endif; ?>
	</div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>




<div class="cont">
	<div class="contmain">

		<div class="boxi">
			<h1>文章管理</h1>

			<!-- 表格顶部搜索区 -->
			<div class="boxoper">
				<a href="<?php echo U('Article/add');?>">添加文章</a>
				<a role="button" id="uncheck" href="javascript:void(0);">批量取消审核</a>
				<div class="boxoper-seh">
					<form action="<?php echo U('Article/listing');?>" method="get">
						<button class="btn btn-default" type="submit"><img src="/Public/Admin/images/iconseh.png" /></button>
						<input type="text" class="form-control" placeholder="查询文章标题" name="search_article" value="<?php echo ($search_article); ?>">
						<select class="form-control" name="cate_id">
							<option value="0">全部分类</option>
							<?php if(is_array($category_data)): $i = 0; $__LIST__ = $category_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["cate_id"]); ?>" <?php if($vo['cate_id'] == $search_cate_id): ?>selected<?php endif; ?>><?php echo str_repeat('----',$vo['level']); echo ($vo["cate_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
						</select>
					</form>
				</div>
			</div>

			<!-- 表格 -->
			<table class="table table-hover boxtable">
				<thead>
				<tr>
					<th class="col-zd-1 text-vm"><input type="checkbox" id="all"/></th>
					<th class="col-zd-2 text-vm">编号</th>
					<th class="col-md-3 text-vm">标题</th>
					<th class="col-md-1 text-vm">分类</th>
					<th class="col-md-1 text-vm">发布者</th>
					<th class="col-md-2 text-vm">发布时间</th>
					<th class="col-md-1 text-vm">点击量</th>
					<th class="col-md-1 text-vm">留言</th>
					<th class="col-md-2 text-vm text-center">操作</th>
				</tr>
				</thead>
				<form action="" method="post" id="form">
					<tbody>
					<?php if(is_array($article_data)): $i = 0; $__LIST__ = $article_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
							<td class="text-vm"><input type="checkbox" name="article_id[]" value="<?php echo ($vo["article_id"]); ?>"/></td>
							<td class="text-vm"><?php echo ($vo["article_id"]); ?></td>
							<td class="text-vm"><a href="<?php echo U('Home/Article/detail', array('article_id' => $vo['article_id']));?>" target="_blank"><?php echo ($vo["title"]); ?></a></td>
							<td class="text-vm"><?php echo ($vo["cate_name"]); ?></td>
							<td class="text-vm"><?php echo ($vo["author"]); ?></td>
							<td class="text-vm"><?php echo ($vo["newstime"]); ?></td>
							<td class="text-vm"><?php echo ($vo["real_clicks"]); ?></td>
							<td class="text-vm">2</td>
							<td class="text-vm">
								<a href="<?php echo U('Article/edit',array('article_id' => $vo['article_id']));?>">编辑</a>
								<a href="<?php echo U('Article/unCheck', array('article_id' => $vo['article_id']));?>">取消审核</a>
							</td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>
				</form>
			</table>


			<?php echo ($show); ?>
			<!-- 分页 -->
			<!-- 			<div class="boxpage">
                            <a href="javascript:;"><span class="glyphicon glyphicon-step-backward" aria-hidden="true"></span></a>
                            <a href="javascript:;"><span class="glyphicon glyphicon-backward" aria-hidden="true"></span></a>
                            <a href="javascript:;">1</a>
                            <a href="javascript:;">2</a>
                            <a href="javascript:;" class="boxpage-act">3</a>
                            <a href="javascript:;">4</a>
                            <a href="javascript:;">5</a>
                            <a href="javascript:;"><span class="glyphicon glyphicon-forward" aria-hidden="true"></span></a>
                            <a href="javascript:;"><span class="glyphicon glyphicon-step-forward" aria-hidden="true"></span></a>
                        </div> -->
		</div>

	</div>
</div>
<script src="/Public/Admin/js/sdmenu.js"></script>
<script>
	$().ready(function(){
		$('#all').click(function(){
			var status = $(this).is(':checked');
			if(status){
				$(":checkbox").prop('checked',true);
			}else{
				$(":checkbox").prop('checked',false);
			}
		});

		$("#uncheck").click(function(){
			$("#form").attr('action',"<?php echo U('Article/unCheck');?>");
			$("#form").submit();
		});
	});
</script>
</body>
</html>