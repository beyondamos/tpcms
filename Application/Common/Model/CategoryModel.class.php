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
		array('url', 'require', '路由名称不能为空', self::EXISTS_VALIDATE, 'regex', self::MODEL_BOTH),
		array('url', 'checkUrl', '路由名称只能为纯英文', self::EXISTS_VALIDATE, 'callback', self::MODEL_BOTH),
		array('cate_title', '1,50', '栏目标题字数长度不超过50个字符', self::VALUE_VALIDATE, 'length', self::MODEL_BOTH),
		array('cate_keywords', '1,50', '栏目关键词字数长度不超过50个字符', self::VALUE_VALIDATE, 'length', self::MODEL_BOTH),
		array('description', '1,255', '分类描述字数长度不超过255个字符', self::VALUE_VALIDATE, 'length', self::MODEL_BOTH),
	);

	/**
	 * 判断路由名称的格式是否正确
	 * 必须为纯英文
	 * @param string $url 接收的路由名称
	 * @return boolean 格式正确返回true 错误返回false
	 */
	public function checkUrl($url){
		if(preg_match('/^[a-zA-Z]+$/',$url)) return true;
		return false;
	}

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

	/**
	 * 判断父级分类
	 * @param  int $cate_id 当前分类的id
	 * @param  int $parent_id 选择的父级id
	 */
	public function judgeParentClass($cate_id,$parent_id){
		//上级分类不能选择自身
		if($cate_id == $parent_id) return false;
		//上级分类不能选择子类
		$parent_id = $this->where(array('cate_id' => $parent_id))->getField('parent_id');
		if($cate_id == $parent_id) return false;
		return true;
	}

	/**
	 * 删除分类
	 * @param $cate_id
	 * @return bool
	 */
	public function deleteCategory($cate_id){
		//该分类下存在子类则不能删除
		$category_info = $this->where(array('parent_id' => $cate_id))->find();
		if($category_info) return false;
		//如果该分类下存在文章，则不能删除分类
		$article_model = D('Article');
		$article_info = $article_model->where(array('cate_id' => $cate_id))->find();
		if($article_info) return false;
		if(!$this->delete($cate_id)) return false;
		return true;
	}

	/**
	 * 获取分类的子类  如果有返回子类数组  如果没有就返回当前分类
	 * @param int $cate_id 当前分类
	 */
	public function getSub($cate_id){
		$category_info = $this->select();
		$list[] = $cate_id;
		foreach($category_info as $val){
			if($val['parent_id'] == $cate_id){
				$list[] = $val['cate_id'];
				$this->getSub($val['cate_id']);
			}
		}
		return $list;
	}

}