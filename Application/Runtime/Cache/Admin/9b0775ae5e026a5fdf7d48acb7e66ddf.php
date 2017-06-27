<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="renderer" content="webkit">
	<title>甫劳科技后台管理系统</title>
	<link href="/Public/Admin/css/base.css" rel="stylesheet" type="text/css"/>
	<link href="/Public/Admin/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="/Public/Admin/uploadify/uploadify.css" />
	<!--[if lt IE 9]>
	<script src="/Public/Admin/js/html5shiv.js"></script>
	<script src="/Public/Admin/js/respond.min.js"></script>
	<![endif]-->
	<script src="/Public/Admin/js/jquery-1.11.1.min.js"></script>
	<script src="/Public/Admin/js/bootstrap.min.js"></script>
	<script src="/Public/Admin/js/laydate/laydate.js"></script>
	<script charset="utf-8" src="/Public/Admin/kindeditor/kindeditor.js"></script>
	<script charset="utf-8" src="/Public/Admin/kindeditor/lang/zh_CN.js"></script>
	<script>
		KindEditor.ready(function(K) {
			window.editor = K.create('#editor_id');
		});
	</script>
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
				<h1>编辑房产信息</h1>

				<form action="<?php echo U('Fangchan/edit');?>" method="post" enctype="multipart/form-data">
					<div class="boxinb">
						<span>房屋标题</span><input type="text" class="form-control"  name="name" value="<?php echo ($fangchan_data["name"]); ?>">
					</div>
					<div class="boxinb">
						<span>房源编号</span><input type="text" class="form-control"  name="num" value="<?php echo ($fangchan_data["num"]); ?>">
					</div>
					<div class="boxinb">
						<span>联系方式</span><input type="text" class="form-control"  name="phone" value="<?php echo ($fangchan_data["phone"]); ?>">
					</div>
					<div class="boxinb">
						<span>房屋总价</span><input type="text" class="form-control" name="total" value="<?php echo ($fangchan_data["total"]); ?>">（万元）
					</div>
					<div class="boxinb">
						<span>房屋单价</span><input type="text" class="form-control" name="unitprice" value="<?php echo ($fangchan_data["unitprice"]); ?>">（元/平方米）
					</div>
					<div class="boxinb">
						<span>户型</span><input type="text" class="form-control" name="housetype" value="<?php echo ($fangchan_data["housetype"]); ?>">
					</div>
					<div class="boxinb">
						<span>面积</span><input type="text" class="form-control" name="area" value="<?php echo ($fangchan_data["area"]); ?>">（平方）
					</div>
					<div class="boxinb">
						<span>朝向</span><input type="text" class="form-control" name="direction" value="<?php echo ($fangchan_data["direction"]); ?>">
					</div>
					<div class="boxinb">
						<span>楼层</span><input type="text" class="form-control" name="floor" value="<?php echo ($fangchan_data["floor"]); ?>">
					</div>
					<div class="boxinb">
						<span>房屋类型</span><input type="text" class="form-control" name="type" value="<?php echo ($fangchan_data["type"]); ?>">
					</div>
					<div class="boxinb">
						<span>电梯情况</span><input type="text" class="form-control" name="lift" value="<?php echo ($fangchan_data["lift"]); ?>">
					</div>
					<div class="boxinb">
						<span>建筑年代</span><input type="text" class="form-control" name="builttime" value="<?php echo ($fangchan_data["builttime"]); ?>">
					</div>
					<div class="boxinb">
						<span>房屋性质</span><input type="text" class="form-control" name="nature" value="<?php echo ($fangchan_data["nature"]); ?>">
					</div>
					<div class="boxinb">
						<span>产权</span><input type="text" class="form-control" name="property_right" value="<?php echo ($fangchan_data["property_right"]); ?>">
					</div>
					<div class="boxinb">
						<span>装修情况</span><input type="text" class="form-control" name="decoration" value="<?php echo ($fangchan_data["decoration"]); ?>">
					</div>
					<div class="boxinb">
						<span>小区名称</span><input type="text" class="form-control" name="compound_name" value="<?php echo ($fangchan_data["compound_name"]); ?>">
					</div>
					<div class="boxinb">
						<span>地址</span><input type="text" class="form-control" name="address" value="<?php echo ($fangchan_data["address"]); ?>">
					</div>
					<div class="boxinb">
						<div class="boxinbl">
							<span class="lets2">作&nbsp;&nbsp;&nbsp;&nbsp;者</span><input type="text" class="form-control" name="author" value="<?php echo ($login_user_data["nickname"]); ?>">
						</div>
						<div class="boxinbr">
							<span class="lets2">日&nbsp;&nbsp;&nbsp;&nbsp;期</span><input type="text" id="demo"  class="form-control laydate-icon" name="createtime"  value="">
						</div>
					</div>

					<div class="boxinb">
						<span class="lets3">点&nbsp;击&nbsp;数</span><input type="text" class="form-control" name="clicks" value="<?php echo mt_rand(1,10);?>">
					</div>
					<div class="boxinb">
						<span>标题图片</span>
						<a href="javascript:;" class="form-control upfn"><input type="file" id='file_upload'  name="file_upload" /></a><i class="upfnb"></i>
					</div>
					<div class="boxinb">
						<span>房屋图片1</span>
						<a href="javascript:;" class="form-control"><input type="file" name="file_upload1" /></a>
					</div>
					<div class="boxinb">
						<span>房屋图片2</span>
						<a href="javascript:;" class="form-control"><input type="file" name="file_upload2" /></a>
					</div>
					<div class="boxinb">
						<span>房屋图片3</span>
						<a href="javascript:;" class="form-control"><input type="file" name="file_upload3" /></a>
					</div>
					<div class="boxuediter">
						<div class="lets2">正&nbsp;&nbsp;&nbsp;&nbsp;文</div>


						<div class="uediter">

							<textarea id="editor_id" name="content" style="width:700px;height:300px;">
									<?php echo ($fangchan_data["content"]); ?>
							</textarea>

						</div>
					</div>
					<div class="boxinbtn">
						<input type="hidden" name="id" value="<?php echo ($fangchan_data["id"]); ?>">
						<input type="submit"  value="确定" class="btn btna" />
						<input type="reset" value="重置" class="btn btnb" />
					</div>

				</form>
			</div>

		</div>
	</div>
	<script>
		;!function(){
			laydate({
				elem: '#demo'
			})
		}();
	</script>
	<script src="/Public/Admin/js/sdmenu.js"></script>
	<script>
		$().ready(function(){
			var date = new Date();
			var dateStr = date.getFullYear()+'-';
			var month = date.getMonth()+ 1;
			if(month < 10){
				month = '0'+month;
			}
			dateStr += month + '-';

			var day = date.getDate();
			if(day < 10){
				day = '0' + day;
			}
			dateStr += day;
//		alert(dateStr);
$('#demo').val(dateStr);



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