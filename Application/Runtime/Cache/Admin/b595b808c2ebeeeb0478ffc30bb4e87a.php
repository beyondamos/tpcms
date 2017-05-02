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
	<script src="/Public/Admin/js/laydate/laydate.js"></script>
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
		
		<!-- 账号信息 -->
		<div class="boxi">
		
			<div class="boxil">
				<img src="/Public/Admin/images/iconhead.png" alt="" />
				<div>
					<h1><?php echo ($login_user_data["username"]); ?><span><?php echo ($role_info["role_name"]); ?></span></h1>
					<h4>登录次数：<?php echo (session('login_times')); ?><span>上次登录：<?php echo date('Y-m-d H:i:s',session('last_login_time')) ?> </span></h4>
					<h4 class="let3">登&nbsp;录&nbsp;IP：<?php echo long2ip(session('last_login_ip')) ?></h4>
					
					
					<div class="btnblue">
						<a href="<?php echo U('User/password');?>" class="btn btna">修改个人信息</a>
					</div>
				
				</div>
			</div>
			
			<div class="boxir">
				<div>
					<a href="javascript:;"><?php echo ($article_total); ?><br/><span>全部文章</span></a>
					<a href="<?php echo U('Article/checkListing');?>"><?php echo ($article_uncheck_num); ?><br/><span>未审核文章</span></a>
					<a href="javascript:;">4<br/><span>未审核留言</span></a>
					
				</div>
				<div style="clear:both;"></div>
				<div class="btnblue">
					<a href="<?php echo U('Article/listing');?>" class="btn btna">文章列表</a>
				</div>
			</div>
		</div>
		
		<!-- 系统信息 访问来源 -->
		<div class="boxii">
			
			<div class="boxil">
				<h1>系统信息</h1>
				<ul>
					<li><span>服务器操作系统：</span><span><?php echo ($server_data["os"]); ?></span></li>
					<li><span>Mysql版本：</span><span><?php echo ($server_data["mysql_version"]); ?></span></li>
					<li><span>Socket支持：</span><span><?php echo $server_data['is_socket'] == 1 ? '是' : '否'; ?></span></li>
					<li><span>GD版本：</span><span><?php echo ($server_data["gd"]["GD Version"]); ?></span></li>
					<li><span>上传文件：</span><span><?php echo ($server_data["upload"]); ?></span></li>
				</ul>
				<ul>
					<li><span>PHP版本：</span><span><?php echo ($server_data["php_version"]); ?></span></li>
					<li><span>Web服务器：</span><span><?php echo ($server_data["web"]); ?></span></li>
					<li><span>时区设置：</span><span><?php echo ($server_data["timezone"]); ?></span></li>
					<li><span>程序编码：</span><span>UTF-8</span></li>
					<li><span>服务器ip：</span><span><?php echo ($server_data["host_ip"]); ?></span></li>
				</ul>
				
			</div>
			
			<div class="boxirb">
				<h1>访问来源</h1>
				<div class="boxirbtn">
					<h2>访问量：86797</h2>
					<a href="javascript:;">查看</a>
					<a href="javascript:;">清理</a>
				</div>
				
				<!--饼图-->
				<div id="chartb"></div>
			</div>
		</div>
		
		<!-- 流量统计 -->
		<div class="boxi">
			<h1>流量统计</h1>
			
			<!-- 搜索区 -->
			<div class="boxoper">
				<a href="javascript:;">月</a>
				<a href="javascript:;">周</a>
				<a href="javascript:;" class="boxoper-act">日</a>
				
				<div class="boxoper-seh">
					<form action="" method="post">
						<button class="btn btn-default" type="submit"><img src="/Public/Admin/images/iconseh.png" /></button>
						<input type="text" id="day" class="form-control laydate-iconb">
						<img src="/Public/Admin/images/icon.png" alt="" />
						<select class="form-control">
							<option>5月</option>
							<option>4月</option>
							<option>3月</option>
							<option>2月</option>
							<option>1月</option>
						</select>
					</form>
				</div>
			</div>
			
			<!--曲线图-->
			<div id="chart"></div>
		</div>
		
		
		
		<script>
			$(function(){
				var act = $(".boxoper a");
				act.click(function(){
					$(this).addClass("boxoper-act").siblings().removeClass("boxoper-act");
				});
			});
		</script>


		
		<!-- 点击排行 -->
		<div class="boxi">
			<h1>点击排行</h1>
			
			<!-- 表格 左 -->
			<div class="boxiih">
				<table class="table table-hover boxtable">
					<thead>
						<tr>
							<th class="col-md-1 text-vm">序号</th>
							<th class="col-md-7 text-vm">标题</th>
							<th class="col-md-2 text-vm">分类</th>
							<th class="col-md-2 text-vm">发布者</th>
						</tr>
					</thead>
					<tbody>
						<?php if(is_array($article_data)): $i = 0; $__LIST__ = array_slice($article_data,0,5,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
							<td class="text-vm"><?php echo ($vo["article_id"]); ?></td>
							<td class="text-vm"><?php echo ($vo["title"]); ?></td>
							<td class="text-vm"><?php echo ($vo["cate_name"]); ?></td>
							<td class="text-vm"><?php echo ($vo["author"]); ?></td>
							</td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>
				</table>
			</div>
			
			<!-- 表格 右 -->
			<div class="boxiih mgl20">
				<table class="table table-hover boxtable">
					<thead>
						<tr>
							<th class="col-md-1 text-vm">序号</th>
							<th class="col-md-7 text-vm">标题</th>
							<th class="col-md-2 text-vm">分类</th>
							<th class="col-md-2 text-vm">发布者</th>
						</tr>
					</thead>
					<tbody>
					<?php if(is_array($article_data)): $i = 0; $__LIST__ = array_slice($article_data,5,5,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
							<td class="text-vm"><?php echo ($vo["article_id"]); ?></td>
							<td class="text-vm"><?php echo ($vo["title"]); ?></td>
							<td class="text-vm"><?php echo ($vo["cate_name"]); ?></td>
							<td class="text-vm"><?php echo ($vo["author"]); ?></td>
							</td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>
				</table>
			</div>
			
			
			<!-- 分页 -->
			<div style="clear:both;"></div>
			<!--<div class="boxpage">-->
				<!--<a href="javascript:;"><span class="glyphicon glyphicon-step-backward" aria-hidden="true"></span></a>-->
				<!--<a href="javascript:;"><span class="glyphicon glyphicon-backward" aria-hidden="true"></span></a>-->
				<!--<a href="javascript:;">1</a>-->
				<!--<a href="javascript:;">2</a>-->
				<!--<a href="javascript:;" class="boxpage-act">3</a>-->
				<!--<a href="javascript:;">4</a>-->
				<!--<a href="javascript:;">5</a>-->
				<!--<a href="javascript:;"><span class="glyphicon glyphicon-forward" aria-hidden="true"></span></a>-->
				<!--<a href="javascript:;"><span class="glyphicon glyphicon-step-forward" aria-hidden="true"></span></a>-->
			<!--</div>-->
			<?php echo ($show); ?>
		</div>
		
		
		
	
	</div>
</div>
<script src="/Public/Admin/js/sdmenu.js"></script>

<script src="/Public/Admin/js/echarts.min.js"></script>
<script type="text/javascript">
	var myChart = echarts.init(document.getElementById('chart'));
	var option = {
    tooltip : {
        trigger: 'axis',
        axisPointer: {
            type: 'cross',
            label: {
                backgroundColor: '#6a7985'
            }
        }
    },
    legend: {
        data:['今日','昨日']
    },


    grid: {
        left: '3%',
        right: '4%',
        bottom: '3%',
        containLabel: true
    },
    xAxis : [
        {
            type : 'category',
            boundaryGap : false,
            data : ['0:00','2:00','4:00','6:00','8:00','10:00','12:00','14:00','16:00','18:00','20:00','22:00','24:00']
        }
    ],
    yAxis : [
        {
            type : 'value'
        }
    ],
    series : [
        {
            name:'今日',
            type:'line',
			smooth:'true',//折线变平滑
            stack: '总量',
			itemStyle : {  
				normal : {  
					color:'#73BEE8',  //点的颜色 与线条颜色相同 则为空心白点
					lineStyle:{  
						color:'#73BEE8'  //折线颜色
					} ,
					areaStyle: {
						normal: {},
						color:'#f8fbfa'  //折线填充颜色
					}
				}  
			},  
            data:[120, 132, 101, 134, 90, 230, 210, 332, 301, 334, 390, 330, 320]
        },
       
       
        {
            name:'昨日',
            type:'line',
            stack: '总量',
            	itemStyle : {  
				normal : {  
					color:'#86c842',  
					lineStyle:{  
						color:'#86c842'  
					} ,
					areaStyle: {
						normal: {},
						color:'#f8fbfa'  
					}
				}  
			},  
            data:[320, 332, 301, 334, 390, 330, 320, 134, 90, 230, 210, 332, 301]
        }
    ]
};
	myChart.setOption(option);
</script>



<script type="text/javascript">
	var myChart = echarts.init(document.getElementById('chartb'));
	var option = {
    title : {
        x:'center'
    },
    tooltip : {
        trigger: 'item',
        formatter: "{a} <br/>{b} : {c} ({d}%)"
    },
    legend: {
        orient: 'vertical',
        left: 'left',
        data: ['北京','上海','广州','深圳','四川']
    },
    series : [
        {
            name: '访问来源',
            type: 'pie',
            radius : '75%',
            center: ['50%', '50%'],
            data:[
                {value:335, name:'北京'},
                {value:310, name:'上海'},
                {value:234, name:'广州'},
                {value:135, name:'深圳'},
                {value:1548, name:'四川'}
            ],
            itemStyle: {
                emphasis: {
                    shadowBlur: 10,
                    shadowOffsetX: 0,
                    shadowColor: 'rgba(0, 0, 0, 0.5)'
                }
            }
        }
    ]
};
	myChart.setOption(option);
</script>


<script>
	;!function(){
		laydate({
		   elem: '#day'
		})
	}();
</script>

</body>
</html>