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

/**
 * 生成时间
 * @return [type]       [description]
 */
function maketime($time){
	if($time){
		return $time;
	}else{
		return date('Y-m-d',time());
	}


	
}