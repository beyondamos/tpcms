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
			<h1>房产管理</h1>

			<!-- 表格顶部搜索区 -->
			<div class="boxoper">
				<a href="<?php echo U('Fangchan/add');?>">添加房产信息</a>
				<div class="boxoper-seh">
					<form action="<?php echo U('Fangchan/index');?>" method="get">
						<button class="btn btn-default" type="submit"><img src="/Public/Admin/images/iconseh.png" /></button>
						<input type="text" class="form-control" placeholder="查询房源标题" name="search_article" value="<?php echo ($search_article); ?>">
					</form>
				</div>
			</div>

			<!-- 表格 -->
			<table class="table table-hover boxtable">
				<thead>
				<tr>
					<th class="col-zd-1 text-vm"><input type="checkbox" id="all"/></th>
					<th class="col-zd-1 text-vm">编号</th>
					<th class="col-md-2 text-vm">标题</th>
					<th class="col-md-1 text-vm">户型</th>
					<th class="col-md-1 text-vm">面积</th>
					<th class="col-md-1 text-vm">总价</th>
					<th class="col-md-1 text-vm">单价</th>
					<th class="col-md-1 text-vm">楼层</th>
					<th class="col-md-2 text-vm text-center">操作</th>
				</tr>
				</thead>
				<form action="" method="post" id="form">
					<tbody>
					<?php if(is_array($fangchan_data)): $i = 0; $__LIST__ = $fangchan_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
							<td class="text-vm"><input type="checkbox" name="id[]" value="<?php echo ($vo["id"]); ?>"/></td>
							<td class="text-vm"><?php echo ($vo["id"]); ?></td>
							<td class="text-vm"><a href="<?php echo U('Home/Fangchan/detail', array('id' => $vo['id']));?>" target="_blank"><?php echo mb_substr($vo['name'],0,15,'utf-8');;?></a></td>
							<td class="text-vm"><?php echo ($vo["housetype"]); ?></td>
							<td class="text-vm"><?php echo ($vo["area"]); ?></td>
							<td class="text-vm"><?php echo ($vo["total"]); ?></td>
							<td class="text-vm"><?php echo ($vo["unitprice"]); ?></td>
							<td class="text-vm"><?php echo ($vo["floor"]); ?></td>
							<td class="text-vm">
								<a href="<?php echo U('Fangchan/edit',array('id' => $vo['id']));?>">编辑</a>
								<a href="<?php echo U('Fangchan/delete', array('id' => $vo['id']));?>">删除</a>
							</td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>
				</form>
			</table>
			<?php echo ($show); ?>
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

	});
</script>
</body>
</html>