<?php
/**
 * 广告控制器
 */
namespace Admin\Controller;
use Admin\Controller\CommonController;

class AdvController extends CommonController{

    /**
     *广告列表信息
     */
    public function index(){
        $adv_model = D('Adv');
        $adv_data = $adv_model->select();
        $this->assign('adv_model', $adv_data);
        $this->display();
    }

}