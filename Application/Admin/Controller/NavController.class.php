<?php
/**
 * 自定义导航控制器
 */
namespace Admin\Controller;
use Admin\Controller\CommonController;

class NavController extends  CommonController{
    /**
     * 自定义导航列表
     */
    public function listing(){
        $nav_model = D('Nav');
        $nav_data = $nav_model->select();
        $this->assign('nav_data', $nav_data);
        $this->display();
    }

    /**
     * 自定义导航添加
     */
    public function add(){
        if(IS_POST){
            $nav_model = D('Nav');
            if($nav_model->create()){
                if($nav_model->add()){
                    $this->success('自定义导航添加成功', U('Nav/listing'), 1);
                }else{
                    $this->error('自定义导航添加失败');
                }
            }else{
                $this->error($nav_model->getError());
            }
        }else{
            $this->display();
        }
    }

    /**
     * 自定义导航编辑
     */
    public function edit(){
        if(IS_POST){
            $nav_model = D('Nav');
            if($nav_model->create()){
                if($nav_model->save()){
                    $this->success('自定义导航编辑成功', U('Nav/listing') ,1);
                }else{
                    $this->error('自定义导航编辑失败');
                }
            }else{
                $this->error($nav_model->getError());
            }
        }else{
            $nav_id = I('get.nav_id');
            $nav_model = D('Nav');
            $nav_data = $nav_model->find($nav_id);
            $this->assign('nav_data', $nav_data);
            $this->display();
        }
    }

    /**
     * 自定义导航删除
     */
    public function delete(){
        $nav_id = I('get.nav_id');
        if(!$nav_id || $nav_id < 0) $this->error('非法操作');
        $nav_model = D('Nav');
        if($nav_model->delete($nav_id)){
            $this->success('自定义导航删除成功');
        }else{
            $this->error('自定义导航删除失败');
        }
    }


}