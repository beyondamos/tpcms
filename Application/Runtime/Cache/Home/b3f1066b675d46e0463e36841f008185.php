<?php if (!defined('THINK_PATH')) exit();?><div class="boxcont">
    <?php if(is_array($new_data)): $i = 0; $__LIST__ = $new_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U($vo['url'].'/'.$vo['article_id']);?>"><div class="boxitem">
            <div class="imglimt"><img src="<?php echo ($vo["titleimg"]); ?>" alt="<?php echo ($vo["title"]); ?>" /></div>
            <h2><?php echo ($vo["title"]); ?></h2>
            <h3><?php echo ($vo["synopsis"]); ?></h3>
            <h4><img src="/Public/Home/images/iconclock.png" alt="" /><?php echo ($vo["newstime"]); ?></h4>
            <h5><img src="/Public/Home/images/iconeye.png" alt="" /><?php echo ($vo["clicks"]); ?></h5>
            <h5><img src="/Public/Home/images/iconstar.png" alt="" />0</h5>
        </div></a><?php endforeach; endif; else: echo "" ;endif; ?>
</div>