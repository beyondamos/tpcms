<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
	<title>后台管理系统登录</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="/Public/Admin/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="/Public/Admin/lib/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
	<link href="/Public/Admin/css/templatemo_style.css" rel="stylesheet" type="text/css">	
</head>
<body class="templatemo-bg-gray">
	<div class="container">
		<div class="col-md-12">
			<h1 class="margin-bottom-15">后台登录</h1>
			<form class="form-horizontal templatemo-container templatemo-login-form-1 margin-bottom-30" role="form" action="<?php echo U('Login/index');?>" method="post">				
				<div class="form-group">
					<div class="col-xs-12">		            
						<div class="control-wrapper">
							<label for="username" class="control-label fa-label"><i class="glyphicon glyphicon-user"></i></label>
							<input  class="form-control" id="username" placeholder="Username" name="username">
						</div>		            	            
					</div>              
				</div>
				<div class="form-group">
					<div class="col-md-12">
						<div class="control-wrapper">
							<label for="password" class="control-label fa-label"><i class="glyphicon glyphicon-lock"></i></label>
							<input type="password" class="form-control" id="password" placeholder="Password" name="password">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-12">
						<div class="control-wrapper">
							<label for="verify" class="control-label fa-label"><i class="glyphicon glyphicon-check"></i></label>
							<input class="form-control" id="verify" placeholder="verify" name="verify"><br />
							<img src="<?php echo U('Login/verify');?>" id="verify_img" alt="" width="150" height="50">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-12">
						<div class="checkbox control-wrapper">
							<label>
								<input type="checkbox" name="is_remeber"> Remember me
							</label>
						</div>
					</div>
				</div>
				</form>
					<div class="col-md-4 col-md-offset-3">
						<div class="control-wrapper">
							<p class="error"></p>
							<button id="login" class="btn btn-info"> 登录</button>
						</div>
					</div>

			
		</div>
	</div>
	<script src="/Public/Admin/lib/jquery/jquery-1.11.3.js"></script>
	<script src="/Public/Admin/lib/bootstrap/js/bootstrap.min.js"></script>
	<script>
		$().ready(function(){
			//点击更换验证码
			$("#verify_img").click(function(){
				$(this).attr('src','<?php echo U('Login/verify');?>' + '?_=' + $.now());
			});

			//登录
			$('#login').click(function(){
				var username = $('#username').val();
				var password = $('#password').val();
				var verify = $("#verify").val();
				//验证码为空
				if(verify == ''){
					alert('验证码不能为空');
					return false;
				}
				if(username == ''){
					alert('用户名不能为空');
					return false;
				}
				if(password == ''){
					alert('密码不能为空');
					return false;
				}

				$.post(
					"<?php echo U('Admin/Login/index');?>",
					{'username': username, 'password' : password , 'verify' : verify },
					function(data){
						// alert(data.error);
						if(data.status == 0){
							$('.error').html(data.error);
							return false;
						}
						if(data.status == 1){
							location.href = "<?php echo U('Admin/Index/index');?>";
						}
					},'json'
				);
			});
		});
	</script>
</body>
</html>