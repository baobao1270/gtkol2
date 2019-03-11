<?php
$json = json_decode( file_get_contents(dirname( __file__) . '/index.json' ), true );

function v_title($v_href){
	global $json;
	if($v_href){
		$childrens = $json["children"];
		foreach($childrens as $children){
			if($children["href"] === $v_href){
				echo $children["name"];
			}
		}
	}else{
		echo $json["title"];
	}
}

function v_name($v_href){
	global $json;
	if($v_href){
		echo v_title($v_href);
	}else{
		echo $json["name"];
	}
}

function v_commonTitle(){
	global $json;
	echo $json["commonTitle"];
}