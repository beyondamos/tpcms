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
        $this->assign('adv_data', $adv_data);
        $this->display();
    }

    /**
     * 广告添加
     */
    public function add(){
        if(IS_POST){
            $adv_model = D('Adv');
            if($adv_model->create()){
                if($adv_model->add()){
                    $this->success('广告添加成功', U('Adv/index'), 1);
                }else{
                    $this->error('广告添加失败');
                }
            }else{
                $this->error($adv_model->getError());
            }
        }else{
            $this->display();
        }
    }

    /**
     * 广告编辑
     */
    public function edit(){
        if(IS_POST){

            $adv_model = D('Adv');
            if($adv_model->create()){
                if($adv_model->save()){
                    $this->success('广告编辑成功', U('Adv/index'), 1);
                }else{
                    $this->error('广告编辑失败');
                }
            }else{
                $this->error($adv_model->getError());
            }
        }else{
            $id = I('get.id');
            $adv_model = D('Adv');
            $adv_data = $adv_model->find($id);
            $this->assign('adv_data',$adv_data);
            $this->display();
        }
    }

    /**
     * 广告删除
     */
    public function delete(){
        $id = I('get.id');
        $adv_model = D('Adv');
        if($adv_model->delete($id)){
            $this->success('广告删除成功', U('Adv/index'), 1);
        }else{
            $this->error('广告删除失败');
        }
    }


}