<?php
/**
 * 文章分类控制器
 */
namespace Admin\Controller;
use Admin\Controller\CommonController;

class CategoryController extends CommonController{
    /**
     * 分类列表
     */
    public function listing(){
        $category_model = D('Category');
        $category_data = $category_model->getSortCategories();
        $this->assign('category_data',$category_data);
        //文章数和点击数
        $article_model = D('Article');
        $count_data = $article_model->field('cate_id , count(article_id) as article_num , sum(real_clicks) as clicks')->group('cate_id')->select();
        //整理获得的内容，将数组的键变成分类id
        foreach($count_data as $key => $val){
            $list[$val['cate_id']] = $val;
        }
        $this->assign('count_data',$list);
        $this->display();
    }


    /**
     * 添加分类
     */
    public function add(){
        if(IS_POST){
            $category_model = D('Category');
            if($category_model->create()){
                if($category_model->add()){
                    $this->success('分类添加成功', U('Category/listing'),1);
                }else{
                    $this->error('分类添加失败');
                }
            }else{
                $this->error($category_model->getError());
            }
        }elseif(IS_GET){
            $category_model = D('Category');
            $category_data = $category_model->getSortCategories();
            $this->assign('categroy_data', $category_data);
            $this->display();
        }
    }

    /**
     * 分类编辑
     * @return [type] [description]
     */
    public function edit(){
        if(IS_POST){
            $category_model = D('Category');
            if(!$category_model->judgeParentClass(I('post.cate_id'),I('post.parent_id'))) $this->error('分类选择错误');
            if($category_model->create()){
                if($category_model->save()){
                    $this->success('编辑分类成功',U('Category/listing'),1);
                }else{  
                    $this->error('分类编辑失败');
                }
            }else{
                $this->error($category_model->getError());
            }
        }elseif(IS_GET){
            $cate_id = I('get.cate_id');
            $category_model = D('Category');
            $category_info = $category_model->find($cate_id);
            $this->assign('category_info', $category_info);
            $category_data = $category_model->getSortCategories();
            $this->assign('categroy_data', $category_data);
            $this->display();
        }
    }

    /**
     * 删除分类
     * 分类下存在子类不能删除
     * 分类下存在文章不能删除
     */
    public function delete(){
        $cate_id = I('get.cate_id');
        $category_model = D('Category');
        if($category_model->deleteCategory($cate_id)){
            $this->success('分类删除成功');
        }else{
            $this->error('删除分类失败');
        }
    }

}