<?php
/**
 * 分类控制器
 */
namespace Admin\Controller;
use Admin\Controller\CommonController;
use Common\Controller\ToolsController;

class CategoryController extends CommonController{
	/**
	 * 分类列表
	 * @return [type] [description]
	 */
	public function listing(){
		$category_model = D('Category');
		$category_data = $category_model->getSortCategories();
		$this->assign('category_data',$category_data);
		$this->display();
	}

	/**
	 * 分类添加
	 */
	public function add(){
		if(IS_POST){
			//提交
			$category_model = D('Category');
			if($category_model->create()){
				if($_FILES['cate_img']['error'] != 4){
					//上传图片
					$ob_tools = new ToolsController();
					$cate_image = $ob_tools->upload($_FILES['cate_img']);
					$cate_thumb = $ob_tools->thumbnail($cate_image);
					$category_model->cate_image = C('UPLOAD_IMAGE_DIR').$cate_image;
					$category_model->cate_thumb = C('UPLOAD_THUMB_DIR').$cate_thumb;

				}	
				if($category_model->add()){
					$this->success('分类添加成功',U('listing'),1);
				}else{
					$this->error('分类添加失败');
				}
			}else{
				$this->error($category_model->getError());
			}
		}else{
			//展示表单
			$category_model = D('Category');
			$category_data = $category_model->getSortCategories();
			$this->assign('category_data',$category_data);
			$this->display();
		}
		
	}


	/**
	 * 单文件上传
	 * @param  array  $file 上传的文件
	 * @return string 上传文件的路径名字
	 */
	public function upload($file){
		$upload = new \Think\Upload();// 实例化上传类
	    $upload->maxSize   =     3145728 ;// 设置附件上传大小
	    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
	    $upload->rootPath  =      './Public/Upload/thumbnail/'; // 设置附件上传根目录
	    $upload->saveName  =	time().'_'.mt_rand();	//保存文件名
	    $upload->autoSub = true;	//开启子目录保存
		$upload->subName = array('date','Ym');	//子目录
	    // 上传单个文件 
	    $info   =   $upload->uploadOne($file);
	    if(!$info) {// 上传错误提示错误信息
	        $this->error($upload->getError());
	    }else{// 上传成功 获取上传文件信息
	         return $info['savepath'].$info['savename'];
	    }
	}

	/**
	 * 制作缩略图
	 * @param  string $file 源文件
	 * @return string 缩略图文件地址
	 * 
	 */
	public function thumbnail($file){
		$image = new \Think\Image();
		$image->open(C('THUMB_DIR').$file);
		$tmp_array = explode('/',$file);
		$thumb_name = $tmp_array[0].'/thumb_'.$tmp_array[1];
		$image->thumb(300, 150)->save(C('THUMB_DIR').$thumb_name);
		return $thumb_name;
	}


} 