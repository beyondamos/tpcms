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
                if($_FILES['file_upload']['error'] != 4 ){
                    $adv_model->adv_img = ltrim(C('UPLOAD').$this->upload() ,'.');
                }
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
                if($_FILES['file_upload']['error'] != 4 ){
                    $adv_model->adv_img = ltrim(C('UPLOAD').$this->upload() ,'.');
//                    $article_model->deleteImg(I('post.article_id'));
                }
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


    /**
     * 文件上传
     * @return [type] [description]
     */
    public function upload(){
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =      C('UPLOAD'); // 设置附件上传根目录
        $upload->autoSub = true;
        $upload->subName = array('date','Ymd');
        $upload->saveName = time().'_'.mt_rand();
        // 上传文件
        $info   =   $upload->upload();
        if(!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        }else{// 上传成功 获取上传文件信息
            foreach($info as $file){
                return $file['savepath'].$file['savename'];
            }
        }
    }


}