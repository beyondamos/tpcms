<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="renderer" content="webkit">
    <title><?php echo ($site_title); ?></title>
    <meta name="keywords" content="<?php echo ($site_keywords); ?>"/>
    <meta name="description" content="<?php echo ($site_desc); ?>"/>
    <link href="/Public/Home/css/base.css" rel="stylesheet" type="text/css"/>
    <link href="/Public/Home/css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="/Public/Home/js/html5shiv.js"></script>
    <script src="/Public/Home/js/respond.min.js"></script>
    <![endif]-->
    <script src="/Public/Home/js/jquery-2.1.1.min.js"></script>
    <script src="/Public/Home/js/bootstrap.min.js"></script>
</head>
<body style="background-color:#F2F2F2;">

<!--头部模块-->

<!--头部 登录 注册区-->
<div class="nav-top">
    <div class="nav-top-center">
        <div class="nav-top-left">
            <img src="/Public/Home/images/iconphone.png" alt=""/>
            <a href="javascript:;" class="wx">手机网<i><img src="/Public/Home/images/rwmsj.png" alt="" /></i></a>
            <!--<a href="javascript:;">网站导航</a>-->
        </div>
        <div class="nav-top-right">

            <?php if(session('member_id')): ?><a href="<?php echo U('Member/logout');?>">[退出]</a>
                <span>&nbsp;</span>
                <a href=""><?php echo (session('member_name')); ?></a>
                <?php else: ?>
            <a href="<?php echo U('Member/register');?>">[注册]</a>
            <span>或</span>
            <a href="<?php echo U('Member/login');?>">[登录]</a>
            <span>请</span>
            <a href="<?php echo U('Member/wechatLogin');?>"><img src="/Public/Home/images/icon32_wx_logo.png" style="width: 20px;margin-top:6px;margin-right:10px;" id="wx_log"></a><?php endif; ?>


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

    <!--面包屑导航-->
    <div class="navbred"><span>您当前的位置：</span><a href="/">首页</a></div>

    <!--第一块 内容-->
    <div class="contlr">

        <!--第一块左侧-->
        <div class="contlb">

            <!--轮播图 城市生活向导-->
            <div class="contlba-news">

                <div class="contlba-img"><a href="javascript:;"><img alt="" src="/Public/Home/images/advv.jpg" /></a></div>

                <!--轮播图-->
                <div class="carousel slide" id="carousel-example"  data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li class="active" data-slide-to="0" data-target="#carousel-example"></li>
                        <li data-slide-to="1" data-target="#carousel-example"></li>
                        <li data-slide-to="2" data-target="#carousel-example"></li>
                        <li data-slide-to="3" data-target="#carousel-example"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="item active"><a href="#"><img alt="" src="/Public/Home/images/imgi6.jpg" /></a></div>
                        <div class="item"><a href="#"><img alt="" src="/Public/Home/images/imgi7.jpg" /></a></div>
                        <div class="item"><a href="#"><img alt="" src="/Public/Home/images/imgi8.jpg" /></a></div>
                        <div class="item"><a href="javascript:;"><img alt="" src="/Public/Home/images/imgi1.jpg" /></a></div>
                    </div>

                    <a class="left carousel-control" href="#carousel-example" data-slide="prev"></a>
                    <a class="right carousel-control" href="#carousel-example" role="button" data-slide="next"></a>
                </div>

                <!--轮播图 end-->

                <h1>城市生活向导</h1>

                <a href="#"><h2><span>[居家]</span>肉丸加工黑窝点被捣毁恶臭肉糜</h2></a>
                <a href="#"><h2><span>[养生]</span>假盐流入广州涉嫌食品安全犯罪犯罪</h2></a>
                <a href="#"><h2><span>[养生]</span>上海多家“问题鲜奶吧”再上榜问题鲜奶</h2></a>
                <a href="#"><h2><span>[养生]</span>熟牛肉变合成牛肉 肉里有玄机</h2></a>
                <a href="#"><h2><span>[养生]</span>给孩子订品牌牛奶 学犯罪杂牌犯罪犯罪</h2></a>
            </div><!--城市生活向导 end-->

            <!--城市生活向导 右侧-->
            <div class="contlbar-news">
                <a href="#"><h4>才住了十天，房子竟然被卖了！人心怎么能这么黑！</h4><h5>2016年6月我刚毕业的时候，在网上找到了一个免费中介，房源是复兴北苑6幢2单元701。看了房子后觉得很满意，而且中介把房产证，他以前的工作...</h5></a>
                <a href="#"><h4>自建房和别墅用户机会来了，让太阳</h4><h5>自建房和别墅用户可零成本安装光伏发电啦 安装屋顶式光伏电站的收益=节省的电费+余电售价+政府补贴 补贴为（国家补...</h5></a>

                <a href="#"><h2><span>[居家]</span>问下刷银行卡的刷卡机有谁知道怎么安装吗</h2></a>
                <a href="#"><h2><span>[养生]</span>想买一拖拉机种菜的泥土</h2></a>
                <a href="#"><h2><span>[养生]</span>自建房和别墅用户机会来了，让太阳让你打工，让屋顶为你赚钱</h2></a>
                <a href="#"><h2><span>[养生]</span>冬季慢阻肺的注意事项</h2></a>
                <a href="#"><h2><span>[养生]</span>阻肺为什么会有贫穷病之说</h2></a>
                <a href="#"><h2><span>[养生]</span>阻肺为什么会有贫穷病之说</h2></a>
                <hr>
                <a href="#"><h2><span>[居家]</span>问下刷银行卡的刷卡机有谁知道怎么安装吗</h2></a>
                <a href="#"><h2><span>[养生]</span>想买一拖拉机种菜的泥土</h2></a>
                <a href="#"><h2><span>[养生]</span>自建房和别墅用户机会来了，让太阳让你打工，让屋顶为你赚钱</h2></a>
                <a href="#"><h2><span>[养生]</span>冬季慢阻肺的注意事项</h2></a>
                <a href="#"><h2><span>[养生]</span>阻肺为什么会有贫穷病之说</h2></a>
            </div><!--城市生活向导 右侧 end-->

        </div><!--第一块左侧 end-->


        <!--第一块右侧-->
        <div class="contrb">

            <!--我要发帖-->
            <div class="contrb-pub">
                <h1>我要投稿</h1>
                <a href="topicpre.php">全民爆料</a>
            </div><!--我要发帖 end-->


            <!--生活馆专享-->
            <div class="contrb-lb">

                <h1>生活馆专享</h1>

                <?php echo htmlspecialchars_decode($life_adv);?>

            </div><!--生活馆专享 end-->

            <!--今日热点-->
            <div class="contrb-news">

                <h1>今日热点</h1>

                <a href="#"><img src="/Public/Home/images/imgi1.jpg" alt="" /><h2>查处一豆腐黑作坊</h2><h3>有人非法生产加工豆制品，臭味很浓。</h3></a>
                <a href="#"><h2><span>[居家]</span>肉丸加工黑窝点被捣毁恶臭肉糜</h2></a>
                <a href="#"><h2><span>[养生]</span>假盐流入广州涉嫌食品安全犯罪犯罪</h2></a>
                <a href="#"><h2><span>[养生]</span>上海多家“问题鲜奶吧”再上榜问题鲜奶</h2></a>
                <a href="#"><h2><span>[养生]</span>熟牛肉变合成牛肉 肉里有玄机</h2></a>
                <a href="#"><h2><span>[养生]</span>给孩子订品牌牛奶 学犯罪杂牌犯罪犯罪</h2></a>
            </div><!--今日热点 end-->
        </div><!--第一块右侧 end-->
    </div>	<!--第一块 内容 end-->


    <!--广告-->
    <div class="advi">
        <?php echo htmlspecialchars_decode($adv_1);?>
    </div><!--广告 end-->


    <!--第二块 内容-->
    <div class="contii">

        <h1>我们爱生活</h1>

        <div class="contiiimg">
            <a href="#"><img src="/Public/Home/images/imgi1.jpg" alt="" /><span>红薯的吃法</span></a>
            <a href="#"><img src="/Public/Home/images/imgi2.jpg" alt="" /><span>红薯的吃法</span></a>
            <a href="#"><img src="/Public/Home/images/imgi3.jpg" alt="" /><span>红薯的吃法</span></a>
            <a href="#"><img src="/Public/Home/images/imgi4.jpg" alt="" /><span>红薯的吃法</span></a>
        </div>

        <div class="contiimd">
            <a href="#"><img src="/Public/Home/images/imgi0.jpg" alt="" /><span>红薯的吃法</span></a>
        </div>

        <div class="contiiimg">
            <a href="#"><img src="/Public/Home/images/imgi5.jpg" alt="" /><span>红薯的吃法</span></a>
            <a href="#"><img src="/Public/Home/images/imgi6.jpg" alt="" /><span>红薯的吃法</span></a>
            <a href="#"><img src="/Public/Home/images/imgi7.jpg" alt="" /><span>红薯的吃法</span></a>
            <a href="#"><img src="/Public/Home/images/imgi8.jpg" alt="" /><span>红薯的吃法</span></a>
        </div>
    </div><!--第二块 内容 end-->


    <!--广告-->
    <div class="advi">
        <?php echo htmlspecialchars_decode($adv_2);?>
    </div><!--广告 end-->

    <!--第三块 内容-->
    <div class="contiii">
        <div class="contiiil">

            <h1>玩圈子</h1>

            <a href="#"><img src="/Public/Home/images/imgicon1.jpg" alt="" /><h2>这些菜根其实是宝贝</h2><h3>一些看似不起眼的小东西对健康也有较大的影响，例如，菜根。</h3></a>
            <a href="#"><img src="/Public/Home/images/imgicon2.jpg" alt="" /><h2>这些菜根其实是宝贝</h2><h3>一些看似不起眼的小东西对健康也有较大的影响，例如，菜根。</h3></a>
            <a href="#"><img src="/Public/Home/images/imgicon3.jpg" alt="" /><h2>这些菜根其实是宝贝</h2><h3>一些看似不起眼的小东西对健康也有较大的影响，例如，菜根。</h3></a>
            <a href="#"><img src="/Public/Home/images/imgicon4.jpg" alt="" /><h2>这些菜根其实是宝贝</h2><h3>一些看似不起眼的小东西对健康也有较大的影响，例如，菜根。</h3></a>
        </div>

        <div class="contiiim">

            <h1>全民运动</h1>

            <a href="#"><img src="/Public/Home/images/imgi1.jpg" alt="" /><h2>在家能自学瑜伽健身吗</h2><h3>瑜伽运动我们一般都是在健身馆学习的，那么如果我们忙的没有时间去健身馆该怎么办呢，在家学。</h3></a>
            <a href="#"><img src="/Public/Home/images/imgi2.jpg" alt="" /><h2>在家如何健身 避免家庭健身误区</h2><h3>现在很多人都是坐在办公室里的，很多时候会出现各种身体状况，那么对于这种情况我们应该怎么办呢?</h3></a>
            <a href="#"><img src="/Public/Home/images/imgi3.jpg" alt="" /><h2>瑜伽怎么练才能减肥 瑜伽的减肥方法</h2><h3>瑜伽是时下很流行的运动，我们也知道瑜伽运动可以帮助我们减肥，但是我们并不知道瑜伽怎么做可以减肥。</h3></a>
            <a href="#"><img src="/Public/Home/images/imgi4.jpg" alt="" /><h2>跑酷运动的注意事项</h2><h3>跑酷我们对于这种运动其实并不是很熟悉，这种运动流行于欧美，这类运动危险性稍微有点大。</h3></a>
        </div>

        <div class="contiiir">

            <h1>旅行度假</h1>

            <a href="#"><img src="/Public/Home/images/imgi1.jpg" alt="" /><h2>这些菜根其实是宝贝</h2><h3>一些看似不起眼的小东西对健康也有较大的影响，例如，菜根。</h3></a>
            <a href="#"><h2><span></span>孕妇安全旅游六大技巧安全旅游六大技巧</h2></a>
            <a href="#"><h2><span></span>欧洲旅游五大注意事项五大注意事项</h2></a>
            <a href="#"><h2><span></span>旅游乘火车的小贴士火车的小贴士</h2></a>
            <a href="#"><h2><span></span>解密世界10大旅游禁地</h2></a>
            <a href="#"><h2><span></span>孕妇安全旅游六火车的小贴士火车的小贴士</h2></a>
            <a href="#"><h2><span></span>欧洲旅游五大注意事项五大注意事项</h2></a>
            <a href="#"><h2><span></span>旅游乘火车的小贴士火车的小贴士</h2></a>
            <a href="#"><h2><span></span>解密世界10大旅游禁地</h2></a>
        </div>
    </div><!--第三块 内容 end-->

    <!--广告-->
    <div class="advi">
        <?php echo htmlspecialchars_decode($adv_3);?>
    </div><!--广告 end-->

    <!--第四块 内容-->
    <div class="contiiii">

        <h1>热门推荐</h1>

        <div class="contiiiil">
            <a href="#"><img src="/Public/Home/images/imgh4.jpg" alt="" /></a>
            <a href="#"><img src="/Public/Home/images/imgh3.jpg" alt="" /></a>
            <a href="#"><img src="/Public/Home/images/imgh1.jpg" alt="" /></a>
            <a href="#"><img src="/Public/Home/images/imgh2.jpg" alt="" /></a>
        </div>

        <div class="contiiiir">
            <a href="#"><img src="/Public/Home/images/imgh5.jpg" alt="" /></a>
            <a href="#"><img src="/Public/Home/images/imgh5.jpg" alt="" /></a>
        </div>
    </div><!--第四块 内容 end-->

    <!--友情链接-->
    <div class="contfrl">
        <h1>友情链接</h1>
        <?php if(is_array($friendlink_data)): $i = 0; $__LIST__ = $friendlink_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["url_name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>

    </div><!--友情链接 end-->
</div>
<div style="clear:both;"></div>

<!--底部模块-->
<div class="nav-footb col-sm-12 padlr">
    <div class="navfoot-center">
        <a href="aboutus.php">关于社区</a>&nbsp;|
        <a href="javascript:;">服务协议</a>&nbsp;|
        <a href="javascript:;">隐私政策</a>&nbsp;|
        <a href="javascript:;">广告服务</a>&nbsp;|
        <a href="javascript:;">客户中心</a>&nbsp;|
        <a href="javascript:;">网站导航</a>&nbsp;|
        <a href="javascript:;">法律声明</a>
    </div>
    <div class="navfootb-center">
        copyright@2016-2017&nbsp;shequ234.All Rights Reserved.
    </div>
</div>

</body>
</html>