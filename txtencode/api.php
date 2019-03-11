<?php
$method = $_GET['method'];
$text = $_POST['data'];

switch($method){
	case 'b64_encode':
	    echo base64_encode($text);
		break;
	case 'b64_decode':
	    echo base64_decode($text);
		break;
	case 'url_encode':
	    echo urlencode($text);
		break;
	case 'url_decode':
	    echo urldecode($text);
		break;
	case 'upper':
	    echo strtoupper($text);
		break;
	case 'lower':
	    echo strtolower($text);
		break;
	case 'rot13':
	    echo str_rot13($text);
		break;
	case 'rev':
	    echo strrev($text);
		break;
	case 'echo':
	    echo $text;
		break;
	case 'show_all':
	    echo 'b64_encode/b64_decode/url_encode/url_decode/upper/lower/rot13/rev';
		echo '|';
		echo 'Base64 编码/Base64 解码/URL 编码/URL 解码/字母转大写/字母转小写/ROT13/字符串反转（只支持字母）';
		break;
	default:
	    echo 'ERROR: U SHOULD UNDERSTAND WHY! DO NOT FUCKING GET MY HTML CHANGED BITCH! IS F12 FUNNY?';
}