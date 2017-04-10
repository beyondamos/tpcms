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
		$article_info = $article_model->field('article_id,cate_id,title,newstime')->where($map)->relation(true)->select();
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
					$article_model->titleimg = $ob_tools->thumbnail($ob_tools->upload($_FILES['titleimg']));
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

}