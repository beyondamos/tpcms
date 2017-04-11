<?php
/**
 * 分类模型
 */
namespace Common\Model;
use Think\Model;
class CategoryModel extends Model{

	protected $_validate = array(
		array('cate_name', 'require', '分类名称不能为空', self::EXISTS_VALIDATE, 'regex', self::MODEL_BOTH),
		array('cate_name', '', '分类名称已经存在', self::EXISTS_VALIDATE, 'unique', self::MODEL_BOTH),
		array('parent_id', 'number', '分类名称不合法', self::EXISTS_VALIDATE, 'regex', self::MODEL_BOTH),
		array('description', '1-255', '分类描述字数长度不超过255个字符', self::VALUE_VALIDATE, 'length', self::MODEL_BOTH),
	);

	/**
	 * 获得排序好的分类
	 * @return array  
	 */
	public function getSortCategories(){
		return $this->_infiniteClass($this->select());
	}

	/**
	 * 无限级分类
	 * @param array $array  需要排序的数组
	 * @param int 	$parent_id	开始排序的父级id
	 * @param int 	$level 当前分类的深度
	 * @return array        排序好的数组
	 */
	private function _infiniteClass($array,$parent_id = 0,$level = 0){
		static $list = array();
		foreach($array as $val){
			if($val['parent_id'] == $parent_id){
				$val['level'] = $level;
				$list[] = $val;
				$this->_infiniteClass($array,$val['cate_id'],$level+1);
			}
		}
		return $list;
	}



}