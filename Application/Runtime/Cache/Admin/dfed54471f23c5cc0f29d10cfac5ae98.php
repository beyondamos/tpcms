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
			<h1>编辑分类</h1>
			<form action="<?php echo U('Category/edit');?>" method="post">
				<div class="boxin">
					<span>分类名称</span><input type="text"  class="form-control" name="cate_name" value="<?php echo ($category_info['cate_name']); ?>">
				</div>
				<div class="boxin">
					<span>上级分类</span>
					<select name="parent_id" class="form-control">
						<option value="0">请选择分类</option>
						<?php if(is_array($categroy_data)): $i = 0; $__LIST__ = $categroy_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['cate_id']); ?>" <?php if($vo['cate_id'] == $category_info['parent_id']): ?>selected<?php endif; ?>><?php echo str_repeat('----',$vo['level']); echo ($vo['cate_name']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
					</select>
				</div>
				<div class="boxin">
					<span>路由名称</span><input type="text" class="form-control" name="url" value="<?php echo ($category_info['url']); ?>">
				</div>
				<div class="boxin">
					<span>栏目标题</span><input type="text" class="form-control" name="cate_title" value="<?php echo ($category_info['cate_title']); ?>">
				</div>
				<div class="boxin">
					<span>关键词</span><input type="text" class="form-control" name="cate_keywords" value="<?php echo ($category_info['cate_keywords']); ?>">
				</div>
				<div class="boxtext">
					<span>分类描述</span><textarea rows="6" class="form-control" name="description"><?php echo ($category_info["description"]); ?></textarea>
				</div>
				
				<div class="boxinbtn">
					<input type="hidden" name="cate_id" value="<?php echo ($category_info['cate_id']); ?>">
					<input type="submit" value="确定" class="btn btna" />
					<input type="submit" value="重置" class="btn btnb" />
				</div>
				
			</form>
		</div>
	
	</div>
</div>
<script src="/Public/Admin/js/sdmenu.js"></script>
</body>
</html>