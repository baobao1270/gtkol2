<?php
$i = (int)$_GET["count"];
if($i > 1){
	echo rand(1, $i);
}else{
	echo 0;
}