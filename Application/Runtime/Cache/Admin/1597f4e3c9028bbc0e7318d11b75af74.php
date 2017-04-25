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
			<h1>导航设置</h1>
			
			<form action="" method="post">
				<div class="boxin">
					<span>导航名称</span><input type="text"  class="form-control" name="nav_name" value="<?php echo ($nav_data["nav_name"]); ?>">
				</div>
				<div class="boxin">
					<span>链&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;接</span><input type="text"  class="form-control" name="nav_url" value="<?php echo ($nav_data["nav_url"]); ?>">
				</div>
				<div class="boxin">
					<span>排&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;序</span><input type="text"  class="form-control" name="sort" value="<?php echo ($nav_data["sort"]); ?>">
				</div>
				<div class="boxin">
					<span>是否显示</span>
					<select class="form-control" name="is_show" >
						<option value="1" <?php if($nav_data['is_show'] == 1): ?>selected<?php endif; ?>>是</option>
						<option value="0" <?php if($nav_data['is_show'] == 0): ?>selected<?php endif; ?>>否</option>
					</select>
				</div>
				<div class="boxin">
					<span>是否新页面</span>
					<select  class="form-control" name="is_blank">
						<option value="0" <?php if($nav_data['is_blank'] == 0): ?>selected<?php endif; ?>>否</option>
						<option value="1" <?php if($nav_data['is_blank'] == 1): ?>selected<?php endif; ?>>是</option>
					</select>
				</div>
								
				<div class="boxinbtn">
					<input type="hidden" name="nav_id" value="<?php echo ($nav_data["nav_id"]); ?>">
					<input type="submit"  value="确定" class="btn btna" />
					<input type="reset"  value="重置" class="btn btnb" />
				</div>
				
			</form>
		</div>
	
	</div>
</div>
<script src="/Public/Admin/js/sdmenu.js"></script>
</body>
</html>