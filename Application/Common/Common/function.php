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

/**
 * 统计流量
 * @param string $ip
 * @return bool|mixed
 */
function getIpLookup($ip = ''){
	if(empty($ip)){
		return false;
	}
	$res = @file_get_contents('http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js&ip=' . $ip);
	if(empty($res)){ return false; }
	$jsonMatches = array();
	preg_match('#\{.+?\}#', $res, $jsonMatches);
	if(!isset($jsonMatches[0])){ return false; }
	$json = json_decode($jsonMatches[0], true);
	if(isset($json['ret']) && $json['ret'] == 1){
		$json['ip'] = $ip;
		unset($json['ret']);
	}else{
		return false;
	}
	return $json;
}