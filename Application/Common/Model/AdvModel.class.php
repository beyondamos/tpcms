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
        array('adv_code', 'require', '广告代码必须填写', self::EXISTS_VALIDATE, 'regex', self::MODEL_BOTH),
    );
}