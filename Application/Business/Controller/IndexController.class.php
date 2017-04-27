<?php
namespace Business\Controller;
use Business\Controller\CommonController;

class IndexController extends CommonController{
    //商家后台首页
    public function index(){
        $business_model = D('Business');
        $business_data = $business_model->find(session('business_user_id'));
        $this->assign('business_data', $business_data);
        $activity_model = D('Activity');
        $activity_count = $activity_model->where(array('business_id' => session('business_user_id')))->count();
        $this->assign('activity_count', $activity_count );
        $this->display();
    }




}