<?php
/**
 * 后台首页控制器
 */
namespace Admin\Controller;
use Admin\Controller\CommonController;

class IndexController extends CommonController {
    /**
     * 后台首页展示
     */
    public function index(){
        //文章信息
        $article_model = D('Article');
        $article_total = $article_model->count();
        $this->assign('article_total' , $article_total);
        $article_uncheck_num  = $article_model->where(array('status' => 0))->count();
        $this->assign('article_uncheck_num', $article_uncheck_num);

        //服务器信息
        $server_data = array(
            'os'=>PHP_OS,
            'php_version' => PHP_VERSION,
            'mysql_version' => mysql_get_server_info(),
            'is_socket'=> extension_loaded('sockets'),
            'timezone'  =>    date_default_timezone_get(),
            'gd' => gd_info(),
            'web'   => $_SERVER["SERVER_SOFTWARE"],
            'upload'=>ini_get('upload_max_filesize'),
            'host_ip'=> GetHostByName($_SERVER['SERVER_NAME']),
        );
        $this->assign('server_data' , $server_data);

        //点击排行
        $article_model = D('Article');
        $map['status'] = 1;
        $p = I('get.p') ? I('get.p') : 1;
        $article_data = $article_model->alias('a')->field('article_id,title,cate_name,author,clicks')->join('left join __CATEGORY__ c on a.cate_id = c.cate_id')->where($map)->order('clicks desc')->page($p.',10')->select();
        $this->assign('article_data',$article_data);
        //分页数据
        $count = $article_model->alias('a')->where($map)->count();
        $page_model = new \Think\Page($count,10);
        $show = $page_model->show(); //分页输出显示
        $this->assign('show',$show);

        $this->display();
    }

}