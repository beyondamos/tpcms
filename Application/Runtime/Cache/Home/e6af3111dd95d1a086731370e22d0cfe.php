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
<div class="headb">
    <a href="javascript:;" onclick="javascript:history.back(-1);"><img src="/Public/Mobile/images/iconarlb.png" /></a>
    <span>搜索</span>
    <a href="javascript:;" style="visibility:hidden;"><img src="/Public/Mobile/images/iconarl.png" /></a>
</div>
<div class="cont">
    <div class="headbt"></div>
    <div class="serh">
        <form action="<?php echo U('Search/index');?>" method="post">
            <input type="text" name="search" placeholder="请输入关键字">
            <button type="submit" value=""><img src="/Public/Mobile/images/iconsearchb.png" /></button>
        </form>
    </div>
    <div class="boxserh">
        <a href="javascript:" class="btn">春晚</a>
        <a href="javascript:" class="btn">哈士奇</a>
        <a href="javascript:" class="btn">宝宝</a>
        <a href="javascript:" class="btn">小品类节目</a>
        <a href="javascript:" class="btn">好奇</a>
        <a href="javascript:" class="btn">雾霾天</a>
        <a href="javascript:" class="btn">最新</a>
        <a href="javascript:" class="btn">大家都在看</a>
        <a href="javascript:" class="btn">天气预报</a>
        <a href="javascript:" class="btn">优惠</a>
    </div>
    <script>
        $(function () {
            $(".btn").click(function(){
                var search = $(this).html();
                $("[name='search']").val(search);
            })
        })
    </script>
    <div class="boxcont">
        <?php if(is_array($search_data)): $i = 0; $__LIST__ = $search_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U($vo[''].'/'.$vo['article_id']);?>">
            <div class="boxitem">
                <div class="imglimt"><img src="<?php echo ($vo["titleimg"]); ?>" alt=""/></div>
                <h2><?php echo ($vo["title"]); ?></h2>
                <div class="praise">
                    <img src="/Public/Mobile/images/iconeye.png" alt=""/><span><?php echo ($vo["clicks"]); ?></span>
                    <!--<img src="/Public/Mobile/images/iconcomm.png" alt=""/><span>18</span>-->
                    <img src="/Public/Mobile/images/iconstar.png" alt=""/><span>20</span>
                    <span><?php echo ($vo["newstime"]); ?></span>
                </div>
            </div>
        </a><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
</div>
</body>
</html>