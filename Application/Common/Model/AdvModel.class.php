<?php
/**
 * 广告模型
 */
namespace Common\Model;
use Think\Model;

class AdvModel extends Model{
    protected $_validate = array(
        array('adv_name', 'require', '广告名称必须填写', self::EXISTS_VALIDATE, 'regex', self::MODEL_BOTH),
        array('adv_position', 'require', '广告位置必须填写', self::EXISTS_VALIDATE, 'regex', self::MODEL_BOTH),
        array('adv_url', 'require', '广告地址必须填写', self::EXISTS_VALIDATE, 'regex', self::MODEL_BOTH),
        array('mark', 'require', '广告标记必须填写', self::EXISTS_VALIDATE, 'regex', self::MODEL_BOTH),
    );
}