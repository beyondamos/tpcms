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
			<h1>管理员列表</h1>
			
			<!-- 表格顶部搜索区 -->
			<div class="boxoper">
				<a href="<?php echo U('User/add');?>">添加管理员</a>
<!-- 				<div class="boxoper-seh">
					<form action="" method="post">
						<button class="btn btn-default" type="submit"><img src="/Public/Admin/images/iconseh.png" /></button>
						<input type="text" class="form-control" placeholder="搜索用户名或角色">
						<select class="form-control">
							<option>全部</option>
							<option>分类</option>
							<option>分类</option>
							<option>分类</option>
							<option>分类</option>
						</select>
					</form>
				</div> -->
			</div>
			
			<!-- 表格 -->
			<table class="table table-hover boxtable">
				<thead>
					<tr>
					   <th class="col-md-1 text-vm">序号</th>
					   <th class="col-md-2 text-vm">用户名</th>
					   <th class="col-md-2 text-vm">所属角色</th>
					   <th class="col-md-3 text-vm">邮箱</th>
					   <th class="col-md-2 text-vm">加入时间</th>
					   <th class="col-md-1 text-vm text-center">操作</th>
					</tr>
				</thead>
				<tbody>
					<?php if(is_array($user_data)): $i = 0; $__LIST__ = $user_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
						<td class="text-vm"><?php echo ($vo["user_id"]); ?></td>
						<td class="text-vm"><?php echo ($vo["username"]); ?></td>
						<td class="text-vm"><?php echo ($vo["role_name"]); ?></td>
						<td class="text-vm"><?php echo ($vo["email"]); ?></td>
						<td class="text-vm"><?php echo date('Y-m-d H:i:s',$vo['add_time']);?></td>
						<td class="text-vm">
							<a href="<?php echo U('User/edit',array('user_id'=> $vo['user_id']));?>">编辑</a>
							<?php if($vo['user_id'] != 1): ?><a href="<?php echo U('User/delete',array('user_id'=> $vo['user_id']));?>">删除</a><?php endif; ?>
						</td>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				</tbody>
			</table>
			
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
</body>
</html>