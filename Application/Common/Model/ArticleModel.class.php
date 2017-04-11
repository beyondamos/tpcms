<?php
/**
 * 文章模型
 */
namespace Common\Model;
use Think\Model\RelationModel;
class ArticleModel extends RelationModel{

	protected $_validate = array(
		array('title', 'require', '标题不能为空', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
		array('title', '1,30', '标题不得超过30个字符', self::MUST_VALIDATE, 'length', self::MODEL_BOTH),
		array('cate_id', 'number', '不合法的文章分类', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
		array('content', 'require', '正文不能为空', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
		array('clicks', 'number', '不合法的点击数', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH ),
		// array('is_new', array(0,1), '不合法的最新属性', self::MUST_VALIDATE, 'in', self::MODEL_BOTH),
		// array('is_hot', array(0,1), '不合法的最热属性', self::MUST_VALIDATE, 'in', self::MODEL_BOTH),
		// array('is_recommend', array(0,1), '不合法的推荐属性', self::MUST_VALIDATE, 'in', self::MODEL_BOTH),
		// array('status', array(0,1), '不合法的审核属性', self::MUST_VALIDATE, 'in', self::MODEL_BOTH),
		array('author', '1,10', '不合法的作者信息', self::VALUE_VALIDATE, 'length', self::MODEL_BOTH),
	);

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
	 * 移至回收站
	 * @param  mixed $id 需要处理的文章id
	 * @return [type] [description]
	 */
	public function recycle($id){
		if(!is_array($id)){
			$ids[] = $id;
		}
		$ids = $id;
		$data = array('status' => 0);
		$map['article_id'] = array('in', $ids); 
		if($this->where($map)->save($data)){
			return true;
		}
		return false;
	}


	public function delete($id){
		
	}



}