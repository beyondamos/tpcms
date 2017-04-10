<?php
/**
 * 公共方法
 */

/**
 * 判断并设置表单check的值
 * @param   $[name] [description]
 */
function judgeCheck($str){
	return $str == 'on' ? 1 : 0;
}