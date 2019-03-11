<?php
require_once('f_ircalc.php');
require_once('f_chk.php');

$chkdCapital = chkCapital($_GET['c']);
$chkdTime    = chkTime(array($_GET['t'], $_GET['tu_y'], $_GET['tu_m'], $_GET['tu_d'], $_GET['yr360']));
$chkdTab     = chkTab($_GET['tab']);
$chkdIR      = $chkdTab[0]($_GET['ir']);

echoError($chkdCapital);
echoError($chkdTime);
echoError($chkdIR);

//var_dump($chkdCapital, $chkdTime, $chkdIR);

if( ($chkdCapital[0] == 0) && ($chkdTime[0] >= 0) && ($chkdIR[0] == 0) ){
	if($_GET['yr360'] == 'true'){ $yearDays = 360; } else {$yearDays = 365; }
	
	$interestAndCapital = $chkdTab[1]($chkdCapital[1], $chkdIR[1], $chkdTime[2], $yearDays);
	$interest = round($interestAndCapital - $chkdCapital[1], 2);
	echoInterest($interest, $interestAndCapital);
}

function echoError($chkdReturn){
	if($chkdReturn[0] == 0){ return null; }
	
	echo '<span style="color: red;">';
	echo '错误：';
	echo $chkdReturn[1];
	echo '</span><br>';
}

function echoInterest($i, $iac){
	echo '<br><span style="color: blue;">';
	echo '您的收益为：';
	echo $i;
	echo '元，您的本息合计为：';
	echo $iac;
	echo '元';
	echo '</span><br>';
}