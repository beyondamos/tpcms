<?php
/**
 * 系统控制器
 */
 namespace Admin\Controller;
 use Admin\Controller\CommonController;

 class SystemController extends CommonController{

     /**
      * 网站配置
      */
     public function webConf(){
        if(IS_POST){
            $config_info = I('post.');
            $config_model = D('Config');
            foreach($config_info as $key => $val){
                $data = array('conf_value'=> $val);
                $config_model->where(array('conf_name' => $key))->save($data);
            }
            $this->success('修改成功',U('System/webConf') ,1);
            exit;
        }

            $config_model = D('Config');
            $config_data = $config_model->select();
            $list = array();
            foreach($config_data as $val){
                $list[$val['conf_name']] = $val['conf_value'];
            }
            $this->assign('config_data', $list);
            $this->display();
     }


 }