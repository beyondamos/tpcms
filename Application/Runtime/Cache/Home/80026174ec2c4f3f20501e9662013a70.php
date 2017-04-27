<?php if (!defined('THINK_PATH')) exit();?><div class="boxcont">
    <?php if(is_array($article_data)): $i = 0; $__LIST__ = $article_data;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U($vo['url'].'/'.$vo['article_id']);?>">
        <div class="boxitem">
            <div class="imglimt"><img src="<?php echo ($vo["titleimg"]); ?>" alt=""/></div>
            <h2><?php echo ($vo["title"]); ?></h2>
            <h3><?php echo substr($vo['synopsis'],0,15);?></h3>
            <div class="praise">
                <img src="/Public/Mobile/images/iconeye.png" alt=""/><span><?php echo ($vo["clicks"]); ?></span>
                <!--<img src="/Public/Mobile/images/iconcomm.png" alt=""/><span>18</span>-->
                <img src="/Public/Mobile/images/iconstar.png" alt=""/><span><?php echo ($vo["zan"]); ?></span>
                <span><?php echo ($vo["newstime"]); ?></span>
            </div>
        </div>
    </a><?php endforeach; endif; else: echo "$empty" ;endif; ?>
</div>