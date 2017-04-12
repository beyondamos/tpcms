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
		// 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
		$map['status'] = 1;
		$p = I('get.p') ? I('get.p') : 1;
		$article_info = $article_model->alias('a')->join("LEFT JOIN __CATEGORY__ c ON a.cate_id = c.cate_id")->field('article_id,a.cate_id,c.cate_name,title,newstime')->where($map)->order('article_id')->page($p.','.C('LIST_NUM'))->select();
		$this->assign('article_info',$article_info);// 赋值数据集
		$count = $article_model->where($map)->count();// 查询满足要求的总记录数
		$Page = new \Think\Page($count,C('LIST_NUM'));// 实例化分页类 传入总记录数和每页显示的记录数
		$show = $Page->show();	// 分页显示输出
		$this->assign('page',$show);	// 赋值分页输出
		$this->display();
	}

	/**
	 * 添加文章
	 */
	public function add(){
		if(IS_POST){
			//添加
			$article_model = D('Article');
			if($article_model->create(I('post.'), 1)){
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
	 * 编辑文章
	 * @return [type] [description]
	 */
	public function edit(){
		if(IS_POST){

		}elseif(IS_GET){
			$article_id = I('get.article_id');
			if(!$article_id) $this->error('未知错误');
			$article_model = D('Article');
			//文章信息
			$article_info = $article_model->find($article_id);
			//文章分类信息
			$category_model = D('Category');
			$category_data = $category_model->getSortCategories();
			$this->assign('article_info',array('category'=> $category_data, 'article'=> $article_info));
			$this->display();
		}
		
	}

	/**
	 * 未审核信息列表
	 */
	public function checkList(){
		$article_model = D('Article');
		$map['status'] = 2;  //状态为2 是 未审核
		$article_info = $article_model->where($map)->field('article_id,cate_id,title,newstime')->select();
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
			$article_id = I('post.article_id');
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
			$article_id = I('post.article_id');
		}

		$article_model = D('Article');
		if($article_model->unCheck($article_id)){
			$this->success('文章取消审核成功', $_SERVER['HTTP_REFERER'], 1);
		}else{
			$this->success('文章取消审核失败');
		}
	}


	/**
	 * 彻底删除
	 * 彻底删除文章的同时删除文章相关的文件,比如:图片
	 * @return [type] [description]
	 */
	public function delete(){
		if(IS_POST){
			//多个删除
			$id = I('post.article_id');
		}elseif(IS_GET){
			//单个删除
			$id = I('get.article_id');
			if(!$id){
				$this->error('未知错误');
			}
		}
		$article_model = D('Article');
		if($article_model->del($id)){
			$this->success('文章彻底删除成功', $_SERVER['HTTP_REFERER'], 1);
		}else{
			$this->error('文章彻底删除错误');
		}

	}


}