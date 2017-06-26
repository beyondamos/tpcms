<?php
/**
 * 文章控制器
 */
namespace Admin\Controller;
use Admin\Controller\CommonController;

class ArticleController extends CommonController{
    /**
     * 文章列表
     */
    public function listing(){
        if(IS_GET){
            $cate_id = I('get.cate_id');
            $search_article = I('get.search_article');
            if($cate_id){
                $category_model = D('Category');
                $map['a.cate_id'] = array('in',$category_model->getSub($cate_id));
            }
            if($search_article) $map['title'] = array('like',"%{$search_article}%");
            $this->assign('search_cate_id',$cate_id);
            $this->assign('search_article',$search_article);
        }
        $map['status'] = 1;
        //分类数据
        $category_model = D('Category');
        $category_data = $category_model->getSortCategories();
        $this->assign('category_data',$category_data);
        //文章数据
        $article_model = D('Article');
        $p = I('get.p') ? I('get.p') : 1;
        $article_data = $article_model->alias('a')->field('article_id,a.cate_id,title,cate_name,author,newstime,real_clicks')
            ->join('left join __CATEGORY__ c on a.cate_id = c.cate_id')
            ->where($map)->order('article_id desc')->page($p.',10')->select();
        $this->assign('article_data',$article_data);
        //分页数据
        $count = $article_model->alias('a')->where($map)->count();
        $page_model = new \Think\Page($count,10);
        $show = $page_model->show(); //分页输出显示
        $this->assign('show',$show);
        $this->display();
    }

    /**
     * 添加文章
     */
    public function add(){
    	if(IS_POST){
            $article_model = D('Article');
            if($article_model->create()){
                if($_FILES['file_upload']['error'] != 4 ){
                    $article_model->titleimg = ltrim(C('UPLOAD').$this->upload() ,'.');
                }
                if(!I('post.synopsis')) $article_model->synopsis = $article_model->generateSynopsis();

                if($article_model->add()){
                    $this->success('文章添加成功',U('Article/listing'),1);
                }else{
                    $this->error('文章添加失败');
                }
            }else{
                $this->error($article_model->getError());
            }
    	}elseif(IS_GET){
            //文章分类数据
            $category_model = D('Category');
            $category_data = $category_model->getSortCategories();
            $this->assign('category_data',$category_data);
    		$this->display();
    	}
    }

    /**
     * 文章编辑
     * @return [type] [description]
     */
    public function edit(){
        if(IS_POST){
            $article_model = D('Article');
            if($article_model->create()){
                if($_FILES['file_upload']['error'] != 4 ){
                    $article_model->titleimg = ltrim(C('UPLOAD').$this->upload() ,'.');
                    $article_model->deleteImg(I('post.article_id'));                    
                }
                if(!I('post.synopsis')) $article_model->synopsis = $article_model->generateSynopsis();
                if($article_model->save()){
                    if(I('post.tag') == 1){
                        $this->success('文章编辑成功',U('Article/checkListing'),1);
                    }else{
                        $this->success('文章编辑成功',U('Article/listing'),1);
                    }
                }else{
                    $this->error('文章编辑失败');
                }
            }else{
                $this->error($article_model->getError());
            }


        }elseif(IS_GET){
            //文章数据
            $article_id = I('get.article_id');
            $article_model = D('Article');
            $article_data = $article_model->find($article_id);
            $this->assign('article_data' , $article_data);
            //文章分类数据
            $category_model = D('Category');
            $category_data = $category_model->getSortCategories();
            $this->assign('category_data',$category_data);
            $this->display();
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



    /**
     * 文章未审核列表
     */
    public function checkListing(){
        if(IS_GET){
            $cate_id = I('get.cate_id');
            $search_article = I('get.search_article');
            if($cate_id){
                $category_model = D('Category');
                $map['a.cate_id'] = array('in',$category_model->getSub($cate_id));
            }
            if($search_article) $map['title'] = array('like',"%{$search_article}%");
            $this->assign('search_cate_id',$cate_id);
            $this->assign('search_article',$search_article);
        }
        $map['status'] = 0;
        //分类数据
        $category_model = D('Category');
        $category_data = $category_model->getSortCategories();
        $this->assign('category_data',$category_data);
        //文章数据
        $article_model = D('Article');
        $p = I('get.p') ? I('get.p') : 1;
        $article_data = $article_model->alias('a')->field('article_id,a.cate_id,title,cate_name,author,newstime,clicks')->join('left join __CATEGORY__ c on a.cate_id = c.cate_id')->where($map)->order('article_id desc')->page($p.',20')->select();
        $this->assign('article_data',$article_data);
        //分页数据
        $count = $article_model->alias('a')->where($map)->count();
        $page_model = new \Think\Page($count,20);
        $show = $page_model->show(); //分页输出显示
        $this->assign('show',$show);
        $this->display();
    }

    /**
     * 文章删除
     */
    public function delete(){
        if(IS_GET){
            $article_id = I('get.article_id');
        }elseif(IS_POST){
            $article_id = I('post.article_id');
        }
        $article_model = D('Article');
        if($article_model->del($article_id)){
            $this->success('文章删除成功', U('Article/checkListing') ,1);
        }else{
            $this->error('文章删除失败');
        }
    }

    /**
     * 取消审核
     */
    public function unCheck(){
        if(IS_GET){
            $article_id = I('get.article_id');
        }elseif(IS_POST){
            $article_id = I('post.article_id');
        }
        $article_model = D('Article');
        if($article_model->unCheck($article_id)){
            $this->success('文章取消审核成功', U('Article/listing') ,1);
        }else{
            $this->error('文章取消审核失败');
        }
    }

    /**
     * 取消审核
     */
    public function check(){
        if(IS_GET){
            $article_id = I('get.article_id');
        }elseif(IS_POST){
            $article_id = I('post.article_id');
        }
        $article_model = D('Article');
        if($article_model->check($article_id)){
            $this->success('文章审核成功', U('Article/checkListing') ,1);
        }else{
            $this->error('文章审核失败');
        }
    }

}