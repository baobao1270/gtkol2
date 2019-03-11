<?php
$sb = (int)$_GET['sb'];
$tb = (int)$_GET['tb'];
$sn = $_GET['sn'];
$preg_exp = "/^[0-9a-zA-Z]+$/";
$base_arr = array();
for($i = 0; $i <= 35; $i++){
	array_push($base_arr, strtoupper( base_convert($i, 10, 36) ) );
}

if($sb < 2){
	exit('来源进制太小，应≥2 ↗');
}

if($sb > 36){
	exit('来源进制太小，应≤36↗');
}

if($tb < 2){
	exit('目标进制太小，应≥2 →');
}

if($tb > 36){
	exit('目标进制太小，应≤36→');
}

$sn_preg_r =  preg_match($preg_exp, $sn) ? true : false;
if(!$sn_preg_r){
	exit('来源数字不正确，应当为0-9和/或a-z');
}

// 检查来源数字是否超出进制
for($k = 0; $k < strlen($sn); $k++){
	for($l = $sb; $l <= 35; $l++){
		if($sn{$k} == $base_arr[$l]){ exit('来源数字包含了超出进制的数字'); }
	}
}

echo strtoupper( base_convert($sn, $sb, $tb) );