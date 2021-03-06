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
			<h1>添加广告</h1>
			<form action="<?php echo U('Adv/add');?>" method="post" enctype="multipart/form-data">
				<div class="boxin">
					<span>广&nbsp;告&nbsp;名&nbsp;称</span><input type="text" name="adv_name" class="form-control">
				</div>
				<div class="boxin">
					<span>广&nbsp;告&nbsp;位&nbsp;置</span></span><input type="text" name="adv_position" class="form-control">
				</div>
				<div class="boxin">
					<span>广&nbsp;告&nbsp;标&nbsp;记</span></span><input type="text" name="mark" class="form-control">
					
				</div>
				<div class="boxin">
					<span>广&nbsp;告&nbsp;链&nbsp;接</span></span><input type="text" name="adv_url" class="form-control">
				</div>
				<div class="boxinb">
					<span>广&nbsp;告&nbsp;图&nbsp;片</span>
					<a href="javascript:;" class="form-control upfn"><input type="file" id='file_upload'  name="file_upload" /></a><i class="upfnb"></i>
				</div>
				<div class="boxinbtn">
					<input type="submit"  value="确定" class="btn btna" />
					<input type="reset"  value="重置" class="btn btnb" />
				</div>
			</form>
		</div>
	</div>
</div>
<script src="/Public/Admin/js/sdmenu.js"></script>
<script>
	$().ready(function(){
		$(".upfn").on("change","input[type='file']",function(){
			var filePath = $(this).val();
			var arr = filePath.split('\\');
			var fileName = arr[arr.length-1];
			$(".upfnb").html(fileName);
		});
	});
</script>
</body>
</html>