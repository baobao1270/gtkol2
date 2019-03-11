<?php
function getInterestRateFloatByPercent($irPercent){
	return $irPercent / 100;
}

function getDaysByOtherTimeUnit($number, $unit='d', $yearDays=365){
	if($unit === 'y'){ return $number*$yearDays; }
	if($unit === 'm'){ return $number*30;        }
	if($unit === 'q'){ return $number*30*3;      }
	if($unit === 'w'){ return $number*7;         }
	return $number;
}

function getInterestAndCapitalByYearifiedInterestRate($capital, $interestRate, $days=7, $yearDays=365){
    $thisDayCapital = $capital;
	for($i=1; $i<=$days; $i++){
        $yearInterest = $thisDayCapital*getInterestRateFloatByPercent($interestRate);
        $thisDayInterest = round($yearInterest / $yearDays, 2);
        $thisDayCapital = $thisDayInterest + $thisDayCapital;
    }
	return $thisDayCapital;
}

function getInterestAndCapitalByTenThousandDailyInterest($capital, $tenThousandDailyInterest, $days=7, $theUselessParam){
	$thisDayCapital = $capital;
	for($i=1; $i<=$days; $i++){
        $thisDayInterest = round($thisDayCapital*$tenThousandDailyInterest/10000, 2);
        $thisDayCapital = $thisDayInterest + $thisDayCapital;
    }
	return $thisDayCapital;
}