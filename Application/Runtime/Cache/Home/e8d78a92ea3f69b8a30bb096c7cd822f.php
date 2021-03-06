<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="renderer" content="webkit">
    <title><?php echo ($fangchan_data["name"]); ?></title>
    <link href="/Public/home/css/base.css" rel="stylesheet" type="text/css"/>
    <!--[if lt IE 9]>
    <script src="/Public/home/js/html5shiv.js"></script>
    <script src="/Public/home/js/respond.min.js"></script>
    <![endif]-->
    <script src="/Public/home/js/jquery-2.1.1.min.js"></script>
    <script src="/Public/home/js/jqueryPhoto.js"></script>
    <!--引用百度地图API-->
    <style type="text/css">
        html,body{margin:0;padding:0;}
        .iw_poi_title {color:#CC5522;font-size:14px;font-weight:bold;overflow:hidden;padding-right:13px;white-space:nowrap}
        .iw_poi_content {font:12px arial,sans-serif;overflow:visible;padding-top:4px;white-space:-moz-pre-wrap;word-wrap:break-word}
    </style>
    <script type="text/javascript" src="http://api.map.baidu.com/api?key=&v=1.1&services=true"></script>
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
            <div class="navbred"><span>您当前的位置：</span><a href="/">首页</a>&gt;<span>房产</span></div>


            <!--文章-->
            <div class="arti">

                <!--文章标题区-->
                <div class="artitle">
                    <h1><?php echo ($fangchan_data["name"]); ?></h1>
                    <h4>房源编号：<?php echo ($fangchan_data["num"]); ?>&nbsp;&nbsp;&nbsp;发布时间：<?php echo ($fangchan_data["createtime"]); ?></h4>
                </div>

                <!-- 展示 -->
                <div class="boxfc">
                    <div class="inkPhoBox">
                        <div class="mod18">
                            <span id="prevTop" class="btn prev"></span>
                            <span id="nextTop" class="btn next"></span>
                            <div class="bigImgBox">
                                <div id="picBox" class="picBox">
                                    <ul class="cf">
                                        <li><img src="<?php echo ($fangchan_data["titleimg"]); ?>" width="340" height="210"></li>
                                        <li><img src="/Public/Home/images/imgf01.jpg" width="340" height="210"></li>
                                        <li><img src="/Public/Home/images/imgf03.jpg" width="340" height="210"></li>
                                        <li><img src="/Public/Home/images/imgf02.jpg" width="340" height="210"></li>
                                        <li><img src="/Public/Home/images/imgf01.jpg" width="340" height="210"></li>
                                        <li><img src="/Public/Home/images/imgf01.jpg" width="340" height="210"></li>
                                        <li><img src="/Public/Home/images/imgf01.jpg" width="340" height="210"></li>
                                        <li><img src="/Public/Home/images/imgf01.jpg" width="340" height="210"></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="smImgBox">
                                <span id="prev" class="btn prev"></span>
                                <span id="next" class="btn next"></span>
                                <div id="listBox" class="listBox">
                                    <ul class="cf">
                                        <li class="on"><img src="<?php echo ($fangchan_data["titleimg"]); ?>" width="113" height="82"></li>
                                        <li><img src="<?php echo ($fangchan_data["titleimg"]); ?>" width="113" height="82"></li>
                                        <li><img src="/Public/Home/images/imgf03.jpg" width="113" height="82"></li>
                                        <li><img src="/Public/Home/images/imgf02.jpg" width="113" height="82"></li>
                                        <li><img src="/Public/Home/images/imgf01.jpg" width="113" height="82"></li>
                                        <li><img src="/Public/Home/images/imgf01.jpg" width="113" height="82"></li>
                                        <li><img src="/Public/Home/images/imgf01.jpg" width="113" height="82"></li>
                                        <li><img src="/Public/Home/images/imgf01.jpg" width="113" height="82"></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="boxfcdtr">
                        <h2><span><?php echo ($fangchan_data["total"]); ?></span>万&nbsp;|&nbsp;<?php echo ($fangchan_data["unitprice"]); ?>元/平米</h2>
                        <h3>户&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;型：<span><?php echo ($fangchan_data["housetype"]); ?></span></h3>
                        <h3>面&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;积：<span><?php echo ($fangchan_data["area"]); ?></span></h3>
                        <h3>朝&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;向：<span><?php echo ($fangchan_data["direction"]); ?></span></h3>
                        <h3>楼&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;层：<span><?php echo ($fangchan_data["floor"]); ?></span></h3>
                        <h3>房屋类型：<span><?php echo ($fangchan_data["type"]); ?></span></h3>
                        <h3>电梯情况：<span><?php echo ($fangchan_data["lift"]); ?></span></h3>
                        <h3>建筑年代：<span><?php echo ($fangchan_data["builttime"]); ?></span></h3>
                        <h3>房屋性质：<span><?php echo ($fangchan_data["nature"]); ?></span></h3>
                        <h3>产&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;权：<span><?php echo ($fangchan_data["property_right"]); ?></span></h3>
                        <h3>装修情况：<span><?php echo ($fangchan_data["decoration"]); ?></span></h3>
                        <h4>小区名称：<span><?php echo ($fangchan_data["compound_name"]); ?></span></h4>
                        <h4>所在地址：<span><?php echo ($fangchan_data["address"]); ?></span></h4>
                        <h5><img src="/Public/Home/images/phone.png" alt=""/><?php echo ($fangchan_data["phone"]); ?></h5>
                    </div>
                    <div class="boxfcdt">
                        <div class="boxloc" id="sticky">
                            <a href="javascript:;" class="locfca">房源信息</a>
                            <a href="javascript:;" class="locfcb">房源图片</a>
                            <a href="javascript:;" class="locfcc">房源地址</a>
                        </div>

                        <i class="locfcap"></i><br/>

                        <?php echo ($fangchan_data["content"]); ?>

<!--                         <h2>房屋描述</h2>
                        <h3>房子是总高3楼的3楼 房卡面积31.5平 是前楼朝南22平 亭子间9.5平 灶卫二家合用 ！房子不错 可以先看看再比较！投资价值非常高！</h3>
                        <h2>业主心态</h2>
                        <h3>业主因给儿子置换婚房房屋 忍痛割爱 诚意出售！</h3>
                        <h2>小区配套</h2>
                        <h3>虹口三小 复兴中学 各大银行 交通便捷！</h3>
                        <h2>服务介绍</h2>
                        <h3>经纪人服务：过户代办、置换服务、全程代办</h3>
                        <h3>收取服务费：最高42000元（≤1.50%）</h3>
                        <h3>从事15年房地产经纪 一直秉承“诚实、守信、客户第一”理念为宗旨用心、细心服务！</h3>

                        <i class="locfcbp"></i><br/>
                        <img src="/Public/Home/images/imgf02.jpg" alt="" />
                        <img src="/Public/Home/images/imgf01.jpg" alt="" />
                        <img src="/Public/Home/images/imgf02.jpg" alt="" />
                        <img src="/Public/Home/images/imgf01.jpg" alt="" />

                        <i class="locfccp"></i>-->
                        <!--百度地图容器-->
                        <!-- <div class="boxmapcont"><div id="dituContent"></div></div>  -->
                    </div>

                </div><!-- 展示 end-->


            </div>  


            <!--相关推荐-->
            <div class="artsug">
                <h1>相关推荐</h1>
                <?php if(is_array($relation_data)): $i = 0; $__LIST__ = $relation_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Home/Fangchan/detail', array('id' => $vo['id']));?>">
                    <div class="imglimtb"><img src="<?php echo ($vo["titleimg"]); ?>" alt="" /></div>
                    <?php echo ($vo["name"]); ?>
                    <h3><?php echo ($vo["createtime"]); ?></h3>
                </a><?php endforeach; endif; else: echo "" ;endif; ?> 
            </div>
        </div>


        <!--右侧列表区-->
        <div class="contr">
            <h1>房产推荐榜</h1>

            <!--右侧列表区主推文章-->
            <div class="contlarta">
                <?php if(is_array($ranking_list)): $i = 0; $__LIST__ = $ranking_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Home/Fangchan/detail', array('id' => $vo['id']));?>">
                        <img src="<?php echo ($vo["titleimg"]); ?>" alt="" />
                        <h2><?php echo ($vo["name"]); ?></h2>
                        <h6><span><?php echo ($vo["total"]); ?>万</span><span><?php echo ($vo["area"]); ?>平方</span></h6>
                        <h3><span><?php echo ($vo["address"]); ?></span></h3>
                    </a><?php endforeach; endif; else: echo "" ;endif; ?>
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


    <script type="text/javascript">
    //创建和初始化地图函数：
    function initMap(){
        createMap();//创建地图
        setMapEvent();//设置地图事件
        addMapControl();//向地图添加控件
        addMarker();//向地图中添加marker
    }
    
    //创建地图函数：
    function createMap(){
        var map = new BMap.Map("dituContent");//在百度地图容器中创建一个地图
        var point = new BMap.Point(121.448501,30.926478);//定义一个中心点坐标
        map.centerAndZoom(point,17);//设定地图的中心点和坐标并将地图显示在地图容器中
        window.map = map;//将map变量存储在全局
    }
    
    //地图事件设置函数：
    function setMapEvent(){
        map.enableDragging();//启用地图拖拽事件，默认启用(可不写)
        map.enableScrollWheelZoom();//启用地图滚轮放大缩小
        map.enableDoubleClickZoom();//启用鼠标双击放大，默认启用(可不写)
        map.enableKeyboard();//启用键盘上下左右键移动地图
    }
    
    //地图控件添加函数：
    function addMapControl(){
    }
    
    //标注点数组
    var markerArr = [{title:"南桥新城上海之鱼",content:"南桥新城上海之鱼",point:"121.449226|30.926385",isOpen:1,icon:{w:23,h:25,l:23,t:21,x:9,lb:12}}
    ];
    //创建marker
    function addMarker(){
        for(var i=0;i<markerArr.length;i++){
            var json = markerArr[i];
            var p0 = json.point.split("|")[0];
            var p1 = json.point.split("|")[1];
            var point = new BMap.Point(p0,p1);
            var iconImg = createIcon(json.icon);
            var marker = new BMap.Marker(point,{icon:iconImg});
            var iw = createInfoWindow(i);
            var label = new BMap.Label(json.title,{"offset":new BMap.Size(json.icon.lb-json.icon.x+10,-20)});
            marker.setLabel(label);
            map.addOverlay(marker);
            label.setStyle({
                borderColor:"#808080",
                color:"#333",
                cursor:"pointer"
            });
            
            (function(){
                var index = i;
                var _iw = createInfoWindow(i);
                var _marker = marker;
                _marker.addEventListener("click",function(){
                    this.openInfoWindow(_iw);
                });
                _iw.addEventListener("open",function(){
                    _marker.getLabel().hide();
                })
                _iw.addEventListener("close",function(){
                    _marker.getLabel().show();
                })
                label.addEventListener("click",function(){
                    _marker.openInfoWindow(_iw);
                })
                if(!!json.isOpen){
                    label.hide();
                    _marker.openInfoWindow(_iw);
                }
            })()
        }
    }
    //创建InfoWindow
    function createInfoWindow(i){
        var json = markerArr[i];
        var iw = new BMap.InfoWindow("<b class='iw_poi_title' title='" + json.title + "'>" + json.title + "</b><div class='iw_poi_content'>"+json.content+"</div>");
        return iw;
    }
    //创建一个Icon
    function createIcon(json){
        var icon = new BMap.Icon("http://app.baidu.com/map/images/us_mk_icon.png", new BMap.Size(json.w,json.h),{imageOffset: new BMap.Size(-json.l,-json.t),infoWindowOffset:new BMap.Size(json.lb+5,1),offset:new BMap.Size(json.x,json.h)})
        return icon;
    }
    
    initMap();//创建和初始化地图
</script>


</body>
</html>