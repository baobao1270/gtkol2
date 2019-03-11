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
	<?php $v_href = 'baseconv'; ?>
	<?php require_once(dirname(dirname(__file__)) . '/index-json.php'); ?>
	<title><?php v_title($v_href); ?> | <?php v_commonTitle($v_href); ?></title>
</head>
<body>
    <div class="am-g am-g-fixed">
	    <div class="am-u-md-2">&nbsp;</div>
	    <div class="am-u-md-8 am-u-sm-12 main">
		    <h1 id="title"><?php v_name($v_href); ?></h1>
			<ol class="am-breadcrumb">
                <li><a href="https://josephcz.win/">博客</a></li>
				<?php if($v_href){ ?>
                    <li><a href=".."><?php v_title(false); ?></a></li>
                    <li class="am-active"><?php v_name($v_href); ?></li>
				<?php }else{ ?>
				    <li class="am-active"><?php v_name(false); ?></li>
				<?php } ?>
            </ol>
		    <hr>
			<div class="am-input-group">
			    <span class="am-input-group-label am-round" style="padding: 0 0.5em;">来源</span>
				<input type="text" class="am-form-field am-round" id="form-source-num" value="0">
				<span class="am-input-group-label am-round" style="padding: 0 0.2em;">←数字|进制→</span>
				<input type="number" class="am-form-field am-round" id="form-source-base" min="2" max="36" value="10">
			</div>
			
			<div class="am-input-group">
			    <span class="am-input-group-label am-round" style="padding: 0 0.5em;">结果</span>
				<input type="text" class="am-form-field am-round" id="form-target-num">
				<span class="am-input-group-label am-round" style="padding: 0 0.2em;">←数字|进制→</span>
				<input type="number" class="am-form-field am-round am-fr" id="form-target-base" min="2" max="36" value="16">
			</div>
			
			<button type="button" class="am-btn am-btn-primary am-round am-btn-block" style="margin-bottom: 40px" onclick="requestConv();">转换</button>
			
			<hr>
			<h3>快速填写进制</h3>
			<div class="am-btn-group am-btn-group-justify">
			    <button type="button" class="am-btn am-btn-danger am-round" onclick="" style="padding: 0.2em 0.5em;" id="mod-src-open">来源</button>
			    <button type="button" class="am-btn am-btn-primary am-round" onclick="fullFillForm(2 ,'#form-source-base');" style="padding: 0 0.5em;">BIN  2</button>
			    <button type="button" class="am-btn am-btn-primary am-round" onclick="fullFillForm(8 ,'#form-source-base');" style="padding: 0 0.5em;">OCT  8</button>
			    <button type="button" class="am-btn am-btn-primary am-round" onclick="fullFillForm(10,'#form-source-base');" style="padding: 0 0.5em;">DEC 10</button>
			    <button type="button" class="am-btn am-btn-primary am-round" onclick="fullFillForm(16,'#form-source-base');" style="padding: 0 0.5em;">HEX 16</button>
			</div>
			<hr style="margin: 5;">
			<div class="am-btn-group am-btn-group-justify">
			    <button type="button" class="am-btn am-btn-danger am-round" style="padding: 0.2em 0.5em;" id="mod-tgt-open">结果</button>
			    <button type="button" class="am-btn am-btn-primary am-round" onclick="fullFillForm(2 ,'#form-target-base');" style="padding: 0 0.5em;">BIN  2</button>
			    <button type="button" class="am-btn am-btn-primary am-round" onclick="fullFillForm(8 ,'#form-target-base');" style="padding: 0 0.5em;">OCT  8</button>
			    <button type="button" class="am-btn am-btn-primary am-round" onclick="fullFillForm(10,'#form-target-base');" style="padding: 0 0.5em;">DEC 10</button>
			    <button type="button" class="am-btn am-btn-primary am-round" onclick="fullFillForm(16,'#form-target-base');" style="padding: 0 0.5em;">HEX 16</button>
			</div>
			<br>
			小贴士：如果要输入的数字过长，请点击上方红色“来源”按钮，在弹出框内输入数字。
			同理，如果结果数字过长，可以点击上方红色“结果”按钮，在弹出框内查看数字，按右上角灰色“&times;”关闭。
			
			<script>
			function checkData(data){
				var snReg = /^[0-9a-zA-Z]+$/;
				var snRegExp = new RegExp(snReg);
				var snRegTestResult = snRegExp.test(data);
				if(snRegTestResult){
					return data;
				}
				return -1;
			}
			
			function fullFillForm(src, id){
				$(id).val(src);
				requestConv();
			}
			
			function getRequestURLSettings(){
				var sn = checkData($('#form-source-num' ).val());
				var sb = Number($('#form-source-base').val());
				var tb = Number($('#form-target-base').val());
				return 'sn=' + sn + '&sb=' + sb + '&tb=' + tb;
			}
			
			function convCallback(data){
				$('#form-target-num').val(data);
				$('#mod-tgt-p').text(data);
			}
			
			function requestConv(){
				$('#form-source-num' ).val( $('#form-source-num' ).val().toLocaleUpperCase() );
				$.get('conv.php?' + getRequestURLSettings(), convCallback);
			}
			</script>
		</div> 
	    <div class="am-u-md-2">&nbsp;</div>
	</div>
	
	<div class="am-modal am-modal-no-btn" tabindex="-1" id="mod-src">
        <div class="am-modal-dialog">
            <div class="am-modal-hd">
			    来源（填写长数）
                <a href="javascript: void(0)" class="am-close" data-am-modal-close>&times;</a>
            </div>
            <div class="am-modal-bd">
                <input id="mod-src-input" style="width: 100%; margin-bottom: 5px;" value="0">
			    <button style="width: 100%;" onclick="modOK()">OK</button>
            </div>
        </div>
    </div>
	<div class="am-modal am-modal-no-btn" tabindex="-2" id="mod-tgt">
        <div class="am-modal-dialog">
            <div class="am-modal-hd">
			    结果（查看长数）
                <a href="javascript: void(0)" class="am-close" data-am-modal-close>&times;</a>
            </div>
            <div class="am-modal-bd">
                <span id="mod-tgt-p"></span>
				<button style="width: 100%;" onclick="$('#mod-tgt').modal('close')">OK</button>
            </div>
        </div>
	</div>
	
	<script>
	function openModSrc(){
		$('#mod-src').modal('open');
	}
	
	function openModTgt(){
		$('#mod-tgt').modal('open');
	}
	
	function modOK(){
		var d = $('#mod-src-input').val();
		$('#form-source-num').val(d);
		$('#mod-src').modal('close');
	}
	
	$('#mod-src-open').click(openModSrc)
	$('#mod-tgt-open').click(openModTgt)
	</script>
</body>
</html>