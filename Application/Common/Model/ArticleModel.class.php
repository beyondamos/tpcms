<?php
/**
 * 文章模型
 */
namespace Common\Model;
use Think\Model\RelationModel;
class ArticleModel extends RelationModel{

	// protected $_validate = array(
	// 	array('title', 'require', '标题不能为空', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
	// 	array('title', '1,30', '标题不得超过30个字符', self::MUST_VALIDATE, 'length', self::MODEL_BOTH),
	// 	array('cate_id', 'number', '不合法的文章分类', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
	// 	array('content', 'require', '正文不能为空', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
	// 	array('clicks', 'number', '不合法的点击数', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH ),
	// 	array('author', '1,10', '不合法的作者信息', self::VALUE_VALIDATE, 'length', self::MODEL_BOTH),
	// );

	protected $_auto = array(
		array('newstime', NOW_TIME, self::MODEL_BOTH, 'string'),
		array('is_new', 'judgeCheck', self::MODEL_BOTH, 'function'),
		array('is_hot', 'judgeCheck', self::MODEL_BOTH, 'function'),
		array('is_recommend', 'judgeCheck', self::MODEL_BOTH, 'function'),
		array('status', 'judgeCheck', self::MODEL_BOTH, 'function'),
	);

	protected $_link = array(
		'Category' => array(
			'mapping_type' => self::BELONGS_TO,
			'class_name' => 'Category',
			'foreign_key' => 'cate_id',
			'mapping_name' => 'category',
			'as_fields' => 'cate_name',
		),

	);

	/**
	 * 文章审核
	 * @param  mixed $id 需要处理的文章id
	 * @return bool  成功返回true  失败返回false
	 */
	public function check($id){
		if(!is_array($id)){
			$map['article_id'] = $id;
		}else{
			$id = implode(',', $id);
			$map['article_id'] = array('in', $id);
		}
		$data = array('status' => 1);
		if($this->where($map)->save($data)){
			return true;
		}
		return false;
	}	

	/**
	 * 取消文章审核
	 * @param  mixed $id 需要处理的文章id
	 * @return bool  成功返回true  失败返回false
	 */
	public function unCheck($id){
		if(!is_array($id)){
			$map['article_id'] = $id;
		}else{
			$id = implode(',', $id);
			$map['article_id'] = array('in', $id);
		}
		$data = array('status' => 2);
		if($this->where($map)->save($data)){
			return true;
		}
		return false;
	}

	public function del($id){
		if(!is_array($id)){
			$map['article_id'] = $id;
		}else{
			$id = implode(',', $id);
			$map['article_id'] = array('in', $id);
		}
		
		$image_info = $this->field('titleimg, big_image')->where($map)->select();
		foreach($image_info as $val){
			if(is_file($val['titleimg'])) unlink($val['titleimg']);
			if(is_file($val['big_image'])) unlink($val['big_image']);
		}
		
		if( $this->where($map)->delete()){
			return true;
		}else{
			return false;
		}
	}



}