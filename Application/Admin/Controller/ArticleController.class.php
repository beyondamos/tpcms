<?php
/**
 * 后台文章控制器
 */
namespace Admin\Controller;
use Admin\Controller\CommonController;
use Common\Controller\ToolsController;

class ArticleController extends CommonController{
	/**
	 * 文章列表
	 */
	public function listing(){
		$article_model = D('Article');
		$map['status'] = 1;
		$article_info = $article_model->field('article_id,cate_id,title,newstime')->where($map)->order('article_id desc')->relation(true)->select();
		$this->assign('article_info',$article_info);
		$this->display();
	}

	/**
	 * 添加文章
	 */
	public function add(){
		if(IS_POST){
			//添加
			$article_model = D('Article');
			if($article_model->create()){
				//存在标题图片
				if($_FILES['titleimg']['error'] != 4){
					$ob_tools = new ToolsController();
					$big_image = $ob_tools->upload($_FILES['titleimg']);
					$titleimg = $ob_tools->thumbnail($big_image);
					$article_model->big_image = C('UPLOAD_IMAGE_DIR').$big_image;
					$article_model->titleimg = C('UPLOAD_THUMB_DIR').$titleimg;
				}
				if($article_model->add()){
					$this->success('文章添加成功', U('listing'), 1);
				}else{
					$this->error('文章添加失败');
				}
			}else{
				$this->error($article_model->getError());
			}
		}else{
			//展示表单
			//文章分类信息
			$category_model = D('Category');
			$category_data = $category_model->getSortCategories();
			$this->assign('category_data', $category_data);
			$this->display();
		}
	}



	/**
	 * 未审核信息列表
	 */
	public function checkList(){
		$article_model = D('Article');
		$map['status'] = 2;  //状态为2 是 未审核
		$article_info = $article_model->where($map)->field('article_id,cate_id,title,newstime')->relation(true)->select();
		$this->assign('article_info', $article_info);
		$this->display();
	}


	/**
	 * 回收站列表
	 */
	public function binList(){
		$article_model = D('Article');
		$map['status'] = 0;
		$article_info = $article_model->where($map)->field('article_id,cate_id,title,newstime')->relation(true)->select();
		$this->assign('article_info', $article_info);
		$this->display();
	}


	/**
	 * 审核文章
	 * @return [type] [description]
	 */
	public function check(){
		if(IS_GET){
			//单个审核
			$article_id = I('get.article_id');
			if(!$article_id){
				$this->error('未知错误');
			}
		}elseif(IS_POST){
			//多个审核

		}

		$article_model = D('Article');
		if($article_model->check($article_id)){
			$this->success('文章审核成功', $_SERVER['HTTP_REFERER'], 1);
		}else{
			$this->success('文章审核失败');
		}		
	}


	/**
	 * 取消审核
	 * @return [type] [description]
	 */
	public function unCheck(){
		if(IS_GET){
			//单个取消审核
			$article_id = I('get.article_id');
			if(!$article_id){
				$this->error('未知错误');
			}
		}elseif(IS_POST){
			//多个取消审核

		}

		$article_model = D('Article');
		if($article_model->unCheck($article_id)){
			$this->success('文章取消审核成功', $_SERVER['HTTP_REFERER'], 1);
		}else{
			$this->success('文章取消审核失败');
		}
	}

	/**
	 * 将信息移至回收站
	 * @return bool 移除成功返回true 失败返回false
	 */
	public function recycleBin(){	
		$article_id = I('get.article_id');
		if(!$article_id){
			$this->error('未知错误');
		}
		$article_model = D('Article');
		if($article_model->recycle($article_id)){
			$this->success('文章删除成功', $_SERVER['HTTP_REFERER'], 1);
		}else{
			$this->error('文章删除错误');
		}
	}

	/**
	 * 彻底删除
	 * 彻底删除文章的同时删除文章相关的文件,比如:图片
	 * @return [type] [description]
	 */
	public function delete(){
		if(IS_POST){
			$id = I('post.id');
		}elseif(IS_GET){
			$id = I('get.article_id');
		}


	}


}