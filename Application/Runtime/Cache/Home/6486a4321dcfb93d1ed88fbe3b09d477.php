<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="renderer" content="webkit">
    <title>Title</title>
    <link href="/Public/home/css/base.css" rel="stylesheet" type="text/css"/>
    <link href="/Public/home/css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="/Public/home/js/html5shiv.js"></script>
    <script src="/Public/home/js/respond.min.js"></script>
    <![endif]-->
    <script src="/Public/home/js/jquery-2.1.1.min.js"></script>
    <script src="/Public/home/js/item.js"></script>
    <script src="/Public/home/js/bootstrap.min.js"></script>
</head>
<body>


<!--头部 登录 注册区-->
<div class="nav-top">
    <div class="nav-top-center">
        <div class="nav-top-left">
            <img src="/Public/Home/images/iconphone.png" alt=""/>
            <a href="javascript:;" class="wx">手机网<i><img src="/Public/Home/images/rwmsj.png" alt="" /></i></a>
            <!--<a href="javascript:;">网站导航</a>-->
        </div>
        <div class="nav-top-right">

            <?php if(session('member_id')): ?><a href="<?php echo U('Member/Login/logout');?>">[退出]</a>
                <span>&nbsp;</span>
                <a href=":U('Member/Index/index')"><?php echo (session('member_name')); ?></a>
                <?php else: ?>
            <!--<a href="<?php echo U('Member/register');?>">[注册]</a>-->
            <!--<span>或</span>-->
            <!--<a href="<?php echo U('Member/login');?>">[登录]</a>-->
            <!--<span>请</span>-->
            <a href="<?php echo U('Member/Login/wechatLogin');?>"><img src="/Public/Home/images/icon32_wx_logo.png" style="width: 20px;margin-top:6px;margin-right:10px;" id="wx_log"></a>
                <span>微信登录</span><?php endif; ?>


            <!--<a href="/home/qq_log.php"><img src="/Public/Home/images/qq.png" style="width: 15px;margin-top:6px;margin-right:10px;" id="wx_log"></a>-->
        </div>
    </div>
</div>

<!--logo 搜索区-->
<div class="nav-topb">
    <div class="nav-topb-center">
        <div class="nav-topb-left">
            <a href="/"><img src="/Public/Home/images/logo.png" alt=""/><span>奉贤</span></a>
        </div>
        <div class="nav-topb-right">
            <div class="serh">
                <form action="<?php echo U('Search/index');?>" method="post">
                    <input type="text" name="search" placeholder="请输入搜索内容">
                    <button name="ss" type="submit" value=""><img src="/Public/Home/images/iconsearch.png" /></button>
                </form>
            </div>
        </div>
    </div>
</div>

<!--导航区-->
<div class="nav-topc">
    <div class="nav-topc-center">
        <div class="nav-topc-left">
            <a href="/">首页</a>
            <?php if(is_array($nav_data)): $i = 0; $__LIST__ = $nav_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U('/'.$vo['nav_url']);?>"><?php echo ($vo["nav_name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
</div>



<div class="cont">
    <!--左侧内容区-->
    <div class="contl">
    
        <!--面包屑导航-->
        <div class="navbred"><span>您当前的位置：</span><a href="index.php">首页</a>&gt;<span>养生</span></div>
                
                
        <!--选项按钮-->
        <div class="headbtn">
            <a href="javascript:;" id="btna" class="headbtnact">最新</a>
            <a href="javascript:;" id="btnb">推荐</a>
        </div>

        <!--选项 最新-->
        <div class="boxcont" id="areaa">
            <a href="detailfc.php"><div class="boxitem">
                <div class="imglimt"><img src="/Public/home/images/imgf02.jpg" alt="" /></div>
                <h2>南桥新城上海之鱼里的别墅 考虑别墅的你不要错过这 </h2>
                <h3><span>3室2厅</span><span>中层(共6层)</span><span>南向</span><span>建筑年代：2012</span></h3>
                <h4><span>南桥</span><span>锦绣路2580弄（近内环高架）</span></h4>
                <dl><dt>230<span>万</span></dt><dd>33333<span>元/平米</span></dd></dl>
                <dl><dt>96<span>平米</span></dt><dd>建筑面积</dd></dl>
            </div></a>
            
            <a href="detailfc.php"><div class="boxitem">
                <div class="imglimt"><img src="/Public/home/images/imgf01.jpg" alt="" /></div>
                <h2>南桥新城上海之鱼里的别墅 考虑别墅的你不要错过这 </h2>
                <h3><span>3室2厅</span><span>中层(共6层)</span><span>南向</span><span>建筑年代：2012</span></h3>
                <h4><span>海湾旅游区</span><span>海马路888弄666号</span></h4>
                <dl><dt>666<span>万</span></dt><dd>33333<span>元/平米</span></dd></dl>
                <dl><dt>266<span>平米</span></dt><dd>建筑面积</dd></dl>
            </div></a>
            
            <a href="detailfc.php"><div class="boxitem">
                <div class="imglimt"><img src="/Public/home/images/imgf02.jpg" alt="" /></div>
                <h2>南桥新城上海之鱼里的别墅 考虑别墅的你不要错过这 </h2>
                <h3><span>3室2厅</span><span>中层(共6层)</span><span>南向</span><span>建筑年代：2012</span></h3>
                <h4><span>南桥</span><span>锦绣路2580弄（近内环高架）</span></h4>
                <dl><dt>230<span>万</span></dt><dd>33333<span>元/平米</span></dd></dl>
                <dl><dt>96<span>平米</span></dt><dd>建筑面积</dd></dl>
            </div></a>
            
            <a href="detailfc.php"><div class="boxitem">
                <div class="imglimt"><img src="/Public/home/images/imgf02.jpg" alt="" /></div>
                <h2>南桥新城上海之鱼里的别墅 考虑别墅的你不要错过这 </h2>
                <h3><span>3室2厅</span><span>中层(共6层)</span><span>南向</span><span>建筑年代：2012</span></h3>
                <h4><span>南桥</span><span>锦绣路2580弄（近内环高架）</span></h4>
                <dl><dt>230<span>万</span></dt><dd>33333<span>元/平米</span></dd></dl>
                <dl><dt>96<span>平米</span></dt><dd>建筑面积</dd></dl>
            </div></a>
            
            <a href="detailfc.php"><div class="boxitem">
                <div class="imglimt"><img src="/Public/home/images/imgf01.jpg" alt="" /></div>
                <h2>南桥新城上海之鱼里的别墅 考虑别墅的你不要错过这 </h2>
                <h3><span>3室2厅</span><span>中层(共6层)</span><span>南向</span><span>建筑年代：2012</span></h3>
                <h4><span>海湾旅游区</span><span>海马路888弄666号</span></h4>
                <dl><dt>666<span>万</span></dt><dd>33333<span>元/平米</span></dd></dl>
                <dl><dt>266<span>平米</span></dt><dd>建筑面积</dd></dl>
            </div></a>
            
            
            
            
            <!--再显示10条-->
            <a href="javascript:;" class="showmore">再显示10条新闻</a>
            
        </div>
        

        <!--选项 推荐-->
        <div class="boxcont" id="areab" style="display:none;">
            <a href="detailfc.php"><div class="boxitem">
                <div class="imglimt"><img src="/Public/home/images/imgf01.jpg" alt="" /></div>
                <h2>南桥新城上海之鱼里的别墅 考虑别墅的你不要错过这 </h2>
                <h3><span>3室2厅</span><span>中层(共6层)</span><span>南向</span><span>建筑年代：2012</span></h3>
                <h4><span>海湾旅游区</span><span>海马路888弄666号</span></h4>
                <dl><dt>666<span>万</span></dt><dd>33333<span>元/平米</span></dd></dl>
                <dl><dt>266<span>平米</span></dt><dd>建筑面积</dd></dl>
            </div></a>
            <a href="detailfc.php"><div class="boxitem">
                <div class="imglimt"><img src="/Public/home/images/imgf01.jpg" alt="" /></div>
                <h2>南桥新城上海之鱼里的别墅 考虑别墅的你不要错过这 </h2>
                <h3><span>3室2厅</span><span>中层(共6层)</span><span>南向</span><span>建筑年代：2012</span></h3>
                <h4><span>海湾旅游区</span><span>海马路888弄666号</span></h4>
                <dl><dt>666<span>万</span></dt><dd>33333<span>元/平米</span></dd></dl>
                <dl><dt>266<span>平米</span></dt><dd>建筑面积</dd></dl>
            </div></a>
            <a href="detailfc.php"><div class="boxitem">
                <div class="imglimt"><img src="/Public/home/images/imgf01.jpg" alt="" /></div>
                <h2>南桥新城上海之鱼里的别墅 考虑别墅的你不要错过这 </h2>
                <h3><span>3室2厅</span><span>中层(共6层)</span><span>南向</span><span>建筑年代：2012</span></h3>
                <h4><span>海湾旅游区</span><span>海马路888弄666号</span></h4>
                <dl><dt>666<span>万</span></dt><dd>33333<span>元/平米</span></dd></dl>
                <dl><dt>266<span>平米</span></dt><dd>建筑面积</dd></dl>
            </div></a>
            
            <!--再显示10条-->
            <a href="javascript:;" class="showmore">再显示10条新闻</a>
            
        </div>
        
    </div>
    
    
    <!--右侧列表区-->
    <div class="contr">
        <h1>房产推荐榜</h1>
        
        <!--右侧列表区主推文章-->
        <div class="contlarta">
            <a href="javascript:;">
                <img src="/Public/home/images/imgf01.jpg" alt="" />
                <h2>南桥新城上海之鱼里鱼里的别墅...</h2>
                <h6><span>330万</span><span>166平米</span></h6>
                <h3><span>海湾旅游区</span><span>海马路888弄666号</span></h3>
            </a>
            
            <a href="javascript:;">
                <img src="/Public/home/images/imgf01.jpg" alt="" />
                <h2>南桥新城上海之鱼里鱼里的别墅...</h2>
                <h6><span>330万</span><span>166平米</span></h6>
                <h3><span>海湾旅游区</span><span>海马路888弄666号</span></h3>
            </a>
            
            <a href="javascript:;">
                <img src="/Public/home/images/imgf01.jpg" alt="" />
                <h2>南桥新城上海之鱼里鱼里的别墅...</h2>
                <h6><span>330万</span><span>166平米</span></h6>
                <h3><span>海湾旅游区</span><span>海马路888弄666号</span></h3>
            </a>
            <a href="javascript:;">
                <img src="/Public/home/images/imgf01.jpg" alt="" />
                <h2>南桥新城上海之鱼里鱼里的别墅...</h2>
                <h6><span>330万</span><span>166平米</span></h6>
                <h3><span>海湾旅游区</span><span>海马路888弄666号</span></h3>
            </a>
            <a href="javascript:;">
                <img src="/Public/home/images/imgf01.jpg" alt="" />
                <h2>南桥新城上海之鱼里鱼里的别墅...</h2>
                <h6><span>330万</span><span>166平米</span></h6>
                <h3><span>海湾旅游区</span><span>海马路888弄666号</span></h3>
            </a>
            <a href="javascript:;">
                <img src="/Public/home/images/imgf01.jpg" alt="" />
                <h2>南桥新城上海之鱼里鱼里的别墅...</h2>
                <h6><span>330万</span><span>166平米</span></h6>
                <h3><span>海湾旅游区</span><span>海马路888弄666号</span></h3>
            </a>
        </div>
    </div>
</div>


<div class="nav-footb col-sm-12 padlr">
    <div class="navfoot-center">
        <a href="<?php echo U('Custom/about');?>">关于社圈</a>&nbsp;|
        <a href="<?php echo U('Custom/joinUs');?>">加入我们</a>&nbsp;|
        <a href="<?php echo U('Custom/privacy');?>">隐私政策</a>&nbsp;|
        <a href="<?php echo U('Custom/ad');?>">广告服务</a>&nbsp;|
        <a href="<?php echo U('Custom/law');?>">法律声明</a>
    </div>
    <div class="navfootb-center">
        Copyright@2016-2017&nbsp;www.ishequan.cn All Rights Reserved.
    </div>
</div>
<script>
    (function(){
        var src = (document.location.protocol == "http:") ? "http://js.passport.qihucdn.com/11.0.1.js?bcc5ec07e29939b4c6dc2a929bcc0e9b":"https://jspassport.ssl.qhimg.com/11.0.1.js?bcc5ec07e29939b4c6dc2a929bcc0e9b";
        document.write('<script src="' + src + '" id="sozz"><\/script>');
    })();
</script>

</body>
</html>