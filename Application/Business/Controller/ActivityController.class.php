<?php
/**
 * 活动控制器
 */
namespace Business\Controller;
use Business\Controller\CommonController;

class ActivityController extends CommonController{
    /**
     * 活动列表
     */
    public function index(){
        $activity_model = D('Activity');
        $activity_data = $activity_model->where(array('business_id' => session('business_user_id')))->select();
        $this->assign('activity_data', $activity_data);
        $this->display();
    }


}