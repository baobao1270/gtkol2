<?php
function chkTab($data){
	if(1 == (int)$data){
		return array(chkTTDI, getInterestAndCapitalByTenThousandDailyInterest);
	}
	return array(chkIR, getInterestAndCapitalByYearifiedInterestRate);
}

function chkCapital($data){
	$data = (int)$data;
	if($data <= 0){
		return array(-1, '经转换为整数的本金金额小于 1，请检查输入');
	}
	return array(0, $data);
}

function chkIR($data){
	$data = (float)$data;
	if(!is_float($data)){ return array(-1, '无法将收益率转换为小数形式'); }
	
	$ir = round($data, 2);
	if($ir >= 100){ return array(-21, '利率大于 100%'); }
	if($ir <= 0  ){ return array(-22, '利率小于 0%'  ); }
	if($ir != $data){ return array(-3, '利率不是 2 位小数的百分数'); }
	
	return array(0, $data);
}

function chkTTDI($data){
	$data = (float)$data;
	if(!is_float($data)){ return array(-1, '无法将万份收益转换为小数形式'); }
	
	$ir = round($data, 4);
	if($ir <= 0  ){ return array(-2, '万份收益小于 0'         ); }
	if($ir != $data){ return array(-3, '万份收益不是 4 位小数'); }
	
	return array(0, $data);
}

function chkTime($datax){	
	$t = (int)$datax[0];	
	$tu_y = ($datax[1] == 'true');
	$tu_m = ($datax[2] == 'true');
	$tu_d = ($datax[3] == 'true');
	$y360 = ($datax[4] == 'true');
	
	$msg = 'Success';
	$statusCode = 0;
	$base = 0;
	
	if($y360){ $yearBase = 360; } else {$yearBase = 365; }
	if( $tu_d && !$tu_m && !$tu_y){ $base = 1 ;        }
	if(!$tu_d &&  $tu_m && !$tu_y){ $base = 30;        }
	if(!$tu_d && !$tu_m &&  $tu_y){ $base = $yearBase; }
	if(!$tu_d && !$tu_m && !$tu_y){ $base = 1; $statusCode =  1; $msg = '未选择时间单位，默认为天'; }
	if( ($tu_d+$tu_m+$tu_y) >= 2 ){ $base = 0; $statusCode = -1; $msg = '选择了两个以上的时间单位'; }
	if(        $t <= 0           ){ $base = 0; $statusCode = -2; $msg = '持有时间小于零或不是整数'; }
	
	return array($statusCode, $msg, $t * $base);
}