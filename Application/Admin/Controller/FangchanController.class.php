<?php
namespace Admin\Controller;

use Admin\Controller\CommonController;

/**
 * 后台房产控制器
 */
class FangchanController extends CommonController
{
    /**
     * 房产列表
     */
    public function index()
    {
        $p = I('get.p') ? I('get.p') : 1;
        $fangchan_model = D('Fangchan');
        $count = $fangchan_model->count();
        $page = new \Think\Page($count,20);
        $show = $page->show();
        $this->assign('show', $show);
        $fangchan_data = $fangchan_model->page($p.',20')->order('id desc')->select();
        $this->assign('fangchan_data', $fangchan_data);
        $this->display();
    }

    /**
     * 添加房产信息
     */
    public function add()
    {
        if (IS_POST) {
            $fangchan_model = D('Fangchan');
            if ($fangchan_model->create()) {
                if($_FILES['file_upload']['error'] != 4 ){
                    $fangchan_model->titleimg = ltrim(C('UPLOAD').$this->upload() ,'.');
                }
                if ($fangchan_model->add()) {
                    $this->success('添加房产信息成功', U('Fangchan/index'), 1);
                } else {
                    $this->error('添加房产信息失败');
                }
            } else {
                $this->error($fangchan_model->getError());
            }
        } else {
            $this->display();
        }
    }

    /**
     * 房产信息删除
     * @return [type] [description]
     */
    public function delete($id)
    {
        $id = (int)$id;
        $fangchan_model = D('Fangchan');
        $info = $fangchan_model->find($id);
        if (is_file('.'.$info['titleimg'])) {
            unlink('.'.$val['titleimg']);
        }
        if ($fangchan_model->delete($id)) {
            $this->success('删除房产信息成功', U('Fangchan/index'), 1);
        } else {
            $this->error('删除房产信息失败');
        }

    }   


    /**
     * 文件上传
     * @return [type] [description]
     */
    public function upload()
    {
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
