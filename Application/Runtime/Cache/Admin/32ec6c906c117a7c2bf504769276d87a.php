<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<head>
	<title>Login One</title>
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
			<form class="form-horizontal templatemo-container templatemo-login-form-1 margin-bottom-30" role="form" action="#" method="post">				
				<div class="form-group">
					<div class="col-xs-12">		            
						<div class="control-wrapper">
							<label for="username" class="control-label fa-label"><i class="glyphicon glyphicon-user"></i></label>
							<input type="text" class="form-control" id="username" placeholder="Username">
						</div>		            	            
					</div>              
				</div>
				<div class="form-group">
					<div class="col-md-12">
						<div class="control-wrapper">
							<label for="password" class="control-label fa-label"><i class="glyphicon glyphicon-lock"></i></label>
							<input type="password" class="form-control" id="password" placeholder="Password">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-12">
						<div class="control-wrapper">
							<label for="verify" class="control-label fa-label"><i class="glyphicon glyphicon-check"></i></label>
							<input type="text" class="form-control" id="verify" placeholder="verify"><br />
							<img src="/Public/Admin/images/1.png" alt="" width="150" height="50">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-12">
						<div class="checkbox control-wrapper">
							<label>
								<input type="checkbox"> Remember me
							</label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-12">
						<div class="control-wrapper">
							<button type="submit" id="login" class="btn btn-info"> 登录</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
</html>