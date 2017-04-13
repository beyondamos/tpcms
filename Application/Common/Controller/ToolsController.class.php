<?php
/**
 * 工具控制器
 */
namespace Common\Controller;
use Think\Controller;

class ToolsController extends Controller{

	/**
	 * 文件上传
	 * @return string 上传文件的路径名字
	 */
	public function upload(){
		$upload = new \Think\Upload();// 实例化上传类
	    $upload->maxSize   =     3145728 ;// 设置附件上传大小
	    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
	    $upload->rootPath  =      '.'.C('UPLOAD_IMAGE_DIR'); // 设置附件上传根目录
	    $upload->saveName  =	time().'_'.mt_rand();	//保存文件名
	    $upload->autoSub = true;	//开启子目录保存
		$upload->subName = array('date','Ym');	//子目录
	    // 上传单个文件 
	    $info   =   $upload->upload();
	    if(!$info) {// 上传错误提示错误信息
	    	$data = array('result' => 0 , 'fileinfo' => $upload->getError());
	    }else{// 上传成功 获取上传文件信息
	    	$data = array('result' => 1 , 'fileinfo' => $info);
	        // return ;
	    }
	    return $data;
	}

	/**
	 * 制作缩略图
	 * @param  string $file 源文件
	 * @return string 缩略图文件地址
	 * 
	 */
	public function thumbnail($file){
		$image = new \Think\Image();
		$image->open(C('UPLOAD_IMAGE_DIR').$file);
		$image->thumb(300, 150)->save(C('UPLOAD_THUMB_DIR').$file);
		return $file;
	}




}