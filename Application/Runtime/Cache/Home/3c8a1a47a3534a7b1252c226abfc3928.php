<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link href="/Public/Home/css/base0405a.css" rel="stylesheet" type="text/css"/>
    <!--[if lt IE 9]>
    <script src="/Public/Home/js/html5shiv.js"></script>
    <script src="/Public/Home/js/respond.min.js"></script>
    <![endif]-->
    <script src="/Public/Home/js/jquery-2.1.1.min.js"></script>
    <script src="/Public/Home/js/item.js"></script>
    <script src="/Public/Home/js/bootstrap.min.js"></script>
    <title><?php echo ($article_data["title"]); ?></title>
    <meta name="keywords" content="<?php echo ($article_data["keywords"]); ?>"/>
    <meta name="description" content="<?php echo ($article_data["synopsis"]); ?>"/>
    <script>
        var _hmt = _hmt || [];
        (function() {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?236971c0a464e1b54ed9392a9f6a3d5a";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>
</head>
<body>

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
            <a href="<?php echo U('Member/register');?>">[注册]</a>
            <span>或</span>
            <a href="<?php echo U('Member/login');?>">[登录]</a>
            <span>请</span>
            <a href="<?php echo U('Member/wechatLogin');?>"><img src="/Public/Home/images/icon32_wx_logo.png" style="width: 20px;margin-top:6px;margin-right:10px;" id="wx_log"></a>
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
        <div class="navbred"><span>您当前的位置：</span><a href="index.php">首页</a>
            &gt;<a  href="<?php echo U('/'.$article_data['url']);?>"><span><?php echo ($article_data["cate_name"]); ?></span></a>
            &gt;<span>详情页</span>
        </div>
        <!--文章-->
        <div class="arti">
            <!--文章标题区-->
            <div class="artitle">
                <h1><?php echo ($article_data["title"]); ?></h1>
                <h4>发布人：<?php echo ($article_data["author"]); ?>&nbsp;&nbsp;&nbsp;<?php echo ($article_data["newstime"]); ?></h4>
            </div>

            <!--文章内容区-->
            <div class="artcont">
                <?php echo htmlspecialchars_decode($article_data['content']);?>
            </div>

            <!-- 投票区 -->


        
<!--收藏区-->
<div style="clear:both;"></div>
<div class="praise">
    <img src="/Public/Home/images/iconeye.png" alt="" /><span><?php echo ($article_data["clicks"]); ?></span>
    <img src="/Public/Home/images/iconstar.png" alt="" /><span id="zan_num"><?php echo ($article_data["zan"]); ?></span>
</div>

<div class="rwmarti">
    <h3>*用户在社圈网发表的内容仅代表其个人观点，与社圈网无关，如对您造成影响、侵权等请联系发布用户或客服</h3>
    <h4>关注微信公众号奉贤社圈网（ishequan-cn）定期推送，福利互动精彩多</h4>
    <img src="/Public/Home/images/qrc.jpg" alt="" /></div>

<a href="javascript:" id="zan"><div class="zanarti"><img src="/Public/Home/images/zan.png" alt="" /></div></a>

<!-- 分享 JiaThis  -->
<div class="jiathis_style_24x24" style="position:absolute;bottom:-30px;right:0;">
    <a class="jiathis_button_weixin"></a>
    <a class="jiathis_button_cqq"></a>
    <a class="jiathis_button_tsina"></a>
    <a class="jiathis_button_qzone"></a>
    <a class="jiathis_button_douban"></a>
    <a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jiathis_separator jtico jtico_jiathis" target="_blank"></a>
</div>
<script type="text/javascript" >
    var jiathis_config={
        url:"http://www.ishequan.cn/index-21-20-4529.html",
        title:document.getElementById("article_title").innerHTML,
            data_track_clickback:true,
            siteName:"肌肉拉伤怎么办 ",
            shortUrl:false,
            hideMore:false
    }
</script>
<script type="text/javascript" src="http://v3.jiathis.com/code_mini/jia.js" charset="utf-8"></script>
</div>

<script>
    $().ready(function(){
        $('#zan').click(function(){
            $.post("<?php echo U('Article/zan');?>",{
                'article_id':'<?php echo ($article_data["article_id"]); ?>'
            },function(msg){
                if(msg.status == 1){
                    var zan_num = parseInt($('#zan_num').html());
                        zan_num += 1;
                        $('#zan_num').html(zan_num);
                }else{
                    alert('今天已经点过赞了！');
                }
            },'json');
        });
    });
</script>

        
<!--相关推荐-->
<div class="artsug">
    <h1>相关推荐</h1>
    <?php if(is_array($related_data)): $i = 0; $__LIST__ = $related_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U($vo['url'].'/'.$vo['article_id']);?>">
        <div class="imglimtb"><img src="/<?php echo ($vo["titleimg"]); ?>" alt="" /></div>
        <?php echo ($vo["title"]); ?><h3><?php echo ($vo["newstime"]); ?></h3>
    </a><?php endforeach; endif; else: echo "" ;endif; ?>
</div>


    </div>
    <script type="text/javascript">

        $(document).ready(function(){
            var obj = $('.contr');
            var offset = obj.offset();
            var topOffset = offset.top;
            var leftOffset = 900;
            var marginTop = obj.css("marginTop");
            var marginLeft = obj.css("marginLeft");
            $(window).scroll(function() {
                var scrollTop = $(window).scrollTop();
                if (scrollTop >= topOffset){
                    obj.css({
                        marginTop: -140,
                        marginLeft: leftOffset,
                        position: 'fixed',
                    });
                }
                if (scrollTop < topOffset){

                    obj.css({
                        marginTop: marginTop,
                        marginLeft: marginLeft,
                        position: 'relative',
                    });
                }
            });
        });

    </script>

        <!--右侧列表模块-->
    
<!--右侧列表区-->
<div class="contr">
    <h1>大家都爱看</h1>
    <!--右侧列表区主推文章-->
    <div class="contlarta">
        <?php if(is_array($right_data)): $i = 0; $__LIST__ = array_slice($right_data,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U($vo['url'].'/'.$vo['article_id']);?>">
            <img src="/<?php echo ($vo["titleimg"]); ?>" alt="" />
            <h2><?php echo ($vo["title"]); ?></h2>
            <h3><?php echo ($vo["newstime"]); ?></h3>
        </a><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
    <!--右侧列表区次要文章-->
    <div class="contlartb">
        <?php if(is_array($right_data)): $i = 0; $__LIST__ = array_slice($right_data,3,null,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U($vo['url'].'/'.$vo['article_id']);?>">
            <?php echo mb_substr($vo['title'],0,14,'utf-8');?><span><?php echo ($vo["newstime"]); ?></span>
        </a><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
</div>

</div>

    <!--底部模块-->
    
<div class="nav-footb col-sm-12 padlr">
    <div class="navfoot-center">
        <a href="<?php echo U('Custom/about');?>">关于社圈</a>&nbsp;|
        <a href="<?php echo U('Custom/joinUs');?>">加入我们</a>&nbsp;|
        <a href="<?php echo U('Custom/privacy');?>">隐私政策</a>&nbsp;|
        <a href="<?php echo U('Custom/ad');?>">广告服务</a>&nbsp;|
        <a href="<?php echo U('Custom/law');?>">法律声明</a>
    </div>
    <div class="navfootb-center">
        <div class="backtop"><img src="/Public/Home/images/backtop.png" alt="" id="backtop"/></div>
        Copyright@2016-2017&nbsp;www.ishequan.cn All Rights Reserved.
    </div>
</div>

<script>
    $('#backtop').click(function(){
        $('html,body').animate({scrollTop: '0px'}, 800);
    });
</script>


<!--<script type="text/javascript">-->
    <!--$(document).ready(function(){-->
        <!--var obj = $('.docl');-->
        <!--var offset = obj.offset();-->
        <!--var topOffset = offset.top;-->
        <!--var marginTop = obj.css("marginTop");-->
        <!--var marginLeft = obj.css("marginLeft");-->
        <!--$(window).scroll(function() {-->
            <!--var scrollTop = $(window).scrollTop();-->
            <!--if (scrollTop >= topOffset){-->
                <!--obj.css({-->
                    <!--marginTop: -160,-->
                    <!--position: 'fixed',-->
                <!--});-->
            <!--}-->
            <!--if (scrollTop < topOffset){-->

                <!--obj.css({-->
                    <!--marginTop: marginTop,-->
                    <!--position: 'fixed',-->
                <!--});-->
            <!--}-->
        <!--});-->
    <!--});-->
<!--</script>-->
</body>
</html>