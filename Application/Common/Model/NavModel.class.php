<?php
/**
 * 自定义导航模型
 */
namespace Common\Model;
use Think\Model;

class NavModel extends Model{

    protected $_validate = array(
        array('nav_name', 'require', '导航名称不能为空', self::EXISTS_VALIDATE, 'regex', self::MODEL_BOTH),
        array('nav_name', '', '导航名称已经存在', self::EXISTS_VALIDATE, 'unique', self::MODEL_BOTH),
        array('nav_url', 'require', '导航链接不能为空', self::EXISTS_VALIDATE, 'regex', self::MODEL_BOTH),
        array('nav_url', '', '导航链接已经存在', self::EXISTS_VALIDATE, 'unique', self::MODEL_BOTH),
        array('sort', 'number', '排序格式不正确', self::VALUE_VALIDATE, 'regex', self::MODEL_BOTH),
        array('is_show','0,1', '无效的显示方式', self::EXISTS_VALIDATE, 'in', self::MODEL_BOTH),
        array('is_blank','0,1', '无效的跳转方式', self::EXISTS_VALIDATE, 'in', self::MODEL_BOTH),
    );




}