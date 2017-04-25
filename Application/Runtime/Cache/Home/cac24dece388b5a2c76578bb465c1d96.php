<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="Zh-cn">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link href="/Public/Mobile/css/normalize.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Mobile/css/basem.css" rel="stylesheet" type="text/css">
    <script src="/Public/Mobile/js/jquery-2.1.1.min.js"></script>
    <script src="/Public/Mobile/js/item.js"></script>
    <script src="/Public/Mobile/js/bootstrap.min.js"></script>
    <title></title>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
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

<div id="nav-left" class="nav-left">

    <a href="#" class="xnav-left-exit"><img src="/Public/Mobile/images/arr.png" alt=""/></a>

    <!--<img src="images/logo.png" alt=""/>-->
    <div class="nav-left-main">

        <a href="/">首页</a>
        <!--<a href="/home/m/wx_log.php">微信</a>-->
        <!--<a href="list.php">Portrait</a>
            <li><a href="list.php">Celebrity</a></li>
            <li><a href="list.php">Business</a></li>
            <li><a href="list.php">Family</a></li>
        <a href="list.php">Event</a>
        <a href="list.php">Travel</a>
        <a href="list.php">Nature</a>
        <a href="Contact.php">Contact</a>-->

        <!--<div class="nav-left-share">
            <a href="javascript:;"><img src="images/iconf.png" alt=""/></a>
            <a href="javascript:;"><img src="images/icont.png" alt=""/></a>
            <a href="javascript:;"><img src="images/icons.png" alt=""/></a>
            <a href="javascript:;"><img src="images/iconw.png" alt=""/></a>
        </div>-->
    </div>
</div>
<div class="head">
    <a href="#nav-left"><img src="/Public/Mobile/images/iconhead.png" /></a>
    <a href="javascript:;" style="visibility:hidden;"></a>
    <a href="index.php"><span><img src="/Public/Mobile/images/logo.png" alt="" /></span></a>
    <a href="/"><img src="/Public/Mobile/images/iconmore.png" /></a>
    <a href="<?php echo U('Search/index');?>"><img src="/Public/Mobile/images/iconsearch.png" /></a>
</div>


<div class="cont">
    <!--文章头部标题部分-->
    <div class="headbt"></div>
    <div class="titart">
        <h1><?php echo ($article_data["title"]); ?></h1>
        <h2><?php echo ($article_data["newstime"]); ?></h2>
        <h3><span>发布人：<?php echo ($article_data["author"]); ?></span></h3>
    </div>

    <!--文章头部摘要部分-->
    <div class="artlinel"><img src="/Public/Mobile/images/artlinel.jpg" alt="" /></div>
    <div class="artlinep">
        <p><?php echo ($article_data["synopsis"]); ?></p>
    </div>
    <div class="artliner"><img src="/Public/Mobile/images/artliner.jpg" alt="" /></div>

    <!--文章内容部分-->
    <div class="artp">
        <!--微信分享缩略图-->
        <div class="artsharepic"><img src="<?php echo $info['thumbnail'];?>" alt=""/></div>
        <div class="artsharepic"><img src="<?php echo $info['thumbnail'];?>" alt=""/></div>
        <!--文章正文-->
        <?php echo htmlspecialchars_decode($article_data['content']);?>
        <div class="artsharepic"><img src="<?php echo $info['thumbnail'];?>" alt=""/></div>
        <div class="artsharepic"><img src="/images/artsharepic.jpg" alt=""/></div>
        <div class="artsharepic"><img src="<?php echo $info['thumbnail'];?>" alt=""/></div>
        <div class="artsharepic"><img src="/images/artsharepic.jpg" alt=""/></div>
    </div>
    <!-- 投票区 -->

    <!--文章结尾二维码及分享部分-->
    <div style="clear:both;"></div>
    <div class="artqrc">

        <div class="praise">
            <img src="/Public/Mobile/images/iconeye.png" alt="" /><span><?php echo ($article_data["clicks"]); ?></span>
            <img src="/Public/Mobile/images/iconstar.png" alt="" /><span id="zan_num">20</span>
            <img style="visibility:hidden;" src="/Public/Mobile/images/iconcomm.png" alt=""/><span style="visibility:hidden;">18</span>
        </div>

        <div class="rwmarti"><img src="/Public/Mobile/images/qrc.jpg" alt="" /></div>
        <div class="praisezan"><a href="javascript:" id="zan"><img src="/Public/Mobile/images/zan.png" alt="" /></a></div>

    </div>

    <script>
        $(function () {
            var dian = true;
            var url ='/home/m/m_ajax.php';
            $("#zan").click(function(){
                if( dian ) {
                    dian = false;
                    $.ajax({
                        type:'post',
                        url: url,
                        data:{
                            action : 'add',
                            uid : <?php echo $info['id']?>,
						},
						success:(function(data){
							$("#zan_num").html(data);
						})
					});
				}else{
					dian = true;
					$.ajax({
						type:'post',
						url:url,
						data:{
							action : 'sub',
							uid : <?php echo $info['id']?>,
						},
						success:(function(data){
							$("#zan_num").html(data);
						})
					});
				}
			})
		});
    </script>

    <div class="space"></div><!--间隔-->
    <!--精彩推荐-->
    <div class="boxcont">
        <div class="titblue">精彩推荐</div>
        <?php if(is_array($right_data)): $i = 0; $__LIST__ = $right_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U($vo['url'].'/'.$vo['article_id']);?>">
            <div class="boxitem">
                <div class="imglimt"><img src="<?php echo ($vo["titleimg"]); ?>" alt="" /></div>
                <h2><?php echo ($vo["title"]); ?></h2>
                <div class="praise">
                    <img src="/Public/Mobile/images/iconeye.png" alt="" /><span><?php echo ($vo["clicks"]); ?></span>
                    <img src="/Public/Mobile/images/iconstar.png" alt="" /><span>20</span>
                    <span><?php echo ($vo["newstime"]); ?></span>
                </div>
            </div>
        </a><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
</div>
<script src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
<script>
    wx.config({
        debug: false,
        appId: '<?php echo ($signPackage["appId"]); ?>',
        timestamp:  '<?php echo ($signPackage["timestamp"]); ?>',
        nonceStr:   '<?php echo ($signPackage["nonceStr"]); ?>',
        signature:  '<?php echo ($signPackage["signature"]); ?>',
        jsApiList: [
            // 所有要调用的 API 都要加到这个列表中
            'checkJsApi',
            'openLocation',
            'getLocation',
            'onMenuShareTimeline',
            'onMenuShareAppMessage'
        ]
    });

    wx.onMenuShareTimeline({
        title: '<?php echo ($article_data["title"]); ?>',
        link: '<?php echo U($article_data['url'].'/'.$article_data['article_id']);?>',
        imgUrl: '<?php echo ($article_data["titleimg"]); ?>',
        success: function (res) {
            // alert('已分享');
        },
        cancel: function (res) {
            // alert('已取消');
        },
        fail: function (res) {
            // alert(JSON.stringify(res));
        }
    });
</script>
</body>
</html>