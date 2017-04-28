<?php
/**
 * 参与记录控制器
 */
namespace Business\Controller;
use Business\Controller\CommonController;

class PartakeController extends CommonController{
    /**
     * 活动记录列表
     */
    public function index(){
        $activity_id = I('get.activity_id');
        $partake_model = D('Partake');
        $partake_data = $partake_model->where(array('activity_id' => $activity_id))->order('id desc')->select();
        $this->assign('partake_data', $partake_data);
        $this->display();
    }

    /**
     * 确认兑奖
     */
    public function confirm(){
        $id = I('get.id');
        $partake_model = D('Partake');
        $data = array('business_confirm' => 1, 'confirm_time' => time());
        if($partake_model->where(array('id' => $id))->save($data)){
            $this->success('确认成功',U('Partake/index',array('activity_id'=> I('get.activity_id'))),1);
        }

    }

    public function search(){
        if(IS_POST){
            $activity_id = I('post.activity_id');
            $voucher = I('post.voucher');
            $map['activity_id'] = $activity_id;
            if($voucher) $map['voucher'] = $voucher;
            $partake_model = D('Partake');
            $partake_data = $partake_model->where($map)->select();
            $this->assign('partake_data',$partake_data);
            $this->display();
        }else{
            $activity_model = D('Activity');
            $activity_data = $activity_model->where(array('business_id' => session('business_user_id')))->select();
            $this->assign('activity_data', $activity_data);
            $this->display();
        }

    }

}