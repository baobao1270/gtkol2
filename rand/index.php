<!DOCYPTE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="renderer" content="webkit">
	<meta http-equiv="Cache-Control" content="no-siteapp"/>
	<link rel="stylesheet" href="https://jcdn-1251131545.file.myqcloud.com/amazeui/css/amazeui.min.css">
	<script src="https://jcdn-1251131545.file.myqcloud.com/jquery2.min.js"></script>
	<script src="https://jcdn-1251131545.file.myqcloud.com/amazeui/js/amazeui.min.js"></script>
	
	<style>
	.am-input-group{
	    margin-top: 10px;
		margin-bottom: 10px;
	}
	
	#please-turn-down{
	    text-align: center;
		color: red;
		margin-top: 1000px;
        margin-bottom: 1000px;
		display: none;
	}
	</style>
	<?php $v_href = 'rand'; ?>
	<?php require_once(dirname(dirname(__file__)) . '/index-json.php'); ?>
	<title><?php v_title($v_href); ?> | <?php v_commonTitle($v_href); ?></title>
</head>
<body>
    <div class="am-g am-g-fixed">
	    <div class="am-u-md-2">&nbsp;</div>
	    <div class="am-u-md-8 am-u-sm-12 main">
		    <h1 id="title"><?php v_name($v_href); ?></h1>
			<ol class="am-breadcrumb">
                <li><a href="../..">首页</a></li>
				<?php if($v_href){ ?>
                    <li><a href=".."><?php v_title(false); ?></a></li>
                    <li class="am-active"><?php v_name($v_href); ?></li>
				<?php }else{ ?>
				    <li class="am-active"><?php v_name(false); ?></li>
				<?php } ?>
            </ol>
		    <hr>
			
		    <div id="box-container"></div>
			
			<script>
			function getCount()       { return $("#box-container").children().length; }
			function ajaxLoadItemBox(){ $.get("rand-box.html",addItemToList); }
			function getServerRand()  { $.get("rand-getServerResult.php?count=" + getCount(), postServerRendReturn); }
			
			function addItemToList(r){
				count = getCount() + 1;
			    r = $(r);
				r.children('input').attr("id", "tid-" + count);
				r.children('span').text(count);
				r.appendTo("#box-container");
			}
			
			function postServerRendReturn(r){
			    r = Number(r);
			    if( (r === NaN) || (r === 0) ){
				    alert("Server Error");
					location.href = location.href;
				}else{
				    $("#result-2-1").text(r);
					r = $("#tid-" + r).val();
					$("#result-2-2").val(r);
					location.href = "#result-1-0";
				}
			}
			
			function Build(that){
			    $($("button")[0]).hide();
				$("input").attr("disabled", true);
			    $(that).html("<i class=\"am-icon-spinner am-icon-spin\"></i>");
			    $(that).attr("disabled", "disabled");
				$("#ptp-n1").show();
				$("#please-turn-down").show();
				$("#result").show();
				$("#result").show();
				getServerRand();
			}
		    </script>
			
			<button type="button" class="am-btn am-btn-block am-round am-btn-deafult" onclick="ajaxLoadItemBox()">增加项目</button>
			<button type="button" class="am-btn am-btn-block am-round am-btn-primary" onclick="Build(this)">抽取随机事件</button>
			<p id="ptp-n1" style="color: red;text-align: center;display: none;">↓↓↓请往下翻↓↓↓</p>
			
			
			<div id="please-turn-down">
			    <p id="ptd-p">↓↓↓请往下翻↓↓↓</p>
			</div>
			
			<div id="result" style="display: none;margin-bottom: 150%;">
			<h2 id="result-1-0">抽取结果</h2>
			<div class="am-input-group" id="result-2-0">
			    <span class="am-input-group-label numbox am-round" id="result-2-1"></span>
				<input type="text" class="am-form-field itembox am-round" id="result-2-2" disabled>
			</div>
			<button type="button" class="am-btn am-btn-block am-round am-btn-warning" onclick="getServerRand();">重来</button>
			<div class="am-btn-group am-btn-group-justify" style="margin-top: 10px;">
			    <button type="button" class="am-btn am-round am-btn-success" onclick="location.href='./'">刷新</button>
			    <button type="button" class="am-btn am-round am-btn-deafult" onclick="location.href='#title'">返回顶部</button>
			</div>
		</div>
	    <div class="am-u-md-2">&nbsp;</div>
	</div>
</body>
<script>ajaxLoadItemBox();ajaxLoadItemBox();</script>
</html>