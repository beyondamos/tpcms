<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="renderer" content="webkit">
    <title>Title</title>
    <link href="/Public/Home/css/base.css" rel="stylesheet" type="text/css"/>
    <link href="/Public/Home/css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="/Public/Home/js/html5shiv.js"></script>
    <script src="/Public/Home/js/respond.min.js"></script>
    <![endif]-->
    <script src="/Public/Home/js/jquery-2.1.1.min.js"></script>
    <script src="/Public/Home/js/item.js"></script>
    <script src="/Public/Home/js/bootstrap.min.js"></script>
</head>
<body style="background-color:#F2F2F2; float:left;">


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
                <a href=":U('Member/index')"><?php echo (session('member_name')); ?></a>
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
    <div class="navbred"><span>您当前的位置：</span><a href="/">首页</a>&gt;<span>会员帖子</span></div>

    <!--左侧-->
    <div class="contul">
        <div class="contulhed">
            <img src="/Public/Home/images/head.jpg" />
            <a href="#">修改头像</a>
            <h2>比二鱼</h2>
            <h3>圈龄：0.5年&nbsp;&nbsp;|&nbsp;&nbsp;发帖：90</h3>
        </div>

        <div class="contulinfo">
            <h2>账号信息</h2>
            <a href="usercent.php">修改资料<span>》</span></a>
            <a href="usercent.php">修改密码<span>》</span></a>
            <a href="#">邮箱绑定<span>》</span></a>
            <a href="#">手机认证<span>》</span></a>
        </div>

        <div class="contulinfo">
            <h2>发帖信息</h2>
            <a href="userinfo.php">我的帖子<span>》</span></a>
            <a href="userinfo.php">我的回帖<span>》</span></a>
            <a href="userinfo.php">我的回复<span>》</span></a>
            <a href="userinfo.php">草稿箱<span>》</span></a>
        </div>
    </div><!--左侧 end-->


    <!--右侧-->
    <div class="contur">

        <h1>基本信息</h1>

        <div class="contallm">
            <div class="tabl-12">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th class="text-center">序号</th>
                        <th class="">名称</th>
                        <th class="">分类</th>
                        <th class="">发布日期</th>
                        <th class="">浏览</th>
                        <th class="">点赞</th>
                        <th class="">评论</th>
                        <th class="text-center">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="text-center text-vm">1</td>
                        <td class="text-vm"><a href="#">问下刷银行卡的刷卡机有谁知道怎么安装吗</a></td>
                        <td class="text-vm">居家</td>
                        <td class="text-vm">2016-01-01 12:00</td>
                        <td class="text-vm">127</td>
                        <td class="text-vm">127</td>
                        <td class="text-vm">127</td>
                        <td class="text-vm">
                            <a href="#"><img src="/Public/Home/images/del.png" alt="" />删除</a>
                            <a href="#"><img src="/Public/Home/images/eye.png" alt="" />查看</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center text-vm">1</td>
                        <td class="text-vm"><a href="#">问下刷银行卡的刷卡机有谁知道怎么安装吗</a></td>
                        <td class="text-vm">居家</td>
                        <td class="text-vm">2016-01-01 12:00</td>
                        <td class="text-vm">127</td>
                        <td class="text-vm">127</td>
                        <td class="text-vm">127</td>
                        <td class="text-vm">
                            <a href="#"><img src="/Public/Home/images/del.png" alt="" />删除</a>
                            <a href="#"><img src="/Public/Home/images/eye.png" alt="" />查看</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center text-vm">1</td>
                        <td class="text-vm"><a href="#">问下刷银行卡的刷卡机有谁知道怎么安装吗</a></td>
                        <td class="text-vm">居家</td>
                        <td class="text-vm">2016-01-01 12:00</td>
                        <td class="text-vm">127</td>
                        <td class="text-vm">127</td>
                        <td class="text-vm">127</td>
                        <td class="text-vm">
                            <a href="#"><img src="/Public/Home/images/del.png" alt="" />删除</a>
                            <a href="#"><img src="/Public/Home/images/eye.png" alt="" />查看</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center text-vm">1</td>
                        <td class="text-vm"><a href="#">问下刷银行卡的刷卡机有谁知道怎么安装吗</a></td>
                        <td class="text-vm">居家</td>
                        <td class="text-vm">2016-01-01 12:00</td>
                        <td class="text-vm">127</td>
                        <td class="text-vm">127</td>
                        <td class="text-vm">127</td>
                        <td class="text-vm">
                            <a href="#"><img src="/Public/Home/images/del.png" alt="" />删除</a>
                            <a href="#"><img src="/Public/Home/images/eye.png" alt="" />查看</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center text-vm">1</td>
                        <td class="text-vm"><a href="#">问下刷银行卡的刷卡机有谁知道怎么安装吗</a></td>
                        <td class="text-vm">居家</td>
                        <td class="text-vm">2016-01-01 12:00</td>
                        <td class="text-vm">127</td>
                        <td class="text-vm">127</td>
                        <td class="text-vm">127</td>
                        <td class="text-vm">
                            <a href="#"><img src="/Public/Home/images/del.png" alt="" />删除</a>
                            <a href="#"><img src="/Public/Home/images/eye.png" alt="" />查看</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center text-vm">1</td>
                        <td class="text-vm"><a href="#">问下刷银行卡的刷卡机有谁知道怎么安装吗</a></td>
                        <td class="text-vm">居家</td>
                        <td class="text-vm">2016-01-01 12:00</td>
                        <td class="text-vm">127</td>
                        <td class="text-vm">127</td>
                        <td class="text-vm">127</td>
                        <td class="text-vm">
                            <a href="#"><img src="/Public/Home/images/del.png" alt="" />删除</a>
                            <a href="#"><img src="/Public/Home/images/eye.png" alt="" />查看</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center text-vm">1</td>
                        <td class="text-vm"><a href="#">问下刷银行卡的刷卡机有谁知道怎么安装吗</a></td>
                        <td class="text-vm">居家</td>
                        <td class="text-vm">2016-01-01 12:00</td>
                        <td class="text-vm">127</td>
                        <td class="text-vm">127</td>
                        <td class="text-vm">127</td>
                        <td class="text-vm">
                            <a href="#"><img src="/Public/Home/images/del.png" alt="" />删除</a>
                            <a href="#"><img src="/Public/Home/images/eye.png" alt="" />查看</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center text-vm">1</td>
                        <td class="text-vm"><a href="#">问下刷银行卡的刷卡机有谁知道怎么安装吗</a></td>
                        <td class="text-vm">居家</td>
                        <td class="text-vm">2016-01-01 12:00</td>
                        <td class="text-vm">127</td>
                        <td class="text-vm">127</td>
                        <td class="text-vm">127</td>
                        <td class="text-vm">
                            <a href="#"><img src="/Public/Home/images/del.png" alt="" />删除</a>
                            <a href="#"><img src="/Public/Home/images/eye.png" alt="" />查看</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center text-vm">1</td>
                        <td class="text-vm"><a href="#">问下刷银行卡的刷卡机有谁知道怎么安装吗</a></td>
                        <td class="text-vm">居家</td>
                        <td class="text-vm">2016-01-01 12:00</td>
                        <td class="text-vm">127</td>
                        <td class="text-vm">127</td>
                        <td class="text-vm">127</td>
                        <td class="text-vm">
                            <a href="#"><img src="/Public/Home/images/del.png" alt="" />删除</a>
                            <a href="#"><img src="/Public/Home/images/eye.png" alt="" />查看</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center text-vm">1</td>
                        <td class="text-vm"><a href="#">问下刷银行卡的刷卡机有谁知道怎么安装吗</a></td>
                        <td class="text-vm">居家</td>
                        <td class="text-vm">2016-01-01 12:00</td>
                        <td class="text-vm">127</td>
                        <td class="text-vm">127</td>
                        <td class="text-vm">127</td>
                        <td class="text-vm">
                            <a href="#"><img src="/Public/Home/images/del.png" alt="" />删除</a>
                            <a href="#"><img src="/Public/Home/images/eye.png" alt="" />查看</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="pagedr">
                <a href="#">上一页</a>
                <a href="#">1</a>
                <a href="#">2</a>
                <a href="#">下一页</a>
            </div>
        </div>

    </div><!--右侧 end-->



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
</body>
</html>