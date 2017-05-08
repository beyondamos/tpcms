<?php
/**
 * 会员文章模型
 */
namespace Common\Model;
use Think\Model;

class PostModel extends Model{
    protected $_validate = array(
        array('title', 'require', '标题不能为空', self::EXISTS_VALIDATE, 'regex', self::MODEL_BOTH),
        array('title', '1,30', '标题不能超过30个字符', self::EXISTS_VALIDATE, 'length', self::MODEL_BOTH),
        array('cate_id', 'number', '不合法的文章分类',  self::EXISTS_VALIDATE, 'regex', self::MODEL_BOTH),
        array('cate_id', '0', '必须选择文章分类', self::EXISTS_VALIDATE, 'notequal', self::MODEL_BOTH),
        array('content', 'require', '正文内容不能为空', self::EXISTS_VALIDATE, 'regex', self::MODEL_BOTH),
        array('author', 'require', '作者不能为空', self::EXISTS_VALIDATE, 'regex', self::MODEL_BOTH),
    );

    protected $_auto = array(
        array('newstime', 'time', self::MODEL_INSERT, 'function'),
        array('member_id', 'getMemberId', self::MODEL_INSERT, 'callback'),
        array('status', '0', self::MODEL_INSERT, 'string'),
        array('is_recommend', '0', self::MODEL_INSERT, 'string'),
        array('clicks', '0', self::MODEL_INSERT, 'string'),
        array('zan', '0', self::MODEL_INSERT, 'string'),
        array('real_clicks', '0', self::MODEL_INSERT, 'string'),
    );


    /**
     * 获得会员id
     * @return int
     */
    public function getMemberId(){
        return session('member_id');
    }


}
