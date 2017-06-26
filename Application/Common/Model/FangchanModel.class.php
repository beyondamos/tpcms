<?php
namespace Common\Model;

use Think\Model;

/**
 * 房产表模型
 */
class FangchanModel extends Model
{

    protected $_validate = array(
        array('name', 'require', '房屋标题必须填写'),
    );


    

}
