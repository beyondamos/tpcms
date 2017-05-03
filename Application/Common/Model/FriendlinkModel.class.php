<?php
/**
 * 友情链接模型
 */
namespace Common\Model;
use Think\Model;

class FriendlinkModel extends Model{

    protected $_validate = array(
        array('url', 'require', 'URL地址不能为空', self::EXISTS_VALIDATE, 'regex', self::MODEL_BOTH),
        array('url', 'url', 'URL地址格式错误', self::EXISTS_VALIDATE, 'regex', self::MODEL_BOTH),
        array('url_name', 'require', '链接名称不能为空', self::EXISTS_VALIDATE, 'regex', self::MODEL_BOTH),
        array('url_name', '1,20', '链接名称长度不能超过20个字符', self::EXISTS_VALIDATE, 'length', self::MODEL_BOTH),
    );


}