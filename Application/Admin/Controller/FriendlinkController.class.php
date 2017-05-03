<?php
/**
 * 友情链接控制器
 */
namespace Admin\Controller;
use Admin\Controller\CommonController;

class FriendlinkController extends CommonController{
    /**
     * 友情链接列表展示
     */
    public function index(){
        $friendlink_model = D('Friendlink');
        $friendlink_data = $friendlink_model->select();
        $this->assign('friendlink_data', $friendlink_data);
        $this->display();
    }

    /**
     * 添加友情链接
     */
    public function add(){
        if(IS_POST){
           $friendlink_model = D('Friendlink');
           if($friendlink_model->create()){
               if($friendlink_model->add()){
                   $this->success('友情链接添加成功', U('Friendlink/index'), 1);
               }else{
                    $this->error('友情链接添加失败');
               }
           }else{
                $this->error($friendlink_model->getError());
           }
        }else{
            $this->display();
        }
    }

    /**
     * 友情链接编辑
     */
    public function edit(){
        if(IS_POST){
            $friendlink_model = D('Friendlink');
            if($friendlink_model->create()){
                if($friendlink_model->save()){
                    $this->success('友情链接编辑成功', U('Friendlink/index'), 1);
                }else{
                    $this->error('友情链接编辑失败！');
                }
            }else{
                $this->error($friendlink_model->getError());
            }
        }else{
            $id = I('get.id');
            $friendlink_model = D('Friendlink');
            $friendlink_data = $friendlink_model->find($id);
            $this->assign('friendlink_data', $friendlink_data);
            $this->display();
        }
    }

    /**
     * 删除友情链接
     */
    public function delete(){
        $id = I('get.id');
        $friendlink_model = D('Friendlink');
        if($friendlink_model->delete($id)){
            $this->success('友情链接删除成功', U('Friendlink/index'), 1);
        }else{
            $this->error('友情链接删除失败');
        }
    }


}